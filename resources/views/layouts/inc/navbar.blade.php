<nav class="navbar navbar-expand navbar-light donor-navbar mb-4 static-top">

    <button
        id="sidebarToggleTop"
        class="btn btn-link d-md-none rounded-circle mr-3"
    >
        <i class="fa fa-bars"></i>
    </button>

   

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

                <span class="donor-user-name d-none d-lg-inline">
                    {{ Auth::user()->nama ?? 'Pendonor' }}
                </span>

                <i class="fas fa-chevron-down donor-chevron"></i>

            </a>

            <div
                class="dropdown-menu dropdown-menu-right donor-dropdown shadow animated--grow-in"
                aria-labelledby="userDropdown"
            >

                <div class="donor-dropdown-header">

                    <div class="donor-dropdown-avatar">
                        <i class="fas fa-user"></i>
                    </div>

                    <div>
                        <strong>
                            {{ Auth::user()->nama ?? 'Pendonor' }}
                        </strong>

                        <small>
                            {{ ucfirst(Auth::user()->role ?? 'pendonor') }}
                        </small>
                    </div>

                </div>

                <div class="dropdown-divider"></div>

                <a
                    class="dropdown-item donor-dropdown-item"
                    href="{{ route('profile') }}"
                >
                    <span class="dropdown-icon profile-icon">
                        <i class="fas fa-user"></i>
                    </span>

                    <span>Profil Saya</span>
                </a>

                <div class="dropdown-divider"></div>

                <a
                    class="dropdown-item donor-dropdown-item"
                    href="#"
                    onclick="
                        event.preventDefault();
                        document.getElementById('form-logout').submit();
                    "
                >
                    <span class="dropdown-icon logout-icon">
                        <i class="fas fa-sign-out-alt"></i>
                    </span>

                    <span>Logout</span>
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
    background: #fffaf5 !important;
    border-bottom: 1px solid #f1dedc;
    box-shadow: 0 3px 15px rgba(185, 91, 91, 0.07);
}

.navbar-page-title {
    display: flex;
    align-items: center;
}

.navbar-mini-title {
    color: #b9364d;
    font-size: 11px;
    font-weight: 800;
    letter-spacing: 1.8px;
}

.donor-user-menu {
    display: flex;
    align-items: center;
    padding: 7px 10px !important;
    border-radius: 30px;
    transition: 0.2s ease;
}

.donor-user-menu:hover {
    background: #fff0ef;
}

.donor-avatar {
    width: 39px;
    height: 39px;
    display: flex;
    align-items: center;
    justify-content: center;
    border-radius: 50%;
    background: #fbe0e3;
    border: 2px solid #fff;
    color: #c9364e;
    box-shadow: 0 2px 7px rgba(201, 54, 78, 0.12);
}

.donor-avatar i {
    font-size: 14px;
}

.donor-user-name {
    margin-left: 10px;
    color: #4c4144;
    font-size: 12px;
    font-weight: 700;
    max-width: 140px;
    overflow: hidden;
    text-overflow: ellipsis;
    white-space: nowrap;
}

.donor-chevron {
    margin-left: 8px;
    color: #b8898d;
    font-size: 9px;
}

.donor-dropdown {
    width: 230px;
    margin-top: 8px;
    padding: 8px 0;
    background: #fffdfb;
    border: 1px solid #f0dddd;
    border-radius: 13px;
    overflow: hidden;
}

.donor-dropdown-header {
    display: flex;
    align-items: center;
    gap: 10px;
    padding: 13px 15px;
}

.donor-dropdown-avatar {
    width: 37px;
    height: 37px;
    flex-shrink: 0;
    display: flex;
    align-items: center;
    justify-content: center;
    background: #fde8e9;
    color: #c9364e;
    border-radius: 50%;
}

.donor-dropdown-header strong {
    display: block;
    max-width: 145px;
    color: #443b3e;
    font-size: 11px;
    overflow: hidden;
    text-overflow: ellipsis;
    white-space: nowrap;
}

.donor-dropdown-header small {
    display: block;
    margin-top: 2px;
    color: #a48f92;
    font-size: 9px;
}

.donor-dropdown .dropdown-divider {
    margin: 5px 13px;
    border-top-color: #f1e3e1;
}

.donor-dropdown-item {
    display: flex;
    align-items: center;
    gap: 10px;
    margin: 3px 8px;
    padding: 9px 10px !important;
    border-radius: 8px;
    color: #5d5255 !important;
    font-size: 11px;
    font-weight: 600;
}

.donor-dropdown-item:hover {
    background: #fff1f1;
    color: #bd3048 !important;
}

.dropdown-icon {
    width: 27px;
    height: 27px;
    display: flex;
    align-items: center;
    justify-content: center;
    border-radius: 7px;
    font-size: 10px;
}

.profile-icon {
    background: #fce7e9;
    color: #c9364e;
}

.logout-icon {
    background: #fff0e7;
    color: #d47a50;
}

@media (max-width: 768px) {

    .donor-navbar {
        min-height: 65px;
        padding: 0 15px;
    }

}

</style>