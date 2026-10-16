
@extends('layouts.app')

@section('title', 'Detail Pengumuman')

@section('content')
<div class="min-h-screen bg-slate-50/70 px-4 py-6 sm:px-6 lg:px-8">
    <div class="mx-auto max-w-5xl">

        {{-- Header Halaman --}}
        <div class="mb-8">
            <div class="mb-3 inline-flex items-center gap-2 rounded-full border border-emerald-100 bg-emerald-50 px-3 py-1.5 text-xs font-semibold text-emerald-700">
                <i class="fa-solid fa-bullhorn"></i>
                Informasi NU
            </div>

            <h1 class="text-2xl font-bold tracking-tight text-slate-800 sm:text-3xl">
                Detail Pengumuman
            </h1>

            <p class="mt-2 text-sm leading-6 text-slate-500">
                Informasi lengkap pengumuman NU Desa Paningkaban.
            </p>
        </div>

        {{-- Detail Pengumuman --}}
        <div class="overflow-hidden rounded-2xl border border-slate-200 bg-white shadow-sm">
            <div class="h-1.5 bg-gradient-to-r from-emerald-500 via-green-500 to-emerald-300"></div>

            <div class="p-5 sm:p-8">

                {{-- Judul dan Status --}}
                <div class="flex flex-col gap-4 sm:flex-row sm:items-start sm:justify-between">
                    <div class="min-w-0 flex-1">
                        <div class="mb-3 flex items-center gap-2 text-xs font-medium text-slate-400">
                            <i class="fa-regular fa-file-lines text-emerald-600"></i>
                            Informasi Pengumuman
                        </div>

                        <h2 class="break-words text-xl font-bold leading-relaxed text-slate-800 sm:text-2xl">
                            {{ $pengumuman->judul }}
                        </h2>
                    </div>

                    <div class="shrink-0">
                        @if ($pengumuman->status === 'terbit')
                            <span class="inline-flex items-center gap-2 rounded-full border border-emerald-200 bg-emerald-50 px-3 py-2 text-xs font-semibold text-emerald-700">
                                <span class="h-2 w-2 rounded-full bg-emerald-500"></span>
                                Terbit
                            </span>
                        @else
                            <span class="inline-flex items-center gap-2 rounded-full border border-amber-200 bg-amber-50 px-3 py-2 text-xs font-semibold text-amber-700">
                                <span class="h-2 w-2 rounded-full bg-amber-500"></span>
                                Draft
                            </span>
                        @endif
                    </div>
                </div>

                {{-- Tanggal Terbit --}}
                <div class="mt-5 flex flex-wrap items-center gap-2 rounded-xl border border-slate-100 bg-slate-50 px-4 py-3">
                    <div class="flex h-9 w-9 items-center justify-center rounded-lg bg-emerald-100 text-emerald-700">
                        <i class="fa-regular fa-calendar-days"></i>
                    </div>

                    <div>
                        <p class="text-xs font-medium text-slate-500">
                            Tanggal dan Waktu Terbit
                        </p>

                        <p class="mt-1 text-sm font-semibold text-slate-700">
                            @if ($pengumuman->diterbitkan_pada)
                                {{ $pengumuman->diterbitkan_pada->locale('id')->translatedFormat('d F Y, H:i') }} WIB
                            @else
                                Belum diterbitkan
                            @endif
                        </p>
                    </div>
                </div>

                {{-- Isi Pengumuman --}}
                <div class="mt-8">
                    <div class="mb-4 flex items-center gap-2">
                        <div class="flex h-9 w-9 items-center justify-center rounded-lg bg-emerald-50 text-emerald-600">
                            <i class="fa-solid fa-align-left"></i>
                        </div>

                        <h3 class="text-base font-bold text-slate-800">
                            Isi Pengumuman
                        </h3>
                    </div>

                    <div class="min-h-40 rounded-xl border border-slate-100 bg-white px-4 py-5 text-sm leading-8 text-slate-600 sm:px-6 whitespace-pre-line break-words">{{ $pengumuman->isi }}</div>
                </div>

            </div>

            {{-- Tombol Aksi di Bagian Bawah --}}
            <div class="flex flex-col-reverse gap-3 border-t border-slate-100 bg-slate-50/70 px-5 py-5 sm:flex-row sm:items-center sm:justify-between sm:px-8">
                <a href="{{ route('admin.pengumuman.index') }}"
                   class="inline-flex h-11 items-center justify-center gap-2 rounded-xl border border-slate-300 bg-white px-5 text-sm font-semibold text-slate-600 transition hover:bg-slate-100">
                    <i class="fa-solid fa-arrow-left"></i>
                    Kembali
                </a>

                <a href="{{ route('admin.pengumuman.edit', $pengumuman->id) }}"
                   class="inline-flex h-11 items-center justify-center gap-2 rounded-xl bg-amber-500 px-5 text-sm font-semibold text-white shadow-sm transition hover:bg-amber-600 focus:outline-none focus:ring-4 focus:ring-amber-500/20">
                    <i class="fa-solid fa-pen-to-square"></i>
                    Edit Pengumuman
                </a>
            </div>
        </div>

    </div>
</div>
@endsection
