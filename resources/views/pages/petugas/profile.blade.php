@extends('layouts.app')

@section('title', 'Profil Petugas - DonorConnect')

@section('content')

<div class="profile-page">

    {{-- Header --}}
    <div class="profile-heading">

        <div class="heading-left">

            <span class="profile-label">
                DONORCONNECT
            </span>

            <h1>Profil Saya</h1>

            <p>
                Kelola informasi akun dan data petugas PMR Anda.
            </p>

        </div>

        <div class="role-badge">
            <i class="fas fa-user-shield"></i>
            <span>Petugas PMR</span>
        </div>

    </div>


    {{-- Profile Card --}}
    <div class="profile-card">

        {{-- Profile Header --}}
        <div class="profile-cover">

            <div class="profile-main">

                <div class="profile-avatar">
                    <i class="fas fa-user-shield"></i>
                </div>

                <div class="profile-identity">

                    <span class="identity-label">
                        AKUN PETUGAS
                    </span>

                    <h2>
                        {{ $petugas->user->nama }}
                    </h2>

                    <div class="identity-role">
                        <i class="fas fa-shield-alt"></i>
                        Petugas PMR
                    </div>

                </div>

            </div>

            <div class="cover-decoration decoration-one"></div>
            <div class="cover-decoration decoration-two"></div>

        </div>


        {{-- Data --}}
        <div class="profile-content">

            <div class="section-title">

                <div class="section-icon">
                    <i class="fas fa-id-card"></i>
                </div>

                <div>
                    <h3>Informasi Petugas</h3>
                    <p>Data akun yang terdaftar di DonorConnect</p>
                </div>

            </div>


            <div class="profile-grid">

                {{-- Nama --}}
                <div class="info-item">

                    <div class="info-icon">
                        <i class="fas fa-user"></i>
                    </div>

                    <div class="info-text">

                        <span>Nama Lengkap</span>

                        <strong>
                            {{ $petugas->user->nama }}
                        </strong>

                    </div>

                </div>


                {{-- Email --}}
                <div class="info-item">

                    <div class="info-icon">
                        <i class="fas fa-envelope"></i>
                    </div>

                    <div class="info-text">

                        <span>Email</span>

                        <strong>
                            {{ $petugas->user->email }}
                        </strong>

                    </div>

                </div>


                {{-- Jabatan --}}
                <div class="info-item">

                    <div class="info-icon">
                        <i class="fas fa-user-shield"></i>
                    </div>

                    <div class="info-text">

                        <span>Jabatan</span>

                        <strong>
                            Petugas PMR
                        </strong>

                    </div>

                </div>


                {{-- ID --}}
                <div class="info-item">

                    <div class="info-icon">
                        <i class="fas fa-fingerprint"></i>
                    </div>

                    <div class="info-text">

                        <span>ID Petugas</span>

                        <strong>
                            {{ $petugas->id_petugas }}
                        </strong>

                    </div>

                </div>

            </div>

        </div>


        {{-- Footer --}}
        <div class="profile-footer">

            <div class="footer-text">

                <div class="footer-check">
                    <i class="fas fa-check"></i>
                </div>

                <div>
                    <strong>Data akun Anda</strong>
                    <span>Pastikan informasi selalu sesuai.</span>
                </div>

            </div>

            <a
                href="{{ route('profile.edit') }}"
                class="edit-button"
            >
                <i class="fas fa-edit"></i>
                <span>Ubah Profil</span>
            </a>

        </div>

    </div>

</div>

@endsection


@push('styles')

<style>

.profile-page {
    min-height: calc(100vh - 80px);
    padding: 30px;
    background: #fff8f4;
}


/* Header */

.profile-heading {
    display: flex;
    align-items: flex-end;
    justify-content: space-between;
    gap: 20px;
    margin-bottom: 24px;
}

.profile-label {
    display: inline-block;
    margin-bottom: 5px;
    color: #b0143b;
    font-size: 9px;
    font-weight: 900;
    letter-spacing: 2px;
}

.profile-heading h1 {
    margin: 0;
    color: #283252;
    font-size: 29px;
    line-height: 1.2;
    font-weight: 800;
}

.profile-heading p {
    margin: 6px 0 0;
    color: #928b91;
    font-size: 11px;
}

.role-badge {
    display: inline-flex;
    align-items: center;
    gap: 8px;
    padding: 10px 16px;
    background: #fff;
    border: 1px solid #efdce2;
    border-radius: 30px;
    color: #ad123b;
    font-size: 10px;
    font-weight: 800;
    box-shadow: 0 4px 12px rgba(168, 14, 44, .04);
}

.role-badge i {
    font-size: 12px;
}


/* Card */

.profile-card {
    width: 100%;
    overflow: hidden;
    background: #fff;
    border: 1px solid #f0dfe4;
    border-radius: 22px;
    box-shadow: 0 9px 30px rgba(168, 14, 44, .07);
}


/* Cover */

.profile-cover {
    min-height: 190px;
    padding: 32px 36px;
    position: relative;
    overflow: hidden;
    background:
        linear-gradient(
            135deg,
            #fffafa 0%,
            #fff1f5 55%,
            #fde7ef 100%
        );
    border-bottom: 1px solid #f1dfe4;
}

.profile-main {
    height: 100%;
    position: relative;
    z-index: 2;
    display: flex;
    align-items: center;
    gap: 21px;
}

.profile-avatar {
    width: 86px;
    height: 86px;
    flex-shrink: 0;
    display: flex;
    align-items: center;
    justify-content: center;
    background: linear-gradient(
        135deg,
        #a80e2c,
        #d94b91
    );
    color: #fff;
    border: 5px solid rgba(255,255,255,.8);
    border-radius: 24px;
    font-size: 32px;
    box-shadow:
        0 10px 25px rgba(168, 14, 44, .20);
}

.profile-identity {
    min-width: 0;
}

.identity-label {
    display: block;
    margin-bottom: 5px;
    color: #b65b73;
    font-size: 8px;
    font-weight: 900;
    letter-spacing: 1.5px;
}

.profile-identity h2 {
    margin: 0 0 9px;
    color: #283252;
    font-size: 24px;
    font-weight: 800;
    line-height: 1.2;
}

.identity-role {
    display: inline-flex;
    align-items: center;
    gap: 6px;
    padding: 6px 11px;
    background: #fff;
    border: 1px solid #f1d8df;
    border-radius: 20px;
    color: #a80e2c;
    font-size: 9px;
    font-weight: 800;
}

.identity-role i {
    font-size: 9px;
}


/* Dekorasi */

.cover-decoration {
    position: absolute;
    border-radius: 50%;
    pointer-events: none;
}

.decoration-one {
    width: 190px;
    height: 190px;
    right: -55px;
    top: -75px;
    border: 25px solid rgba(217, 75, 145, .06);
}

.decoration-two {
    width: 110px;
    height: 110px;
    right: 120px;
    bottom: -65px;
    border: 17px solid rgba(168, 14, 44, .045);
}


/* Content */

.profile-content {
    padding: 29px 36px 30px;
}

.section-title {
    display: flex;
    align-items: center;
    gap: 12px;
    margin-bottom: 21px;
}

.section-icon {
    width: 42px;
    height: 42px;
    flex-shrink: 0;
    display: flex;
    align-items: center;
    justify-content: center;
    background: #fce8ef;
    color: #b0143b;
    border-radius: 12px;
    font-size: 14px;
}

.section-title h3 {
    margin: 0;
    color: #354056;
    font-size: 16px;
    font-weight: 800;
}

.section-title p {
    margin: 3px 0 0;
    color: #a29ba0;
    font-size: 10px;
}


/* Data Grid */

.profile-grid {
    display: grid;
    grid-template-columns: 1fr 1fr;
    gap: 13px;
}

.info-item {
    min-width: 0;
    min-height: 78px;
    padding: 15px 17px;
    display: flex;
    align-items: center;
    gap: 13px;
    background: #fffafa;
    border: 1px solid #f2e5e9;
    border-radius: 14px;
    transition: .2s ease;
}

.info-item:hover {
    border-color: #edcbd5;
    transform: translateY(-1px);
    box-shadow: 0 5px 15px rgba(168, 14, 44, .05);
}

.info-icon {
    width: 39px;
    height: 39px;
    flex-shrink: 0;
    display: flex;
    align-items: center;
    justify-content: center;
    background: #fce8ef;
    color: #c01947;
    border-radius: 11px;
    font-size: 13px;
}

.info-text {
    min-width: 0;
}

.info-text span {
    display: block;
    margin-bottom: 4px;
    color: #9b9297;
    font-size: 9px;
    font-weight: 600;
}

.info-text strong {
    display: block;
    overflow: hidden;
    color: #3c4558;
    font-size: 12px;
    font-weight: 750;
    text-overflow: ellipsis;
    white-space: nowrap;
}


/* Footer */

.profile-footer {
    min-height: 72px;
    padding: 16px 36px;
    display: flex;
    align-items: center;
    justify-content: space-between;
    gap: 15px;
    background: #fffafa;
    border-top: 1px solid #f1e3e7;
}

.footer-text {
    display: flex;
    align-items: center;
    gap: 9px;
}

.footer-check {
    width: 30px;
    height: 30px;
    flex-shrink: 0;
    display: flex;
    align-items: center;
    justify-content: center;
    background: #fce8ef;
    color: #bd1744;
    border-radius: 9px;
    font-size: 10px;
}

.footer-text strong {
    display: block;
    margin-bottom: 2px;
    color: #4b4246;
    font-size: 10px;
}

.footer-text span {
    display: block;
    color: #aaa0a5;
    font-size: 9px;
}

.edit-button {
    display: inline-flex;
    align-items: center;
    justify-content: center;
    gap: 7px;
    padding: 11px 18px;
    background: linear-gradient(
        135deg,
        #a80e2c,
        #d94b91
    );
    color: #fff !important;
    border-radius: 10px;
    font-size: 10px;
    font-weight: 800;
    text-decoration: none !important;
    box-shadow: 0 6px 16px rgba(168, 14, 44, .16);
    transition: .2s ease;
}

.edit-button:hover {
    color: #fff !important;
    transform: translateY(-1px);
    box-shadow: 0 8px 19px rgba(168, 14, 44, .21);
}


/* Tablet */

@media (max-width: 900px) {

    .profile-page {
        padding: 24px;
    }

    .profile-cover {
        padding: 28px;
    }

    .profile-content {
        padding: 25px 28px;
    }

    .profile-footer {
        padding: 15px 28px;
    }

}


/* HP */

@media (max-width: 700px) {

    .profile-page {
        padding: 18px 15px 28px;
    }

    .profile-heading {
        align-items: flex-start;
        margin-bottom: 18px;
    }

    .profile-heading h1 {
        font-size: 24px;
    }

    .profile-heading p {
        max-width: 280px;
        line-height: 1.5;
    }

    .role-badge {
        display: none;
    }

    .profile-card {
        border-radius: 18px;
    }

    .profile-cover {
        min-height: 150px;
        padding: 23px 20px;
    }

    .profile-main {
        gap: 14px;
    }

    .profile-avatar {
        width: 66px;
        height: 66px;
        border-width: 4px;
        border-radius: 18px;
        font-size: 25px;
    }

    .profile-identity h2 {
        font-size: 19px;
    }

    .identity-label {
        font-size: 7px;
    }

    .identity-role {
        padding: 5px 9px;
        font-size: 8px;
    }

    .profile-content {
        padding: 22px 20px;
    }

    .section-title {
        margin-bottom: 16px;
    }

    .section-icon {
        width: 38px;
        height: 38px;
    }

    .section-title h3 {
        font-size: 14px;
    }

    .profile-grid {
        grid-template-columns: 1fr;
        gap: 10px;
    }

    .info-item {
        min-height: 70px;
        padding: 13px;
    }

    .profile-footer {
        padding: 15px 20px;
        align-items: stretch;
        flex-direction: column;
    }

    .edit-button {
        width: 100%;
    }

}


/* HP kecil */

@media (max-width: 400px) {

    .profile-page {
        padding: 15px 12px 25px;
    }

    .profile-cover {
        padding: 20px 16px;
    }

    .profile-avatar {
        width: 58px;
        height: 58px;
        border-radius: 16px;
        font-size: 22px;
    }

    .profile-identity h2 {
        font-size: 17px;
    }

    .profile-content {
        padding: 20px 16px;
    }

    .profile-footer {
        padding: 14px 16px;
    }

    .info-item {
        padding: 12px;
    }

}

</style>

@endpush