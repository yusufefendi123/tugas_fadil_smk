
@extends('layouts.public.app')

@section('title', 'Galeri Kegiatan NU Desa Paningkaban')

@section('content')

<style>
    .galeri-hero {
        background: linear-gradient(135deg, #064e3b, #047857, #10b981);
        position: relative;
        overflow: hidden;
    }

    .galeri-card {
        transition: transform .3s ease, box-shadow .3s ease;
    }

    .galeri-card:hover {
        transform: translateY(-6px);
        box-shadow: 0 18px 35px rgba(6, 78, 59, .14);
    }

    .galeri-image {
        transition: transform .5s ease;
    }

    .galeri-card:hover .galeri-image {
        transform: scale(1.06);
    }

    .galeri-reveal {
        opacity: 0;
        transform: translateY(20px);
        transition: opacity .6s ease, transform .6s ease;
    }

    .galeri-reveal.show {
        opacity: 1;
        transform: translateY(0);
    }
</style>

{{-- HEADER --}}
<section class="galeri-hero px-6 py-20 text-white md:py-24">
    <div class="relative z-10 mx-auto max-w-7xl text-center">

        <span class="mb-5 inline-flex items-center gap-2 rounded-full
                     border border-white/30 bg-white/10 px-4 py-2 text-sm">
            <i class="fa-solid fa-images"></i>
            Dokumentasi Kegiatan
        </span>

        <h1 class="mb-5 text-4xl font-extrabold md:text-5xl">
            Galeri Kegiatan NU
        </h1>

        <p class="mx-auto max-w-2xl text-base leading-8 text-emerald-50 md:text-lg">
            Kumpulan dokumentasi kegiatan, kebersamaan jamaah,
            dan aktivitas Nahdlatul Ulama di Desa Paningkaban.
        </p>

        <div class="mt-8 flex justify-center">
            <a href="{{ route('home') }}"
               class="rounded-xl bg-white px-6 py-3 font-semibold
                      text-emerald-800 transition hover:bg-emerald-50">
                <i class="fa-solid fa-house mr-2"></i>
                Kembali ke Beranda
            </a>
        </div>

    </div>
</section>

{{-- ISI GALERI --}}
<section class="bg-gray-50 px-6 py-16 md:py-20">
    <div class="mx-auto max-w-7xl">

        {{-- JUDUL SECTION --}}
        <div class="galeri-reveal mb-10 text-center">
            <span class="text-sm font-bold uppercase tracking-widest text-emerald-700">
                Dokumentasi
            </span>

            <h2 class="mt-3 text-3xl font-extrabold text-gray-900 md:text-4xl">
                Momen Kebersamaan
            </h2>

            <p class="mx-auto mt-4 max-w-2xl leading-7 text-gray-600">
                Lihat berbagai dokumentasi kegiatan dan aktivitas
                jamaah NU Desa Paningkaban.
            </p>
        </div>

        {{-- JUMLAH FOTO --}}
        <div class="galeri-reveal mb-8 flex items-center justify-between">
            <p class="text-sm text-gray-600">
                <i class="fa-solid fa-photo-film mr-2 text-emerald-700"></i>
                Total {{ $galeri->total() }} dokumentasi
            </p>
        </div>

        {{-- DAFTAR FOTO --}}
        @if ($galeri->count() > 0)

            <div class="grid grid-cols-1 gap-7 sm:grid-cols-2
                        lg:grid-cols-3 xl:grid-cols-4">

                @foreach ($galeri as $item)

                    <article class="galeri-card galeri-reveal overflow-hidden
                                    rounded-2xl border border-gray-100
                                    bg-white shadow-sm">

                        {{-- GAMBAR --}}
                        <div class="group relative h-60 overflow-hidden bg-emerald-50">

                            @if ($item->gambar)
                                <img
                                    src="{{ asset('storage/' . $item->gambar) }}"
                                    alt="{{ $item->judul }}"
                                    loading="lazy"
                                    class="galeri-image h-full w-full object-cover"
                                >

                                <button
                                    type="button"
                                    onclick="bukaGambar(
                                        '{{ asset('storage/' . $item->gambar) }}',
                                        {{ \Illuminate\Support\Js::from($item->judul) }}
                                    )"
                                    aria-label="Perbesar gambar {{ $item->judul }}"
                                    class="absolute inset-0 flex items-center
                                           justify-center bg-black/0 text-white
                                           opacity-0 transition duration-300
                                           group-hover:bg-black/40
                                           group-hover:opacity-100">

                                    <span class="flex h-12 w-12 items-center
                                                 justify-center rounded-full
                                                 bg-white/20 backdrop-blur-sm">
                                        <i class="fa-solid fa-magnifying-glass-plus text-xl"></i>
                                    </span>
                                </button>
                            @else
                                <div class="flex h-full flex-col items-center
                                            justify-center text-emerald-700">
                                    <i class="fa-regular fa-image mb-3 text-5xl"></i>
                                    <p class="text-sm">Foto belum tersedia</p>
                                </div>
                            @endif

                            {{-- LABEL KEGIATAN --}}
                            @if ($item->kegiatan)
                                <div class="absolute left-3 top-3 rounded-full
                                            bg-emerald-700 px-3 py-1
                                            text-xs font-semibold text-white">
                                    <i class="fa-solid fa-calendar-check mr-1"></i>
                                    Dokumentasi kegiatan
                                </div>
                            @endif

                        </div>

                        {{-- INFORMASI FOTO --}}
                        <div class="p-5">

                            <h3 class="mb-2 line-clamp-2 text-lg font-bold
                                       leading-7 text-gray-900">
                                {{ $item->judul }}
                            </h3>

                            @if ($item->kegiatan)
                                <p class="mb-3 text-sm font-medium text-emerald-700">
                                    <i class="fa-solid fa-calendar-days mr-2"></i>
                                    {{ $item->kegiatan->nama_kegiatan }}
                                </p>
                            @endif

                            @if ($item->keterangan)
                                <p class="text-sm leading-6 text-gray-600"
                                   style="white-space: pre-line;">{{ $item->keterangan }}</p>
                            @else
                                <p class="text-sm italic text-gray-400">
                                    Tidak ada keterangan foto.
                                </p>
                            @endif

                            <div class="mt-5 border-t border-gray-100 pt-4">
                                <p class="text-xs text-gray-500">
                                    <i class="fa-regular fa-clock mr-1"></i>
                                    Ditambahkan
                                    {{ $item->created_at->format('d M Y') }}
                                </p>
                            </div>

                        </div>
                    </article>

                @endforeach

            </div>

            {{-- PAGINATION --}}
            <div class="mt-12">
                {{ $galeri->links() }}
            </div>

        @else

            {{-- JIKA GALERI KOSONG --}}
            <div class="rounded-3xl border border-dashed border-emerald-200
                        bg-white px-6 py-16 text-center">

                <div class="mx-auto mb-5 flex h-20 w-20 items-center
                            justify-center rounded-full bg-emerald-50">
                    <i class="fa-regular fa-images text-4xl text-emerald-700"></i>
                </div>

                <h3 class="mb-3 text-xl font-bold text-gray-900">
                    Belum Ada Dokumentasi
                </h3>

                <p class="mx-auto max-w-md leading-7 text-gray-600">
                    Dokumentasi kegiatan belum tersedia.
                    Silakan kunjungi kembali halaman ini nanti.
                </p>

            </div>

        @endif

    </div>
</section>

{{-- PENUTUP --}}
<section class="bg-white px-6 py-16">
    <div class="mx-auto max-w-4xl text-center">

        <div class="mb-5 text-4xl text-emerald-700">
            <i class="fa-solid fa-people-group"></i>
        </div>

        <h2 class="mb-4 text-2xl font-extrabold text-gray-900 md:text-3xl">
            Kebersamaan dalam Setiap Kegiatan
        </h2>

        <p class="mb-8 leading-7 text-gray-600">
            Setiap dokumentasi menjadi bagian dari cerita kebersamaan
            dan perjalanan kegiatan NU Desa Paningkaban.
        </p>

        <a href="{{ route('kegiatan') }}"
           class="inline-flex items-center gap-2 rounded-xl
                  bg-emerald-700 px-6 py-3 font-semibold text-white
                  transition hover:bg-emerald-800">
            Lihat Kegiatan
            <i class="fa-solid fa-arrow-right"></i>
        </a>

    </div>
</section>

{{-- MODAL PERBESAR GAMBAR --}}
<div id="modalGambar"
     class="fixed inset-0 z-[100] hidden items-center
            justify-center bg-black/90 p-4"
     onclick="tutupGambar()">

    <button type="button"
            aria-label="Tutup gambar"
            class="absolute right-5 top-5 flex h-11 w-11
                   items-center justify-center rounded-full
                   bg-white/10 text-2xl text-white hover:bg-white/20"
            onclick="tutupGambar()">
        <i class="fa-solid fa-xmark"></i>
    </button>

    <div class="max-h-[90vh] max-w-5xl text-center"
         onclick="event.stopPropagation()">

        <img id="gambarBesar"
             src=""
             alt=""
             class="mx-auto max-h-[78vh] max-w-full rounded-xl object-contain">

        <p id="judulGambar"
           class="mt-4 text-lg font-semibold text-white"></p>

    </div>
</div>

@endsection

@push('scripts')
<script>
    function bukaGambar(src, judul) {
        const modal = document.getElementById('modalGambar');
        const gambar = document.getElementById('gambarBesar');
        const teks = document.getElementById('judulGambar');

        gambar.src = src;
        gambar.alt = judul;
        teks.textContent = judul;

        modal.classList.remove('hidden');
        modal.classList.add('flex');
        document.body.style.overflow = 'hidden';
    }

    function tutupGambar() {
        const modal = document.getElementById('modalGambar');

        modal.classList.add('hidden');
        modal.classList.remove('flex');
        document.body.style.overflow = '';
    }

    document.addEventListener('keydown', function(event) {
        if (event.key === 'Escape') {
            tutupGambar();
        }
    });

    document.addEventListener('DOMContentLoaded', function() {
        const elemen = document.querySelectorAll('.galeri-reveal');

        if ('IntersectionObserver' in window) {
            const observer = new IntersectionObserver(function(entries) {
                entries.forEach(function(entry) {
                    if (entry.isIntersecting) {
                        entry.target.classList.add('show');
                        observer.unobserve(entry.target);
                    }
                });
            }, {
                threshold: 0.1
            });

            elemen.forEach(function(item) {
                observer.observe(item);
            });
        } else {
            elemen.forEach(function(item) {
                item.classList.add('show');
            });
        }
    });
</script>
@endpush
