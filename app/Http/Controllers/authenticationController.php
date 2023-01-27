<?php

namespace App\Http\Controllers;
use App\Models\User;
use Illuminate\Support\Facades\Hash;
use Illuminate\Support\Facades\Auth;      
use Illuminate\Http\Request;

class authenticationController extends Controller
{
    public function register(){
        return view('front_page.authentication.register');
    }
    public function index(){
        return view('front_page.authentication.login');
    }

    public function newMember(request $request){
        $validasiData = $request->validate([
            'nama_lengkap' => 'required',
            'email'=>'required|email',
            'telp'=>'required',
            'password'=>'required|same:password2'
        ]);
        $validasiData['password'] = Hash::make($validasiData['password'] );
        User::create($validasiData);

        $request->session()->flash('Berhasil', 'Pendaftaran Berhasil, Silahkan Login pada Form yang tersedia');
        return redirect('/login');
    }

    public function cekLogin(request $request){

        $cek = $request->validate([
            'email'=>'required|email',
            'password'=>'required|min:6'
        ]);
        
        if(Auth::attempt($cek)){
            $request->session()->regenerate();
            if(Auth::user()->role =='1'){
                return redirect()-> intended('/dashboard');
            }else{
                return redirect()-> intended('/');
            }
            
        }
        
        //jika login error
        return back()->with('loginError','Login Gagal!! Periksa Kembali Data Anda');

    }
    Public function logout(Request $request){
        Auth::logout();
        $request->session()->invalidate();
        $request->session()->regenerateToken();
        return redirect('/login');
    }
}
