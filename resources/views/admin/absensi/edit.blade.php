
@extends('layouts.app')

@section('title', 'Edit Absensi Jamaah')

@section('content')
<div class="mx-auto w-full max-w-5xl space-y-6">

    {{-- Header Halaman --}}
    <div>
        <div class="mb-2 inline-flex items-center gap-2 rounded-full bg-emerald-50 px-3 py-1 text-sm font-semibold text-emerald-700">
            <i class="fa-solid fa-clipboard-check"></i>
            Kehadiran Jamaah NU
        </div>

        <h1 class="text-2xl font-bold tracking-tight text-slate-800 sm:text-3xl">
            Edit Absensi Jamaah
        </h1>

        <p class="mt-2 text-sm leading-6 text-slate-500">
            Perbarui informasi kehadiran jamaah dalam kegiatan NU Desa Paningkaban.
        </p>
    </div>

    {{-- Notifikasi Validasi --}}
    @if ($errors->any())
        <div class="rounded-xl border border-red-200 bg-red-50 p-4 text-sm text-red-700">
            <div class="flex items-center gap-2 font-semibold">
                <i class="fa-solid fa-circle-exclamation"></i>
                Periksa kembali data yang dimasukkan.
            </div>

            <ul class="mt-2 list-inside list-disc space-y-1">
                @foreach ($errors->all() as $error)
                    <li>{{ $error }}</li>
                @endforeach
            </ul>
        </div>
    @endif

    {{-- Kartu Form --}}
    <div class="overflow-hidden rounded-2xl border border-slate-200 bg-white shadow-sm">

        {{-- Header Kartu --}}
        <div class="border-b border-slate-100 bg-gradient-to-r from-emerald-50 to-white px-6 py-5 sm:px-8">
            <div class="flex items-center gap-3">
                <div class="flex h-11 w-11 shrink-0 items-center justify-center rounded-xl bg-emerald-100 text-emerald-700">
                    <i class="fa-solid fa-pen-to-square text-lg"></i>
                </div>

                <div>
                    <h2 class="text-lg font-bold text-slate-800">
                        Formulir Edit Absensi
                    </h2>
                    <p class="mt-1 text-sm text-slate-500">
                        Periksa kembali data sebelum menyimpan perubahan.
                    </p>
                </div>
            </div>
        </div>

        <form action="{{ route('admin.absensi.update', $absensi->id) }}" method="POST">
            @csrf
            @method('PUT')

            <div class="space-y-6 p-6 sm:p-8">

                {{-- Nama Jamaah dan Kegiatan --}}
                <div class="grid grid-cols-1 gap-6 md:grid-cols-2">

                    {{-- Nama Jamaah --}}
                    <div>
                        <label for="jamaah_id" class="mb-2 block text-sm font-semibold text-slate-700">
                            Nama Jamaah <span class="text-red-500">*</span>
                        </label>

                        <select
                            name="jamaah_id"
                            id="jamaah_id"
                            required
                            class="w-full rounded-xl border bg-white px-4 py-3 text-sm text-slate-700 outline-none transition focus:border-emerald-500 focus:ring-4 focus:ring-emerald-100 @error('jamaah_id') border-red-400 @else border-slate-200 @enderror"
                        >
                            <option value="">-- Pilih Jamaah --</option>

                            @foreach ($jamaah as $data)
                                <option
                                    value="{{ $data->id }}"
                                    @selected(old('jamaah_id', $absensi->jamaah_id) == $data->id)
                                >
                                    {{ $data->nama_lengkap }}
                                </option>
                            @endforeach
                        </select>

                        @error('jamaah_id')
                            <p class="mt-2 text-sm text-red-600">{{ $message }}</p>
                        @enderror

                        @if ($jamaah->isEmpty())
                            <p class="mt-2 text-xs text-amber-700">
                                <i class="fa-solid fa-circle-info mr-1"></i>
                                Data jamaah belum tersedia.
                            </p>
                        @endif
                    </div>

                    {{-- Kegiatan NU --}}
                    <div>
                        <label for="kegiatan_id" class="mb-2 block text-sm font-semibold text-slate-700">
                            Kegiatan NU <span class="text-red-500">*</span>
                        </label>

                        <select
                            name="kegiatan_id"
                            id="kegiatan_id"
                            required
                            class="w-full rounded-xl border bg-white px-4 py-3 text-sm text-slate-700 outline-none transition focus:border-emerald-500 focus:ring-4 focus:ring-emerald-100 @error('kegiatan_id') border-red-400 @else border-slate-200 @enderror"
                        >
                            <option value="">-- Pilih Kegiatan NU --</option>

                            @foreach ($kegiatan as $data)
                                <option
                                    value="{{ $data->id }}"
                                    @selected(old('kegiatan_id', $absensi->kegiatan_id) == $data->id)
                                >
                                    {{ $data->nama_kegiatan }} -
                                    {{ \Illuminate\Support\Carbon::parse($data->waktu_mulai)->locale('id')->translatedFormat('l, d F Y') }}
                                </option>
                            @endforeach
                        </select>

                        @error('kegiatan_id')
                            <p class="mt-2 text-sm text-red-600">{{ $message }}</p>
                        @enderror

                        @if ($kegiatan->isEmpty())
                            <p class="mt-2 text-xs text-amber-700">
                                Data kegiatan belum tersedia.
                            </p>
                        @endif
                    </div>

                </div>

                {{-- Tanggal dan Waktu --}}
                <div class="grid grid-cols-1 gap-6 md:grid-cols-2">

                    {{-- Tanggal Absensi --}}
                    <div>
                        <label for="tanggal" class="mb-2 block text-sm font-semibold text-slate-700">
                            Tanggal Absensi <span class="text-red-500">*</span>
                        </label>

                        <input
                            type="date"
                            name="tanggal"
                            id="tanggal"
                            value="{{ old('tanggal', $absensi->tanggal ? \Illuminate\Support\Carbon::parse($absensi->tanggal)->format('Y-m-d') : '') }}"
                            required
                            class="w-full rounded-xl border px-4 py-3 text-sm text-slate-700 outline-none transition focus:border-emerald-500 focus:ring-4 focus:ring-emerald-100 @error('tanggal') border-red-400 @else border-slate-200 @enderror"
                        >

                        @error('tanggal')
                            <p class="mt-2 text-sm text-red-600">{{ $message }}</p>
                        @enderror
                    </div>

                    {{-- Waktu Hadir --}}
                    <div>
                        <label for="waktu_hadir" class="mb-2 block text-sm font-semibold text-slate-700">
                            Waktu Hadir
                        </label>

                        <input
                            type="time"
                            name="waktu_hadir"
                            id="waktu_hadir"
                            value="{{ old('waktu_hadir', $absensi->waktu_hadir ? substr((string) $absensi->waktu_hadir, 0, 5) : '') }}"
                            class="w-full rounded-xl border px-4 py-3 text-sm text-slate-700 outline-none transition focus:border-emerald-500 focus:ring-4 focus:ring-emerald-100 @error('waktu_hadir') border-red-400 @else border-slate-200 @enderror"
                        >

                        <p class="mt-2 text-xs text-slate-500">
                            Kosongkan jika waktu kehadiran tidak diketahui.
                        </p>

                        @error('waktu_hadir')
                            <p class="mt-2 text-sm text-red-600">{{ $message }}</p>
                        @enderror
                    </div>

                </div>

                {{-- Status Kehadiran --}}
                <div>
                    <label for="status" class="mb-2 block text-sm font-semibold text-slate-700">
                        Status Kehadiran <span class="text-red-500">*</span>
                    </label>

                    <select
                        name="status"
                        id="status"
                        required
                        class="w-full rounded-xl border bg-white px-4 py-3 text-sm text-slate-700 outline-none transition focus:border-emerald-500 focus:ring-4 focus:ring-emerald-100 @error('status') border-red-400 @else border-slate-200 @enderror"
                    >
                        <option value="hadir" @selected(old('status', $absensi->status) === 'hadir')>
                            Hadir
                        </option>

                        <option value="izin" @selected(old('status', $absensi->status) === 'izin')>
                            Izin
                        </option>

                        <option value="tidak_hadir" @selected(old('status', $absensi->status) === 'tidak_hadir')>
                            Tidak Hadir
                        </option>
                    </select>

                    @error('status')
                        <p class="mt-2 text-sm text-red-600">{{ $message }}</p>
                    @enderror
                </div>

                {{-- Keterangan --}}
                <div>
                    <label for="keterangan" class="mb-2 block text-sm font-semibold text-slate-700">
                        Keterangan
                    </label>

                    <textarea
                        name="keterangan"
                        id="keterangan"
                        rows="4"
                        placeholder="Masukkan keterangan tambahan jika diperlukan..."
                        class="w-full resize-y rounded-xl border px-4 py-3 text-sm leading-6 text-slate-700 outline-none transition placeholder:text-slate-400 focus:border-emerald-500 focus:ring-4 focus:ring-emerald-100 @error('keterangan') border-red-400 @else border-slate-200 @enderror"
                    >{{ old('keterangan', $absensi->keterangan) }}</textarea>

                    @error('keterangan')
                        <p class="mt-2 text-sm text-red-600">{{ $message }}</p>
                    @enderror
                </div>

            </div>

            {{-- Tombol Aksi di Bagian Bawah --}}
            <div class="flex flex-col-reverse gap-3 border-t border-slate-100 bg-slate-50 px-6 py-5 sm:flex-row sm:justify-end sm:px-8">

                <a
                    href="{{ route('admin.absensi.index') }}"
                    class="inline-flex h-11 items-center justify-center gap-2 rounded-xl border border-slate-300 bg-white px-5 text-sm font-semibold text-slate-600 transition hover:bg-slate-100"
                >
                    <i class="fa-solid fa-arrow-left"></i>
                    Kembali
                </a>

                <button
                    type="submit"
                    @disabled($kegiatan->isEmpty() || $jamaah->isEmpty())
                    class="inline-flex h-11 items-center justify-center gap-2 rounded-xl bg-emerald-600 px-5 text-sm font-semibold text-white shadow-sm transition hover:bg-emerald-700 focus:outline-none focus:ring-4 focus:ring-emerald-100 disabled:cursor-not-allowed disabled:opacity-50"
                >
                    <i class="fa-solid fa-floppy-disk"></i>
                    Simpan Perubahan
                </button>

            </div>
        </form>
    </div>

</div>
@endsection
