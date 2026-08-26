@extends('layouts.app')

@section('title', 'Dashboard Petugas PMR - DonorConnect')

@section('content')

<div class="d-sm-flex align-items-center justify-content-between mb-4">
    <h1 class="h3 mb-0 text-gray-800">Dashboard Petugas PMR</h1>
</div>

<!-- Welcome -->
<div class="row">
    <div class="col-xl-12 col-md-12 mb-4">
        <div class="card border-left-primary shadow h-100 py-2">
            <div class="card-body">
                <div class="row no-gutters align-items-center">

                    <div class="col mr-2">
                        <div class="text-xs font-weight-bold text-primary text-uppercase mb-1">
                            DonorConnect
                        </div>

                        <div class="h5 mb-0 font-weight-bold text-gray-800">
                            Selamat Datang, Petugas PMR!
                        </div>

                        <p class="mt-2 mb-0 text-gray-600">
                            Kelola data pendonor, kegiatan donor, hasil donor, dan laporan donor.
                        </p>
                    </div>

                    <div class="col-auto">
                        <i class="fas fa-heartbeat fa-3x text-gray-300"></i>
                    </div>

                </div>
            </div>
        </div>
    </div>
</div>

<!-- Menu Petugas -->
<div class="row">

    <!-- Data Pendonor -->
    <div class="col-xl-3 col-md-6 mb-4">
        <div class="card border-left-primary shadow h-100 py-2">
            <div class="card-body">

                <div class="row no-gutters align-items-center">
                    <div class="col mr-2">

                        <div class="text-xs font-weight-bold text-primary text-uppercase mb-1">
                            Data Pendonor
                        </div>

                        <div class="h6 mb-0 font-weight-bold text-gray-800">
                            Kelola Data Pendonor
                        </div>

                    </div>

                    <div class="col-auto">
                        <i class="fas fa-users fa-2x text-gray-300"></i>
                    </div>
                </div>

                <a href="{{ route('pendonor.index') }}"
                   class="btn btn-primary btn-sm mt-3">
                    Kelola
                </a>

            </div>
        </div>
    </div>

    <!-- Kegiatan Donor -->
    <div class="col-xl-3 col-md-6 mb-4">
        <div class="card border-left-success shadow h-100 py-2">
            <div class="card-body">

                <div class="row no-gutters align-items-center">
                    <div class="col mr-2">

                        <div class="text-xs font-weight-bold text-success text-uppercase mb-1">
                            Kegiatan Donor
                        </div>

                        <div class="h6 mb-0 font-weight-bold text-gray-800">
                            Kelola Kegiatan Donor
                        </div>

                    </div>

                    <div class="col-auto">
                        <i class="fas fa-calendar-alt fa-2x text-gray-300"></i>
                    </div>
                </div>

                <a href="{{ route('kegiatan-donor.index') }}"
                   class="btn btn-success btn-sm mt-3">
                    Kelola
                </a>

            </div>
        </div>
    </div>

    <!-- Catat Hasil Donor -->
    <div class="col-xl-3 col-md-6 mb-4">
        <div class="card border-left-warning shadow h-100 py-2">
            <div class="card-body">

                <div class="row no-gutters align-items-center">
                    <div class="col mr-2">

                        <div class="text-xs font-weight-bold text-warning text-uppercase mb-1">
                            Hasil Donor
                        </div>

                        <div class="h6 mb-0 font-weight-bold text-gray-800">
                            Catat Hasil Donor
                        </div>

                    </div>

                    <div class="col-auto">
                        <i class="fas fa-notes-medical fa-2x text-gray-300"></i>
                    </div>
                </div>

                <a href="{{ route('hasil-donor.create') }}"
                   class="btn btn-warning btn-sm mt-3">
                    Catat
                </a>

            </div>
        </div>
    </div>

    <!-- Laporan Donor -->
    <div class="col-xl-3 col-md-6 mb-4">
        <div class="card border-left-info shadow h-100 py-2">
            <div class="card-body">

                <div class="row no-gutters align-items-center">
                    <div class="col mr-2">

                        <div class="text-xs font-weight-bold text-info text-uppercase mb-1">
                            Laporan Donor
                        </div>

                        <div class="h6 mb-0 font-weight-bold text-gray-800">
                            Lihat Laporan Donor
                        </div>

                    </div>

                    <div class="col-auto">
                        <i class="fas fa-file-alt fa-2x text-gray-300"></i>
                    </div>
                </div>

                <a href="{{ route('laporan-donor.index') }}"
                   class="btn btn-info btn-sm mt-3">
                    Lihat
                </a>

            </div>
        </div>
    </div>

</div>

@endsection