@extends('layouts.app')

@section('title', 'Detail Berita')

@section('content')

<!-- Header Page -->
<div class="mb-8 flex flex-col sm:flex-row sm:items-center sm:justify-between gap-4">
    <div>
        <div class="inline-flex items-center space-x-2 px-3 py-1 bg-blue-500/10 border border-blue-500/20 rounded-full text-blue-700 text-xs font-bold tracking-wider uppercase mb-2">
            <i class="fa-solid fa-eye text-[10px]"></i>
            <span>Preview Berita</span>
        </div>
        <h1 class="text-2xl sm:text-3xl font-extrabold text-slate-800 tracking-tight">Detail Berita</h1>
        <p class="text-sm text-slate-500 mt-1">Informasi lengkap dan tampilan publikasi berita yang dipilih.</p>
    </div>

    <div class="flex items-center space-x-2">
        <a href="{{ route('admin.berita.index') }}" 
           class="inline-flex items-center space-x-2 px-4 py-2 bg-slate-100 hover:bg-slate-200 text-slate-700 text-xs font-bold rounded-xl transition-all">
            <i class="fa-solid fa-arrow-left text-xs"></i>
            <span>Kembali</span>
        </a>
    </div>
</div>

<!-- Main Detail Content Card -->
<div class="bg-white rounded-2xl border border-slate-100 shadow-xl shadow-slate-100/80 p-6 sm:p-8 max-w-4xl space-y-6">
    
    <!-- Status & Metadata Badges -->
    <div class="flex flex-wrap items-center gap-3">
        @if ($berita->status === 'terbit')
            <span class="inline-flex items-center gap-1.5 px-3 py-1 rounded-full text-xs font-extrabold bg-emerald-100 text-emerald-800 border border-emerald-200">
                <span class="w-2 h-2 rounded-full bg-emerald-500"></span>
                <span>Terbit</span>
            </span>
        @else
            <span class="inline-flex items-center gap-1.5 px-3 py-1 rounded-full text-xs font-extrabold bg-slate-100 text-slate-600 border border-slate-200">
                <span class="w-2 h-2 rounded-full bg-slate-400"></span>
                <span>Draft</span>
            </span>
        @endif

        <div class="flex items-center gap-1.5 text-xs font-semibold text-slate-500 bg-slate-50 px-3 py-1 rounded-full border border-slate-100">
            <i class="fa-regular fa-clock text-slate-400"></i>
            <span>Dibuat: {{ $berita->created_at?->format('d-m-Y H:i') }}</span>
        </div>
    </div>

    <!-- Title -->
    <h2 class="text-xl sm:text-2xl font-extrabold text-slate-800 leading-snug">
        {{ $berita->judul }}
    </h2>

    <!-- Featured Image -->
    @if ($berita->gambar)
        <div class="rounded-2xl overflow-hidden border border-slate-200/80 bg-slate-50 shadow-sm max-h-[420px] flex items-center justify-center">
            <img src="{{ asset('storage/' . $berita->gambar) }}" 
                 alt="Gambar {{ $berita->judul }}" 
                 class="w-full h-auto max-h-[420px] object-cover">
        </div>
    @endif

    <!-- Body Article Text -->
    <div class="text-sm text-slate-700 leading-relaxed font-normal whitespace-pre-line bg-slate-50/50 p-5 rounded-2xl border border-slate-100">
        {{ $berita->isi }}
    </div>

    <!-- Published Date Info -->
    @if ($berita->diterbitkan_pada)
        <div class="text-xs font-medium text-slate-400 flex items-center gap-2 pt-2">
            <i class="fa-regular fa-calendar-check text-emerald-600"></i>
            <span>Diterbitkan pada: {{ $berita->diterbitkan_pada->format('d-m-Y H:i') }}</span>
        </div>
    @endif

    <!-- Actions Bar -->
    <div class="pt-6 border-t border-slate-100 flex items-center justify-between gap-3">
        <a href="{{ route('admin.berita.edit', $berita->id) }}" 
           class="inline-flex items-center space-x-2 px-5 py-2.5 bg-amber-500 hover:bg-amber-600 text-white font-bold text-xs rounded-xl shadow-md shadow-amber-500/20 transition-all active:scale-95">
            <i class="fa-solid fa-pen-to-square text-xs"></i>
            <span>Edit Berita</span>
        </a>

        <a href="{{ route('admin.berita.index') }}" 
           class="inline-flex items-center space-x-2 px-4 py-2.5 bg-slate-100 hover:bg-slate-200 text-slate-700 font-bold text-xs rounded-xl transition-all">
            <span>Kembali ke Daftar</span>
        </a>
    </div>

</div>

@endsection