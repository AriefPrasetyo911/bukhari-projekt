<?php

namespace App\Http\Controllers;

use App\Models\TryOut;
use App\Http\Requests\StoreTryOutRequest;
use App\Http\Requests\UpdateTryOutRequest;
use App\Models\soal;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;
use Yajra\DataTables\Facades\DataTables;

class TryOutController extends Controller
{
    public function __construct()
    {
        $this->middleware('auth');
    }
    
    public function TryOutTWK(){
        return view('back_end.pages.try-out.twk');
    }

    public function getSoalTWK(){
        $soalTWK = soal::where('jenis', 'twk')->orderBy('created_at', 'asc')->get();

        return DataTables::of($soalTWK)
        ->editColumn('waktu', function($soalTWK){
            return '<center>' . $soalTWK->waktu . ' menit</center>';
        })
        ->editColumn('kkm', function ($soalTWK) {
            return "<center>" . $soalTWK->kkm . "</center>";
        })
        ->addColumn('action', function ($soalTWK) {
            return 
            '<div style="text-align:center">
                <button type="button" id="editTWK" class="btn btn-outline-success btn-sm" data-target="modal" data-id="'.$soalTWK->id.'">Ubah</button>
                <a href="administrator/soal/detail/' . $soalTWK->id . '" class="btn btn-outline-primary btn-sm">Detail</a>
                <a href="javascript:void(0)" data-toggle="tooltip" data-id="'.$soalTWK->id.'" data-original-title="Delete" class="btn btn-sm btn-outline-danger delete-TWK-btn">Hapus</a>
            </div>';
          })
        ->rawColumns(['waktu', 'jenis' ,'action', 'kkm'])->make(true);
    }

    public function tambahSoalTWK(soal $soal, Request $request){
        $namaPaket = $request->nama_paket;
        $deskripsiPaket = $request->deskripsiPaket;
        $kkm = $request->kkm;
        $waktu = $request->waktu;
        $tampil = $request->tampil;

        $simpan = new soal();
        $simpan->nama_paket = $namaPaket;
        $simpan->deskripsi = $deskripsiPaket;
        $simpan->jenis = 'twk';
        $simpan->kkm = $kkm;
        $simpan->waktu = $waktu;
        $simpan->tampil = $tampil;
        $simpan->save();

        notify()->success('Berhasil menambah Soal TWK ⚡️', 'Success');
        return back();
    }

    public function editSoalTWK($id){
        $dataTWK = soal::find($id);
        return response()->json($dataTWK, 200);
    }

    public function updateSoalTWK(Request $request){
        $namaPaket = $request->nama_paket_edit;
        $deskripsiPaket = $request->deskripsiPaket_edit;
        $kkm = $request->kkm_edit;
        $waktu = $request->waktu_edit;
        $tampil = $request->tampil_edit;
        $id = $request->twk_id;

        $update = soal::where('id', $id)->where('jenis', 'twk')->update([
            'nama_paket' => $namaPaket,
            'deskripsi' => $deskripsiPaket,
            'jenis' => 'twk',
            'kkm' => $kkm,
            'waktu' => $waktu,
            'tampil' => $tampil
        ]);

        if($update){
            notify()->success('Berhasil mengubah Soal TWK ⚡️', 'Berhasil');
            return back();
        }
        notify()->error('Gagal mengubah Soal TWK', 'Gagal');
        return back();
    }

    public function hapusSoalTWK($id){
        $findData = soal::find($id);
        $findData->delete();

        notify()->success('Berhasil menghapus Soal TWK ⚡️', 'Berhasil');
        return response()->json(['success' => 'product deleted Successfully']);
    }

    public function TryOutTIU(){
        return view('back_end.pages.try-out.tiu');
    }

    public function TryOutTKP(){
        return view('back_end.pages.try-out.tkp');
    }

    public function TrySetJadwal(){
        return view('back_end.pages.try-out.set-jadwal');
    }
}
