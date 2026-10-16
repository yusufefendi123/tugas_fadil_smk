
<?php

use App\Http\Controllers\AbsensiController;
use App\Http\Controllers\AuthController;
use App\Http\Controllers\BeritaController;
use App\Http\Controllers\DashboardController;
use App\Http\Controllers\GaleriController;
use App\Http\Controllers\HomeController;
use App\Http\Controllers\JamaahController;
use App\Http\Controllers\KegiatanController;
use App\Http\Controllers\PenggunaController;
use App\Http\Controllers\PengumumanController;
use App\Http\Controllers\PengurusController;
use App\Http\Controllers\ProfilController;
use Illuminate\Support\Facades\Route;



// public

    Route::get('/homepage', [HomeController::class, 'index'])->name('home');

    Route::get('/tentang_kami', [HomeController::class, 'tentangKami'])
        ->name('tentang_kami');

    Route::get('/pengumuman', [HomeController::class, 'pengumuman'])
        ->name('pengumuman');

    Route::get('/berita', [HomeController::class, 'berita'])
        ->name('berita');

    Route::get('/kegiatan', [HomeController::class, 'kegiatan'])
        ->name('kegiatan');

    Route::get('/pengurus', [HomeController::class, 'pengurus'])
        ->name('pengurus');
        
    Route::get('/galeri', [HomeController::class, 'galeri'])
        ->name('galeri');


// admin

Route::middleware('guest')->group(function () {
    Route::get('/login', [AuthController::class, 'showLogin'])
        ->name('login');

    Route::post('/login', [AuthController::class, 'login'])
        ->name('login.post');
});

Route::middleware('auth')->prefix('admin')->group(function () {

    Route::get('/dashboard', [DashboardController::class, 'index'])
        ->name('admin.dashboard');

    // Manajemen Berita
    Route::get('/berita', [BeritaController::class, 'index'])
        ->name('admin.berita.index');

    Route::get('/berita/tambah', [BeritaController::class, 'create'])
        ->name('admin.berita.create');

    Route::post('/berita', [BeritaController::class, 'store'])
        ->name('admin.berita.store');

    Route::get('/berita/{berita}', [BeritaController::class, 'show'])
        ->name('admin.berita.show');

    Route::get('/berita/{berita}/edit', [BeritaController::class, 'edit'])
        ->name('admin.berita.edit');

    Route::put('/berita/{berita}', [BeritaController::class, 'update'])
        ->name('admin.berita.update');

    Route::delete('/berita/{berita}', [BeritaController::class, 'destroy'])
        ->name('admin.berita.destroy');

    // Manajemen Kegiatan
    Route::get('/kegiatan', [KegiatanController::class, 'index'])
        ->name('admin.kegiatan.index');

    Route::get('/kegiatan/tambah', [KegiatanController::class, 'create'])
        ->name('admin.kegiatan.create');

    Route::post('/kegiatan', [KegiatanController::class, 'store'])
        ->name('admin.kegiatan.store');

    Route::get('/kegiatan/{kegiatan}', [KegiatanController::class, 'show'])
        ->name('admin.kegiatan.show');

    Route::get('/kegiatan/{kegiatan}/edit', [KegiatanController::class, 'edit'])
        ->name('admin.kegiatan.edit');

    Route::put('/kegiatan/{kegiatan}', [KegiatanController::class, 'update'])
        ->name('admin.kegiatan.update');

    Route::delete('/kegiatan/{kegiatan}', [KegiatanController::class, 'destroy'])
        ->name('admin.kegiatan.destroy');

    
    // Struktur Pengurus
    Route::get('/pengurus', [PengurusController::class, 'index'])
        ->name('admin.pengurus.index');

    Route::get('/pengurus/tambah', [PengurusController::class, 'create'])
        ->name('admin.pengurus.create');

    Route::post('/pengurus', [PengurusController::class, 'store'])
        ->name('admin.pengurus.store');

    Route::get('/pengurus/{pengurus}', [PengurusController::class, 'show'])
        ->name('admin.pengurus.show');

    Route::get('/pengurus/{pengurus}/edit', [PengurusController::class, 'edit'])
        ->name('admin.pengurus.edit');

    Route::put('/pengurus/{pengurus}', [PengurusController::class, 'update'])
        ->name('admin.pengurus.update');

    Route::delete('/pengurus/{pengurus}', [PengurusController::class, 'destroy'])
        ->name('admin.pengurus.destroy');

    
    // Galeri Kegiatan
    Route::get('/galeri', [GaleriController::class, 'index'])
        ->name('admin.galeri.index');

    Route::get('/galeri/tambah', [GaleriController::class, 'create'])
        ->name('admin.galeri.create');

    Route::post('/galeri', [GaleriController::class, 'store'])
        ->name('admin.galeri.store');

    Route::get('/galeri/{galeri}', [GaleriController::class, 'show'])
        ->name('admin.galeri.show');

    Route::get('/galeri/{galeri}/edit', [GaleriController::class, 'edit'])
        ->name('admin.galeri.edit');

    Route::put('/galeri/{galeri}', [GaleriController::class, 'update'])
        ->name('admin.galeri.update');

    Route::delete('/galeri/{galeri}', [GaleriController::class, 'destroy'])
        ->name('admin.galeri.destroy');

    
Route::get('/pengumuman', [PengumumanController::class, 'index'])
    ->name('admin.pengumuman.index');

Route::get('/pengumuman/tambah', [PengumumanController::class, 'create'])
    ->name('admin.pengumuman.create');

Route::post('/pengumuman', [PengumumanController::class, 'store'])
    ->name('admin.pengumuman.store');

Route::get('/pengumuman/{pengumuman}', [PengumumanController::class, 'show'])
    ->name('admin.pengumuman.show');

Route::get('/pengumuman/{pengumuman}/edit', [PengumumanController::class, 'edit'])
    ->name('admin.pengumuman.edit');

Route::put('/pengumuman/{pengumuman}', [PengumumanController::class, 'update'])
    ->name('admin.pengumuman.update');

Route::delete('/pengumuman/{pengumuman}', [PengumumanController::class, 'destroy'])
    ->name('admin.pengumuman.destroy');

// Data Jamaah
Route::get('/jamaah', [JamaahController::class, 'index'])
    ->name('admin.jamaah.index');

Route::get('/jamaah/tambah', [JamaahController::class, 'create'])
    ->name('admin.jamaah.create');

Route::post('/jamaah', [JamaahController::class, 'store'])
    ->name('admin.jamaah.store');

Route::get('/jamaah/{jamaah}/edit', [JamaahController::class, 'edit'])
    ->name('admin.jamaah.edit');

Route::put('/jamaah/{jamaah}', [JamaahController::class, 'update'])
    ->name('admin.jamaah.update');

Route::get('/jamaah/{jamaah}', [JamaahController::class, 'show'])
    ->name('admin.jamaah.show');

Route::delete('/jamaah/{jamaah}', [JamaahController::class, 'destroy'])
    ->name('admin.jamaah.destroy');


// Absensi

Route::get('/absensi', [AbsensiController::class, 'index'])
    ->name('admin.absensi.index');

Route::get('/absensi/create', [AbsensiController::class, 'create'])
    ->name('admin.absensi.create');

Route::post('/absensi', [AbsensiController::class, 'store'])
    ->name('admin.absensi.store');

Route::get('/absensi/{id}/edit', [AbsensiController::class, 'edit'])
    ->name('admin.absensi.edit');

Route::put('/absensi/{id}', [AbsensiController::class, 'update'])
    ->name('admin.absensi.update');

Route::delete('/absensi/{id}', [AbsensiController::class, 'destroy'])
    ->name('admin.absensi.destroy');

// pengguna

Route::get('/pengguna', [PenggunaController::class, 'index'])
    ->name('admin.pengguna.index');

Route::get('/pengguna/create', [PenggunaController::class, 'create'])
    ->name('admin.pengguna.create');

Route::post('/pengguna', [PenggunaController::class, 'store'])
    ->name('admin.pengguna.store');

Route::get('/pengguna/{id}/edit', [PenggunaController::class, 'edit'])
    ->name('admin.pengguna.edit');

Route::put('/pengguna/{id}', [PenggunaController::class, 'update'])
    ->name('admin.pengguna.update');

Route::delete('/pengguna/{id}', [PenggunaController::class, 'destroy'])
    ->name('admin.pengguna.destroy');


Route::get('/profil', [ProfilController::class, 'index'])
    ->name('admin.profil.index');

Route::put('/profil', [ProfilController::class, 'update'])
    ->name('admin.profil.update');

Route::put('/profil/password', [ProfilController::class, 'updatePassword'])
    ->name('admin.profil.password');



    // Logout
    Route::post('/logout', [AuthController::class, 'logout'])
        ->name('admin.logout');
});
