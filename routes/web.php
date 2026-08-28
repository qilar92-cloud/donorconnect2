<?php

use App\Http\Controllers\Auth\LoginController;
use App\Http\Controllers\Auth\RegisterController;
use App\Http\Controllers\HasilDonorController;
use App\Http\Controllers\KegiatanDonorController;
use App\Http\Controllers\LaporanDonorController;
use App\Http\Controllers\PendaftaranDonorController;
use App\Http\Controllers\PendonorController;
use App\Http\Controllers\ProfileController;
use App\Http\Controllers\RiwayatDonorController;
use Illuminate\Support\Facades\Route;

Route::get('/', function () {
    return view('pages.landing.index');
})->name('landing');

Route::get('/login', [LoginController::class, 'showLoginForm'])
    ->name('login');

Route::post('/login', [LoginController::class, 'login'])
    ->name('login.submit');

Route::get('/register', [RegisterController::class, 'showRegistrationForm'])
    ->name('register');

Route::post('/register', [RegisterController::class, 'register'])
    ->name('register.submit');

Route::middleware('auth')->group(function () {

    Route::post('/logout', [LoginController::class, 'logout'])
        ->name('logout');

    Route::get('/profile', [ProfileController::class, 'show'])
        ->name('profile');

    Route::put('/profile', [ProfileController::class, 'update'])
        ->name('profile.update');

    Route::middleware('role:pendonor')->group(function () {

        Route::get('/dashboard', function () {

            $jumlahKegiatan = \App\Models\KegiatanDonor::count();

            return view('pages.dashboard.index', [
                'jumlahKegiatan' => $jumlahKegiatan,
            ]);

        })->name('dashboard');

        Route::get('/pendonor/kegiatan', [
            PendonorController::class,
            'daftarKegiatanDonor'
        ])->name('pendonor.kegiatan');

        Route::get('/pendonor/kegiatan/{id}', [
            KegiatanDonorController::class,
            'show'
        ])->name('pendonor.kegiatan.show');

        Route::post('/pendaftaran-donor', [
            PendaftaranDonorController::class,
            'store'
        ])->name('pendaftaran-donor.store');

        Route::get('/pendonor/riwayat', [
            PendonorController::class,
            'lihatRiwayatDonor'
        ])->name('pendonor.riwayat');
    });

    Route::middleware('role:petugas')->group(function () {

        Route::get('/petugas/dashboard', function () {
            return view('pages.dashboard.petugas');
        })->name('dashboard.petugas');

        Route::get('/kegiatan-donor', [
            KegiatanDonorController::class,
            'index'
        ])->name('kegiatan-donor.index');

        Route::get('/kegiatan-donor/create', [
            KegiatanDonorController::class,
            'create'
        ])->name('kegiatan-donor.create');

        Route::post('/kegiatan-donor', [
            KegiatanDonorController::class,
            'store'
        ])->name('kegiatan-donor.store');

        Route::get('/kegiatan-donor/{id}', [
            KegiatanDonorController::class,
            'show'
        ])->name('kegiatan-donor.show');

        Route::get('/kegiatan-donor/{id}/edit', [
            KegiatanDonorController::class,
            'edit'
        ])->name('kegiatan-donor.edit');

        Route::put('/kegiatan-donor/{id}', [
            KegiatanDonorController::class,
            'update'
        ])->name('kegiatan-donor.update');

        Route::delete('/kegiatan-donor/{id}', [
            KegiatanDonorController::class,
            'destroy'
        ])->name('kegiatan-donor.destroy');

        Route::get('/hasil-donor/create', [
            HasilDonorController::class,
            'create'
        ])->name('hasil-donor.create');

        Route::post('/hasil-donor', [
            HasilDonorController::class,
            'store'
        ])->name('hasil-donor.store');

        Route::get('/riwayat-donor', [
            RiwayatDonorController::class,
            'index'
        ])->name('riwayat-donor.index');

        Route::post('/riwayat-donor/{id_pendonor}/{id_hasil}', [
            RiwayatDonorController::class,
            'store'
        ])->name('riwayat-donor.store');

        Route::get('/laporan-donor', [
            LaporanDonorController::class,
            'index'
        ])->name('laporan-donor.index');

        Route::get('/laporan-donor/filter', [
            LaporanDonorController::class,
            'filter'
        ])->name('laporan-donor.filter');

        Route::get('/pendonor', [
            PendonorController::class,
            'index'
        ])->name('pendonor.index');
    });
});