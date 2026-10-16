
<header class="navbar-main sticky top-0 z-50 border-b border-emerald-100/80 bg-white/95">
    <nav class="mx-auto max-w-7xl px-4 sm:px-6 lg:px-8">

        <div class="flex h-20 items-center justify-between">

            {{-- LOGO --}}
            <a href="{{ route('home') }}"
               class="navbar-brand group flex items-center gap-3">

                <div class="flex h-12 w-12 items-center justify-center
                            rounded-2xl bg-emerald-700 text-white shadow-md
                            transition duration-300 group-hover:rotate-[-6deg]
                            group-hover:scale-110 group-hover:bg-emerald-800">
                    <i class="fa-solid fa-mosque text-xl"></i>
                </div>

                <div>
                    <h1 class="text-lg font-extrabold text-emerald-900">
                        NU Paningkaban
                    </h1>
                    <p class="text-xs text-slate-500">
                        Desa Paningkaban
                    </p>
                </div>
            </a>

            {{-- TOMBOL MENU MOBILE --}}
            <button id="menu-button"
                    type="button"
                    aria-label="Buka menu"
                    aria-expanded="false"
                    aria-controls="mobile-menu"
                    class="flex h-11 w-11 items-center justify-center
                           rounded-xl border border-slate-200 text-emerald-800
                           transition duration-300 hover:border-emerald-300
                           hover:bg-emerald-50 focus:outline-none
                           focus:ring-2 focus:ring-emerald-500 md:hidden">

                <i id="menu-icon"
                   class="fa-solid fa-bars text-xl transition-transform duration-300"></i>
            </button>

            {{-- MENU DESKTOP --}}
            <div class="hidden items-center gap-1 md:flex">

                <a href="{{ route('home') }}"
                   class="nav-link {{ request()->routeIs('home') ? 'nav-active' : '' }}">
                    Home
                </a>

                <a href="{{ route('pengumuman') }}"
                   class="nav-link {{ request()->routeIs('pengumuman') ? 'nav-active' : '' }}">
                    Pengumuman
                </a>

                <a href="{{ route('berita') }}"
                   class="nav-link {{ request()->routeIs('berita') ? 'nav-active' : '' }}">
                    Berita
                </a>

                <a href="{{ route('kegiatan') }}"
                   class="nav-link {{ request()->routeIs('kegiatan') ? 'nav-active' : '' }}">
                    Kegiatan
                </a>

                <a href="{{ route('pengurus') }}"
                   class="nav-link {{ request()->routeIs('pengurus') ? 'nav-active' : '' }}">
                    Pengurus
                </a>

                <a href="{{ route('galeri') }}"
                   class="nav-link {{ request()->routeIs('galeri') ? 'nav-active' : '' }}">
                    Galeri
                </a>

                <a href="{{ route('tentang_kami') }}"
                   class="nav-link {{ request()->routeIs('tentang_kami') ? 'nav-active' : '' }}">
                    Tentang Kami
                </a>

                <a href="{{ route('login') }}"
                   class="login-button ml-2 inline-flex items-center gap-2
                          rounded-xl bg-emerald-700 px-5 py-3
                          font-bold text-white shadow-sm
                          transition duration-300 hover:-translate-y-0.5
                          hover:bg-emerald-800 hover:shadow-lg">
                    <i class="fa-solid fa-right-to-bracket"></i>
                    Login Admin
                </a>

            </div>
        </div>

        {{-- MENU MOBILE --}}
        <div id="mobile-menu"
             class="mobile-menu hidden border-t border-slate-100 py-3 md:hidden">

            <div class="flex flex-col gap-1">

                <a href="{{ route('home') }}"
                   class="mobile-link {{ request()->routeIs('home') ? 'mobile-active' : '' }}">
                    <i class="fa-solid fa-house w-6 text-center"></i>
                    Home
                </a>

                <a href="{{ route('pengumuman') }}"
                   class="mobile-link {{ request()->routeIs('pengumuman') ? 'mobile-active' : '' }}">
                    <i class="fa-solid fa-bullhorn w-6 text-center"></i>
                    Pengumuman
                </a>

                <a href="{{ route('berita') }}"
                   class="mobile-link {{ request()->routeIs('berita') ? 'mobile-active' : '' }}">
                    <i class="fa-regular fa-newspaper w-6 text-center"></i>
                    Berita
                </a>

                <a href="{{ route('kegiatan') }}"
                   class="mobile-link {{ request()->routeIs('kegiatan') ? 'mobile-active' : '' }}">
                    <i class="fa-solid fa-calendar-days w-6 text-center"></i>
                    Kegiatan
                </a>

                <a href="{{ route('pengurus') }}"
                   class="mobile-link {{ request()->routeIs('pengurus') ? 'mobile-active' : '' }}">
                    <i class="fa-solid fa-people-group w-6 text-center"></i>
                    Pengurus
                </a>

                <a href="{{ route('galeri') }}"
                   class="mobile-link {{ request()->routeIs('galeri') ? 'mobile-active' : '' }}">
                    <i class="fa-solid fa-images w-6 text-center"></i>
                    Galeri
                </a>

                <a href="{{ route('tentang_kami') }}"
                   class="mobile-link {{ request()->routeIs('tentang_kami') ? 'mobile-active' : '' }}">
                    <i class="fa-solid fa-circle-info w-6 text-center"></i>
                    Tentang Kami
                </a>

                <a href="{{ route('login') }}"
                   class="mt-2 flex items-center justify-center gap-2
                          rounded-xl bg-emerald-700 px-4 py-3
                          font-bold text-white transition duration-300
                          hover:bg-emerald-800">
                    <i class="fa-solid fa-right-to-bracket"></i>
                    Login Admin
                </a>

            </div>
        </div>

    </nav>
</header>

<style>
    /* NAVBAR UTAMA */
    .navbar-main {
        box-shadow: 0 4px 20px rgba(6, 78, 59, 0.04);
        transition: box-shadow .3s ease, background .3s ease;
    }

    .navbar-main:hover {
        box-shadow: 0 6px 24px rgba(6, 78, 59, 0.08);
    }

    /* ANIMASI LOGO */
    .navbar-brand {
        animation: navbarBrandIn .65s ease both;
    }

    @keyframes navbarBrandIn {
        from {
            opacity: 0;
            transform: translateX(-18px);
        }
        to {
            opacity: 1;
            transform: translateX(0);
        }
    }

    /* MENU DESKTOP */
    .nav-link {
        position: relative;
        display: inline-flex;
        align-items: center;
        padding: 10px 11px;
        border-radius: 10px;
        color: #475569;
        font-size: 14px;
        font-weight: 600;
        white-space: nowrap;
        transition: color .25s ease, background .25s ease;
    }

    .nav-link::after {
        position: absolute;
        right: 11px;
        bottom: 5px;
        left: 11px;
        height: 2px;
        border-radius: 99px;
        background: #047857;
        content: "";
        transform: scaleX(0);
        transform-origin: center;
        transition: transform .25s ease;
    }

    .nav-link:hover {
        color: #047857;
        background: #ecfdf5;
    }

    .nav-link:hover::after,
    .nav-link.nav-active::after {
        transform: scaleX(1);
    }

    .nav-link.nav-active {
        color: #047857;
        background: #ecfdf5;
    }

    /* TOMBOL LOGIN */
    .login-button i {
        transition: transform .25s ease;
    }

    .login-button:hover i {
        transform: translateX(3px);
    }

    /* MENU MOBILE */
    .mobile-menu {
        transform-origin: top;
    }

    .mobile-menu.menu-opening {
        animation: mobileMenuIn .3s ease both;
    }

    @keyframes mobileMenuIn {
        from {
            opacity: 0;
            transform: translateY(-10px) scaleY(.97);
        }
        to {
            opacity: 1;
            transform: translateY(0) scaleY(1);
        }
    }

    .mobile-link {
        display: flex;
        align-items: center;
        gap: 12px;
        border-radius: 10px;
        padding: 12px 14px;
        color: #475569;
        font-weight: 600;
        transition: color .2s ease, background .2s ease,
                    padding-left .2s ease;
    }

    .mobile-link:hover {
        padding-left: 20px;
        color: #047857;
        background: #ecfdf5;
    }

    .mobile-link.mobile-active {
        color: #047857;
        background: #ecfdf5;
        font-weight: 700;
    }

    @media (prefers-reduced-motion: reduce) {
        .navbar-brand,
        .mobile-menu.menu-opening {
            animation: none;
        }

        .nav-link,
        .mobile-link,
        .login-button,
        .navbar-main {
            transition: none;
        }
    }
</style>

<script>
    document.addEventListener('DOMContentLoaded', function () {
        const menuButton = document.getElementById('menu-button');
        const mobileMenu = document.getElementById('mobile-menu');
        const menuIcon = document.getElementById('menu-icon');

        if (!menuButton || !mobileMenu || !menuIcon) {
            return;
        }

        function bukaMenu() {
            mobileMenu.classList.remove('hidden');
            mobileMenu.classList.remove('menu-opening');

            // Memulai ulang animasi saat menu dibuka.
            void mobileMenu.offsetWidth;

            mobileMenu.classList.add('menu-opening');
            menuButton.setAttribute('aria-expanded', 'true');
            menuButton.setAttribute('aria-label', 'Tutup menu');

            menuIcon.classList.remove('fa-bars');
            menuIcon.classList.add('fa-xmark');
            menuIcon.style.transform = 'rotate(90deg)';
        }

        function tutupMenu() {
            mobileMenu.classList.add('hidden');
            mobileMenu.classList.remove('menu-opening');

            menuButton.setAttribute('aria-expanded', 'false');
            menuButton.setAttribute('aria-label', 'Buka menu');

            menuIcon.classList.remove('fa-xmark');
            menuIcon.classList.add('fa-bars');
            menuIcon.style.transform = 'rotate(0deg)';
        }

        menuButton.addEventListener('click', function () {
            const isOpen =
                menuButton.getAttribute('aria-expanded') === 'true';

            if (isOpen) {
                tutupMenu();
            } else {
                bukaMenu();
            }
        });

        // Tutup menu setelah pengguna memilih halaman.
        mobileMenu.querySelectorAll('a').forEach(function (link) {
            link.addEventListener('click', tutupMenu);
        });

        // Tutup menu jika tombol Escape ditekan.
        document.addEventListener('keydown', function (event) {
            if (event.key === 'Escape') {
                tutupMenu();
            }
        });

        // Tutup menu ketika ukuran layar berubah menjadi desktop.
        window.addEventListener('resize', function () {
            if (window.innerWidth >= 768) {
                tutupMenu();
            }
        });
    });
</script>
