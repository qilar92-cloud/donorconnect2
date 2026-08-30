@extends('layouts.app')

@section('title', 'Dashboard DonorConnect')

@section('content')

<div class="dashboard-page">

    <div class="dashboard-heading">
        <div>
            <span class="mini-brand">DONORCONNECT</span>
            <h1>Dashboard</h1>
            <p>
                Selamat datang kembali,
                {{ Auth::user()->nama ?? 'Pendonor' }} ♡
            </p>
        </div>

        <div class="role-badge">
            <i class="fas fa-user"></i>
            {{ Auth::user()->role ?? 'Pendonor' }}
        </div>
    </div>


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
                Lihat Kegiatan
            </a>

        </div>

        <div class="blood-illustration">

            <span class="bubble bubble-blue"></span>
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
            <div class="stat-card">

                <div class="stat-icon calendar-icon">
                    <i class="fas fa-calendar-alt"></i>
                </div>

                <div>
                    <div class="stat-number">
                        {{ $jumlahKegiatan }}
                    </div>

                    <div class="stat-label">
                        Kegiatan Tersedia
                    </div>
                </div>

            </div>
        </div>


        <div class="col-xl-3 col-md-6 mb-3">
            <div class="stat-card">

                <div class="stat-icon registration-icon">
                    <i class="fas fa-clipboard-check"></i>
                </div>

                <div>
                    <div class="stat-number">
                        0
                    </div>

                    <div class="stat-label">
                        Pendaftaran Aktif
                    </div>
                </div>

            </div>
        </div>


        <div class="col-xl-3 col-md-6 mb-3">
            <div class="stat-card">

                <div class="stat-icon history-icon">
                    <i class="fas fa-history"></i>
                </div>

                <div>
                    <div class="stat-number">
                        0
                    </div>

                    <div class="stat-label">
                        Riwayat Donor
                    </div>
                </div>

            </div>
        </div>


        <div class="col-xl-3 col-md-6 mb-3">
            <div class="stat-card">

                <div class="stat-icon blood-icon">
                    <i class="fas fa-tint"></i>
                </div>

                <div>
                    <div class="stat-number">
                        0 ml
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
                        <span class="card-mini-title">DONOR</span>
                        <h3>Kegiatan Terdekat</h3>
                    </div>

                    <a href="{{ route('pendonor.kegiatan') }}"
                       class="see-all">
                        Lihat Semua
                        <i class="fas fa-arrow-right"></i>
                    </a>

                </div>


                @php
                    $kegiatanTerdekat = \App\Models\KegiatanDonor::orderBy('tanggal')
                        ->first();
                @endphp


                @if($kegiatanTerdekat)

                    <div class="activity-item">

                        <div class="activity-icon">
                            <i class="fas fa-calendar-alt"></i>
                        </div>

                        <div class="activity-info">

                            <h4>
                                {{ $kegiatanTerdekat->nama_kegiatan }}
                            </h4>

                            <div class="activity-details">

                                <span>
                                    <i class="fas fa-calendar"></i>
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
                        </a>

                    </div>

                @else

                    <div class="empty-activity">

                        <div class="empty-icon">
                            <i class="fas fa-tint"></i>
                        </div>

                        <p>Belum ada kegiatan donor.</p>

                    </div>

                @endif

            </div>

        </div>


        <div class="col-lg-4 mb-4">

            <div class="dashboard-card information-card">

                <div class="card-title-row">

                    <div>
                        <span class="card-mini-title">INFO</span>
                        <h3>Untuk Kamu</h3>
                    </div>

                    <i class="fas fa-heart info-title-icon"></i>

                </div>


                <div class="information-content">

                    <div class="info-blood-area">

                        <span class="info-circle blue"></span>
                        <span class="info-circle yellow"></span>

                        <div class="info-blood">
                            <i class="fas fa-heart"></i>
                        </div>

                    </div>

                    <h4>Setetes darahmu berarti</h4>

                    <p>
                        Donormu hari ini bisa menjadi
                        harapan bagi seseorang yang membutuhkan.
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

/* Dashboard */

.dashboard-page {
    width: 100%;
    min-height: calc(100vh - 80px);
    padding: 28px 30px 40px;
    background: #fff8f1;
}


/* Heading */

.dashboard-heading {
    display: flex;
    justify-content: space-between;
    align-items: center;
    margin-bottom: 22px;
}

.mini-brand {
    display: block;
    margin-bottom: 5px;
    color: #d94b63;
    font-size: 9px;
    font-weight: 800;
    letter-spacing: 2.5px;
}

.dashboard-heading h1 {
    margin: 0 0 4px;
    color: #3f4d72;
    font-size: 30px;
    font-weight: 800;
}

.dashboard-heading p {
    margin: 0;
    color: #928b8a;
    font-size: 12px;
}

.role-badge {
    padding: 8px 16px;
    border: 1px solid #f0cfd0;
    border-radius: 20px;
    background: #fff5f5;
    color: #c84a60;
    font-size: 10px;
    font-weight: 700;
}

.role-badge i {
    margin-right: 5px;
}


/* Welcome */

.welcome-card {
    position: relative;
    min-height: 190px;
    margin-bottom: 22px;
    padding: 30px 38px;
    display: flex;
    align-items: center;
    justify-content: space-between;
    overflow: hidden;

    background: #fffdfb;
    border: 1px solid #f0dfd6;
    border-left: 5px solid #d94b63;
    border-radius: 17px;

    box-shadow: 0 5px 20px rgba(190, 130, 120, 0.07);
}

.welcome-content {
    position: relative;
    z-index: 3;
    max-width: 72%;
}

.welcome-label {
    margin-bottom: 9px;
    color: #d96b7d;
    font-size: 9px;
    font-weight: 800;
    letter-spacing: 1.5px;
}

.welcome-label i {
    margin-right: 4px;
}

.welcome-content h2 {
    margin: 0 0 8px;
    color: #405075;
    font-size: 25px;
    font-weight: 800;
}

.welcome-content p {
    max-width: 650px;
    margin: 0 0 16px;
    color: #8d8787;
    font-size: 12px;
    line-height: 1.7;
}

.welcome-button {
    display: inline-flex;
    align-items: center;
    gap: 7px;
    padding: 9px 16px;
    background: #d94b63;
    color: #ffffff !important;
    border-radius: 8px;
    font-size: 10px;
    font-weight: 700;
    text-decoration: none !important;
    box-shadow: 0 5px 12px rgba(217, 75, 99, 0.18);
}

.welcome-button:hover {
    background: #c63e56;
}


/* Blood illustration */

.blood-illustration {
    position: absolute;
    right: 55px;
    top: 50%;
    width: 145px;
    height: 145px;
    transform: translateY(-50%);
}

.blood-drop-main {
    position: absolute;
    left: 43px;
    top: 25px;
    width: 62px;
    height: 76px;
    display: flex;
    justify-content: center;
    align-items: center;

    background: #d94b63;
    color: #ffffff;

    border-radius: 52% 52% 58% 58%;
    transform: rotate(0deg);

    box-shadow: 0 8px 18px rgba(217, 75, 99, 0.18);
}

.blood-drop-main:before {
    content: "";
    position: absolute;
    top: -14px;
    left: 13px;
    width: 35px;
    height: 35px;
    background: #d94b63;
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
    width: 92px;
    height: 92px;
    left: 12px;
    top: 25px;
    background: rgba(125, 191, 218, 0.25);
}

.bubble-yellow {
    width: 28px;
    height: 28px;
    right: 8px;
    top: 7px;
    background: rgba(235, 191, 91, 0.45);
}

.small-heart {
    position: absolute;
    right: 13px;
    bottom: 15px;
    width: 25px;
    height: 25px;
    display: flex;
    justify-content: center;
    align-items: center;
    background: #f6d6df;
    color: #d94b63;
    border-radius: 50%;
    font-size: 9px;
}


/* Statistics */

.dashboard-statistics {
    margin-left: -6px;
    margin-right: -6px;
}

.dashboard-statistics > div {
    padding-left: 6px;
    padding-right: 6px;
}

.stat-card {
    min-height: 90px;
    padding: 17px;
    display: flex;
    align-items: center;
    gap: 14px;

    background: #fffdfb;
    border: 1px solid #f0dfd6;
    border-radius: 13px;

    box-shadow: 0 3px 12px rgba(190, 130, 120, 0.05);
    transition: 0.2s ease;
}

.stat-card:hover {
    transform: translateY(-2px);
    box-shadow: 0 6px 16px rgba(190, 130, 120, 0.09);
}

.stat-icon {
    width: 44px;
    height: 44px;
    flex-shrink: 0;

    display: flex;
    justify-content: center;
    align-items: center;

    border-radius: 11px;
    font-size: 16px;
}

.calendar-icon {
    background: #eaf5fb;
    color: #62a8cc;
}

.registration-icon {
    background: #fff0f3;
    color: #d96b86;
}

.history-icon {
    background: #eef7f6;
    color: #67aaa6;
}

.blood-icon {
    background: #fff3df;
    color: #d49a45;
}

.stat-number {
    margin-bottom: 3px;
    color: #405075;
    font-size: 20px;
    font-weight: 800;
}

.stat-label {
    color: #989092;
    font-size: 9px;
}


/* Cards */

.dashboard-bottom {
    margin-top: 4px;
}

.dashboard-card {
    width: 100%;
    min-height: 235px;
    padding: 23px;

    background: #fffdfb;
    border: 1px solid #f0dfd6;
    border-radius: 15px;

    box-shadow: 0 3px 13px rgba(190, 130, 120, 0.05);
}

.card-title-row {
    display: flex;
    justify-content: space-between;
    align-items: center;
    margin-bottom: 18px;
}

.card-mini-title {
    display: block;
    margin-bottom: 3px;
    color: #d98291;
    font-size: 8px;
    font-weight: 800;
    letter-spacing: 1.5px;
}

.card-title-row h3 {
    margin: 0;
    color: #405075;
    font-size: 16px;
    font-weight: 800;
}

.see-all {
    color: #d65b70;
    font-size: 9px;
    font-weight: 700;
    text-decoration: none;
}

.see-all i {
    margin-left: 3px;
}

.see-all:hover {
    color: #bc4056;
    text-decoration: none;
}


/* Activity */

.activity-item {
    min-height: 105px;
    padding: 16px;

    display: flex;
    align-items: center;
    gap: 14px;

    background: #fff9f5;
    border: 1px solid #f2e3dc;
    border-radius: 11px;
}

.activity-icon {
    width: 43px;
    height: 43px;
    flex-shrink: 0;

    display: flex;
    justify-content: center;
    align-items: center;

    border-radius: 10px;
    background: #eaf5fb;
    color: #63a8c8;
    font-size: 15px;
}

.activity-info {
    flex: 1;
    min-width: 0;
}

.activity-info h4 {
    margin: 0 0 9px;
    color: #4a5570;
    font-size: 12px;
    font-weight: 800;
}

.activity-details {
    display: flex;
    flex-wrap: wrap;
    gap: 7px 14px;
}

.activity-details span {
    color: #918a8a;
    font-size: 9px;
}

.activity-details i {
    margin-right: 3px;
    color: #d96b7d;
}

.detail-button {
    padding: 8px 14px;
    flex-shrink: 0;

    display: inline-flex;
    justify-content: center;
    align-items: center;

    background: #d94b63;
    color: #ffffff !important;
    border-radius: 7px;

    font-size: 9px;
    font-weight: 700;
    text-decoration: none !important;
}

.detail-button:hover {
    background: #c63e56;
}


/* Empty */

.empty-activity {
    min-height: 105px;

    display: flex;
    flex-direction: column;
    justify-content: center;
    align-items: center;

    background: #fff9f5;
    border: 1px solid #f2e3dc;
    border-radius: 11px;
}

.empty-icon {
    width: 42px;
    height: 42px;
    margin-bottom: 8px;

    display: flex;
    justify-content: center;
    align-items: center;

    border-radius: 50%;
    background: #fff0f3;
    color: #d96a7d;
}

.empty-activity p {
    margin: 0;
    color: #999292;
    font-size: 10px;
}


/* Information */

.information-card {
    min-height: 235px;
}

.info-title-icon {
    color: #d96b7d;
    font-size: 12px;
}

.information-content {
    min-height: 155px;
    padding: 15px 18px;

    display: flex;
    flex-direction: column;
    align-items: center;
    justify-content: center;

    background: #fff8f3;
    border: 1px solid #f1e1da;
    border-radius: 11px;
    text-align: center;
}

.info-blood-area {
    position: relative;
    width: 85px;
    height: 70px;
    margin-bottom: 4px;
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
    background: rgba(113, 185, 215, 0.22);
}

.info-circle.yellow {
    width: 19px;
    height: 19px;
    right: 4px;
    top: 3px;
    background: rgba(232, 186, 82, 0.42);
}

.info-blood {
    position: absolute;
    left: 30px;
    top: 11px;

    width: 39px;
    height: 48px;

    display: flex;
    justify-content: center;
    align-items: center;

    background: #d94b63;
    color: #ffffff;

    border-radius: 50% 50% 58% 58%;
    box-shadow: 0 6px 12px rgba(217, 75, 99, 0.16);
}

.info-blood:before {
    content: "";
    position: absolute;
    top: -8px;
    left: 8px;

    width: 23px;
    height: 23px;

    background: #d94b63;
    border-radius: 50%;
    transform: rotate(45deg);
    z-index: -1;
}

.info-blood i {
    font-size: 13px;
}

.information-content h4 {
    margin: 0 0 5px;
    color: #4a5570;
    font-size: 12px;
    font-weight: 800;
}

.information-content p {
    max-width: 245px;
    margin: 0 0 8px;

    color: #918a8a;
    font-size: 9px;
    line-height: 1.6;
}

.info-note {
    color: #d66a7c;
    font-size: 8px;
    font-weight: 700;
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

    .dashboard-heading h1 {
        font-size: 25px;
    }

    .role-badge {
        display: none;
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
        opacity: 0.18;
        right: 0;
    }

    .activity-item {
        align-items: flex-start;
        flex-wrap: wrap;
    }

    .activity-info {
        width: calc(100% - 58px);
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
    }

}


@media (max-width: 480px) {

    .dashboard-page {
        padding: 18px 12px 25px;
    }

    .dashboard-heading h1 {
        font-size: 22px;
    }

    .welcome-card {
        padding: 20px;
    }

    .welcome-content h2 {
        font-size: 19px;
    }

    .stat-card {
        min-height: 85px;
        padding: 14px;
    }

    .dashboard-card {
        padding: 17px;
    }

}

</style>

@endpush