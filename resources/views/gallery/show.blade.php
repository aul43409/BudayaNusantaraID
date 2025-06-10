<!DOCTYPE html>
<html lang="id">
<head>
    <meta charset="UTF-8" />
    <meta name="viewport" content="width=device-width, initial-scale=1" />
    <title>{{ $gallery->title }} - Detail Galeri</title>
    <script src="https://cdn.tailwindcss.com"></script>
</head>
<body class="bg-gray-100 font-sans leading-relaxed text-gray-800">
    <!-- Header -->
    <header class="bg-red-600 shadow-md">
        <div class="max-w-7xl mx-auto py-6 px-4 sm:px-6 lg:px-8">
            <h1 class="text-3xl font-extrabold text-white">Detail Galeri</h1>
        </div>
    </header>

    <!-- Main Content -->
    <main class="py-12">
        <div class="max-w-4xl mx-auto sm:px-6 lg:px-8">
            <div class="bg-white shadow-lg rounded-2xl p-8 border border-red-100">
                
                <!-- Judul Galeri -->
                <h2 class="text-2xl font-bold text-red-700 mb-6 border-b pb-2 border-red-200">
                    {{ $gallery->title }}
                </h2>
                
                <!-- Info Galeri -->
                <div class="grid grid-cols-1 md:grid-cols-2 gap-6 mb-6">
                    <div>
                        <label class="block text-sm font-semibold text-red-600">Kategori</label>
                        <p class="mt-1 text-base text-gray-900 capitalize">{{ $gallery->category }}</p>
                    </div>
                    <div>
                        <label class="block text-sm font-semibold text-red-600">Wilayah</label>
                        <p class="mt-1 text-base text-gray-900">{{ $gallery->region }}</p>
                    </div>
                </div>

                <!-- Deskripsi -->
                @if($gallery->description)
                    <div class="mb-6">
                        <label class="block text-sm font-semibold text-red-600 mb-1">Deskripsi</label>
                        <p class="text-gray-800">{{ $gallery->description }}</p>
                    </div>
                @endif

                <!-- Gambar -->
                @if($gallery->image_path)
                    <div class="mb-6">
                        <label class="block text-sm font-semibold text-red-600 mb-1">Gambar</label>
                        <img src="{{ asset('storage/' . $gallery->image_path) }}" 
                             alt="{{ $gallery->title }}" 
                             class="w-full max-h-[500px] object-cover rounded-xl shadow-md border border-red-100">
                    </div>
                @endif

                <!-- Tombol Aksi -->
                <div class="flex flex-wrap gap-4 mt-8">
                    <a href="{{ route('gallery.edit', $gallery->id) }}" 
                       class="bg-red-500 hover:bg-red-700 transition text-white font-semibold py-2 px-4 rounded-lg shadow">
                        Edit
                    </a>
                    
                    <form action="{{ route('gallery.destroy', $gallery->id) }}" 
                          method="POST" 
                          onsubmit="return confirm('Yakin ingin menghapus galeri ini?');">
                        @csrf
                        @method('DELETE')
                        <button type="submit" 
                                class="bg-red-700 hover:bg-red-800 transition text-white font-semibold py-2 px-4 rounded-lg shadow">
                            Hapus
                        </button>
                    </form>
                    
                    <a href="{{ route('gallery.index') }}" 
                       class="bg-gray-400 hover:bg-gray-600 transition text-white font-semibold py-2 px-4 rounded-lg shadow">
                        Kembali
                    </a>
                </div>
            </div>
        </div>
    </main>
</body>
</html>
