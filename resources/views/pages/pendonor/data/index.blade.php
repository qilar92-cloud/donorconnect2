@extends('layouts.app')

@section('title', 'Data Pendonor')

@section('content')

<div class="pendonor-page">

    {{-- Banner --}}
    <div class="page-banner">

        <div class="banner-content">

            <div class="banner-icon">
                <svg viewBox="0 0 24 24" aria-hidden="true">
                    <path d="M16 11a4 4 0 1 0-3.9-5h-.2A4 4 0 0 0 16 11Z"/>
                    <path d="M8 11a3.5 3.5 0 1 0 0-7 3.5 3.5 0 0 0 0 7Z"/>
                    <path d="M2.5 20a5.5 5.5 0 0 1 11 0"/>
                    <path d="M13 15.5a5.5 5.5 0 0 1 8.5 4.5"/>
                </svg>
            </div>

            <div class="banner-text">
                <span class="banner-label">DATA PENDONOR</span>

                <h1>Data Pendonor</h1>

                <p>
                    Kelola data pendonor DonorConnect dengan mudah.
                </p>
            </div>

        </div>

        {{-- Hati --}}
        <div class="banner-heart">
            <svg viewBox="0 0 24 24" aria-hidden="true">
                <path d="M20.8 8.6c0 5.5-8.8 10.2-8.8 10.2S3.2 14.1 3.2 8.6A4.6 4.6 0 0 1 12 6.3a4.6 4.6 0 0 1 8.8 2.3Z"/>
            </svg>
        </div>

        {{-- Total --}}
        <div class="total-box">

            <div class="total-box-icon">
                <svg viewBox="0 0 24 24" aria-hidden="true">
                    <path d="M16 11a4 4 0 1 0-3.9-5h-.2A4 4 0 0 0 16 11Z"/>
                    <path d="M8 11a3.5 3.5 0 1 0 0-7 3.5 3.5 0 0 0 0 7Z"/>
                    <path d="M2.5 20a5.5 5.5 0 0 1 11 0"/>
                    <path d="M13 15.5a5.5 5.5 0 0 1 8.5 4.5"/>
                </svg>
            </div>

            <div class="total-info">
                <strong>{{ $pendonor->count() }}</strong>
                <span>Total Pendonor</span>
            </div>

        </div>

    </div>


    {{-- Data --}}
    <div class="data-card">

        {{-- Search --}}
        <div class="table-top">

            <div class="search-box">

                <svg viewBox="0 0 24 24" aria-hidden="true">
                    <circle cx="11" cy="11" r="6.5"></circle>
                    <path d="m16 16 5 5"></path>
                </svg>

                <input
                    type="text"
                    id="searchPendonor"
                    placeholder="Cari nama, status, golongan darah..."
                    autocomplete="off"
                >

            </div>

        </div>


        {{-- Tabel --}}
        <div class="table-scroll">

            <table id="pendonorTable">

                <thead>
                    <tr>
                        <th class="col-no">NO</th>
                        <th class="col-name">NAMA</th>
                        <th>STATUS</th>
                        <th>KELAS / JABATAN</th>
                        <th>TANGGAL LAHIR</th>
                        <th>GOL. DARAH</th>
                        <th>NO. TELEPON</th>
                        <th>INFORMASI KESEHATAN</th>
                        <th class="col-action">AKSI</th>
                    </tr>
                </thead>

                <tbody>

                    @forelse($pendonor as $item)

                    <tr>

                        <td class="number">
                            {{ $loop->iteration }}
                        </td>

                        <td>

                            <div class="donor-name">

                                <div class="name-icon">
                                    <svg viewBox="0 0 24 24" aria-hidden="true">
                                        <circle cx="12" cy="8" r="3.5"/>
                                        <path d="M5 20a7 7 0 0 1 14 0"/>
                                    </svg>
                                </div>

                                <span>
                                    {{ $item->user->nama ?? '-' }}
                                </span>

                            </div>

                        </td>

                        <td>
                            @if($item->status)

                                <span class="status-badge">
                                    {{ $item->status }}
                                </span>

                            @else

                                <span class="empty-text">-</span>

                            @endif
                        </td>

                        <td>
                            {{ $item->kelas_jabatan ?? '-' }}
                        </td>

                        <td>

                            @if($item->tanggal_lahir)
                                {{ $item->tanggal_lahir->format('d M Y') }}
                            @else
                                -
                            @endif

                        </td>

                        <td>

                            @if($item->golongan_darah)

                                <span class="blood-badge">
                                    {{ $item->golongan_darah }}
                                </span>

                            @else

                                <span class="empty-text">-</span>

                            @endif

                        </td>

                        <td>
                            {{ $item->nomor_telepon ?? '-' }}
                        </td>

                        <td>
                            {{ $item->informasi_kesehatan ?? '-' }}
                        </td>

                        <td class="action-column">

                            <div class="action-buttons">

                                {{-- Detail --}}
                                <a
                                    href="{{ route('pendonor.show', $item->id_pendonor) }}"
                                    class="action-btn detail-btn"
                                    title="Detail"
                                >
                                    <svg viewBox="0 0 24 24" aria-hidden="true">
                                        <path d="M2.5 12s3.5-6 9.5-6 9.5 6 9.5 6-3.5 6-9.5 6-9.5-6-9.5-6Z"/>
                                        <circle cx="12" cy="12" r="2.5"/>
                                    </svg>
                                </a>

                                {{-- Edit --}}
                                <a
                                    href="{{ route('pendonor.edit', $item->id_pendonor) }}"
                                    class="action-btn edit-btn"
                                    title="Edit"
                                >
                                    <svg viewBox="0 0 24 24" aria-hidden="true">
                                        <path d="M4 20h4L19 9a2.1 2.1 0 0 0-3-3L5 18l-1 2Z"/>
                                        <path d="m14.5 7.5 2 2"/>
                                    </svg>
                                </a>

                                {{-- Hapus --}}
                                <form
                                    action="{{ route('pendonor.destroy', $item->id_pendonor) }}"
                                    method="POST"
                                    onsubmit="return confirm('Yakin ingin menghapus data pendonor ini?')"
                                >

                                    @csrf
                                    @method('DELETE')

                                    <button
                                        type="submit"
                                        class="action-btn delete-btn"
                                        title="Hapus"
                                    >
                                        <svg viewBox="0 0 24 24" aria-hidden="true">
                                            <path d="M5 7h14"/>
                                            <path d="M9 7V4h6v3"/>
                                            <path d="m7 7 1 14h8l1-14"/>
                                            <path d="M10 11v6M14 11v6"/>
                                        </svg>
                                    </button>

                                </form>

                            </div>

                        </td>

                    </tr>

                    @empty

                    <tr>

                        <td colspan="9" class="empty-row">

                            <svg viewBox="0 0 24 24" aria-hidden="true">
                                <circle cx="9" cy="8" r="3"/>
                                <circle cx="16" cy="9" r="2.5"/>
                                <path d="M3 20a6 6 0 0 1 12 0"/>
                                <path d="M14 20a5 5 0 0 1 7 0"/>
                            </svg>

                            <span>
                                Belum ada data pendonor.
                            </span>

                        </td>

                    </tr>

                    @endforelse

                </tbody>

            </table>

        </div>


        {{-- Petunjuk --}}
        @if($pendonor->count() > 0)

        <div class="table-hint">

            <span class="hint-icon">→</span>

            <span>
                Geser tabel ke kiri dan kanan untuk melihat data lainnya.
            </span>

        </div>

        @endif


        {{-- Footer --}}
        @if($pendonor->count() > 0)

        <div class="table-footer">

            <span>
                Menampilkan 1 - {{ $pendonor->count() }}
                dari {{ $pendonor->count() }} data
            </span>

            <div class="pagination">

                <button type="button" disabled>‹</button>

                <button type="button" class="active">1</button>

                <button type="button" disabled>›</button>

            </div>

        </div>

        @endif

    </div>

</div>


<style>

/* Halaman */

.pendonor-page {
    min-height: 100vh;
    padding: 24px;
    background: #fff9f6;
}


/* Banner */

.page-banner {
    position: relative;

    min-height: 220px;

    padding: 28px 30px;

    margin-bottom: 22px;

    overflow: hidden;

    border-radius: 22px;

    background: linear-gradient(
        135deg,
        #ed5573,
        #d93659
    );

    color: white;

    box-shadow:
        0 10px 24px rgba(217, 54, 89, .14);
}

.page-banner::before {
    content: "";

    position: absolute;

    width: 300px;
    height: 300px;

    right: -100px;
    bottom: -180px;

    border-radius: 50%;

    background: rgba(255,255,255,.07);
}

.page-banner::after {
    content: "";

    position: absolute;

    width: 230px;
    height: 230px;

    right: 70px;
    bottom: -160px;

    border-radius: 50%;

    border: 38px solid rgba(255,255,255,.05);
}


/* Banner content */

.banner-content {
    position: relative;

    z-index: 2;

    display: flex;

    align-items: center;

    gap: 16px;
}

.banner-icon {
    width: 64px;
    height: 64px;

    flex-shrink: 0;

    display: flex;

    align-items: center;
    justify-content: center;

    border-radius: 17px;

    background: rgba(255,255,255,.15);
}

.banner-icon svg {
    width: 31px;
    height: 31px;

    fill: none;

    stroke: white;

    stroke-width: 1.7;

    stroke-linecap: round;
    stroke-linejoin: round;
}

.banner-label {
    display: block;

    margin-bottom: 3px;

    font-size: 12px;

    font-weight: 700;

    letter-spacing: .9px;

    opacity: .9;
}

.banner-text h1 {
    margin: 0;

    font-size: 31px;

    line-height: 1.2;

    font-weight: 700;
}

.banner-text p {
    margin: 7px 0 0;

    font-size: 14px;

    line-height: 1.45;

    opacity: .9;
}


/* Hati */

.banner-heart {
    position: absolute;

    z-index: 3;

    top: 48px;
    right: 48px;

    width: 72px;
    height: 72px;

    display: flex;

    align-items: center;
    justify-content: center;

    border-radius: 50%;

    background: rgba(255,255,255,.96);

    box-shadow:
        0 7px 18px rgba(100,20,40,.10);
}

.banner-heart svg {
    width: 35px;
    height: 35px;

    fill: #d93659;

    stroke: #d93659;
}


/* Total */

.total-box {
    position: absolute;

    z-index: 4;

    left: 30px;
    bottom: 20px;

    display: flex;

    align-items: center;

    gap: 11px;

    min-width: 195px;

    padding: 10px 14px;

    border-radius: 14px;

    background: rgba(255,255,255,.14);

    border: 1px solid rgba(255,255,255,.1);
}

.total-box-icon {
    width: 42px;
    height: 42px;

    flex-shrink: 0;

    display: flex;

    align-items: center;
    justify-content: center;

    border-radius: 11px;

    background: rgba(255,255,255,.14);
}

.total-box-icon svg {
    width: 21px;
    height: 21px;

    fill: none;

    stroke: white;

    stroke-width: 1.7;

    stroke-linecap: round;
    stroke-linejoin: round;
}

.total-info strong {
    display: block;

    font-size: 25px;

    line-height: 1;

    font-weight: 700;
}

.total-info span {
    display: block;

    margin-top: 4px;

    font-size: 11px;

    opacity: .9;
}


/* Card */

.data-card {
    padding: 18px;

    background: white;

    border: 1px solid #f0e4e7;

    border-radius: 20px;

    box-shadow:
        0 5px 18px rgba(90,40,50,.05);
}


/* Search */

.table-top {
    margin-bottom: 15px;
}

.search-box {
    position: relative;

    width: 560px;

    max-width: 100%;
}

.search-box svg {
    position: absolute;

    left: 16px;
    top: 50%;

    width: 19px;
    height: 19px;

    transform: translateY(-50%);

    fill: none;

    stroke: #d93659;

    stroke-width: 1.8;

    stroke-linecap: round;

    pointer-events: none;
}

.search-box input {
    width: 100%;

    height: 48px;

    padding: 0 16px 0 46px;

    border: 1px solid #e4dfe1;

    border-radius: 13px;

    outline: none;

    background: white;

    color: #333;

    font-size: 13px;
}

.search-box input:focus {
    border-color: #ed5573;

    box-shadow:
        0 0 0 3px rgba(237,85,115,.07);
}


/* Tabel */

.table-scroll {
    width: 100%;

    overflow-x: auto;
    overflow-y: hidden;

    -webkit-overflow-scrolling: touch;

    touch-action: pan-x;

    overscroll-behavior-x: contain;

    border: 1px solid #eee5e7;

    border-radius: 14px;

    scrollbar-width: thin;

    scrollbar-color:
        #ed5573
        #f8eef0;
}

.table-scroll::-webkit-scrollbar {
    height: 7px;
}

.table-scroll::-webkit-scrollbar-track {
    background: #f8eef0;
}

.table-scroll::-webkit-scrollbar-thumb {
    background: #ed5573;

    border-radius: 10px;
}

#pendonorTable {
    width: 1050px;

    min-width: 1050px;

    border-collapse: separate;

    border-spacing: 0;

    font-size: 12px;

    table-layout: fixed;
}


/* Header */

#pendonorTable thead th {
    height: 46px;

    padding: 10px 11px;

    background: linear-gradient(
        135deg,
        #ed5573,
        #d93659
    );

    color: white;

    font-size: 11px;

    font-weight: 700;

    white-space: nowrap;

    text-align: left;

    border-right:
        1px solid rgba(255,255,255,.12);
}

#pendonorTable thead th:first-child {
    text-align: center;
}

#pendonorTable thead th:last-child {
    text-align: center;

    border-right: none;
}


/* Isi */

#pendonorTable tbody td {
    height: 62px;

    padding: 9px 11px;

    background: white;

    color: #4f484b;

    border-right: 1px solid #eee8e9;

    border-bottom: 1px solid #eee8e9;

    vertical-align: middle;

    white-space: nowrap;

    overflow: hidden;

    text-overflow: ellipsis;
}

#pendonorTable tbody tr:last-child td {
    border-bottom: none;
}

#pendonorTable tbody td:last-child {
    border-right: none;
}

#pendonorTable tbody tr:hover td {
    background: #fff9fb;
}


/* Lebar kolom */

.col-no {
    width: 48px;
}

.col-name {
    width: 190px;
}

.col-action {
    width: 125px;
}


/* Nama */

.number {
    text-align: center;

    font-weight: 600;

    color: #5c5356;
}

.donor-name {
    display: flex;

    align-items: center;

    gap: 8px;

    font-weight: 600;

    color: #343033;

    min-width: 0;
}

.donor-name span {
    overflow: hidden;

    text-overflow: ellipsis;

    white-space: nowrap;
}

.name-icon {
    width: 34px;
    height: 34px;

    flex-shrink: 0;

    display: flex;

    align-items: center;
    justify-content: center;

    border-radius: 50%;

    background: #ffe5eb;
}

.name-icon svg {
    width: 17px;
    height: 17px;

    fill: none;

    stroke: #d93659;

    stroke-width: 1.8;

    stroke-linecap: round;
    stroke-linejoin: round;
}


/* Badge */

.status-badge {
    display: inline-flex;

    align-items: center;

    max-width: 100%;

    padding: 5px 9px;

    border-radius: 18px;

    background: #ffe5eb;

    color: #d93659;

    font-size: 11px;

    font-weight: 600;

    white-space: nowrap;
}

.blood-badge {
    display: inline-flex;

    align-items: center;
    justify-content: center;

    min-width: 34px;

    padding: 5px 8px;

    border-radius: 18px;

    background: #ffe5eb;

    color: #d93659;

    font-size: 11px;

    font-weight: 700;
}

.empty-text {
    color: #aaa;
}


/* Aksi */

.action-column {
    width: 125px;

    text-align: center;
}

.action-buttons {
    display: flex;

    align-items: center;

    justify-content: center;

    gap: 5px;
}

.action-buttons form {
    margin: 0;
    padding: 0;
}

.action-btn {
    width: 32px;
    height: 32px;

    display: flex;

    align-items: center;
    justify-content: center;

    border: none;

    border-radius: 9px;

    cursor: pointer;

    text-decoration: none;

    transition: .2s ease;
}

.action-btn:hover {
    transform: translateY(-2px);
}

.action-btn svg {
    width: 15px;
    height: 15px;

    fill: none;

    stroke-width: 1.8;

    stroke-linecap: round;
    stroke-linejoin: round;
}

.detail-btn {
    background: #ffe5eb;
}

.detail-btn svg {
    stroke: #d93659;
}

.edit-btn {
    background: #fff0d9;
}

.edit-btn svg {
    stroke: #d48618;
}

.delete-btn {
    background: #ffe1e1;
}

.delete-btn svg {
    stroke: #d33b3b;
}


/* Kosong */

.empty-row {
    height: 150px !important;

    text-align: center;

    color: #999 !important;
}

.empty-row svg {
    display: block;

    width: 38px;
    height: 38px;

    margin: 0 auto 9px;

    fill: none;

    stroke: #ed5573;

    stroke-width: 1.5;

    stroke-linecap: round;
    stroke-linejoin: round;
}


/* Petunjuk */

.table-hint {
    display: flex;

    align-items: center;

    gap: 8px;

    margin-top: 10px;

    color: #9a8f93;

    font-size: 11px;
}

.hint-icon {
    width: 27px;
    height: 27px;

    display: flex;

    align-items: center;
    justify-content: center;

    flex-shrink: 0;

    border-radius: 50%;

    background: #ffe5eb;

    color: #d93659;

    font-size: 16px;
}


/* Footer */

.table-footer {
    display: flex;

    align-items: center;

    justify-content: space-between;

    padding: 15px 3px 0;

    color: #71809a;

    font-size: 12px;
}

.pagination {
    display: flex;

    gap: 7px;
}

.pagination button {
    width: 36px;
    height: 36px;

    border: 1px solid #e2e5eb;

    border-radius: 10px;

    background: white;

    color: #9aa5b5;

    font-size: 17px;
}

.pagination button.active {
    background: #ed5573;

    border-color: #ed5573;

    color: white;

    font-size: 12px;

    font-weight: 600;
}


/* Tablet */

@media (max-width: 900px) {

    .pendonor-page {
        padding: 18px;
    }

    .page-banner {
        min-height: 215px;

        padding: 25px;
    }

    .banner-heart {
        right: 32px;
        top: 48px;
    }

    .total-box {
        left: 25px;
        bottom: 18px;
    }
}


/* HP */

@media (max-width: 600px) {

    .pendonor-page {
        padding: 12px;

        width: 100%;

        overflow-x: hidden;
    }

    .page-banner {
        min-height: 235px;

        padding: 20px;

        margin-bottom: 16px;

        border-radius: 19px;
    }

    .banner-content {
        gap: 12px;

        align-items: flex-start;
    }

    .banner-icon {
        width: 52px;
        height: 52px;

        border-radius: 14px;
    }

    .banner-icon svg {
        width: 26px;
        height: 26px;
    }

    .banner-label {
        font-size: 10px;
    }

    .banner-text h1 {
        font-size: 23px;
    }

    .banner-text p {
        max-width: 205px;

        margin-top: 5px;

        font-size: 11px;

        line-height: 1.45;
    }

    .banner-heart {
        width: 55px;
        height: 55px;

        right: 17px;
        top: 92px;
    }

    .banner-heart svg {
        width: 27px;
        height: 27px;
    }

    .total-box {
        left: 20px;
        right: 20px;

        bottom: 17px;

        min-width: 0;

        padding: 9px 12px;

        border-radius: 13px;
    }

    .total-box-icon {
        width: 40px;
        height: 40px;
    }

    .total-box-icon svg {
        width: 20px;
        height: 20px;
    }

    .total-info strong {
        font-size: 24px;
    }

    .total-info span {
        font-size: 11px;
    }


    /* Card */

    .data-card {
        padding: 13px;

        border-radius: 18px;
    }


    /* Search */

    .table-top {
        margin-bottom: 13px;
    }

    .search-box input {
        height: 46px;

        font-size: 12px;

        padding-left: 44px;
    }

    .search-box svg {
        left: 15px;

        width: 18px;
        height: 18px;
    }


    /* Tabel HP */

    .table-scroll {
        width: 100%;

        max-width: 100%;

        overflow-x: scroll;

        overflow-y: hidden;

        -webkit-overflow-scrolling: touch;

        touch-action: pan-x;
    }

    #pendonorTable {
        width: 1050px;

        min-width: 1050px;

        table-layout: fixed;
    }

    #pendonorTable thead th {
        height: 44px;

        padding: 9px 10px;

        font-size: 10px;
    }

    #pendonorTable tbody td {
        height: 60px;

        padding: 8px 10px;

        font-size: 11px;
    }


    /* Kolom HP */

    .col-no {
        width: 45px !important;
    }

    .col-name {
        width: 180px !important;
    }

    .col-action {
        width: 120px !important;
    }


    /* Nama HP */

    .name-icon {
        width: 32px;
        height: 32px;
    }

    .name-icon svg {
        width: 16px;
        height: 16px;
    }

    .donor-name {
        gap: 7px;
    }


    /* Tombol HP */

    .action-column {
        width: 120px;
    }

    .action-buttons {
        gap: 5px;
    }

    .action-btn {
        width: 31px;
        height: 31px;
    }

    .action-btn svg {
        width: 14px;
        height: 14px;
    }


    /* Footer */

    .table-footer {
        flex-direction: column;

        align-items: flex-start;

        gap: 12px;

        padding-top: 14px;
    }

}


/* HP kecil */

@media (max-width: 400px) {

    .pendonor-page {
        padding: 10px;
    }

    .page-banner {
        min-height: 225px;

        padding: 18px;
    }

    .banner-icon {
        width: 48px;
        height: 48px;
    }

    .banner-text h1 {
        font-size: 21px;
    }

    .banner-text p {
        max-width: 185px;

        font-size: 10px;
    }

    .banner-heart {
        width: 50px;
        height: 50px;

        right: 15px;
        top: 88px;
    }

    .banner-heart svg {
        width: 24px;
        height: 24px;
    }

    .total-box {
        left: 17px;
        right: 17px;

        bottom: 15px;
    }

    .data-card {
        padding: 11px;
    }

    #pendonorTable {
        width: 1050px;

        min-width: 1050px;
    }
}

</style>


<script>

document.addEventListener('DOMContentLoaded', function () {

    const searchInput =
        document.getElementById('searchPendonor');

    const rows =
        document.querySelectorAll(
            '#pendonorTable tbody tr'
        );

    if (!searchInput) {
        return;
    }

    searchInput.addEventListener('input', function () {

        const keyword =
            this.value.toLowerCase().trim();

        rows.forEach(function (row) {

            const text =
                row.textContent.toLowerCase();

            row.style.display =
                text.includes(keyword) ? '' : 'none';

        });

    });

});

</script>

@endsection