@extends('layouts.app')

@section('title', 'Dashboard DonorConnect')

@section('content')

<div class="dashboard-page">

    <!-- HEADER DASHBOARD -->
    <div class="dashboard-heading">
        <div>
            <h1>Dashboard</h1>
            <p>Selamat datang kembali di DonorConnect</p>
        </div>

        <div class="role-badge">
            {{ Auth::user()->role ?? 'Pendonor' }}
        </div>
    </div>


    <!-- SAPAAN -->
    <div class="welcome-card">

        <div class="welcome-content">
            <h2>
                Halo, {{ Auth::user()->nama }}! 👋
            </h2>

            <p>
                Terima kasih telah menjadi bagian dari
                <strong>DONORCONNECT</strong>.
                Mari bersama membantu sesama melalui donor darah.
            </p>
        </div>

        <div class="blood-decoration">
            <div class="blood-drop">♥</div>
        </div>

    </div>


    <!-- STATISTIC CARDS -->
    <div class="row dashboard-statistics">

        <div class="col-xl-3 col-md-6 mb-4">
            <div class="stat-card">

                <div class="stat-icon calendar-icon">
                    <i class="fas fa-calendar-alt"></i>
                </div>

                <div class="stat-content">
                    <div class="stat-number">3</div>
                    <div class="stat-label">Kegiatan Tersedia</div>
                </div>

            </div>
        </div>


        <div class="col-xl-3 col-md-6 mb-4">
            <div class="stat-card">

                <div class="stat-icon heart-icon">
                    <i class="fas fa-heart"></i>
                </div>

                <div class="stat-content">
                    <div class="stat-number">1</div>
                    <div class="stat-label">Pendaftaran Aktif</div>
                </div>

            </div>
        </div>


        <div class="col-xl-3 col-md-6 mb-4">
            <div class="stat-card">

                <div class="stat-icon history-icon">
                    <i class="fas fa-history"></i>
                </div>

                <div class="stat-content">
                    <div class="stat-number">2</div>
                    <div class="stat-label">Riwayat Donor</div>
                </div>

            </div>
        </div>


        <div class="col-xl-3 col-md-6 mb-4">
            <div class="stat-card">

                <div class="stat-icon blood-icon-small">
                    <i class="fas fa-tint"></i>
                </div>

                <div class="stat-content">
                    <div class="stat-number">450 ml</div>
                    <div class="stat-label">Total Donor</div>
                </div>

            </div>
        </div>

    </div>


    <!-- BOTTOM CONTENT -->
    <div class="row">

        <!-- KEGIATAN TERDEKAT -->
        <div class="col-lg-8 mb-4">

            <div class="dashboard-card">

                <div class="card-title-row">
                    <h3>Kegiatan Terdekat</h3>

                    <a href="{{ route('pendonor.kegiatan') }}" class="see-all">
                        Lihat Semua
                    </a>
                </div>

                <div class="activity-item">

                    <div class="activity-icon">
                        <i class="fas fa-calendar-alt"></i>
                    </div>

                    <div class="activity-info">

                        <h4>Donor Darah Bersama PMR</h4>

                        <p>
                            <i class="fas fa-calendar"></i>
                            24 Mei 2025
                        </p>

                        <p>
                            <i class="fas fa-clock"></i>
                            08.00 - 12.00
                        </p>

                        <p>
                            <i class="fas fa-map-marker-alt"></i>
                            Aula PMR Kota Bandung
                        </p>

                    </div>

                    <a href="{{ route('pendonor.kegiatan') }}" class="detail-button">
                        Lihat Detail
                    </a>

                </div>

            </div>

        </div>


        <!-- INFORMASI -->
        <div class="col-lg-4 mb-4">

            <div class="dashboard-card information-card">

                <div class="card-title-row">
                    <h3>Informasi</h3>
                </div>

                <div class="information-content">

                    <div class="info-blood">
                        <i class="fas fa-tint"></i>
                    </div>

                    <p>
                        Setetes darah Anda sangat berarti
                        bagi mereka yang membutuhkan.
                    </p>

                    <p>
                        Yuk, terus semangat untuk
                        berbagi dan membantu sesama.
                    </p>

                </div>

            </div>

        </div>

    </div>

</div>


@push('styles')

<style>

    /* ================================
       DASHBOARD
    ================================= */

    .dashboard-page {
        background: #fff7f5;
        min-height: calc(100vh - 100px);
        padding-bottom: 30px;
    }


    /* HEADER */

    .dashboard-heading {
        display: flex;
        justify-content: space-between;
        align-items: center;
        margin-bottom: 25px;
    }

    .dashboard-heading h1 {
        font-size: 30px;
        font-weight: 800;
        color: #292733;
        margin-bottom: 5px;
    }

    .dashboard-heading p {
        margin: 0;
        color: #8a8588;
        font-size: 14px;
    }

    .role-badge {
        background: #fff0f1;
        color: #d91e36;
        border: 1px solid #f5c7cc;
        border-radius: 20px;
        padding: 8px 18px;
        font-size: 12px;
        font-weight: 700;
        text-transform: capitalize;
    }


    /* ================================
       WELCOME CARD
    ================================= */

    .welcome-card {
        position: relative;
        overflow: hidden;
        min-height: 170px;
        background: linear-gradient(
            135deg,
            #ffffff 0%,
            #fff3f3 100%
        );
        border: 1px solid #f5dfe1;
        border-radius: 18px;
        padding: 32px 38px;
        margin-bottom: 25px;
        box-shadow: 0 5px 20px rgba(217, 30, 54, 0.06);
        display: flex;
        align-items: center;
        justify-content: space-between;
    }

    .welcome-content {
        position: relative;
        z-index: 2;
        max-width: 70%;
    }

    .welcome-content h2 {
        color: #302e38;
        font-size: 25px;
        font-weight: 800;
        margin-bottom: 10px;
    }

    .welcome-content p {
        color: #777276;
        font-size: 14px;
        line-height: 1.7;
        margin: 0;
    }

    .welcome-content strong {
        color: #d91e36;
    }


    /* BLOOD DECORATION */

    .blood-decoration {
        position: absolute;
        right: 45px;
        top: 25px;
        width: 100px;
        height: 120px;
        display: flex;
        justify-content: center;
        align-items: center;
    }

    .blood-drop {
        width: 75px;
        height: 90px;
        background: #e51f3b;
        color: #ffffff;
        font-size: 27px;
        display: flex;
        justify-content: center;
        align-items: center;
        border-radius: 55% 55% 60% 60%;
        transform: rotate(0deg);
        box-shadow: 0 8px 18px rgba(229, 31, 59, 0.20);
    }

    .blood-drop::before {
        content: "";
        position: absolute;
        top: -22px;
        border-left: 37px solid transparent;
        border-right: 37px solid transparent;
        border-bottom: 38px solid #e51f3b;
    }


    /* ================================
       STATISTIC CARDS
    ================================= */

    .dashboard-statistics {
        margin-left: -8px;
        margin-right: -8px;
    }

    .dashboard-statistics > div {
        padding-left: 8px;
        padding-right: 8px;
    }

    .stat-card {
        background: #ffffff;
        border: 1px solid #f3dfe1;
        border-radius: 15px;
        min-height: 105px;
        padding: 22px;
        display: flex;
        align-items: center;
        gap: 17px;
        box-shadow: 0 4px 15px rgba(217, 30, 54, 0.05);
        transition: 0.2s;
    }

    .stat-card:hover {
        transform: translateY(-2px);
        box-shadow: 0 7px 20px rgba(217, 30, 54, 0.09);
    }

    .stat-icon {
        width: 48px;
        height: 48px;
        border-radius: 13px;
        display: flex;
        align-items: center;
        justify-content: center;
        font-size: 19px;
    }

    .calendar-icon {
        background: #fff0f1;
        color: #d91e36;
    }

    .heart-icon {
        background: #fff1f3;
        color: #e51f3b;
    }

    .history-icon {
        background: #fff5f0;
        color: #df596a;
    }

    .blood-icon-small {
        background: #ffecef;
        color: #d91e36;
    }

    .stat-number {
        color: #302e38;
        font-size: 21px;
        font-weight: 800;
        margin-bottom: 3px;
    }

    .stat-label {
        color: #898388;
        font-size: 11px;
    }


    /* ================================
       DASHBOARD CARD
    ================================= */

    .dashboard-card {
        background: #ffffff;
        border: 1px solid #f3dfe1;
        border-radius: 16px;
        padding: 25px;
        min-height: 250px;
        box-shadow: 0 4px 15px rgba(217, 30, 54, 0.05);
    }

    .card-title-row {
        display: flex;
        justify-content: space-between;
        align-items: center;
        margin-bottom: 22px;
    }

    .card-title-row h3 {
        color: #302e38;
        font-size: 17px;
        font-weight: 800;
        margin: 0;
    }

    .see-all {
        color: #d91e36;
        font-size: 11px;
        font-weight: 700;
        text-decoration: none;
    }

    .see-all:hover {
        color: #b9162d;
        text-decoration: none;
    }


    /* ================================
       ACTIVITY
    ================================= */

    .activity-item {
        background: #fff9f8;
        border: 1px solid #f6e4e5;
        border-radius: 12px;
        padding: 17px;
        display: flex;
        align-items: center;
        gap: 15px;
    }

    .activity-icon {
        min-width: 43px;
        height: 43px;
        border-radius: 11px;
        background: #fff0f1;
        color: #d91e36;
        display: flex;
        align-items: center;
        justify-content: center;
    }

    .activity-info {
        flex: 1;
    }

    .activity-info h4 {
        color: #302e38;
        font-size: 13px;
        font-weight: 800;
        margin-bottom: 8px;
    }

    .activity-info p {
        display: inline-block;
        color: #8a8588;
        font-size: 10px;
        margin: 0 15px 0 0;
    }

    .activity-info p i {
        color: #d91e36;
        margin-right: 4px;
    }

    .detail-button {
        background: #e51f3b;
        color: #ffffff !important;
        border-radius: 7px;
        padding: 8px 13px;
        font-size: 10px;
        font-weight: 700;
        text-decoration: none !important;
        white-space: nowrap;
    }

    .detail-button:hover {
        background: #c91830;
    }


    /* ================================
       INFORMATION
    ================================= */

    .information-card {
        position: relative;
        overflow: hidden;
    }

    .information-content {
        background: #fff8f7;
        border-radius: 12px;
        padding: 20px;
        text-align: center;
    }

    .info-blood {
        width: 45px;
        height: 55px;
        background: #e51f3b;
        color: #ffffff;
        border-radius: 50% 50% 55% 55%;
        margin: 0 auto 12px;
        display: flex;
        align-items: center;
        justify-content: center;
        font-size: 18px;
    }

    .information-content p {
        color: #777276;
        font-size: 11px;
        line-height: 1.7;
        margin-bottom: 7px;
    }


    /* ================================
       RESPONSIVE
    ================================= */

    @media (max-width: 768px) {

        .dashboard-heading {
            align-items: flex-start;
        }

        .dashboard-heading h1 {
            font-size: 25px;
        }

        .role-badge {
            display: none;
        }

        .welcome-card {
            padding: 25px;
        }

        .welcome-content {
            max-width: 100%;
        }

        .welcome-content h2 {
            font-size: 21px;
        }

        .blood-decoration {
            opacity: 0.15;
            right: 10px;
        }

        .activity-item {
            align-items: flex-start;
            flex-wrap: wrap;
        }

        .detail-button {
            width: 100%;
            text-align: center;
        }

        .activity-info p {
            display: block;
            margin-bottom: 4px;
        }

    }

</style>

@endpush

@endsection