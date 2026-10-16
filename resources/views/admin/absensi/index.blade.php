
@extends('layouts.app')

@section('title', 'Absensi Jamaah')

@section('content')
<div class="mx-auto w-full max-w-[1600px] space-y-6">

    {{-- Breadcrumb --}}
    <div class="flex flex-wrap items-center gap-2 text-sm text-slate-500">
        <i class="fa-solid fa-house"></i>
        <span>/</span>
        <span>Admin</span>
        <span>/</span>
        <span class="font-semibold text-emerald-700">
            Kehadiran Jamaah NU
        </span>
    </div>

    {{-- Header --}}
    <div class="flex flex-col gap-4 sm:flex-row sm:items-center sm:justify-between">
        <div class="min-w-0">
            <div class="mb-2 inline-flex items-center gap-2 rounded-full bg-emerald-50 px-3 py-1 text-xs font-semibold text-emerald-700">
                <i class="fa-solid fa-clipboard-check"></i>
                Kehadiran Jamaah NU
            </div>

            <h1 class="text-2xl font-bold tracking-tight text-slate-800 sm:text-3xl">
                Absensi Jamaah
            </h1>

            <p class="mt-2 text-sm leading-6 text-slate-500">
                Kelola data kehadiran jamaah dalam kegiatan NU Desa Paningkaban.
            </p>
        </div>

        <a
            href="{{ route('admin.absensi.create') }}"
            class="inline-flex h-11 shrink-0 items-center justify-center gap-2 self-start rounded-xl bg-emerald-600 px-5 text-sm font-semibold text-white shadow-sm transition hover:bg-emerald-700 sm:self-center"
        >
            <i class="fa-solid fa-plus"></i>
            Tambah Absensi
        </a>
    </div>

    {{-- Notifikasi Berhasil --}}
    @if (session('success'))
        <div class="flex items-start gap-3 rounded-xl border border-emerald-200 bg-emerald-50 p-4 text-sm text-emerald-800">
            <i class="fa-solid fa-circle-check mt-0.5 text-lg"></i>

            <p class="min-w-0 flex-1 leading-6">
                {{ session('success') }}
            </p>

            <button
                type="button"
                onclick="this.parentElement.remove()"
                class="shrink-0 p-1 hover:text-emerald-950"
                aria-label="Tutup notifikasi"
            >
                <i class="fa-solid fa-xmark"></i>
            </button>
        </div>
    @endif

    {{-- Notifikasi Error --}}
    @if ($errors->any())
        <div class="rounded-xl border border-red-200 bg-red-50 p-4 text-sm text-red-700">
            <div class="flex items-center gap-2 font-semibold">
                <i class="fa-solid fa-circle-exclamation"></i>
                Terdapat kesalahan
            </div>

            <ul class="mt-2 list-inside list-disc space-y-1">
                @foreach ($errors->all() as $error)
                    <li>{{ $error }}</li>
                @endforeach
            </ul>
        </div>
    @endif

    {{-- Kartu Tabel --}}
    <div class="overflow-hidden rounded-2xl border border-slate-200 bg-white shadow-sm">

        {{-- Judul Tabel --}}
        <div class="border-b border-slate-100 px-5 py-5 sm:px-6">
            <h2 class="text-base font-bold text-slate-800">
                Daftar Kehadiran
            </h2>

            <p class="mt-1 text-sm text-slate-500">
                Data jamaah dan status kehadiran pada setiap kegiatan.
            </p>
        </div>

        {{-- Tabel --}}
        <div class="overflow-x-auto">
            <table class="w-full min-w-[1100px] table-fixed text-sm">

                <colgroup>
                    <col style="width: 55px">
                    <col style="width: 180px">
                    <col style="width: 190px">
                    <col style="width: 115px">
                    <col style="width: 105px">
                    <col style="width: 125px">
                    <col style="width: 190px">
                    <col style="width: 115px">
                </colgroup>

                <thead>
                    <tr class="border-b border-slate-200 bg-slate-50 text-left text-xs uppercase tracking-wider text-slate-500">
                        <th class="px-4 py-4 font-semibold">No.</th>
                        <th class="px-4 py-4 font-semibold">Nama Jamaah</th>
                        <th class="px-4 py-4 font-semibold">Nama Kegiatan</th>
                        <th class="px-4 py-4 font-semibold">Tanggal</th>
                        <th class="px-4 py-4 font-semibold">Waktu</th>
                        <th class="px-4 py-4 font-semibold">Status</th>
                        <th class="px-4 py-4 font-semibold">Keterangan</th>
                        <th class="px-4 py-4 text-center font-semibold">Aksi</th>
                    </tr>
                </thead>

                <tbody class="divide-y divide-slate-100">

                    @forelse ($absensi as $item)
                        <tr class="align-middle transition hover:bg-emerald-50/40">

                            {{-- Nomor --}}
                            <td class="px-4 py-4 text-slate-500">
                                {{ $absensi instanceof \Illuminate\Pagination\AbstractPaginator ? $absensi->firstItem() + $loop->index : $loop->iteration }}
                            </td>

                            {{-- Nama Jamaah --}}
                            <td class="px-4 py-4">
                                <div class="flex min-w-0 items-center gap-3">
                                    <div class="flex h-9 w-9 shrink-0 items-center justify-center rounded-lg bg-emerald-100 text-emerald-700">
                                        <i class="fa-solid fa-user"></i>
                                    </div>

                                    <span class="break-words font-semibold leading-5 text-slate-800">
                                        {{ $item->jamaah->nama_lengkap ?? 'Tidak ditemukan' }}
                                    </span>
                                </div>
                            </td>

                            {{-- Nama Kegiatan --}}
                            <td class="px-4 py-4">
                                <div class="flex min-w-0 items-start gap-2">
                                    <i class="fa-solid fa-calendar-days mt-1 shrink-0 text-emerald-600"></i>

                                    <span class="break-words leading-5 text-slate-700">
                                        {{ $item->kegiatan->nama_kegiatan ?? 'Tidak ditemukan' }}
                                    </span>
                                </div>
                            </td>

                            {{-- Tanggal --}}
                            <td class="px-4 py-4 leading-5 text-slate-600">
                                @if ($item->tanggal)
                                    {{ \Illuminate\Support\Carbon::parse($item->tanggal)->locale('id')->translatedFormat('d M Y') }}
                                @else
                                    -
                                @endif
                            </td>

                            {{-- Waktu --}}
                            <td class="px-4 py-4 text-slate-600">
                                @if ($item->waktu_hadir)
                                    <span class="inline-flex items-center gap-1.5 whitespace-nowrap">
                                        <i class="fa-regular fa-clock text-emerald-600"></i>
                                        {{ \Illuminate\Support\Str::substr($item->waktu_hadir, 0, 5) }}
                                    </span>
                                @else
                                    -
                                @endif
                            </td>

                            {{-- Status --}}
                            <td class="px-4 py-4">
                                @if ($item->status === 'hadir')
                                    <span class="inline-flex items-center gap-1.5 whitespace-nowrap rounded-full bg-emerald-50 px-2.5 py-1.5 text-xs font-semibold text-emerald-700">
                                        <span class="h-1.5 w-1.5 rounded-full bg-emerald-500"></span>
                                        Hadir
                                    </span>

                                @elseif ($item->status === 'izin')
                                    <span class="inline-flex items-center gap-1.5 whitespace-nowrap rounded-full bg-amber-50 px-2.5 py-1.5 text-xs font-semibold text-amber-700">
                                        <span class="h-1.5 w-1.5 rounded-full bg-amber-500"></span>
                                        Izin
                                    </span>

                                @else
                                    <span class="inline-flex items-center gap-1.5 rounded-full bg-red-50 px-2.5 py-1.5 text-xs font-semibold text-red-700">
                                        <span class="h-1.5 w-1.5 shrink-0 rounded-full bg-red-500"></span>
                                        Tidak Hadir
                                    </span>
                                @endif
                            </td>

                            {{-- Keterangan --}}
                            <td class="px-4 py-4">
                                <p class="break-words leading-5 text-slate-600">
                                    {{ $item->keterangan ?: '-' }}
                                </p>
                            </td>

                            {{-- Aksi --}}
                            <td class="px-4 py-4">
                                <div class="flex items-center justify-center gap-2">

                                    <a
                                        href="{{ route('admin.absensi.edit', $item->id) }}"
                                        title="Edit absensi"
                                        aria-label="Edit absensi"
                                        class="flex h-9 w-9 shrink-0 items-center justify-center rounded-lg border border-amber-200 bg-amber-50 text-amber-700 transition hover:bg-amber-100"
                                    >
                                        <i class="fa-solid fa-pen-to-square"></i>
                                    </a>

                                    <form
                                        action="{{ route('admin.absensi.destroy', $item->id) }}"
                                        method="POST"
                                        class="m-0"
                                        onsubmit="return confirm('Yakin ingin menghapus data absensi ini?')"
                                    >
                                        @csrf
                                        @method('DELETE')

                                        <button
                                            type="submit"
                                            title="Hapus absensi"
                                            aria-label="Hapus absensi"
                                            class="flex h-9 w-9 shrink-0 items-center justify-center rounded-lg border border-red-200 bg-red-50 text-red-600 transition hover:bg-red-100"
                                        >
                                            <i class="fa-solid fa-trash"></i>
                                        </button>
                                    </form>

                                </div>
                            </td>
                        </tr>

                    @empty
                        <tr>
                            <td colspan="8" class="px-5 py-16 text-center">
                                <div class="mx-auto flex h-14 w-14 items-center justify-center rounded-2xl bg-slate-100 text-slate-400">
                                    <i class="fa-solid fa-clipboard-list text-2xl"></i>
                                </div>

                                <h3 class="mt-4 font-semibold text-slate-800">
                                    Belum Ada Data Absensi
                                </h3>

                                <p class="mt-1 text-sm text-slate-500">
                                    Silakan tambahkan data kehadiran jamaah.
                                </p>

                                <a
                                    href="{{ route('admin.absensi.create') }}"
                                    class="mt-4 inline-flex h-10 items-center justify-center gap-2 rounded-xl bg-emerald-600 px-4 text-sm font-semibold text-white transition hover:bg-emerald-700"
                                >
                                    <i class="fa-solid fa-plus"></i>
                                    Tambah Absensi
                                </a>
                            </td>
                        </tr>
                    @endforelse

                </tbody>
            </table>
        </div>

        {{-- Catatan Tabel --}}
        @if ($absensi->count() > 0)
            <div class="border-t border-slate-100 px-5 py-3 sm:px-6">
                <p class="text-xs text-slate-500">
                    <i class="fa-solid fa-circle-info mr-1"></i>
                    Geser tabel ke samping jika ada kolom yang belum terlihat.
                </p>
            </div>
        @endif

        {{-- Pagination hanya jika menggunakan paginator --}}
        @if ($absensi instanceof \Illuminate\Pagination\AbstractPaginator)
            <div class="border-t border-slate-100 px-5 py-4 sm:px-6">
                {{ $absensi->links() }}
            </div>
        @endif

    </div>
</div>
@endsection
