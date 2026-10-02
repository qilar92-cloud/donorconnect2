@php
    $role = strtolower(Auth::user()->role ?? 'user');
@endphp

<ul
    class="navbar-nav sidebar sidebar-dark accordion donor-sidebar
    {{ $role === 'admin' ? 'petugas-sidebar' : 'pendonor-sidebar' }}"
    id="accordionSidebar"
>

    <!-- Brand -->

    <a
        class="sidebar-brand d-flex align-items-center justify-content-center"
        href="{{ $role === 'admin'
            ? route('dashboard.petugas')
            : route('dashboard') }}"
    >

        <div class="sidebar-brand-icon">
            <i class="fas fa-tint"></i>
        </div>

        <div class="sidebar-brand-text">
            DONORCONNECT
        </div>

    </a>

    <hr class="sidebar-divider my-0">


    <!-- Pendonor -->

    @if ($role === 'user')

        <li class="nav-item {{ request()->routeIs('dashboard') ? 'active' : '' }}">

            <a
                class="nav-link"
                href="{{ route('dashboard') }}"
            >

                <i class="fas fa-fw fa-home"></i>

                <span>Dashboard</span>

            </a>

        </li>


        <li class="nav-item {{ request()->routeIs('pendonor.kegiatan*') ? 'active' : '' }}">

            <a
                class="nav-link"
                href="{{ route('pendonor.kegiatan') }}"
            >

                <i class="fas fa-fw fa-calendar-alt"></i>

                <span>Kegiatan Donor</span>

            </a>

        </li>


        <li class="nav-item {{ request()->routeIs('pendonor.status') ? 'active' : '' }}">

            <a
                class="nav-link"
                href="{{ route('pendonor.status') }}"
            >

                <i class="fas fa-fw fa-clipboard-check"></i>

                <span>Status Pendaftaran</span>

            </a>

        </li>


        <li class="nav-item {{ request()->routeIs('pendonor.riwayat') ? 'active' : '' }}">

            <a
                class="nav-link"
                href="{{ route('pendonor.riwayat') }}"
            >

                <i class="fas fa-fw fa-history"></i>

                <span>Riwayat Donor</span>

            </a>

        </li>


        <!-- Hiasan -->

        <li class="sidebar-decoration">

            <div class="decoration-circle circle-one"></div>

            <div class="decoration-circle circle-two"></div>

            <div class="decoration-circle circle-three"></div>

            <div class="decoration-flower flower-one">

                <span></span>
                <span></span>
                <span></span>
                <span></span>

                <i class="fas fa-heart"></i>

            </div>

            <div class="decoration-flower flower-two">

                <span></span>
                <span></span>
                <span></span>
                <span></span>

                <i class="fas fa-heart"></i>

            </div>

            <div class="decoration-dot dot-one"></div>

            <div class="decoration-dot dot-two"></div>

            <div class="decoration-dot dot-three"></div>

        </li>

    @endif


    <!-- Petugas -->

    @if ($role === 'admin')

        <li class="nav-item {{ request()->routeIs('dashboard.petugas') ? 'active' : '' }}">

            <a
                class="nav-link"
                href="{{ route('dashboard.petugas') }}"
            >

                <i class="fas fa-fw fa-home"></i>

                <span>Dashboard</span>

            </a>

        </li>


        <li class="nav-item {{ request()->routeIs('pendonor.*') ? 'active' : '' }}">

            <a
                class="nav-link"
                href="{{ route('pendonor.index') }}"
            >

                <i class="fas fa-fw fa-users"></i>

                <span>Data Pendonor</span>

            </a>

        </li>


        <li class="nav-item {{ request()->routeIs('kegiatan-donor.*') ? 'active' : '' }}">

            <a
                class="nav-link"
                href="{{ route('kegiatan-donor.index') }}"
            >

                <i class="fas fa-fw fa-calendar-alt"></i>

                <span>Kegiatan Donor</span>

            </a>

        </li>


        <li class="nav-item {{ request()->routeIs('hasil-donor.*') ? 'active' : '' }}">

            <a
                class="nav-link"
                href="{{ route('hasil-donor.create') }}"
            >

                <i class="fas fa-fw fa-notes-medical"></i>

                <span>Catat Hasil Donor</span>

            </a>

        </li>


        <li class="nav-item {{ request()->routeIs('riwayat-donor.*') ? 'active' : '' }}">

            <a
                class="nav-link"
                href="{{ route('riwayat-donor.index') }}"
            >

                <i class="fas fa-fw fa-history"></i>

                <span>Riwayat Donor</span>

            </a>

        </li>


        <li class="nav-item {{ request()->routeIs('laporan-donor.*') ? 'active' : '' }}">

            <a
                class="nav-link"
                href="{{ route('laporan-donor.index') }}"
            >

                <i class="fas fa-fw fa-file-alt"></i>

                <span>Laporan Donor</span>

            </a>

        </li>


        <!-- Hiasan -->

        <li class="sidebar-decoration">

            <div class="decoration-circle circle-one"></div>

            <div class="decoration-circle circle-two"></div>

            <div class="decoration-circle circle-three"></div>

            <div class="decoration-flower flower-one">

                <span></span>
                <span></span>
                <span></span>
                <span></span>

                <i class="fas fa-heart"></i>

            </div>

            <div class="decoration-flower flower-two">

                <span></span>
                <span></span>
                <span></span>
                <span></span>

                <i class="fas fa-heart"></i>

            </div>

            <div class="decoration-dot dot-one"></div>

            <div class="decoration-dot dot-two"></div>

            <div class="decoration-dot dot-three"></div>

        </li>

    @endif

</ul>


<style>

/* Sidebar */

.donor-sidebar {
    width: 230px !important;
    min-width: 230px !important;
    max-width: 230px !important;

    min-height: 100vh;

    padding-bottom: 0;

    overflow-x: hidden;

    box-sizing: border-box;
}


/* Pendonor */

.pendonor-sidebar {
    background: linear-gradient(
        180deg,
        #8F183F 0%,
        #B91F4F 55%,
        #D62F61 100%
    ) !important;
}


/* Petugas */

.petugas-sidebar {
    background: linear-gradient(
        180deg,
        #ED5573 0%,
        #D93659 100%
    ) !important;
}


/* Brand */

.donor-sidebar .sidebar-brand {
    width: 230px !important;
    max-width: 230px !important;

    height: 100px;

    padding: 0 18px;

    margin: 0;

    text-decoration: none;

    box-sizing: border-box;
}

.pendonor-sidebar .sidebar-brand {
    background: rgba(80, 0, 25, 0.22);
}

.petugas-sidebar .sidebar-brand {
    background: rgba(0, 0, 0, 0.15);
}

.donor-sidebar .sidebar-brand-icon {
    color: #FFFFFF;

    font-size: 30px;

    margin-right: 8px;

    flex-shrink: 0;
}

.donor-sidebar .sidebar-brand-text {
    color: #FFFFFF;

    font-size: 17px;

    font-weight: 900;

    letter-spacing: 0.5px;

    white-space: nowrap;
}


/* Divider */

.donor-sidebar .sidebar-divider {
    width: auto !important;

    border-top: 1px solid rgba(255, 255, 255, 0.20);

    margin: 12px 18px !important;
}


/* Menu */

.donor-sidebar .nav-item {
    width: auto !important;

    margin: 4px 10px !important;

    padding: 0 !important;

    box-sizing: border-box;
}

.donor-sidebar .nav-item .nav-link {
    position: relative;

    width: 100% !important;
    max-width: 100% !important;

    min-height: 52px;
    height: 52px;

    padding: 0 15px !important;

    margin: 0 !important;

    display: flex !important;

    align-items: center !important;

    border-radius: 10px;

    color: rgba(255, 255, 255, 0.94) !important;

    font-size: 13px;

    font-weight: 500;

    text-decoration: none;

    box-sizing: border-box !important;

    transition:
        background 0.2s ease,
        color 0.2s ease,
        transform 0.2s ease,
        box-shadow 0.2s ease;
}


/* Icon */

.donor-sidebar .nav-link i {
    width: 23px !important;
    min-width: 23px !important;
    max-width: 23px !important;

    margin-right: 12px !important;

    text-align: center;

    color: rgba(255, 255, 255, 0.95) !important;

    font-size: 15px;

    flex-shrink: 0;
}


/* Text */

.donor-sidebar .nav-link span {
    display: block;

    line-height: 1;

    white-space: nowrap;

    overflow: hidden;

    text-overflow: ellipsis;
}


/* Hover Pendonor */

.pendonor-sidebar
.nav-item:not(.active)
.nav-link:hover {

    background: rgba(255, 255, 255, 0.13) !important;

    color: #FFFFFF !important;

    transform: translateX(2px);
}


/* Hover Petugas */

.petugas-sidebar
.nav-item:not(.active)
.nav-link:hover {

    background: rgba(255, 255, 255, 0.10) !important;

    color: #FFFFFF !important;

    transform: translateX(2px);
}


/* Active Pendonor */

.pendonor-sidebar
.nav-item.active
.nav-link {

    width: 100% !important;
    max-width: 100% !important;

    background: #FFFFFF !important;

    color: #B91F4F !important;

    font-weight: 800;

    box-shadow:
        0 4px 12px rgba(0, 0, 0, 0.10);

    margin: 0 !important;
}

.pendonor-sidebar
.nav-item.active
.nav-link i {

    color: #B91F4F !important;
}

.pendonor-sidebar
.nav-item.active
.nav-link span {

    color: #B91F4F !important;
}


/* Active Petugas */

.petugas-sidebar
.nav-item.active
.nav-link {

    position: relative;

    width: 100% !important;
    max-width: 100% !important;

    background: #FFE6ED !important;

    color: #A81743 !important;

    font-weight: 800;

    box-shadow:
        0 5px 14px rgba(130, 24, 55, 0.14);

    margin: 0 !important;
}

.petugas-sidebar
.nav-item.active
.nav-link i {

    color: #C52F59 !important;
}

.petugas-sidebar
.nav-item.active
.nav-link span {

    color: #A81743 !important;
}

.petugas-sidebar
.nav-item.active
.nav-link::before {

    content: "";

    position: absolute;

    left: 0;

    top: 12px;

    bottom: 12px;

    width: 3px;

    border-radius: 0 5px 5px 0;

    background: #E88BA3;
}


/* Dekorasi */

.sidebar-decoration {
    position: relative;

    height: 230px;

    margin: 12px 0 0 !important;

    padding: 0 !important;

    list-style: none;

    overflow: hidden;

    pointer-events: none;
}


/* Lingkaran */

.decoration-circle {
    position: absolute;

    border-radius: 50%;

    border: 1px solid rgba(255, 255, 255, 0.11);
}

.circle-one {
    width: 155px;
    height: 155px;

    left: -82px;
    bottom: -68px;

    background: rgba(255, 255, 255, 0.035);
}

.circle-two {
    width: 105px;
    height: 105px;

    right: -48px;
    bottom: 4px;

    background: rgba(255, 255, 255, 0.035);
}

.circle-three {
    width: 55px;
    height: 55px;

    left: 35px;
    bottom: 42px;

    background: rgba(255, 255, 255, 0.025);
}


/* Bunga */

.decoration-flower {
    position: absolute;

    width: 44px;
    height: 44px;

    opacity: 0.20;
}

.decoration-flower span {
    position: absolute;

    width: 17px;
    height: 17px;

    border-radius: 50%;

    background: #FFFFFF;
}

.decoration-flower span:nth-child(1) {
    top: 0;
    left: 13px;
}

.decoration-flower span:nth-child(2) {
    top: 13px;
    right: 0;
}

.decoration-flower span:nth-child(3) {
    bottom: 0;
    left: 13px;
}

.decoration-flower span:nth-child(4) {
    top: 13px;
    left: 0;
}

.decoration-flower i {
    position: absolute;

    top: 13px;
    left: 13px;

    width: 17px;
    height: 17px;

    display: flex;

    align-items: center;
    justify-content: center;

    color: #FFFFFF;

    font-size: 7px;
}


/* Posisi bunga */

.flower-one {
    right: 35px;

    bottom: 78px;

    transform: rotate(-12deg);
}

.flower-two {
    left: 35px;

    bottom: 25px;

    transform: scale(0.65) rotate(18deg);

    opacity: 0.13;
}


/* Titik */

.decoration-dot {
    position: absolute;

    width: 6px;
    height: 6px;

    border-radius: 50%;

    background: rgba(255, 255, 255, 0.25);
}

.dot-one {
    top: 25px;
    right: 42px;
}

.dot-two {
    top: 78px;
    left: 38px;

    width: 4px;
    height: 4px;
}

.dot-three {
    right: 82px;
    bottom: 36px;

    width: 4px;
    height: 4px;
}


/* Dekorasi Petugas */

.petugas-sidebar .decoration-flower {
    opacity: 0.16;
}

.petugas-sidebar .flower-two {
    opacity: 0.10;
}


/* Mobile */

@media (max-width: 768px) {

    .donor-sidebar {
        width: 230px !important;

        min-width: 230px !important;

        max-width: 230px !important;
    }

    .donor-sidebar .sidebar-brand {
        width: 230px !important;

        max-width: 230px !important;
    }

    .sidebar-decoration {
        height: 190px;
    }


    /* Sidebar Petugas */

    .petugas-sidebar {
        position: fixed !important;

        top: 0 !important;
        left: 0 !important;

        width: 230px !important;

        min-width: 230px !important;

        max-width: 230px !important;

        height: 100vh !important;

        min-height: 100vh !important;

        margin: 0 !important;

        z-index: 9999 !important;

        transform: translateX(-100%);

        transition:
            transform 0.3s ease !important;

        overflow-y: auto !important;

        overflow-x: hidden !important;
    }

    .petugas-sidebar.mobile-show {
        transform: translateX(0) !important;
    }

}


/* HP kecil */

@media (max-width: 380px) {

    .donor-sidebar {
        width: 220px !important;

        min-width: 220px !important;

        max-width: 220px !important;
    }

    .donor-sidebar .sidebar-brand {
        width: 220px !important;

        max-width: 220px !important;
    }

    .sidebar-decoration {
        height: 175px;
    }


    .petugas-sidebar {
        width: 220px !important;

        min-width: 220px !important;

        max-width: 220px !important;
    }

}

</style>