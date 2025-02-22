@extends('layout_user.index')
@push('hero')
<section id="hero" class="hero section light-background">

    <div class="container">
      <div class="row gy-4">
        <div class="col-lg-6 order-2 order-lg-1 d-flex flex-column justify-content-center" data-aos="zoom-out">
          <h1>Welcome to <span>GoKid</span></h1>
          <p>Penentuan Desa Wisata Terfavorit</p>
          <div class="d-flex">
            <a href="#about" class="btn-get-started">Hitung</a>
          </div>
        </div>
      </div>
    </div>

  </section><!-- /Hero Section -->
@endpush

@section('main')

 <!-- Featured Services Section -->
 <section id="featured-services" class="featured-services section">
    <div class="container">
        <div class="row">
            <div class="col-lg-12 text-center">
                <div class="section-heading mb-5">
                    <h2>Keindahan Desa Wisata</h2>
                    <p>
                        Temukan potensi wisata di Gunung Kidul melalui eksplorasi kriteria seperti keindahan alam,
                        tradisi budaya, dan fasilitas pendukung.
                    </p>
                </div>
            </div>
        </div>
        <div class="row gy-4">
            <div class="col-lg-4 col-md-6 d-flex" data-aos="fade-up" data-aos-delay="100">
                <div class="service-item position-relative">
                    <div class="icon"><img src="user/assets/img/home/.jpeg" alt="Keindahan Alam"></div>
                    <h4><a href="" class="stretched-link">Keindahan Alam</a></h4>
                    <p>Panorama alam yang memukau menjadi daya tarik utama wisata di wilayah ini.</p>
                </div>
            </div><!-- End Service Item -->

            <div class="col-lg-4 col-md-6 d-flex" data-aos="fade-up" data-aos-delay="200">
                <div class="service-item position-relative">
                    <div class="icon"><img src="path/to/image2.jpg" alt="Tradisi Budaya"></div>
                    <h4><a href="" class="stretched-link">Tradisi Budaya</a></h4>
                    <p>Budaya lokal yang unik memberikan pengalaman yang tak terlupakan bagi pengunjung.</p>
                </div>
            </div><!-- End Service Item -->

            <div class="col-lg-4 col-md-6 d-flex" data-aos="fade-up" data-aos-delay="300">
                <div class="service-item position-relative">
                    <div class="icon"><img src="path/to/image3.jpg" alt="Fasilitas Pendukung"></div>
                    <h4><a href="" class="stretched-link">Fasilitas Pendukung</a></h4>
                    <p>Fasilitas wisata yang memadai memberikan kenyamanan ekstra bagi wisatawan.</p>
                </div>
            </div><!-- End Service Item -->
        </div>
    </div>
</section>



<!-- Home Section -->
{{-- <div id="home" class="welcome-area" style="padding-top: 120px; padding-bottom: 80px;">
    <div class="header-text">
        <div class="container">
            <div class="row align-items-center">
                <!-- Left Content -->
                <div class="col-lg-6">
                    <h1 class="mb-4">Penentuan <strong>Desa Wisata</strong> Terfavorit</h1>
                    <p class="mb-4">
                        Website ini membantu Anda menjelajahi dan menilai keindahan desa wisata di Gunung Kidul
                        menggunakan pendekatan yang objektif dan inovatif.
                    </p>
                    <a href="#explore" class="btn btn-primary btn-lg main-button-gradient">Jelajahi Sekarang</a>
                </div>
                <!-- Right Image -->
                <div class="col-lg-6 text-center">
                    <img src="{{ asset('user/assets/images/wonderfull.png') }}" alt="Gunung Kidul" class="img-fluid rounded">
                </div>
            </div>
        </div>
    </div>
</div> --}}

<!-- Call to Action Section -->
<section id="cta" class="cta py-5 bg-light">
    <div class="container">
        <div class="row align-items-center">
            <!-- Left Content -->
            <div class="col-lg-8">
                <h2>Gunakan Metode MAUT</h2>
                <p>
                    Metode MAUT (Multi Attribute Utility Theory) digunakan untuk mengevaluasi desa wisata
                    berdasarkan berbagai kriteria penilaian.
                </p>
            </div>
            <!-- Right Button -->
            <div class="col-lg-4 text-lg-end text-center">
                <a href="#explore" class="btn btn-primary btn-lg">Mulai Penilaian</a>
            </div>
        </div>
    </div>
</section>

@endsection
