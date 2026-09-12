@extends('layouts.app')

@section('title', 'Profil Petugas - DonorConnect')

@section('content')

<div class="profile-page">

    {{-- Header --}}
    <div class="page-header">
        <div>
            <span class="page-label">DONORCONNECT</span>
            <h1>Profil Saya</h1>
            <p>Informasi akun dan data petugas PMR.</p>
        </div>

        <div class="role-badge">
            <i class="fas fa-user-shield"></i>
            Petugas PMR
        </div>
    </div>


    {{-- Profile --}}
    <div class="profile-card">

        {{-- Banner --}}
        <div class="profile-banner">

            <div class="banner-content">

                <div class="avatar">
                    <i class="fas fa-user-shield"></i>
                </div>

                <div class="identity">

                    <span class="identity-label">
                        PROFIL PETUGAS
                    </span>

                    <h2>
                        {{ $petugas->user->nama }}
                    </h2>

                    <div class="identity-status">
                        <span class="status-dot"></span>
                        Petugas PMR
                    </div>

                </div>

            </div>

            <div class="banner-shape shape-one"></div>
            <div class="banner-shape shape-two"></div>
            <div class="banner-line"></div>

        </div>


        {{-- Information --}}
        <div class="profile-information">

            <div class="information-header">

                <div class="information-icon">
                    <i class="fas fa-id-card"></i>
                </div>

                <div>
                    <h3>Informasi Akun</h3>
                    <p>Data yang terdaftar pada akun petugas.</p>
                </div>

            </div>


            <div class="information-list">

                {{-- Nama --}}
                <div class="information-item">

                    <div class="item-icon">
                        <i class="fas fa-user"></i>
                    </div>

                    <div class="item-content">
                        <span>Nama Lengkap</span>
                        <strong>
                            {{ $petugas->user->nama }}
                        </strong>
                    </div>

                </div>


                {{-- Email --}}
                <div class="information-item">

                    <div class="item-icon">
                        <i class="fas fa-envelope"></i>
                    </div>

                    <div class="item-content">
                        <span>Email</span>
                        <strong>
                            {{ $petugas->user->email }}
                        </strong>
                    </div>

                </div>


                {{-- Jabatan --}}
                <div class="information-item">

                    <div class="item-icon">
                        <i class="fas fa-user-shield"></i>
                    </div>

                    <div class="item-content">
                        <span>Jabatan</span>
                        <strong>Petugas PMR</strong>
                    </div>

                </div>


                {{-- ID --}}
                <div class="information-item">

                    <div class="item-icon">
                        <i class="fas fa-fingerprint"></i>
                    </div>

                    <div class="item-content">
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

            <div class="footer-info">

                <div class="footer-icon">
                    <i class="fas fa-shield-alt"></i>
                </div>

                <div>
                    <strong>Akun Petugas PMR</strong>
                    <span>Kelola informasi profil Anda.</span>
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

/* Page */

.profile-page {
    min-height: calc(100vh - 80px);
    padding: 28px 30px 40px;
    background: #fff9f6;
}


/* Header */

.page-header {
    max-width: 1180px;
    margin: 0 auto 22px;
    display: flex;
    align-items: flex-end;
    justify-content: space-between;
    gap: 20px;
}

.page-label {
    display: block;
    margin-bottom: 5px;
    color: #b0143b;
    font-size: 9px;
    font-weight: 900;
    letter-spacing: 2px;
}

.page-header h1 {
    margin: 0;
    color: #283252;
    font-size: 28px;
    font-weight: 800;
    line-height: 1.2;
}

.page-header p {
    margin: 5px 0 0;
    color: #918a90;
    font-size: 11px;
}

.role-badge {
    display: inline-flex;
    align-items: center;
    gap: 7px;
    padding: 9px 15px;
    background: #fff;
    border: 1px solid #efdce2;
    border-radius: 30px;
    color: #ad123b;
    font-size: 10px;
    font-weight: 800;
    box-shadow: 0 4px 12px rgba(168,14,44,.04);
}


/* Card */

.profile-card {
    max-width: 1180px;
    margin: 0 auto;
    overflow: hidden;
    background: #fff;
    border: 1px solid #f0dfe4;
    border-radius: 22px;
    box-shadow: 0 10px 30px rgba(168,14,44,.06);
}


/* Banner */

.profile-banner {
    min-height: 190px;
    padding: 30px 38px;
    position: relative;
    overflow: hidden;
    display: flex;
    align-items: center;
    background:
        linear-gradient(
            110deg,
            #a90f35 0%,
            #c72e5d 48%,
            #dc6796 100%
        );
}

.banner-content {
    position: relative;
    z-index: 3;
    display: flex;
    align-items: center;
    gap: 20px;
}

.avatar {
    width: 84px;
    height: 84px;
    flex-shrink: 0;
    display: flex;
    align-items: center;
    justify-content: center;
    background: rgba(255,255,255,.16);
    border: 2px solid rgba(255,255,255,.5);
    border-radius: 24px;
    color: #fff;
    font-size: 31px;
    box-shadow: 0 8px 20px rgba(80,0,20,.12);
    backdrop-filter: blur(4px);
}

.identity-label {
    display: block;
    margin-bottom: 6px;
    color: rgba(255,255,255,.72);
    font-size: 8px;
    font-weight: 800;
    letter-spacing: 1.5px;
}

.identity h2 {
    margin: 0 0 10px;
    color: #fff;
    font-size: 25px;
    font-weight: 800;
}

.identity-status {
    display: inline-flex;
    align-items: center;
    gap: 7px;
    padding: 6px 11px;
    background: rgba(255,255,255,.15);
    border: 1px solid rgba(255,255,255,.2);
    border-radius: 20px;
    color: #fff;
    font-size: 9px;
    font-weight: 700;
}

.status-dot {
    width: 6px;
    height: 6px;
    border-radius: 50%;
    background: #fff;
}


/* Banner Decoration */

.banner-shape {
    position: absolute;
    border-radius: 50%;
    border: 1px solid rgba(255,255,255,.13);
}

.shape-one {
    width: 250px;
    height: 250px;
    right: -65px;
    top: -105px;
}

.shape-two {
    width: 170px;
    height: 170px;
    right: 100px;
    bottom: -125px;
}

.banner-line {
    position: absolute;
    width: 180px;
    height: 180px;
    right: 30px;
    bottom: -145px;
    border-radius: 50%;
    border: 30px solid rgba(255,255,255,.045);
}


/* Information */

.profile-information {
    padding: 30px 38px;
}

.information-header {
    display: flex;
    align-items: center;
    gap: 12px;
    margin-bottom: 20px;
}

.information-icon {
    width: 43px;
    height: 43px;
    flex-shrink: 0;
    display: flex;
    align-items: center;
    justify-content: center;
    background: #fce8ef;
    color: #b0143b;
    border-radius: 12px;
    font-size: 14px;
}

.information-header h3 {
    margin: 0;
    color: #354056;
    font-size: 16px;
    font-weight: 800;
}

.information-header p {
    margin: 3px 0 0;
    color: #a29ba0;
    font-size: 10px;
}


/* Information List */

.information-list {
    display: grid;
    grid-template-columns: 1fr 1fr;
    gap: 12px;
}

.information-item {
    min-height: 78px;
    padding: 14px 16px;
    display: flex;
    align-items: center;
    gap: 13px;
    background: #fffafa;
    border: 1px solid #f1e5e8;
    border-radius: 14px;
    transition: .2s ease;
}

.information-item:hover {
    border-color: #e9cbd4;
    box-shadow: 0 5px 14px rgba(168,14,44,.05);
}

.item-icon {
    width: 40px;
    height: 40px;
    flex-shrink: 0;
    display: flex;
    align-items: center;
    justify-content: center;
    background: #fce8ef;
    color: #c01947;
    border-radius: 11px;
    font-size: 13px;
}

.item-content {
    min-width: 0;
}

.item-content span {
    display: block;
    margin-bottom: 4px;
    color: #999096;
    font-size: 9px;
    font-weight: 600;
}

.item-content strong {
    display: block;
    overflow: hidden;
    color: #3d465a;
    font-size: 12px;
    font-weight: 750;
    text-overflow: ellipsis;
    white-space: nowrap;
}


/* Footer */

.profile-footer {
    min-height: 75px;
    padding: 15px 38px;
    display: flex;
    align-items: center;
    justify-content: space-between;
    gap: 20px;
    background: #fffafa;
    border-top: 1px solid #f1e3e7;
}

.footer-info {
    display: flex;
    align-items: center;
    gap: 9px;
}

.footer-icon {
    width: 31px;
    height: 31px;
    flex-shrink: 0;
    display: flex;
    align-items: center;
    justify-content: center;
    background: #fce8ef;
    color: #b0143b;
    border-radius: 9px;
    font-size: 10px;
}

.footer-info strong {
    display: block;
    margin-bottom: 2px;
    color: #51474b;
    font-size: 10px;
}

.footer-info span {
    display: block;
    color: #a79da2;
    font-size: 9px;
}

.edit-button {
    display: inline-flex;
    align-items: center;
    justify-content: center;
    gap: 7px;
    min-width: 120px;
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
    box-shadow: 0 6px 15px rgba(168,14,44,.15);
    transition: .2s ease;
}

.edit-button:hover {
    color: #fff !important;
    transform: translateY(-1px);
}


/* Tablet */

@media (max-width: 850px) {

    .profile-page {
        padding: 24px;
    }

    .profile-banner {
        padding: 28px;
    }

    .profile-information {
        padding: 26px 28px;
    }

    .profile-footer {
        padding: 15px 28px;
    }

}


/* HP */

@media (max-width: 700px) {

    .profile-page {
        padding: 17px 14px 28px;
    }

    .page-header {
        margin-bottom: 17px;
    }

    .page-header h1 {
        font-size: 23px;
    }

    .page-header p {
        font-size: 10px;
        line-height: 1.5;
    }

    .role-badge {
        display: none;
    }

    .profile-card {
        border-radius: 18px;
    }


    /* Banner HP */

    .profile-banner {
        min-height: 145px;
        padding: 22px 19px;
    }

    .banner-content {
        gap: 13px;
    }

    .avatar {
        width: 61px;
        height: 61px;
        border-radius: 17px;
        font-size: 23px;
    }

    .identity-label {
        margin-bottom: 4px;
        font-size: 7px;
    }

    .identity h2 {
        margin-bottom: 7px;
        font-size: 18px;
    }

    .identity-status {
        padding: 5px 9px;
        font-size: 8px;
    }

    .shape-one {
        width: 170px;
        height: 170px;
        right: -75px;
        top: -75px;
    }

    .shape-two {
        width: 110px;
        height: 110px;
        right: 45px;
        bottom: -80px;
    }


    /* Information HP */

    .profile-information {
        padding: 22px 18px;
    }

    .information-header {
        margin-bottom: 15px;
    }

    .information-icon {
        width: 38px;
        height: 38px;
        border-radius: 11px;
    }

    .information-header h3 {
        font-size: 14px;
    }

    .information-header p {
        font-size: 9px;
    }

    .information-list {
        grid-template-columns: 1fr;
        gap: 9px;
    }

    .information-item {
        min-height: 68px;
        padding: 12px;
        border-radius: 12px;
    }

    .item-icon {
        width: 37px;
        height: 37px;
        border-radius: 10px;
    }

    .item-content span {
        font-size: 8px;
    }

    .item-content strong {
        font-size: 11px;
    }


    /* Footer HP */

    .profile-footer {
        padding: 15px 18px;
        flex-direction: column;
        align-items: stretch;
        gap: 13px;
    }

    .edit-button {
        width: 100%;
        min-height: 43px;
    }

}


/* HP kecil */

@media (max-width: 380px) {

    .profile-page {
        padding: 14px 11px 23px;
    }

    .profile-banner {
        padding: 20px 16px;
    }

    .avatar {
        width: 55px;
        height: 55px;
        font-size: 21px;
    }

    .identity h2 {
        font-size: 16px;
    }

    .profile-information {
        padding: 20px 15px;
    }

    .profile-footer {
        padding: 14px 15px;
    }

}

</style>

@endpush