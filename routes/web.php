<?php

use App\Http\Controllers\AutController;
use App\Http\Controllers\ClusterController;
use App\Http\Controllers\importController;
use App\Http\Controllers\LandingController;
use App\Http\Controllers\TambahController;
use App\Http\Controllers\TanamanController;
use Illuminate\Support\Facades\Route;


// Route user

Route::get('/tanaman/{id}', [LandingController::class, 'showResults'])->name('landing');
Route::get('/', [LandingController::class, 'tampilUser'])->name('index');
Route::get('/rekap', [LandingController::class, 'showRecap'])->name('rekap');
Route::get('/tanaman/{id}/ekspor', [LandingController::class, 'eksporPdf'])->name('ekspor');

// Route admin
// // Route Untuk Manajemen Jenis Tanaman
Route::get('/dashboard', [TanamanController::class, 'dashboard'])->name('dashboard');
Route::post('/dashboard/create', [TanamanController::class, 'store'])->name('dashboard_tanaman_create');
Route::delete('/dashboard/{tanaman}', [TanamanController::class, 'destroy'])->name('dashboard_tanaman_destroy');
Route::put('/dashboard/{tanaman}', [TanamanController::class, 'update'])->name('dashboard_tanaman_update');

Route::get('/{tanaman}/data_produksi', [TambahController::class, 'index']);
Route::post('/produksi/{tanaman}', [TambahController::class, 'store'])->name('tanaman_store');
Route::put('/produksi/{id}', [TambahController::class, 'update'])->name('tanaman_update');
Route::delete('/produksi/{id}', [TambahController::class, 'destroy'])->name('tanaman_delete');

Route::get('/hasil/{id}', [ClusterController::class, 'showResults'])->name('hasil');
Route::post('/hasil/tambah_parameter/{id}', [TambahController::class, 'tambahParameter'])->name('parameter');
Route::put('/hasil/update_parameter/{id}', [TambahController::class, 'updateParameter'])->name('UpdateParameter');

Route::get('/login', [AutController::class, 'index']);
Route::post('/login', [AutController::class, 'login']);
Route::get('/logout', [AutController::class, 'logout']);

Route::post('/produksi-import/{id}', [importController::class, 'import'])->name('import-excel');
