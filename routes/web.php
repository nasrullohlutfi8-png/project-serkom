<?php

use App\Http\Controllers\AuthController;
use App\Http\Controllers\BeritaController;
use App\Http\Controllers\DashboardAdminController;
use App\Http\Controllers\EkstrakulikulerController;
use App\Http\Controllers\GaleriController;
use App\Http\Controllers\GuruController;
use App\Http\Controllers\PengumumanController;
use App\Http\Controllers\PrestasiController;
use App\Http\Controllers\ProfilSekolahController;
use App\Http\Controllers\SiswaController;
use App\Http\Controllers\UserController;
use Illuminate\Support\Facades\Route;
use App\Http\Controllers\LandingController;

Route::get('/', [LandingController::class, 'index'])
    ->name('landing');

Route::get('/profil-saya', [LandingController::class, 'profil'])
    ->name('profil-saya');

Route::get('/berita-sekolah', [BeritaController::class, 'publicIndex'])
    ->name('berita.public.index');

Route::get('/berita-sekolah/{slug}', [BeritaController::class, 'publicShow'])
    ->name('berita.public.show');

Route::get('/prestasi-sekolah', [PrestasiController::class, 'publicIndex'])
    ->name('prestasi.public.index');

Route::get('/prestasi-sekolah/{slug}', [PrestasiController::class, 'publicShow'])
    ->name('prestasi.public.show');

Route::get('/ekstrakulikuler-sekolah', [EkstrakulikulerController::class, 'publicIndex'])
    ->name('ekstrakulikuler.public.index');

Route::get('/ekstrakulikuler-sekolah/{slug}', [EkstrakulikulerController::class, 'publicShow'])
    ->name('ekstrakulikuler.public.show');

Route::get('/profil-sekolah', [ProfilSekolahController::class, 'publicIndex'])
    ->name('profil.public.index');


Route::prefix('guru-sekolah')->name('guru.public.')->group(function () {
 
    // Semua guru
    Route::get('/', [GuruController::class, 'publicIndex'])
        ->name('index');

    // Detail satu guru
    Route::get('/{id}', [GuruController::class, 'publicShow'])
        ->name('show');

});

Route::middleware('guest')->group(function () {

    Route::get('/login', [AuthController::class, 'showLoginForm'])
        ->name('login');

    Route::post('/login', [AuthController::class, 'login'])
        ->name('login.store');
});

Route::middleware('auth')->group(function () {

    Route::post('/logout', [AuthController::class, 'logout'])
        ->name('logout');

    Route::get('/dashboard', [DashboardAdminController::class, 'index'])
        ->name('dashboard');

    Route::middleware('role:admin')->group(function () {

        Route::get('/profil', [ProfilSekolahController::class, 'index'])
            ->name('profil.index');

        Route::get('/profil/edit', [ProfilSekolahController::class, 'edit'])
            ->name('profil.edit');

        Route::put('/profil/update', [ProfilSekolahController::class, 'update'])
            ->name('profil.update');

        Route::resource('user', UserController::class);
    });

    Route::middleware('role:admin,operator')->group(function () {

        Route::resource('guru', GuruController::class);

        Route::resource('siswa', SiswaController::class);

        Route::resource('prestasi', PrestasiController::class)->except(['show']);

        Route::resource('ekstrakulikuler', EkstrakulikulerController::class);

        Route::resource('pengumuman', PengumumanController::class)->except(['show']);

        Route::resource('berita', BeritaController::class)->except(['show']);
        

        Route::resource('galeri', GaleriController::class)->except(['show']);
    });

});