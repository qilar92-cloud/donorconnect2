@extends('layouts.app')

@section('title', 'Dashboard Pendonor - DonorConnect')

@push('styles')
    @vite('resources/css/dashboard/pendonor.css')
@endpush

@section('content')

@php
    use App\Models\KegiatanDonor;
    use App\Models\PendaftaranDonor;
    use App\Models\HasilDonor;
    use App\Models\RiwayatDonor;
    use Illuminate\Support\Facades\Auth;

    $user = Auth::user();

    $pendonor = $user->pendonor;

    $jumlahKegiatan = KegiatanDonor::count();

    $jumlahPendaftaran = $pendonor
        ? PendaftaranDonor::where('id_pendonor', $pendonor->id_pendonor)
            ->where('status_pendaftaran', '!=', 'dibatalkan')
            ->count()
        : 0;

    $jumlahRiwayat = $pendonor
        ? RiwayatDonor::where('id_pendonor', $pendonor->id_pendonor)->count()
        : 0;

    $totalDonor = $pendonor
        ? HasilDonor::where('id_pendonor', $pendonor->id_pendonor)->count()
        : 0;

    $kantongDonor = $pendonor
        ? HasilDonor::where('id_pendonor', $pendonor->id_pendonor)
            ->sum('jumlah_kantong')
        : 0;

    $kegiatanTerdekat = KegiatanDonor::whereDate('tanggal', '>=', now())
        ->orderBy('tanggal')
        ->orderBy('waktu')
        ->first();
@endphp


<div class="pendonor-dashboard">

    {{-- Hero --}}
    <section class="dashboard-hero">

        <div class="hero-background-shape shape-one"></div>
        <div class="hero-background-shape shape-two"></div>

        <div class="hero-content">

            <div class="hero-brand">
                <span class="brand-icon">
                    <i class="fas fa-heart"></i>
                </span>

                <span>DONORCONNECT</span>
            </div>

            <span class="hero-badge">
                <i class="fas fa-tint"></i>
                PENDONOR
            </span>

            <h1>
                Karena kamu,<br>
                <span>dunia jadi lebih sehat</span>
                <i class="fas fa-heart"></i>
            </h1>

            <p>
                Terima kasih telah menjadi bagian dari perubahan
                melalui donor darah.
            </p>

            <div class="hero-date">
                <i class="fas fa-calendar-alt"></i>
                {{ now()->translatedFormat('l, d F Y') }}
            </div>

        </div>

        <div class="hero-visual">

            <div class="visual-glow"></div>

            <div class="blood-bag">

                <div class="blood-bag-top"></div>

                <div class="blood-bag-body">

                    <div class="blood-label">
                        <i class="fas fa-heartbeat"></i>
                    </div>

                    <div class="blood-level"></div>

                </div>

                <div class="blood-tube"></div>

            </div>

            <div class="heart-line">
                <i class="fas fa-heart"></i>
            </div>

            <div class="hand-shape hand-left">
                <i class="fas fa-hand-holding-heart"></i>
            </div>

            <div class="hero-message">

                <span>Setetes darah</span>

                <strong>sejuta harapan</strong>

                <i class="fas fa-heart"></i>

            </div>

            <span class="spark spark-one">✦</span>
            <span class="spark spark-two">✦</span>
            <span class="spark spark-three">•</span>

        </div>

    </section>


    {{-- Statistik --}}
    <section class="stats-grid">

        <a
            href="{{ route('pendonor.kegiatan') }}"
            class="stat-card"
        >

            <div class="stat-top">

                <span class="stat-label">
                    KEGIATAN TERSEDIA
                </span>

                <div class="stat-icon pink">
                    <i class="fas fa-calendar-alt"></i>
                </div>

            </div>

            <div class="stat-number">
                {{ $jumlahKegiatan }}
            </div>

            <div class="stat-bottom">

                <span>
                    Kegiatan donor
                </span>

                <i class="fas fa-arrow-right"></i>

            </div>

        </a>


        <a
            href="{{ route('pendonor.status') }}"
            class="stat-card"
        >

            <div class="stat-top">

                <span class="stat-label">
                    PENDAFTARAN AKTIF
                </span>

                <div class="stat-icon blue">
                    <i class="fas fa-clipboard-check"></i>
                </div>

            </div>

            <div class="stat-number">
                {{ $jumlahPendaftaran }}
            </div>

            <div class="stat-bottom">

                <span>
                    Pendaftaran kamu
                </span>

                <i class="fas fa-arrow-right"></i>

            </div>

        </a>


        <a
            href="{{ route('pendonor.riwayat') }}"
            class="stat-card"
        >

            <div class="stat-top">

                <span class="stat-label">
                    RIWAYAT DONOR
                </span>

                <div class="stat-icon lavender">
                    <i class="fas fa-history"></i>
                </div>

            </div>

            <div class="stat-number">
                {{ $jumlahRiwayat }}
            </div>

            <div class="stat-bottom">

                <span>
                    Riwayat tersimpan
                </span>

                <i class="fas fa-arrow-right"></i>

            </div>

        </a>


        <a
            href="{{ route('pendonor.riwayat') }}"
            class="stat-card"
        >

            <div class="stat-top">

                <span class="stat-label">
                    TOTAL DONOR
                </span>

                <div class="stat-icon red">
                    <i class="fas fa-tint"></i>
                </div>

            </div>

            <div class="stat-number">
                {{ $totalDonor }}
            </div>

            <div class="stat-bottom">

                <span>
                    Kantong: {{ $kantongDonor }}
                </span>

                <i class="fas fa-arrow-right"></i>

            </div>

        </a>

    </section>


    {{-- Bagian bawah --}}
    <section class="dashboard-sections">

        {{-- Kegiatan Terdekat --}}
        <div class="dashboard-panel">

            <div class="panel-header">

                <div class="panel-title">

                    <div class="panel-icon pink-icon">
                        <i class="fas fa-calendar-check"></i>
                    </div>

                    <div>

                        <span>
                            AGENDA
                        </span>

                        <h2>
                            Kegiatan Terdekat
                        </h2>

                        <p>
                            Kegiatan donor yang akan datang
                        </p>

                    </div>

                </div>

                <a
                    href="{{ route('pendonor.kegiatan') }}"
                    class="see-all"
                >
                    Lihat semua
                    <i class="fas fa-arrow-right"></i>
                </a>

            </div>


            @if($kegiatanTerdekat)

                <div class="event-card">

                    <div class="event-date">

                        <strong>
                            {{ $kegiatanTerdekat->tanggal->format('d') }}
                        </strong>

                        <span>
                            {{ $kegiatanTerdekat->tanggal->translatedFormat('M') }}
                        </span>

                    </div>


                    <div class="event-info">

                        <h3>
                            {{ $kegiatanTerdekat->nama_kegiatan }}
                        </h3>

                        <div class="event-detail">

                            <span>
                                <i class="fas fa-clock"></i>
                                {{ $kegiatanTerdekat->waktu }}
                            </span>

                            <span>
                                <i class="fas fa-map-marker-alt"></i>
                                {{ $kegiatanTerdekat->lokasi }}
                            </span>

                        </div>

                    </div>


                    <a
                        href="{{ route('pendonor.kegiatan.show', $kegiatanTerdekat->id_kegiatan) }}"
                        class="event-button"
                    >
                        <i class="fas fa-arrow-right"></i>
                    </a>

                </div>

            @else

                <div class="empty-state">

                    <div class="empty-icon">
                        <i class="fas fa-calendar-times"></i>
                    </div>

                    <h3>
                        Belum ada kegiatan
                    </h3>

                    <p>
                        Belum ada kegiatan donor yang tersedia.
                    </p>

                </div>

            @endif

        </div>


        {{-- Aktivitas --}}
        <div class="dashboard-panel activity-panel">

            <div class="panel-header">

                <div class="panel-title">

                    <div class="panel-icon blue-icon">
                        <i class="fas fa-chart-line"></i>
                    </div>

                    <div>

                        <span>
                            AKTIVITAS
                        </span>

                        <h2>
                            Status Pendaftaran
                        </h2>

                        <p>
                            Ringkasan aktivitas donor kamu
                        </p>

                    </div>

                </div>

                <a
                    href="{{ route('pendonor.status') }}"
                    class="see-all"
                >
                    Detail
                    <i class="fas fa-arrow-right"></i>
                </a>

            </div>


            <div class="activity-content">

                <div class="activity-item">

                    <div class="activity-icon">
                        <i class="fas fa-clipboard-check"></i>
                    </div>

                    <div class="activity-text">

                        <strong>
                            Pendaftaran Aktif
                        </strong>

                        <span>
                            {{ $jumlahPendaftaran }} pendaftaran
                        </span>

                    </div>

                    <div class="activity-value">
                        {{ $jumlahPendaftaran }}
                    </div>

                </div>


                <div class="activity-item">

                    <div class="activity-icon history">
                        <i class="fas fa-history"></i>
                    </div>

                    <div class="activity-text">

                        <strong>
                            Riwayat Donor
                        </strong>

                        <span>
                            {{ $jumlahRiwayat }} riwayat tersimpan
                        </span>

                    </div>

                    <div class="activity-value">
                        {{ $jumlahRiwayat }}
                    </div>

                </div>


                <div class="activity-item">

                    <div class="activity-icon blood">
                        <i class="fas fa-tint"></i>
                    </div>

                    <div class="activity-text">

                        <strong>
                            Total Kantong
                        </strong>

                        <span>
                            Darah yang telah didonorkan
                        </span>

                    </div>

                    <div class="activity-value">
                        {{ $kantongDonor }}
                    </div>

                </div>

            </div>

        </div>

    </section>

</div>

@endsection