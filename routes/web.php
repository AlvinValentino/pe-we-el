<?php

use Illuminate\Support\Facades\Route;
use App\Http\Controllers\MahasiswaController;
use App\Http\Controllers\MataKuliahController;
use App\Http\Controllers\DosenController;
use App\Http\Controllers\KrsController;

Route::get('/', function () {
    return view('welcome');
});

Route::get('/mahasiswa', [MahasiswaController::class, 'index'])->name('mahasiswa.index');
Route::get('/create-mahasiswa', [MahasiswaController::class, 'create'])->name('mahasiswa.create-form');
Route::get('/edit-mahasiswa/{id}', [MahasiswaController::class, 'edit'])->name('mahasiswa.edit-form');
Route::post('/store-mahasiswa', [MahasiswaController::class, 'store'])->name('mahasiswa.store');
Route::put('/update-mahasiswa/{id}', [MahasiswaController::class, 'update'])->name('mahasiswa.update');
Route::delete('/delete-mahasiswa/{id}', [MahasiswaController::class, 'destroy'])->name('mahasiswa.delete');

Route::get('/matakuliah', [MataKuliahController::class, 'index'])->name('matakuliah.index');
Route::get('/create-matakuliah', [MataKuliahController::class, 'create'])->name('matakuliah.create-form');
Route::get('/edit-matakuliah/{id}', [MataKuliahController::class, 'edit'])->name('matakuliah.edit-form');
Route::post('/store-matakuliah', [MataKuliahController::class, 'store'])->name('matakuliah.store');
Route::put('/update-matakuliah/{id}', [MataKuliahController::class, 'update'])->name('matakuliah.update');
Route::delete('/delete-matakuliah/{id}', [MataKuliahController::class, 'destroy'])->name('matakuliah.delete');

Route::get('/dosen', [DosenController::class, 'index'])->name('dosen.index');
Route::get('/create-dosen', [DosenController::class, 'create'])->name('dosen.create-form');
Route::get('/edit-dosen/{id}', [DosenController::class, 'edit'])->name('dosen.edit-form');
Route::post('/store-dosen', [DosenController::class, 'store'])->name('dosen.store');
Route::put('/update-dosen/{id}', [DosenController::class, 'update'])->name('dosen.update');
Route::delete('/delete-dosen/{id}', [DosenController::class, 'destroy'])->name('dosen.delete');

Route::get('/krs', [KrsController::class, 'index'])->name('krs.index');
Route::get('/create-krs', [KrsController::class, 'create'])->name('krs.create-form');
Route::get('/edit-krs/{id}', [KrsController::class, 'edit'])->name('krs.edit-form');
Route::post('/store-krs', [KrsController::class, 'store'])->name('krs.store');
Route::put('/update-krs/{id}', [KrsController::class, 'update'])->name('krs.update');
Route::delete('/delete-krs/{id}', [KrsController::class, 'destroy'])->name('krs.delete');

Route::get('/get-mata-kuliah-by-mahasiswa/{mahasiswa_id}', [KrsController::class, 'getMataKuliahByMahasiswa'])->name('krs.get-mata-kuliah-by-mahasiswa');