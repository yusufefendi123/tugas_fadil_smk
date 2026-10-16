<?php

namespace App\Http\Controllers;

use App\Models\Pengurus;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Storage;

class PengurusController extends Controller
{
    public function index()
    {
        $pengurus = Pengurus::orderBy('urutan', 'asc')
            ->orderBy('nama', 'asc')
            ->paginate(10);

        return view('admin.pengurus.index', compact('pengurus'));
    }

    public function create()
    {
        return view('admin.pengurus.create');
    }

    public function store(Request $request)
    {
        $request->validate([
            'nama' => 'required|string|max:255',
            'jabatan' => 'required|string|max:255',
            'foto' => 'nullable|image|mimes:jpg,jpeg,png,webp|max:2048',
            'periode' => 'nullable|string|max:100',
            'keterangan' => 'nullable|string',
            'urutan' => 'required|integer|min:0',
        ]);

        $data = $request->only([
            'nama',
            'jabatan',
            'periode',
            'keterangan',
            'urutan',
        ]);

        if ($request->hasFile('foto')) {
            $data['foto'] = $request->file('foto')
                ->store('pengurus', 'public');
        }

        Pengurus::create($data);

        return redirect()
            ->route('admin.pengurus.index')
            ->with('success', 'Data pengurus berhasil ditambahkan.');
    }

    public function show(Pengurus $pengurus)
    {
        return view('admin.pengurus.show', compact('pengurus'));
    }

    public function edit(Pengurus $pengurus)
    {
        return view('admin.pengurus.edit', compact('pengurus'));
    }

    public function update(Request $request, Pengurus $pengurus)
    {
        $request->validate([
            'nama' => 'required|string|max:255',
            'jabatan' => 'required|string|max:255',
            'foto' => 'nullable|image|mimes:jpg,jpeg,png,webp|max:2048',
            'periode' => 'nullable|string|max:100',
            'keterangan' => 'nullable|string',
            'urutan' => 'required|integer|min:0',
        ]);

        $data = $request->only([
            'nama',
            'jabatan',
            'periode',
            'keterangan',
            'urutan',
        ]);

        if ($request->hasFile('foto')) {
            if ($pengurus->foto) {
                Storage::disk('public')->delete($pengurus->foto);
            }

            $data['foto'] = $request->file('foto')
                ->store('pengurus', 'public');
        }

        $pengurus->update($data);

        return redirect()
            ->route('admin.pengurus.index')
            ->with('success', 'Data pengurus berhasil diperbarui.');
    }

    public function destroy(Pengurus $pengurus)
    {
        if ($pengurus->foto) {
            Storage::disk('public')->delete($pengurus->foto);
        }

        $pengurus->delete();

        return redirect()
            ->route('admin.pengurus.index')
            ->with('success', 'Data pengurus berhasil dihapus.');
    }
}
