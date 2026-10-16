
@extends('layouts.public.app')

@section('title', 'Pengumuman | NU Desa Paningkaban')

@section('meta_description', 'Informasi dan pengumuman resmi NU Desa Paningkaban.')

@section('content')

{{-- HERO --}}
<section class="relative isolate overflow-hidden bg-emerald-950 py-20 text-white md:py-28">

    {{-- Ornamen latar --}}
    <div class="hero-orb pointer-events-none absolute -right-20 -top-20 -z-10 h-72 w-72 rounded-full bg-emerald-500/20 blur-3xl"></div>

    <div class="hero-orb-delay pointer-events-none absolute -bottom-24 -left-16 -z-10 h-64 w-64 rounded-full bg-teal-400/10 blur-3xl"></div>

    <div class="relative mx-auto max-w-7xl px-6">
        <div data-reveal class="max-w-3xl">

            <span class="inline-flex items-center gap-2 rounded-full border border-emerald-400/30 bg-white/10 px-4 py-2 text-sm text-emerald-100">
                <i class="fa-solid fa-bullhorn"></i>
                Informasi Resmi
            </span>

            <h1 class="mt-6 text-4xl font-extrabold leading-tight md:text-6xl">
                Pengumuman
                <span class="text-emerald-300">NU Paningkaban</span>
            </h1>

            <p class="mt-6 max-w-2xl text-base leading-8 text-emerald-100/80 md:text-lg">
                Temukan informasi dan pemberitahuan resmi mengenai kegiatan,
                agenda, serta berbagai hal penting dari pengurus NU
                Desa Paningkaban.
            </p>

            <a href="#daftar-pengumuman"
               class="announcement-button mt-8 inline-flex items-center gap-3 rounded-xl bg-emerald-400 px-6 py-3.5 font-bold text-emerald-950">
                Lihat Pengumuman
                <i class="fa-solid fa-arrow-down"></i>
            </a>

        </div>
    </div>
</section>

{{-- INFORMASI SINGKAT --}}
<section class="bg-white py-12">
    <div class="mx-auto grid max-w-7xl gap-5 px-6 md:grid-cols-3">

        <div data-reveal class="info-card rounded-2xl border border-emerald-100 bg-emerald-50 p-6">
            <div class="announcement-icon flex h-12 w-12 items-center justify-center rounded-xl bg-emerald-100 text-xl text-emerald-700">
                <i class="fa-solid fa-bullhorn"></i>
            </div>

            <h2 class="mt-4 text-lg font-bold text-slate-800">
                Informasi Terbaru
            </h2>

            <p class="mt-2 text-sm leading-6 text-slate-600">
                Dapatkan informasi terbaru yang telah diterbitkan oleh pengurus.
            </p>
        </div>

        <div data-reveal class="info-card rounded-2xl border border-slate-200 bg-slate-50 p-6">
            <div class="announcement-icon flex h-12 w-12 items-center justify-center rounded-xl bg-white text-xl text-emerald-700 shadow-sm">
                <i class="fa-solid fa-calendar-days"></i>
            </div>

            <h2 class="mt-4 text-lg font-bold text-slate-800">
                Agenda Kegiatan
            </h2>

            <p class="mt-2 text-sm leading-6 text-slate-600">
                Perhatikan informasi agenda dan pemberitahuan kegiatan NU.
            </p>
        </div>

        <div data-reveal class="info-card rounded-2xl border border-slate-200 bg-slate-50 p-6">
            <div class="announcement-icon flex h-12 w-12 items-center justify-center rounded-xl bg-white text-xl text-emerald-700 shadow-sm">
                <i class="fa-solid fa-users"></i>
            </div>

            <h2 class="mt-4 text-lg font-bold text-slate-800">
                Informasi Jamaah
            </h2>

            <p class="mt-2 text-sm leading-6 text-slate-600">
                Memudahkan jamaah mengetahui informasi dari pengurus.
            </p>
        </div>

    </div>
</section>

{{-- DAFTAR PENGUMUMAN DARI DATABASE --}}
<section id="daftar-pengumuman" class="bg-slate-50 py-20">
    <div class="mx-auto max-w-7xl px-6">

        <div data-reveal class="mb-10 flex flex-col justify-between gap-4 md:flex-row md:items-end">
            <div>
                <span class="text-sm font-bold uppercase tracking-widest text-emerald-700">
                    Papan Informasi Digital
                </span>

                <h2 class="announcement-heading mt-3 text-3xl font-extrabold text-slate-900 md:text-4xl">
                    Daftar Pengumuman
                </h2>

                <p class="mt-3 max-w-2xl leading-7 text-slate-600">
                    Berikut adalah pengumuman yang telah diterbitkan
                    oleh pengurus NU Desa Paningkaban.
                </p>
            </div>

            <span class="inline-flex w-fit items-center gap-2 rounded-full bg-emerald-100 px-4 py-2 text-sm font-semibold text-emerald-800">
                <i class="fa-solid fa-database"></i>
                Data Pengumuman
            </span>
        </div>

        @if ($pengumuman->count() > 0)

            <div class="grid gap-6 md:grid-cols-2">

                @foreach ($pengumuman as $item)

                    <article
                        data-reveal
                        class="announcement-card group flex flex-col rounded-2xl border border-slate-200 bg-white p-6 shadow-sm">

                        {{-- Ikon dan status --}}
                        <div class="flex items-start justify-between gap-4">
                            <div class="announcement-icon flex h-12 w-12 shrink-0 items-center justify-center rounded-xl bg-emerald-100 text-xl text-emerald-700">
                                <i class="fa-solid fa-bullhorn"></i>
                            </div>

                            <span class="rounded-full bg-emerald-50 px-3 py-1 text-xs font-bold text-emerald-700">
                                Diterbitkan
                            </span>
                        </div>

                        {{-- Judul pengumuman --}}
                        <h3 class="mt-5 text-xl font-bold leading-8 text-slate-900 transition-colors duration-300 group-hover:text-emerald-700">
                            {{ $item->judul }}
                        </h3>

                        {{-- Isi pengumuman --}}
                        <div class="mt-3 flex-1 whitespace-pre-line break-words leading-7 text-slate-600">
                            {{ \Illuminate\Support\Str::limit(strip_tags($item->isi), 300) }}
                        </div>

                        {{-- Tanggal penerbitan --}}
                        <div class="mt-6 flex items-center gap-2 border-t border-slate-100 pt-4 text-sm text-slate-500">
                            <i class="fa-regular fa-calendar text-emerald-600"></i>

                            <span>
                                @if ($item->diterbitkan_pada)
                                    {{ \Carbon\Carbon::parse($item->diterbitkan_pada)->translatedFormat('d F Y') }}
                                @elseif ($item->created_at)
                                    {{ $item->created_at->translatedFormat('d F Y') }}
                                @else
                                    Tanggal tidak tersedia
                                @endif
                            </span>
                        </div>

                    </article>

                @endforeach

            </div>

            {{-- Pagination --}}
            <div data-reveal class="mt-10">
                {{ $pengumuman->links() }}
            </div>

        @else

            {{-- Jika belum ada pengumuman terbit --}}
            <div data-reveal class="rounded-2xl border border-dashed border-slate-300 bg-white px-6 py-16 text-center">

                <div class="mx-auto flex h-16 w-16 items-center justify-center rounded-full bg-emerald-50 text-2xl text-emerald-600">
                    <i class="fa-regular fa-bell-slash"></i>
                </div>

                <h3 class="mt-5 text-xl font-bold text-slate-800">
                    Belum Ada Pengumuman
                </h3>

                <p class="mx-auto mt-2 max-w-lg leading-7 text-slate-500">
                    Belum ada pengumuman yang diterbitkan saat ini.
                    Silakan kunjungi halaman ini kembali untuk mendapatkan
                    informasi terbaru.
                </p>

            </div>

        @endif

    </div>
</section>

{{-- AJAKAN KEMBALI KE HOME --}}
<section class="relative isolate overflow-hidden bg-emerald-900 py-16 text-white">

    <div class="hero-orb pointer-events-none absolute -right-20 -top-20 -z-10 h-64 w-64 rounded-full bg-emerald-400/10 blur-3xl"></div>

    <div data-reveal class="mx-auto flex max-w-7xl flex-col items-start justify-between gap-6 px-6 md:flex-row md:items-center">

        <div>
            <span class="text-sm font-semibold uppercase tracking-widest text-emerald-300">
                NU Desa Paningkaban
            </span>

            <h2 class="mt-3 text-2xl font-extrabold md:text-3xl">
                Tetap Terhubung dengan Informasi NU
            </h2>

            <p class="mt-3 max-w-2xl leading-7 text-emerald-100/80">
                Kunjungi halaman utama untuk melihat informasi lain
                mengenai NU Desa Paningkaban.
            </p>
        </div>

        <a href="{{ route('home') }}"
           class="announcement-button inline-flex shrink-0 items-center gap-3 rounded-xl bg-white px-6 py-3.5 font-bold text-emerald-900">
            Kembali ke Home
            <i class="fa-solid fa-arrow-right"></i>
        </a>

    </div>
</section>

@endsection

{{-- ANIMASI DAN EFEK VISUAL --}}
@push('styles')
<style>
    /* Scroll reveal */
    [data-reveal] {
        opacity: 0;
        transform: translateY(35px);
        filter: blur(5px);
        transition:
            opacity .8s ease,
            transform .8s cubic-bezier(.2, .7, .2, 1),
            filter .8s ease;
    }

    [data-reveal="left"] {
        transform: translateX(-45px);
    }

    [data-reveal="right"] {
        transform: translateX(45px);
    }

    [data-reveal].is-visible {
        opacity: 1;
        transform: translate(0, 0);
        filter: blur(0);
    }

    /* Kartu pengumuman dengan efek kilau */
    .announcement-card {
        position: relative;
        overflow: hidden;
        transition:
            transform .35s ease,
            box-shadow .35s ease,
            border-color .35s ease;
    }

    .announcement-card::before {
        content: "";
        position: absolute;
        top: 0;
        left: -130%;
        width: 70%;
        height: 100%;
        pointer-events: none;
        background: linear-gradient(
            110deg,
            transparent,
            rgba(16, 185, 129, .12),
            transparent
        );
        transform: skewX(-20deg);
        transition: left .75s ease;
    }

    .announcement-card:hover {
        transform: translateY(-8px);
        border-color: #6ee7b7;
        box-shadow: 0 22px 45px -20px rgba(6, 95, 70, .28);
    }

    .announcement-card:hover::before {
        left: 150%;
    }

    /* Kartu informasi singkat */
    .info-card {
        transition:
            transform .35s ease,
            box-shadow .35s ease,
            border-color .35s ease;
    }

    .info-card:hover {
        transform: translateY(-6px);
        border-color: #a7f3d0;
        box-shadow: 0 15px 35px -20px rgba(6, 95, 70, .25);
    }

    /* Ikon mengambang */
    .announcement-icon {
        animation: iconFloat 3s ease-in-out infinite;
        transition: transform .3s ease;
    }

    .announcement-card:hover .announcement-icon,
    .info-card:hover .announcement-icon {
        transform: rotate(-8deg) scale(1.1);
    }

    @keyframes iconFloat {
        0%, 100% {
            translate: 0 0;
        }
        50% {
            translate: 0 -5px;
        }
    }

    /* Ornamen latar */
    .hero-orb {
        animation: orbFloat 8s ease-in-out infinite;
    }

    .hero-orb-delay {
        animation: orbFloat 10s ease-in-out infinite reverse;
    }

    @keyframes orbFloat {
        0%, 100% {
            transform: translate(0, 0) scale(1);
        }
        50% {
            transform: translate(-18px, 20px) scale(1.08);
        }
    }

    /* Tombol interaktif */
    .announcement-button {
        transition:
            transform .25s ease,
            box-shadow .25s ease,
            background-color .25s ease;
    }

    .announcement-button:hover {
        transform: translateY(-3px);
        box-shadow: 0 12px 28px rgba(16, 185, 129, .22);
    }

    .announcement-button i {
        transition: transform .25s ease;
    }

    .announcement-button:hover i {
        transform: translateX(5px);
    }

    /* Garis dekoratif judul */
    .announcement-heading::after {
        content: "";
        display: block;
        width: 65px;
        height: 4px;
        margin-top: 14px;
        border-radius: 999px;
        background: #10b981;
        transition: width .4s ease;
    }

    .announcement-heading:hover::after {
        width: 100%;
    }

    /* Pengguna yang memilih mengurangi animasi */
    @media (prefers-reduced-motion: reduce) {
        [data-reveal] {
            opacity: 1;
            transform: none;
            filter: none;
            transition: none;
        }

        .announcement-card,
        .info-card,
        .announcement-button,
        .announcement-icon,
        .hero-orb,
        .hero-orb-delay {
            animation: none !important;
            transition: none !important;
        }

        .announcement-card:hover,
        .info-card:hover,
        .announcement-button:hover {
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

        // Tampilkan langsung jika browser tidak mendukung observer
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
            rootMargin: '0px 0px -35px 0px'
        });

        elements.forEach(function (element, index) {
            // Kartu muncul dengan jeda singkat
            if (
                element.classList.contains('announcement-card') ||
                element.classList.contains('info-card')
            ) {
                element.style.transitionDelay =
                    (index % 3) * 100 + 'ms';
            }

            observer.observe(element);
        });
    });
</script>
@endpush
