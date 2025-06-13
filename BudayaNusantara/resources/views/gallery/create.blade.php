<!DOCTYPE html>
<html lang="id">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Tambah Galeri Budaya Indonesia</title>

    <!-- Bootstrap CSS -->
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0/dist/css/bootstrap.min.css" rel="stylesheet">
    <link href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.5.0/css/all.min.css" rel="stylesheet">

    <style>
        .card {
            border-radius: 15px;
        }

        .form-control:focus, .form-select:focus {
            border-color: #dc3545;
            box-shadow: 0 0 0 0.2rem rgba(220, 53, 69, 0.25);
        }

        .form-check-input:checked {
            background-color: #dc3545;
            border-color: #dc3545;
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
</head>
<body>

<div class="container py-5">
    <div class="row">
        <div class="col-md-8 mx-auto">
            <div class="card shadow-lg border-0">
                <div class="card-header bg-danger text-white">
                    <h4 class="mb-0">
                        <i class="fas fa-plus-circle"></i> Tambah Galeri Budaya Indonesia
                    </h4>
                </div>
                <div class="card-body">
                    <form action="{{ route('gallery.store') }}" method="POST" enctype="multipart/form-data">
                        @csrf

                        <div class="row">
                            <div class="col-md-6">
                                <div class="mb-3">
                                    <label for="title" class="form-label">Judul Galeri <span class="text-danger">*</span></label>
                                    <input type="text" class="form-control @error('title') is-invalid @enderror" 
                                           id="title" name="title" value="{{ old('title') }}" 
                                           placeholder="Contoh: Tari Kecak Bali">
                                    @error('title')
                                        <div class="invalid-feedback">{{ $message }}</div>
                                    @enderror
                                </div>
                            </div>

                            <div class="col-md-6">
                                <div class="mb-3">
                                    <label for="region" class="form-label">Daerah Asal <span class="text-danger">*</span></label>
                                    <input type="text" class="form-control @error('region') is-invalid @enderror" 
                                           id="region" name="region" value="{{ old('region') }}" 
                                           placeholder="Contoh: Bali">
                                    @error('region')
                                        <div class="invalid-feedback">{{ $message }}</div>
                                    @enderror
                                </div>
                            </div>
                        </div>

                        <div class="row">
                            <div class="col-md-6">
                                <div class="mb-3">
                                    <label for="category" class="form-label">Kategori <span class="text-danger">*</span></label>
                                    <select class="form-select @error('category') is-invalid @enderror" id="category" name="category">
                                        <option value="">Pilih Kategori</option>
                                        <option value="pakaian_adat" {{ old('category') == 'pakaian_adat' ? 'selected' : '' }}>Pakaian Adat</option>
                                        <option value="tarian" {{ old('category') == 'tarian' ? 'selected' : '' }}>Tarian</option>
                                        <option value="rumah_adat" {{ old('category') == 'rumah_adat' ? 'selected' : '' }}>Rumah Adat</option>
                                        <option value="kerajinan" {{ old('category') == 'kerajinan' ? 'selected' : '' }}>Kerajinan</option>
                                        <option value="upacara" {{ old('category') == 'upacara' ? 'selected' : '' }}>Upacara</option>
                                        <option value="kuliner" {{ old('category') == 'kuliner' ? 'selected' : '' }}>Kuliner</option>
                                    </select>
                                    @error('category')
                                        <div class="invalid-feedback">{{ $message }}</div>
                                    @enderror
                                </div>
                            </div>

                            <div class="col-md-6">
                                <div class="mb-3">
                                    <label for="is_featured" class="form-label">Status</label>
                                    <div class="form-check form-switch">
                                        <input class="form-check-input" type="checkbox" id="is_featured" name="is_featured" value="1" {{ old('is_featured') ? 'checked' : '' }}>
                                        <label class="form-check-label" for="is_featured">
                                            Jadikan Galeri Unggulan
                                        </label>
                                    </div>
                                    <small class="form-text text-muted">Galeri unggulan akan ditampilkan di bagian atas halaman</small>
                                </div>
                            </div>
                        </div>

                        <div class="mb-3">
                            <label for="description" class="form-label">Deskripsi <span class="text-danger">*</span></label>
                            <textarea class="form-control @error('description') is-invalid @enderror" 
                                      id="description" name="description" rows="6" 
                                      placeholder="Jelaskan secara lengkap tentang budaya ini, sejarahnya, makna, keunikannya, dan informasi detail lainnya...">{{ old('description') }}</textarea>
                            @error('description')
                                <div class="invalid-feedback">{{ $message }}</div>
                            @enderror
                            <small class="form-text text-muted">Berikan informasi lengkap dan detail tentang budaya ini</small>
                        </div>

                        <div class="mb-4">
                            <label for="image" class="form-label">Gambar <span class="text-danger">*</span></label>
                            <input type="file" class="form-control @error('image') is-invalid @enderror" 
                                   id="image" name="image" accept="image/*">
                            @error('image')
                                <div class="invalid-feedback">{{ $message }}</div>
                            @enderror
                            <small class="form-text text-muted">
                                Format yang didukung: JPG, JPEG, PNG. Maksimal 2MB. Disarankan ukuran 800x600px.
                            </small>

                            <!-- Preview Image -->
                            <div id="imagePreview" class="mt-3" style="display: none;">
                                <img id="previewImg" src="" alt="Preview" class="img-thumbnail" style="max-width: 300px; max-height: 200px;">
                            </div>
                        </div>

                        <hr>

                        <div class="d-flex justify-content-between">
                            <a href="{{ route('dashboard') }}" class="btn btn-outline-secondary">
                                <i class="fas fa-arrow-left"></i> Kembali
                            </a>
                            <button type="submit" class="btn btn-danger">
                                <i class="fas fa-save"></i> Simpan Galeri
                            </button>
                        </div>
                    </form>
                </div>
            </div>
        </div>
    </div>
</div>

<!-- Script -->
<script>
document.getElementById('image').addEventListener('change', function(e) {
    const file = e.target.files[0];
    if (file) {
        const reader = new FileReader();
        reader.onload = function(e) {
            document.getElementById('previewImg').src = e.target.result;
            document.getElementById('imagePreview').style.display = 'block';
        }
        reader.readAsDataURL(file);
    } else {
        document.getElementById('imagePreview').style.display = 'none';
    }
});

document.getElementById('description').addEventListener('input', function() {
    this.style.height = 'auto';
    this.style.height = this.scrollHeight + 'px';
});
</script>

<!-- Bootstrap JS Bundle -->
<script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0/dist/js/bootstrap.bundle.min.js"></script>

</body>
</html>