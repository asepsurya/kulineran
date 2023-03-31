<?php

namespace App\Http\Controllers;
use App\Models\User;
use Illuminate\Support\Facades\Hash;
use Illuminate\Http\Request;

class PenggunaController extends Controller
{
    public function pengguna(){
        return view('BackEnd.pengguna.pengguna',[
            'title'=> 'Daftar Pengguna',
            'user'=>User::all()
        ]);
    }
    public function addpengguna(request $request){
        $newpassword = Hash::make($request->password );
        User::create([
            'nama_lengkap'=>$request->nama,
            'email'=>$request->email,
            'telp'=>$request->telp,
            'password'=>$newpassword,
            'role'=>$request->role,
        ]);
        
        $request->session()->flash('Berhasil', 'Data Berhasil disimpan');
        return redirect()->back(); 
    }
    public function updatepengguna(request $request){
        $newpassword = Hash::make($request->password );
        if($request->password==""){
            User::where('id',$request->id)->update([
                'nama_lengkap'=>$request->nama,
                'email'=>$request->email,
                'telp'=>$request->telp,
                'role'=>$request->role,
            ]);
        }else{
            User::where('id',$request->id)->update([
                'nama_lengkap'=>$request->nama,
                'email'=>$request->email,
                'telp'=>$request->telp,
                'password'=>$newpassword,
                'role'=>$request->role,
            ]);
        }
        $request->session()->flash('Berhasil', 'Data Berhasil disimpan');
        return redirect()->back(); 

    }
    public function hapuspengguna(request $request,$id){
        User::where('id',$id)->delete();
        $request->session()->flash('Berhasil', 'Data Berhasil disimpan');
        return redirect()->back();
    }
}
