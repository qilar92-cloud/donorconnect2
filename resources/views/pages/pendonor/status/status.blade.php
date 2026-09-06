@extends('layouts.app')

@section('title', 'Status Pendaftaran - DonorConnect')

@section('content')

<div class="status-page">

    {{-- Header --}}
    <div class="status-header">

        <div class="header-content">

            <div class="header-label">
                <span></span>
                PENDAFTARAN DONOR
            </div>

            <h1>Status Pendaftaran</h1>

            <p>
                Pantau kegiatan donor yang sudah kamu daftarkan.
            </p>

        </div>

        <div class="header-decoration">

            <div class="decoration-circle circle-one"></div>
            <div class="decoration-circle circle-two"></div>

            <div class="blood-drop">
                <i class="fas fa-heart"></i>
            </div>

            <i class="fas fa-heart outline-heart"></i>

        </div>

    </div>


    {{-- Pesan --}}
    @if(session('success'))

        <div class="status-alert success-alert">

            <div class="alert-icon">
                <i class="fas fa-check"></i>
            </div>

            <div>
                <strong>Berhasil</strong>
                <span>{{ session('success') }}</span>
            </div>

        </div>

    @endif


    @if(session('error'))

        <div class="status-alert error-alert">

            <div class="alert-icon">
                <i class="fas fa-exclamation"></i>
            </div>

            <div>
                <strong>Perhatian</strong>
                <span>{{ session('error') }}</span>
            </div>

        </div>

    @endif


    @if($pendaftaran->isEmpty())

        {{-- Empty --}}
        <div class="empty-card">

            <div class="empty-icon">
                <i class="fas fa-clipboard-list"></i>
            </div>

            <div class="empty-label">
                DONORCONNECT
            </div>

            <h2>Belum Ada Pendaftaran</h2>

            <p>
                Kamu belum mendaftar pada kegiatan donor mana pun.
                Yuk, cari kegiatan donor yang tersedia.
            </p>

            <a href="{{ route('pendonor.kegiatan') }}"
               class="btn-kegiatan">

                <i class="fas fa-calendar-alt"></i>
                Lihat Kegiatan Donor

                <i class="fas fa-arrow-right"></i>

            </a>

        </div>

    @else

        {{-- Main Card --}}
        <div class="status-card">

            <div class="card-header">

                <div class="card-header-left">

                    <div class="card-label">
                        AKTIVITAS
                    </div>

                    <h2>Daftar Pendaftaran</h2>

                    <p>
                        Kegiatan donor yang sudah kamu daftarkan.
                    </p>

                </div>

                <div class="total-badge">

                    <div class="badge-icon">
                        <i class="fas fa-clipboard-check"></i>
                    </div>

                    <div>
                        <strong>{{ $pendaftaran->count() }}</strong>
                        <span>Pendaftaran</span>
                    </div>

                </div>

            </div>


            <div class="status-list">

                @foreach($pendaftaran as $item)

                    <div class="status-item">

                        {{-- Icon --}}
                        <div class="activity-icon">

                            <div class="drop-shape">
                                <i class="fas fa-tint"></i>
                            </div>

                        </div>


                        {{-- Informasi --}}
                        <div class="activity-info">

                            <div class="activity-top">

                                <h3>
                                    {{ $item->kegiatanDonor->nama_kegiatan ?? 'Kegiatan Donor' }}
                                </h3>

                            </div>


                            @if($item->kegiatanDonor)

                                <div class="activity-detail">

                                    <span>
                                        <i class="fas fa-calendar-alt"></i>
                                        {{ \Carbon\Carbon::parse($item->kegiatanDonor->tanggal)->format('d M Y') }}
                                    </span>

                                    <span>
                                        <i class="fas fa-clock"></i>
                                        {{ $item->kegiatanDonor->waktu ?? '-' }}
                                    </span>

                                    <span>
                                        <i class="fas fa-map-marker-alt"></i>
                                        {{ $item->kegiatanDonor->lokasi ?? '-' }}
                                    </span>

                                </div>

                            @endif

                        </div>


                        {{-- Status --}}
                        <div class="status-area">

                            @php
                                $status = strtolower(
                                    $item->status_pendaftaran ?? 'terdaftar'
                                );
                            @endphp

                            @if($status === 'terdaftar')

                                <span class="status-badge registered">
                                    <span class="status-dot"></span>
                                    Terdaftar
                                </span>

                            @elseif($status === 'diterima')

                                <span class="status-badge accepted">
                                    <span class="status-dot"></span>
                                    Diterima
                                </span>

                            @elseif($status === 'ditolak')

                                <span class="status-badge rejected">
                                    <span class="status-dot"></span>
                                    Ditolak
                                </span>

                            @elseif($status === 'selesai')

                                <span class="status-badge completed">
                                    <span class="status-dot"></span>
                                    Selesai
                                </span>

                            @else

                                <span class="status-badge pending">
                                    <span class="status-dot"></span>
                                    {{ ucfirst($item->status_pendaftaran ?? 'Terdaftar') }}
                                </span>

                            @endif

                        </div>

                    </div>

                @endforeach

            </div>

        </div>

    @endif

</div>


@push('styles')

<style>

/* PAGE */

.status-page {
    position: relative;
    width: 100%;
    min-height: calc(100vh - 80px);
    padding: 30px 32px 45px;
    background: #fff8f5;
    overflow: hidden;
}


/* HEADER */

.status-header {
    position: relative;
    min-height: 145px;
    margin-bottom: 22px;
    padding: 25px 30px;

    display: flex;
    align-items: center;
    justify-content: space-between;

    background: linear-gradient(
        135deg,
        #ffffff 0%,
        #fffafa 55%,
        #fff0f5 100%
    );

    border: 1px solid #f1dce3;
    border-radius: 20px;

    overflow: hidden;
}

.header-content {
    position: relative;
    z-index: 3;
}

.header-label {
    display: flex;
    align-items: center;
    gap: 8px;

    margin-bottom: 7px;

    color: #a80e2c;
    font-size: 9px;
    font-weight: 900;
    letter-spacing: 2px;
}

.header-label span {
    width: 32px;
    height: 4px;

    background: linear-gradient(
        90deg,
        #a80e2c,
        #d94b91
    );

    border-radius: 10px;
}

.status-header h1 {
    margin: 0 0 5px;

    color: #273252;

    font-size: 30px;
    font-weight: 900;
    letter-spacing: -0.5px;
}

.status-header p {
    margin: 0;

    color: #888693;

    font-size: 12px;
}


/* HEADER DECORATION */

.header-decoration {
    position: absolute;
    right: 35px;
    top: 0;

    width: 250px;
    height: 145px;
}

.decoration-circle {
    position: absolute;
    border-radius: 50%;
}

.circle-one {
    width: 150px;
    height: 150px;

    right: -25px;
    top: -65px;

    background: rgba(217, 75, 145, 0.10);
}

.circle-two {
    width: 85px;
    height: 85px;

    right: 95px;
    bottom: -35px;

    background: rgba(168, 14, 44, 0.07);
}

.blood-drop {
    position: absolute;

    right: 80px;
    top: 38px;

    width: 58px;
    height: 70px;

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

    box-shadow:
        0 10px 22px rgba(168, 14, 44, 0.18);
}

.blood-drop:before {
    content: "";

    position: absolute;

    width: 34px;
    height: 34px;

    top: -12px;
    left: 12px;

    background: #b0143b;

    border-radius: 50%;

    transform: rotate(45deg);

    z-index: -1;
}

.blood-drop i {
    font-size: 19px;
}

.outline-heart {
    position: absolute;

    right: 25px;
    top: 25px;

    color: #d94b91;

    font-size: 34px;

    opacity: 0.55;
}


/* ALERT */

.status-alert {
    margin: 0 auto 18px;
    padding: 13px 16px;

    display: flex;
    align-items: center;
    gap: 12px;

    border-radius: 12px;
}

.alert-icon {
    width: 32px;
    height: 32px;

    flex-shrink: 0;

    display: flex;
    align-items: center;
    justify-content: center;

    border-radius: 9px;
}

.status-alert strong {
    display: block;
    margin-bottom: 2px;

    font-size: 11px;
}

.status-alert span {
    display: block;

    font-size: 10px;
}

.success-alert {
    background: #edf9f1;
    border: 1px solid #d3ecda;
    color: #36784a;
}

.success-alert .alert-icon {
    background: #d8f1df;
}

.error-alert {
    background: #fff0f2;
    border: 1px solid #f2d5da;
    color: #a93649;
}

.error-alert .alert-icon {
    background: #f9dce1;
}


/* MAIN CARD */

.status-card {
    width: 100%;

    background: #fff;

    border: 1px solid #efdfe5;
    border-radius: 20px;

    box-shadow:
        0 8px 30px rgba(168, 14, 44, 0.065);

    overflow: hidden;
}


/* CARD HEADER */

.card-header {
    position: relative;

    padding: 24px 28px;

    display: flex;
    align-items: center;
    justify-content: space-between;

    border-bottom: 1px solid #f2e5e9;
}

.card-header:before {
    content: "";

    position: absolute;

    left: 0;
    top: 0;
    bottom: 0;

    width: 4px;

    background: linear-gradient(
        180deg,
        #a80e2c,
        #d94b91
    );
}

.card-label {
    margin-bottom: 4px;

    color: #b0143b;

    font-size: 8px;
    font-weight: 900;
    letter-spacing: 2px;
}

.card-header h2 {
    margin: 0 0 4px;

    color: #293454;

    font-size: 19px;
    font-weight: 900;
}

.card-header p {
    margin: 0;

    color: #98949d;

    font-size: 10px;
}


/* TOTAL */

.total-badge {
    min-width: 125px;

    padding: 8px 12px;

    display: flex;
    align-items: center;
    gap: 9px;

    background: linear-gradient(
        135deg,
        #fff1f5,
        #fff7f8
    );

    border: 1px solid #f3dce5;
    border-radius: 30px;
}

.badge-icon {
    width: 31px;
    height: 31px;

    display: flex;
    align-items: center;
    justify-content: center;

    background: linear-gradient(
        135deg,
        #a80e2c,
        #d94b91
    );

    color: #fff;

    border-radius: 9px;

    font-size: 11px;
}

.total-badge strong {
    display: block;

    color: #a80e2c;

    font-size: 13px;
    font-weight: 900;
    line-height: 1;
}

.total-badge span {
    display: block;
    margin-top: 2px;

    color: #9a8e94;

    font-size: 8px;
}


/* LIST */

.status-list {
    padding: 7px 24px 18px;
}


/* ITEM */

.status-item {
    position: relative;

    min-height: 92px;

    padding: 17px 5px;

    display: flex;
    align-items: center;
    gap: 16px;

    border-bottom: 1px solid #f4eaed;

    transition: 0.2s ease;
}

.status-item:last-child {
    border-bottom: none;
}

.status-item:hover {
    padding-left: 9px;
    padding-right: 1px;
}


/* ACTIVITY ICON */

.activity-icon {
    width: 52px;
    height: 52px;

    flex-shrink: 0;

    display: flex;
    align-items: center;
    justify-content: center;

    background: #fff0f5;

    border: 1px solid #f6dce6;
    border-radius: 15px;
}

.drop-shape {
    width: 35px;
    height: 39px;

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

    box-shadow:
        0 6px 13px rgba(168, 14, 44, 0.15);
}

.drop-shape i {
    font-size: 13px;
}


/* INFO */

.activity-info {
    flex: 1;
    min-width: 0;
}

.activity-info h3 {
    margin: 0 0 9px;

    color: #35405f;

    font-size: 13px;
    font-weight: 850;

    line-height: 1.4;
}

.activity-detail {
    display: flex;
    align-items: center;
    flex-wrap: wrap;

    gap: 7px 18px;
}

.activity-detail span {
    display: inline-flex;
    align-items: center;
    gap: 5px;

    color: #918c96;

    font-size: 9px;
}

.activity-detail i {
    color: #c12f59;

    font-size: 9px;
}


/* STATUS */

.status-area {
    min-width: 105px;

    display: flex;
    justify-content: flex-end;
}

.status-badge {
    min-width: 90px;

    padding: 8px 12px;

    display: inline-flex;
    align-items: center;
    justify-content: center;
    gap: 6px;

    border-radius: 30px;

    font-size: 9px;
    font-weight: 800;

    white-space: nowrap;
}

.status-dot {
    width: 6px;
    height: 6px;

    border-radius: 50%;
}


/* TERDAFTAR */

.registered {
    background: #e8f7f1;
    color: #25856d;
    border: 1px solid #cfeade;
}

.registered .status-dot {
    background: #29a984;
}


/* DITERIMA */

.accepted {
    background: #eaf5f8;
    color: #397d88;
    border: 1px solid #d2e8ec;
}

.accepted .status-dot {
    background: #45a8b6;
}


/* DITOLAK */

.rejected {
    background: #fff0f2;
    color: #b43d50;
    border: 1px solid #f0d5da;
}

.rejected .status-dot {
    background: #d24b60;
}


/* SELESAI */

.completed {
    background: #f2edfb;
    color: #7058a0;
    border: 1px solid #e2d9f2;
}

.completed .status-dot {
    background: #8168b5;
}


/* PENDING */

.pending {
    background: #fff5e8;
    color: #a97134;
    border: 1px solid #f0dfc5;
}

.pending .status-dot {
    background: #d39a4d;
}


/* EMPTY */

.empty-card {
    max-width: 620px;

    margin: 35px auto;
    padding: 55px 35px;

    text-align: center;

    background: #fff;

    border: 1px solid #f0dfe5;
    border-radius: 20px;

    box-shadow:
        0 8px 30px rgba(168, 14, 44, 0.06);
}

.empty-icon {
    width: 68px;
    height: 68px;

    margin: 0 auto 14px;

    display: flex;
    align-items: center;
    justify-content: center;

    background: linear-gradient(
        135deg,
        #fff0f4,
        #fce3eb
    );

    color: #b0143b;

    border-radius: 20px;

    font-size: 24px;
}

.empty-label {
    margin-bottom: 5px;

    color: #b0143b;

    font-size: 8px;
    font-weight: 900;

    letter-spacing: 2px;
}

.empty-card h2 {
    margin: 0 0 7px;

    color: #35405f;

    font-size: 19px;
    font-weight: 900;
}

.empty-card p {
    max-width: 400px;

    margin: 0 auto 22px;

    color: #99939b;

    font-size: 10px;
    line-height: 1.7;
}

.btn-kegiatan {
    display: inline-flex;
    align-items: center;
    gap: 8px;

    padding: 11px 17px;

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

    box-shadow:
        0 7px 17px rgba(168, 14, 44, 0.17);

    transition: 0.2s ease;
}

.btn-kegiatan:hover {
    color: #fff !important;
    transform: translateY(-2px);
    box-shadow:
        0 10px 22px rgba(168, 14, 44, 0.22);
}


/* RESPONSIVE */

@media (max-width: 768px) {

    .status-page {
        padding: 22px 16px 35px;
    }

    .status-header {
        padding: 23px;
    }

    .status-header h1 {
        font-size: 25px;
    }

    .header-decoration {
        right: -25px;
        opacity: 0.55;
    }

    .card-header {
        padding: 22px;
        align-items: flex-start;
        flex-direction: column;
        gap: 15px;
    }

    .total-badge {
        align-self: flex-start;
    }

    .status-list {
        padding-left: 17px;
        padding-right: 17px;
    }

    .status-item {
        align-items: flex-start;
        flex-wrap: wrap;
    }

    .activity-info {
        width: calc(100% - 70px);
    }

    .status-area {
        width: 100%;
        padding-left: 68px;
        justify-content: flex-start;
    }

}


@media (max-width: 520px) {

    .status-page {
        padding: 17px 12px 28px;
    }

    .status-header {
        min-height: 130px;
        padding: 20px;
    }

    .status-header h1 {
        font-size: 22px;
    }

    .status-header p {
        font-size: 10px;
        max-width: 230px;
    }

    .header-decoration {
        right: -70px;
        opacity: 0.35;
    }

    .card-header h2 {
        font-size: 17px;
    }

    .status-item {
        gap: 12px;
    }

    .activity-icon {
        width: 45px;
        height: 45px;
        border-radius: 13px;
    }

    .drop-shape {
        width: 30px;
        height: 34px;
    }

    .activity-info {
        width: calc(100% - 58px);
    }

    .activity-info h3 {
        font-size: 12px;
    }

    .activity-detail {
        flex-direction: column;
        align-items: flex-start;
        gap: 5px;
    }

    .status-area {
        padding-left: 57px;
    }

}

</style>

@endpush

@endsection