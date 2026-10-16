<?php

namespace App\Http\Controllers;

use App\Models\Berita;
use App\Models\Kegiatan;
use App\Models\Pengurus;
use App\Models\Jamaah;
use App\Models\Absensi;
use App\Models\Galeri;
use App\Models\Pengumuman;
use App\Models\User;

class DashboardController extends Controller
{
    public function index()
    {
        $jumlahBerita = Berita::count();
        $beritaTerbit = Berita::where('status', 'terbit')->count();
        $beritaDraft = Berita::where('status', 'draft')->count();

        $jumlahKegiatan = Kegiatan::count();
        $kegiatanAkanDatang = Kegiatan::where(
            'status',
            'akan_datang'
        )->count();
        $kegiatanSelesai = Kegiatan::where(
            'status',
            'selesai'
        )->count();

        $jumlahPengurus = Pengurus::count();
        $jumlahJamaah = Jamaah::count();
        $jumlahAbsensi = Absensi::count();
        $jumlahGaleri = Galeri::count();

        $jumlahPengumuman = Pengumuman::count();
        $pengumumanTerbit = Pengumuman::where(
            'status',
            'terbit'
        )->count();

        $jumlahPengguna = User::count();

        $beritaTerbaru = Berita::orderByDesc('created_at')
            ->take(5)
            ->get();

        $kegiatanTerbaru = Kegiatan::orderByDesc('waktu_mulai')
            ->take(5)
            ->get();

        $absensiTerbaru = Absensi::with(['jamaah', 'kegiatan'])
            ->orderByDesc('tanggal')
            ->orderByDesc('created_at')
            ->take(5)
            ->get();

        return view('admin.dashboard', compact(
            'jumlahBerita',
            'beritaTerbit',
            'beritaDraft',
            'jumlahKegiatan',
            'kegiatanAkanDatang',
            'kegiatanSelesai',
            'jumlahPengurus',
            'jumlahJamaah',
            'jumlahAbsensi',
            'jumlahGaleri',
            'jumlahPengumuman',
            'pengumumanTerbit',
            'jumlahPengguna',
            'beritaTerbaru',
            'kegiatanTerbaru',
            'absensiTerbaru'
        ));
    }
}
