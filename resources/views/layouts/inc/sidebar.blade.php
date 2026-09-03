<ul class="navbar-nav sidebar sidebar-dark accordion donor-sidebar"
    id="accordionSidebar">

    @php
        $role = strtolower(Auth::user()->role ?? 'pendonor');
    @endphp


    {{-- BRAND --}}
    <a class="sidebar-brand d-flex align-items-center justify-content-center"
       href="{{ $role === 'petugas'
            ? route('dashboard.petugas')
            : route('dashboard') }}">

        <div class="sidebar-brand-icon">
            <i class="fas fa-tint"></i>
        </div>

        <div class="sidebar-brand-text">
            DONORCONNECT
        </div>

    </a>


    <hr class="sidebar-divider my-0">


    {{-- MENU PENDONOR --}}
    @if ($role === 'pendonor')

        {{-- DASHBOARD --}}
        <li class="nav-item {{ request()->routeIs('dashboard') ? 'active' : '' }}">

            <a class="nav-link"
               href="{{ route('dashboard') }}">

                <i class="fas fa-fw fa-home"></i>
                <span>Dashboard</span>

            </a>

        </li>


        {{-- PROFIL --}}
        <li class="nav-item {{ request()->routeIs('profile') ? 'active' : '' }}">

            <a class="nav-link"
               href="{{ route('profile') }}">

                <i class="fas fa-fw fa-user"></i>
                <span>Profil Saya</span>

            </a>

        </li>


        {{-- KEGIATAN DONOR --}}
        <li class="nav-item
            {{
                request()->routeIs('pendonor.kegiatan')
                || request()->routeIs('pendonor.kegiatan.show')
                ? 'active'
                : ''
            }}">

            <a class="nav-link"
               href="{{ route('pendonor.kegiatan') }}">

                <i class="fas fa-fw fa-calendar-alt"></i>
                <span>Kegiatan Donor</span>

            </a>

        </li>


        {{-- STATUS PENDAFTARAN --}}
        <li class="nav-item
            {{ request()->routeIs('pendonor.status') ? 'active' : '' }}">

            <a class="nav-link"
               href="{{ route('pendonor.status') }}">

                <i class="fas fa-fw fa-clipboard-check"></i>
                <span>Status Pendaftaran</span>

            </a>

        </li>


        {{-- RIWAYAT DONOR --}}
        <li class="nav-item
            {{ request()->routeIs('pendonor.riwayat') ? 'active' : '' }}">

            <a class="nav-link"
               href="{{ route('pendonor.riwayat') }}">

                <i class="fas fa-fw fa-history"></i>
                <span>Riwayat Donor</span>

            </a>

        </li>


    {{-- MENU PETUGAS --}}
    @elseif ($role === 'petugas')

        {{-- DASHBOARD --}}
        <li class="nav-item
            {{ request()->routeIs('dashboard.petugas') ? 'active' : '' }}">

            <a class="nav-link"
               href="{{ route('dashboard.petugas') }}">

                <i class="fas fa-fw fa-home"></i>
                <span>Dashboard</span>

            </a>

        </li>


        {{-- DATA PENDONOR --}}
        <li class="nav-item
            {{ request()->routeIs('pendonor.*') ? 'active' : '' }}">

            <a class="nav-link"
               href="{{ route('pendonor.index') }}">

                <i class="fas fa-fw fa-users"></i>
                <span>Data Pendonor</span>

            </a>

        </li>


        {{-- KEGIATAN DONOR --}}
        <li class="nav-item
            {{ request()->routeIs('kegiatan-donor.*') ? 'active' : '' }}">

            <a class="nav-link"
               href="{{ route('kegiatan-donor.index') }}">

                <i class="fas fa-fw fa-calendar-alt"></i>
                <span>Kegiatan Donor</span>

            </a>

        </li>


        {{-- CATAT HASIL DONOR --}}
        <li class="nav-item
            {{ request()->routeIs('hasil-donor.*') ? 'active' : '' }}">

            <a class="nav-link"
               href="{{ route('hasil-donor.create') }}">

                <i class="fas fa-fw fa-notes-medical"></i>
                <span>Catat Hasil Donor</span>

            </a>

        </li>


        {{-- RIWAYAT DONOR --}}
        <li class="nav-item
            {{ request()->routeIs('riwayat-donor.*') ? 'active' : '' }}">

            <a class="nav-link"
               href="{{ route('riwayat-donor.index') }}">

                <i class="fas fa-fw fa-history"></i>
                <span>Riwayat Donor</span>

            </a>

        </li>


        {{-- LAPORAN DONOR --}}
        <li class="nav-item
            {{ request()->routeIs('laporan-donor.*') ? 'active' : '' }}">

            <a class="nav-link"
               href="{{ route('laporan-donor.index') }}">

                <i class="fas fa-fw fa-file-alt"></i>
                <span>Laporan Donor</span>

            </a>

        </li>


        {{-- PROFIL --}}
        <li class="nav-item
            {{ request()->routeIs('profile') ? 'active' : '' }}">

            <a class="nav-link"
               href="{{ route('profile') }}">

                <i class="fas fa-fw fa-user"></i>
                <span>Profil Saya</span>

            </a>

        </li>

    @endif


    {{-- DIVIDER --}}
    <hr class="sidebar-divider">


    {{-- LOGOUT --}}
    <li class="nav-item logout-item">

        <a class="nav-link"
           href="#"
           onclick="
                event.preventDefault();
                document.getElementById('sidebar-logout-form').submit();
           ">

            <i class="fas fa-fw fa-sign-out-alt"></i>
            <span>Logout</span>

        </a>


        <form id="sidebar-logout-form"
              action="{{ route('logout') }}"
              method="POST"
              class="d-none">

            @csrf

        </form>

    </li>

</ul>


<style>

    /* SIDEBAR */

    .donor-sidebar {

        width: 230px !important;
        min-width: 230px !important;
        max-width: 230px !important;

        min-height: 100vh;

        background: linear-gradient(
            180deg,
            #c90000 0%,
            #d71945 48%,
            #d94b91 100%
        ) !important;

        padding-bottom: 20px;

        overflow-x: hidden;

        box-sizing: border-box;

    }


    /* BRAND */

    .donor-sidebar .sidebar-brand {

        width: 230px !important;
        max-width: 230px !important;

        height: 100px;

        padding: 0 18px;

        margin: 0;

        background: rgba(145, 0, 20, 0.20);

        text-decoration: none;

        box-sizing: border-box;

    }


    .donor-sidebar .sidebar-brand-icon {

        color: #ffffff;

        font-size: 30px;

        margin-right: 8px;

        flex-shrink: 0;

    }


    .donor-sidebar .sidebar-brand-text {

        color: #ffffff;

        font-size: 17px;

        font-weight: 900;

        letter-spacing: 0.5px;

        white-space: nowrap;

    }


    /* DIVIDER */

    .donor-sidebar .sidebar-divider {

        width: auto !important;

        border-top: 1px solid rgba(255,255,255,0.20);

        margin: 12px 18px !important;

    }


    /* MENU */

    .donor-sidebar .nav-item {

        width: auto !important;

        margin: 4px 10px !important;

        padding: 0 !important;

        box-sizing: border-box;

    }


    /* LINK */

    .donor-sidebar .nav-item .nav-link {

        width: 100% !important;
        max-width: 100% !important;

        min-height: 52px;
        height: 52px;

        padding: 0 15px !important;
        margin: 0 !important;

        display: flex !important;
        align-items: center !important;

        border-radius: 10px;

        color: rgba(255,255,255,0.94) !important;

        font-size: 13px;

        font-weight: 500;

        text-decoration: none;

        box-sizing: border-box !important;

        transition: all .2s ease;

    }


    /* ICON */

    .donor-sidebar .nav-link i {

        width: 23px !important;
        min-width: 23px !important;
        max-width: 23px !important;

        margin-right: 12px !important;

        text-align: center;

        color: rgba(255,255,255,0.95) !important;

        font-size: 15px;

        flex-shrink: 0;

    }


    /* TEXT */

    .donor-sidebar .nav-link span {

        display: block;

        line-height: 1;

        white-space: nowrap;

        overflow: hidden;

        text-overflow: ellipsis;

    }


    /* HOVER */

    .donor-sidebar
    .nav-item:not(.active)
    .nav-link:hover {

        background: rgba(255,255,255,0.15);

        color: #ffffff !important;

        transform: translateX(2px);

    }


    /* ACTIVE */

    .donor-sidebar
    .nav-item.active
    .nav-link {

        width: 100% !important;
        max-width: 100% !important;

        background: #ffffff !important;

        color: #c9183b !important;

        font-weight: 800;

        box-shadow:
            0 4px 12px rgba(0,0,0,0.10);

        margin: 0 !important;

    }


    .donor-sidebar
    .nav-item.active
    .nav-link i {

        color: #c9183b !important;

    }


    /* LOGOUT */

    .donor-sidebar .logout-item {

        margin-top: 4px !important;

    }


    .donor-sidebar
    .logout-item
    .nav-link {

        color: rgba(255,255,255,0.94) !important;

    }


    .donor-sidebar
    .logout-item
    .nav-link:hover {

        background: rgba(255,255,255,0.15);

        color: #ffffff !important;

    }


    /* RESPONSIVE */

    @media (max-width: 768px) {

        .donor-sidebar {

            width: 230px !important;
            min-width: 230px !important;
            max-width: 230px !important;

        }

    }

</style>