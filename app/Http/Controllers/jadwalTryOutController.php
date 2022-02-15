<?php

namespace App\Http\Controllers;

use App\Models\DetailSoal;
use App\Models\Jadwal;
use App\Models\soal;
use Illuminate\Http\Request;
use Illuminate\Support\Carbon;

class jadwalTryOutController extends Controller
{
    public function __construct()
    {
        $this->middleware('auth');
    }

    public function jadwalTKP(){
        $tkp = Jadwal::where('jenis', 'TKP')->orWhere('jenis', 'tkp')->get();
        return view('back_end.pages.jadwal-try-out.jadwal-tkp', compact('tkp'));
    }
    
    public function jadwalTIU(){
        $tiu = Jadwal::where('jenis', 'TIU')->orWhere('jenis', 'tiu')->get();
        return view('back_end.pages.jadwal-try-out.jadwal-tiu', compact('tiu'));
    }

    public function jadwalTWK(){
        // $twk = Jadwal::where('jenis', 'TWK')->orWhere('jenis', 'twk')->get();
        // $jumlahSoal = DetailSoal::where('jenis_soal', 'twk')->count();
        // return view('back_end.pages.jadwal-try-out.jadwal-twk', compact('twk', 'jumlahSoal'));
        return  Jadwal::join('jadwals');
    }

    public function getPaketTWK(){
        $soal = soal::where('jenis', 'twk')->get();
        return response()->json($soal, 200);
    }

    public function getPaketTKP(){
        $soal = soal::where('jenis', 'tkp')->get();
        return response()->json($soal, 200);
    }

    public function getPaketTIU(){
        $soal = soal::where('jenis', 'tiu')->get();
        return response()->json($soal, 200);
    }
}
