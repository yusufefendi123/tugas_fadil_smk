<?php

namespace App\Http\Controllers;

use App\Models\Jamaah;
use Illuminate\Http\Request;
use Illuminate\Validation\Rule;

class JamaahController extends Controller
{
    public function index(Request $request)
    {
        $cari = $request->input('cari');

        $jamaah = Jamaah::when($cari, function ($query, $cari) {
            $query->where(function ($subQuery) use ($cari) {
                $subQuery->where('nik', 'like', '%' . $cari . '%')
                    ->orWhere('nama_lengkap', 'like', '%' . $cari . '%');
            });
        })
        ->orderBy('nama_lengkap')
        ->paginate(10)
        ->withQueryString();

        return view('admin.jamaah.index', compact('jamaah', 'cari'));
    }

    public function create()
    {
        return view('admin.jamaah.create');
    }

    public function store(Request $request)
    {
        $validated = $request->validate([
            'nik' => 'required|string|size:16|unique:jamaah,nik',
            'nama_lengkap' => 'required|string|max:255',
            'tempat_lahir' => 'required|string|max:100',
            'tanggal_lahir' => 'required|date|before_or_equal:today',
            'jenis_kelamin' => 'required|in:Laki-laki,Perempuan',
        ], [
            'nik.required' => 'NIK wajib diisi.',
            'nik.size' => 'NIK harus terdiri dari 16 digit.',
            'nik.unique' => 'NIK tersebut sudah terdaftar.',
            'tanggal_lahir.before_or_equal' => 'Tanggal lahir tidak boleh melebihi hari ini.',
        ]);

        Jamaah::create($validated);

        return redirect()
            ->route('admin.jamaah.index')
            ->with('success', 'Data jamaah berhasil ditambahkan.');
    }

    public function show(Jamaah $jamaah)
    {
        return view('admin.jamaah.show', compact('jamaah'));
    }

    public function edit(Jamaah $jamaah)
    {
        return view('admin.jamaah.edit', compact('jamaah'));
    }

    public function update(Request $request, Jamaah $jamaah)
    {
        $validated = $request->validate([
            'nik' => [
                'required',
                'string',
                'size:16',
                Rule::unique('jamaah', 'nik')->ignore($jamaah->id),
            ],
            'nama_lengkap' => 'required|string|max:255',
            'tempat_lahir' => 'required|string|max:100',
            'tanggal_lahir' => 'required|date|before_or_equal:today',
            'jenis_kelamin' => 'required|in:Laki-laki,Perempuan',
        ], [
            'nik.required' => 'NIK wajib diisi.',
            'nik.size' => 'NIK harus terdiri dari 16 digit.',
            'nik.unique' => 'NIK tersebut sudah digunakan jamaah lain.',
            'tanggal_lahir.before_or_equal' => 'Tanggal lahir tidak boleh melebihi hari ini.',
        ]);

        $jamaah->update($validated);

        return redirect()
            ->route('admin.jamaah.index')
            ->with('success', 'Data jamaah berhasil diperbarui.');
    }

    public function destroy(Jamaah $jamaah)
    {
        $jamaah->delete();

        return redirect()
            ->route('admin.jamaah.index')
            ->with('success', 'Data jamaah berhasil dihapus.');
    }
}
