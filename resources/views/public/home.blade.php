
@extends('layouts.public.app')

@section('title', 'Home - NU Desa Paningkaban')

@section('meta_description', 'Website informasi NU Desa Paningkaban untuk berita, kegiatan, pengumuman, pengurus, dan dokumentasi.')

@section('content')

{{-- HERO --}}
<section class="home-hero relative isolate overflow-hidden bg-gradient-to-br from-emerald-950 via-emerald-800 to-emerald-700 text-white">

    {{-- Ornamen bergerak --}}
    <div class="home-orb pointer-events-none absolute -right-20 -top-20 -z-10 h-80 w-80 rounded-full bg-emerald-400/10 blur-3xl"></div>
    <div class="home-orb home-orb-delay pointer-events-none absolute -bottom-24 left-1/4 -z-10 h-72 w-72 rounded-full bg-white/5 blur-3xl"></div>

    <div class="relative mx-auto grid max-w-7xl items-center gap-12 px-4 py-24 sm:px-6 md:grid-cols-2 lg:px-8 lg:py-32">

        {{-- TEKS HERO --}}
        <div data-reveal="left">

            <span class="hero-label inline-flex items-center rounded-full border border-white/20 bg-white/10 px-4 py-2 text-sm font-semibold">
                <i class="fa-solid fa-mosque mr-2 text-emerald-300"></i>
                Website NU Desa Paningkaban
            </span>

            <h1 class="mt-6 text-4xl font-extrabold leading-tight sm:text-5xl lg:text-6xl">
                Satu Website,
                <span class="hero-title-accent text-emerald-300">
                    Beragam Informasi
                </span>
            </h1>

            <p class="mt-6 max-w-xl leading-8 text-emerald-50">
                Temukan informasi terbaru, jadwal kegiatan, pengumuman,
                susunan pengurus, dan dokumentasi aktivitas NU Desa Paningkaban
                dalam satu tempat.
            </p>

            <div class="mt-8 flex flex-wrap gap-4">

                <a href="#fitur"
                   class="home-button inline-flex items-center rounded-xl bg-white px-6 py-3 font-bold text-emerald-900">
                    Jelajahi Website
                    <i class="fa-solid fa-arrow-right ml-2"></i>
                </a>

                <a href="{{ route('tentang_kami') }}"
                   class="home-button inline-flex items-center rounded-xl border border-white/40 px-6 py-3 font-bold text-white hover:bg-white/10">
                    Tentang Kami
                    <i class="fa-solid fa-circle-info ml-2"></i>
                </a>

            </div>

            <div class="mt-8 flex flex-wrap gap-x-6 gap-y-3 text-sm text-emerald-100">
                <span>
                    <i class="fa-solid fa-circle-check mr-2 text-emerald-300"></i>
                    Informasi Terpusat
                </span>

                <span>
                    <i class="fa-solid fa-circle-check mr-2 text-emerald-300"></i>
                    Mudah Diakses
                </span>
            </div>

        </div>

        {{-- ILUSTRASI HERO --}}
        <div data-reveal="right" class="relative mx-auto w-full max-w-md">

            <div class="hero-panel rounded-3xl border border-white/20 bg-white/10 p-5 shadow-2xl backdrop-blur-sm sm:p-7">

                <div class="flex items-center justify-between border-b border-white/15 pb-5">

                    <div>
                        <p class="text-sm text-emerald-200">
                            Selamat Datang
                        </p>

                        <h2 class="mt-1 text-xl font-bold">
                            NU Paningkaban
                        </h2>
                    </div>

                    <div class="hero-mosque-icon flex h-12 w-12 items-center justify-center rounded-2xl bg-white/15">
                        <i class="fa-solid fa-mosque text-2xl text-emerald-200"></i>
                    </div>

                </div>

                <div class="mt-5 space-y-4">

                    <a href="{{ url('/berita') }}"
                       class="hero-info-row flex items-center gap-4 rounded-2xl bg-white/10 p-4">

                        <div class="hero-info-icon flex h-12 w-12 shrink-0 items-center justify-center rounded-xl bg-emerald-400/20 text-emerald-200">
                            <i class="fa-solid fa-newspaper text-xl"></i>
                        </div>

                        <div>
                            <h3 class="font-bold">Berita dan Informasi</h3>
                            <p class="mt-1 text-sm text-emerald-100">
                                Informasi terbaru organisasi
                            </p>
                        </div>

                        <i class="fa-solid fa-chevron-right ml-auto text-sm text-emerald-200"></i>
                    </a>

                    <a href="{{ url('/kegiatan') }}"
                       class="hero-info-row flex items-center gap-4 rounded-2xl bg-white/10 p-4">

                        <div class="hero-info-icon flex h-12 w-12 shrink-0 items-center justify-center rounded-xl bg-emerald-400/20 text-emerald-200">
                            <i class="fa-solid fa-calendar-days text-xl"></i>
                        </div>

                        <div>
                            <h3 class="font-bold">Agenda Kegiatan</h3>
                            <p class="mt-1 text-sm text-emerald-100">
                                Informasi kegiatan jamaah
                            </p>
                        </div>

                        <i class="fa-solid fa-chevron-right ml-auto text-sm text-emerald-200"></i>
                    </a>

                    <a href="{{ url('/galeri') }}"
                       class="hero-info-row flex items-center gap-4 rounded-2xl bg-white/10 p-4">

                        <div class="hero-info-icon flex h-12 w-12 shrink-0 items-center justify-center rounded-xl bg-emerald-400/20 text-emerald-200">
                            <i class="fa-solid fa-images text-xl"></i>
                        </div>

                        <div>
                            <h3 class="font-bold">Dokumentasi Kegiatan</h3>
                            <p class="mt-1 text-sm text-emerald-100">
                                Kenangan dalam galeri digital
                            </p>
                        </div>

                        <i class="fa-solid fa-chevron-right ml-auto text-sm text-emerald-200"></i>
                    </a>

                </div>
            </div>

            {{-- Label melayang --}}
            <div class="hero-floating-badge absolute -bottom-5 -left-4 hidden rounded-2xl bg-white px-5 py-4 text-emerald-900 shadow-xl sm:block">
                <i class="fa-solid fa-heart mr-2 text-emerald-600"></i>
                <span class="font-bold">Bersama Melayani Umat</span>
            </div>

            <div class="hero-floating-dot absolute -right-3 top-12 hidden h-14 w-14 items-center justify-center rounded-2xl border border-white/20 bg-emerald-400/20 text-2xl text-emerald-200 shadow-xl backdrop-blur sm:flex">
                <i class="fa-solid fa-star"></i>
            </div>

        </div>

    </div>

    {{-- Pemisah dekoratif --}}
    <div class="pointer-events-none absolute bottom-0 left-0 h-1 w-full bg-gradient-to-r from-transparent via-emerald-300/60 to-transparent"></div>

</section>

{{-- MENU FITUR --}}
<section id="fitur" class="bg-slate-50 py-20">
    <div class="mx-auto max-w-7xl px-4 sm:px-6 lg:px-8">

        <div data-reveal class="mx-auto max-w-2xl text-center">

            <span class="inline-flex items-center gap-2 text-sm font-bold uppercase tracking-widest text-emerald-700">
                <i class="fa-solid fa-compass"></i>
                Jelajahi Website
            </span>

            <h2 class="mt-3 text-3xl font-extrabold text-slate-800 sm:text-4xl">
                Temukan Informasi yang Kamu Butuhkan
            </h2>

            <p class="mt-4 leading-7 text-slate-500">
                Akses berbagai informasi dan dokumentasi NU Desa Paningkaban
                melalui menu yang tersedia.
            </p>

        </div>

        <div class="mt-12 grid gap-6 sm:grid-cols-2 lg:grid-cols-3">

            {{-- BERITA --}}
            <a href="{{ url('/berita') }}"
               data-reveal
               class="feature-card group rounded-2xl border border-slate-200 bg-white p-7 shadow-sm">

                <div class="feature-icon flex h-14 w-14 items-center justify-center rounded-2xl bg-blue-50 text-blue-700">
                    <i class="fa-solid fa-newspaper text-2xl"></i>
                </div>

                <h3 class="mt-5 text-xl font-bold text-slate-800 transition-colors group-hover:text-emerald-700">
                    Berita
                </h3>

                <p class="mt-3 text-sm leading-7 text-slate-500">
                    Baca informasi, kabar terbaru, dan perkembangan kegiatan NU.
                </p>

                <span class="mt-5 inline-flex items-center font-bold text-emerald-700">
                    Lihat Berita
                    <i class="fa-solid fa-arrow-right ml-2 transition-transform group-hover:translate-x-2"></i>
                </span>

            </a>

            {{-- KEGIATAN --}}
            <a href="{{ url('/kegiatan') }}"
               data-reveal
               class="feature-card group rounded-2xl border border-slate-200 bg-white p-7 shadow-sm">

                <div class="feature-icon flex h-14 w-14 items-center justify-center rounded-2xl bg-emerald-50 text-emerald-700">
                    <i class="fa-solid fa-calendar-days text-2xl"></i>
                </div>

                <h3 class="mt-5 text-xl font-bold text-slate-800 transition-colors group-hover:text-emerald-700">
                    Kegiatan
                </h3>

                <p class="mt-3 text-sm leading-7 text-slate-500">
                    Lihat jadwal kegiatan keagamaan dan aktivitas jamaah.
                </p>

                <span class="mt-5 inline-flex items-center font-bold text-emerald-700">
                    Lihat Kegiatan
                    <i class="fa-solid fa-arrow-right ml-2 transition-transform group-hover:translate-x-2"></i>
                </span>

            </a>

            {{-- PENGUMUMAN --}}
            <a href="{{ route('pengumuman') }}"
               data-reveal
               class="feature-card group rounded-2xl border border-slate-200 bg-white p-7 shadow-sm">

                <div class="feature-icon flex h-14 w-14 items-center justify-center rounded-2xl bg-amber-50 text-amber-700">
                    <i class="fa-solid fa-bullhorn text-2xl"></i>
                </div>

                <h3 class="mt-5 text-xl font-bold text-slate-800 transition-colors group-hover:text-emerald-700">
                    Pengumuman
                </h3>

                <p class="mt-3 text-sm leading-7 text-slate-500">
                    Temukan pemberitahuan dan informasi penting untuk jamaah.
                </p>

                <span class="mt-5 inline-flex items-center font-bold text-emerald-700">
                    Lihat Pengumuman
                    <i class="fa-solid fa-arrow-right ml-2 transition-transform group-hover:translate-x-2"></i>
                </span>

            </a>

            {{-- PENGURUS --}}
            <a href="{{ url('/pengurus') }}"
               data-reveal
               class="feature-card group rounded-2xl border border-slate-200 bg-white p-7 shadow-sm">

                <div class="feature-icon flex h-14 w-14 items-center justify-center rounded-2xl bg-violet-50 text-violet-700">
                    <i class="fa-solid fa-users text-2xl"></i>
                </div>

                <h3 class="mt-5 text-xl font-bold text-slate-800 transition-colors group-hover:text-emerald-700">
                    Pengurus
                </h3>

                <p class="mt-3 text-sm leading-7 text-slate-500">
                    Kenali susunan pengurus dan jabatan dalam organisasi.
                </p>

                <span class="mt-5 inline-flex items-center font-bold text-emerald-700">
                    Lihat Pengurus
                    <i class="fa-solid fa-arrow-right ml-2 transition-transform group-hover:translate-x-2"></i>
                </span>

            </a>

            {{-- GALERI --}}
            <a href="{{ url('/galeri') }}"
               data-reveal
               class="feature-card group rounded-2xl border border-slate-200 bg-white p-7 shadow-sm">

                <div class="feature-icon flex h-14 w-14 items-center justify-center rounded-2xl bg-pink-50 text-pink-700">
                    <i class="fa-solid fa-images text-2xl"></i>
                </div>

                <h3 class="mt-5 text-xl font-bold text-slate-800 transition-colors group-hover:text-emerald-700">
                    Galeri
                </h3>

                <p class="mt-3 text-sm leading-7 text-slate-500">
                    Lihat dokumentasi foto berbagai kegiatan dan aktivitas NU.
                </p>

                <span class="mt-5 inline-flex items-center font-bold text-emerald-700">
                    Lihat Galeri
                    <i class="fa-solid fa-arrow-right ml-2 transition-transform group-hover:translate-x-2"></i>
                </span>

            </a>

            {{-- TENTANG KAMI --}}
            <a href="{{ route('tentang_kami') }}"
               data-reveal
               class="feature-card group rounded-2xl border border-slate-200 bg-white p-7 shadow-sm">

                <div class="feature-icon flex h-14 w-14 items-center justify-center rounded-2xl bg-teal-50 text-teal-700">
                    <i class="fa-solid fa-circle-info text-2xl"></i>
                </div>

                <h3 class="mt-5 text-xl font-bold text-slate-800 transition-colors group-hover:text-emerald-700">
                    Tentang Kami
                </h3>

                <p class="mt-3 text-sm leading-7 text-slate-500">
                    Kenali profil organisasi, tujuan, dan nilai-nilai yang dijunjung.
                </p>

                <span class="mt-5 inline-flex items-center font-bold text-emerald-700">
                    Pelajari Lebih Lanjut
                    <i class="fa-solid fa-arrow-right ml-2 transition-transform group-hover:translate-x-2"></i>
                </span>

            </a>

        </div>
    </div>
</section>

{{-- KEUNGGULAN WEBSITE --}}
<section class="overflow-hidden bg-white py-20">
    <div class="mx-auto max-w-7xl px-4 sm:px-6 lg:px-8">

        <div class="grid items-center gap-12 md:grid-cols-2">

            <div data-reveal="left">

                <span class="text-sm font-bold uppercase tracking-widest text-emerald-700">
                    Informasi dalam Satu Tempat
                </span>

                <h2 class="mt-3 text-3xl font-extrabold leading-tight text-slate-800 sm:text-4xl">
                    Lebih Mudah Mengikuti Informasi NU
                </h2>

                <p class="mt-5 leading-8 text-slate-600">
                    Website ini dirancang untuk membantu masyarakat menemukan
                    informasi organisasi dengan lebih mudah tanpa harus mencari
                    informasi dari banyak tempat.
                </p>

                <a href="{{ route('tentang_kami') }}"
                   class="home-text-link mt-7 inline-flex items-center font-bold text-emerald-700">
                    Kenali NU Paningkaban
                    <i class="fa-solid fa-arrow-right ml-2"></i>
                </a>

            </div>

            <div class="space-y-5" data-reveal="right">

                <div class="benefit-card flex gap-4 rounded-2xl bg-slate-50 p-5">
                    <div class="benefit-icon flex h-12 w-12 shrink-0 items-center justify-center rounded-xl bg-emerald-100 text-emerald-700">
                        <i class="fa-solid fa-magnifying-glass text-xl"></i>
                    </div>

                    <div>
                        <h3 class="font-bold text-slate-800">
                            Informasi Mudah Ditemukan
                        </h3>

                        <p class="mt-2 text-sm leading-6 text-slate-500">
                            Berita dan informasi organisasi dikelompokkan sesuai menu.
                        </p>
                    </div>
                </div>

                <div class="benefit-card flex gap-4 rounded-2xl bg-slate-50 p-5">
                    <div class="benefit-icon flex h-12 w-12 shrink-0 items-center justify-center rounded-xl bg-emerald-100 text-emerald-700">
                        <i class="fa-solid fa-calendar-check text-xl"></i>
                    </div>

                    <div>
                        <h3 class="font-bold text-slate-800">
                            Informasi Kegiatan
                        </h3>

                        <p class="mt-2 text-sm leading-6 text-slate-500">
                            Masyarakat dapat melihat jadwal dan informasi kegiatan.
                        </p>
                    </div>
                </div>

                <div class="benefit-card flex gap-4 rounded-2xl bg-slate-50 p-5">
                    <div class="benefit-icon flex h-12 w-12 shrink-0 items-center justify-center rounded-xl bg-emerald-100 text-emerald-700">
                        <i class="fa-solid fa-photo-film text-xl"></i>
                    </div>

                    <div>
                        <h3 class="font-bold text-slate-800">
                            Dokumentasi Digital
                        </h3>

                        <p class="mt-2 text-sm leading-6 text-slate-500">
                            Dokumentasi kegiatan dapat dilihat kembali melalui galeri.
                        </p>
                    </div>
                </div>

            </div>

        </div>
    </div>
</section>

{{-- AJAKAN --}}
<section class="home-cta relative isolate overflow-hidden bg-gradient-to-r from-emerald-950 to-emerald-800 py-16 text-center text-white">

    <div class="home-orb pointer-events-none absolute -right-16 -top-20 -z-10 h-64 w-64 rounded-full bg-emerald-400/10 blur-3xl"></div>

    <div data-reveal class="mx-auto max-w-3xl px-4">

        <div class="cta-icon mx-auto flex h-16 w-16 items-center justify-center rounded-2xl bg-white/10">
            <i class="fa-solid fa-handshake-angle text-3xl text-emerald-200"></i>
        </div>

        <h2 class="mt-6 text-3xl font-extrabold sm:text-4xl">
            Tetap Terhubung dengan NU Paningkaban
        </h2>

        <p class="mt-4 leading-7 text-emerald-100">
            Ikuti informasi dan kegiatan NU Desa Paningkaban melalui website ini.
            Mari menjaga silaturahmi dan membangun kebersamaan.
        </p>

        <a href="{{ route('tentang_kami') }}"
           class="home-button mt-8 inline-flex items-center rounded-xl bg-white px-6 py-3 font-bold text-emerald-900">
            Tentang Organisasi
            <i class="fa-solid fa-arrow-right ml-2"></i>
        </a>

    </div>
</section>

@endsection

{{-- CSS ANIMASI HOME --}}
@push('styles')
<style>
    /* Scroll reveal */
    [data-reveal] {
        opacity: 0;
        transform: translateY(30px);
        transition:
            opacity .75s ease,
            transform .75s cubic-bezier(.22, 1, .36, 1);
    }

    [data-reveal="left"] {
        transform: translateX(-35px);
    }

    [data-reveal="right"] {
        transform: translateX(35px);
    }

    [data-reveal].is-visible {
        opacity: 1;
        transform: translate(0, 0);
    }

    /* Hero */
    .home-hero {
        background-size: 200% 200%;
        animation: heroGradient 14s ease infinite;
    }

    @keyframes heroGradient {
        0%, 100% {
            background-position: 0% 50%;
        }
        50% {
            background-position: 100% 50%;
        }
    }

    .home-orb {
        animation: homeOrbFloat 9s ease-in-out infinite;
    }

    .home-orb-delay {
        animation-duration: 12s;
        animation-direction: reverse;
    }

    @keyframes homeOrbFloat {
        0%, 100% {
            transform: translate(0, 0) scale(1);
        }
        50% {
            transform: translate(-20px, 18px) scale(1.08);
        }
    }

    .hero-title-accent {
        background: linear-gradient(90deg, #a7f3d0, #6ee7b7, #d1fae5, #a7f3d0);
        background-size: 250% auto;
        background-clip: text;
        -webkit-background-clip: text;
        -webkit-text-fill-color: transparent;
        animation: titleShimmer 6s linear infinite;
    }

    @keyframes titleShimmer {
        to {
            background-position: 250% center;
        }
    }

    .hero-panel {
        animation: panelFloat 6s ease-in-out infinite;
        transition: border-color .35s ease, box-shadow .35s ease;
    }

    .hero-panel:hover {
        border-color: rgba(167, 243, 208, .5);
        box-shadow: 0 30px 70px -25px rgba(0, 0, 0, .35);
    }

    @keyframes panelFloat {
        0%, 100% {
            transform: translateY(0);
        }
        50% {
            transform: translateY(-8px);
        }
    }

    .hero-mosque-icon {
        animation: mosquePulse 3s ease-in-out infinite;
    }

    @keyframes mosquePulse {
        0%, 100% {
            box-shadow: 0 0 0 0 rgba(110, 231, 183, 0);
        }
        50% {
            box-shadow: 0 0 0 9px rgba(110, 231, 183, .08);
        }
    }

    .hero-floating-badge {
        animation: badgeFloat 4s ease-in-out infinite;
    }

    .hero-floating-dot {
        animation: badgeFloat 5s ease-in-out infinite reverse;
    }

    @keyframes badgeFloat {
        0%, 100% {
            translate: 0 0;
        }
        50% {
            translate: 0 -9px;
        }
    }

    /* Baris informasi di hero */
    .hero-info-row {
        transition: background-color .3s ease, transform .3s ease;
    }

    .hero-info-row:hover {
        background-color: rgba(255, 255, 255, .17);
        transform: translateX(5px);
    }

    .hero-info-icon {
        transition: transform .3s ease, background-color .3s ease;
    }

    .hero-info-row:hover .hero-info-icon {
        transform: rotate(-6deg) scale(1.08);
        background-color: rgba(52, 211, 153, .3);
    }

    /* Kartu fitur dengan efek hover dan kilau */
    .feature-card {
        position: relative;
        overflow: hidden;
        transition:
            transform .35s ease,
            box-shadow .35s ease,
            border-color .35s ease;
    }

    .feature-card::before {
        content: "";
        position: absolute;
        top: 0;
        left: -130%;
        width: 65%;
        height: 100%;
        pointer-events: none;
        background: linear-gradient(
            110deg,
            transparent,
            rgba(16, 185, 129, .09),
            transparent
        );
        transform: skewX(-20deg);
        transition: left .75s ease;
    }

    .feature-card:hover {
        transform: translateY(-8px);
        border-color: #6ee7b7;
        box-shadow: 0 24px 45px -25px rgba(6, 95, 70, .30);
    }

    .feature-card:hover::before {
        left: 150%;
    }

    .feature-icon {
        transition:
            transform .35s ease,
            background-color .35s ease,
            color .35s ease;
    }

    .feature-card:hover .feature-icon {
        transform: translateY(-3px) rotate(-5deg) scale(1.06);
        background-color: #047857;
        color: white;
    }

    /* Bagian keunggulan */
    .benefit-card {
        transition: transform .3s ease, background-color .3s ease;
    }

    .benefit-card:hover {
        transform: translateX(5px);
        background-color: #ecfdf5;
    }

    .benefit-icon {
        transition: transform .3s ease;
    }

    .benefit-card:hover .benefit-icon {
        transform: rotate(-7deg) scale(1.08);
    }

    .home-text-link i {
        transition: transform .25s ease;
    }

    .home-text-link:hover i {
        transform: translateX(5px);
    }

    /* Tombol */
    .home-button {
        transition:
            transform .25s ease,
            box-shadow .25s ease,
            background-color .25s ease;
    }

    .home-button:hover {
        transform: translateY(-3px);
        box-shadow: 0 12px 28px rgba(16, 185, 129, .2);
    }

    .home-button i {
        transition: transform .25s ease;
    }

    .home-button:hover i {
        transform: translateX(4px);
    }

    .cta-icon {
        animation: ctaPulse 4s ease-in-out infinite;
    }

    @keyframes ctaPulse {
        0%, 100% {
            transform: translateY(0) rotate(0);
        }
        50% {
            transform: translateY(-5px) rotate(3deg);
        }
    }

    /* Kurangi animasi jika diminta melalui pengaturan perangkat */
    @media (prefers-reduced-motion: reduce) {
        [data-reveal] {
            opacity: 1;
            transform: none;
            transition: none;
        }

        .home-hero,
        .home-orb,
        .hero-title-accent,
        .hero-panel,
        .hero-mosque-icon,
        .hero-floating-badge,
        .hero-floating-dot,
        .cta-icon {
            animation: none !important;
        }

        .feature-card,
        .feature-icon,
        .benefit-card,
        .benefit-icon,
        .home-button,
        .hero-info-row {
            transition: none !important;
        }

        .feature-card:hover,
        .benefit-card:hover,
        .home-button:hover,
        .hero-info-row:hover {
            transform: none;
        }
    }
</style>
@endpush

{{-- JAVASCRIPT SCROLL REVEAL --}}
@push('scripts')
<script>
    document.addEventListener('DOMContentLoaded', function () {
        const elements = document.querySelectorAll('[data-reveal]');

        if (!('IntersectionObserver' in window)) {
            elements.forEach(function (element) {
                element.classList.add('is-visible');
            });

            return;
        }

        const observer = new IntersectionObserver(function (entries) {
            entries.forEach(function (entry) {
                if (entry.isIntersecting) {
                    entry.target.classList.add('is-visible');
                    observer.unobserve(entry.target);
                }
            });
        }, {
            threshold: 0.12,
            rootMargin: '0px 0px -30px 0px'
        });

        elements.forEach(function (element, index) {
            // Kartu pada satu bagian muncul dengan jeda bertahap
            element.style.transitionDelay = (index % 3) * 100 + 'ms';
            observer.observe(element);
        });
    });
</script>
@endpush
