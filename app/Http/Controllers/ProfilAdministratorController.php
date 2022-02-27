<?php

namespace App\Http\Controllers;

use App\Models\User;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\DB;
use Illuminate\Support\Facades\Hash;

class ProfilAdministratorController extends Controller
{
    public function __construct()
    {
        $this->middleware('auth');
    }

    public function profilAdmin(){
        return view('back_end.pages.profile-admin.profile');
    }

    public function fotoProfileUpdate(Request $request){
        $id = $request->id;
        $email = $request->email;

        $image = $request->image;
        $filename  = str_replace(' ', '_', Auth::user()->name).'_'.$image->getClientOriginalName();
        // $filesize  = $image->getSize();

        //move file
        $image->move(public_path('foto-profile/'), $filename);

        //check
        $profileData = Auth::user()->picture;
        if($profileData == null){
            User::where('id', $id)->where('email', $email)->update([
                'picture' => $filename
            ]);
        } else {
            User::where('id', $id)->where('email', $email)->update([
                'picture' => $filename
            ]);
        }

        notify()->success('Berhasil mengubah Foto Profile', 'Berhasil');
        return back();
    }

    public function passwordUpdate(Request $request){
        $request->validate([
            'password' => 'required',
            'currPassword2' => 'required'
        ]);
    
        if($request->password == $request->passConfirm){
            if(Hash::check($request->currPassword2, Auth::user()->password)){
                DB::table('users')->where('id', Auth::user()->id)->where('email', Auth::user()->email)->update(
                    [
                        'password' => Hash::make($request->password)
                    ]
                );
        
                notify()->success('Berhasil mengubah password', 'Success');
                return back();
            }
        }
    
        notify()->error('Gagal mengubah password', 'Error');
        return back();
    }
}
