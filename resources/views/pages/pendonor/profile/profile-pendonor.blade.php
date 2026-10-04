@extends('layouts.pendonor')

@section('title', 'Profil Saya - DonorConnect')

@push('styles')
    @vite('resources/css/pendonor/profile.css')
@endpush

@section('content')

<div class="profile-page">

    {{-- Notifikasi --}}
    @if (session('success') || session('error') || $errors->any())

        <div
            class="profile-notification-overlay"
            id="profileNotification"
        >

            <div
                class="profile-notification
                {{ session('error') || $errors->any()
                    ? 'notification-error'
                    : 'notification-success' }}"
            >

                {{-- Tombol tutup --}}
                <button
                    type="button"
                    class="notification-close"
                    onclick="tutupNotifikasiProfil()"
                    aria-label="Tutup notifikasi"
                    title="Tutup"
                >
                    <i class="fas fa-times"></i>
                </button>


                {{-- Icon --}}
                <div class="notification-icon">

                    @if (session('error') || $errors->any())

                        <i class="fas fa-exclamation"></i>

                    @else

                        <i class="fas fa-check"></i>

                    @endif

                </div>


                {{-- Isi --}}
                <div class="notification-content">

                    @if (session('error'))

                        <strong>
                            Gagal!
                        </strong>

                        <p>
                            {{ session('error') }}
                        </p>

                    @elseif ($errors->any())

                        <strong>
                            Data Belum Benar
                        </strong>

                        <p>
                            {{ $errors->first() }}
                        </p>

                    @else

                        <strong>
                            Berhasil!
                        </strong>

                        <p>
                            {{ session('success') }}
                        </p>

                    @endif

                </div>


                {{-- Tombol OK --}}
                <button
                    type="button"
                    class="notification-button"
                    onclick="tutupNotifikasiProfil()"
                >
                    OK
                </button>

            </div>

        </div>

    @endif


    {{-- Card Profil --}}
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

            <span class="profile-badge">

                <i class="fas fa-heart"></i>

                Pendonor

            </span>

        </div>


        {{-- Data Profil --}}
        <div class="profile-data">

            @if(isset($pendonor))

                {{-- 01. Nama --}}
                <div class="profile-item">

                    <div class="item-left">

                        <div class="item-icon">
                            <i class="fas fa-user"></i>
                        </div>

                        <div class="item-content">

                            <span>
                                Nama Lengkap
                            </span>

                            <strong>
                                {{ $user->nama ?: '-' }}
                            </strong>

                        </div>

                    </div>

                    <span class="item-number">
                        01
                    </span>

                </div>


                {{-- 02. Email --}}
                <div class="profile-item">

                    <div class="item-left">

                        <div class="item-icon">
                            <i class="fas fa-envelope"></i>
                        </div>

                        <div class="item-content">

                            <span>
                                Email
                            </span>

                            <strong>
                                {{ $user->email ?: '-' }}
                            </strong>

                        </div>

                    </div>

                    <span class="item-number">
                        02
                    </span>

                </div>


                {{-- 03. Status --}}
                <div class="profile-item">

                    <div class="item-left">

                        <div class="item-icon">
                            <i class="fas fa-user-tag"></i>
                        </div>

                        <div class="item-content">

                            <span>
                                Status
                            </span>

                            <strong>
                                {{ $pendonor->status ?: '-' }}
                            </strong>

                        </div>

                    </div>

                    <span class="item-number">
                        03
                    </span>

                </div>


                {{-- 04. Kelas / Jabatan --}}
                <div class="profile-item">

                    <div class="item-left">

                        <div class="item-icon">
                            <i class="fas fa-graduation-cap"></i>
                        </div>

                        <div class="item-content">

                            <span>
                                Kelas / Jabatan
                            </span>

                            <strong>
                                {{ $pendonor->kelas_jabatan ?: '-' }}
                            </strong>

                        </div>

                    </div>

                    <span class="item-number">
                        04
                    </span>

                </div>


                {{-- 05. Tanggal Lahir --}}
                <div class="profile-item">

                    <div class="item-left">

                        <div class="item-icon">
                            <i class="fas fa-calendar"></i>
                        </div>

                        <div class="item-content">

                            <span>
                                Tanggal Lahir
                            </span>

                            <strong>

                                @if($pendonor->tanggal_lahir)

                                    {{ \Carbon\Carbon::parse($pendonor->tanggal_lahir)->format('d F Y') }}

                                @else

                                    -

                                @endif

                            </strong>

                        </div>

                    </div>

                    <span class="item-number">
                        05
                    </span>

                </div>


                {{-- 06. Golongan Darah --}}
                <div class="profile-item">

                    <div class="item-left">

                        <div class="item-icon">
                            <i class="fas fa-tint"></i>
                        </div>

                        <div class="item-content">

                            <span>
                                Golongan Darah
                            </span>

                            <strong>
                                {{ $pendonor->golongan_darah ?: '-' }}
                            </strong>

                        </div>

                    </div>

                    <span class="item-number">
                        06
                    </span>

                </div>


                {{-- 07. Nomor Telepon --}}
                <div class="profile-item">

                    <div class="item-left">

                        <div class="item-icon">
                            <i class="fas fa-phone"></i>
                        </div>

                        <div class="item-content">

                            <span>
                                No. Telepon
                            </span>

                            <strong>
                                {{ $pendonor->nomor_telepon ?: '-' }}
                            </strong>

                        </div>

                    </div>

                    <span class="item-number">
                        07
                    </span>

                </div>


                {{-- 08. Informasi Kesehatan --}}
                <div class="profile-item">

                    <div class="item-left">

                        <div class="item-icon">
                            <i class="fas fa-heartbeat"></i>
                        </div>

                        <div class="item-content">

                            <span>
                                Informasi Kesehatan
                            </span>

                            <strong>
                                {{ $pendonor->informasi_kesehatan ?: '-' }}
                            </strong>

                        </div>

                    </div>

                    <span class="item-number">
                        08
                    </span>

                </div>


            @else

                {{-- Data tidak tersedia --}}
                <div class="empty-profile">

                    <div class="empty-icon">
                        <i class="fas fa-info-circle"></i>
                    </div>

                    <div>

                        <strong>
                            Data profil belum tersedia
                        </strong>

                        <span>
                            Informasi profil belum dapat ditampilkan.
                        </span>

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

                <span>
                    Ubah Profil
                </span>

            </a>

        </div>

    </div>

</div>

@endsection


@push('scripts')

<script>

    // Tutup notifikasi
    function tutupNotifikasiProfil() {

        const notification =
            document.getElementById('profileNotification');

        if (!notification) {
            return;
        }

        notification.classList.add('notification-hide');

        setTimeout(function () {

            notification.remove();

        }, 300);

    }


    // Notifikasi otomatis hilang
    document.addEventListener('DOMContentLoaded', function () {

        const notification =
            document.getElementById('profileNotification');

        if (!notification) {
            return;
        }

        setTimeout(function () {

            tutupNotifikasiProfil();

        }, 4500);

    });

</script>

@endpush

