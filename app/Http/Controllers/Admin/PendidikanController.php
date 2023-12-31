<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use App\Models\Pendidikan;
use App\Http\Requests\StorePendidikanRequest;
use App\Http\Requests\UpdatePendidikanRequest;
use App\Http\Requests\ImportPendidikanRequest;
use App\Imports\PendidikanImport;
use Maatwebsite\Excel\Facades\Excel;

class PendidikanController extends Controller
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
     * @param  \App\Http\Requests\StorePendidikanRequest  $request
     * @return \Illuminate\Http\Response
     */
    public function store(StorePendidikanRequest $request)
    {
        //
    }

    /**
     * Display the specified resource.
     *
     * @param  \App\Models\Pendidikan  $pendidikan
     * @return \Illuminate\Http\Response
     */
    public function show(Pendidikan $pendidikan)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  \App\Models\Pendidikan  $pendidikan
     * @return \Illuminate\Http\Response
     */
    public function edit(Pendidikan $pendidikan)
    {
        //
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \App\Http\Requests\UpdatePendidikanRequest  $request
     * @param  \App\Models\Pendidikan  $pendidikan
     * @return \Illuminate\Http\Response
     */
    public function update(UpdatePendidikanRequest $request, Pendidikan $pendidikan)
    {
        //
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  \App\Models\Pendidikan  $pendidikan
     * @return \Illuminate\Http\Response
     */
    public function destroy(Pendidikan $pendidikan)
    {
        //
    }

    /**
     * Import a newly created or updated resource in storage.
     *
     * @param  \App\Http\Requests\ImportPendidikanRequest  $request
     * @return \Illuminate\Http\Response
     */
    public function import(ImportPendidikanRequest $request)
    {
        // Validasi
        $validated = $request->validated();

        Excel::import(new PendidikanImport, $request->pendidikan);

        return redirect()->route('admin.import')->with(['success' => 'Data pendidikan berhasil di import']);
    }
}
