<?php

namespace App\Http\Controllers;

use App\Models\Berita;
use App\Models\Kegiatan;
use App\Models\Pengurus;
use App\Models\Galeri;
use App\Models\Pengumuman;

class HomeController extends Controller
{
    public function index()
    {
        return view('public.home');
    }
    public function tentangKami()
    {
        return view('public.tentang_kami');
    }
    public function pengumuman()
    {
        $pengumuman = Pengumuman::where('status', 'terbit')
            ->orderByDesc('diterbitkan_pada')
            ->paginate(6);

        return view('public.pengumuman', compact('pengumuman'));
    }
    
    public function berita()
    {
        $berita = \App\Models\Berita::where('status', 'terbit')
            ->orderByRaw('COALESCE(diterbitkan_pada, created_at) DESC')
            ->paginate(6);

        return view('public.berita', compact('berita'));
    }
    
    public function kegiatan()
    {
        $kegiatan = \App\Models\Kegiatan::orderByDesc('waktu_mulai')
            ->paginate(6);

        return view('public.kegiatan', compact('kegiatan'));
    }

    public function pengurus()
    {
        $pengurus = \App\Models\Pengurus::orderBy('urutan', 'asc')
            ->orderBy('nama', 'asc')
            ->get();

        return view('public.pengurus', compact('pengurus'));
    }
    public function galeri()
    {
        $galeri = \App\Models\Galeri::with('kegiatan')
            ->orderByDesc('created_at')
            ->paginate(12);

        return view('public.galeri', compact('galeri'));
    }


}