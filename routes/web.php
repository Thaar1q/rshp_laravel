<?php

use Illuminate\Support\Facades\Route;
use App\Http\Controllers\auth\LoginController;
use App\Http\Controllers\site\SiteController;
use App\Http\Controllers\site\KontakController;
use App\Http\Controllers\site\LayananController;
use App\Http\Controllers\site\OrganisasiController;
use App\Http\Controllers\admin\{
    JenisHewanController, RasHewanController, KategoriController,
    KategoriKlinisController, KodeTindakanTerapiController,
    PetController, RoleController, UserController
};

Route::get('/', function () {
    return view('site.home');
});

// Connection check
Route::get('/connecttest', [SiteController::class, 'connectTest'])->name('site.connecttest');

// Main Site
Route::get('/home', [SiteController::class, 'index'])->name('home');
Route::get('/layanan', [LayananController::class, 'index'])->name('layanan');
Route::get('/kontak', [KontakController::class, 'index'])->name('kontak');
Route::get('/organisasi', [OrganisasiController::class, 'index'])->name('organisasi');

// Login & logout
Route::get('/login', [LoginController::class, 'index'])->name('login');
Route::post('/login', [LoginController::class, 'processLogin'])->name('login.process');
Route::post('/logout', [LoginController::class, 'logout'])->name('logout');

Auth::routes();

// Dashboard per role
Route::prefix('dashboard')->group(function () {
    Route::get('/admin', fn() => view('admin.dashboard'))->middleware('isAdmin')->name('admin.dashboard');
    Route::get('/dokter', fn() => view('dokter.dashboard'))->middleware('isDokter')->name('dokter.dashboard');
    Route::get('/perawat', fn() => view('perawat.dashboard'))->middleware('isPerawat')->name('perawat.dashboard');
    Route::get('/resepsionis', fn() => view('resepsionis.dashboard'))->middleware('isResepsionis')->name('resepsionis.dashboard');
    Route::get('/pemilik', fn() => view('pemilik.dashboard'))->middleware('isPemilik')->name('pemilik.dashboard');

// Submenu
    // Admin
    Route::prefix('admin')->middleware('isAdmin')->group(function () {
        Route::get('/dashboard', fn() => view('admin.dashboard'))->name('admin.dashboard');
        Route::get('/jenis-hewan', [JenisHewanController::class, 'index'])->name('admin.jenis-hewan');
        Route::get('/ras-hewan', [RasHewanController::class, 'index'])->name('admin.ras-hewan');
        Route::get('/kategori', [KategoriController::class, 'index'])->name('admin.kategori');
        Route::get('/kategori-klinis', [KategoriKlinisController::class, 'index'])->name('admin.kategori-klinis');
        Route::get('/kode-tindakan', [KodeTindakanTerapiController::class, 'index'])->name('admin.kode-tindakan');
        Route::get('/pet', [PetController::class, 'index'])->name('admin.pet');
        Route::get('/role', [RoleController::class, 'index'])->name('admin.role');
        Route::get('/user', [UserController::class, 'index'])->name('admin.user');
    });
});