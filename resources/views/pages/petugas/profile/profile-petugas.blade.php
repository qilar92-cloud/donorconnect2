@extends('layouts.app')

@section('title', 'Profil Saya - DonorConnect')

@push('styles')
    @vite('resources/css/petugas/profile.css')
@endpush

@section('content')

<div class="profile-page">

    <div class="profile-card">

        {{-- Header --}}
        <div class="profile-top">

            <div class="profile-avatar">
                <i class="fas fa-user"></i>
            </div>

            <h2>{{ $user->nama }}</h2>

            <div class="profile-role">
                <i class="fas fa-shield-alt"></i>
                Petugas PMR
            </div>

        </div>


        {{-- Data Profil --}}
        <div class="profile-body">

            <div class="data-list">

                {{-- Nama --}}
                <div class="data-item">

                    <div class="data-icon">
                        <i class="fas fa-user"></i>
                    </div>

                    <div class="data-text">
                        <span>Nama Lengkap</span>
                        <strong>{{ $user->nama }}</strong>
                    </div>

                    <div class="data-number">
                        01
                    </div>

                </div>


                {{-- Email --}}
                <div class="data-item">

                    <div class="data-icon">
                        <i class="fas fa-envelope"></i>
                    </div>

                    <div class="data-text">
                        <span>Email</span>
                        <strong>{{ $user->email }}</strong>
                    </div>

                    <div class="data-number">
                        02
                    </div>

                </div>


                {{-- Jabatan --}}
                <div class="data-item">

                    <div class="data-icon">
                        <i class="fas fa-user-shield"></i>
                    </div>

                    <div class="data-text">
                        <span>Jabatan</span>
                        <strong>Petugas PMR</strong>
                    </div>

                    <div class="data-number">
                        03
                    </div>

                </div>


                {{-- ID Petugas --}}
                <div class="data-item">

                    <div class="data-icon">
                        <i class="fas fa-id-card"></i>
                    </div>

                    <div class="data-text">
                        <span>ID Petugas</span>
                        <strong>{{ $petugas->id_petugas }}</strong>
                    </div>

                    <div class="data-number">
                        04
                    </div>

                </div>

            </div>

        </div>


        {{-- Tombol --}}
        <div class="profile-footer">

            <a
                href="{{ route('profile.petugas.edit') }}"
                class="edit-button"
            >
                <i class="fas fa-edit"></i>
                Ubah Profil
            </a>

        </div>

    </div>

</div>

@endsection