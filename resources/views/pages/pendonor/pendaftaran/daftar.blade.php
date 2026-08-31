@extends('layouts.app')

@section('title', 'Pendaftaran Donor - DonorConnect')

@section('content')

<div class="donor-page">

    <div class="page-heading">

        <div>
            <span class="heading-label">DONORCONNECT</span>

            <h1>Pendaftaran Donor</h1>

            <p>
                Lengkapi pendaftaran untuk mengikuti kegiatan donor darah.
            </p>
        </div>

        <div class="heading-badge">
            <i class="fas fa-tint"></i>
            Pendonor
        </div>

    </div>


    @if(session('success'))

        <div class="alert alert-success">
            <i class="fas fa-check-circle"></i>
            <span>{{ session('success') }}</span>
        </div>

    @endif


    @if($errors->any())

        <div class="alert alert-danger">

            <i class="fas fa-exclamation-circle"></i>

            <div>
                @foreach($errors->all() as $error)
                    <div>{{ $error }}</div>
                @endforeach
            </div>

        </div>

    @endif


    <div class="registration-card">

        <div class="registration-header">

            <div class="header-icon">
                <i class="fas fa-tint"></i>
            </div>

            <div>
                <span class="header-label">
                    FORMULIR DONOR DARAH
                </span>

                <h2>Daftar sebagai Pendonor</h2>

                <p>
                    Periksa kembali data diri dan kegiatan sebelum mendaftar.
                </p>
            </div>

        </div>


        <div class="registration-body">

            <form action="{{ route('pendaftaran-donor.store') }}"
                  method="POST">

                @csrf

                <input type="hidden"
                       name="id_kegiatan"
                       value="{{ $kegiatan->id_kegiatan }}">


                {{-- DATA PENDONOR --}}

                <div class="section-heading">

                    <div class="section-icon">
                        <i class="fas fa-user"></i>
                    </div>

                    <div>
                        <h3>Data Pendonor</h3>
                        <p>Data diambil dari profil kamu.</p>
                    </div>

                </div>


                <div class="form-grid">


                    <div class="form-group">

                        <label>Nama Lengkap</label>

                        <div class="input-box">

                            <i class="fas fa-user"></i>

                            <input type="text"
                                   class="form-control"
                                   value="{{ $pendonor->user->nama ?? '-' }}"
                                   readonly>

                        </div>

                    </div>


                    <div class="form-group">

                        <label>Status</label>

                        <div class="input-box">

                            <i class="fas fa-id-badge"></i>

                            <input type="text"
                                   class="form-control"
                                   value="{{ $pendonor->status ?? '-' }}"
                                   readonly>

                        </div>

                    </div>


                    <div class="form-group">

                        <label>Kelas / Jabatan</label>

                        <div class="input-box">

                            <i class="fas fa-graduation-cap"></i>

                            <input type="text"
                                   class="form-control"
                                   value="{{ $pendonor->kelas_jabatan ?? '-' }}"
                                   readonly>

                        </div>

                    </div>


                    <div class="form-group">

                        <label>Umur</label>

                        <div class="input-box">

                            <i class="fas fa-birthday-cake"></i>

                            <input type="text"
                                   class="form-control"
                                   value="{{ $pendonor->tanggal_lahir ? \Carbon\Carbon::parse($pendonor->tanggal_lahir)->age . ' Tahun' : '-' }}"
                                   readonly>

                        </div>

                    </div>


                    <div class="form-group">

                        <label>Golongan Darah</label>

                        <div class="input-box blood-input">

                            <i class="fas fa-tint"></i>

                            <input type="text"
                                   class="form-control"
                                   value="{{ $pendonor->golongan_darah ?? '-' }}"
                                   readonly>

                        </div>

                    </div>


                    <div class="form-group">

                        <label>Nomor Telepon</label>

                        <div class="input-box">

                            <i class="fas fa-phone"></i>

                            <input type="text"
                                   class="form-control"
                                   value="{{ $pendonor->nomor_telepon ?? '-' }}"
                                   readonly>

                        </div>

                    </div>


                    <div class="form-group full-width">

                        <label>Informasi Kesehatan</label>

                        <div class="input-box textarea-box">

                            <i class="fas fa-heartbeat"></i>

                            <textarea class="form-control"
                                      rows="2"
                                      readonly>{{ $pendonor->informasi_kesehatan ?? '-' }}</textarea>

                        </div>

                    </div>

                </div>


                <div class="profile-note">

                    <i class="fas fa-info-circle"></i>

                    <span>
                        Jika ada data yang tidak sesuai, silakan ubah melalui menu
                        <strong>Profil Saya</strong> terlebih dahulu.
                    </span>

                </div>


                {{-- KEGIATAN DONOR --}}

                <div class="section-heading activity-heading">

                    <div class="section-icon">
                        <i class="fas fa-calendar-alt"></i>
                    </div>

                    <div>
                        <h3>Kegiatan Donor</h3>
                        <p>Kegiatan yang akan kamu ikuti.</p>
                    </div>

                </div>


                <div class="activity-card">

                    <div class="activity-name">

                        <div class="activity-icon">
                            <i class="fas fa-tint"></i>
                        </div>

                        <div>

                            <span>KEGIATAN DONOR</span>

                            <h4>
                                {{ $kegiatan->nama_kegiatan }}
                            </h4>

                        </div>

                    </div>


                    <div class="activity-details">

                        <div class="detail-item">

                            <div class="detail-icon">
                                <i class="fas fa-calendar-day"></i>
                            </div>

                            <div>
                                <small>Tanggal</small>

                                <strong>
                                    {{ $kegiatan->tanggal->format('d M Y') }}
                                </strong>
                            </div>

                        </div>


                        <div class="detail-item">

                            <div class="detail-icon">
                                <i class="fas fa-clock"></i>
                            </div>

                            <div>
                                <small>Waktu</small>

                                <strong>
                                    {{ $kegiatan->waktu }}
                                </strong>
                            </div>

                        </div>


                        <div class="detail-item">

                            <div class="detail-icon">
                                <i class="fas fa-map-marker-alt"></i>
                            </div>

                            <div>
                                <small>Lokasi</small>

                                <strong>
                                    {{ $kegiatan->lokasi }}
                                </strong>
                            </div>

                        </div>

                    </div>

                </div>


                {{-- CATATAN --}}

                <div class="section-heading note-heading">

                    <div class="section-icon">
                        <i class="fas fa-comment-alt"></i>
                    </div>

                    <div>
                        <h3>Catatan</h3>
                        <p>Tambahkan informasi jika diperlukan.</p>
                    </div>

                </div>


                <div class="form-group">

                    <label>
                        Catatan
                        <span class="optional">Opsional</span>
                    </label>

                    <textarea name="catatan"
                              class="form-control note-control"
                              rows="3"
                              placeholder="Tulis catatan atau informasi tambahan...">{{ old('catatan') }}</textarea>

                </div>


                {{-- KONFIRMASI --}}

                <div class="confirmation-box">

                    <div class="confirmation-icon">
                        <i class="fas fa-heart"></i>
                    </div>

                    <div>

                        <strong>Siap untuk berbagi kebaikan?</strong>

                        <p>
                            Pastikan data diri dan informasi kegiatan sudah benar
                            sebelum melakukan pendaftaran donor.
                        </p>

                    </div>

                </div>


                <div class="form-footer">

                    <a href="{{ route('pendonor.kegiatan.show', $kegiatan->id_kegiatan) }}"
                       class="btn-back">

                        <i class="fas fa-arrow-left"></i>

                        Batal

                    </a>


                    <button type="submit"
                            class="btn-submit">

                        <i class="fas fa-tint"></i>

                        Daftar Sekarang

                    </button>

                </div>

            </form>

        </div>

    </div>

</div>


@push('styles')

<style>

.donor-page {
    width: 100%;
    min-height: calc(100vh - 80px);
    padding: 28px 32px 45px;
    background: #fbf4f1;
}

.page-heading {
    max-width: 1100px;
    margin: 0 auto 22px;
    display: flex;
    justify-content: space-between;
    align-items: flex-end;
    gap: 20px;
}

.heading-label {
    display: block;
    margin-bottom: 5px;
    color: #c65a6d;
    font-size: 9px;
    font-weight: 800;
    letter-spacing: 2px;
}

.page-heading h1 {
    margin: 0 0 5px;
    color: #39445f;
    font-size: 29px;
    font-weight: 800;
}

.page-heading p {
    margin: 0;
    color: #958b8c;
    font-size: 12px;
}

.heading-badge {
    padding: 8px 15px;
    border: 1px solid #eedadd;
    border-radius: 30px;
    background: #fff8f7;
    color: #bd4b61;
    font-size: 10px;
    font-weight: 700;
    white-space: nowrap;
}

.heading-badge i {
    margin-right: 6px;
}

.registration-card {
    position: relative;
    max-width: 1100px;
    margin: 0 auto;
    overflow: hidden;
    border: 1px solid #eee0dd;
    border-radius: 20px;
    background: #ffffff;
    box-shadow: 0 8px 28px rgba(116, 78, 78, 0.07);
}

.registration-card::before {
    content: "";
    position: absolute;
    top: 0;
    left: 0;
    width: 5px;
    height: 100%;
    background: linear-gradient(
        180deg,
        #d91e36,
        #df6a80
    );
}

.registration-header {
    display: flex;
    align-items: center;
    gap: 15px;
    padding: 24px 30px;
    border-bottom: 1px solid #f0e4e1;
    background: linear-gradient(
        110deg,
        #fffafa,
        #fff5f4
    );
}

.header-icon {
    width: 52px;
    height: 52px;
    flex-shrink: 0;
    display: flex;
    align-items: center;
    justify-content: center;
    border-radius: 15px;
    background: #fae4e6;
    color: #d91e36;
    font-size: 20px;
}

.header-label {
    color: #c65b6d;
    font-size: 8px;
    font-weight: 800;
    letter-spacing: 1.5px;
}

.registration-header h2 {
    margin: 3px 0;
    color: #39445f;
    font-size: 19px;
    font-weight: 800;
}

.registration-header p {
    margin: 0;
    color: #978d8e;
    font-size: 10px;
}

.registration-body {
    padding: 28px 30px 30px;
}

.section-heading {
    display: flex;
    align-items: center;
    gap: 11px;
    margin-bottom: 17px;
}

.section-icon {
    width: 35px;
    height: 35px;
    flex-shrink: 0;
    display: flex;
    align-items: center;
    justify-content: center;
    border-radius: 10px;
    background: #fff0f1;
    color: #d34b61;
    font-size: 13px;
}

.section-heading h3 {
    margin: 0 0 2px;
    color: #424961;
    font-size: 14px;
    font-weight: 800;
}

.section-heading p {
    margin: 0;
    color: #aaa0a1;
    font-size: 9px;
}

.form-grid {
    display: grid;
    grid-template-columns: repeat(2, 1fr);
    gap: 16px 22px;
    margin-bottom: 15px;
}

.form-group {
    margin: 0;
}

.full-width {
    grid-column: 1 / -1;
}

.form-group label {
    display: flex;
    align-items: center;
    gap: 6px;
    margin-bottom: 7px;
    color: #55515a;
    font-size: 11px;
    font-weight: 700;
}

.optional {
    color: #aaa0a1;
    font-size: 9px;
    font-weight: 500;
}

.input-box {
    position: relative;
}

.input-box > i {
    position: absolute;
    top: 50%;
    left: 13px;
    z-index: 2;
    transform: translateY(-50%);
    color: #c9959e;
    font-size: 11px;
}

.form-control {
    width: 100%;
    min-height: 41px;
    padding: 10px 12px;
    border: 1px solid #eadedf;
    border-radius: 9px;
    outline: none;
    background: #ffffff;
    color: #45434b;
    font-size: 11px;
    box-sizing: border-box;
    transition: .2s ease;
}

.input-box .form-control {
    padding-left: 36px;
}

.form-control:focus {
    border-color: #d96879;
    box-shadow: 0 0 0 3px rgba(217, 30, 54, .06);
}

.form-control[readonly] {
    background: #faf7f6;
    color: #625d60;
}

.blood-input .form-control {
    color: #c6374d;
    font-weight: 700;
}

.textarea-box {
    display: flex;
}

.textarea-box > i {
    top: 17px;
    transform: none;
}

.textarea-box textarea {
    padding-left: 36px;
    resize: none;
}

.profile-note {
    display: flex;
    align-items: center;
    gap: 8px;
    margin: 0 0 28px;
    padding: 10px 13px;
    border: 1px solid #eee1df;
    border-radius: 9px;
    background: #fffaf9;
    color: #93898b;
    font-size: 9px;
}

.profile-note i {
    color: #d26879;
}

.profile-note strong {
    color: #c74c61;
}

.activity-heading {
    margin-bottom: 15px;
}

.activity-card {
    margin-bottom: 28px;
    padding: 18px;
    border: 1px solid #f0dfe1;
    border-radius: 14px;
    background: #fffafa;
}

.activity-name {
    display: flex;
    align-items: center;
    gap: 12px;
    padding-bottom: 16px;
    border-bottom: 1px solid #f1e6e4;
}

.activity-icon {
    width: 42px;
    height: 42px;
    flex-shrink: 0;
    display: flex;
    align-items: center;
    justify-content: center;
    border-radius: 12px;
    background: #f9e1e4;
    color: #d91e36;
    font-size: 16px;
}

.activity-name span {
    display: block;
    margin-bottom: 3px;
    color: #c36b78;
    font-size: 8px;
    font-weight: 800;
    letter-spacing: 1px;
}

.activity-name h4 {
    margin: 0;
    color: #3f465e;
    font-size: 13px;
    font-weight: 800;
}

.activity-details {
    display: grid;
    grid-template-columns: repeat(3, 1fr);
    gap: 15px;
    padding-top: 16px;
}

.detail-item {
    display: flex;
    align-items: center;
    gap: 9px;
}

.detail-icon {
    width: 30px;
    height: 30px;
    flex-shrink: 0;
    display: flex;
    align-items: center;
    justify-content: center;
    border-radius: 8px;
    background: #fff0f1;
    color: #d45a6d;
    font-size: 10px;
}

.detail-item small {
    display: block;
    margin-bottom: 2px;
    color: #a39a9b;
    font-size: 8px;
}

.detail-item strong {
    display: block;
    color: #55515a;
    font-size: 10px;
    font-weight: 700;
}

.note-heading {
    margin-bottom: 14px;
}

.note-control {
    min-height: 85px;
    padding: 12px;
    resize: vertical;
}

.confirmation-box {
    display: flex;
    align-items: center;
    gap: 11px;
    margin-top: 20px;
    padding: 13px 15px;
    border: 1px solid #f0dfe1;
    border-radius: 11px;
    background: #fff7f6;
}

.confirmation-icon {
    width: 32px;
    height: 32px;
    flex-shrink: 0;
    display: flex;
    align-items: center;
    justify-content: center;
    border-radius: 50%;
    background: #f8dfe2;
    color: #d24b60;
    font-size: 11px;
}

.confirmation-box strong {
    display: block;
    margin-bottom: 2px;
    color: #55515a;
    font-size: 10px;
}

.confirmation-box p {
    margin: 0;
    color: #999092;
    font-size: 9px;
}

.form-footer {
    display: flex;
    justify-content: flex-end;
    gap: 10px;
    margin-top: 24px;
    padding-top: 20px;
    border-top: 1px solid #f0e5e3;
}

.btn-back,
.btn-submit {
    min-height: 40px;
    padding: 10px 18px;
    display: inline-flex;
    align-items: center;
    justify-content: center;
    gap: 7px;
    border-radius: 9px;
    font-size: 10px;
    font-weight: 700;
    text-decoration: none !important;
    transition: .2s ease;
}

.btn-back {
    border: 1px solid #ded5d5;
    background: #ffffff;
    color: #777074 !important;
}

.btn-back:hover {
    background: #faf5f5;
    color: #625c60 !important;
}

.btn-submit {
    border: none;
    background: linear-gradient(
        135deg,
        #d91e36,
        #df5068
    );
    color: #ffffff !important;
    box-shadow: 0 5px 12px rgba(217, 30, 54, .16);
}

.btn-submit:hover {
    transform: translateY(-1px);
    box-shadow: 0 7px 15px rgba(217, 30, 54, .20);
}

.alert {
    max-width: 1100px;
    margin: 0 auto 18px;
    padding: 12px 15px;
    display: flex;
    align-items: flex-start;
    gap: 9px;
    border-radius: 9px;
    font-size: 11px;
}

.alert-success {
    border: 1px solid #d9eadc;
    background: #f5fbf6;
    color: #47704e;
}

.alert-danger {
    border: 1px solid #efd5d8;
    background: #fff6f7;
    color: #a23e4c;
}

.alert-danger > div {
    line-height: 1.6;
}

@media (max-width: 800px) {

    .donor-page {
        padding: 22px 17px 35px;
    }

    .page-heading {
        align-items: flex-start;
        flex-direction: column;
    }

    .form-grid {
        grid-template-columns: 1fr;
    }

    .full-width {
        grid-column: auto;
    }

    .activity-details {
        grid-template-columns: 1fr;
    }

}

@media (max-width: 500px) {

    .registration-header {
        padding: 20px;
    }

    .registration-body {
        padding: 22px 18px;
    }

    .registration-header h2 {
        font-size: 17px;
    }

    .form-footer {
        flex-direction: column-reverse;
    }

    .btn-back,
    .btn-submit {
        width: 100%;
    }

}

</style>

@endpush

@endsection