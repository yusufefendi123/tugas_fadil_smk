
@extends('layouts.app')

@section('title', 'Tambah Pengguna')

@section('content')
<div class="mx-auto w-full max-w-5xl space-y-6">

    {{-- Header halaman --}}
    <div>
        <div class="mb-2 flex items-center gap-2 text-sm text-slate-500">
            <i class="fa-solid fa-house"></i>
            <span>/</span>
            <span>Admin</span>
            <span>/</span>
            <a href="{{ route('admin.pengguna.index') }}"
               class="transition hover:text-emerald-700">
                Manajemen Pengguna
            </a>
            <span>/</span>
            <span class="font-medium text-emerald-700">Tambah Pengguna</span>
        </div>

        <h1 class="text-2xl font-bold tracking-tight text-slate-800 sm:text-3xl">
            Tambah Pengguna
        </h1>

        <p class="mt-2 text-sm text-slate-500">
            Tambahkan akun pengguna untuk mengakses website NU Desa Paningkaban.
        </p>
    </div>

    {{-- Pesan kesalahan --}}
    @if ($errors->any())
        <div class="rounded-xl border border-red-200 bg-red-50 p-4">
            <div class="flex items-center gap-2 font-semibold text-red-700">
                <i class="fa-solid fa-circle-exclamation"></i>
                Periksa kembali data yang dimasukkan.
            </div>

            <ul class="mt-2 list-inside list-disc space-y-1 text-sm text-red-600">
                @foreach ($errors->all() as $error)
                    <li>{{ $error }}</li>
                @endforeach
            </ul>
        </div>
    @endif

    {{-- Form tambah pengguna --}}
    <div class="overflow-hidden rounded-2xl border border-slate-200 bg-white shadow-sm">

        <div class="flex items-center gap-3 border-b border-slate-100 px-5 py-5 sm:px-6">
            <div class="flex h-11 w-11 items-center justify-center rounded-xl bg-emerald-100 text-emerald-700">
                <i class="fa-solid fa-user-plus text-lg"></i>
            </div>

            <div>
                <h2 class="text-lg font-bold text-slate-800">
                    Form Pengguna Baru
                </h2>
                <p class="mt-1 text-sm text-slate-500">
                    Lengkapi informasi akun pada kolom berikut.
                </p>
            </div>
        </div>

        <form action="{{ route('admin.pengguna.store') }}" method="POST">
            @csrf

            <div class="space-y-5 p-5 sm:p-6">

                {{-- Nama --}}
                <div>
                    <label for="nama" class="mb-2 block text-sm font-semibold text-slate-700">
                        Nama Pengguna
                        <span class="text-red-500">*</span>
                    </label>

                    <div class="relative">
                        <div class="pointer-events-none absolute inset-y-0 left-0 flex items-center pl-3.5 text-slate-400">
                            <i class="fa-solid fa-user"></i>
                        </div>

                        <input type="text"
                               name="nama"
                               id="nama"
                               value="{{ old('nama') }}"
                               placeholder="Masukkan nama pengguna"
                               autocomplete="name"
                               required
                               class="w-full rounded-xl border border-slate-300 bg-white py-3 pl-10 pr-4 text-sm text-slate-700 outline-none transition placeholder:text-slate-400 focus:border-emerald-500 focus:ring-4 focus:ring-emerald-500/10 @error('nama') border-red-400 @enderror">
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
                               value="{{ old('email') }}"
                               placeholder="contoh@email.com"
                               autocomplete="email"
                               required
                               class="w-full rounded-xl border border-slate-300 bg-white py-3 pl-10 pr-4 text-sm text-slate-700 outline-none transition placeholder:text-slate-400 focus:border-emerald-500 focus:ring-4 focus:ring-emerald-500/10 @error('email') border-red-400 @enderror">
                    </div>

                    @error('email')
                        <p class="mt-1.5 text-sm text-red-600">{{ $message }}</p>
                    @enderror
                </div>

                {{-- Kata sandi --}}
                <div class="grid grid-cols-1 gap-5 md:grid-cols-2">

                    <div>
                        <label for="password" class="mb-2 block text-sm font-semibold text-slate-700">
                            Kata Sandi
                            <span class="text-red-500">*</span>
                        </label>

                        <div class="relative">
                            <div class="pointer-events-none absolute inset-y-0 left-0 flex items-center pl-3.5 text-slate-400">
                                <i class="fa-solid fa-lock"></i>
                            </div>

                            <input type="password"
                                   name="password"
                                   id="password"
                                   minlength="8"
                                   autocomplete="new-password"
                                   placeholder="Minimal 8 karakter"
                                   required
                                   class="w-full rounded-xl border border-slate-300 bg-white py-3 pl-10 pr-4 text-sm text-slate-700 outline-none transition placeholder:text-slate-400 focus:border-emerald-500 focus:ring-4 focus:ring-emerald-500/10 @error('password') border-red-400 @enderror">
                        </div>

                        <p class="mt-1.5 text-xs text-slate-500">
                            Gunakan kata sandi minimal 8 karakter.
                        </p>

                        @error('password')
                            <p class="mt-1.5 text-sm text-red-600">{{ $message }}</p>
                        @enderror
                    </div>

                    {{-- Konfirmasi kata sandi --}}
                    <div>
                        <label for="password_confirmation" class="mb-2 block text-sm font-semibold text-slate-700">
                            Konfirmasi Kata Sandi
                            <span class="text-red-500">*</span>
                        </label>

                        <div class="relative">
                            <div class="pointer-events-none absolute inset-y-0 left-0 flex items-center pl-3.5 text-slate-400">
                                <i class="fa-solid fa-shield-halved"></i>
                            </div>

                            <input type="password"
                                   name="password_confirmation"
                                   id="password_confirmation"
                                   minlength="8"
                                   autocomplete="new-password"
                                   placeholder="Ulangi kata sandi"
                                   required
                                   class="w-full rounded-xl border border-slate-300 bg-white py-3 pl-10 pr-4 text-sm text-slate-700 outline-none transition placeholder:text-slate-400 focus:border-emerald-500 focus:ring-4 focus:ring-emerald-500/10">
                        </div>

                        <p class="mt-1.5 text-xs text-slate-500">
                            Masukkan kembali kata sandi yang sama.
                        </p>
                    </div>

                </div>
            </div>

            {{-- Tombol aksi --}}
            <div class="flex flex-col-reverse gap-3 border-t border-slate-100 bg-slate-50/70 px-5 py-4 sm:flex-row sm:justify-end sm:px-6">

                <a href="{{ route('admin.pengguna.index') }}"
                   class="inline-flex items-center justify-center gap-2 rounded-xl border border-slate-300 bg-white px-5 py-3 text-sm font-semibold text-slate-600 transition hover:bg-slate-100">
                    <i class="fa-solid fa-arrow-left"></i>
                    Kembali
                </a>

                <button type="submit"
                        class="inline-flex items-center justify-center gap-2 rounded-xl bg-emerald-600 px-5 py-3 text-sm font-semibold text-white shadow-sm transition hover:bg-emerald-700">
                    <i class="fa-solid fa-floppy-disk"></i>
                    Simpan Pengguna
                </button>

            </div>
        </form>
    </div>

    <p class="text-xs text-slate-500">
        <span class="text-red-500">*</span>
        Kolom wajib diisi.
    </p>

</div>
@endsection
