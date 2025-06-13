<!DOCTYPE html>
<html lang="id">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Edit Galeri</title>
    <script src="https://cdn.tailwindcss.com"></script>
</head>
<body class="bg-gradient-to-br from-red-50 to-white min-h-screen flex items-center justify-center text-gray-800">

    <div class="w-full max-w-2xl p-8 bg-white rounded-2xl shadow-lg border border-gray-200">
        <h2 class="text-3xl font-extrabold text-center text-red-700 mb-8">✏️ Edit Galeri</h2>
        
        <form action="{{ route('galeri.update', $gallery->id) }}" method="POST" class="space-y-6">
            @csrf
            @method('PUT')

            <div>
                <label class="block font-semibold mb-1">📌 Judul</label>
                <input type="text" name="title" value="{{ old('title', $gallery->title) }}" 
                       class="w-full border border-gray-300 rounded-lg px-4 py-2 focus:outline-none focus:ring-2 focus:ring-red-400" required>
            </div>

            <div>
                <label class="block font-semibold mb-1">📂 Kategori</label>
                <input type="text" name="category" value="{{ old('category', $gallery->category) }}" 
                       class="w-full border border-gray-300 rounded-lg px-4 py-2 focus:outline-none focus:ring-2 focus:ring-red-400" required>
            </div>

            <div>
                <label class="block font-semibold mb-1">📍 Wilayah</label>
                <input type="text" name="region" value="{{ old('region', $gallery->region) }}" 
                       class="w-full border border-gray-300 rounded-lg px-4 py-2 focus:outline-none focus:ring-2 focus:ring-red-400" required>
            </div>

            <div>
                <label class="block font-semibold mb-1">🖼️ URL Gambar</label>
                <input type="url" name="image_url" id="image_url"
                       value="{{ old('image_url', $gallery->image_url) }}" 
                       class="w-full border border-gray-300 rounded-lg px-4 py-2 focus:outline-none focus:ring-2 focus:ring-red-400" 
                       placeholder="https://contoh.com/gambar.jpg" required>

                <p class="text-sm text-gray-500 mt-1">Masukkan URL gambar (disarankan ukuran 800x600px)</p>

                <div id="imagePreview" class="mt-4">
                    <img id="previewImg" src="{{ old('image_url', $gallery->image_url) }}" 
                         alt="Preview" class="rounded-lg shadow max-w-sm max-h-60 mx-auto">
                </div>
            </div>

            <div class="flex items-center justify-between pt-4">
                <button type="submit" class="bg-red-600 hover:bg-red-700 text-white px-6 py-2 rounded-lg font-semibold transition-all duration-200">
                    💾 Simpan
                </button>
                <a href="{{ route('galeri.index') }}" class="text-gray-500 hover:text-red-600 underline transition">Batal</a>
            </div>
        </form>
    </div>

    <script>
        const imageInput = document.getElementById('image_url');
        const imagePreview = document.getElementById('imagePreview');
        const previewImg = document.getElementById('previewImg');

        imageInput.addEventListener('input', function () {
            const url = this.value;

            if (url.startsWith('http://') || url.startsWith('https://')) {
                previewImg.src = url;

                previewImg.onload = () => {
                    imagePreview.style.display = 'block';
                };

                previewImg.onerror = () => {
                    imagePreview.style.display = 'none';
                };
            } else {
                imagePreview.style.display = 'none';
            }
        });
    </script>

</body>
</html>
