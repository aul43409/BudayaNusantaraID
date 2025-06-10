<?php

namespace App\Http\Controllers;

use App\Models\Gallery;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Storage;

class GalleryController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function index(Request $request)
    {
        $query = Gallery::query();

        // Filter berdasarkan category jika ada
        if ($request->filled('category') && $request->category !== 'semua') {
            $query->where('category', $request->category);
        }

        // Filter berdasarkan region jika ada
        if ($request->filled('region')) {
            $query->where('region', 'like', '%' . $request->region . '%');
        }

        // Search berdasarkan title atau description
        if ($request->filled('search')) {
            $query->where(function($q) use ($request) {
                $q->where('title', 'like', '%' . $request->search . '%')
                  ->orWhere('description', 'like', '%' . $request->search . '%');
            });
        }

        // Sorting
        switch ($request->get('sort', 'recent')) {
            case 'popular':
                // Untuk sekarang gunakan created_at, nanti bisa ditambah field views
                $query->orderBy('created_at', 'desc');
                break;
            case 'recent':
            default:
                $query->orderBy('created_at', 'desc');
                break;
        }

        $galleries = $query->paginate(12);
        
        // Ambil semua kategori dan region yang unik dari database
        $categories = Gallery::distinct()->pluck('category')->filter()->sort()->values();
        $regions = Gallery::distinct()->pluck('region')->filter()->sort()->values();

        return view('gallery.index', compact('galleries', 'categories', 'regions'));
    }

    /**
     * Display the specified resource.
     */
    public function show(Gallery $gallery)
    {
        return view('gallery.show', compact('gallery'));
    }

    /**
     * Show the form for creating a new resource.
     */
    public function create()
    {
        // Daftar kategori dan region yang tersedia
        $categories = [
            'tari-tradisional' => 'Tari Tradisional',
            'musik-tradisional' => 'Musik Tradisional',
            'kerajinan' => 'Kerajinan',
            'kuliner' => 'Kuliner',
            'pakaian-adat' => 'Pakaian Adat',
            'upacara-adat' => 'Upacara Adat',
            'arsitektur' => 'Arsitektur',
            'lainnya' => 'Lainnya'
        ];

        $regions = [
            'Aceh', 'Sumatera Utara', 'Sumatera Barat', 'Riau', 'Kepulauan Riau', 
            'Jambi', 'Sumatera Selatan', 'Bengkulu', 'Lampung', 'Bangka Belitung',
            'DKI Jakarta', 'Jawa Barat', 'Jawa Tengah', 'DI Yogyakarta', 'Jawa Timur',
            'Banten', 'Bali', 'Nusa Tenggara Barat', 'Nusa Tenggara Timur',
            'Kalimantan Barat', 'Kalimantan Tengah', 'Kalimantan Selatan', 'Kalimantan Timur', 'Kalimantan Utara',
            'Sulawesi Utara', 'Sulawesi Tengah', 'Sulawesi Selatan', 'Sulawesi Tenggara', 'Gorontalo', 'Sulawesi Barat',
            'Maluku', 'Maluku Utara', 'Papua', 'Papua Barat', 'Papua Selatan', 'Papua Tengah', 'Papua Pegunungan', 'Papua Barat Daya'
        ];

        return view('gallery.create', compact('categories', 'regions'));
    }

    /**
     * Store a newly created resource in storage.
     */
    public function store(Request $request)
    {
        $validated = $request->validate([
            'title' => 'required|string|max:255',
            'category' => 'required|string',
            'region' => 'required|string',
            'image' => 'required|image|mimes:jpeg,png,jpg,gif|max:2048',
            'description' => 'nullable|string',
        ]);

        // Handle image upload
        if ($request->hasFile('image')) {
            $imagePath = $request->file('image')->store('galleries', 'public');
            $validated['image_path'] = $imagePath;
            unset($validated['image']); // Remove 'image' from validated data
        }

        Gallery::create($validated);

        return redirect()->route('gallery.index')->with('success', 'Galeri berhasil ditambahkan.');
    }

    /**
     * Show the form for editing the specified resource.
     */
    public function edit(Gallery $gallery)
    {
        $categories = [
            'tari-tradisional' => 'Tari Tradisional',
            'musik-tradisional' => 'Musik Tradisional',
            'kerajinan' => 'Kerajinan',
            'kuliner' => 'Kuliner',
            'pakaian-adat' => 'Pakaian Adat',
            'upacara-adat' => 'Upacara Adat',
            'arsitektur' => 'Arsitektur',
            'lainnya' => 'Lainnya'
        ];

        $regions = [
            'Aceh', 'Sumatera Utara', 'Sumatera Barat', 'Riau', 'Kepulauan Riau', 
            'Jambi', 'Sumatera Selatan', 'Bengkulu', 'Lampung', 'Bangka Belitung',
            'DKI Jakarta', 'Jawa Barat', 'Jawa Tengah', 'DI Yogyakarta', 'Jawa Timur',
            'Banten', 'Bali', 'Nusa Tenggara Barat', 'Nusa Tenggara Timur',
            'Kalimantan Barat', 'Kalimantan Tengah', 'Kalimantan Selatan', 'Kalimantan Timur', 'Kalimantan Utara',
            'Sulawesi Utara', 'Sulawesi Tengah', 'Sulawesi Selatan', 'Sulawesi Tenggara', 'Gorontalo', 'Sulawesi Barat',
            'Maluku', 'Maluku Utara', 'Papua', 'Papua Barat', 'Papua Selatan', 'Papua Tengah', 'Papua Pegunungan', 'Papua Barat Daya'
        ];

        return view('gallery.edit', compact('gallery', 'categories', 'regions'));
    }

    /**
     * Update the specified resource in storage.
     */
  public function update(Request $request, Gallery $gallery)
{
    $validated = $request->validate([
        'title' => 'required|string|max:255',
        'category' => 'required|string|max:255',
        'region' => 'required|string|max:255',
        'image_option' => 'required|in:file,url',
        'image_file' => 'nullable|image|mimes:jpeg,png,jpg,gif|max:2048',
        'image_url' => 'nullable|url',
        'description' => 'nullable|string',
    ]);

    $gallery->title = $validated['title'];
    $gallery->category = $validated['category'];
    $gallery->region = $validated['region'];
    $gallery->description = $validated['description'] ?? null;

    // Handle image
    if ($validated['image_option'] === 'file' && $request->hasFile('image_file')) {
        // Delete old image if exists
        if ($gallery->image_path && Storage::disk('public')->exists($gallery->image_path)) {
            Storage::disk('public')->delete($gallery->image_path);
        }

        $imagePath = $request->file('image_file')->store('galleries', 'public');
        $gallery->image_path = $imagePath;

    } elseif ($validated['image_option'] === 'url' && !empty($validated['image_url'])) {
        // Delete old image if exists (only if it was uploaded before)
        if ($gallery->image_path && Storage::disk('public')->exists($gallery->image_path)) {
            Storage::disk('public')->delete($gallery->image_path);
        }

        // Simpan URL langsung (jika Anda simpan sebagai path, sesuaikan field-nya)
        $gallery->image_path = $validated['image_url'];
    }

    $gallery->save();

    return redirect()->route('gallery.show', $gallery)->with('success', 'Galeri berhasil diperbarui.');
}

    /**
     * Remove the specified resource from storage.
     */
    public function destroy(Gallery $gallery)
    {
        // Delete image file if exists
        if ($gallery->image_path && Storage::disk('public')->exists($gallery->image_path)) {
            Storage::disk('public')->delete($gallery->image_path);
        }

        $gallery->delete();

        return redirect()->route('gallery.index')->with('success', 'Galeri berhasil dihapus.');
    }

    /**
     * Display galleries by category.
     */
    public function byCategory($category)
    {
        $galleries = Gallery::where('category', $category)
                           ->orderBy('created_at', 'desc')
                           ->paginate(12);
        
        $categoryNames = [
            'tari-tradisional' => 'Tari Tradisional',
            'musik-tradisional' => 'Musik Tradisional',
            'kerajinan' => 'Kerajinan',
            'kuliner' => 'Kuliner',
            'pakaian-adat' => 'Pakaian Adat',
            'upacara-adat' => 'Upacara Adat',
            'arsitektur' => 'Arsitektur',
            'lainnya' => 'Lainnya'
        ];

        $categoryName = $categoryNames[$category] ?? 'Kategori';

        return view('gallery.category', compact('galleries', 'category', 'categoryName'));
    }

    /**
     * Search galleries.
     */
    public function search(Request $request)
    {
        $query = $request->get('q');

        if (!$query) {
            return redirect()->route('gallery.index');
        }

        $galleries = Gallery::where('title', 'like', '%' . $query . '%')
                           ->orWhere('description', 'like', '%' . $query . '%')
                           ->orderBy('created_at', 'desc')
                           ->paginate(12);

        return view('gallery.search', compact('galleries', 'query'));
    }
}