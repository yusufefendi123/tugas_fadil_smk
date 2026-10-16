
@extends('layouts.public.app')

@section('title', 'Struktur Pengurus NU Desa Paningkaban')
@section('meta_description', 'Struktur organisasi dan daftar pengurus NU Desa Paningkaban.')

@section('content')

@php
    $normalisasiJabatan = function ($jabatan) {
        return strtolower(trim(preg_replace('/\s+/', ' ', $jabatan ?? '')));
    };

    $daftarPengurus = $pengurus->sortBy('nama')->sortBy('urutan')->values();

    $dataUtama = collect([
        'penasihat' => collect(),
        'ketua umum' => collect(),
        'bendahara' => collect(),
        'sekretaris' => collect(),
        'anggota' => collect(),
    ]);

    $dataBidang = collect();

    foreach ($daftarPengurus as $item) {
        $jabatan = $normalisasiJabatan($item->jabatan);
        $kelompok = null;

        if (in_array($jabatan, ['penasihat', 'penasehat'], true)) {
            $kelompok = 'penasihat';
        } elseif (in_array($jabatan, ['ketua umum', 'ketua'], true)) {
            $kelompok = 'ketua umum';
        } elseif (str_contains($jabatan, 'bendahara')) {
            $kelompok = 'bendahara';
        } elseif (str_contains($jabatan, 'sekretaris') || str_contains($jabatan, 'sekertaris')) {
            $kelompok = 'sekretaris';
        } elseif ($jabatan === 'anggota') {
            $kelompok = 'anggota';
        }

        if ($kelompok !== null) {
            $dataUtama->get($kelompok)->push($item);
        } else {
            $namaBidang = trim($item->jabatan ?? '');

            if ($namaBidang === '') {
                $namaBidang = 'Jabatan Lainnya';
            }

            if (!$dataBidang->has($namaBidang)) {
                $dataBidang->put($namaBidang, collect());
            }

            $dataBidang->get($namaBidang)->push($item);
        }
    }

    $buatKelompok = function ($daftarOrang) {
        return $daftarOrang
            ->sortBy('nama')
            ->sortBy('urutan')
            ->values()
            ->chunk(3);
    };

    $romawi = function ($nomor) {
        $nilai = [
            1000 => 'M',
            900 => 'CM',
            500 => 'D',
            400 => 'CD',
            100 => 'C',
            90 => 'XC',
            50 => 'L',
            40 => 'XL',
            10 => 'X',
            9 => 'IX',
            5 => 'V',
            4 => 'IV',
            1 => 'I',
        ];

        $hasil = '';

        foreach ($nilai as $angka => $simbol) {
            while ($nomor >= $angka) {
                $hasil .= $simbol;
                $nomor -= $angka;
            }
        }

        return $hasil;
    };

    $namaTampilan = [
        'penasihat' => 'Penasihat',
        'ketua umum' => 'Ketua Umum',
        'bendahara' => 'Bendahara',
        'sekretaris' => 'Sekretaris',
        'anggota' => 'Anggota',
    ];

    $ambilIkon = function ($jabatan) {
        $nama = strtolower($jabatan);

        if (str_contains($nama, 'penasihat') || str_contains($nama, 'penasehat')) {
            return 'fa-lightbulb';
        }

        if (str_contains($nama, 'ketua')) {
            return 'fa-user-tie';
        }

        if (str_contains($nama, 'bendahara')) {
            return 'fa-wallet';
        }

        if (str_contains($nama, 'sekretaris') || str_contains($nama, 'sekertaris')) {
            return 'fa-file-lines';
        }

        if (str_contains($nama, 'dakwah')) {
            return 'fa-book-open';
        }

        if (str_contains($nama, 'ekonomi')) {
            return 'fa-chart-line';
        }

        if (str_contains($nama, 'sosial')) {
            return 'fa-handshake';
        }

        return 'fa-people-group';
    };

    $dataPeriode = $pengurus->first(function ($item) {
        return !empty($item->periode);
    });

    $periode = $dataPeriode ? $dataPeriode->periode : null;
@endphp

<section class="relative overflow-hidden bg-gradient-to-br from-emerald-950 via-emerald-900 to-emerald-700 text-white">
    <div class="absolute -right-20 -top-20 h-64 w-64 rounded-full border border-white/10"></div>
    <div class="absolute -bottom-28 -left-16 h-72 w-72 rounded-full border border-white/10"></div>

    <div class="relative mx-auto max-w-7xl px-5 py-14 sm:px-8 sm:py-20">
        <div data-reveal class="max-w-3xl">
            <div class="inline-flex items-center gap-2 rounded-full border border-white/20 bg-white/10 px-4 py-2 text-sm font-medium">
                <i class="fa-solid fa-people-group text-emerald-300"></i>
                Organisasi NU Paningkaban
            </div>

            <h1 class="mt-5 text-3xl font-extrabold leading-tight sm:text-4xl lg:text-5xl">
                Struktur Pengurus
            </h1>

            <p class="mt-4 max-w-2xl text-sm leading-7 text-emerald-50 sm:text-base">
                Susunan pengurus NU Desa Paningkaban beserta jabatan dan bidang yang mendukung kegiatan organisasi.
            </p>

            @if($periode)
                <p class="mt-4 text-sm text-emerald-100">
                    <i class="fa-regular fa-calendar mr-2"></i>
                    Periode {{ $periode }}
                </p>
            @endif

            <a href="{{ route('home') }}"
               class="mt-6 inline-flex items-center gap-2 rounded-xl bg-white px-5 py-3 text-sm font-bold text-emerald-900 transition duration-300 hover:-translate-y-1 hover:bg-emerald-50">
                <i class="fa-solid fa-arrow-left"></i>
                Kembali ke Beranda
            </a>
        </div>
    </div>
</section>

<section class="bg-[#f5f7f4] px-4 py-12 sm:px-8 sm:py-16">
    <div class="mx-auto max-w-6xl">

        <div data-reveal class="mb-12 text-center">
            <p class="text-sm font-bold uppercase tracking-[.2em] text-emerald-700">
                Susunan Organisasi
            </p>

            <h2 class="mt-3 text-2xl font-extrabold text-slate-900 sm:text-3xl">
                Bagan Pengurus NU
            </h2>

            <p class="mx-auto mt-3 max-w-2xl text-sm leading-7 text-slate-500">
                Setiap kotak menampilkan maksimal tiga orang dengan penomoran Romawi secara otomatis.
            </p>
        </div>

        @if($pengurus->count() > 0)

            @if($dataUtama->get('penasihat')->isNotEmpty())
                @foreach($buatKelompok($dataUtama->get('penasihat')) as $indeksKelompok => $orangDalamKotak)
                    <div data-reveal class="mx-auto flex w-full flex-col items-center">
                        <div class="org-card w-full max-w-md overflow-hidden rounded-2xl border border-emerald-100 bg-white shadow-md">
                            <div class="bg-emerald-900 px-5 py-4 text-center text-white">
                                <i class="fa-solid fa-lightbulb mb-2 text-emerald-300"></i>
                                <h3 class="font-extrabold uppercase">Penasihat</h3>
                            </div>

                            <div class="space-y-3 p-4">
                                @foreach($orangDalamKotak as $indeksOrang => $item)
                                    <div class="flex items-center gap-3 rounded-xl bg-emerald-50 p-3">
                                        <span class="flex h-10 w-10 shrink-0 items-center justify-center rounded-full bg-emerald-800 font-bold text-white">
                                            {{ $romawi(($indeksKelompok * 3) + $indeksOrang + 1) }}
                                        </span>

                                        @if($item->foto)
                                            <img src="{{ asset('storage/' . $item->foto) }}" alt="{{ $item->nama }}" loading="lazy" class="h-12 w-12 shrink-0 rounded-full object-cover">
                                        @else
                                            <div class="flex h-12 w-12 shrink-0 items-center justify-center rounded-full bg-white text-emerald-700">
                                                <i class="fa-solid fa-user"></i>
                                            </div>
                                        @endif

                                        <div class="min-w-0">
                                            <p class="break-words font-bold text-slate-800">{{ $item->nama }}</p>
                                            @if($item->keterangan)
                                                <p class="mt-1 whitespace-pre-line text-xs text-slate-500">{{ $item->keterangan }}</p>
                                            @endif
                                        </div>
                                    </div>
                                @endforeach
                            </div>
                        </div>

                        @if(!$loop->last)
                            <div class="h-8 w-0.5 bg-emerald-300"></div>
                        @endif
                    </div>
                @endforeach

                <div class="flex justify-center">
                    <div class="h-8 w-0.5 bg-emerald-300"></div>
                </div>
            @endif

            @if($dataUtama->get('ketua umum')->isNotEmpty())
                @foreach($buatKelompok($dataUtama->get('ketua umum')) as $indeksKelompok => $orangDalamKotak)
                    <div data-reveal class="mx-auto flex w-full flex-col items-center">
                        <div class="org-card w-full max-w-md overflow-hidden rounded-2xl border border-emerald-100 bg-white shadow-md">
                            <div class="bg-emerald-900 px-5 py-4 text-center text-white">
                                <i class="fa-solid fa-user-tie mb-2 text-emerald-300"></i>
                                <h3 class="font-extrabold uppercase">Ketua Umum</h3>
                            </div>

                            <div class="space-y-3 p-4">
                                @foreach($orangDalamKotak as $indeksOrang => $item)
                                    <div class="flex items-center gap-3 rounded-xl bg-emerald-50 p-3">
                                        <span class="flex h-10 w-10 shrink-0 items-center justify-center rounded-full bg-emerald-800 font-bold text-white">
                                            {{ $romawi(($indeksKelompok * 3) + $indeksOrang + 1) }}
                                        </span>

                                        @if($item->foto)
                                            <img src="{{ asset('storage/' . $item->foto) }}" alt="{{ $item->nama }}" loading="lazy" class="h-12 w-12 shrink-0 rounded-full object-cover">
                                        @else
                                            <div class="flex h-12 w-12 shrink-0 items-center justify-center rounded-full bg-white text-emerald-700">
                                                <i class="fa-solid fa-user"></i>
                                            </div>
                                        @endif

                                        <div class="min-w-0">
                                            <p class="break-words font-bold text-slate-800">{{ $item->nama }}</p>
                                            @if($item->keterangan)
                                                <p class="mt-1 whitespace-pre-line text-xs text-slate-500">{{ $item->keterangan }}</p>
                                            @endif
                                        </div>
                                    </div>
                                @endforeach
                            </div>
                        </div>

                        @if(!$loop->last)
                            <div class="h-8 w-0.5 bg-emerald-300"></div>
                        @endif
                    </div>
                @endforeach

                <div class="flex justify-center">
                    <div class="h-8 w-0.5 bg-emerald-300"></div>
                </div>
            @endif

            <div class="mx-auto grid max-w-4xl grid-cols-2 items-start gap-4 sm:gap-6">

                @foreach(['bendahara', 'sekretaris'] as $jabatanKolom)
                    <div class="min-w-0 w-full">
                        @if($dataUtama->get($jabatanKolom)->isNotEmpty())
                            @foreach($buatKelompok($dataUtama->get($jabatanKolom)) as $indeksKelompok => $orangDalamKotak)
                                <div data-reveal class="org-card mb-5 overflow-hidden rounded-2xl border border-emerald-100 bg-white shadow-md">
                                    <div class="bg-emerald-900 px-3 py-4 text-center text-white sm:px-4">
                                        <i class="fa-solid {{ $ambilIkon($jabatanKolom) }} mb-2 text-emerald-300"></i>
                                        <h3 class="text-sm font-extrabold uppercase sm:text-base">
                                            {{ $namaTampilan[$jabatanKolom] }}
                                        </h3>

                                        @if($indeksKelompok > 0)
                                            <p class="mt-1 text-xs text-emerald-200">
                                                Kelompok {{ $indeksKelompok + 1 }}
                                            </p>
                                        @endif
                                    </div>

                                    <div class="space-y-3 p-3 sm:p-4">
                                        @foreach($orangDalamKotak as $indeksOrang => $item)
                                            <div class="flex min-w-0 items-center gap-2 rounded-xl bg-emerald-50 p-2 sm:gap-3 sm:p-3">
                                                <span class="flex h-8 w-8 shrink-0 items-center justify-center rounded-full bg-emerald-800 text-xs font-bold text-white sm:h-10 sm:w-10 sm:text-sm">
                                                    {{ $romawi(($indeksKelompok * 3) + $indeksOrang + 1) }}
                                                </span>

                                                @if($item->foto)
                                                    <img src="{{ asset('storage/' . $item->foto) }}" alt="{{ $item->nama }}" loading="lazy" class="h-9 w-9 shrink-0 rounded-full object-cover sm:h-12 sm:w-12">
                                                @else
                                                    <div class="flex h-9 w-9 shrink-0 items-center justify-center rounded-full bg-white text-emerald-700 sm:h-12 sm:w-12">
                                                        <i class="fa-solid fa-user"></i>
                                                    </div>
                                                @endif

                                                <div class="min-w-0">
                                                    <p class="break-words text-xs font-bold text-slate-800 sm:text-sm">
                                                        {{ $item->nama }}
                                                    </p>

                                                    @if($item->keterangan)
                                                        <p class="mt-1 whitespace-pre-line break-words text-xs text-slate-500">
                                                            {{ $item->keterangan }}
                                                        </p>
                                                    @endif
                                                </div>
                                            </div>
                                        @endforeach
                                    </div>
                                </div>
                            @endforeach
                        @endif
                    </div>
                @endforeach

            </div>

            @if($dataUtama->get('anggota')->isNotEmpty())
                <div class="flex justify-center">
                    <div class="h-8 w-0.5 bg-emerald-300"></div>
                </div>

                @foreach($buatKelompok($dataUtama->get('anggota')) as $indeksKelompok => $orangDalamKotak)
                    <div data-reveal class="mx-auto mb-5 w-full max-w-md overflow-hidden rounded-2xl border border-emerald-100 bg-white shadow-md">
                        <div class="bg-emerald-900 px-5 py-4 text-center text-white">
                            <i class="fa-solid fa-users mb-2 text-emerald-300"></i>
                            <h3 class="font-extrabold uppercase">Anggota</h3>
                            @if($indeksKelompok > 0)
                                <p class="mt-1 text-xs text-emerald-200">Kelompok {{ $indeksKelompok + 1 }}</p>
                            @endif
                        </div>

                        <div class="space-y-3 p-4">
                            @foreach($orangDalamKotak as $indeksOrang => $item)
                                <div class="flex items-center gap-3 rounded-xl bg-emerald-50 p-3">
                                    <span class="flex h-10 w-10 shrink-0 items-center justify-center rounded-full bg-emerald-800 font-bold text-white">
                                        {{ $romawi(($indeksKelompok * 3) + $indeksOrang + 1) }}
                                    </span>

                                    @if($item->foto)
                                        <img src="{{ asset('storage/' . $item->foto) }}" alt="{{ $item->nama }}" loading="lazy" class="h-12 w-12 shrink-0 rounded-full object-cover">
                                    @else
                                        <div class="flex h-12 w-12 items-center justify-center rounded-full bg-white text-emerald-700">
                                            <i class="fa-solid fa-user"></i>
                                        </div>
                                    @endif

                                    <div class="min-w-0">
                                        <p class="break-words font-bold text-slate-800">{{ $item->nama }}</p>
                                        @if($item->keterangan)
                                            <p class="mt-1 whitespace-pre-line text-xs text-slate-500">{{ $item->keterangan }}</p>
                                        @endif
                                    </div>
                                </div>
                            @endforeach
                        </div>
                    </div>
                @endforeach
            @endif

            @if($dataBidang->isNotEmpty())
                <div data-reveal class="mb-8 mt-12 text-center">
                    <span class="inline-flex items-center gap-2 rounded-full bg-emerald-800 px-5 py-3 text-sm font-bold text-white">
                        <i class="fa-solid fa-sitemap"></i>
                        Bidang dan Jabatan Lainnya
                    </span>

                    <p class="mt-3 text-sm text-slate-500">
                        Susunan pengurus pada setiap bidang organisasi.
                    </p>
                </div>

                <div class="grid items-start gap-5 sm:grid-cols-2 lg:grid-cols-3">
                    @foreach($dataBidang as $namaJabatan => $daftarOrang)
                        @foreach($buatKelompok($daftarOrang) as $indeksKelompok => $orangDalamKotak)
                            <div data-reveal class="org-card overflow-hidden rounded-2xl border border-slate-200 bg-white shadow-sm transition duration-300 hover:-translate-y-1 hover:border-emerald-200 hover:shadow-lg">
                                <div class="bg-slate-900 px-4 py-4 text-center text-white">
                                    <i class="fa-solid {{ $ambilIkon($namaJabatan) }} mb-2 text-emerald-300"></i>
                                    <h3 class="text-sm font-extrabold">{{ $namaJabatan }}</h3>

                                    @if($indeksKelompok > 0)
                                        <p class="mt-1 text-xs text-slate-300">Kelompok {{ $indeksKelompok + 1 }}</p>
                                    @endif
                                </div>

                                <div class="space-y-3 p-4">
                                    @foreach($orangDalamKotak as $indeksOrang => $item)
                                        <div class="flex items-center gap-3 rounded-xl border border-emerald-100 bg-emerald-50/60 p-3">
                                            <span class="flex h-8 w-8 shrink-0 items-center justify-center rounded-full bg-emerald-700 text-xs font-extrabold text-white">
                                                {{ $romawi(($indeksKelompok * 3) + $indeksOrang + 1) }}
                                            </span>

                                            @if($item->foto)
                                                <img src="{{ asset('storage/' . $item->foto) }}" alt="{{ $item->nama }}" loading="lazy" class="h-10 w-10 shrink-0 rounded-full object-cover">
                                            @else
                                                <div class="flex h-10 w-10 shrink-0 items-center justify-center rounded-full bg-white text-emerald-700">
                                                    <i class="fa-solid fa-user"></i>
                                                </div>
                                            @endif

                                            <div class="min-w-0">
                                                <p class="break-words text-sm font-bold text-slate-800">{{ $item->nama }}</p>

                                                @if($item->keterangan)
                                                    <p class="mt-1 whitespace-pre-line text-xs leading-5 text-slate-500">{{ $item->keterangan }}</p>
                                                @endif
                                            </div>
                                        </div>
                                    @endforeach
                                </div>
                            </div>
                        @endforeach
                    @endforeach
                </div>
            @endif

        @else
            <div data-reveal class="rounded-2xl border border-slate-200 bg-white px-6 py-14 text-center shadow-sm">
                <div class="mx-auto flex h-16 w-16 items-center justify-center rounded-2xl bg-emerald-50 text-2xl text-emerald-700">
                    <i class="fa-solid fa-people-group"></i>
                </div>

                <h3 class="mt-5 text-xl font-bold text-slate-900">
                    Data Pengurus Belum Tersedia
                </h3>

                <p class="mx-auto mt-2 max-w-md text-sm leading-7 text-slate-500">
                    Data pengurus akan ditampilkan setelah ditambahkan melalui halaman admin.
                </p>
            </div>
        @endif

    </div>
</section>

<section class="bg-white px-5 py-10 sm:px-8">
    <div data-reveal class="mx-auto flex max-w-5xl flex-col gap-4 rounded-2xl border border-emerald-100 bg-emerald-50/70 p-6 sm:flex-row sm:items-center sm:justify-between sm:p-8">
        <div>
            <h2 class="text-lg font-bold text-slate-900">
                Pengurus NU Desa Paningkaban
            </h2>

            <p class="mt-2 text-sm leading-6 text-slate-600">
                Bersama mendukung kegiatan dan pelayanan organisasi kepada masyarakat.
            </p>
        </div>

        <a href="{{ route('home') }}"
           class="inline-flex w-fit shrink-0 items-center gap-2 rounded-xl border border-emerald-200 bg-white px-4 py-3 text-sm font-bold text-emerald-800 transition hover:bg-emerald-100">
            Kembali ke Beranda
            <i class="fa-solid fa-arrow-right"></i>
        </a>
    </div>
</section>

@endsection

@push('styles')
<style>
    [data-reveal] {
        opacity: 0;
        transform: translateY(18px);
        transition: opacity .55s ease, transform .55s ease;
    }

    [data-reveal].is-visible {
        opacity: 1;
        transform: translateY(0);
    }

    .org-card {
        animation: orgAppear .5s ease both;
    }

    @keyframes orgAppear {
        from {
            opacity: 0;
            transform: translateY(12px) scale(.98);
        }

        to {
            opacity: 1;
            transform: translateY(0) scale(1);
        }
    }

    @media (prefers-reduced-motion: reduce) {
        [data-reveal],
        .org-card {
            opacity: 1;
            transform: none;
            animation: none;
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
