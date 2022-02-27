<?php

namespace App\Http\Controllers;

use App\Models\DetailSoal;
use App\Models\Jadwal;
use App\Models\skorPilihanTKP;
use App\Models\soal;
use App\Models\TryOutDibeli;
use Illuminate\Http\Request;
use Illuminate\Support\Carbon;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\DB;

class jadwalTryOutController extends Controller
{
    public function __construct()
    {
        $this->middleware('auth');
    }

    public function jadwalTKP(){
        $tkp = Jadwal::where('jenis', 'TKP')->orWhere('jenis', 'tkp')->get();
        $jumlahSoal = DetailSoal::where('jenis_soal', 'tkp')->count();

        //data try out dibeli
        $cekData = TryOutDibeli::where('id_user', Auth::user()->id)->where('email_user', Auth::user()->email)->where('jenis', 'tkp')->count();
        $tryOutDibeli = TryOutDibeli::where('id_user', Auth::user()->id)->where('email_user', Auth::user()->email)->where('jenis', 'tkp')->first();
        if($cekData > 0){
            $idPaket = $tryOutDibeli->id_paket;
            $jenis = $tryOutDibeli->jenis;
            $ambiljadwal = Jadwal::where('id_paket', $idPaket)->where('jenis', $jenis)->get();
            $pembelian = TryOutDibeli::where('id_user', Auth::user()->id)->where('email_user', Auth::user()->email)->where('jenis', 'tkp')->get();

            //selisih hari
            $hariIni = strtotime(Carbon::now());
            $datajadwal = Jadwal::where('id_paket', $idPaket)->where('jenis', $jenis)->first();
            $tanggalTryOut = strtotime($datajadwal->tanggal);
            $selisih = ($hariIni - $tanggalTryOut)/ (60*60*24);
            $pembulatan = floor($selisih);

            return view('back_end.pages.jadwal-try-out.jadwal-tkp', compact('tkp', 'jumlahSoal', 'ambiljadwal', 'pembelian', 'pembulatan', 'cekData'));
        }
        return view('back_end.pages.jadwal-try-out.jadwal-tkp', compact('tkp', 'jumlahSoal', 'tryOutDibeli', 'cekData'));
    }
    
    public function jadwalTIU(){
        $tiu = Jadwal::where('jenis', 'TIU')->orWhere('jenis', 'tiu')->get();
        $jumlahSoal = DetailSoal::where('jenis_soal', 'tiu')->count();

        //data try out dibeli
        $cekData = TryOutDibeli::where('id_user', Auth::user()->id)->where('email_user', Auth::user()->email)->where('jenis', 'tiu')->count();
        $tryOutDibeli = TryOutDibeli::where('id_user', Auth::user()->id)->where('email_user', Auth::user()->email)->where('jenis', 'tiu')->first();
        if($cekData > 0){
            $idPaket = $tryOutDibeli->id_paket;
            $jenis = $tryOutDibeli->jenis;
            $ambiljadwal = Jadwal::where('id_paket', $idPaket)->where('jenis', $jenis)->get();
            $pembelian = TryOutDibeli::where('id_user', Auth::user()->id)->where('email_user', Auth::user()->email)->where('jenis', 'tiu')->get();

            //selisih hari
            $hariIni = strtotime(Carbon::now());
            $datajadwal = Jadwal::where('id_paket', $idPaket)->where('jenis', $jenis)->first();
            $tanggalTryOut = strtotime($datajadwal->tanggal);
            $selisih = ($hariIni - $tanggalTryOut)/ (60*60*24);
            $pembulatan = floor($selisih);

            return view('back_end.pages.jadwal-try-out.jadwal-tiu', compact('tiu', 'jumlahSoal', 'ambiljadwal', 'pembelian', 'pembulatan', 'cekData'));
        }
        return view('back_end.pages.jadwal-try-out.jadwal-tiu', compact('tiu', 'jumlahSoal', 'tryOutDibeli', 'cekData'));
    }
    
    public function jadwalTWK(){
        $twk = Jadwal::where('jenis', 'TWK')->orWhere('jenis', 'twk')->get();
        $jumlahSoal = DetailSoal::where('jenis_soal', 'twk')->count();

        //data try out dibeli
        $cekData = TryOutDibeli::where('id_user', Auth::user()->id)->where('email_user', Auth::user()->email)->where('jenis', 'twk')->count();
        $tryOutDibeli = TryOutDibeli::where('id_user', Auth::user()->id)->where('email_user', Auth::user()->email)->where('jenis', 'twk')->first();
        if($cekData > 0){
            $idPaket = $tryOutDibeli->id_paket;
            $jenis = $tryOutDibeli->jenis;
            $ambiljadwal = Jadwal::where('id_paket', $idPaket)->where('jenis', $jenis)->get();
            $pembelian = TryOutDibeli::where('id_user', Auth::user()->id)->where('email_user', Auth::user()->email)->where('jenis', 'twk')->get();
            
            //selisih hari
            $hariIni = strtotime(Carbon::now());
            $datajadwal = Jadwal::where('id_paket', $idPaket)->where('jenis', $jenis)->first();
            $tanggalTryOut = strtotime($datajadwal->tanggal);
            $selisih = ($hariIni - $tanggalTryOut)/ (60*60*24);
            $pembulatan = floor($selisih);

            return view('back_end.pages.jadwal-try-out.jadwal-twk', compact('twk', 'jumlahSoal', 'ambiljadwal', 'pembelian', 'pembulatan', 'cekData'));
        } 
        return view('back_end.pages.jadwal-try-out.jadwal-twk', compact('twk', 'jumlahSoal', 'tryOutDibeli', 'cekData'));
    }

    //TWK
    //==========================
    public function getPaketTWK($id){
        $soal = soal::where('id', $id)->where('jenis', 'twk')->get();
        return response()->json($soal, 200);
    }

    public function dataJadwalTWK($id, $id_paket){
        $jadwal = Jadwal::where('id', $id)->where('id_paket', $id_paket)->where('jenis', 'twk')->get();
        return response()->json($jadwal, 200);
    }

    //pembelian
    public function beliJadwalTWK(Request $request){
        $id_paket = $request->id_paket;
        $nama_paket_hidden = $request->nama_paket_hidden;
        $deskripsi_paket_hidden = $request->deskripsi_paket_hidden;
        $jumlah_soal = $request->jumlah_soal;
        $harga_paket = $request->harga_paket;

        $beli = new TryOutDibeli();
        $beli->id_paket = $id_paket;
        $beli->id_user = Auth::user()->id;
        $beli->email_user = Auth::user()->email;
        $beli->nama_user = Auth::user()->name;
        $beli->jenis = "twk";
        $beli->nama_paket = $nama_paket_hidden;
        $beli->deskripsi = $deskripsi_paket_hidden;
        $beli->jumlah_soal = $jumlah_soal;
        $beli->harga_paket = $harga_paket;
        $beli->konfirmasi = 'belum';
        $beli->save();

        notify()->success('Berhasil Membeli Paket Try Out', 'Success');
        return back();
    }

    public function cekDataTWK($id_paket){
        $cek = TryOutDibeli::where("id_paket", $id_paket)->where('id_user', Auth::user()->id)->get();
        return response()->json($cek, 200);
    }

    //TIU
    public function getPaketTIU($id){
        $soal = soal::where('id', $id)->where('jenis', 'tiu')->get();
        return response()->json($soal, 200);
    }

    public function dataJadwalTIU($id, $id_paket){
        $jadwal = Jadwal::where('id', $id)->where('id_paket', $id_paket)->where('jenis', 'tiu')->get();
        return response()->json($jadwal, 200);
    }

    public function cekDataTIU($id_paket){
        $cek = TryOutDibeli::where("id_paket", $id_paket)->where('id_user', Auth::user()->id)->get();
        return response()->json($cek, 200);
    }

    //pembelian
    public function beliJadwalTIU(Request $request){
        $id_paket = $request->id_paket;
        $nama_paket_hidden = $request->nama_paket_hidden;
        $deskripsi_paket_hidden = $request->deskripsi_paket_hidden;
        $jumlah_soal = $request->jumlah_soal;
        $harga_paket = $request->harga_paket;

        $beli = new TryOutDibeli();
        $beli->id_paket = $id_paket;
        $beli->id_user = Auth::user()->id;
        $beli->email_user = Auth::user()->email;
        $beli->nama_user = Auth::user()->name;
        $beli->jenis = "tiu";
        $beli->nama_paket = $nama_paket_hidden;
        $beli->deskripsi = $deskripsi_paket_hidden;
        $beli->jumlah_soal = $jumlah_soal;
        $beli->harga_paket = $harga_paket;
        $beli->konfirmasi = 'belum';
        $beli->save();

        notify()->success('Berhasil Membeli Paket Try Out', 'Success');
        return back();
    }
    
    //TKP
    public function getPaketTKP($id){
        $soal = soal::where('id', $id)->where('jenis', 'tkp')->get();
        return response()->json($soal, 200);
    }

    public function dataJadwalTKP($id, $id_paket){
        $jadwal = Jadwal::where('id', $id)->where('id_paket', $id_paket)->where('jenis', 'tkp')->get();
        return response()->json($jadwal, 200);
    }

    public function cekDataTKP($id_paket){
        $cek = TryOutDibeli::where("id_paket", $id_paket)->where('id_user', Auth::user()->id)->get();
        return response()->json($cek, 200);
    }

    //pembelian
    public function beliJadwalTKP(Request $request){
        $id_paket = $request->id_paket;
        $nama_paket_hidden = $request->nama_paket_hidden;
        $deskripsi_paket_hidden = $request->deskripsi_paket_hidden;
        $jumlah_soal = $request->jumlah_soal;
        $harga_paket = $request->harga_paket;

        $beli = new TryOutDibeli();
        $beli->id_paket = $id_paket;
        $beli->id_user = Auth::user()->id;
        $beli->email_user = Auth::user()->email;
        $beli->nama_user = Auth::user()->name;
        $beli->jenis = "tkp";
        $beli->nama_paket = $nama_paket_hidden;
        $beli->deskripsi = $deskripsi_paket_hidden;
        $beli->jumlah_soal = $jumlah_soal;
        $beli->harga_paket = $harga_paket;
        $beli->konfirmasi = 'belum';
        $beli->save();

        notify()->success('Berhasil Membeli Paket Try Out', 'Success');
        return back();
    }

    //kerjakan try out
    public function kerjakanTryOut($jenis, $id_paket){
        //waktu
        $data = soal::where('id', $id_paket)->where('jenis', $jenis)->first();
        $waktu = number_format($data->waktu);
        $jam =  floor($waktu / 60);
        $menit = str_pad(($waktu % 60), 2, "0", STR_PAD_LEFT);
        //soal
        $jumlahSoal = DetailSoal::where("id_paket", $id_paket)->where("jenis_soal", $jenis)->count();
        $detailSoal1 = DetailSoal::where("id_paket", $id_paket)->where("jenis_soal", $jenis)->get();
        $getIDSoal = DB::table('detail_soals')
                                ->join('skor_pilihan_tkps', 'skor_pilihan_tkps.id_paket', '=', 'detail_soals.id_paket')
                                ->select('skor_pilihan_tkps.id_soal')->distinct()->get('id_soal');
        // $skorTKP = skorPilihanTKP
        // $detailSoalNext = DetailSoal::where("id_paket", $id_paket)->where("jenis_soal", $jenis)->skip(1)->take($jumlahSoal)->get();
        
        return view('back_end.pages.pengerjaan-try-out.index', compact('jam', 'menit', 'detailSoal1', 'jumlahSoal', 'getIDSoal'));
    }

    public function getSoal($jenis, $id_paket){
        $jumlahSoal = DetailSoal::where("id_paket", $id_paket)->where("jenis_soal", $jenis)->count();
        $detailSoalNext = DetailSoal::where("id_paket", $id_paket)->where("jenis_soal", $jenis)->skip(1)->take($jumlahSoal)->get();
        return response()->json($detailSoalNext, 200);
    }
}
