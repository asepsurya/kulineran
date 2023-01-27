<?php

use Illuminate\Support\Facades\Route;
use App\Http\Controllers\authenticationController;
use App\Http\Controllers\dashboardController;
use App\Http\Controllers\produkController;
use App\Http\Controllers\categoryController;
use App\Http\Controllers\fronpageController;
use App\Http\Controllers\profileController;
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
Route::get('/cart',[fronpageController::class,'cart']);
// profile
Route::get('/profile',[profileController::class,'index']);
Route::post('/profile/ubahPhoto',[profileController::class,'ubahPhoto']);
Route::get('/address',[profileController::class,'address']);

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



