<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use App\Models\JenisKawin;
use App\Http\Requests\StoreJenisKawinRequest;
use App\Http\Requests\UpdateJenisKawinRequest;

class JenisKawinController extends Controller
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
     * @param  \App\Http\Requests\StoreJenisKawinRequest  $request
     * @return \Illuminate\Http\Response
     */
    public function store(StoreJenisKawinRequest $request)
    {
        //
    }

    /**
     * Display the specified resource.
     *
     * @param  \App\Models\JenisKawin  $jenisKawin
     * @return \Illuminate\Http\Response
     */
    public function show(JenisKawin $jenisKawin)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  \App\Models\JenisKawin  $jenisKawin
     * @return \Illuminate\Http\Response
     */
    public function edit(JenisKawin $jenisKawin)
    {
        //
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \App\Http\Requests\UpdateJenisKawinRequest  $request
     * @param  \App\Models\JenisKawin  $jenisKawin
     * @return \Illuminate\Http\Response
     */
    public function update(UpdateJenisKawinRequest $request, JenisKawin $jenisKawin)
    {
        //
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  \App\Models\JenisKawin  $jenisKawin
     * @return \Illuminate\Http\Response
     */
    public function destroy(JenisKawin $jenisKawin)
    {
        //
    }
}
