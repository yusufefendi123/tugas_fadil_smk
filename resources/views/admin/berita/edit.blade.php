@extends('layouts.app')

@section('title', 'Edit Berita')

@section('content')

<div class="mb-8 flex flex-col sm:flex-row sm:items-center sm:justify-between gap-4">
    <div>
        <div class="inline-flex items-center space-x-2 px-3 py-1 bg-amber-500/10 border border-amber-500/20 rounded-full text-amber-700 text-xs font-bold tracking-wider uppercase mb-2">
            <i class="fa-solid fa-pen-to-square text-[10px]"></i>
            <span>Editor Konten</span>
        </div>
        <h1 class="text-2xl sm:text-3xl font-extrabold text-slate-800 tracking-tight">Edit Berita</h1>
        <p class="text-sm text-slate-500 mt-1">Perbarui informasi dan publikasi berita yang telah dipilih.</p>
    </div>

    <a href="{{ route('admin.berita.index') }}" 
       class="inline-flex items-center space-x-2 px-4 py-2 bg-slate-100 hover:bg-slate-200 text-slate-700 text-xs font-bold rounded-xl transition-all">
        <i class="fa-solid fa-arrow-left text-xs"></i>
        <span>Kembali ke Daftar</span>
    </a>
</div>

<div class="bg-white rounded-2xl border border-slate-100 shadow-xl shadow-slate-100/80 p-6 sm:p-8 max-w-4xl">
    <form action="{{ route('admin.berita.update', $berita->id) }}" 
          method="POST" 
          enctype="multipart/form-data" 
          class="space-y-6">
        @csrf
        @method('PUT')

        <!-- Judul Berita -->
        <div>
            <label for="judul" class="block text-xs font-extrabold uppercase tracking-wider text-slate-700 mb-2">
                Judul Berita <span class="text-rose-500">*</span>
            </label>
            <input 
                type="text" 
                name="judul" 
                id="judul" 
                value="{{ old('judul', $berita->judul) }}" 
                placeholder="Masukkan judul berita yang menarik"
                class="w-full bg-slate-50 border border-slate-200 rounded-xl px-4 py-3 text-xs text-slate-800 font-medium focus:bg-white focus:outline-none focus:ring-2 focus:ring-emerald-500/30 focus:border-emerald-500 transition-all @error('judul') border-rose-500 bg-rose-50/20 @enderror" 
                required
            >
            @error('judul')
                <p class="text-xs text-rose-500 font-semibold mt-1.5 flex items-center gap-1">
                    <i class="fa-solid fa-circle-exclamation text-[10px]"></i>
                    <span>{{ $message }}</span>
                </p>
            @enderror
        </div>

        <!-- Isi Berita -->
        <div>
            <label for="isi" class="block text-xs font-extrabold uppercase tracking-wider text-slate-700 mb-2">
                Isi Berita <span class="text-rose-500">*</span>
            </label>
            <textarea 
                name="isi" 
                id="isi" 
                rows="8" 
                placeholder="Tuliskan isi berita secara detail di sini..."
                class="w-full bg-slate-50 border border-slate-200 rounded-xl p-4 text-xs text-slate-800 font-medium leading-relaxed focus:bg-white focus:outline-none focus:ring-2 focus:ring-emerald-500/30 focus:border-emerald-500 transition-all @error('isi') border-rose-500 bg-rose-50/20 @enderror" 
                required>{{ old('isi', $berita->isi) }}</textarea>
            @error('isi')
                <p class="text-xs text-rose-500 font-semibold mt-1.5 flex items-center gap-1">
                    <i class="fa-solid fa-circle-exclamation text-[10px]"></i>
                    <span>{{ $message }}</span>
                </p>
            @enderror
        </div>

        <!-- Gambar Berita Section -->
        <div class="p-4 rounded-2xl bg-slate-50/80 border border-slate-200/80 space-y-4">
            <div>
                <label class="block text-xs font-extrabold uppercase tracking-wider text-slate-700 mb-2">
                    Gambar saat ini
                </label>
                @if ($berita->gambar)
                    <div class="relative w-48 h-32 rounded-xl overflow-hidden border border-slate-200 shadow-sm group">
                        <img src="{{ asset('storage/' . $berita->gambar) }}" 
                             alt="Gambar berita saat ini" 
                             class="w-full h-full object-cover">
                    </div>
                @else
                    <p class="text-xs font-medium text-slate-400">Belum ada gambar yang diunggah.</p>
                @endif
            </div>

            <div>
                <label for="gambar" class="block text-xs font-bold text-slate-700 mb-1">
                    Ganti Gambar (Opsional)
                </label>
                <input 
                    type="file" 
                    name="gambar" 
                    id="gambar" 
                    accept=".jpg,.jpeg,.png,.webp"
                    class="block w-full text-xs text-slate-500 file:mr-4 file:py-2.5 file:px-4 file:rounded-xl file:border-0 file:text-xs file:font-bold file:bg-emerald-50 file:text-emerald-700 hover:file:bg-emerald-100 transition-all cursor-pointer border border-slate-200 rounded-xl bg-white"
                >
                <p class="text-[11px] text-slate-400 mt-1.5">Format: JPG, JPEG, PNG, WEBP (Maksimal 2 MB).</p>
                @error('gambar')
                    <p class="text-xs text-rose-500 font-semibold mt-1.5 flex items-center gap-1">
                        <i class="fa-solid fa-circle-exclamation text-[10px]"></i>
                        <span>{{ $message }}</span>
                    </p>
                @enderror
            </div>
        </div>

        <!-- Status Berita -->
        <div>
            <label for="status" class="block text-xs font-extrabold uppercase tracking-wider text-slate-700 mb-2">
                Status Publikasi <span class="text-rose-500">*</span>
            </label>
            <select 
                name="status" 
                id="status" 
                class="w-full sm:w-64 bg-slate-50 border border-slate-200 rounded-xl px-4 py-2.5 text-xs text-slate-800 font-semibold focus:bg-white focus:outline-none focus:ring-2 focus:ring-emerald-500/30 focus:border-emerald-500 transition-all @error('status') border-rose-500 @enderror" 
                required
            >
                <option value="draft" {{ old('status', $berita->status) === 'draft' ? 'selected' : '' }}>
                    📝 Draft (Belum Dipublikasi)
                </option>
                <option value="terbit" {{ old('status', $berita->status) === 'terbit' ? 'selected' : '' }}>
                    ✅ Terbit (Dipublikasikan)
                </option>
            </select>
            @error('status')
                <p class="text-xs text-rose-500 font-semibold mt-1.5 flex items-center gap-1">
                    <i class="fa-solid fa-circle-exclamation text-[10px]"></i>
                    <span>{{ $message }}</span>
                </p>
            @enderror
        </div>

        <!-- Form Buttons -->
        <div class="pt-4 border-t border-slate-100 flex flex-wrap items-center gap-3">
            <button 
                type="submit" 
                class="inline-flex items-center space-x-2 px-5 py-2.5 bg-gradient-to-r from-emerald-600 to-green-600 hover:from-emerald-700 hover:to-green-700 text-white font-bold text-xs rounded-xl shadow-md shadow-emerald-600/20 transition-all active:scale-95"
            >
                <i class="fa-solid fa-floppy-disk text-xs"></i>
                <span>Simpan Perubahan</span>
            </button>

            <a href="{{ route('admin.berita.index') }}" 
               class="inline-flex items-center space-x-2 px-5 py-2.5 bg-slate-100 hover:bg-slate-200 text-slate-700 font-bold text-xs rounded-xl transition-all">
                <span>Batal</span>
            </a>
        </div>
    </form>
</div>

@endsection