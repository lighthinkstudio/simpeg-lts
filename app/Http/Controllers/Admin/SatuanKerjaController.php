<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use App\Models\SatuanKerja;
use App\Http\Requests\StoreSatuanKerjaRequest;
use App\Http\Requests\UpdateSatuanKerjaRequest;

class SatuanKerjaController extends Controller
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
     * @param  \App\Http\Requests\StoreSatuanKerjaRequest  $request
     * @return \Illuminate\Http\Response
     */
    public function store(StoreSatuanKerjaRequest $request)
    {
        //
    }

    /**
     * Display the specified resource.
     *
     * @param  \App\Models\SatuanKerja  $satuanKerja
     * @return \Illuminate\Http\Response
     */
    public function show(SatuanKerja $satuanKerja)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  \App\Models\SatuanKerja  $satuanKerja
     * @return \Illuminate\Http\Response
     */
    public function edit(SatuanKerja $satuanKerja)
    {
        //
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \App\Http\Requests\UpdateSatuanKerjaRequest  $request
     * @param  \App\Models\SatuanKerja  $satuanKerja
     * @return \Illuminate\Http\Response
     */
    public function update(UpdateSatuanKerjaRequest $request, SatuanKerja $satuanKerja)
    {
        //
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  \App\Models\SatuanKerja  $satuanKerja
     * @return \Illuminate\Http\Response
     */
    public function destroy(SatuanKerja $satuanKerja)
    {
        //
    }
}
