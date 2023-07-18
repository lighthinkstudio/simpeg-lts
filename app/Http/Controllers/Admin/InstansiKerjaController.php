<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use App\Models\InstansiKerja;
use App\Http\Requests\StoreInstansiKerjaRequest;
use App\Http\Requests\UpdateInstansiKerjaRequest;

class InstansiKerjaController extends Controller
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
     * @param  \App\Http\Requests\StoreInstansiKerjaRequest  $request
     * @return \Illuminate\Http\Response
     */
    public function store(StoreInstansiKerjaRequest $request)
    {
        //
    }

    /**
     * Display the specified resource.
     *
     * @param  \App\Models\InstansiKerja  $instansiKerja
     * @return \Illuminate\Http\Response
     */
    public function show(InstansiKerja $instansiKerja)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  \App\Models\InstansiKerja  $instansiKerja
     * @return \Illuminate\Http\Response
     */
    public function edit(InstansiKerja $instansiKerja)
    {
        //
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \App\Http\Requests\UpdateInstansiKerjaRequest  $request
     * @param  \App\Models\InstansiKerja  $instansiKerja
     * @return \Illuminate\Http\Response
     */
    public function update(UpdateInstansiKerjaRequest $request, InstansiKerja $instansiKerja)
    {
        //
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  \App\Models\InstansiKerja  $instansiKerja
     * @return \Illuminate\Http\Response
     */
    public function destroy(InstansiKerja $instansiKerja)
    {
        //
    }
}
