<?php

use Illuminate\Support\Facades\Route;
use App\Http\Controllers\PagesController;
use App\Http\Controllers\ProfileController;
use App\Http\Controllers\GalleryController;
use App\Models\Gallery;

// Home route – tampilkan galeri terbaru
Route::get('/', function () {
    $galleries = Gallery::latest()->take(6)->get();
    return view('pages.home', compact('galleries'));
})->name('home');

// Halaman statis
Route::get('/about', fn() => view('pages.about'))->name('about');

// Halaman galeri publik
Route::get('/gallery', [GalleryController::class, 'publicGallery'])->name('galeri.public');
Route::get('/gallery/{gallery}', [GalleryController::class, 'show'])->name('galeri.public.show');

// Halaman kontak
Route::get('/contact', [PagesController::class, 'contact'])->name('contact');

// Dashboard (hanya user login & terverifikasi)
Route::get('/dashboard', function () {
    $totalGalleries = Gallery::count();
    return view('dashboard', compact('totalGalleries'));
})->middleware(['auth', 'verified'])->name('dashboard');

// Route yang memerlukan login
Route::middleware('auth')->group(function () {
    // Galeri - admin/dashboard
    Route::get('/dashboard/gallery', [GalleryController::class, 'index'])->name('galeri.index');
    Route::get('/dashboard/gallery/create', [GalleryController::class, 'create'])->name('galeri.create');
    Route::post('/dashboard/gallery', [GalleryController::class, 'store'])->name('galeri.store');
    Route::get('/dashboard/gallery/{gallery}', [GalleryController::class, 'show'])->name('galeri.show');
    Route::get('/dashboard/gallery/{gallery}/edit', [GalleryController::class, 'edit'])->name('galeri.edit');
    Route::put('/dashboard/gallery/{gallery}', [GalleryController::class, 'update'])->name('galeri.update');
    Route::delete('/dashboard/gallery/{gallery}', [GalleryController::class, 'destroy'])->name('galeri.destroy');

    // Profile
    Route::get('/profile', [ProfileController::class, 'edit'])->name('profile.edit');
    Route::patch('/profile', [ProfileController::class, 'update'])->name('profile.update');
    Route::delete('/profile', [ProfileController::class, 'destroy'])->name('profile.destroy');
});

// Auth routes
require __DIR__.'/auth.php';
