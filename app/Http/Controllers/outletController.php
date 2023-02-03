<?php

namespace App\Http\Controllers;
use App\Models\outlet;
use App\Models\Province;
use App\Models\Regency;
use App\Models\District;
use App\Models\Village;
use Illuminate\Http\Request;

class outletController extends Controller
{
    public function index(){
        return view('BackEnd.outlet.outlet',[
            'title'=>'Outlet',
            'outlet'=>outlet::with(['province','regency','district','village'])->get(),
            'provinsi'=>province::all()
        ]);
    }
    public function newOutlet(request $request){
        $validasiData = $request->validate([
            'namaOutlet'=>'required',
            'pemilik'=>'required',
            'alamat'=>'required',
            'id_provinsi'=>'required',
            'id_kabupaten'=>'required',
            'id_kecamatan'=>'required',
            'id_desa'=>'required',
        ]);
        outlet::create($validasiData);
        $request->session()->flash('Berhasil', 'Data Berhasil disimpan');
        return redirect()->back();
    }
    public function editOutlet($id){
        return view('BackEnd.outlet.edit',[
            'title'=>'Edit Outlet',
            'outlet'=>outlet::where('id',$id)->with(['province','regency','district','village'])->get(),
            'provinsi'=>province::all()
        ]);
        
    }
    public function updateOutlet(request $request){
        $validasiData = $request->validate([
            'namaOutlet'=>'required',
            'pemilik'=>'required',
            'alamat'=>'required',
            'id_provinsi'=>'required',
            'id_kabupaten'=>'required',
            'id_kecamatan'=>'required',
            'id_desa'=>'required',
        ]);
        outlet::where('id',$request->id)->update($validasiData);
        $request->session()->flash('updateBerhasil', 'Data Berhasil diubah');
        return redirect('/outlet');
    }

    public function hapusOutlet($id){
        outlet::where('id',$id)->delete();
        return redirect('/outlet');
    }
}
