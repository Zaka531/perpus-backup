<?php

use App\Http\Controllers\AnggotaController;
use App\Http\Controllers\AuthController;
use App\Http\Controllers\BukuController;
use App\Http\Controllers\DashboardController;
use App\Http\Controllers\KategoriController;
use App\Http\Controllers\PenerbitController;
use Illuminate\Support\Facades\Route;

/*
|--------------------------------------------------------------------------
| Web Routes
|--------------------------------------------------------------------------
|
| Here is where you can register web routes for your application. These
| routes are loaded by the RouteServiceProvider within a group which
| contains the "web" middleware group. Now create something great!
|
*/

Route::get('/', function () {
    return view('auth.login');
});

Route::get('/login', [AuthController::class, 'login'])->name('login');
Route::post('/postlogin', [AuthController::class, 'postlogin']);
Route::get('/logout', [AuthController::class, 'logout']);

Route::group(['middleware' => 'auth'], function () {
    Route::get('/dashboard', [DashboardController::class, 'index']);

    // Kategori
    Route::get('/kategori', [KategoriController::class, 'index']);
    Route::post('/kategori/store', [KategoriController::class, 'store'])->name('kategori.store');
    Route::get('/kategori/edit/{id}', [KategoriController::class, 'edit']);
    Route::put('/kategori/edit/{id}', [KategoriController::class, 'update']);
    Route::get('/kategori/delete/{id}', [KategoriController::class, 'destroy']);

    // Penerbit
    Route::get('/penerbit', [PenerbitController::class, 'index']);
    Route::post('/penerbit/store', [PenerbitController::class, 'store'])->name('penerbit.store');
    Route::get('/penerbit/edit/{id}', [PenerbitController::class, 'edit']);
    Route::put('/penerbit/edit/{id}', [PenerbitController::class, 'update']);
    Route::get('/penerbit/delete/{id}', [PenerbitController::class, 'destroy']);

    // Anggota
    Route::get('/anggota', [AnggotaController::class, 'index']);
    Route::post('/anggota/store', [AnggotaController::class, 'store'])->name('anggota.store');
    Route::get('/anggota/edit/{id}', [AnggotaController::class, 'edit']);
    Route::put('/anggota/edit/{id}', [AnggotaController::class, 'update']);
    Route::get('/anggota/delete/{id}', [AnggotaController::class, 'destroy']);

    // Buku
    Route::get('/buku', [BukuController::class, 'index']);
    Route::get('/buku/print/{id}', [BukuController::class, 'print']);
    Route::post('/buku/store', [BukuController::class, 'store'])->name('buku.store');
    Route::get('/buku/edit/{id}', [BukuController::class, 'edit']);
    Route::put('/buku/edit/{id}', [BukuController::class, 'update']);
    Route::get('/buku/delete/{id}', [BukuController::class, 'destroy']);
});
