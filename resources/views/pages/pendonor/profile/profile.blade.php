@extends('layouts.app')

@section('title', 'Profil Saya - DonorConnect')

@section('content')

<div class="profile-page">

    <div class="page-title">
        <h1>Profil Saya</h1>
        <p>Informasi data pribadi pendonor.</p>
    </div>

    @if(session('success'))
        <div class="alert alert-success">
            {{ session('success') }}
        </div>
    @endif

    <div class="profile-card">

        <div class="profile-card-header">
            <div class="profile-title">
                <i class="fas fa-user"></i>
                <span>Profil Saya</span>
            </div>
        </div>

        <div class="profile-content">

            <div class="profile-photo">

                <div class="avatar">
                    <i class="fas fa-user"></i>
                </div>

            </div>

            <div class="profile-data">

                <div class="data-row">
                    <div class="data-label">Nama Lengkap</div>
                    <div class="data-separator">:</div>
                    <div class="data-value">
                        {{ $pendonor->user->nama ?? '-' }}
                    </div>
                </div>

                <div class="data-row">
                    <div class="data-label">Status</div>
                    <div class="data-separator">:</div>
                    <div class="data-value">
                        {{ $pendonor->status ?? '-' }}
                    </div>
                </div>

                <div class="data-row">
                    <div class="data-label">Kelas / Jabatan</div>
                    <div class="data-separator">:</div>
                    <div class="data-value">
                        {{ $pendonor->kelas_jabatan ?? '-' }}
                    </div>
                </div>

                <div class="data-row">
                    <div class="data-label">Tanggal Lahir</div>
                    <div class="data-separator">:</div>
                    <div class="data-value">
                        @if($pendonor->tanggal_lahir)
                            {{ \Carbon\Carbon::parse($pendonor->tanggal_lahir)->format('d M Y') }}
                        @else
                            -
                        @endif
                    </div>
                </div>

                <div class="data-row">
                    <div class="data-label">Golongan Darah</div>
                    <div class="data-separator">:</div>
                    <div class="data-value">
                        {{ $pendonor->golongan_darah ?? '-' }}
                    </div>
                </div>

                <div class="data-row">
                    <div class="data-label">No. Telepon</div>
                    <div class="data-separator">:</div>
                    <div class="data-value">
                        {{ $pendonor->nomor_telepon ?? '-' }}
                    </div>
                </div>

                <div class="data-row">
                    <div class="data-label">Informasi Kesehatan</div>
                    <div class="data-separator">:</div>
                    <div class="data-value">
                        {{ $pendonor->informasi_kesehatan ?? '-' }}
                    </div>
                </div>

            </div>

        </div>

        <div class="profile-footer">

            <a href="{{ route('profile.edit') }}" class="edit-button">
                <i class="fas fa-edit"></i>
                Ubah Profil
            </a>

        </div>

    </div>

</div>

@push('styles')

<style>

.profile-page {
    width: 100%;
    min-height: calc(100vh - 80px);
    padding: 25px 28px 35px;
    background: #fffafa;
}

.page-title {
    margin-bottom: 20px;
}

.page-title h1 {
    margin: 0 0 5px;
    color: #292733;
    font-size: 30px;
    font-weight: 800;
}

.page-title p {
    margin: 0;
    color: #8a8588;
    font-size: 13px;
}

.profile-card {
    width: 100%;
    background: #ffffff;
    border: 1px solid #f1e0e2;
    border-radius: 15px;
    box-shadow: 0 4px 15px rgba(217, 30, 54, 0.05);
    overflow: hidden;
}

.profile-card-header {
    padding: 18px 25px;
    border-bottom: 1px solid #f3e1e2;
}

.profile-title {
    display: flex;
    align-items: center;
    gap: 9px;
    color: #d91e36;
    font-size: 14px;
    font-weight: 800;
}

.profile-title i {
    font-size: 14px;
}

.profile-content {
    display: flex;
    align-items: center;
    gap: 45px;
    padding: 30px 40px;
}

.profile-photo {
    width: 35%;
    display: flex;
    justify-content: center;
    align-items: center;
}

.avatar {
    width: 190px;
    height: 190px;
    display: flex;
    align-items: center;
    justify-content: center;
    background: #fff0f1;
    border: 8px solid #ffe1e4;
    border-radius: 50%;
    color: #d91e36;
    font-size: 70px;
}

.profile-data {
    width: 65%;
}

.data-row {
    min-height: 42px;
    display: flex;
    align-items: center;
    border-bottom: 1px solid #f5eeee;
}

.data-row:last-child {
    border-bottom: none;
}

.data-label {
    width: 185px;
    color: #575157;
    font-size: 12px;
    font-weight: 700;
}

.data-separator {
    width: 25px;
    color: #777177;
    font-size: 12px;
}

.data-value {
    flex: 1;
    color: #302e38;
    font-size: 12px;
    font-weight: 500;
}

.profile-footer {
    padding: 0 40px 25px;
}

.edit-button {
    width: 100%;
    min-height: 40px;
    display: flex;
    align-items: center;
    justify-content: center;
    gap: 7px;
    background: #e51f3b;
    color: #ffffff !important;
    border-radius: 7px;
    font-size: 12px;
    font-weight: 700;
    text-decoration: none !important;
    transition: 0.2s;
}

.edit-button:hover {
    background: #c91830;
    color: #ffffff !important;
}

.alert {
    margin-bottom: 20px;
    border-radius: 8px;
    font-size: 12px;
}

@media (max-width: 768px) {

    .profile-page {
        padding: 20px 15px 30px;
    }

    .page-title h1 {
        font-size: 25px;
    }

    .profile-content {
        flex-direction: column;
        gap: 25px;
        padding: 25px 20px;
    }

    .profile-photo,
    .profile-data {
        width: 100%;
    }

    .avatar {
        width: 150px;
        height: 150px;
        font-size: 55px;
    }

    .profile-footer {
        padding: 0 20px 20px;
    }

}

@media (max-width: 480px) {

    .profile-page {
        padding: 18px 12px 25px;
    }

    .page-title h1 {
        font-size: 22px;
    }

    .profile-card-header {
        padding: 16px 18px;
    }

    .data-row {
        display: block;
        padding: 9px 0;
    }

    .data-label,
    .data-separator,
    .data-value {
        width: 100%;
    }

    .data-separator {
        display: none;
    }

    .data-value {
        margin-top: 3px;
    }

}

</style>

@endpush

@endsection