<!DOCTYPE html>
<html lang="id">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">

    <title>@yield('title', 'DONORCONNECT')</title>

    <!-- Font -->
    <link rel="preconnect" href="https://fonts.googleapis.com">
    <link rel="preconnect" href="https://fonts.gstatic.com" crossorigin>
    <link
        href="https://fonts.googleapis.com/css2?family=Nunito:wght@400;500;600;700;800&display=swap"
        rel="stylesheet"
    >

    <!-- Icon -->
    <link
        rel="stylesheet"
        href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.5.2/css/all.min.css"
    >

    <!-- CSS -->
    @vite([
        'resources/css/app.css',
        'resources/css/layouts/pendonor.css'
    ])

    @stack('styles')
</head>

<body>

    @php
        $user = Auth::user();
        $namaPengguna = $user?->nama ?? 'Pengguna';
        $rolePengguna = 'Pendonor';
    @endphp


    <!-- Navbar -->
    <nav class="pendonor-navbar">

        <div class="pendonor-navbar-inner">

            <!-- Logo -->
            <a href="{{ route('dashboard') }}" class="pendonor-brand">
                <span class="pendonor-brand-icon">
                    <i class="fa-solid fa-droplet"></i>
                </span>

                <span>DONORCONNECT</span>
            </a>


            <!-- Menu Desktop -->
            <div class="pendonor-nav-menu">

                <a
                    href="{{ route('dashboard') }}"
                    class="pendonor-nav-link {{ request()->routeIs('dashboard') ? 'active' : '' }}"
                >
                    <i class="fa-solid fa-house"></i>
                    <span>Dashboard</span>
                </a>

                <a
                    href="{{ route('pendonor.kegiatan') }}"
                    class="pendonor-nav-link {{ request()->routeIs('pendonor.kegiatan*') ? 'active' : '' }}"
                >
                    <i class="fa-solid fa-calendar-days"></i>
                    <span>Kegiatan</span>
                </a>

                <a
                    href="{{ route('pendonor.status') }}"
                    class="pendonor-nav-link {{ request()->routeIs('pendonor.status') ? 'active' : '' }}"
                >
                    <i class="fa-solid fa-clipboard-check"></i>
                    <span>Status</span>
                </a>

                <a
                    href="{{ route('pendonor.riwayat') }}"
                    class="pendonor-nav-link {{ request()->routeIs('pendonor.riwayat') ? 'active' : '' }}"
                >
                    <i class="fa-solid fa-clock-rotate-left"></i>
                    <span>Riwayat</span>
                </a>

            </div>


            <!-- Profile -->
            <div class="pendonor-profile">

                <button
                    type="button"
                    class="pendonor-profile-button"
                    onclick="toggleMenu()"
                >

                    <span class="pendonor-profile-avatar">
                        <i class="fa-solid fa-user"></i>
                    </span>

                    <span class="pendonor-profile-name">
                        {{ $namaPengguna }}
                    </span>

                    <i class="fa-solid fa-chevron-down"></i>

                </button>


                <!-- Dropdown -->
                <div
                    id="profileMenu"
                    class="pendonor-profile-menu"
                >

                    <a href="{{ route('profile.pendonor') }}">
                        <i class="fa-solid fa-user"></i>
                        <span>Profil Saya</span>
                    </a>

                    <a href="{{ route('profile.pendonor.edit') }}">
                        <i class="fa-solid fa-pen"></i>
                        <span>Ubah Profil</span>
                    </a>

                    <form
                        action="{{ route('logout') }}"
                        method="POST"
                    >
                        @csrf

                        <button
                            type="submit"
                            class="logout"
                        >
                            <i class="fa-solid fa-right-from-bracket"></i>
                            <span>Logout</span>
                        </button>
                    </form>

                </div>

            </div>

        </div>

    </nav>


    <!-- Konten -->
    <main class="pendonor-main">
        @yield('content')
    </main>


    <!-- Footer -->
    <footer class="pendonor-footer">

        <div class="pendonor-footer-inner">

            <div class="footer-brand">

                <span class="footer-icon">
                    <i class="fa-solid fa-droplet"></i>
                </span>

                <span>DONORCONNECT</span>

            </div>

        </div>

    </footer>


    <!-- Bottom Menu Mobile -->
    <nav class="mobile-bottom-nav">

        <a
            href="{{ route('dashboard') }}"
            class="{{ request()->routeIs('dashboard') ? 'active' : '' }}"
        >
            <i class="fa-solid fa-house"></i>
            <span>Dashboard</span>
        </a>

        <a
            href="{{ route('pendonor.kegiatan') }}"
            class="{{ request()->routeIs('pendonor.kegiatan*') ? 'active' : '' }}"
        >
            <i class="fa-solid fa-calendar-days"></i>
            <span>Kegiatan</span>
        </a>

        <a
            href="{{ route('pendonor.status') }}"
            class="{{ request()->routeIs('pendonor.status') ? 'active' : '' }}"
        >
            <i class="fa-solid fa-clipboard-check"></i>
            <span>Status</span>
        </a>

        <a
            href="{{ route('pendonor.riwayat') }}"
            class="{{ request()->routeIs('pendonor.riwayat') ? 'active' : '' }}"
        >
            <i class="fa-solid fa-clock-rotate-left"></i>
            <span>Riwayat</span>
        </a>

    </nav>


    <!-- Script -->
    <script>

        function toggleMenu() {
            const menu = document.getElementById('profileMenu');

            if (menu) {
                menu.classList.toggle('show');
            }
        }

        function closeMenu() {
            const menu = document.getElementById('profileMenu');

            if (menu) {
                menu.classList.remove('show');
            }
        }

        document.addEventListener('click', function(event) {

            const profile = document.querySelector('.pendonor-profile');
            const menu = document.getElementById('profileMenu');

            if (!profile || !menu) {
                return;
            }

            if (!profile.contains(event.target)) {
                menu.classList.remove('show');
            }

        });

        document.addEventListener('keydown', function(event) {

            if (event.key === 'Escape') {
                closeMenu();
            }

        });

    </script>

    @stack('scripts')

</body>
</html>