
<?php

use Illuminate\Support\Facades\Route;
use App\Http\Controllers\PesananController;
use App\Http\Controllers\PelangganController;
use App\Http\Controllers\LayananController;
use App\Http\Controllers\DetailPesananController;
use App\Http\Controllers\PembayaranController;

// Route halaman utama menuju Dashboard
Route::redirect('/', '/dashboard');

// Route CRUD Pelanggan
Route::resource('pelanggan', PelangganController::class);

// Route CRUD Layanan
Route::resource('layanan', LayananController::class);

// Route CRUD Pesanan
Route::resource('pesanan', PesananController::class);

// Route CRUD Detail Pesanan
Route::resource('detail-pesanan', DetailPesananController::class);

// Route CRUD Pembayaran
Route::resource('pembayaran', PembayaranController::class);

// Route halaman Dashboard
Route::view('/dashboard', 'dashboard')->name('dashboard');
