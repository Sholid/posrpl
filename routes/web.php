<?php

use App\Models\Transaksi;
use Illuminate\Support\Facades\Route;
use App\Http\Controllers\CartController;
use App\Http\Controllers\Frontcontroller;
use App\Http\Controllers\BarangController;
use App\Http\Controllers\TransaksiController;


//Route untuk halaman depan
Route::get('/', [FrontController::class, 'index']);
Route::get('login', [Frontcontroller::class, 'login']);
Route::post('postlogin', [Frontcontroller::class, 'postlogin']);
Route::get('logout', [Frontcontroller::class, 'logout']);
Route::get('viewbarang', [BarangController::class, 'index']);
Route::post('postbarang', [BarangController::class, 'store']);
Route::get('addbarang', [BarangController::class, 'addbarang']);
Route::get('penjualan', [Frontcontroller::class, 'show']);

/* ---Kontroller untuk cart--*/
Route::get('beli/{idmenu}', [CartController::class, 'beli']);
Route::get('hapus/{idmenu}', [CartController::class, 'hapus']);
Route::get('tambah/{idmenu}', [CartController::class, 'tambah']);

Route::get('cart', [CartController::class, 'cart']);
Route::post('/cart/simpan', [TransaksiController::class, 'create'])->name('cart.simpan');

Route::get('batal', [CartController::class, 'batal']);
