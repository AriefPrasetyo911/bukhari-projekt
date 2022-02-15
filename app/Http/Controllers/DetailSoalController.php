<?php

namespace App\Http\Controllers;

use App\Models\DetailSoal;
use App\Http\Requests\StoreDetailSoalRequest;
use App\Http\Requests\UpdateDetailSoalRequest;
use App\Models\Pembahasan;
use App\Models\skorPilihanTKP;
use App\Models\soal;
use App\Models\User;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\DB;

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
    public function detail($jenis_soal, $soal_id)
    {
        $user = User::where('id', Auth::user()->id)->first();
        $soal = soal::where('id', $soal_id)->where('jenis', $jenis_soal)->first();
        $detail = Detailsoal::where('id_paket', $soal_id)->where('jenis_soal', $jenis_soal)->get();
        $namaUser = User::where('id', Auth::user()->id)->first();
        return view('back_end.pages.detail-soal.detail', compact('user', 'soal', 'detail', 'namaUser'));
    }

    public function tambahSoal(Request $request){
        $id_paket = $request->id_paket;
        $jenis_soal = $request->jenis_soal;
        $soal = $request->soal;
        $pilihan_a = $request->pilihan_a;
        $pilihan_b = $request->pilihan_b;
        $pilihan_c = $request->pilihan_c;
        $pilihan_d = $request->pilihan_d;
        $pilihan_e = $request->pilihan_e;
        $kunci_jawaban = $request->inlineRadioOptions;
        $skor = $request->skor;
        $id_pembuat = Auth::user()->id;
        $nama_pembuat = Auth::user()->name;
        
        //simpan ke dalam database
        $simpan = new DetailSoal();
        $simpan->id_paket = $id_paket;
        if($jenis_soal == 'twk'){
            $simpan->jenis_soal = 'twk';
        } else if($jenis_soal == 'tiu'){
            $simpan->jenis_soal = 'tiu';
        } else {
            $simpan->jenis_soal = 'tkp';
        }
        $simpan->soal = $soal;
        $simpan->pilihan_a = $pilihan_a;
        $simpan->pilihan_b = $pilihan_b;
        $simpan->pilihan_c = $pilihan_c;
        $simpan->pilihan_d = $pilihan_d;
        $simpan->pilihan_e = $pilihan_e;
        $simpan->kunci_jawaban = $kunci_jawaban;
        $simpan->score_soal = $skor;
        $simpan->pembuat_soal_id = $id_pembuat;
        $simpan->pembuat_soal_username = $nama_pembuat;
        $simpan->save();

        if($jenis_soal == 'twk'){
            notify()->success('Berhasil menambah Soal TWK ⚡️', 'Success');
        } else if($jenis_soal == 'tiu'){
            notify()->success('Berhasil menambah Soal TIU ⚡️', 'Success');
        } else {
            notify()->success('Berhasil menambah Soal TKP ⚡️', 'Success');
        }
        return back();
    }

    // public function getSoalID($soal_id, $jenis_soal){
    //     $detail2 = Detailsoal::where('id_paket', $soal_id)->where('jenis_soal', $jenis_soal)->first();
    //     $idSoal = $detail2->id;
    // }

    public function tambahSoalTKP(Request $request){
        // $id_soal = $request->id_soal;
        $id_paket = $request->id_paket;
        $jenis_soal = $request->jenis_soal;
        $id_pembuat = Auth::user()->id;
        $nama_pembuat = Auth::user()->name;
        $soal = $request->soal;
        $pilihan_a = $request->pilihan_a;
        $skor_a    = $request->skor_a;
        $pilihan_b = $request->pilihan_b;
        $skor_b    = $request->skor_b;
        $pilihan_c = $request->pilihan_c;
        $skor_c    = $request->skor_c;
        $pilihan_d = $request->pilihan_d;
        $skor_d    = $request->skor_d;
        $pilihan_e = $request->pilihan_e;
        $skor_e    = $request->skor_e;
        $kunci_jawaban = $request->inlineRadioOptions;

        //simpan ke dalam database
        $simpan = new DetailSoal();
        $simpan->id_paket = $id_paket;
        $simpan->jenis_soal = $jenis_soal;
        $simpan->soal = $soal;
        $simpan->pilihan_a = $pilihan_a;
        $simpan->pilihan_b = $pilihan_b;
        $simpan->pilihan_c = $pilihan_c;
        $simpan->pilihan_d = $pilihan_d;
        $simpan->pilihan_e = $pilihan_e;
        $simpan->kunci_jawaban = $kunci_jawaban;
        $simpan->pembuat_soal_id = $id_pembuat;
        $simpan->pembuat_soal_username = $nama_pembuat;
        $simpan->save();

        //simpan detail soal dahulu
        if($simpan){
            $last = DB::table('detail_soals')->latest()->first();

            $skorTKP = new skorPilihanTKP();
            $skorTKP->id_soal = $last->id;
            $skorTKP->id_paket = $id_paket;
            $skorTKP->skor_pilihan_a = $skor_a;
            $skorTKP->skor_pilihan_b = $skor_b;
            $skorTKP->skor_pilihan_c = $skor_c;
            $skorTKP->skor_pilihan_d = $skor_d;
            $skorTKP->skor_pilihan_e = $skor_e;
            $skorTKP->save();
        }

        notify()->success('Berhasil menambah Soal TKP ⚡️', 'Success');
        return back();
    }

    public function ubahSoal(Request $request){
        $edit_id = $request->edit_id;
        $jenis_soal = $request->jenis_soal;
        $soal = $request->soal_edit;
        $pilihan_a = $request->pilihan_a_edit;
        $pilihan_b = $request->pilihan_b_edit;
        $pilihan_c = $request->pilihan_c_edit;
        $pilihan_d = $request->pilihan_d_edit;
        $pilihan_e = $request->pilihan_e_edit;
        $kunci_jawaban = $request->inlineRadioOptions_edit;
        $skor = $request->skor_edit;

        DetailSoal::where('id', $edit_id)->update([
            'soal' => $soal,
            'pilihan_a' => $pilihan_a,
            'pilihan_b' => $pilihan_b,
            'pilihan_c' => $pilihan_c,
            'pilihan_d' => $pilihan_d,
            'pilihan_e' => $pilihan_e,
            'kunci_jawaban' => $kunci_jawaban,
            'score_soal' => $skor
        ]);

        if($jenis_soal == 'twk'){
            notify()->success('Berhasil menambah Soal TWK ⚡️', 'Success');
        } else if($jenis_soal == 'tiu'){
            notify()->success('Berhasil menambah Soal TIU ⚡️', 'Success');
        } else {
            notify()->success('Berhasil menambah Soal TKP ⚡️', 'Success');
        }
        return back();
    }

    public function hapusSoal($id){
        DetailSoal::find($id)->delete();

        notify()->success('Berhasil menghapus Soal ⚡️', 'Berhasil');
        return back();
    }  

    public function getPembahasan($id){
        $getSoal = DetailSoal::find($id);
        return response()->json($getSoal, 200);
    }

    public function tambahPembahasan(Request $request){
        $soal_id = $request->soal_id;
        $jenis_soal = $request->jenis_soal;
        $pembahasan_soal = $request->pembahasan_soal;
        $paket_id = $request->paket_id;

        $simpanPembahasan = new Pembahasan();
        $simpanPembahasan->id_soal = $soal_id;
        $simpanPembahasan->id_paket = $paket_id;
        $simpanPembahasan->jenis_soal = $jenis_soal;
        $simpanPembahasan->pembahasan = $pembahasan_soal;
        $simpanPembahasan->save();

        notify()->success('Berhasil Menambah Pembahasan ⚡️', 'Berhasil');
        return back();
    }

    public function hapusPembahasan1($detail_id){
        DetailSoal::where('id_paket', $detail_id)->delete();
        return back()->response()->json(['success' => 'product deleted Successfully']);
    }

    public function hapusPembahasan($pembahasan_id){
        Pembahasan::where('id_paket', $pembahasan_id)->delete();
        return back()->response()->json(['success' => 'product deleted Successfully']);
    }

    public function cekDetaiSoal($id_paket){
        $data = DetailSoal::where('id_paket', $id_paket)->count();
        return response()->json($data, 200);
    }

    public function cekPembahasan($pembahasan_id){
        $data = Pembahasan::where('id_paket', $pembahasan_id)->count();
        return response()->json($data, 200);
    }

    public function getDataTKP($id_paket){
        $getData = DetailSoal::where('id_paket', $id_paket)->get();
        return response()->json($getData, 200);
    }

    public function getDataSkorTKP($id_soal, $id_paket){
        $getSkor = skorPilihanTKP::where('id_soal', $id_soal)->where('id_paket', $id_paket)->get();
        return response()->json($getSkor, 200);
    }

    public function ubahSoalTKP(Request $request){
        $soal_tkpedit = $request->soal_tkpedit;
        $pilihan_a_tkpedit = $request->pilihan_a_tkpedit;
        $skor_a_tkpedit = $request->skor_a_tkpedit;
        $pilihan_b_tkpedit = $request->pilihan_b_tkpedit;
        $skor_b_tkpedit = $request->skor_b_tkpedit;
        $pilihan_c_tkpedit = $request->pilihan_c_tkpedit;
        $skor_c_tkpedit = $request->skor_c_tkpedit;
        $pilihan_d_tkpedit = $request->pilihan_d_tkpedit;
        $skor_d_tkpedit = $request->skor_d_tkpedit;
        $pilihan_e_tkpedit = $request->pilihan_e_tkpedit;
        $skor_e_tkpedit = $request->skor_e_tkpedit;
        $inlineRadioOptions_tkpedit = $request->inlineRadioOptions_tkpedit;
        $id_paket = $request->id_paket;
        $id_soal = $request->id_soal;

        $updateDetailSoal = DetailSoal::where('id', $id_soal)->where('id_paket', $id_paket)->update([
            'soal' => $soal_tkpedit,
            'pilihan_a' => $pilihan_a_tkpedit,
            'pilihan_b' => $pilihan_b_tkpedit,
            'pilihan_c' => $pilihan_c_tkpedit,
            'pilihan_d' => $pilihan_d_tkpedit,
            'pilihan_e' => $pilihan_e_tkpedit,
            'kunci_jawaban' => $inlineRadioOptions_tkpedit
        ]);

        if($updateDetailSoal){
            skorPilihanTKP::where('id_soal', $id_soal)->where('id_paket', $id_paket)->update([
                'skor_pilihan_a' => $skor_a_tkpedit,
                'skor_pilihan_b' => $skor_b_tkpedit,
                'skor_pilihan_c' => $skor_c_tkpedit,
                'skor_pilihan_d' => $skor_d_tkpedit,
                'skor_pilihan_e' => $skor_e_tkpedit
            ]);
        }

        notify()->success('Berhasil Mengubah Soal TKP ⚡️', 'Success');
        return back();
    }
}
