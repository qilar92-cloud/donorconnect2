@extends('layouts.app')

@section('title', 'Dashboard Pendonor - DonorConnect')

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

        {{-- Kegiatan --}}
        <a href="{{ route('pendonor.kegiatan') }}" class="stat-card">

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


        {{-- Pendaftaran --}}
        <a href="{{ route('pendonor.status') }}" class="stat-card">

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


        {{-- Riwayat --}}
        <a href="{{ route('pendonor.riwayat') }}" class="stat-card">

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


        {{-- Total donor --}}
        <a href="{{ route('pendonor.riwayat') }}" class="stat-card">

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

                <a href="{{ route('pendonor.kegiatan') }}" class="see-all">
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

                <a href="{{ route('pendonor.status') }}" class="see-all">
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


@push('styles')
<style>

/* Halaman */

.pendonor-dashboard {
    padding: 8px 24px 40px;
    background: #fff9fb;
}


/* Banner */

.dashboard-hero {
    position: relative;
    min-height: 260px;
    padding: 35px 42px;

    display: flex;
    align-items: center;
    justify-content: space-between;

    overflow: hidden;

    background:
        linear-gradient(
            115deg,
            #b91f4f 0%,
            #d62f61 45%,
            #ef6687 100%
        );

    border-radius: 26px;

    box-shadow:
        0 15px 35px rgba(185, 31, 79, .18);
}


/* Background */

.hero-background-shape {
    position: absolute;
    border-radius: 50%;
    pointer-events: none;
}

.shape-one {
    width: 330px;
    height: 330px;
    right: 170px;
    top: -210px;
    background: rgba(255,255,255,.10);
}

.shape-two {
    width: 260px;
    height: 260px;
    right: -80px;
    bottom: -170px;
    background: rgba(255,255,255,.09);
}


/* Isi banner */

.hero-content {
    position: relative;
    z-index: 5;

    width: 52%;
    max-width: 570px;
}

.hero-brand {
    display: flex;
    align-items: center;
    gap: 9px;

    margin-bottom: 12px;

    color: rgba(255,255,255,.95);

    font-size: 11px;
    font-weight: 800;
    letter-spacing: 1.2px;
}

.brand-icon {
    width: 27px;
    height: 27px;

    display: flex;
    align-items: center;
    justify-content: center;

    background: #ffffff;
    color: #d52d5c;

    border-radius: 9px;

    font-size: 11px;
}

.hero-badge {
    display: inline-flex;
    align-items: center;
    gap: 6px;

    margin-bottom: 12px;
    padding: 6px 11px;

    background: rgba(255,255,255,.16);
    border: 1px solid rgba(255,255,255,.16);

    border-radius: 20px;

    color: #fff;

    font-size: 9px;
    font-weight: 800;
    letter-spacing: .5px;
}

.hero-content h1 {
    margin: 0 0 10px;

    color: #fff;

    font-size: 34px;
    font-weight: 800;

    line-height: 1.16;
}

.hero-content h1 span {
    color: #fff4f7;
}

.hero-content h1 i {
    color: #ffd3df;
    font-size: 19px;
    margin-left: 4px;
}

.hero-content p {
    max-width: 420px;

    margin: 0 0 18px;

    color: rgba(255,255,255,.82);

    font-size: 12px;
    line-height: 1.6;
}

.hero-date {
    width: fit-content;

    display: flex;
    align-items: center;
    gap: 8px;

    padding: 9px 13px;

    background: rgba(255,255,255,.16);
    border: 1px solid rgba(255,255,255,.12);

    border-radius: 11px;

    color: #fff;

    font-size: 9px;
    font-weight: 700;
}


/* Ilustrasi */

.hero-visual {
    position: relative;
    z-index: 4;

    width: 43%;
    height: 230px;

    display: flex;
    align-items: center;
    justify-content: center;
}

.visual-glow {
    position: absolute;

    width: 190px;
    height: 190px;

    background: rgba(255,255,255,.16);

    border-radius: 50%;
}


/* Kantong darah */

.blood-bag {
    position: relative;
    z-index: 4;

    width: 85px;
    height: 125px;

    transform: rotate(5deg);

    filter:
        drop-shadow(
            0 15px 12px rgba(80, 10, 35, .18)
        );
}

.blood-bag-top {
    position: absolute;

    top: 0;
    left: 30px;

    width: 25px;
    height: 18px;

    background: #f5f5f5;

    border-radius: 7px 7px 3px 3px;
}

.blood-bag-body {
    position: absolute;

    top: 12px;
    left: 5px;

    width: 75px;
    height: 96px;

    background: #f8f8f8;

    border-radius: 14px 14px 20px 20px;

    border: 3px solid rgba(255,255,255,.75);

    overflow: hidden;
}

.blood-bag-body::before {
    content: "";

    position: absolute;

    left: 0;
    bottom: 0;

    width: 100%;
    height: 67%;

    background:
        linear-gradient(
            180deg,
            #ee466f,
            #c51f4d
        );

    border-radius: 0 0 16px 16px;
}

.blood-label {
    position: absolute;

    z-index: 3;

    top: 25px;
    left: 13px;

    width: 49px;
    height: 38px;

    display: flex;
    align-items: center;
    justify-content: center;

    background: rgba(255,255,255,.96);

    border-radius: 9px;

    color: #d62f5d;

    font-size: 18px;

    box-shadow:
        0 5px 10px rgba(90,20,45,.10);
}

.blood-level {
    position: absolute;

    z-index: 3;

    left: 19px;
    bottom: 9px;

    width: 37px;
    height: 4px;

    background: rgba(255,255,255,.45);

    border-radius: 10px;
}

.blood-tube {
    position: absolute;

    left: 40px;
    bottom: -22px;

    width: 6px;
    height: 35px;

    background: #d52d5c;

    border-radius: 0 0 8px 8px;
}


/* Hati */

.heart-line {
    position: absolute;

    z-index: 5;

    left: 46%;
    top: 55%;

    width: 95px;
    height: 45px;

    border-bottom: 3px solid #c92553;
    border-right: 3px solid #c92553;

    border-radius: 0 0 60px 0;

    transform: rotate(10deg);
}

.heart-line i {
    position: absolute;

    right: -10px;
    top: 18px;

    color: #c92553;

    font-size: 25px;
}


/* Tangan */

.hand-shape {
    position: absolute;

    z-index: 3;

    bottom: 20px;
    left: 22%;

    width: 105px;
    height: 65px;

    display: flex;
    align-items: center;
    justify-content: center;

    background: #ffd8d2;

    border-radius:
        55px 55px 25px 25px;

    transform: rotate(-13deg);

    box-shadow:
        0 8px 15px rgba(100,30,40,.08);
}

.hand-shape i {
    color: #e98b83;
    font-size: 34px;
}


/* Pesan */

.hero-message {
    position: absolute;

    z-index: 6;

    right: 3px;
    top: 37px;

    display: flex;
    flex-direction: column;

    color: #fff;

    font-size: 17px;
    font-style: italic;

    line-height: 1.2;
}

.hero-message strong {
    font-size: 19px;
    font-weight: 700;
}

.hero-message i {
    margin-top: 5px;

    color: #ffd4df;

    font-size: 12px;
}


/* Hiasan */

.spark {
    position: absolute;

    z-index: 6;

    color: rgba(255,255,255,.9);

    font-size: 19px;
}

.spark-one {
    top: 25px;
    left: 20%;
}

.spark-two {
    right: 25%;
    bottom: 28px;
    font-size: 14px;
}

.spark-three {
    left: 8%;
    bottom: 45px;
    font-size: 25px;
}


/* Statistik */

.stats-grid {
    display: grid;

    grid-template-columns:
        repeat(4, minmax(0, 1fr));

    gap: 18px;

    margin-top: 20px;
}

.stat-card {
    min-height: 150px;

    padding: 23px 22px 19px;

    display: flex;
    flex-direction: column;

    background: #ffffff;

    border: 1px solid #f1e3e8;

    border-radius: 18px;

    color: inherit;

    text-decoration: none !important;

    box-shadow:
        0 5px 18px rgba(90, 30, 55, .04);

    transition:
        transform .2s ease,
        box-shadow .2s ease,
        border-color .2s ease;
}

.stat-card:hover {
    transform: translateY(-3px);

    border-color: #edc5d2;

    box-shadow:
        0 10px 24px rgba(90, 30, 55, .08);
}

.stat-top {
    display: flex;
    align-items: center;
    justify-content: space-between;
}

.stat-label {
    color: #94909a;

    font-size: 9px;
    font-weight: 800;

    letter-spacing: 1px;
}

.stat-icon {
    width: 43px;
    height: 43px;

    display: flex;
    align-items: center;
    justify-content: center;

    border-radius: 13px;

    font-size: 14px;
}

.stat-icon.pink {
    background: #fde8ef;
    color: #c23d6a;
}

.stat-icon.blue {
    background: #eaf3fc;
    color: #568bd0;
}

.stat-icon.lavender {
    background: #eeeafd;
    color: #7466bd;
}

.stat-icon.red {
    background: #fce9ed;
    color: #c23859;
}

.stat-number {
    margin-top: 15px;

    color: #30344e;

    font-size: 29px;
    font-weight: 800;

    line-height: 1;
}

.stat-bottom {
    margin-top: auto;

    padding-top: 12px;

    display: flex;
    align-items: center;
    justify-content: space-between;

    color: #aaa5ad;

    font-size: 9px;
}

.stat-bottom i {
    color: #c7c1c7;

    font-size: 9px;
}


/* Bagian bawah */

.dashboard-sections {
    display: grid;

    grid-template-columns:
        minmax(0, 1.15fr)
        minmax(0, .85fr);

    gap: 20px;

    margin-top: 22px;
}

.dashboard-panel {
    min-height: 285px;

    padding: 27px 28px;

    background: #ffffff;

    border: 1px solid #f1e3e8;

    border-radius: 20px;

    box-shadow:
        0 5px 18px rgba(90, 30, 55, .035);
}

.panel-header {
    display: flex;
    align-items: flex-start;
    justify-content: space-between;

    gap: 20px;
}

.panel-title {
    display: flex;
    align-items: center;

    gap: 13px;
}

.panel-icon {
    width: 38px;
    height: 38px;

    flex-shrink: 0;

    display: flex;
    align-items: center;
    justify-content: center;

    border-radius: 11px;

    font-size: 12px;
}

.pink-icon {
    background: #fde8ef;
    color: #c33c69;
}

.blue-icon {
    background: #eaf3fc;
    color: #5b8fd0;
}

.panel-title span {
    display: block;

    margin-bottom: 4px;

    color: #aaa4ac;

    font-size: 8px;
    font-weight: 800;

    letter-spacing: 1.2px;
}

.panel-title h2 {
    margin: 0;

    color: #353951;

    font-size: 18px;
    font-weight: 800;
}

.panel-title p {
    margin: 5px 0 0;

    color: #aaa6ad;

    font-size: 9px;
}

.see-all {
    display: flex;
    align-items: center;
    gap: 6px;

    padding-top: 6px;

    color: #9e5572 !important;

    text-decoration: none !important;

    font-size: 9px;
    font-weight: 700;

    white-space: nowrap;
}

.see-all i {
    font-size: 8px;
}


/* Kegiatan */

.event-card {
    margin-top: 30px;

    padding: 18px;

    display: flex;
    align-items: center;

    gap: 17px;

    background: #fff9fb;

    border: 1px solid #f3e1e7;

    border-radius: 15px;
}

.event-date {
    width: 56px;
    height: 62px;

    flex-shrink: 0;

    display: flex;
    flex-direction: column;
    align-items: center;
    justify-content: center;

    background: #f9e3eb;

    border-radius: 12px;

    color: #bd3562;
}

.event-date strong {
    font-size: 21px;
    font-weight: 800;

    line-height: 1;
}

.event-date span {
    margin-top: 4px;

    font-size: 8px;
    font-weight: 800;

    text-transform: uppercase;
}

.event-info {
    min-width: 0;
    flex: 1;
}

.event-info h3 {
    margin: 0 0 8px;

    color: #34374d;

    font-size: 13px;
    font-weight: 800;

    line-height: 1.4;
}

.event-detail {
    display: flex;
    flex-wrap: wrap;

    gap: 10px 15px;

    color: #99949d;

    font-size: 8px;
}

.event-detail span {
    display: flex;
    align-items: center;
    gap: 5px;
}

.event-detail i {
    color: #c44b70;
}

.event-button {
    width: 35px;
    height: 35px;

    flex-shrink: 0;

    display: flex;
    align-items: center;
    justify-content: center;

    background: #f7dce5;

    border-radius: 10px;

    color: #b93360 !important;

    text-decoration: none !important;

    font-size: 10px;

    transition: .2s ease;
}

.event-button:hover {
    background: #edc7d3;

    transform: translateX(2px);
}


/* Kosong */

.empty-state {
    min-height: 160px;

    display: flex;
    flex-direction: column;
    align-items: center;
    justify-content: center;

    text-align: center;
}

.empty-icon {
    width: 45px;
    height: 45px;

    display: flex;
    align-items: center;
    justify-content: center;

    margin-bottom: 10px;

    background: #fcecf1;

    border-radius: 13px;

    color: #cb6282;

    font-size: 14px;
}

.empty-state h3 {
    margin: 0 0 5px;

    color: #4a4b5d;

    font-size: 12px;
    font-weight: 800;
}

.empty-state p {
    margin: 0;

    color: #aaa6ad;

    font-size: 9px;
}


/* Aktivitas */

.activity-content {
    margin-top: 25px;

    display: flex;
    flex-direction: column;

    gap: 10px;
}

.activity-item {
    min-height: 58px;

    padding: 9px 12px;

    display: flex;
    align-items: center;

    gap: 11px;

    background: #fffafd;

    border: 1px solid #f3e8ed;

    border-radius: 13px;
}

.activity-icon {
    width: 35px;
    height: 35px;

    flex-shrink: 0;

    display: flex;
    align-items: center;
    justify-content: center;

    background: #eaf3fc;

    border-radius: 10px;

    color: #5b8fd0;

    font-size: 10px;
}

.activity-icon.history {
    background: #eeeafd;
    color: #7466bd;
}

.activity-icon.blood {
    background: #fce9ed;
    color: #c23859;
}

.activity-text {
    min-width: 0;
    flex: 1;
}

.activity-text strong {
    display: block;

    margin-bottom: 3px;

    color: #414359;

    font-size: 10px;
    font-weight: 800;
}

.activity-text span {
    display: block;

    color: #aaa5ad;

    font-size: 8px;
}

.activity-value {
    width: 29px;
    height: 29px;

    display: flex;
    align-items: center;
    justify-content: center;

    background: #f7edf1;

    border-radius: 9px;

    color: #b83862;

    font-size: 9px;
    font-weight: 800;
}


/* Tablet */

@media (max-width: 992px) {

    .pendonor-dashboard {
        padding-left: 18px;
        padding-right: 18px;
    }

    .dashboard-hero {
        min-height: 240px;
        padding: 30px 30px;
    }

    .hero-content {
        width: 56%;
    }

    .hero-content h1 {
        font-size: 28px;
    }

    .hero-content p {
        font-size: 11px;
    }

    .hero-visual {
        width: 42%;
        transform: scale(.9);
    }

    .hero-message {
        right: -15px;
        font-size: 14px;
    }

    .hero-message strong {
        font-size: 16px;
    }

    .stats-grid {
        grid-template-columns: repeat(2, 1fr);
    }

    .dashboard-sections {
        grid-template-columns: 1fr;
    }
}


/* HP */

@media (max-width: 576px) {

    .pendonor-dashboard {
        padding: 5px 10px 30px;
    }

    .dashboard-hero {
        min-height: 225px;
        padding: 24px 20px;
        border-radius: 19px;
    }

    .hero-content {
        width: 67%;
    }

    .hero-brand {
        gap: 6px;
        margin-bottom: 8px;
        font-size: 7px;
        letter-spacing: .7px;
    }

    .brand-icon {
        width: 21px;
        height: 21px;
        border-radius: 7px;
        font-size: 8px;
    }

    .hero-badge {
        margin-bottom: 8px;
        padding: 5px 8px;
        font-size: 7px;
    }

    .hero-content h1 {
        margin-bottom: 7px;
        font-size: 20px;
        line-height: 1.15;
    }

    .hero-content h1 i {
        font-size: 11px;
    }

    .hero-content p {
        max-width: 205px;
        margin-bottom: 12px;
        font-size: 8px;
        line-height: 1.45;
    }

    .hero-date {
        padding: 7px 9px;
        border-radius: 8px;
        font-size: 7px;
    }

    .hero-visual {
        position: absolute;
        right: -15px;
        top: 5px;

        width: 46%;
        height: 210px;

        transform: scale(.75);
    }

    .visual-glow {
        width: 145px;
        height: 145px;
    }

    .hero-message {
        right: 0;
        top: 28px;
        font-size: 11px;
    }

    .hero-message strong {
        font-size: 13px;
    }

    .hero-message i {
        font-size: 8px;
    }

    .hand-shape {
        bottom: 15px;
        left: 3%;
        transform: scale(.85) rotate(-13deg);
    }

    .heart-line {
        left: 42%;
    }

    .spark-one {
        left: 15%;
    }

    .stats-grid {
        grid-template-columns: repeat(2, 1fr);
        gap: 10px;
        margin-top: 12px;
    }

    .stat-card {
        min-height: 125px;
        padding: 15px 13px;
        border-radius: 14px;
    }

    .stat-label {
        max-width: 70px;
        font-size: 7px;
        line-height: 1.4;
    }

    .stat-icon {
        width: 34px;
        height: 34px;
        border-radius: 10px;
        font-size: 11px;
    }

    .stat-number {
        margin-top: 11px;
        font-size: 23px;
    }

    .stat-bottom {
        padding-top: 8px;
        font-size: 7px;
    }

    .stat-bottom i {
        font-size: 7px;
    }

    .dashboard-sections {
        gap: 12px;
        margin-top: 13px;
    }

    .dashboard-panel {
        min-height: auto;
        padding: 18px 15px;
        border-radius: 16px;
    }

    .panel-header {
        gap: 8px;
    }

    .panel-title {
        gap: 9px;
    }

    .panel-icon {
        width: 34px;
        height: 34px;
        border-radius: 9px;
        font-size: 10px;
    }

    .panel-title span {
        font-size: 7px;
    }

    .panel-title h2 {
        font-size: 14px;
    }

    .panel-title p {
        font-size: 7px;
    }

    .see-all {
        font-size: 7px;
    }

    .event-card {
        margin-top: 18px;
        padding: 12px;
        gap: 10px;
        border-radius: 12px;
    }

    .event-date {
        width: 45px;
        height: 51px;
        border-radius: 9px;
    }

    .event-date strong {
        font-size: 17px;
    }

    .event-date span {
        font-size: 7px;
    }

    .event-info h3 {
        font-size: 9px;
        margin-bottom: 5px;
    }

    .event-detail {
        gap: 5px 8px;
        font-size: 6.5px;
    }

    .event-button {
        width: 30px;
        height: 30px;
        border-radius: 8px;
        font-size: 8px;
    }

    .activity-content {
        margin-top: 17px;
        gap: 8px;
    }

    .activity-item {
        min-height: 51px;
        padding: 7px 9px;
        gap: 8px;
        border-radius: 10px;
    }

    .activity-icon {
        width: 31px;
        height: 31px;
        border-radius: 8px;
        font-size: 9px;
    }

    .activity-text strong {
        font-size: 8px;
    }

    .activity-text span {
        font-size: 6.5px;
    }

    .activity-value {
        width: 25px;
        height: 25px;
        border-radius: 7px;
        font-size: 8px;
    }
}


/* HP kecil */

@media (max-width: 380px) {

    .dashboard-hero {
        min-height: 210px;
        padding: 21px 16px;
    }

    .hero-content {
        width: 68%;
    }

    .hero-content h1 {
        font-size: 18px;
    }

    .hero-content p {
        font-size: 7px;
        max-width: 180px;
    }

    .hero-visual {
        right: -25px;
        transform: scale(.67);
    }

    .hero-message {
        right: 3px;
        font-size: 9px;
    }

    .hero-message strong {
        font-size: 11px;
    }
}

</style>
@endpush

@endsection