<?php

namespace App\Http\Controllers;
use App\Models\myorder;
use App\Models\Pesanan;
use App\Models\Alamat;
use App\Models\Pembatalan;
use Illuminate\Http\Request;

class orderController extends Controller
{
    public function order(){
        return view('BackEnd.transaksi.order',[
            'title'=>'My Order',
            'order'=>myorder::all(),
            
        ]);
    }
    public function detileorder($noPesanan, $idUser){
        
        return view('BackEnd.transaksi.detileorder',[
            'title'=>'Detile Order',
            'pesanan' =>myorder::where('noPesanan',$noPesanan)->get(),
            'detile'=>Pesanan::where('noPesanan',$noPesanan)->get(),
            'alamat'=>Alamat::where(['idUser'=> $idUser,'default'=>'on'])->with(['district','regency','province'])->get(),
        ]);
    }
    public function orderUpdate(request $request){
        if(request('step2')){
            myorder::where('noPesanan',$request->step2)->update([
                'statusorder'=>'2'
            ]);
        }
        if(request('step3')){
            myorder::where('noPesanan',$request->step3)->update([
                'statusorder'=>'3'
            ]);
        }
        if(request('step4')){
            myorder::where('noPesanan',$request->step4)->update([
                'statusorder'=>'4'
            ]);
        }
        return redirect()->back()->with('Berhasil','Berhasil Disimpan');
    }

    public function pembatalan(){
        return view('BackEnd.pembatalan.pembatalan',[
            'title'=>'Riwayat Pembatalan',
            'pembatalan'=>Pembatalan::all()
        ]);
    }

    public function AddPembatalan($noPesanan){
        Pembatalan::where('noPesanan',$noPesanan)->update(['status'=>'Pengajuan Diterima']);
        myorder::where('noPesanan',$noPesanan)->update(['statusorder'=>'5']);
        return redirect()->back()->with('Berhasil','Berhasil Disimpan');
    }
    
    public function dibatalkan($noPesanan){
        Pembatalan::where('noPesanan',$noPesanan)->update(['status'=>'Pengajuan Ditolak']);
      
        return redirect()->back()->with('Berhasil','Berhasil Disimpan');
    }
}
