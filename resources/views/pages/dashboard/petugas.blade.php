@extends('layouts.app')

@section('title', 'Dashboard Petugas PMR')

@php
    use App\Models\Pendonor;
    use App\Models\KegiatanDonor;
    use App\Models\HasilDonor;

    $totalPendonor = $jumlahPendonor ?? Pendonor::count();
    $totalKegiatan = $jumlahKegiatan ?? KegiatanDonor::count();
    $totalHasil = $jumlahHasil ?? HasilDonor::count();

    $kantongHariIni = $jumlahKantongHariIni ?? HasilDonor::whereDate(
        'tanggal_donor',
        today()
    )->sum('jumlah_kantong');

    $kegiatanTerdekat = $kegiatanTerdekat ?? KegiatanDonor::orderBy(
        'tanggal',
        'asc'
    )->take(3)->get();

    $bulan = [
        'Jan',
        'Feb',
        'Mar',
        'Apr',
        'Mei',
        'Jun',
        'Jul',
        'Agu',
        'Sep',
        'Okt',
        'Nov',
        'Des'
    ];

    $grafikDonor = [];

    for ($i = 1; $i <= 12; $i++) {
        $grafikDonor[] = HasilDonor::whereMonth(
            'tanggal_donor',
            $i
        )->whereYear(
            'tanggal_donor',
            now()->year
        )->sum('jumlah_kantong');
    }

    $nilaiMaksimal = max($grafikDonor);

    if ($nilaiMaksimal == 0) {
        $nilaiMaksimal = 1;
    }
@endphp


@section('content')

<div class="petugas-dashboard">

    {{-- Header --}}
    <div class="dashboard-header">

        <div>
            <div class="header-label">
                DONORCONNECT • PETUGAS PMR
            </div>

            <h1>Dashboard Petugas PMR</h1>

            <p>
                Kelola data pendonor, kegiatan donor, hasil donor,
                riwayat, dan laporan dengan mudah.
            </p>
        </div>

        <div class="header-icon">
            <i class="fas fa-heartbeat"></i>
        </div>

    </div>


    {{-- Statistik --}}
    <div class="stats-grid">

        {{-- Total Pendonor --}}
        <a href="{{ route('pendonor.index') }}"
           class="stat-card stat-pendonor">

            <div class="stat-content">

                <span class="stat-title">
                    TOTAL PENDONOR
                </span>

                <strong class="stat-number">
                    {{ $totalPendonor }}
                </strong>

                <span class="stat-description">
                    Data pendonor terdaftar
                </span>

            </div>

            <div class="stat-icon">
                <i class="fas fa-users"></i>
            </div>

        </a>


        {{-- Kegiatan Donor --}}
        <a href="{{ route('kegiatan-donor.index') }}"
           class="stat-card stat-kegiatan">

            <div class="stat-content">

                <span class="stat-title">
                    KEGIATAN DONOR
                </span>

                <strong class="stat-number">
                    {{ $totalKegiatan }}
                </strong>

                <span class="stat-description">
                    Total kegiatan donor
                </span>

            </div>

            <div class="stat-icon">
                <i class="fas fa-calendar-alt"></i>
            </div>

        </a>


        {{-- Hasil Donor --}}
        <a href="{{ route('hasil-donor.create') }}"
           class="stat-card stat-hasil">

            <div class="stat-content">

                <span class="stat-title">
                    HASIL DONOR
                </span>

                <strong class="stat-number">
                    {{ $totalHasil }}
                </strong>

                <span class="stat-description">
                    Donor yang telah dicatat
                </span>

            </div>

            <div class="stat-icon">
                <i class="fas fa-notes-medical"></i>
            </div>

        </a>


        {{-- Kantong Hari Ini --}}
        <a href="{{ route('riwayat-donor.index') }}"
           class="stat-card stat-kantong">

            <div class="stat-content">

                <span class="stat-title">
                    KANTONG HARI INI
                </span>

                <strong class="stat-number">
                    {{ $kantongHariIni }}
                </strong>

                <span class="stat-description">
                    Kantong darah terkumpul
                </span>

            </div>

            <div class="stat-icon">
                <i class="fas fa-tint"></i>
            </div>

        </a>

    </div>


    {{-- Bagian bawah --}}
    <div class="dashboard-grid">

        {{-- Kegiatan Terdekat --}}
        <div class="dashboard-card">

            <div class="card-header-custom">

                <div class="card-header-icon">
                    <i class="fas fa-calendar-check"></i>
                </div>

                <div>
                    <h3>Kegiatan Terdekat</h3>
                    <p>Kegiatan donor yang akan datang</p>
                </div>

            </div>


            <div class="activity-list">

                @forelse ($kegiatanTerdekat as $kegiatan)

                    <div class="activity-item">

                        <div class="activity-date">

                            <span>
                                {{ \Carbon\Carbon::parse($kegiatan->tanggal)->format('d') }}
                            </span>

                            <small>
                                {{ \Carbon\Carbon::parse($kegiatan->tanggal)->translatedFormat('M') }}
                            </small>

                        </div>


                        <div class="activity-info">

                            <span class="activity-label">
                                KEGIATAN DONOR
                            </span>

                            <h4>
                                {{ $kegiatan->nama_kegiatan }}
                            </h4>

                            <div class="activity-detail">

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

                    </div>

                @empty

                    <div class="empty-state">

                        <div class="empty-icon">
                            <i class="fas fa-calendar-times"></i>
                        </div>

                        <h4>Belum ada kegiatan</h4>

                        <p>
                            Belum ada kegiatan donor yang tersedia.
                        </p>

                    </div>

                @endforelse

            </div>

        </div>


        {{-- Grafik --}}
        <div class="dashboard-card">

            <div class="card-header-custom">

                <div class="card-header-icon">
                    <i class="fas fa-chart-bar"></i>
                </div>

                <div>
                    <h3>Grafik Donor per Bulan</h3>
                    <p>Jumlah kantong darah tahun {{ now()->year }}</p>
                </div>

            </div>


            <div class="chart-wrapper">

                <div class="chart-area">

                    @foreach ($grafikDonor as $index => $jumlah)

                        @php
                            $tinggi = ($jumlah / $nilaiMaksimal) * 100;

                            if ($jumlah == 0) {
                                $tinggi = 5;
                            }
                        @endphp

                        <div class="chart-column">

                            <div class="chart-value">
                                {{ $jumlah }}
                            </div>

                            <div class="chart-bar-container">

                                <div
                                    class="chart-bar"
                                    style="height: {{ $tinggi }}%;"
                                ></div>

                            </div>

                            <span class="chart-label">
                                {{ $bulan[$index] }}
                            </span>

                        </div>

                    @endforeach

                </div>

            </div>

        </div>

    </div>

</div>


<style>

/* Dashboard */

.petugas-dashboard {
    width: 100%;
    padding-bottom: 30px;
}


/* Header */

.dashboard-header {
    position: relative;
    display: flex;
    align-items: center;
    justify-content: space-between;

    min-height: 205px;

    padding: 35px 42px;

    margin-bottom: 28px;

    border-radius: 24px;

    overflow: hidden;

    background:
        linear-gradient(
            135deg,
            #a91432 0%,
            #d51f43 55%,
            #c51a58 100%
        );

    box-shadow:
        0 12px 30px rgba(174, 25, 58, 0.20);
}


.dashboard-header::before {
    content: "";

    position: absolute;

    width: 230px;
    height: 230px;

    right: -70px;
    top: -100px;

    border-radius: 50%;

    background: rgba(255,255,255,0.08);
}


.dashboard-header::after {
    content: "";

    position: absolute;

    width: 160px;
    height: 160px;

    right: 70px;
    bottom: -100px;

    border-radius: 50%;

    background: rgba(255,255,255,0.06);
}


.header-label {
    position: relative;
    z-index: 2;

    margin-bottom: 8px;

    color: rgba(255,255,255,0.80);

    font-size: 12px;
    font-weight: 800;

    letter-spacing: 2px;
}


.dashboard-header h1 {
    position: relative;
    z-index: 2;

    margin: 0 0 8px;

    color: #ffffff;

    font-size: 34px;
    font-weight: 800;
}


.dashboard-header p {
    position: relative;
    z-index: 2;

    margin: 0;

    color: rgba(255,255,255,0.88);

    font-size: 14px;
}


.header-icon {
    position: relative;
    z-index: 2;

    width: 95px;
    height: 95px;

    display: flex;
    align-items: center;
    justify-content: center;

    border-radius: 24px;

    background: rgba(255,255,255,0.13);

    color: #ffffff;

    font-size: 42px;
}


/* Statistik */

.stats-grid {
    display: grid;

    grid-template-columns:
        repeat(4, minmax(0, 1fr));

    gap: 20px;

    margin-bottom: 28px;
}


.stat-card {
    position: relative;

    min-height: 175px;

    display: flex;
    align-items: center;
    justify-content: space-between;

    padding: 25px;

    border-radius: 20px;

    text-decoration: none !important;

    overflow: hidden;

    transition:
        transform 0.25s ease,
        box-shadow 0.25s ease;

    box-shadow:
        0 8px 24px rgba(50, 35, 50, 0.08);
}


.stat-card::before {
    content: "";

    position: absolute;

    width: 130px;
    height: 130px;

    right: -50px;
    bottom: -60px;

    border-radius: 50%;

    background: rgba(255,255,255,0.18);
}


.stat-card:hover {
    transform: translateY(-6px);

    box-shadow:
        0 14px 30px rgba(50, 35, 50, 0.14);
}


.stat-content {
    position: relative;
    z-index: 2;
}


.stat-title {
    display: block;

    margin-bottom: 7px;

    font-size: 11px;
    font-weight: 800;

    letter-spacing: 1px;
}


.stat-number {
    display: block;

    margin-bottom: 6px;

    font-size: 34px;
    font-weight: 800;

    line-height: 1;
}


.stat-description {
    display: block;

    font-size: 12px;
}


.stat-icon {
    position: relative;
    z-index: 2;

    width: 62px;
    height: 62px;

    display: flex;
    align-items: center;
    justify-content: center;

    flex-shrink: 0;

    border-radius: 17px;

    background: rgba(255,255,255,0.25);

    color: #ffffff;

    font-size: 24px;
}


/* Warna card */

.stat-pendonor {
    background: linear-gradient(
        135deg,
        #f9dce4,
        #f4c7d3
    );

    color: #74223d;
}


.stat-kegiatan {
    background: linear-gradient(
        135deg,
        #ffe0d5,
        #f6c2b2
    );

    color: #8d3828;
}


.stat-hasil {
    background: linear-gradient(
        135deg,
        #eadcf3,
        #d9c3e8
    );

    color: #632d78;
}


.stat-kantong {
    background: linear-gradient(
        135deg,
        #f8ddd9,
        #efc1bd
    );

    color: #812f35;
}


/* Card bawah */

.dashboard-grid {
    display: grid;

    grid-template-columns:
        minmax(0, 1fr)
        minmax(0, 1fr);

    gap: 24px;
}


.dashboard-card {
    min-height: 470px;

    padding: 28px;

    background: #ffffff;

    border: 1px solid #f0e1e4;

    border-radius: 22px;

    box-shadow:
        0 7px 24px rgba(60, 40, 50, 0.06);
}


/* Card header */

.card-header-custom {
    display: flex;
    align-items: center;

    gap: 14px;

    margin-bottom: 26px;
}


.card-header-icon {
    width: 46px;
    height: 46px;

    display: flex;
    align-items: center;
    justify-content: center;

    border-radius: 13px;

    background: #fce6eb;

    color: #c22d50;

    font-size: 17px;
}


.card-header-custom h3 {
    margin: 0;

    color: #382d48;

    font-size: 20px;
    font-weight: 800;
}


.card-header-custom p {
    margin: 3px 0 0;

    color: #a4949b;

    font-size: 11px;
}


/* Kegiatan */

.activity-list {
    width: 100%;
}


.activity-item {
    display: flex;

    gap: 17px;

    padding: 17px 0;

    border-bottom: 1px solid #f3e9eb;
}


.activity-item:first-child {
    padding-top: 4px;
}


.activity-item:last-child {
    border-bottom: 0;
}


.activity-date {
    width: 53px;
    height: 61px;

    display: flex;
    flex-direction: column;
    align-items: center;
    justify-content: center;

    flex-shrink: 0;

    border-radius: 13px;

    background: #fce8ec;

    color: #c42c4e;
}


.activity-date span {
    font-size: 20px;
    font-weight: 800;

    line-height: 1;
}


.activity-date small {
    margin-top: 4px;

    font-size: 9px;
    font-weight: 800;

    text-transform: uppercase;
}


.activity-info {
    min-width: 0;
}


.activity-label {
    display: block;

    margin-bottom: 4px;

    color: #bd6c82;

    font-size: 9px;
    font-weight: 800;

    letter-spacing: 1px;
}


.activity-info h4 {
    margin: 0 0 8px;

    color: #44394f;

    font-size: 14px;
    font-weight: 800;

    line-height: 1.4;
}


.activity-detail {
    display: flex;
    flex-wrap: wrap;

    gap: 12px;

    color: #9b8e96;

    font-size: 10px;
}


.activity-detail span {
    display: flex;
    align-items: center;

    gap: 5px;
}


.activity-detail i {
    color: #c53254;
}


/* Empty */

.empty-state {
    padding: 55px 20px;

    text-align: center;
}


.empty-icon {
    width: 58px;
    height: 58px;

    display: flex;
    align-items: center;
    justify-content: center;

    margin: 0 auto 13px;

    border-radius: 50%;

    background: #fce8ec;

    color: #c43253;

    font-size: 22px;
}


.empty-state h4 {
    margin: 0 0 5px;

    color: #4a3d4d;

    font-size: 15px;
}


.empty-state p {
    margin: 0;

    color: #a99ba1;

    font-size: 11px;
}


/* Grafik */

.chart-wrapper {
    width: 100%;

    padding-top: 10px;
}


.chart-area {
    height: 330px;

    display: flex;
    align-items: flex-end;

    gap: 12px;

    padding:
        25px 5px 0;

    border-bottom: 1px solid #eadfe2;
}


.chart-column {
    height: 100%;

    flex: 1;

    display: flex;
    flex-direction: column;

    align-items: center;
    justify-content: flex-end;
}


.chart-value {
    min-height: 17px;

    margin-bottom: 7px;

    color: #8e6574;

    font-size: 9px;
    font-weight: 800;
}


.chart-bar-container {
    width: 100%;
    height: 240px;

    display: flex;
    align-items: flex-end;
    justify-content: center;
}


.chart-bar {
    width: 72%;

    min-height: 7px;

    border-radius: 8px 8px 2px 2px;

    background:
        linear-gradient(
            180deg,
            #e52d58 0%,
            #bd2850 100%
        );

    box-shadow:
        0 5px 12px rgba(197, 40, 79, 0.16);

    transition:
        height 0.4s ease,
        transform 0.2s ease;
}


.chart-bar:hover {
    transform: translateY(-4px);
}


.chart-label {
    margin-top: 10px;

    color: #998b91;

    font-size: 9px;
    font-weight: 700;
}


/* Responsive */

@media (max-width: 1100px) {

    .stats-grid {
        grid-template-columns:
            repeat(2, minmax(0, 1fr));
    }

    .dashboard-grid {
        grid-template-columns: 1fr;
    }

}


@media (max-width: 768px) {

    .dashboard-header {
        padding: 28px;

        min-height: 180px;
    }

    .dashboard-header h1 {
        font-size: 27px;
    }

    .header-icon {
        width: 70px;
        height: 70px;

        font-size: 30px;
    }

}


@media (max-width: 576px) {

    .stats-grid {
        grid-template-columns: 1fr;
    }

    .dashboard-header {
        padding: 24px;
    }

    .dashboard-header p {
        max-width: 90%;
    }

    .header-icon {
        display: none;
    }

    .dashboard-card {
        padding: 20px;
    }

    .chart-area {
        gap: 5px;
    }

    .chart-bar {
        width: 80%;
    }

}

</style>

@endsection