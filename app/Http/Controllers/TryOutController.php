<?php

namespace App\Http\Controllers;

use App\Models\TryOut;
use App\Http\Requests\StoreTryOutRequest;
use App\Http\Requests\UpdateTryOutRequest;
use App\Models\Jadwal;
use App\Models\soal;
use Carbon\Carbon;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\DB;
use Yajra\DataTables\Facades\DataTables;

class TryOutController extends Controller
{
    public function __construct()
    {
        $this->middleware('auth');
    }

    public function TryOutTIU(){
        return view('back_end.pages.try-out.tiu');
    }

    public function TryOutTKP(){
        return view('back_end.pages.try-out.tkp');
    }
    
    public function TryOutTWK(){
        return view('back_end.pages.try-out.twk');
    }

    public function TrySetJadwal(){
        $paket = soal::where('jenis', 'twk')->get();
        return view('back_end.pages.try-out.jadwal', compact('paket'));
    }

    public function getSoalTWK(){
        $soalTWK = soal::where('jenis', 'twk')->orderBy('created_at', 'asc')->get();

        return DataTables::of($soalTWK)
        ->editColumn('waktu', function($soalTWK){
            return $soalTWK->waktu;
        })
        ->editColumn('kkm', function ($soalTWK) {
            return $soalTWK->kkm;
        })
        ->addColumn('action', function ($soalTWK) {
            return 
            '<div style="text-align:center">
                <button type="button" id="editTWK" class="btn btn-outline-success btn-sm" data-target="modal" data-id="'.$soalTWK->id.'">Ubah</button>
                <a href="/administrator/soal/detail/twk/' . $soalTWK->id . '" class="btn btn-outline-primary btn-sm">Detail</a>
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
        $simpan->id_user = Auth::user()->id;
        $simpan->nama_paket = $namaPaket;
        $simpan->deskripsi = $deskripsiPaket;
        $simpan->jenis = 'TWK';
        $simpan->kkm = $kkm;
        $simpan->waktu = $waktu;
        $simpan->tampil = $tampil;
        $simpan->save();

        notify()->success('Berhasil menambah Paket TWK ⚡️', 'Success');
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
            'id_user' => Auth::user()->id,
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

    //TIU
    public function getSoalTIU(){
        $soalTIU = soal::where('jenis', 'tiu')->orderBy('created_at', 'asc')->get();

        return DataTables::of($soalTIU)
        ->editColumn('waktu', function($soalTIU){
            return '<center>' . $soalTIU->waktu . ' menit</center>';
        })
        ->editColumn('kkm', function ($soalTIU) {
            return "<center>" . $soalTIU->kkm . "</center>";
        })
        ->addColumn('action', function ($soalTIU) {
            return 
            '<div style="text-align:center">
                <button type="button" id="editTIU" class="btn btn-outline-success btn-sm" data-target="modal" data-id="'.$soalTIU->id.'">Ubah</button>
                <a href="/administrator/soal/detail/tiu/' . $soalTIU->id . '" class="btn btn-outline-primary btn-sm">Detail</a>
                <a href="javascript:void(0)" data-toggle="tooltip" data-id="'.$soalTIU->id.'" data-original-title="Delete" class="btn btn-sm btn-outline-danger delete-TIU-btn">Hapus</a>
            </div>';
          })
        ->rawColumns(['waktu', 'jenis' ,'action', 'kkm'])->make(true);
    }

    public function tambahSoalTIU(Request $request){
        $namaPaket = $request->nama_paket;
        $deskripsiPaket = $request->deskripsiPaket;
        $kkm = $request->kkm;
        $waktu = $request->waktu;
        $tampil = $request->tampil;

        $simpan = new soal();
        $simpan->id_user = Auth::user()->id;
        $simpan->nama_paket = $namaPaket;
        $simpan->deskripsi = $deskripsiPaket;
        $simpan->jenis = 'TIU';
        $simpan->kkm = $kkm;
        $simpan->waktu = $waktu;
        $simpan->tampil = $tampil;
        $simpan->save();

        notify()->success('Berhasil menambah Paket TIU ⚡️', 'Success');
        return back();
    }

    public function editSoalTIU($id){
        $dataTWK = soal::find($id);
        return response()->json($dataTWK, 200);
    }

    public function updateSoalTIU(Request $request){
        $namaPaket = $request->nama_paket_edit;
        $deskripsiPaket = $request->deskripsiPaket_edit;
        $kkm = $request->kkm_edit;
        $waktu = $request->waktu_edit;
        $tampil = $request->tampil_edit;
        $id = $request->tiu_id;

        $update = soal::where('id', $id)->where('jenis', 'tiu')->update([
            'id_user' => Auth::user()->id,
            'nama_paket' => $namaPaket,
            'deskripsi' => $deskripsiPaket,
            'jenis' => 'TIU',
            'kkm' => $kkm,
            'waktu' => $waktu,
            'tampil' => $tampil
        ]);

        if($update){
            notify()->success('Berhasil mengubah Soal TIU ⚡️', 'Berhasil');
            return back();
        }
        notify()->error('Gagal mengubah Soal TIU', 'Gagal');
        return back();
    }

    public function hapusSoalTIU($id){
        $findData = soal::find($id);
        $findData->delete();

        notify()->success('Berhasil menghapus Soal TIU ⚡️', 'Berhasil');
        return response()->json(['success' => 'product deleted Successfully']);
    }

    //TKP
    public function getSoalTKP(){
        $soalTKP = soal::where('jenis', 'tkp')->orderBy('created_at', 'asc')->get();

        return DataTables::of($soalTKP)
        ->editColumn('waktu', function($soalTKP){
            return '<center>' . $soalTKP->waktu . ' menit</center>';
        })
        ->editColumn('kkm', function ($soalTKP) {
            return "<center>" . $soalTKP->kkm . "</center>";
        })
        ->addColumn('action', function ($soalTKP) {
            return 
            '<div style="text-align:center">
                <button type="button" id="editTKP" class="btn btn-outline-success btn-sm" data-target="modal" data-id="'.$soalTKP->id.'">Ubah</button>
                <a href="/administrator/soal/detail/tkp/' . $soalTKP->id . '" class="btn btn-outline-primary btn-sm">Detail</a>
                <a href="javascript:void(0)" data-toggle="tooltip" data-id="'.$soalTKP->id.'" data-original-title="Delete" class="btn btn-sm btn-outline-danger delete-TKP-btn">Hapus</a>
            </div>';
          })
        ->rawColumns(['waktu', 'jenis' ,'action', 'kkm'])->make(true);
    }

    public function tambahSoalTKP(Request $request){
        $namaPaket = $request->nama_paket;
        $deskripsiPaket = $request->deskripsiPaket;
        $kkm = $request->kkm;
        $waktu = $request->waktu;
        $tampil = $request->tampil;

        $simpan = new soal();
        $simpan->id_user = Auth::user()->id;
        $simpan->nama_paket = $namaPaket;
        $simpan->deskripsi = $deskripsiPaket;
        $simpan->jenis = 'TKP';
        $simpan->kkm = $kkm;
        $simpan->waktu = $waktu;
        $simpan->tampil = $tampil;
        $simpan->save();

        notify()->success('Berhasil menambah Paket TKP ⚡️', 'Success');
        return back();
    }

    public function editSoalTKP($id){
        $dataTKP = soal::find($id);
        return response()->json($dataTKP, 200);
    }

    public function updateSoalTKP(Request $request){
        $namaPaket = $request->nama_paket_edit;
        $deskripsiPaket = $request->deskripsiPaket_edit;
        $kkm = $request->kkm_edit;
        $waktu = $request->waktu_edit;
        $tampil = $request->tampil_edit;
        $id = $request->tkp_id;

        $update = soal::where('id', $id)->where('jenis', 'tkp')->update([
            'id_user' => Auth::user()->id,
            'nama_paket' => $namaPaket,
            'deskripsi' => $deskripsiPaket,
            'jenis' => 'TKP',
            'kkm' => $kkm,
            'waktu' => $waktu,
            'tampil' => $tampil
        ]);

        if($update){
            notify()->success('Berhasil mengubah Soal TKP ⚡️', 'Berhasil');
            return back();
        }
        notify()->error('Gagal mengubah Soal TKP', 'Gagal');
        return back();
    }

    public function hapusSoalTKP($id){
        $findData = soal::find($id);
        $findData->delete();

        notify()->success('Berhasil menghapus Soal TKP ⚡️', 'Berhasil');
        return response()->json(['success' => 'product deleted Successfully']);
    }

    //jadwal
    public function dataJadwal(){
        $dataJadwal = Jadwal::orderBy('created_at', 'asc')->get();

        return DataTables::of($dataJadwal)
        ->editColumn('akses', function ($dataJadwal) {
            // return $dataJadwal->tanggal->isoFormat('dddd,  D MMMM Y');
            if($dataJadwal->akses == "berbayar"){
                return ucwords($dataJadwal->akses);
            } else {
                return ucwords($dataJadwal->akses);
            }
        })
        ->editColumn('tanggal', function ($dataJadwal) {
            return $dataJadwal->tanggal->isoFormat('dddd,  D MMMM Y');
        })
        ->addColumn('action', function ($dataJadwal) {
            return 
            '<div style="text-align:center">
                <button type="button" id="editJadwal" class="btn btn-outline-success btn-sm" data-target="modal" data-id="'.$dataJadwal->id.'">Ubah</button>
                <a href="javascript:void(0)" data-toggle="tooltip" data-id="'.$dataJadwal->id.'" data-original-title="Delete" class="btn btn-sm btn-outline-danger delete-jadwal-btn">Hapus</a>
            </div>';
          })
        ->rawColumns(['action'])->make(true);
    }

    public function getDataJadwal($paket){
        $dataSoal = soal::where('jenis', $paket)->get();
        return response()->json($dataSoal, 200);
    }

    public function tambahJadwal(Request $request){
        $nama_jadwal = $request->nama_jadwal;
        $jenis = $request->jenis;
        $datepicker = $request->datepicker;
        $akses_paket = $request->akses_paket;
        $tampil = $request->tampil;
        $harga_paket = $request->harga_paket;
        $paket = $request->paket;

        //simpan
        $simpan = new Jadwal();
        $simpan->id_paket = $paket;
        $simpan->tanggal =  date("Y-m-d H:i:s", strtotime($datepicker));
        $simpan->nama_jadwal = $nama_jadwal;
        $simpan->jenis = $jenis;
        $simpan->akses = $akses_paket;
        if($akses_paket == 'berbayar'){
            $simpan->harga = $harga_paket;
        } else {
            $simpan->harga = 0;
        }
        $simpan->tampil = $tampil;
        $simpan->save();

        notify()->success('Berhasil menambah Jadwal', 'Berhasil');
        return back();
    }

    public function editJadwal($id){
        $dataJadwal = Jadwal::find($id);
        return response()->json($dataJadwal, 200);
    }

    public function updateJadwal(Request $request){
        $jadwal_id = $request->jadwal_id;
        $nama_jadwal = $request->nama_jadwal_edit;
        $jenis = $request->jenis_edit;
        $datepicker = $request->datepicker_edit;
        $akses_paket = $request->akses_paket_edit;
        $tampil = $request->tampil_edit;
        $harga_paket = $request->harga_paket_edit;

        //update
        $simpan = Jadwal::find($jadwal_id);
        $simpan->tanggal =  date("Y-m-d H:i:s", strtotime($datepicker));
        $simpan->nama_jadwal = $nama_jadwal;
        $simpan->jenis = $jenis;
        $simpan->akses = $akses_paket;
        if($akses_paket == 'berbayar'){
            $simpan->harga = $harga_paket;
        } else {
            $simpan->harga = 0;
        }
        $simpan->tampil = $tampil;
        $simpan->save();

        if($simpan->save()){
            notify()->success('Berhasil mengubah Jadwal ⚡️', 'Berhasil');
            return back();
        }
        notify()->error('Gagal mengubah Jadwal', 'Gagal');
        return back();
    }

    public function detailJadwal($id){
        
    }

    public function hapusJadwal($id){
        $findData = Jadwal::find($id);
        $findData->delete();

        notify()->success('Berhasil menghapus Jadwal ⚡️', 'Berhasil');
        return response()->json(['success' => 'product deleted Successfully']);
    }
}
