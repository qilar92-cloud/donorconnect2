@extends('layouts.app')

@section('title', 'Dashboard Petugas PMR')

@push('styles')
    @vite('resources/css/dashboard/petugas.css')
@endpush

@php
    use App\Models\Pendonor;
    use App\Models\KegiatanDonor;
    use App\Models\HasilDonor;

    $totalPendonor = $jumlahPendonor ?? Pendonor::count();
    $totalKegiatan = $jumlahKegiatan ?? KegiatanDonor::count();
    $totalHasil = $jumlahHasil ?? HasilDonor::count();

    $kantongHariIni = $jumlahKantongHariIni
        ?? HasilDonor::whereDate('tanggal_donor', today())->sum('jumlah_kantong');

    $kegiatanTerdekat = $kegiatanTerdekat
        ?? KegiatanDonor::whereDate('tanggal', '>=', today())
            ->orderBy('tanggal', 'asc')
            ->take(3)
            ->get();

    $bulan = [
        'Jan', 'Feb', 'Mar', 'Apr', 'Mei', 'Jun',
        'Jul', 'Agu', 'Sep', 'Okt', 'Nov', 'Des'
    ];

    $grafikDonor = [];

    for ($i = 1; $i <= 12; $i++) {
        $grafikDonor[] = HasilDonor::whereMonth('tanggal_donor', $i)
            ->whereYear('tanggal_donor', now()->year)
            ->sum('jumlah_kantong');
    }

    $nilaiMaksimal = max($grafikDonor);

    if ($nilaiMaksimal <= 0) {
        $nilaiMaksimal = 1;
    }

    $totalDonorTahun = array_sum($grafikDonor);
    $donorTertinggi = max($grafikDonor);
@endphp

@section('content')

<div class="petugas-dashboard">

    {{-- Header --}}
    <section class="dashboard-hero">

        <div class="hero-decoration hero-circle-one"></div>
        <div class="hero-decoration hero-circle-two"></div>

        <div class="hero-content">

            <div class="hero-label">
                <span class="hero-dot"></span>
                DONORCONNECT
                <span class="hero-divider">•</span>
                PETUGAS PMR
            </div>

            <h1>
                Dashboard Petugas PMR
            </h1>

            <p>
                Kelola data pendonor, kegiatan donor, hasil donor,
                riwayat, dan laporan dengan lebih mudah.
            </p>

            <div class="hero-date">
                <i class="fas fa-calendar-alt"></i>
                {{ now()->translatedFormat('l, d F Y') }}
            </div>

        </div>

        <div class="hero-illustration">

            <div class="hero-heart">
                <i class="fas fa-heartbeat"></i>
            </div>

            <span class="hero-small-circle circle-a"></span>
            <span class="hero-small-circle circle-b"></span>
            <span class="hero-small-circle circle-c"></span>

        </div>

    </section>


    {{-- Statistik --}}
    <section class="stats-grid">

        <a
            href="{{ route('pendonor.index') }}"
            class="stat-card"
        >

            <div class="stat-card-top">

                <span class="stat-label">
                    TOTAL PENDONOR
                </span>

                <div class="stat-icon pink">
                    <i class="fas fa-users"></i>
                </div>

            </div>

            <div class="stat-number">
                {{ $totalPendonor }}
            </div>

            <div class="stat-bottom">

                <span>
                    Data pendonor terdaftar
                </span>

                <i class="fas fa-arrow-right"></i>

            </div>

        </a>


        <a
            href="{{ route('kegiatan-donor.index') }}"
            class="stat-card"
        >

            <div class="stat-card-top">

                <span class="stat-label">
                    KEGIATAN DONOR
                </span>

                <div class="stat-icon blue">
                    <i class="fas fa-calendar-alt"></i>
                </div>

            </div>

            <div class="stat-number">
                {{ $totalKegiatan }}
            </div>

            <div class="stat-bottom">

                <span>
                    Total kegiatan donor
                </span>

                <i class="fas fa-arrow-right"></i>

            </div>

        </a>


        <a
            href="{{ route('hasil-donor.create') }}"
            class="stat-card"
        >

            <div class="stat-card-top">

                <span class="stat-label">
                    HASIL DONOR
                </span>

                <div class="stat-icon purple">
                    <i class="fas fa-notes-medical"></i>
                </div>

            </div>

            <div class="stat-number">
                {{ $totalHasil }}
            </div>

            <div class="stat-bottom">

                <span>
                    Donor yang telah dicatat
                </span>

                <i class="fas fa-arrow-right"></i>

            </div>

        </a>


        <a
            href="{{ route('riwayat-donor.index') }}"
            class="stat-card"
        >

            <div class="stat-card-top">

                <span class="stat-label">
                    KANTONG HARI INI
                </span>

                <div class="stat-icon red">
                    <i class="fas fa-tint"></i>
                </div>

            </div>

            <div class="stat-number">
                {{ $kantongHariIni }}
            </div>

            <div class="stat-bottom">

                <span>
                    Kantong darah terkumpul
                </span>

                <i class="fas fa-arrow-right"></i>

            </div>

        </a>

    </section>


    {{-- Konten --}}
    <section class="main-grid">

        {{-- Kegiatan --}}
        <div class="dashboard-card activity-card">

            <div class="card-heading">

                <div class="heading-icon">
                    <i class="fas fa-calendar-check"></i>
                </div>

                <div class="heading-text">

                    <span class="heading-label">
                        KEGIATAN
                    </span>

                    <h2>
                        Kegiatan Terdekat
                    </h2>

                    <p>
                        Kegiatan donor yang akan datang
                    </p>

                </div>

                <a
                    href="{{ route('kegiatan-donor.index') }}"
                    class="heading-link"
                >
                    Lihat semua
                    <i class="fas fa-arrow-right"></i>
                </a>

            </div>


            <div class="activity-list">

                @forelse ($kegiatanTerdekat as $kegiatan)

                    <div class="activity-item">

                        <div class="activity-date">

                            <strong>
                                {{ \Carbon\Carbon::parse($kegiatan->tanggal)->format('d') }}
                            </strong>

                            <span>
                                {{ \Carbon\Carbon::parse($kegiatan->tanggal)->format('M') }}
                            </span>

                        </div>


                        <div class="activity-content">

                            <span class="activity-status">

                                <span></span>

                                KEGIATAN DONOR

                            </span>

                            <h3>
                                {{ $kegiatan->nama_kegiatan }}
                            </h3>

                            <div class="activity-details">

                                <span>
                                    <i class="fas fa-clock"></i>
                                    {{ $kegiatan->waktu }}
                                </span>

                                <span>
                                    <i class="fas fa-map-marker-alt"></i>
                                    {{ $kegiatan->lokasi }}
                                </span>

                            </div>

                        </div>


                        <div class="activity-arrow">
                            <i class="fas fa-chevron-right"></i>
                        </div>

                    </div>

                @empty

                    <div class="empty-state">

                        <div class="empty-icon">
                            <i class="fas fa-calendar-times"></i>
                        </div>

                        <h3>
                            Belum ada kegiatan
                        </h3>

                        <p>
                            Kegiatan donor yang tersedia akan muncul di sini.
                        </p>

                    </div>

                @endforelse

            </div>

        </div>


        {{-- Grafik --}}
        <div class="dashboard-card donor-chart-card">

            <div class="donor-chart-header">

                <div class="donor-chart-title">

                    <div class="donor-chart-icon">
                        <i class="fas fa-chart-line"></i>
                    </div>

                    <div>

                        <span>
                            STATISTIK DONOR
                        </span>

                        <h2>
                            Perkembangan Donor
                        </h2>

                        <p>
                            Jumlah kantong darah tahun {{ now()->year }}
                        </p>

                    </div>

                </div>


                <div class="donor-chart-total">

                    <small>
                        Total
                    </small>

                    <strong>
                        {{ $totalDonorTahun }}
                    </strong>

                    <span>
                        kantong
                    </span>

                </div>

            </div>


            <div class="donor-chart-area">

                <div class="donor-chart-grid">
                    <span></span>
                    <span></span>
                    <span></span>
                    <span></span>
                </div>


                <div class="donor-chart-bars">

                    @foreach ($grafikDonor as $index => $jumlah)

                        @php
                            $tinggi = ($jumlah / $nilaiMaksimal) * 100;

                            if ($jumlah == 0) {
                                $tinggi = 3;
                            }

                            $bulanAktif =
                                $jumlah == $donorTertinggi &&
                                $jumlah > 0;
                        @endphp


                        <div class="donor-chart-column">

                            <div class="donor-chart-number">
                                {{ $jumlah }}
                            </div>


                            <div class="donor-chart-track">

                                <div
                                    class="donor-chart-bar {{ $bulanAktif ? 'highest' : '' }}"
                                    style="height: {{ $tinggi }}%;"
                                ></div>

                            </div>


                            <span class="donor-chart-month">
                                {{ $bulan[$index] }}
                            </span>

                        </div>

                    @endforeach

                </div>

            </div>


            <div class="donor-chart-footer">

                <div class="donor-chart-indicator">

                    <span></span>

                    <p>
                        Data donor {{ now()->year }}
                    </p>

                </div>


                <div class="donor-chart-info">

                    <i class="fas fa-tint"></i>

                    <strong>
                        {{ $donorTertinggi }}
                    </strong>

                    <span>
                        tertinggi
                    </span>

                </div>

            </div>

        </div>

    </section>

</div>

@endsection