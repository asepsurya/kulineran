<?php

namespace App\Http\Controllers;
use App\Models\kategori;
use App\Models\Produk;
use App\Models\outlet;
use App\Models\banner;
use PDF;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Storage;

class produkController extends Controller
{
    public function index(){
        return view('BackEnd.produk.index',[
            'kategori'=>kategori::all(),
            'produk'=>Produk::all(),
            'outlet'=>Outlet::all(),
            'title'=>'Produk Saya'
        ]);
    }

    public function addProduk(request $request){
        
        $myData = $request->validate([
            'namaProduk'=>'required',
            'idSupplier'=>'required',
            'status'=>'required',
            'harga'=>'required',
            'idKategori'=>'required',
            'varian'=>'',
            'deskripsi'=>'required',
            'gambar'=>'required',
            'idUser'=>'required',
        ]);
        
        $myData['gambar'] = $request->file('gambar')->store('Produk-images');
        Produk::create($myData);
        $request->session()->flash('Berhasil', 'Data Berhasil disimpan');
        return redirect()->back();
    
    }
    public function edit($id_produk){
        $id =decrypt($id_produk);
        $data = Produk::where('id',$id)->get();
        return view('BackEnd.produk.edit',[
            'title'=>'Edit Produk',
            'produk'=>$data,
            'kategori'=>kategori::all(),
            'outlet'=>Outlet::all(),
        ]);
    }

    public function updateProduk(request $request){
        $myData = $request->validate([
            'namaProduk'=>'',
            'idSupplier'=>'',
            'status'=>'',
            'harga'=>'',
            'idKategori'=>'',
            'varian'=>'',
            'deskripsi'=>'',
            'gambar'=>'',
            'idUser'=>'',
            'rekomendasi'=>''
        ]);
        if($request->file('gambar')){
            //gambar dibah maka gambar di storage di hapus
            if($request->oldImage){
                Storage::delete($request->oldImage);
            }
            // post-images adalah directory penyimpanan Gambar
            $myData['gambar']=$request->file('gambar')->store('Produk-images');
        } 
        Produk::where('id',$request->idProduk)->update($myData);
        $request->session()->flash('updateBerhasil', 'Data Berhasil diHapus');
        return redirect('/produk');
  
        
    }

    public function deleteProduk(request $request){
        Storage::delete($request->oldImage);
        Produk::where('id',$request->idProduk)->delete();
        $request->session()->flash('hapusBerhasil', 'Data Berhasil dihapus');
        return redirect('/produk');
    }
    public function setelanProduk(){
        return view('BackEnd.produk.setelanProduk',[
            'title'=>'Setelan Produk',
            'produk'=>Produk::where('rekomendasi','on')->get(),
            'banner'=>banner::all()
        ]);
    }
    public function cetakProduk(){
        $pdf = PDF::loadView('BackEnd.produk.laporan', [
            'produk'=>Produk::all()
        ]);
        // $customPaper = array(0,0,800,900);
        // $pdf->set_paper($customPaper);   
        // download PDF file with download method
        return $pdf->download('Laporan Daftar Produk-'.date('Y/m/d').'.pdf');
        // return view('BackEnd.transaksi.invoice');

        
    }
    
}
