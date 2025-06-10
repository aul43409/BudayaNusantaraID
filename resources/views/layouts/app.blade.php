<!DOCTYPE html>
<html lang="id" data-bs-theme="light">
<head>
    <meta charset="UTF-8" />
    <meta name="viewport" content="width=device-width, initial-scale=1" />
    <meta name="description" content="Eksplorasi keragaman budaya Indonesia - tradisi, seni, dan kekayaan budaya dari Sabang sampai Merauke" />
    <title>@yield('title', 'Keragaman Budaya Indonesia')</title>

    <!-- Bootstrap CSS CDN -->
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0/dist/css/bootstrap.min.css" rel="stylesheet" />

    <style>
        .bd-placeholder-img {
            font-size: 1.125rem;
            text-anchor: middle;
            -webkit-user-select: none;
            -moz-user-select: none;
            user-select: none;
        }

        @media (min-width: 768px) {
            .bd-placeholder-img-lg {
                font-size: 3.5rem;
            }
        }

        .carousel-item {
            height: 32rem;
            background-size: cover;
            background-position: center;
        }

        .carousel-item img {
            object-fit: cover;
            height: 100%;
        }

        .marketing .col-lg-4 {
            margin-bottom: 1.5rem;
            text-align: center;
        }

        .marketing .col-lg-4 p {
            margin-right: .75rem;
            margin-left: .75rem;
        }

        .featurette-divider {
            margin: 5rem 0;
        }

        .featurette-heading {
            letter-spacing: -.05rem;
        }

        .featurette {
            padding: 0 15px;
        }

        footer {
            padding: 2.5rem 0;
            color: #727272;
            background-color: #f9f9f9;
            border-top: .05rem solid #e5e5e5;
        }

        .hero-section {
            background-color: rgba(0, 0, 0, 0.7);
            padding: 2rem;
            border-radius: 0.5rem;
        }

        .custom-card {
            transition: transform 0.3s;
            box-shadow: 0 4px 8px rgba(0, 0, 0, 0.1);
        }

        .custom-card:hover {
            transform: translateY(-5px);
        }

        .region-marker {
            display: inline-block;
            padding: 0.25rem 0.5rem;
            background-color: #dc3545;
            color: white;
            border-radius: 0.25rem;
            font-size: 0.8rem;
            margin-bottom: 0.5rem;
        }
    </style>
</head>

<body>
    <!-- Header & Navigation -->
    <header data-bs-theme="dark">
        <nav class="navbar navbar-expand-lg navbar-dark bg-danger">
            <div class="container">
                <a class="navbar-brand" href="{{ url('/') }}">NUSANTARA BUDAYA</a>
                <button class="navbar-toggler" type="button" data-bs-toggle="collapse" data-bs-target="#navbarCollapse"
                    aria-controls="navbarCollapse" aria-expanded="false" aria-label="Toggle navigation">
                    <span class="navbar-toggler-icon"></span>
                </button>

                <div class="collapse navbar-collapse" id="navbarCollapse">
                    <ul class="navbar-nav ms-auto mb-2 mb-lg-0">
                        <li class="nav-item">
                            <a class="nav-link {{ request()->is('/') ? 'active' : '' }}" aria-current="page"
                                href="{{ url('/') }}">Beranda</a>
                        </li>
                        <li class="nav-item">
                            <a class="nav-link {{ request()->is('about') ? 'active' : '' }}"
                                href="{{ url('/about') }}">Tentang</a>
                        </li>
                        <li class="nav-item">
                            <a class="nav-link {{ request()->is('gallery') ? 'active' : '' }}"
                                href="{{ url('/gallery') }}">Galeri</a>
                        </li>
                        <li class="nav-item">
                            <a class="nav-link {{ request()->is('contact') ? 'active' : '' }}"
                                href="{{ url('/contact') }}">Kontak</a>
                        </li>

                        @guest
                            <li class="nav-item">
                                <a class="nav-link" href="{{ route('login') }}">Login</a>
                            </li>
                            @if (Route::has('register'))
                                <li class="nav-item">
                                    <a class="nav-link" href="{{ route('register') }}">Register</a>
                                </li>
                            @endif
                        @else
                            <li class="nav-item dropdown">
                                <a id="navbarDropdown" class="nav-link dropdown-toggle" href="#" role="button"
                                    data-bs-toggle="dropdown" aria-haspopup="true" aria-expanded="false" v-pre>
                                    {{ Auth::user()->name }}
                                </a>

                                <ul class="dropdown-menu dropdown-menu-end" aria-labelledby="navbarDropdown">
                                    <li>
                                        <a class="dropdown-item" href="{{ route('logout') }}"
                                            onclick="event.preventDefault();
                                                     document.getElementById('logout-form').submit();">
                                            Logout
                                        </a>

                                        <form id="logout-form" action="{{ route('logout') }}" method="POST" class="d-none">
                                            @csrf
                                        </form>
                                    </li>
                                </ul>
                            </li>
                        @endguest

                    </ul>
                </div>
            </div>
        </nav>
    </header>

    <!-- Main Content -->
    <main>
        @yield('content')
    </main>

    <!-- Footer -->
    <footer class="container-fluid py-4 bg-danger text-white">
        <div class="container">
            <div class="row">
                <div class="col-md-6">
                    <h5>Nusantara Budaya</h5>
                    <p>Melestarikan dan mengapresiasi keanekaragaman budaya Indonesia dari Sabang sampai Merauke.</p>
                </div>
                <div class="col-md-3">
                    <h5>Tautan</h5>
                    <ul class="list-unstyled">
                        <li><a class="text-white-50" href="{{ url('/') }}">Beranda</a></li>
                        <li><a class="text-white-50" href="{{ url('/about') }}">Tentang</a></li>
                        <li><a class="text-white-50" href="{{ url('/gallery') }}">Galeri</a></li>
                        <li><a class="text-white-50" href="{{ url('/contact') }}">Kontak</a></li>
                    </ul>
                </div>
                <div class="col-md-3">
                    <h5>Hubungi Kami</h5>
                    <ul class="list-unstyled">
                        <li class="text-white-50">Email: info@nusantarabudaya.id</li>
                        <li class="text-white-50">Telepon: +62 812 3456 7890</li>
                    </ul>
                </div>
            </div>
            <hr class="my-4 bg-light" />
            <p class="text-center mb-0">© {{ date('Y') }} Nusantara Budaya. Seluruh hak cipta dilindungi.</p>
            <p class="text-center"><a class="text-white-50" href="#top">Kembali ke atas</a></p>
        </div>
    </footer>

    <!-- Bootstrap JS CDN -->
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0/dist/js/bootstrap.bundle.min.js"></script>
</body>

</html>
