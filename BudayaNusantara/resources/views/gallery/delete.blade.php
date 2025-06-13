@extends('layouts.app')

@section('title', 'Hapus Galeri Budaya Indonesia')

@section('content')
<div class="container py-5">
    <div class="row justify-content-center">
        <div class="col-md-8">
            <div class="card shadow border-0">
                <div class="card-header bg-danger text-white">
                    <h4 class="mb-0">
                        <i class="fas fa-trash-alt"></i> Konfirmasi Hapus Galeri
                    </h4>
                </div>
                <div class="card-body">
                    <p class="lead">Apakah Anda yakin ingin menghapus galeri berikut?</p>

                    <div class="mb-3">
                        <strong>Judul:</strong> {{ $gallery->title }}<br>
                        <strong>Daerah Asal:</strong> {{ $gallery->region }}<br>
                        <strong>Kategori:</strong> {{ ucfirst(str_replace('_', ' ', $gallery->category)) }}
                    </div>

                    @if($gallery->image)
                        <div class="mb-3">
                            <p><strong>Gambar Saat Ini:</strong></p>
                            <img src="{{ asset('storage/' . $gallery->image) }}" alt="Gambar Galeri" class="img-thumbnail" style="max-width: 300px;">
                        </div>
                    @endif

                    <form action="{{ route('galeri.destroy', $gallery->id) }}" method="POST">
                        @csrf
                        @method('DELETE')

                        <div class="d-flex justify-content-between">
                            <a href="{{ route('galeri.index') }}" class="btn btn-outline-secondary">
                                <i class="fas fa-arrow-left"></i> Batal
                            </a>
                            <button type="submit" class="btn btn-danger">
                                <i class="fas fa-trash"></i> Hapus Galeri
                            </button>
                        </div>
                    </form>
                </div>
            </div>
        </div>
    </div>
</div>

<style>
.card {
    border-radius: 15px;
}

.btn-danger {
    background: linear-gradient(45deg, #dc3545, #c82333);
    border: none;
    transition: all 0.3s ease;
}

.btn-danger:hover {
    background: linear-gradient(45deg, #c82333, #a71e2a);
    transform: translateY(-1px);
    box-shadow: 0 4px 8px rgba(220, 53, 69, 0.3);
}
</style>
@endsection
