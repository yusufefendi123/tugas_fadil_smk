
@extends('layouts.app')

@section('title', 'Dashboard Admin')

@section('content')
<div class="space-y-8">

    {{-- Header Dashboard --}}
    <div class="flex flex-col justify-between gap-4 sm:flex-row sm:items-center">
        <div>
            <p class="text-sm font-semibold text-nu-700">
                ADMINISTRASI WEBSITE
            </p>
            <h1 class="mt-2 text-2xl font-extrabold tracking-tight text-slate-800 sm:text-3xl">
                Dashboard
            </h1>
            <p class="mt-2 text-sm text-slate-500">
                Sistem Informasi NU Desa Paningkaban
            </p>
        </div>

        <div class="flex items-center gap-3 rounded-2xl border border-emerald-100 bg-white px-4 py-3 shadow-sm">
            <div class="flex h-11 w-11 items-center justify-center rounded-xl bg-emerald-50 text-xl text-nu-700">
                <i class="fa-solid fa-mosque"></i>
            </div>
            <div>
                <p class="text-sm font-bold text-slate-800">NU Desa Paningkaban</p>
                <p class="mt-1 text-xs text-slate-500">Panel Administrator</p>
            </div>
        </div>
    </div>

    {{-- Sambutan --}}
    <div class="relative overflow-hidden rounded-3xl bg-gradient-to-r from-nu-900 via-nu-800 to-nu-600 p-6 text-white shadow-lg sm:p-8">
        <div class="relative z-10 max-w-2xl">
            <div class="mb-4 inline-flex items-center gap-2 rounded-full border border-white/20 bg-white/10 px-3 py-1.5 text-xs font-semibold">
                <i class="fa-solid fa-chart-line"></i>
                Ringkasan Administrasi
            </div>

            <h2 class="text-2xl font-extrabold leading-tight sm:text-3xl">
                Selamat Datang di Dashboard Admin
            </h2>

            <p class="mt-3 max-w-xl text-sm leading-6 text-emerald-50 sm:text-base">
                Kelola berita, kegiatan, data pengurus, jamaah, absensi,
                galeri, pengumuman, dan pengguna dalam satu tempat.
            </p>

            <a href="{{ url('/admin/berita') }}"
               class="mt-6 inline-flex items-center gap-2 rounded-xl bg-white px-5 py-3 text-sm font-bold text-nu-800 shadow-sm transition hover:bg-emerald-50">
                <i class="fa-solid fa-newspaper"></i>
                Kelola Berita
                <i class="fa-solid fa-arrow-right text-xs"></i>
            </a>
        </div>

        <i class="fa-solid fa-mosque pointer-events-none absolute -bottom-8 -right-2 text-[150px] text-white/[0.08] sm:right-8 sm:text-[190px]"></i>
    </div>

    {{-- Statistik Utama --}}
    <section>
        <div class="mb-4 flex items-center justify-between">
            <div>
                <h2 class="text-lg font-extrabold text-slate-800">Ringkasan Data</h2>
                <p class="mt-1 text-sm text-slate-500">Statistik data yang tersimpan di sistem.</p>
            </div>
            <span class="hidden rounded-lg bg-emerald-50 px-3 py-2 text-xs font-bold text-nu-700 sm:inline-flex">
                <i class="fa-solid fa-database mr-2"></i> Data Sistem
            </span>
        </div>

        <div class="grid grid-cols-1 gap-4 sm:grid-cols-2 xl:grid-cols-4">

            {{-- Berita --}}
            <a href="{{ url('/admin/berita') }}"
               class="group rounded-2xl border border-slate-100 bg-white p-5 shadow-sm transition duration-200 hover:-translate-y-1 hover:border-emerald-200 hover:shadow-md">
                <div class="flex items-start justify-between">
                    <div>
                        <p class="text-sm font-semibold text-slate-500">Total Berita</p>
                        <h3 class="mt-3 text-3xl font-extrabold text-slate-800">{{ $jumlahBerita }}</h3>
                    </div>
                    <div class="flex h-12 w-12 items-center justify-center rounded-2xl bg-blue-50 text-lg text-blue-600 transition group-hover:bg-blue-100">
                        <i class="fa-solid fa-newspaper"></i>
                    </div>
                </div>
                <div class="mt-4 flex items-center gap-3 border-t border-slate-100 pt-3 text-xs">
                    <span class="font-semibold text-emerald-700">
                        <i class="fa-solid fa-circle-check mr-1"></i>{{ $beritaTerbit }} terbit
                    </span>
                    <span class="text-slate-400">{{ $beritaDraft }} draft</span>
                </div>
            </a>

            {{-- Kegiatan --}}
            <a href="{{ url('/admin/kegiatan') }}"
               class="group rounded-2xl border border-slate-100 bg-white p-5 shadow-sm transition duration-200 hover:-translate-y-1 hover:border-emerald-200 hover:shadow-md">
                <div class="flex items-start justify-between">
                    <div>
                        <p class="text-sm font-semibold text-slate-500">Total Kegiatan</p>
                        <h3 class="mt-3 text-3xl font-extrabold text-slate-800">{{ $jumlahKegiatan }}</h3>
                    </div>
                    <div class="flex h-12 w-12 items-center justify-center rounded-2xl bg-amber-50 text-lg text-amber-600 transition group-hover:bg-amber-100">
                        <i class="fa-solid fa-calendar-days"></i>
                    </div>
                </div>
                <div class="mt-4 flex items-center gap-3 border-t border-slate-100 pt-3 text-xs">
                    <span class="font-semibold text-blue-700">{{ $kegiatanAkanDatang }} akan datang</span>
                    <span class="text-slate-400">{{ $kegiatanSelesai }} selesai</span>
                </div>
            </a>

            {{-- Jamaah --}}
            <a href="{{ url('/admin/jamaah') }}"
               class="group rounded-2xl border border-slate-100 bg-white p-5 shadow-sm transition duration-200 hover:-translate-y-1 hover:border-emerald-200 hover:shadow-md">
                <div class="flex items-start justify-between">
                    <div>
                        <p class="text-sm font-semibold text-slate-500">Data Jamaah</p>
                        <h3 class="mt-3 text-3xl font-extrabold text-slate-800">{{ $jumlahJamaah }}</h3>
                    </div>
                    <div class="flex h-12 w-12 items-center justify-center rounded-2xl bg-emerald-50 text-lg text-nu-700 transition group-hover:bg-emerald-100">
                        <i class="fa-solid fa-users"></i>
                    </div>
                </div>
                <div class="mt-4 border-t border-slate-100 pt-3 text-xs text-slate-500">
                    Data jamaah terdaftar
                </div>
            </a>

            {{-- Absensi --}}
            <a href="{{ url('/admin/absensi') }}"
               class="group rounded-2xl border border-slate-100 bg-white p-5 shadow-sm transition duration-200 hover:-translate-y-1 hover:border-emerald-200 hover:shadow-md">
                <div class="flex items-start justify-between">
                    <div>
                        <p class="text-sm font-semibold text-slate-500">Total Absensi</p>
                        <h3 class="mt-3 text-3xl font-extrabold text-slate-800">{{ $jumlahAbsensi }}</h3>
                    </div>
                    <div class="flex h-12 w-12 items-center justify-center rounded-2xl bg-violet-50 text-lg text-violet-600 transition group-hover:bg-violet-100">
                        <i class="fa-solid fa-clipboard-check"></i>
                    </div>
                </div>
                <div class="mt-4 border-t border-slate-100 pt-3 text-xs text-slate-500">
                    Catatan kehadiran jamaah
                </div>
            </a>

        </div>
    </section>

    {{-- Data Pendukung --}}
    <section>
        <div class="mb-4">
            <h2 class="text-lg font-extrabold text-slate-800">Administrasi Lainnya</h2>
            <p class="mt-1 text-sm text-slate-500">Akses cepat untuk mengelola data website.</p>
        </div>

        <div class="grid grid-cols-1 gap-4 sm:grid-cols-2 xl:grid-cols-4">

            <a href="{{ url('/admin/pengurus') }}"
               class="group flex items-center gap-4 rounded-2xl border border-slate-100 bg-white p-5 shadow-sm transition hover:border-emerald-200 hover:shadow-md">
                <div class="flex h-12 w-12 shrink-0 items-center justify-center rounded-xl bg-emerald-50 text-lg text-nu-700">
                    <i class="fa-solid fa-user-tie"></i>
                </div>
                <div class="min-w-0 flex-1">
                    <p class="text-sm font-bold text-slate-800">Data Pengurus</p>
                    <p class="mt-1 text-xs text-slate-500">{{ $jumlahPengurus }} data pengurus</p>
                </div>
                <i class="fa-solid fa-chevron-right text-xs text-slate-300 transition group-hover:translate-x-1 group-hover:text-nu-700"></i>
            </a>

            <a href="{{ url('/admin/galeri') }}"
               class="group flex items-center gap-4 rounded-2xl border border-slate-100 bg-white p-5 shadow-sm transition hover:border-emerald-200 hover:shadow-md">
                <div class="flex h-12 w-12 shrink-0 items-center justify-center rounded-xl bg-pink-50 text-lg text-pink-600">
                    <i class="fa-solid fa-images"></i>
                </div>
                <div class="min-w-0 flex-1">
                    <p class="text-sm font-bold text-slate-800">Galeri</p>
                    <p class="mt-1 text-xs text-slate-500">{{ $jumlahGaleri }} dokumentasi</p>
                </div>
                <i class="fa-solid fa-chevron-right text-xs text-slate-300 transition group-hover:translate-x-1 group-hover:text-nu-700"></i>
            </a>

            <a href="{{ url('/admin/pengumuman') }}"
               class="group flex items-center gap-4 rounded-2xl border border-slate-100 bg-white p-5 shadow-sm transition hover:border-emerald-200 hover:shadow-md">
                <div class="flex h-12 w-12 shrink-0 items-center justify-center rounded-xl bg-orange-50 text-lg text-orange-600">
                    <i class="fa-solid fa-bullhorn"></i>
                </div>
                <div class="min-w-0 flex-1">
                    <p class="text-sm font-bold text-slate-800">Pengumuman</p>
                    <p class="mt-1 text-xs text-slate-500">{{ $jumlahPengumuman }} pengumuman</p>
                </div>
                <i class="fa-solid fa-chevron-right text-xs text-slate-300 transition group-hover:translate-x-1 group-hover:text-nu-700"></i>
            </a>

            <a href="{{ url('/admin/pengguna') }}"
               class="group flex items-center gap-4 rounded-2xl border border-slate-100 bg-white p-5 shadow-sm transition hover:border-emerald-200 hover:shadow-md">
                <div class="flex h-12 w-12 shrink-0 items-center justify-center rounded-xl bg-indigo-50 text-lg text-indigo-600">
                    <i class="fa-solid fa-user-gear"></i>
                </div>
                <div class="min-w-0 flex-1">
                    <p class="text-sm font-bold text-slate-800">Manajemen Pengguna</p>
                    <p class="mt-1 text-xs text-slate-500">{{ $jumlahPengguna }} akun terdaftar</p>
                </div>
                <i class="fa-solid fa-chevron-right text-xs text-slate-300 transition group-hover:translate-x-1 group-hover:text-nu-700"></i>
            </a>

        </div>
    </section>

    {{-- Berita Terbaru --}}
    <section class="overflow-hidden rounded-2xl border border-slate-100 bg-white shadow-sm">
        <div class="flex flex-wrap items-center justify-between gap-3 border-b border-slate-100 px-5 py-5 sm:px-6">
            <div>
                <h2 class="font-extrabold text-slate-800">Berita Terbaru</h2>
                <p class="mt-1 text-xs text-slate-500">Berita yang terakhir ditambahkan.</p>
            </div>
            <a href="{{ url('/admin/berita') }}"
               class="inline-flex items-center gap-2 rounded-xl bg-emerald-50 px-4 py-2.5 text-xs font-bold text-nu-700 transition hover:bg-emerald-100">
                Lihat Semua <i class="fa-solid fa-arrow-right"></i>
            </a>
        </div>

        <div class="overflow-x-auto">
            <table class="w-full text-left">
                <thead class="bg-slate-50 text-xs uppercase tracking-wide text-slate-500">
                    <tr>
                        <th class="whitespace-nowrap px-5 py-4 font-bold">No.</th>
                        <th class="whitespace-nowrap px-5 py-4 font-bold">Judul Berita</th>
                        <th class="whitespace-nowrap px-5 py-4 font-bold">Status</th>
                        <th class="whitespace-nowrap px-5 py-4 font-bold">Tanggal</th>
                    </tr>
                </thead>
                <tbody class="divide-y divide-slate-100 text-sm">
                    @forelse ($beritaTerbaru as $berita)
                        <tr class="transition hover:bg-emerald-50/40">
                            <td class="px-5 py-4 text-slate-400">{{ $loop->iteration }}</td>
                            <td class="min-w-48 px-5 py-4 font-semibold text-slate-700">{{ $berita->judul }}</td>
                            <td class="px-5 py-4">
                                @if ($berita->status == 'terbit')
                                    <span class="inline-flex rounded-lg bg-emerald-100 px-2.5 py-1.5 text-xs font-bold text-emerald-700">Terbit</span>
                                @else
                                    <span class="inline-flex rounded-lg bg-slate-100 px-2.5 py-1.5 text-xs font-bold text-slate-600">Draft</span>
                                @endif
                            </td>
                            <td class="whitespace-nowrap px-5 py-4 text-xs text-slate-500">
                                {{ $berita->created_at?->format('d M Y') ?? '-' }}
                            </td>
                        </tr>
                    @empty
                        <tr>
                            <td colspan="4" class="px-5 py-12 text-center">
                                <i class="fa-regular fa-newspaper mb-3 text-3xl text-slate-300"></i>
                                <p class="text-sm font-semibold text-slate-500">Belum ada berita</p>
                                <p class="mt-1 text-xs text-slate-400">Berita yang ditambahkan akan tampil di sini.</p>
                            </td>
                        </tr>
                    @endforelse
                </tbody>
            </table>
        </div>
    </section>

    {{-- Kegiatan Terbaru --}}
    <section class="overflow-hidden rounded-2xl border border-slate-100 bg-white shadow-sm">
        <div class="flex flex-wrap items-center justify-between gap-3 border-b border-slate-100 px-5 py-5 sm:px-6">
            <div>
                <h2 class="font-extrabold text-slate-800">Kegiatan Terbaru</h2>
                <p class="mt-1 text-xs text-slate-500">Informasi kegiatan NU Desa Paningkaban.</p>
            </div>
            <a href="{{ url('/admin/kegiatan') }}"
               class="inline-flex items-center gap-2 rounded-xl bg-emerald-50 px-4 py-2.5 text-xs font-bold text-nu-700 transition hover:bg-emerald-100">
                Lihat Semua <i class="fa-solid fa-arrow-right"></i>
            </a>
        </div>

        <div class="overflow-x-auto">
            <table class="w-full text-left">
                <thead class="bg-slate-50 text-xs uppercase tracking-wide text-slate-500">
                    <tr>
                        <th class="whitespace-nowrap px-5 py-4 font-bold">No.</th>
                        <th class="whitespace-nowrap px-5 py-4 font-bold">Nama Kegiatan</th>
                        <th class="whitespace-nowrap px-5 py-4 font-bold">Lokasi</th>
                        <th class="whitespace-nowrap px-5 py-4 font-bold">Waktu Mulai</th>
                        <th class="whitespace-nowrap px-5 py-4 font-bold">Status</th>
                    </tr>
                </thead>
                <tbody class="divide-y divide-slate-100 text-sm">
                    @forelse ($kegiatanTerbaru as $kegiatan)
                        <tr class="transition hover:bg-emerald-50/40">
                            <td class="px-5 py-4 text-slate-400">{{ $loop->iteration }}</td>
                            <td class="min-w-48 px-5 py-4 font-semibold text-slate-700">{{ $kegiatan->nama_kegiatan }}</td>
                            <td class="px-5 py-4 text-slate-500">{{ $kegiatan->lokasi }}</td>
                            <td class="whitespace-nowrap px-5 py-4 text-xs text-slate-500">
                                {{ $kegiatan->waktu_mulai ? \Carbon\Carbon::parse($kegiatan->waktu_mulai)->format('d M Y, H:i') : '-' }}
                            </td>
                            <td class="px-5 py-4">
                                @if ($kegiatan->status == 'akan_datang')
                                    <span class="inline-flex rounded-lg bg-blue-50 px-2.5 py-1.5 text-xs font-bold text-blue-700">Akan Datang</span>
                                @else
                                    <span class="inline-flex rounded-lg bg-emerald-100 px-2.5 py-1.5 text-xs font-bold text-emerald-700">Selesai</span>
                                @endif
                            </td>
                        </tr>
                    @empty
                        <tr>
                            <td colspan="5" class="px-5 py-12 text-center">
                                <i class="fa-regular fa-calendar-xmark mb-3 text-3xl text-slate-300"></i>
                                <p class="text-sm font-semibold text-slate-500">Belum ada kegiatan</p>
                            </td>
                        </tr>
                    @endforelse
                </tbody>
            </table>
        </div>
    </section>

    {{-- Absensi Terbaru --}}
    <section class="overflow-hidden rounded-2xl border border-slate-100 bg-white shadow-sm">
        <div class="flex flex-wrap items-center justify-between gap-3 border-b border-slate-100 px-5 py-5 sm:px-6">
            <div>
                <h2 class="font-extrabold text-slate-800">Absensi Jamaah Terbaru</h2>
                <p class="mt-1 text-xs text-slate-500">Catatan kehadiran dalam kegiatan.</p>
            </div>
            <a href="{{ url('/admin/absensi') }}"
               class="inline-flex items-center gap-2 rounded-xl bg-emerald-50 px-4 py-2.5 text-xs font-bold text-nu-700 transition hover:bg-emerald-100">
                Lihat Semua <i class="fa-solid fa-arrow-right"></i>
            </a>
        </div>

        <div class="overflow-x-auto">
            <table class="w-full text-left">
                <thead class="bg-slate-50 text-xs uppercase tracking-wide text-slate-500">
                    <tr>
                        <th class="whitespace-nowrap px-5 py-4 font-bold">No.</th>
                        <th class="whitespace-nowrap px-5 py-4 font-bold">Nama Jamaah</th>
                        <th class="whitespace-nowrap px-5 py-4 font-bold">Kegiatan</th>
                        <th class="whitespace-nowrap px-5 py-4 font-bold">Tanggal</th>
                        <th class="whitespace-nowrap px-5 py-4 font-bold">Kehadiran</th>
                    </tr>
                </thead>
                <tbody class="divide-y divide-slate-100 text-sm">
                    @forelse ($absensiTerbaru as $data)
                        <tr class="transition hover:bg-emerald-50/40">
                            <td class="px-5 py-4 text-slate-400">{{ $loop->iteration }}</td>
                            <td class="whitespace-nowrap px-5 py-4 font-semibold text-slate-700">
                                {{ $data->jamaah->nama_lengkap ?? 'Jamaah tidak tersedia' }}
                            </td>
                            <td class="min-w-48 px-5 py-4 text-slate-500">
                                {{ $data->kegiatan->nama_kegiatan ?? 'Kegiatan tidak tersedia' }}
                            </td>
                            <td class="whitespace-nowrap px-5 py-4 text-xs text-slate-500">
                                {{ $data->tanggal ? \Carbon\Carbon::parse($data->tanggal)->format('d M Y') : '-' }}
                            </td>
                            <td class="px-5 py-4">
                                @if ($data->status == 'hadir')
                                    <span class="inline-flex rounded-lg bg-emerald-100 px-2.5 py-1.5 text-xs font-bold text-emerald-700">Hadir</span>
                                @elseif ($data->status == 'izin')
                                    <span class="inline-flex rounded-lg bg-amber-100 px-2.5 py-1.5 text-xs font-bold text-amber-700">Izin</span>
                                @else
                                    <span class="inline-flex rounded-lg bg-red-50 px-2.5 py-1.5 text-xs font-bold text-red-700">Tidak Hadir</span>
                                @endif
                            </td>
                        </tr>
                    @empty
                        <tr>
                            <td colspan="5" class="px-5 py-12 text-center">
                                <i class="fa-solid fa-clipboard-list mb-3 text-3xl text-slate-300"></i>
                                <p class="text-sm font-semibold text-slate-500">Belum ada data absensi</p>
                            </td>
                        </tr>
                    @endforelse
                </tbody>
            </table>
        </div>
    </section>

    {{-- Footer Dashboard --}}
    <div class="pb-2 text-center text-xs text-slate-400">
        <i class="fa-solid fa-leaf mr-1 text-nu-600"></i>
        Sistem Informasi NU Desa Paningkaban
    </div>

</div>
@endsection
