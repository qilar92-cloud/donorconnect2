@extends('layouts.app')

@section('title', 'Dashboard Pendonor - DonorConnect')

@section('content')

<div class="d-sm-flex align-items-center justify-content-between mb-4">
    <h1 class="h3 mb-0 text-gray-800">Dashboard Pendonor</h1>
</div>

<!-- Welcome Card -->
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
                            Selamat Datang, Pendonor!
                        </div>

                        <div class="mt-2 text-gray-600">
                            Silakan lengkapi profil dan lihat kegiatan donor yang tersedia.
                        </div>
                    </div>

                    <div class="col-auto">
                        <i class="fas fa-heartbeat fa-3x text-gray-300"></i>
                    </div>

                </div>
            </div>
        </div>
    </div>
</div>

<!-- Menu Pendonor -->
<div class="row">

    <!-- Profil Saya -->
    <div class="col-xl-4 col-md-6 mb-4">
        <div class="card border-left-info shadow h-100 py-2">
            <div class="card-body">

                <div class="row no-gutters align-items-center">
                    <div class="col mr-2">

                        <div class="text-xs font-weight-bold text-info text-uppercase mb-1">
                            Profil Saya
                        </div>

                        <div class="h5 mb-0 font-weight-bold text-gray-800">
                            Data Profil Pendonor
                        </div>

                    </div>

                    <div class="col-auto">
                        <i class="fas fa-user fa-2x text-gray-300"></i>
                    </div>
                </div>

                <a href="{{ route('profile') }}"
                   class="btn btn-info btn-sm mt-3">
                    Lihat Profil
                </a>

            </div>
        </div>
    </div>

    <!-- Kegiatan Donor -->
    <div class="col-xl-4 col-md-6 mb-4">
        <div class="card border-left-success shadow h-100 py-2">
            <div class="card-body">

                <div class="row no-gutters align-items-center">
                    <div class="col mr-2">

                        <div class="text-xs font-weight-bold text-success text-uppercase mb-1">
                            Kegiatan Donor
                        </div>

                        <div class="h5 mb-0 font-weight-bold text-gray-800">
                            Kegiatan Donor Tersedia
                        </div>

                    </div>

                    <div class="col-auto">
                        <i class="fas fa-calendar-alt fa-2x text-gray-300"></i>
                    </div>
                </div>

                <a href="{{ route('pendonor.kegiatan') }}"
                   class="btn btn-success btn-sm mt-3">
                    Lihat Kegiatan
                </a>

            </div>
        </div>
    </div>

    <!-- Riwayat Donor -->
    <div class="col-xl-4 col-md-6 mb-4">
        <div class="card border-left-warning shadow h-100 py-2">
            <div class="card-body">

                <div class="row no-gutters align-items-center">
                    <div class="col mr-2">

                        <div class="text-xs font-weight-bold text-warning text-uppercase mb-1">
                            Riwayat Donor
                        </div>

                        <div class="h5 mb-0 font-weight-bold text-gray-800">
                            Riwayat Donor Saya
                        </div>

                    </div>

                    <div class="col-auto">
                        <i class="fas fa-history fa-2x text-gray-300"></i>
                    </div>
                </div>

                <a href="{{ route('pendonor.riwayat') }}"
                   class="btn btn-warning btn-sm mt-3">
                    Lihat Riwayat
                </a>

            </div>
        </div>
    </div>

</div>

@endsection