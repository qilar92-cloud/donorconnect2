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

/*
|--------------------------------------------------------------------------
| PUBLIC
|--------------------------------------------------------------------------
*/

// Halaman utama DonorConnect
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

/*
|--------------------------------------------------------------------------
| AUTHENTICATED
|--------------------------------------------------------------------------
*/

Route::middleware('auth')->group(function () {

    // Dashboard
    Route::get('/dashboard', function () {
        return view('pages.dashboard.index');
    })->name('dashboard');

    // Logout
    Route::post('/logout', [LoginController::class, 'logout'])
        ->name('logout');

    // Profile
    Route::get('/profile', [ProfileController::class, 'show'])
        ->name('profile');

    Route::put('/profile', [ProfileController::class, 'update'])
        ->name('profile.update');

    // Pendonor
    Route::get('/pendonor', [PendonorController::class, 'index'])
        ->name('pendonor.index');

    Route::get('/pendonor/kegiatan', [PendonorController::class, 'daftarKegiatanDonor'])
        ->name('pendonor.kegiatan');

    Route::get('/pendonor/riwayat', [PendonorController::class, 'lihatRiwayatDonor'])
        ->name('pendonor.riwayat');

    // Kegiatan Donor
    Route::get('/kegiatan-donor', [KegiatanDonorController::class, 'index'])
        ->name('kegiatan-donor.index');

    Route::get('/kegiatan-donor/create', [KegiatanDonorController::class, 'create'])
        ->name('kegiatan-donor.create');

    Route::get('/kegiatan-donor/{id}/edit', [KegiatanDonorController::class, 'edit'])
        ->name('kegiatan-donor.edit');

    Route::get('/kegiatan-donor/{id}', [KegiatanDonorController::class, 'show'])
        ->name('kegiatan-donor.show');

    Route::post('/kegiatan-donor', [KegiatanDonorController::class, 'store'])
        ->name('kegiatan-donor.store');

    Route::put('/kegiatan-donor/{id}', [KegiatanDonorController::class, 'update'])
        ->name('kegiatan-donor.update');

    Route::delete('/kegiatan-donor/{id}', [KegiatanDonorController::class, 'destroy'])
        ->name('kegiatan-donor.destroy');

    // Pendaftaran Donor
    Route::post('/pendaftaran-donor', [PendaftaranDonorController::class, 'store'])
        ->name('pendaftaran-donor.store');

    // Hasil Donor
    Route::post('/hasil-donor', [HasilDonorController::class, 'store'])
        ->name('hasil-donor.store');

    // Riwayat Donor
    Route::get('/riwayat-donor', [RiwayatDonorController::class, 'index'])
        ->name('riwayat-donor.index');

    Route::post('/riwayat-donor/{id_pendonor}/{id_hasil}', [RiwayatDonorController::class, 'store'])
        ->name('riwayat-donor.store');

    // Laporan Donor
    Route::get('/laporan-donor', [LaporanDonorController::class, 'index'])
        ->name('laporan-donor.index');

    Route::get('/laporan-donor/filter', [LaporanDonorController::class, 'filter'])
        ->name('laporan-donor.filter');
});