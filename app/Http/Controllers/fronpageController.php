<?php

namespace App\Http\Controllers;
use App\Models\Produk;
use App\Models\Alamat;
use App\Models\kategori;
use App\Models\banner;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;

class fronpageController extends Controller
{
    public function index(){
        return view('front_page.index',[
            
            'latestProduk'=>Produk::paginate(3),
            'produk'=>Produk::where('status','1')->latest()->paginate(8)->withQueryString(),
            'rekomendasi'=>Produk::where('rekomendasi','on')->get(),
            'kategori'=>kategori::all(),
            'banner'=>banner::all()
        ]);
    }
    public function search(){
        if(request('search')){
           $data = Produk::where('namaProduk', 'like' , '%' . request('search') . '%')->paginate(8)->withQueryString();
           
        }elseif(request('idKategori')){
            $data = Produk::where('idKategori', 'like' , '%' . request('idKategori') . '%')->paginate(8)->withQueryString();
        }elseif(request('favorite')){
            $data = Produk::where('namaProduk', 'like' , '%' . request('favorite') . '%')->paginate(8)->withQueryString();
        }else{
            $data =Produk::paginate(8);
        }

             
            return view('front_page.search.search',[
                'data'=> $data,
                'kategori'=>kategori::all()
            ]);
        
        

    }

}
