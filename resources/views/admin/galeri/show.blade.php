
@extends('layouts.app')

@section('title', 'Detail Galeri')

@section('content')
<div class="space-y-6">

    {{-- Header halaman --}}
    <div>
        <div class="inline-flex items-center gap-2 rounded-lg bg-emerald-50 px-3 py-1.5 text-sm font-medium text-emerald-700">
            <i class="fa-solid fa-images"></i>
            Dokumentasi NU
        </div>

        <h1 class="mt-3 text-2xl font-bold text-slate-800">
            Detail Galeri
        </h1>

        <p class="mt-1 text-sm text-slate-500">
            Informasi foto dokumentasi kegiatan NU Desa Paningkaban.
        </p>
    </div>

    {{-- Foto dan informasi galeri --}}
    <div class="overflow-hidden rounded-2xl border border-slate-200 bg-white shadow-sm">

        {{-- Aksen hijau tipis --}}
        <div class="h-1 bg-emerald-500"></div>

        <div class="p-5 sm:p-7">

            {{-- Foto utama --}}
            <div class="mb-7 overflow-hidden rounded-xl border border-slate-200 bg-slate-50 p-3 sm:p-5">
                @if ($galeri->gambar)
                    <div class="flex justify-center">
                        <img
                            src="{{ asset('storage/' . $galeri->gambar) }}"
                            alt="{{ $galeri->judul }}"
                            class="max-h-[450px] max-w-full rounded-lg object-contain"
                        >
                    </div>
                @else
                    <div class="flex h-64 flex-col items-center justify-center text-slate-400">
                        <i class="fa-regular fa-image text-5xl"></i>
                        <p class="mt-3 text-sm">Foto belum tersedia.</p>
                    </div>
                @endif
            </div>

            {{-- Judul foto --}}
            <div class="mb-6">
                <span class="inline-flex items-center gap-2 rounded-lg bg-emerald-50 px-3 py-1.5 text-xs font-semibold text-emerald-700">
                    <i class="fa-solid fa-camera"></i>
                    Foto Dokumentasi
                </span>

                <h2 class="mt-3 text-xl font-bold text-slate-800 sm:text-2xl">
                    {{ $galeri->judul }}
                </h2>
            </div>

            {{-- Informasi foto --}}
            <div class="border-t border-slate-100">

                {{-- Judul --}}
                <div class="grid grid-cols-1 gap-2 border-b border-slate-100 py-4 sm:grid-cols-[180px_1fr] sm:gap-6">
                    <p class="text-sm font-medium text-slate-500">
                        <i class="fa-solid fa-heading mr-2 text-emerald-600"></i>
                        Judul Foto
                    </p>

                    <p class="text-sm font-semibold text-slate-800">
                        {{ $galeri->judul }}
                    </p>
                </div>

                {{-- Kegiatan --}}
                <div class="grid grid-cols-1 gap-2 border-b border-slate-100 py-4 sm:grid-cols-[180px_1fr] sm:gap-6">
                    <p class="text-sm font-medium text-slate-500">
                        <i class="fa-regular fa-calendar mr-2 text-emerald-600"></i>
                        Kegiatan Terkait
                    </p>

                    <p class="text-sm font-semibold text-slate-800">
                        {{ $galeri->kegiatan?->nama_kegiatan ?? 'Tidak terkait kegiatan' }}
                    </p>
                </div>

                {{-- Keterangan --}}
                <div class="grid grid-cols-1 gap-2 py-4 sm:grid-cols-[180px_1fr] sm:gap-6">
                    <p class="text-sm font-medium text-slate-500">
                        <i class="fa-regular fa-file-lines mr-2 text-emerald-600"></i>
                        Keterangan
                    </p>

                    <p class="whitespace-pre-line text-sm leading-7 text-slate-700">{{ $galeri->keterangan ?: 'Tidak ada keterangan.' }}</p>
                </div>

            </div>

        </div>
    </div>

    {{-- Tombol aksi di bagian bawah --}}
    <div class="flex flex-col-reverse gap-3 border-t border-slate-200 pt-5 sm:flex-row sm:justify-end">

        {{-- Tombol kembali --}}
        <a href="{{ route('admin.galeri.index') }}"
           class="inline-flex h-11 items-center justify-center gap-2 rounded-xl border border-slate-200 bg-white px-5 text-sm font-semibold text-slate-600 transition hover:bg-slate-50">
            <i class="fa-solid fa-arrow-left"></i>
            Kembali ke Galeri
        </a>

        {{-- Tombol edit --}}
        <a href="{{ route('admin.galeri.edit', $galeri->id) }}"
           class="inline-flex h-11 items-center justify-center gap-2 rounded-xl bg-amber-400 px-5 text-sm font-semibold text-slate-900 shadow-sm transition hover:bg-amber-500">
            <i class="fa-solid fa-pen-to-square"></i>
            Edit Foto
        </a>

    </div>

</div>
@endsection
