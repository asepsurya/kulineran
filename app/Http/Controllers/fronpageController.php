<?php

namespace App\Http\Controllers;
use App\Models\Produk;
use App\Models\kategori;
use Illuminate\Http\Request;

class fronpageController extends Controller
{
    public function index(){
        return view('front_page.index',[
            'produk'=>Produk::where('status','1')->paginate(8)->withQueryString(),
            'rekomendasi'=>Produk::where('rekomendasi','on')->get(),
            'kategori'=>kategori::all()
        ]);
    }
    public function search(){
        if(request('search')){
           $data = Produk::where('namaProduk', 'like' , '%' . request('search') . '%')->get();
        }elseif(request('idKategori')){
            $data = Produk::where('idKategori', 'like' , '%' . request('idKategori') . '%')->get();
        }else{
            $data =Produk::all();
        }
        return view('front_page.search.search',[
            'data'=> $data,
            'kategori'=>kategori::all()
        ]);

    }

    public function cart(){
        return view('front_page.cart.cart',[
            'title'=>'Keranjang Belanja'
        ]);
    }
}
