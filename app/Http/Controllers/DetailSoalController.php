<?php

namespace App\Http\Controllers;

use App\Models\DetailSoal;
use App\Http\Requests\StoreDetailSoalRequest;
use App\Http\Requests\UpdateDetailSoalRequest;

class DetailSoalController extends Controller
{
    public function __construct()
    {
        $this->middleware('auth');
    }
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
     * @param  \App\Http\Requests\StoreDetailSoalRequest  $request
     * @return \Illuminate\Http\Response
     */
    public function store(StoreDetailSoalRequest $request)
    {
        //
    }

    /**
     * Display the specified resource.
     *
     * @param  \App\Models\DetailSoal  $detailSoal
     * @return \Illuminate\Http\Response
     */
    public function show(DetailSoal $detailSoal)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  \App\Models\DetailSoal  $detailSoal
     * @return \Illuminate\Http\Response
     */
    public function edit(DetailSoal $detailSoal)
    {
        //
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \App\Http\Requests\UpdateDetailSoalRequest  $request
     * @param  \App\Models\DetailSoal  $detailSoal
     * @return \Illuminate\Http\Response
     */
    public function update(UpdateDetailSoalRequest $request, DetailSoal $detailSoal)
    {
        //
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  \App\Models\DetailSoal  $detailSoal
     * @return \Illuminate\Http\Response
     */
    public function destroy(DetailSoal $detailSoal)
    {
        //
    }
}
