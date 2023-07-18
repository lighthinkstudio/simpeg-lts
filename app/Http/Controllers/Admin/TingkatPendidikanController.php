<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use App\Models\TingkatPendidikan;
use App\Http\Requests\StoreTingkatPendidikanRequest;
use App\Http\Requests\UpdateTingkatPendidikanRequest;
use App\Http\Requests\ImportTingkatPendidikanRequest;
use App\Imports\TingkatPendidikanImport;
use Maatwebsite\Excel\Facades\Excel;


class TingkatPendidikanController extends Controller
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
     * @param  \App\Http\Requests\StoreTingkatPendidikanRequest  $request
     * @return \Illuminate\Http\Response
     */
    public function store(StoreTingkatPendidikanRequest $request)
    {
        //
    }

    /**
     * Display the specified resource.
     *
     * @param  \App\Models\TingkatPendidikan  $tingkatPendidikan
     * @return \Illuminate\Http\Response
     */
    public function show(TingkatPendidikan $tingkatPendidikan)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  \App\Models\TingkatPendidikan  $tingkatPendidikan
     * @return \Illuminate\Http\Response
     */
    public function edit(TingkatPendidikan $tingkatPendidikan)
    {
        //
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \App\Http\Requests\UpdateTingkatPendidikanRequest  $request
     * @param  \App\Models\TingkatPendidikan  $tingkatPendidikan
     * @return \Illuminate\Http\Response
     */
    public function update(UpdateTingkatPendidikanRequest $request, TingkatPendidikan $tingkatPendidikan)
    {
        //
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  \App\Models\TingkatPendidikan  $tingkatPendidikan
     * @return \Illuminate\Http\Response
     */
    public function destroy(TingkatPendidikan $tingkatPendidikan)
    {
        //
    }

    /**
     * Import a newly created or updated resource in storage.
     *
     * @param  \App\Http\Requests\ImportTingkatPendidikanRequest  $request
     * @return \Illuminate\Http\Response
     */
    public function import(ImportTingkatPendidikanRequest $request)
    {
        // Validasi
        $validated = $request->validated();

        Excel::import(new TingkatPendidikanImport, $request->tingkat_pendidikan);

        return redirect()->route('admin.import')->with(['success' => 'Data tingkat pendidikan berhasil di import']);
    }
}
