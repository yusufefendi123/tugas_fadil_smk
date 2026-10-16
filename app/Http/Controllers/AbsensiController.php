<?php

namespace App\Http\Controllers;

use App\Models\Absensi;
use App\Models\Jamaah;
use App\Models\Kegiatan;
use Illuminate\Http\Request;
use Illuminate\Validation\Rule;

class AbsensiController extends Controller
{
    public function index()
    {
        $absensi = Absensi::with(['jamaah', 'kegiatan'])
            ->orderByDesc('tanggal')
            ->orderByDesc('created_at')
            ->get();

        return view('admin.absensi.index', compact('absensi'));
    }

    public function create()
    {
        $jamaah = Jamaah::orderBy('nama_lengkap', 'asc')->get();

        $kegiatan = Kegiatan::orderBy('waktu_mulai', 'desc')->get();

        return view('admin.absensi.create', compact(
            'jamaah',
            'kegiatan'
        ));
    }

    public function store(Request $request)
    {
        $validated = $request->validate([
            'jamaah_id' => [
                'required',
                'exists:jamaah,id',
            ],
            'kegiatan_id' => [
                'required',
                'exists:kegiatan,id',
            ],
            'tanggal' => [
                'required',
                'date',
            ],
            'waktu_hadir' => [
                'nullable',
                'date_format:H:i',
            ],
            'status' => [
                'required',
                Rule::in(['hadir', 'izin', 'tidak_hadir']),
            ],
            'keterangan' => [
                'nullable',
                'string',
            ],
        ]);

        $duplikat = Absensi::where('jamaah_id', $validated['jamaah_id'])
            ->where('kegiatan_id', $validated['kegiatan_id'])
            ->where('tanggal', $validated['tanggal'])
            ->exists();

        if ($duplikat) {
            return back()
                ->withInput()
                ->withErrors([
                    'jamaah_id' => 'Jamaah tersebut sudah memiliki data absensi untuk kegiatan dan tanggal ini.',
                ]);
        }

        Absensi::create($validated);

        return redirect()
            ->route('admin.absensi.index')
            ->with('success', 'Data absensi berhasil ditambahkan.');
    }

    public function edit($id)
    {
        $absensi = Absensi::findOrFail($id);

        $jamaah = Jamaah::orderBy('nama_lengkap', 'asc')->get();

        $kegiatan = Kegiatan::orderBy('waktu_mulai', 'desc')->get();

        return view('admin.absensi.edit', compact(
            'absensi',
            'jamaah',
            'kegiatan'
        ));
    }

    public function update(Request $request, $id)
    {
        $absensi = Absensi::findOrFail($id);

        $validated = $request->validate([
            'jamaah_id' => [
                'required',
                'exists:jamaah,id',
            ],
            'kegiatan_id' => [
                'required',
                'exists:kegiatan,id',
            ],
            'tanggal' => [
                'required',
                'date',
            ],
            'waktu_hadir' => [
                'nullable',
                'date_format:H:i',
            ],
            'status' => [
                'required',
                Rule::in(['hadir', 'izin', 'tidak_hadir']),
            ],
            'keterangan' => [
                'nullable',
                'string',
            ],
        ]);

        $duplikat = Absensi::where('jamaah_id', $validated['jamaah_id'])
            ->where('kegiatan_id', $validated['kegiatan_id'])
            ->where('tanggal', $validated['tanggal'])
            ->where('id', '!=', $absensi->id)
            ->exists();

        if ($duplikat) {
            return back()
                ->withInput()
                ->withErrors([
                    'jamaah_id' => 'Jamaah tersebut sudah memiliki data absensi untuk kegiatan dan tanggal ini.',
                ]);
        }

        $absensi->update($validated);

        return redirect()
            ->route('admin.absensi.index')
            ->with('success', 'Data absensi berhasil diperbarui.');
    }

    public function destroy($id)
    {
        $absensi = Absensi::findOrFail($id);

        $absensi->delete();

        return redirect()
            ->route('admin.absensi.index')
            ->with('success', 'Data absensi berhasil dihapus.');
    }
}
