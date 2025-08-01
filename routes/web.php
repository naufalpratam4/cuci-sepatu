<?php

use App\Http\Controllers\TipeSepatuController;
use App\Http\Controllers\TransaksiController;
use Illuminate\Support\Facades\Route;

Route::get('/', function () {
    return view('welcome');
});

Route::get('/admin', function () {
    return view('admin.dashboard');
});

Route::group(['prefix' => 'admin'], function () {
    // Dashboard
    Route::get('/dashboard', function () {
        return view('admin.dashboard');
    });

    // Tipe Sepatu
    Route::get('/tipe-sepatu', [TipeSepatuController::class, 'viewTipeSepatu']);
    Route::get('tipe-sepatu/tambah-tipe', function(){
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

    Route::get('/invoice/{id}', [TransaksiController::class, 'invoice']);
});
