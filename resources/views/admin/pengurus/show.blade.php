
@extends('layouts.app')

@section('title', 'Detail Pengurus')

@section('content')
<div class="space-y-6">

    {{-- Header halaman --}}
    <div>
        <div class="inline-flex items-center gap-2 rounded-lg bg-emerald-50 px-3 py-1.5 text-sm font-medium text-emerald-700">
            <i class="fa-solid fa-users"></i>
            Organisasi NU
        </div>

        <h1 class="mt-3 text-2xl font-bold text-slate-800">
            Detail Pengurus
        </h1>

        <p class="mt-1 text-sm text-slate-500">
            Informasi lengkap pengurus NU Desa Paningkaban.
        </p>
    </div>

    {{-- Kartu profil --}}
    <div class="overflow-hidden rounded-2xl border border-slate-200 bg-white shadow-sm">

        {{-- Aksen hijau tipis --}}
        <div class="h-1 bg-emerald-500"></div>

        <div class="p-6 sm:p-8">
            <div class="flex flex-col items-center gap-5 sm:flex-row sm:items-start">

                {{-- Foto pengurus --}}
                <div class="shrink-0">
                    @if ($pengurus->foto)
                        <img
                            src="{{ asset('storage/' . $pengurus->foto) }}"
                            alt="Foto {{ $pengurus->nama }}"
                            class="h-32 w-32 rounded-2xl border border-slate-200 object-cover"
                        >
                    @else
                        <div class="flex h-32 w-32 items-center justify-center rounded-2xl border border-slate-200 bg-slate-50 text-slate-400">
                            <i class="fa-solid fa-user text-5xl"></i>
                        </div>
                    @endif
                </div>

                {{-- Identitas utama --}}
                <div class="min-w-0 flex-1 text-center sm:text-left">
                    <span class="inline-flex rounded-lg bg-emerald-50 px-3 py-1 text-xs font-semibold text-emerald-700">
                        {{ $pengurus->jabatan }}
                    </span>

                    <h2 class="mt-3 text-2xl font-bold text-slate-800">
                        {{ $pengurus->nama }}
                    </h2>

                    <p class="mt-2 text-sm text-slate-500">
                        <i class="fa-regular fa-id-card mr-1"></i>
                        ID Pengurus: {{ $pengurus->id }}
                    </p>
                </div>

            </div>
        </div>
    </div>

    {{-- Informasi pengurus --}}
    <div class="rounded-2xl border border-slate-200 bg-white p-6 shadow-sm">

        <div class="mb-5 border-b border-slate-100 pb-4">
            <h3 class="text-lg font-bold text-slate-800">
                Informasi Pengurus
            </h3>

            <p class="mt-1 text-sm text-slate-500">
                Rincian data pengurus yang tersimpan.
            </p>
        </div>

        <div class="grid grid-cols-1 gap-5 sm:grid-cols-2">

            {{-- Nama --}}
            <div class="rounded-xl border border-slate-100 bg-slate-50 p-4">
                <p class="text-sm text-slate-500">
                    <i class="fa-solid fa-user mr-2 text-emerald-600"></i>
                    Nama Lengkap
                </p>

                <p class="mt-2 font-semibold text-slate-800">
                    {{ $pengurus->nama }}
                </p>
            </div>

            {{-- Jabatan --}}
            <div class="rounded-xl border border-slate-100 bg-slate-50 p-4">
                <p class="text-sm text-slate-500">
                    <i class="fa-solid fa-briefcase mr-2 text-emerald-600"></i>
                    Jabatan
                </p>

                <p class="mt-2 font-semibold text-slate-800">
                    {{ $pengurus->jabatan }}
                </p>
            </div>

            {{-- Periode --}}
            <div class="rounded-xl border border-slate-100 bg-slate-50 p-4">
                <p class="text-sm text-slate-500">
                    <i class="fa-regular fa-calendar mr-2 text-emerald-600"></i>
                    Periode Kepengurusan
                </p>

                <p class="mt-2 font-semibold text-slate-800">
                    {{ $pengurus->periode ?: 'Belum diisi' }}
                </p>
            </div>

            {{-- Urutan --}}
            <div class="rounded-xl border border-slate-100 bg-slate-50 p-4">
                <p class="text-sm text-slate-500">
                    <i class="fa-solid fa-list-ol mr-2 text-emerald-600"></i>
                    Urutan Tampilan
                </p>

                <p class="mt-2 font-semibold text-slate-800">
                    {{ $pengurus->urutan }}
                </p>
            </div>

            {{-- Keterangan --}}
            <div class="rounded-xl border border-slate-100 bg-slate-50 p-4 sm:col-span-2">
                <p class="text-sm text-slate-500">
                    <i class="fa-regular fa-file-lines mr-2 text-emerald-600"></i>
                    Keterangan
                </p>

                <p class="mt-2 whitespace-pre-line leading-7 text-slate-700">{{ $pengurus->keterangan ?: 'Belum ada keterangan.' }}</p>
            </div>

        </div>
    </div>

    {{-- Tombol bagian bawah --}}
    <div class="flex flex-col-reverse gap-3 sm:flex-row sm:justify-end">

        {{-- Tombol kembali --}}
        <a href="{{ route('admin.pengurus.index') }}"
           class="inline-flex items-center justify-center gap-2 rounded-xl border border-slate-200 bg-white px-5 py-2.5 text-sm font-semibold text-slate-600 transition hover:bg-slate-50">
            <i class="fa-solid fa-arrow-left"></i>
            Kembali
        </a>

        {{-- Tombol edit --}}
        <a href="{{ route('admin.pengurus.edit', $pengurus->id) }}"
           class="inline-flex items-center justify-center gap-2 rounded-xl bg-amber-400 px-5 py-2.5 text-sm font-semibold text-slate-900 shadow-sm transition hover:bg-amber-500">
            <i class="fa-solid fa-pen-to-square"></i>
            Edit Pengurus
        </a>

    </div>

</div>
@endsection
