<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Validation\Rule;
use Illuminate\Support\Facades\Hash;

class ProfilController extends Controller
{
    // Menampilkan profil pengguna yang sedang login
    public function index()
    {
        $pengguna = auth()->user();

        return view('admin.profil.index', compact('pengguna'));
    }

    // Memperbarui nama dan email
    public function update(Request $request)
    {
        $pengguna = auth()->user();

        $validated = $request->validate([
            'nama' => ['required', 'string', 'max:255'],
            'email' => [
                'required',
                'email',
                'max:255',
                Rule::unique('users', 'email')->ignore($pengguna->id),
            ],
        ]);

        $pengguna->nama = $validated['nama'];
        $pengguna->email = $validated['email'];
        $pengguna->save();

        return redirect()
            ->route('admin.profil.index')
            ->with('success', 'Profil berhasil diperbarui.');
    }

    // Mengubah password
    public function updatePassword(Request $request)
    {
        $request->validate([
            'password_lama' => [
                'required',
                'current_password',
            ],
            'password_baru' => [
                'required',
                'string',
                'min:8',
                'confirmed',
            ],
        ], [
            'password_lama.current_password' =>
                'Password lama yang dimasukkan tidak sesuai.',
            'password_baru.min' =>
                'Password baru minimal 8 karakter.',
            'password_baru.confirmed' =>
                'Konfirmasi password baru tidak cocok.',
        ]);

        $pengguna = auth()->user();

        $pengguna->password = Hash::make(
            $request->password_baru
        );

        $pengguna->save();

        return redirect()
            ->route('admin.profil.index')
            ->with('success', 'Password berhasil diubah.');
    }
}
