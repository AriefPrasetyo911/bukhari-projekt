<?php

namespace App\Http\Controllers;

use App\Models\Bank;
use App\Models\Profile;
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
        return view('back_end.pages.user-home');
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
        ->editColumn('jenis', function($soal){
            return strtoupper($soal->jenis);
        })
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

    public function profile(){
        $dataProfile = Profile::first();
        $databank = Bank::all();
        return view('back_end.pages.profile.profile', compact('dataProfile', 'databank'));
    }

    public function profileEdit($id){
        $dataProfile = Profile::find($id);
        return response()->json($dataProfile, 200);
    }

    public function profileUpdate(Request $request){
        $id = $request->id;
        $nama_cv = $request->nama_cv;
        $struktur_organisasi = $request->struktur_organisasi;
        $alamat_cv = $request->alamat_cv;

        $filename  = str_replace(' ', '_', Auth::user()->name).'_'.$struktur_organisasi->getClientOriginalName();

        $getOldData = Profile::where('id', $id)->first();
        //delete previous image
        $deleteImage = unlink(public_path('img/'.$getOldData->struktur_organisasi));
        if($deleteImage){
            //move file
            $struktur_organisasi->move(public_path('img/'), $filename);

            Profile::where('id', $id)->update([
                'nama_cv' => $nama_cv,
                'struktur_organisasi' => $filename,
                'alamat' => $alamat_cv
            ]);
        }
        notify()->success('Berhasil Mengubah Profile ⚡️', 'Berhasil');
        return back();
    }

    public function tambahBank(Request $request){
        $nama_bank = $request->nama_bank;
        $rek_bank = $request->rek_bank;
        $atas_nama = $request->atas_nama;

        $simpan = new Bank();
        $simpan->nama_bank = $nama_bank;
        $simpan->no_rekening = $rek_bank;
        $simpan->atas_nama = $atas_nama;
        $simpan->save();

        notify()->success('Berhasil Menambah Data Bank⚡️', 'Berhasil');
        return back();
    }
}
