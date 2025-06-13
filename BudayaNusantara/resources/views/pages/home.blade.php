@extends('layouts.app')

@section('title', 'Beranda - Keragaman Budaya Indonesia')

@section('content')
<!-- Carousel -->
<div id="budayaCarousel" class="carousel slide mb-6" data-bs-ride="carousel">
    <div class="carousel-indicators">
        <button type="button" data-bs-target="#budayaCarousel" data-bs-slide-to="0" class="active" aria-current="true"></button>
        <button type="button" data-bs-target="#budayaCarousel" data-bs-slide-to="1"></button>
        <button type="button" data-bs-target="#budayaCarousel" data-bs-slide-to="2"></button>
    </div>
    <div class="carousel-inner">
        <div class="carousel-item active">
            <img src="https://dio-living.id/wp-content/uploads/2022/05/1566911962-keragaman-.jpg" class="d-block w-100" alt="Keragaman Budaya Indonesia">
            <div class="container">
                <div class="carousel-caption text-start hero-section">
                    <h1>Pesona Keragaman Budaya Indonesia</h1>
                    <p>Menjelajahi mozaik budaya Nusantara yang kaya dan beragam dari ujung barat hingga timur</p>
                    <p><a class="btn btn-lg btn-danger" href="{{ url('/gallery') }}">Jelajahi</a></p>
                </div>
            </div>
        </div>
        <div class="carousel-item">
            <img src="https://awsimages.detik.net.id/community/media/visual/2017/12/18/3a88707a-2dc8-4158-b8a6-ce652560e380_43.jpeg?w=1200" class="d-block w-100" alt="Upacara Adat">
            <div class="container">
                <div class="carousel-caption hero-section">
                    <h1>Upacara Adat & Tradisi</h1>
                    <p>Ritual dan upacara adat yang masih lestari, menjaga kebijaksanaan dan nilai-nilai leluhur</p>
                    <p><a class="btn btn-lg btn-danger" href="{{ url('/gallery') }}">Lihat Koleksi</a></p>
                </div>
            </div>
        </div>
        <div class="carousel-item">
            <img src="https://assets.pikiran-rakyat.com/crop/0x0:0x0/x/photo/2024/05/13/3769738628.jpg" class="d-block w-100" alt="Kesenian Indonesia">
            <div class="container">
                <div class="carousel-caption text-end hero-section">
                    <h1>Seni & Kerajinan Tradisional</h1>
                    <p>Kemahiran tangan dan ekspresi artistik dalam bentuk kesenian dan kerajinan dari berbagai daerah</p>
                    <p><a class="btn btn-lg btn-danger" href="{{ url('/about') }}">Pelajari</a></p>
                </div>
            </div>
        </div>
    </div>
    <button class="carousel-control-prev" type="button" data-bs-target="#budayaCarousel" data-bs-slide="prev">
        <span class="carousel-control-prev-icon" aria-hidden="true"></span>
        <span class="visually-hidden">Sebelumnya</span>
    </button>
    <button class="carousel-control-next" type="button" data-bs-target="#budayaCarousel" data-bs-slide="next">
        <span class="carousel-control-next-icon" aria-hidden="true"></span>
        <span class="visually-hidden">Berikutnya</span>
    </button>
</div>

<!-- Region Navigation -->
<div class="container mb-5">
    <div class="row">
        <div class="col-12 text-center mb-4">
            <h2>Jelajahi Wilayah Budaya Indonesia</h2>
            <p class="lead">Kunjungi berbagai wilayah dengan keunikan budaya yang beragam</p>
        </div>
    </div>
    <div class="row justify-content-center">
        <div class="col-md-2 col-6 mb-3 text-center">
            <div class="card custom-card h-100">
                <div class="card-body">
                    <h5>Sumatera</h5>
                    <p class="small">Minangkabau, Batak, Aceh</p>
                    <a href="#" class="btn btn-sm btn-outline-danger">Jelajah</a>
                </div>
            </div>
        </div>
        <div class="col-md-2 col-6 mb-3 text-center">
            <div class="card custom-card h-100">
                <div class="card-body">
                    <h5>Jawa</h5>
                    <p class="small">Sunda, Jawa, Betawi</p>
                    <a href="#" class="btn btn-sm btn-outline-danger">Jelajah</a>
                </div>
            </div>
        </div>
        <div class="col-md-2 col-6 mb-3 text-center">
            <div class="card custom-card h-100">
                <div class="card-body">
                    <h5>Kalimantan</h5>
                    <p class="small">Dayak, Banjar, Kutai</p>
                    <a href="#" class="btn btn-sm btn-outline-danger">Jelajah</a>
                </div>
            </div>
        </div>
        <div class="col-md-2 col-6 mb-3 text-center">
            <div class="card custom-card h-100">
                <div class="card-body">
                    <h5>Sulawesi</h5>
                    <p class="small">Bugis, Toraja, Minahasa</p>
                    <a href="#" class="btn btn-sm btn-outline-danger">Jelajah</a>
                </div>
            </div>
        </div>
        <div class="col-md-2 col-6 mb-3 text-center">
            <div class="card custom-card h-100">
                <div class="card-body">
                    <h5>Maluku & Papua</h5>
                    <p class="small">Asmat, Dani, Ambon</p>
                    <a href="#" class="btn btn-sm btn-outline-danger">Jelajah</a>
                </div>
            </div>
        </div>
    </div>
</div>

<!-- Marketing Section -->
<div class="container marketing">
    <!-- Three columns -->
    <div class="row">
        <div class="col-lg-4">
            <img src="https://ik.imagekit.io/tvlk/blog/2025/02/pola-lantai-tari-saman-lengkap-dengan-fungsi-dan-penjelasannya90.webp" class="bd-placeholder-img rounded-circle" width="140" height="140" alt="Tarian Tradisional">
            <h2 class="fw-normal">Tarian Tradisional</h2>
            <p>Keindahan gerak dan makna dalam tarian tradisional Indonesia yang menceritakan sejarah, nilai, dan kepercayaan masyarakat pendukungnya.</p>
            <p><a class="btn btn-danger" href="#">Lihat Tarian »</a></p>
        </div>
        <div class="col-lg-4">
            <img src="https://cnc-magazine.oramiland.com/parenting/images/Pakaian-Adat-Bangka-Belitung.width-800.format-webp.webp" class="bd-placeholder-img rounded-circle" width="140" height="140" alt="Pakaian Adat">
            <h2 class="fw-normal">Pakaian Adat</h2>
            <p>Keberagaman busana tradisional yang mencerminkan identitas suku, status sosial, dan nilai estetika masing-masing daerah di Indonesia.</p>
            <p><a class="btn btn-danger" href="#">Lihat Pakaian »</a></p>
        </div>
        <div class="col-lg-4">
            <img src="https://cdn2.gnfi.net/gnfi/uploads/articles/gede-putu-agus-sunantara-melasti-gianyar-bali-b1ff5a4af5abb630bc4ad4068d560b02.jpg" class="bd-placeholder-img rounded-circle" width="140" height="140" alt="Upacara Adat">
            <h2 class="fw-normal">Upacara Adat</h2>
            <p>Ritual dan upacara yang masih lestari sebagai bentuk penghormatan pada leluhur dan menjaga harmoni dengan alam di berbagai daerah.</p>
            <p><a class="btn btn-danger" href="#">Lihat Upacara »</a></p>
        </div>
    </div>

    <!-- Featurettes -->
    <hr class="featurette-divider">

    <div class="row featurette">
        <div class="col-md-7">
            <span class="region-marker">Jawa</span>
            <h2 class="featurette-heading fw-normal">Wayang: Seni Pertunjukan Adiluhung. <span class="text-body-secondary">Warisan Dunia UNESCO.</span></h2>
            <p class="lead">Wayang merupakan seni pertunjukan tradisional Indonesia yang telah diakui UNESCO sebagai Warisan Budaya Dunia. Dengan berbagai jenis seperti Wayang Kulit, Wayang Golek, dan Wayang Orang, seni ini menjadi media penyampaian nilai-nilai moral, etika, dan spiritualitas dalam masyarakat. Ki Dalang, sang dalang, tidak hanya bertindak sebagai penggerak wayang tetapi juga sebagai penjaga dan penerus kebijaksanaan leluhur.</p>
        </div>
        <div class="col-md-5">
            <img src="https://tribratanews.polri.go.id/web/image/blog.post/55721/image" class="bd-placeholder-img bd-placeholder-img-lg featurette-image img-fluid mx-auto" alt="Wayang Kulit">
        </div>
    </div>

    <hr class="featurette-divider">

    <div class="row featurette">
        <div class="col-md-7 order-md-2">
            <span class="region-marker">Bali</span>
            <h2 class="featurette-heading fw-normal">Subak: Sistem Irigasi Tradisional Bali. <span class="text-body-secondary">Filosofi Tri Hita Karana.</span></h2>
            <p class="lead">Subak adalah sistem irigasi tradisional di Bali yang telah ada sejak abad ke-9. Lebih dari sekadar sistem pengairan, Subak mencerminkan filosofi Tri Hita Karana yang menekankan keharmonisan hubungan antara manusia dengan Tuhan, manusia dengan sesama, dan manusia dengan alam. UNESCO mengakui Subak sebagai Warisan Budaya Dunia karena integrasinya dengan upacara keagamaan, struktur sosial, dan keberlanjutan ekologis.</p>
        </div>
        <div class="col-md-5 order-md-1">
            <img src="https://indonesia.go.id/assets/upload/headline//1604987231_sawah_bali.jpeg" class="bd-placeholder-img bd-placeholder-img-lg featurette-image img-fluid mx-auto" alt="Subak Bali">
        </div>
    </div>

    <hr class="featurette-divider">

    <div class="row featurette">
        <div class="col-md-7">
            <span class="region-marker">Toraja</span>
            <h2 class="featurette-heading fw-normal">Rambu Solo: Upacara Pemakaman Toraja. <span class="text-body-secondary">Penghormatan pada leluhur.</span></h2>
            <p class="lead">Rambu Solo adalah upacara pemakaman tradisional masyarakat Toraja di Sulawesi Selatan yang sangat kompleks dan dapat berlangsung selama beberapa hari hingga minggu. Upacara ini menunjukkan penghormatan terhadap leluhur dan status sosial keluarga. Dalam kepercayaan Toraja, kematian bukanlah akhir melainkan perjalanan panjang menuju Puya (alam baka). Pengorbanan kerbau (tedong) dalam jumlah banyak menjadi simbol penting dalam upacara ini.</p>
        </div>
        <div class="col-md-5">
            <img src="https://kamboja.co.id/wp-content/uploads/2022/06/Upacara-Pemakaman-Ditoraja.jpeg" class="bd-placeholder-img bd-placeholder-img-lg featurette-image img-fluid mx-auto" alt="Rambu Solo Toraja">
        </div>
    </div>

    <hr class="featurette-divider">

    <div class="row">
        <div class="col-md-12 text-center mb-5">
            <h2>Fakta Keragaman Budaya Indonesia</h2>
            <p class="lead">Indonesia memiliki kekayaan budaya yang menakjubkan</p>
        </div>
    </div>

    <div class="row text-center">
        <div class="col-md-3 col-6 mb-4">
            <div class="card custom-card h-100 border-danger">
                <div class="card-body">
                    <h3 class="card-title text-danger">1.340+</h3>
                    <p class="card-text">Suku Bangsa di seluruh Indonesia</p>
                </div>
            </div>
        </div>
        <div class="col-md-3 col-6 mb-4">
            <div class="card custom-card h-100 border-danger">
                <div class="card-body">
                    <h3 class="card-title text-danger">718+</h3>
                    <p class="card-text">Bahasa Daerah yang masih digunakan</p>
                </div>
            </div>
        </div>
        <div class="col-md-3 col-6 mb-4">
            <div class="card custom-card h-100 border-danger">
                <div class="card-body">
                    <h3 class="card-title text-danger">3.000+</h3>
                    <p class="card-text">Tarian Tradisional dari berbagai daerah</p>
                </div>
            </div>
        </div>
        <div class="col-md-3 col-6 mb-4">
            <div class="card custom-card h-100 border-danger">
                <div class="card-body">
                    <h3 class="card-title text-danger">5.350+</h3>
                    <p class="card-text">Resep Makanan Tradisional yang unik</p>
                </div>
            </div>
        </div>
    </div>

    <hr class="featurette-divider">
</div>
@endsection 