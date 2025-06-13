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
        
        <form action="{{ route('galeri.update', $gallery->id) }}" method="POST" enctype="multipart/form-data" class="space-y-6">
            @csrf
            @method('PUT')

            <div>
                <label class="block font-semibold mb-1">📌 Judul</label>
                <input type="text" name="title" value="{{ old('title', $gallery->title) }}" class="w-full border border-gray-300 rounded-lg px-4 py-2 focus:outline-none focus:ring-2 focus:ring-red-400" required>
            </div>

            <div>
                <label class="block font-semibold mb-1">📂 Kategori</label>
                <input type="text" name="category" value="{{ old('category', $gallery->category) }}" class="w-full border border-gray-300 rounded-lg px-4 py-2 focus:outline-none focus:ring-2 focus:ring-red-400" required>
            </div>

            <div>
                <label class="block font-semibold mb-1">📍 Wilayah</label>
                <input type="text" name="region" value="{{ old('region', $gallery->region) }}" class="w-full border border-gray-300 rounded-lg px-4 py-2 focus:outline-none focus:ring-2 focus:ring-red-400" required>
            </div>

            <div>
                <label class="block font-semibold mb-2">🖼️ Pilih Cara Menambahkan Gambar</label>
                <div class="flex items-center space-x-6 mb-4">
                    <label class="flex items-center space-x-2">
                        <input type="radio" name="image_option" value="file" checked onchange="toggleImageInput()" class="text-red-600 focus:ring-red-500">
                        <span>Upload File</span>
                    </label>
                    <label class="flex items-center space-x-2">
                        <input type="radio" name="image_option" value="url" onchange="toggleImageInput()" class="text-red-600 focus:ring-red-500">
                        <span>Gunakan URL</span>
                    </label>
                </div>

                <div id="fileInput">
                    <input type="file" name="image_file" class="w-full border border-gray-300 rounded-lg px-3 py-2">
                </div>

                <div id="urlInput" class="hidden">
                    <input type="text" name="image_url" placeholder="https://example.com/image.jpg" class="w-full border border-gray-300 rounded-lg px-3 py-2 focus:outline-none focus:ring-2 focus:ring-red-400">
                </div>
            </div>

            <div class="flex items-center justify-between">
                <button type="submit" class="bg-red-600 hover:bg-red-700 text-white px-6 py-2 rounded-lg font-semibold transition-all duration-200">
                    💾 Simpan
                </button>
                <a href="{{ route('galeri.index') }}" class="text-gray-500 hover:text-red-600 underline transition">Batal</a>
            </div>
        </form>
    </div>

    <script>
        function toggleImageInput() {
            const fileInput = document.getElementById('fileInput');
            const urlInput = document.getElementById('urlInput');
            const selected = document.querySelector('input[name="image_option"]:checked').value;

            if (selected === 'file') {
                fileInput.classList.remove('hidden');
                urlInput.classList.add('hidden');
            } else {
                fileInput.classList.add('hidden');
                urlInput.classList.remove('hidden');
            }
        }
    </script>

</body>
</html>
