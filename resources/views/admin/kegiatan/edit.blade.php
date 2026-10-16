@extends('layouts.app')

@section('title', 'Edit Kegiatan')

@section('content')

<!-- Header Page -->
<div class="mb-8 flex flex-col sm:flex-row sm:items-center sm:justify-between gap-4">
    <div>
        <div class="inline-flex items-center space-x-2 px-3 py-1 bg-amber-500/10 border border-amber-500/20 rounded-full text-amber-700 text-xs font-bold tracking-wider uppercase mb-2">
            <i class="fa-solid fa-pen-to-square text-[10px]"></i>
            <span>Editor Kegiatan</span>
        </div>
        <h1 class="text-2xl sm:text-3xl font-extrabold text-slate-800 tracking-tight">Edit Kegiatan</h1>
        <p class="text-sm text-slate-500 mt-1">Perbarui informasi jadwal dan agenda kegiatan NU Desa Paningkaban.</p>
    </div>

    <a href="{{ route('admin.kegiatan.index') }}" 
       class="inline-flex items-center space-x-2 px-4 py-2 bg-slate-100 hover:bg-slate-200 text-slate-700 text-xs font-bold rounded-xl transition-all">
        <i class="fa-solid fa-arrow-left text-xs"></i>
        <span>Kembali ke Daftar</span>
    </a>
</div>

<!-- Form Card -->
<div class="bg-white rounded-2xl border border-slate-100 shadow-xl shadow-slate-100/80 p-6 sm:p-8 max-w-4xl">
    <form action="{{ route('admin.kegiatan.update', $kegiatan->id) }}" 
          method="POST" 
          class="space-y-6">
        @csrf
        @method('PUT')

        <!-- Nama Kegiatan -->
        <div>
            <label for="nama_kegiatan" class="block text-xs font-extrabold uppercase tracking-wider text-slate-700 mb-2">
                Nama Kegiatan <span class="text-rose-500">*</span>
            </label>
            <input 
                type="text" 
                name="nama_kegiatan" 
                id="nama_kegiatan" 
                value="{{ old('nama_kegiatan', $kegiatan->nama_kegiatan) }}" 
                placeholder="Contoh: Pengajian Rutin Selapanan"
                class="w-full bg-slate-50 border border-slate-200 rounded-xl px-4 py-3 text-xs text-slate-800 font-medium focus:bg-white focus:outline-none focus:ring-2 focus:ring-emerald-500/30 focus:border-emerald-500 transition-all @error('nama_kegiatan') border-rose-500 bg-rose-50/20 @enderror" 
                required
            >
            @error('nama_kegiatan')
                <p class="text-xs text-rose-500 font-semibold mt-1.5 flex items-center gap-1">
                    <i class="fa-solid fa-circle-exclamation text-[10px]"></i>
                    <span>{{ $message }}</span>
                </p>
            @enderror
        </div>

        <!-- Deskripsi -->
        <div>
            <label for="deskripsi" class="block text-xs font-extrabold uppercase tracking-wider text-slate-700 mb-2">
                Deskripsi Kegiatan
            </label>
            <textarea 
                name="deskripsi" 
                id="deskripsi" 
                rows="5" 
                placeholder="Tuliskan detail kegiatan di sini..."
                class="w-full bg-slate-50 border border-slate-200 rounded-xl p-4 text-xs text-slate-800 font-medium leading-relaxed focus:bg-white focus:outline-none focus:ring-2 focus:ring-emerald-500/30 focus:border-emerald-500 transition-all @error('deskripsi') border-rose-500 bg-rose-50/20 @enderror"
            >{{ old('deskripsi', $kegiatan->deskripsi) }}</textarea>
            @error('deskripsi')
                <p class="text-xs text-rose-500 font-semibold mt-1.5 flex items-center gap-1">
                    <i class="fa-solid fa-circle-exclamation text-[10px]"></i>
                    <span>{{ $message }}</span>
                </p>
            @enderror
        </div>

        <!-- Lokasi -->
        <div>
            <label for="lokasi" class="block text-xs font-extrabold uppercase tracking-wider text-slate-700 mb-2">
                Lokasi Kegiatan <span class="text-rose-500">*</span>
            </label>
            <input 
                type="text" 
                name="lokasi" 
                id="lokasi" 
                value="{{ old('lokasi', $kegiatan->lokasi) }}" 
                placeholder="Contoh: Masjid Al-Huda Paningkaban"
                class="w-full bg-slate-50 border border-slate-200 rounded-xl px-4 py-3 text-xs text-slate-800 font-medium focus:bg-white focus:outline-none focus:ring-2 focus:ring-emerald-500/30 focus:border-emerald-500 transition-all @error('lokasi') border-rose-500 bg-rose-50/20 @enderror" 
                required
            >
            @error('lokasi')
                <p class="text-xs text-rose-500 font-semibold mt-1.5 flex items-center gap-1">
                    <i class="fa-solid fa-circle-exclamation text-[10px]"></i>
                    <span>{{ $message }}</span>
                </p>
            @enderror
        </div>

        <!-- Waktu Mulai & Selesai -->
        <div class="grid grid-cols-1 sm:grid-cols-2 gap-4">
            <div>
                <label for="waktu_mulai" class="block text-xs font-extrabold uppercase tracking-wider text-slate-700 mb-2">
                    Waktu Mulai <span class="text-rose-500">*</span>
                </label>
                <input 
                    type="datetime-local" 
                    name="waktu_mulai" 
                    id="waktu_mulai" 
                    value="{{ old('waktu_mulai', $kegiatan->waktu_mulai?->format('Y-m-d\TH:i')) }}" 
                    class="w-full bg-slate-50 border border-slate-200 rounded-xl px-4 py-3 text-xs text-slate-800 font-medium focus:bg-white focus:outline-none focus:ring-2 focus:ring-emerald-500/30 focus:border-emerald-500 transition-all @error('waktu_mulai') border-rose-500 @enderror" 
                    required
                >
                @error('waktu_mulai')
                    <p class="text-xs text-rose-500 font-semibold mt-1.5 flex items-center gap-1">
                        <i class="fa-solid fa-circle-exclamation text-[10px]"></i>
                        <span>{{ $message }}</span>
                    </p>
                @enderror
            </div>

            <div>
                <label for="waktu_selesai" class="block text-xs font-extrabold uppercase tracking-wider text-slate-700 mb-2">
                    Waktu Selesai (Opsional)
                </label>
                <input 
                    type="datetime-local" 
                    name="waktu_selesai" 
                    id="waktu_selesai" 
                    value="{{ old('waktu_selesai', $kegiatan->waktu_selesai?->format('Y-m-d\TH:i')) }}" 
                    class="w-full bg-slate-50 border border-slate-200 rounded-xl px-4 py-3 text-xs text-slate-800 font-medium focus:bg-white focus:outline-none focus:ring-2 focus:ring-emerald-500/30 focus:border-emerald-500 transition-all @error('waktu_selesai') border-rose-500 @enderror"
                >
                @error('waktu_selesai')
                    <p class="text-xs text-rose-500 font-semibold mt-1.5 flex items-center gap-1">
                        <i class="fa-solid fa-circle-exclamation text-[10px]"></i>
                        <span>{{ $message }}</span>
                    </p>
                @enderror
            </div>
        </div>

        <!-- Status Kegiatan -->
        <div>
            <label for="status" class="block text-xs font-extrabold uppercase tracking-wider text-slate-700 mb-2">
                Status Kegiatan <span class="text-rose-500">*</span>
            </label>
            <select 
                name="status" 
                id="status" 
                class="w-full sm:w-64 bg-slate-50 border border-slate-200 rounded-xl px-4 py-2.5 text-xs text-slate-800 font-semibold focus:bg-white focus:outline-none focus:ring-2 focus:ring-emerald-500/30 focus:border-emerald-500 transition-all @error('status') border-rose-500 @enderror" 
                required
            >
                <option value="akan_datang" {{ old('status', $kegiatan->status) === 'akan_datang' ? 'selected' : '' }}>
                    🔵 Akan Datang
                </option>
                <option value="selesai" {{ old('status', $kegiatan->status) === 'selesai' ? 'selected' : '' }}>
                    🟢 Selesai
                </option>
            </select>
            @error('status')
                <p class="text-xs text-rose-500 font-semibold mt-1.5 flex items-center gap-1">
                    <i class="fa-solid fa-circle-exclamation text-[10px]"></i>
                    <span>{{ $message }}</span>
                </p>
            @enderror
        </div>

        <!-- Buttons -->
        <div class="pt-4 border-t border-slate-100 flex flex-wrap items-center gap-3">
            <button 
                type="submit" 
                class="inline-flex items-center space-x-2 px-5 py-2.5 bg-gradient-to-r from-emerald-600 to-green-600 hover:from-emerald-700 hover:to-green-700 text-white font-bold text-xs rounded-xl shadow-md shadow-emerald-600/20 transition-all active:scale-95"
            >
                <i class="fa-solid fa-floppy-disk text-xs"></i>
                <span>Simpan Perubahan</span>
            </button>

            <a href="{{ route('admin.kegiatan.index') }}" 
               class="inline-flex items-center space-x-2 px-5 py-2.5 bg-slate-100 hover:bg-slate-200 text-slate-700 font-bold text-xs rounded-xl transition-all">
                <span>Batal</span>
            </a>
        </div>
    </form>
</div>

@endsection