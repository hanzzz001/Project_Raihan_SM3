<?php

use App\Http\Controllers\CashController;
use App\Http\Controllers\LayoutController;
use App\Http\Controllers\PelangganController;
use App\Http\Controllers\Pembeli;
use Illuminate\Support\Facades\Route;
use App\Http\Controllers\BarangController;
use App\Http\Controllers\LoginController;


/*
|--------------------------------------------------------------------------
| Web Routes
|--------------------------------------------------------------------------
|
| Here is where you can register web routes for your application. These
| routes are loaded by the RouteServiceProvider and all of them will
| be assigned to the "web" middleware group. Make something great!
|
*/

//Route Layout
Route::get('/', [LayoutController::class, 'index'])->middleware('auth');
Route::get('/home', [LayoutController::class, 'index'])->middleware('auth');

//Route Login
Route::controller(LoginController::class)->group(function (){
    Route::get('login', [LoginController::class, 'index'])->name('login');
    Route::post('login', [LoginController::class, 'proses']);
    Route::get('logout', 'logout');
});

//Route Menu Utama
Route::group(['middleware' => ['auth']],function(){
    Route::group(['middleware' => ['cekUserLogin:1']],function(){
        Route::resource('barang', BarangController::class);
        Route::resource('pelanggan', PelangganController::class);
        Route::resource('cash', CashController::class);
        Route::get('/terjual', [PelangganController::class, 'terjual'])->name('pelanggan.terjual');

        // Tambahkan rute pembaruan status (Ditarik)
        Route::put('/updateStatusDitarik/{id}', [PelangganController::class, 'updateStatusDitarik']);
        
        // Tambahkan rute penghapusan data (Ditarik)
        Route::delete('/deletePelanggan/{id}', [PelangganController::class, 'deletePelanggan']);
    });

    Route::group(['middleware' => ['cekUserLogin:2']],function(){
        Route::resource('pelanggan', PelangganController::class);
    });
});