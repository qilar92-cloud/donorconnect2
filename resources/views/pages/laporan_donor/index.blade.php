@extends('layouts.app')

@section('title', 'Laporan Donor')

@section('content')

<div class="laporan-page">

    {{-- Banner --}}
    <div class="laporan-banner">

        <div class="banner-content">

            <div class="banner-icon">
                <i class="fas fa-chart-line"></i>
            </div>

            <div class="banner-text">
                <h1>Laporan Donor</h1>
                <p>
                    Pantau dan lihat ringkasan kegiatan donor dengan mudah.
                </p>
            </div>

        </div>

    </div>


    {{-- Filter --}}
    <div class="filter-card">

        <div class="filter-heading">

            <div class="filter-icon">
                <i class="fas fa-filter"></i>
            </div>

            <div>
                <h2>Filter Laporan</h2>
                <p>Pilih periode atau kegiatan donor</p>
            </div>

        </div>


        <form
            action="{{ route('laporan-donor.filter') }}"
            method="GET"
        >

            <div class="filter-row">

                {{-- Dari Tanggal --}}
                <div class="input-group">

                    <label for="dari_tanggal">
                        Dari Tanggal
                    </label>

                    <div class="input-box">

                        <i class="fas fa-calendar-alt"></i>

                        <input
                            type="date"
                            id="dari_tanggal"
                            name="dari_tanggal"
                            value="{{ request('dari_tanggal') }}"
                        >

                    </div>

                </div>


                {{-- Sampai Tanggal --}}
                <div class="input-group">

                    <label for="sampai_tanggal">
                        Sampai Tanggal
                    </label>

                    <div class="input-box">

                        <i class="fas fa-calendar-alt"></i>

                        <input
                            type="date"
                            id="sampai_tanggal"
                            name="sampai_tanggal"
                            value="{{ request('sampai_tanggal') }}"
                        >

                    </div>

                </div>


                {{-- Kegiatan --}}
                <div class="input-group kegiatan-input">

                    <label for="id_kegiatan">
                        Kegiatan Donor
                    </label>

                    <div class="input-box">

                        <i class="fas fa-calendar-check"></i>

                        <select
                            name="id_kegiatan"
                            id="id_kegiatan"
                        >

                            <option value="">
                                Semua Kegiatan
                            </option>

                            @foreach ($kegiatan as $item)

                                <option
                                    value="{{ $item->id_kegiatan }}"
                                    {{ request('id_kegiatan') == $item->id_kegiatan ? 'selected' : '' }}
                                >
                                    {{ $item->nama_kegiatan }}
                                </option>

                            @endforeach

                        </select>

                        <i class="fas fa-chevron-down select-arrow"></i>

                    </div>

                </div>


                {{-- Tombol --}}
                <button
                    type="submit"
                    class="filter-btn"
                >
                    <i class="fas fa-search"></i>
                    Tampilkan
                </button>

            </div>

        </form>

    </div>


    {{-- Ringkasan & Grafik --}}
    <div class="report-content">


        {{-- Ringkasan Donor --}}
        <div class="report-card summary-card">

            <div class="card-heading">

                <div class="heading-icon">
                    <i class="fas fa-chart-pie"></i>
                </div>

                <div>
                    <h2>Ringkasan Donor</h2>
                    <p>Informasi singkat dari data donor</p>
                </div>

            </div>


            <div class="stats-grid">


                {{-- Total Pendonor --}}
                <div class="stat-item">

                    <div class="stat-icon pink">
                        <i class="fas fa-users"></i>
                    </div>

                    <div class="stat-content">
                        <span>Total Pendonor</span>
                        <strong>{{ $totalPendonor }}</strong>
                        <small>Pendonor terdaftar</small>
                    </div>

                </div>


                {{-- Total Kegiatan --}}
                <div class="stat-item">

                    <div class="stat-icon purple">
                        <i class="fas fa-calendar-alt"></i>
                    </div>

                    <div class="stat-content">
                        <span>Total Kegiatan</span>
                        <strong>{{ $totalKegiatan }}</strong>
                        <small>Kegiatan donor</small>
                    </div>

                </div>


                {{-- Total Kantong --}}
                <div class="stat-item">

                    <div class="stat-icon red">
                        <i class="fas fa-tint"></i>
                    </div>

                    <div class="stat-content">
                        <span>Total Kantong</span>
                        <strong>{{ $totalKantong }}</strong>
                        <small>Kantong terkumpul</small>
                    </div>

                </div>


                {{-- Total Donor --}}
                <div class="stat-item">

                    <div class="stat-icon orange">
                        <i class="fas fa-hand-holding-heart"></i>
                    </div>

                    <div class="stat-content">
                        <span>Total Donor</span>
                        <strong>{{ $totalDonor }}</strong>
                        <small>Hasil donor tercatat</small>
                    </div>

                </div>


            </div>

        </div>


        {{-- Grafik Donor --}}
        <div class="report-card chart-card">

            <div class="card-heading">

                <div class="heading-icon">
                    <i class="fas fa-chart-bar"></i>
                </div>

                <div>
                    <h2>Grafik Donor</h2>
                    <p>Jumlah kantong darah setiap bulan</p>
                </div>

            </div>


            @php

                $namaBulan = [
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

                $nilaiMaksimum = max($grafik ?: [1]);

            @endphp


            <div class="chart-area">

                <div class="chart-grid">

                    <span></span>
                    <span></span>
                    <span></span>
                    <span></span>
                    <span></span>

                </div>


                <div class="chart-bars">

                    @foreach ($grafik as $index => $jumlah)

                        @php

                            $tinggi = $nilaiMaksimum > 0
                                ? ($jumlah / $nilaiMaksimum) * 100
                                : 0;

                        @endphp


                        <div class="bar-column">

                            <div class="bar-number">
                                {{ $jumlah }}
                            </div>


                            <div class="bar-wrapper">

                                <div
                                    class="bar {{ $jumlah == 0 ? 'bar-empty' : '' }}"
                                    style="height: {{ $jumlah > 0 ? max($tinggi, 8) : 5 }}%;"
                                    title="{{ $namaBulan[$index] }}: {{ $jumlah }} kantong"
                                >

                                    @if ($jumlah > 0)
                                        <span class="bar-shine"></span>
                                    @endif

                                </div>

                            </div>


                            <div class="month">
                                {{ $namaBulan[$index] }}
                            </div>

                        </div>

                    @endforeach

                </div>

            </div>


            <div class="chart-footer">

                <div class="footer-dot"></div>

                <span>
                    Jumlah kantong darah terkumpul per bulan
                </span>

            </div>

        </div>


    </div>

</div>


<style>

    .laporan-page {
        min-height: calc(100vh - 70px);
        padding: 28px;
        background: #fff9f6;
    }


    /* Banner */

    .laporan-banner {
        min-height: 145px;
        padding: 28px 32px;
        margin-bottom: 24px;
        border-radius: 22px;
        background: linear-gradient(
            135deg,
            #ed5573,
            #d93659
        );
        box-shadow: 0 8px 24px rgba(217, 54, 89, .15);
        display: flex;
        align-items: center;
    }

    .banner-content {
        display: flex;
        align-items: center;
        gap: 18px;
    }

    .banner-icon {
        width: 62px;
        height: 62px;
        flex-shrink: 0;
        border-radius: 17px;
        background: rgba(255, 255, 255, .18);
        border: 1px solid rgba(255, 255, 255, .20);
        display: flex;
        align-items: center;
        justify-content: center;
        color: white;
        font-size: 26px;
    }

    .banner-text h1 {
        margin: 0;
        color: white;
        font-size: 28px;
        font-weight: 750;
    }

    .banner-text p {
        margin: 6px 0 0;
        color: rgba(255, 255, 255, .88);
        font-size: 14px;
    }


    /* Filter */

    .filter-card {
        padding: 22px;
        margin-bottom: 25px;
        border-radius: 20px;
        background: white;
        border: 1px solid #f1e4e6;
        box-shadow: 0 5px 18px rgba(70, 40, 50, .05);
    }

    .filter-heading {
        display: flex;
        align-items: center;
        gap: 13px;
        margin-bottom: 20px;
    }

    .filter-icon {
        width: 43px;
        height: 43px;
        flex-shrink: 0;
        border-radius: 13px;
        background: #fff0f3;
        color: #df4565;
        display: flex;
        align-items: center;
        justify-content: center;
        font-size: 15px;
    }

    .filter-heading h2 {
        margin: 0;
        color: #403437;
        font-size: 17px;
        font-weight: 700;
    }

    .filter-heading p {
        margin: 3px 0 0;
        color: #a09296;
        font-size: 12px;
    }

    .filter-row {
        display: grid;
        grid-template-columns: 1fr 1fr 1.25fr auto;
        gap: 14px;
        align-items: end;
    }

    .input-group label {
        display: block;
        margin-bottom: 7px;
        color: #65575b;
        font-size: 12px;
        font-weight: 650;
    }

    .input-box {
        height: 46px;
        position: relative;
        display: flex;
        align-items: center;
        border: 1px solid #eadde0;
        border-radius: 12px;
        background: #fffafa;
        transition: .2s ease;
    }

    .input-box:focus-within {
        border-color: #e25a76;
        background: white;
        box-shadow: 0 0 0 3px rgba(226, 90, 118, .09);
    }

    .input-box > i:first-child {
        margin-left: 13px;
        color: #d95572;
        font-size: 13px;
    }

    .input-box input,
    .input-box select {
        width: 100%;
        height: 100%;
        padding: 0 12px;
        border: none;
        outline: none;
        background: transparent;
        color: #514448;
        font-size: 13px;
    }

    .input-box select {
        padding-right: 35px;
        appearance: none;
    }

    .select-arrow {
        position: absolute;
        right: 13px;
        margin: 0 !important;
        color: #9c8d92 !important;
        font-size: 9px !important;
        pointer-events: none;
    }

    .filter-btn {
        height: 46px;
        padding: 0 20px;
        border: none;
        border-radius: 12px;
        background: #df4565;
        color: white;
        font-size: 13px;
        font-weight: 650;
        cursor: pointer;
        white-space: nowrap;
        box-shadow: 0 5px 12px rgba(223, 69, 101, .16);
        transition: .2s ease;
    }

    .filter-btn:hover {
        background: #d3395b;
        transform: translateY(-1px);
    }

    .filter-btn i {
        margin-right: 6px;
    }


    /* Report */

    .report-content {
        display: grid;
        grid-template-columns: .9fr 1.1fr;
        gap: 20px;
        align-items: stretch;
    }

    .report-card {
        min-width: 0;
        padding: 22px;
        border-radius: 20px;
        background: white;
        border: 1px solid #f0e3e5;
        box-shadow: 0 5px 18px rgba(70, 40, 50, .05);
    }

    .card-heading {
        display: flex;
        align-items: center;
        gap: 12px;
        margin-bottom: 20px;
    }

    .heading-icon {
        width: 43px;
        height: 43px;
        flex-shrink: 0;
        border-radius: 13px;
        background: #fff0f3;
        color: #df4565;
        display: flex;
        align-items: center;
        justify-content: center;
        font-size: 16px;
    }

    .card-heading h2 {
        margin: 0;
        color: #403437;
        font-size: 17px;
        font-weight: 700;
    }

    .card-heading p {
        margin: 3px 0 0;
        color: #a09296;
        font-size: 11px;
    }


    /* Statistik */

    .stats-grid {
        display: grid;
        grid-template-columns: 1fr 1fr;
        gap: 12px;
    }

    .stat-item {
        min-height: 105px;
        padding: 15px;
        border: 1px solid #f3e7e9;
        border-radius: 15px;
        background: #fffafa;
        display: flex;
        align-items: center;
        gap: 11px;
    }

    .stat-icon {
        width: 43px;
        height: 43px;
        flex-shrink: 0;
        border-radius: 12px;
        display: flex;
        align-items: center;
        justify-content: center;
        font-size: 16px;
    }

    .stat-icon.pink {
        background: #fff0f3;
        color: #db4c6c;
    }

    .stat-icon.purple {
        background: #f3efff;
        color: #8667d3;
    }

    .stat-icon.red {
        background: #fff0f0;
        color: #dd4b59;
    }

    .stat-icon.orange {
        background: #fff4e8;
        color: #df893d;
    }

    .stat-content {
        min-width: 0;
    }

    .stat-content span {
        display: block;
        margin-bottom: 4px;
        color: #96878b;
        font-size: 10px;
    }

    .stat-content strong {
        display: block;
        color: #3e3235;
        font-size: 23px;
        line-height: 1.1;
        font-weight: 750;
    }

    .stat-content small {
        display: block;
        margin-top: 4px;
        color: #b0a1a5;
        font-size: 9px;
    }


    /* Grafik */

    .chart-card {
        overflow: hidden;
    }

    .chart-area {
        height: 265px;
        position: relative;
        padding: 15px 15px 0;
        overflow: hidden;
        border: 1px solid #f5e9eb;
        border-radius: 15px;
        background: #fffafa;
    }

    .chart-grid {
        position: absolute;
        top: 35px;
        right: 15px;
        bottom: 48px;
        left: 15px;
        display: flex;
        flex-direction: column;
        justify-content: space-between;
    }

    .chart-grid span {
        width: 100%;
        height: 1px;
        background: #f1e4e6;
    }

    .chart-bars {
        position: relative;
        z-index: 2;
        height: 230px;
        display: flex;
        align-items: flex-end;
        justify-content: space-between;
        gap: 4px;
    }

    .bar-column {
        height: 100%;
        flex: 1;
        max-width: 46px;
        min-width: 18px;
        display: flex;
        flex-direction: column;
        align-items: center;
        justify-content: flex-end;
    }

    .bar-number {
        height: 18px;
        color: #d94b69;
        font-size: 9px;
        font-weight: 700;
    }

    .bar-wrapper {
        width: 100%;
        height: 180px;
        display: flex;
        align-items: flex-end;
        justify-content: center;
    }

    .bar {
        width: 22px;
        min-height: 7px;
        border-radius: 8px 8px 4px 4px;
        background: linear-gradient(
            180deg,
            #ed6d89,
            #d94363
        );
        box-shadow: 0 4px 9px rgba(217, 67, 99, .14);
        position: relative;
        cursor: pointer;
        transition: .2s ease;
    }

    .bar:hover {
        transform: translateY(-3px);
        box-shadow: 0 7px 13px rgba(217, 67, 99, .20);
    }

    .bar-shine {
        position: absolute;
        top: 5px;
        left: 4px;
        width: 4px;
        height: 25%;
        border-radius: 4px;
        background: rgba(255,255,255,.35);
    }

    .bar-empty {
        background: #f1e5e7;
        box-shadow: none;
    }

    .month {
        margin-top: 7px;
        color: #8f8084;
        font-size: 9px;
        font-weight: 600;
    }

    .chart-footer {
        display: flex;
        align-items: center;
        gap: 7px;
        margin-top: 12px;
        color: #a09296;
        font-size: 10px;
    }

    .footer-dot {
        width: 7px;
        height: 7px;
        border-radius: 50%;
        background: #df4565;
    }


    /* Tablet */

    @media (max-width: 1100px) {

        .filter-row {
            grid-template-columns: 1fr 1fr;
        }

        .filter-btn {
            width: 100%;
        }

        .report-content {
            grid-template-columns: 1fr;
        }

    }


    /* HP */

    @media (max-width: 767px) {

        .laporan-page {
            padding: 16px;
        }

        .laporan-banner {
            min-height: 120px;
            padding: 21px;
            margin-bottom: 18px;
            border-radius: 18px;
        }

        .banner-content {
            gap: 13px;
        }

        .banner-icon {
            width: 50px;
            height: 50px;
            border-radius: 14px;
            font-size: 21px;
        }

        .banner-text h1 {
            font-size: 21px;
        }

        .banner-text p {
            font-size: 11px;
            line-height: 1.5;
        }

        .filter-card {
            padding: 17px;
            border-radius: 17px;
        }

        .filter-row {
            grid-template-columns: 1fr;
            gap: 13px;
        }

        .filter-btn {
            width: 100%;
        }

        .report-content {
            gap: 16px;
        }

        .report-card {
            padding: 17px;
            border-radius: 17px;
        }

        .stats-grid {
            gap: 10px;
        }

        .stat-item {
            min-height: 88px;
            padding: 12px;
            gap: 9px;
        }

        .stat-icon {
            width: 38px;
            height: 38px;
            border-radius: 11px;
            font-size: 14px;
        }

        .stat-content span {
            font-size: 9px;
        }

        .stat-content strong {
            font-size: 19px;
        }

        .stat-content small {
            font-size: 8px;
        }

        .chart-area {
            height: 245px;
            padding-left: 7px;
            padding-right: 7px;
        }

        .chart-grid {
            left: 8px;
            right: 8px;
            bottom: 45px;
        }

        .chart-bars {
            height: 215px;
        }

        .bar-wrapper {
            height: 165px;
        }

        .bar {
            width: 16px;
            border-radius: 7px 7px 4px 4px;
        }

        .bar-number {
            font-size: 8px;
        }

        .month {
            font-size: 8px;
        }

    }


    /* HP kecil */

    @media (max-width: 400px) {

        .laporan-page {
            padding: 12px;
        }

        .stats-grid {
            grid-template-columns: 1fr 1fr;
        }

        .stat-item {
            min-height: 82px;
            padding: 10px;
        }

        .stat-icon {
            width: 34px;
            height: 34px;
            font-size: 13px;
        }

        .stat-content strong {
            font-size: 17px;
        }

        .stat-content small {
            display: none;
        }

        .chart-area {
            padding-left: 3px;
            padding-right: 3px;
        }

        .chart-bars {
            gap: 1px;
        }

        .bar {
            width: 13px;
        }

    }

</style>

@endsection