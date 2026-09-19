@extends('layouts.app')

@section('title', 'Daftar Kegiatan Donor')

@push('styles')
    @vite('resources/css/pendonor/pendaftaran-daftar.css')
@endpush

@section('content')

<div class="pendaftaran-page">

    <div class="pendaftaran-card">

        {{-- Header --}}
        <div class="form-header">

            <div class="header-text">
                <h1>Daftar sebagai Pendonor</h1>
                <p>Periksa data diri dan kegiatan donor sebelum mendaftar.</p>
            </div>

            <a href="{{ route('pendonor.kegiatan.show', $kegiatan->id_kegiatan) }}"
               class="btn-kembali">
                <i class="fas fa-arrow-left"></i>
                <span>Kembali</span>
            </a>

        </div>

        <form action="{{ route('pendaftaran-donor.store') }}" method="POST">

            @csrf

            <input type="hidden"
                   name="id_kegiatan"
                   value="{{ $kegiatan->id_kegiatan }}">

            {{-- Data Pendonor --}}
            <section class="form-section">

                <div class="section-title">

                    <div class="section-icon">
                        <i class="fas fa-user"></i>
                    </div>

                    <div>
                        <h2>Data Pendonor</h2>
                        <p>Pastikan data diri kamu sudah benar.</p>
                    </div>

                </div>

                <div class="data-grid">

                    <div class="data-item">
                        <span>Nama Lengkap</span>
                        <strong>
                            {{ $pendonor->user->nama ?? '-' }}
                        </strong>
                    </div>

                    <div class="data-item">
                        <span>Status</span>
                        <strong>
                            {{ $pendonor->status ?? '-' }}
                        </strong>
                    </div>

                    <div class="data-item">
                        <span>Kelas / Jabatan</span>
                        <strong>
                            {{ $pendonor->kelas_jabatan ?? '-' }}
                        </strong>
                    </div>

                    <div class="data-item">
                        <span>Usia</span>
                        <strong>
                            {{ $pendonor->tanggal_lahir
                                ? \Carbon\Carbon::parse($pendonor->tanggal_lahir)->age . ' Tahun'
                                : '-' }}
                        </strong>
                    </div>

                    <div class="data-item">
                        <span>Golongan Darah</span>
                        <strong>
                            {{ $pendonor->golongan_darah ?? '-' }}
                        </strong>
                    </div>

                    <div class="data-item">
                        <span>No. Telepon</span>
                        <strong>
                            {{ $pendonor->nomor_telepon ?? '-' }}
                        </strong>
                    </div>

                    <div class="data-item data-full">
                        <span>Informasi Kesehatan</span>
                        <strong>
                            {{ $pendonor->informasi_kesehatan ?? '-' }}
                        </strong>
                    </div>

                </div>

            </section>


            {{-- Kegiatan --}}
            <section class="form-section">

                <div class="section-title">

                    <div class="section-icon event-icon">
                        <i class="fas fa-calendar-alt"></i>
                    </div>

                    <div>
                        <h2>Kegiatan Donor</h2>
                        <p>Informasi kegiatan yang akan kamu ikuti.</p>
                    </div>

                </div>


                <div class="event-box">

                    <div class="event-name">

                        <span>Nama Kegiatan</span>

                        <h3>
                            {{ $kegiatan->nama_kegiatan }}
                        </h3>

                    </div>


                    <div class="event-details">

                        <div class="event-detail">

                            <div class="detail-icon">
                                <i class="far fa-calendar"></i>
                            </div>

                            <div>
                                <span>Tanggal</span>
                                <strong>
                                    {{ $kegiatan->tanggal->format('d M Y') }}
                                </strong>
                            </div>

                        </div>


                        <div class="event-detail">

                            <div class="detail-icon">
                                <i class="far fa-clock"></i>
                            </div>

                            <div>
                                <span>Waktu</span>
                                <strong>
                                    {{ $kegiatan->waktu }}
                                </strong>
                            </div>

                        </div>


                        <div class="event-detail">

                            <div class="detail-icon">
                                <i class="fas fa-map-marker-alt"></i>
                            </div>

                            <div>
                                <span>Lokasi</span>
                                <strong>
                                    {{ $kegiatan->lokasi }}
                                </strong>
                            </div>

                        </div>

                    </div>

                </div>

            </section>


            {{-- Catatan --}}
            <section class="form-section catatan-section">

                <div class="section-title">

                    <div class="section-icon note-icon">
                        <i class="far fa-edit"></i>
                    </div>

                    <div>
                        <h2>Catatan</h2>
                        <p>Tambahkan catatan jika diperlukan.</p>
                    </div>

                </div>


                <textarea
                    name="catatan"
                    class="catatan-input"
                    rows="3"
                    placeholder="Tulis catatan tambahan (opsional)...">{{ old('catatan') }}</textarea>

            </section>


            {{-- Tombol --}}
            <div class="form-actions">

                <a href="{{ route('pendonor.kegiatan.show', $kegiatan->id_kegiatan) }}"
                   class="btn-batal">
                    Batal
                </a>

                <button type="submit" class="btn-daftar">
                    <i class="fas fa-check"></i>
                    Daftar Sekarang
                </button>

            </div>

        </form>

    </div>

</div>

@endsection