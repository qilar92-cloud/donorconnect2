@extends('layouts.app')

@section('title', 'Detail Pendonor')

@push('styles')
    @vite('resources/css/pendonor/data-show.css')
@endpush

@section('content')

<div class="pendonor-page">

    <div class="detail-card">

        {{-- HEADER --}}

        <div class="detail-header">

            <div class="header-label">
                <i class="fas fa-users"></i>
                <span>Data Pendonor</span>
            </div>

            <div class="header-row">

                <div>
                    <h1>Detail Pendonor</h1>

                    <p>
                        Informasi pendonor yang tersimpan dalam sistem.
                    </p>
                </div>

                <div class="header-id">
                    ID #{{ $pendonor->id_pendonor }}
                </div>

            </div>

        </div>


        {{-- INFORMASI --}}

        <div class="information">

            <div class="section-title">

                <div>
                    <h3>Informasi Pendonor</h3>

                    <p>
                        Data lengkap pendonor yang tersimpan pada sistem.
                    </p>
                </div>

            </div>


            <div class="data-grid">

                {{-- NAMA --}}

                <div class="data-item">

                    <div class="data-icon">
                        <i class="fas fa-user"></i>
                    </div>

                    <div class="data-content">

                        <label>Nama Lengkap</label>

                        <p>
                            {{ $pendonor->user->nama ?? '-' }}
                        </p>

                    </div>

                </div>


                {{-- USERNAME --}}

                <div class="data-item">

                    <div class="data-icon">
                        <i class="fas fa-at"></i>
                    </div>

                    <div class="data-content">

                        <label>Username</label>

                        <p>
                            {{ $pendonor->user->username ?? '-' }}
                        </p>

                    </div>

                </div>


                {{-- EMAIL --}}

                <div class="data-item">

                    <div class="data-icon">
                        <i class="fas fa-envelope"></i>
                    </div>

                    <div class="data-content">

                        <label>Email</label>

                        <p>
                            {{ $pendonor->user->email ?? '-' }}
                        </p>

                    </div>

                </div>


                {{-- STATUS --}}

                <div class="data-item">

                    <div class="data-icon">
                        <i class="fas fa-user-check"></i>
                    </div>

                    <div class="data-content">

                        <label>Status</label>

                        <p class="{{ !$pendonor->status ? 'empty' : '' }}">
                            {{ $pendonor->status ?? '-' }}
                        </p>

                    </div>

                </div>


                {{-- KELAS / JABATAN --}}

                <div class="data-item">

                    <div class="data-icon">
                        <i class="fas fa-graduation-cap"></i>
                    </div>

                    <div class="data-content">

                        <label>Kelas / Jabatan</label>

                        <p class="{{ !$pendonor->kelas_jabatan ? 'empty' : '' }}">
                            {{ $pendonor->kelas_jabatan ?? '-' }}
                        </p>

                    </div>

                </div>


                {{-- TANGGAL LAHIR --}}

                <div class="data-item">

                    <div class="data-icon">
                        <i class="fas fa-calendar-alt"></i>
                    </div>

                    <div class="data-content">

                        <label>Tanggal Lahir</label>

                        <p class="{{ !$pendonor->tanggal_lahir ? 'empty' : '' }}">
                            {{ $pendonor->tanggal_lahir
                                ? $pendonor->tanggal_lahir->format('d M Y')
                                : '-'
                            }}
                        </p>

                    </div>

                </div>


                {{-- GOLONGAN DARAH --}}

                <div class="data-item">

                    <div class="data-icon">
                        <i class="fas fa-tint"></i>
                    </div>

                    <div class="data-content">

                        <label>Golongan Darah</label>

                        <p class="{{ !$pendonor->golongan_darah ? 'empty' : '' }}">
                            {{ $pendonor->golongan_darah ?? '-' }}
                        </p>

                    </div>

                </div>


                {{-- NO TELEPON --}}

                <div class="data-item">

                    <div class="data-icon">
                        <i class="fas fa-phone"></i>
                    </div>

                    <div class="data-content">

                        <label>No. Telepon</label>

                        <p class="{{ !$pendonor->nomor_telepon ? 'empty' : '' }}">
                            {{ $pendonor->nomor_telepon ?? '-' }}
                        </p>

                    </div>

                </div>


                {{-- INFORMASI KESEHATAN --}}

                <div class="data-item health-item">

                    <div class="data-icon">
                        <i class="fas fa-heartbeat"></i>
                    </div>

                    <div class="data-content">

                        <label>Informasi Kesehatan</label>

                        <p class="{{ !$pendonor->informasi_kesehatan ? 'empty' : '' }}">
                            {{ $pendonor->informasi_kesehatan ?? '-' }}
                        </p>

                    </div>

                </div>

            </div>

        </div>


        {{-- FOOTER --}}

        <div class="card-footer">

            <a
                href="{{ route('pendonor.index') }}"
                class="btn btn-back"
            >
                <i class="fas fa-arrow-left"></i>
                <span>Kembali</span>
            </a>

            <a
                href="{{ route('pendonor.edit', $pendonor->id_pendonor) }}"
                class="btn btn-edit"
            >
                <i class="fas fa-pen"></i>
                <span>Edit Data</span>
            </a>

        </div>

    </div>

</div>

@endsection