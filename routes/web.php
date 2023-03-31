<?php

use Illuminate\Support\Facades\Route;
use App\Http\Controllers\authenticationController;
use App\Http\Controllers\dashboardController;
use App\Http\Controllers\produkController;
use App\Http\Controllers\categoryController;
use App\Http\Controllers\fronpageController;
use App\Http\Controllers\profileController;
use App\Http\Controllers\cartController;
use App\Http\Controllers\cuponsController;
use App\Http\Controllers\checkoutController;
use App\Http\Controllers\orderController;
use App\Http\Controllers\outletController;
use App\Http\Controllers\LaporanController;
use App\Http\Controllers\managementController;
use App\Http\Controllers\PenggunaController;
use App\Http\Controllers\SetelanController;

/*
|--------------------------------------------------------------------------
| Web Routes
|--------------------------------------------------------------------------
|
| Here is where you can register web routes for your application. These
| routes are loaded by the RouteServiceProvider within a group which
| contains the "web" middleware group. Now create something great!
|
*/
// front Page
Route::get('/',[fronpageController::class,'index']);
Route::get('/search',[fronpageController::class,'search']);
// cart
Route::get('/cart',[cartController::class,'cart'])->middleware('auth');
Route::get('/addCart/item/{id}',[cartController::class,'addCart'])->middleware('auth');
Route::post('/addCartVarian',[cartController::class,'addCartVarian'])->middleware('auth');
Route::post('/cart/qtyUpdate/{id}',[cartController::class,'autoQty'])->middleware('auth');
Route::get('/hapusItem/{id}',[cartController::class,'hapusItemCart'])->middleware('auth');
// checkout
Route::post('/checkout',[checkoutController::class,'index'])->middleware('auth');
Route::get('/checkout/success/{id}',[checkoutController::class,'Checkoutsuccess'])->middleware('auth');
Route::get('/checkout/downloadinvoice-{idUser}-{id}',[orderController::class,'invoice'])->middleware('auth');
Route::post('/midtrans-callback',[checkoutController::class,'callback'])->middleware('auth');
// cupon
Route::get('/coupons',[cuponsController::class,'index'])->middleware('auth');
// profile
Route::get('/profile',[profileController::class,'index'])->middleware('auth');;
Route::post('/profile/ubahPhoto',[profileController::class,'ubahPhoto'])->middleware('auth');
Route::post('/profile/update',[profileController::class,'ProfileUpdate'])->middleware('auth');
Route::post('/profile/ubahPassword',[profileController::class,'ubahPassword'])->middleware('auth');
Route::get('/orderstatus',[profileController::class,'orderstatus'])->middleware('auth');
Route::post('/orderstatus/canceled',[profileController::class,'ordercanceled'])->middleware('auth');
Route::get('/orderdetile/{idPesanan}',[profileController::class,'orderdetile'])->middleware('auth');
Route::get('/favorites',[profileController::class,'favorites'])->middleware('auth');
Route::get('/addfavorites/{idProduk}/{idKategori}',[profileController::class,'addfavorites'])->middleware('auth');
Route::get('/deletefavorites/{id}',[profileController::class,'deletefavorites'])->middleware('auth');

// address
Route::get('/address',[profileController::class,'address'])->middleware('auth');
Route::post('/address/add',[profileController::class,'addAddress'])->middleware('auth');
Route::get('/address/update/{id}',[profileController::class,'updateAddress'])->middleware('auth');
Route::post('/address/update',[profileController::class,'ubahAksiAddress'])->middleware('auth');
Route::get('/address/delete/{id}',[profileController::class,'deleteAddress'])->middleware('auth');

Route::post('/getkabupatenUpdate',[profileController::class,'getkabupaten'])->name('getkabupaten');
Route::post('/getkecamatanUpdate',[profileController::class,'getkecamatan'])->name('getkecamatan');
Route::post('/getdesaUpdate',[profileController::class,'getdesa'])->name('getdesa');

// Category
Route::post('/category/new',[categoryController::class,'newCategory'])->middleware('auth','isAdmin');
Route::post('/category/update',[categoryController::class,'updateCategory'])->middleware('auth','isAdmin');
Route::post('/category/delete',[categoryController::class,'deleteCategory'])->middleware('auth','isAdmin');

Route::get('/produk',[produkController::class,'index'])->middleware('auth','isAdmin');
Route::post('/produk/addProduk',[produkController::class,'addProduk'])->middleware('auth','isAdmin');
Route::get('/produk/edit/{id_product}',[produkController::class,'edit'])->middleware('auth','isAdmin');
Route::post('/produk/updateProduk',[produkController::class,'updateProduk'])->middleware('auth','isAdmin');
Route::post('/produk/delete',[produkController::class,'deleteProduk'])->middleware('auth','isAdmin');
Route::get('/setelanproduk',[produkController::class,'setelanProduk'])->middleware('auth','isAdmin');
Route::get('/produk/cetak',[produkController::class,'cetakProduk'])->middleware('auth','isAdmin');

Route::post('/login/cekLogin',[authenticationController::class,'cekLogin']);
Route::get('/login',[authenticationController::class,'index'])->middleware('guest')->name('login');

Route::get('/register',[authenticationController::class,'register'])->middleware('guest');
Route::post('/register/new',[authenticationController::class,'newMember']);
Route::post('/logout',[authenticationController::class,'logout'])->middleware('auth');
// Dashboard Route
Route::get('/dashboard',[dashboardController::class,'index'])->middleware('auth','isAdmin');
Route::get('/category',[categoryController::class,'index'])->middleware('auth','isAdmin');
Route::get('/order',[orderController::class,'order'])->middleware('auth','isAdmin');
Route::get('/order/detile/{noPesanan}/{idUser}',[orderController::class,'detileorder'])->middleware('auth','isAdmin');
Route::get('/order/detile/{idUser}-invoice{id}',[orderController::class,'invoice'])->middleware('auth','isAdmin');
Route::get('/order/update',[orderController::class,'orderUpdate'])->middleware('auth','isAdmin');
Route::get('/pembatalan',[orderController::class,'pembatalan'])->middleware('auth','isAdmin');
Route::get('/order/pembatalan/{noPesanan}',[orderController::class,'AddPembatalan'])->middleware('auth','isAdmin');
Route::get('/order/dibatalkan/{noPesanan}',[orderController::class,'dibatalkan'])->middleware('auth','isAdmin');
// Outlet
Route::get('/outlet',[outletController::class,'index'])->middleware('auth','isAdmin');
Route::post('/outlet/new',[outletController::class,'newOutlet'])->middleware('auth','isAdmin');
Route::get('/outlet/edit/{id}',[outletController::class,'editOutlet'])->middleware('auth','isAdmin');
Route::post('/outlet/edit',[outletController::class,'updateOutlet'])->middleware('auth','isAdmin');
Route::get('/outlet/hapus/{id}',[outletController::class,'hapusOutlet'])->middleware('auth','isAdmin');
// Management Toko
Route::get('/toko/bukuKas',[managementController::class,'bukuKas'])->middleware('auth','isAdmin');
Route::post('/toko/bukuKas/add',[managementController::class,'addbukuKas'])->middleware('auth','isAdmin');

Route::get('/toko/rekening',[managementController::class,'rekening'])->middleware('auth','isAdmin');
Route::post('/toko/rekening/add',[managementController::class,'addrekening'])->middleware('auth','isAdmin');
Route::post('/toko/rekening/update',[managementController::class,'updaterekening'])->middleware('auth','isAdmin');
Route::get('/toko/rekening/delete/{id}',[managementController::class,'deleterekening'])->middleware('auth','isAdmin');

Route::get('/toko/kategoripemasukan',[managementController::class,'kPemasukan'])->middleware('auth','isAdmin');
Route::post('/toko/kategoripemasukan/add',[managementController::class,'addkPemasukan'])->middleware('auth','isAdmin');
Route::get('/toko/kategoripemasukan/delete/{id}',[managementController::class,'deletekPemasukan'])->middleware('auth','isAdmin');
Route::post('/toko/kategoripemasukan/update',[managementController::class,'updatekPemasukan'])->middleware('auth','isAdmin');

Route::get('/toko/kategoripengeluaran',[managementController::class,'kPengeluaran'])->middleware('auth','isAdmin');
Route::post('/toko/kategoripengeluaran/add',[managementController::class,'addkPengeluaran'])->middleware('auth','isAdmin');
Route::get('/toko/kategoripengeluaran/delete/{id}',[managementController::class,'deletekPengeluaran'])->middleware('auth','isAdmin');
Route::post('/toko/kategoripengeluaran/update',[managementController::class,'updatekPengeluaran'])->middleware('auth','isAdmin');
// Transaksi
Route::get('/laporan',[LaporanController::class,'laporan'])->middleware('auth','isAdmin');
// filter BukuKas
Route::get('/toko/bukuKas/filterBukuKas',[managementController::class,'bukuKas'])->middleware('auth','isAdmin');
Route::get('/toko/bukuKas/filterpenghasilan',[managementController::class,'bukuKas'])->middleware('auth','isAdmin');
Route::get('/toko/bukuKas/laporan',[managementController::class,'laporan'])->middleware('auth','isAdmin');
Route::get('/toko/bukuKas/cetak',[managementController::class,'cetakpemasukan'])->middleware('auth','isAdmin');
// pengguna
Route::get('/pengguna',[PenggunaController::class,'pengguna'])->middleware('auth','isAdmin');
Route::post('/pengguna/add',[PenggunaController::class,'addpengguna'])->middleware('auth','isAdmin');
Route::post('/pengguna/update',[PenggunaController::class,'updatepengguna'])->middleware('auth','isAdmin');
Route::get('/pengguna/hapus/{id}',[PenggunaController::class,'hapuspengguna'])->middleware('auth','isAdmin');

Route::get('/setelan/ongkir',[SetelanController::class,'ongkir'])->middleware('auth','isAdmin');
Route::post('/setelan/ongkir/add',[SetelanController::class,'addongkir'])->middleware('auth','isAdmin');
Route::post('/tambahBanner',[SetelanController::class,'addBanner'])->middleware('auth','isAdmin');
Route::post('/hapusBanner',[SetelanController::class,'deleteBanner'])->middleware('auth','isAdmin');


