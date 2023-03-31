<?php

namespace App\Http\Controllers;
use App\Models\cart;
use App\Models\pesanan;
use App\Models\Alamat;
use App\Models\myorder;
use App\Models\token;
use Illuminate\Http\Request;

class checkoutController extends Controller
{
    public function index(request $request){

        cart::query()
        ->where('idUser',auth()->user()->id)
        ->each(function($oldRecord){
            $newPost = $oldRecord->replicate();
            $newPost ->setTable('pesanans');
            $newPost ->save();
            $oldRecord->delete();
        });
        pesanan::where([
            'idUser'=> auth()->user()->id,
            'noPesanan'=>$request->noPesanan
            ])->update([
                
                'ongkir'=>$request->ongkir,
                'diskon'=>$request->diskon,  
                
            ]);
        myorder::create([
            'noPesanan'=>$request->noPesanan,
            'idUser'=>auth()->user()->id,
            'qty'=>$request->qty,
            'notes'=>$request->notes,
            'status'=>'unpaid',
            'statusorder'=>'1',
            'Totalbayar'=>$request->Totalbayar,
            'pengiriman'=>$request->pengiriman,
        ]);
       return redirect('/checkout/success/'.encrypt($request->noPesanan));
    }
    public function Checkoutsuccess($id){
    
    $id2 = decrypt($id);
    // Set your Merchant Server Key
    \Midtrans\Config::$serverKey = 'SB-Mid-server-3SXQTb-wCi-t6j453IN5CL3p';
    // Set to Development/Sandbox Environment (default). Set to true for Production Environment (accept real transaction).
    \Midtrans\Config::$isProduction = false;
    // Set sanitization on (default)
    \Midtrans\Config::$isSanitized = true;
    // Set 3DS transaction for credit card to true
    \Midtrans\Config::$is3ds = true;
        
    $data = myorder::where(['idUser'=>auth()->user()->id,'noPesanan'=>$id2])->get();
    
    foreach($data as $item){
   
    $params = array(
    'transaction_details' => array(
        'order_id' => $id2,
        'gross_amount' => $item->Totalbayar,
    ),
    'customer_details' => array(
        'first_name' => auth()->user()->nama_lengkap,
        'last_name' => '',
        'email' => auth()->user()->email,
        'phone' => auth()->user()->telp,
    ),
    );
         
    }
    $snapToken = \Midtrans\Snap::getSnapToken($params);
        token::create([
            'noPesanan'=>$id2,
            'token'=>$snapToken
        ]);
        return view('front_page.transaction.successTrans',[
            'token'=> $snapToken,
            'alamat'=>Alamat::where([
                'idUser'=> auth()->user()->id,
                'default'=> 'on'
            ])->with(['province','regency','district','village'])->get(),
                
            'pesanan'=>pesanan::where([
                'idUser'=>auth()->user()->id,
                'noPesanan'=>$id2
                ])->get(),

             'order'=>myorder::where([
                'idUser'=>auth()->user()->id,
                'noPesanan'=>$id2
                ])->get()    
        ]);
    }
    public function callback(request $request){
        $serverId = "SB-Mid-server-3SXQTb-wCi-t6j453IN5CL3p";
        \Midtrans\Config::$serverKey = $serverId;
        $hashed = hash("sha512",$request->order_id.$request->status_code.$request->gross_amount.$serverId);
        if($hashed == $request->signature_key){
            if($request->transaction_status == 'capture'){
                $order = Pesanan::find($request->order_id);
                $order->update(['status'=>'paid']);
            }
        }
        return redirect('/');
    }
}
