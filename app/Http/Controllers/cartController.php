<?php

namespace App\Http\Controllers;
use App\Models\Alamat;
use App\Models\cart;
use App\Models\pesanan;
use Illuminate\Http\Request;
use Carbon\Carbon;
class cartController extends Controller
{
    
    public function addCart($id){
        // nomor Otomatis
        $now =Carbon::now();
        $thnBulan = $now->year.$now->month;
        $cekdata = pesanan::count();

        if($cekdata == 0){
            $nourut = 10000001;
            $nomor ='EFD'.$thnBulan.$nourut;
        }else{
            $ambil = pesanan::all()->last();
            $urut=(int)substr($ambil->noPesanan, -8) + 1 ;
            $nomor ='EFD'.$thnBulan.$urut;
        }
        // aksi
        $data = cart::where(['idProduk'=> $id,'idUser'=>auth()->user()->id]);
        $a = $data->get();
        if($a->count()){
            foreach($a as $b){
                $qty = $b->qty+1; 
                $data->update(['qty'=>$qty]);
            }
        }else{
            $qty =1;
            cart::create([
                'noPesanan'=>$nomor,
                'idProduk'=>$id,
                'varian'=>'',
                'qty'=>$qty,
                'idUser'=>auth()->user()->id
            ]);
        }
        return redirect('/cart');   
            
      } 
       
    public function addCartVarian(request $request){
              
          // nomor Otomatis
          $now =Carbon::now();
          $thnBulan = $now->year.$now->month;
          $cekdata = pesanan::count();
  
          if($cekdata == 0){
              $nourut = 10000001;
              $nomor ='EFD'.$thnBulan.$nourut;
          }else{
              $ambil = pesanan::all()->last();
              $urut=(int)substr($ambil->noPesanan, -8) + 1 ;
              $nomor ='EFD'.$thnBulan.$urut;
          }

        $data = cart::where(['idProduk'=> $request->idProduk,'idUser'=>auth()->user()->id,'varian'=>$request->varian]);
        $a = $data->get();
        if($a->count()){
            foreach($a as $b){
                $qty = $b->qty+1; 
                $data->update(['qty'=>$qty]);
            }
        }else{
            cart::create([
                'noPesanan'=>$nomor,
                'idProduk'=>$request->idProduk,
                'varian'=>$request->varian,
                'qty'=>'1',
                'idUser'=>auth()->user()->id
            ]);
        }
        return redirect('/cart');
    }

    public function autoQty(request $request, $id){
        cart::where('id',$id)->update([
            'qty'=>$request->qty
        ]);
        return redirect('/cart');
    }
    
    public function cart(){
          // nomor Otomatis
          $now =Carbon::now();
          $thnBulan = $now->year.$now->month;
          $cekdata = pesanan::count();
  
          if($cekdata == 0){
              $nourut = 10000001;
              $nomor ='EFD'.$thnBulan.$nourut;
          }else{
              $ambil = pesanan::all()->last();
              $urut=(int)substr($ambil->noPesanan, -8) + 1 ;
              $nomor ='EFD'.$thnBulan.$urut;
          }
        return view('front_page.cart.cart',[
            'noPesanan'=>$nomor,
            'title'=>'Keranjang Belanja',
            'cart'=>cart::where('idUser',auth()->user()->id)->get(),
            'alamat'=>Alamat::where([
                'idUser' => auth()->user()->id,
                'default'=>'on'
                ])->get()
        ]);
    }

    public function hapusItemCart($id){
        cart::where('id',$id)->delete();
        return redirect('/cart')->with('hapusBerhasil','Data Berhasil Dihapus');
    }
}
