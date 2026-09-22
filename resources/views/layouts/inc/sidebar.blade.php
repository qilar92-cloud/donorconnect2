@php
    $role = strtolower(Auth::user()->role ?? 'pendonor');
@endphp

<ul class="navbar-nav sidebar sidebar-dark accordion donor-sidebar
    {{ $role === 'petugas' ? 'petugas-sidebar' : 'pendonor-sidebar' }}"
    id="accordionSidebar">

    {{-- Brand --}}
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


    {{-- Pendonor --}}
    @if ($role === 'pendonor')

        {{-- Dashboard --}}
        <li class="nav-item {{ request()->routeIs('dashboard') ? 'active' : '' }}">
            <a class="nav-link" href="{{ route('dashboard') }}">
                <i class="fas fa-fw fa-home"></i>
                <span>Dashboard</span>
            </a>
        </li>


        {{-- Profil --}}
        <li class="nav-item
            {{ request()->routeIs('profile.pendonor') ? 'active' : '' }}">

            <a class="nav-link"
               href="{{ route('profile.pendonor') }}">

                <i class="fas fa-fw fa-user"></i>
                <span>Profil Saya</span>

            </a>

        </li>


        {{-- Kegiatan Donor --}}
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


        {{-- Status --}}
        <li class="nav-item
            {{ request()->routeIs('pendonor.status') ? 'active' : '' }}">

            <a class="nav-link"
               href="{{ route('pendonor.status') }}">

                <i class="fas fa-fw fa-clipboard-check"></i>
                <span>Status Pendaftaran</span>

            </a>

        </li>


        {{-- Riwayat --}}
        <li class="nav-item
            {{ request()->routeIs('pendonor.riwayat') ? 'active' : '' }}">

            <a class="nav-link"
               href="{{ route('pendonor.riwayat') }}">

                <i class="fas fa-fw fa-history"></i>
                <span>Riwayat Donor</span>

            </a>

        </li>


    {{-- Petugas --}}
    @elseif ($role === 'petugas')

        {{-- Dashboard --}}
        <li class="nav-item
            {{ request()->routeIs('dashboard.petugas') ? 'active' : '' }}">

            <a class="nav-link"
               href="{{ route('dashboard.petugas') }}">

                <i class="fas fa-fw fa-home"></i>
                <span>Dashboard</span>

            </a>

        </li>


        {{-- Data Pendonor --}}
        <li class="nav-item
            {{ request()->routeIs('pendonor.*') ? 'active' : '' }}">

            <a class="nav-link"
               href="{{ route('pendonor.index') }}">

                <i class="fas fa-fw fa-users"></i>
                <span>Data Pendonor</span>

            </a>

        </li>


        {{-- Kegiatan Donor --}}
        <li class="nav-item
            {{ request()->routeIs('kegiatan-donor.*') ? 'active' : '' }}">

            <a class="nav-link"
               href="{{ route('kegiatan-donor.index') }}">

                <i class="fas fa-fw fa-calendar-alt"></i>
                <span>Kegiatan Donor</span>

            </a>

        </li>


        {{-- Catat Hasil --}}
        <li class="nav-item
            {{ request()->routeIs('hasil-donor.*') ? 'active' : '' }}">

            <a class="nav-link"
               href="{{ route('hasil-donor.create') }}">

                <i class="fas fa-fw fa-notes-medical"></i>
                <span>Catat Hasil Donor</span>

            </a>

        </li>


        {{-- Riwayat --}}
        <li class="nav-item
            {{ request()->routeIs('riwayat-donor.*') ? 'active' : '' }}">

            <a class="nav-link"
               href="{{ route('riwayat-donor.index') }}">

                <i class="fas fa-fw fa-history"></i>
                <span>Riwayat Donor</span>

            </a>

        </li>


        {{-- Laporan --}}
        <li class="nav-item
            {{ request()->routeIs('laporan-donor.*') ? 'active' : '' }}">

            <a class="nav-link"
               href="{{ route('laporan-donor.index') }}">

                <i class="fas fa-fw fa-file-alt"></i>
                <span>Laporan Donor</span>

            </a>

        </li>


        {{-- Profil --}}
        <li class="nav-item
            {{ request()->routeIs('profile.petugas') ? 'active' : '' }}">

            <a class="nav-link"
               href="{{ route('profile.petugas') }}">

                <i class="fas fa-fw fa-user"></i>
                <span>Profil Saya</span>

            </a>

        </li>

    @endif


    {{-- Divider --}}
    <hr class="sidebar-divider">


    {{-- Logout --}}
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

/* Sidebar */

.donor-sidebar {
    width: 230px !important;
    min-width: 230px !important;
    max-width: 230px !important;
    min-height: 100vh;
    padding-bottom: 20px;
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
    border-top: 1px solid rgba(255,255,255,0.20);
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
    color: rgba(255,255,255,0.94) !important;
    font-size: 13px;
    font-weight: 500;
    text-decoration: none;
    box-sizing: border-box !important;
    transition:
        background .2s ease,
        color .2s ease,
        transform .2s ease,
        box-shadow .2s ease;
}


/* Icon */

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


/* Text */

.donor-sidebar .nav-link span {
    display: block;
    line-height: 1;
    white-space: nowrap;
    overflow: hidden;
    text-overflow: ellipsis;
}


/* Hover */

.pendonor-sidebar
.nav-item:not(.active)
.nav-link:hover {
    background: rgba(255,255,255,0.13) !important;
    color: #FFFFFF !important;
    transform: translateX(2px);
}


.petugas-sidebar
.nav-item:not(.active)
.nav-link:hover {
    background: rgba(255,255,255,0.10) !important;
    color: #FFFFFF !important;
    transform: translateX(2px);
}


/* Active */

.pendonor-sidebar
.nav-item.active
.nav-link {
    width: 100% !important;
    max-width: 100% !important;
    background: #FFFFFF !important;
    color: #B91F4F !important;
    font-weight: 800;
    box-shadow: 0 4px 12px rgba(0,0,0,0.10);
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


.petugas-sidebar
.nav-item.active
.nav-link {
    position: relative;
    width: 100% !important;
    max-width: 100% !important;
    background: #FFE6ED !important;
    color: #A81743 !important;
    font-weight: 800;
    box-shadow: 0 5px 14px rgba(130,24,55,0.14);
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


/* Logout */

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
.nav-link i {
    color: #FFFFFF !important;
}


.donor-sidebar
.logout-item
.nav-link span {
    color: #FFFFFF !important;
}


.donor-sidebar
.logout-item
.nav-link:hover {
    background: rgba(255,255,255,0.10) !important;
    color: #FFFFFF !important;
    transform: translateX(2px);
}


/* Responsive */

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

}
</style>