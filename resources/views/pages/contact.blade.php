@extends('layouts.app')

@section('title', 'Kontak - Keragaman Budaya Indonesia')

@section('content')
<div class="container py-5">
    <div class="row mb-5">
        <div class="col-md-12 text-center">
            <h1>Hubungi Kami</h1>
            <p class="lead">Mari bersama melestarikan keragaman budaya Indonesia</p>
        </div>
    </div>
    
    <div class="row">
        <div class="col-md-6 mb-4">
            <div class="card border-0 shadow-sm">
                <div class="card-body">
                    <h3 class="card-title border-bottom pb-3 text-danger">Sekretariat Keragaman Budaya Indonesia</h3>
                    
                    <div class="d-flex mb-3">
                        <div class="flex-shrink-0 text-danger me-3">
                            <svg xmlns="http://www.w3.org/2000/svg" width="24" height="24" fill="currentColor" class="bi bi-geo-alt-fill" viewBox="0 0 16 16">
                                <path d="M8 16s6-5.686 6-10A6 6 0 0 0 2 6c0 4.314 6 10 6 10zm0-7a3 3 0 1 1 0-6 3 3 0 0 1 0 6z"/>
                            </svg>
                        </div>
                        <div>
                            <h5 class="mt-0">Alamat Kantor</h5>
                            <p>Gedung Sarinah Lantai 6<br>
                            Jl. M.H. Thamrin No. 11<br>
                            Jakarta Pusat, 10350<br>
                            Indonesia</p>
                        </div>
                    </div>
                    
                    <div class="d-flex mb-3">
                        <div class="flex-shrink-0 text-danger me-3">
                            <svg xmlns="http://www.w3.org/2000/svg" width="24" height="24" fill="currentColor" class="bi bi-envelope-fill" viewBox="0 0 16 16">
                                <path d="M.05 3.555A2 2 0 0 1 2 2h12a2 2 0 0 1 1.95 1.555L8 8.414.05 3.555ZM0 4.697v7.104l5.803-3.558L0 4.697ZM6.761 8.83l-6.57 4.027A2 2 0 0 0 2 14h12a2 2 0 0 0 1.808-1.144l-6.57-4.027L8 9.586l-1.239-.757Zm3.436-.586L16 11.801V4.697l-5.803 3.546Z"/>
                            </svg>
                        </div>
                        <div>
                            <h5 class="mt-0">Email</h5>
                            <p>info@budayaindonesia.id<br>
                            program@budayaindonesia.id</p>
                        </div>
                    </div>
                    
                    <div class="d-flex mb-3">
                        <div class="flex-shrink-0 text-danger me-3">
                            <svg xmlns="http://www.w3.org/2000/svg" width="24" height="24" fill="currentColor" class="bi bi-telephone-fill" viewBox="0 0 16 16">
                                <path fill-rule="evenodd" d="M1.885.511a1.745 1.745 0 0 1 2.61.163L6.29 2.98c.329.423.445.974.315 1.494l-.547 2.19a.678.678 0 0 0 .178.643l2.457 2.457a.678.678 0 0 0 .644.178l2.189-.547a1.745 1.745 0 0 1 1.494.315l2.306 1.794c.829.645.905 1.87.163 2.611l-1.034 1.034c-.74.74-1.846 1.065-2.877.702a18.634 18.634 0 0 1-7.01-4.42 18.634 18.634 0 0 1-4.42-7.009c-.362-1.03-.037-2.137.703-2.877L1.885.511z"/>
                            </svg>
                        </div>
                        <div>
                            <h5 class="mt-0">Telepon</h5>
                            <p>+62 21 3192 0000<br>
                            +62 812 8765 4321 (WhatsApp)</p>
                        </div>
                    </div>
                    
                    <div class="d-flex">
                        <div class="flex-shrink-0 text-danger me-3">
                            <svg xmlns="http://www.w3.org/2000/svg" width="24" height="24" fill="currentColor" class="bi bi-clock-fill" viewBox="0 0 16 16">
                                <path d="M16 8A8 8 0 1 1 0 8a8 8 0 0 1 16 0zM8 3.5a.5.5 0 0 0-1 0V9a.5.5 0 0 0 .252.434l3.5 2a.5.5 0 0 0 .496-.868L8 8.71V3.5z"/>
                            </svg>
                        </div>
                        <div>
                            <h5 class="mt-0">Jam Kerja</h5>
                            <p>Senin - Jumat: 08.00 - 16.00 WIB<br>
                            Sabtu: 09.00 - 13.00 WIB<br>
                            Minggu & Hari Libur Nasional: Tutup</p>
                        </div>
                    </div>
                </div>
            </div>
            
            <div class="card border-0 shadow-sm mt-4">
                <div class="card-body">
                    <h3 class="card-title border-bottom pb-3 text-danger">Media Sosial</h3>
                    <div class="row">
                        <div class="col-6 mb-3">
                            <a href="#" class="btn btn-outline-danger w-100">
                                <i class="bi bi-instagram"></i> Instagram
                            </a>
                        </div>
                        <div class="col-6 mb-3">
                            <a href="#" class="btn btn-outline-danger w-100">
                                <i class="bi bi-facebook"></i> Facebook
                            </a>
                        </div>
                        <div class="col-6 mb-3">
                            <a href="#" class="btn btn-outline-danger w-100">
                                <i class="bi bi-youtube"></i> YouTube
                            </a>
                        </div>
                        <div class="col-6 mb-3">
                            <a href="#" class="btn btn-outline-danger w-100">
                                <i class="bi bi-tiktok"></i> TikTok
                            </a>
                        </div>
                    </div>
                </div>
            </div>
        </div>
        
        <div class="col-md-6">
            <div class="card border-0 shadow-sm">
                <div class="card-header bg-danger text-white py-3">
                    <h3 class="card-title mb-0">Sampaikan Pesan</h3>
                </div>
                <div class="card-body">
                    <form>
                        <div class="mb-3">
                            <label for="nama" class="form-label">Nama Lengkap <span class="text-danger">*</span></label>
                            <input type="text" class="form-control" id="nama" required>
                        </div>
                        
                        <div class="mb-3">
                            <label for="email" class="form-label">Email <span class="text-danger">*</span></label>
                            <input type="email" class="form-control" id="email" required>
                        </div>
                        
                        <div class="mb-3">
                            <label for="telp" class="form-label">Nomor Telepon</label>
                            <input type="tel" class="form-control" id="telp">
                        </div>
                        
                        <div class="mb-3">
                            <label for="kategori" class="form-label">Kategori <span class="text-danger">*</span></label>
                            <select class="form-select" id="kategori" required>
                                <option value="" selected disabled>Pilih kategori...</option>
                                <option value="informasi">Permintaan Informasi</option>
                                <option value="kerjasama">Proposal Kerjasama</option>
                                <option value="dokumentasi">Kontribusi Dokumentasi</option>
                                <option value="penelitian">Penelitian Budaya</option>
                                <option value="lainnya">Lainnya</option>
                            </select>
                        </div>
                        
                        <div class="mb-3">
                            <label for="pesan" class="form-label">Pesan <span class="text-danger">*</span></label>
                            <textarea class="form-control" id="pesan" rows="5" required></textarea>
                        </div>
                        
                        <div class="mb-3 form-check">
                            <input type="checkbox" class="form-check-input" id="setuju">
                            <label class="form-check-label" for="setuju">Saya setuju data saya diproses sesuai dengan kebijakan privasi</label>
                        </div>
                        
                        <button type="submit" class="btn btn-danger w-100">Kirim Pesan</button>
                    </form>
                </div>
            </div>
        </div>
    </div>
    
    <div class="row mt-5">
        <div class="col-12">
            <div class="card border-0 shadow-sm">
                <div class="card-body">
                    <h3 class="text-center mb-4">Program Kerjasama</h3>
                    <div class="row">
                        <div class="col-md-4 mb-4">
                            <div class="card h-100 custom-card border-danger">
                                <div class="card-body text-center">
                                    <h4 class="card-title">Dokumentasi Budaya</h4>
                                    <p class="card-text">Program kerjasama untuk pendokumentasian tradisi, adat istiadat, dan pengetahuan tradisional yang terancam punah.</p>
                                    <a href="#" class="btn btn-outline-danger">Detail Program</a>
                                </div>
                            </div>
                        </div>
                        
                        <div class="col-md-4 mb-4">
                            <div class="card h-100 custom-card border-danger">
                                <div class="card-body text-center">
                                    <h4 class="card-title">Edukasi Budaya</h4>
                                    <p class="card-text">Program kerjasama dengan lembaga pendidikan untuk mengembangkan kurikulum dan materi tentang budaya Indonesia.</p>
                                    <a href="#" class="btn btn-outline-danger">Detail Program</a>
                                </div>
                            </div>
                        </div>
                        
                        <div class="col-md-4 mb-4">
                            <div class="card h-100 custom-card border-danger">
                                <div class="card-body text-center">
                                    <h4 class="card-title">Pemberdayaan Komunitas</h4>
                                    <p class="card-text">Program kerjasama untuk memperkuat kapasitas komunitas budaya dalam melestarikan dan mengembangkan tradisi mereka.</p>
                                    <a href="#" class="btn btn-outline-danger">Detail Program</a>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>
</div>
@endsection 