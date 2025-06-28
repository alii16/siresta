<?php

use App\Http\Controllers\ProfileController;
use Illuminate\Support\Facades\Route;
use App\Http\Controllers\WisataController;
use App\Http\Controllers\Admin\WisataAdminController;
use App\Http\Controllers\ReviewController;
use App\Http\Controllers\DiskusiController;
use App\Http\Controllers\DashboardController;
use App\Http\Controllers\Admin\DiskusiAdminController;

Route::get('/', [WisataController::class, 'index'])->name('wisata.index');
Route::get('/wisata/{id}', [WisataController::class, 'show'])->name('wisata.detail');

Route::middleware(['auth', 'admin'])->prefix('admin')->name('admin.')->group(function () {
    Route::resource('wisata', WisataAdminController::class);
    Route::resource('diskusi', DiskusiAdminController::class)->only(['index', 'show']);
    Route::delete('diskusi/{id}', [DiskusiAdminController::class, 'destroy'])->name('diskusi.destroy');
    Route::delete('/admin/diskusi/{wisata}/destroy-all', [DiskusiAdminController::class, 'destroyAll'])->name('diskusi.destroyAll');
});

Route::post('/review', [ReviewController::class, 'store'])->middleware('auth')->name('review.store');
Route::post('/diskusi', [DiskusiController::class, 'store'])->middleware('auth')->name('diskusi.store');

Route::get('/wisata/filter', [WisataController::class, 'filter'])->name('wisata.filter');

Route::middleware('auth')->group(function () {
    Route::get('/profile', [ProfileController::class, 'edit'])->name('profile.edit');
    Route::patch('/profile', [ProfileController::class, 'update'])->name('profile.update');
    Route::delete('/profile', [ProfileController::class, 'destroy'])->name('profile.destroy');
});

Route::get('/dashboard', [DashboardController::class, 'index'])
    ->middleware(['auth', 'verified'])
    ->name('dashboard');

require __DIR__.'/auth.php';
