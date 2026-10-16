
<aside class="sidebar d-none d-md-flex flex-column">

    <div class="sidebar-brand">
        <div class="brand-icon">
            <i class="fa-solid fa-mosque text-xl"></i>
        </div>

        <div>
            <h5>NU PANINGKABAN</h5>
            <small>Admin Panel</small>
        </div>
    </div>

    <div class="sidebar-menu">
        <div class="menu-label">MENU UTAMA</div>

        <a href="{{ route('admin.dashboard') }}"
           class="sidebar-link {{ request()->routeIs('admin.dashboard') ? 'active' : '' }}">
            <i class="bi bi-grid-1x2-fill"></i>
            <span>Dashboard</span>
        </a>

        <div class="menu-label mt-4">PENGELOLAAN KONTEN</div>

<a href="{{ route('admin.berita.index') }}"
   class="sidebar-link {{ request()->routeIs('admin.berita.*') ? 'active' : '' }}">
    <i class="bi bi-newspaper"></i>
    <span>Manajemen Berita</span>
</a>

<a href="{{ route('admin.kegiatan.index') }}"
   class="sidebar-link {{ request()->routeIs('admin.kegiatan.*') ? 'active' : '' }}">
    <i class="bi bi-calendar-event"></i>
    <span>Manajemen Kegiatan</span>
</a>

<a href="{{ route('admin.pengurus.index') }}"
   class="sidebar-link {{ request()->routeIs('admin.pengurus.*') ? 'active' : '' }}">
    <i class="bi bi-diagram-3"></i>
    <span>Struktur Pengurus</span>
</a>

<a href="{{ route('admin.galeri.index') }}"
   class="sidebar-link {{ request()->routeIs('admin.galeri.*') ? 'active' : '' }}">
    <i class="bi bi-images"></i>
    <span>Galeri Kegiatan</span>
</a>


<a href="{{ route('admin.pengumuman.index') }}"
   class="sidebar-link {{ request()->routeIs('admin.pengumuman.*') ? 'active' : '' }}">
    <i class="bi bi-megaphone"></i>
    <span>Pengumuman</span>
</a>


        <div class="menu-label mt-4">DATA JAMAAH</div>

<a href="{{ route('admin.jamaah.index') }}"
   class="sidebar-link {{ request()->routeIs('admin.jamaah.*') ? 'active' : '' }}">
    <i class="bi bi-person-lines-fill"></i>
    <span>Data Jamaah</span>
</a>

<a href="{{ route('admin.absensi.index') }}"
   class="sidebar-link {{ request()->routeIs('admin.absensi.*') ? 'active' : '' }}">
    <i class="bi bi-person-lines-fill"></i>
    <span>Absensi Jamaah</span>
</a>

<a href="{{ route('admin.pengguna.index') }}"
   class="sidebar-link {{ request()->routeIs('admin.pengguna.*') ? 'active' : '' }}">
    <i class="bi bi-person-lines-fill"></i>
    <span>Manajemen Pengguna</span>
</a>


    <div class="sidebar-bottom">
        <i class="bi bi-shield-check me-2"></i>
        Sistem Informasi NU
    </div>

</aside>

{{-- Sidebar untuk perangkat mobile --}}
<div class="offcanvas offcanvas-start d-md-none"
     tabindex="-1"
     id="sidebarMobile"
     aria-labelledby="sidebarMobileLabel">

    <div class="offcanvas-header">
        <h5 class="offcanvas-title" id="sidebarMobileLabel">
            NU PANINGKABAN
        </h5>

        <button type="button"
                class="btn-close"
                data-bs-dismiss="offcanvas"
                aria-label="Tutup"></button>
    </div>

    <div class="offcanvas-body p-0">
        <div class="mobile-sidebar-menu">

            <a href="{{ route('admin.dashboard') }}" class="sidebar-link">
                <i class="bi bi-grid-1x2-fill"></i>
                <span>Dashboard</span>
            </a>

            <a href="#" class="sidebar-link">
                <i class="bi bi-newspaper"></i>
                <span>Manajemen Berita</span>
            </a>

            <a href="#" class="sidebar-link">
                <i class="bi bi-calendar-event"></i>
                <span>Manajemen Kegiatan</span>
            </a>

            <a href="#" class="sidebar-link">
                <i class="bi bi-people"></i>
                <span>Struktur Pengurus</span>
            </a>

            <a href="#" class="sidebar-link">
                <i class="bi bi-images"></i>
                <span>Galeri Kegiatan</span>
            </a>

            <a href="#" class="sidebar-link">
                <i class="bi bi-megaphone"></i>
                <span>Pengumuman</span>
            </a>

            <a href="#" class="sidebar-link">
                <i class="bi bi-person-lines-fill"></i>
                <span>Data Jamaah</span>
            </a>

            <a href="#" class="sidebar-link">
                <i class="bi bi-clipboard-check"></i>
                <span>Absensi Jamaah</span>
            </a>

            <a href="#" class="sidebar-link">
                <i class="bi bi-person-gear"></i>
                <span>Manajemen Pengguna</span>
            </a>

        </div>
    </div>
</div>

<style>
    .sidebar {
        width: 250px;
        height: 100vh;
        position: fixed;
        top: 0;
        left: 0;
        z-index: 1030;
        background: #14532d;
        color: #fff;
    }

    .sidebar-brand {
        min-height: 88px;
        padding: 20px 18px;
        display: flex;
        align-items: center;
        gap: 12px;
        border-bottom: 1px solid rgba(255,255,255,.13);
    }

    .brand-icon {
        width: 42px;
        height: 42px;
        border-radius: 10px;
        background: rgba(255,255,255,.13);
        display: flex;
        align-items: center;
        justify-content: center;
        font-size: 21px;
    }

    .sidebar-brand h5 {
        font-size: 14px;
        font-weight: 700;
        margin: 0 0 4px;
    }

    .sidebar-brand small {
        color: #c9e3d0;
    }

    .sidebar-menu,
    .mobile-sidebar-menu {
        padding: 18px 12px;
    }

    .sidebar-menu {
        flex: 1;
        overflow-y: auto;
    }

    .menu-label {
        padding: 8px 10px;
        font-size: 10px;
        letter-spacing: 1px;
        font-weight: 700;
        color: #a9cbb4;
    }

    .sidebar-link {
        display: flex;
        align-items: center;
        gap: 12px;
        padding: 11px 12px;
        margin-bottom: 4px;
        color: #e2eee5;
        text-decoration: none;
        border-radius: 7px;
        font-size: 13px;
        transition: .2s;
    }

    .sidebar-link i {
        font-size: 17px;
    }

    .sidebar-link:hover,
    .sidebar-link.active {
        color: #fff;
        background: #237344;
    }

    .sidebar-bottom {
        padding: 17px;
        font-size: 11px;
        color: #c9e3d0;
        border-top: 1px solid rgba(255,255,255,.13);
    }

    .offcanvas .sidebar-link {
        color: #28563a;
    }

    .offcanvas .sidebar-link:hover,
    .offcanvas .sidebar-link.active {
        color: #14532d;
        background: #e4f3e8;
    }
</style>
 