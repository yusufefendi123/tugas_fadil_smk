
@extends('layouts.public.app')

@section('title', 'Berita NU Desa Paningkaban')

@section('meta_description', 'Berita dan informasi terbaru NU Desa Paningkaban, Banyumas.')

@section('content')

{{-- HEADER HALAMAN --}}
<section class="bg-gradient-to-br from-emerald-950 to-emerald-800 text-white">
    <div class="mx-auto max-w-7xl px-5 py-14 sm:px-8 sm:py-20">
        <div data-reveal class="max-w-3xl">
            <div class="inline-flex items-center gap-2 rounded-full border border-white/20 bg-white/10 px-4 py-2 text-sm font-medium">
                <i class="fa-regular fa-newspaper text-emerald-300"></i>
                Informasi NU Paningkaban
            </div>

            <h1 class="mt-5 text-3xl font-extrabold leading-tight tracking-tight sm:text-4xl lg:text-5xl">
                Berita dan Informasi
            </h1>

            <p class="mt-4 max-w-2xl text-sm leading-7 text-emerald-50 sm:text-base">
                Informasi terbaru, kabar kegiatan, dan berita seputar
                Nahdlatul Ulama Desa Paningkaban.
            </p>

            <a href="{{ route('home') }}"
               class="mt-6 inline-flex items-center gap-2 rounded-lg bg-white px-4 py-3 text-sm font-bold text-emerald-900 transition hover:bg-emerald-50">
                <i class="fa-solid fa-arrow-left"></i>
                Kembali ke Beranda
            </a>
        </div>
    </div>
</section>

{{-- KONTEN BERITA --}}
<section class="bg-slate-50 px-5 py-12 sm:px-8 sm:py-16">
    <div class="mx-auto max-w-7xl">

        {{-- JUDUL BAGIAN --}}
        <div data-reveal class="mb-8 flex flex-col gap-3 border-b border-slate-200 pb-6 sm:flex-row sm:items-end sm:justify-between">
            <div>
                <p class="text-sm font-bold uppercase tracking-widest text-emerald-700">
                    Kabar Terbaru
                </p>

                <h2 class="mt-2 text-2xl font-extrabold text-slate-900 sm:text-3xl">
                    Berita NU Paningkaban
                </h2>

                <p class="mt-2 text-sm leading-6 text-slate-500">
                    Baca seluruh isi berita langsung di halaman ini.
                </p>
            </div>

            <p class="text-sm font-medium text-slate-500">
                Total {{ $berita->total() }} berita
            </p>
        </div>

        @if($berita->count() > 0)

            {{-- GRID KARTU BERITA --}}
            <div class="grid items-start gap-6 md:grid-cols-2 xl:grid-cols-3">
                @foreach($berita as $item)

                    <article
                        data-reveal
                        class="group min-w-0 overflow-hidden rounded-2xl border border-slate-200 bg-white shadow-sm transition duration-300 hover:-translate-y-1 hover:border-emerald-200 hover:shadow-lg">

                        {{-- GAMBAR --}}
                        @if($item->gambar)
                            <div class="overflow-hidden bg-slate-100">
                                <img
                                    src="{{ asset('storage/' . $item->gambar) }}"
                                    alt="{{ $item->judul }}"
                                    loading="lazy"
                                    class="h-52 w-full object-cover transition duration-500 group-hover:scale-[1.03]">
                            </div>
                        @else
                            <div class="flex h-44 items-center justify-center bg-emerald-50">
                                <div class="flex h-16 w-16 items-center justify-center rounded-2xl bg-white text-2xl text-emerald-700 shadow-sm">
                                    <i class="fa-regular fa-newspaper"></i>
                                </div>
                            </div>
                        @endif

                        {{-- DETAIL BERITA --}}
                        <div class="p-5 sm:p-6">

                            {{-- TANGGAL --}}
                            <div class="flex flex-wrap items-center gap-2 text-xs font-medium text-slate-500 sm:text-sm">
                                <i class="fa-regular fa-calendar text-emerald-700"></i>

                                <span>
                                    @if($item->diterbitkan_pada)
                                        {{ \Carbon\Carbon::parse($item->diterbitkan_pada)->locale('id')->translatedFormat('d F Y') }}
                                    @else
                                        {{ $item->created_at->locale('id')->translatedFormat('d F Y') }}
                                    @endif
                                </span>

                                <span class="text-slate-300">•</span>

                                <span class="text-emerald-700">Berita</span>
                            </div>

                            {{-- JUDUL --}}
                            <h3 class="mt-3 break-words text-lg font-bold leading-7 text-slate-900 sm:text-xl">
                                {{ $item->judul }}
                            </h3>

                            <div class="mt-4 h-1 w-12 rounded-full bg-emerald-600"></div>

                            {{-- ISI LENGKAP --}}
                            <div class="berita-isi mt-4 break-words text-sm leading-7 text-slate-600">
                                {{ $item->isi }}
                            </div>

                            {{-- IDENTITAS --}}
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
                                            Informasi dan kegiatan
                                        </p>
                                    </div>
                                </div>
                            </div>
                        </div>
                    </article>

                @endforeach
            </div>

            {{-- NAVIGASI HALAMAN --}}
            @if($berita->hasPages())
                <div data-reveal class="mt-10 flex justify-center">
                    <div class="max-w-full overflow-x-auto rounded-xl border border-slate-200 bg-white px-3 py-3 shadow-sm">
                        {{ $berita->links() }}
                    </div>
                </div>
            @endif

        @else

            {{-- BELUM ADA BERITA --}}
            <div data-reveal class="rounded-2xl border border-slate-200 bg-white px-6 py-14 text-center shadow-sm">
                <div class="mx-auto flex h-16 w-16 items-center justify-center rounded-2xl bg-emerald-50 text-2xl text-emerald-700">
                    <i class="fa-regular fa-newspaper"></i>
                </div>

                <h3 class="mt-5 text-xl font-bold text-slate-900">
                    Belum Ada Berita
                </h3>

                <p class="mx-auto mt-2 max-w-md text-sm leading-7 text-slate-500">
                    Belum ada berita yang diterbitkan. Informasi terbaru akan muncul di halaman ini setelah dipublikasikan oleh admin.
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
                NU Desa Paningkaban
            </h2>

            <p class="mt-2 text-sm leading-6 text-slate-600">
                Menyajikan informasi dan dokumentasi kegiatan kepada masyarakat.
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

{{-- CSS ANIMASI --}}
@push('styles')
<style>
    [data-reveal] {
        opacity: 0;
        transform: translateY(16px);
        transition:
            opacity .55s ease,
            transform .55s ease;
    }

    [data-reveal].is-visible {
        opacity: 1;
        transform: translateY(0);
    }

    .berita-isi {
        white-space: pre-line;
        overflow-wrap: anywhere;
        word-break: normal;
    }

    @media (prefers-reduced-motion: reduce) {
        [data-reveal] {
            opacity: 1;
            transform: none;
            transition: none;
        }

        .group img {
            transition: none;
        }
    }
</style>
@endpush

{{-- JAVASCRIPT ANIMASI --}}
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
