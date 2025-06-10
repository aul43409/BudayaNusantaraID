<!DOCTYPE html>
<html lang="id">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Admin Portal - Budaya Nusantara</title>
    <script src="https://cdn.tailwindcss.com"></script>
    <script>
        tailwind.config = {
            theme: {
                extend: {
                    colors: {
                        primary: {
                            50: '#fef2f2',
                            100: '#fee2e2',
                            200: '#fecaca',
                            300: '#fca5a5',
                            400: '#f87171',
                            500: '#ef4444',
                            600: '#dc2626',
                            700: '#b91c1c',
                            800: '#991b1b',
                            900: '#7f1d1d',
                        },
                        cultural: {
                            50: '#fffbeb',
                            100: '#fef3c7',
                            200: '#fde68a',
                            300: '#fcd34d',
                            400: '#fbbf24',
                            500: '#f59e0b',
                            600: '#d97706',
                            700: '#b45309',
                            800: '#92400e',
                            900: '#78350f',
                        }
                    }
                }
            }
        }
    </script>
    <style>
        @import url('https://fonts.googleapis.com/css2?family=Plus+Jakarta+Sans:wght@300;400;500;600;700;800&display=swap');
        
        * {
            font-family: 'Plus Jakarta Sans', sans-serif;
        }

        .glass-effect {
            background: rgba(255, 255, 255, 0.8);
            backdrop-filter: blur(12px);
            -webkit-backdrop-filter: blur(12px);
            border: 1px solid rgba(255, 255, 255, 0.3);
            box-shadow: 0 8px 32px rgba(0, 0, 0, 0.1);
        }

        .cultural-gradient {
            background: linear-gradient(135deg, #dc2626 0%, #f59e0b 50%, #ef4444 100%);
        }

        .light-gradient {
            background: linear-gradient(135deg, #fef2f2 0%, #fffbeb 50%, #fef3c7 100%);
        }

        .floating-card {
            animation: float 6s ease-in-out infinite;
        }

        @keyframes float {
            0%, 100% { transform: translateY(0px); }
            50% { transform: translateY(-8px); }
        }

        .slide-up {
            animation: slideUp 0.8s ease-out forwards;
            opacity: 0;
            transform: translateY(20px);
        }

        @keyframes slideUp {
            to {
                opacity: 1;
                transform: translateY(0);
            }
        }

        .cultural-shadow {
            box-shadow: 0 10px 25px rgba(220, 38, 38, 0.15);
        }

        .sidebar-hidden {
            transform: translateX(-100%);
        }

        .sidebar-visible {
            transform: translateX(0);
        }

        .overlay {
            backdrop-filter: blur(5px);
            background: rgba(0, 0, 0, 0.3);
        }

        .cultural-pattern {
            background-image: 
                radial-gradient(circle at 25px 25px, rgba(220, 38, 38, 0.05) 2px, transparent 0),
                radial-gradient(circle at 75px 75px, rgba(245, 158, 11, 0.05) 2px, transparent 0);
            background-size: 100px 100px;
        }

        .hover-lift {
            transition: all 0.3s ease;
        }

        .hover-lift:hover {
            transform: translateY(-4px);
            box-shadow: 0 15px 35px rgba(0, 0, 0, 0.1);
        }

        .dropdown {
            opacity: 0;
            visibility: hidden;
            transform: translateY(-10px);
            transition: all 0.3s ease;
        }

        .dropdown.show {
            opacity: 1;
            visibility: visible;
            transform: translateY(0);
        }

        .nav-item {
            transition: all 0.2s ease;
        }

        .nav-item:hover {
            background: linear-gradient(135deg, rgba(220, 38, 38, 0.1) 0%, rgba(245, 158, 11, 0.1) 100%);
            transform: translateX(4px);
        }

        .metric-card {
            background: linear-gradient(135deg, rgba(255, 255, 255, 0.9) 0%, rgba(255, 255, 255, 0.7) 100%);
            backdrop-filter: blur(10px);
            border: 1px solid rgba(255, 255, 255, 0.5);
        }
    </style>
</head>
<body class="bg-gradient-to-br from-red-50 via-orange-50 to-yellow-50 min-h-screen text-gray-800 cultural-pattern">
    
    <!-- Mobile Overlay -->
    <div id="overlay" class="fixed inset-0 overlay z-40 lg:hidden hidden"></div>
    
    <!-- Sidebar -->
    <div id="sidebar" class="fixed left-0 top-0 h-full w-64 light-gradient glass-effect z-50 transform sidebar-hidden lg:sidebar-visible transition-transform duration-300 ease-in-out">
        <div class="p-6">
            <!-- Logo Section -->
            <div class="flex items-center mb-8">
                <div class="w-12 h-12 cultural-gradient rounded-xl flex items-center justify-center mr-3 cultural-shadow">
                    <span class="text-xl text-white">🏛️</span>
                </div>
                <div>
                    <h1 class="text-xl font-bold bg-gradient-to-r from-red-600 to-orange-600 bg-clip-text text-transparent">Budaya Portal</h1>
                    <p class="text-sm text-gray-600">Admin Console</p>
                </div>
            </div>

            <!-- Navigation -->
            <nav class="space-y-2">
                <a href="#" class="nav-item flex items-center px-4 py-3 rounded-xl bg-gradient-to-r from-red-100 to-orange-100 border border-red-200 text-red-700">
                    <svg class="w-5 h-5 mr-3" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                        <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M3 7v10a2 2 0 002 2h14a2 2 0 002-2V9a2 2 0 00-2-2H5a2 2 0 00-2-2V7"></path>
                    </svg>
                    Dashboard
                </a>
                
                <a href="{{ route('gallery.index') }}" class="nav-item flex items-center px-4 py-3 rounded-xl hover:bg-white/50 text-gray-700 hover:text-red-700 transition-all duration-200">
                    <svg class="w-5 h-5 mr-3" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                        <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M4 16l4.586-4.586a2 2 0 012.828 0L16 16m-2-2l1.586-1.586a2 2 0 012.828 0L20 14m-6-6h.01M6 20h12a2 2 0 002-2V6a2 2 0 00-2-2H6a2 2 0 00-2 2v12a2 2 0 002 2z"></path>
                    </svg>
                    Gallery Manager
                </a>

                <a href="{{ route('gallery.create') }}" class="nav-item flex items-center px-4 py-3 rounded-xl hover:bg-white/50 text-gray-700 hover:text-red-700 transition-all duration-200">
                    <svg class="w-5 h-5 mr-3" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                        <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M12 4v16m8-8H4"></path>
                    </svg>
                    Add Content
                </a>

                <a href="{{ route('profile.edit') }}" class="nav-item flex items-center px-4 py-3 rounded-xl hover:bg-white/50 text-gray-700 hover:text-red-700 transition-all duration-200">
                    <svg class="w-5 h-5 mr-3" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                        <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M16 7a4 4 0 11-8 0 4 4 0 018 0zM12 14a7 7 0 00-7 7h14a7 7 0 00-7-7z"></path>
                    </svg>
                    Profile Settings
                </a>

                <div class="border-t border-red-200 my-4"></div>

                <a href="{{ route('home') }}" target="_blank" class="nav-item flex items-center px-4 py-3 rounded-xl hover:bg-white/50 text-gray-700 hover:text-red-700 transition-all duration-200">
                    <svg class="w-5 h-5 mr-3" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                        <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M10 6H6a2 2 0 00-2 2v10a2 2 0 002 2h10a2 2 0 002-2v-4M14 4h6m0 0v6m0-6L10 14"></path>
                    </svg>
                    View Website
                </a>
            </nav>

            <!-- User Info at Bottom -->
            <div class="absolute bottom-6 left-6 right-6">
                <div class="glass-effect rounded-xl p-4 border border-white/30">
                    <div class="flex items-center">
                        <div class="w-10 h-10 cultural-gradient rounded-full flex items-center justify-center mr-3">
                            <span class="text-sm font-bold text-white">A</span>
                        </div>
                        <div class="flex-1 min-w-0">
                            <p class="text-sm font-semibold text-gray-800 truncate">Administrator</p>
                            <p class="text-xs text-gray-600">Online</p>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>

    <!-- Main Content -->
    <div class="lg:ml-64 min-h-screen">
        <!-- Top Bar -->
        <header class="glass-effect border-b border-white/30 sticky top-0 z-30">
            <div class="px-6 py-4">
                <div class="flex items-center justify-between">
                    <div class="flex items-center">
                        <button id="sidebar-toggle" class="lg:hidden mr-4 p-2 rounded-lg hover:bg-white/50 transition-colors">
                            <svg class="w-6 h-6 text-gray-700" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                                <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M4 6h16M4 12h16M4 18h16"></path>
                            </svg>
                        </button>
                        <div>
                            <h2 class="text-2xl font-bold bg-gradient-to-r from-red-600 to-orange-600 bg-clip-text text-transparent">Command Center</h2>
                            <p class="text-sm text-gray-600">Senin, 09 Juni 2025</p>
                        </div>
                    </div>
                    
                    <div class="flex items-center space-x-4">
                        <div class="hidden md:flex items-center space-x-2 glass-effect px-4 py-2 rounded-lg border border-white/30">
                            <div class="w-2 h-2 bg-green-500 rounded-full animate-pulse"></div>
                            <span class="text-sm text-gray-700 font-medium">System Online</span>
                        </div>
                        
                        <!-- User Dropdown -->
                        <div class="relative">
                            <button id="user-menu-btn" class="flex items-center space-x-2 glass-effect px-4 py-2 rounded-lg border border-white/30 hover:bg-white/50 transition-colors">
                                <div class="w-8 h-8 cultural-gradient rounded-full flex items-center justify-center">
                                    <span class="text-sm font-bold text-white">A</span>
                                </div>
                                <span class="hidden md:block text-sm font-medium text-gray-700">Administrator</span>
                                <svg class="w-4 h-4 text-gray-500" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                                    <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M19 9l-7 7-7-7"></path>
                                </svg>
                            </button>
                            
                            <!-- Dropdown Menu -->
                            <div id="user-dropdown" class="dropdown absolute right-0 mt-2 w-48 glass-effect rounded-xl border border-white/30 py-2">
                                <a href="{{ route('profile.edit') }}" class="flex items-center px-4 py-2 text-sm text-gray-700 hover:bg-white/50 transition-colors">
                                    <svg class="w-4 h-4 mr-3" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                                        <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M16 7a4 4 0 11-8 0 4 4 0 018 0zM12 14a7 7 0 00-7 7h14a7 7 0 00-7-7z"></path>
                                    </svg>
                                    Profile Settings
                                </a>
                                <div class="border-t border-red-200 my-1"></div>
                                <form method="POST" action="{{ route('logout') }}">
                                    @csrf
                                    <button type="submit" class="w-full flex items-center px-4 py-2 text-sm text-red-600 hover:bg-red-50 transition-colors">
                                        <svg class="w-4 h-4 mr-3" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                                            <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M17 16l4-4m0 0l-4-4m4 4H7m6 4v1a3 3 0 01-3 3H6a3 3 0 01-3-3V7a3 3 0 013-3h4a3 3 0 013 3v1"></path>
                                        </svg>
                                        Logout
                                    </button>
                                </form>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </header>

        <!-- Dashboard Content -->
        <main class="p-6">
            <!-- Hero Section -->
            <div class="glass-effect rounded-2xl p-8 mb-8 cultural-shadow floating-card border border-white/30">
                <div class="flex flex-col lg:flex-row items-start justify-between">
                    <div class="flex-1">
                        <div class="flex items-center mb-4">
                            <span class="text-4xl mr-4">👋</span>
                            <div>
                                <h1 class="text-3xl font-bold bg-gradient-to-r from-red-600 to-orange-600 bg-clip-text text-transparent mb-2">
                                    Selamat datang kembali, Administrator
                                </h1>
                                <p class="text-gray-600 text-lg">
                                    Mengelola warisan budaya Indonesia dengan teknologi modern
                                </p>
                            </div>
                        </div>
                        
                        <div class="flex flex-wrap gap-4 mt-6">
                            <div class="flex items-center glass-effect px-4 py-2 rounded-lg border border-white/30">
                                <div class="w-3 h-3 bg-red-500 rounded-full mr-2 animate-pulse"></div>
                                <span class="text-sm font-medium text-gray-700">12 Koleksi</span>
                            </div>
                            <div class="flex items-center glass-effect px-4 py-2 rounded-lg border border-white/30">
                                <div class="w-3 h-3 bg-orange-500 rounded-full mr-2"></div>
                                <span class="text-sm font-medium text-gray-700">8 Kategori</span>
                            </div>
                            <div class="flex items-center glass-effect px-4 py-2 rounded-lg border border-white/30">
                                <div class="w-3 h-3 bg-yellow-500 rounded-full mr-2"></div>
                                <span class="text-sm font-medium text-gray-700">6 bulan aktif</span>
                            </div>
                        </div>
                    </div>
                    
                    <div class="mt-6 lg:mt-0">
                        <div class="text-8xl opacity-30 floating-card">🏛️</div>
                    </div>
                </div>
            </div>

            <!-- Metrics Grid -->
            <div class="grid grid-cols-1 md:grid-cols-2 xl:grid-cols-4 gap-6 mb-8">
                <!-- Total Gallery Metric -->
                <div class="metric-card rounded-xl p-6 hover-lift slide-up">
                    <div class="flex items-center justify-between mb-4">
                        <div class="w-12 h-12 bg-gradient-to-br from-red-500 to-orange-500 rounded-xl flex items-center justify-center cultural-shadow">
                            <svg class="w-6 h-6 text-white" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                                <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M4 16l4.586-4.586a2 2 0 012.828 0L16 16m-2-2l1.586-1.586a2 2 0 012.828 0L20 14m-6-6h.01M6 20h12a2 2 0 002-2V6a2 2 0 00-2-2H6a2 2 0 00-2 2v12a2 2 0 002 2z"></path>
                            </svg>
                        </div>
                        <div class="flex items-center text-green-600 text-sm font-medium">
                            <span>+3</span>
                            <svg class="w-4 h-4 ml-1" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                                <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M5 10l7-7m0 0l7 7m-7-7v18"></path>
                            </svg>
                        </div>
                    </div>
                    <div>
                        <p class="text-3xl font-bold text-gray-800 mb-1">12</p>
                        <p class="text-gray-600 text-sm">Koleksi Budaya</p>
                    </div>
                </div>

                <!-- Categories Metric -->
                <div class="metric-card rounded-xl p-6 hover-lift slide-up" style="animation-delay: 0.1s;">
                    <div class="flex items-center justify-between mb-4">
                        <div class="w-12 h-12 bg-gradient-to-br from-orange-500 to-yellow-500 rounded-xl flex items-center justify-center cultural-shadow">
                            <svg class="w-6 h-6 text-white" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                                <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M19 11H5m14 0a2 2 0 012 2v6a2 2 0 01-2 2H5a2 2 0 01-2-2v-6a2 2 0 012-2m14 0V9a2 2 0 00-2-2M5 11V9a2 2 0 012-2m0 0V5a2 2 0 012-2h6a2 2 0 012 2v2M7 7h10"></path>
                            </svg>
                        </div>
                        <div class="text-orange-600 text-sm font-medium">Aktif</div>
                    </div>
                    <div>
                        <p class="text-3xl font-bold text-gray-800 mb-1">8</p>
                        <p class="text-gray-600 text-sm">Kategori Budaya</p>
                    </div>
                </div>

                <!-- Views Metric -->
                <div class="metric-card rounded-xl p-6 hover-lift slide-up" style="animation-delay: 0.2s;">
                    <div class="flex items-center justify-between mb-4">
                        <div class="w-12 h-12 bg-gradient-to-br from-blue-500 to-cyan-500 rounded-xl flex items-center justify-center cultural-shadow">
                            <svg class="w-6 h-6 text-white" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                                <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M15 12a3 3 0 11-6 0 3 3 0 016 0z"></path>
                                <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M2.458 12C3.732 7.943 7.523 5 12 5c4.478 0 8.268 2.943 9.542 7-1.274 4.057-5.064 7-9.542 7-4.477 0-8.268-2.943-9.542-7z"></path>
                            </svg>
                        </div>
                        <div class="text-blue-600 text-sm font-medium">Hari ini</div>
                    </div>
                    <div>
                        <p class="text-3xl font-bold text-gray-800 mb-1">2.4K</p>
                        <p class="text-gray-600 text-sm">Kunjungan Halaman</p>
                    </div>
                </div>

                <!-- Activity Metric -->
                <div class="metric-card rounded-xl p-6 hover-lift slide-up" style="animation-delay: 0.3s;">
                    <div class="flex items-center justify-between mb-4">
                        <div class="w-12 h-12 bg-gradient-to-br from-purple-500 to-pink-500 rounded-xl flex items-center justify-center cultural-shadow">
                            <svg class="w-6 h-6 text-white" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                                <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M13 10V3L4 14h7v7l9-11h-7z"></path>
                            </svg>
                        </div>
                        <div class="text-purple-600 text-sm font-medium">Live</div>
                    </div>
                    <div>
                        <p class="text-3xl font-bold text-gray-800 mb-1">7</p>
                        <p class="text-gray-600 text-sm">Aktivitas Terbaru</p>
                    </div>
                </div>
            </div>

            <!-- Main Dashboard Grid -->
            <div class="grid grid-cols-1 xl:grid-cols-3 gap-8">
               <!-- Quick Actions Panel -->
<div class="xl:col-span-2">
    <div class="glass-effect rounded-2xl p-8 border border-white/30">
        <div class="flex items-center mb-6">
            <div class="w-8 h-8 cultural-gradient rounded-lg flex items-center justify-center mr-3">
                <span class="text-lg text-white">⚡</span>
            </div>
            <h3 class="text-xl font-bold text-gray-800">Aksi Cepat</h3>
        </div>
        
        <div class="grid grid-cols-1 md:grid-cols-2 gap-6">
            <a href="{{ route('gallery.create') }}" class="group glass-effect rounded-xl p-6 hover-lift transition-all duration-300 border border-white/30">
                <div class="flex items-center mb-4">
                    <div class="w-10 h-10 bg-gradient-to-br from-green-500 to-emerald-500 rounded-lg flex items-center justify-center mr-3 group-hover:scale-110 transition-transform">
                        <svg class="w-5 h-5 text-white" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                            <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M12 4v16m8-8H4"></path>
                        </svg>
                    </div>
                    <div>
                        <h4 class="font-semibold text-gray-800">Tambah Konten Baru</h4>
                        <p class="text-sm text-gray-600">Unggah item budaya</p>
                    </div>
                </div>
                <div class="text-xs text-green-600 flex items-center font-medium">
                    Buat Sekarang
                    <svg class="w-3 h-3 ml-1 group-hover:translate-x-1 transition-transform" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                        <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M17 8l4 4m0 0l-4 4m4-4H3"></path>
                    </svg>
                </div>
            </a>

            <a href="{{ route('gallery.index') }}" class="group glass-effect rounded-xl p-6 hover-lift transition-all duration-300 border border-white/30">
                <div class="flex items-center mb-4">
                    <div class="w-10 h-10 bg-gradient-to-br from-blue-500 to-cyan-500 rounded-lg flex items-center justify-center mr-3 group-hover:scale-110 transition-transform">
                        <svg class="w-5 h-5 text-white" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                            <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M19 11H5m14 0a2 2 0 012 2v6a2 2 0 01-2 2H5a2 2 0 01-2-2v-6a2 2 0 012-2m14 0V9a2 2 0 00-2-2M5 11V9a2 2 0 012-2m0 0V5a2 2 0 012-2h6a2 2 0 012 2v2M7 7h10"></path>
                        </svg>
                    </div>
                    <div>
                        <h4 class="font-semibold text-gray-800">Kelola Galeri</h4>
                        <p class="text-sm text-gray-600">Edit konten yang ada</p>
                    </div>
                </div>
                <div class="text-xs text-blue-600 flex items-center font-medium">
                    Buka Pengelola
                    <svg class="w-3 h-3 ml-1 group-hover:translate-x-1 transition-transform" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                        <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M17 8l4 4m0 0l-4 4m4-4H3"></path>
                    </svg>
                </div>
            </a>

            <a href="{{ route('profile.edit') }}" class="group glass-effect rounded-xl p-6 hover-lift transition-all duration-300 border border-white/30">
                <div class="flex items-center mb-4">
                    <div class="w-10 h-10 bg-gradient-to-br from-purple-500 to-pink-500 rounded-lg flex items-center justify-center mr-3 group-hover:scale-110 transition-transform">
                        <svg class="w-5 h-5 text-white" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                            <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M16 7a4 4 0 11-8 0 4 4 0 018 0zM12 14a7 7 0 00-7 7h14a7 7 0 00-7-7z"></path>
                        </svg>
                    </div>
                    <div>
                        <h4 class="font-semibold text-gray-800">Pengaturan</h4>
                        <p class="text-sm text-gray-600">Konfigurasi akun</p>
                    </div>
                </div>
                <div class="text-xs text-purple-600 flex items-center font-medium">
                    Buka Profil
                    <svg class="w-3 h-3 ml-1 group-hover:translate-x-1 transition-transform" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                        <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M17 8l4 4m0 0l-4 4m4-4H3"></path>
                    </svg>
                </div>
            </a>

            <a href="#" onclick="window.open('/', '_blank')" class="group glass-effect rounded-xl p-6 hover-lift transition-all duration-300 border border-white/30">
                <div class="flex items-center mb-4">
                    <div class="w-10 h-10 bg-gradient-to-br from-orange-500 to-red-500 rounded-lg flex items-center justify-center mr-3 group-hover:scale-110 transition-transform">
                        <svg class="w-5 h-5 text-white" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                            <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M10 6H6a2 2 0 00-2 2v10a2 2 0 002 2h10a2 2 0 002-2v-4M14 4h6m0 0v6m0-6L10 14"></path>
                        </svg>
                    </div>
                    <div>
                        <h4 class="font-semibold text-gray-800">Preview Website</h4>
                        <p class="text-sm text-gray-600">Lihat situs publik</p>
                    </div>
                </div>
                <div class="text-xs text-orange-600 flex items-center font-medium">
                    Buka Situs
                    <svg class="w-3 h-3 ml-1 group-hover:translate-x-1 transition-transform" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                        <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M17 8l4 4m0 0l-4 4m4-4H3"></path>
                    </svg>
                </div>
            </a>
        </div>
    </div>
</div>
                <!-- Activity Feed -->
                <div class="space-y-6">
                    <!-- Recent Activity -->
                    <div class="glass-effect rounded-2xl p-6 border border-white/30">
                        <div class="flex items-center mb-6">
                            <div class="w-8 h-8 cultural-gradient rounded-lg flex items-center justify-center mr-3">
                                <span class="text-lg text-white">📊</span>
                            </div>
                            <h3 class="text-xl font-bold text-gray-800">Aktivitas Terbaru</h3>
                        </div>
                        
                        <div class="space-y-4">
                            <div class="flex items-start space-x-3 p-3 glass-effect rounded-lg border border-white/20">
                                <div class="w-8 h-8 bg-green-500 rounded-full flex items-center justify-center flex-shrink-0">
                                    <svg class="w-4 h-4 text-white" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                                        <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M12 4v16m8-8H4"></path>
                                    </svg>
                                </div>
                                <div class="flex-1 min-w-0">
                                    <p class="text-sm font-medium text-gray-800">Konten baru ditambahkan</p>
                                    <p class="text-xs text-gray-600">"Batik Parang Jogja" - 5 menit lalu</p>
                                </div>
                            </div>

                            <div class="flex items-start space-x-3 p-3 glass-effect rounded-lg border border-white/20">
                                <div class="w-8 h-8 bg-blue-500 rounded-full flex items-center justify-center flex-shrink-0">
                                    <svg class="w-4 h-4 text-white" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                                        <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M15.232 5.232l3.536 3.536m-2.036-5.036a2.5 2.5 0 113.536 3.536L6.5 21.036H3v-3.572L16.732 3.732z"></path>
                                    </svg>
                                </div>
                                <div class="flex-1 min-w-0">
                                    <p class="text-sm font-medium text-gray-800">Galeri diperbarui</p>
                                    <p class="text-xs text-gray-600">"Wayang Kulit" - 2 jam lalu</p>
                                </div>
                            </div>

                            <div class="flex items-start space-x-3 p-3 glass-effect rounded-lg border border-white/20">
                                <div class="w-8 h-8 bg-purple-500 rounded-full flex items-center justify-center flex-shrink-0">
                                    <svg class="w-4 h-4 text-white" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                                        <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M15 12a3 3 0 11-6 0 3 3 0 016 0z"></path>
                                        <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M2.458 12C3.732 7.943 7.523 5 12 5c4.478 0 8.268 2.943 9.542 7-1.274 4.057-5.064 7-9.542 7-4.477 0-8.268-2.943-9.542-7z"></path>
                                    </svg>
                                </div>
                                <div class="flex-1 min-w-0">
                                    <p class="text-sm font-medium text-gray-800">Peningkatan views</p>
                                    <p class="text-xs text-gray-600">+47 kunjungan hari ini</p>
                                </div>
                            </div>

                            <div class="flex items-start space-x-3 p-3 glass-effect rounded-lg border border-white/20">
                                <div class="w-8 h-8 bg-orange-500 rounded-full flex items-center justify-center flex-shrink-0">
                                    <svg class="w-4 h-4 text-white" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                                        <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M9 12l2 2 4-4m6 2a9 9 0 11-18 0 9 9 0 0118 0z"></path>
                                    </svg>
                                </div>
                                <div class="flex-1 min-w-0">
                                    <p class="text-sm font-medium text-gray-800">Backup berhasil</p>
                                    <p class="text-xs text-gray-600">Database - 6 jam lalu</p>
                                </div>
                            </div>
                        </div>
                    </div>

                    <!-- System Status -->
                    <div class="glass-effect rounded-2xl p-6 border border-white/30">
                        <div class="flex items-center mb-6">
                            <div class="w-8 h-8 cultural-gradient rounded-lg flex items-center justify-center mr-3">
                                <span class="text-lg text-white">🔧</span>
                            </div>
                            <h3 class="text-xl font-bold text-gray-800">Status Sistem</h3>
                        </div>
                        
                        <div class="space-y-3">
                            <div class="flex items-center justify-between p-3 glass-effect rounded-lg border border-white/20">
                                <div class="flex items-center space-x-3">
                                    <div class="w-3 h-3 bg-green-500 rounded-full animate-pulse"></div>
                                    <span class="text-sm font-medium text-gray-800">Database</span>
                                </div>
                                <span class="text-xs text-green-600 font-semibold">Online</span>
                            </div>

                            <div class="flex items-center justify-between p-3 glass-effect rounded-lg border border-white/20">
                                <div class="flex items-center space-x-3">
                                    <div class="w-3 h-3 bg-green-500 rounded-full animate-pulse"></div>
                                    <span class="text-sm font-medium text-gray-800">Server</span>
                                </div>
                                <span class="text-xs text-green-600 font-semibold">Aktif</span>
                            </div>

                            <div class="flex items-center justify-between p-3 glass-effect rounded-lg border border-white/20">
                                <div class="flex items-center space-x-3">
                                    <div class="w-3 h-3 bg-yellow-500 rounded-full"></div>
                                    <span class="text-sm font-medium text-gray-800">Backup</span>
                                </div>
                                <span class="text-xs text-yellow-600 font-semibold">Terjadwal</span>
                            </div>

                            <div class="flex items-center justify-between p-3 glass-effect rounded-lg border border-white/20">
                                <div class="flex items-center space-x-3">
                                    <div class="w-3 h-3 bg-green-500 rounded-full animate-pulse"></div>
                                    <span class="text-sm font-medium text-gray-800">CDN</span>
                                </div>
                                <span class="text-xs text-green-600 font-semibold">Optimal</span>
                            </div>
                        </div>
                    </div>
                </div>
            </div>

            <!-- Cultural Spotlight Section -->
            <div class="mt-8">
                <div class="glass-effect rounded-2xl p-8 border border-white/30">
                    <div class="flex items-center justify-between mb-6">
                        <div class="flex items-center">
                            <div class="w-8 h-8 cultural-gradient rounded-lg flex items-center justify-center mr-3">
                                <span class="text-lg text-white">🌟</span>
                            </div>
                            <h3 class="text-xl font-bold text-gray-800">Koleksi Unggulan</h3>
                        </div>
                        <button class="text-sm text-red-600 hover:text-red-700 font-medium flex items-center">
                            Lihat Semua
                            <svg class="w-4 h-4 ml-1" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                                <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M17 8l4 4m0 0l-4 4m4-4H3"></path>
                            </svg>
                        </button>
                    </div>
                    
                    <div class="grid grid-cols-1 md:grid-cols-3 gap-6">
                        <div class="group glass-effect rounded-xl overflow-hidden hover-lift border border-white/30">
                            <div class="h-48 bg-gradient-to-br from-red-400 to-orange-400 flex items-center justify-center">
                                <span class="text-6xl">🎭</span>
                            </div>
                            <div class="p-4">
                                <h4 class="font-semibold text-gray-800 mb-2">Wayang Kulit Jawa</h4>
                                <p class="text-sm text-gray-600 mb-3">Seni pertunjukan tradisional dengan filosofi mendalam</p>
                                <div class="flex items-center justify-between">
                                    <span class="text-xs text-red-600 font-medium">Seni Pertunjukan</span>
                                    <div class="flex items-center text-xs text-gray-500">
                                        <svg class="w-3 h-3 mr-1" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                                            <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M15 12a3 3 0 11-6 0 3 3 0 016 0z"></path>
                                            <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M2.458 12C3.732 7.943 7.523 5 12 5c4.478 0 8.268 2.943 9.542 7-1.274 4.057-5.064 7-9.542 7-4.477 0-8.268-2.943-9.542-7z"></path>
                                        </svg>
                                        247 views
                                    </div>
                                </div>
                            </div>
                        </div>

                        <div class="group glass-effect rounded-xl overflow-hidden hover-lift border border-white/30">
                            <div class="h-48 bg-gradient-to-br from-orange-400 to-yellow-400 flex items-center justify-center">
                                <span class="text-6xl">🌺</span>
                            </div>
                            <div class="p-4">
                                <h4 class="font-semibold text-gray-800 mb-2">Batik Parang Jogja</h4>
                                <p class="text-sm text-gray-600 mb-3">Motif klasik dengan makna kekuatan dan keberanian</p>
                                <div class="flex items-center justify-between">
                                    <span class="text-xs text-orange-600 font-medium">Tekstil</span>
                                    <div class="flex items-center text-xs text-gray-500">
                                        <svg class="w-3 h-3 mr-1" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                                            <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M15 12a3 3 0 11-6 0 3 3 0 016 0z"></path>
                                            <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M2.458 12C3.732 7.943 7.523 5 12 5c4.478 0 8.268 2.943 9.542 7-1.274 4.057-5.064 7-9.542 7-4.477 0-8.268-2.943-9.542-7z"></path>
                                        </svg>
                                        183 views
                                    </div>
                                </div>
                            </div>
                        </div>

                        <div class="group glass-effect rounded-xl overflow-hidden hover-lift border border-white/30">
                            <div class="h-48 bg-gradient-to-br from-yellow-400 to-green-400 flex items-center justify-center">
                                <span class="text-6xl">🏛️</span>
                            </div>
                            <div class="p-4">
                                <h4 class="font-semibold text-gray-800 mb-2">Candi Borobudur</h4>
                                <p class="text-sm text-gray-600 mb-3">Keajaiban arsitektur Buddha terbesar di dunia</p>
                                <div class="flex items-center justify-between">
                                    <span class="text-xs text-yellow-600 font-medium">Arsitektur</span>
                                    <div class="flex items-center text-xs text-gray-500">
                                        <svg class="w-3 h-3 mr-1" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                                            <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M15 12a3 3 0 11-6 0 3 3 0 016 0z"></path>
                                            <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M2.458 12C3.732 7.943 7.523 5 12 5c4.478 0 8.268 2.943 9.542 7-1.274 4.057-5.064 7-9.542 7-4.477 0-8.268-2.943-9.542-7z"></path>
                                        </svg>
                                        412 views
                                    </div>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </main>
    </div>

    <script>
        // Mobile sidebar toggle
        const sidebarToggle = document.getElementById('sidebar-toggle');
        const sidebar = document.getElementById('sidebar');
        const overlay = document.getElementById('overlay');

        function toggleSidebar() {
            sidebar.classList.toggle('sidebar-hidden');
            sidebar.classList.toggle('sidebar-visible');
            overlay.classList.toggle('hidden');
        }

        sidebarToggle.addEventListener('click', toggleSidebar);
        overlay.addEventListener('click', toggleSidebar);

        // User dropdown
        const userMenuBtn = document.getElementById('user-menu-btn');
        const userDropdown = document.getElementById('user-dropdown');

        userMenuBtn.addEventListener('click', function(e) {
            e.stopPropagation();
            userDropdown.classList.toggle('show');
        });

        // Close dropdown when clicking outside
        document.addEventListener('click', function() {
            userDropdown.classList.remove('show');
        });

        userDropdown.addEventListener('click', function(e) {
            e.stopPropagation();
        });

        // Animate elements on scroll
        const observerOptions = {
            threshold: 0.1,
            rootMargin: '0px 0px -50px 0px'
        };

        const observer = new IntersectionObserver(function(entries) {
            entries.forEach(entry => {
                if (entry.isIntersecting) {
                    entry.target.style.opacity = '1';
                    entry.target.style.transform = 'translateY(0)';
                }
            });
        }, observerOptions);

        // Observe elements with slide-up class
        document.querySelectorAll('.slide-up').forEach(el => {
            observer.observe(el);
        });

        // Dynamic time update
        function updateTime() {
            const now = new Date();
            const options = { 
                weekday: 'long', 
                year: 'numeric', 
                month: 'long', 
                day: 'numeric' 
            };
            const dateString = now.toLocaleDateString('id-ID', options);
            
            const timeElement = document.querySelector('header p');
            if (timeElement && timeElement.textContent.includes('Juni')) {
                timeElement.textContent = dateString;
            }
        }

        // Update time every minute
        updateTime();
        setInterval(updateTime, 60000);

        // Add loading states for quick actions
        document.querySelectorAll('a[href*="route"]').forEach(link => {
            link.addEventListener('click', function(e) {
                // Add loading state
                const loadingSpinner = document.createElement('div');
                loadingSpinner.innerHTML = `
                    <svg class="animate-spin w-4 h-4" fill="none" viewBox="0 0 24 24">
                        <circle class="opacity-25" cx="12" cy="12" r="10" stroke="currentColor" stroke-width="4"></circle>
                        <path class="opacity-75" fill="currentColor" d="M4 12a8 8 0 018-8V0C5.373 0 0 5.373 0 12h4zm2 5.291A7.962 7.962 0 014 12H0c0 3.042 1.135 5.824 3 7.938l3-2.647z"></path>
                    </svg>
                `;
                
                const arrow = this.querySelector('svg:last-child');
                if (arrow) {
                    arrow.style.display = 'none';
                    this.appendChild(loadingSpinner);
                    
                    // Remove loading state after 2 seconds (in case navigation is slow)
                    setTimeout(() => {
                        loadingSpinner.remove();
                        arrow.style.display = 'inline';
                    }, 2000);
                }
            });
        });

        // Simulate real-time metrics updates
        function updateMetrics() {
            const metrics = document.querySelectorAll('.metric-card .text-3xl');
            
            metrics.forEach((metric, index) => {
                const currentValue = parseInt(metric.textContent.replace(/[^\d]/g, ''));
                let newValue = currentValue;
                
                // Random small changes for demo
                if (Math.random() > 0.7) {
                    const change = Math.floor(Math.random() * 3) - 1; // -1, 0, or 1
                    newValue = Math.max(0, currentValue + change);
                    
                    if (newValue !== currentValue) {
                        metric.style.transform = 'scale(1.1)';
                        metric.style.color = change > 0 ? '#10b981' : '#ef4444';
                        
                        setTimeout(() => {
                            metric.textContent = newValue.toLocaleString();
                            metric.style.transform = 'scale(1)';
                            metric.style.color = '';
                        }, 200);
                    }
                }
            });
        }

        // Update metrics every 30 seconds for demo
        setInterval(updateMetrics, 30000);

        // Add ripple effect to buttons
        document.querySelectorAll('a, button').forEach(element => {
            element.addEventListener('click', function(e) {
                const ripple = document.createElement('span');
                const rect = this.getBoundingClientRect();
                const size = Math.max(rect.width, rect.height);
                const x = e.clientX - rect.left - size / 2;
                const y = e.clientY - rect.top - size / 2;
                
                ripple.style.cssText = `
                    position: absolute;
                    width: ${size}px;
                    height: ${size}px;
                    left: ${x}px;
                    top: ${y}px;
                    background: rgba(255, 255, 255, 0.5);
                    border-radius: 50%;
                    transform: scale(0);
                    animation: ripple 0.6s linear;
                    pointer-events: none;
                `;
                
                this.style.position = 'relative';
                this.style.overflow = 'hidden';
                this.appendChild(ripple);
                
                setTimeout(() => {
                    ripple.remove();
                }, 600);
            });
        });

        // Add ripple animation to CSS
        const style = document.createElement('style');
        style.textContent = `
            @keyframes ripple {
                to {
                    transform: scale(4);
                    opacity: 0;
                }
            }
        `;
        document.head.appendChild(style);
    </script>
</body>
</html>