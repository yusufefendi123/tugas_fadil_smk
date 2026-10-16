<?php

namespace App\Http\Controllers;

use App\Models\Galeri;
use App\Models\Kegiatan;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Storage;

class GaleriController extends Controller
{
    public function index()
    {
        $galeri = Galeri::with('kegiatan')
            ->latest()
            ->paginate(12);

        return view('admin.galeri.index', compact('galeri'));
    }

    public function create()
    {
        $kegiatan = Kegiatan::orderBy('nama_kegiatan')->get();

        return view('admin.galeri.create', compact('kegiatan'));
    }

    public function store(Request $request)
    {
        $request->validate([
            'judul' => 'required|string|max:255',
            'gambar' => 'required|image|mimes:jpg,jpeg,png,webp|max:2048',
            'keterangan' => 'nullable|string',
            'kegiatan_id' => 'nullable|exists:kegiatan,id',
        ]);

        $data = $request->only([
            'judul',
            'keterangan',
            'kegiatan_id',
        ]);

        $data['gambar'] = $request->file('gambar')
            ->store('galeri', 'public');

        Galeri::create($data);

        return redirect()
            ->route('admin.galeri.index')
            ->with('success', 'Foto galeri berhasil ditambahkan.');
    }

    public function show(Galeri $galeri)
    {
        $galeri->load('kegiatan');

        return view('admin.galeri.show', compact('galeri'));
    }

    public function edit(Galeri $galeri)
    {
        $kegiatan = Kegiatan::orderBy('nama_kegiatan')->get();

        return view('admin.galeri.edit', compact('galeri', 'kegiatan'));
    }

    public function update(Request $request, Galeri $galeri)
    {
        $request->validate([
            'judul' => 'required|string|max:255',
            'gambar' => 'nullable|image|mimes:jpg,jpeg,png,webp|max:2048',
            'keterangan' => 'nullable|string',
            'kegiatan_id' => 'nullable|exists:kegiatan,id',
        ]);

        $data = $request->only([
            'judul',
            'keterangan',
            'kegiatan_id',
        ]);

        if ($request->hasFile('gambar')) {
            if ($galeri->gambar) {
                Storage::disk('public')->delete($galeri->gambar);
            }

            $data['gambar'] = $request->file('gambar')
                ->store('galeri', 'public');
        }

        $galeri->update($data);

        return redirect()
            ->route('admin.galeri.index')
            ->with('success', 'Data galeri berhasil diperbarui.');
    }

    public function destroy(Galeri $galeri)
    {
        if ($galeri->gambar) {
            Storage::disk('public')->delete($galeri->gambar);
        }

        $galeri->delete();

        return redirect()
            ->route('admin.galeri.index')
            ->with('success', 'Foto galeri berhasil dihapus.');
    }
}
