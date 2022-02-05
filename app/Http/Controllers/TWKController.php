<?php

namespace App\Http\Controllers;
use App\Models\DetailSoal;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;

class TWKController extends Controller
{
    public function __construct()
    {
        $this->middleware('auth');
    }

    public function ambilData($id){
        $ambilData = DetailSoal::where('id', $id)->get();
        return response()->json($ambilData);
    }

    public function detailPilihanGanda($id){
        $detailData = DetailSoal::where('id', $id)->get();
        return response()->json($detailData);
    }  
}
