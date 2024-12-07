<?php

namespace App\Http\Controllers;

use App\Models\komponen_anggaran;
use App\Http\Controllers\Controller;
use App\Http\Requests\Storekomponen_anggaranRequest;
use App\Http\Requests\Updatekomponen_anggaranRequest;

class KomponenAnggaranController extends Controller
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
     * @param  \App\Http\Requests\Storekomponen_anggaranRequest  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Storekomponen_anggaranRequest $request)
    {
        //
    }

    /**
     * Display the specified resource.
     *
     * @param  \App\Models\komponen_anggaran  $komponen_anggaran
     * @return \Illuminate\Http\Response
     */
    public function show(komponen_anggaran $komponen_anggaran)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  \App\Models\komponen_anggaran  $komponen_anggaran
     * @return \Illuminate\Http\Response
     */
    public function edit(komponen_anggaran $komponen_anggaran)
    {
        //
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \App\Http\Requests\Updatekomponen_anggaranRequest  $request
     * @param  \App\Models\komponen_anggaran  $komponen_anggaran
     * @return \Illuminate\Http\Response
     */
    public function update(Updatekomponen_anggaranRequest $request, komponen_anggaran $komponen_anggaran)
    {
        //
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  \App\Models\komponen_anggaran  $komponen_anggaran
     * @return \Illuminate\Http\Response
     */
    public function destroy(komponen_anggaran $komponen_anggaran)
    {
        //
    }
}
