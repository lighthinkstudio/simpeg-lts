<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use App\Models\JenisUnitOrganisasi;
use App\Http\Requests\StoreJenisUnitOrganisasiRequest;
use App\Http\Requests\UpdateJenisUnitOrganisasiRequest;
use App\Http\Requests\ImportJenisUnitOrganisasiRequest;
use App\Imports\JenisUnitOrganisasiImport;
use Maatwebsite\Excel\Facades\Excel;

class JenisUnitOrganisasiController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        //
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
     * @param  \App\Http\Requests\StoreJenisUnitOrganisasiRequest  $request
     * @return \Illuminate\Http\Response
     */
    public function store(StoreJenisUnitOrganisasiRequest $request)
    {
        //
    }

    /**
     * Display the specified resource.
     *
     * @param  \App\Models\JenisUnitOrganisasi  $jenisUnitOrganisasi
     * @return \Illuminate\Http\Response
     */
    public function show(JenisUnitOrganisasi $jenisUnitOrganisasi)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  \App\Models\JenisUnitOrganisasi  $jenisUnitOrganisasi
     * @return \Illuminate\Http\Response
     */
    public function edit(JenisUnitOrganisasi $jenisUnitOrganisasi)
    {
        //
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \App\Http\Requests\UpdateJenisUnitOrganisasiRequest  $request
     * @param  \App\Models\JenisUnitOrganisasi  $jenisUnitOrganisasi
     * @return \Illuminate\Http\Response
     */
    public function update(UpdateJenisUnitOrganisasiRequest $request, JenisUnitOrganisasi $jenisUnitOrganisasi)
    {
        //
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  \App\Models\JenisUnitOrganisasi  $jenisUnitOrganisasi
     * @return \Illuminate\Http\Response
     */
    public function destroy(JenisUnitOrganisasi $jenisUnitOrganisasi)
    {
        //
    }

    /**
     * Import a newly created or updated resource in storage.
     *
     * @param  \App\Http\Requests\ImportJenisUnitOrganisasiRequest  $request
     * @return \Illuminate\Http\Response
     */
    public function import(ImportJenisUnitOrganisasiRequest $request)
    {
        // Validasi
        $validated = $request->validated();

        Excel::import(new JenisUnitOrganisasiImport, $request->jenis_unit_organisasi);

        return redirect()->route('admin.import')->with(['success' => 'Data jenis unit organisasi berhasil di import']);
    }
}
