<?php

namespace App\Http\Controllers;

use App\Models\soal;
use App\Models\User;
use Illuminate\Http\Request;
use Yajra\DataTables\Facades\DataTables;

class HomeController extends Controller
{
    /**
     * Create a new controller instance.
     *
     * @return void
     */
    public function __construct()
    {
        $this->middleware('auth');
    }

    /**
     * Show the application dashboard.
     *
     */
    public function index()
    {
        return view('home');
    }

    public function adminIndex(){
        $admin = User::where('is_admin', 1)->count();
        $user = User::where('is_admin', 0)->count();
        $paketSoal = soal::count();
        return view('back_end.pages.admin', compact('admin', 'user', 'paketSoal'));
    }

    public function getSoalDashboard(){
        $soal = soal::get();
        return DataTables::of($soal)
        ->editColumn('waktu', function($soal){
            return '<center>' . $soal->waktu . ' menit</center>';
        })
        ->editColumn('kkm', function ($soal) {
            return "<center>" . $soal->kkm . "</center>";
        })
        ->addColumn('action', function ($soal) {
            return '<div style="text-align:center"><a href="administrator/soal/ubah/' . $soal->id . '" class="btn btn-outline-success btn-sm">Ubah</a> <a href="administrator/soal/detail/' . $soal->id . '" class="btn btn-outline-primary btn-sm">Detail</a></div>';
          })
        ->rawColumns(['waktu', 'jenis' ,'action', 'kkm'])->make(true);
    }
}
