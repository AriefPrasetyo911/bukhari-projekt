<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

class PembahasanController extends Controller
{
    public function __construct()
    {
        $this->middleware('auth');
    }

    public function pembahasanTWK(){
        return view('back_end.pages.pembahasan.pembahasan_twk');
    }
}
