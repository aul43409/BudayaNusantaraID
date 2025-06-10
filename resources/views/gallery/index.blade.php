<!DOCTYPE html>
<html lang="id">
<head>
    <meta charset="UTF-8" />
    <meta name="viewport" content="width=device-width, initial-scale=1" />
    <title>Kelola Galeri Budaya</title>
    <script src="https://cdn.tailwindcss.com"></script>
</head>
<body class="bg-gray-100">
    <!-- Header -->
    <header class="bg-white shadow">
        <div class="max-w-7xl mx-auto py-6 px-4 sm:px-6 lg:px-8">
            <h1 class="text-3xl font-bold text-gray-900">Kelola Galeri Budaya</h1>
        </div>
    </header>

    <!-- Main Content -->
    <main class="py-12">
        <div class="max-w-7xl mx-auto sm:px-6 lg:px-8">
            <div class="bg-white shadow-sm rounded-lg p-6">
                
                <!-- Tambah Galeri -->
                <div class="mb-4">
                    <a href="{{ route('gallery.create') }}" class="bg-blue-500 hover:bg-blue-700 text-white font-bold py-2 px-4 rounded">
                        Tambah Galeri Baru
                    </a>
                </div>

                <!-- Alert Success -->
                @if(session('success'))
                    <div class="bg-green-100 border border-green-400 text-green-700 px-4 py-3 rounded mb-4">
                        {{ session('success') }}
                    </div>
                @endif

                <!-- Tabel Galeri -->
                <div class="overflow-x-auto">
                    <table class="min-w-full table-auto">
                        <thead class="bg-gray-100">
                            <tr>
                                <th class="px-4 py-2 text-left">Judul</th>
                                <th class="px-4 py-2 text-left">Kategori</th>
                                <th class="px-4 py-2 text-left">Wilayah</th>
                                <th class="px-4 py-2 text-left">Aksi</th>
                            </tr>
                        </thead>
                        <tbody>
                            @forelse ($galleries as $gallery)
                                <tr class="border-t">
                                    <td class="px-4 py-2">{{ $gallery->title }}</td>
                                    <td class="px-4 py-2 capitalize">{{ $gallery->category }}</td>
                                    <td class="px-4 py-2">{{ $gallery->region }}</td>
                                    <td class="px-4 py-2 flex space-x-2">
                                        <a href="{{ route('gallery.show', $gallery->id) }}" class="text-blue-600 hover:underline">Lihat</a>
                                        <a href="{{ route('gallery.edit', $gallery->id) }}" class="text-green-600 hover:underline">Edit</a>
                                        <form action="{{ route('gallery.destroy', $gallery->id) }}" method="POST" onsubmit="return confirm('Yakin ingin menghapus galeri ini?');">
                                            @csrf
                                            @method('DELETE')
                                            <button type="submit" class="text-red-600 hover:underline">Hapus</button>
                                        </form>
                                    </td>
                                </tr>
                            @empty
                                <tr>
                                    <td colspan="4" class="px-4 py-2 text-center text-gray-500">Belum ada data galeri.</td>
                                </tr>
                            @endforelse
                        </tbody>
                    </table>
                </div>

                <!-- Tombol Kembali -->
                <div class="mt-6">
                    <a href="{{ route('dashboard') }}" class="inline-block bg-gray-500 hover:bg-gray-700 text-white font-bold py-2 px-4 rounded">
                        Kembali
                    </a>
                </div>
            </div>
        </div>
    </main>
</body>
</html>
