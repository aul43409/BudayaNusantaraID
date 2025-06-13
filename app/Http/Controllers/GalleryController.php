<?php

namespace App\Http\Controllers;

use App\Models\Gallery;
use Illuminate\Http\Request;
use Illuminate\Support\Str;

class GalleryController extends Controller
{
    public function index(Request $request)
    {
        $query = Gallery::query();

        if ($request->filled('category') && $request->category !== 'semua') {
            $query->where('category', $request->category);
        }

        if ($request->filled('region')) {
            $query->where('region', 'like', '%' . $request->region . '%');
        }

        if ($request->filled('search')) {
            $query->where(function ($q) use ($request) {
                $q->where('title', 'like', '%' . $request->search . '%')
                  ->orWhere('description', 'like', '%' . $request->search . '%');
            });
        }

        $galleries = $query->latest()->paginate(12)->withQueryString();
        $totalGalleries = Gallery::count();
        $totalRegions = Gallery::select('region')->distinct()->count();
        $totalViews = Gallery::sum('views');

        return view('galeri.index', compact('galleries', 'totalGalleries', 'totalRegions', 'totalViews'));
    }

    public function publicGallery()
    {
        $galleries = Gallery::latest()->get();
        $totalGalleries = Gallery::count();
        $totalRegions = Gallery::select('region')->distinct()->count();
        $totalViews = Gallery::sum('views');

        return view('galeri.public', compact('galleries', 'totalGalleries', 'totalRegions', 'totalViews'));
    }

    public function show(Gallery $gallery)
    {
        $gallery->increment('views');
        return view('galeri.show', compact('gallery'));
    }

    public function create()
    {
        return view('galeri.create', [
            'categories' => $this->getCategories(),
            'regions' => $this->getRegions()
        ]);
    }

    public function store(Request $request)
    {
        $validated = $request->validate([
            'title' => 'required|string|max:255',
            'category' => 'required|string',
            'region' => 'required|string',
            'description' => 'required|string',
            'image_url' => 'required|url',
            'is_featured' => 'nullable|boolean',
        ]);
        

        Gallery::create([
            'title' => $validated['title'],
            'slug' => Str::slug($validated['title']) . '-' . uniqid(),
            'category' => $validated['category'],
            'region' => $validated['region'],
            'description' => $validated['description'],
            // FIX: Ubah 'image' menjadi 'image_url' untuk konsistensi
            'image_url' => $validated['image_url'],
            'is_featured' => $request->has('is_featured'),
            'views' => 0,
        ]);


        return redirect()->route('dashboard')->with('success', 'Galeri berhasil ditambahkan.');
    }

    public function edit(Gallery $gallery)
    {
        return view('galeri.edit', [
            'gallery' => $gallery,
            'categories' => $this->getCategories(),
            'regions' => $this->getRegions()
        ]);
    }

    public function update(Request $request, Gallery $gallery)
    {
        $validated = $request->validate([
            'title' => 'required|string|max:255',
            'category' => 'required|string',
            'region' => 'required|string',
            'description' => 'nullable|string',
            'image_url' => 'nullable|url',
            'is_featured' => 'nullable|boolean',
        ]);

        $data = [
            'title' => $validated['title'],
            'category' => $validated['category'],
            'region' => $validated['region'],
            'description' => $validated['description'] ?? null,
            'is_featured' => $request->has('is_featured'),
        ];

        // FIX: Ubah 'image' menjadi 'image_url' untuk konsistensi
        if (!empty($validated['image_url'])) {
            $data['image_url'] = $validated['image_url'];
        }

        $gallery->update($data);

        return redirect()->route('galeri.public.show', $gallery)->with('success', 'Galeri diperbarui.');
    }

    public function destroy(Gallery $gallery)
    {
        $gallery->delete();
        return redirect()->route('galeri.index')->with('success', 'Galeri dihapus.');
    }

    public function search(Request $request)
    {
        $query = $request->get('q');

        if (!$query) {
            return redirect()->route('galeri.index');
        }

        $galleries = Gallery::where('title', 'like', "%$query%")
            ->orWhere('description', 'like', "%$query%")
            ->latest()->paginate(12);

        return view('galeri.search', compact('galleries', 'query'));
    }

    private function getCategories(): array
    {
        return [
            'pakaian_adat' => 'Pakaian Adat',
            'tarian' => 'Tarian',
            'rumah_adat' => 'Rumah Adat',
            'kerajinan' => 'Kerajinan',
            'upacara' => 'Upacara',
            'kuliner' => 'Kuliner',
        ];
    }

    private function getRegions(): array
    {
        return [
            'Aceh', 'Sumatera Utara', 'Sumatera Barat', 'Riau', 'Kepulauan Riau',
            'Jambi', 'Sumatera Selatan', 'Bengkulu', 'Lampung', 'Bangka Belitung',
            'DKI Jakarta', 'Jawa Barat', 'Jawa Tengah', 'DI Yogyakarta', 'Jawa Timur',
            'Banten', 'Bali', 'Nusa Tenggara Barat', 'Nusa Tenggara Timur',
            'Kalimantan Barat', 'Kalimantan Tengah', 'Kalimantan Selatan',
            'Kalimantan Timur', 'Kalimantan Utara', 'Sulawesi Utara',
            'Sulawesi Tengah', 'Sulawesi Selatan', 'Sulawesi Tenggara',
            'Gorontalo', 'Sulawesi Barat', 'Maluku', 'Maluku Utara',
            'Papua', 'Papua Barat', 'Papua Selatan', 'Papua Tengah',
            'Papua Pegunungan', 'Papua Barat Daya'
        ];
    }
}