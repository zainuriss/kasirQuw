<?php

use App\Http\Controllers\AdminController;
use Illuminate\Support\Facades\Route;
use App\Http\Controllers\HomeController;
use App\Http\Controllers\ProfileController;

Route::get('/', function () {
    return view('auth.login');
});

Route::get('/dashboard', [HomeController::class, 'userindex'])->middleware(['auth', 'verified'])->name('dashboard');

Route::prefix('admin')->name('admin.')->middleware(['auth', 'verified'])->group(function () {
    // Dashboard Admin
    Route::get('/dashboard', [HomeController::class, 'admindex'])->name('dashboard');

    // Group Route untuk Petugas
    Route::prefix('petugas')->name('petugas.')->group(function () {
        Route::get('/', [AdminController::class, 'petugasPage'])->name('index'); // Halaman utama petugas
        Route::get('/tambah', [AdminController::class, 'inpetugas'])->name('create'); // Halaman tambah petugas
        Route::post('/tambah', [AdminController::class, 'addpetugas'])->name('store'); // Aksi tambah petugas
        Route::get('/detail/{id}', [AdminController::class, 'detailpetugas'])->name('show'); // Detail petugas
        Route::get('/delete/{id}', [AdminController::class, 'deletepetugas'])->name('destroy'); // Hapus petugas
        Route::get('/trash', [AdminController::class, 'petugastrash'])->name('trash'); // Halaman recycle bin
        Route::get('/restore/{id}', [AdminController::class, 'restorepetugas'])->name('restore'); // Restore petugas
        Route::get('/edit/{id}', [AdminController::class, 'editpetugas'])->name('edit'); // Halaman edit petugas
        Route::post('/edit/{id}', [AdminController::class, 'updatepetugas'])->name('update'); // Aksi edit petugas
    });

    Route::prefix('produk')->name('produk.')->group(function () {
        Route::get('/', [AdminController::class, 'produkPage'])->name('index');
        Route::get('/detail/{id}', [AdminController::class, 'detailproduk'])->name('show'); // Detail petugas
        Route::get('/tambah', [AdminController::class, 'tambahproduk'])->name('create');
        Route::post('/store', [AdminController::class, 'storeproduk'])->name('store');
        Route::get('/delete/{id}', [AdminController::class, 'deleteproduk'])->name('destroy');
        Route::get('/trash', [AdminController::class, 'produktrash'])->name('trash');
        Route::get('/restore/{id}', [AdminController::class, 'restoreproduk'])->name('restore');
        Route::get('/edit/{id}', [AdminController::class, 'editproduk'])->name('edit');
        Route::post('/update/{id}', [AdminController::class, 'updateproduk'])->name('update');
        Route::post('/import', [AdminController::class, 'importProduk'])->name('import');  
        Route::get('/download-template', [AdminController::class, 'templateProduk'])->name('download-template');
    });

    Route::prefix('kategori')->name('kategori.')->group(function () {
        Route::get('/', [AdminController::class, 'kategoriPage'])->name('index');
        Route::get('/tambah', [AdminController::class, 'tambahkategori'])->name('create');
        Route::post('/tambah', [AdminController::class, 'storekategori'])->name('store');
        Route::get('/delete/{id}', [AdminController::class, 'deletekategori'])->name('destroy');
        Route::get('/trash', [AdminController::class, 'kategoritrash'])->name('trash');
        Route::get('/restore/{id}', [AdminController::class, 'restorekategori'])->name('restore');
        Route::get('/edit/{id}', [AdminController::class, 'editkategori'])->name('edit');
        Route::post('/edit/{id}', [AdminController::class, 'updatekategori'])->name('update');
    });
});


Route::middleware('auth')->group(function () {
    Route::get('/profile', [ProfileController::class, 'edit'])->name('profile.edit');
    Route::patch('/profile', [ProfileController::class, 'update'])->name('profile.update');
    Route::delete('/profile', [ProfileController::class, 'destroy'])->name('profile.destroy');
});

require __DIR__.'/auth.php';
