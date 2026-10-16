@extends('layouts.app')

@section('title', 'Manajemen Berita')

@section('content')
<div class="min-h-screen space-y-6 bg-slate-50/70 px-4 py-6 sm:px-6 lg:px-8">
    <div class="mx-auto max-w-7xl space-y-6">

        {{-- Breadcrumb --}}
        <nav class="flex items-center gap-2 text-sm text-slate-500">
            <a href="{{ route('admin.dashboard') }}"
               class="flex items-center gap-2 transition hover:text-emerald-600">
                <i class="fa-solid fa-house"></i>
                <span>Home</span>
            </a>

            <i class="fa-solid fa-chevron-right text-xs"></i>

            <span>Admin</span>

            <i class="fa-solid fa-chevron-right text-xs"></i>

            <span class="font-semibold text-emerald-700">
                Manajemen Berita
            </span>
        </nav>

        {{-- Header --}}
        <div class="flex flex-col justify-between gap-4 sm:flex-row sm:items-center">
            <div>
                <h1 class="text-2xl font-bold tracking-tight text-slate-800 sm:text-3xl">
                    Manajemen Berita
                </h1>

                <p class="mt-2 text-sm text-slate-500">
                    Kelola berita dan informasi NU Desa Paningkaban.
                </p>
            </div>

            <a href="{{ route('admin.berita.create') }}"
               class="inline-flex items-center justify-center gap-2 rounded-xl bg-emerald-600 px-5 py-3 text-sm font-semibold text-white shadow-sm transition hover:bg-emerald-700 focus:outline-none focus:ring-4 focus:ring-emerald-100">
                <i class="fa-solid fa-plus"></i>
                Tambah Berita
            </a>
        </div>

        {{-- Notifikasi Berhasil --}}
        @if (session('success'))
            <div class="flex items-start gap-3 rounded-xl border border-emerald-200 bg-emerald-50 p-4 text-emerald-800">
                <i class="fa-solid fa-circle-check mt-0.5 text-lg"></i>

                <div class="text-sm font-medium">
                    {{ session('success') }}
                </div>
            </div>
        @endif

        {{-- Notifikasi Error --}}
        @if (session('error'))
            <div class="flex items-start gap-3 rounded-xl border border-red-200 bg-red-50 p-4 text-red-800">
                <i class="fa-solid fa-circle-exclamation mt-0.5 text-lg"></i>

                <div class="text-sm font-medium">
                    {{ session('error') }}
                </div>
            </div>
        @endif

        {{-- Notifikasi Validasi --}}
        @if ($errors->any())
            <div class="rounded-xl border border-red-200 bg-red-50 p-4 text-red-800">
                <div class="mb-2 flex items-center gap-2 font-semibold">
                    <i class="fa-solid fa-circle-exclamation"></i>
                    Terdapat kesalahan
                </div>

                <ul class="list-inside list-disc space-y-1 text-sm">
                    @foreach ($errors->all() as $error)
                        <li>{{ $error }}</li>
                    @endforeach
                </ul>
            </div>
        @endif

        {{-- Tabel Berita --}}
        <div class="overflow-hidden rounded-2xl border border-slate-200 bg-white shadow-sm">

            {{-- Judul Tabel --}}
            <div class="flex flex-col gap-2 border-b border-slate-200 px-5 py-5 sm:flex-row sm:items-center sm:justify-between sm:px-6">
                <div>
                    <h2 class="text-lg font-bold text-slate-800">
                        Daftar Berita
                    </h2>

                    <p class="mt-1 text-sm text-slate-500">
                        Daftar berita yang telah ditambahkan.
                    </p>
                </div>

                <div class="inline-flex w-fit items-center gap-2 rounded-lg bg-slate-100 px-3 py-2 text-sm text-slate-600">
                    <i class="fa-solid fa-newspaper text-emerald-600"></i>
                    Data berita
                </div>
            </div>

            <div class="overflow-x-auto">
                <table class="w-full min-w-[850px] text-left text-sm">
                    <thead class="bg-slate-50 text-xs uppercase tracking-wider text-slate-500">
                        <tr>
                            <th class="w-16 px-6 py-4 text-center font-semibold">
                                No.
                            </th>

                            <th class="w-24 px-4 py-4 font-semibold">
                                Gambar
                            </th>

                            <th class="px-4 py-4 font-semibold">
                                Judul Berita
                            </th>

                            <th class="w-32 px-4 py-4 font-semibold">
                                Status
                            </th>

                            <th class="w-44 px-4 py-4 font-semibold">
                                Tanggal Dibuat
                            </th>

                            <th class="w-40 px-6 py-4 text-center font-semibold">
                                Aksi
                            </th>
                        </tr>
                    </thead>

                    <tbody class="divide-y divide-slate-100">
                        @forelse ($berita as $item)
                            <tr class="transition hover:bg-slate-50/80">

                                {{-- Nomor --}}
                                <td class="px-6 py-4 text-center font-medium text-slate-500">
                                    {{ $berita instanceof \Illuminate\Pagination\AbstractPaginator
                                        ? $berita->firstItem() + $loop->index
                                        : $loop->iteration }}
                                </td>

                                {{-- Gambar --}}
                                <td class="px-4 py-4">
                                    @if ($item->gambar)
                                        <img
                                            src="{{ asset('storage/' . $item->gambar) }}"
                                            alt="{{ $item->judul }}"
                                            class="h-14 w-20 rounded-lg border border-slate-200 object-cover"
                                        >
                                    @else
                                        <div class="flex h-14 w-20 items-center justify-center rounded-lg border border-dashed border-slate-300 bg-slate-50 text-slate-400">
                                            <i class="fa-regular fa-image text-xl"></i>
                                        </div>
                                    @endif
                                </td>

                                {{-- Judul --}}
                                <td class="px-4 py-4">
                                    <div class="max-w-md">
                                        <p class="font-semibold text-slate-800">
                                            {{ $item->judul }}
                                        </p>

                                        <p class="mt-1 text-xs text-slate-500">
                                            ID Berita: {{ $item->id }}
                                        </p>
                                    </div>
                                </td>

                                {{-- Status --}}
                                <td class="px-4 py-4">
                                    @if ($item->status === 'terbit')
                                        <span class="inline-flex items-center gap-1.5 rounded-full bg-emerald-50 px-3 py-1.5 text-xs font-semibold text-emerald-700">
                                            <span class="h-1.5 w-1.5 rounded-full bg-emerald-500"></span>
                                            Terbit
                                        </span>
                                    @else
                                        <span class="inline-flex items-center gap-1.5 rounded-full bg-amber-50 px-3 py-1.5 text-xs font-semibold text-amber-700">
                                            <span class="h-1.5 w-1.5 rounded-full bg-amber-500"></span>
                                            Draft
                                        </span>
                                    @endif
                                </td>

                                {{-- Tanggal --}}
                                <td class="px-4 py-4 text-slate-600">
                                    @if ($item->created_at)
                                        <div class="flex items-center gap-2">
                                            <i class="fa-regular fa-calendar text-slate-400"></i>
                                            {{ $item->created_at->format('d-m-Y') }}
                                        </div>

                                        <p class="mt-1 pl-6 text-xs text-slate-400">
                                            {{ $item->created_at->format('H:i') }}
                                        </p>
                                    @else
                                        <span class="text-slate-400">-</span>
                                    @endif
                                </td>

                                {{-- Aksi --}}
                                <td class="px-6 py-4">
                                    <div class="flex items-center justify-center gap-2">

                                        {{-- Detail --}}
                                        <a href="{{ route('admin.berita.show', $item->id) }}"
                                           title="Detail berita"
                                           class="inline-flex h-9 w-9 items-center justify-center rounded-lg border border-sky-200 bg-sky-50 text-sky-600 transition hover:bg-sky-100">
                                            <i class="fa-solid fa-eye"></i>
                                        </a>

                                        {{-- Edit --}}
                                        <a href="{{ route('admin.berita.edit', $item->id) }}"
                                           title="Edit berita"
                                           class="inline-flex h-9 w-9 items-center justify-center rounded-lg border border-amber-200 bg-amber-50 text-amber-600 transition hover:bg-amber-100">
                                            <i class="fa-solid fa-pen-to-square"></i>
                                        </a>

                                        {{-- Hapus --}}
                                        <form
                                            action="{{ route('admin.berita.destroy', $item->id) }}"
                                            method="POST"
                                            onsubmit="return confirm('Apakah Anda yakin ingin menghapus berita ini?')"
                                        >
                                            @csrf
                                            @method('DELETE')

                                            <button
                                                type="submit"
                                                title="Hapus berita"
                                                class="inline-flex h-9 w-9 items-center justify-center rounded-lg border border-red-200 bg-red-50 text-red-600 transition hover:bg-red-100"
                                            >
                                                <i class="fa-solid fa-trash"></i>
                                            </button>
                                        </form>

                                    </div>
                                </td>
                            </tr>
                        @empty
                            <tr>
                                <td colspan="6" class="px-6 py-16 text-center">
                                    <div class="mx-auto flex h-16 w-16 items-center justify-center rounded-2xl bg-slate-100 text-slate-400">
                                        <i class="fa-regular fa-newspaper text-3xl"></i>
                                    </div>

                                    <h3 class="mt-4 font-semibold text-slate-700">
                                        Belum Ada Berita
                                    </h3>

                                    <p class="mt-2 text-sm text-slate-500">
                                        Silakan tambahkan berita baru untuk ditampilkan di sini.
                                    </p>

                                    <a href="{{ route('admin.berita.create') }}"
                                       class="mt-5 inline-flex items-center gap-2 rounded-lg bg-emerald-600 px-4 py-2.5 text-sm font-semibold text-white transition hover:bg-emerald-700">
                                        <i class="fa-solid fa-plus"></i>
                                        Tambah Berita
                                    </a>
                                </td>
                            </tr>
                        @endforelse
                    </tbody>
                </table>
            </div>

            {{-- Footer dan Pagination --}}
            @if ($berita instanceof \Illuminate\Pagination\AbstractPaginator)
                <div class="flex flex-col gap-4 border-t border-slate-200 px-5 py-4 sm:flex-row sm:items-center sm:justify-between sm:px-6">
                    <p class="text-sm text-slate-500">
                        @if ($berita->total() > 0)
                            Menampilkan
                            <span class="font-semibold text-slate-700">
                                {{ $berita->firstItem() }}–{{ $berita->lastItem() }}
                            </span>
                            dari
                            <span class="font-semibold text-slate-700">
                                {{ $berita->total() }}
                            </span>
                            berita
                        @else
                            Belum ada data berita.
                        @endif
                    </p>

                    @if ($berita->hasPages())
                        <div>
                            {{ $berita->links() }}
                        </div>
                    @endif
                </div>
            @else
                <div class="border-t border-slate-200 px-5 py-4 sm:px-6">
                    <p class="text-sm text-slate-500">
                        Total {{ $berita->count() }} berita
                    </p>
                </div>
            @endif

        </div>
    </div>
</div>
@endsection