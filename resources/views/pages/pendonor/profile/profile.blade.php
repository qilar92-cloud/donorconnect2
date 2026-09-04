@extends('layouts.app')

@section('title', 'Profil Saya - DonorConnect')

@section('content')

<div class="container-fluid">

    <!-- Header -->
    <div class="mb-4">
        <h1 class="h3 mb-1" style="font-weight: 800; color: #27324a;">
            Profil Saya
        </h1>

        @if(isset($pendonor))
            <p class="mb-0 text-muted">
                Informasi data pribadi dan profil pendonor.
            </p>
        @else
            <p class="mb-0 text-muted">
                Informasi data pribadi dan profil petugas PMR.
            </p>
        @endif
    </div>

    <!-- Card Profil -->
    <div class="card border-0 shadow-sm" style="border-radius: 18px; overflow: hidden;">

        <!-- Card Header -->
        <div class="card-header bg-white py-4 px-4"
             style="border-bottom: 1px solid #f0e5eb;">

            <div class="d-flex align-items-center">

                <div style="
                    width: 58px;
                    height: 58px;
                    border-radius: 14px;
                    background: linear-gradient(135deg, #a80e2c, #d94b91);
                    display: flex;
                    align-items: center;
                    justify-content: center;
                    color: white;
                    font-size: 24px;
                ">
                    <i class="fas fa-user"></i>
                </div>

                <div class="ml-3">
                    <h5 class="mb-1" style="font-weight: 800; color: #27324a;">
                        Informasi Profil
                    </h5>

                    @if(isset($pendonor))
                        <small class="text-muted">Data Pendonor</small>
                    @else
                        <small class="text-muted">Data Petugas PMR</small>
                    @endif
                </div>

            </div>

        </div>

        <!-- Isi Profil -->
        <div class="card-body p-4 p-md-5">

            <div class="row align-items-center">

                <!-- Foto Profil -->
                <div class="col-md-4 text-center mb-4 mb-md-0">

                    <div style="
                        width: 145px;
                        height: 145px;
                        border-radius: 50%;
                        background: linear-gradient(135deg, #a80e2c, #d94b91);
                        display: flex;
                        align-items: center;
                        justify-content: center;
                        margin: 0 auto 20px;
                        box-shadow: 0 10px 25px rgba(168, 14, 44, 0.20);
                    ">
                        <i class="fas fa-user"
                           style="font-size: 65px; color: white;"></i>
                    </div>

                    @if(isset($pendonor))

                        <h5 style="
                            font-weight: 800;
                            color: #27324a;
                            margin-bottom: 8px;
                        ">
                            {{ $pendonor->user->nama }}
                        </h5>

                        <span style="
                            display: inline-block;
                            padding: 6px 16px;
                            border-radius: 20px;
                            background: #fce7ef;
                            color: #a80e2c;
                            font-size: 12px;
                            font-weight: 700;
                        ">
                            PENDONOR
                        </span>

                    @else

                        <h5 style="
                            font-weight: 800;
                            color: #27324a;
                            margin-bottom: 8px;
                        ">
                            {{ $petugas->user->nama }}
                        </h5>

                        <span style="
                            display: inline-block;
                            padding: 6px 16px;
                            border-radius: 20px;
                            background: #fce7ef;
                            color: #a80e2c;
                            font-size: 12px;
                            font-weight: 700;
                        ">
                            PETUGAS PMR
                        </span>

                    @endif

                </div>

                <!-- Detail -->
                <div class="col-md-8">

                    @if(isset($pendonor))

                        <!-- Nama -->
                        <div class="profile-item">
                            <div class="profile-icon">
                                <i class="fas fa-user"></i>
                            </div>

                            <div>
                                <small>Nama Lengkap</small>
                                <strong>{{ $pendonor->user->nama }}</strong>
                            </div>
                        </div>

                        <!-- Email -->
                        <div class="profile-item">
                            <div class="profile-icon">
                                <i class="fas fa-envelope"></i>
                            </div>

                            <div>
                                <small>Email</small>
                                <strong>{{ $pendonor->user->email }}</strong>
                            </div>
                        </div>

                        <!-- Status -->
                        <div class="profile-item">
                            <div class="profile-icon">
                                <i class="fas fa-user-tag"></i>
                            </div>

                            <div>
                                <small>Status</small>
                                <strong>{{ $pendonor->status }}</strong>
                            </div>
                        </div>

                        <!-- Kelas -->
                        <div class="profile-item">
                            <div class="profile-icon">
                                <i class="fas fa-graduation-cap"></i>
                            </div>

                            <div>
                                <small>Kelas / Jabatan</small>
                                <strong>{{ $pendonor->kelas_jabatan }}</strong>
                            </div>
                        </div>

                        <!-- Tanggal Lahir -->
                        <div class="profile-item">
                            <div class="profile-icon">
                                <i class="fas fa-calendar"></i>
                            </div>

                            <div>
                                <small>Tanggal Lahir</small>
                                <strong>
                                    {{ optional($pendonor->tanggal_lahir)->format('d F Y') }}
                                </strong>
                            </div>
                        </div>

                        <!-- Golongan Darah -->
                        <div class="profile-item">
                            <div class="profile-icon">
                                <i class="fas fa-tint"></i>
                            </div>

                            <div>
                                <small>Golongan Darah</small>
                                <strong>{{ $pendonor->golongan_darah }}</strong>
                            </div>
                        </div>

                        <!-- Telepon -->
                        <div class="profile-item">
                            <div class="profile-icon">
                                <i class="fas fa-phone"></i>
                            </div>

                            <div>
                                <small>No. Telepon</small>
                                <strong>{{ $pendonor->nomor_telepon }}</strong>
                            </div>
                        </div>

                        <!-- Kesehatan -->
                        <div class="profile-item">
                            <div class="profile-icon">
                                <i class="fas fa-heartbeat"></i>
                            </div>

                            <div>
                                <small>Informasi Kesehatan</small>
                                <strong>{{ $pendonor->informasi_kesehatan }}</strong>
                            </div>
                        </div>

                    @elseif(isset($petugas))

                        <!-- Nama -->
                        <div class="profile-item">
                            <div class="profile-icon">
                                <i class="fas fa-user"></i>
                            </div>

                            <div>
                                <small>Nama Lengkap</small>
                                <strong>{{ $petugas->user->nama }}</strong>
                            </div>
                        </div>

                        <!-- Email -->
                        <div class="profile-item">
                            <div class="profile-icon">
                                <i class="fas fa-envelope"></i>
                            </div>

                            <div>
                                <small>Email</small>
                                <strong>{{ $petugas->user->email }}</strong>
                            </div>
                        </div>

                        <!-- Jabatan -->
                        <div class="profile-item">
                            <div class="profile-icon">
                                <i class="fas fa-user-shield"></i>
                            </div>

                            <div>
                                <small>Jabatan</small>
                                <strong>Petugas PMR</strong>
                            </div>
                        </div>

                        <!-- ID Petugas -->
                        <div class="profile-item">
                            <div class="profile-icon">
                                <i class="fas fa-id-card"></i>
                            </div>

                            <div>
                                <small>ID Petugas</small>
                                <strong>{{ $petugas->id_petugas }}</strong>
                            </div>
                        </div>

                    @endif

                </div>

            </div>

        </div>

        <!-- Footer -->
        <div class="card-footer bg-white px-4 py-4"
             style="border-top: 1px solid #f0e5eb;">

            <a href="{{ route('profile.edit') }}"
               class="btn"
               style="
                    background: linear-gradient(135deg, #a80e2c, #d94b91);
                    color: white;
                    border: none;
                    border-radius: 10px;
                    padding: 11px 22px;
                    font-weight: 700;
               ">
                <i class="fas fa-edit mr-2"></i>
                Ubah Profil
            </a>

        </div>

    </div>

</div>

@endsection

@push('styles')
<style>

.profile-item {
    display: flex;
    align-items: flex-start;
    gap: 15px;
    padding: 14px 0;
    border-bottom: 1px solid #f3e9ee;
}

.profile-item:last-child {
    border-bottom: none;
}

.profile-icon {
    width: 38px;
    height: 38px;
    min-width: 38px;
    border-radius: 10px;
    background: #fce7ef;
    color: #c91845;
    display: flex;
    align-items: center;
    justify-content: center;
}

.profile-item small {
    display: block;
    color: #9a9a9a;
    font-size: 12px;
    margin-bottom: 3px;
}

.profile-item strong {
    display: block;
    color: #3d465a;
    font-size: 14px;
    font-weight: 700;
}

@media (max-width: 768px) {

    .profile-item {
        padding: 12px 0;
    }

}

</style>
@endpush