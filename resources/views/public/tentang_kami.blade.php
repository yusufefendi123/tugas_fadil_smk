
@extends('layouts.public.app')

@section('title', 'Tentang Kami - NU Desa Paningkaban')

@section('content')

{{-- HERO --}}
<section class="relative overflow-hidden bg-gradient-to-br from-emerald-950 via-emerald-800 to-emerald-700 text-white">
    <div class="absolute -right-20 -top-20 h-72 w-72 rounded-full bg-emerald-400/10 blur-3xl"></div>
    <div class="absolute -bottom-20 -left-20 h-72 w-72 rounded-full bg-white/10 blur-3xl"></div>

    <div class="relative mx-auto max-w-7xl px-4 py-24 text-center sm:px-6 lg:px-8">
        <div data-reveal>
            <span class="inline-flex items-center rounded-full border border-white/20 bg-white/10 px-4 py-2 text-sm font-semibold">
                <i class="fa-solid fa-mosque mr-2 text-emerald-300"></i>
                Profil Organisasi
            </span>

            <h1 class="mx-auto mt-6 max-w-4xl text-4xl font-extrabold leading-tight sm:text-5xl lg:text-6xl">
                Mengenal Lebih Dekat
                <span class="block text-emerald-300">NU Desa Paningkaban</span>
            </h1>

            <p class="mx-auto mt-6 max-w-2xl leading-8 text-emerald-50">
                Mengenal organisasi, nilai perjuangan, dan semangat kebersamaan
                dalam membangun kehidupan masyarakat yang religius dan harmonis.
            </p>

            <a href="#profil"
               class="mt-8 inline-flex items-center rounded-xl bg-white px-6 py-3 font-bold text-emerald-900 transition duration-300 hover:-translate-y-1 hover:bg-emerald-50">
                Kenali Kami
                <i class="fa-solid fa-arrow-down ml-2"></i>
            </a>
        </div>
    </div>
</section>

{{-- PROFIL --}}
<section id="profil" class="overflow-hidden bg-white py-20">
    <div class="mx-auto grid max-w-7xl items-center gap-12 px-4 sm:px-6 md:grid-cols-2 lg:px-8">

        <div data-reveal="left" class="flex justify-center">
            <div class="relative flex h-64 w-64 items-center justify-center rounded-full bg-emerald-50 sm:h-80 sm:w-80">
                <div class="absolute inset-4 rounded-full border border-emerald-200"></div>
                <div class="absolute inset-8 rounded-full border border-emerald-300"></div>
                <i class="fa-solid fa-mosque relative text-8xl text-emerald-800 sm:text-9xl"></i>
            </div>
        </div>

        <div data-reveal="right">
            <span class="text-sm font-bold uppercase tracking-widest text-emerald-700">
                Tentang Kami
            </span>

            <h2 class="mt-3 text-3xl font-extrabold leading-tight text-slate-800 sm:text-4xl">
                Berkhidmat untuk Agama dan Masyarakat
            </h2>

            <p class="mt-6 leading-8 text-slate-600">
                Nahdlatul Ulama merupakan organisasi Islam yang berperan
                dalam menjaga nilai-nilai keislaman, mempererat persaudaraan,
                serta mendorong kepedulian sosial di tengah masyarakat.
            </p>

            <p class="mt-4 leading-8 text-slate-600">
                Website NU Desa Paningkaban dikembangkan sebagai media
                informasi digital untuk menyampaikan berita, kegiatan,
                pengumuman, profil pengurus, dan dokumentasi aktivitas organisasi.
            </p>

            <div class="mt-6 flex items-start gap-3 rounded-xl border-l-4 border-emerald-600 bg-emerald-50 p-4">
                <i class="fa-solid fa-heart mt-1 text-emerald-700"></i>
                <p class="text-sm leading-7 text-slate-700">
                    Menguatkan silaturahmi dan menghadirkan informasi yang
                    mudah diakses oleh masyarakat.
                </p>
            </div>
        </div>

    </div>
</section>

{{-- VISI DAN MISI --}}
<section class="bg-slate-50 py-20">
    <div class="mx-auto max-w-7xl px-4 sm:px-6 lg:px-8">

        <div data-reveal class="mx-auto mb-12 max-w-2xl text-center">
            <span class="text-sm font-bold uppercase tracking-widest text-emerald-700">
                Arah dan Tujuan
            </span>

            <h2 class="mt-3 text-3xl font-extrabold text-slate-800 sm:text-4xl">
                Visi dan Misi
            </h2>

            <p class="mt-4 leading-7 text-slate-500">
                Landasan untuk membangun kebersamaan dan memberikan manfaat
                bagi umat serta masyarakat.
            </p>
        </div>

        <div class="grid gap-8 md:grid-cols-2">

            <article data-reveal="left"
                     class="rounded-3xl border border-slate-200 bg-white p-8 shadow-sm transition duration-300 hover:-translate-y-2 hover:shadow-xl sm:p-10">
                <div class="flex h-14 w-14 items-center justify-center rounded-2xl bg-emerald-100 text-emerald-700">
                    <i class="fa-solid fa-eye text-2xl"></i>
                </div>

                <h3 class="mt-6 text-2xl font-bold text-slate-800">Visi</h3>

                <p class="mt-4 leading-8 text-slate-600">
                    Mewujudkan kehidupan masyarakat yang religius, harmonis,
                    peduli, dan menjunjung tinggi nilai-nilai keislaman
                    serta persaudaraan.
                </p>
            </article>

            <article data-reveal="right"
                     class="rounded-3xl border border-slate-200 bg-white p-8 shadow-sm transition duration-300 hover:-translate-y-2 hover:shadow-xl sm:p-10">
                <div class="flex h-14 w-14 items-center justify-center rounded-2xl bg-emerald-100 text-emerald-700">
                    <i class="fa-solid fa-bullseye text-2xl"></i>
                </div>

                <h3 class="mt-6 text-2xl font-bold text-slate-800">Misi</h3>

                <ul class="mt-5 space-y-4 text-slate-600">
                    <li class="flex items-start gap-3">
                        <i class="fa-solid fa-circle-check mt-1 text-emerald-600"></i>
                        <span>Mendukung kegiatan keagamaan dan sosial kemasyarakatan.</span>
                    </li>

                    <li class="flex items-start gap-3">
                        <i class="fa-solid fa-circle-check mt-1 text-emerald-600"></i>
                        <span>Mempererat silaturahmi antarjamaah dan pengurus.</span>
                    </li>

                    <li class="flex items-start gap-3">
                        <i class="fa-solid fa-circle-check mt-1 text-emerald-600"></i>
                        <span>Menyediakan informasi organisasi melalui media digital.</span>
                    </li>

                    <li class="flex items-start gap-3">
                        <i class="fa-solid fa-circle-check mt-1 text-emerald-600"></i>
                        <span>Mendorong kepedulian dan partisipasi masyarakat.</span>
                    </li>
                </ul>
            </article>

        </div>
    </div>
</section>

{{-- NILAI ORGANISASI --}}
<section class="bg-white py-20">
    <div class="mx-auto max-w-7xl px-4 sm:px-6 lg:px-8">

        <div data-reveal class="mx-auto mb-12 max-w-2xl text-center">
            <span class="text-sm font-bold uppercase tracking-widest text-emerald-700">
                Nilai Organisasi
            </span>

            <h2 class="mt-3 text-3xl font-extrabold text-slate-800 sm:text-4xl">
                Prinsip yang Kami Junjung
            </h2>

            <p class="mt-4 leading-7 text-slate-500">
                Semangat yang mendukung kehidupan beragama dan bermasyarakat.
            </p>
        </div>

        <div class="grid gap-6 sm:grid-cols-2 lg:grid-cols-3">

            <article data-reveal class="rounded-2xl border border-slate-100 bg-emerald-50/70 p-8 text-center transition duration-300 hover:-translate-y-2 hover:shadow-lg">
                <div class="mx-auto flex h-16 w-16 items-center justify-center rounded-2xl bg-emerald-700 text-white">
                    <i class="fa-solid fa-people-group text-2xl"></i>
                </div>
                <h3 class="mt-5 text-lg font-bold text-slate-800">Persaudaraan</h3>
                <p class="mt-3 text-sm leading-7 text-slate-600">
                    Menjaga silaturahmi dan memperkuat hubungan antarwarga.
                </p>
            </article>

            <article data-reveal class="rounded-2xl border border-slate-100 bg-emerald-50/70 p-8 text-center transition duration-300 hover:-translate-y-2 hover:shadow-lg">
                <div class="mx-auto flex h-16 w-16 items-center justify-center rounded-2xl bg-emerald-700 text-white">
                    <i class="fa-solid fa-book-open text-2xl"></i>
                </div>
                <h3 class="mt-5 text-lg font-bold text-slate-800">Keagamaan</h3>
                <p class="mt-3 text-sm leading-7 text-slate-600">
                    Mendukung pembelajaran dan pengamalan ajaran Islam.
                </p>
            </article>

            <article data-reveal class="rounded-2xl border border-slate-100 bg-emerald-50/70 p-8 text-center transition duration-300 hover:-translate-y-2 hover:shadow-lg">
                <div class="mx-auto flex h-16 w-16 items-center justify-center rounded-2xl bg-emerald-700 text-white">
                    <i class="fa-solid fa-hand-holding-heart text-2xl"></i>
                </div>
                <h3 class="mt-5 text-lg font-bold text-slate-800">Kepedulian Sosial</h3>
                <p class="mt-3 text-sm leading-7 text-slate-600">
                    Menumbuhkan semangat berbagi dan membantu sesama.
                </p>
            </article>

        </div>
    </div>
</section>

{{-- AJAKAN --}}
<section class="bg-gradient-to-r from-emerald-900 to-emerald-800 py-16 text-center text-white">
    <div data-reveal class="mx-auto max-w-3xl px-4">
        <div class="mx-auto flex h-16 w-16 items-center justify-center rounded-2xl bg-white/10">
            <i class="fa-solid fa-hands-holding-circle text-3xl text-emerald-200"></i>
        </div>

        <h2 class="mt-6 text-3xl font-extrabold sm:text-4xl">
            Bersama Membangun Umat
        </h2>

        <p class="mt-4 leading-7 text-emerald-100">
            Mari mempererat persaudaraan dan berpartisipasi dalam kegiatan
            NU Desa Paningkaban.
        </p>

        <a href="{{ route('home') }}"
           class="mt-8 inline-flex items-center rounded-xl bg-white px-6 py-3 font-bold text-emerald-900 transition duration-300 hover:-translate-y-1 hover:bg-emerald-50">
            <i class="fa-solid fa-house mr-2"></i>
            Kembali ke Home
        </a>
    </div>
</section>

@endsection

{{-- ANIMASI SCROLL --}}
@push('styles')
<style>
    [data-reveal] {
        opacity: 0;
        transform: translateY(35px);
        transition:
            opacity 0.8s ease,
            transform 0.8s cubic-bezier(0.22, 1, 0.36, 1);
        will-change: opacity, transform;
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

    @media (prefers-reduced-motion: reduce) {
        [data-reveal] {
            opacity: 1;
            transform: none;
            transition: none;
        }
    }
</style>
@endpush

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
            rootMargin: '0px 0px -40px 0px'
        });

        elements.forEach(function (element, index) {
            element.style.transitionDelay = (index % 3) * 100 + 'ms';
            observer.observe(element);
        });
    });
</script>
@endpush
