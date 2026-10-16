<?php

namespace App\Http\Controllers;

use App\Models\Berita;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Storage;

class BeritaController extends Controller
{
    // Menampilkan daftar berita
    public function index()
    {
        $berita = Berita::latest()->paginate(10);

        return view('admin.berita.index', compact('berita'));
    }

    // Menampilkan formulir tambah berita
    public function create()
    {
        return view('admin.berita.create');
    }

    // Menyimpan berita baru
    public function store(Request $request)
    {
        $validasi = $request->validate([
            'judul' => ['required', 'string', 'max:255'],
            'isi' => ['required', 'string'],
            'gambar' => ['nullable', 'image', 'mimes:jpg,jpeg,png,webp', 'max:2048'],
            'status' => ['required', 'in:draft,terbit'],
        ]);

        if ($request->hasFile('gambar')) {
            $validasi['gambar'] = $request->file('gambar')
                ->store('berita', 'public');
        }

        $validasi['user_id'] = Auth::id();

        $validasi['diterbitkan_pada'] =
            $request->status === 'terbit' ? now() : null;

        Berita::create($validasi);

        return redirect()
            ->route('admin.berita.index')
            ->with('success', 'Berita berhasil ditambahkan.');
    }

    // Menampilkan detail berita
    public function show(Berita $berita)
    {
        return view('admin.berita.show', compact('berita'));
    }

    // Menampilkan formulir edit berita
    public function edit(Berita $berita)
    {
        return view('admin.berita.edit', compact('berita'));
    }

    // Memperbarui berita
    public function update(Request $request, Berita $berita)
    {
        $validasi = $request->validate([
            'judul' => ['required', 'string', 'max:255'],
            'isi' => ['required', 'string'],
            'gambar' => ['nullable', 'image', 'mimes:jpg,jpeg,png,webp', 'max:2048'],
            'status' => ['required', 'in:draft,terbit'],
        ]);

        if ($request->hasFile('gambar')) {
            if ($berita->gambar) {
                Storage::disk('public')->delete($berita->gambar);
            }

            $validasi['gambar'] = $request->file('gambar')
                ->store('berita', 'public');
        }

        if ($request->status === 'terbit') {
            $validasi['diterbitkan_pada'] =
                $berita->status === 'terbit'
                    ? ($berita->diterbitkan_pada ?? now())
                    : now();
        } else {
            $validasi['diterbitkan_pada'] = null;
        }

        $berita->update($validasi);

        return redirect()
            ->route('admin.berita.index')
            ->with('success', 'Berita berhasil diperbarui.');
    }

    // Menghapus berita
    public function destroy(Berita $berita)
    {
        if ($berita->gambar) {
            Storage::disk('public')->delete($berita->gambar);
        }

        $berita->delete();

        return redirect()
            ->route('admin.berita.index')
            ->with('success', 'Berita berhasil dihapus.');
    }
}
