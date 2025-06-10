<?php

use Illuminate\Support\Facades\Route;
use App\Http\Controllers\PagesController;
use App\Http\Controllers\ProfileController;
use App\Http\Controllers\GalleryController;
use App\Models\Gallery;

/*
|--------------------------------------------------------------------------
| Web Routes
|--------------------------------------------------------------------------
*/

// Home route – tampilkan galeri terbaru
Route::get('/', function () {
    $galleries = Gallery::latest()->take(6)->get();
    return view('pages.home', compact('galleries'));
})->name('home');

// Halaman statis
Route::get('/about', function () {
    return view('pages.about');
})->name('about');

// Halaman galeri publik (view-only) - UBAH JADI /galleries
Route::get('/gallery', function () {
    $galleries = Gallery::latest()->get();
    return view('pages.gallery', compact('galleries'));
})->name('gallery.public');

// Halaman kontak
Route::get('/contact', [PagesController::class, 'contact'])->name('contact');

// Halaman dashboard (hanya user login & terverifikasi)
Route::get('/dashboard', function () {
    $totalGalleries = Gallery::count();
    return view('dashboard', compact('totalGalleries'));
})->middleware(['auth', 'verified'])->name('dashboard');

// Route khusus user login
Route::middleware('auth')->group(function () {
    // ROUTE GALLERY MANAGEMENT - TETAP GUNAKAN /dashboard/gallery seperti kode asli
    Route::get('/dashboard/gallery', [GalleryController::class, 'index'])->name('gallery.index');
    Route::get('/dashboard/gallery/create', [GalleryController::class, 'create'])->name('gallery.create');
    Route::post('/dashboard/gallery', [GalleryController::class, 'store'])->name('gallery.store');
    Route::get('/dashboard/gallery/{gallery}', [GalleryController::class, 'show'])->name('gallery.show');
    Route::get('/dashboard/gallery/{gallery}/edit', [GalleryController::class, 'edit'])->name('gallery.edit');
    Route::put('/dashboard/gallery/{gallery}', [GalleryController::class, 'update'])->name('gallery.update');
    Route::delete('/dashboard/gallery/{gallery}', [GalleryController::class, 'destroy'])->name('gallery.destroy');

    // Profile user
    Route::get('/profile', [ProfileController::class, 'edit'])->name('profile.edit');
    Route::patch('/profile', [ProfileController::class, 'update'])->name('profile.update');
    Route::delete('/profile', [ProfileController::class, 'destroy'])->name('profile.destroy');
});

// Auth bawaan Laravel Breeze
require __DIR__.'/auth.php';