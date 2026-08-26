<ul class="navbar-nav bg-gradient-primary sidebar sidebar-dark accordion" id="accordionSidebar">

    <a class="sidebar-brand d-flex align-items-center justify-content-center"
       href="{{ route('dashboard') }}">

        <div class="sidebar-brand-icon rotate-n-15">
            <i class="fas fa-heartbeat"></i>
        </div>

        <div class="sidebar-brand-text mx-3">DonorConnect</div>

    </a>

    <hr class="sidebar-divider my-0">

    <!-- Dashboard -->
    <li class="nav-item">
        <a class="nav-link" href="{{ route('dashboard') }}">
            <i class="fas fa-fw fa-tachometer-alt"></i>
            <span>Dashboard</span>
        </a>
    </li>

    <!-- Data Pendonor -->
    <li class="nav-item">
        <a class="nav-link" href="{{ route('pendonor.index') }}">
            <i class="fas fa-fw fa-users"></i>
            <span>Data Pendonor</span>
        </a>
    </li>

    <!-- Kegiatan Donor -->
    <li class="nav-item">
        <a class="nav-link" href="{{ route('kegiatan-donor.index') }}">
            <i class="fas fa-fw fa-calendar-alt"></i>
            <span>Kegiatan Donor</span>
        </a>
    </li>

    <!-- Riwayat Donor -->
    <li class="nav-item">
        <a class="nav-link" href="{{ route('riwayat-donor.index') }}">
            <i class="fas fa-fw fa-history"></i>
            <span>Riwayat Donor</span>
        </a>
    </li>

    <!-- Laporan Donor -->
    <li class="nav-item">
        <a class="nav-link" href="{{ route('laporan-donor.index') }}">
            <i class="fas fa-fw fa-file-alt"></i>
            <span>Laporan Donor</span>
        </a>
    </li>

    <!-- Profile -->
    <li class="nav-item">
        <a class="nav-link" href="{{ route('profile') }}">
            <i class="fas fa-fw fa-user"></i>
            <span>Profil</span>
        </a>
    </li>

</ul>