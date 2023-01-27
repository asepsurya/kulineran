<?php

namespace App\Http\Controllers;
use App\Models\User;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Storage;

class profileController extends Controller
{
    public function index(){
        return view('front_page.myAccount.profile');
    }
    public function ubahPhoto(request $request){
        $a = $request->validate([
            'gambar'=>'required|file'
        ]);
        if($request->file('gambar')){
            //gambar dibah maka gambar di storage di hapus
            if($request->oldImage){
                Storage::delete($request->oldImage);
            }
            // post-images adalah directory penyimpanan Gambar
            $a['gambar']=$request->file('gambar')->store('users-pict');
        } 
        User::where('id',$request->idUser)->update($a);
        $request->session()->flash('Berhasil', 'Data Berhasil disimpan');
        return redirect()->back();
    }
    public function address(){
        return view('front_page.myAccount.useraddress');
    }
}
