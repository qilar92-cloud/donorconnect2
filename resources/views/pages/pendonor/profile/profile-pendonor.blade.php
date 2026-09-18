@extends('layouts.app')

@section('title', 'Profil Saya - DonorConnect')

@push('styles')
    @vite('resources/css/pendonor/profile.css')
@endpush

@section('content')

<div class="profile-page">

    <div class="profile-card">

        {{-- Dekorasi --}}
        <div class="decor decor-one"></div>
        <div class="decor decor-two"></div>
        <div class="decor decor-three"></div>

        {{-- Header --}}
        <div class="profile-header">

            <div class="profile-avatar">
                <i class="fas fa-user"></i>
            </div>

            <h1>
                {{ $user->nama ?? 'Pengguna' }}
            </h1>

            @if(isset($pendonor))

                <span class="profile-badge">
                    <i class="fas fa-heart"></i>
                    Pendonor
                </span>

            @elseif(isset($petugas))

                <span class="profile-badge">
                    <i class="fas fa-user-shield"></i>
                    Petugas PMR
                </span>

            @endif

        </div>

        {{-- Data Profil --}}
        <div class="profile-data">

            @if(isset($pendonor))

                <div class="profile-item">
                    <div class="item-left">
                        <div class="item-icon">
                            <i class="fas fa-user"></i>
                        </div>

                        <div class="item-content">
                            <span>Nama Lengkap</span>
                            <strong>{{ $user->nama ?: '-' }}</strong>
                        </div>
                    </div>

                    <span class="item-number">01</span>
                </div>

                <div class="profile-item">
                    <div class="item-left">
                        <div class="item-icon">
                            <i class="fas fa-envelope"></i>
                        </div>

                        <div class="item-content">
                            <span>Email</span>
                            <strong>{{ $user->email ?: '-' }}</strong>
                        </div>
                    </div>

                    <span class="item-number">02</span>
                </div>

                <div class="profile-item">
                    <div class="item-left">
                        <div class="item-icon">
                            <i class="fas fa-user-tag"></i>
                        </div>

                        <div class="item-content">
                            <span>Status</span>
                            <strong>{{ $pendonor->status ?: '-' }}</strong>
                        </div>
                    </div>

                    <span class="item-number">03</span>
                </div>

                <div class="profile-item">
                    <div class="item-left">
                        <div class="item-icon">
                            <i class="fas fa-graduation-cap"></i>
                        </div>

                        <div class="item-content">
                            <span>Kelas / Jabatan</span>
                            <strong>{{ $pendonor->kelas_jabatan ?: '-' }}</strong>
                        </div>
                    </div>

                    <span class="item-number">04</span>
                </div>

                <div class="profile-item">
                    <div class="item-left">
                        <div class="item-icon">
                            <i class="fas fa-calendar"></i>
                        </div>

                        <div class="item-content">
                            <span>Tanggal Lahir</span>

                            <strong>
                                {{ $pendonor->tanggal_lahir
                                    ? \Carbon\Carbon::parse($pendonor->tanggal_lahir)->format('d F Y')
                                    : '-'
                                }}
                            </strong>
                        </div>
                    </div>

                    <span class="item-number">05</span>
                </div>

                <div class="profile-item">
                    <div class="item-left">
                        <div class="item-icon">
                            <i class="fas fa-tint"></i>
                        </div>

                        <div class="item-content">
                            <span>Golongan Darah</span>
                            <strong>{{ $pendonor->golongan_darah ?: '-' }}</strong>
                        </div>
                    </div>

                    <span class="item-number">06</span>
                </div>

                <div class="profile-item">
                    <div class="item-left">
                        <div class="item-icon">
                            <i class="fas fa-phone"></i>
                        </div>

                        <div class="item-content">
                            <span>No. Telepon</span>
                            <strong>{{ $pendonor->nomor_telepon ?: '-' }}</strong>
                        </div>
                    </div>

                    <span class="item-number">07</span>
                </div>

                <div class="profile-item">
                    <div class="item-left">
                        <div class="item-icon">
                            <i class="fas fa-heartbeat"></i>
                        </div>

                        <div class="item-content">
                            <span>Informasi Kesehatan</span>
                            <strong>{{ $pendonor->informasi_kesehatan ?: '-' }}</strong>
                        </div>
                    </div>

                    <span class="item-number">08</span>
                </div>

            @elseif(isset($petugas))

                <div class="profile-item">
                    <div class="item-left">
                        <div class="item-icon">
                            <i class="fas fa-user"></i>
                        </div>

                        <div class="item-content">
                            <span>Nama Lengkap</span>
                            <strong>{{ $user->nama ?: '-' }}</strong>
                        </div>
                    </div>

                    <span class="item-number">01</span>
                </div>

                <div class="profile-item">
                    <div class="item-left">
                        <div class="item-icon">
                            <i class="fas fa-envelope"></i>
                        </div>

                        <div class="item-content">
                            <span>Email</span>
                            <strong>{{ $user->email ?: '-' }}</strong>
                        </div>
                    </div>

                    <span class="item-number">02</span>
                </div>

                <div class="profile-item">
                    <div class="item-left">
                        <div class="item-icon">
                            <i class="fas fa-user-shield"></i>
                        </div>

                        <div class="item-content">
                            <span>Jabatan</span>
                            <strong>Petugas PMR</strong>
                        </div>
                    </div>

                    <span class="item-number">03</span>
                </div>

                <div class="profile-item">
                    <div class="item-left">
                        <div class="item-icon">
                            <i class="fas fa-id-card"></i>
                        </div>

                        <div class="item-content">
                            <span>ID Petugas</span>
                            <strong>{{ $petugas->id_petugas ?? '-' }}</strong>
                        </div>
                    </div>

                    <span class="item-number">04</span>
                </div>

            @else

                <div class="empty-profile">

                    <div class="empty-icon">
                        <i class="fas fa-info-circle"></i>
                    </div>

                    <div>
                        <strong>Data profil belum tersedia</strong>
                        <span>Informasi profil belum dapat ditampilkan.</span>
                    </div>

                </div>

            @endif

        </div>

        {{-- Tombol --}}
        <div class="profile-footer">

            <a
                href="{{ route('profile.pendonor.edit') }}"
                class="edit-profile-button"
            >
                <i class="fas fa-edit"></i>
                <span>Ubah Profil</span>
            </a>

        </div>

    </div>

</div>

@endsection