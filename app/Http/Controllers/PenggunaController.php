<?php

namespace App\Http\Controllers;

use App\Models\User;
use Illuminate\Http\Request;
use Illuminate\Validation\Rule;
use Illuminate\Support\Facades\Hash;
use Illuminate\Support\Facades\DB;

class PenggunaController extends Controller
{
    // Menampilkan daftar pengguna
    public function index()
    {
        $pengguna = User::orderBy('created_at', 'desc')->get();

        return view('admin.pengguna.index', compact('pengguna'));
    }

    // Menampilkan formulir tambah pengguna
    public function create()
    {
        return view('admin.pengguna.create');
    }

    // Menyimpan pengguna baru
    public function store(Request $request)
    {
        $request->validate([
            'nama' => 'required|string|max:255',
            'email' => 'required|email|max:255|unique:users,email',
            'password' => 'required|string|min:8|confirmed',
        ]);

        User::create([
            'nama' => $request->nama,
            'email' => $request->email,
            'password' => Hash::make($request->password),
        ]);

        return redirect()
            ->route('admin.pengguna.index')
            ->with('success', 'Pengguna berhasil ditambahkan.');
    }

    // Menampilkan formulir edit pengguna
    public function edit($id)
    {
        $pengguna = User::findOrFail($id);

        return view('admin.pengguna.edit', compact('pengguna'));
    }

    // Memperbarui data pengguna
    public function update(Request $request, $id)
    {
        $pengguna = User::findOrFail($id);

        $request->validate([
            'nama' => 'required|string|max:255',
            'email' => [
                'required',
                'email',
                'max:255',
                Rule::unique('users', 'email')->ignore($pengguna->id),
            ],
            'password' => 'nullable|string|min:8|confirmed',
        ]);

        $data = [
            'nama' => $request->nama,
            'email' => $request->email,
        ];

        if ($request->filled('password')) {
            $data['password'] = Hash::make($request->password);
        }

        $pengguna->update($data);

        return redirect()
            ->route('admin.pengguna.index')
            ->with('success', 'Data pengguna berhasil diperbarui.');
    }

    // Menghapus pengguna
    public function destroy($id)
    {
        $pengguna = User::findOrFail($id);

        // Mencegah akun yang sedang login dihapus
        if ($pengguna->id == auth()->id()) {
            return redirect()
                ->route('admin.pengguna.index')
                ->with('error', 'Akun yang sedang digunakan tidak dapat dihapus.');
        }

        // Memeriksa apakah pengguna memiliki data terkait
        $memilikiData =
            DB::table('berita')->where('user_id', $pengguna->id)->exists()
            || DB::table('kegiatan')->where('user_id', $pengguna->id)->exists()
            || DB::table('pengumuman')->where('user_id', $pengguna->id)->exists();

        if ($memilikiData) {
            return redirect()
                ->route('admin.pengguna.index')
                ->with('error', 'Pengguna masih memiliki berita, kegiatan, atau pengumuman sehingga tidak dapat dihapus.');
        }

        $pengguna->delete();

        return redirect()
            ->route('admin.pengguna.index')
            ->with('success', 'Pengguna berhasil dihapus.');
    }
}
