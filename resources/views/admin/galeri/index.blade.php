@extends('layouts.app')

@section('title', 'Galeri Kegiatan')

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

            <span class="font-semibold text-emerald-700">Galeri Kegiatan</span>
        </nav>

        {{-- Header halaman --}}
        <div class="flex flex-col gap-4 sm:flex-row sm:items-center sm:justify-between">
            <div>

                <h1 class="mt-3 text-2xl font-bold text-slate-800">
                    Galeri Kegiatan
                </h1>

                <p class="mt-1 text-sm text-slate-500">
                    Kelola foto dokumentasi kegiatan NU Desa Paningkaban.
                </p>
            </div>

            <a href="{{ route('admin.galeri.create') }}"
               class="inline-flex items-center justify-center gap-2 rounded-xl bg-emerald-600 px-5 py-2.5 text-sm font-semibold text-white shadow-sm transition hover:bg-emerald-700">
                <i class="fa-solid fa-plus"></i>
                Tambah Foto
            </a>
        </div>

        {{-- Notifikasi sukses --}}
        @if (session('success'))
            <div class="flex items-start gap-3 rounded-xl border border-emerald-200 bg-emerald-50 p-4 text-sm text-emerald-800">
                <i class="fa-solid fa-circle-check mt-0.5 text-emerald-600"></i>
                <p>{{ session('success') }}</p>
            </div>
        @endif

        {{-- Notifikasi error --}}
        @if ($errors->any())
            <div class="rounded-xl border border-red-200 bg-red-50 p-4 text-sm text-red-700">
                <div class="mb-2 flex items-center gap-2 font-semibold">
                    <i class="fa-solid fa-circle-exclamation"></i>
                    Terjadi kesalahan
                </div>

                <ul class="list-inside list-disc space-y-1">
                    @foreach ($errors->all() as $error)
                        <li>{{ $error }}</li>
                    @endforeach
                </ul>
            </div>
        @endif

        {{-- Ringkasan jumlah foto --}}
        <div class="rounded-2xl border border-slate-200 bg-white p-5 shadow-sm">
            <div class="flex items-center gap-4">
                <div class="flex h-12 w-12 items-center justify-center rounded-xl bg-emerald-50 text-emerald-600">
                    <i class="fa-solid fa-images text-xl"></i>
                </div>

                <div>
                    <p class="text-sm text-slate-500">Total foto galeri</p>
                    <p class="text-2xl font-bold text-slate-800">
                        {{ $galeri instanceof \Illuminate\Pagination\AbstractPaginator ? $galeri->total() : $galeri->count() }}
                    </p>
                </div>
            </div>
        </div>

        {{-- Daftar galeri --}}
        <div>
            <div class="mb-4">
                <h2 class="text-lg font-bold text-slate-800">
                    Dokumentasi Kegiatan
                </h2>

                <p class="mt-1 text-sm text-slate-500">
                    Daftar foto yang telah ditambahkan ke galeri.
                </p>
            </div>

            <div class="grid grid-cols-1 gap-5 sm:grid-cols-2 lg:grid-cols-3 xl:grid-cols-4">

                @forelse ($galeri as $item)
                    <div class="group flex h-full flex-col overflow-hidden rounded-2xl border border-slate-200 bg-white shadow-sm transition hover:-translate-y-1 hover:shadow-md">

                        {{-- Foto --}}
                        <div class="relative h-52 overflow-hidden bg-slate-100">
                            @if ($item->gambar)
                                <img
                                    src="{{ asset('storage/' . $item->gambar) }}"
                                    alt="{{ $item->judul }}"
                                    class="h-full w-full object-cover transition duration-300 group-hover:scale-105"
                                    loading="lazy"
                                >
                            @else
                                <div class="flex h-full items-center justify-center text-slate-400">
                                    <i class="fa-regular fa-image text-5xl"></i>
                                </div>
                            @endif

                            <div class="absolute left-3 top-3">
                                <span class="rounded-lg bg-white/95 px-3 py-1.5 text-xs font-semibold text-slate-700 shadow-sm">
                                    <i class="fa-solid fa-camera mr-1 text-emerald-600"></i>
                                    Dokumentasi
                                </span>
                            </div>
                        </div>

                        {{-- Informasi foto --}}
                        <div class="flex flex-1 flex-col p-4">
                            <h3 class="line-clamp-2 text-base font-bold text-slate-800">
                                {{ $item->judul }}
                            </h3>

                            <div class="mt-3 flex items-start gap-2 text-sm text-slate-500">
                                <i class="fa-regular fa-calendar mt-1 text-emerald-600"></i>

                                <span class="line-clamp-2">
                                    {{ $item->kegiatan?->nama_kegiatan ?? 'Tidak terkait kegiatan' }}
                                </span>
                            </div>

                            <p class="mt-3 line-clamp-3 text-sm leading-6 text-slate-500">
                                {{ \Illuminate\Support\Str::limit($item->keterangan ?? 'Tidak ada keterangan.', 100) }}
                            </p>

                            {{-- Tombol aksi --}}
                            <div class="mt-auto grid grid-cols-[minmax(0,1fr)_minmax(0,1fr)_40px] items-center gap-2 border-t border-slate-100 pt-4">

                                {{-- Detail --}}
                                <a href="{{ route('admin.galeri.show', $item->id) }}"
                                   class="inline-flex h-10 min-w-0 items-center justify-center gap-1.5 rounded-lg border border-slate-200 bg-white px-2 text-sm font-medium text-slate-600 transition hover:bg-slate-50"
                                   title="Lihat detail">
                                    <i class="fa-solid fa-eye"></i>
                                    <span>Detail</span>
                                </a>

                                {{-- Edit --}}
                                <a href="{{ route('admin.galeri.edit', $item->id) }}"
                                   class="inline-flex h-10 min-w-0 items-center justify-center gap-1.5 rounded-lg bg-amber-400 px-2 text-sm font-semibold text-slate-900 transition hover:bg-amber-500"
                                   title="Edit foto">
                                    <i class="fa-solid fa-pen-to-square"></i>
                                    <span>Edit</span>
                                </a>

                                {{-- Hapus --}}
                                <form action="{{ route('admin.galeri.destroy', $item->id) }}"
                                      method="POST"
                                      class="m-0 flex h-10 w-10 items-center justify-center"
                                      onsubmit="return confirm('Yakin ingin menghapus foto ini?')">
                                    @csrf
                                    @method('DELETE')

                                    <button type="submit"
                                            class="flex h-10 w-10 shrink-0 items-center justify-center rounded-lg border border-red-200 bg-red-50 p-0 text-sm text-red-600 transition hover:bg-red-100"
                                            title="Hapus foto">
                                        <i class="fa-solid fa-trash"></i>
                                    </button>
                                </form>

                            </div>
                        </div>
                    </div>

                @empty
                    {{-- Tampilan ketika galeri kosong --}}
                    <div class="col-span-full rounded-2xl border border-slate-200 bg-white px-6 py-14 text-center shadow-sm">
                        <div class="mx-auto flex h-16 w-16 items-center justify-center rounded-2xl bg-emerald-50 text-emerald-600">
                            <i class="fa-regular fa-images text-3xl"></i>
                        </div>

                        <h3 class="mt-4 text-lg font-bold text-slate-800">
                            Belum Ada Foto Galeri
                        </h3>

                        <p class="mx-auto mt-2 max-w-md text-sm leading-6 text-slate-500">
                            Belum ada foto dokumentasi yang ditambahkan. Silakan tambahkan foto kegiatan NU untuk mulai mengisi galeri.
                        </p>

                        <a href="{{ route('admin.galeri.create') }}"
                           class="mt-5 inline-flex items-center justify-center gap-2 rounded-xl bg-emerald-600 px-5 py-2.5 text-sm font-semibold text-white transition hover:bg-emerald-700">
                            <i class="fa-solid fa-plus"></i>
                            Tambah Foto Pertama
                        </a>
                    </div>
                @endforelse

            </div>
        </div>

        {{-- Pagination --}}
        @if ($galeri instanceof \Illuminate\Pagination\AbstractPaginator && $galeri->hasPages())
            <div class="rounded-xl border border-slate-200 bg-white px-4 py-3 shadow-sm">
                {{ $galeri->links() }}
            </div>
        @endif

    </div>
</div>
@endsection