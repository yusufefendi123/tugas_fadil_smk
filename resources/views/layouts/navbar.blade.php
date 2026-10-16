
<header class="sticky top-0 z-40 w-full bg-white/90 backdrop-blur-xl border-b border-slate-200/80 shadow-sm">
    <div class="flex items-center justify-between px-4 sm:px-6 lg:px-8 h-20">

        <!-- Left Area: Menu & Page Title -->
        <div class="flex items-center space-x-4">

            <!-- Mobile Menu Button -->
            <button
                type="button"
                id="sidebarToggle"
                class="lg:hidden flex items-center justify-center w-10 h-10 rounded-xl text-slate-600 hover:bg-emerald-50 hover:text-emerald-700 transition-all duration-200"
                aria-label="Buka menu navigasi">
                <i class="fa-solid fa-bars-staggered text-lg"></i>
            </button>

            <!-- Page Information -->
            <div class="flex flex-col">
                <div class="flex items-center space-x-2 text-xs font-semibold text-slate-400 mb-1">
                    <i class="fa-solid fa-house-chimney text-emerald-600"></i>
                    <span>Admin Panel</span>
                    <i class="fa-solid fa-chevron-right text-[9px]"></i>
                    <span class="text-emerald-700">NU Desa Paningkaban</span>
                </div>

                <!-- Judul menyesuaikan halaman -->
                <h1 class="text-lg sm:text-xl font-extrabold text-slate-800 tracking-tight">
                    @yield('page-title', 'Selamat Datang, Pengelola!')
                </h1>
            </div>
        </div>

        <!-- Right Area: Administrator Profile & Logout -->
        <div class="flex items-center space-x-2 sm:space-x-4">

            <!-- Administrator: Klik untuk membuka profil -->
            @auth
                <a
                    href="{{ route('admin.profil.index') }}"
                    class="flex items-center space-x-2 md:space-x-3 px-2 sm:px-3 py-1.5 rounded-2xl bg-slate-100/80 border border-slate-200/60 hover:bg-emerald-50 hover:border-emerald-200 transition-all duration-200 cursor-pointer"
                    title="Buka Profil Pengguna">

                    <!-- Icon Administrator -->
                    <div class="w-8 h-8 flex-shrink-0 rounded-xl bg-emerald-600 text-white flex items-center justify-center font-bold text-xs shadow-sm shadow-emerald-600/30">
                        <i class="fa-solid fa-user-shield"></i>
                    </div>

                    <!-- Nama dan Email -->
                    <div class="hidden md:block text-left pr-1">
                        <p class="text-xs font-bold text-slate-800 leading-none">
                            {{ auth()->user()->nama ?? 'Administrator' }}
                        </p>

                        <p class="text-[10px] font-medium text-slate-500 mt-1 leading-none">
                            {{ auth()->user()->email ?? '-' }}
                        </p>
                    </div>
                </a>
            @endauth

            <!-- Divider -->
            <div class="h-6 w-px bg-slate-200 hidden md:block"></div>

            <!-- Tombol Logout -->
            <form
                action="{{ route('admin.logout') }}"
                method="POST"
                class="m-0">

                @csrf

                <button
                    type="submit"
                    class="inline-flex items-center space-x-2 px-3.5 py-2 bg-rose-50 hover:bg-rose-100 text-rose-600 hover:text-rose-700 border border-rose-200/80 rounded-xl text-xs font-bold transition-all duration-200 shadow-sm hover:shadow active:scale-95 group focus:outline-none focus:ring-2 focus:ring-rose-500/20"
                    title="Keluar dari Sistem">

                    <i class="fa-solid fa-right-from-bracket text-xs group-hover:-translate-x-0.5 transition-transform"></i>

                    <span class="hidden sm:inline">Logout</span>
                </button>
            </form>

        </div>
    </div>
</header>

<!-- Script tombol menu sidebar untuk perangkat mobile -->
<script>
    document.addEventListener('DOMContentLoaded', function () {
        const sidebarToggle = document.getElementById('sidebarToggle');
        const sidebar = document.getElementById('sidebar');

        if (sidebarToggle && sidebar) {
            sidebarToggle.addEventListener('click', function () {
                sidebar.classList.toggle('-translate-x-full');
            });
        }
    });
</script>
