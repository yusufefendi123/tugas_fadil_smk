
@extends('layouts.app')

@section('title', 'Data Jamaah')

@section('content')
<div class="mx-auto w-full max-w-7xl space-y-6">

    {{-- Breadcrumb dan Header Halaman --}}
    <div class="flex flex-col gap-4 sm:flex-row sm:items-center sm:justify-between">
        <div>
            <div class="mb-2 flex flex-wrap items-center gap-2 text-sm text-slate-500">
                <i class="fa-solid fa-house"></i>
                <span>/</span>
                <span>Admin</span>
                <span>/</span>
                <span class="font-medium text-emerald-700">Data Jamaah</span>
            </div>

            <h1 class="text-2xl font-bold tracking-tight text-slate-800 sm:text-3xl">
                Data Jamaah
            </h1>

            <p class="mt-2 text-sm text-slate-500">
                Kelola data identitas jamaah NU Desa Paningkaban.
            </p>
        </div>

        <a href="{{ route('admin.jamaah.create') }}"
           class="inline-flex h-11 items-center justify-center gap-2 rounded-xl bg-emerald-600 px-5 text-sm font-semibold text-white shadow-sm transition hover:bg-emerald-700 focus:outline-none focus:ring-4 focus:ring-emerald-500/20">
            <i class="fa-solid fa-user-plus"></i>
            Tambah Jamaah
        </a>
    </div>

    {{-- Notifikasi Berhasil --}}
    @if (session('success'))
        <div class="flex items-start gap-3 rounded-xl border border-emerald-200 bg-emerald-50 p-4 text-sm text-emerald-800">
            <i class="fa-solid fa-circle-check mt-0.5 text-lg text-emerald-600"></i>
            <div class="font-medium">{{ session('success') }}</div>
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

    {{-- Pencarian Jamaah --}}
    <div class="overflow-hidden rounded-2xl border border-slate-200 bg-white shadow-sm">

        <div class="border-b border-slate-100 px-5 py-4 sm:px-6">
            <div class="flex items-center gap-3">
                <div class="flex h-10 w-10 items-center justify-center rounded-xl bg-emerald-50 text-emerald-600">
                    <i class="fa-solid fa-magnifying-glass"></i>
                </div>

                <div>
                    <h2 class="font-bold text-slate-800">Cari Data Jamaah</h2>
                    <p class="mt-1 text-xs text-slate-500">
                        Cari berdasarkan NIK atau nama lengkap.
                    </p>
                </div>
            </div>
        </div>

        <div class="p-5 sm:p-6">
            <form action="{{ route('admin.jamaah.index') }}" method="GET">
                <div class="flex flex-col gap-3 sm:flex-row">
                    <div class="relative min-w-0 flex-1">
                        <i class="fa-solid fa-magnifying-glass absolute left-4 top-1/2 -translate-y-1/2 text-slate-400"></i>

                        <input type="text"
                               name="cari"
                               value="{{ $cari }}"
                               placeholder="Cari berdasarkan NIK atau nama lengkap..."
                               class="w-full rounded-xl border border-slate-300 bg-white py-3 pl-11 pr-4 text-sm text-slate-700 outline-none transition placeholder:text-slate-400 focus:border-emerald-500 focus:ring-4 focus:ring-emerald-500/10">
                    </div>

                    <div class="flex gap-2">
                        <button type="submit"
                                class="inline-flex h-11 flex-1 items-center justify-center gap-2 rounded-xl bg-emerald-600 px-5 text-sm font-semibold text-white transition hover:bg-emerald-700 sm:flex-none">
                            <i class="fa-solid fa-magnifying-glass"></i>
                            Cari
                        </button>

                        <a href="{{ route('admin.jamaah.index') }}"
                           class="inline-flex h-11 items-center justify-center gap-2 rounded-xl border border-slate-300 bg-white px-5 text-sm font-semibold text-slate-600 transition hover:bg-slate-100">
                            <i class="fa-solid fa-rotate-left"></i>
                            Reset
                        </a>
                    </div>
                </div>
            </form>
        </div>
    </div>

    {{-- Tabel Data Jamaah --}}
    <div class="overflow-hidden rounded-2xl border border-slate-200 bg-white shadow-sm">

        <div class="border-b border-slate-100 px-5 py-5 sm:px-6">
            <h2 class="text-lg font-bold text-slate-800">
                Daftar Jamaah
            </h2>

            <p class="mt-1 text-sm text-slate-500">
                Data identitas jamaah yang tersimpan dalam sistem.
            </p>
        </div>

        <div class="overflow-x-auto">
            <table class="w-full min-w-[1000px] text-left text-sm">
                <thead class="bg-slate-50 text-xs uppercase tracking-wider text-slate-500">
                    <tr>
                        <th class="w-16 px-5 py-4 font-semibold">No.</th>
                        <th class="w-44 px-5 py-4 font-semibold">NIK</th>
                        <th class="px-5 py-4 font-semibold">Nama Lengkap</th>
                        <th class="w-56 px-5 py-4 font-semibold">Tempat, Tanggal Lahir</th>
                        <th class="w-36 px-5 py-4 font-semibold">Jenis Kelamin</th>
                        <th class="w-44 px-5 py-4 text-center font-semibold">Aksi</th>
                    </tr>
                </thead>

                <tbody class="divide-y divide-slate-100">
                    @forelse ($jamaah as $item)
                        <tr class="transition hover:bg-emerald-50/30">

                            {{-- Nomor --}}
                            <td class="whitespace-nowrap px-5 py-4 text-slate-500">
                                {{ $jamaah->firstItem() + $loop->index }}
                            </td>

                            {{-- NIK --}}
                            <td class="whitespace-nowrap px-5 py-4 text-slate-600">
                                {{ $item->nik ?? '-' }}
                            </td>

                            {{-- Nama --}}
                            <td class="px-5 py-4">
                                <div class="flex items-center gap-3">
                                    <div class="flex h-10 w-10 shrink-0 items-center justify-center rounded-xl bg-emerald-50 text-emerald-600">
                                        <i class="fa-solid fa-user"></i>
                                    </div>

                                    <span class="font-semibold text-slate-800">
                                        {{ $item->nama_lengkap ?? '-' }}
                                    </span>
                                </div>
                            </td>

                            {{-- Tempat dan Tanggal Lahir --}}
                            <td class="px-5 py-4">
                                <p class="font-medium text-slate-700">
                                    {{ $item->tempat_lahir ?? '-' }}
                                </p>

                                <p class="mt-1 text-xs text-slate-500">
                                    @if ($item->tanggal_lahir)
                                        {{ \Carbon\Carbon::parse($item->tanggal_lahir)->locale('id')->translatedFormat('d F Y') }}
                                    @else
                                        -
                                    @endif
                                </p>
                            </td>

                            {{-- Jenis Kelamin --}}
                            <td class="whitespace-nowrap px-5 py-4">
                                @if ($item->jenis_kelamin === 'Laki-laki')
                                    <span class="inline-flex items-center gap-2 rounded-full border border-sky-200 bg-sky-50 px-3 py-1.5 text-xs font-semibold text-sky-700">
                                        <i class="fa-solid fa-person"></i>
                                        Laki-laki
                                    </span>
                                @elseif ($item->jenis_kelamin === 'Perempuan')
                                    <span class="inline-flex items-center gap-2 rounded-full border border-pink-200 bg-pink-50 px-3 py-1.5 text-xs font-semibold text-pink-700">
                                        <i class="fa-solid fa-person-dress"></i>
                                        Perempuan
                                    </span>
                                @else
                                    <span class="text-slate-500">
                                        {{ $item->jenis_kelamin ?? '-' }}
                                    </span>
                                @endif
                            </td>

                            {{-- Tombol Aksi --}}
                            <td class="px-5 py-4">
                                <div class="mx-auto grid w-fit grid-cols-[40px_40px_40px] gap-2">

                                    <a href="{{ route('admin.jamaah.show', $item->id) }}"
                                       title="Detail jamaah"
                                       aria-label="Detail jamaah"
                                       class="flex h-10 w-10 items-center justify-center rounded-xl border border-sky-200 bg-sky-50 text-sky-600 transition hover:bg-sky-100">
                                        <i class="fa-solid fa-eye"></i>
                                    </a>

                                    <a href="{{ route('admin.jamaah.edit', $item->id) }}"
                                       title="Edit jamaah"
                                       aria-label="Edit jamaah"
                                       class="flex h-10 w-10 items-center justify-center rounded-xl border border-amber-200 bg-amber-50 text-amber-600 transition hover:bg-amber-100">
                                        <i class="fa-solid fa-pen-to-square"></i>
                                    </a>

                                    <form action="{{ route('admin.jamaah.destroy', $item->id) }}"
                                          method="POST"
                                          class="m-0 h-10 w-10"
                                          onsubmit="return confirm('Yakin ingin menghapus data jamaah ini?')">
                                        @csrf
                                        @method('DELETE')

                                        <button type="submit"
                                                title="Hapus jamaah"
                                                aria-label="Hapus jamaah"
                                                class="flex h-10 w-10 items-center justify-center rounded-xl border border-red-200 bg-red-50 text-red-600 transition hover:bg-red-100">
                                            <i class="fa-solid fa-trash"></i>
                                        </button>
                                    </form>

                                </div>
                            </td>
                        </tr>
                    @empty
                        <tr>
                            <td colspan="6" class="px-5 py-16 text-center">
                                <div class="mx-auto flex h-16 w-16 items-center justify-center rounded-2xl bg-emerald-50 text-2xl text-emerald-500">
                                    <i class="fa-solid fa-users"></i>
                                </div>

                                <h3 class="mt-4 font-semibold text-slate-800">
                                    Belum Ada Data Jamaah
                                </h3>

                                <p class="mx-auto mt-2 max-w-sm text-sm leading-6 text-slate-500">
                                    @if (!empty($cari))
                                        Data jamaah dengan kata kunci tersebut tidak ditemukan.
                                    @else
                                        Belum ada data jamaah yang tersimpan. Tambahkan data jamaah untuk memulai.
                                    @endif
                                </p>

                                @if (empty($cari))
                                    <a href="{{ route('admin.jamaah.create') }}"
                                       class="mt-5 inline-flex h-10 items-center justify-center gap-2 rounded-xl bg-emerald-600 px-4 text-sm font-semibold text-white transition hover:bg-emerald-700">
                                        <i class="fa-solid fa-user-plus"></i>
                                        Tambah Jamaah
                                    </a>
                                @else
                                    <a href="{{ route('admin.jamaah.index') }}"
                                       class="mt-5 inline-flex h-10 items-center justify-center gap-2 rounded-xl border border-slate-300 bg-white px-4 text-sm font-semibold text-slate-600 transition hover:bg-slate-100">
                                        <i class="fa-solid fa-rotate-left"></i>
                                        Reset Pencarian
                                    </a>
                                @endif
                            </td>
                        </tr>
                    @endforelse
                </tbody>
            </table>
        </div>

        {{-- Pagination --}}
        @if ($jamaah->hasPages())
            <div class="border-t border-slate-100 px-5 py-4 sm:px-6">
                {{ $jamaah->appends(request()->query())->links() }}
            </div>
        @endif

    </div>

</div>
@endsection
