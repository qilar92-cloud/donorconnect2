@extends('layouts.app')

@section('title', 'Laporan Donor')

@push('styles')
    @vite('resources/css/laporan-donor/index.css')
@endpush

@section('content')

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

                    <h5>
                        Filter Laporan
                    </h5>

                    <p>
                        Pilih periode atau kegiatan donor.
                    </p>

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

                            @foreach (($kegiatan ?? []) as $item)

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

                        <h5>
                            Donor Terbaru
                        </h5>

                        <p>
                            Hasil donor yang baru tercatat.
                        </p>

                    </div>

                </div>


                <div class="data-list">

                    @forelse (($laporan ?? []) as $item)

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

                            <h5>
                                Perkembangan Donor
                            </h5>

                            <p>
                                Jumlah kantong darah setiap bulan.
                            </p>

                        </div>

                    </div>


                    <div class="total-box">

                        <small>
                            Total
                        </small>

                        <strong>
                            {{ $totalKantong ?? 0 }}
                        </strong>

                        <small>
                            kantong
                        </small>

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

                        @foreach ($bulan as $index => $namaBulan)

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