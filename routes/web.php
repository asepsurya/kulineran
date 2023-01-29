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
// Route::post('/checkout',[checkoutController::class,'index'])->middleware('auth');
// cupon
Route::get('/coupons',[cuponsController::class,'index'])->middleware('auth');
// profile
Route::get('/profile',[profileController::class,'index'])->middleware('auth');;
Route::post('/profile/ubahPhoto',[profileController::class,'ubahPhoto'])->middleware('auth');
Route::post('/profile/update',[profileController::class,'ProfileUpdate'])->middleware('auth');
Route::post('/profile/ubahPassword',[profileController::class,'ubahPassword'])->middleware('auth');

// address
Route::get('/address',[profileController::class,'address'])->middleware('auth');
Route::post('/address/add',[profileController::class,'addAddress'])->middleware('auth');
Route::get('/address/update/{id}',[profileController::class,'updateAddress'])->middleware('auth');
Route::post('/address/update',[profileController::class,'ubahAksiAddress'])->middleware('auth');
Route::get('/address/delete/{id}',[profileController::class,'deleteAddress'])->middleware('auth');

Route::post('/getkabupatenUpdate',[profileController::class,'getkabupaten'])->name('getkabupaten');
Route::post('/getkecamatanUpdate',[profileController::class,'getkecamatan'])->name('getkecamatan');
Route::post('/getdesaUpdate',[profileController::class,'getdesa'])->name('getdesa');

// Dashboard Route
Route::get('/dashboard',[dashboardController::class,'index'])->middleware('auth','isAdmin');
Route::get('/category',[categoryController::class,'index'])->middleware('auth','isAdmin');
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

Route::post('/login/cekLogin',[authenticationController::class,'cekLogin']);
Route::get('/login',[authenticationController::class,'index'])->middleware('guest')->name('login');

Route::get('/register',[authenticationController::class,'register'])->middleware('guest');
Route::post('/register/new',[authenticationController::class,'newMember']);
Route::post('/logout',[authenticationController::class,'logout'])->middleware('auth');



