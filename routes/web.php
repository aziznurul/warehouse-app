<?php

use App\Http\Controllers\ProfileController;
use Illuminate\Support\Facades\Route;
use App\Http\Controllers\ProductController;
use App\Http\Controllers\BarangMasukController;
use App\Http\Controllers\BarangKeluarController;
use App\Http\Controllers\LaporanStokController;
use App\Http\Controllers\LaporanTransaksiController;
use App\Http\Controllers\LaporanController;
use App\Http\Controllers\DashboardController;

Route::get('/', function () {
    return view('welcome');
});

Route::middleware('auth')->group(function () {
    Route::get('/dashboard', [DashboardController::class, 'index'])
        ->name('dashboard');
});

Route::middleware('auth')->group(function () {
    Route::get('/profile', [ProfileController::class, 'edit'])->name('profile.edit');
    Route::patch('/profile', [ProfileController::class, 'update'])->name('profile.update');
    Route::delete('/profile', [ProfileController::class, 'destroy'])->name('profile.destroy');
});
Route::middleware(['auth', 'role:admin'])->group(function () {
    Route::resource('products', ProductController::class);
});

Route::middleware(['auth'])->group(function () {
    Route::resource('barang-masuk', BarangMasukController::class)
        ->only(['index','create','store']);
});

Route::middleware(['auth'])->group(function () {
    Route::resource('barang-keluar', BarangKeluarController::class)
        ->only(['index','create','store']);
});

Route::middleware(['auth'])->group(function () {
    Route::get('/laporan/stok', [LaporanStokController::class, 'index'])
        ->name('laporan.stok');
});

Route::middleware(['auth'])->group(function () {
    Route::get('/laporan/barang-masuk', [LaporanTransaksiController::class, 'barangMasuk'])
        ->name('laporan.barang-masuk');

    Route::get('/laporan/barang-keluar', [LaporanTransaksiController::class, 'barangKeluar'])
        ->name('laporan.barang-keluar');
});

Route::get('/laporan/transaksi', [LaporanController::class, 'transaksi'])
    ->name('laporan.transaksi');

require __DIR__.'/auth.php';
