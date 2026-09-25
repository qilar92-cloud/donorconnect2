@extends('layouts.app')

@section('title', 'Detail Pendonor')

@push('styles')
    @vite('resources/css/pendonor/data-show.css')
@endpush

@section('content')

    <div class="pendonor-page">

        <div class="detail-card">

            {{-- Header --}}

            <div class="detail-header">

                <small>
                    <i class="fas fa-users"></i>
                    Data Pendonor
                </small>

                <h1>
                    Detail Pendonor
                </h1>

                <p>
                    Informasi pendonor yang tersimpan dalam sistem.
                </p>

            </div>


            {{-- Profil --}}

            <div class="profile-section">

                <div class="profile-main">

                    <div class="avatar">
                        {{ strtoupper(substr($pendonor->user->nama ?? 'P', 0, 1)) }}
                    </div>

                    <div class="profile-info">

                        <span class="profile-label">
                            Pendonor
                        </span>

                        <h2>
                            {{ $pendonor->user->nama ?? '-' }}
                        </h2>

                        <div class="profile-email">
                            {{ $pendonor->user->email ?? '-' }}
                        </div>

                    </div>

                </div>


                <div class="profile-badges">

                    @if ($pendonor->status)

                        <span class="badge badge-status">
                            <i class="fas fa-user"></i>
                            {{ $pendonor->status }}
                        </span>

                    @endif

                    @if ($pendonor->golongan_darah)

                        <span class="badge badge-blood">
                            <i class="fas fa-tint"></i>
                            Gol. {{ $pendonor->golongan_darah }}
                        </span>

                    @endif

                </div>

            </div>


            {{-- Informasi --}}

            <div class="information">

                <div class="section-title">

                    <h3>
                        Informasi Pendonor
                    </h3>

                    <span>
                        ID #{{ $pendonor->id_pendonor }}
                    </span>

                </div>


                <div class="data-grid">

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


            {{-- Tombol --}}

            <div class="card-footer">

                <a
                    href="{{ route('pendonor.index') }}"
                    class="btn btn-back"
                >
                    <i class="fas fa-arrow-left"></i>
                    Kembali
                </a>

                <a
                    href="{{ route('pendonor.edit', $pendonor->id_pendonor) }}"
                    class="btn btn-edit"
                >
                    <i class="fas fa-pen"></i>
                    Edit Data
                </a>

            </div>

        </div>

    </div>

@endsection