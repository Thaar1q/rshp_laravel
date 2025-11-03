<?php

use Illuminate\Support\Facades\Route;
use App\Http\Controllers\Admin\AdminController;
use App\Http\Controllers\Admin\ {
    RoleController, UserController, PetController, JenisHewanController
};
use App\Http\Controllers\auth\LoginController;
use App\Http\Controllers\dokter\DokterController;
use App\Http\Controllers\pemilik\PemilikController;
use App\Http\Controllers\perawat\PerawatController;
use App\Http\Controllers\resepsionis\ResepsionisController;
use App\Http\Controllers\site\KontakController;
use App\Http\Controllers\site\LayananController;
use App\Http\Controllers\site\OrganisasiController;
use App\Http\Controllers\site\SiteController;

Route::get('/', function () {
    return view('site.home');
});

/* =========================================================
   ROUTE SITUS UTAMA
   ========================================================= */
// RSHP
Route::get('/home', [SiteController::class, 'index'])->name('home');
Route::get('/layanan', [LayananController::class, 'index'])->name('layanan');
Route::get('/kontak', [KontakController::class, 'index'])->name('kontak');
Route::get('/organisasi', [OrganisasiController::class, 'index'])->name('organisasi');

// Login & logout
Route::get('/login', [LoginController::class, 'index'])->name('login');
Route::post('/login', [LoginController::class, 'processLogin'])->name('login.process');
Route::post('/logout', [LoginController::class, 'logout'])->name('logout');



/* =========================================================
   ROUTE PER ROLE
   ========================================================= */
   Auth::routes();

// Admin
Route::middleware('isAdmin')->prefix('admin')->name('admin.')->group(function () {
    Route::get('/dashboard', [AdminController::class, 'dashboard'])->name('dashboard');

    Route::get('/user', [UserController::class, 'index'])->name('user.index');
    Route::post('/user/store', [UserController::class, 'store'])->name('user.store');
    Route::post('/user/edit/{user}', [UserController::class, 'edit'])->name('user.edit');
    Route::post('/user/delete/{user}', [UserController::class, 'delete'])->name('user.delete');

    Route::get('/role', [RoleController::class, 'index'])->name('role.index');
    Route::post('/role/store', [RoleController::class, 'store'])->name('role.store');
    Route::post('/role/edit/{role}', [RoleController::class, 'edit'])->name('role.edit');
    Route::post('/role/delete/{role}', [RoleController::class, 'delete'])->name('role.delete');
    Route::post('/user/{user}/role/{role}/toggle', [UserController::class, 'toggleRole'])->name('user.role.toggle');

    Route::get('/pet', [PetController::class, 'index'])->name('pet');
    Route::post('/pet/store', [PetController::class, 'store'])->name('pet.store');
    Route::post('/pet/edit/{pet}', [PetController::class, 'edit'])->name('pet.edit');
    Route::post('/pet/delete/{pet}', [PetController::class, 'delete'])->name('pet.delete');

    Route::get('/jenis-hewan', [JenisHewanController::class, 'index'])->name('jenis-hewan');
    Route::post('/jenis-hewan/store', [JenisHewanController::class, 'store'])->name('jenis-hewan.store');
    Route::post('/jenis-hewan/edit/{jenis}', [JenisHewanController::class, 'edit'])->name('jenis-hewan.edit');
    Route::post('/jenis-hewan/delete/{jenis}', [JenisHewanController::class, 'delete'])->name('jenis-hewan.delete');


    Route::get('/ras-hewan', [AdminController::class, 'rasHewan'])->name('ras-hewan');
    Route::get('/kategori', [AdminController::class, 'kategori'])->name('kategori');
    Route::get('/kategori-klinis', [AdminController::class, 'kategoriKlinis'])->name('kategori-klinis');
    Route::get('/kode-tindakan', [AdminController::class, 'kodeTindakan'])->name('kode-tindakan');
});
// Dokter
Route::middleware('isDokter')->prefix('dokter')->name('dokter.')->group(function () {
    Route::get('/dashboard', fn() => view('dokter.dashboard'))->name('dashboard');
    Route::get('/rekam-medis', [DokterController::class, 'index'])->name('rekam-medis');
    Route::get('/rekam-medis/{id}', [DokterController::class, 'show'])->name('rekam-medis');
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