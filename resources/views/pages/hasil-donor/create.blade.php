@extends('layouts.app')

@section('title', 'Catat Hasil Donor')

@section('content')

<div class="hasil-page">

    {{-- Banner --}}
    <div class="page-banner">

        <div class="banner-content">

            <div class="banner-icon">
                <svg viewBox="0 0 24 24" aria-hidden="true">
                    <path d="M12 3s6 6.2 6 11a6 6 0 0 1-12 0c0-4.8 6-11 6-11Z"/>
                    <path d="M9.5 15.5c.4 1.1 1.3 1.8 2.5 2"/>
                </svg>
            </div>

            <div class="banner-text">

                <span class="banner-label">
                    DONORCONNECT • PETUGAS PMR
                </span>

                <h1>
                    Catat Hasil Donor
                </h1>

                <p>
                    Catat dan simpan hasil donor pendonor setelah kegiatan selesai.
                </p>

            </div>

        </div>


        {{-- Hati --}}
        <div class="banner-heart">

            <svg viewBox="0 0 24 24" aria-hidden="true">
                <path d="M20.8 8.6c0 5.5-8.8 10.2-8.8 10.2S3.2 14.1 3.2 8.6A4.6 4.6 0 0 1 12 6.3a4.6 4.6 0 0 1 8.8 2.3Z"/>
            </svg>

        </div>


        {{-- Info --}}
        <div class="banner-info">

            <div class="banner-info-icon">
                <i class="fas fa-clipboard-check"></i>
            </div>

            <div>
                <strong>Hasil Donor</strong>
                <span>Lengkapi data dengan benar</span>
            </div>

        </div>

    </div>


    {{-- Konten --}}
    <div class="hasil-layout">

        {{-- Form --}}
        <div class="form-column">

            <div class="result-card">

                {{-- Heading --}}
                <div class="card-heading">

                    <div class="heading-icon">
                        <i class="fas fa-notes-medical"></i>
                    </div>

                    <div>
                        <h4>Data Hasil Donor</h4>

                        <span>
                            Lengkapi informasi hasil donor pendonor.
                        </span>
                    </div>

                </div>


                {{-- Error --}}
                @if ($errors->any())

                    <div class="error-box">

                        <i class="fas fa-exclamation-circle"></i>

                        <div>

                            @foreach ($errors->all() as $error)
                                <div>{{ $error }}</div>
                            @endforeach

                        </div>

                    </div>

                @endif


                {{-- Success --}}
                @if (session('success'))

                    <div class="success-box">

                        <i class="fas fa-check-circle"></i>

                        <span>
                            {{ session('success') }}
                        </span>

                    </div>

                @endif


                {{-- Form --}}
                <form
                    action="{{ route('hasil-donor.store') }}"
                    method="POST"
                >

                    @csrf


                    {{-- Pendonor --}}
                    <div class="form-group">

                        <label>
                            <i class="fas fa-user"></i>
                            Pendonor
                        </label>

                        <div class="select-wrapper">

                            <select
                                name="id_pendonor"
                                class="donor-input"
                                required
                            >

                                <option value="">
                                    Pilih Pendonor
                                </option>

                                @foreach ($pendonor as $item)

                                    <option
                                        value="{{ $item->id_pendonor }}"
                                        {{ old('id_pendonor') == $item->id_pendonor ? 'selected' : '' }}
                                    >
                                        {{ $item->user->nama ?? 'Pendonor' }}
                                    </option>

                                @endforeach

                            </select>

                            <i class="fas fa-chevron-down"></i>

                        </div>

                    </div>


                    {{-- Kegiatan --}}
                    <div class="form-group">

                        <label>
                            <i class="fas fa-calendar-alt"></i>
                            Kegiatan
                        </label>

                        <div class="select-wrapper">

                            <select
                                name="id_kegiatan"
                                class="donor-input"
                                required
                            >

                                <option value="">
                                    Pilih Kegiatan
                                </option>

                                @foreach ($kegiatan as $item)

                                    <option
                                        value="{{ $item->id_kegiatan }}"
                                        {{ old('id_kegiatan') == $item->id_kegiatan ? 'selected' : '' }}
                                    >
                                        {{ $item->nama_kegiatan }}
                                    </option>

                                @endforeach

                            </select>

                            <i class="fas fa-chevron-down"></i>

                        </div>

                    </div>


                    {{-- Tanggal dan jumlah --}}
                    <div class="two-column">

                        {{-- Tanggal --}}
                        <div class="form-group">

                            <label>
                                <i class="fas fa-calendar-day"></i>
                                Tanggal Donor
                            </label>

                            <div class="input-icon">

                                <input
                                    type="date"
                                    name="tanggal_donor"
                                    value="{{ old('tanggal_donor') }}"
                                    class="donor-input"
                                    required
                                >

                                <i class="fas fa-calendar-alt"></i>

                            </div>

                        </div>


                        {{-- Jumlah --}}
                        <div class="form-group">

                            <label>
                                <i class="fas fa-tint"></i>
                                Jumlah Kantong (ml)
                            </label>

                            <div class="input-icon">

                                <input
                                    type="number"
                                    name="jumlah_kantong"
                                    value="{{ old('jumlah_kantong', 450) }}"
                                    class="donor-input"
                                    min="1"
                                    required
                                >

                                <span class="ml-label">
                                    ml
                                </span>

                            </div>

                        </div>

                    </div>


                    {{-- Keterangan --}}
                    <div class="form-group">

                        <label>
                            <i class="fas fa-clipboard-check"></i>
                            Keterangan
                        </label>

                        <textarea
                            name="keterangan"
                            class="donor-input textarea-input"
                            rows="3"
                            placeholder="Contoh: Sehat"
                        >{{ old('keterangan') }}</textarea>

                    </div>


                    {{-- Tombol --}}
                    <div class="form-actions">

                        <button
                            type="submit"
                            class="btn-save"
                        >
                            <i class="fas fa-save"></i>
                            SIMPAN HASIL
                        </button>

                        <a
                            href="{{ route('dashboard.petugas') }}"
                            class="btn-cancel"
                        >
                            BATAL
                        </a>

                    </div>

                </form>

            </div>

        </div>


        {{-- Ilustrasi --}}
        <div class="illustration-column">

            <div class="illustration-card">

                {{-- Dekorasi --}}
                <div class="decor-heart heart-one">
                    ♥
                </div>

                <div class="decor-heart heart-two">
                    ♥
                </div>

                <div class="decor-drop drop-one">
                    <i class="fas fa-tint"></i>
                </div>


                {{-- Lingkaran utama --}}
                <div class="illustration-circle">

                    {{-- Clipboard --}}
                    <div class="clipboard">

                        <div class="clipboard-clip"></div>

                        <div class="clipboard-top">

                            <div class="clipboard-icon">
                                <i class="fas fa-heartbeat"></i>
                            </div>

                            <div>
                                <strong>DONORCONNECT</strong>
                                <span>HASIL DONOR</span>
                            </div>

                        </div>


                        {{-- Checklist 1 --}}
                        <div class="clipboard-check">

                            <div class="check-circle">
                                <i class="fas fa-check"></i>
                            </div>

                            <div class="check-lines">
                                <span></span>
                                <span></span>
                            </div>

                        </div>


                        {{-- Checklist 2 --}}
                        <div class="clipboard-check">

                            <div class="check-circle">
                                <i class="fas fa-check"></i>
                            </div>

                            <div class="check-lines">
                                <span></span>
                                <span></span>
                            </div>

                        </div>


                        {{-- Checklist 3 --}}
                        <div class="clipboard-check">

                            <div class="check-circle">
                                <i class="fas fa-check"></i>
                            </div>

                            <div class="check-lines">
                                <span></span>
                                <span></span>
                            </div>

                        </div>

                    </div>

                </div>


                {{-- Teks --}}
                <div class="illustration-title">

                    <span>
                        CATAT DENGAN TELITI
                    </span>

                    <strong>
                        Setiap Data Itu Berarti
                    </strong>

                    <p>
                        Pastikan hasil donor sudah sesuai
                        sebelum disimpan ke sistem.
                    </p>

                </div>


                {{-- Status --}}
                <div class="illustration-status">

                    <div class="status-icon">
                        <i class="fas fa-check"></i>
                    </div>

                    <div>

                        <strong>
                            Data siap dicatat
                        </strong>

                        <span>
                            Lengkapi form di samping
                        </span>

                    </div>

                </div>

            </div>

        </div>

    </div>

</div>


@push('styles')

<style>

/* Halaman */

body {
    background: #fff9f6;
}

.hasil-page {
    width: 100%;
    max-width: 1250px;
    margin: 0 auto;
    padding: 24px;
}


/* Banner */

.page-banner {
    position: relative;

    min-height: 185px;

    padding: 27px 30px;

    margin-bottom: 20px;

    overflow: hidden;

    border-radius: 22px;

    background: linear-gradient(
        135deg,
        #ed5573,
        #d93659
    );

    color: white;

    box-shadow:
        0 10px 24px rgba(217,54,89,.14);
}

.page-banner::before {
    content: "";

    position: absolute;

    width: 280px;
    height: 280px;

    right: -100px;
    bottom: -180px;

    border-radius: 50%;

    background: rgba(255,255,255,.07);
}

.page-banner::after {
    content: "";

    position: absolute;

    width: 210px;
    height: 210px;

    right: 70px;
    bottom: -155px;

    border-radius: 50%;

    border: 34px solid rgba(255,255,255,.05);
}


/* Banner Content */

.banner-content {
    position: relative;

    z-index: 2;

    display: flex;

    align-items: center;

    gap: 15px;
}

.banner-icon {
    width: 60px;
    height: 60px;

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

    margin-bottom: 4px;

    font-size: 10px;

    font-weight: 800;

    letter-spacing: 1px;

    opacity: .9;
}

.banner-text h1 {
    margin: 0;

    font-size: 29px;

    line-height: 1.2;

    font-weight: 800;
}

.banner-text p {
    max-width: 430px;

    margin: 6px 0 0;

    font-size: 12px;

    line-height: 1.5;

    opacity: .9;
}


/* Banner Heart */

.banner-heart {
    position: absolute;

    z-index: 3;

    top: 38px;
    right: 42px;

    width: 65px;
    height: 65px;

    display: flex;

    align-items: center;
    justify-content: center;

    border-radius: 50%;

    background: rgba(255,255,255,.96);

    box-shadow:
        0 7px 18px rgba(100,20,40,.10);
}

.banner-heart svg {
    width: 32px;
    height: 32px;

    fill: #d93659;

    stroke: #d93659;
}


/* Banner Info */

.banner-info {
    position: absolute;

    z-index: 4;

    left: 30px;
    bottom: 16px;

    display: flex;

    align-items: center;

    gap: 9px;

    padding: 7px 11px;

    border: 1px solid rgba(255,255,255,.12);

    border-radius: 11px;

    background: rgba(255,255,255,.13);
}

.banner-info-icon {
    width: 31px;
    height: 31px;

    display: flex;

    align-items: center;
    justify-content: center;

    border-radius: 9px;

    background: rgba(255,255,255,.14);
}

.banner-info-icon i {
    font-size: 14px;
}

.banner-info strong {
    display: block;

    font-size: 11px;
}

.banner-info span {
    display: block;

    margin-top: 2px;

    font-size: 8px;

    opacity: .85;
}


/* Layout */

.hasil-layout {
    display: grid;

    grid-template-columns:
        minmax(0, 1.65fr)
        minmax(300px, .85fr);

    gap: 20px;

    align-items: stretch;
}

.form-column,
.illustration-column {
    min-width: 0;
}


/* Form Card */

.result-card {
    height: 100%;

    padding: 24px;

    background: white;

    border: 1px solid #f0e1e5;

    border-radius: 20px;

    box-shadow:
        0 7px 22px rgba(101,42,55,.055);
}


/* Heading */

.card-heading {
    display: flex;

    align-items: center;

    gap: 12px;

    margin-bottom: 21px;
}

.heading-icon {
    width: 44px;
    height: 44px;

    flex-shrink: 0;

    display: flex;

    align-items: center;
    justify-content: center;

    border-radius: 13px;

    background: #fff0f3;

    color: #c91845;
}

.heading-icon i {
    font-size: 17px;
}

.card-heading h4 {
    margin: 0;

    color: #39334b;

    font-size: 17px;

    font-weight: 900;
}

.card-heading span {
    display: block;

    margin-top: 3px;

    color: #a18e94;

    font-size: 10px;
}


/* Form */

.form-group {
    margin-bottom: 15px;
}

.form-group label {
    display: block;

    margin-bottom: 7px;

    color: #51434a;

    font-size: 10.5px;

    font-weight: 800;
}

.form-group label i {
    width: 15px;

    margin-right: 4px;

    color: #c91845;

    text-align: center;
}


/* Input */

.donor-input {
    width: 100%;

    height: 45px;

    padding: 9px 13px;

    border: 1px solid #eadde0;

    border-radius: 11px;

    outline: none;

    background: #fffafa;

    color: #51434a;

    font-size: 11.5px;

    box-shadow: none !important;

    transition: .2s ease;
}

.donor-input::placeholder {
    color: #ad9ba1;
}

.donor-input:focus {
    border-color: #d94b91;

    background: white;

    box-shadow:
        0 0 0 3px rgba(217,75,145,.08) !important;
}


/* Select */

.select-wrapper {
    position: relative;
}

.select-wrapper select {
    appearance: none;

    -webkit-appearance: none;

    padding-right: 38px;
}

.select-wrapper > i {
    position: absolute;

    right: 14px;
    top: 50%;

    transform: translateY(-50%);

    color: #b58b96;

    font-size: 10px;

    pointer-events: none;
}


/* Dua Kolom */

.two-column {
    display: grid;

    grid-template-columns:
        1fr 1fr;

    gap: 14px;
}


/* Input Icon */

.input-icon {
    position: relative;
}

.input-icon .donor-input {
    padding-right: 38px;
}

.input-icon > i {
    position: absolute;

    right: 13px;
    top: 50%;

    transform: translateY(-50%);

    color: #d94b91;

    font-size: 11px;

    pointer-events: none;
}

.ml-label {
    position: absolute;

    right: 13px;
    top: 50%;

    transform: translateY(-50%);

    color: #a98790;

    font-size: 9px;

    font-weight: 800;

    pointer-events: none;
}


/* Textarea */

.textarea-input {
    height: 82px;

    resize: vertical;

    line-height: 1.5;
}


/* Alert */

.error-box,
.success-box {
    display: flex;

    align-items: flex-start;

    gap: 9px;

    padding: 11px 13px;

    margin-bottom: 16px;

    border-radius: 10px;

    font-size: 10.5px;

    line-height: 1.5;
}

.error-box {
    background: #fff0f2;

    color: #a80e2c;
}

.success-box {
    background: #eefaf3;

    color: #28804d;
}


/* Button */

.form-actions {
    display: grid;

    grid-template-columns:
        minmax(0, 1fr)
        110px;

    gap: 10px;

    margin-top: 20px;
}

.btn-save,
.btn-cancel {
    min-height: 43px;

    display: flex;

    align-items: center;
    justify-content: center;

    border-radius: 11px;

    font-size: 10.5px;

    font-weight: 900;

    text-decoration: none !important;

    transition: .2s ease;
}

.btn-save {
    border: none;

    background: linear-gradient(
        135deg,
        #c90000,
        #d71945
    );

    color: white !important;

    box-shadow:
        0 6px 15px rgba(201,0,0,.17);

    cursor: pointer;
}

.btn-save:hover {
    transform: translateY(-1px);

    color: white !important;
}

.btn-save i {
    margin-right: 7px;
}

.btn-cancel {
    border: 1px solid #dfd0d4;

    background: white;

    color: #806b72 !important;
}

.btn-cancel:hover {
    border-color: #d94b91;

    background: #fff5f7;

    color: #c91845 !important;
}


/* Ilustrasi */

.illustration-card {
    position: relative;

    height: 100%;

    min-height: 500px;

    overflow: hidden;

    display: flex;

    flex-direction: column;

    align-items: center;

    justify-content: center;

    padding: 28px 20px;

    text-align: center;

    border: 1px solid #f0dce2;

    border-radius: 20px;

    background:
        radial-gradient(
            circle at 50% 40%,
            rgba(237,85,115,.13),
            transparent 42%
        ),
        linear-gradient(
            145deg,
            #fff1f5,
            #fffafa
        );

    box-shadow:
        0 7px 22px rgba(101,42,55,.055);
}


/* Lingkaran */

.illustration-circle {
    position: relative;

    width: 245px;
    height: 245px;

    display: flex;

    align-items: center;
    justify-content: center;

    margin: 5px auto 20px;

    border-radius: 50%;

    background:
        radial-gradient(
            circle,
            #ffffff 0%,
            #fff5f7 58%,
            #ffe7ed 100%
        );

    box-shadow:
        0 15px 35px rgba(217,54,89,.12);
}

.illustration-circle::before {
    content: "";

    position: absolute;

    width: 275px;
    height: 275px;

    border: 1px dashed rgba(217,54,89,.16);

    border-radius: 50%;
}


/* Clipboard */

.clipboard {
    position: relative;

    z-index: 2;

    width: 142px;
    height: 172px;

    padding: 25px 13px 13px;

    border-radius: 12px;

    background: white;

    border: 1px solid #eadde1;

    box-shadow:
        0 14px 25px rgba(119,38,59,.15);
}


/* Clip */

.clipboard-clip {
    position: absolute;

    width: 55px;
    height: 19px;

    top: -10px;
    left: 50%;

    transform: translateX(-50%);

    border: 3px solid #d93659;

    border-radius: 10px;

    background: white;
}

.clipboard-clip::after {
    content: "";

    position: absolute;

    width: 25px;
    height: 5px;

    left: 50%;
    top: 4px;

    transform: translateX(-50%);

    border-radius: 5px;

    background: #ffdce5;
}


/* Clipboard Header */

.clipboard-top {
    display: flex;

    align-items: center;

    gap: 8px;

    padding-bottom: 10px;

    border-bottom: 1px solid #f2e5e8;
}

.clipboard-icon {
    width: 29px;
    height: 29px;

    flex-shrink: 0;

    display: flex;

    align-items: center;
    justify-content: center;

    border-radius: 8px;

    background: #ffe8ee;

    color: #d93659;
}

.clipboard-icon i {
    font-size: 12px;
}

.clipboard-top strong {
    display: block;

    color: #493d43;

    font-size: 7px;

    font-weight: 900;

    text-align: left;
}

.clipboard-top span {
    display: block;

    margin-top: 2px;

    color: #b0929b;

    font-size: 5.5px;

    letter-spacing: .5px;

    text-align: left;
}


/* Checklist */

.clipboard-check {
    display: flex;

    align-items: center;

    gap: 8px;

    margin-top: 12px;
}

.check-circle {
    width: 21px;
    height: 21px;

    flex-shrink: 0;

    display: flex;

    align-items: center;
    justify-content: center;

    border-radius: 50%;

    background: #ffe4eb;

    color: #d93659;
}

.check-circle i {
    font-size: 7px;
}

.check-lines {
    flex: 1;
}

.check-lines span {
    display: block;

    height: 5px;

    margin: 4px 0;

    border-radius: 5px;

    background: #f5e8eb;
}

.check-lines span:first-child {
    width: 90%;
}

.check-lines span:last-child {
    width: 58%;
}


/* Dekorasi */

.decor-heart,
.decor-drop {
    position: absolute;

    z-index: 4;

    display: flex;

    align-items: center;
    justify-content: center;

    border-radius: 50%;

    color: #d94b91;
}

.decor-heart {
    width: 36px;
    height: 36px;

    background: rgba(255,255,255,.8);

    box-shadow:
        0 6px 15px rgba(217,75,145,.09);

    font-size: 15px;
}

.heart-one {
    top: 78px;
    left: 42px;
}

.heart-two {
    right: 42px;
    bottom: 100px;

    font-size: 12px;
}

.decor-drop {
    width: 32px;
    height: 32px;

    right: 48px;
    top: 145px;

    background: #ffe4eb;

    font-size: 11px;
}


/* Teks Ilustrasi */

.illustration-title {
    position: relative;

    z-index: 3;

    margin-top: 2px;
}

.illustration-title span {
    display: block;

    color: #b18b95;

    font-size: 8px;

    font-weight: 800;

    letter-spacing: 1.4px;
}

.illustration-title strong {
    display: block;

    margin-top: 4px;

    color: #a9153d;

    font-size: 15px;

    font-weight: 900;
}

.illustration-title p {
    max-width: 235px;

    margin: 6px auto 0;

    color: #9b898f;

    font-size: 9px;

    line-height: 1.55;
}


/* Status */

.illustration-status {
    position: relative;

    z-index: 3;

    display: flex;

    align-items: center;

    gap: 9px;

    width: 225px;

    margin-top: 16px;

    padding: 10px 12px;

    text-align: left;

    border: 1px solid #f1dce2;

    border-radius: 12px;

    background: rgba(255,255,255,.9);

    box-shadow:
        0 5px 15px rgba(101,42,55,.04);
}

.status-icon {
    width: 30px;
    height: 30px;

    flex-shrink: 0;

    display: flex;

    align-items: center;
    justify-content: center;

    border-radius: 9px;

    background: #ffe5eb;

    color: #d93659;
}

.status-icon i {
    font-size: 11px;
}

.illustration-status strong {
    display: block;

    color: #5b4b51;

    font-size: 9px;
}

.illustration-status span {
    display: block;

    margin-top: 2px;

    color: #a18d94;

    font-size: 7.5px;
}


/* Tablet */

@media (max-width: 992px) {

    .hasil-page {
        padding: 20px;
    }

    .hasil-layout {
        grid-template-columns:
            minmax(0, 1.45fr)
            minmax(270px, .85fr);

        gap: 16px;
    }

    .result-card {
        padding: 21px;
    }

    .illustration-card {
        padding: 22px 16px;
    }

}


/* HP */

@media (max-width: 767px) {

    .hasil-page {
        padding: 13px 12px 22px;
    }


    /* Banner */

    .page-banner {
        min-height: 178px;

        padding: 20px;

        margin-bottom: 14px;

        border-radius: 19px;
    }

    .banner-content {
        gap: 11px;

        align-items: flex-start;
    }

    .banner-icon {
        width: 49px;
        height: 49px;

        border-radius: 13px;
    }

    .banner-icon svg {
        width: 25px;
        height: 25px;
    }

    .banner-label {
        font-size: 8px;
    }

    .banner-text h1 {
        font-size: 21px;
    }

    .banner-text p {
        max-width: 205px;

        margin-top: 5px;

        font-size: 9px;

        line-height: 1.45;
    }

    .banner-heart {
        width: 52px;
        height: 52px;

        top: 25px;
        right: 17px;
    }

    .banner-heart svg {
        width: 25px;
        height: 25px;
    }

    .banner-info {
        left: 20px;
        right: 20px;
        bottom: 14px;

        padding: 7px 9px;
    }

    .banner-info-icon {
        width: 30px;
        height: 30px;
    }

    .banner-info strong {
        font-size: 10px;
    }

    .banner-info span {
        font-size: 7px;
    }


    /* Layout */

    .hasil-layout {
        display: flex;

        flex-direction: column;

        gap: 14px;
    }


    /* Form */

    .result-card {
        padding: 17px 15px;

        border-radius: 18px;
    }

    .card-heading {
        gap: 9px;

        margin-bottom: 17px;
    }

    .heading-icon {
        width: 39px;
        height: 39px;

        border-radius: 11px;
    }

    .heading-icon i {
        font-size: 15px;
    }

    .card-heading h4 {
        font-size: 15px;
    }

    .card-heading span {
        font-size: 9px;
    }


    /* Form */

    .form-group {
        margin-bottom: 12px;
    }

    .form-group label {
        margin-bottom: 6px;

        font-size: 9.5px;
    }

    .donor-input {
        height: 42px;

        padding: 8px 11px;

        border-radius: 10px;

        font-size: 10.5px;
    }

    .select-wrapper select {
        padding-right: 33px;
    }


    /* Dua kolom */

    .two-column {
        gap: 8px;
    }

    .two-column .form-group label {
        white-space: nowrap;

        font-size: 8.5px;
    }

    .two-column .form-group label i {
        width: 11px;

        margin-right: 2px;
    }

    .input-icon .donor-input {
        padding-right: 32px;
    }

    .input-icon > i {
        right: 11px;

        font-size: 10px;
    }

    .ml-label {
        right: 11px;

        font-size: 8px;
    }


    /* Textarea */

    .textarea-input {
        height: 72px;

        min-height: 72px;
    }


    /* Button */

    .form-actions {
        grid-template-columns:
            minmax(0, 1fr)
            88px;

        gap: 8px;

        margin-top: 17px;
    }

    .btn-save,
    .btn-cancel {
        min-height: 40px;

        border-radius: 10px;

        font-size: 9px;
    }


    /* Ilustrasi */

    .illustration-card {
        min-height: 405px;

        padding: 22px 14px;

        border-radius: 18px;
    }

    .illustration-circle {
        width: 205px;
        height: 205px;

        margin-top: 2px;

        margin-bottom: 15px;
    }

    .illustration-circle::before {
        width: 230px;
        height: 230px;
    }

    .clipboard {
        width: 120px;
        height: 145px;

        padding: 21px 11px 10px;
    }

    .clipboard-clip {
        width: 48px;
        height: 17px;
    }

    .clipboard-icon {
        width: 25px;
        height: 25px;
    }

    .clipboard-icon i {
        font-size: 10px;
    }

    .clipboard-top strong {
        font-size: 6px;
    }

    .clipboard-top span {
        font-size: 5px;
    }

    .clipboard-check {
        margin-top: 9px;
    }

    .check-circle {
        width: 18px;
        height: 18px;
    }

    .check-circle i {
        font-size: 6px;
    }

    .check-lines span {
        height: 4px;
    }

    .decor-heart {
        width: 30px;
        height: 30px;

        font-size: 12px;
    }

    .heart-one {
        top: 55px;
        left: 28px;
    }

    .heart-two {
        right: 28px;
        bottom: 126px;
    }

    .decor-drop {
        width: 27px;
        height: 27px;

        right: 29px;
        top: 113px;

        font-size: 9px;
    }

    .illustration-title span {
        font-size: 7px;
    }

    .illustration-title strong {
        font-size: 13px;
    }

    .illustration-title p {
        max-width: 210px;

        font-size: 8px;
    }

    .illustration-status {
        width: 215px;

        margin-top: 13px;

        padding: 8px 10px;
    }

}


/* HP kecil */

@media (max-width: 400px) {

    .hasil-page {
        padding: 10px 9px 18px;
    }

    .page-banner {
        min-height: 170px;

        padding: 18px;
    }

    .banner-icon {
        width: 45px;
        height: 45px;
    }

    .banner-text h1 {
        font-size: 19px;
    }

    .banner-text p {
        max-width: 185px;

        font-size: 8px;
    }

    .banner-heart {
        width: 48px;
        height: 48px;

        right: 15px;
        top: 23px;
    }

    .banner-heart svg {
        width: 23px;
        height: 23px;
    }

    .banner-info {
        left: 18px;
        right: 18px;

        bottom: 12px;
    }

    .result-card {
        padding: 15px 12px;
    }

    .card-heading h4 {
        font-size: 14px;
    }

    .card-heading span {
        font-size: 8.5px;
    }

    .donor-input {
        height: 40px;

        font-size: 10px;
    }

    .two-column {
        gap: 6px;
    }

    .two-column .form-group label {
        font-size: 8px;
    }

    .textarea-input {
        height: 68px;

        min-height: 68px;
    }

    .form-actions {
        grid-template-columns:
            minmax(0, 1fr)
            82px;

        gap: 6px;
    }

    .btn-save,
    .btn-cancel {
        min-height: 38px;

        font-size: 8.5px;
    }

    .illustration-card {
        min-height: 380px;

        padding: 19px 11px;
    }

    .illustration-circle {
        width: 190px;
        height: 190px;

        margin-bottom: 13px;
    }

    .illustration-circle::before {
        width: 212px;
        height: 212px;
    }

    .clipboard {
        width: 111px;
        height: 134px;

        padding: 19px 10px 9px;
    }

    .clipboard-check {
        margin-top: 8px;
    }

    .illustration-title strong {
        font-size: 12px;
    }

    .illustration-title p {
        font-size: 7.5px;
    }

    .illustration-status {
        width: 205px;
    }

}

</style>

@endpush

@endsection