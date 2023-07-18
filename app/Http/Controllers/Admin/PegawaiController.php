<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use App\Models\Pegawai;
use App\Models\RiwayatJabatan;
use App\Models\RiwayatPendidikan;
use App\Http\Requests\StorePegawaiRequest;
use App\Http\Requests\UpdatePegawaiRequest;
use Illuminate\Support\Facades\DB;
use Illuminate\Http\Request;
use GuzzleHttp\Client;
use GuzzleHttp\Exception\ClientException;
use GuzzleHttp\Psr7;
use Lighthinkstudio\Siasync\Siasync;
use Maatwebsite\Excel\Facades\Excel;
use App\Imports\PegawaiImport;

class PegawaiController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @param  \App\Models\Pegawai  $m_pegawai
     * @return \Illuminate\Http\Response
     */
    public function index(Request $request, Pegawai $m_pegawai, RiwayatJabatan $m_rwjabatan, RiwayatPendidikan $m_rwpendidikan)
    {
        // DATA PEGAWAI
        $limit = $request->limit;
        $pegawai = $m_pegawai->listing($request);
        $pegawai->appends($request->only('search', 'limit'));

        $data = [
            'title'         => 'Data Pegawai',
            'pegawai'       => $pegawai,
            'rw_jabatan'    => $m_rwjabatan,
            'rw_pendidikan' => $m_rwpendidikan,
            'limit'         => $limit
        ];
        return view('admin.pegawai.index', $data);
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        //
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \App\Http\Requests\StorePegawaiRequest  $request
     * @return \Illuminate\Http\Response
     */
    public function store(StorePegawaiRequest $request)
    {
        //
    }

    /**
     * Display the specified resource.
     *
     * @param  \App\Models\Pegawai  $m_pegawai
     * @return \Illuminate\Http\Response
     */
    public function show(Pegawai $m_pegawai, $id)
    {
        // DETAIL PEGAWAI
        $pegawai = $m_pegawai->detail($id);

        $data = [
            'title'     => 'Data Pegawai : ' . $pegawai->nama,
            'pegawai'   => $pegawai,
        ];
        return view('admin.pegawai.detail', $data);
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  \App\Models\Pegawai  $m_pegawai
     * @return \Illuminate\Http\Response
     */
    public function edit(Pegawai $m_pegawai)
    {
        //
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \App\Http\Requests\UpdatePegawaiRequest  $request
     * @param  \App\Models\Pegawai  $m_pegawai
     * @return \Illuminate\Http\Response
     */
    public function update(UpdatePegawaiRequest $request, Pegawai $m_pegawai)
    {
        //
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  \App\Models\Pegawai  $m_pegawai
     * @return \Illuminate\Http\Response
     */
    public function destroy(Pegawai $m_pegawai)
    {
        //
    }

    /**
     * Import resources in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function import(Request $request)
    {
        // PROSES SUBMIT
        if($request->submit == 'proses')
        {
            // VALIDASI FILE IMPORT
            $this->validate($request, [
                'import' => 'required|mimes:csv,xls,xlsx'
            ]);

            try{
                DB::beginTransaction();

                // PROSES IMPORT
                Excel::import(new PegawaiImport, $request->import);

                DB::commit();

                return redirect()->route('admin.pegawai')->with(['success' => 'Data berhasil di import']);
            }
            catch(Throwable $e) {

                report($e);

                DB::rollBack();

                return redirect()->route('admin.pegawai')->with(['warning' => 'Data gagal di import']);
            }
        }
    }

    /**
     * Import resources in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function sinkron(Client $http, Siasync $siasync, Pegawai $m_pegawai, $nip)
    {
        // DATA PEGAWAI SIASN
        try {
            $get_data = $http->get('https://training-apimws.bkn.go.id:8243/api/1.0/pns/data-utama/'. $nip, $siasync->connect());
            $response =  json_decode((string) $get_data->getBody($siasync->auth())->getContents(), true);
            // $response = $get_data;
        }
        catch(ClientException $e) {
            $response = $e->getResponse();
            $response = $response->getBody()->getContents();
            $response = json_decode($response);
            $response = [
                'code'  => $response->code,
                'data'  => $response->data,
            ];
        }
        // dd($response['code']);

        if($response['code'] == 0)
        {
            return back()->with(['warning' => 'Data tidak di temukan di database siasn/ data tidak valid.']);
        }

        $data_siasn = $response['data'];
        if($data_siasn)
        {
            $update_data = [
                'pnsId' => $data_siasn['id'],
                'nama'  => 'Muslim',
            ];
            unset($data_siasn['id']);
            unset($data_siasn['nama']);
        }
        $data_siasn = array_merge($update_data, $data_siasn);
        // dd($data_siasn);

        $check = Pegawai::where('nipBaru', $data_siasn['nipBaru'])->count();

        if($check === 1)
        {
            Pegawai::where('nipBaru', $nip)->update($data_siasn);
            $alert = back()->with(['success' => 'Data berhasil di sinkronisasi']);
        }
        else
        {
            Pegawai::insert($data_siasn);
            $alert = back()->with(['success' => 'Data berhasil di tambah']);
        }
        return $alert;
    }

    /**
     * Display a listing of the resource.
     *
     * @param  \App\Models\Pegawai  $m_pegawai
     * @return \Illuminate\Http\Response
     */
    public function akun(Request $request, Pegawai $m_pegawai)
    {
        // DATA PEGAWAI
        $limit = $request->limit;
        $pegawai = $m_pegawai->listing($request);
        $pegawai->appends($request->only('search', 'limit'));

        $data = [
            'title'         => 'Data Pegawai',
            'pegawai'       => $pegawai,
            'limit'         => $limit
        ];
        return view('admin.pegawai.akun', $data);
    }
}
