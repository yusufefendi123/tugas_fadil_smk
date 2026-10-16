
@extends('layouts.app')

@section('title', 'Profil Pengguna')

@section('content')
<div class="mx-auto w-full max-w-7xl space-y-6">

    {{-- Header halaman --}}
    <div>
        <div class="mb-2 flex flex-wrap items-center gap-2 text-sm text-slate-500">
            <i class="fa-solid fa-house"></i>
            <span>/</span>
            <span>Admin</span>
            <span>/</span>
            <span class="font-medium text-emerald-700">Profil Pengguna</span>
        </div>

        <h1 class="text-2xl font-bold tracking-tight text-slate-800 sm:text-3xl">
            Profil Pengguna
        </h1>

        <p class="mt-2 text-sm text-slate-500">
            Kelola informasi akun dan kata sandi Anda.
        </p>
    </div>

    {{-- Notifikasi berhasil --}}
    @if (session('success'))
        <div class="flex items-start gap-3 rounded-xl border border-emerald-200 bg-emerald-50 p-4 text-sm text-emerald-800">
            <i class="fa-solid fa-circle-check mt-0.5 text-lg"></i>
            <div>{{ session('success') }}</div>
        </div>
    @endif

    {{-- Notifikasi kesalahan --}}
    @if ($errors->any())
        <div class="rounded-xl border border-red-200 bg-red-50 p-4">
            <div class="flex items-center gap-2 font-semibold text-red-700">
                <i class="fa-solid fa-circle-exclamation"></i>
                Terdapat kesalahan pada data yang dimasukkan.
            </div>

            <ul class="mt-2 list-inside list-disc space-y-1 text-sm text-red-600">
                @foreach ($errors->all() as $error)
                    <li>{{ $error }}</li>
                @endforeach
            </ul>
        </div>
    @endif

    <div class="grid grid-cols-1 items-start gap-6 lg:grid-cols-5">

        {{-- Informasi Profil --}}
        <div class="overflow-hidden rounded-2xl border border-slate-200 bg-white shadow-sm lg:col-span-3">

            <div class="flex items-center gap-3 border-b border-slate-100 px-5 py-5 sm:px-6">
                <div class="flex h-11 w-11 items-center justify-center rounded-xl bg-emerald-100 text-emerald-700">
                    <i class="fa-solid fa-user-circle text-xl"></i>
                </div>

                <div>
                    <h2 class="text-lg font-bold text-slate-800">
                        Informasi Profil
                    </h2>
                    <p class="mt-1 text-sm text-slate-500">
                        Perbarui identitas akun Anda.
                    </p>
                </div>
            </div>

            <div class="p-5 sm:p-6">

                {{-- Identitas pengguna --}}
                <div class="mb-6 flex flex-col items-center rounded-xl border border-slate-100 bg-slate-50/70 px-4 py-6 text-center">
                    <div class="flex h-20 w-20 items-center justify-center rounded-2xl bg-emerald-600 text-white shadow-sm">
                        <i class="fa-solid fa-user text-3xl"></i>
                    </div>

                    <h3 class="mt-4 text-lg font-bold text-slate-800">
                        {{ $pengguna->nama }}
                    </h3>

                    <p class="mt-1 break-all text-sm text-slate-500">
                        <i class="fa-solid fa-envelope mr-1"></i>
                        {{ $pengguna->email }}
                    </p>
                </div>

                <form action="{{ route('admin.profil.update') }}" method="POST">
                    @csrf
                    @method('PUT')

                    <div class="space-y-5">

                        {{-- Nama lengkap --}}
                        <div>
                            <label for="nama" class="mb-2 block text-sm font-semibold text-slate-700">
                                Nama Lengkap
                                <span class="text-red-500">*</span>
                            </label>

                            <div class="relative">
                                <div class="pointer-events-none absolute inset-y-0 left-0 flex items-center pl-3.5 text-slate-400">
                                    <i class="fa-solid fa-user"></i>
                                </div>

                                <input type="text"
                                       name="nama"
                                       id="nama"
                                       value="{{ old('nama', $pengguna->nama) }}"
                                       maxlength="255"
                                       autocomplete="name"
                                       required
                                       class="w-full rounded-xl border border-slate-300 bg-white py-3 pl-10 pr-4 text-sm text-slate-700 outline-none transition focus:border-emerald-500 focus:ring-4 focus:ring-emerald-500/10 @error('nama') border-red-400 @enderror">
                            </div>

                            @error('nama')
                                <p class="mt-1.5 text-sm text-red-600">{{ $message }}</p>
                            @enderror
                        </div>

                        {{-- Email --}}
                        <div>
                            <label for="email" class="mb-2 block text-sm font-semibold text-slate-700">
                                Email
                                <span class="text-red-500">*</span>
                            </label>

                            <div class="relative">
                                <div class="pointer-events-none absolute inset-y-0 left-0 flex items-center pl-3.5 text-slate-400">
                                    <i class="fa-solid fa-envelope"></i>
                                </div>

                                <input type="email"
                                       name="email"
                                       id="email"
                                       value="{{ old('email', $pengguna->email) }}"
                                       maxlength="255"
                                       autocomplete="email"
                                       required
                                       class="w-full rounded-xl border border-slate-300 bg-white py-3 pl-10 pr-4 text-sm text-slate-700 outline-none transition focus:border-emerald-500 focus:ring-4 focus:ring-emerald-500/10 @error('email') border-red-400 @enderror">
                            </div>

                            @error('email')
                                <p class="mt-1.5 text-sm text-red-600">{{ $message }}</p>
                            @enderror
                        </div>

                        {{-- Tanggal akun dibuat --}}
                        <div>
                            <label for="created_at" class="mb-2 block text-sm font-semibold text-slate-700">
                                Tanggal Akun Dibuat
                            </label>

                            <div class="relative">
                                <div class="pointer-events-none absolute inset-y-0 left-0 flex items-center pl-3.5 text-slate-400">
                                    <i class="fa-regular fa-calendar"></i>
                                </div>

                                <input type="text"
                                       id="created_at"
                                       value="{{ $pengguna->created_at?->format('d-m-Y') ?? '-' }}"
                                       readonly
                                       class="w-full cursor-not-allowed rounded-xl border border-slate-200 bg-slate-100 py-3 pl-10 pr-4 text-sm text-slate-500 outline-none">
                            </div>
                        </div>

                    </div>

                    {{-- Tombol aksi profil --}}
                    <div class="mt-6 flex flex-col-reverse gap-3 border-t border-slate-100 pt-5 sm:flex-row sm:justify-end">

                        <a href="{{ route('admin.dashboard') }}"
                           class="inline-flex items-center justify-center gap-2 rounded-xl border border-slate-300 bg-white px-5 py-3 text-sm font-semibold text-slate-600 transition hover:bg-slate-100">
                            <i class="fa-solid fa-arrow-left"></i>
                            Kembali
                        </a>

                        <button type="submit"
                                class="inline-flex items-center justify-center gap-2 rounded-xl bg-emerald-600 px-5 py-3 text-sm font-semibold text-white shadow-sm transition hover:bg-emerald-700">
                            <i class="fa-solid fa-floppy-disk"></i>
                            Simpan Perubahan
                        </button>

                    </div>
                </form>
            </div>
        </div>

        {{-- Ubah Password --}}
        <div class="overflow-hidden rounded-2xl border border-slate-200 bg-white shadow-sm lg:col-span-2">

            <div class="flex items-center gap-3 border-b border-slate-100 px-5 py-5 sm:px-6">
                <div class="flex h-11 w-11 items-center justify-center rounded-xl bg-amber-100 text-amber-700">
                    <i class="fa-solid fa-shield-halved text-lg"></i>
                </div>

                <div>
                    <h2 class="text-lg font-bold text-slate-800">
                        Ubah Password
                    </h2>
                    <p class="mt-1 text-sm text-slate-500">
                        Perbarui keamanan akun Anda.
                    </p>
                </div>
            </div>

            <div class="p-5 sm:p-6">

                <div class="mb-5 flex items-start gap-3 rounded-xl border border-amber-100 bg-amber-50 p-4">
                    <i class="fa-solid fa-circle-info mt-0.5 text-amber-600"></i>
                    <p class="text-sm leading-6 text-amber-800">
                        Masukkan password lama untuk memverifikasi identitas sebelum mengganti password.
                    </p>
                </div>

                <form action="{{ route('admin.profil.password') }}" method="POST">
                    @csrf
                    @method('PUT')

                    <div class="space-y-5">

                        {{-- Password lama --}}
                        <div>
                            <label for="password_lama" class="mb-2 block text-sm font-semibold text-slate-700">
                                Password Lama
                                <span class="text-red-500">*</span>
                            </label>

                            <div class="relative">
                                <div class="pointer-events-none absolute inset-y-0 left-0 flex items-center pl-3.5 text-slate-400">
                                    <i class="fa-solid fa-lock"></i>
                                </div>

                                <input type="password"
                                       name="password_lama"
                                       id="password_lama"
                                       autocomplete="current-password"
                                       required
                                       class="w-full rounded-xl border border-slate-300 bg-white py-3 pl-10 pr-4 text-sm text-slate-700 outline-none transition focus:border-emerald-500 focus:ring-4 focus:ring-emerald-500/10 @error('password_lama') border-red-400 @enderror">
                            </div>

                            @error('password_lama')
                                <p class="mt-1.5 text-sm text-red-600">{{ $message }}</p>
                            @enderror
                        </div>

                        {{-- Password baru --}}
                        <div>
                            <label for="password_baru" class="mb-2 block text-sm font-semibold text-slate-700">
                                Password Baru
                                <span class="text-red-500">*</span>
                            </label>

                            <div class="relative">
                                <div class="pointer-events-none absolute inset-y-0 left-0 flex items-center pl-3.5 text-slate-400">
                                    <i class="fa-solid fa-key"></i>
                                </div>

                                <input type="password"
                                       name="password_baru"
                                       id="password_baru"
                                       minlength="8"
                                       autocomplete="new-password"
                                       required
                                       class="w-full rounded-xl border border-slate-300 bg-white py-3 pl-10 pr-4 text-sm text-slate-700 outline-none transition focus:border-emerald-500 focus:ring-4 focus:ring-emerald-500/10 @error('password_baru') border-red-400 @enderror">
                            </div>

                            <p class="mt-1.5 text-xs text-slate-500">
                                Minimal 8 karakter.
                            </p>

                            @error('password_baru')
                                <p class="mt-1.5 text-sm text-red-600">{{ $message }}</p>
                            @enderror
                        </div>

                        {{-- Konfirmasi password baru --}}
                        <div>
                            <label for="password_baru_confirmation" class="mb-2 block text-sm font-semibold text-slate-700">
                                Konfirmasi Password Baru
                                <span class="text-red-500">*</span>
                            </label>

                            <div class="relative">
                                <div class="pointer-events-none absolute inset-y-0 left-0 flex items-center pl-3.5 text-slate-400">
                                    <i class="fa-solid fa-shield-halved"></i>
                                </div>

                                <input type="password"
                                       name="password_baru_confirmation"
                                       id="password_baru_confirmation"
                                       minlength="8"
                                       autocomplete="new-password"
                                       required
                                       class="w-full rounded-xl border border-slate-300 bg-white py-3 pl-10 pr-4 text-sm text-slate-700 outline-none transition focus:border-emerald-500 focus:ring-4 focus:ring-emerald-500/10">
                            </div>
                        </div>

                    </div>

                    {{-- Tombol ubah password --}}
                    <div class="mt-6 border-t border-slate-100 pt-5">
                        <button type="submit"
                                class="inline-flex w-full items-center justify-center gap-2 rounded-xl bg-emerald-600 px-5 py-3 text-sm font-semibold text-white shadow-sm transition hover:bg-emerald-700">
                            <i class="fa-solid fa-key"></i>
                            Ubah Password
                        </button>
                    </div>
                </form>
            </div>
        </div>

    </div>

    <p class="text-xs text-slate-500">
        <span class="text-red-500">*</span>
        Kolom bertanda bintang wajib diisi.
    </p>

</div>
@endsection
