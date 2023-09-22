<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use App\Models\Pegawai;
use App\Models\Role;
use App\Http\Requests\StorePegawaiRequest;
use App\Http\Requests\UpdatePegawaiRequest;
use App\Http\Requests\UpdatePasswordRequest;
use Illuminate\Support\Facades\DB;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Schema;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Hash;
use Illuminate\Support\Str;
use Exception;
use Image;

class AkunController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index(Request $request, Pegawai $m_pegawai)
    {
        $limit = $request->limit;
        $pegawai = $m_pegawai->listing($request);
        $pegawai->appends($request->only('search', 'limit'));
        // dd($pegawai);

        $data = [
            'title'     => 'DATA AKUN PEGAWAI',
            'pegawai'   => $pegawai,
        ];
        return view('admin.akun.index', $data);
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create(Pegawai $m_pegawai, Role $m_role)
    {
        //
        $pegawai    = $m_pegawai->aktif();
        $role       = $m_role->simpeg();
        // dd($pegawai);

        $data = [
            'title'     => 'TAMBAH AKUN PEGAWAI',
            'pegawai'   => $pegawai,
            'role'      => $role,
        ];
        return view('admin.akun.create', $data);
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Requests\StorePegawaiRequest  $request
     * @return \Illuminate\Http\Response
     */
    public function store(StorePegawaiRequest $request, Pegawai $m_pegawai)
    {
        // Validasi
        $validated = $request->validated();

        // Upload file
        $file_name = '';
        if($request->hasFile('foto'))
        {
            $upload_file = $request->file('foto');
            $path_file = $request->file('foto')->store('assets/uploads/images/square', 'public');
            $file_name = basename($path_file);

            // Images
            $image = storage_path('app/public/assets/uploads/images/' . $file_name);
            $m_img = Image::make($upload_file->getRealPath());
            $m_img->fit(600, 800, function ($const) {
                $const->upsize();
            }, $position = 'top')->resize(600, 800);
            $m_img->save($image);

            // Square
            $square = storage_path('app/public/assets/uploads/images/square/' . $file_name);
            $m_img = Image::make($upload_file->getRealPath());
            $m_img->fit(120, 120, function ($const) {
                $const->upsize();
            }, $position = 'top')->resize(120, 120);
            $m_img->save($square);
        }

        $pegawai = $m_pegawai->where('nip', $request->nip)->first();

        if(empty($pegawai))
        {
            abort(404);
        }

        $data = [
            'nip'       => $pegawai->nip,
            'name'      => $pegawai->nama_pegawai,
            'email'     => $request->email,
            'password'  => Hash::make($request->password),
            'role'      => $request->role,
            'status'    => $request->status,
            'foto'      => $file_name,
        ];
        Pegawai::create($data);
        
        return redirect()->route('admin.akun')->with(['success' => 'Data berhasil di tambah']);
    }

    /**
     * Display the specified resource.
     *
     * @param  \App\Models\Pegawai  $pegawai
     * @return \Illuminate\Http\Response
     */
    public function show(Pegawai $m_pegawai, $id)
    {
        $pegawai = $m_pegawai->detail($id);
        // dd($pegawai);

        $data = [
            'title'     => 'DETAIL AKUN PEGAWAI',
            'pegawai'   => $pegawai
        ];
        return view('admin.akun.detail', $data);
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  \App\Models\Pegawai  $pegawai
     * @return \Illuminate\Http\Response
     */
    public function edit(Pegawai $m_pegawai, Role $m_role, $id)
    {
        //
        $pegawai    = $m_pegawai->detail($id);
        $role       = $m_role->simpeg();

        $data = [
            'title'     => 'EDIT AKUN PEGAWAI',
            'pegawai'   => $pegawai,
            'role'      => $role
        ];
        return view('admin.akun.edit', $data);
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \App\Http\Requests\UpdatePegawaiRequest  $request
     * @param  \App\Models\Pegawai  $pegawai
     * @return \Illuminate\Http\Response
     */
    public function update(UpdatePegawaiRequest $request, Pegawai $m_pegawai, $id)
    {
        // Detail Pegawai
        $pegawai = $m_pegawai->detail($id);

        // Validasi
        $validated = $request->validated();
        // dd($validated);

        // Upload file
        $file_name = $pegawai->foto;
        if($request->hasFile('foto'))
        {
            $upload_file    = $request->file('foto');
            $path_file      = './storage/assets/uploads/images/' . $pegawai->foto;
            $square         = './storage/assets/uploads/images/square/' . $pegawai->foto;
            // dd($path_file);

            if(!empty($file_name) && file_exists($path_file))
            {
                unlink($path_file);
            }

            if(!empty($file_name) && file_exists($square))
            {
                unlink($square);
            }

            $path_file = $request->file('foto')->store('assets/uploads/images/square', 'public');
            $file_name = basename($path_file);

            // Images
            $image = storage_path('app/public/assets/uploads/images/' . $file_name);
            $m_img = Image::make($upload_file->getRealPath());
            $m_img->fit(600, 800, function ($const) {
                $const->upsize();
            }, $position = 'top')->resize(600, 800);
            $m_img->save($image);

            // Square
            $square = storage_path('app/public/assets/uploads/images/square/' . $file_name);
            $m_img = Image::make($upload_file->getRealPath());
            $m_img->fit(120, 120, function ($const) {
                $const->upsize();
            }, $position = 'top')->resize(120, 120);
            $m_img->save($square);
        }

        $pegawai = $m_pegawai->where('nip', $request->nip)->first();

        if(empty($pegawai))
        {
            abort(404);
        }

        $data = [
            'nip'       => $pegawai->nip,
            'name'      => $pegawai->nama_pegawai,
            'email'     => $request->email,
            'role'      => $request->role,
            'status'    => $request->status,
            'foto'      => $file_name,
        ];
        Pegawai::where('id', $id)->update($data);
        
        return redirect()->route('admin.akun')->with(['success' => 'Data berhasil di update.']);
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  \App\Models\Pegawai  $pegawai
     * @return \Illuminate\Http\Response
     */
    public function destroy(Pegawai $m_pegawai, $id)
    {
        // Pegawai
        $pegawai = Pegawai::find($id);

        if(is_null($pegawai))
        {
            return redirect()->route('admin.akun')->with(['danger' => 'Data tidak ditemukan.']);
        }

        try {
            $file_name  = $pegawai->foto;
            $path_file  = './storage/assets/uploads/images/' . $pegawai->foto;
            $square     = './storage/assets/uploads/images/square/' . $pegawai->foto;
            // dd($path_file);

            if(!empty($file_name) && file_exists($path_file))
            {
                unlink($path_file);
            }

            if(!empty($file_name) && file_exists($square))
            {
                unlink($square);
            }
            // Schema::disableForeignKeyConstraints();
            $pegawai->delete();
            // Schema::enableForeignKeyConstraints();

        }
        catch (Exception $e) {
            return redirect()->route('admin.akun')->with(['warning' => 'Oops! Data tidak dapat di hapus karena telah di gunakan pada modul lain.']);
        }

        return redirect()->route('admin.akun')->with(['success' => 'Data berhasil di hapus.']);
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \App\Http\Requests\UpdatePasswordRequest  $request
     * @param  \App\Models\Pegawai  $pegawai
     * @return \Illuminate\Http\Response
     */
    public function password(UpdatePasswordRequest $request, Pegawai $m_pegawai, $id)
    {
        // Detail Pegawai
        $pegawai = $m_pegawai->detail($id);

        // Validasi
        $validated = $request->validated();
        // dd($validated);

        $data = [
            'password'  => Hash::make($request->password),
        ];
        Pegawai::where('id', $id)->update($data);
        
        return redirect()->route('admin.akun')->with(['success' => 'Data berhasil di update.']);
    }
}
