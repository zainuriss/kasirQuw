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
    Route::get('/petugas', [AdminController::class, 'petugasPage'])->name('admin.petugas');
    Route::get('/tambah-petugas', [AdminController::class, 'inpetugas'])->name('admin.inpetugas');
    Route::post('/tambah-petugas', [AdminController::class, 'addpetugas'])->name('admin.addpetugas');
});

Route::middleware('auth')->group(function () {
    Route::get('/profile', [ProfileController::class, 'edit'])->name('profile.edit');
    Route::patch('/profile', [ProfileController::class, 'update'])->name('profile.update');
    Route::delete('/profile', [ProfileController::class, 'destroy'])->name('profile.destroy');
});

require __DIR__.'/auth.php';
