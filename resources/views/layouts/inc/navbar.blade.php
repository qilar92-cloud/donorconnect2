@php
    $role = strtolower(Auth::user()->role ?? 'user');
@endphp

<nav class="donor-navbar {{ $role === 'admin' ? 'petugas-navbar' : 'pendonor-navbar' }}">

    <!-- Menu Petugas -->
    @if($role === 'admin')
        <button
            type="button"
            class="petugas-menu-button"
            id="petugasMenuButton"
            aria-label="Buka menu"
            aria-expanded="false"
        >
            <span></span>
            <span></span>
            <span></span>
        </button>
    @endif

    <!-- Hiasan -->
    <div class="navbar-decoration">
        <span class="shape shape-one"></span>
        <span class="shape shape-two"></span>
        <span class="shape shape-three"></span>
        <span class="curve curve-one"></span>
        <span class="curve curve-two"></span>
    </div>

    <!-- Profil -->
    <div class="donor-navbar-right">
        <div class="donor-user-wrapper">

            <button
                type="button"
                class="donor-user-menu"
                id="userDropdownButton"
                aria-expanded="false"
            >
                <span class="donor-avatar">
                    <i class="fas fa-user"></i>
                </span>

                <span class="donor-user-info">
                    <span class="donor-user-name">
                        {{ Auth::user()->nama ?? 'User' }}
                    </span>

                    <span class="donor-user-role">
                        {{ $role === 'admin' ? 'Petugas PMR' : 'Pendonor' }}
                    </span>
                </span>

                <i class="fas fa-chevron-down donor-chevron"></i>
            </button>

            <!-- Dropdown -->

            <div class="donor-dropdown" id="donorDropdown">

                <div class="donor-dropdown-header">

                    <div class="donor-dropdown-avatar">
                        <i class="fas fa-user"></i>
                    </div>

                    <div class="donor-dropdown-user">

                        <strong>
                            {{ Auth::user()->nama ?? 'User' }}
                        </strong>

                        <small>
                            {{ $role === 'admin' ? 'Petugas PMR' : 'Pendonor' }}
                        </small>

                    </div>

                </div>

                <div class="dropdown-divider"></div>

                <!-- Profil -->

                <a
                    class="donor-dropdown-item"
                    href="{{ $role === 'admin'
                        ? route('profile.petugas')
                        : route('profile.pendonor') }}"
                >

                    <span class="dropdown-icon profile-icon">
                        <i class="fas fa-user"></i>
                    </span>

                    <span>Profil Saya</span>

                    <i class="fas fa-chevron-right dropdown-arrow"></i>

                </a>

                <!-- Logout -->

                <a
                    class="donor-dropdown-item logout-item"
                    href="#"
                    onclick="event.preventDefault(); document.getElementById('form-logout').submit();"
                >

                    <span class="dropdown-icon logout-icon">
                        <i class="fas fa-sign-out-alt"></i>
                    </span>

                    <span>Logout</span>

                    <i class="fas fa-chevron-right dropdown-arrow"></i>

                </a>

                <!-- Form Logout -->

                <form
                    action="{{ route('logout') }}"
                    method="POST"
                    id="form-logout"
                    style="display: none;"
                >
                    @csrf
                </form>

            </div>

        </div>
    </div>

</nav>

<!-- Overlay Petugas -->

@if($role === 'admin')
    <div
        class="petugas-sidebar-overlay"
        id="petugasSidebarOverlay"
    ></div>
@endif


<style>

/* Navbar */

.donor-navbar {
    position: relative;
    width: 100%;
    height: 72px;
    min-height: 72px;

    background: #ffffff;

    border-bottom: 1px solid #f1dddd;

    box-shadow: 0 2px 10px rgba(0, 0, 0, 0.04);

    display: flex;
    align-items: center;
    justify-content: flex-end;

    padding: 0 22px;

    box-sizing: border-box;

    z-index: 1000;
}


/* Hiasan */

.navbar-decoration {
    position: absolute;

    left: 260px;
    right: 300px;

    top: 0;

    height: 72px;

    overflow: hidden;

    pointer-events: none;
}

.shape {
    position: absolute;
    border-radius: 50%;
}

.shape-one {
    width: 85px;
    height: 85px;

    left: 20%;
    top: -48px;

    background: rgba(214, 47, 97, 0.05);
}

.shape-two {
    width: 55px;
    height: 55px;

    left: 48%;
    top: 25px;

    background: rgba(237, 85, 115, 0.06);
}

.shape-three {
    width: 75px;
    height: 75px;

    right: 15%;
    top: -45px;

    background: rgba(201, 47, 81, 0.05);
}

.curve {
    position: absolute;

    border: 2px solid rgba(214, 47, 97, 0.07);

    border-radius: 50%;
}

.curve-one {
    width: 180px;
    height: 70px;

    left: 35%;
    bottom: -48px;
}

.curve-two {
    width: 120px;
    height: 55px;

    right: 25%;
    bottom: -35px;
}


/* Tombol menu */

.petugas-menu-button {
    display: none;

    width: 38px;
    height: 38px;

    padding: 0;
    margin: 0;

    border: 0;
    border-radius: 10px;

    background: #fbe8ee;

    align-items: center;
    justify-content: center;

    flex-direction: column;

    gap: 4px;

    cursor: pointer;

    position: relative;

    z-index: 1100;
}

.petugas-menu-button span {
    display: block;

    width: 18px;
    height: 2px;

    border-radius: 5px;

    background: #a81743;

    transition: 0.2s ease;
}

.petugas-menu-button:hover {
    background: #f7dce5;
}


/* Profil */

.donor-navbar-right {
    position: relative;

    z-index: 1100;

    margin-left: auto;
}

.donor-user-wrapper {
    position: relative;
}

.donor-user-menu {
    border: 0;

    background: transparent;

    display: flex;
    align-items: center;

    gap: 10px;

    padding: 5px 7px;

    border-radius: 12px;

    cursor: pointer;
}

.donor-user-menu:hover {
    background: #fff5f7;
}

.donor-avatar {
    width: 42px;
    height: 42px;

    min-width: 42px;

    border-radius: 12px;

    display: flex;
    align-items: center;
    justify-content: center;

    color: #ffffff;

    font-size: 16px;
}

.pendonor-navbar .donor-avatar {
    background: linear-gradient(
        135deg,
        #8f183f,
        #d62f61
    );
}

.petugas-navbar .donor-avatar {
    background: linear-gradient(
        135deg,
        #ed5573,
        #d93659
    );
}

.donor-user-info {
    display: flex;
    flex-direction: column;

    align-items: flex-start;

    line-height: 1.2;
}

.donor-user-name {
    color: #453238;

    font-size: 13px;

    font-weight: 800;
}

.donor-user-role {
    margin-top: 3px;

    font-size: 11px;

    font-weight: 600;
}

.pendonor-navbar .donor-user-role {
    color: #b91f4f;
}

.petugas-navbar .donor-user-role {
    color: #c92f51;
}

.donor-chevron {
    color: #9e7c85;

    font-size: 11px;

    margin-left: 2px;
}


/* Dropdown */

.donor-dropdown {
    position: absolute;

    top: calc(100% + 10px);
    right: 0;

    width: 245px;

    background: #ffffff;

    border-radius: 16px;

    padding: 10px;

    box-shadow:
        0 12px 35px rgba(87, 35, 47, 0.14);

    border: 1px solid #f2dfe3;

    display: none;

    z-index: 1200;
}

.donor-dropdown.show {
    display: block;
}

.donor-dropdown-header {
    display: flex;

    align-items: center;

    gap: 10px;

    padding: 8px;
}

.donor-dropdown-avatar {
    width: 40px;
    height: 40px;

    border-radius: 11px;

    display: flex;
    align-items: center;
    justify-content: center;

    color: #ffffff;

    background: linear-gradient(
        135deg,
        #ed5573,
        #d93659
    );
}

.donor-dropdown-user {
    display: flex;
    flex-direction: column;
}

.donor-dropdown-user strong {
    color: #453238;

    font-size: 13px;
}

.donor-dropdown-user small {
    color: #b97989;

    font-size: 11px;

    margin-top: 2px;
}

.dropdown-divider {
    height: 1px;

    background: #f2e4e7;

    margin: 7px 4px;
}

.donor-dropdown-item {
    display: flex;

    align-items: center;

    gap: 10px;

    min-height: 43px;

    padding: 0 9px;

    border-radius: 10px;

    color: #59454b;

    text-decoration: none;

    font-size: 12px;

    font-weight: 600;

    transition: 0.2s ease;
}

.donor-dropdown-item:hover {
    background: #fff4f6;

    color: #a81743;
}

.dropdown-icon {
    width: 30px;
    height: 30px;

    border-radius: 8px;

    display: flex;
    align-items: center;
    justify-content: center;
}

.profile-icon {
    background: #fde9ef;

    color: #c52f59;
}

.logout-icon {
    background: #fff0f2;

    color: #d93659;
}

.dropdown-arrow {
    margin-left: auto;

    font-size: 9px;

    color: #bfa4ab;
}

.logout-item {
    margin-top: 2px;
}


/* Overlay */

.petugas-sidebar-overlay {
    display: none;
}


/* Mobile */

@media (max-width: 768px) {

    .donor-navbar {
        position: sticky !important;

        top: 0 !important;

        min-height: 64px;
        height: 64px;

        padding: 0 12px;

        margin: 0 !important;

        background: #ffffff !important;
    }

    .navbar-decoration {
        left: 75px;
        right: 85px;

        height: 64px;
    }

    .donor-user-name,
    .donor-user-role {
        display: none;
    }

    .donor-user-menu {
        padding: 4px !important;
    }

    .donor-avatar {
        width: 38px;
        height: 38px;

        min-width: 38px;

        border-radius: 11px;
    }

    .donor-chevron {
        display: none;
    }

    .donor-dropdown {
        width: 225px;

        max-width: calc(100vw - 24px);
    }

    /* Menu Petugas */

    .petugas-navbar {
        justify-content: space-between !important;
    }

    .petugas-menu-button {
        display: flex;
    }

    .petugas-navbar .donor-navbar-right {
        margin-left: auto;
    }

    /* Overlay */

    .petugas-sidebar-overlay.show {
        display: block;

        position: fixed;

        inset: 0;

        background: rgba(69, 50, 56, 0.28);

        z-index: 9997;
    }

}


/* HP kecil */

@media (max-width: 430px) {

    .donor-navbar {
        min-height: 60px;
        height: 60px;

        padding: 0 9px;
    }

    .donor-avatar {
        width: 35px;
        height: 35px;

        min-width: 35px;
    }

    .petugas-menu-button {
        width: 36px;
        height: 36px;
    }

}

</style>


<script>

document.addEventListener('DOMContentLoaded', function () {

    /* Dropdown profil */

    const userButton =
        document.getElementById('userDropdownButton');

    const userDropdown =
        document.getElementById('donorDropdown');

    if (userButton && userDropdown) {

        userButton.addEventListener('click', function (event) {

            event.stopPropagation();

            const isOpen =
                userDropdown.classList.toggle('show');

            userButton.setAttribute(
                'aria-expanded',
                isOpen ? 'true' : 'false'
            );

        });

    }


    /* Menu Petugas */

    const menuButton =
        document.getElementById('petugasMenuButton');

    const sidebar =
        document.getElementById('accordionSidebar');

    const overlay =
        document.getElementById('petugasSidebarOverlay');


    if (menuButton && sidebar) {

        menuButton.addEventListener('click', function (event) {

            event.preventDefault();

            event.stopPropagation();

            const isOpen =
                sidebar.classList.toggle('mobile-show');

            menuButton.setAttribute(
                'aria-expanded',
                isOpen ? 'true' : 'false'
            );

            if (overlay) {

                overlay.classList.toggle(
                    'show',
                    isOpen
                );

            }

        });


        /* Klik overlay */

        if (overlay) {

            overlay.addEventListener('click', function () {

                sidebar.classList.remove(
                    'mobile-show'
                );

                menuButton.setAttribute(
                    'aria-expanded',
                    'false'
                );

                overlay.classList.remove(
                    'show'
                );

            });

        }


        /* Klik menu */

        const sidebarLinks =
            sidebar.querySelectorAll('.nav-link');

        sidebarLinks.forEach(function (link) {

            link.addEventListener('click', function () {

                sidebar.classList.remove(
                    'mobile-show'
                );

                menuButton.setAttribute(
                    'aria-expanded',
                    'false'
                );

                if (overlay) {

                    overlay.classList.remove(
                        'show'
                    );

                }

            });

        });

    }


    /* Klik luar dropdown */

    document.addEventListener('click', function (event) {

        if (
            userDropdown &&
            userButton &&
            !userDropdown.contains(event.target) &&
            !userButton.contains(event.target)
        ) {

            userDropdown.classList.remove('show');

            userButton.setAttribute(
                'aria-expanded',
                'false'
            );

        }

    });

});

</script>