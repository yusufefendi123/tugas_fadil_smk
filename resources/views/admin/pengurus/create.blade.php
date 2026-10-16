
@extends('layouts.app')

@section('title', 'Tambah Pengurus')

@section('content')

<!-- Header Halaman -->
<div class="mb-8 flex flex-col sm:flex-row sm:items-center sm:justify-between gap-4">
    <div>
        <div class="inline-flex items-center space-x-2 px-3 py-1 bg-emerald-500/10 border border-emerald-500/20 rounded-full text-emerald-700 text-xs font-bold tracking-wider uppercase mb-2">
            <i class="fa-solid fa-users-gear text-[10px]"></i>
            <span>Organisasi NU</span>
        </div>

        <h1 class="text-2xl sm:text-3xl font-extrabold text-slate-800 tracking-tight">
            Tambah Pengurus
        </h1>

        <p class="text-sm text-slate-500 mt-1">
            Masukkan informasi pengurus NU Desa Paningkaban ke dalam sistem.
        </p>
    </div>

    <div>
        <a href="{{ route('admin.pengurus.index') }}"
           class="inline-flex items-center justify-center gap-2 px-4 py-2.5 bg-white hover:bg-slate-50 text-slate-600 border border-slate-200 font-bold text-xs rounded-xl shadow-sm transition-all active:scale-95">
            <i class="fa-solid fa-arrow-left text-xs"></i>
            <span>Kembali ke Data Pengurus</span>
        </a>
    </div>
</div>

<!-- Notifikasi Kesalahan -->
@if ($errors->any())
    <div class="mb-6 p-4 bg-rose-50 border border-rose-200 text-rose-800 rounded-2xl text-xs font-medium shadow-sm">
        <div class="flex items-center gap-2 font-bold text-rose-900 mb-2">
            <i class="fa-solid fa-triangle-exclamation"></i>
            <span>Terjadi Kesalahan</span>
        </div>

        <ul class="list-disc list-inside space-y-1 pl-1 text-rose-700">
            @foreach ($errors->all() as $error)
                <li>{{ $error }}</li>
            @endforeach
        </ul>
    </div>
@endif

<!-- Form Tambah Pengurus -->
<div class="bg-white rounded-2xl border border-slate-100 shadow-xl shadow-slate-100/80 overflow-hidden">

    <!-- Judul Form -->
    <div class="px-5 sm:px-7 py-5 border-b border-slate-100 flex items-center gap-3">
        <div class="w-11 h-11 rounded-xl bg-emerald-50 text-emerald-600 flex items-center justify-center">
            <i class="fa-solid fa-user-plus text-lg"></i>
        </div>

        <div>
            <h2 class="text-sm font-extrabold text-slate-800">
                Formulir Pengurus
            </h2>
            <p class="text-xs text-slate-400 mt-1">
                Lengkapi informasi pada kolom berikut.
            </p>
        </div>
    </div>

    <form action="{{ route('admin.pengurus.store') }}"
          method="POST"
          enctype="multipart/form-data">

        @csrf

        <div class="p-5 sm:p-7">

            <div class="grid grid-cols-1 md:grid-cols-2 gap-x-6 gap-y-5">

                <!-- Nama Pengurus -->
                <div>
                    <label for="nama" class="block text-xs font-bold text-slate-700 mb-2">
                        Nama Pengurus
                        <span class="text-rose-500">*</span>
                    </label>

                    <div class="relative">
                        <div class="absolute inset-y-0 left-0 pl-3.5 flex items-center pointer-events-none text-slate-400">
                            <i class="fa-solid fa-user text-sm"></i>
                        </div>

                        <input
                            type="text"
                            id="nama"
                            name="nama"
                            value="{{ old('nama') }}"
                            placeholder="Masukkan nama lengkap"
                            required
                            maxlength="255"
                            autocomplete="name"
                            class="w-full pl-10 pr-4 py-3 bg-slate-50 border border-slate-200 rounded-xl text-sm text-slate-700 placeholder:text-slate-400 outline-none transition-all focus:bg-white focus:border-emerald-500 focus:ring-4 focus:ring-emerald-500/10 @error('nama') border-rose-400 @enderror">
                    </div>

                    @error('nama')
                        <p class="mt-1.5 text-xs text-rose-600">{{ $message }}</p>
                    @enderror
                </div>

                <!-- Jabatan -->
                <div>
                    <label for="jabatan" class="block text-xs font-bold text-slate-700 mb-2">
                        Jabatan
                        <span class="text-rose-500">*</span>
                    </label>

                    <div class="relative">
                        <div class="absolute inset-y-0 left-0 pl-3.5 flex items-center pointer-events-none text-slate-400">
                            <i class="fa-solid fa-briefcase text-sm"></i>
                        </div>

                        <input
                            type="text"
                            id="jabatan"
                            name="jabatan"
                            value="{{ old('jabatan') }}"
                            placeholder="Contoh: Ketua, Sekretaris, Bendahara"
                            required
                            maxlength="255"
                            class="w-full pl-10 pr-4 py-3 bg-slate-50 border border-slate-200 rounded-xl text-sm text-slate-700 placeholder:text-slate-400 outline-none transition-all focus:bg-white focus:border-emerald-500 focus:ring-4 focus:ring-emerald-500/10 @error('jabatan') border-rose-400 @enderror">
                    </div>

                    @error('jabatan')
                        <p class="mt-1.5 text-xs text-rose-600">{{ $message }}</p>
                    @enderror
                </div>

                <!-- Periode Kepengurusan -->
                <div>
                    <label for="periode" class="block text-xs font-bold text-slate-700 mb-2">
                        Periode Kepengurusan
                    </label>

                    <div class="relative">
                        <div class="absolute inset-y-0 left-0 pl-3.5 flex items-center pointer-events-none text-slate-400">
                            <i class="fa-regular fa-calendar text-sm"></i>
                        </div>

                        <input
                            type="text"
                            id="periode"
                            name="periode"
                            value="{{ old('periode') }}"
                            placeholder="Contoh: 2025–2030"
                            maxlength="255"
                            class="w-full pl-10 pr-4 py-3 bg-slate-50 border border-slate-200 rounded-xl text-sm text-slate-700 placeholder:text-slate-400 outline-none transition-all focus:bg-white focus:border-emerald-500 focus:ring-4 focus:ring-emerald-500/10 @error('periode') border-rose-400 @enderror">
                    </div>

                    @error('periode')
                        <p class="mt-1.5 text-xs text-rose-600">{{ $message }}</p>
                    @enderror
                </div>

                <!-- Urutan -->
                <div>
                    <label for="urutan" class="block text-xs font-bold text-slate-700 mb-2">
                        Urutan dalam Struktur
                        <span class="text-rose-500">*</span>
                    </label>

                    <div class="relative">
                        <div class="absolute inset-y-0 left-0 pl-3.5 flex items-center pointer-events-none text-slate-400">
                            <i class="fa-solid fa-arrow-down-1-9 text-sm"></i>
                        </div>

                        <input
                            type="number"
                            id="urutan"
                            name="urutan"
                            value="{{ old('urutan', 0) }}"
                            min="0"
                            required
                            class="w-full pl-10 pr-4 py-3 bg-slate-50 border border-slate-200 rounded-xl text-sm text-slate-700 outline-none transition-all focus:bg-white focus:border-emerald-500 focus:ring-4 focus:ring-emerald-500/10 @error('urutan') border-rose-400 @enderror">
                    </div>

                    <p class="text-[11px] text-slate-400 mt-2">
                        <i class="fa-solid fa-circle-info mr-1"></i>
                        Angka lebih kecil ditampilkan lebih dahulu.
                    </p>

                    @error('urutan')
                        <p class="mt-1.5 text-xs text-rose-600">{{ $message }}</p>
                    @enderror
                </div>

                <!-- Foto Pengurus -->
                <div class="md:col-span-2">
                    <label for="foto" class="block text-xs font-bold text-slate-700 mb-2">
                        Foto Pengurus
                        <span class="text-slate-400 font-medium">(Opsional)</span>
                    </label>

                    <div class="p-4 border border-dashed border-slate-300 rounded-xl bg-slate-50 hover:border-emerald-400 transition-colors">
                        <div class="flex flex-col sm:flex-row sm:items-center gap-4">

                            <div class="w-14 h-14 rounded-xl bg-white border border-slate-200 flex items-center justify-center text-slate-400 shrink-0">
                                <i class="fa-solid fa-image text-2xl"></i>
                            </div>

                            <div class="flex-1">
                                <input
                                    type="file"
                                    id="foto"
                                    name="foto"
                                    accept=".jpg,.jpeg,.png,.webp,image/jpeg,image/png,image/webp"
                                    class="block w-full text-xs text-slate-600 file:mr-3 file:px-4 file:py-2 file:rounded-lg file:border-0 file:bg-emerald-100 file:text-emerald-700 file:font-bold hover:file:bg-emerald-200 file:cursor-pointer">

                                <p class="text-[11px] text-slate-400 mt-2">
                                    Format JPG, JPEG, PNG, atau WEBP. Ukuran maksimal 2 MB.
                                </p>
                            </div>
                        </div>
                    </div>

                    @error('foto')
                        <p class="mt-1.5 text-xs text-rose-600">{{ $message }}</p>
                    @enderror
                </div>

                <!-- Keterangan -->
                <div class="md:col-span-2">
                    <label for="keterangan" class="block text-xs font-bold text-slate-700 mb-2">
                        Keterangan
                        <span class="text-slate-400 font-medium">(Opsional)</span>
                    </label>

                    <div class="relative">
                        <div class="absolute top-3.5 left-3.5 text-slate-400">
                            <i class="fa-regular fa-clipboard text-sm"></i>
                        </div>

                        <textarea
                            id="keterangan"
                            name="keterangan"
                            rows="4"
                            placeholder="Masukkan informasi tambahan tentang pengurus"
                            class="w-full pl-10 pr-4 py-3 bg-slate-50 border border-slate-200 rounded-xl text-sm text-slate-700 placeholder:text-slate-400 outline-none transition-all focus:bg-white focus:border-emerald-500 focus:ring-4 focus:ring-emerald-500/10 resize-y @error('keterangan') border-rose-400 @enderror">{{ old('keterangan') }}</textarea>
                    </div>

                    @error('keterangan')
                        <p class="mt-1.5 text-xs text-rose-600">{{ $message }}</p>
                    @enderror
                </div>

            </div>
        </div>

        <!-- Tombol Form -->
        <div class="px-5 sm:px-7 py-4 bg-slate-50/70 border-t border-slate-100 flex flex-col-reverse sm:flex-row sm:justify-end gap-3">

            <a href="{{ route('admin.pengurus.index') }}"
               class="inline-flex items-center justify-center gap-2 px-5 py-3 bg-white hover:bg-slate-100 text-slate-600 border border-slate-200 font-bold text-xs rounded-xl transition-all">
                <i class="fa-solid fa-arrow-left text-xs"></i>
                <span>Kembali</span>
            </a>

            <button type="submit"
                    class="inline-flex items-center justify-center gap-2 px-5 py-3 bg-gradient-to-r from-emerald-600 to-green-600 hover:from-emerald-700 hover:to-green-700 text-white font-bold text-xs rounded-xl shadow-md shadow-emerald-600/20 transition-all active:scale-95">
                <i class="fa-solid fa-floppy-disk text-xs"></i>
                <span>Simpan Pengurus</span>
            </button>

        </div>
    </form>
</div>

@endsection
