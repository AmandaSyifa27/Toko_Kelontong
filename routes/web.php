<?php

use Illuminate\Support\Facades\Route;
use App\Http\Controllers\UserController;

Route::get('/', function(){
    return redirect()->to('/login');
});

// Route::get('/welcome', function () {
//     return view('welcome');
// });

// Route::get('/welcome', function () {
//     return view('welcome');
// });
Route::get('/welcome', function () {
    return view('welcome');
})->middleware('auth'); // Proteksi halaman menggunakan middleware auth


Route::resource('produk', App\Http\Controllers\ProdukController::class);
Route::resource('kriteria', App\Http\Controllers\KriteriaProdukController::class);
Route::resource('transaksi', App\Http\Controllers\TransaksiController::class);

Route::get('/login', [UserController::class, 'index'])->name('login')->middleware('guest');
Route::post('/login', [UserController::class, 'authenticate']);
Route::post('/logout', [UserController::class, 'logout'])->name('logout'); 

// Route::get('/cari', [App\Http\Controllers\ProdukController::class, 'cari']);
Route::get('/cari', [App\Http\Controllers\ProdukController::class, 'cari'])->name('cari');