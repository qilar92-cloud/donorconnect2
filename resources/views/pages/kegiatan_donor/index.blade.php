@extends('layouts.app')

@section('title', 'Kegiatan Donor - DonorConnect')

@section('content')

<style>
    .kegiatan-page {
        min-height: 100vh;
        padding: 24px 30px 35px;
        background: #fff9f6;
    }

    .kegiatan-container {
        max-width: 1250px;
        margin: 0 auto;
    }

    /* Banner */

    .kegiatan-banner {
        position: relative;
        overflow: hidden;
        display: flex;
        align-items: center;
        justify-content: space-between;
        gap: 20px;
        padding: 20px 23px;
        margin-bottom: 22px;
        border-radius: 18px;
        background: linear-gradient(135deg, #ed5573, #d93659);
        color: #fff;
        box-shadow: 0 8px 22px rgba(217, 54, 89, .16);
    }

    .kegiatan-banner::before {
        content: "";
        position: absolute;
        width: 150px;
        height: 150px;
        border-radius: 50%;
        background: rgba(255, 255, 255, .06);
        right: 80px;
        top: -85px;
    }

    .kegiatan-banner::after {
        content: "";
        position: absolute;
        width: 100px;
        height: 100px;
        border-radius: 50%;
        border: 1px solid rgba(255, 255, 255, .08);
        right: -25px;
        bottom: -55px;
    }

    .banner-left {
        position: relative;
        z-index: 2;
        display: flex;
        align-items: center;
        gap: 15px;
        min-width: 0;
    }

    /* Ikon Banner */

    .banner-icon {
        width: 58px;
        height: 58px;
        min-width: 58px;
        border-radius: 16px;
        background: rgba(255, 255, 255, .18);
        border: 1px solid rgba(255, 255, 255, .18);
        display: flex;
        align-items: center;
        justify-content: center;
        color: #fff;
    }

    .banner-icon i {
        font-size: 25px;
    }

    .banner-text small {
        display: block;
        margin-bottom: 4px;
        font-size: 9px;
        font-weight: 800;
        letter-spacing: 1px;
        text-transform: uppercase;
        opacity: .82;
    }

    .banner-text h1 {
        margin: 0;
        font-size: 23px;
        line-height: 1.2;
        font-weight: 900;
    }

    .banner-text p {
        margin: 5px 0 0;
        font-size: 11px;
        opacity: .88;
    }

    .banner-right {
        position: relative;
        z-index: 2;
        display: flex;
        align-items: center;
        gap: 18px;
    }

    .banner-total {
        min-width: 65px;
        text-align: center;
    }

    .banner-total strong {
        display: block;
        font-size: 23px;
        font-weight: 900;
        line-height: 1;
    }

    .banner-total span {
        display: block;
        margin-top: 5px;
        font-size: 9px;
        opacity: .85;
        white-space: nowrap;
    }

    .btn-add {
        display: inline-flex;
        align-items: center;
        justify-content: center;
        gap: 7px;
        padding: 10px 15px;
        border-radius: 10px;
        background: #fff;
        color: #d93659 !important;
        text-decoration: none;
        font-size: 11px;
        font-weight: 800;
        box-shadow: 0 5px 12px rgba(0, 0, 0, .10);
        transition: .2s ease;
        white-space: nowrap;
    }

    .btn-add:hover {
        color: #c72f50 !important;
        transform: translateY(-2px);
        box-shadow: 0 8px 16px rgba(0, 0, 0, .13);
    }

    /* Alert */

    .success-alert {
        display: flex;
        align-items: center;
        gap: 10px;
        background: #effaf2;
        border: 1px solid #ccebd4;
        color: #28743b;
        padding: 11px 14px;
        border-radius: 11px;
        margin-bottom: 18px;
        font-size: 12px;
        font-weight: 600;
    }

    .success-icon {
        width: 24px;
        height: 24px;
        flex-shrink: 0;
        border-radius: 50%;
        background: #d6f2dd;
        display: flex;
        align-items: center;
        justify-content: center;
        font-size: 11px;
        font-weight: 900;
    }

    /* Total */

    .summary-card {
        display: flex;
        align-items: center;
        gap: 13px;
        width: 225px;
        box-sizing: border-box;
        background: #fff;
        border: 1px solid #f0e5e9;
        border-radius: 15px;
        padding: 13px 16px;
        margin-bottom: 21px;
        box-shadow: 0 5px 17px rgba(120, 45, 70, .045);
    }

    .summary-icon {
        width: 42px;
        height: 42px;
        flex-shrink: 0;
        border-radius: 12px;
        background: #fde9ef;
        color: #d93659;
        display: flex;
        align-items: center;
        justify-content: center;
        font-size: 17px;
    }

    .summary-card strong {
        display: block;
        color: #30313f;
        font-size: 20px;
        font-weight: 900;
        line-height: 1;
        margin-bottom: 4px;
    }

    .summary-card span {
        color: #9999a3;
        font-size: 10px;
    }

    /* Section */

    .section-heading {
        display: flex;
        justify-content: space-between;
        align-items: center;
        margin-bottom: 13px;
    }

    .section-title {
        display: flex;
        align-items: center;
        gap: 9px;
    }

    .section-icon {
        width: 38px;
        height: 38px;
        min-width: 38px;
        border-radius: 11px;
        background: #fde9ef;
        color: #d93659;
        display: flex;
        align-items: center;
        justify-content: center;
        font-size: 15px;
        box-shadow: 0 3px 8px rgba(217, 54, 89, .08);
    }

    .section-heading h2 {
        margin: 0;
        color: #30313f;
        font-size: 17px;
        font-weight: 900;
    }

    .section-heading p {
        margin: 2px 0 0;
        color: #9999a3;
        font-size: 10px;
    }

    .section-count {
        color: #9999a3;
        font-size: 10px;
    }

    /* Kartu */

    .kegiatan-grid {
        display: grid;
        grid-template-columns: repeat(3, minmax(0, 1fr));
        gap: 15px;
    }

    .kegiatan-card {
        background: #fff;
        border: 1px solid #f0e5e9;
        border-radius: 17px;
        overflow: hidden;
        box-shadow: 0 5px 18px rgba(120, 45, 70, .05);
        transition: .2s ease;
    }

    .kegiatan-card:hover {
        transform: translateY(-3px);
        border-color: #efcbd5;
        box-shadow: 0 10px 25px rgba(120, 45, 70, .09);
    }

    /* Card Header */

    .card-top {
        position: relative;
        overflow: hidden;
        padding: 15px 16px;
        min-height: 94px;
        background: linear-gradient(135deg, #ed5573, #d93659);
        color: #fff;
    }

    .card-top::before {
        content: "";
        position: absolute;
        width: 90px;
        height: 90px;
        border-radius: 50%;
        background: rgba(255, 255, 255, .07);
        right: -28px;
        top: -35px;
    }

    .card-top::after {
        content: "";
        position: absolute;
        width: 55px;
        height: 55px;
        border-radius: 50%;
        border: 1px solid rgba(255, 255, 255, .08);
        right: 35px;
        bottom: -35px;
    }

    .event-top {
        position: relative;
        z-index: 2;
        display: flex;
        align-items: center;
        justify-content: space-between;
        margin-bottom: 11px;
    }

    .event-number {
        width: 29px;
        height: 29px;
        border-radius: 9px;
        background: rgba(255, 255, 255, .17);
        border: 1px solid rgba(255, 255, 255, .13);
        display: flex;
        align-items: center;
        justify-content: center;
        font-size: 10px;
        font-weight: 800;
    }

    .event-icon {
        width: 29px;
        height: 29px;
        border-radius: 9px;
        background: rgba(255, 255, 255, .14);
        display: flex;
        align-items: center;
        justify-content: center;
        font-size: 11px;
    }

    .card-top h3 {
        position: relative;
        z-index: 2;
        margin: 0;
        max-width: 92%;
        color: #fff;
        font-size: 14px;
        line-height: 1.4;
        font-weight: 800;
    }

    /* Card Body */

    .card-body {
        padding: 15px 16px 13px;
    }

    .info-item {
        display: flex;
        align-items: center;
        gap: 10px;
        margin-bottom: 10px;
    }

    .info-item:last-child {
        margin-bottom: 0;
    }

    .info-icon {
        width: 30px;
        height: 30px;
        flex-shrink: 0;
        border-radius: 9px;
        background: #fff1f4;
        color: #d93659;
        display: flex;
        align-items: center;
        justify-content: center;
        font-size: 11px;
    }

    .info-text {
        min-width: 0;
    }

    .info-text small {
        display: block;
        color: #aaaab2;
        font-size: 8px;
        font-weight: 700;
        margin-bottom: 2px;
        text-transform: uppercase;
        letter-spacing: .4px;
    }

    .info-text span {
        display: block;
        color: #444551;
        font-size: 11px;
        font-weight: 700;
        line-height: 1.35;
        word-break: break-word;
    }

    /* Keterangan */

    .description {
        margin-top: 13px;
        padding: 10px 11px;
        background: #fff8f9;
        border: 1px solid #fbecef;
        border-radius: 10px;
        color: #777781;
        font-size: 10px;
        line-height: 1.5;
    }

    .description strong {
        display: block;
        color: #555561;
        margin-bottom: 3px;
        font-size: 9px;
        text-transform: uppercase;
        letter-spacing: .3px;
    }

    /* Tombol */

    .card-actions {
        display: grid;
        grid-template-columns: repeat(3, 1fr);
        gap: 6px;
        padding: 0 16px 16px;
    }

    .action-btn {
        min-height: 33px;
        border: none;
        border-radius: 8px;
        display: flex;
        align-items: center;
        justify-content: center;
        gap: 5px;
        text-decoration: none;
        cursor: pointer;
        font-family: inherit;
        font-size: 10px;
        font-weight: 700;
        transition: .2s ease;
    }

    .action-btn:hover {
        transform: translateY(-1px);
    }

    .action-detail {
        background: #fde9ef;
        color: #c9365c;
    }

    .action-edit {
        background: #fff5df;
        color: #a96e00;
    }

    .action-delete {
        background: #fbecef;
        color: #c9365c;
    }

    /* Kosong */

    .empty-card {
        background: #fff;
        border: 1px solid #f0e5e9;
        border-radius: 17px;
        padding: 50px 20px;
        text-align: center;
        box-shadow: 0 5px 18px rgba(120, 45, 70, .05);
    }

    .empty-icon {
        width: 62px;
        height: 62px;
        margin: 0 auto 13px;
        border-radius: 18px;
        background: #fde9ef;
        color: #d93659;
        display: flex;
        align-items: center;
        justify-content: center;
        font-size: 23px;
    }

    .empty-card h3 {
        margin: 0 0 5px;
        color: #3b3c48;
        font-size: 16px;
        font-weight: 800;
    }

    .empty-card p {
        margin: 0;
        color: #9999a3;
        font-size: 11px;
    }

    /* Responsive */

    @media (max-width: 1100px) {
        .kegiatan-grid {
            grid-template-columns: repeat(2, minmax(0, 1fr));
        }
    }

    @media (max-width: 700px) {

        .kegiatan-page {
            padding: 18px 15px 30px;
        }

        .kegiatan-banner {
            align-items: flex-start;
            padding: 17px;
        }

        .banner-text h1 {
            font-size: 20px;
        }

        .banner-text p {
            font-size: 10px;
        }

        .banner-right {
            gap: 10px;
        }

        .banner-total {
            display: none;
        }

        .btn-add {
            padding: 10px 13px;
        }

        .summary-card {
            width: 100%;
        }

        .kegiatan-grid {
            grid-template-columns: 1fr;
            gap: 13px;
        }
    }

    @media (max-width: 480px) {

        .kegiatan-page {
            padding: 15px 12px 25px;
        }

        .kegiatan-banner {
            padding: 15px;
            border-radius: 15px;
        }

        .banner-icon {
            width: 46px;
            height: 46px;
            min-width: 46px;
            border-radius: 12px;
        }

        .banner-icon i {
            font-size: 20px;
        }

        .banner-text small {
            font-size: 8px;
        }

        .banner-text h1 {
            font-size: 18px;
        }

        .banner-text p {
            display: none;
        }

        .btn-add {
            width: 38px;
            height: 38px;
            padding: 0;
            border-radius: 9px;
        }

        .btn-add span {
            display: none;
        }

        .summary-card {
            padding: 12px 14px;
        }

        .section-heading h2 {
            font-size: 16px;
        }

        .card-top {
            min-height: 92px;
        }
    }
</style>

<div class="kegiatan-page">

    <div class="kegiatan-container">

        {{-- Banner --}}
        <div class="kegiatan-banner">

            <div class="banner-left">

                <div class="banner-icon">
                    <i class="fas fa-calendar-alt"></i>
                </div>

                <div class="banner-text">

                    <small>DonorConnect • Petugas PMR</small>

                    <h1>Kegiatan Donor</h1>

                    <p>
                        Kelola jadwal dan informasi kegiatan donor darah.
                    </p>

                </div>

            </div>

            <div class="banner-right">

                <div class="banner-total">

                    <strong>{{ $kegiatan->count() }}</strong>

                    <span>Total Kegiatan</span>

                </div>

                <a href="{{ route('kegiatan-donor.create') }}" class="btn-add">
                    <i class="fas fa-plus"></i>
                    <span>Tambah Kegiatan</span>
                </a>

            </div>

        </div>

        {{-- Alert --}}
        @if (session('success'))

            <div class="success-alert">

                <div class="success-icon">
                    ✓
                </div>

                <span>
                    {{ session('success') }}
                </span>

            </div>

        @endif

        {{-- Total --}}
        <div class="summary-card">

            <div class="summary-icon">
                <i class="fas fa-calendar-check"></i>
            </div>

            <div>

                <strong>{{ $kegiatan->count() }}</strong>

                <span>Total Kegiatan Donor</span>

            </div>

        </div>

        {{-- Daftar Kegiatan --}}
        <div class="section-heading">

            <div class="section-title">

                <div class="section-icon">
                    <i class="fas fa-calendar-check"></i>
                </div>

                <div>

                    <h2>Daftar Kegiatan</h2>

                    <p>
                        Informasi kegiatan donor yang tersedia
                    </p>

                </div>

            </div>

            <span class="section-count">
                {{ $kegiatan->count() }} kegiatan
            </span>

        </div>

        @if ($kegiatan->count() > 0)

            {{-- Kegiatan --}}
            <div class="kegiatan-grid">

                @foreach ($kegiatan as $item)

                    <div class="kegiatan-card">

                        {{-- Card Header --}}
                        <div class="card-top">

                            <div class="event-top">

                                <div class="event-number">
                                    {{ sprintf('%02d', $loop->iteration) }}
                                </div>

                                <div class="event-icon">
                                    <i class="fas fa-droplet"></i>
                                </div>

                            </div>

                            <h3>
                                {{ $item->nama_kegiatan }}
                            </h3>

                        </div>

                        {{-- Card Body --}}
                        <div class="card-body">

                            <div class="info-item">

                                <div class="info-icon">
                                    <i class="fas fa-calendar-day"></i>
                                </div>

                                <div class="info-text">

                                    <small>Tanggal</small>

                                    <span>
                                        {{ \Carbon\Carbon::parse($item->tanggal)->translatedFormat('d F Y') }}
                                    </span>

                                </div>

                            </div>

                            <div class="info-item">

                                <div class="info-icon">
                                    <i class="fas fa-clock"></i>
                                </div>

                                <div class="info-text">

                                    <small>Waktu</small>

                                    <span>
                                        {{ $item->waktu }}
                                    </span>

                                </div>

                            </div>

                            <div class="info-item">

                                <div class="info-icon">
                                    <i class="fas fa-location-dot"></i>
                                </div>

                                <div class="info-text">

                                    <small>Lokasi</small>

                                    <span>
                                        {{ $item->lokasi }}
                                    </span>

                                </div>

                            </div>

                            @if ($item->keterangan)

                                <div class="description">

                                    <strong>Keterangan</strong>

                                    {{ $item->keterangan }}

                                </div>

                            @endif

                        </div>

                        {{-- Aksi --}}
                        <div class="card-actions">

                            <a
                                href="{{ route('kegiatan-donor.show', $item->id_kegiatan) }}"
                                class="action-btn action-detail"
                            >
                                <i class="fas fa-eye"></i>
                                Detail
                            </a>

                            <a
                                href="{{ route('kegiatan-donor.edit', $item->id_kegiatan) }}"
                                class="action-btn action-edit"
                            >
                                <i class="fas fa-pen"></i>
                                Edit
                            </a>

                            <button
                                type="button"
                                class="action-btn action-delete"
                                onclick="actionDestroy('{{ route('kegiatan-donor.destroy', $item->id_kegiatan) }}')"
                            >
                                <i class="fas fa-trash"></i>
                                Hapus
                            </button>

                        </div>

                    </div>

                @endforeach

            </div>

        @else

            {{-- Kosong --}}
            <div class="empty-card">

                <div class="empty-icon">
                    <i class="fas fa-calendar-xmark"></i>
                </div>

                <h3>Belum Ada Kegiatan</h3>

                <p>
                    Belum ada kegiatan donor yang tersedia.
                    Silakan tambahkan kegiatan baru.
                </p>

            </div>

        @endif

    </div>

</div>

{{-- Form Hapus --}}
<form
    id="form-destroy"
    method="POST"
    style="display:none;"
>
    @csrf
    @method('DELETE')
</form>

@push('scripts')

<script>
    function actionDestroy(url) {

        Swal.fire({
            title: 'Hapus kegiatan?',
            text: 'Data kegiatan yang dihapus tidak dapat dikembalikan.',
            icon: 'warning',
            showCancelButton: true,
            confirmButtonColor: '#d93659',
            cancelButtonColor: '#aaa',
            confirmButtonText: 'Ya, hapus',
            cancelButtonText: 'Batal'
        }).then((result) => {

            if (result.isConfirmed) {

                document
                    .getElementById('form-destroy')
                    .setAttribute('action', url);

                document
                    .getElementById('form-destroy')
                    .submit();

            }

        });

    }
</script>

@endpush

@endsection