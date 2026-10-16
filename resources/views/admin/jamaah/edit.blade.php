
@extends('layouts.app')

@section('title', 'Edit Data Jamaah')

@section('content')
<div class="mx-auto max-w-5xl space-y-6">

    {{-- Header Halaman --}}
    <div>
        <div class="mb-2 inline-flex items-center gap-2 rounded-full bg-emerald-50 px-3 py-1 text-sm font-semibold text-emerald-700">
            <i class="fa-solid fa-users"></i>
            Data Jamaah NU
        </div>

        <h1 class="text-2xl font-bold tracking-tight text-slate-800 sm:text-3xl">
            Edit Data Jamaah
        </h1>

        <p class="mt-2 text-sm text-slate-500">
            Perbarui identitas jamaah dan pastikan informasi yang dimasukkan sudah benar.
        </p>
    </div>

    {{-- Notifikasi Error --}}
    @if ($errors->any())
        <div class="flex gap-3 rounded-xl border border-red-200 bg-red-50 p-4 text-red-700">
            <i class="fa-solid fa-circle-exclamation mt-1"></i>
            <div>
                <p class="font-semibold">Data belum dapat diperbarui.</p>
                <ul class="mt-1 list-inside list-disc text-sm">
                    @foreach ($errors->all() as $error)
                        <li>{{ $error }}</li>
                    @endforeach
                </ul>
            </div>
        </div>
    @endif

    {{-- Form Edit Jamaah --}}
    <div class="overflow-hidden rounded-2xl border border-slate-200 bg-white shadow-sm">

        <div class="border-b border-slate-100 bg-gradient-to-r from-emerald-50 to-white px-6 py-5 sm:px-8">
            <div class="flex items-center gap-3">
                <div class="flex h-11 w-11 items-center justify-center rounded-xl bg-emerald-100 text-emerald-700">
                    <i class="fa-solid fa-user-pen text-lg"></i>
                </div>

                <div>
                    <h2 class="text-lg font-bold text-slate-800">
                        Formulir Identitas Jamaah
                    </h2>
                    <p class="mt-1 text-sm text-slate-500">
                        Periksa kembali data sebelum menyimpan perubahan.
                    </p>
                </div>
            </div>
        </div>

        <form action="{{ route('admin.jamaah.update', $jamaah->id) }}" method="POST">
            @csrf
            @method('PUT')

            <div class="space-y-6 p-6 sm:p-8">

                {{-- NIK --}}
                <div>
                    <label for="nik" class="mb-2 block text-sm font-semibold text-slate-700">
                        NIK <span class="text-red-500">*</span>
                    </label>

                    <input
                        type="text"
                        name="nik"
                        id="nik"
                        value="{{ old('nik', $jamaah->nik) }}"
                        inputmode="numeric"
                        maxlength="16"
                        pattern="[0-9]{16}"
                        placeholder="Masukkan 16 digit NIK"
                        required
                        class="w-full rounded-xl border px-4 py-3 text-sm text-slate-700 outline-none transition placeholder:text-slate-400 focus:border-emerald-500 focus:ring-4 focus:ring-emerald-100 @error('nik') border-red-400 @else border-slate-200 @enderror"
                    >

                    <p class="mt-2 text-xs text-slate-500">
                        <i class="fa-solid fa-circle-info mr-1"></i>
                        NIK harus terdiri dari 16 digit angka.
                    </p>

                    @error('nik')
                        <p class="mt-2 text-sm text-red-600">{{ $message }}</p>
                    @enderror
                </div>

                {{-- Nama Lengkap --}}
                <div>
                    <label for="nama_lengkap" class="mb-2 block text-sm font-semibold text-slate-700">
                        Nama Lengkap <span class="text-red-500">*</span>
                    </label>

                    <input
                        type="text"
                        name="nama_lengkap"
                        id="nama_lengkap"
                        value="{{ old('nama_lengkap', $jamaah->nama_lengkap) }}"
                        placeholder="Masukkan nama lengkap jamaah"
                        required
                        class="w-full rounded-xl border px-4 py-3 text-sm text-slate-700 outline-none transition placeholder:text-slate-400 focus:border-emerald-500 focus:ring-4 focus:ring-emerald-100 @error('nama_lengkap') border-red-400 @else border-slate-200 @enderror"
                    >

                    @error('nama_lengkap')
                        <p class="mt-2 text-sm text-red-600">{{ $message }}</p>
                    @enderror
                </div>

                {{-- Tempat dan Tanggal Lahir --}}
                <div class="grid grid-cols-1 gap-6 md:grid-cols-2">

                    <div>
                        <label for="tempat_lahir" class="mb-2 block text-sm font-semibold text-slate-700">
                            Tempat Lahir <span class="text-red-500">*</span>
                        </label>

                        <input
                            type="text"
                            name="tempat_lahir"
                            id="tempat_lahir"
                            value="{{ old('tempat_lahir', $jamaah->tempat_lahir) }}"
                            placeholder="Contoh: Banyumas"
                            required
                            class="w-full rounded-xl border px-4 py-3 text-sm text-slate-700 outline-none transition placeholder:text-slate-400 focus:border-emerald-500 focus:ring-4 focus:ring-emerald-100 @error('tempat_lahir') border-red-400 @else border-slate-200 @enderror"
                        >

                        @error('tempat_lahir')
                            <p class="mt-2 text-sm text-red-600">{{ $message }}</p>
                        @enderror
                    </div>

                    <div>
                        <label for="tanggal_lahir" class="mb-2 block text-sm font-semibold text-slate-700">
                            Tanggal Lahir <span class="text-red-500">*</span>
                        </label>

                        <input
                            type="date"
                            name="tanggal_lahir"
                            id="tanggal_lahir"
                            value="{{ old('tanggal_lahir', $jamaah->tanggal_lahir ? \Illuminate\Support\Carbon::parse($jamaah->tanggal_lahir)->format('Y-m-d') : '') }}"
                            max="{{ date('Y-m-d') }}"
                            required
                            class="w-full rounded-xl border px-4 py-3 text-sm text-slate-700 outline-none transition focus:border-emerald-500 focus:ring-4 focus:ring-emerald-100 @error('tanggal_lahir') border-red-400 @else border-slate-200 @enderror"
                        >

                        @error('tanggal_lahir')
                            <p class="mt-2 text-sm text-red-600">{{ $message }}</p>
                        @enderror
                    </div>

                </div>

                {{-- Jenis Kelamin --}}
                <div>
                    <label for="jenis_kelamin" class="mb-2 block text-sm font-semibold text-slate-700">
                        Jenis Kelamin <span class="text-red-500">*</span>
                    </label>

                    <select
                        name="jenis_kelamin"
                        id="jenis_kelamin"
                        required
                        class="w-full rounded-xl border bg-white px-4 py-3 text-sm text-slate-700 outline-none transition focus:border-emerald-500 focus:ring-4 focus:ring-emerald-100 @error('jenis_kelamin') border-red-400 @else border-slate-200 @enderror"
                    >
                        <option value="">-- Pilih Jenis Kelamin --</option>

                        <option value="Laki-laki" @selected(old('jenis_kelamin', $jamaah->jenis_kelamin) === 'Laki-laki')>
                            Laki-laki
                        </option>

                        <option value="Perempuan" @selected(old('jenis_kelamin', $jamaah->jenis_kelamin) === 'Perempuan')>
                            Perempuan
                        </option>
                    </select>

                    @error('jenis_kelamin')
                        <p class="mt-2 text-sm text-red-600">{{ $message }}</p>
                    @enderror
                </div>

            </div>

            {{-- Tombol Aksi di Bagian Bawah --}}
            <div class="flex flex-col-reverse gap-3 border-t border-slate-100 bg-slate-50 px-6 py-5 sm:flex-row sm:justify-end sm:px-8">

                <a
                    href="{{ route('admin.jamaah.index') }}"
                    class="inline-flex h-11 items-center justify-center gap-2 rounded-xl border border-slate-300 bg-white px-5 text-sm font-semibold text-slate-600 transition hover:bg-slate-100"
                >
                    <i class="fa-solid fa-arrow-left"></i>
                    Kembali
                </a>

                <button
                    type="submit"
                    class="inline-flex h-11 items-center justify-center gap-2 rounded-xl bg-emerald-600 px-5 text-sm font-semibold text-white shadow-sm transition hover:bg-emerald-700 focus:outline-none focus:ring-4 focus:ring-emerald-100"
                >
                    <i class="fa-solid fa-floppy-disk"></i>
                    Simpan Perubahan
                </button>

            </div>
        </form>
    </div>

</div>
@endsection
