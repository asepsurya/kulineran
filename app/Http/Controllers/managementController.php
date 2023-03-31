<?php

namespace App\Http\Controllers;
use App\Models\rekening;
use App\Models\Kpemasukan;
use App\Models\Kpengeluaran;
use App\Models\myorder;
use App\Models\bukuKas;
use Carbon\Carbon;
use PDF;
use Illuminate\Http\Request;

class managementController extends Controller
{
    // Rekening
    public function rekening(){
        return view('BackEnd.management.daftarrekening',[
            'title'=>'Rekening',
            'rekening'=>rekening::all()
        ]);
    }
    public function addrekening(request $request){
        rekening::create([
            'namaRek'=>$request->namaRek,
            'saldo'=>$request->saldo,
            'user'=>auth()->user()->id
        ]);
        $request->session()->flash('Berhasil', 'Data Berhasil disimpan');
        return redirect()->back();
    }
    public function updaterekening(request $request){
        rekening::where('id',$request->id)->update([
            'namaRek'=>$request->namaRek,
            'saldo'=>$request->saldo,
            'user'=>auth()->user()->id
        ]);
        $request->session()->flash('Berhasil', 'Data Berhasil disimpan');
        return redirect()->back();
    }
    public function deleterekening(request $request,$id){
        rekening::where('id',$id)->delete();
        $request->session()->flash('Berhasil', 'Data Berhasil disimpan');
        return redirect()->back();
    }

    // Kategori Pemasukan
    public function kPemasukan(){
        return view('BackEnd.management.kategoripemasukan',[
            'title'=>'Kategori Pemasukan',
            'Kpemasukan'=>Kpemasukan::all()
        ]);
    }
    public function addkPemasukan(request $request){
        Kpemasukan::create([
            'kategori'=>$request->NmKategori,
            'user'=>auth()->user()->id
        ]);
        $request->session()->flash('Berhasil', 'Data Berhasil disimpan');
        return redirect()->back();
    }
    public function deletekPemasukan(request $request,$id){
        Kpemasukan::where('id',$id)->delete();
        $request->session()->flash('Berhasil', 'Data Berhasil disimpan');
        return redirect()->back();
    }
    public function updatekPemasukan(request $request){
        Kpemasukan::where('id',$request->id)->update([
            'kategori'=>$request->NmKategori,
            'user'=>auth()->user()->id
        ]);
        $request->session()->flash('Berhasil', 'Data Berhasil disimpan');
        return redirect()->back();
    }

    // kategori Pengeluaran
    public function kPengeluaran(){
        return view('BackEnd.management.kategoripengeluaran',[
            'title'=>'Kategori Pemasukan',
            'Kpengeluaran'=>Kpengeluaran::all()
        ]);
    }
   
    public function addkPengeluaran(request $request){
        Kpengeluaran::create([
            'kategori'=>$request->Kpengeluaran,
            'user'=>auth()->user()->id
        ]);
        $request->session()->flash('Berhasil', 'Data Berhasil disimpan');
        return redirect()->back();
    }
    public function deletekPengeluaran(request $request,$id){
        Kpengeluaran::where('id',$id)->delete();
        $request->session()->flash('Berhasil', 'Data Berhasil disimpan');
        return redirect()->back();
    }
    public function updatekPengeluaran(request $request){
        Kpengeluaran::where('id',$request->id)->update([
            'kategori'=>$request->NmKategori,
            'user'=>auth()->user()->id
        ]);
        $request->session()->flash('Berhasil', 'Data Berhasil disimpan');
        return redirect()->back();
    }

    public function bukuKas(){
        if(request('start') || request('end') ){
            $data = bukuKas::whereBetween('tanggal',[request('start') ,request('end') ])->paginate();
        }else{
            $data = bukuKas::latest()->paginate();
        }

    // masih belum jalan
        if(request('dari') || request('sampai') ){
            $hasil = myorder::where('created_at', 'like' , '%' . request('dari') . '%')->get();
            // $hasil = myorder::whereBetween('created_at',[$start_date , $end_date])->get();
        }else{
            $hasil = myorder::all();
        }

        return view('BackEnd.management.pengeluaran',[
            'title'=>'Pengeluaran Toko',
            'myorder'=>$hasil,
            'Kpemasukan'=>Kpemasukan::all(),
            'Kpengeluaran'=>Kpengeluaran::all(),
            'rekening'=>rekening::all(),
            'bukuKas'=>$data
        ]);
    }
    public function addbukuKas(request $request){
        $a = rekening::where('id',$request->id_rekening)->get();
        foreach($a as $item){
        $saldo = $item->saldo ;
    
        if($request->jenis == "1"){
            bukuKas::create([
                'tanggal'=>$request->tanggal,
                'jenisTrans'=>$request->jeniskategoriDebet,
                'id_rekening'=>$request->id_rekening,
                'id_kategori'=>$request->id_kategori_debet,
                'Debet'=>$request->jumlah,
                'keterangan'=>$request->ket,
                'user'=>auth()->user()->id
            ]);
            rekening::where('id',$request->id_rekening)->update(['saldo'=>$saldo-$request->jumlah]);
        }else{
            bukuKas::create([
                'tanggal'=>$request->tanggal,
                'jenisTrans'=>$request->jeniskategoriKredit,
                'id_rekening'=>$request->id_rekening,
                'id_kategori'=>$request->id_kategori_kredit,
                'Kredit'=>$request->jumlah,
                'keterangan'=>$request->ket,
                'user'=>auth()->user()->id
            ]);
            rekening::where('id',$request->id_rekening)->update(['saldo'=>$saldo+$request->jumlah]);
           
        }
       
        $request->session()->flash('Berhasil', 'Data Berhasil disimpan');
        return redirect()->back(); 
     }   
    }
   public function laporan(){
    $pdf = PDF::loadView('BackEnd.management.laporan', [
        'bukuKas'=>bukuKas::all(),
        'myorder'=>myorder::all()
    ]);
    $customPaper = array(0,0,800,900);
    $pdf->set_paper($customPaper);   
    // download PDF file with download method
    return $pdf->download('#Laporan Pemasukan dan Pengeluaran-'.date('Y/m/d').'.pdf');
    // return view('BackEnd.transaksi.invoice');
    
   }
   public function cetakpemasukan(){
    $pdf = PDF::loadView('BackEnd.management.cetakpemasukan', [
        'myorder'=>myorder::all()
    ]);
     // download PDF file with download method
     return $pdf->download('#Laporan Hasil Penjualan-'.date('Y/m/d').'.pdf');
     // return view('BackEnd.transaksi.invoice');
     
   }
}
