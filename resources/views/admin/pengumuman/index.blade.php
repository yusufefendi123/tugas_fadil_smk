
@extends('layouts.app')

@section('title', 'Pengumuman')

@section('content')
<div class="min-h-screen bg-slate-50/70 px-4 py-6 sm:px-6 lg:px-8">
    <div class="mx-auto max-w-7xl space-y-6">

        {{-- Breadcrumb --}}
        <div class="flex flex-wrap items-center gap-2 text-sm text-slate-500">
            <i class="fa-solid fa-house"></i>
            <span>/</span>
            <span>Admin</span>
            <span>/</span>
            <span class="font-semibold text-emerald-700">Pengumuman</span>
        </div>

        {{-- Header Halaman --}}
        <div class="flex flex-col gap-4 sm:flex-row sm:items-center sm:justify-between">
            <div>
                <h1 class="text-2xl font-bold tracking-tight text-slate-800 sm:text-3xl">
                    Pengumuman
                </h1>

                <p class="mt-2 max-w-2xl text-sm leading-6 text-slate-500">
                    Kelola informasi dan pengumuman NU Desa Paningkaban.
                </p>
            </div>

            <a href="{{ route('admin.pengumuman.create') }}"
               class="inline-flex h-11 items-center justify-center gap-2 rounded-xl bg-emerald-600 px-5 text-sm font-semibold text-white shadow-sm transition hover:bg-emerald-700 focus:outline-none focus:ring-4 focus:ring-emerald-500/20">
                <i class="fa-solid fa-plus"></i>
                Tambah Pengumuman
            </a>
        </div>

        {{-- Notifikasi Berhasil --}}
        @if (session('success'))
            <div class="flex items-start gap-3 rounded-xl border border-emerald-200 bg-emerald-50 p-4 text-sm text-emerald-800">
                <i class="fa-solid fa-circle-check mt-0.5 text-emerald-600"></i>

                <div class="flex-1 font-medium">
                    {{ session('success') }}
                </div>

                <button type="button"
                        onclick="this.parentElement.remove()"
                        class="shrink-0 p-1 hover:text-emerald-950"
                        aria-label="Tutup notifikasi">
                    <i class="fa-solid fa-xmark"></i>
                </button>
            </div>
        @endif

        {{-- Notifikasi Error --}}
        @if ($errors->any())
            <div class="rounded-xl border border-red-200 bg-red-50 p-4 text-sm text-red-700">
                <div class="mb-2 flex items-center gap-2 font-semibold">
                    <i class="fa-solid fa-circle-exclamation"></i>
                    Terjadi kesalahan.
                </div>

                <ul class="list-inside list-disc space-y-1">
                    @foreach ($errors->all() as $error)
                        <li>{{ $error }}</li>
                    @endforeach
                </ul>
            </div>
        @endif

        {{-- Tabel Pengumuman --}}
        <div class="overflow-hidden rounded-2xl border border-slate-200 bg-white shadow-sm">

            {{-- Judul Tabel --}}
            <div class="border-b border-slate-100 px-5 py-5 sm:px-6">
                <h2 class="text-lg font-bold text-slate-800">
                    Daftar Pengumuman
                </h2>

                <p class="mt-1 text-sm text-slate-500">
                    Kelola judul, isi, status, dan tanggal terbit pengumuman.
                </p>
            </div>

            {{-- Isi Tabel --}}
            <div class="overflow-x-auto">
                <table class="w-full min-w-[850px] text-left text-sm">

                    <thead class="bg-slate-50 text-xs uppercase tracking-wider text-slate-500">
                        <tr>
                            <th class="w-16 px-5 py-4 font-semibold">No.</th>
                            <th class="px-5 py-4 font-semibold">Judul Pengumuman</th>
                            <th class="w-32 px-5 py-4 font-semibold">Status</th>
                            <th class="w-44 px-5 py-4 font-semibold">Tanggal Terbit</th>
                            <th class="w-44 px-5 py-4 text-center font-semibold">Aksi</th>
                        </tr>
                    </thead>

                    <tbody class="divide-y divide-slate-100">
                        @forelse ($pengumuman as $item)
                            <tr class="transition hover:bg-emerald-50/30">

                                {{-- Nomor --}}
                                <td class="whitespace-nowrap px-5 py-4 text-slate-500">
                                    {{ $pengumuman instanceof \Illuminate\Pagination\AbstractPaginator ? $pengumuman->firstItem() + $loop->index : $loop->iteration }}
                                </td>

                                {{-- Judul dan Ringkasan --}}
                                <td class="px-5 py-4">
                                    <div class="font-semibold leading-6 text-slate-800">
                                        {{ $item->judul }}
                                    </div>

                                    <p class="mt-1 max-w-xl text-xs leading-5 text-slate-500">
                                        {{ \Illuminate\Support\Str::limit(strip_tags($item->isi), 100) }}
                                    </p>
                                </td>

                                {{-- Status --}}
                                <td class="whitespace-nowrap px-5 py-4">
                                    @if ($item->status === 'terbit')
                                        <span class="inline-flex items-center gap-1.5 rounded-full border border-emerald-200 bg-emerald-50 px-3 py-1.5 text-xs font-semibold text-emerald-700">
                                            <span class="h-1.5 w-1.5 rounded-full bg-emerald-500"></span>
                                            Terbit
                                        </span>
                                    @else
                                        <span class="inline-flex items-center gap-1.5 rounded-full border border-amber-200 bg-amber-50 px-3 py-1.5 text-xs font-semibold text-amber-700">
                                            <span class="h-1.5 w-1.5 rounded-full bg-amber-500"></span>
                                            Draft
                                        </span>
                                    @endif
                                </td>

                                {{-- Tanggal Terbit --}}
                                <td class="whitespace-nowrap px-5 py-4">
                                    @if ($item->diterbitkan_pada)
                                        <div class="flex items-center gap-2 text-slate-700">
                                            <i class="fa-regular fa-calendar text-emerald-600"></i>

                                            {{ \Illuminate\Support\Carbon::parse($item->diterbitkan_pada)->format('d-m-Y') }}
                                        </div>

                                        <p class="mt-1 pl-5 text-xs text-slate-500">
                                            {{ \Illuminate\Support\Carbon::parse($item->diterbitkan_pada)->format('H:i') }} WIB
                                        </p>
                                    @else
                                        <span class="text-slate-400">
                                            Belum diterbitkan
                                        </span>
                                    @endif
                                </td>

                                {{-- Aksi --}}
                                <td class="px-5 py-4">
                                    <div class="mx-auto grid w-fit grid-cols-[40px_40px_40px] gap-2">

                                        {{-- Detail --}}
                                        <a href="{{ route('admin.pengumuman.show', $item->id) }}"
                                           title="Detail pengumuman"
                                           aria-label="Detail pengumuman"
                                           class="flex h-10 w-10 items-center justify-center rounded-xl border border-sky-200 bg-sky-50 text-sky-600 transition hover:bg-sky-100">
                                            <i class="fa-solid fa-eye"></i>
                                        </a>

                                        {{-- Edit --}}
                                        <a href="{{ route('admin.pengumuman.edit', $item->id) }}"
                                           title="Edit pengumuman"
                                           aria-label="Edit pengumuman"
                                           class="flex h-10 w-10 items-center justify-center rounded-xl border border-amber-200 bg-amber-50 text-amber-600 transition hover:bg-amber-100">
                                            <i class="fa-solid fa-pen-to-square"></i>
                                        </a>

                                        {{-- Hapus --}}
                                        <form action="{{ route('admin.pengumuman.destroy', $item->id) }}"
                                              method="POST"
                                              class="m-0 h-10 w-10"
                                              onsubmit="return confirm('Yakin ingin menghapus pengumuman ini?')">
                                            @csrf
                                            @method('DELETE')

                                            <button type="submit"
                                                    title="Hapus pengumuman"
                                                    aria-label="Hapus pengumuman"
                                                    class="flex h-10 w-10 items-center justify-center rounded-xl border border-red-200 bg-red-50 text-red-600 transition hover:bg-red-100">
                                                <i class="fa-solid fa-trash"></i>
                                            </button>
                                        </form>

                                    </div>
                                </td>
                            </tr>

                        @empty
                            {{-- Tampilan Data Kosong --}}
                            <tr>
                                <td colspan="5" class="px-5 py-16 text-center">
                                    <div class="mx-auto flex h-16 w-16 items-center justify-center rounded-2xl bg-emerald-50 text-2xl text-emerald-500">
                                        <i class="fa-regular fa-bell-slash"></i>
                                    </div>

                                    <h3 class="mt-4 font-semibold text-slate-800">
                                        Belum Ada Pengumuman
                                    </h3>

                                    <p class="mx-auto mt-2 max-w-sm text-sm leading-6 text-slate-500">
                                        Belum ada data pengumuman yang tersimpan.
                                    </p>

                                    <a href="{{ route('admin.pengumuman.create') }}"
                                       class="mt-5 inline-flex h-10 items-center justify-center gap-2 rounded-xl bg-emerald-600 px-4 text-sm font-semibold text-white transition hover:bg-emerald-700">
                                        <i class="fa-solid fa-plus"></i>
                                        Tambah Pengumuman
                                    </a>
                                </td>
                            </tr>
                        @endforelse
                    </tbody>
                </table>
            </div>

            {{-- Pagination --}}
            @if ($pengumuman instanceof \Illuminate\Pagination\AbstractPaginator)
                <div class="border-t border-slate-100 px-5 py-4 sm:px-6">
                    {{ $pengumuman->links() }}
                </div>
            @endif

        </div>
    </div>
</div>
@endsection
