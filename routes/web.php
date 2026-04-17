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

Route::get('/dashboard', function () {
    if (!session('login')) {
        return redirect('/login');
    }
    return view('dashboard');
});

use App\Http\Controllers\AnggotaController;
Route::get('/anggota', [AnggotaController::class, 'index']);
Route::get('/anggota/create', [AnggotaController::class, 'create']);
Route::post('/anggota/store', [AnggotaController::class, 'store']);
Route::get('/anggota/edit/{id_anggota}', [AnggotaController::class, 'edit']);
Route::post('/anggota/update/{id_anggota}', [AnggotaController::class, 'update']);
Route::get('/anggota/delete/{id_anggota}', [AnggotaController::class, 'destroy']);