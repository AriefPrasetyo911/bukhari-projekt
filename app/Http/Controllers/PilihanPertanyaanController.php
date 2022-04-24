<?php

namespace App\Http\Controllers;

use App\Models\pilihan_pertanyaan;
use App\Http\Requests\Storepilihan_pertanyaanRequest;
use App\Http\Requests\Updatepilihan_pertanyaanRequest;

class PilihanPertanyaanController extends Controller
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
     * @param  \App\Http\Requests\Storepilihan_pertanyaanRequest  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Storepilihan_pertanyaanRequest $request)
    {
        //
    }

    /**
     * Display the specified resource.
     *
     * @param  \App\Models\pilihan_pertanyaan  $pilihan_pertanyaan
     * @return \Illuminate\Http\Response
     */
    public function show(pilihan_pertanyaan $pilihan_pertanyaan)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  \App\Models\pilihan_pertanyaan  $pilihan_pertanyaan
     * @return \Illuminate\Http\Response
     */
    public function edit(pilihan_pertanyaan $pilihan_pertanyaan)
    {
        //
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \App\Http\Requests\Updatepilihan_pertanyaanRequest  $request
     * @param  \App\Models\pilihan_pertanyaan  $pilihan_pertanyaan
     * @return \Illuminate\Http\Response
     */
    public function update(Updatepilihan_pertanyaanRequest $request, pilihan_pertanyaan $pilihan_pertanyaan)
    {
        //
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  \App\Models\pilihan_pertanyaan  $pilihan_pertanyaan
     * @return \Illuminate\Http\Response
     */
    public function destroy(pilihan_pertanyaan $pilihan_pertanyaan)
    {
        //
    }
}
