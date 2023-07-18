<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use App\Models\Konfigurasi;
use App\Http\Requests\StoreKonfigurasiRequest;
use App\Http\Requests\UpdateKonfigurasiRequest;

class KonfigurasiController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        // Listing Konfigurasi
        $konfigurasi = Konfigurasi::orderBy('urutan', 'asc')->get();
        // dd($konfigurasi);

        $data = [
            'title'         => 'Konfigurasi Website',
            'konfigurasi'   => $konfigurasi
        ];
        return view('admin.konfigurasi.index', $data);
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
     * @param  \App\Http\Requests\StoreKonfigurasiRequest  $request
     * @return \Illuminate\Http\Response
     */
    public function store(StoreKonfigurasiRequest $request)
    {
        //
    }

    /**
     * Display the specified resource.
     *
     * @param  \App\Models\Konfigurasi  $konfigurasi
     * @return \Illuminate\Http\Response
     */
    public function show(Konfigurasi $konfigurasi)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  \App\Models\Konfigurasi  $konfigurasi
     * @return \Illuminate\Http\Response
     */
    public function edit(Konfigurasi $konfigurasi)
    {
        //
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \App\Http\Requests\UpdateKonfigurasiRequest  $request
     * @param  \App\Models\Konfigurasi  $konfigurasi
     * @return \Illuminate\Http\Response
     */
    public function update(UpdateKonfigurasiRequest $request, Konfigurasi $konfigurasi)
    {
        //
        $listing = $konfigurasi->get();

        foreach($listing as $listing)
        {
            if($listing->tipe !== 'file')
            {
                if(!$request->old($listing->nama) && $request->input('nama', $listing->nama))
                {
                    $data = [
                        'deskripsi' => $request->input($listing->nama)
                    ];
                    // dd($data);
                    Konfigurasi::where('nama', $listing->nama)->update($data);
                }
            }

            if($listing->tipe === 'file')
            {
                if($request->hasFile($listing->nama))
                {
                    $extension = $request->file($listing->nama)->extension();
                    $file_name = $listing->nama . '.' . $extension;
                    // dd($file_name);

                    $path_file = $request->file($listing->nama)->storeAs('assets/uploads/logo', $file_name, 'public');

                    $data = [
                        'deskripsi' => $file_name
                    ];
                    // dd($data);
                    Konfigurasi::where('nama', $listing->nama)->update($data);
                }
            }
            
        }
         return redirect()->route('admin.konfigurasi')
                    ->with(['success' => 'Data berhasil di update.']);
        // $data = $request->collect();
        // dd($konfigurasi->get());
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  \App\Models\Konfigurasi  $konfigurasi
     * @return \Illuminate\Http\Response
     */
    public function destroy(Konfigurasi $konfigurasi)
    {
        //
    }
}
