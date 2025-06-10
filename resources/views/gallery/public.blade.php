@extends('layouts.app')

@section('title', 'Galeri - Keragaman Budaya Indonesia')

@section('content')
<div class="container py-5">
    <div class="row mb-4">
        <div class="col-md-12 text-center">
            <h1 class="display-4 fw-bold text-danger">Galeri Keragaman Budaya Indonesia</h1>
            <p class="lead">Menelusuri keindahan dan keunikan budaya dari berbagai penjuru Nusantara</p>
        </div>
    </div>
    
    <!-- Search & Filter Section -->
    <div class="row mb-4">
        <div class="col-12">
            <div class="card border-0 shadow-sm">
                <div class="card-body">
                    <form method="GET" action="{{ route('gallery.public') }}" class="row g-3">
                        <div class="col-md-6">
                            <div class="input-group">
                                <span class="input-group-text"><i class="fas fa-search"></i></span>
                                <input type="text" class="form-control" name="search" 
                                       placeholder="Cari budaya Indonesia..." 
                                       value="{{ request('search') }}">
                            </div>
                        </div>
                        <div class="col-md-3">
                            <select class="form-select" name="category">
                                <option value="">Semua Kategori</option>
                                <option value="pakaian_adat" {{ request('category') == 'pakaian_adat' ? 'selected' : '' }}>Pakaian Adat</option>
                                <option value="tarian" {{ request('category') == 'tarian' ? 'selected' : '' }}>Tarian</option>
                                <option value="rumah_adat" {{ request('category') == 'rumah_adat' ? 'selected' : '' }}>Rumah Adat</option>
                                <option value="kerajinan" {{ request('category') == 'kerajinan' ? 'selected' : '' }}>Kerajinan</option>
                                <option value="upacara" {{ request('category') == 'upacara' ? 'selected' : '' }}>Upacara</option>
                                <option value="kuliner" {{ request('category') == 'kuliner' ? 'selected' : '' }}>Kuliner</option>
                            </select>
                        </div>
                        <div class="col-md-3">
                            <button type="submit" class="btn btn-danger w-100">
                                <i class="fas fa-filter"></i> Filter
                            </button>
                        </div>
                    </form>
                </div>
            </div>
        </div>
    </div>
    
    <!-- Category Tags -->
    <div class="row mb-4">
        <div class="col-12">
            <div class="d-flex flex-wrap gap-2 justify-content-center">
                <a href="{{ route('gallery.public') }}" 
                   class="btn btn-sm {{ request('category') == '' ? 'btn-danger' : 'btn-outline-danger' }}">
                    Semua
                </a>
                <a href="{{ route('gallery.public', ['category' => 'pakaian_adat']) }}" 
                   class="btn btn-sm {{ request('category') == 'pakaian_adat' ? 'btn-danger' : 'btn-outline-danger' }}">
                    Pakaian Adat
                </a>
                <a href="{{ route('gallery', ['category' => 'tarian']) }}" 
                   class="btn btn-sm {{ request('category') == 'tarian' ? 'btn-danger' : 'btn-outline-danger' }}">
                    Tarian
                </a>
                <a href="{{ route('gallery.public', ['category' => 'rumah_adat']) }}" 
                   class="btn btn-sm {{ request('category') == 'rumah_adat' ? 'btn-danger' : 'btn-outline-danger' }}">
                    Rumah Adat
                </a>
                <a href="{{ route('gallery.public', ['category' => 'kerajinan']) }}" 
                   class="btn btn-sm {{ request('category') == 'kerajinan' ? 'btn-danger' : 'btn-outline-danger' }}">
                    Kerajinan
                </a>
                <a href="{{ route('gallery.public', ['category' => 'upacara']) }}" 
                   class="btn btn-sm {{ request('category') == 'upacara' ? 'btn-danger' : 'btn-outline-danger' }}">
                    Upacara
                </a>
                <a href="{{ route('gallery.public', ['category' => 'kuliner']) }}" 
                   class="btn btn-sm {{ request('category') == 'kuliner' ? 'btn-danger' : 'btn-outline-danger' }}">
                    Kuliner
                </a>
            </div>
        </div>
    </div>
    
    @if($galleries->count() > 0)
        <!-- Featured Item -->
        @if($featuredGallery && !request('search') && !request('category'))
        <div class="row mb-5">
            <div class="col-12">
                <div class="card bg-dark text-white border-0 rounded-3 overflow-hidden position-relative">
                    <img src="{{ asset('storage/' . $featuredGallery->image) }}" 
                         class="card-img" 
                         alt="{{ $featuredGallery->title }}" 
                         style="height: 500px; object-fit: cover; filter: brightness(0.7);">
                    <div class="card-img-overlay d-flex flex-column justify-content-end" 
                         style="background: linear-gradient(0deg, rgba(0,0,0,0.8) 0%, rgba(0,0,0,0) 60%);">
                        <div class="container">
                            <div class="row">
                                <div class="col-lg-8">
                                    <span class="badge bg-danger mb-3 fs-6">
                                        <i class="fas fa-star"></i> Unggulan
                                    </span>
                                    <h2 class="card-title display-5 fw-bold mb-3">{{ $featuredGallery->title }}</h2>
                                    <p class="card-text fs-5 mb-3">{{ Str::limit($featuredGallery->description, 200) }}</p>
                                    <div class="d-flex align-items-center mb-4">
                                        <span class="badge bg-light text-dark me-3">{{ $featuredGallery->region }}</span>
                                        <span class="badge bg-light text-dark">{{ ucfirst(str_replace('_', ' ', $featuredGallery->category)) }}</span>
                                    </div>
                                    <a href="{{ route('gallery.public.show', $featuredGallery) }}" 
                                       class="btn btn-outline-light btn-lg">
                                        <i class="fas fa-eye"></i> Lihat Detail
                                    </a>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>
        @endif
        
        <!-- Results Info -->
        <div class="row mb-3">
            <div class="col-md-6">
                <p class="text-muted mb-0">
                    Menampilkan {{ $galleries->count() }} dari {{ $galleries->total() }} galeri
                    @if(request('search'))
                        untuk pencarian "<strong>{{ request('search') }}</strong>"
                    @endif
                    @if(request('category'))
                        dalam kategori "<strong>{{ ucfirst(str_replace('_', ' ', request('category'))) }}</strong>"
                    @endif
                </p>
            </div>
            <div class="col-md-6 text-end">
                @if(request('search') || request('category'))
                    <a href="{{ route('gallery.public') }}" class="btn btn-sm btn-outline-secondary">
                        <i class="fas fa-times"></i> Reset Filter
                    </a>
                @endif
            </div>
        </div>
        
        <!-- Gallery Grid -->
        <div class="row g-4 mb-5">
            @foreach($galleries as $gallery)
            <div class="col-lg-4 col-md-6">
                <div class="card h-100 gallery-card border-0 shadow-sm">
                    <div class="position-relative overflow-hidden">
                        <img src="{{ asset('storage/' . $gallery->image) }}" 
                             class="card-img-top" 
                             alt="{{ $gallery->title }}" 
                             style="height: 250px; object-fit: cover; transition: transform 0.3s ease;">
                        
                        <!-- Category Badge -->
                        <div class="position-absolute top-0 end-0 m-3">
                            <span class="badge bg-danger">{{ ucfirst(str_replace('_', ' ', $gallery->category)) }}</span>
                        </div>
                        
                        <!-- Featured Badge -->
                        @if($gallery->is_featured)
                        <div class="position-absolute top-0 start-0 m-3">
                            <span class="badge bg-warning text-dark">
                                <i class="fas fa-star"></i> Unggulan
                            </span>
                        </div>
                        @endif
                        
                        <!-- Overlay on Hover -->
                        <div class="card-img-overlay d-flex align-items-center justify-content-center gallery-overlay">
                            <a href="{{ route('gallery.public.show', $gallery) }}" 
                               class="btn btn-light btn-lg">
                                <i class="fas fa-eye"></i> Lihat Detail
                            </a>
                        </div>
                    </div>
                    
                    <div class="card-body">
                        <div class="d-flex justify-content-between align-items-start mb-2">
                            <span class="region-marker">{{ $gallery->region }}</span>
                            <small class="text-muted">{{ $gallery->created_at->format('d M Y') }}</small>
                        </div>
                        <h5 class="card-title">{{ $gallery->title }}</h5>
                        <p class="card-text text-muted">{{ Str::limit($gallery->description, 120) }}</p>
                        
                        <!-- Meta Info -->
                        <div class="d-flex justify-content-between align-items-center mt-3">
                            <small class="text-muted">
                                <i class="fas fa-eye"></i> {{ $gallery->views ?? 0 }} views
                            </small>
                            <a href="{{ route('gallery.public.show', $gallery) }}" 
                               class="btn btn-sm btn-outline-danger">
                                Selengkapnya
                            </a>
                        </div>
                    </div>
                </div>
            </div>
            @endforeach
        </div>
        
        <!-- Pagination -->
        <div class="row">
            <div class="col-12">
                <div class="d-flex justify-content-center">
                    {{ $galleries->withQueryString()->links() }}
                </div>
            </div>
        </div>
        
    @else
        <!-- Empty State -->
        <div class="row">
            <div class="col-12">
                <div class="text-center py-5">
                    <div class="card border-0 bg-light">
                        <div class="card-body py-5">
                            <i class="fas fa-search fa-4x text-muted mb-4"></i>
                            @if(request('search') || request('category'))
                                <h3 class="text-muted mb-3">Tidak Ada Hasil Ditemukan</h3>
                                <p class="text-muted mb-4">
                                    Maaf, tidak ada galeri yang sesuai dengan pencarian Anda.
                                    <br>Coba gunakan kata kunci lain atau ubah filter kategori.
                                </p>
                                <a href="{{ route('gallery.public') }}" class="btn btn-danger">
                                    <i class="fas fa-home"></i> Lihat Semua Galeri
                                </a>
                            @else
                                <h3 class="text-muted mb-3">Belum Ada Galeri</h3>
                                <p class="text-muted">Galeri budaya Indonesia akan segera hadir di sini.</p>
                            @endif
                        </div>
                    </div>
                </div>
            </div>
        </div>
    @endif
    
    <!-- Statistics Section -->
    @if($totalGalleries > 0)
    <div class="row mt-5">
        <div class="col-12">
            <div class="card bg-danger text-white border-0">
                <div class="card-body text-center py-4">
                    <h4 class="mb-4">Jelajahi Kekayaan Budaya Indonesia</h4>
                    <div class="row">
                        <div class="col-md-3">
                            <h2 class="fw-bold">{{ $totalGalleries }}</h2>
                            <p class="mb-0">Total Galeri</p>
                        </div>
                        <div class="col-md-3">
                            <h2 class="fw-bold">{{ $totalRegions }}</h2>
                            <p class="mb-0">Daerah</p>
                        </div>
                        <div class="col-md-3">
                            <h2 class="fw-bold">6</h2>
                            <p class="mb-0">Kategori</p>
                        </div>
                        <div class="col-md-3">
                            <h2 class="fw-bold">{{ $totalViews }}</h2>
                            <p class="mb-0">Total Views</p>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>
    @endif
</div>

<style>
.gallery-card {
    transition: all 0.3s ease;
    border-radius: 15px;
}

.gallery-card:hover {
    transform: translateY(-10px);
    box-shadow: 0 15px 35px rgba(0,0,0,0.1);
}

.gallery-card .card-img-top {
    border-radius: 15px 15px 0 0;
}

.gallery-card:hover .card-img-top {
    transform: scale(1.05);
}

.gallery-overlay {
    opacity: 0;
    background: rgba(0,0,0,0.7);
    transition: opacity 0.3s ease;
}

.gallery-card:hover .gallery-overlay {
    opacity: 1;
}

.region-marker {
    background: linear-gradient(45deg, #dc3545, #c82333);
    color: white;
    font-size: 0.75rem;
    padding: 0.25rem 0.75rem;
    border-radius: 20px;
    font-weight: 500;
}

.btn-outline-danger:hover {
    transform: translateY(-1px);
    box-shadow: 0 4px 8px rgba(220, 53, 69, 0.3);
}

.pagination .page-link {
    color: #dc3545;
    border-color: #dc3545;
}

.pagination .page-item.active .page-link {
    background-color: #dc3545;
    border-color: #dc3545;
}

.form-control:focus, .form-select:focus {
    border-color: #dc3545;
    box-shadow: 0 0 0 0.2rem rgba(220, 53, 69, 0.25);
}

@media (max-width: 768px) {
    .display-4 {
        font-size: 2.5rem;
    }
    
    .gallery-card {
        margin-bottom: 1rem;
    }
}
</style>
@endsection