@extends('layouts.app')

@section('title', 'Struktur Pengurus')

@section('content')
<div class="min-h-screen space-y-6 bg-slate-50/70 px-4 py-6 sm:px-6 lg:px-8">
    <div class="mx-auto max-w-7xl space-y-6">

        {{-- Breadcrumb --}}
        <nav class="flex flex-wrap items-center gap-2 text-sm" aria-label="Breadcrumb">
            <a href="{{ route('admin.dashboard') }}"
               class="inline-flex items-center gap-2 text-slate-500 transition hover:text-emerald-600">
                <i class="fa-solid fa-house"></i>
                <span>Home</span>
            </a>

            <i class="fa-solid fa-chevron-right text-xs text-slate-400"></i>

            <span class="text-slate-500">Admin</span>

            <i class="fa-solid fa-chevron-right text-xs text-slate-400"></i>

            <span class="font-semibold text-emerald-700">Struktur Pengurus</span>
        </nav>

        {{-- Header Halaman --}}
        <div class="flex flex-col gap-4 sm:flex-row sm:items-center sm:justify-between">
            <div>

                <h1 class="mt-3 text-2xl font-bold tracking-tight text-slate-800">
                    Struktur Pengurus
                </h1>

                <p class="mt-1 text-sm text-slate-500">
                    Kelola data pengurus NU Desa Paningkaban beserta jabatan dan periode kepengurusan.
                </p>
            </div>

            <a href="{{ route('admin.pengurus.create') }}"
               class="inline-flex items-center justify-center gap-2 rounded-xl bg-emerald-600 px-5 py-2.5 text-sm font-semibold text-white shadow-sm transition hover:bg-emerald-700">
                <i class="fa-solid fa-user-plus"></i>
                Tambah Pengurus
            </a>
        </div>

        {{-- Notifikasi Berhasil --}}
        @if (session('success'))
            <div class="flex items-start gap-3 rounded-xl border border-emerald-200 bg-emerald-50 p-4 text-sm text-emerald-800">
                <i class="fa-solid fa-circle-check mt-0.5 text-emerald-600"></i>
                <p>{{ session('success') }}</p>
            </div>
        @endif

        {{-- Notifikasi Kesalahan --}}
        @if ($errors->any())
            <div class="rounded-xl border border-red-200 bg-red-50 p-4 text-sm text-red-700">
                <div class="mb-2 flex items-center gap-2 font-semibold">
                    <i class="fa-solid fa-triangle-exclamation"></i>
                    Terjadi Kesalahan
                </div>

                <ul class="list-inside list-disc space-y-1">
                    @foreach ($errors->all() as $error)
                        <li>{{ $error }}</li>
                    @endforeach
                </ul>
            </div>
        @endif

        {{-- Tabel Struktur Pengurus --}}
        <div class="overflow-hidden rounded-2xl border border-slate-200 bg-white shadow-sm">

            {{-- Informasi Tabel --}}
            <div class="flex flex-col gap-3 border-b border-slate-100 px-5 py-4 sm:flex-row sm:items-center sm:justify-between">
                <div class="flex items-center gap-3">
                    <div class="flex h-11 w-11 items-center justify-center rounded-xl bg-emerald-50 text-emerald-600">
                        <i class="fa-solid fa-users text-lg"></i>
                    </div>

                    <div>
                        <h2 class="text-base font-bold text-slate-800">
                            Data Pengurus
                        </h2>

                        <p class="mt-0.5 text-sm text-slate-500">
                            Daftar pengurus NU Desa Paningkaban
                        </p>
                    </div>
                </div>

                <div class="inline-flex items-center gap-2 text-sm font-medium text-slate-500">
                    <i class="fa-solid fa-database text-emerald-600"></i>
                    <span>
                        Total data:
                        <strong class="text-slate-800">
                            {{ $pengurus instanceof \Illuminate\Pagination\AbstractPaginator ? $pengurus->total() : $pengurus->count() }}
                        </strong>
                        pengurus
                    </span>
                </div>
            </div>

            {{-- Isi Tabel --}}
            <div class="overflow-x-auto">
                <table class="w-full border-collapse text-left">
                    <thead>
                        <tr class="border-b border-slate-200 bg-slate-50 text-xs font-bold uppercase tracking-wider text-slate-500">
                            <th class="w-14 px-5 py-4 text-center">No.</th>
                            <th class="px-5 py-4">Foto</th>
                            <th class="px-5 py-4">Nama Pengurus</th>
                            <th class="px-5 py-4">Jabatan</th>
                            <th class="px-5 py-4">Periode</th>
                            <th class="px-5 py-4 text-center">Urutan</th>
                            <th class="min-w-[150px] px-5 py-4 text-right">Aksi</th>
                        </tr>
                    </thead>

                    <tbody class="divide-y divide-slate-100 text-sm text-slate-700">
                        @forelse ($pengurus as $item)
                            <tr class="transition-colors hover:bg-slate-50/70">

                                {{-- Nomor --}}
                                <td class="px-5 py-4 text-center font-semibold text-slate-400">
                                    {{ $pengurus instanceof \Illuminate\Pagination\AbstractPaginator ? $pengurus->firstItem() + $loop->index : $loop->iteration }}
                                </td>

                                {{-- Foto Pengurus --}}
                                <td class="px-5 py-4">
                                    @if ($item->foto)
                                        <img
                                            src="{{ asset('storage/' . $item->foto) }}"
                                            alt="Foto {{ $item->nama }}"
                                            width="44"
                                            height="44"
                                            loading="lazy"
                                            class="h-11 w-11 rounded-xl border border-slate-200 object-cover shadow-sm"
                                        >
                                    @else
                                        <div class="flex h-11 w-11 items-center justify-center rounded-xl border border-slate-200 bg-slate-100 text-slate-400">
                                            <i class="fa-solid fa-user text-lg"></i>
                                        </div>
                                    @endif
                                </td>

                                {{-- Nama --}}
                                <td class="px-5 py-4">
                                    <p class="font-bold text-slate-800">
                                        {{ $item->nama }}
                                    </p>

                                    <p class="mt-1 text-xs text-slate-400">
                                        ID Pengurus: #{{ $item->id }}
                                    </p>
                                </td>

                                {{-- Jabatan --}}
                                <td class="px-5 py-4">
                                    <span class="inline-flex items-center gap-1.5 rounded-lg border border-emerald-100 bg-emerald-50 px-2.5 py-1.5 text-xs font-semibold text-emerald-700">
                                        <i class="fa-solid fa-briefcase"></i>
                                        {{ $item->jabatan }}
                                    </span>
                                </td>

                                {{-- Periode --}}
                                <td class="px-5 py-4 text-slate-600">
                                    <div class="flex items-center gap-2">
                                        <i class="fa-regular fa-calendar text-emerald-600"></i>
                                        <span>{{ $item->periode ?: '-' }}</span>
                                    </div>
                                </td>

                                {{-- Urutan --}}
                                <td class="px-5 py-4 text-center">
                                    <span class="inline-flex h-8 min-w-8 items-center justify-center rounded-lg bg-slate-100 px-2 text-xs font-bold text-slate-700">
                                        {{ $item->urutan }}
                                    </span>
                                </td>

                                {{-- Aksi --}}
                                <td class="px-5 py-4">
                                    <div class="flex items-center justify-end gap-2">

                                        {{-- Detail --}}
                                        <a href="{{ route('admin.pengurus.show', $item->id) }}"
                                           class="flex h-9 w-9 items-center justify-center rounded-lg border border-blue-100 bg-blue-50 text-blue-600 transition hover:bg-blue-600 hover:text-white"
                                           title="Detail Pengurus"
                                           aria-label="Detail Pengurus">
                                            <i class="fa-solid fa-eye"></i>
                                        </a>

                                        {{-- Edit --}}
                                        <a href="{{ route('admin.pengurus.edit', $item->id) }}"
                                           class="flex h-9 w-9 items-center justify-center rounded-lg border border-amber-100 bg-amber-50 text-amber-600 transition hover:bg-amber-500 hover:text-white"
                                           title="Edit Pengurus"
                                           aria-label="Edit Pengurus">
                                            <i class="fa-solid fa-pen-to-square"></i>
                                        </a>

                                        {{-- Hapus --}}
                                        <form action="{{ route('admin.pengurus.destroy', $item->id) }}"
                                              method="POST"
                                              class="m-0"
                                              onsubmit="return confirm('Yakin ingin menghapus data pengurus ini?')">
                                            @csrf
                                            @method('DELETE')

                                            <button type="submit"
                                                    class="flex h-9 w-9 items-center justify-center rounded-lg border border-red-100 bg-red-50 text-red-600 transition hover:bg-red-600 hover:text-white"
                                                    title="Hapus Pengurus"
                                                    aria-label="Hapus Pengurus">
                                                <i class="fa-solid fa-trash-can"></i>
                                            </button>
                                        </form>

                                    </div>
                                </td>
                            </tr>
                        @empty
                            {{-- Tampilan jika data kosong --}}
                            <tr>
                                <td colspan="7" class="px-5 py-14 text-center">
                                    <div class="flex flex-col items-center justify-center">
                                        <div class="mb-3 flex h-16 w-16 items-center justify-center rounded-2xl bg-emerald-50 text-emerald-500">
                                            <i class="fa-solid fa-users-slash text-2xl"></i>
                                        </div>

                                        <p class="text-base font-bold text-slate-700">
                                            Belum Ada Data Pengurus
                                        </p>

                                        <p class="mt-1 max-w-md text-sm leading-6 text-slate-500">
                                            Tambahkan data pengurus untuk menampilkan struktur organisasi NU Desa Paningkaban.
                                        </p>

                                        <a href="{{ route('admin.pengurus.create') }}"
                                           class="mt-5 inline-flex items-center justify-center gap-2 rounded-xl bg-emerald-600 px-5 py-2.5 text-sm font-semibold text-white transition hover:bg-emerald-700">
                                            <i class="fa-solid fa-plus"></i>
                                            Tambah Pengurus
                                        </a>
                                    </div>
                                </td>
                            </tr>
                        @endforelse
                    </tbody>
                </table>
            </div>

            {{-- Pagination --}}
            @if ($pengurus instanceof \Illuminate\Pagination\AbstractPaginator && $pengurus->hasPages())
                <div class="border-t border-slate-100 bg-white px-5 py-4">
                    {{ $pengurus->links() }}
                </div>
            @endif

        </div>
    </div>
</div>
@endsection