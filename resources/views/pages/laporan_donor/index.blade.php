@extends('layouts.app')

@section('content')

<div class="container-fluid laporan-page">

    <!-- Header -->
    <div class="laporan-header">
        <div>
            <div class="laporan-small-title">DONORCONNECT</div>

            <h1>Laporan Donor</h1>

            <p>
                Lihat ringkasan dan grafik data donor.
            </p>
        </div>

        <div class="laporan-header-icon">
            <i class="fas fa-file-medical"></i>
        </div>
    </div>

    <!-- Filter -->
    <div class="filter-card">

        <form
            action="{{ route('laporan-donor.filter') }}"
            method="GET"
        >

            <div class="filter-row">

                <div class="filter-group">
                    <label for="dari_tanggal">
                        Dari Tanggal
                    </label>

                    <div class="input-icon">
                        <input
                            type="date"
                            id="dari_tanggal"
                            name="dari_tanggal"
                            value="{{ request('dari_tanggal') }}"
                        >

                        <i class="fas fa-calendar-alt"></i>
                    </div>
                </div>

                <div class="filter-group">
                    <label for="sampai_tanggal">
                        Sampai Tanggal
                    </label>

                    <div class="input-icon">
                        <input
                            type="date"
                            id="sampai_tanggal"
                            name="sampai_tanggal"
                            value="{{ request('sampai_tanggal') }}"
                        >

                        <i class="fas fa-calendar-alt"></i>
                    </div>
                </div>

                <div class="filter-group">
                    <label for="id_kegiatan">
                        Kegiatan
                    </label>

                    <select
                        id="id_kegiatan"
                        name="id_kegiatan"
                    >

                        <option value="">
                            Semua
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
                </div>

                <div class="filter-button">

                    <button type="submit">                       
                        Tampilkan
                    </button>

                </div>

            </div>

        </form>

    </div>

    <!-- Content -->
    <div class="laporan-grid">

        <!-- Ringkasan -->
        <div class="summary-card">

            <div class="section-title">
                <div class="section-icon">
                    <i class="fas fa-chart-pie"></i>
                </div>

                <div>
                    <h3>Ringkasan</h3>
                    <p>Data berdasarkan filter</p>
                </div>
            </div>

            <div class="summary-list">

                <div class="summary-item">
                    <span>Total Pendonor</span>
                    <strong>{{ $totalPendonor }}</strong>
                </div>

                <div class="summary-item">
                    <span>Total Kegiatan</span>
                    <strong>{{ $totalKegiatan }}</strong>
                </div>

                <div class="summary-item">
                    <span>Total Kantong Darah</span>
                    <strong>{{ $totalKantong }}</strong>
                </div>

                <div class="summary-item">
                    <span>Pendonor Aktif</span>
                    <strong>{{ $pendonorAktif }}</strong>
                </div>

            </div>

        </div>

        <!-- Grafik -->
        <div class="chart-card">

            <div class="section-title">

                <div class="section-icon">
                    <i class="fas fa-chart-bar"></i>
                </div>

                <div>
                    <h3>Grafik Donor per Bulan</h3>
                    <p>Jumlah kantong darah</p>
                </div>

            </div>

            @php
                $nilaiMaksimal = max($grafik);

                if ($nilaiMaksimal == 0) {
                    $nilaiMaksimal = 1;
                }
            @endphp

            <div class="chart">

                @foreach ($grafik as $index => $jumlah)

                    @php
                        $tinggi = ($jumlah / $nilaiMaksimal) * 100;
                    @endphp

                    <div class="chart-column">

                        <div class="chart-value">
                            {{ $jumlah }}
                        </div>

                        <div class="bar-area">

                            <div
                                class="bar"
                                style="height: {{ max($tinggi, 3) }}%;"
                            ></div>

                        </div>

                        <div class="chart-label">
                            {{ [
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
                            ][$index] }}
                        </div>

                    </div>

                @endforeach

            </div>

        </div>

    </div>

</div>

<style>

.laporan-page {
    padding: 25px 28px;
    background: #fffaf7;
    min-height: calc(100vh - 72px);
}

.laporan-header {
    display: flex;
    align-items: center;
    justify-content: space-between;
    background: linear-gradient(135deg, #fff5f3, #fffdfb);
    border: 1px solid #f1dddd;
    border-radius: 16px;
    padding: 22px 25px;
    margin-bottom: 20px;
    box-shadow: 0 5px 18px rgba(185, 91, 91, 0.06);
}

.laporan-small-title {
    color: #c9183b;
    font-size: 10px;
    font-weight: 800;
    letter-spacing: 1.5px;
    margin-bottom: 4px;
}

.laporan-header h1 {
    margin: 0;
    color: #3f3437;
    font-size: 23px;
    font-weight: 800;
}

.laporan-header p {
    margin: 6px 0 0;
    color: #9b898c;
    font-size: 11px;
}

.laporan-header-icon {
    width: 52px;
    height: 52px;
    display: flex;
    align-items: center;
    justify-content: center;
    border-radius: 14px;
    background: linear-gradient(135deg, #c90000, #d94b91);
    color: #fff;
    font-size: 21px;
    box-shadow: 0 7px 16px rgba(201, 0, 0, 0.18);
}

.filter-card {
    background: #fff;
    border: 1px solid #f0dddd;
    border-radius: 16px;
    padding: 20px 22px;
    margin-bottom: 20px;
    box-shadow: 0 5px 20px rgba(185, 91, 91, 0.06);
}

.filter-row {
    display: grid;
    grid-template-columns: 1fr 1fr 1.3fr auto;
    gap: 15px;
    align-items: end;
}

.filter-group label {
    display: block;
    margin-bottom: 7px;
    color: #625255;
    font-size: 10px;
    font-weight: 800;
}

.input-icon {
    position: relative;
}

.input-icon input,
.filter-group select {
    width: 100%;
    height: 40px;
    padding: 0 12px;
    border: 1px solid #eadbda;
    border-radius: 9px;
    background: #fffafa;
    color: #5b4d50;
    font-size: 10px;
    outline: none;
}

.input-icon input {
    padding-right: 35px;
}

.input-icon i {
    position: absolute;
    right: 12px;
    top: 13px;
    color: #c9183b;
    font-size: 11px;
    pointer-events: none;
}

.filter-group input:focus,
.filter-group select:focus {
    border-color: #d94b91;
    box-shadow: 0 0 0 3px rgba(217, 75, 145, 0.08);
}

.filter-button button {
    height: 40px;
    padding: 0 18px;
    border: none;
    border-radius: 9px;
    background: linear-gradient(135deg, #c90000, #d92b63);
    color: #fff;
    font-size: 10px;
    font-weight: 800;
    cursor: pointer;
    white-space: nowrap;
}

.filter-button button:hover {
    background: linear-gradient(135deg, #a80000, #c62055);
}

.laporan-grid {
    display: grid;
    grid-template-columns: 0.9fr 1.5fr;
    gap: 20px;
}

.summary-card,
.chart-card {
    background: #fff;
    border: 1px solid #f0dddd;
    border-radius: 16px;
    padding: 22px;
    box-shadow: 0 5px 20px rgba(185, 91, 91, 0.06);
}

.section-title {
    display: flex;
    align-items: center;
    gap: 12px;
    margin-bottom: 18px;
}

.section-icon {
    width: 40px;
    height: 40px;
    display: flex;
    align-items: center;
    justify-content: center;
    border-radius: 10px;
    background: linear-gradient(135deg, #fde3e5, #f8d8e8);
    color: #c9183b;
    font-size: 15px;
}

.section-title h3 {
    margin: 0;
    color: #493d40;
    font-size: 15px;
    font-weight: 800;
}

.section-title p {
    margin: 3px 0 0;
    color: #a18e91;
    font-size: 10px;
}

.summary-list {
    border: 1px solid #f1e4e2;
    border-radius: 12px;
    overflow: hidden;
}

.summary-item {
    display: flex;
    align-items: center;
    justify-content: space-between;
    padding: 16px 15px;
    border-bottom: 1px solid #f4e9e7;
}

.summary-item:last-child {
    border-bottom: none;
}

.summary-item span {
    color: #66575a;
    font-size: 10px;
    font-weight: 600;
}

.summary-item strong {
    color: #c9183b;
    font-size: 14px;
    font-weight: 800;
}

.chart {
    height: 255px;
    display: flex;
    align-items: flex-end;
    gap: 10px;
    padding: 15px 8px 0;
    border-bottom: 1px solid #eadfdd;
}

.chart-column {
    flex: 1;
    height: 100%;
    display: flex;
    flex-direction: column;
    justify-content: flex-end;
    align-items: center;
    min-width: 20px;
}

.chart-value {
    height: 18px;
    color: #8e777b;
    font-size: 8px;
    font-weight: 700;
}

.bar-area {
    width: 100%;
    height: 190px;
    display: flex;
    align-items: flex-end;
    justify-content: center;
}

.bar {
    width: 65%;
    max-width: 32px;
    min-height: 4px;
    border-radius: 5px 5px 0 0;
    background: linear-gradient(
        to top,
        #c90000,
        #d92b63,
        #d94b91
    );
}

.chart-label {
    height: 28px;
    padding-top: 9px;
    color: #756568;
    font-size: 8px;
    font-weight: 700;
}

@media (max-width: 1000px) {

    .filter-row {
        grid-template-columns: 1fr 1fr;
    }

    .filter-button {
        grid-column: 1 / -1;
    }

    .laporan-grid {
        grid-template-columns: 1fr;
    }

}

@media (max-width: 768px) {

    .laporan-page {
        padding: 15px;
    }

    .laporan-header {
        padding: 18px;
    }

    .laporan-header h1 {
        font-size: 19px;
    }

    .filter-card,
    .summary-card,
    .chart-card {
        padding: 15px;
    }

    .filter-row {
        grid-template-columns: 1fr;
    }

    .filter-button {
        grid-column: auto;
    }

    .filter-button button {
        width: 100%;
    }

    .chart {
        gap: 5px;
        overflow-x: auto;
    }

}

</style>

@endsection