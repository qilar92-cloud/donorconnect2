<nav class="navbar navbar-expand navbar-light donor-navbar mb-4 static-top">

    <!-- Tombol mobile -->
    <button
        id="sidebarToggleTop"
        class="btn btn-link d-md-none rounded-circle donor-menu-button mr-3"
    >
        <i class="fa fa-bars"></i>
    </button>

    <!-- User -->
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
                        {{ Auth::user()->nama ?? 'Pendonor' }}
                    </span>

                    <span class="donor-user-role">
                        {{ ucfirst(Auth::user()->role ?? 'pendonor') }}
                    </span>

                </span>

                <i class="fas fa-chevron-down donor-chevron"></i>

            </a>

            <!-- Dropdown -->
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
                            {{ Auth::user()->nama ?? 'Pendonor' }}
                        </strong>

                        <small>
                            {{ ucfirst(Auth::user()->role ?? 'pendonor') }}
                        </small>

                    </div>

                </div>

                <div class="dropdown-divider"></div>

                <!-- Profil -->
                <a
                    class="dropdown-item donor-dropdown-item"
                    href="{{ route('profile') }}"
                >

                    <span class="dropdown-icon profile-icon">
                        <i class="fas fa-user"></i>
                    </span>

                    <span class="dropdown-item-text">
                        Profil Saya
                    </span>

                    <i class="fas fa-chevron-right dropdown-arrow"></i>

                </a>

                <!-- Logout -->
                <a
                    class="dropdown-item donor-dropdown-item logout-item"
                    href="#"
                    onclick="
                        event.preventDefault();
                        document.getElementById('form-logout').submit();
                    "
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
                    id="form-logout"
                    method="POST"
                    class="d-none"
                >
                    @csrf
                </form>

            </div>

        </li>

    </ul>

</nav>


<style>

.donor-navbar {
    min-height: 72px;
    padding: 0 28px;
    background: #ffffff !important;
    border-bottom: 1px solid #f1dddd;
    box-shadow: 0 4px 18px rgba(111, 38, 54, .07);
    position: relative;
    z-index: 10;
}

.donor-menu-button {
    width: 38px;
    height: 38px;
    display: flex;
    align-items: center;
    justify-content: center;
    border-radius: 11px !important;
    background: #fff0f3;
    color: #bd183d !important;
    transition: .2s ease;
}

.donor-menu-button:hover {
    background: #ffe2e9;
    color: #9f1233 !important;
}

.donor-user-menu {
    min-height: 50px;
    display: flex !important;
    align-items: center;
    padding: 5px 9px !important;
    border-radius: 15px;
    transition: .2s ease;
}

.donor-user-menu:hover {
    background: #fff3f5;
}

.donor-avatar {
    width: 42px;
    height: 42px;
    flex-shrink: 0;
    display: flex;
    align-items: center;
    justify-content: center;
    border-radius: 13px;
    background: linear-gradient(
        135deg,
        #a80e2c,
        #d94b91
    );
    color: #ffffff;
    box-shadow: 0 5px 12px rgba(169, 14, 44, .20);
}

.donor-avatar i {
    font-size: 14px;
}

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
    color: #a08087;
    font-size: 9px;
    font-weight: 700;
    text-transform: uppercase;
    letter-spacing: .6px;
}

.donor-chevron {
    margin-left: 10px;
    color: #a97982;
    font-size: 9px;
    transition: .2s ease;
}

.donor-user-menu[aria-expanded="true"] .donor-chevron {
    transform: rotate(180deg);
    color: #bd183d;
}

.donor-dropdown {
    width: 245px;
    margin-top: 9px;
    padding: 7px 0;
    background: #ffffff;
    border: 1px solid #f0dce0;
    border-radius: 16px;
    overflow: hidden;
    box-shadow: 0 12px 30px rgba(83, 33, 45, .13) !important;
}

.donor-dropdown-header {
    display: flex;
    align-items: center;
    gap: 11px;
    padding: 15px 16px;
    background: linear-gradient(
        135deg,
        #fff6f7,
        #fff0f4
    );
}

.donor-dropdown-avatar {
    width: 42px;
    height: 42px;
    flex-shrink: 0;
    display: flex;
    align-items: center;
    justify-content: center;
    border-radius: 13px;
    background: linear-gradient(
        135deg,
        #a80e2c,
        #d94b91
    );
    color: #ffffff;
    font-size: 14px;
    box-shadow: 0 4px 10px rgba(169, 14, 44, .17);
}

.donor-dropdown-user {
    min-width: 0;
}

.donor-dropdown-header strong {
    display: block;
    max-width: 155px;
    color: #3b3034;
    font-size: 12px;
    font-weight: 900;
    white-space: nowrap;
    overflow: hidden;
    text-overflow: ellipsis;
}

.donor-dropdown-header small {
    display: block;
    margin-top: 4px;
    color: #a08087;
    font-size: 9px;
    font-weight: 700;
    text-transform: uppercase;
    letter-spacing: .5px;
}

.donor-dropdown .dropdown-divider {
    margin: 6px 14px;
    border-top-color: #f2e3e6;
}

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

.donor-dropdown-item:hover {
    background: #fff0f3;
    color: #b6173c !important;
    transform: translateX(2px);
}

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

.profile-icon {
    background: #ffe9ee;
    color: #b6173c;
}

.logout-icon {
    background: #fff0f0;
    color: #c33a50;
}

.dropdown-item-text {
    flex: 1;
}

.dropdown-arrow {
    color: #c7aeb3;
    font-size: 8px;
    transition: .2s ease;
}

.donor-dropdown-item:hover .dropdown-arrow {
    color: #b6173c;
    transform: translateX(2px);
}

@media (max-width: 768px) {

    .donor-navbar {
        min-height: 65px;
        padding: 0 15px;
    }

    .donor-avatar {
        width: 39px;
        height: 39px;
        border-radius: 12px;
    }

    .donor-chevron {
        margin-left: 7px;
    }

}

</style>