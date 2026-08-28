@extends('layouts.app')

@section('title', 'Dashboard DonorConnect')

@section('content')

<div class="dashboard-page">

    <div class="dashboard-heading">
        <div>
            <h1>Dashboard</h1>
            <p>Selamat datang kembali di DonorConnect</p>
        </div>

        <div class="role-badge">
            {{ Auth::user()->role ?? 'Pendonor' }}
        </div>
    </div>

    <div class="welcome-card">

        <div class="welcome-content">

            <div class="welcome-brand">
                DONORCONNECT
            </div>

            <h2>
                Halo, {{ Auth::user()->nama ?? 'Pendonor' }}! 👋
            </h2>

            <p>
                Terima kasih telah menjadi bagian dari
                <strong>DONORCONNECT</strong>.
                Mari bersama membantu sesama melalui donor darah.
            </p>

        </div>

        <div class="blood-decoration">
            <div class="blood-drop">
                <i class="fas fa-heart"></i>
            </div>
        </div>

    </div>

    <div class="row dashboard-statistics">

        <div class="col-xl-3 col-md-6 mb-3">
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

            </div>
        </div>

        <div class="col-xl-3 col-md-6 mb-3">
            <div class="stat-card">

                <div class="stat-icon heart-icon">
                    <i class="fas fa-heart"></i>
                </div>

                <div class="stat-content">
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

                <div class="stat-content">
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

                <div class="stat-icon blood-icon-small">
                    <i class="fas fa-tint"></i>
                </div>

                <div class="stat-content">
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

    <div class="row dashboard-bottom">

        <div class="col-lg-8 mb-4">

            <div class="dashboard-card activity-card">

                <div class="card-title-row">

                    <h3>Kegiatan Terdekat</h3>

                    <a href="{{ route('pendonor.kegiatan') }}"
                       class="see-all">
                        Lihat Semua
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
                            Lihat Detail
                        </a>

                    </div>

                @else

                    <div class="empty-activity">
                        <i class="fas fa-calendar-times"></i>
                        <p>Belum ada kegiatan donor.</p>
                    </div>

                @endif

            </div>

        </div>

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

@endsection


@push('styles')

<style>

.dashboard-page {
    width: 100%;
    min-height: calc(100vh - 80px);
    padding: 25px 28px 35px;
    background: #fffafa;
}

.dashboard-heading {
    display: flex;
    justify-content: space-between;
    align-items: center;
    margin-bottom: 20px;
}

.dashboard-heading h1 {
    margin: 0 0 5px;
    font-size: 30px;
    font-weight: 800;
    color: #292733;
}

.dashboard-heading p {
    margin: 0;
    font-size: 13px;
    color: #8a8588;
}

.role-badge {
    padding: 7px 16px;
    border-radius: 20px;
    background: #fff0f1;
    border: 1px solid #f3cbd0;
    color: #d91e36;
    font-size: 11px;
    font-weight: 700;
    text-transform: capitalize;
}

.welcome-card {
    position: relative;
    width: 100%;
    min-height: 155px;
    margin-bottom: 20px;
    padding: 28px 34px;
    display: flex;
    align-items: center;
    justify-content: space-between;
    background: #ffffff;
    border: 1px solid #f3e1e2;
    border-left: 5px solid #e51f3b;
    border-radius: 15px;
    box-shadow: 0 4px 14px rgba(217, 30, 54, 0.05);
    overflow: hidden;
}

.welcome-content {
    position: relative;
    z-index: 2;
    max-width: 75%;
}

.welcome-brand {
    margin-bottom: 6px;
    color: #d91e36;
    font-size: 10px;
    font-weight: 800;
    letter-spacing: 2px;
}

.welcome-content h2 {
    margin: 0 0 8px;
    color: #302e38;
    font-size: 24px;
    font-weight: 800;
}

.welcome-content p {
    margin: 0;
    color: #858085;
    font-size: 13px;
    line-height: 1.7;
}

.welcome-content strong {
    color: #d91e36;
}

.blood-decoration {
    position: absolute;
    right: 38px;
    top: 50%;
    transform: translateY(-50%);
    width: 90px;
    height: 100px;
    display: flex;
    justify-content: center;
    align-items: center;
}

.blood-drop {
    width: 58px;
    height: 72px;
    display: flex;
    justify-content: center;
    align-items: center;
    background: #e51f3b;
    color: #ffffff;
    border-radius: 50% 50% 55% 55%;
    font-size: 21px;
    box-shadow: 0 7px 17px rgba(229, 31, 59, 0.18);
}

.dashboard-statistics {
    margin-left: -6px;
    margin-right: -6px;
}

.dashboard-statistics > div {
    padding-left: 6px;
    padding-right: 6px;
}

.stat-card {
    width: 100%;
    min-height: 92px;
    padding: 18px;
    display: flex;
    align-items: center;
    gap: 14px;
    background: #ffffff;
    border: 1px solid #f2e0e2;
    border-radius: 13px;
    box-shadow: 0 3px 12px rgba(217, 30, 54, 0.04);
    transition: 0.2s ease;
}

.stat-card:hover {
    transform: translateY(-2px);
    box-shadow: 0 6px 17px rgba(217, 30, 54, 0.08);
}

.stat-icon {
    flex-shrink: 0;
    width: 44px;
    height: 44px;
    display: flex;
    justify-content: center;
    align-items: center;
    border-radius: 11px;
    font-size: 17px;
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
    background: #fff4f1;
    color: #dc6370;
}

.blood-icon-small {
    background: #ffedf0;
    color: #d91e36;
}

.stat-number {
    margin-bottom: 3px;
    color: #302e38;
    font-size: 20px;
    font-weight: 800;
}

.stat-label {
    color: #8d878c;
    font-size: 10px;
    white-space: nowrap;
}

.dashboard-bottom {
    margin-top: 2px;
}

.dashboard-card {
    width: 100%;
    min-height: 235px;
    padding: 22px;
    background: #ffffff;
    border: 1px solid #f1e0e2;
    border-radius: 14px;
    box-shadow: 0 3px 13px rgba(217, 30, 54, 0.04);
}

.card-title-row {
    display: flex;
    justify-content: space-between;
    align-items: center;
    margin-bottom: 18px;
}

.card-title-row h3 {
    margin: 0;
    color: #302e38;
    font-size: 16px;
    font-weight: 800;
}

.see-all {
    color: #d91e36;
    font-size: 10px;
    font-weight: 700;
    text-decoration: none;
}

.see-all:hover {
    color: #b9162d;
    text-decoration: none;
}

.activity-item {
    width: 100%;
    min-height: 105px;
    padding: 16px;
    display: flex;
    align-items: center;
    gap: 14px;
    background: #fffafa;
    border: 1px solid #f3e3e4;
    border-radius: 11px;
}

.activity-icon {
    flex-shrink: 0;
    width: 43px;
    height: 43px;
    display: flex;
    justify-content: center;
    align-items: center;
    border-radius: 10px;
    background: #fff0f1;
    color: #d91e36;
    font-size: 15px;
}

.activity-info {
    flex: 1;
    min-width: 0;
}

.activity-info h4 {
    margin: 0 0 9px;
    color: #302e38;
    font-size: 12px;
    font-weight: 800;
}

.activity-details {
    display: flex;
    flex-wrap: wrap;
    gap: 7px 14px;
}

.activity-details span {
    color: #8c868b;
    font-size: 9px;
}

.activity-details i {
    color: #d91e36;
    margin-right: 3px;
}

.detail-button {
    flex-shrink: 0;
    padding: 8px 13px;
    display: inline-flex;
    justify-content: center;
    align-items: center;
    background: #e51f3b;
    color: #ffffff !important;
    border-radius: 7px;
    font-size: 9px;
    font-weight: 700;
    text-decoration: none !important;
    white-space: nowrap;
}

.detail-button:hover {
    background: #c91830;
    color: #ffffff !important;
}

.empty-activity {
    min-height: 105px;
    display: flex;
    flex-direction: column;
    justify-content: center;
    align-items: center;
    background: #fffafa;
    border: 1px solid #f3e3e4;
    border-radius: 11px;
    color: #aaa;
}

.empty-activity i {
    margin-bottom: 8px;
    font-size: 25px;
    color: #d91e36;
}

.empty-activity p {
    margin: 0;
    font-size: 11px;
}

.information-card {
    min-height: 235px;
}

.information-content {
    min-height: 155px;
    padding: 18px;
    display: flex;
    flex-direction: column;
    align-items: center;
    justify-content: center;
    background: #fff9f8;
    border: 1px solid #f5e5e6;
    border-radius: 11px;
    text-align: center;
}

.info-blood {
    width: 43px;
    height: 50px;
    margin-bottom: 10px;
    display: flex;
    justify-content: center;
    align-items: center;
    background: #e51f3b;
    color: #ffffff;
    border-radius: 50% 50% 55% 55%;
    font-size: 17px;
}

.information-content p {
    max-width: 270px;
    margin: 0 0 6px;
    color: #858085;
    font-size: 10px;
    line-height: 1.6;
}

@media (max-width: 991px) {

    .dashboard-page {
        padding: 23px 22px 35px;
    }

    .welcome-content {
        max-width: 80%;
    }

    .blood-decoration {
        right: 20px;
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

    .blood-decoration {
        opacity: 0.12;
        right: 5px;
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