<?php

namespace App\Http\Controllers;

use App\Models\Pengumuman;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;

class PengumumanController extends Controller
{
    // Menampilkan daftar pengumuman
    public function index()
    {
        $pengumuman = Pengumuman::latest()->paginate(10);

        return view('admin.pengumuman.index', compact('pengumuman'));
    }

    // Menampilkan form tambah pengumuman
    public function create()
    {
        return view('admin.pengumuman.create');
    }

    // Menyimpan pengumuman baru
    public function store(Request $request)
    {
        $validated = $request->validate([
            'judul' => 'required|string|max:255',
            'isi' => 'required|string',
            'status' => 'required|in:draft,terbit',
            'diterbitkan_pada' => 'nullable|date',
        ]);

        $data = [
            'judul' => $validated['judul'],
            'isi' => $validated['isi'],
            'status' => $validated['status'],
            'user_id' => Auth::id(),
        ];

        if ($validated['status'] === 'terbit') {
            $data['diterbitkan_pada'] =
                $validated['diterbitkan_pada'] ?? now();
        } else {
            $data['diterbitkan_pada'] = null;
        }

        Pengumuman::create($data);

        return redirect()
            ->route('admin.pengumuman.index')
            ->with('success', 'Pengumuman berhasil ditambahkan.');
    }

    // Menampilkan detail pengumuman
    public function show(Pengumuman $pengumuman)
    {
        return view('admin.pengumuman.show', compact('pengumuman'));
    }

    // Menampilkan form edit pengumuman
    public function edit(Pengumuman $pengumuman)
    {
        return view('admin.pengumuman.edit', compact('pengumuman'));
    }

    // Memperbarui pengumuman
    public function update(Request $request, Pengumuman $pengumuman)
    {
        $validated = $request->validate([
            'judul' => 'required|string|max:255',
            'isi' => 'required|string',
            'status' => 'required|in:draft,terbit',
            'diterbitkan_pada' => 'nullable|date',
        ]);

        $data = [
            'judul' => $validated['judul'],
            'isi' => $validated['isi'],
            'status' => $validated['status'],
        ];

        if ($validated['status'] === 'terbit') {
            $data['diterbitkan_pada'] =
                $validated['diterbitkan_pada']
                ?? $pengumuman->diterbitkan_pada
                ?? now();
        } else {
            $data['diterbitkan_pada'] = null;
        }

        $pengumuman->update($data);

        return redirect()
            ->route('admin.pengumuman.index')
            ->with('success', 'Pengumuman berhasil diperbarui.');
    }

    // Menghapus pengumuman
    public function destroy(Pengumuman $pengumuman)
    {
        $pengumuman->delete();

        return redirect()
            ->route('admin.pengumuman.index')
            ->with('success', 'Pengumuman berhasil dihapus.');
    }
}
