<?php

use App\Http\Controllers\ProfileController;
use App\Http\Controllers\BeritaController;
use App\Http\Controllers\PengumumanController;
use App\Http\Controllers\GaleriController;
use App\Models\Berita;
use App\Models\Pengumuman;
use App\Models\Guru;
use Illuminate\Support\Facades\Route;

Route::get('/', function () {
    $beritas = Berita::latest()->take(3)->get();
    $pengumuman = Pengumuman::where('status', 'aktif')
                            ->where('tanggal_mulai', '<=', now())
                            ->where('tanggal_selesai', '>=', now())
                            ->latest()
                            ->take(5)
                            ->get();
    $gurus = Guru::orderBy('nama')->take(4)->get();
    return view('welcome', compact('beritas', 'pengumuman', 'gurus'));
});

Route::get('/dashboard', function () {
    return view('dashboard');
})->middleware(['auth', 'verified'])->name('dashboard');

Route::view('/profil', 'profil')->name('profil');
Route::get('/berita', function () {
    $beritas = Berita::latest()->paginate(9);
    return view('berita', compact('beritas'));
})->name('berita');
Route::get('/pengumuman', function () {
    $pengumuman = Pengumuman::where('status', 'aktif')
                            ->where('tanggal_mulai', '<=', now())
                            ->where('tanggal_selesai', '>=', now())
                            ->latest()
                            ->paginate(9);
    return view('pengumuman', compact('pengumuman'));
})->name('pengumuman');
Route::view('/keuangan', 'keuangan')->name('keuangan');
Route::view('/layanan', 'layanan')->name('layanan');
Route::view('/prestasi', 'prestasi')->name('prestasi');
Route::view('/alumni', 'alumni')->name('alumni');
Route::view('/kontak', 'kontak')->name('kontak');
Route::get('/galeri', [GaleriController::class, 'publicIndex'])->name('galeri.public');
Route::get('/staff', [App\Http\Controllers\GuruController::class, 'publicIndex'])->name('staff');

Route::middleware('auth')->prefix('admin')->group(function () {
    Route::get('/profile', [ProfileController::class, 'edit'])->name('profile.edit');
    Route::patch('/profile', [ProfileController::class, 'update'])->name('profile.update');
    Route::delete('/profile', [ProfileController::class, 'destroy'])->name('profile.destroy');
    
    // Berita CRUD routes
    Route::resource('berita', BeritaController::class);
    
    // Pengumuman CRUD routes
    Route::resource('pengumuman', PengumumanController::class);
    // Galeri CRUD routes
    Route::resource('galeri', GaleriController::class);
    Route::resource('guru', App\Http\Controllers\GuruController::class);
});

require __DIR__.'/auth.php';
