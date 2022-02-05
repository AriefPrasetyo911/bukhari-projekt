<?php

namespace App\Http\Controllers;

use App\Models\soal;
use App\Models\User;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
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
            return  $soal->waktu . ' Menit';
        })->rawColumns(['waktu', 'jenis' , 'kkm'])->make(true);
    }

    public function logout(Request $request)
    {
        Auth::logout();
        $request->session()->invalidate();
        $request->session()->regenerateToken();
        return redirect('/');
    }
}
