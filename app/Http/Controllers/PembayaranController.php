<?php

namespace App\Http\Controllers;

use App\Models\Pembayaran;
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
}
