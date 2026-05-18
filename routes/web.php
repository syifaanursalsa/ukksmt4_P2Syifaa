<?php

use Illuminate\Support\Facades\Route;
use Illuminate\Http\Request;
use App\Http\Controllers\Auth\LoginController;
use App\Http\Controllers\AdminController;
use App\Http\Controllers\OwnerController;
use App\Http\Controllers\PetugasController;

// ==========================================
// 1. HALAMAN UTAMA & AUTHENTICATION (LOGIN)
// ==========================================
Route::get('/', function () { 
    return redirect()->route('login'); 
});

Route::get('/login', [LoginController::class, 'showLoginForm'])->name('login');
Route::post('/login', [LoginController::class, 'login']);
Route::post('/logout', [LoginController::class, 'logout'])->name('logout');


// ==========================================
// 2. SEMUA ROUTE WAJIB LOGIN (MIDDLEWARE AUTH)
// ==========================================
Route::middleware('auth')->group(function () {

    // ---------------- ADMIN AREA ----------------
    Route::get('/admin/dashboard', [AdminController::class, 'dashboard'])->name('admin.dashboard');

    // CRUD USER
    Route::get('/admin/user', [AdminController::class, 'user_index'])->name('admin.user');
    Route::get('/admin/user/create', [AdminController::class, 'user_create'])->name('admin.user.create');
    Route::post('/admin/user/store', [AdminController::class, 'user_store'])->name('admin.user.store');
    Route::get('/admin/user/edit/{id}', [AdminController::class, 'user_edit'])->name('admin.user.edit');
    Route::put('/admin/user/update/{id}', [AdminController::class, 'user_update'])->name('admin.user.update');
    Route::delete('/admin/user/delete/{id}', [AdminController::class, 'user_delete'])->name('admin.user.delete');

    // CRUD KENDARAAN
    Route::get('/admin/kendaraan', [AdminController::class, 'kendaraan_index'])->name('admin.kendaraan');
    Route::get('/admin/kendaraan/create', [AdminController::class, 'kendaraan_create'])->name('admin.kendaraan.create');
    Route::post('/admin/kendaraan/store', [AdminController::class, 'kendaraan_store'])->name('admin.kendaraan.store');
    Route::get('/admin/kendaraan/edit/{id}', [AdminController::class, 'kendaraan_edit'])->name('admin.kendaraan.edit');
    Route::put('/admin/kendaraan/update/{id}', [AdminController::class, 'kendaraan_update'])->name('admin.kendaraan.update');
    Route::delete('/admin/kendaraan/delete/{id}', [AdminController::class, 'kendaraan_delete'])->name('admin.kendaraan.delete');

    // CRUD TARIF
    Route::get('/admin/tarif', [AdminController::class, 'tarif_index'])->name('admin.tarif');
    Route::get('/admin/tarif/create', [AdminController::class, 'tarif_create'])->name('admin.tarif.create');
    Route::post('/admin/tarif/store', [AdminController::class, 'tarif_store'])->name('admin.tarif.store');
    Route::get('/admin/tarif/edit/{id}', [AdminController::class, 'tarif_edit'])->name('admin.tarif.edit');
    Route::put('/admin/tarif/update/{id}', [AdminController::class, 'tarif_update'])->name('admin.tarif.update');
    Route::delete('/admin/tarif/delete/{id}', [AdminController::class, 'tarif_delete'])->name('admin.tarif.delete');

    // CRUD AREA PARKIR
    Route::get('/admin/area', [AdminController::class, 'area_index'])->name('admin.area');
    Route::get('/admin/area/create', [AdminController::class, 'area_create'])->name('admin.area.create');
    Route::post('/admin/area/store', [AdminController::class, 'area_store'])->name('admin.area.store');
    Route::get('/admin/area/edit/{id}', [AdminController::class, 'area_edit'])->name('admin.area.edit');
    Route::put('/admin/area/update/{id}', [AdminController::class, 'area_update'])->name('admin.area.update');
    Route::delete('/admin/area/delete/{id}', [AdminController::class, 'area_delete'])->name('admin.area.delete');

    // LOG AKTIVITAS
    Route::get('/admin/log', [AdminController::class, 'log_index'])->name('admin.log');


    // ---------------- OWNER AREA ----------------
    Route::get('/owner/dashboard', [OwnerController::class, 'dashboard'])->name('owner.dashboard');
    Route::get('/owner/rekap', [OwnerController::class, 'rekap_index'])->name('owner.rekap');
    Route::get('/owner/pengajuan', [OwnerController::class, 'appeal_index'])->name('owner.pengajuan');
    Route::post('/owner/pengajuan/status/{id}', [OwnerController::class, 'appeal_status'])->name('owner.pengajuan.status');


    // ---------------- PETUGAS AREA ----------------
    Route::get('/petugas/dashboard', [PetugasController::class, 'dashboard'])->name('petugas.dashboard');
    Route::get('/petugas/transaksi/baru', [PetugasController::class, 'create'])->name('petugas.transaksi.create');
    Route::post('/petugas/parkir-masuk', [PetugasController::class, 'store'])->name('petugas.parkir.masuk');
     Route::get('/petugas/shift', [PetugasController::class, 'shift_index'])->name('petugas.shift.index');

});
