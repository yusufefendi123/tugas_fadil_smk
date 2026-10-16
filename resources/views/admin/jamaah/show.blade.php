
@extends('layouts.app')

@section('title', 'Detail Jamaah')

@section('content')
<div class="mx-auto max-w-5xl space-y-6">

    {{-- Header Halaman --}}
    <div>
        <div class="mb-2 inline-flex items-center gap-2 rounded-full bg-emerald-50 px-3 py-1 text-sm font-semibold text-emerald-700">
            <i class="fa-solid fa-users"></i>
            Data Jamaah NU
        </div>

        <h1 class="text-2xl font-bold tracking-tight text-slate-800 sm:text-3xl">
            Detail Jamaah
        </h1>

        <p class="mt-2 text-sm text-slate-500">
            Informasi lengkap mengenai identitas jamaah yang terdaftar.
        </p>
    </div>

    {{-- Kartu Detail Jamaah --}}
    <div class="overflow-hidden rounded-2xl border border-slate-200 bg-white shadow-sm">

        {{-- Header Kartu --}}
        <div class="border-b border-slate-100 bg-gradient-to-r from-emerald-50 to-white px-6 py-6 sm:px-8">
            <div class="flex flex-col gap-4 sm:flex-row sm:items-center">
                <div class="flex h-16 w-16 shrink-0 items-center justify-center rounded-2xl bg-emerald-100 text-emerald-700">
                    <i class="fa-solid fa-user text-3xl"></i>
                </div>

                <div class="min-w-0">
                    <p class="mb-1 text-sm font-medium text-emerald-700">
                        Informasi Jamaah
                    </p>

                    <h2 class="break-words text-xl font-bold text-slate-800 sm:text-2xl">
                        {{ $jamaah->nama_lengkap ?? '-' }}
                    </h2>

                    <p class="mt-1 text-sm text-slate-500">
                        <i class="fa-solid fa-id-card mr-1"></i>
                        NIK: {{ $jamaah->nik ?? '-' }}
                    </p>
                </div>
            </div>
        </div>

        {{-- Isi Detail --}}
        <div class="p-6 sm:p-8">

            <div class="mb-6 flex items-center gap-2">
                <i class="fa-solid fa-address-card text-emerald-600"></i>
                <h3 class="text-base font-bold text-slate-800">
                    Identitas Jamaah
                </h3>
            </div>

            <div class="grid grid-cols-1 gap-4 sm:grid-cols-2">

                {{-- NIK --}}
                <div class="rounded-xl border border-slate-200 bg-slate-50/70 p-4">
                    <p class="mb-2 text-xs font-semibold uppercase tracking-wider text-slate-500">
                        NIK
                    </p>

                    <p class="break-words text-sm font-semibold text-slate-800">
                        {{ $jamaah->nik ?? '-' }}
                    </p>
                </div>

                {{-- Nama Lengkap --}}
                <div class="rounded-xl border border-slate-200 bg-slate-50/70 p-4">
                    <p class="mb-2 text-xs font-semibold uppercase tracking-wider text-slate-500">
                        Nama Lengkap
                    </p>

                    <p class="break-words text-sm font-semibold text-slate-800">
                        {{ $jamaah->nama_lengkap ?? '-' }}
                    </p>
                </div>

                {{-- Tempat Lahir --}}
                <div class="rounded-xl border border-slate-200 bg-slate-50/70 p-4">
                    <p class="mb-2 text-xs font-semibold uppercase tracking-wider text-slate-500">
                        Tempat Lahir
                    </p>

                    <p class="break-words text-sm font-semibold text-slate-800">
                        {{ $jamaah->tempat_lahir ?? '-' }}
                    </p>
                </div>

                {{-- Tanggal Lahir --}}
                <div class="rounded-xl border border-slate-200 bg-slate-50/70 p-4">
                    <p class="mb-2 text-xs font-semibold uppercase tracking-wider text-slate-500">
                        Tanggal Lahir
                    </p>

                    <p class="text-sm font-semibold text-slate-800">
                        @if ($jamaah->tanggal_lahir)
                            {{ \Illuminate\Support\Carbon::parse($jamaah->tanggal_lahir)->locale('id')->translatedFormat('d F Y') }}
                        @else
                            -
                        @endif
                    </p>
                </div>

                {{-- Jenis Kelamin --}}
                <div class="rounded-xl border border-slate-200 bg-slate-50/70 p-4 sm:col-span-2">
                    <p class="mb-2 text-xs font-semibold uppercase tracking-wider text-slate-500">
                        Jenis Kelamin
                    </p>

                    @if ($jamaah->jenis_kelamin === 'Laki-laki')
                        <span class="inline-flex items-center gap-2 rounded-full bg-sky-50 px-3 py-1.5 text-sm font-semibold text-sky-700">
                            <i class="fa-solid fa-person"></i>
                            Laki-laki
                        </span>
                    @elseif ($jamaah->jenis_kelamin === 'Perempuan')
                        <span class="inline-flex items-center gap-2 rounded-full bg-pink-50 px-3 py-1.5 text-sm font-semibold text-pink-700">
                            <i class="fa-solid fa-person-dress"></i>
                            Perempuan
                        </span>
                    @else
                        <p class="text-sm font-semibold text-slate-800">
                            {{ $jamaah->jenis_kelamin ?? '-' }}
                        </p>
                    @endif
                </div>

            </div>
        </div>

        {{-- Tombol Aksi di Bagian Bawah --}}
        <div class="flex flex-col-reverse gap-3 border-t border-slate-100 bg-slate-50 px-6 py-5 sm:flex-row sm:justify-end sm:px-8">

            <a
                href="{{ route('admin.jamaah.index') }}"
                class="inline-flex h-11 items-center justify-center gap-2 rounded-xl border border-slate-300 bg-white px-5 text-sm font-semibold text-slate-600 transition hover:bg-slate-100"
            >
                <i class="fa-solid fa-arrow-left"></i>
                Kembali
            </a>

            <a
                href="{{ route('admin.jamaah.edit', $jamaah->id) }}"
                class="inline-flex h-11 items-center justify-center gap-2 rounded-xl bg-amber-500 px-5 text-sm font-semibold text-white shadow-sm transition hover:bg-amber-600 focus:outline-none focus:ring-4 focus:ring-amber-100"
            >
                <i class="fa-solid fa-pen-to-square"></i>
                Edit Data
            </a>

        </div>
    </div>

</div>
@endsection
