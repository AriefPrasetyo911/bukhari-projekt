<?php

namespace App\Http\Controllers;

use App\Models\User;
use Illuminate\Http\Request;
use Yajra\DataTables\Facades\DataTables;

class UserDataController extends Controller
{
    public function __construct()
    {
        $this->middleware('auth');
    }

    public function userData(){
        return view('back_end.pages.data-users.daftar-user');
    }

    public function getuserData(){
        // $users = User::where('is_admin', null)->orWhere('is_admin', '')->orderBy('created_at', 'asc')->get();
        // return response()->json($users, 200);
        $users = User::where('is_admin', null)->orWhere('is_admin', '')->orderBy('created_at', 'asc')->get();

        return DataTables::of($users)
        ->editColumn('verified', function($users){
            return ucwords($users->verified);
        })
        ->editColumn('created_at', function($users){
            return  $users->created_at->diffForHumans() ;
        })->addColumn('action', function ($users) {
            return 
            '<div style="text-align:center">
                <button type="button" id="editTWK" class="btn btn-outline-success btn-sm" data-target="modal" data-id="'.$users->id.'">Ubah</button>
                <a href="/administrator/soal/detail/twk/' . $users->id . '" class="btn btn-outline-primary btn-sm">Detail</a>
                <a href="javascript:void(0)" data-toggle="tooltip" data-id="'.$users->id.'" data-original-title="Delete" class="btn btn-sm btn-outline-danger delete-TWK-btn">Hapus</a>
            </div>';
          })
        ->rawColumns(['waktu', 'jenis' ,'action', 'kkm'])->make(true);
    }
}
