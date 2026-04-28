<?php

use Illuminate\Support\Facades\Route;

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

// PEMINJAMAN
use App\Http\Controllers\PeminjamanController;
Route::get('/admin/peminjaman', [PeminjamanController::class, 'index']);
Route::get('/admin/peminjaman/create', [PeminjamanController::class, 'create']); // kalau ada
Route::post('/admin/peminjaman', [PeminjamanController::class, 'store']);
Route::get('/admin/peminjaman/{id}/edit', [PeminjamanController::class, 'edit']);
Route::put('/admin/peminjaman/{id}', [PeminjamanController::class, 'update']);
Route::delete('/admin/peminjaman/{id}', [PeminjamanController::class, 'destroy']);

// ANGGOTA
use App\Http\Controllers\AnggotaController;
Route::get('/anggota/dashboard', [AnggotaController::class, 'dashboard']);
Route::get('/anggota/buku', [AnggotaController::class, 'buku']);
Route::get('/anggota/peminjaman', [AnggotaController::class, 'peminjaman']);

// BUKU
use App\Http\Controllers\BukuController;
Route::get('/admin/buku', [BukuController::class, 'index']);
Route::get('/admin/buku/create', [BukuController::class, 'create']);
Route::post('/admin/buku', [BukuController::class, 'store']);
Route::get('/admin/buku/{id_buku}/edit', [BukuController::class, 'edit']);
Route::put('/admin/buku/{id_buku}', [BukuController::class, 'update']);
Route::delete('/admin/buku/{id_buku}', [BukuController::class, 'destroy']);

// ADMIN KELOLA DATA ANGGOTA
use App\Http\Controllers\Admin\AnggotaController as AdminAnggotaController;
Route::prefix('admin')->group(function () {
    Route::get('/anggota', [AnggotaController::class, 'index']);
    Route::get('/anggota/create', [AnggotaController::class, 'create']);
    Route::post('/anggota', [AnggotaController::class, 'store']);
    Route::resource('anggota', App\Http\Controllers\Admin\AnggotaController::class);
    Route::resource('admin/anggota', AnggotaController::class);
});
