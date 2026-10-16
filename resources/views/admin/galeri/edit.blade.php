
@extends('layouts.app')

@section('title', 'Edit Foto Galeri')

@section('content')
<div class="space-y-6">

    {{-- Header halaman --}}
    <div>
        <div class="inline-flex items-center gap-2 rounded-lg bg-emerald-50 px-3 py-1.5 text-sm font-medium text-emerald-700">
            <i class="fa-solid fa-images"></i>
            Dokumentasi NU
        </div>

        <h1 class="mt-3 text-2xl font-bold text-slate-800">
            Edit Foto Galeri
        </h1>

        <p class="mt-1 text-sm text-slate-500">
            Perbarui informasi dan foto dokumentasi kegiatan NU Desa Paningkaban.
        </p>
    </div>

    {{-- Notifikasi error --}}
    @if ($errors->any())
        <div class="rounded-xl border border-red-200 bg-red-50 p-4 text-sm text-red-700">
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

    {{-- Form edit foto --}}
    <div class="overflow-hidden rounded-2xl border border-slate-200 bg-white shadow-sm">

        {{-- Aksen hijau tipis --}}
        <div class="h-1 bg-emerald-500"></div>

        <div class="p-5 sm:p-7">

            <div class="mb-6 border-b border-slate-100 pb-4">
                <h2 class="text-lg font-bold text-slate-800">
                    Informasi Foto
                </h2>

                <p class="mt-1 text-sm text-slate-500">
                    Ubah data yang diperlukan, kemudian simpan perubahan.
                </p>
            </div>

            <form action="{{ route('admin.galeri.update', $galeri->id) }}"
                  method="POST"
                  enctype="multipart/form-data"
                  class="space-y-6">

                @csrf
                @method('PUT')

                {{-- Judul foto --}}
                <div>
                    <label for="judul" class="mb-2 block text-sm font-semibold text-slate-700">
                        Judul Foto
                        <span class="text-red-500">*</span>
                    </label>

                    <input
                        type="text"
                        id="judul"
                        name="judul"
                        value="{{ old('judul', $galeri->judul) }}"
                        placeholder="Contoh: Pengajian Rutin NU"
                        required
                        class="w-full rounded-xl border border-slate-200 bg-white px-4 py-3 text-sm text-slate-700 outline-none transition placeholder:text-slate-400 focus:border-emerald-500 focus:ring-2 focus:ring-emerald-100 @error('judul') border-red-400 @enderror"
                    >

                    @error('judul')
                        <p class="mt-2 text-sm text-red-600">{{ $message }}</p>
                    @enderror
                </div>

                {{-- Foto saat ini --}}
                <div>
                    <label class="mb-2 block text-sm font-semibold text-slate-700">
                        Foto Saat Ini
                    </label>

                    <div class="rounded-xl border border-slate-200 bg-slate-50 p-4">
                        @if ($galeri->gambar)
                            <img
                                src="{{ asset('storage/' . $galeri->gambar) }}"
                                alt="{{ $galeri->judul }}"
                                class="max-h-72 max-w-full rounded-xl border border-slate-200 object-contain"
                            >
                        @else
                            <div class="flex h-40 items-center justify-center rounded-xl border border-dashed border-slate-300 text-slate-400">
                                <div class="text-center">
                                    <i class="fa-regular fa-image text-4xl"></i>
                                    <p class="mt-2 text-sm">Foto belum tersedia.</p>
                                </div>
                            </div>
                        @endif
                    </div>
                </div>

                {{-- Ganti foto --}}
                <div>
                    <label for="gambar" class="mb-2 block text-sm font-semibold text-slate-700">
                        Ganti Foto
                        <span class="font-normal text-slate-400">(Opsional)</span>
                    </label>

                    <div class="rounded-xl border border-dashed border-slate-300 bg-slate-50 p-4 transition hover:border-emerald-400">
                        <input
                            type="file"
                            id="gambar"
                            name="gambar"
                            accept=".jpg,.jpeg,.png,.webp"
                            class="block w-full cursor-pointer text-sm text-slate-600 file:mr-4 file:rounded-lg file:border-0 file:bg-emerald-50 file:px-4 file:py-2 file:text-sm file:font-semibold file:text-emerald-700 hover:file:bg-emerald-100"
                        >

                        <p class="mt-3 text-xs leading-5 text-slate-500">
                            <i class="fa-solid fa-circle-info mr-1 text-emerald-600"></i>
                            Format JPG, JPEG, PNG, atau WEBP. Ukuran maksimal 2 MB.
                            Kosongkan jika tidak ingin mengganti foto.
                        </p>
                    </div>

                    @error('gambar')
                        <p class="mt-2 text-sm text-red-600">{{ $message }}</p>
                    @enderror
                </div>

                {{-- Kegiatan terkait --}}
                <div>
                    <label for="kegiatan_id" class="mb-2 block text-sm font-semibold text-slate-700">
                        Kegiatan Terkait
                    </label>

                    <select
                        id="kegiatan_id"
                        name="kegiatan_id"
                        class="w-full rounded-xl border border-slate-200 bg-white px-4 py-3 text-sm text-slate-700 outline-none transition focus:border-emerald-500 focus:ring-2 focus:ring-emerald-100 @error('kegiatan_id') border-red-400 @enderror"
                    >
                        <option value="">-- Tidak terkait kegiatan --</option>

                        @foreach ($kegiatan as $item)
                            <option
                                value="{{ $item->id }}"
                                @selected((string) old('kegiatan_id', $galeri->kegiatan_id) === (string) $item->id)
                            >
                                {{ $item->nama_kegiatan }}
                            </option>
                        @endforeach
                    </select>

                    <p class="mt-2 text-xs text-slate-500">
                        Pilih kegiatan yang sesuai atau biarkan kosong jika foto tidak terkait kegiatan tertentu.
                    </p>

                    @error('kegiatan_id')
                        <p class="mt-2 text-sm text-red-600">{{ $message }}</p>
                    @enderror
                </div>

                {{-- Keterangan --}}
                <div>
                    <label for="keterangan" class="mb-2 block text-sm font-semibold text-slate-700">
                        Keterangan
                    </label>

                    <textarea
                        id="keterangan"
                        name="keterangan"
                        rows="4"
                        placeholder="Tuliskan keterangan atau informasi mengenai foto..."
                        class="w-full resize-y rounded-xl border border-slate-200 bg-white px-4 py-3 text-sm leading-6 text-slate-700 outline-none transition placeholder:text-slate-400 focus:border-emerald-500 focus:ring-2 focus:ring-emerald-100 @error('keterangan') border-red-400 @enderror"
                    >{{ old('keterangan', $galeri->keterangan) }}</textarea>

                    @error('keterangan')
                        <p class="mt-2 text-sm text-red-600">{{ $message }}</p>
                    @enderror
                </div>

                {{-- Tombol aksi di bagian bawah --}}
                <div class="flex flex-col-reverse gap-3 border-t border-slate-100 pt-5 sm:flex-row sm:justify-end">

                    <a href="{{ route('admin.galeri.index') }}"
                       class="inline-flex h-11 items-center justify-center gap-2 rounded-xl border border-slate-200 bg-white px-5 text-sm font-semibold text-slate-600 transition hover:bg-slate-50">
                        <i class="fa-solid fa-xmark"></i>
                        Batal
                    </a>

                    <button type="submit"
                            class="inline-flex h-11 items-center justify-center gap-2 rounded-xl bg-emerald-600 px-5 text-sm font-semibold text-white shadow-sm transition hover:bg-emerald-700">
                        <i class="fa-solid fa-floppy-disk"></i>
                        Simpan Perubahan
                    </button>

                </div>

            </form>
        </div>
    </div>

</div>
@endsection
