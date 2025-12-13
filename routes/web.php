<?php

use App\Http\Controllers\Auth\LoginController;
use App\Http\Controllers\{Site, Admin, Dokter, Pemilik, Perawat, Resepsionis};
use Illuminate\Support\Facades\Route;

/*---------------------------------------------------------
|  ROUTE GROUP: MAIN WEB
|----------------------------------------------------------*/
/* === RSHP ============================================== */
Route::get('/', function () {
	return view('site.home');
});
Route::get('/home', [Site\SiteController::class, 'index'])->name('home');
Route::get('/layanan', [Site\LayananController::class, 'index'])->name('layanan');
Route::get('/kontak', [Site\KontakController::class, 'index'])->name('kontak');
Route::get('/organisasi', [Site\OrganisasiController::class, 'index'])->name('organisasi');

/* === LOGIN DAN LOGOUT ================================== */
Route::get('/login', [LoginController::class, 'index'])->name('login');
Route::post('/login', [LoginController::class, 'processLogin'])->name('login.process');
Route::post('/logout', [LoginController::class, 'logout'])->name('logout');

/* === DASHBOARD ========================================= */
Route::middleware('auth')->get('/dashboard', [Site\DashboardController::class, 'index'])->name('dashboard');
Route::middleware('auth')->get('/profile', [Site\ProfileController::class, 'index'])->name('profile');

/*---------------------------------------------------------
|  ROUTE GROUP: ROLE-BASED ACCESS
|----------------------------------------------------------*/
Auth::routes();

/* === ADMINISTRATOR ==================================== */
Route::middleware('isAdmin')->prefix('admin')->name('admin.')->group(function () {
	Route::get('/dashboard', [Admin\DashboardController::class, 'index'])->name('dashboard');

	Route::get('/user', [Admin\UserController::class, 'index'])->name('user.index');
	Route::post('/user/store', [Admin\UserController::class, 'store'])->name('user.store');
	Route::post('/user/edit/{user}', [Admin\UserController::class, 'edit'])->name('user.edit');
	Route::post('/user/delete/{user}', [Admin\UserController::class, 'delete'])->name('user.delete');

	Route::get('/role', [Admin\RoleController::class, 'index'])->name('role.index');
	Route::post('/role/store', [Admin\RoleController::class, 'store'])->name('role.store');
	Route::post('/role/edit/{id}', [Admin\RoleController::class, 'edit'])->name('role.edit');
	Route::post('/role/delete/{id}', [Admin\RoleController::class, 'delete'])->name('role.delete');
	Route::post('/user/{user}/role/{id}/toggle', [Admin\UserController::class, 'toggleRole'])->name('user.role.toggle');

	Route::get('/pet', [Admin\PetController::class, 'index'])->name('pet.index');
	Route::post('/pet/store', [Admin\PetController::class, 'store'])->name('pet.store');
	Route::post('/pet/edit/{pet}', [Admin\PetController::class, 'edit'])->name('pet.edit');
	Route::post('/pet/delete/{pet}', [Admin\PetController::class, 'delete'])->name('pet.delete');

	Route::get('/jenis-hewan', [Admin\JenisHewanController::class, 'index'])->name('jenis-hewan.index');
	Route::post('/jenis-hewan/store', [Admin\JenisHewanController::class, 'store'])->name('jenis-hewan.store');
	Route::post('/jenis-hewan/edit/{id}', [Admin\JenisHewanController::class, 'edit'])->name('jenis-hewan.edit');
	Route::post('/jenis-hewan/delete/{id}', [Admin\JenisHewanController::class, 'delete'])->name('jenis-hewan.delete');

	Route::get('/ras-hewan', [Admin\RasHewanController::class, 'index'])->name('ras-hewan.index');
	Route::post('/ras-hewan/store', [Admin\RasHewanController::class, 'store'])->name('ras-hewan.store');
	Route::post('/ras-hewan/edit/{ras}', [Admin\RasHewanController::class, 'edit'])->name('ras-hewan.edit');
	Route::post('/ras-hewan/delete/{ras}', [Admin\RasHewanController::class, 'delete'])->name('ras-hewan.delete');

	Route::get('/kategori', [Admin\KategoriController::class, 'index'])->name('kategori.index');
	Route::post('/kategori/store', [Admin\KategoriController::class, 'store'])->name('kategori.store');
	Route::post('/kategori/edit/{id}', [Admin\KategoriController::class, 'edit'])->name('kategori.edit');
	Route::post('/kategori/delete/{id}', [Admin\KategoriController::class, 'delete'])->name('kategori.delete');

	Route::get('/kategori-klinis', [Admin\KategoriKlinisController::class, 'index'])->name('kategori-klinis.index');
	Route::post('/kategori-klinis/store', [Admin\KategoriKlinisController::class, 'store'])->name('kategori-klinis.store');
	Route::post('/kategori-klinis/edit/{kategori}', [Admin\KategoriKlinisController::class, 'edit'])->name('kategori-klinis.edit');
	Route::post('/kategori-klinis/delete/{kategori}', [Admin\KategoriKlinisController::class, 'delete'])->name('kategori-klinis.delete');

	Route::get('/kode-tindakan', [Admin\KodeTindakanTerapiController::class, 'index'])->name('kode-tindakan.index');
	Route::post('/kode-tindakan/store', [Admin\KodeTindakanTerapiController::class, 'store'])->name('kode-tindakan.store');
	Route::post('/kode-tindakan/edit/{kode}', [Admin\KodeTindakanTerapiController::class, 'edit'])->name('kode-tindakan.edit');
	Route::post('/kode-tindakan/delete/{kode}', [Admin\KodeTindakanTerapiController::class, 'delete'])->name('kode-tindakan.delete');

	Route::get('/pemilik', [Admin\PemilikController::class, 'index'])->name('pemilik.index');
	Route::post('/pemilik/store', [Admin\PemilikController::class, 'store'])->name('pemilik.store');
	Route::post('/pemilik/edit/{id}', [Admin\PemilikController::class, 'edit'])->name('pemilik.edit');
	Route::post('/pemilik/delete/{id}', [Admin\PemilikController::class, 'delete'])->name('pemilik.delete');

	Route::get('/dokter', [Admin\DokterController::class, 'index'])->name('dokter.index');
	Route::post('/dokter/store', [Admin\DokterController::class, 'store'])->name('dokter.store');
	Route::post('/dokter/edit/{id}', [Admin\DokterController::class, 'edit'])->name('dokter.edit');
	Route::post('/dokter/delete/{id}', [Admin\DokterController::class, 'delete'])->name('dokter.delete');

	Route::get('/perawat', [Admin\PerawatController::class, 'index'])->name('perawat.index');
	Route::post('/perawat/store', [Admin\PerawatController::class, 'store'])->name('perawat.store');
	Route::post('/perawat/edit/{id}', [Admin\PerawatController::class, 'edit'])->name('perawat.edit');
	Route::post('/perawat/delete/{id}', [Admin\PerawatController::class, 'delete'])->name('perawat.delete');

	Route::get('/rekam-medis', [Admin\RekamMedisController::class, 'index'])->name('rekam-medis.index');
	Route::get('/rekam-medis/{id}', [Admin\RekamMedisController::class, 'show'])->name('rekam-medis.show');
	Route::post('/rekam-medis/delete/{id}', [Admin\RekamMedisController::class, 'delete'])->name('rekam-medis.delete');

	Route::get('/temu-dokter', [Admin\TemuDokterController::class, 'index'])->name('temu-dokter.index');
	Route::post('/temu-dokter/store', [Admin\TemuDokterController::class, 'store'])->name('temu-dokter.store');
	Route::post('/temu-dokter/edit/{id}', [Admin\TemuDokterController::class, 'edit'])->name('temu-dokter.edit');
	Route::post('/temu-dokter/delete/{id}', [Admin\TemuDokterController::class, 'delete'])->name('temu-dokter.delete');
});

/* === DOKTER ============================================== */
Route::middleware('isDokter')->prefix('dokter')->name('dokter.')->group(function () {
	Route::get('/dashboard', [Dokter\DashboardController::class, 'index'])->name('dashboard');

	Route::get('/pasien', [Dokter\DokterController::class, 'viewPasien'])->name('pasien.index');
	Route::get('/rekam-medis', [Dokter\RekamMedisController::class, 'index'])->name('rekam-medis.index');
	Route::get('/rekam-medis/{id}', [Dokter\RekamMedisController::class, 'show'])->name('rekam-medis.show');
	Route::post('/rekam-medis/{id}/detail/store', [Dokter\RekamMedisController::class, 'storeDetail'])->name('rekam-medis.detail.store');
	Route::post('/rekam-medis/{id}/detail/edit/{detailId}', [Dokter\RekamMedisController::class, 'editDetail'])->name('rekam-medis.detail.edit');
	Route::post('/rekam-medis/{id}/detail/delete/{detailId}', [Dokter\RekamMedisController::class, 'deleteDetail'])->name('rekam-medis.detail.delete');
});

/* === PERAWAT ========================================== */
Route::middleware('isPerawat')->prefix('perawat')->name('perawat.')->group(function () {
	Route::get('/dashboard', [Perawat\DashboardController::class, 'index'])->name('dashboard');

	Route::get('/pasien', [Perawat\PerawatController::class, 'viewPasien'])->name('pasien.index');
	Route::get('/rekam-medis', [Perawat\RekamMedisController::class, 'index'])->name('rekam-medis.index');
	Route::post('/rekam-medis/store', [Perawat\RekamMedisController::class, 'store'])->name('rekam-medis.store');
	Route::post('/rekam-medis/edit/{id}', [Perawat\RekamMedisController::class, 'edit'])->name('rekam-medis.edit');
	Route::post('/rekam-medis/delete/{id}', [Perawat\RekamMedisController::class, 'delete'])->name('rekam-medis.delete');
	Route::get('/rekam-medis/{id}', [Perawat\RekamMedisController::class, 'show'])->name('rekam-medis.show');
});

/* === RESEPSIONIS ====================================== */
Route::middleware('isResepsionis')->prefix('resepsionis')->name('resepsionis.')->group(function () {
	Route::get('/dashboard', [Resepsionis\DashboardController::class, 'index'])->name('dashboard');

	Route::get('/pemilik', [Resepsionis\PemilikController::class, 'index'])->name('pemilik.index');
	Route::post('/pemilik/store', [Resepsionis\PemilikController::class, 'store'])->name('pemilik.store');
	Route::post('/pemilik/edit/{pemilik}', [Resepsionis\PemilikController::class, 'edit'])->name('pemilik.edit');
	Route::post('/pemilik/delete/{pemilik}', [Resepsionis\PemilikController::class, 'delete'])->name('pemilik.delete');

	Route::get('/pet', [Resepsionis\PetController::class, 'index'])->name('pet.index');
	Route::post('/pet/store', [Resepsionis\PetController::class, 'store'])->name('pet.store');
	Route::post('/pet/edit/{pet}', [Resepsionis\PetController::class, 'edit'])->name('pet.edit');
	Route::post('/pet/delete/{pet}', [Resepsionis\PetController::class, 'delete'])->name('pet.delete');

	Route::get('/temu-dokter', [Resepsionis\TemuDokterController::class, 'index'])->name('temu-dokter.index');
	Route::post('/temu-dokter/store', [Resepsionis\TemuDokterController::class, 'store'])->name('temu-dokter.store');
	Route::post('/temu-dokter/edit/{id}', [Resepsionis\TemuDokterController::class, 'edit'])->name('temu-dokter.edit');
	Route::post('/temu-dokter/delete/{id}', [Resepsionis\TemuDokterController::class, 'delete'])->name('temu-dokter.delete');
});

/* === PEMILIK ========================================== */
Route::middleware('isPemilik')->prefix('pemilik')->name('pemilik.')->group(function () {
	Route::get('/dashboard', [Pemilik\DashboardController::class, 'index'])->name('dashboard');

	Route::get('/temu-dokter', [Pemilik\ReservasiController::class, 'index'])->name('temu-dokter.index');
	Route::get('/rekam-medis', [Pemilik\RekamMedisController::class, 'index'])->name('rekam-medis.index');
	Route::get('/rekam-medis/{id}', [Pemilik\RekamMedisController::class, 'show'])->name('rekam-medis.show');
	Route::get('/pet', [Pemilik\PetController::class, 'index'])->name('pet.index');
});
