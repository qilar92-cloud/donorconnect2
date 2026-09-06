@extends('layouts.app')

@section('title', 'Dashboard DonorConnect')

@section('content')

<div class="dashboard-page">

    {{-- Welcome --}}

    <div class="welcome-card">

        <div class="welcome-content">

            <div class="welcome-label">
                <i class="fas fa-heart"></i>
                PEDULI · BERBAGI · MENYELAMATKAN
            </div>

            <h2>
                Halo, {{ Auth::user()->nama ?? 'Pendonor' }}! 👋
            </h2>

            <p>
                Yuk, lanjut berbagi kebaikan hari ini.
                Setetes darahmu bisa memberikan harapan bagi orang lain.
            </p>

            <a href="{{ route('pendonor.kegiatan') }}" class="welcome-button">
                <i class="fas fa-calendar-alt"></i>
                Lihat Kegiatan Donor
                <i class="fas fa-arrow-right arrow-icon"></i>
            </a>

        </div>

        <div class="blood-illustration">

            <span class="bubble bubble-blue"></span>
            <span class="bubble bubble-pink"></span>
            <span class="bubble bubble-yellow"></span>

            <div class="blood-drop-main">
                <i class="fas fa-heart"></i>
            </div>

            <span class="small-heart">
                <i class="fas fa-heart"></i>
            </span>

        </div>

    </div>


    {{-- Statistik --}}

    <div class="row dashboard-statistics">

        <div class="col-xl-3 col-md-6 mb-3">
            <a href="{{ route('pendonor.kegiatan') }}" class="stat-link">

                <div class="stat-card">

                    <div class="stat-icon calendar-icon">
                        <i class="fas fa-calendar-alt"></i>
                    </div>

                    <div class="stat-content">
                        <div class="stat-number">
                            {{ $jumlahKegiatan }}
                        </div>

                        <div class="stat-label">
                            Kegiatan Tersedia
                        </div>
                    </div>

                    <div class="stat-arrow">
                        <i class="fas fa-arrow-right"></i>
                    </div>

                </div>

            </a>
        </div>


        <div class="col-xl-3 col-md-6 mb-3">
            <a href="{{ route('pendonor.status') }}" class="stat-link">

                <div class="stat-card">

                    <div class="stat-icon registration-icon">
                        <i class="fas fa-clipboard-check"></i>
                    </div>

                    <div class="stat-content">
                        <div class="stat-number">
                            0
                        </div>

                        <div class="stat-label">
                            Pendaftaran Aktif
                        </div>
                    </div>

                    <div class="stat-arrow">
                        <i class="fas fa-arrow-right"></i>
                    </div>

                </div>

            </a>
        </div>


        <div class="col-xl-3 col-md-6 mb-3">
            <a href="{{ route('pendonor.riwayat') }}" class="stat-link">

                <div class="stat-card">

                    <div class="stat-icon history-icon">
                        <i class="fas fa-history"></i>
                    </div>

                    <div class="stat-content">
                        <div class="stat-number">
                            0
                        </div>

                        <div class="stat-label">
                            Riwayat Donor
                        </div>
                    </div>

                    <div class="stat-arrow">
                        <i class="fas fa-arrow-right"></i>
                    </div>

                </div>

            </a>
        </div>


        <div class="col-xl-3 col-md-6 mb-3">

            <div class="stat-card">

                <div class="stat-icon blood-icon">
                    <i class="fas fa-tint"></i>
                </div>

                <div class="stat-content">

                    <div class="stat-number">
                        0
                        <small>kantong</small>
                    </div>

                    <div class="stat-label">
                        Total Donor
                    </div>

                </div>

            </div>

        </div>

    </div>


    {{-- Bagian bawah --}}

    <div class="row dashboard-bottom">

        <div class="col-lg-8 mb-4">

            <div class="dashboard-card activity-card">

                <div class="card-title-row">

                    <div>

                        <span class="card-mini-title">
                            DONOR
                        </span>

                        <h3>
                            Kegiatan Terdekat
                        </h3>

                        <p class="card-subtitle">
                            Jangan lewatkan kegiatan donor berikutnya.
                        </p>

                    </div>

                    <a href="{{ route('pendonor.kegiatan') }}"
                       class="see-all">

                        Lihat Semua
                        <i class="fas fa-arrow-right"></i>

                    </a>

                </div>


                @php

                    $kegiatanTerdekat = \App\Models\KegiatanDonor::whereDate(
                        'tanggal',
                        '>=',
                        now()
                    )
                    ->orderBy('tanggal')
                    ->first();

                    if (!$kegiatanTerdekat) {

                        $kegiatanTerdekat =
                            \App\Models\KegiatanDonor::orderBy('tanggal')
                            ->first();

                    }

                @endphp


                @if($kegiatanTerdekat)

                    <div class="activity-item">

                        <div class="activity-left">

                            <div class="activity-icon">
                                <i class="fas fa-tint"></i>
                            </div>

                            <div class="activity-date">

                                <strong>
                                    {{ \Carbon\Carbon::parse($kegiatanTerdekat->tanggal)->format('d') }}
                                </strong>

                                <span>
                                    {{ \Carbon\Carbon::parse($kegiatanTerdekat->tanggal)->format('M') }}
                                </span>

                            </div>

                        </div>


                        <div class="activity-info">

                            <span class="activity-status">
                                <span></span>
                                Tersedia
                            </span>

                            <h4>
                                {{ $kegiatanTerdekat->nama_kegiatan }}
                            </h4>

                            <div class="activity-details">

                                <span>
                                    <i class="fas fa-calendar-alt"></i>
                                    {{ \Carbon\Carbon::parse($kegiatanTerdekat->tanggal)->format('d M Y') }}
                                </span>

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


                        <a href="{{ route('pendonor.kegiatan.show', $kegiatanTerdekat->id_kegiatan) }}"
                           class="detail-button">

                            Detail
                            <i class="fas fa-arrow-right"></i>

                        </a>

                    </div>

                @else

                    <div class="empty-activity">

                        <div class="empty-icon">
                            <i class="fas fa-calendar-times"></i>
                        </div>

                        <h4>
                            Belum ada kegiatan donor
                        </h4>

                        <p>
                            Kegiatan donor yang tersedia akan muncul di sini.
                        </p>

                    </div>

                @endif

            </div>

        </div>


        <div class="col-lg-4 mb-4">

            <div class="dashboard-card information-card">

                <div class="card-title-row">

                    <div>

                        <span class="card-mini-title">
                            INFO
                        </span>

                        <h3>
                            Untuk Kamu
                        </h3>

                    </div>

                    <div class="info-header-icon">
                        <i class="fas fa-heart"></i>
                    </div>

                </div>


                <div class="information-content">

                    <div class="info-blood-area">

                        <span class="info-circle blue"></span>
                        <span class="info-circle pink"></span>
                        <span class="info-circle yellow"></span>

                        <div class="info-blood">
                            <i class="fas fa-heart"></i>
                        </div>

                    </div>

                    <span class="info-tag">
                        DONORCONNECT
                    </span>

                    <h4>
                        Setetes darahmu berarti
                    </h4>

                    <p>
                        Donormu hari ini bisa menjadi harapan
                        bagi seseorang yang membutuhkan.
                    </p>

                    <div class="info-note">
                        <i class="fas fa-heart"></i>
                        Terima kasih sudah peduli
                    </div>

                </div>

            </div>

        </div>

    </div>

</div>

@endsection


@push('styles')

<style>

.dashboard-page {
    width: 100%;
    min-height: calc(100vh - 80px);
    padding: 28px 30px 35px;
    background: #fff8f3;
}


/* Welcome */

.welcome-card {
    position: relative;
    min-height: 195px;
    margin-bottom: 20px;
    padding: 30px 36px;

    display: flex;
    align-items: center;
    overflow: hidden;

    background: linear-gradient(
        135deg,
        #ffffff 0%,
        #fffafa 55%,
        #fff3f7 100%
    );

    border: 1px solid #f0dce2;
    border-left: 5px solid #b0143b;
    border-radius: 20px;

    box-shadow: 0 8px 28px rgba(168, 14, 44, 0.07);
}

.welcome-card:after {
    content: "";
    position: absolute;
    width: 280px;
    height: 280px;
    right: -100px;
    top: -130px;
    border-radius: 50%;
    background: rgba(217, 75, 145, 0.05);
}

.welcome-content {
    position: relative;
    z-index: 3;
    max-width: 70%;
}

.welcome-label {
    margin-bottom: 9px;
    color: #b0143b;
    font-size: 9px;
    font-weight: 900;
    letter-spacing: 1.5px;
}

.welcome-label i {
    margin-right: 4px;
}

.welcome-content h2 {
    margin: 0 0 8px;
    color: #283252;
    font-size: 26px;
    font-weight: 800;
}

.welcome-content p {
    max-width: 610px;
    margin: 0 0 17px;
    color: #858493;
    font-size: 12px;
    line-height: 1.7;
}

.welcome-button {
    display: inline-flex;
    align-items: center;
    gap: 8px;
    padding: 10px 16px;

    background: linear-gradient(
        135deg,
        #a80e2c,
        #d94b91
    );

    color: #fff !important;
    border-radius: 10px;

    font-size: 10px;
    font-weight: 800;
    text-decoration: none !important;

    box-shadow: 0 7px 16px rgba(168, 14, 44, 0.18);
    transition: 0.2s ease;
}

.welcome-button:hover {
    transform: translateY(-2px);
    box-shadow: 0 10px 20px rgba(168, 14, 44, 0.23);
}

.arrow-icon {
    font-size: 8px;
    margin-left: 2px;
}


/* Illustration */

.blood-illustration {
    position: absolute;
    right: 55px;
    top: 50%;

    width: 155px;
    height: 150px;

    transform: translateY(-50%);
    z-index: 2;
}

.blood-drop-main {
    position: absolute;
    left: 48px;
    top: 29px;

    width: 62px;
    height: 76px;

    display: flex;
    align-items: center;
    justify-content: center;

    background: linear-gradient(
        145deg,
        #a80e2c,
        #d94b91
    );

    color: #fff;

    border-radius: 50% 50% 58% 58%;

    box-shadow: 0 10px 22px rgba(168, 14, 44, 0.2);
}

.blood-drop-main:before {
    content: "";
    position: absolute;

    width: 37px;
    height: 37px;

    top: -14px;
    left: 13px;

    background: #b0143b;
    border-radius: 50%;

    transform: rotate(45deg);
    z-index: -1;
}

.blood-drop-main i {
    font-size: 21px;
}

.bubble {
    position: absolute;
    border-radius: 50%;
}

.bubble-blue {
    width: 94px;
    height: 94px;

    left: 10px;
    top: 25px;

    background: rgba(105, 184, 214, 0.19);
}

.bubble-pink {
    width: 70px;
    height: 70px;

    right: 10px;
    bottom: 5px;

    background: rgba(217, 75, 145, 0.10);
}

.bubble-yellow {
    width: 28px;
    height: 28px;

    right: 4px;
    top: 4px;

    background: rgba(229, 185, 87, 0.35);
}

.small-heart {
    position: absolute;

    right: 8px;
    bottom: 12px;

    width: 27px;
    height: 27px;

    display: flex;
    align-items: center;
    justify-content: center;

    background: #f9dce6;
    color: #b0143b;

    border-radius: 50%;
    font-size: 9px;
}


/* Statistics */

.dashboard-statistics {
    margin-left: -5px;
    margin-right: -5px;
}

.dashboard-statistics > div {
    padding-left: 5px;
    padding-right: 5px;
}

.stat-link {
    display: block;
    text-decoration: none !important;
}

.stat-card {
    position: relative;

    min-height: 94px;
    padding: 16px;

    display: flex;
    align-items: center;
    gap: 13px;

    background: #fff;

    border: 1px solid #f0dfe4;
    border-radius: 15px;

    box-shadow: 0 5px 18px rgba(168, 14, 44, 0.045);

    transition: 0.22s ease;
}

.stat-link .stat-card:hover {
    transform: translateY(-3px);
    border-color: #dfbdc8;
    box-shadow: 0 10px 24px rgba(168, 14, 44, 0.10);
}

.stat-icon {
    width: 46px;
    height: 46px;

    flex-shrink: 0;

    display: flex;
    align-items: center;
    justify-content: center;

    border-radius: 13px;
    font-size: 16px;
}

.calendar-icon {
    background: #edf7fb;
    color: #429bc4;
}

.registration-icon {
    background: #fcecf2;
    color: #c92e61;
}

.history-icon {
    background: #f1eef9;
    color: #8170b4;
}

.blood-icon {
    background: #fff3e3;
    color: #c98732;
}

.stat-content {
    min-width: 0;
}

.stat-number {
    color: #283252;
    font-size: 21px;
    font-weight: 900;
    line-height: 1;
    margin-bottom: 5px;
}

.stat-number small {
    font-size: 9px;
    font-weight: 800;
}

.stat-label {
    color: #8f8d98;
    font-size: 9px;
    font-weight: 600;
}

.stat-arrow {
    position: absolute;

    right: 14px;
    top: 50%;

    transform: translateY(-50%);

    width: 25px;
    height: 25px;

    display: flex;
    align-items: center;
    justify-content: center;

    background: #faf0f3;
    color: #b0143b;

    border-radius: 8px;
    font-size: 8px;
}


/* Bottom */

.dashboard-bottom {
    margin-top: 4px;
}

.dashboard-card {
    width: 100%;
    min-height: 245px;
    padding: 22px;

    background: #fff;

    border: 1px solid #f0dfe4;
    border-radius: 17px;

    box-shadow: 0 5px 18px rgba(168, 14, 44, 0.045);
}

.card-title-row {
    display: flex;
    align-items: flex-start;
    justify-content: space-between;

    margin-bottom: 17px;
}

.card-mini-title {
    display: block;
    margin-bottom: 3px;

    color: #b0143b;

    font-size: 8px;
    font-weight: 900;
    letter-spacing: 1.7px;
}

.card-title-row h3 {
    margin: 0;

    color: #283252;

    font-size: 17px;
    font-weight: 800;
}

.card-subtitle {
    margin: 3px 0 0;

    color: #9996a0;

    font-size: 9px;
}

.see-all {
    display: inline-flex;
    align-items: center;
    gap: 5px;

    padding-top: 5px;

    color: #b0143b;

    font-size: 9px;
    font-weight: 800;

    text-decoration: none !important;
}

.see-all:hover {
    color: #8f0c2a;
}


/* Activity */

.activity-item {
    min-height: 118px;
    padding: 15px;

    display: flex;
    align-items: center;
    gap: 14px;

    background: linear-gradient(
        135deg,
        #fffafa,
        #fff6f8
    );

    border: 1px solid #f1dfe4;
    border-radius: 14px;
}

.activity-left {
    display: flex;
    align-items: center;
    gap: 10px;

    flex-shrink: 0;
}

.activity-icon {
    width: 46px;
    height: 46px;

    display: flex;
    align-items: center;
    justify-content: center;

    border-radius: 13px;

    background: linear-gradient(
        135deg,
        #a80e2c,
        #d94b91
    );

    color: #fff;
    font-size: 16px;

    box-shadow: 0 7px 14px rgba(168, 14, 44, 0.15);
}

.activity-date {
    width: 38px;
    text-align: center;
}

.activity-date strong {
    display: block;

    color: #b0143b;

    font-size: 17px;
    font-weight: 900;
    line-height: 1;
}

.activity-date span {
    color: #99949b;

    font-size: 8px;
    text-transform: uppercase;
    font-weight: 800;
}

.activity-info {
    flex: 1;
    min-width: 0;
}

.activity-status {
    display: inline-flex;
    align-items: center;
    gap: 5px;

    margin-bottom: 5px;

    color: #24876e;

    font-size: 8px;
    font-weight: 800;
}

.activity-status span {
    width: 6px;
    height: 6px;

    background: #28a985;
    border-radius: 50%;
}

.activity-info h4 {
    margin: 0 0 8px;

    color: #37415f;

    font-size: 12px;
    font-weight: 800;
    line-height: 1.4;
}

.activity-details {
    display: flex;
    flex-wrap: wrap;
    gap: 5px 13px;
}

.activity-details span {
    color: #918d94;
    font-size: 8px;
}

.activity-details i {
    margin-right: 3px;
    color: #c23c60;
}

.detail-button {
    display: inline-flex;
    align-items: center;
    gap: 7px;

    flex-shrink: 0;

    padding: 9px 12px;

    background: #b0143b;
    color: #fff !important;

    border-radius: 9px;

    font-size: 9px;
    font-weight: 800;

    text-decoration: none !important;

    transition: 0.2s ease;
}

.detail-button:hover {
    background: #8f0c2a;
    transform: translateY(-1px);
}

.detail-button i {
    font-size: 7px;
}


/* Empty */

.empty-activity {
    min-height: 118px;

    display: flex;
    flex-direction: column;
    align-items: center;
    justify-content: center;

    background: #fffafa;

    border: 1px dashed #e8ccd4;
    border-radius: 13px;
}

.empty-icon {
    width: 42px;
    height: 42px;

    margin-bottom: 8px;

    display: flex;
    align-items: center;
    justify-content: center;

    background: #f9eaf0;
    color: #b0143b;

    border-radius: 12px;
}

.empty-activity h4 {
    margin: 0 0 3px;

    color: #414a67;

    font-size: 11px;
    font-weight: 800;
}

.empty-activity p {
    margin: 0;

    color: #99949b;

    font-size: 9px;
}


/* Information */

.info-header-icon {
    width: 29px;
    height: 29px;

    display: flex;
    align-items: center;
    justify-content: center;

    background: #f9eaf0;
    color: #b0143b;

    border-radius: 9px;
    font-size: 10px;
}

.information-content {
    min-height: 165px;
    padding: 12px 18px;

    display: flex;
    flex-direction: column;
    align-items: center;
    justify-content: center;

    background: linear-gradient(
        145deg,
        #fff9f7,
        #fff3f7
    );

    border: 1px solid #f1dfe4;
    border-radius: 13px;

    text-align: center;
}

.info-blood-area {
    position: relative;

    width: 90px;
    height: 70px;

    margin-bottom: 1px;
}

.info-circle {
    position: absolute;
    border-radius: 50%;
}

.info-circle.blue {
    width: 60px;
    height: 60px;

    left: 8px;
    top: 5px;

    background: rgba(104, 185, 216, 0.20);
}

.info-circle.pink {
    width: 43px;
    height: 43px;

    right: 7px;
    bottom: 4px;

    background: rgba(217, 75, 145, 0.10);
}

.info-circle.yellow {
    width: 18px;
    height: 18px;

    right: 4px;
    top: 2px;

    background: rgba(232, 186, 82, 0.35);
}

.info-blood {
    position: absolute;

    left: 31px;
    top: 11px;

    width: 40px;
    height: 49px;

    display: flex;
    align-items: center;
    justify-content: center;

    background: linear-gradient(
        145deg,
        #a80e2c,
        #d94b91
    );

    color: #fff;

    border-radius: 50% 50% 58% 58%;

    box-shadow: 0 7px 14px rgba(168, 14, 44, 0.16);
}

.info-blood:before {
    content: "";

    position: absolute;

    width: 24px;
    height: 24px;

    top: -8px;
    left: 8px;

    background: #b0143b;

    border-radius: 50%;
    transform: rotate(45deg);

    z-index: -1;
}

.info-blood i {
    font-size: 13px;
}

.info-tag {
    margin-bottom: 4px;

    color: #b0143b;

    font-size: 7px;
    font-weight: 900;
    letter-spacing: 1.4px;
}

.information-content h4 {
    margin: 0 0 5px;

    color: #3c4664;

    font-size: 13px;
    font-weight: 800;
}

.information-content p {
    max-width: 235px;

    margin: 0 0 8px;

    color: #908c94;

    font-size: 9px;
    line-height: 1.6;
}

.info-note {
    color: #b0143b;

    font-size: 8px;
    font-weight: 800;
}

.info-note i {
    margin-right: 3px;
}


/* Responsive */

@media (max-width: 991px) {

    .dashboard-page {
        padding: 24px 22px 35px;
    }

    .welcome-content {
        max-width: 78%;
    }

    .blood-illustration {
        right: 25px;
    }

}


@media (max-width: 768px) {

    .dashboard-page {
        padding: 20px 15px 30px;
    }

    .welcome-card {
        padding: 24px;
    }

    .welcome-content {
        max-width: 100%;
    }

    .welcome-content h2 {
        font-size: 21px;
    }

    .blood-illustration {
        opacity: 0.16;
        right: 0;
    }

    .activity-item {
        align-items: flex-start;
        flex-wrap: wrap;
    }

    .activity-info {
        width: calc(100% - 60px);
    }

    .activity-details {
        display: block;
    }

    .activity-details span {
        display: block;
        margin-bottom: 5px;
    }

    .detail-button {
        width: 100%;
        justify-content: center;
    }

}


@media (max-width: 480px) {

    .dashboard-page {
        padding: 18px 12px 25px;
    }

    .welcome-card {
        padding: 20px;
    }

    .welcome-content h2 {
        font-size: 19px;
    }

    .welcome-button {
        font-size: 9px;
        padding: 9px 13px;
    }

    .stat-card {
        min-height: 84px;
        padding: 13px;
    }

    .stat-icon {
        width: 42px;
        height: 42px;
    }

    .stat-arrow {
        display: none;
    }

    .dashboard-card {
        padding: 17px;
    }

}

</style>

@endpush