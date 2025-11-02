<?php

use Illuminate\Support\Facades\Route;
use App\Http\Controllers\auth\LoginController;
use App\Http\Controllers\site\SiteController;
use App\Http\Controllers\site\KontakController;
use App\Http\Controllers\site\LayananController;
use App\Http\Controllers\site\OrganisasiController;
use App\Http\Controllers\admin\AdminController;
use App\Http\Controllers\dokter\DokterController;
use App\Http\Controllers\perawat\PerawatController;
use App\Http\Controllers\pemilik\PemilikController;
use App\Http\Controllers\resepsionis\ResepsionisController;

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
        Route::get('/dashboard', [AdminController::class, 'dashboard'])->name('admin.dashboard');
        Route::get('/jenis-hewan', [AdminController::class, 'jenisHewan'])->name('admin.jenis-hewan');
        Route::get('/ras-hewan', [AdminController::class, 'rasHewan'])->name('admin.ras-hewan');
        Route::get('/kategori', [AdminController::class, 'kategori'])->name('admin.kategori');
        Route::get('/kategori-klinis', [AdminController::class, 'kategoriKlinis'])->name('admin.kategori-klinis');
        Route::get('/kode-tindakan', [AdminController::class, 'kodeTindakan'])->name('admin.kode-tindakan');
        Route::get('/pet', [AdminController::class, 'pet'])->name('admin.pet');
        Route::get('/role', [AdminController::class, 'role'])->name('admin.role');
        Route::get('/user', [AdminController::class, 'user'])->name('admin.user');
    });

    // Dokter
    Route::prefix('dokter')->middleware(['isDokter'])->group(function () {
        Route::get('/dashboard', fn() => view('dokter.dashboard'))->name('dokter.dashboard');
        Route::get('/rekam-medis', [DokterController::class, 'index'])->name('dokter.rekam-medis');
        Route::get('/rekam-medis/{id}', [DokterController::class, 'show'])->name('dokter.rekam-medis');
    });

    // Perawat
    Route::prefix('perawat')->middleware(['isPerawat'])->group(function () {
        Route::get('/dashboard', fn() => view('perawat.dashboard'))->name('perawat.dashboard');
        Route::get('/rekam-medis/', [PerawatController::class, 'index'])->name('perawat.rekam-medis');
        Route::get('/rekam-medis/{id}', [PerawatController::class, 'show'])->name('perawat.rekam-medis');
    });


    // Pemilik
    Route::prefix('pemilik')->middleware('isPemilik')->group(function () {
        Route::get('/dashboard', fn() => view('pemilik.dashboard'))->name('pemilik.dashboard');
        Route::get('/rekam-medis', [PemilikController::class, 'rekam'])->name('pemilik.rekam-medis');
        Route::get('/rekam-medis/{id}', [PemilikController::class, 'show'])->name('pemilik.rekam-medis');
        Route::get('/pets', [PemilikController::class, 'pets'])->name('pemilik.pets');
        Route::get('/reservasi', [PemilikController::class, 'reservasi'])->name('pemilik.reservasi');
    });


    // Resepsionis
    Route::prefix('resepsionis')->middleware('isResepsionis')->group(function () {
        Route::get('/dashboard', fn() => redirect()->route('resepsionis.pemilik'))->name('resepsionis.dashboard');
        Route::get('/pemilik', [ResepsionisController::class, 'pemilik'])->name('resepsionis.pemilik');
        Route::get('/pets', [ResepsionisController::class, 'pets'])->name('resepsionis.pets');
        Route::get('/temu-dokter', [ResepsionisController::class, 'temudokter'])->name('resepsionis.temu-dokter');
    });
});