<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use App\Models\LokasiKerja;
use App\Http\Requests\StoreLokasiKerjaRequest;
use App\Http\Requests\UpdateLokasiKerjaRequest;

class LokasiKerjaController extends Controller
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
     * @param  \App\Http\Requests\StoreLokasiKerjaRequest  $request
     * @return \Illuminate\Http\Response
     */
    public function store(StoreLokasiKerjaRequest $request)
    {
        //
    }

    /**
     * Display the specified resource.
     *
     * @param  \App\Models\LokasiKerja  $lokasiKerja
     * @return \Illuminate\Http\Response
     */
    public function show(LokasiKerja $lokasiKerja)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  \App\Models\LokasiKerja  $lokasiKerja
     * @return \Illuminate\Http\Response
     */
    public function edit(LokasiKerja $lokasiKerja)
    {
        //
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \App\Http\Requests\UpdateLokasiKerjaRequest  $request
     * @param  \App\Models\LokasiKerja  $lokasiKerja
     * @return \Illuminate\Http\Response
     */
    public function update(UpdateLokasiKerjaRequest $request, LokasiKerja $lokasiKerja)
    {
        //
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  \App\Models\LokasiKerja  $lokasiKerja
     * @return \Illuminate\Http\Response
     */
    public function destroy(LokasiKerja $lokasiKerja)
    {
        //
    }
}
