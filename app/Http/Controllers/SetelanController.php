<?php

namespace App\Http\Controllers;
use App\Models\ongkir;
use App\Models\banner;
use Illuminate\Support\Facades\Storage;
use Illuminate\Http\Request;

class SetelanController extends Controller
{
    Public function ongkir(){
        return view('BackEnd.setelanToko.ongkir',[
            'title'=>'Setelan Ongkir',
            'ongkir'=>ongkir::all()
        ]);
    }
    public function addongkir(request $request){
        $cek = ongkir::count();
        
        if ($cek == "0"){
            ongkir::create([
                'ongkir'=>$request->ongkir,
                'user'=>auth()->user()->id
            ]);
        }else{
            ongkir::where('id','1')->update([
                'ongkir'=>$request->ongkir,
                'user'=>auth()->user()->id
            ]);
        }
        $request->session()->flash('Berhasil', 'Data Berhasil disimpan');
        return redirect()->back();
    }
    public function addBanner(request $request){
        
        
       $a = $request->file('gambar')->store('banner');

        banner::create([
            'banner'=>$a,
            'idUser'=>$request->idUser
        ]);
        $request->session()->flash('Berhasil', 'Data Berhasil disimpan');
        return redirect()->back();
    }

    public function deleteBanner(request $request){
        Storage::delete($request->oldimage);
        banner::where('id',$request->id)->delete();
        $request->session()->flash('Berhasil', 'Data Berhasil disimpan');
        return redirect()->back();
    }
}
