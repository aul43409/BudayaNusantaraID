@extends('layouts.app')

@section('title', 'Galeri - Keragaman Budaya Indonesia')

@section('content')
<div class="container py-5">
    <div class="row mb-4 text-center">
        <div class="col-md-12">
            <h1 class="display-4 fw-bold text-danger">Galeri Keragaman Budaya Indonesia</h1>
            <p class="lead">Menelusuri keindahan dan keunikan budaya dari berbagai penjuru Nusantara</p>
        </div>
    </div>

    @if($galleries->count() > 0)
        <!-- Result Info -->
        <div class="row mb-3">
            <div class="col-md-6">
                <p class="text-muted mb-0">
                    @php
                        $total = method_exists($galleries, 'total') ? $galleries->total() : $galleries->count();
                    @endphp
                    Menampilkan {{ $galleries->count() }} dari {{ $total }} galeri
                </p>
            </div>
        </div>

        <!-- Gallery Grid -->
        <div class="row g-4 mb-5">
            @foreach($galleries as $gallery)
            <div class="col-lg-4 col-md-6">
                <div class="card h-100 gallery-card border-0 shadow-sm">
                    <div class="position-relative overflow-hidden">
                        @if($gallery->image_url && filter_var($gallery->image_url, FILTER_VALIDATE_URL))
    <img src="{{ $gallery->image_url }}" 
         class="card-img-top" 
         alt="{{ $gallery->title }}" 
         style="height: 250px; object-fit: cover; transition: transform 0.3s ease;">
@else
                            <div class="card-img-top d-flex align-items-center justify-content-center bg-gradient" 
                                 style="height: 250px; background: linear-gradient(135deg, #dc3545, #c82333);">
                                <div class="text-center text-white">
                                    <i class="fas fa-image fa-3x mb-2"></i>
                                    <p class="mb-0 small">{{ $gallery->category ? ucfirst(str_replace('_', ' ', $gallery->category)) : 'Galeri' }}</p>
                                </div>
                            </div>
                        @endif

                        <div class="position-absolute top-0 end-0 m-3">
                            <span class="badge bg-danger">{{ ucfirst(str_replace('_', ' ', $gallery->category)) }}</span>
                        </div>

                        @if($gallery->is_featured)
                        <div class="position-absolute top-0 start-0 m-3">
                            <span class="badge bg-warning text-dark"><i class="fas fa-star"></i> Unggulan</span>
                        </div>
                        @endif

                        <!-- Gallery Overlay untuk hover effect -->
                        <div class="gallery-overlay position-absolute top-0 start-0 w-100 h-100 d-flex align-items-center justify-content-center">
                            <button class="btn btn-light btn-sm" data-bs-toggle="modal" data-bs-target="#galleryModal{{ $gallery->id }}">
                                <i class="fas fa-info-circle"></i> Info Detail
                            </button>
                        </div>
                    </div>

                    <div class="card-body">
                        <div class="d-flex justify-content-between mb-2">
                            <span class="region-marker">{{ $gallery->region }}</span>
                            <small class="text-muted">{{ $gallery->created_at->format('d M Y') }}</small>
                        </div>
                        <h5 class="card-title">{{ $gallery->title }}</h5>
                        <p class="card-text text-muted">{{ Str::limit($gallery->description, 120) }}</p>
                        <div class="d-flex justify-content-between align-items-center mt-3">
                            <small class="text-muted">
                                <i class="fas fa-eye"></i> {{ number_format($gallery->views ?? 0) }} views
                            </small>
                            <button class="btn btn-sm btn-outline-danger" data-bs-toggle="modal" data-bs-target="#galleryModal{{ $gallery->id }}">
                                <i class="fas fa-info-circle"></i> Selengkapnya
                            </button>
                        </div>
                    </div>
                </div>
            </div>
            @endforeach
        </div>

        <!-- Modals for Gallery Details -->
        @foreach($galleries as $gallery)
        <div class="modal fade" id="galleryModal{{ $gallery->id }}" tabindex="-1" aria-labelledby="galleryModalLabel{{ $gallery->id }}" aria-hidden="true">
            <div class="modal-dialog modal-lg modal-dialog-centered">
                <div class="modal-content border-0 shadow-lg">
                    <div class="modal-header bg-danger text-white">
                        <h5 class="modal-title" id="galleryModalLabel{{ $gallery->id }}">
                            <i class="fas fa-images me-2"></i>{{ $gallery->title }}
                        </h5>
                        <button type="button" class="btn-close btn-close-white" data-bs-dismiss="modal" aria-label="Close"></button>
                    </div>
                    <div class="modal-body p-0">
                        <!-- Image Section -->
                        <div class="position-relative">
                            @if($gallery->image_url && file_exists(public_path('storage/' . $gallery->image_url)))
                                <img src="{{ asset('storage/' . $gallery->image_url) }}" 
                                     class="w-100" 
                                     alt="{{ $gallery->title }}" 
                                     style="height: 300px; object-fit: cover;">
                            @else
                                <div class="w-100 d-flex align-items-center justify-content-center bg-gradient" 
                                     style="height: 300px; background: linear-gradient(135deg, #dc3545, #c82333);">
                                    <div class="text-center text-white">
                                        <i class="fas fa-image fa-4x mb-3"></i>
                                        <h5>{{ $gallery->category ? ucfirst(str_replace('_', ' ', $gallery->category)) : 'Galeri Budaya' }}</h5>
                                    </div>
                                </div>
                            @endif
                            
                            <!-- Badges on image -->
                            <div class="position-absolute top-0 end-0 m-3">
                                <span class="badge bg-white text-danger fs-6">{{ ucfirst(str_replace('_', ' ', $gallery->category)) }}</span>
                            </div>
                            
                            @if($gallery->is_featured)
                            <div class="position-absolute top-0 start-0 m-3">
                                <span class="badge bg-warning text-dark fs-6"><i class="fas fa-star"></i> Unggulan</span>
                            </div>
                            @endif
                        </div>
                        
                        <!-- Content Section -->
                        <div class="p-4">
                            <div class="row mb-3">
                                <div class="col-md-6">
                                    <h6 class="text-danger mb-1"><i class="fas fa-map-marker-alt"></i> Daerah</h6>
                                    <p class="mb-0 fw-bold">{{ $gallery->region }}</p>
                                </div>
                                <div class="col-md-6">
                                    <h6 class="text-danger mb-1"><i class="fas fa-calendar"></i> Tanggal</h6>
                                    <p class="mb-0">{{ $gallery->created_at->format('d F Y') }}</p>
                                </div>
                            </div>
                            
                            <div class="mb-3">
                                <h6 class="text-danger mb-2"><i class="fas fa-align-left"></i> Deskripsi</h6>
                                <p class="text-muted mb-0" style="text-align: justify;">{{ $gallery->description }}</p>
                            </div>
                            
                            <div class="row">
                                <div class="col-md-6">
                                    <h6 class="text-danger mb-1"><i class="fas fa-tag"></i> Kategori</h6>
                                    <span class="badge bg-light text-danger">{{ ucfirst(str_replace('_', ' ', $gallery->category)) }}</span>
                                </div>
                                <div class="col-md-6 text-end">
                                    <small class="text-muted">
                                        <i class="fas fa-eye"></i> {{ number_format($gallery->views ?? 0) }} kali dilihat
                                    </small>
                                </div>
                            </div>
                        </div>
                    </div>
                    <div class="modal-footer bg-light">
                        <button type="button" class="btn btn-secondary" data-bs-dismiss="modal">
                            <i class="fas fa-times"></i> Tutup
                        </button>
                        <button type="button" class="btn btn-danger" onclick="shareGallery('{{ $gallery->title }}', '{{ $gallery->description }}')">
                            <i class="fas fa-share-alt"></i> Bagikan
                        </button>
                    </div>
                </div>
            </div>
        </div>
        @endforeach

        <!-- Pagination -->
        @if(method_exists($galleries, 'links'))
        <div class="d-flex justify-content-center">
            {{ $galleries->withQueryString()->links() }}
        </div>
        @endif
    @else
        <!-- Empty State -->
        <div class="text-center py-5">
            <div class="card border-0 bg-light">
                <div class="card-body py-5">
                    <i class="fas fa-search fa-4x text-muted mb-4"></i>
                    <h3 class="text-muted mb-3">Belum Ada Galeri</h3>
                    <p class="text-muted">Galeri budaya Indonesia akan segera hadir di sini.</p>
                    <a href="{{ route('home') }}" class="btn btn-outline-danger mt-3">
                        <i class="fas fa-home"></i> Kembali ke Beranda
                    </a>
                </div>
            </div>
        </div>
    @endif

    <!-- Statistik -->
    @if(isset($totalGalleries) && $totalGalleries > 0)
    <div class="card bg-danger text-white border-0 mt-5">
        <div class="card-body text-center py-4">
            <h4 class="mb-4">Jelajahi Kekayaan Budaya Indonesia</h4>
            <div class="row">
                <div class="col-md-3 col-6 mb-3 mb-md-0">
                    <h2 class="fw-bold">{{ number_format($totalGalleries) }}</h2>
                    <p class="mb-0">Total Galeri</p>
                </div>
                <div class="col-md-3 col-6 mb-3 mb-md-0">
                    <h2 class="fw-bold">{{ number_format($totalRegions ?? 0) }}</h2>
                    <p class="mb-0">Daerah</p>
                </div>
                <div class="col-md-3 col-6 mb-3 mb-md-0">
                    <h2 class="fw-bold">6</h2>
                    <p class="mb-0">Kategori</p>
                </div>
                <div class="col-md-3 col-6">
                    <h2 class="fw-bold">{{ number_format($totalViews ?? 0) }}</h2>
                    <p class="mb-0">Total Views</p>
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
    overflow: hidden;
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

/* Image loading and error handling */
.card-img-top {
    background-color: #f8f9fa;
}

/* Responsive adjustments */
@media (max-width: 768px) {
    .display-4 { 
        font-size: 2.5rem; 
    }
    .gallery-card { 
        margin-bottom: 1rem; 
    }
    .card-body h5 {
        font-size: 1.1rem;
    }
    .card-text {
        font-size: 0.9rem;
    }
}

@media (max-width: 576px) {
    .display-4 { 
        font-size: 2rem; 
    }
    .lead {
        font-size: 1rem;
    }
    .gallery-card .card-img-top {
        height: 200px;
    }
}
</style>

@push('scripts')
<script>
// Gallery interaction functions
document.addEventListener('DOMContentLoaded', function() {
    // Handle image loading
    const images = document.querySelectorAll('.card-img-top');
    images.forEach(img => {
        if (img.tagName === 'IMG') {
            img.addEventListener('load', function() {
                this.style.opacity = '1';
            });
            
            img.addEventListener('error', function() {
                console.log('Image failed to load:', this.src);
                // Replace with placeholder
                const placeholder = document.createElement('div');
                placeholder.className = 'card-img-top d-flex align-items-center justify-content-center bg-gradient';
                placeholder.style.cssText = 'height: 250px; background: linear-gradient(135deg, #dc3545, #c82333);';
                placeholder.innerHTML = `
                    <div class="text-center text-white">
                        <i class="fas fa-image fa-3x mb-2"></i>
                        <p class="mb-0 small">Galeri Budaya</p>
                    </div>
                `;
                this.parentNode.replaceChild(placeholder, this);
            });
        }
    });
    
    // Add click animation to cards
    const galleryCards = document.querySelectorAll('.gallery-card');
    galleryCards.forEach(card => {
        card.addEventListener('click', function(e) {
            if (!e.target.closest('.btn') && !e.target.closest('[data-bs-toggle="modal"]')) {
                // Add ripple effect
                this.style.transform = 'scale(0.98)';
                setTimeout(() => {
                    this.style.transform = '';
                }, 150);
            }
        });
    });
    
    // Modal event handlers
    document.querySelectorAll('[id^="galleryModal"]').forEach(modal => {
        modal.addEventListener('shown.bs.modal', function() {
            // Optional: Track modal views
            console.log('Gallery modal opened:', this.id);
        });
    });
});

// Share function
function shareGallery(title, description) {
    if (navigator.share) {
        navigator.share({
            title: title,
            text: description,
            url: window.location.href
        }).then(() => {
            console.log('Shared successfully');
        }).catch((error) => {
            console.log('Error sharing:', error);
            fallbackShare(title, description);
        });
    } else {
        fallbackShare(title, description);
    }
}

function fallbackShare(title, description) {
    // Fallback sharing options
    const url = encodeURIComponent(window.location.href);
    const text = encodeURIComponent(`${title} - ${description}`);
    
    const shareOptions = [
        {
            name: 'WhatsApp',
            url: `https://wa.me/?text=${text}%20${url}`,
            icon: 'fab fa-whatsapp',
            color: '#25D366'
        },
        {
            name: 'Facebook',
            url: `https://www.facebook.com/sharer/sharer.php?u=${url}`,
            icon: 'fab fa-facebook',
            color: '#1877F2'
        },
        {
            name: 'Twitter',
            url: `https://twitter.com/intent/tweet?text=${text}&url=${url}`,
            icon: 'fab fa-twitter',
            color: '#1DA1F2'
        },
        {
            name: 'Copy Link',
            action: 'copy',
            icon: 'fas fa-copy',
            color: '#6c757d'
        }
    ];
    
    // Create share modal
    let shareModal = document.createElement('div');
    shareModal.className = 'modal fade';
    shareModal.innerHTML = `
        <div class="modal-dialog modal-sm modal-dialog-centered">
            <div class="modal-content">
                <div class="modal-header">
                    <h6 class="modal-title"><i class="fas fa-share-alt"></i> Bagikan Galeri</h6>
                    <button type="button" class="btn-close" data-bs-dismiss="modal"></button>
                </div>
                <div class="modal-body">
                    <div class="d-grid gap-2">
                        ${shareOptions.map(option => 
                            option.action === 'copy' 
                                ? `<button class="btn btn-outline-secondary" onclick="copyToClipboard('${window.location.href}')">
                                     <i class="${option.icon}"></i> ${option.name}
                                   </button>`
                                : `<a href="${option.url}" target="_blank" class="btn btn-outline-secondary">
                                     <i class="${option.icon}"></i> ${option.name}
                                   </a>`
                        ).join('')}
                    </div>
                </div>
            </div>
        </div>
    `;
    
    document.body.appendChild(shareModal);
    const modal = new bootstrap.Modal(shareModal);
    modal.show();
    
    // Remove modal after hide
    shareModal.addEventListener('hidden.bs.modal', function() {
        document.body.removeChild(shareModal);
    });
}

function copyToClipboard(text) {
    navigator.clipboard.writeText(text).then(() => {
        // Show success message
        const toast = document.createElement('div');
        toast.className = 'toast align-items-center text-white bg-success border-0 position-fixed';
        toast.style.cssText = 'top: 20px; right: 20px; z-index: 9999;';
        toast.innerHTML = `
            <div class="d-flex">
                <div class="toast-body">
                    <i class="fas fa-check"></i> Link berhasil disalin!
                </div>
                <button type="button" class="btn-close btn-close-white me-2 m-auto" data-bs-dismiss="toast"></button>
            </div>
        `;
        document.body.appendChild(toast);
        
        const toastInstance = new bootstrap.Toast(toast);
        toastInstance.show();
        
        toast.addEventListener('hidden.bs.toast', function() {
            document.body.removeChild(toast);
        });
    }).catch(() => {
        alert('Gagal menyalin link. Silakan salin manual: ' + text);
    });
}
</script>
@endpush
@endsection