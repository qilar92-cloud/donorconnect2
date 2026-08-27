<nav class="navbar navbar-expand navbar-light bg-white topbar mb-4 static-top shadow">

    <!-- SIDEBAR TOGGLE MOBILE -->

    <button
        id="sidebarToggleTop"
        class="btn btn-link d-md-none rounded-circle mr-3"
    >
        <i class="fa fa-bars"></i>
    </button>


    <!-- RIGHT NAVBAR -->

    <ul class="navbar-nav ml-auto">


        <!-- USER -->

        <li class="nav-item dropdown no-arrow">

            <a
                class="nav-link dropdown-toggle"
                href="#"
                id="userDropdown"
                role="button"
                data-toggle="dropdown"
                aria-haspopup="true"
                aria-expanded="false"
            >

                <!-- AVATAR -->

                <span
                    class="rounded-circle d-inline-flex align-items-center justify-content-center"
                    style="
                        width:35px;
                        height:35px;
                        background:#fff0f1;
                        color:#d91e36;
                    "
                >
                    <i class="fas fa-user"></i>
                </span>


                <!-- NAMA USER -->

                <span
                    class="ml-2 d-none d-lg-inline text-gray-600 small font-weight-bold"
                >
                    {{ Auth::user()->nama }}
                </span>

            </a>


            <!-- DROPDOWN -->

            <div
                class="dropdown-menu dropdown-menu-right shadow animated--grow-in"
                aria-labelledby="userDropdown"
            >


                <!-- PROFILE -->

                <a
                    class="dropdown-item"
                    href="{{ route('profile') }}"
                >

                    <i
                        class="fas fa-user fa-sm fa-fw mr-2"
                        style="color:#d91e36;"
                    ></i>

                    Profil Saya

                </a>


                <div class="dropdown-divider"></div>


                <!-- LOGOUT -->

                <a
                    class="dropdown-item"
                    href="#"
                    onclick="
                        event.preventDefault();
                        document.getElementById('form-logout').submit();
                    "
                >

                    <i
                        class="fas fa-sign-out-alt fa-sm fa-fw mr-2"
                        style="color:#d91e36;"
                    ></i>

                    Logout

                </a>


                <!-- LOGOUT FORM -->

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