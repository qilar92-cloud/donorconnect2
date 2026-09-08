@extends('layouts.app')

@section('title', 'Profil Petugas - DonorConnect')

@section('content')

<div class="profile-page">

    <div class="profile-heading">

        <div>
            <span class="profile-label">DONORCONNECT</span>

            <h1>Profil Saya</h1>

            <p>
                Informasi akun dan data petugas PMR.
            </p>
        </div>

        <span class="role-badge">
            <i class="fas fa-user-shield"></i>
            Petugas PMR
        </span>

    </div>


    <div class="profile-card">

        <div class="profile-top">

            <div class="profile-avatar">
                <i class="fas fa-user-shield"></i>
            </div>

            <div class="profile-identity">

                <h2>
                    {{ $petugas->user->nama }}
                </h2>

                <span>
                    Petugas PMR
                </span>

            </div>

        </div>


        <div class="profile-body">

            <div class="profile-item">

                <div class="profile-icon">
                    <i class="fas fa-user"></i>
                </div>

                <div>
                    <small>Nama Lengkap</small>

                    <strong>
                        {{ $petugas->user->nama }}
                    </strong>
                </div>

            </div>


            <div class="profile-item">

                <div class="profile-icon">
                    <i class="fas fa-envelope"></i>
                </div>

                <div>
                    <small>Email</small>

                    <strong>
                        {{ $petugas->user->email }}
                    </strong>
                </div>

            </div>


            <div class="profile-item">

                <div class="profile-icon">
                    <i class="fas fa-user-shield"></i>
                </div>

                <div>
                    <small>Jabatan</small>

                    <strong>
                        Petugas PMR
                    </strong>
                </div>

            </div>


            <div class="profile-item">

                <div class="profile-icon">
                    <i class="fas fa-id-card"></i>
                </div>

                <div>
                    <small>ID Petugas</small>

                    <strong>
                        {{ $petugas->id_petugas }}
                    </strong>
                </div>

            </div>

        </div>


        <div class="profile-footer">

            <a
                href="{{ route('profile.edit') }}"
                class="edit-button"
            >
                <i class="fas fa-edit"></i>
                Ubah Profil
            </a>

        </div>

    </div>

</div>

@endsection


@push('styles')

<style>

.profile-page {
    min-height: calc(100vh - 80px);
    padding: 28px 30px 40px;
    background: #fff8f3;
}

.profile-heading {
    display: flex;
    align-items: center;
    justify-content: space-between;
    margin-bottom: 22px;
}

.profile-label {
    display: block;
    margin-bottom: 4px;
    color: #b0143b;
    font-size: 9px;
    font-weight: 900;
    letter-spacing: 2px;
}

.profile-heading h1 {
    margin: 0 0 4px;
    color: #283252;
    font-size: 28px;
    font-weight: 800;
}

.profile-heading p {
    margin: 0;
    color: #8f8a91;
    font-size: 11px;
}

.role-badge {
    display: inline-flex;
    align-items: center;
    gap: 7px;
    padding: 9px 15px;
    background: #fff;
    border: 1px solid #efd9df;
    border-radius: 30px;
    color: #b0143b;
    font-size: 10px;
    font-weight: 800;
}

.profile-card {
    width: 100%;
    background: #fff;
    border: 1px solid #f0dfe4;
    border-radius: 18px;
    box-shadow: 0 7px 25px rgba(168, 14, 44, 0.06);
    overflow: hidden;
}

.profile-top {
    padding: 28px 32px;
    display: flex;
    align-items: center;
    gap: 18px;
    background: linear-gradient(135deg, #fffafa, #fff3f7);
    border-bottom: 1px solid #f1dfe4;
}

.profile-avatar {
    width: 72px;
    height: 72px;
    display: flex;
    align-items: center;
    justify-content: center;
    flex-shrink: 0;
    background: linear-gradient(135deg, #a80e2c, #d94b91);
    color: #fff;
    border-radius: 18px;
    font-size: 29px;
    box-shadow: 0 8px 18px rgba(168, 14, 44, 0.18);
}

.profile-identity h2 {
    margin: 0 0 5px;
    color: #283252;
    font-size: 20px;
    font-weight: 800;
}

.profile-identity span {
    display: inline-block;
    padding: 5px 11px;
    background: #fce7ef;
    color: #a80e2c;
    border-radius: 20px;
    font-size: 9px;
    font-weight: 800;
    text-transform: uppercase;
}

.profile-body {
    padding: 8px 32px;
}

.profile-item {
    display: flex;
    align-items: center;
    gap: 14px;
    padding: 15px 0;
    border-bottom: 1px solid #f3e9ee;
}

.profile-item:last-child {
    border-bottom: none;
}

.profile-icon {
    width: 40px;
    height: 40px;
    min-width: 40px;
    display: flex;
    align-items: center;
    justify-content: center;
    background: #fce7ef;
    color: #c91845;
    border-radius: 11px;
    font-size: 14px;
}

.profile-item small {
    display: block;
    margin-bottom: 3px;
    color: #99949a;
    font-size: 9px;
    font-weight: 600;
}

.profile-item strong {
    display: block;
    color: #3d465a;
    font-size: 12px;
    font-weight: 750;
}

.profile-footer {
    padding: 20px 32px;
    background: #fffafa;
    border-top: 1px solid #f1e3e7;
}

.edit-button {
    display: inline-flex;
    align-items: center;
    gap: 7px;
    padding: 10px 17px;
    background: linear-gradient(135deg, #a80e2c, #d94b91);
    color: #fff !important;
    border-radius: 9px;
    font-size: 10px;
    font-weight: 800;
    text-decoration: none !important;
    box-shadow: 0 6px 15px rgba(168, 14, 44, 0.15);
    transition: .2s ease;
}

.edit-button:hover {
    color: #fff !important;
    transform: translateY(-1px);
}

@media (max-width: 768px) {

    .profile-page {
        padding: 22px 15px 30px;
    }

    .role-badge {
        display: none;
    }

    .profile-heading h1 {
        font-size: 24px;
    }

    .profile-top {
        padding: 22px;
    }

    .profile-body {
        padding: 5px 22px;
    }

    .profile-footer {
        padding: 17px 22px;
    }

}

@media (max-width: 480px) {

    .profile-page {
        padding: 18px 12px 25px;
    }

    .profile-heading h1 {
        font-size: 22px;
    }

    .profile-top {
        padding: 20px;
    }

    .profile-avatar {
        width: 60px;
        height: 60px;
        font-size: 24px;
    }

    .profile-identity h2 {
        font-size: 17px;
    }

    .profile-body {
        padding: 5px 18px;
    }

    .profile-footer {
        padding: 16px 18px;
    }

}

</style>

@endpush