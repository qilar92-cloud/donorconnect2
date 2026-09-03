@extends('layouts.app')

@section('title', 'Data Pendonor')

@section('content')

<style>
    .pendonor-page {
        color: #3b3034;
    }

    /* Header */
    .page-header {
        margin-bottom: 24px;
    }

    .page-title {
        color: #3b3034;
        font-size: 27px;
        font-weight: 900;
        margin: 0 0 5px;
        letter-spacing: -0.5px;
    }

    .page-subtitle {
        color: #8d7b80;
        font-size: 13px;
        margin: 0;
    }

    /* Total Pendonor */
    .total-card {
        position: relative;
        overflow: hidden;
        min-height: 125px;
        padding: 23px 27px;
        margin-bottom: 24px;
        border-radius: 18px;
        color: #fff;

        background: linear-gradient(
            135deg,
            #9d001f 0%,
            #c91845 52%,
            #d84a91 100%
        );

        box-shadow: 0 9px 24px rgba(151, 15, 53, .20);
    }

    .total-card::before {
        content: '';
        position: absolute;
        width: 180px;
        height: 180px;
        border-radius: 50%;
        right: -65px;
        top: -85px;
        background: rgba(255,255,255,.09);
    }

    .total-card::after {
        content: '';
        position: absolute;
        width: 100px;
        height: 100px;
        border-radius: 50%;
        right: 105px;
        bottom: -70px;
        background: rgba(255,255,255,.06);
    }

    .total-content {
        position: relative;
        z-index: 2;
    }

    .total-label {
        font-size: 11px;
        font-weight: 800;
        letter-spacing: 1px;
        opacity: .88;
        margin-bottom: 6px;
    }

    .total-number {
        font-size: 35px;
        font-weight: 900;
        line-height: 1;
    }

    .total-description {
        margin-top: 8px;
        font-size: 12px;
        opacity: .86;
    }

    .total-icon {
        position: absolute;
        z-index: 3;
        right: 28px;
        bottom: 22px;

        width: 57px;
        height: 57px;

        display: flex;
        align-items: center;
        justify-content: center;

        border-radius: 16px;
        background: rgba(255,255,255,.15);

        font-size: 25px;
    }

    /* Card Data */
    .data-card {
        background: #fff;
        border-radius: 18px;
        border: 1px solid #f0dfe3;
        overflow: hidden;

        box-shadow:
            0 8px 25px rgba(87, 43, 53, .07);
    }

    .data-card-header {
        padding: 21px 23px;
        display: flex;
        justify-content: space-between;
        align-items: center;
        gap: 18px;
        flex-wrap: wrap;

        border-bottom: 1px solid #f0e3e5;
    }

    .title-wrapper {
        display: flex;
        align-items: center;
        gap: 12px;
    }

    .title-icon {
        width: 43px;
        height: 43px;

        display: flex;
        align-items: center;
        justify-content: center;

        border-radius: 13px;

        background: linear-gradient(
            135deg,
            #fff0f3,
            #ffe5ed
        );

        color: #b6173c;
        font-size: 17px;
    }

    .data-card-title {
        margin: 0;
        color: #3b3034;
        font-size: 17px;
        font-weight: 900;
    }

    .data-card-subtitle {
        margin: 3px 0 0;
        color: #9a898e;
        font-size: 11px;
    }

    /* Search */
    .search-box {
        position: relative;
        width: 305px;
    }

    .search-box i {
        position: absolute;
        left: 15px;
        top: 50%;
        transform: translateY(-50%);

        color: #a78d94;
        font-size: 13px;
    }

    .search-box input {
        width: 100%;
        height: 42px;

        padding: 0 15px 0 40px;

        border: 1px solid #eadadd;
        border-radius: 12px;

        background: #fffafa;
        color: #44373c;

        font-size: 12px;
        outline: none;

        transition: .2s;
    }

    .search-box input::placeholder {
        color: #a9959a;
    }

    .search-box input:focus {
        background: #fff;

        border-color: #c91845;

        box-shadow:
            0 0 0 4px rgba(201, 24, 69, .08);
    }

    /* Table */
    .table-wrapper {
        width: 100%;
        overflow-x: auto;
    }

    .pendonor-table {
        width: 100%;
        min-width: 950px;
        border-collapse: collapse;
    }

    .pendonor-table thead th {
        padding: 15px 16px;

        background: linear-gradient(
            90deg,
            #a80e2c,
            #c91845
        );

        color: #fff;

        font-size: 10px;
        font-weight: 900;

        text-transform: uppercase;
        letter-spacing: .5px;

        white-space: nowrap;
        border: none;
    }

    .pendonor-table thead th:first-child {
        padding-left: 23px;
    }

    .pendonor-table tbody td {
        padding: 16px;

        color: #55484d;
        font-size: 12px;

        border-bottom: 1px solid #f1e6e8;
        vertical-align: middle;
    }

    .pendonor-table tbody tr {
        transition: .2s ease;
    }

    .pendonor-table tbody tr:hover {
        background: #fff7f9;
    }

    .pendonor-table tbody tr:last-child td {
        border-bottom: none;
    }

    /* Nomor */
    .nomor {
        width: 55px;
        padding-left: 23px !important;

        color: #a18f94 !important;
        font-weight: 800;
    }

    /* User */
    .user-info {
        display: flex;
        align-items: center;
        gap: 11px;

        min-width: 190px;
    }

    .user-avatar {
        width: 39px;
        height: 39px;

        flex-shrink: 0;

        display: flex;
        align-items: center;
        justify-content: center;

        border-radius: 12px;

        background: linear-gradient(
            135deg,
            #a80e2c,
            #d44983
        );

        color: #fff;

        font-size: 13px;
        font-weight: 900;

        box-shadow:
            0 5px 12px rgba(169, 22, 58, .17);
    }

    .nama-pendonor {
        color: #3d3035;
        font-size: 12px;
        font-weight: 900;
    }

    .user-label {
        margin-top: 2px;

        color: #a08e93;
        font-size: 10px;
    }

    /* Status */
    .status-badge {
        display: inline-flex;
        align-items: center;
        gap: 6px;

        padding: 6px 11px;

        border-radius: 20px;

        background: #fff0f3;
        color: #b6173c;

        font-size: 10px;
        font-weight: 800;

        white-space: nowrap;
    }

    .status-dot {
        width: 6px;
        height: 6px;

        border-radius: 50%;

        background: #d92d58;
    }

    /* Golongan Darah */
    .darah-badge {
        display: inline-flex;
        align-items: center;
        justify-content: center;

        min-width: 42px;
        height: 32px;

        padding: 0 9px;

        border-radius: 10px;

        background: linear-gradient(
            135deg,
            #a80e2c,
            #c91845
        );

        color: #fff;

        font-size: 11px;
        font-weight: 900;

        box-shadow:
            0 4px 10px rgba(169, 22, 58, .16);
    }

    /* Informasi kesehatan */
    .info-text {
        max-width: 190px;

        color: #66575c;
        line-height: 1.5;
    }

    /* Empty */
    .empty-state {
        padding: 55px 20px !important;

        text-align: center;

        color: #a49398 !important;
    }

    .empty-icon {
        width: 66px;
        height: 66px;

        margin: 0 auto 14px;

        display: flex;
        align-items: center;
        justify-content: center;

        border-radius: 18px;

        background: #fff0f3;
        color: #d29aa7;

        font-size: 25px;
    }

    .empty-state strong {
        display: block;

        margin-bottom: 5px;

        color: #5c4c52;
        font-size: 14px;
    }

    .empty-state span {
        font-size: 11px;
    }

    /* Responsive */
    @media (max-width: 768px) {

        .page-title {
            font-size: 23px;
        }

        .search-box {
            width: 100%;
        }

        .data-card-header {
            align-items: stretch;
        }

        .total-card {
            min-height: 115px;
        }

        .total-icon {
            right: 20px;
        }
    }
</style>


<div class="pendonor-page">

    <!-- Header -->
    <div class="page-header">

        <h1 class="page-title">
            Data Pendonor
        </h1>

        <p class="page-subtitle">
            Kelola dan lihat data pendonor yang terdaftar di DonorConnect.
        </p>

    </div>


    <!-- Total Pendonor -->
    <div class="total-card">

        <div class="total-content">

            <div class="total-label">
                TOTAL PENDONOR
            </div>

            <div class="total-number">
                {{ $pendonor->count() }}
            </div>

            <div class="total-description">
                Pendonor yang telah terdaftar di DonorConnect
            </div>

        </div>

        <div class="total-icon">
            <i class="fas fa-users"></i>
        </div>

    </div>


    <!-- Data Pendonor -->
    <div class="data-card">

        <div class="data-card-header">

            <div class="title-wrapper">

                <div class="title-icon">
                    <i class="fas fa-user-friends"></i>
                </div>

                <div>

                    <h2 class="data-card-title">
                        Daftar Pendonor
                    </h2>

                    <p class="data-card-subtitle">
                        Informasi pendonor yang terdaftar
                    </p>

                </div>

            </div>


            <!-- Search -->
            <div class="search-box">

                <i class="fas fa-search"></i>

                <input
                    type="text"
                    id="searchPendonor"
                    placeholder="Cari nama, status, golongan darah..."
                >

            </div>

        </div>


        <!-- Tabel -->
        <div class="table-wrapper">

            <table class="pendonor-table">

                <thead>

                    <tr>
                        <th>No</th>
                        <th>Nama Pendonor</th>
                        <th>Status</th>
                        <th>Kelas / Jabatan</th>
                        <th>Gol. Darah</th>
                        <th>No. Telepon</th>
                        <th>Informasi Kesehatan</th>
                    </tr>

                </thead>


                <tbody id="pendonorTable">

                    @forelse ($pendonor as $index => $item)

                        @php
                            $nama = $item->user->nama ?? '-';
                            $inisial = $nama !== '-'
                                ? strtoupper(substr($nama, 0, 1))
                                : '?';
                        @endphp

                        <tr>

                            <!-- Nomor -->
                            <td class="nomor">
                                {{ $index + 1 }}
                            </td>


                            <!-- Nama -->
                            <td>

                                <div class="user-info">

                                    <div class="user-avatar">
                                        {{ $inisial }}
                                    </div>

                                    <div>

                                        <div class="nama-pendonor">
                                            {{ $nama }}
                                        </div>

                                        <div class="user-label">
                                            Pendonor
                                        </div>

                                    </div>

                                </div>

                            </td>


                            <!-- Status -->
                            <td>

                                <span class="status-badge">

                                    <span class="status-dot"></span>

                                    {{ $item->status ?? '-' }}

                                </span>

                            </td>


                            <!-- Kelas / Jabatan -->
                            <td>
                                {{ $item->kelas_jabatan ?? '-' }}
                            </td>


                            <!-- Golongan Darah -->
                            <td>

                                <span class="darah-badge">
                                    {{ $item->golongan_darah ?? '-' }}
                                </span>

                            </td>


                            <!-- Telepon -->
                            <td>
                                {{ $item->nomor_telepon ?? '-' }}
                            </td>


                            <!-- Kesehatan -->
                            <td>

                                <div class="info-text">
                                    {{ $item->informasi_kesehatan ?? '-' }}
                                </div>

                            </td>

                        </tr>

                    @empty

                        <tr>

                            <td colspan="7" class="empty-state">

                                <div class="empty-icon">
                                    <i class="fas fa-user-slash"></i>
                                </div>

                                <strong>
                                    Belum ada data pendonor
                                </strong>

                                <span>
                                    Belum terdapat pendonor yang terdaftar.
                                </span>

                            </td>

                        </tr>

                    @endforelse

                </tbody>

            </table>

        </div>

    </div>

</div>


<!-- Pencarian -->
@push('scripts')

<script>
    const searchPendonor = document.getElementById('searchPendonor');

    if (searchPendonor) {

        searchPendonor.addEventListener('keyup', function () {

            const keyword = this.value.toLowerCase();

            const rows = document.querySelectorAll(
                '#pendonorTable tr'
            );

            rows.forEach(function (row) {

                const text = row.innerText.toLowerCase();

                row.style.display =
                    text.includes(keyword) ? '' : 'none';

            });

        });

    }
</script>

@endpush

@endsection