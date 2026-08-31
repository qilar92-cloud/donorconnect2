@extends('layouts.app')

@section('title', 'Status Pendaftaran - DonorConnect')

@section('content')

<div class="status-page">

    {{-- Header --}}
    <div class="page-heading">

        <div class="heading-icon">
            <i class="fas fa-clipboard-check"></i>
        </div>

        <div>
            <h1>Status Pendaftaran</h1>
            <p>
                Lihat status pendaftaran kegiatan donor yang sudah kamu ikuti.
            </p>
        </div>

    </div>


    {{-- Pesan sukses --}}
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


    {{-- Pesan error --}}
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


    {{-- Jika belum ada pendaftaran --}}
    @if($pendaftaran->isEmpty())

        <div class="empty-card">

            <div class="empty-icon">
                <i class="fas fa-clipboard-list"></i>
            </div>

            <h2>Belum Ada Pendaftaran</h2>

            <p>
                Kamu belum mendaftar pada kegiatan donor mana pun.
            </p>

            <a href="{{ route('pendonor.kegiatan') }}"
               class="btn-kegiatan">

                <i class="fas fa-calendar-alt"></i>
                Lihat Kegiatan Donor

            </a>

        </div>

    @else

        {{-- Daftar pendaftaran --}}
        <div class="status-card">

            <div class="card-top">

                <div>
                    <h2>Daftar Pendaftaran</h2>

                    <p>
                        Berikut kegiatan donor yang sudah kamu daftarkan.
                    </p>
                </div>

                <div class="total-badge">
                    <i class="fas fa-file-medical"></i>
                    {{ $pendaftaran->count() }} Pendaftaran
                </div>

            </div>


            <div class="status-list">

                @foreach($pendaftaran as $item)

                    <div class="status-item">

                        <div class="activity-icon">
                            <i class="fas fa-tint"></i>
                        </div>


                        <div class="activity-info">

                            <h3>
                                {{ $item->kegiatanDonor->nama_kegiatan ?? 'Kegiatan Donor' }}
                            </h3>


                            <div class="activity-detail">

                                @if($item->kegiatanDonor)

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

                                @endif

                            </div>

                        </div>


                        <div class="status-area">

                            @php
                                $status = strtolower(
                                    $item->status_pendaftaran ?? 'terdaftar'
                                );
                            @endphp


                            @if($status === 'terdaftar')

                                <span class="status-badge registered">
                                    <i class="fas fa-check-circle"></i>
                                    Terdaftar
                                </span>

                            @elseif($status === 'diterima')

                                <span class="status-badge accepted">
                                    <i class="fas fa-check-circle"></i>
                                    Diterima
                                </span>

                            @elseif($status === 'ditolak')

                                <span class="status-badge rejected">
                                    <i class="fas fa-times-circle"></i>
                                    Ditolak
                                </span>

                            @elseif($status === 'selesai')

                                <span class="status-badge completed">
                                    <i class="fas fa-check-double"></i>
                                    Selesai
                                </span>

                            @else

                                <span class="status-badge pending">
                                    <i class="fas fa-clock"></i>
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

.status-page {
    width: 100%;
    min-height: calc(100vh - 80px);
    padding: 28px 30px 40px;
    background: #fffaf5;
}


/* HEADER */

.page-heading {
    display: flex;
    align-items: center;
    gap: 14px;
    margin-bottom: 25px;
}

.heading-icon {
    width: 48px;
    height: 48px;

    display: flex;
    align-items: center;
    justify-content: center;

    background: #fbe1e4;
    color: #c9364e;

    border-radius: 13px;

    font-size: 18px;

    box-shadow: 0 4px 12px rgba(201, 54, 78, 0.08);
}

.page-heading h1 {
    margin: 0 0 5px;

    color: #40383a;

    font-size: 28px;
    font-weight: 800;
}

.page-heading p {
    margin: 0;

    color: #95898b;

    font-size: 12px;
}


/* ALERT */

.status-alert {
    max-width: 1000px;

    margin: 0 auto 18px;

    padding: 13px 16px;

    display: flex;
    align-items: center;

    gap: 12px;

    border-radius: 10px;
}

.alert-icon {
    width: 31px;
    height: 31px;

    display: flex;
    align-items: center;
    justify-content: center;

    border-radius: 8px;

    flex-shrink: 0;
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
    background: #eef9f1;
    border: 1px solid #d5ecd9;
    color: #41764c;
}

.success-alert .alert-icon {
    background: #d9f0dd;
}

.error-alert {
    background: #fff1f1;
    border: 1px solid #f2d5d7;
    color: #a73b47;
}

.error-alert .alert-icon {
    background: #f9dfe2;
}


/* CARD */

.status-card {
    width: 100%;
    max-width: 1000px;

    margin: 0 auto;

    background: #ffffff;

    border: 1px solid #f0dfdf;

    border-radius: 16px;

    box-shadow: 0 5px 20px rgba(185, 91, 91, 0.07);

    overflow: hidden;
}


/* CARD TOP */

.card-top {
    padding: 22px 25px;

    display: flex;
    align-items: center;
    justify-content: space-between;

    gap: 15px;

    border-bottom: 1px solid #f2e5e3;
}

.card-top h2 {
    margin: 0 0 4px;

    color: #40383a;

    font-size: 17px;
    font-weight: 800;
}

.card-top p {
    margin: 0;

    color: #9b9091;

    font-size: 10px;
}

.total-badge {
    display: inline-flex;
    align-items: center;
    gap: 7px;

    padding: 8px 12px;

    background: #fff1f2;

    border: 1px solid #f5dadd;

    border-radius: 20px;

    color: #c9364e;

    font-size: 10px;
    font-weight: 700;

    white-space: nowrap;
}


/* LIST */

.status-list {
    padding: 8px 20px 20px;
}


/* ITEM */

.status-item {
    min-height: 90px;

    padding: 16px 5px;

    display: flex;
    align-items: center;

    gap: 15px;

    border-bottom: 1px solid #f4eaea;
}

.status-item:last-child {
    border-bottom: none;
}


/* ACTIVITY ICON */

.activity-icon {
    width: 45px;
    height: 45px;

    display: flex;
    align-items: center;
    justify-content: center;

    flex-shrink: 0;

    background: #fff0f1;

    color: #d12f48;

    border-radius: 11px;

    font-size: 16px;
}


/* INFO */

.activity-info {
    flex: 1;

    min-width: 0;
}

.activity-info h3 {
    margin: 0 0 8px;

    color: #443b3d;

    font-size: 13px;
    font-weight: 750;
}

.activity-detail {
    display: flex;
    flex-wrap: wrap;

    gap: 12px;
}

.activity-detail span {
    display: inline-flex;
    align-items: center;

    gap: 5px;

    color: #93888a;

    font-size: 9px;
}

.activity-detail i {
    color: #c9364e;

    font-size: 9px;
}


/* STATUS */

.status-area {
    min-width: 105px;

    display: flex;
    justify-content: flex-end;
}

.status-badge {
    display: inline-flex;
    align-items: center;
    justify-content: center;

    gap: 5px;

    min-width: 88px;

    padding: 7px 10px;

    border-radius: 20px;

    font-size: 9px;
    font-weight: 700;

    white-space: nowrap;
}

.status-badge i {
    font-size: 9px;
}

.registered {
    background: #eaf7ed;
    color: #43824f;
    border: 1px solid #d3ebd8;
}

.accepted {
    background: #e8f5f7;
    color: #367a82;
    border: 1px solid #d0e8eb;
}

.rejected {
    background: #fff0f0;
    color: #b5414d;
    border: 1px solid #f0d3d5;
}

.completed {
    background: #f1edfb;
    color: #68529a;
    border: 1px solid #e2daf4;
}

.pending {
    background: #fff5e8;
    color: #aa7136;
    border: 1px solid #f1dfc5;
}


/* EMPTY */

.empty-card {
    width: 100%;
    max-width: 650px;

    margin: 45px auto;

    padding: 50px 30px;

    text-align: center;

    background: #ffffff;

    border: 1px solid #f0dfdf;

    border-radius: 16px;

    box-shadow: 0 5px 20px rgba(185, 91, 91, 0.07);
}

.empty-icon {
    width: 65px;
    height: 65px;

    margin: 0 auto 18px;

    display: flex;
    align-items: center;
    justify-content: center;

    background: #fff0f1;

    color: #d12f48;

    border-radius: 18px;

    font-size: 24px;
}

.empty-card h2 {
    margin: 0 0 7px;

    color: #443b3d;

    font-size: 18px;
    font-weight: 800;
}

.empty-card p {
    margin: 0 0 22px;

    color: #9b9091;

    font-size: 11px;
}

.btn-kegiatan {
    display: inline-flex;
    align-items: center;
    justify-content: center;

    gap: 7px;

    padding: 10px 16px;

    background: #d12f48;

    color: #ffffff !important;

    border-radius: 8px;

    font-size: 10px;
    font-weight: 700;

    text-decoration: none !important;

    transition: 0.2s ease;
}

.btn-kegiatan:hover {
    background: #bd2940;

    transform: translateY(-1px);
}


/* RESPONSIVE */

@media (max-width: 768px) {

    .status-page {
        padding: 22px 15px 30px;
    }

    .page-heading h1 {
        font-size: 24px;
    }

    .card-top {
        align-items: flex-start;
        flex-direction: column;
    }

    .status-item {
        align-items: flex-start;
    }

    .status-area {
        min-width: auto;
    }

}


@media (max-width: 560px) {

    .status-item {
        flex-wrap: wrap;
    }

    .activity-info {
        width: calc(100% - 60px);
    }

    .status-area {
        width: 100%;

        padding-left: 60px;

        justify-content: flex-start;
    }

    .activity-detail {
        flex-direction: column;

        gap: 5px;
    }

    .total-badge {
        align-self: flex-start;
    }

}

</style>

@endpush

@endsection