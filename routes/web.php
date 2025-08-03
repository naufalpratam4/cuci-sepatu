<?php

use App\Http\Controllers\AuthController;
use App\Http\Controllers\DashboardController;
use App\Http\Controllers\LandingPageController;
use App\Http\Controllers\TipeSepatuController;
use App\Http\Controllers\TransaksiController;
use App\Models\TipeSepatu;
use Illuminate\Support\Facades\Route;

Route::get('/', function () {
    $data = TipeSepatu::all();
    return view('welcome', compact('data'));
});
Route::get('/testimoni', function(){
    return view('galeriTestimoni');
});
Route::post('/', [LandingPageController::class, 'formPemesanan'])->name('form.pemesanan.user');

Route::get('/login', function(){
    return view('admin.auth.login');
})->name('login');
Route::post('/login', [AuthController::class, 'login'])->name('admin.login');
Route::middleware(['auth'])->group(function () {

    Route::group(['prefix' => 'admin'], function () {
        // Dashboard
         
        Route::get('/dashboard', [DashboardController::class, 'index']);

        // Tipe Sepatu
        Route::get('/tipe-sepatu', [TipeSepatuController::class, 'viewTipeSepatu']);
        Route::get('tipe-sepatu/tambah-tipe', function () {
            return view('admin.tipesepatu.tambahTipe');
        });
        Route::post('/tambah-tipe-sepatu', [TipeSepatuController::class, 'addTipeSepatu'])->name('add.tipe.sepatu');

        Route::get('/detail-tipe-sepatu/{id}', [TipeSepatuController::class, 'detailTipeSepatu'])->name('detail.tipe.sepatu');

        Route::get('/edit-tipe-sepatu/{id}', [TipeSepatuController::class, 'viewEditTipeSepatu'])->name('edit.tipe.sepatu');
        Route::post('/edit-tipe-sepatu/{id}', [TipeSepatuController::class, 'editTipeSepatu'])->name('update.tipe.sepatu');

        Route::delete('/delete-tipe-sepatu/{id}', [TipeSepatuController::class, 'deleteTipeSepatu'])->name('delete.tipe.sepatu');
        // Transaksi
        Route::get('/tambah-transaksi', [TransaksiController::class, 'viewTambahTransaksi']);
        Route::post('/tambah-transaksi', [TransaksiController::class, 'tambahTransaksi'])->name('add.transaksi');
        Route::get('/data-transaksi', [TransaksiController::class, 'viewDataTransaksi']);
        Route::get('/data-transaksi/search', [TransaksiController::class, 'searchTransaksi'])->name('search.transaksi');
        Route::get('/detail-transaksi/{id}', [TransaksiController::class, 'detailTransaksi'])->name('detail.transaksi');
        Route::post('/detail-transaksi/update-isacc/{id}', [TransaksiController::class, 'konfirmasiPesanan'])->name('konfirmasi.transaksi');
        Route::get('/invoice/{id}', [TransaksiController::class, 'invoice']);
        Route::delete('/delete-transaksi/{id}', [TransaksiController::class, 'hapusTransaksi'])->name('delete.transaksi');
    });
});
