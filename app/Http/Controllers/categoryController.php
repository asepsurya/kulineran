<?php

namespace App\Http\Controllers;
use App\Models\kategori;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Storage;
class categoryController extends Controller
{
    public function index(){
        $data = kategori::all(); 
        return view('BackEnd.category.index',[
            'title' =>'Kategori Produk',
            'kategori'=>$data
        ]);
    }
    public function newCategory(request $request){
        $validasiData = $request->validate([
            'jenisKategori'=>'required',
            'gambar'=>'required|file'
        ]);
        $validasiData['gambar'] = $request->file('gambar')->store('Category-icon');
        kategori::create($validasiData);
        $request->session()->flash('Berhasil', 'Data Berhasil disimpan');
        return redirect()->back();
    }
    public function updateCategory(request $request){
        $validasiData = $request->validate([
            'jenisKategori'=>'',
            'gambar'=>''
        ]);
        if($request->file('gambar')){
            //gambar dibah maka gambar di storage di hapus
            if($request->oldImage){
                Storage::delete($request->oldImage);
            }
            // post-images adalah directory penyimpanan Gambar
            $validasiData['gambar']=$request->file('gambar')->store('Category-icon');
        } 
        kategori::where('id',$request->id)->update($validasiData);
        $request->session()->flash('Berhasil', 'Benckmark Berhasil Ditambahkan');
        return redirect()->back();
    }
    public function deleteCategory(request $request){
        kategori::where('id',$request->id)->delete();
        if($request->old_image){
            Storage::delete($request->old_image);
        }
        $request->session()->flash('Berhasil', 'Benckmark Berhasil Ditambahkan');
        return redirect()->back();
    }
}
