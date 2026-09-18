@extends('layouts.app')

@section('title', 'Pendaftaran Donor - DonorConnect')

@push('styles')
    @vite('resources/css/pendonor/pendaftaran-daftar.css')
@endpush

@section('content')

    <div class="donor-page">

        <div class="page-heading">

            <div>

                <h1>
                    Pendaftaran Donor
                </h1>

                <p>
                    Lengkapi pendaftaran untuk mengikuti kegiatan donor darah.
                </p>

            </div>

            <div class="heading-badge">
                <i class="fas fa-tint"></i>
                Pendonor
            </div>

        </div>


        @if (session('success'))

            <div class="alert alert-success">

                <i class="fas fa-check-circle"></i>

                <span>
                    {{ session('success') }}
                </span>

            </div>

        @endif


        @if ($errors->any())

            <div class="alert alert-danger">

                <i class="fas fa-exclamation-circle"></i>

                <div>

                    @foreach ($errors->all() as $error)
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

                    <h2>
                        Daftar sebagai Pendonor
                    </h2>

                    <p>
                        Periksa kembali data diri dan kegiatan sebelum mendaftar.
                    </p>

                </div>

            </div>


            <div class="registration-body">

                <form
                    action="{{ route('pendaftaran-donor.store') }}"
                    method="POST"
                >

                    @csrf

                    <input
                        type="hidden"
                        name="id_kegiatan"
                        value="{{ $kegiatan->id_kegiatan }}"
                    >


                    {{-- Data Pendonor --}}

                    <div class="section-heading">

                        <div class="section-icon">
                            <i class="fas fa-user"></i>
                        </div>

                        <div>

                            <h3>
                                Data Pendonor
                            </h3>

                            <p>
                                Data diambil dari profil kamu.
                            </p>

                        </div>

                    </div>


                    <div class="form-grid">

                        <div class="form-group">

                            <label>
                                Nama Lengkap
                            </label>

                            <div class="input-box">

                                <i class="fas fa-user"></i>

                                <input
                                    type="text"
                                    class="form-control"
                                    value="{{ $pendonor->user->nama ?? '-' }}"
                                    readonly
                                >

                            </div>

                        </div>


                        <div class="form-group">

                            <label>
                                Status
                            </label>

                            <div class="input-box">

                                <i class="fas fa-id-badge"></i>

                                <input
                                    type="text"
                                    class="form-control"
                                    value="{{ $pendonor->status ?? '-' }}"
                                    readonly
                                >

                            </div>

                        </div>


                        <div class="form-group">

                            <label>
                                Kelas / Jabatan
                            </label>

                            <div class="input-box">

                                <i class="fas fa-graduation-cap"></i>

                                <input
                                    type="text"
                                    class="form-control"
                                    value="{{ $pendonor->kelas_jabatan ?? '-' }}"
                                    readonly
                                >

                            </div>

                        </div>


                        <div class="form-group">

                            <label>
                                Umur
                            </label>

                            <div class="input-box">

                                <i class="fas fa-birthday-cake"></i>

                                <input
                                    type="text"
                                    class="form-control"
                                    value="{{ $pendonor->tanggal_lahir ? \Carbon\Carbon::parse($pendonor->tanggal_lahir)->age . ' Tahun' : '-' }}"
                                    readonly
                                >

                            </div>

                        </div>


                        <div class="form-group">

                            <label>
                                Golongan Darah
                            </label>

                            <div class="input-box blood-input">

                                <i class="fas fa-tint"></i>

                                <input
                                    type="text"
                                    class="form-control"
                                    value="{{ $pendonor->golongan_darah ?? '-' }}"
                                    readonly
                                >

                            </div>

                        </div>


                        <div class="form-group">

                            <label>
                                Nomor Telepon
                            </label>

                            <div class="input-box">

                                <i class="fas fa-phone"></i>

                                <input
                                    type="text"
                                    class="form-control"
                                    value="{{ $pendonor->nomor_telepon ?? '-' }}"
                                    readonly
                                >

                            </div>

                        </div>


                        <div class="form-group full-width">

                            <label>
                                Informasi Kesehatan
                            </label>

                            <div class="input-box textarea-box">

                                <i class="fas fa-heartbeat"></i>

                                <textarea
                                    class="form-control"
                                    rows="2"
                                    readonly
                                >{{ $pendonor->informasi_kesehatan ?? '-' }}</textarea>

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


                    {{-- Kegiatan Donor --}}

                    <div class="section-heading activity-heading">

                        <div class="section-icon">
                            <i class="fas fa-calendar-alt"></i>
                        </div>

                        <div>

                            <h3>
                                Kegiatan Donor
                            </h3>

                            <p>
                                Kegiatan yang akan kamu ikuti.
                            </p>

                        </div>

                    </div>


                    <div class="activity-card">

                        <div class="activity-name">

                            <div class="activity-icon">
                                <i class="fas fa-tint"></i>
                            </div>

                            <div>

                                <span>
                                    KEGIATAN DONOR
                                </span>

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

                                    <small>
                                        Tanggal
                                    </small>

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

                                    <small>
                                        Waktu
                                    </small>

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

                                    <small>
                                        Lokasi
                                    </small>

                                    <strong>
                                        {{ $kegiatan->lokasi }}
                                    </strong>

                                </div>

                            </div>

                        </div>

                    </div>


                    {{-- Catatan --}}

                    <div class="section-heading note-heading">

                        <div class="section-icon">
                            <i class="fas fa-comment-alt"></i>
                        </div>

                        <div>

                            <h3>
                                Catatan
                            </h3>

                            <p>
                                Tambahkan informasi jika diperlukan.
                            </p>

                        </div>

                    </div>


                    <div class="form-group">

                        <label>
                            Catatan

                            <span class="optional">
                                Opsional
                            </span>
                        </label>

                        <textarea
                            name="catatan"
                            class="form-control note-control"
                            rows="3"
                            placeholder="Tulis catatan atau informasi tambahan..."
                        >{{ old('catatan') }}</textarea>

                    </div>


                    {{-- Konfirmasi --}}

                    <div class="confirmation-box">

                        <div class="confirmation-icon">
                            <i class="fas fa-heart"></i>
                        </div>

                        <div>

                            <strong>
                                Siap untuk berbagi kebaikan?
                            </strong>

                            <p>
                                Pastikan data diri dan informasi kegiatan sudah benar
                                sebelum melakukan pendaftaran donor.
                            </p>

                        </div>

                    </div>


                    <div class="form-footer">

                        <a
                            href="{{ route('pendonor.kegiatan.show', $kegiatan->id_kegiatan) }}"
                            class="btn-back"
                        >
                            <i class="fas fa-arrow-left"></i>
                            Batal
                        </a>


                        <button
                            type="submit"
                            class="btn-submit"
                        >
                            <i class="fas fa-tint"></i>
                            Daftar Sekarang
                        </button>

                    </div>

                </form>

            </div>

        </div>

    </div>

@endsection