<ul
    class="navbar-nav sidebar sidebar-dark accordion"
    id="accordionSidebar"
>


    <!-- BRAND -->

    <a
        class="sidebar-brand d-flex align-items-center justify-content-center"
        href="{{ route('dashboard') }}"
    >

        <div class="sidebar-brand-icon">

            <i class="fas fa-tint"></i>

        </div>

        <div class="sidebar-brand-text mx-3">
            DONORCONNECT
        </div>

    </a>


    <hr class="sidebar-divider my-0">


    <!-- DASHBOARD -->

    <li
        class="nav-item {{ request()->routeIs('dashboard') ? 'active' : '' }}"
    >

        <a
            class="nav-link"
            href="{{ route('dashboard') }}"
        >

            <i class="fas fa-fw fa-home"></i>

            <span>Dashboard</span>

        </a>

    </li>


    @php

        $role = strtolower(Auth::user()->role ?? 'pendonor');

    @endphp


    @if ($role === 'pendonor')


        <!-- PROFIL -->

        <li
            class="nav-item {{ request()->routeIs('profile') ? 'active' : '' }}"
        >

            <a
                class="nav-link"
                href="{{ route('profile') }}"
            >

                <i class="fas fa-fw fa-user"></i>

                <span>Profil Saya</span>

            </a>

        </li>


        <!-- KEGIATAN DONOR -->

        <li
            class="nav-item
            {{ request()->routeIs('pendonor.kegiatan')
                || request()->routeIs('kegiatan-donor.show')
                ? 'active'
                : '' }}"
        >

            <a
                class="nav-link"
                href="{{ route('pendonor.kegiatan') }}"
            >

                <i class="fas fa-fw fa-calendar-alt"></i>

                <span>Kegiatan Donor</span>

            </a>

        </li>


        <!-- STATUS PENDAFTARAN -->

        <li class="nav-item">

            <a
                class="nav-link"
                href="{{ route('pendonor.kegiatan') }}"
            >

                <i class="fas fa-fw fa-clipboard-check"></i>

                <span>Status Pendaftaran</span>

            </a>

        </li>


        <!-- RIWAYAT -->

        <li
            class="nav-item
            {{ request()->routeIs('pendonor.riwayat')
                || request()->routeIs('riwayat-donor.index')
                ? 'active'
                : '' }}"
        >

            <a
                class="nav-link"
                href="{{ route('pendonor.riwayat') }}"
            >

                <i class="fas fa-fw fa-history"></i>

                <span>Riwayat Donor</span>

            </a>

        </li>


    @else


        <!-- ==========================
             MENU PETUGAS PMR
        =========================== -->


        <!-- DATA PENDONOR -->

        <li
            class="nav-item
            {{ request()->routeIs('pendonor.index')
                ? 'active'
                : '' }}"
        >

            <a
                class="nav-link"
                href="{{ route('pendonor.index') }}"
            >

                <i class="fas fa-fw fa-users"></i>

                <span>Data Pendonor</span>

            </a>

        </li>


        <!-- KEGIATAN DONOR -->

        <li
            class="nav-item
            {{ request()->routeIs('kegiatan-donor.*')
                ? 'active'
                : '' }}"
        >

            <a
                class="nav-link"
                href="{{ route('kegiatan-donor.index') }}"
            >

                <i class="fas fa-fw fa-calendar-alt"></i>

                <span>Kegiatan Donor</span>

            </a>

        </li>


        <!-- RIWAYAT DONOR -->

        <li
            class="nav-item
            {{ request()->routeIs('riwayat-donor.*')
                ? 'active'
                : '' }}"
        >

            <a
                class="nav-link"
                href="{{ route('riwayat-donor.index') }}"
            >

                <i class="fas fa-fw fa-history"></i>

                <span>Riwayat Donor</span>

            </a>

        </li>


        <!-- LAPORAN DONOR -->

        <li
            class="nav-item
            {{ request()->routeIs('laporan-donor.*')
                ? 'active'
                : '' }}"
        >

            <a
                class="nav-link"
                href="{{ route('laporan-donor.index') }}"
            >

                <i class="fas fa-fw fa-file-alt"></i>

                <span>Laporan Donor</span>

            </a>

        </li>


        <!-- PROFIL -->

        <li
            class="nav-item {{ request()->routeIs('profile') ? 'active' : '' }}"
        >

            <a
                class="nav-link"
                href="{{ route('profile') }}"
            >

                <i class="fas fa-fw fa-user"></i>

                <span>Profil Saya</span>

            </a>

        </li>


    @endif


    <!-- DIVIDER -->

    <hr class="sidebar-divider">


    <!-- LOGOUT -->

    <li class="nav-item">

        <a
            class="nav-link"
            href="#"
            onclick="
                event.preventDefault();
                document.getElementById('sidebar-logout-form').submit();
            "
        >

            <i class="fas fa-fw fa-sign-out-alt"></i>

            <span>Logout</span>

        </a>

        <form
            id="sidebar-logout-form"
            action="{{ route('logout') }}"
            method="POST"
            class="d-none"
        >

            @csrf

        </form>

    </li>


</ul>