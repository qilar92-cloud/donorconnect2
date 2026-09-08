@extends('layouts.app')

@section('title', 'Profil Saya - DonorConnect')

@section('content')

<div class="container-fluid">

    <div class="mb-4">
        <h1 class="h3 mb-2" style="font-weight: 800; color: #27324a;">
            Profil Saya
        </h1>

        @if(isset($pendonor))
            <p class="mb-0 text-muted">
                Informasi data pribadi pendonor.
            </p>
        @else
            <p class="mb-0 text-muted">
                Informasi data pribadi petugas PMR.
            </p>
        @endif
    </div>

    <div class="card border-0 shadow-sm profile-card">

        <div class="card-header bg-white profile-header">

            <div class="d-flex align-items-center">

                <div class="profile-header-icon">
                    <i class="fas fa-user"></i>
                </div>

                <div class="ml-3">

                    <h5 class="mb-1 profile-title">
                        Informasi Profil
                    </h5>

                    @if(isset($pendonor))
                        <small class="text-muted">
                            Data Pendonor
                        </small>
                    @else
                        <small class="text-muted">
                            Data Petugas PMR
                        </small>
                    @endif

                </div>

            </div>

        </div>

        <div class="card-body profile-body">

            <div class="row">

                <div class="col-md-4 text-center">

                    <div class="profile-avatar">
                        <i class="fas fa-user"></i>
                    </div>

                    @if(isset($pendonor))

                        <h4 class="profile-name">
                            {{ $user->nama }}
                        </h4>

                        <span class="profile-role">
                            PENDONOR
                        </span>

                    @else

                        <h4 class="profile-name">
                            {{ $user->nama }}
                        </h4>

                        <span class="profile-role">
                            PETUGAS PMR
                        </span>

                    @endif

                </div>

                <div class="col-md-8">

                    @if(isset($pendonor))

                        <div class="profile-item">
                            <div class="profile-icon">
                                <i class="fas fa-user"></i>
                            </div>

                            <div>
                                <small>Nama Lengkap</small>
                                <strong>{{ $user->nama }}</strong>
                            </div>
                        </div>

                        <div class="profile-item">
                            <div class="profile-icon">
                                <i class="fas fa-envelope"></i>
                            </div>

                            <div>
                                <small>Email</small>
                                <strong>{{ $user->email }}</strong>
                            </div>
                        </div>

                        <div class="profile-item">
                            <div class="profile-icon">
                                <i class="fas fa-user-tag"></i>
                            </div>

                            <div>
                                <small>Status</small>
                                <strong>{{ $pendonor->status }}</strong>
                            </div>
                        </div>

                        <div class="profile-item">
                            <div class="profile-icon">
                                <i class="fas fa-graduation-cap"></i>
                            </div>

                            <div>
                                <small>Kelas / Jabatan</small>
                                <strong>{{ $pendonor->kelas_jabatan }}</strong>
                            </div>
                        </div>

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

                        <div class="profile-item">
                            <div class="profile-icon">
                                <i class="fas fa-tint"></i>
                            </div>

                            <div>
                                <small>Golongan Darah</small>
                                <strong>{{ $pendonor->golongan_darah }}</strong>
                            </div>
                        </div>

                        <div class="profile-item">
                            <div class="profile-icon">
                                <i class="fas fa-phone"></i>
                            </div>

                            <div>
                                <small>No. Telepon</small>
                                <strong>{{ $pendonor->nomor_telepon }}</strong>
                            </div>
                        </div>

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

                        <div class="profile-item">
                            <div class="profile-icon">
                                <i class="fas fa-user"></i>
                            </div>

                            <div>
                                <small>Nama Lengkap</small>
                                <strong>{{ $user->nama }}</strong>
                            </div>
                        </div>

                        <div class="profile-item">
                            <div class="profile-icon">
                                <i class="fas fa-envelope"></i>
                            </div>

                            <div>
                                <small>Email</small>
                                <strong>{{ $user->email }}</strong>
                            </div>
                        </div>

                        <div class="profile-item">
                            <div class="profile-icon">
                                <i class="fas fa-user-shield"></i>
                            </div>

                            <div>
                                <small>Jabatan</small>
                                <strong>Petugas PMR</strong>
                            </div>
                        </div>

                        <div class="profile-item">
                            <div class="profile-icon">
                                <i class="fas fa-id-card"></i>
                            </div>

                            <div>
                                <small>ID Petugas</small>
                                <strong>{{ $petugas->id_petugas }}</strong>
                            </div>
                        </div>

                    @else

                        <div class="empty-profile">
                            <i class="fas fa-info-circle"></i>
                            <span>Data petugas belum tersedia.</span>
                        </div>

                    @endif

                </div>

            </div>

        </div>

        <div class="card-footer bg-white profile-footer">

            <a href="{{ route('profile.edit') }}" class="btn profile-button">
                <i class="fas fa-edit mr-2"></i>
                Ubah Profil
            </a>

        </div>

    </div>

</div>

@endsection

@push('styles')
<style>

.profile-card {
    border-radius: 20px;
    overflow: hidden;
}

.profile-header {
    padding: 24px 28px;
    border-bottom: 1px solid #f0e5eb;
}

.profile-header-icon {
    width: 58px;
    height: 58px;
    border-radius: 15px;
    background: linear-gradient(135deg, #a80e2c, #d94b91);
    color: white;
    display: flex;
    align-items: center;
    justify-content: center;
    font-size: 24px;
}

.profile-title {
    font-weight: 800;
    color: #27324a;
}

.profile-body {
    padding: 45px;
}

.profile-avatar {
    width: 145px;
    height: 145px;
    border-radius: 50%;
    margin: 10px auto 22px;
    background: linear-gradient(135deg, #a80e2c, #d94b91);
    color: white;
    display: flex;
    align-items: center;
    justify-content: center;
    font-size: 65px;
    box-shadow: 0 12px 28px rgba(168, 14, 44, 0.20);
}

.profile-name {
    color: #27324a;
    font-weight: 800;
    margin-bottom: 10px;
}

.profile-role {
    display: inline-block;
    padding: 7px 18px;
    border-radius: 20px;
    background: #fce7ef;
    color: #a80e2c;
    font-size: 12px;
    font-weight: 800;
}

.profile-item {
    display: flex;
    align-items: center;
    gap: 15px;
    padding: 14px 0;
    border-bottom: 1px solid #f3e9ee;
}

.profile-item:last-child {
    border-bottom: none;
}

.profile-icon {
    width: 40px;
    height: 40px;
    min-width: 40px;
    border-radius: 11px;
    background: #fce7ef;
    color: #c91845;
    display: flex;
    align-items: center;
    justify-content: center;
}

.profile-item small {
    display: block;
    color: #999;
    font-size: 12px;
    margin-bottom: 3px;
}

.profile-item strong {
    display: block;
    color: #3d465a;
    font-size: 14px;
    font-weight: 700;
}

.empty-profile {
    background: #fff7f5;
    border: 1px solid #f0dfe5;
    border-radius: 12px;
    padding: 18px;
    color: #777;
}

.empty-profile i {
    color: #c91845;
    margin-right: 8px;
}

.profile-footer {
    padding: 22px 28px;
    border-top: 1px solid #f0e5eb;
}

.profile-button {
    background: linear-gradient(135deg, #a80e2c, #d94b91);
    color: white;
    border: none;
    border-radius: 11px;
    padding: 11px 22px;
    font-weight: 700;
}

.profile-button:hover {
    color: white;
    opacity: 0.92;
}

@media (max-width: 768px) {

    .profile-body {
        padding: 25px;
    }

    .profile-avatar {
        width: 125px;
        height: 125px;
        font-size: 55px;
    }

}

</style>
@endpush