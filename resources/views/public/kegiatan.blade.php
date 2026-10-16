
@extends('layouts.public.app')

@section('title', 'Kegiatan NU Desa Paningkaban')

@section('meta_description', 'Informasi kegiatan NU Desa Paningkaban, Banyumas, Jawa Tengah.')

@section('content')

{{-- HEADER --}}
<section class="bg-gradient-to-br from-emerald-950 to-emerald-800 text-white">
    <div class="mx-auto max-w-7xl px-5 py-14 sm:px-8 sm:py-20">
        <div data-reveal class="max-w-3xl">
            <div class="inline-flex items-center gap-2 rounded-full border border-white/20 bg-white/10 px-4 py-2 text-sm font-medium">
                <i class="fa-regular fa-calendar-check text-emerald-300"></i>
                Kegiatan NU Paningkaban
            </div>

            <h1 class="mt-5 text-3xl font-extrabold leading-tight tracking-tight sm:text-4xl lg:text-5xl">
                Kegiatan dan Agenda
            </h1>

            <p class="mt-4 max-w-2xl text-sm leading-7 text-emerald-50 sm:text-base">
                Temukan informasi agenda, aktivitas, dan kegiatan
                Nahdlatul Ulama di Desa Paningkaban.
            </p>

            <a href="{{ route('home') }}"
               class="mt-6 inline-flex items-center gap-2 rounded-lg bg-white px-4 py-3 text-sm font-bold text-emerald-900 transition hover:bg-emerald-50">
                <i class="fa-solid fa-arrow-left"></i>
                Kembali ke Beranda
            </a>
        </div>
    </div>
</section>

{{-- DAFTAR KEGIATAN --}}
<section class="bg-slate-50 px-5 py-12 sm:px-8 sm:py-16">
    <div class="mx-auto max-w-7xl">

        <div data-reveal class="mb-8 flex flex-col gap-3 border-b border-slate-200 pb-6 sm:flex-row sm:items-end sm:justify-between">
            <div>
                <p class="text-sm font-bold uppercase tracking-widest text-emerald-700">
                    Agenda Organisasi
                </p>

                <h2 class="mt-2 text-2xl font-extrabold text-slate-900 sm:text-3xl">
                    Daftar Kegiatan
                </h2>

                <p class="mt-2 text-sm leading-6 text-slate-500">
                    Informasi jadwal dan pelaksanaan kegiatan NU.
                </p>
            </div>

            <p class="text-sm font-medium text-slate-500">
                Total {{ $kegiatan->total() }} kegiatan
            </p>
        </div>

        @if($kegiatan->count() > 0)

            <div class="grid items-start gap-6 md:grid-cols-2 xl:grid-cols-3">
                @foreach($kegiatan as $item)

                    <article
                        data-reveal
                        class="group flex h-full min-w-0 flex-col overflow-hidden rounded-2xl border border-slate-200 bg-white shadow-sm transition duration-300 hover:-translate-y-1 hover:border-emerald-200 hover:shadow-lg">

                        {{-- BAGIAN ATAS KARTU --}}
                        <div class="flex items-start justify-between gap-4 border-b border-slate-100 bg-emerald-50/70 p-5">
                            <div class="flex h-12 w-12 shrink-0 items-center justify-center rounded-xl bg-white text-xl text-emerald-700 shadow-sm">
                                <i class="fa-regular fa-calendar-days"></i>
                            </div>

                            @if($item->status === 'akan_datang')
                                <span class="inline-flex items-center gap-1.5 rounded-full bg-blue-50 px-3 py-1.5 text-xs font-bold text-blue-700 ring-1 ring-inset ring-blue-200">
                                    <i class="fa-regular fa-clock"></i>
                                    Akan Datang
                                </span>
                            @else
                                <span class="inline-flex items-center gap-1.5 rounded-full bg-slate-100 px-3 py-1.5 text-xs font-bold text-slate-600 ring-1 ring-inset ring-slate-200">
                                    <i class="fa-solid fa-check"></i>
                                    Selesai
                                </span>
                            @endif
                        </div>

                        {{-- DETAIL KEGIATAN --}}
                        <div class="flex flex-1 flex-col p-5 sm:p-6">

                            <h3 class="break-words text-xl font-bold leading-7 text-slate-900 transition duration-300 group-hover:text-emerald-700">
                                {{ $item->nama_kegiatan }}
                            </h3>

                            {{-- WAKTU --}}
                            <div class="mt-5 space-y-4">
                                <div class="flex items-start gap-3">
                                    <div class="mt-0.5 flex h-9 w-9 shrink-0 items-center justify-center rounded-lg bg-emerald-50 text-emerald-700">
                                        <i class="fa-regular fa-calendar"></i>
                                    </div>

                                    <div class="min-w-0">
                                        <p class="text-xs font-semibold uppercase tracking-wide text-slate-400">
                                            Tanggal dan waktu mulai
                                        </p>

                                        <p class="mt-1 text-sm font-semibold leading-6 text-slate-700">
                                            {{ \Carbon\Carbon::parse($item->waktu_mulai)->locale('id')->translatedFormat('l, d F Y') }}
                                        </p>

                                        <p class="text-sm text-slate-500">
                                            Pukul {{ \Carbon\Carbon::parse($item->waktu_mulai)->format('H:i') }} WIB
                                        </p>
                                    </div>
                                </div>

                                @if($item->waktu_selesai)
                                    <div class="flex items-start gap-3">
                                        <div class="mt-0.5 flex h-9 w-9 shrink-0 items-center justify-center rounded-lg bg-slate-100 text-slate-600">
                                            <i class="fa-regular fa-clock"></i>
                                        </div>

                                        <div class="min-w-0">
                                            <p class="text-xs font-semibold uppercase tracking-wide text-slate-400">
                                                Waktu selesai
                                            </p>

                                            <p class="mt-1 text-sm font-semibold leading-6 text-slate-700">
                                                {{ \Carbon\Carbon::parse($item->waktu_selesai)->locale('id')->translatedFormat('l, d F Y') }}
                                            </p>

                                            <p class="text-sm text-slate-500">
                                                Pukul {{ \Carbon\Carbon::parse($item->waktu_selesai)->format('H:i') }} WIB
                                            </p>
                                        </div>
                                    </div>
                                @endif

                                {{-- LOKASI --}}
                                <div class="flex items-start gap-3">
                                    <div class="mt-0.5 flex h-9 w-9 shrink-0 items-center justify-center rounded-lg bg-emerald-50 text-emerald-700">
                                        <i class="fa-solid fa-location-dot"></i>
                                    </div>

                                    <div class="min-w-0">
                                        <p class="text-xs font-semibold uppercase tracking-wide text-slate-400">
                                            Lokasi
                                        </p>

                                        <p class="mt-1 break-words text-sm leading-6 text-slate-700">
                                            {{ $item->lokasi }}
                                        </p>
                                    </div>
                                </div>
                            </div>

                            {{-- DESKRIPSI LENGKAP --}}
                            @if($item->deskripsi)
                                <div class="mt-5 border-t border-slate-100 pt-5">
                                    <h4 class="text-sm font-bold text-slate-800">
                                        Deskripsi Kegiatan
                                    </h4>

                                    <div class="mt-2 whitespace-pre-line break-words text-sm leading-7 text-slate-600">
                                        {{ $item->deskripsi }}
                                    </div>
                                </div>
                            @endif

                            {{-- FOOTER KARTU --}}
                            <div class="mt-6 border-t border-slate-100 pt-4">
                                <div class="flex items-center gap-3">
                                    <div class="flex h-9 w-9 shrink-0 items-center justify-center rounded-full bg-emerald-50 text-sm text-emerald-700">
                                        <i class="fa-solid fa-landmark"></i>
                                    </div>

                                    <div>
                                        <p class="text-xs font-bold text-slate-700">
                                            NU Desa Paningkaban
                                        </p>
                                        <p class="mt-1 text-xs text-slate-400">
                                            Informasi kegiatan
                                        </p>
                                    </div>
                                </div>
                            </div>
                        </div>
                    </article>

                @endforeach
            </div>

            {{-- PAGINATION --}}
            @if($kegiatan->hasPages())
                <div data-reveal class="mt-10 flex justify-center">
                    <div class="max-w-full overflow-x-auto rounded-xl border border-slate-200 bg-white px-3 py-3 shadow-sm">
                        {{ $kegiatan->links() }}
                    </div>
                </div>
            @endif

        @else

            {{-- BELUM ADA KEGIATAN --}}
            <div data-reveal class="rounded-2xl border border-slate-200 bg-white px-6 py-14 text-center shadow-sm">
                <div class="mx-auto flex h-16 w-16 items-center justify-center rounded-2xl bg-emerald-50 text-2xl text-emerald-700">
                    <i class="fa-regular fa-calendar-xmark"></i>
                </div>

                <h3 class="mt-5 text-xl font-bold text-slate-900">
                    Belum Ada Kegiatan
                </h3>

                <p class="mx-auto mt-2 max-w-md text-sm leading-7 text-slate-500">
                    Saat ini belum ada data kegiatan yang tersedia.
                    Informasi kegiatan akan ditampilkan setelah ditambahkan oleh admin.
                </p>

                <a href="{{ route('home') }}"
                   class="mt-6 inline-flex items-center gap-2 rounded-lg bg-emerald-700 px-5 py-3 text-sm font-bold text-white transition hover:bg-emerald-800">
                    <i class="fa-solid fa-house"></i>
                    Kembali ke Beranda
                </a>
            </div>

        @endif
    </div>
</section>

{{-- PENUTUP --}}
<section class="bg-white px-5 py-10 sm:px-8">
    <div data-reveal class="mx-auto flex max-w-7xl flex-col gap-4 rounded-2xl border border-emerald-100 bg-emerald-50/70 p-6 sm:flex-row sm:items-center sm:justify-between sm:p-8">
        <div>
            <h2 class="text-lg font-bold text-slate-900">
                Mari Ikuti Kegiatan NU
            </h2>

            <p class="mt-2 text-sm leading-6 text-slate-600">
                Tetap ikuti informasi kegiatan dan aktivitas NU Desa Paningkaban.
            </p>
        </div>

        <a href="{{ route('home') }}"
           class="inline-flex w-fit shrink-0 items-center gap-2 rounded-lg border border-emerald-200 bg-white px-4 py-3 text-sm font-bold text-emerald-800 transition hover:border-emerald-500 hover:bg-emerald-100">
            Kunjungi Beranda
            <i class="fa-solid fa-arrow-right"></i>
        </a>
    </div>
</section>

@endsection

{{-- ANIMASI --}}
@push('styles')
<style>
    [data-reveal] {
        opacity: 0;
        transform: translateY(16px);
        transition: opacity .55s ease, transform .55s ease;
    }

    [data-reveal].is-visible {
        opacity: 1;
        transform: translateY(0);
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
        threshold: 0.08
    });

    elements.forEach(function (element, index) {
        element.style.transitionDelay = (index % 3) * 70 + 'ms';
        observer.observe(element);
    });
});
</script>
@endpush
