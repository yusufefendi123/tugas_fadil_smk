
@extends('layouts.app')

@section('title', 'Edit Pengumuman')

@section('content')
<div class="min-h-screen bg-slate-50/70 px-4 py-6 sm:px-6 lg:px-8">
    <div class="mx-auto max-w-5xl">

        {{-- Header Halaman --}}
        <div class="mb-8 flex flex-col gap-4 sm:flex-row sm:items-center sm:justify-between">
            <div>
                <div class="mb-3 inline-flex items-center gap-2 rounded-full border border-emerald-100 bg-emerald-50 px-3 py-1.5 text-xs font-semibold text-emerald-700">
                    <i class="fa-solid fa-bullhorn"></i>
                    Informasi NU
                </div>

                <h1 class="text-2xl font-bold tracking-tight text-slate-800 sm:text-3xl">
                    Edit Pengumuman
                </h1>

                <p class="mt-2 max-w-2xl text-sm leading-6 text-slate-500">
                    Perbarui informasi, status, dan tanggal terbit pengumuman agar informasi tetap akurat.
                </p>
            </div>

            <div class="flex h-12 w-12 shrink-0 items-center justify-center rounded-2xl bg-emerald-100 text-xl text-emerald-700">
                <i class="fa-solid fa-pen-to-square"></i>
            </div>
        </div>

        {{-- Notifikasi Error --}}
        @if ($errors->any())
            <div class="mb-6 rounded-xl border border-red-200 bg-red-50 p-4 text-sm text-red-700">
                <div class="mb-2 flex items-center gap-2 font-semibold">
                    <i class="fa-solid fa-circle-exclamation"></i>
                    Periksa kembali data yang dimasukkan.
                </div>

                <ul class="list-inside list-disc space-y-1">
                    @foreach ($errors->all() as $error)
                        <li>{{ $error }}</li>
                    @endforeach
                </ul>
            </div>
        @endif

        {{-- Form Edit --}}
        <div class="overflow-hidden rounded-2xl border border-slate-200 bg-white shadow-sm">
            <div class="h-1.5 bg-gradient-to-r from-emerald-500 via-green-500 to-emerald-300"></div>

            <div class="border-b border-slate-100 px-5 py-5 sm:px-8">
                <div class="flex items-start gap-3">
                    <div class="flex h-10 w-10 shrink-0 items-center justify-center rounded-xl bg-emerald-50 text-emerald-600">
                        <i class="fa-solid fa-file-pen"></i>
                    </div>

                    <div>
                        <h2 class="text-lg font-bold text-slate-800">
                            Formulir Pengumuman
                        </h2>
                        <p class="mt-1 text-sm text-slate-500">
                            Ubah bagian yang diperlukan, kemudian simpan perubahan.
                        </p>
                    </div>
                </div>
            </div>

            <form action="{{ route('admin.pengumuman.update', $pengumuman->id) }}"
                  method="POST">
                @csrf
                @method('PUT')

                <div class="space-y-6 px-5 py-6 sm:px-8">

                    {{-- Judul --}}
                    <div>
                        <label for="judul" class="mb-2 block text-sm font-semibold text-slate-700">
                            Judul Pengumuman
                            <span class="text-red-500">*</span>
                        </label>

                        <input type="text"
                               name="judul"
                               id="judul"
                               value="{{ old('judul', $pengumuman->judul) }}"
                               placeholder="Masukkan judul pengumuman"
                               required
                               class="w-full rounded-xl border border-slate-300 bg-white px-4 py-3 text-sm text-slate-700 outline-none transition placeholder:text-slate-400 focus:border-emerald-500 focus:ring-4 focus:ring-emerald-500/10 @error('judul') border-red-400 focus:border-red-500 focus:ring-red-500/10 @enderror">

                        @error('judul')
                            <p class="mt-2 flex items-center gap-1.5 text-sm text-red-600">
                                <i class="fa-solid fa-circle-exclamation"></i>
                                {{ $message }}
                            </p>
                        @enderror
                    </div>

                    {{-- Isi Pengumuman --}}
                    <div>
                        <label for="isi" class="mb-2 block text-sm font-semibold text-slate-700">
                            Isi Pengumuman
                            <span class="text-red-500">*</span>
                        </label>

                        <textarea name="isi"
                                  id="isi"
                                  rows="8"
                                  required
                                  placeholder="Tuliskan isi pengumuman secara lengkap..."
                                  class="w-full resize-y rounded-xl border border-slate-300 bg-white px-4 py-3 text-sm leading-6 text-slate-700 outline-none transition placeholder:text-slate-400 focus:border-emerald-500 focus:ring-4 focus:ring-emerald-500/10 @error('isi') border-red-400 focus:border-red-500 focus:ring-red-500/10 @enderror">{{ old('isi', $pengumuman->isi) }}</textarea>

                        @error('isi')
                            <p class="mt-2 flex items-center gap-1.5 text-sm text-red-600">
                                <i class="fa-solid fa-circle-exclamation"></i>
                                {{ $message }}
                            </p>
                        @enderror
                    </div>

                    {{-- Status dan Tanggal Terbit --}}
                    <div class="grid grid-cols-1 gap-6 md:grid-cols-2">

                        <div>
                            <label for="status" class="mb-2 block text-sm font-semibold text-slate-700">
                                Status Pengumuman
                                <span class="text-red-500">*</span>
                            </label>

                            <div class="relative">
                                <select name="status"
                                        id="status"
                                        required
                                        class="w-full appearance-none rounded-xl border border-slate-300 bg-white px-4 py-3 pr-10 text-sm text-slate-700 outline-none transition focus:border-emerald-500 focus:ring-4 focus:ring-emerald-500/10 @error('status') border-red-400 @enderror">
                                    <option value="draft" @selected(old('status', $pengumuman->status) === 'draft')>
                                        Draft
                                    </option>

                                    <option value="terbit" @selected(old('status', $pengumuman->status) === 'terbit')>
                                        Terbit
                                    </option>
                                </select>

                                <i class="fa-solid fa-chevron-down pointer-events-none absolute right-4 top-1/2 -translate-y-1/2 text-xs text-slate-400"></i>
                            </div>

                            @error('status')
                                <p class="mt-2 text-sm text-red-600">{{ $message }}</p>
                            @enderror

                            <p class="mt-2 text-xs leading-5 text-slate-500">
                                <i class="fa-solid fa-circle-info mr-1"></i>
                                Draft belum ditampilkan sebagai pengumuman terbit.
                            </p>
                        </div>

                        <div>
                            <label for="diterbitkan_pada" class="mb-2 block text-sm font-semibold text-slate-700">
                                Tanggal dan Waktu Terbit
                            </label>

                            <input type="datetime-local"
                                   name="diterbitkan_pada"
                                   id="diterbitkan_pada"
                                   value="{{ old('diterbitkan_pada', $pengumuman->diterbitkan_pada ? $pengumuman->diterbitkan_pada->format('Y-m-d\TH:i') : '') }}"
                                   class="w-full rounded-xl border border-slate-300 bg-white px-4 py-3 text-sm text-slate-700 outline-none transition focus:border-emerald-500 focus:ring-4 focus:ring-emerald-500/10 @error('diterbitkan_pada') border-red-400 focus:border-red-500 focus:ring-red-500/10 @enderror">

                            @error('diterbitkan_pada')
                                <p class="mt-2 text-sm text-red-600">{{ $message }}</p>
                            @enderror

                            <p class="mt-2 text-xs leading-5 text-slate-500">
                                <i class="fa-regular fa-calendar mr-1"></i>
                                Tanggal terbit digunakan ketika status pengumuman adalah Terbit.
                            </p>
                        </div>
                    </div>
                </div>

                {{-- Tombol Aksi di Bagian Bawah --}}
                <div class="flex flex-col-reverse gap-3 border-t border-slate-100 bg-slate-50/70 px-5 py-5 sm:flex-row sm:items-center sm:justify-between sm:px-8">
                    <a href="{{ route('admin.pengumuman.index') }}"
                       class="inline-flex h-11 items-center justify-center gap-2 rounded-xl border border-slate-300 bg-white px-5 text-sm font-semibold text-slate-600 transition hover:bg-slate-100">
                        <i class="fa-solid fa-arrow-left"></i>
                        Kembali
                    </a>

                    <button type="submit"
                            class="inline-flex h-11 items-center justify-center gap-2 rounded-xl bg-emerald-600 px-5 text-sm font-semibold text-white shadow-sm transition hover:bg-emerald-700 focus:outline-none focus:ring-4 focus:ring-emerald-500/20">
                        <i class="fa-solid fa-floppy-disk"></i>
                        Simpan Perubahan
                    </button>
                </div>
            </form>
        </div>

        {{-- Catatan --}}
        <div class="mt-5 flex items-start gap-3 rounded-xl border border-amber-200 bg-amber-50 p-4">
            <i class="fa-solid fa-lightbulb mt-0.5 text-amber-600"></i>
            <p class="text-sm leading-6 text-amber-800">
                <span class="font-semibold">Catatan:</span>
                Pastikan judul dan isi pengumuman sudah benar sebelum menyimpan perubahan.
            </p>
        </div>

    </div>
</div>
@endsection
