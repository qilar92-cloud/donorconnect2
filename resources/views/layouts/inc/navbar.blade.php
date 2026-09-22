@php
    $role = strtolower(Auth::user()->role ?? 'pendonor');
@endphp

<nav class="navbar navbar-expand navbar-light donor-navbar
    {{ $role === 'petugas' ? 'petugas-navbar' : 'pendonor-navbar' }}
    mb-4 static-top">

    {{-- Tombol mobile --}}
    <button
        id="sidebarToggleTop"
        class="btn btn-link d-md-none rounded-circle donor-menu-button mr-3"
    >
        <i class="fa fa-bars"></i>
    </button>


    {{-- Hiasan --}}
    <div class="navbar-decoration">

        <span class="shape shape-one"></span>
        <span class="shape shape-two"></span>
        <span class="shape shape-three"></span>

        <span class="curve curve-one"></span>
        <span class="curve curve-two"></span>

    </div>


    {{-- User --}}
    <ul class="navbar-nav ml-auto">

        <li class="nav-item dropdown no-arrow">

            <a
                class="nav-link dropdown-toggle donor-user-menu"
                href="#"
                id="userDropdown"
                role="button"
                data-toggle="dropdown"
                aria-haspopup="true"
                aria-expanded="false"
            >

                <span class="donor-avatar">
                    <i class="fas fa-user"></i>
                </span>

                <span class="donor-user-info d-none d-lg-flex">

                    <span class="donor-user-name">
                        {{ Auth::user()->nama ?? 'User' }}
                    </span>

                    <span class="donor-user-role">
                        {{ ucfirst(Auth::user()->role ?? 'pendonor') }}
                    </span>

                </span>

                <i class="fas fa-chevron-down donor-chevron"></i>

            </a>


            {{-- Dropdown --}}
            <div
                class="dropdown-menu dropdown-menu-right donor-dropdown shadow animated--grow-in"
                aria-labelledby="userDropdown"
            >

                <div class="donor-dropdown-header">

                    <div class="donor-dropdown-avatar">
                        <i class="fas fa-user"></i>
                    </div>

                    <div class="donor-dropdown-user">

                        <strong>
                            {{ Auth::user()->nama ?? 'User' }}
                        </strong>

                        <small>
                            {{ ucfirst(Auth::user()->role ?? 'pendonor') }}
                        </small>

                    </div>

                </div>


                <div class="dropdown-divider"></div>


                {{-- Profil --}}
                <a
                    class="dropdown-item donor-dropdown-item"
                    href="{{ Auth::user()->role === 'petugas'
                        ? route('profile.petugas')
                        : route('profile.pendonor') }}"
                >

                    <span class="dropdown-icon profile-icon">
                        <i class="fas fa-user"></i>
                    </span>

                    <span class="dropdown-item-text">
                        Profil Saya
                    </span>

                    <i class="fas fa-chevron-right dropdown-arrow"></i>

                </a>


                {{-- Logout --}}
                <a
                    class="dropdown-item donor-dropdown-item logout-item"
                    href="#"
                    onclick="event.preventDefault(); document.getElementById('form-logout').submit();"
                >

                    <span class="dropdown-icon logout-icon">
                        <i class="fas fa-sign-out-alt"></i>
                    </span>

                    <span class="dropdown-item-text">
                        Logout
                    </span>

                    <i class="fas fa-chevron-right dropdown-arrow"></i>

                </a>


                <form
                    action="{{ route('logout') }}"
                    method="POST"
                    id="form-logout"
                    class="d-none"
                >
                    @csrf
                </form>

            </div>

        </li>

    </ul>

</nav>


<style>

/* Navbar */

.donor-navbar {
    min-height: 72px;

    padding: 0 28px;

    background: #ffffff !important;

    border-bottom: 1px solid #f1dddd;

    box-shadow:
        0 4px 18px rgba(111, 38, 54, .06);

    position: relative;

    z-index: 1000;

    overflow: visible !important;
}


/* Hiasan */

.navbar-decoration {
    position: absolute;

    left: 260px;
    right: 300px;
    top: 0;

    height: 72px;

    pointer-events: none;

    overflow: hidden;

    z-index: 0;
}

.shape {
    position: absolute;

    border-radius: 50%;
}


/* Petugas */

.petugas-navbar .shape-one {
    width: 120px;
    height: 120px;

    top: -72px;
    left: 18%;

    background: rgba(237, 85, 115, .08);
}

.petugas-navbar .shape-two {
    width: 80px;
    height: 80px;

    bottom: -50px;
    left: 42%;

    background: rgba(217, 54, 89, .06);
}

.petugas-navbar .shape-three {
    width: 45px;
    height: 45px;

    top: 14px;
    right: 24%;

    background: rgba(237, 85, 115, .07);
}


/* Pendonor */

.pendonor-navbar .shape-one {
    width: 120px;
    height: 120px;

    top: -72px;
    left: 18%;

    background: rgba(143, 24, 63, .09);
}

.pendonor-navbar .shape-two {
    width: 80px;
    height: 80px;

    bottom: -50px;
    left: 42%;

    background: rgba(185, 31, 79, .07);
}

.pendonor-navbar .shape-three {
    width: 45px;
    height: 45px;

    top: 14px;
    right: 24%;

    background: rgba(214, 47, 97, .08);
}


/* Curve */

.curve {
    position: absolute;

    border: 1.5px solid;

    border-radius: 50%;

    transform: rotate(-12deg);
}


/* Petugas Curve */

.petugas-navbar .curve-one {
    width: 190px;
    height: 65px;

    left: 30%;
    top: 5px;

    border-color: rgba(217, 54, 89, .10);
}

.petugas-navbar .curve-two {
    width: 140px;
    height: 50px;

    left: 55%;
    top: 17px;

    border-color: rgba(237, 85, 115, .12);
}


/* Pendonor Curve */

.pendonor-navbar .curve-one {
    width: 190px;
    height: 65px;

    left: 30%;
    top: 5px;

    border-color: rgba(143, 24, 63, .10);
}

.pendonor-navbar .curve-two {
    width: 140px;
    height: 50px;

    left: 55%;
    top: 17px;

    border-color: rgba(214, 47, 97, .12);
}


/* Tombol */

.donor-menu-button {
    width: 38px;
    height: 38px;

    display: flex;

    align-items: center;
    justify-content: center;

    border-radius: 11px !important;
}


/* Tombol Petugas */

.petugas-navbar .donor-menu-button {
    background: #fff0f3;

    color: #d93659 !important;
}

.petugas-navbar .donor-menu-button:hover {
    background: #ffe1e8;
}


/* Tombol Pendonor */

.pendonor-navbar .donor-menu-button {
    background: #fbe8ee;

    color: #a81743 !important;
}

.pendonor-navbar .donor-menu-button:hover {
    background: #f7dce4;
}


/* User */

.donor-user-menu {
    min-height: 50px;

    display: flex !important;

    align-items: center;

    padding: 5px 9px !important;

    border-radius: 15px;

    position: relative;

    z-index: 1001;

    transition: .2s ease;
}


/* User Hover */

.petugas-navbar .donor-user-menu:hover {
    background: #fff0f3;
}

.pendonor-navbar .donor-user-menu:hover {
    background: #fdf0f4;
}


/* Avatar */

.donor-avatar {
    width: 42px;
    height: 42px;

    flex-shrink: 0;

    display: flex;

    align-items: center;
    justify-content: center;

    border-radius: 13px;

    color: #ffffff;

    box-shadow:
        0 5px 12px rgba(120, 30, 60, .18);
}


/* Avatar Petugas */

.petugas-navbar .donor-avatar {
    background:
        linear-gradient(
            135deg,
            #ed5573,
            #d93659
        );
}


/* Avatar Pendonor */

.pendonor-navbar .donor-avatar {
    background:
        linear-gradient(
            135deg,
            #8f183f,
            #d62f61
        );
}


.donor-avatar i {
    font-size: 14px;
}


/* User Text */

.donor-user-info {
    flex-direction: column;

    justify-content: center;

    margin-left: 11px;

    line-height: 1.2;
}

.donor-user-name {
    max-width: 145px;

    color: #3b3034;

    font-size: 12px;

    font-weight: 800;

    white-space: nowrap;

    overflow: hidden;

    text-overflow: ellipsis;
}

.donor-user-role {
    margin-top: 4px;

    font-size: 9px;

    font-weight: 700;

    text-transform: uppercase;

    letter-spacing: .6px;
}


/* Role Petugas */

.petugas-navbar .donor-user-role {
    color: #c34a64;
}


/* Role Pendonor */

.pendonor-navbar .donor-user-role {
    color: #a34a66;
}


/* Chevron */

.donor-chevron {
    margin-left: 10px;

    font-size: 9px;

    transition: .2s ease;
}

.petugas-navbar .donor-chevron {
    color: #c47787;
}

.pendonor-navbar .donor-chevron {
    color: #a97887;
}

.donor-user-menu[aria-expanded="true"] .donor-chevron {
    transform: rotate(180deg);
}

.petugas-navbar .donor-user-menu[aria-expanded="true"] .donor-chevron {
    color: #d93659;
}

.pendonor-navbar .donor-user-menu[aria-expanded="true"] .donor-chevron {
    color: #a81743;
}


/* Dropdown */

.donor-dropdown {
    width: 245px;

    margin-top: 9px !important;

    padding: 7px 0;

    background: #ffffff;

    border: 1px solid #f0dce0;

    border-radius: 16px;

    overflow: hidden;

    box-shadow:
        0 12px 30px rgba(83, 33, 45, .15) !important;

    z-index: 2000 !important;
}


/* Dropdown Header */

.donor-dropdown-header {
    display: flex;

    align-items: center;

    gap: 11px;

    padding: 15px 16px;
}


/* Petugas */

.petugas-navbar .donor-dropdown-header {
    background:
        linear-gradient(
            135deg,
            #fff5f7,
            #ffecef
        );
}


/* Pendonor */

.pendonor-navbar .donor-dropdown-header {
    background:
        linear-gradient(
            135deg,
            #fff5f7,
            #fce9ef
        );
}


/* Dropdown Avatar */

.donor-dropdown-avatar {
    width: 42px;
    height: 42px;

    flex-shrink: 0;

    display: flex;

    align-items: center;
    justify-content: center;

    border-radius: 13px;

    color: #ffffff;

    font-size: 14px;
}


/* Petugas */

.petugas-navbar .donor-dropdown-avatar {
    background:
        linear-gradient(
            135deg,
            #ed5573,
            #d93659
        );
}


/* Pendonor */

.pendonor-navbar .donor-dropdown-avatar {
    background:
        linear-gradient(
            135deg,
            #8f183f,
            #d62f61
        );
}


/* Dropdown User */

.donor-dropdown-user strong {
    display: block;

    color: #3b3034;

    font-size: 12px;

    font-weight: 800;
}

.donor-dropdown-user small {
    display: block;

    margin-top: 4px;

    font-size: 9px;

    font-weight: 700;

    text-transform: uppercase;
}

.petugas-navbar .donor-dropdown-user small {
    color: #c34a64;
}

.pendonor-navbar .donor-dropdown-user small {
    color: #a34a66;
}


/* Divider */

.donor-dropdown .dropdown-divider {
    margin: 6px 14px;

    border-top-color: #f2e3e6;
}


/* Item */

.donor-dropdown-item {
    display: flex !important;

    align-items: center;

    gap: 10px;

    margin: 3px 8px;

    padding: 10px !important;

    border-radius: 11px;

    color: #56484d !important;

    font-size: 11px;

    font-weight: 700;

    transition: .2s ease;
}


/* Hover Petugas */

.petugas-navbar .donor-dropdown-item:hover {
    background: #fff0f3 !important;

    color: #b91f4f !important;
}


/* Hover Pendonor */

.pendonor-navbar .donor-dropdown-item:hover {
    background: #fbe8ee !important;

    color: #8f183f !important;
}


/* Icon */

.dropdown-icon {
    width: 31px;
    height: 31px;

    flex-shrink: 0;

    display: flex;

    align-items: center;
    justify-content: center;

    border-radius: 9px;

    font-size: 11px;
}


/* Petugas Icon */

.petugas-navbar .profile-icon {
    background: #ffe6ed;

    color: #c52f59;
}

.petugas-navbar .logout-icon {
    background: #fff0f2;

    color: #c93659;
}


/* Pendonor Icon */

.pendonor-navbar .profile-icon {
    background: #f9e3ea;

    color: #a81743;
}

.pendonor-navbar .logout-icon {
    background: #fbe8ee;

    color: #b91f4f;
}


/* Arrow */

.dropdown-arrow {
    font-size: 8px;
}

.petugas-navbar .dropdown-arrow {
    color: #cba3ad;
}

.pendonor-navbar .dropdown-arrow {
    color: #b99aa5;
}


/* Arrow Hover */

.petugas-navbar .donor-dropdown-item:hover .dropdown-arrow {
    color: #c52f59;
}

.pendonor-navbar .donor-dropdown-item:hover .dropdown-arrow {
    color: #a81743;
}


/* HP */

@media (max-width: 768px) {

    .donor-navbar {
        min-height: 65px;

        padding: 0 15px;
    }

    .navbar-decoration {
        left: 100px;

        right: 150px;

        height: 65px;
    }

    .donor-avatar {
        width: 39px;
        height: 39px;

        border-radius: 12px;
    }

    .donor-dropdown {
        width: 220px;
    }

}
</style>