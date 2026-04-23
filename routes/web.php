<?php

use Illuminate\Support\Facades\Route;

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

Route::get('/', function () {
    return view('login');
});

use App\Http\Controllers\AuthController;
Route::get('/login', [AuthController::class, 'login']);
Route::post('/login-proses', [AuthController::class, 'loginProses']);
Route::get('/logout', [AuthController::class, 'logout']);

use App\Http\Controllers\DashboardController;
Route::get('/dashboard', [DashboardController::class, 'index']);

use App\Http\Controllers\AnggotaController;
Route::get('/anggota', [AnggotaController::class, 'index']);
Route::get('/anggota/create', [AnggotaController::class, 'create']);
Route::post('/anggota/store', [AnggotaController::class, 'store']);
Route::get('/anggota/edit/{nim}', [AnggotaController::class, 'edit']);
Route::post('/anggota/update/{nim}', [AnggotaController::class, 'update']);
Route::get('/anggota/delete/{nim}', [AnggotaController::class, 'destroy']);

use App\Http\Controllers\BukuController;
Route::get('/buku', [BukuController::class, 'index']);
Route::get('/buku/create', [BukuController::class, 'create']);
Route::post('/buku/store', [BukuController::class, 'store']);
Route::get('/buku/edit/{kode_buku}', [BukuController::class, 'edit']);
Route::post('/buku/update/{kode_buku}', [BukuController::class, 'update']);
Route::get('/buku/delete/{kode_buku}', [BukuController::class, 'destroy']);

use App\Http\Controllers\PeminjamanController;
Route::resource('peminjaman', PeminjamanController::class);
