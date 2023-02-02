<?php

namespace App\Http\Controllers;
use App\Models\User;
use App\Models\Alamat;
use App\Models\Province;
use App\Models\Regency;
use App\Models\District;
use App\Models\Village;
use App\Models\Favorite;
use App\Models\Produk;
use App\Models\kategori;
use App\Models\Pesanan;
use App\Models\myorder;
use App\Models\Pembatalan;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Hash;
use Illuminate\Support\Facades\Storage;

class profileController extends Controller
{
    public function index(){
        return view('front_page.myAccount.profile');
    }
    public function ubahPhoto(request $request){
        $a = $request->validate([
            'gambar'=>'required|file'
        ]);
        if($request->file('gambar')){
            //gambar dibah maka gambar di storage di hapus
            if($request->oldImage){
                Storage::delete($request->oldImage);
            }
            // post-images adalah directory penyimpanan Gambar
            $a['gambar']=$request->file('gambar')->store('users-pict');
        } 
        User::where('id',$request->idUser)->update($a);
        $request->session()->flash('Berhasil', 'Data Berhasil disimpan');
        return redirect()->back();
    }

    
    public function address(){
        return view('front_page.myAccount.useraddress',[
            'provinsi'=>Province::all(),
            'alamat'=>Alamat::where('idUser',auth()->user()->id)->with(['province','regency','district','village'])->get()
        ]);
    }

    public function addAddress(request $request){
        
        $validasiData = $request->validate([
            'idUser'=>'required',
            'nama_lengkap'=>'required|max:255',
            'telp'=>'required',
            'alamat'=>'required',
            'id_provinsi'=>'required',
            'id_kabupaten'=>'required',
            'id_kecamatan'=>'required',
            'id_desa'=>'required',
            'other'=>'',
            'default'=>''
        ]);
        if($request->default == "on"){
            Alamat::where('idUser',$request->idUser)->update(['default'=> 'off']);
        }
        Alamat::create($validasiData);
        $request->session()->flash('Berhasil', 'Data Berhasil disimpan');
        return redirect()->back();

    }
    public function updateAddress($id){
        return view('front_page.myAccount.updateAddress',[
            'provinsi'=>Province::all(),
            'alamat'=>Alamat::where('id',$id)->get()
        ]);
    }
    public function ubahAksiAddress(request $request){

        $validasiData = $request->validate([
            'idUser'=>'',
            'nama_lengkap'=>'',
            'telp'=>'',
            'alamat'=>'',
            'id_provinsi'=>'',
            'id_kabupaten'=>'',
            'id_kecamatan'=>'',
            'id_desa'=>'',
            'other'=>'',
            'default'=>''
        ]);
       
        if($request->default == "on"){
            Alamat::where('idUser',$request->idUser)->update(['default'=> 'off']);
        }
        Alamat::where('id',$request->id)->update($validasiData);
        $request->session()->flash('updateBerhasil', 'Data Berhasil diubah');
        return redirect('/address');

    }
    public function deleteAddress($id){
        Alamat::where('id',$id)->delete();
        return redirect('/address')->with('hapusBerhasil', 'Data Berhasil dihapus');;
    }

    public function ProfileUpdate(request $request){
        $iduser = auth()->user()->id;
        $validasiData = $request->validate([
            'nama_lengkap'=>'required',
            'email'=>'required',
            'telp'=>'required'
        ]);
        User::where('id',$iduser)->update($validasiData);
        return redirect()->back()->with('updateBerhasil','Data Berhasil disimpan');
    }

    public function ubahPassword(request $request){
        // mengambil id User
        $iduser = auth()->user()->id;
            // validasi 
            $request->validate([
                'password'=>'required|same:confirmPassword',
                'confirmPassword'=>'required|same:password'
            ]);
            $validasiData = Hash::make($request->password);
            User::where('id',$iduser)->update([
                'password'=>$validasiData
            ]);
            Auth::logout();
            $request->session()->invalidate();
            $request->session()->regenerateToken();
            return redirect('/login');

    }

    public function getkabupaten(request $request){
        $id_provinsi = $request->id_provinsi;
       
        $option = "<option value=''> Kota/Kabupaten </option>";
        $kabupatens = Regency::where('province_id',$id_provinsi)->get();
        foreach($kabupatens as $kabupaten){
            $option.="<option value='$kabupaten->id'> $kabupaten->name </option>";
        }
        echo $option;
    }
    public function getkecamatan(request $request){
        $id_kabupaten = $request->id_kabupaten;
       
        $option = "<option value=''> Kecamatan </option>";
        $kecamatans = District::where('regency_id',$id_kabupaten)->get();
        foreach($kecamatans as $kecamatan){
            $option.="<option value='$kecamatan->id'> $kecamatan->name </option>";
        }
        echo $option;
    }

    public function getdesa(request $request){
        $id_kecamatan = $request->id_kecamatan;
       
        $option = "<option value=''> Kelurahan/Desa </option>";
        $desas = Village::where('district_id',$id_kecamatan)->get();
        foreach($desas as $desa){
            $option.= "<option value='$desa->id'> $desa->name </option>";
        }
        echo $option;
    }

    public function orderstatus(){
        return view('front_page.myAccount.statusOrder',[
           'myorder'=>myorder::where(['idUser'=>auth()->user()->id])->get(),
           'pesanan'=>pesanan::where(['idUser'=>auth()->user()->id])->get()
        ]);
    }
    public function orderdetile($idPesanan){
        return view('front_page.myAccount.detilestatusOrder',[
            'pesanan'=>Pesanan::where('noPesanan',$idPesanan)->get(),
            'myorder'=>myorder::where('noPesanan',$idPesanan)->get(),
            'Alamat'=>Alamat::where(['idUser' => auth()->user()->id,'default'=>'on'])->get()
        ]);
    }

    public function favorites(){
        return view('front_page.myAccount.favorites',[
            'Favorite' =>Favorite::where('idUser',auth()->user()->id)->paginate(8),
            'kategori'=>kategori::all()
        ]);
    }
    public function addfavorites($idProduk, $idKategori){
       $data= Favorite::where(['idUser'=>auth()->user()->id,'idProduk'=>$idProduk])->get();
        if($data->count()){
            return redirect('/favorites')->with('sudahAda','Data Sudah Ada');
        }else{
            Favorite::create([
                'idUser'=>auth()->user()->id,
                'idProduk'=>$idProduk,
                'idKategori'=>$idKategori
            ]);
            return redirect('/favorites');
            
        }
       
    }

    public function deletefavorites($id){
        Favorite::where('id',$id)->delete();
        return redirect('/favorites');
    }

    public function ordercanceled(request $request){
        Pembatalan::create([
            'noPesanan'=>$request->noPesanan,
            'idUser'=>auth()->user()->id,
            'Alasan'=>$request->alasan,
            'other'=>$request->other
        ]);
        return redirect()->back()->with('Berhasil','Data Berhasil diajukan');
    }
}
