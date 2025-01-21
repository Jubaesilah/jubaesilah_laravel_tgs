<?php

use App\Http\Controllers\HomeController;
use App\Http\Controllers\MahasiswaController;
use App\Http\Controllers\DosenController;
use App\Http\Controllers\ProfileController;
use Illuminate\Support\Facades\Route;

Route::get('/', function () {
    return view('welcome');
});

Route::get('/dashboard', function () {
    return view('dashboard');
})->middleware(['auth', 'verified'])->name('dashboard');

Route::middleware('auth')->group(function () {
    Route::get('/profile', [ProfileController::class, 'edit'])->name('profile.edit');
    Route::patch('/profile', [ProfileController::class, 'update'])->name('profile.update');
    Route::delete('/profile', [ProfileController::class, 'destroy'])->name('profile.destroy');
    
});

Route::get('/admin/dashboard', [HomeController::class,'admin'])->name('admin.dashboard');

Route::get('/dosen/dashboard', [HomeController::class,'dosen'])->name('dosen.dashboard');

Route::get('/admin/mahasiswa', [MahasiswaController::class,'index'])->name('admin.mahasiswa');
Route::post('/mahasiswa/tambah', [MahasiswaController::class,'tambah']);
Route::post('/mahasiswa/update', [MahasiswaController::class,'update']);
Route::post('/mahasiswa/hapus', [MahasiswaController::class,'hapus']);

Route::get('/dosen/dosen', [DosenController::class,'index'])->name('dosen.dosen');
Route::post('/dosen/tambah', [DosenController::class,'tambah']);
Route::post('/dosen/update', [DosenController::class,'update']);
Route::post('/dosen/hapus', [DosenController::class,'hapus']);



require __DIR__.'/auth.php';
