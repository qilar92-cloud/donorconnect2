@extends('layouts.app')

@section('content')

<div class="container-fluid">

    <!-- Header -->
    <div class="page-header">
        <div>
            <h1>Catat Hasil Donor</h1>
            <p>Catat hasil donor pendonor setelah kegiatan selesai.</p>
        </div>

        <div class="header-badge">
            <i class="fas fa-heartbeat"></i>
        </div>
    </div>

    <div class="row">

        <!-- Form -->
        <div class="col-lg-8 mb-4">

            <div class="result-card">

                <div class="card-heading">
                    <div class="heading-icon">
                        <i class="fas fa-notes-medical"></i>
                    </div>

                    <div>
                        <h4>Catat Hasil Donor</h4>
                        <span>Lengkapi data hasil donor dengan benar.</span>
                    </div>
                </div>

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

                @if (session('success'))
                    <div class="success-box">
                        <i class="fas fa-check-circle"></i>
                        <span>{{ session('success') }}</span>
                    </div>
                @endif

                <form
                    action="{{ route('hasil-donor.store') }}"
                    method="POST"
                >

                    @csrf

                    <!-- Pendonor -->
                    <div class="form-group">
                        <label>
                            <i class="fas fa-user"></i>
                            Pendonor
                        </label>

                        <select
                            name="id_pendonor"
                            class="form-control donor-input"
                            required
                        >
                            <option value="">Pilih Pendonor</option>

                            @foreach ($pendonor as $item)
                                <option
                                    value="{{ $item->id_pendonor }}"
                                    {{ old('id_pendonor') == $item->id_pendonor ? 'selected' : '' }}
                                >
                                    {{ $item->user->nama ?? 'Pendonor' }}
                                </option>
                            @endforeach
                        </select>
                    </div>

                    <!-- Kegiatan -->
                    <div class="form-group">
                        <label>
                            <i class="fas fa-calendar-alt"></i>
                            Kegiatan
                        </label>

                        <select
                            name="id_kegiatan"
                            class="form-control donor-input"
                            required
                        >
                            <option value="">Pilih Kegiatan</option>

                            @foreach ($kegiatan as $item)
                                <option
                                    value="{{ $item->id_kegiatan }}"
                                    {{ old('id_kegiatan') == $item->id_kegiatan ? 'selected' : '' }}
                                >
                                    {{ $item->nama_kegiatan }}
                                </option>
                            @endforeach
                        </select>
                    </div>

                    <div class="row">

                        <!-- Tanggal -->
                        <div class="col-md-6">

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
                                        class="form-control donor-input"
                                        required
                                    >

                                    <i class="fas fa-calendar-alt"></i>
                                </div>
                            </div>

                        </div>

                        <!-- Jumlah -->
                        <div class="col-md-6">

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
                                        class="form-control donor-input"
                                        min="1"
                                        required
                                    >

                                    <span class="ml-label">ml</span>
                                </div>
                            </div>

                        </div>

                    </div>

                    <!-- Keterangan -->
                    <div class="form-group">
                        <label>
                            <i class="fas fa-clipboard-check"></i>
                            Keterangan
                        </label>

                        <textarea
                            name="keterangan"
                            class="form-control donor-input textarea-input"
                            rows="4"
                            placeholder="Contoh: Sehat"
                        >{{ old('keterangan') }}</textarea>
                    </div>

                    <!-- Button -->
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

        <!-- Illustration -->
        <div class="col-lg-4 mb-4">

            <div class="illustration-card">

                <div class="floating-heart heart-one">♥</div>
                <div class="floating-heart heart-two">♥</div>

                <div class="illustration-title">
                    <span>Donor itu berarti</span>
                    <strong>Setetes darah, sejuta harapan 💗</strong>
                </div>

                <!-- Blood bag -->
                <div class="blood-bag">

                    <div class="bag-hook"></div>

                    <div class="bag-top">
                        DONOR
                    </div>

                    <div class="blood-area">

                        <div class="drop-icon">
                            <i class="fas fa-tint"></i>
                        </div>

                        <strong>450</strong>
                        <small>ml</small>

                    </div>

                    <div class="bag-label">
                        <i class="fas fa-heart"></i>
                        DONOR DARAH
                    </div>

                </div>

                <!-- Checklist -->
                <div class="check-card">

                    <div class="check-header">
                        <span>
                            <i class="fas fa-clipboard-list"></i>
                        </span>

                        <strong>Data sudah siap?</strong>
                    </div>

                    <div class="check-item">
                        <i class="fas fa-check"></i>
                        Pendonor
                    </div>

                    <div class="check-item">
                        <i class="fas fa-check"></i>
                        Kegiatan donor
                    </div>

                    <div class="check-item">
                        <i class="fas fa-check"></i>
                        Hasil donor
                    </div>

                </div>

                <p class="illustration-text">
                    Pastikan data yang dicatat sudah sesuai
                    sebelum menyimpan hasil donor.
                </p>

            </div>

        </div>

    </div>

</div>

@endsection


@push('styles')

<style>

body {
    background: #fff7f5;
}

/* Header */

.page-header {
    display: flex;
    align-items: center;
    justify-content: space-between;
    margin-bottom: 24px;
}

.page-header h1 {
    margin: 0;
    color: #302d48;
    font-size: 27px;
    font-weight: 900;
}

.page-header p {
    margin: 6px 0 0;
    color: #95838a;
    font-size: 12px;
}

.header-badge {
    width: 48px;
    height: 48px;
    display: flex;
    align-items: center;
    justify-content: center;
    border-radius: 15px;
    background: linear-gradient(
        135deg,
        #c90000,
        #d71945,
        #d94b91
    );
    color: #fff;
    box-shadow: 0 8px 18px rgba(201, 0, 0, .18);
}

.header-badge i {
    font-size: 19px;
}

/* Card */

.result-card {
    padding: 27px;
    background: #fff;
    border: 1px solid #f0dfe3;
    border-radius: 20px;
    box-shadow: 0 8px 25px rgba(101, 42, 55, .06);
}

.card-heading {
    display: flex;
    align-items: center;
    gap: 13px;
    margin-bottom: 25px;
}

.heading-icon {
    width: 44px;
    height: 44px;
    display: flex;
    align-items: center;
    justify-content: center;
    border-radius: 13px;
    background: #fff0f3;
    color: #c91845;
}

.card-heading h4 {
    margin: 0;
    color: #39334b;
    font-size: 17px;
    font-weight: 900;
}

.card-heading span {
    display: block;
    margin-top: 4px;
    color: #a18e94;
    font-size: 11px;
}

/* Form */

.form-group {
    margin-bottom: 19px;
}

.form-group label {
    display: block;
    margin-bottom: 8px;
    color: #51434a;
    font-size: 11px;
    font-weight: 800;
}

.form-group label i {
    margin-right: 6px;
    color: #c91845;
}

.donor-input {
    height: 46px;
    padding: 10px 14px;
    border: 1px solid #ead9de;
    border-radius: 11px;
    background: #fffafa;
    color: #51434a;
    font-size: 12px;
    box-shadow: none !important;
}

.donor-input:focus {
    border-color: #d94b91;
    background: #fff;
    box-shadow: 0 0 0 3px rgba(217, 75, 145, .10) !important;
}

.textarea-input {
    height: auto;
    resize: vertical;
}

.input-icon {
    position: relative;
}

.input-icon .donor-input {
    padding-right: 40px;
}

.input-icon > i {
    position: absolute;
    right: 14px;
    top: 50%;
    transform: translateY(-50%);
    color: #d94b91;
    font-size: 12px;
    pointer-events: none;
}

.ml-label {
    position: absolute;
    right: 14px;
    top: 50%;
    transform: translateY(-50%);
    color: #a98790;
    font-size: 10px;
    font-weight: 800;
    pointer-events: none;
}

/* Alert */

.error-box,
.success-box {
    display: flex;
    align-items: flex-start;
    gap: 9px;
    padding: 12px 14px;
    margin-bottom: 19px;
    border-radius: 11px;
    font-size: 11px;
}

.error-box {
    background: #fff0f2;
    color: #a80e2c;
}

.success-box {
    background: #eefaf3;
    color: #28804d;
}

.error-box i,
.success-box i {
    margin-top: 2px;
}

/* Button */

.form-actions {
    display: flex;
    gap: 10px;
    margin-top: 25px;
}

.btn-save,
.btn-cancel {
    display: inline-flex;
    align-items: center;
    justify-content: center;
    min-height: 43px;
    padding: 10px 20px;
    border-radius: 11px;
    font-size: 11px;
    font-weight: 900;
    text-decoration: none !important;
    transition: .2s ease;
}

.btn-save {
    border: 0;
    background: linear-gradient(
        135deg,
        #c90000,
        #d71945
    );
    color: #fff !important;
    box-shadow: 0 6px 14px rgba(201, 0, 0, .18);
}

.btn-save:hover {
    transform: translateY(-1px);
    color: #fff !important;
    box-shadow: 0 8px 18px rgba(201, 0, 0, .23);
}

.btn-save i {
    margin-right: 7px;
}

.btn-cancel {
    border: 1px solid #dfcbd0;
    background: #fff;
    color: #806b72 !important;
}

.btn-cancel:hover {
    border-color: #d94b91;
    background: #fff5f7;
    color: #c91845 !important;
}

/* Illustration */

.illustration-card {
    min-height: 100%;
    position: relative;
    overflow: hidden;
    padding: 28px 22px;
    text-align: center;
    border: 1px solid #f0dce2;
    border-radius: 20px;
    background:
        radial-gradient(
            circle at 90% 5%,
            rgba(217, 75, 145, .12),
            transparent 25%
        ),
        linear-gradient(
            145deg,
            #fff0f4,
            #fffafa
        );
    box-shadow: 0 8px 25px rgba(101, 42, 55, .06);
}

.floating-heart {
    position: absolute;
    color: #e5a2b9;
    opacity: .7;
}

.heart-one {
    top: 18px;
    left: 20px;
    font-size: 19px;
}

.heart-two {
    top: 95px;
    right: 20px;
    font-size: 14px;
}

.illustration-title {
    position: relative;
    z-index: 1;
    margin-bottom: 16px;
}

.illustration-title span {
    display: block;
    color: #a98790;
    font-size: 10px;
    font-weight: 700;
}

.illustration-title strong {
    display: block;
    margin-top: 4px;
    color: #9f1538;
    font-size: 14px;
    font-weight: 900;
}

/* Blood bag */

.blood-bag {
    width: 130px;
    height: 158px;
    position: relative;
    margin: 23px auto 28px;
    border: 3px solid #d94b91;
    border-radius: 17px 17px 25px 25px;
    overflow: visible;
    background: #fff;
    box-shadow: 0 10px 22px rgba(190, 35, 79, .16);
}

.bag-hook {
    position: absolute;
    width: 27px;
    height: 22px;
    left: 49px;
    top: -23px;
    border: 4px solid #c91845;
    border-bottom: 0;
    border-radius: 12px 12px 0 0;
}

.bag-top {
    height: 30px;
    display: flex;
    align-items: center;
    justify-content: center;
    border-radius: 13px 13px 0 0;
    background: #fff0f4;
    color: #c91845;
    font-size: 9px;
    font-weight: 900;
    letter-spacing: 1px;
}

.blood-area {
    height: 90px;
    display: flex;
    flex-direction: column;
    align-items: center;
    justify-content: center;
    background: linear-gradient(
        to bottom,
        #e04c6b,
        #c90000
    );
    color: white;
}

.drop-icon {
    width: 35px;
    height: 35px;
    display: flex;
    align-items: center;
    justify-content: center;
    margin-bottom: 4px;
    border-radius: 50%;
    background: rgba(255,255,255,.18);
}

.drop-icon i {
    font-size: 14px;
}

.blood-area strong {
    font-size: 18px;
    line-height: 1;
}

.blood-area small {
    font-size: 8px;
    opacity: .9;
}

.bag-label {
    height: 35px;
    display: flex;
    align-items: center;
    justify-content: center;
    gap: 5px;
    color: #c91845;
    font-size: 8px;
    font-weight: 900;
}

.bag-label i {
    font-size: 8px;
}

/* Checklist */

.check-card {
    max-width: 245px;
    margin: 0 auto;
    padding: 14px;
    text-align: left;
    border: 1px solid #f1dce2;
    border-radius: 14px;
    background: #fff;
}

.check-header {
    display: flex;
    align-items: center;
    gap: 8px;
    margin-bottom: 10px;
    color: #493d43;
    font-size: 10px;
}

.check-header span {
    width: 27px;
    height: 27px;
    display: flex;
    align-items: center;
    justify-content: center;
    border-radius: 8px;
    background: #fff0f3;
    color: #c91845;
}

.check-item {
    display: flex;
    align-items: center;
    gap: 7px;
    margin-top: 7px;
    color: #7d6b72;
    font-size: 10px;
    font-weight: 700;
}

.check-item i {
    color: #d94b91;
    font-size: 9px;
}

.illustration-text {
    max-width: 245px;
    margin: 15px auto 0;
    color: #96848b;
    font-size: 9px;
    line-height: 1.7;
}

/* Mobile */

@media (max-width: 768px) {

    .page-header h1 {
        font-size: 23px;
    }

    .result-card {
        padding: 20px;
    }

    .illustration-card {
        min-height: 520px;
    }

    .form-actions {
        flex-direction: column;
    }

    .btn-save,
    .btn-cancel {
        width: 100%;
    }

}

</style>

@endpush