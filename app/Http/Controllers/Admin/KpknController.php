<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use App\Models\Kpkn;
use App\Http\Requests\StoreKpknRequest;
use App\Http\Requests\UpdateKpknRequest;

class KpknController extends Controller
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
     * @param  \App\Http\Requests\StoreKpknRequest  $request
     * @return \Illuminate\Http\Response
     */
    public function store(StoreKpknRequest $request)
    {
        //
    }

    /**
     * Display the specified resource.
     *
     * @param  \App\Models\Kpkn  $kpkn
     * @return \Illuminate\Http\Response
     */
    public function show(Kpkn $kpkn)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  \App\Models\Kpkn  $kpkn
     * @return \Illuminate\Http\Response
     */
    public function edit(Kpkn $kpkn)
    {
        //
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \App\Http\Requests\UpdateKpknRequest  $request
     * @param  \App\Models\Kpkn  $kpkn
     * @return \Illuminate\Http\Response
     */
    public function update(UpdateKpknRequest $request, Kpkn $kpkn)
    {
        //
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  \App\Models\Kpkn  $kpkn
     * @return \Illuminate\Http\Response
     */
    public function destroy(Kpkn $kpkn)
    {
        //
    }
}
