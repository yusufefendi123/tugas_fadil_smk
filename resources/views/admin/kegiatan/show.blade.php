@extends('layouts.app')

@section('title', 'Detail Kegiatan')

@section('content')

<!-- Header Page -->
<div class="mb-8 flex flex-col sm:flex-row sm:items-center sm:justify-between gap-4">
    <div>
        <div class="inline-flex items-center space-x-2 px-3 py-1 bg-blue-500/10 border border-blue-500/20 rounded-full text-blue-700 text-xs font-bold tracking-wider uppercase mb-2">
            <i class="fa-solid fa-eye text-[10px]"></i>
            <span>Preview Kegiatan</span>
        </div>
        <h1 class="text-2xl sm:text-3xl font-extrabold text-slate-800 tracking-tight">Detail Kegiatan</h1>
        <p class="text-sm text-slate-500 mt-1">Informasi lengkap agenda dan jadwal kegiatan NU Desa Paningkaban.</p>
    </div>

    <div class="flex items-center space-x-2">
        <a href="{{ route('admin.kegiatan.index') }}" 
           class="inline-flex items-center space-x-2 px-4 py-2 bg-slate-100 hover:bg-slate-200 text-slate-700 text-xs font-bold rounded-xl transition-all">
            <i class="fa-solid fa-arrow-left text-xs"></i>
            <span>Kembali</span>
        </a>
    </div>
</div>

<!-- Main Detail Content Card -->
<div class="bg-white rounded-2xl border border-slate-100 shadow-xl shadow-slate-100/80 p-6 sm:p-8 max-w-4xl space-y-6">
    
    <!-- Status & Date Badges -->
    <div class="flex flex-wrap items-center gap-3">
        @if ($kegiatan->status === 'akan_datang')
            <span class="inline-flex items-center gap-1.5 px-3 py-1 rounded-full text-xs font-extrabold bg-blue-100 text-blue-800 border border-blue-200">
                <span class="w-2 h-2 rounded-full bg-blue-500"></span>
                <span>Akan Datang</span>
            </span>
        @else
            <span class="inline-flex items-center gap-1.5 px-3 py-1 rounded-full text-xs font-extrabold bg-emerald-100 text-emerald-800 border border-emerald-200">
                <span class="w-2 h-2 rounded-full bg-emerald-500"></span>
                <span>Selesai</span>
            </span>
        @endif

        <div class="flex items-center gap-1.5 text-xs font-semibold text-slate-500 bg-slate-50 px-3 py-1 rounded-full border border-slate-100">
            <i class="fa-regular fa-clock text-slate-400"></i>
            <span>Dibuat: {{ $kegiatan->created_at?->format('d-m-Y H:i') }}</span>
        </div>
    </div>

    <!-- Title -->
    <h2 class="text-xl sm:text-2xl font-extrabold text-slate-800 leading-snug">
        {{ $kegiatan->nama_kegiatan }}
    </h2>

    <!-- Location & Time Info Grid -->
    <div class="grid grid-cols-1 sm:grid-cols-2 gap-4 p-4 rounded-2xl bg-slate-50 border border-slate-100 text-xs font-medium text-slate-700">
        <div class="flex items-center space-x-3">
            <div class="w-9 h-9 rounded-xl bg-emerald-50 border border-emerald-200 flex items-center justify-center text-emerald-600 shrink-0">
                <i class="fa-solid fa-location-dot"></i>
            </div>
            <div>
                <p class="text-[10px] font-extrabold uppercase text-slate-400">Lokasi</p>
                <p class="font-bold text-slate-800 mt-0.5">{{ $kegiatan->lokasi }}</p>
            </div>
        </div>

        <div class="flex items-center space-x-3">
            <div class="w-9 h-9 rounded-xl bg-blue-50 border border-blue-200 flex items-center justify-center text-blue-600 shrink-0">
                <i class="fa-regular fa-calendar-days"></i>
            </div>
            <div>
                <p class="text-[10px] font-extrabold uppercase text-slate-400">Waktu Mulai</p>
                <p class="font-bold text-slate-800 mt-0.5">{{ $kegiatan->waktu_mulai?->format('d-m-Y H:i') }}</p>
            </div>
        </div>

        @if ($kegiatan->waktu_selesai)
            <div class="flex items-center space-x-3 sm:col-span-2 pt-2 border-t border-slate-200/60">
                <div class="w-9 h-9 rounded-xl bg-purple-50 border border-purple-200 flex items-center justify-center text-purple-600 shrink-0">
                    <i class="fa-regular fa-calendar-check"></i>
                </div>
                <div>
                    <p class="text-[10px] font-extrabold uppercase text-slate-400">Waktu Selesai</p>
                    <p class="font-bold text-slate-800 mt-0.5">{{ $kegiatan->waktu_selesai?->format('d-m-Y H:i') }}</p>
                </div>
            </div>
        @endif
    </div>

    <!-- Description -->
    <div>
        <h4 class="text-xs font-extrabold uppercase tracking-wider text-slate-400 mb-2">Deskripsi Kegiatan</h4>
        <div class="text-sm text-slate-700 leading-relaxed font-normal whitespace-pre-line bg-slate-50/50 p-5 rounded-2xl border border-slate-100">
            {{ $kegiatan->deskripsi ?: 'Tidak ada deskripsi rinci untuk kegiatan ini.' }}
        </div>
    </div>

    <!-- Actions Bar -->
    <div class="pt-6 border-t border-slate-100 flex items-center justify-between gap-3">
        <a href="{{ route('admin.kegiatan.edit', $kegiatan->id) }}" 
           class="inline-flex items-center space-x-2 px-5 py-2.5 bg-amber-500 hover:bg-amber-600 text-white font-bold text-xs rounded-xl shadow-md shadow-amber-500/20 transition-all active:scale-95">
            <i class="fa-solid fa-pen-to-square text-xs"></i>
            <span>Edit Kegiatan</span>
        </a>

        <a href="{{ route('admin.kegiatan.index') }}" 
           class="inline-flex items-center space-x-2 px-4 py-2.5 bg-slate-100 hover:bg-slate-200 text-slate-700 font-bold text-xs rounded-xl transition-all">
            <span>Kembali ke Daftar</span>
        </a>
    </div>

</div>

@endsection