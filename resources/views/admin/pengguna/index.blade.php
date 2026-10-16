
@extends('layouts.app')

@section('title', 'Manajemen Pengguna')

@section('content')
<div class="mx-auto w-full max-w-7xl space-y-6">

    {{-- Header halaman --}}
    <div class="flex flex-col gap-4 sm:flex-row sm:items-center sm:justify-between">
        <div>
            <div class="mb-2 flex items-center gap-2 text-sm text-slate-500">
                <i class="fa-solid fa-house"></i>
                <span>/</span>
                <span>Admin</span>
                <span>/</span>
                <span class="font-medium text-emerald-700">Manajemen Pengguna</span>
            </div>

            <h1 class="text-2xl font-bold tracking-tight text-slate-800 sm:text-3xl">
                Manajemen Pengguna
            </h1>

            <p class="mt-2 text-sm text-slate-500">
                Kelola akun pengguna yang memiliki akses ke website NU.
            </p>
        </div>

        <a href="{{ route('admin.pengguna.create') }}"
           class="inline-flex items-center justify-center gap-2 rounded-xl bg-emerald-600 px-5 py-3 text-sm font-semibold text-white shadow-sm transition hover:bg-emerald-700">
            <i class="fa-solid fa-user-plus"></i>
            Tambah Pengguna
        </a>
    </div>

    {{-- Notifikasi --}}
    @if (session('success'))
        <div class="flex items-start gap-3 rounded-xl border border-emerald-200 bg-emerald-50 p-4 text-sm text-emerald-800">
            <i class="fa-solid fa-circle-check mt-0.5 text-lg"></i>
            <div>{{ session('success') }}</div>
        </div>
    @endif

    @if (session('error'))
        <div class="flex items-start gap-3 rounded-xl border border-red-200 bg-red-50 p-4 text-sm text-red-700">
            <i class="fa-solid fa-circle-exclamation mt-0.5 text-lg"></i>
            <div>{{ session('error') }}</div>
        </div>
    @endif

    {{-- Tabel pengguna --}}
    <div class="overflow-hidden rounded-2xl border border-slate-200 bg-white shadow-sm">

        <div class="flex flex-col gap-2 border-b border-slate-100 px-5 py-5 sm:flex-row sm:items-center sm:justify-between sm:px-6">
            <div>
                <h2 class="text-lg font-bold text-slate-800">
                    Daftar Pengguna
                </h2>
                <p class="mt-1 text-sm text-slate-500">
                    Daftar akun yang terdaftar pada website.
                </p>
            </div>

            <div class="inline-flex w-fit items-center gap-2 rounded-lg bg-emerald-50 px-3 py-2 text-sm font-medium text-emerald-700">
                <i class="fa-solid fa-users"></i>
                {{ $pengguna->count() }} pengguna
            </div>
        </div>

        <div class="overflow-x-auto">
            <table class="w-full min-w-[800px] table-fixed text-left text-sm">
                <colgroup>
                    <col class="w-16">
                    <col class="w-[24%]">
                    <col class="w-[30%]">
                    <col class="w-[20%]">
                    <col class="w-[220px]">
                </colgroup>

                <thead class="bg-slate-50 text-xs uppercase tracking-wider text-slate-500">
                    <tr>
                        <th class="px-5 py-4 font-semibold">No.</th>
                        <th class="px-5 py-4 font-semibold">Nama</th>
                        <th class="px-5 py-4 font-semibold">Email</th>
                        <th class="px-5 py-4 font-semibold">Tanggal Dibuat</th>
                        <th class="px-5 py-4 text-center font-semibold">Aksi</th>
                    </tr>
                </thead>

                <tbody class="divide-y divide-slate-100">
                    @forelse ($pengguna as $data)
                        <tr class="transition hover:bg-slate-50/70">
                            <td class="px-5 py-4 text-slate-500">
                                {{ $loop->iteration }}
                            </td>

                            <td class="px-5 py-4">
                                <div class="flex min-w-0 items-center gap-3">
                                    <div class="flex h-10 w-10 shrink-0 items-center justify-center rounded-xl bg-emerald-100 text-emerald-700">
                                        <i class="fa-solid fa-user"></i>
                                    </div>

                                    <span class="truncate font-semibold text-slate-800">
                                        {{ $data->nama }}
                                    </span>
                                </div>
                            </td>

                            <td class="break-words px-5 py-4 text-slate-600">
                                {{ $data->email }}
                            </td>

                            <td class="px-5 py-4 text-slate-600">
                                <div class="flex items-center gap-2">
                                    <i class="fa-regular fa-calendar text-slate-400"></i>
                                    <span>
                                        {{ $data->created_at?->format('d-m-Y') ?? '-' }}
                                    </span>
                                </div>
                            </td>

                            <td class="px-5 py-4">
                                <div class="flex items-center justify-center gap-2">
                                    <a href="{{ route('admin.pengguna.edit', $data->id) }}"
                                       class="inline-flex items-center gap-2 rounded-lg border border-amber-200 bg-amber-50 px-3 py-2 text-xs font-semibold text-amber-700 transition hover:bg-amber-100"
                                       title="Edit pengguna">
                                        <i class="fa-solid fa-pen-to-square"></i>
                                        Edit
                                    </a>

                                    @if ($data->id != auth()->id())
                                        <form action="{{ route('admin.pengguna.destroy', $data->id) }}"
                                              method="POST"
                                              onsubmit="return confirm('Yakin ingin menghapus pengguna ini?')">
                                            @csrf
                                            @method('DELETE')

                                            <button type="submit"
                                                    class="inline-flex items-center gap-2 rounded-lg border border-red-200 bg-red-50 px-3 py-2 text-xs font-semibold text-red-700 transition hover:bg-red-100"
                                                    title="Hapus pengguna">
                                                <i class="fa-solid fa-trash"></i>
                                                Hapus
                                            </button>
                                        </form>
                                    @else
                                        <span class="inline-flex items-center gap-1 rounded-lg bg-slate-100 px-3 py-2 text-xs font-medium text-slate-500">
                                            <i class="fa-solid fa-user-shield"></i>
                                            Akun Anda
                                        </span>
                                    @endif
                                </div>
                            </td>
                        </tr>
                    @empty
                        <tr>
                            <td colspan="5" class="px-6 py-14 text-center">
                                <div class="mx-auto flex h-14 w-14 items-center justify-center rounded-2xl bg-slate-100 text-slate-400">
                                    <i class="fa-solid fa-users text-2xl"></i>
                                </div>

                                <h3 class="mt-4 font-semibold text-slate-700">
                                    Belum Ada Pengguna
                                </h3>

                                <p class="mt-1 text-sm text-slate-500">
                                    Tambahkan akun pengguna untuk mulai mengelola akses website.
                                </p>

                                <a href="{{ route('admin.pengguna.create') }}"
                                   class="mt-4 inline-flex items-center gap-2 rounded-lg bg-emerald-600 px-4 py-2.5 text-sm font-semibold text-white transition hover:bg-emerald-700">
                                    <i class="fa-solid fa-user-plus"></i>
                                    Tambah Pengguna
                                </a>
                            </td>
                        </tr>
                    @endforelse
                </tbody>
            </table>
        </div>

        {{-- Footer tabel --}}
        @if ($pengguna->count() > 0)
            <div class="border-t border-slate-100 bg-slate-50/70 px-5 py-3 text-xs text-slate-500 sm:px-6">
                Menampilkan {{ $pengguna->count() }} data pengguna.
            </div>
        @endif

    </div>

</div>
@endsection
