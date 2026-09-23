<?php

use App\Http\Controllers\Auth\LoginController;
use App\Http\Controllers\Auth\RegisterController;
use App\Http\Controllers\Auth\PetugasLoginController;
use App\Http\Controllers\DokumentasiDonorController;
use App\Http\Controllers\HasilDonorController;
use App\Http\Controllers\KegiatanDonorController;
use App\Http\Controllers\LaporanDonorController;
use App\Http\Controllers\PendaftaranDonorController;
use App\Http\Controllers\PendonorController;
use App\Http\Controllers\ProfileController;
use App\Http\Controllers\RiwayatDonorController;
use App\Models\DokumentasiDonor;
use App\Models\KegiatanDonor;
use Illuminate\Support\Facades\Route;


// Landing

Route::get('/', function () {
    return view('pages.landing.index');
})->name('landing');


// Login Pendonor

Route::get('/login', [
    LoginController::class,
    'showLoginForm',
])->name('login');

Route::post('/login', [
    LoginController::class,
    'login',
])->name('login.submit');


// Register Pendonor

Route::get('/register', [
    RegisterController::class,
    'showRegistrationForm',
])->name('register');

Route::post('/register', [
    RegisterController::class,
    'register',
])->name('register.submit');


// Login Petugas

Route::get('/login-petugas', [
    PetugasLoginController::class,
    'showLoginForm',
])->name('login.petugas');

Route::post('/login-petugas', [
    PetugasLoginController::class,
    'login',
])->name('login.petugas.submit');


// Auth

Route::middleware('auth')->group(function () {

    // Logout

    Route::post('/logout', [
        LoginController::class,
        'logout',
    ])->name('logout');


    // Profile Pendonor

    Route::middleware('role:pendonor')->group(function () {

        Route::get('/profile-pendonor', [
            ProfileController::class,
            'show',
        ])->name('profile.pendonor');

        Route::get('/profile-pendonor/edit', [
            ProfileController::class,
            'edit',
        ])->name('profile.pendonor.edit');

        Route::put('/profile-pendonor', [
            ProfileController::class,
            'update',
        ])->name('profile.pendonor.update');
    });


    // Profile Petugas

    Route::middleware('role:petugas')->group(function () {

        Route::get('/profile-petugas', [
            ProfileController::class,
            'show',
        ])->name('profile.petugas');

        Route::get('/profile-petugas/edit', [
            ProfileController::class,
            'edit',
        ])->name('profile.petugas.edit');

        Route::put('/profile-petugas', [
            ProfileController::class,
            'update',
        ])->name('profile.petugas.update');
    });


    // Pendonor

    Route::middleware('role:pendonor')->group(function () {

        // Status Pendaftaran

        Route::get('/status-pendaftaran', [
            PendaftaranDonorController::class,
            'status',
        ])->name('pendonor.status');


        // Dashboard Pendonor

        Route::get('/dashboard', function () {

            $jumlahKegiatan = KegiatanDonor::count();

            $dokumentasi = DokumentasiDonor::latest()
                ->take(6)
                ->get();

            return view('pages.dashboard.pendonor', [
                'jumlahKegiatan' => $jumlahKegiatan,
                'dokumentasi' => $dokumentasi,
            ]);

        })->name('dashboard');


        // Semua Dokumentasi

        Route::get('/pendonor/dokumentasi', [
            DokumentasiDonorController::class,
            'pendonor',
        ])->name('pendonor.dokumentasi');


        // Kegiatan Donor

        Route::get('/pendonor/kegiatan', [
            PendonorController::class,
            'daftarKegiatanDonor',
        ])->name('pendonor.kegiatan');

        Route::get('/pendonor/kegiatan/{id}', [
            KegiatanDonorController::class,
            'detailPendonor',
        ])->name('pendonor.kegiatan.show');


        // Pendaftaran Donor

        Route::get('/pendaftaran-donor/{id_kegiatan}', [
            PendaftaranDonorController::class,
            'create',
        ])->name('pendaftaran-donor.create');

        Route::post('/pendaftaran-donor', [
            PendaftaranDonorController::class,
            'store',
        ])->name('pendaftaran-donor.store');


        // Riwayat Donor

        Route::get('/pendonor/riwayat', [
            PendonorController::class,
            'lihatRiwayatDonor',
        ])->name('pendonor.riwayat');
    });


    // Petugas

    Route::middleware('role:petugas')->group(function () {

        // Dashboard Petugas

        Route::get('/petugas/dashboard', function () {
            return view('pages.dashboard.petugas');
        })->name('dashboard.petugas');


        // Kegiatan Donor

        Route::get('/kegiatan-donor', [
            KegiatanDonorController::class,
            'index',
        ])->name('kegiatan-donor.index');

        Route::get('/kegiatan-donor/create', [
            KegiatanDonorController::class,
            'create',
        ])->name('kegiatan-donor.create');

        Route::post('/kegiatan-donor', [
            KegiatanDonorController::class,
            'store',
        ])->name('kegiatan-donor.store');

        Route::get('/kegiatan-donor/{id}', [
            KegiatanDonorController::class,
            'show',
        ])->name('kegiatan-donor.show');

        Route::get('/kegiatan-donor/{id}/edit', [
            KegiatanDonorController::class,
            'edit',
        ])->name('kegiatan-donor.edit');

        Route::put('/kegiatan-donor/{id}', [
            KegiatanDonorController::class,
            'update',
        ])->name('kegiatan-donor.update');

        Route::delete('/kegiatan-donor/{id}', [
            KegiatanDonorController::class,
            'destroy',
        ])->name('kegiatan-donor.destroy');


        // Dokumentasi Donor

        Route::post(
            '/kegiatan-donor/{id_kegiatan}/dokumentasi',
            [DokumentasiDonorController::class, 'store']
        )->name('dokumentasi-donor.store');

        Route::delete(
            '/dokumentasi-donor/{id_dokumentasi}',
            [DokumentasiDonorController::class, 'destroy']
        )->name('dokumentasi-donor.destroy');


        // Hasil Donor

        Route::get('/hasil-donor/create', [
            HasilDonorController::class,
            'create',
        ])->name('hasil-donor.create');

        Route::post('/hasil-donor', [
            HasilDonorController::class,
            'store',
        ])->name('hasil-donor.store');


        // Riwayat Donor

        Route::get('/riwayat-donor', [
            RiwayatDonorController::class,
            'index',
        ])->name('riwayat-donor.index');

        Route::post('/riwayat-donor/{id_pendonor}/{id_hasil}', [
            RiwayatDonorController::class,
            'store',
        ])->name('riwayat-donor.store');


        // Laporan Donor

        Route::get('/laporan-donor', [
            LaporanDonorController::class,
            'index',
        ])->name('laporan-donor.index');

        Route::get('/laporan-donor/filter', [
            LaporanDonorController::class,
            'filter',
        ])->name('laporan-donor.filter');


        // Data Pendonor

        Route::get('/pendonor', [
            PendonorController::class,
            'dataPendonor',
        ])->name('pendonor.index');

        Route::get('/pendonor/{id}', [
            PendonorController::class,
            'show',
        ])->name('pendonor.show');

        Route::get('/pendonor/{id}/edit', [
            PendonorController::class,
            'edit',
        ])->name('pendonor.edit');

        Route::put('/pendonor/{id}', [
            PendonorController::class,
            'update',
        ])->name('pendonor.update');

        Route::delete('/pendonor/{id}', [
            PendonorController::class,
            'destroy',
        ])->name('pendonor.destroy');
    });
});