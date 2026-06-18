<?php

use Illuminate\Support\Facades\Route;

// use App\Http\Controllers\UtamaController;
// Route::get('/', [UtamaController::class, 'index']);

Route::get('/', function () {
    return view('login');
});

// LOGIN
use App\Http\Controllers\AuthController;
Route::get('/login', [AuthController::class, 'login']);
Route::post('/login', [AuthController::class, 'loginProses']);
Route::get('/logout', [AuthController::class, 'logout']);

// DASHBOARD
use App\Http\Controllers\DashboardController;
Route::get('/dashboard', [DashboardController::class, 'index']);

// ADMIN
use App\Http\Controllers\AdminController;
Route::get('/admin/dashboard', [AdminController::class, 'dashboard']);

// ANGGOTA
use App\Http\Controllers\AnggotaController;
Route::get('/anggota/dashboard', [AnggotaController::class, 'dashboard']);

// PEMINJAMAN
use App\Http\Controllers\PeminjamanController;
Route::get('/admin/peminjaman', [PeminjamanController::class, 'index']);
Route::get('/admin/peminjaman/create', [PeminjamanController::class, 'create']); // kalau ada
Route::post('/admin/peminjaman', [PeminjamanController::class, 'store']);
Route::get('/admin/peminjaman/{id}/edit', [PeminjamanController::class, 'edit']);
Route::put('/admin/peminjaman/{id}', [PeminjamanController::class, 'update']);
Route::delete('/admin/peminjaman/{id}', [PeminjamanController::class, 'destroy']);
Route::get('/anggota/peminjaman', [PeminjamanController::class, 'indexAnggota']);
Route::post('/admin/peminjaman/{id}/kembalikan', [PeminjamanController::class, 'kembalikan']);

// BUKU
use App\Http\Controllers\BukuController;
Route::get('/admin/buku', [BukuController::class, 'index']);
Route::get('/admin/buku/create', [BukuController::class, 'create']);
Route::post('/admin/buku', [BukuController::class, 'store']);
Route::get('/admin/buku/{id_buku}/edit', [BukuController::class, 'edit']);
Route::put('/admin/buku/{id_buku}', [BukuController::class, 'update']);
Route::delete('/admin/buku/{id_buku}', [BukuController::class, 'destroy']);
Route::get('/anggota/buku', [BukuController::class, 'indexAnggota']);
Route::get('/cari-buku', [BukuController::class, 'formCari']);
Route::get('/anggota/cari-buku', [BukuController::class, 'cari'])
    ->name('anggota.cariBuku');

// ADMIN KELOLA DATA ANGGOTA
use App\Http\Controllers\Admin\AnggotaController as AdminAnggotaController;
Route::prefix('admin')->group(function () {
    Route::resource('anggota', AdminAnggotaController::class);
});

use App\Http\Controllers\PengembalianController;
Route::get('/admin/pengembalian', [PengembalianController::class, 'index']);

