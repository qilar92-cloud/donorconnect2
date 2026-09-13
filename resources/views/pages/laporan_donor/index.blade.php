@extends('layouts.app')

@section('title', 'Laporan Donor')

@section('content')

<style>
    .laporan-page {
        min-height: calc(100vh - 70px);
        padding: 24px 28px 40px;
        background: #fff9f6;
    }

    /* Banner */
    .laporan-banner {
        position: relative;
        overflow: hidden;
        display: flex;
        align-items: center;
        min-height: 150px;
        margin-bottom: 22px;
        padding: 30px 34px;
        border-radius: 22px;
        background: linear-gradient(135deg, #ed5573 0%, #d93659 100%);
        color: #fff;
        box-shadow: 0 10px 28px rgba(217, 54, 89, .14);
    }

    .laporan-banner::before {
        content: "";
        position: absolute;
        width: 230px;
        height: 230px;
        right: -80px;
        top: -145px;
        border: 34px solid rgba(255,255,255,.07);
        border-radius: 50%;
    }

    .laporan-banner::after {
        content: "";
        position: absolute;
        width: 90px;
        height: 90px;
        right: 155px;
        bottom: -58px;
        border-radius: 50%;
        background: rgba(255,255,255,.06);
    }

    .banner-content {
        position: relative;
        z-index: 2;
    }

    .banner-label {
        display: flex;
        align-items: center;
        gap: 7px;
        margin-bottom: 8px;
        font-size: 9px;
        font-weight: 800;
        letter-spacing: 1.8px;
        text-transform: uppercase;
        opacity: .82;
    }

    .banner-title {
        margin: 0 0 7px;
        font-size: 30px;
        line-height: 1.15;
        font-weight: 800;
    }

    .banner-subtitle {
        max-width: 570px;
        margin: 0;
        font-size: 12px;
        line-height: 1.6;
        opacity: .9;
    }

    .banner-icon {
        position: absolute;
        z-index: 2;
        right: 38px;
        top: 50%;
        transform: translateY(-50%);
        width: 72px;
        height: 72px;
        display: flex;
        align-items: center;
        justify-content: center;
        border: 1px solid rgba(255,255,255,.28);
        border-radius: 18px;
        background: rgba(255,255,255,.13);
        backdrop-filter: blur(6px);
        font-size: 27px;
    }

    /* Card */
    .custom-card {
        border: 1px solid #f0e0e4;
        border-radius: 19px;
        background: #fff;
        box-shadow: 0 6px 20px rgba(60,30,40,.04);
    }

    /* Filter */
    .filter-card {
        margin-bottom: 22px;
        padding: 22px;
    }

    .filter-heading {
        display: flex;
        align-items: center;
        gap: 12px;
        margin-bottom: 18px;
    }

    .filter-icon {
        width: 39px;
        height: 39px;
        flex-shrink: 0;
        display: flex;
        align-items: center;
        justify-content: center;
        border-radius: 11px;
        background: #fff0f4;
        color: #df3659;
        font-size: 14px;
    }

    .filter-heading h5 {
        margin: 0;
        color: #302b31;
        font-size: 15px;
        font-weight: 750;
    }

    .filter-heading p {
        margin: 3px 0 0;
        color: #aaa0a5;
        font-size: 10px;
    }

    .form-label-custom {
        display: block;
        margin-bottom: 7px;
        color: #6f676d;
        font-size: 10px;
        font-weight: 700;
    }

    .custom-input,
    .custom-select {
        width: 100%;
        height: 43px;
        padding: 0 13px;
        border: 1px solid #eadde1;
        border-radius: 11px;
        outline: none;
        background: #fffafa;
        color: #4b4549;
        font-size: 11px;
        transition: .2s ease;
    }

    .custom-input:hover,
    .custom-select:hover {
        border-color: #e8cbd3;
        background: #fff;
    }

    .custom-input:focus,
    .custom-select:focus {
        border-color: #df5571;
        background: #fff;
        box-shadow: 0 0 0 3px rgba(223,85,113,.08);
    }

    .filter-button {
        width: 100%;
        height: 43px;
        border: 0;
        border-radius: 11px;
        background: #df3659;
        color: #fff;
        font-size: 11px;
        font-weight: 750;
        transition: .2s ease;
        box-shadow: 0 5px 12px rgba(223,54,89,.13);
    }

    .filter-button:hover {
        background: #c92d4d;
        color: #fff;
        transform: translateY(-1px);
        box-shadow: 0 7px 15px rgba(223,54,89,.18);
    }

    /* Content */
    .content-grid {
        display: grid;
        grid-template-columns: .9fr 1.35fr;
        gap: 20px;
    }

    .content-card {
        min-height: 365px;
        padding: 22px;
    }

    .content-heading {
        display: flex;
        align-items: center;
        gap: 12px;
        margin-bottom: 18px;
    }

    .content-heading-icon {
        width: 39px;
        height: 39px;
        flex-shrink: 0;
        display: flex;
        align-items: center;
        justify-content: center;
        border-radius: 11px;
        background: #fff0f4;
        color: #df3659;
        font-size: 14px;
    }

    .content-heading h5 {
        margin: 0;
        color: #302b31;
        font-size: 15px;
        font-weight: 750;
    }

    .content-heading p {
        margin: 3px 0 0;
        color: #aaa1a6;
        font-size: 9px;
    }

    /* Donor terbaru */
    .data-list {
        display: flex;
        flex-direction: column;
        gap: 9px;
    }

    .data-item {
        display: flex;
        align-items: center;
        gap: 11px;
        min-width: 0;
        padding: 11px;
        border: 1px solid #f2e5e8;
        border-radius: 13px;
        background: #fffafa;
        transition: .2s ease;
    }

    .data-item:hover {
        border-color: #eccfd7;
        background: #fff7f9;
        transform: translateX(2px);
    }

    .data-icon {
        width: 36px;
        height: 36px;
        flex-shrink: 0;
        display: flex;
        align-items: center;
        justify-content: center;
        border-radius: 10px;
        background: #fff0f4;
        color: #df3659;
        font-size: 13px;
    }

    .data-info {
        flex: 1;
        min-width: 0;
    }

    .data-info strong {
        display: block;
        overflow: hidden;
        margin-bottom: 3px;
        color: #363038;
        font-size: 11px;
        font-weight: 750;
        text-overflow: ellipsis;
        white-space: nowrap;
    }

    .data-info span {
        display: block;
        overflow: hidden;
        color: #aaa1a6;
        font-size: 9px;
        text-overflow: ellipsis;
        white-space: nowrap;
    }

    .data-badge {
        flex-shrink: 0;
        padding: 5px 9px;
        border-radius: 20px;
        background: #eaf7ef;
        color: #39915d;
        font-size: 8px;
        font-weight: 750;
    }

    .empty-data {
        padding: 50px 15px;
        text-align: center;
    }

    .empty-icon {
        width: 45px;
        height: 45px;
        margin: 0 auto 11px;
        display: flex;
        align-items: center;
        justify-content: center;
        border-radius: 13px;
        background: #fff0f4;
        color: #df3659;
        font-size: 15px;
    }

    .empty-data p {
        margin: 0;
        color: #aaa1a6;
        font-size: 10px;
    }

    /* Grafik */
    .chart-header {
        display: flex;
        align-items: flex-start;
        justify-content: space-between;
        gap: 15px;
        margin-bottom: 15px;
    }

    .chart-title {
        display: flex;
        align-items: center;
        gap: 12px;
    }

    .chart-title h5 {
        margin: 0;
        color: #302b31;
        font-size: 15px;
        font-weight: 750;
    }

    .chart-title p {
        margin: 3px 0 0;
        color: #aaa1a6;
        font-size: 9px;
    }

    .total-box {
        min-width: 82px;
        padding: 8px 12px;
        border: 1px solid #f3dce2;
        border-radius: 11px;
        background: #fff5f7;
        text-align: center;
    }

    .total-box small {
        display: block;
        color: #aaa0a5;
        font-size: 8px;
    }

    .total-box strong {
        display: block;
        margin: 2px 0;
        color: #df3659;
        font-size: 19px;
        line-height: 1;
        font-weight: 800;
    }

    /* Area grafik */
    .chart-wrap {
        position: relative;
        height: 275px;
        padding: 5px 5px 0;
    }

    .chart-grid {
        position: absolute;
        top: 5px;
        right: 5px;
        bottom: 35px;
        left: 5px;
        display: flex;
        flex-direction: column;
        justify-content: space-between;
        pointer-events: none;
    }

    .chart-grid-line {
        width: 100%;
        border-top: 1px dashed #eee3e6;
    }

    .chart-bars {
        position: absolute;
        top: 5px;
        right: 5px;
        bottom: 0;
        left: 5px;
        display: flex;
        align-items: flex-end;
        gap: 8px;
        border-bottom: 1px solid #eadfe2;
    }

    .bar-item {
        flex: 1;
        height: 100%;
        min-width: 13px;
        display: flex;
        flex-direction: column;
        align-items: center;
        justify-content: flex-end;
    }

    .bar-value {
        min-height: 13px;
        margin-bottom: 5px;
        color: #d94a68;
        font-size: 8px;
        font-weight: 750;
    }

    .bar {
        width: 52%;
        max-width: 26px;
        min-height: 4px;
        border-radius: 8px 8px 3px 3px;
        background: #f0dce2;
        transition: .25s ease;
    }

    .bar.active {
        background: linear-gradient(to top, #df3659, #f06483);
        box-shadow: 0 4px 10px rgba(223,54,89,.13);
    }

    .bar.active:hover {
        transform: scaleY(1.03);
        filter: brightness(.96);
    }

    .bar-label {
        height: 30px;
        display: flex;
        align-items: flex-end;
        margin-top: 7px;
        color: #aaa1a6;
        font-size: 8px;
    }

    /* Responsive */
    @media (max-width: 1100px) {
        .content-grid {
            grid-template-columns: 1fr;
        }
    }

    @media (max-width: 768px) {

        .laporan-page {
            padding: 15px 13px 28px;
        }

        .laporan-banner {
            min-height: 138px;
            padding: 23px;
            border-radius: 18px;
        }

        .banner-title {
            font-size: 25px;
        }

        .banner-subtitle {
            max-width: 70%;
            font-size: 10px;
        }

        .banner-icon {
            right: 18px;
            width: 57px;
            height: 57px;
            border-radius: 14px;
            font-size: 21px;
        }

        .filter-card {
            padding: 17px;
        }

        .content-card {
            padding: 18px;
        }

        .content-grid {
            grid-template-columns: 1fr;
            gap: 15px;
        }

        .chart-wrap {
            height: 240px;
        }

        .chart-bars {
            gap: 6px;
        }
    }

    @media (max-width: 500px) {

        .laporan-page {
            padding: 10px;
        }

        .laporan-banner {
            min-height: 130px;
            padding: 20px 18px;
            border-radius: 16px;
        }

        .banner-label {
            font-size: 7.5px;
            letter-spacing: 1.3px;
        }

        .banner-title {
            font-size: 22px;
        }

        .banner-subtitle {
            max-width: 67%;
            font-size: 9px;
            line-height: 1.5;
        }

        .banner-icon {
            right: 14px;
            width: 50px;
            height: 50px;
            border-radius: 12px;
            font-size: 19px;
        }

        .filter-card,
        .content-card {
            padding: 15px;
            border-radius: 15px;
        }

        .filter-heading,
        .content-heading {
            gap: 9px;
        }

        .filter-icon,
        .content-heading-icon {
            width: 35px;
            height: 35px;
            border-radius: 9px;
            font-size: 12px;
        }

        .filter-heading h5,
        .content-heading h5 {
            font-size: 14px;
        }

        .filter-heading p,
        .content-heading p {
            font-size: 8px;
        }

        .custom-input,
        .custom-select,
        .filter-button {
            height: 41px;
        }

        .data-item {
            padding: 9px;
        }

        .data-icon {
            width: 33px;
            height: 33px;
        }

        .data-info strong {
            font-size: 10px;
        }

        .data-info span {
            font-size: 8px;
        }

        .data-badge {
            padding: 4px 6px;
            font-size: 7px;
        }

        .chart-header {
            gap: 10px;
        }

        .chart-title h5 {
            font-size: 13px;
        }

        .chart-title p {
            font-size: 8px;
        }

        .total-box {
            min-width: 62px;
            padding: 6px 8px;
        }

        .total-box strong {
            font-size: 16px;
        }

        .chart-wrap {
            height: 220px;
        }

        .chart-bars {
            gap: 3px;
        }

        .bar {
            max-width: 17px;
            width: 55%;
        }

        .bar-value,
        .bar-label {
            font-size: 7px;
        }
    }

    @media (max-width: 360px) {

        .banner-title {
            font-size: 20px;
        }

        .banner-subtitle {
            font-size: 8px;
        }

        .data-badge {
            display: none;
        }

        .chart-wrap {
            height: 205px;
        }

        .chart-bars {
            gap: 2px;
        }
    }
</style>


<div class="laporan-page">

    {{-- Banner --}}
    <div class="laporan-banner">

        <div class="banner-content">

            <div class="banner-label">
                <i class="fas fa-chart-line"></i>
                DONORCONNECT • PETUGAS PMR
            </div>

            <h1 class="banner-title">
                Laporan Donor
            </h1>

            <p class="banner-subtitle">
                Pantau hasil donor dan perkembangan kegiatan donor dengan lebih mudah.
            </p>

        </div>

        <div class="banner-icon">
            <i class="fas fa-chart-line"></i>
        </div>

    </div>


    {{-- Filter --}}
    <div class="custom-card filter-card">

        <div class="filter-heading">

            <div class="filter-icon">
                <i class="fas fa-filter"></i>
            </div>

            <div>
                <h5>Filter Laporan</h5>
                <p>Pilih periode atau kegiatan donor.</p>
            </div>

        </div>


        <form method="GET">

            <div class="row align-items-end">

                <div class="col-md-3 mb-3 mb-md-0">

                    <label class="form-label-custom">
                        Dari Tanggal
                    </label>

                    <input
                        type="date"
                        name="dari_tanggal"
                        value="{{ request('dari_tanggal') }}"
                        class="custom-input"
                    >

                </div>


                <div class="col-md-3 mb-3 mb-md-0">

                    <label class="form-label-custom">
                        Sampai Tanggal
                    </label>

                    <input
                        type="date"
                        name="sampai_tanggal"
                        value="{{ request('sampai_tanggal') }}"
                        class="custom-input"
                    >

                </div>


                <div class="col-md-4 mb-3 mb-md-0">

                    <label class="form-label-custom">
                        Kegiatan Donor
                    </label>

                    <select
                        name="id_kegiatan"
                        class="custom-select"
                    >

                        <option value="">
                            Semua Kegiatan
                        </option>

                        @foreach(($kegiatan ?? []) as $item)

                            <option
                                value="{{ $item->id_kegiatan }}"
                                {{ request('id_kegiatan') == $item->id_kegiatan ? 'selected' : '' }}
                            >
                                {{ $item->nama_kegiatan }}
                            </option>

                        @endforeach

                    </select>

                </div>


                <div class="col-md-2">

                    <button
                        type="submit"
                        class="filter-button"
                    >
                        <i class="fas fa-search mr-1"></i>
                        Tampilkan
                    </button>

                </div>

            </div>

        </form>

    </div>


    {{-- Data dan Grafik --}}
    <div class="content-grid">


        {{-- Donor Terbaru --}}
        <div class="custom-card content-card">

            <div class="content-heading">

                <div class="content-heading-icon">
                    <i class="fas fa-calendar-check"></i>
                </div>

                <div>
                    <h5>Donor Terbaru</h5>
                    <p>Hasil donor yang baru tercatat.</p>
                </div>

            </div>


            <div class="data-list">

                @forelse(($laporan ?? []) as $item)

                    <div class="data-item">

                        <div class="data-icon">
                            <i class="fas fa-tint"></i>
                        </div>

                        <div class="data-info">

                            <strong>
                                {{ $item->hasilDonor->pendonor->user->nama ?? 'Pendonor' }}
                            </strong>

                            <span>
                                {{ $item->hasilDonor->kegiatanDonor->nama_kegiatan ?? 'Kegiatan donor' }}
                            </span>

                        </div>

                        <div class="data-badge">
                            {{ $item->hasilDonor->jumlah_kantong ?? 0 }} kantong
                        </div>

                    </div>

                @empty

                    <div class="empty-data">

                        <div class="empty-icon">
                            <i class="fas fa-heart"></i>
                        </div>

                        <p>
                            Belum ada data donor.
                        </p>

                    </div>

                @endforelse

            </div>

        </div>


        {{-- Grafik --}}
        <div class="custom-card content-card">

            <div class="chart-header">

                <div class="chart-title">

                    <div class="content-heading-icon">
                        <i class="fas fa-chart-bar"></i>
                    </div>

                    <div>
                        <h5>Perkembangan Donor</h5>

                        <p>
                            Jumlah kantong darah setiap bulan.
                        </p>
                    </div>

                </div>


                <div class="total-box">

                    <small>Total</small>

                    <strong>
                        {{ $totalKantong ?? 0 }}
                    </strong>

                    <small>kantong</small>

                </div>

            </div>


            @php

                $bulan = [
                    'Jan',
                    'Feb',
                    'Mar',
                    'Apr',
                    'Mei',
                    'Jun',
                    'Jul',
                    'Agu',
                    'Sep',
                    'Okt',
                    'Nov',
                    'Des'
                ];

                $dataGrafik = $dataGrafik ?? array_fill(0, 12, 0);

                $nilaiTertinggi = max($dataGrafik ?: [1]);

            @endphp


            <div class="chart-wrap">

                <div class="chart-grid">

                    <div class="chart-grid-line"></div>
                    <div class="chart-grid-line"></div>
                    <div class="chart-grid-line"></div>
                    <div class="chart-grid-line"></div>
                    <div class="chart-grid-line"></div>

                </div>


                <div class="chart-bars">

                    @foreach($bulan as $index => $namaBulan)

                        @php

                            $nilai = $dataGrafik[$index] ?? 0;

                            $tinggi = $nilaiTertinggi > 0
                                ? ($nilai / $nilaiTertinggi) * 180
                                : 4;

                        @endphp


                        <div class="bar-item">

                            <div class="bar-value">
                                {{ $nilai }}
                            </div>

                            <div
                                class="bar {{ $nilai > 0 ? 'active' : '' }}"
                                style="height: {{ max($tinggi, 4) }}px;"
                            ></div>

                            <div class="bar-label">
                                {{ $namaBulan }}
                            </div>

                        </div>

                    @endforeach

                </div>

            </div>

        </div>

    </div>

</div>

@endsection