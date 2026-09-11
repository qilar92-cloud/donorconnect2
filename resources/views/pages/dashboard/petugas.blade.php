@extends('layouts.app')

@section('title', 'Dashboard Petugas PMR')

@php
    use App\Models\Pendonor;
    use App\Models\KegiatanDonor;
    use App\Models\HasilDonor;

    // Data
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

            <h1>Dashboard Petugas PMR</h1>

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

        <a href="{{ route('pendonor.index') }}" class="stat-card">

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
                <span>Data pendonor terdaftar</span>
                <i class="fas fa-arrow-right"></i>
            </div>

        </a>


        <a href="{{ route('kegiatan-donor.index') }}" class="stat-card">

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
                <span>Total kegiatan donor</span>
                <i class="fas fa-arrow-right"></i>
            </div>

        </a>


        <a href="{{ route('hasil-donor.create') }}" class="stat-card">

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
                <span>Donor yang telah dicatat</span>
                <i class="fas fa-arrow-right"></i>
            </div>

        </a>


        <a href="{{ route('riwayat-donor.index') }}" class="stat-card">

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
                <span>Kantong darah terkumpul</span>
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

                <a href="{{ route('kegiatan-donor.index') }}"
                   class="heading-link">
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
                                    style="height: {{ $tinggi }}%;">
                                </div>

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


@push('styles')

<style>

/* Dashboard */

.petugas-dashboard {
    width: 100%;
    min-height: calc(100vh - 80px);
    padding: 26px 30px 40px;
    box-sizing: border-box;
    background: #fff9f6;
}


/* Header */

.dashboard-hero {
    position: relative;
    display: flex;
    align-items: center;
    justify-content: space-between;
    min-height: 185px;
    padding: 32px 40px;
    margin-bottom: 22px;
    overflow: hidden;
    background: linear-gradient(
        135deg,
        #ed5573 0%,
        #d93659 100%
    );
    border-radius: 24px;
    box-shadow: 0 12px 30px rgba(217,54,89,.14);
}

.hero-content {
    position: relative;
    z-index: 2;
    max-width: 700px;
}

.hero-label {
    display: flex;
    align-items: center;
    gap: 7px;
    margin-bottom: 9px;
    color: rgba(255,255,255,.78);
    font-size: 10px;
    font-weight: 800;
    letter-spacing: 1.1px;
}

.hero-dot {
    width: 6px;
    height: 6px;
    border-radius: 50%;
    background: #fff;
}

.hero-divider {
    opacity: .55;
}

.dashboard-hero h1 {
    margin: 0 0 8px;
    color: #fff;
    font-size: 30px;
    line-height: 1.2;
    font-weight: 800;
}

.dashboard-hero p {
    max-width: 610px;
    margin: 0 0 14px;
    color: rgba(255,255,255,.86);
    font-size: 13px;
    line-height: 1.7;
}

.hero-date {
    display: inline-flex;
    align-items: center;
    gap: 7px;
    padding: 7px 11px;
    color: rgba(255,255,255,.92);
    background: rgba(255,255,255,.12);
    border: 1px solid rgba(255,255,255,.16);
    border-radius: 9px;
    font-size: 9px;
}

.hero-date i {
    font-size: 9px;
}

.hero-illustration {
    position: relative;
    width: 145px;
    height: 145px;
    flex-shrink: 0;
    margin-right: 15px;
}

.hero-heart {
    position: absolute;
    top: 20px;
    right: 16px;
    width: 105px;
    height: 105px;
    display: flex;
    align-items: center;
    justify-content: center;
    color: #d93659;
    background: rgba(255,255,255,.95);
    border-radius: 50%;
    box-shadow: 0 15px 30px rgba(100,20,40,.14);
}

.hero-heart i {
    font-size: 40px;
}

.hero-small-circle {
    position: absolute;
    display: block;
    border-radius: 50%;
}

.circle-a {
    width: 16px;
    height: 16px;
    top: 4px;
    left: 20px;
    background: #ffd5df;
}

.circle-b {
    width: 11px;
    height: 11px;
    right: 0;
    bottom: 15px;
    background: #f6d879;
}

.circle-c {
    width: 13px;
    height: 13px;
    left: 5px;
    bottom: 25px;
    background: #b9def0;
}

.hero-decoration {
    position: absolute;
    border-radius: 50%;
    pointer-events: none;
}

.hero-circle-one {
    width: 230px;
    height: 230px;
    right: 50px;
    top: -150px;
    background: rgba(255,255,255,.05);
}

.hero-circle-two {
    width: 180px;
    height: 180px;
    right: -70px;
    bottom: -115px;
    background: rgba(255,255,255,.06);
}


/* Statistik */

.stats-grid {
    display: grid;
    grid-template-columns: repeat(4, minmax(0, 1fr));
    gap: 15px;
    margin-bottom: 22px;
}

.stat-card {
    position: relative;
    min-width: 0;
    padding: 18px 19px;
    background: #fff;
    border: 1px solid #f1e4e1;
    border-radius: 18px;
    box-shadow: 0 5px 18px rgba(70,40,40,.045);
    text-decoration: none !important;
    transition: .2s ease;
}

.stat-card:hover {
    transform: translateY(-3px);
    box-shadow: 0 10px 25px rgba(70,40,40,.08);
}

.stat-card-top {
    display: flex;
    align-items: center;
    justify-content: space-between;
    gap: 10px;
}

.stat-label {
    color: #9f9998;
    font-size: 9px;
    font-weight: 800;
    letter-spacing: .8px;
}

.stat-icon {
    width: 43px;
    height: 43px;
    display: flex;
    align-items: center;
    justify-content: center;
    flex-shrink: 0;
    border-radius: 12px;
    font-size: 17px;
}

.stat-icon.pink {
    color: #df5570;
    background: #fff0f3;
}

.stat-icon.blue {
    color: #7092c4;
    background: #eef4fc;
}

.stat-icon.purple {
    color: #906fc3;
    background: #f3effa;
}

.stat-icon.red {
    color: #df5971;
    background: #fff0f2;
}

.stat-number {
    display: block;
    margin: 12px 0 7px;
    color: #303030;
    font-size: 28px;
    font-weight: 800;
    line-height: 1;
}

.stat-bottom {
    display: flex;
    align-items: center;
    justify-content: space-between;
    gap: 5px;
}

.stat-bottom span {
    color: #aaa4a3;
    font-size: 9px;
    line-height: 1.4;
}

.stat-bottom i {
    color: #d8b6bd;
    font-size: 9px;
}


/* Konten */

.main-grid {
    display: grid;
    grid-template-columns: minmax(0, 1.04fr) minmax(0, .96fr);
    gap: 18px;
}

.dashboard-card {
    min-width: 0;
    padding: 22px;
    background: #fff;
    border: 1px solid #f1e4e1;
    border-radius: 20px;
    box-shadow: 0 5px 20px rgba(70,40,40,.045);
}


/* Judul */

.card-heading {
    display: flex;
    align-items: center;
    gap: 11px;
    margin-bottom: 19px;
}

.heading-icon {
    width: 43px;
    height: 43px;
    display: flex;
    align-items: center;
    justify-content: center;
    flex-shrink: 0;
    color: #df526d;
    background: #fff0f3;
    border-radius: 12px;
    font-size: 17px;
}

.heading-text {
    min-width: 0;
}

.heading-label {
    display: block;
    margin-bottom: 2px;
    color: #dc6177;
    font-size: 8px;
    font-weight: 800;
    letter-spacing: 1px;
}

.card-heading h2 {
    margin: 0 0 3px;
    color: #303030;
    font-size: 18px;
    font-weight: 800;
}

.card-heading p {
    margin: 0;
    color: #a4a0a0;
    font-size: 10px;
}

.heading-link {
    margin-left: auto;
    flex-shrink: 0;
    color: #d94f6b !important;
    font-size: 10px;
    font-weight: 700;
    text-decoration: none !important;
}

.heading-link i {
    margin-left: 3px;
    font-size: 8px;
}


/* Kegiatan */

.activity-list {
    display: flex;
    flex-direction: column;
    gap: 10px;
}

.activity-item {
    display: flex;
    align-items: center;
    gap: 13px;
    padding: 12px;
    background: #fff9fa;
    border: 1px solid #f5e7e9;
    border-radius: 14px;
    transition: .2s ease;
}

.activity-item:hover {
    background: #fff5f7;
    border-color: #f2d9de;
}

.activity-date {
    width: 55px;
    height: 61px;
    display: flex;
    flex-direction: column;
    align-items: center;
    justify-content: center;
    flex-shrink: 0;
    background: #fff;
    border: 1px solid #f6eeee;
    border-radius: 11px;
    box-shadow: 0 3px 10px rgba(60,40,40,.04);
}

.activity-date strong {
    color: #d94e6a;
    font-size: 21px;
    font-weight: 800;
    line-height: 1;
}

.activity-date span {
    margin-top: 5px;
    color: #999;
    font-size: 8px;
    font-weight: 800;
    text-transform: uppercase;
}

.activity-content {
    min-width: 0;
    flex: 1;
}

.activity-status {
    display: flex;
    align-items: center;
    gap: 5px;
    margin-bottom: 4px;
    color: #d55a71;
    font-size: 8px;
    font-weight: 800;
    letter-spacing: .7px;
}

.activity-status span {
    width: 5px;
    height: 5px;
    border-radius: 50%;
    background: #df6078;
}

.activity-content h3 {
    margin: 0 0 7px;
    color: #353535;
    font-size: 13px;
    font-weight: 700;
    line-height: 1.4;
    word-break: break-word;
}

.activity-details {
    display: flex;
    flex-wrap: wrap;
    gap: 5px 14px;
}

.activity-details span {
    color: #969090;
    font-size: 9px;
}

.activity-details i {
    margin-right: 3px;
    color: #d95b72;
}

.activity-arrow {
    width: 27px;
    height: 27px;
    display: flex;
    align-items: center;
    justify-content: center;
    flex-shrink: 0;
    color: #d98b99;
    background: #fff;
    border-radius: 8px;
    font-size: 9px;
}


/* Kosong */

.empty-state {
    padding: 35px 15px;
    text-align: center;
}

.empty-icon {
    width: 48px;
    height: 48px;
    display: flex;
    align-items: center;
    justify-content: center;
    margin: 0 auto 10px;
    color: #dc6b80;
    background: #fff1f4;
    border-radius: 50%;
}

.empty-state h3 {
    margin: 0 0 5px;
    color: #444;
    font-size: 14px;
}

.empty-state p {
    margin: 0;
    color: #aaa;
    font-size: 10px;
}


/* Grafik */

.donor-chart-card {
    overflow: hidden;
}

.donor-chart-header {
    display: flex;
    align-items: center;
    justify-content: space-between;
    gap: 15px;
    margin-bottom: 21px;
}

.donor-chart-title {
    display: flex;
    align-items: center;
    gap: 12px;
    min-width: 0;
}

.donor-chart-icon {
    width: 44px;
    height: 44px;
    display: flex;
    align-items: center;
    justify-content: center;
    flex-shrink: 0;
    color: #d94364;
    background: linear-gradient(145deg,#fff0f4,#ffe4eb);
    border-radius: 13px;
    font-size: 17px;
}

.donor-chart-title > div:last-child {
    min-width: 0;
}

.donor-chart-title span {
    display: block;
    margin-bottom: 3px;
    color: #d85b73;
    font-size: 8px;
    font-weight: 800;
    letter-spacing: 1px;
}

.donor-chart-title h2 {
    margin: 0 0 3px;
    color: #303030;
    font-size: 18px;
    font-weight: 800;
}

.donor-chart-title p {
    margin: 0;
    color: #aaa;
    font-size: 10px;
}

.donor-chart-total {
    min-width: 72px;
    padding: 9px 12px;
    text-align: center;
    background: #fff7f8;
    border: 1px solid #f8e4e8;
    border-radius: 11px;
}

.donor-chart-total small {
    display: block;
    margin-bottom: 2px;
    color: #aaa;
    font-size: 7px;
    font-weight: 700;
}

.donor-chart-total strong {
    color: #d83f60;
    font-size: 20px;
    font-weight: 800;
}

.donor-chart-total span {
    margin-left: 2px;
    color: #999;
    font-size: 7px;
}


/* Area grafik */

.donor-chart-area {
    position: relative;
    height: 275px;
    padding: 10px 5px 0;
}

.donor-chart-grid {
    position: absolute;
    top: 15px;
    right: 5px;
    bottom: 35px;
    left: 5px;
    display: flex;
    flex-direction: column;
    justify-content: space-between;
    pointer-events: none;
}

.donor-chart-grid span {
    display: block;
    width: 100%;
    height: 1px;
    background: #f4eeee;
}

.donor-chart-bars {
    position: relative;
    z-index: 2;
    height: 100%;
    display: flex;
    align-items: flex-end;
    justify-content: space-between;
    gap: 7px;
}

.donor-chart-column {
    height: 100%;
    min-width: 0;
    flex: 1;
    display: flex;
    flex-direction: column;
    align-items: center;
    justify-content: flex-end;
}

.donor-chart-number {
    min-height: 18px;
    margin-bottom: 6px;
    color: #858080;
    font-size: 8px;
    font-weight: 700;
}

.donor-chart-track {
    position: relative;
    width: 24px;
    height: 205px;
    display: flex;
    align-items: flex-end;
    justify-content: center;
    overflow: hidden;
    background: #fff4f6;
    border-radius: 10px 10px 5px 5px;
}

.donor-chart-bar {
    width: 100%;
    min-height: 5px;
    background: linear-gradient(
        to top,
        #f3dce1,
        #f9e9ec
    );
    border-radius: 10px 10px 5px 5px;
    transition: .3s ease;
}

.donor-chart-bar.highest {
    background: linear-gradient(
        to top,
        #d82f55,
        #f06d87
    );
    box-shadow: 0 6px 15px rgba(216,47,85,.18);
}

.donor-chart-month {
    margin-top: 9px;
    color: #8f8989;
    font-size: 8px;
    font-weight: 600;
}


/* Footer grafik */

.donor-chart-footer {
    display: flex;
    align-items: center;
    justify-content: space-between;
    gap: 10px;
    margin-top: 14px;
    padding-top: 12px;
    border-top: 1px solid #f5eeee;
}

.donor-chart-indicator {
    display: flex;
    align-items: center;
    gap: 7px;
}

.donor-chart-indicator span {
    width: 7px;
    height: 7px;
    flex-shrink: 0;
    border-radius: 50%;
    background: #df5570;
    box-shadow: 0 0 0 4px #fff0f3;
}

.donor-chart-indicator p {
    margin: 0;
    color: #aaa;
    font-size: 9px;
}

.donor-chart-info {
    display: flex;
    align-items: center;
    gap: 4px;
    color: #999;
    font-size: 8px;
}

.donor-chart-info i {
    color: #df5570;
}

.donor-chart-info strong {
    color: #d84a67;
    font-size: 10px;
}


/* Tablet */

@media (max-width: 1100px) {

    .petugas-dashboard {
        padding: 22px 20px 35px;
    }

    .stats-grid {
        grid-template-columns: repeat(2,minmax(0,1fr));
    }

    .main-grid {
        grid-template-columns: 1fr;
    }

    .dashboard-hero {
        padding: 30px 32px;
    }

}


/* HP */

@media (max-width: 767px) {

    .petugas-dashboard {
        padding: 15px 13px 28px;
    }


    /* Header */

    .dashboard-hero {
        min-height: auto;
        padding: 22px 20px;
        margin-bottom: 15px;
        border-radius: 19px;
    }

    .dashboard-hero h1 {
        font-size: 22px;
    }

    .dashboard-hero p {
        margin-bottom: 11px;
        font-size: 10px;
        line-height: 1.65;
    }

    .hero-label {
        font-size: 8px;
        letter-spacing: .8px;
    }

    .hero-date {
        padding: 6px 9px;
        font-size: 8px;
    }

    .hero-illustration {
        width: 85px;
        height: 85px;
        margin-right: 0;
    }

    .hero-heart {
        top: 10px;
        right: 0;
        width: 65px;
        height: 65px;
    }

    .hero-heart i {
        font-size: 25px;
    }

    .circle-a {
        width: 10px;
        height: 10px;
    }

    .circle-b {
        width: 8px;
        height: 8px;
    }

    .circle-c {
        width: 9px;
        height: 9px;
    }


    /* Statistik */

    .stats-grid {
        grid-template-columns: repeat(2,minmax(0,1fr));
        gap: 9px;
        margin-bottom: 15px;
    }

    .stat-card {
        padding: 13px;
        border-radius: 15px;
    }

    .stat-label {
        font-size: 7px;
    }

    .stat-icon {
        width: 35px;
        height: 35px;
        border-radius: 10px;
        font-size: 14px;
    }

    .stat-number {
        margin: 10px 0 6px;
        font-size: 21px;
    }

    .stat-bottom span {
        font-size: 8px;
    }

    .stat-bottom i {
        display: none;
    }


    /* Card */

    .main-grid {
        gap: 13px;
    }

    .dashboard-card {
        padding: 16px;
        border-radius: 17px;
    }

    .card-heading {
        gap: 9px;
        margin-bottom: 14px;
    }

    .heading-icon {
        width: 36px;
        height: 36px;
        border-radius: 10px;
        font-size: 14px;
    }

    .heading-label {
        font-size: 7px;
    }

    .card-heading h2 {
        font-size: 15px;
    }

    .card-heading p {
        font-size: 8px;
    }

    .heading-link {
        font-size: 8px;
    }


    /* Kegiatan */

    .activity-list {
        gap: 8px;
    }

    .activity-item {
        gap: 9px;
        padding: 10px;
        border-radius: 12px;
    }

    .activity-date {
        width: 44px;
        height: 51px;
        border-radius: 9px;
    }

    .activity-date strong {
        font-size: 17px;
    }

    .activity-date span {
        margin-top: 4px;
        font-size: 7px;
    }

    .activity-status {
        font-size: 7px;
    }

    .activity-content h3 {
        margin-bottom: 6px;
        font-size: 11px;
    }

    .activity-details {
        flex-direction: column;
        gap: 4px;
    }

    .activity-details span {
        font-size: 8px;
    }

    .activity-arrow {
        width: 23px;
        height: 23px;
        font-size: 7px;
    }


    /* Grafik */

    .donor-chart-header {
        margin-bottom: 18px;
    }

    .donor-chart-icon {
        width: 37px;
        height: 37px;
        font-size: 14px;
        border-radius: 10px;
    }

    .donor-chart-title {
        gap: 9px;
    }

    .donor-chart-title span {
        font-size: 7px;
    }

    .donor-chart-title h2 {
        font-size: 15px;
    }

    .donor-chart-title p {
        font-size: 8px;
    }

    .donor-chart-total {
        min-width: 58px;
        padding: 7px 9px;
    }

    .donor-chart-total strong {
        font-size: 17px;
    }

    .donor-chart-area {
        height: 235px;
        padding-top: 5px;
    }

    .donor-chart-grid {
        top: 10px;
        bottom: 31px;
    }

    .donor-chart-track {
        width: 16px;
        height: 170px;
        border-radius: 8px 8px 4px 4px;
    }

    .donor-chart-bar {
        border-radius: 8px 8px 4px 4px;
    }

    .donor-chart-number {
        font-size: 7px;
        margin-bottom: 4px;
    }

    .donor-chart-month {
        margin-top: 7px;
        font-size: 7px;
    }

    .donor-chart-footer {
        margin-top: 9px;
        padding-top: 9px;
    }

    .donor-chart-indicator p {
        font-size: 8px;
    }

    .donor-chart-info {
        font-size: 7px;
    }

}


/* HP kecil */

@media (max-width: 480px) {

    .petugas-dashboard {
        padding: 11px 9px 24px;
    }


    /* Header */

    .dashboard-hero {
        display: block;
        padding: 19px 17px;
        border-radius: 17px;
    }

    .dashboard-hero h1 {
        font-size: 20px;
    }

    .dashboard-hero p {
        max-width: 100%;
        font-size: 9px;
    }

    .hero-label {
        font-size: 7px;
    }

    .hero-date {
        font-size: 7px;
    }

    .hero-illustration {
        display: none;
    }


    /* Statistik */

    .stats-grid {
        gap: 7px;
    }

    .stat-card {
        min-height: 86px;
        padding: 10px;
    }

    .stat-label {
        font-size: 6.5px;
    }

    .stat-icon {
        width: 31px;
        height: 31px;
        font-size: 12px;
        border-radius: 9px;
    }

    .stat-number {
        font-size: 19px;
    }

    .stat-bottom span {
        font-size: 7px;
    }


    /* Card */

    .dashboard-card {
        padding: 13px;
        border-radius: 15px;
    }

    .heading-icon {
        width: 32px;
        height: 32px;
        font-size: 12px;
    }

    .heading-label {
        font-size: 6px;
    }

    .card-heading h2 {
        font-size: 14px;
    }

    .card-heading p {
        font-size: 7px;
    }

    .heading-link {
        font-size: 7px;
    }


    /* Kegiatan */

    .activity-item {
        padding: 8px;
    }

    .activity-date {
        width: 40px;
        height: 47px;
    }

    .activity-date strong {
        font-size: 16px;
    }

    .activity-content h3 {
        font-size: 10px;
    }

    .activity-details span {
        font-size: 7px;
    }

    .activity-status {
        font-size: 6px;
    }

    .activity-arrow {
        display: none;
    }


    /* Grafik */

    .donor-chart-header {
        align-items: flex-start;
    }

    .donor-chart-title h2 {
        font-size: 14px;
    }

    .donor-chart-title p {
        font-size: 7px;
    }

    .donor-chart-total {
        min-width: 52px;
        padding: 6px 7px;
    }

    .donor-chart-total small {
        font-size: 6px;
    }

    .donor-chart-total strong {
        font-size: 15px;
    }

    .donor-chart-total span {
        font-size: 6px;
    }

    .donor-chart-area {
        height: 220px;
    }

    .donor-chart-track {
        width: 13px;
        height: 155px;
    }

    .donor-chart-number {
        font-size: 6px;
    }

    .donor-chart-month {
        font-size: 6px;
    }

    .donor-chart-info {
        display: none;
    }

}


/* HP sangat kecil */

@media (max-width: 360px) {

    .petugas-dashboard {
        padding: 9px 7px 20px;
    }

    .dashboard-hero {
        padding: 17px 14px;
    }

    .dashboard-hero h1 {
        font-size: 18px;
    }

    .dashboard-hero p {
        font-size: 8px;
    }

    .stats-grid {
        gap: 6px;
    }

    .stat-card {
        min-height: 78px;
        padding: 8px;
    }

    .stat-number {
        font-size: 17px;
    }

    .stat-icon {
        width: 28px;
        height: 28px;
        font-size: 11px;
    }

    .dashboard-card {
        padding: 11px;
    }

    .card-heading h2 {
        font-size: 13px;
    }

    .activity-content h3 {
        font-size: 9px;
    }

    .donor-chart-area {
        height: 205px;
    }

    .donor-chart-track {
        width: 11px;
        height: 145px;
    }

    .donor-chart-title h2 {
        font-size: 13px;
    }

}

</style>

@endpush