<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use App\Models\JenisJabatan;
use App\Http\Requests\StoreJenisJabatanRequest;
use App\Http\Requests\UpdateJenisJabatanRequest;

class JenisJabatanController extends Controller
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
     * @param  \App\Http\Requests\StoreJenisJabatanRequest  $request
     * @return \Illuminate\Http\Response
     */
    public function store(StoreJenisJabatanRequest $request)
    {
        //
    }

    /**
     * Display the specified resource.
     *
     * @param  \App\Models\JenisJabatan  $jenisJabatan
     * @return \Illuminate\Http\Response
     */
    public function show(JenisJabatan $jenisJabatan)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  \App\Models\JenisJabatan  $jenisJabatan
     * @return \Illuminate\Http\Response
     */
    public function edit(JenisJabatan $jenisJabatan)
    {
        //
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \App\Http\Requests\UpdateJenisJabatanRequest  $request
     * @param  \App\Models\JenisJabatan  $jenisJabatan
     * @return \Illuminate\Http\Response
     */
    public function update(UpdateJenisJabatanRequest $request, JenisJabatan $jenisJabatan)
    {
        //
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  \App\Models\JenisJabatan  $jenisJabatan
     * @return \Illuminate\Http\Response
     */
    public function destroy(JenisJabatan $jenisJabatan)
    {
        //
    }
}
