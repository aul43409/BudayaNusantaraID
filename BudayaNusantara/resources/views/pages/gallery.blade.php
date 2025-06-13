@extends('layouts.app')

@section('title', 'Galeri - Keragaman Budaya Indonesia')

@section('content')
<div class="container py-5">
    <div class="row mb-4">
        <div class="col-md-12 text-center">
            <h1>Galeri Keragaman Budaya Indonesia</h1>
            <p class="lead">Menelusuri keindahan dan keunikan budaya dari berbagai penjuru Nusantara</p>
        </div>
    </div>
    
    <!-- Gallery Categories -->
    <div class="row mb-4">
        <div class="col-12">
            <nav class="navbar navbar-expand-lg navbar-light bg-light rounded">
            </nav>
        </div>
    </div>
    
    <!-- Featured Item -->
    <div class="row mb-5">
        <div class="col-12">
            <div class="card bg-dark text-white border-0 rounded-3 overflow-hidden">
                <img src="https://storage.googleapis.com/storage-ajaib-prd-platform-wp-artifact/2020/06/Keragaman-Budaya-Indonesia.jpg" class="card-img" alt="Budaya Indonesia">
                <div class="card-img-overlay d-flex flex-column justify-content-end" style="background: linear-gradient(0deg, rgba(0,0,0,0.7) 0%, rgba(0,0,0,0) 100%);">
                    <span class="badge bg-danger mb-2">Unggulan</span>
                    <h3 class="card-title">Keragaman Budaya Indonesia: Menyatukan Perbedaan dalam Harmoni</h3>
                    <p class="card-text">Eksplorasi visual mengenai bagaimana Indonesia menjaga keseimbangan antara mempertahankan keunikan tiap budaya dan menciptakan identitas nasional yang inklusif.</p>
                </div>
            </div>
        </div>
    </div>
    
    <!-- Gallery Items - First Row: Pakaian Adat -->
    <div class="row mb-4">
        <div class="col-12">
            <h3 class="border-start border-4 border-danger ps-3">Pakaian Adat Nusantara</h3>
            <p>Keberagaman busana tradisional yang mencerminkan identitas dan nilai-nilai masyarakat di berbagai daerah.</p>
        </div>
    </div>
    
    <div class="row mb-5 g-4">
        <div class="col-md-3 col-6">
            <div class="card h-100 custom-card">
                <img src="https://infokost.id/blog/wp-content/uploads/2023/10/Nama-Pakaian-Adat-Sumatera-Utara.webp" class="card-img-top" alt="Ulos Batak">
                <div class="card-body">
                    <span class="region-marker">Sumatera Utara</span>
                    <h5 class="card-title">Ulos Batak</h5>
                    <p class="card-text small">Kain tenun tradisional masyarakat Batak yang memiliki makna spiritual dan sosial dalam berbagai upacara adat.</p>
                </div>
            </div>
        </div>
        
        <div class="col-md-3 col-6">
            <div class="card h-100 custom-card">
                <img src="https://assets.promediateknologi.id/crop/0x0:0x0/750x500/webp/photo/2023/08/04/Snapinstaapp_334849439_1981022142234940_6665247490311761773_n_1080-3630450252.jpg" class="card-img-top" alt="Kebaya Jawa">
                <div class="card-body">
                    <span class="region-marker">Jawa</span>
                    <h5 class="card-title">Kebaya Jawa</h5>
                    <p class="card-text small">Pakaian tradisional wanita Jawa yang mencerminkan keanggunan dan kesederhanaan dalam filosofi hidup masyarakat Jawa.</p>
                </div>
            </div>
        </div>
        
        <div class="col-md-3 col-6">
            <div class="card h-100 custom-card">
                <img src="https://i.pinimg.com/736x/f0/58/c6/f058c67c6945403d7798e17ea78026c8.jpg" class="card-img-top" alt="Payas Agung Bali">
                <div class="card-body">
                    <span class="region-marker">Bali</span>
                    <h5 class="card-title">Payas Agung</h5>
                    <p class="card-text small">Busana adat pernikahan Bali dengan perhiasan mendetail yang mencerminkan keindahan dan kemewahan budaya Bali.</p>
                </div>
            </div>
        </div>
        
        <div class="col-md-3 col-6">
            <div class="card h-100 custom-card">
                <img src="https://serayunews.pw/wp-content/uploads/2024/08/baju-bodo.jpeg" class="card-img-top" alt="Baju Bodo">
                <div class="card-body">
                    <span class="region-marker">Sulawesi Selatan</span>
                    <h5 class="card-title">Baju Bodo</h5>
                    <p class="card-text small">Pakaian adat wanita Bugis-Makassar dengan warna-warna cerah yang melambangkan stratifikasi sosial pemakainya.</p>
                </div>
            </div>
        </div>
    </div>
    
    <!-- Gallery Items - Second Row: Rumah Adat -->
    <div class="row mb-4">
        <div class="col-12">
            <h3 class="border-start border-4 border-danger ps-3">Rumah Adat</h3>
            <p>Arsitektur tradisional yang mencerminkan adaptasi terhadap lingkungan dan nilai-nilai sosial masyarakat.</p>
        </div>
    </div>
    
    <div class="row mb-5 g-4">
        <div class="col-md-6 mb-4">
            <div class="card custom-card h-100">
                <div class="row g-0">
                    <div class="col-md-5">
                        <img src="https://www.ruparupa.com/blog/wp-content/uploads/2022/02/toraja-houses-1500.jpg" class="img-fluid rounded-start h-100" style="object-fit: cover;" alt="Tongkonan">
                    </div>
                    <div class="col-md-7">
                        <div class="card-body">
                            <span class="region-marker">Sulawesi Selatan</span>
                            <h5 class="card-title">Tongkonan</h5>
                            <p class="card-text">Rumah adat Toraja dengan atap melengkung seperti perahu yang menjadi pusat kehidupan sosial dan ritual masyarakat Toraja. Tongkonan memiliki struktur yang dibangun berdasarkan filosofi tiga lapisan dunia: dunia atas (langit), dunia tengah (bumi), dan dunia bawah.</p>
                        </div>
                    </div>
                </div>
            </div>
        </div>
        
        <div class="col-md-6 mb-4">
            <div class="card custom-card h-100">
                <div class="row g-0">
                    <div class="col-md-5">
                        <img src="https://awsimages.detik.net.id/community/media/visual/2023/08/09/rumah-adat-sumatera-barat_169.jpeg?w=1200" class="img-fluid rounded-start h-100" style="object-fit: cover;" alt="Rumah Gadang">
                    </div>
                    <div class="col-md-7">
                        <div class="card-body">
                            <span class="region-marker">Sumatera Barat</span>
                            <h5 class="card-title">Rumah Gadang</h5>
                            <p class="card-text">Rumah adat Minangkabau dengan atap bergonjong menyerupai tanduk kerbau. Struktur rumah mencerminkan sistem matrilineal masyarakat Minang, dengan kamar-kamar yang disusun berdasarkan hierarki perempuan dalam keluarga.</p>
                        </div>
                    </div>
                </div>
            </div>
        </div>
        
        <div class="col-md-6 mb-4">
            <div class="card custom-card h-100">
                <div class="row g-0">
                    <div class="col-md-5">
                        <img src="https://cdn2.gnfi.net/gnfi/uploads/articles/rumah-betang-2-34f72cc687b5321f675abebe64ab962b.jpg" class="img-fluid rounded-start h-100" style="object-fit: cover;" alt="Rumah Betang">
                    </div>
                    <div class="col-md-7">
                        <div class="card-body">
                            <span class="region-marker">Kalimantan</span>
                            <h5 class="card-title">Rumah Betang</h5>
                            <p class="card-text">Rumah panjang tradisional suku Dayak yang dapat menampung hingga 150 orang. Dibangun tinggi di atas tiang untuk menghindari banjir dan serangan musuh, Rumah Betang mencerminkan nilai kebersamaan dan gotong royong.</p>
                        </div>
                    </div>
                </div>
            </div>
        </div>
        
        <div class="col-md-6 mb-4">
            <div class="card custom-card h-100">
                <div class="row g-0">
                    <div class="col-md-5">
                        <img src="https://www.ruparupa.com/blog/wp-content/uploads/2022/02/rumah-adat-papua-e1645175880542.jpg" class="img-fluid rounded-start h-100" style="object-fit: cover;" alt="Honai">
                    </div>
                    <div class="col-md-7">
                        <div class="card-body">
                            <span class="region-marker">Papua</span>
                            <h5 class="card-title">Honai</h5>
                            <p class="card-text">Rumah tradisional suku Dani di Papua yang berbentuk bundar dengan atap kerucut. Honai dirancang untuk menyimpan panas di malam hari di daerah pegunungan yang dingin. Terdapat pembagian Honai berdasarkan gender dan fungsi sosial.</p>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>
    
    <!-- Gallery Items - Third Row: Tarian -->
    <div class="row mb-4">
        <div class="col-12">
            <h3 class="border-start border-4 border-danger ps-3">Tarian Tradisional</h3>
            <p>Ekspresi gerak yang menceritakan nilai-nilai, sejarah, dan pandangan hidup masyarakat.</p>
        </div>
    </div>
    
    <div class="row mb-5">
        <div class="col-md-4 col-6 mb-4">
            <div class="card custom-card h-100">
                <img src="https://geti.id/wp-content/uploads/2023/08/image-1024x695.png" class="card-img-top" alt="Tari Kecak">
                <div class="card-body">
                    <span class="region-marker">Bali</span>
                    <h5 class="card-title">Tari Kecak</h5>
                    <p class="card-text">Tarian yang menampilkan puluhan penari pria yang duduk melingkar dan menyerukan "cak" secara berirama. Tarian ini menceritakan epos Ramayana dan merupakan perpaduan seni tari dan musik vokal.</p>
                </div>
            </div>
        </div>
        
        <div class="col-md-4 col-6 mb-4">
            <div class="card custom-card h-100">
                <img src="https://awsimages.detik.net.id/community/media/visual/2023/10/22/peringatan-hari-santri-nasional-di-depok_169.jpeg?w=1200" class="card-img-top" alt="Tari Saman">
                <div class="card-body">
                    <span class="region-marker">Aceh</span>
                    <h5 class="card-title">Tari Saman</h5>
                    <p class="card-text">Dikenal juga sebagai "tari seribu tangan" karena gerakan tangan yang cepat dan serentak. Tarian ini menggabungkan tepukan dada, tepukan tangan, dan nyanyian yang berisi pesan moral dan religius.</p>
                </div>
            </div>
        </div>
        
        <div class="col-md-4 col-6 mb-4">
            <div class="card custom-card h-100">
                <img src="https://cdn1-production-images-kly.akamaized.net/vB_3aarb4JivtKdNAy4pLEdqmE0=/1200x675/smart/filters:quality(75):strip_icc():format(webp)/kly-media-production/medias/2078933/original/042938000_1523531464-jumenengan-2.jpg" class="card-img-top" alt="Tari Bedhaya">
                <div class="card-body">
                    <span class="region-marker">Jawa Tengah</span>
                    <h5 class="card-title">Tari Bedhaya</h5>
                    <p class="card-text">Tarian sakral Jawa yang dibawakan oleh sembilan penari wanita, melambangkan sembilan lubang dalam tubuh manusia. Gerakan halus dan anggun mencerminkan falsafah keseimbangan hidup masyarakat Jawa.</p>
                </div>
            </div>
        </div>
    </div>
    
    <!-- Pagination -->
    <div class="row">
        <div class="col-12">
            <nav aria-label="Gallery pagination">
                <ul class="pagination justify-content-center">
                    <li class="page-item disabled">
                        <a class="page-link" href="#" tabindex="-1" aria-disabled="true">Sebelumnya</a>
                    </li>
                    <li class="page-item active" aria-current="page">
                        <a class="page-link" href="#">1</a>
                    </li>
                    <li class="page-item">
                        <a class="page-link" href="#">2</a>
                    </li>
                    <li class="page-item">
                        <a class="page-link" href="#">3</a>
                    </li>
                    <li class="page-item">
                        <a class="page-link" href="#">Berikutnya</a>
                    </li>
                </ul>
            </nav>
        </div>
    </div>
</div>
@endsection 