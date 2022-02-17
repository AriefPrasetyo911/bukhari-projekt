<?php

namespace App\Http\Controllers;

use App\Models\Pembayaran;
use App\Models\saldoUser;
use App\Models\topUp;
use Illuminate\Http\Request;
use Yajra\DataTables\Facades\DataTables;

class PembayaranController extends Controller
{
    public function __construct()
    {
        $this->middleware('auth');
    }

    public function pembayaran(){
        $dataPaket = Pembayaran::orderBy('created_at', 'asc')->where('konfirmasi', 'sudah')->get();
        $dataPaket_twk = Pembayaran::orderBy('created_at', 'asc')->where('jenis', 'twk')->where('konfirmasi', 'sudah')->get();
        $dataPaket_tiu = Pembayaran::orderBy('created_at', 'asc')->where('jenis', 'tiu')->where('konfirmasi', 'sudah')->get();
        $dataPaket_tkp = Pembayaran::orderBy('created_at', 'asc')->where('jenis', 'tkp')->where('konfirmasi', 'sudah')->get();
        return view('back_end.pages.pembayaran.pembayaran-try-out', compact('dataPaket', 'dataPaket_twk', 'dataPaket_tiu', 'dataPaket_tkp'));
    }

    public function konfirmasi(){
        $dataPaket = Pembayaran::orderBy('created_at', 'desc')->where('konfirmasi', 'belum')->get();
        return view('back_end.pages.pembayaran.konfirmasi-pembayaran', compact('dataPaket'));
    }

    public function kirimKonfirmasi($id, $userID, $email){
        $update = Pembayaran::where('id', $id)->where('id_user', $userID)->where('email_user', $email)->update([
            'konfirmasi' => 'sudah'
        ]);

        if($update){
            notify()->success('Berhasil Mengkonfirmasi Pembayaran ⚡️', 'Berhasil');
            return back();
        }
        notify()->error('Gagal Mengkonfirmasi Pembayaran', 'Gagal');
        return back();
    }

    public function keuanganTopUpPage(){
        return view('back_end.pages.keuangan.top-up');
    }

    public function keuanganTopUp(){
        $topUp = topUp::orderBy('created_at', 'asc')->where('status', 'pending')->get();

        return DataTables::of($topUp)
        ->editColumn('nominal', function($topUp){
            return 'Rp. '.$topUp->nominal;
        })
        ->editColumn('status', function($topUp){
            if($topUp->status == 'terkonfirmasi'){
                return '<span class="badge badge-success">'.ucwords($topUp->status).'</span>';
            } else {
                return '<span class="badge badge-danger">'.ucwords($topUp->status).'</span>';
            }
        })
        ->addColumn('action', function ($topUp) {
            return 
            '<div style="text-align:center">
                <button type="button" id="detailTopUpBtn" class="btn btn-outline-success btn-sm" data-toggle="modal" data-target="#buktiTopUp" data-id="'.$topUp->id.'">Detail</button>
            </div>';
          })
        ->rawColumns(['status' ,'action'])->make(true);
    }

    public function keuanganTopUpJSON($id){
        $data = topUp::find($id);
        return response()->json($data, 200);
    }

    public function keuanganKonfirmasi(Request $request){
        $nominal = $request->nominalTransferHidden;
        $id_tf = $request->id_tf;

        topUp::where('id', $id_tf)->update([
            'status' => 'terkonfirmasi'
        ]);

        //get data
        $data = topUp::where('id', $id_tf)->first();
        $userID = $data->user_id;
        $user_email = $data->user_email;

        $saldo = saldoUser::where("user_id", $userID)->count();

        if($saldo != 0){
            $saldo = saldoUser::where("user_id", $userID)->first();
            $saldoSekarang = $saldo->saldo;
            //update saldo
            saldoUser::where('user_id', $userID)->update([
                "saldo" => $saldoSekarang+$nominal
            ]); 
        } else {
            $tambah = new saldoUser();
            $tambah->user_id = $userID;
            $tambah->user_email = $user_email;
            $tambah->saldo = $nominal;
            $tambah->save();
        }
        
        notify()->success('Berhasil Mengkonfirmasi Top Up ⚡️', 'Berhasil');
        return redirect()->route('keuangan');
    }

    public function keuanganTopUpLog(){
        return view('back_end.pages.keuangan.top-up-log');
    }

    public function keuanganTopUpLogData(){
        $topUp = topUp::orderBy('created_at', 'asc')->get();

        return DataTables::of($topUp)
        ->editColumn('nominal', function($topUp){
            return 'Rp. '.$topUp->nominal;
        })
        ->editColumn('status', function($topUp){
            if($topUp->status == 'terkonfirmasi'){
                return '<span class="badge badge-success">'.ucwords($topUp->status).'</span>';
            } else {
                return '<span class="badge badge-danger">'.ucwords($topUp->status).'</span>';
            }
        })
        ->rawColumns(['status'])->make(true);
    }

    public function saldoUser(){
        return view('back_end.pages.keuangan.saldo-user');
    }

    public function saldoUserData(){
        $dataSaldo = saldoUser::orderBy('created_at', 'asc')->get();

        return DataTables::of($dataSaldo)
        ->editColumn('saldo', function($dataSaldo){
            return 'Rp. '.$dataSaldo->saldo;
        })
        ->editColumn('updated_at', function($dataSaldo){
            return  $dataSaldo->updated_at->diffForHumans() ;
        })
        ->rawColumns(['saldo' ,'updated_at'])->make(true);
    }
}
