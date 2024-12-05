<?php

use App\Http\Controllers\AdminController;
use Illuminate\Support\Facades\Route;
use App\Http\Controllers\HomeController;
use App\Http\Controllers\ProfileController;

Route::get('/', function () {
    return view('auth.login');
});

Route::get('/dashboard', [HomeController::class, 'userindex'])->middleware(['auth', 'verified'])->name('dashboard');

Route::prefix('admin')->group(function () {
    Route::get('/dashboard', [HomeController::class, 'admindex'])->middleware(['auth', 'verified'])->name('admin.dashboard');
    Route::prefix('petugas')->group(function () {
        Route::get('/', [AdminController::class, 'petugasPage'])->name('admin.petugas');
        Route::get('/tambah-petugas', [AdminController::class, 'inpetugas'])->name('admin.inpetugas');
        Route::post('/tambah-petugas', [AdminController::class, 'addpetugas'])->name('admin.addpetugas');
        Route::get('/detail-petugas/{id}', [AdminController::class, 'detailpetugas'])->name('admin.detailpetugas');
        Route::get('/delete-petugas/{id}', [AdminController::class, 'deletepetugas'])->name('admin.deletepetugas');
    });
});

Route::middleware('auth')->group(function () {
    Route::get('/profile', [ProfileController::class, 'edit'])->name('profile.edit');
    Route::patch('/profile', [ProfileController::class, 'update'])->name('profile.update');
    Route::delete('/profile', [ProfileController::class, 'destroy'])->name('profile.destroy');
});

require __DIR__.'/auth.php';
