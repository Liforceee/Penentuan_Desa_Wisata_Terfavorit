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

<!-- About Section -->
<section id="about" class="about section light-background">

    <!-- Section Title -->
    <div class="container section-title" data-aos="fade-up">
      <h2>Tentang</h2>
      <p><span>Pelajari Lebih Lanjut</span> <span class="description-title">Tentang Sistem Kami</span></p>
    </div><!-- End Section Title -->

    <div class="container">
      <div class="row gy-3">
        <div class="col-lg-6" data-aos="fade-up" data-aos-delay="100">
          <img src="{{asset ('user/assets/img/home/1.jpg') }}" alt="Tentang Sistem" class="img-fluid">
        </div>

        <div class="col-lg-6 d-flex flex-column justify-content-center" data-aos="fade-up" data-aos-delay="200">
          <div class="about-content ps-0 ps-lg-3">
            <h3>Sistem Penentuan Desa Wisata Terfavorit dengan Metode MAUT</h3>
            <p class="fst-italic">
              Sistem ini membantu menentukan desa wisata terbaik di Gunung Kidul berdasarkan beberapa kriteria yang telah ditentukan.
            </p>
            <ul>
              <li>
                <i class="bi bi-diagram-3"></i>
                <div>
                  <h4>Metode Multi-Attribute Utility Theory (MAUT)</h4>
                  <p>Metode MAUT digunakan untuk memberikan peringkat pada desa wisata berdasarkan berbagai kriteria yang relevan.</p>
                </div>
              </li>
              <li>
                <i class="bi bi-fullscreen-exit"></i>
                <div>
                  <h4>Kriteria Penilaian</h4>
                  <p>Sistem mempertimbangkan kebersihan, keamanan, akses jalan, jarak tempuh, fasilitas, dan biaya tiket dalam menentukan desa wisata terbaik.</p>
                </div>
              </li>
            </ul>
            <p>
              Dengan sistem ini, wisatawan dapat dengan mudah memilih desa wisata terbaik sesuai dengan preferensi mereka, dan pemerintah daerah dapat menggunakan data ini untuk pengembangan pariwisata yang lebih baik.
            </p>
          </div>
        </div>
      </div>
    </div>
  </section><!-- /About Section -->

<!-- Section Desa Wisata -->
<section id="desa-wisata" class="about section">
    <!-- Section Title -->
    <div class="container section-title" data-aos="fade-up">
        <h2>Desa Wisata</h2>
        <p><span>Daftar Destinasi</span> <span class="description-title">Wisata</span></p>
    </div>
    <!-- End Section Title -->

    <div class="container" data-aos="fade-up" data-aos-delay="100">
        <div id="desaWisataCarousel" class="carousel slide" data-bs-ride="carousel">
            <div class="carousel-inner">
                @foreach ($desaWisata->chunk(3) as $key => $chunk) <!-- Tampilkan 3 gambar per slide -->
                    <div class="carousel-item {{ $key == 0 ? 'active' : '' }}">
                        <div class="row">
                            @foreach ($chunk as $desa)
                                <div class="col-md-4">
                                    <img src="{{ $desa->gambar ? asset('storage/' . $desa->gambar) : 'path/to/default-image.jpg' }}"
                                         class="d-block w-100 img-fluid rounded shadow-sm"
                                         alt="Gambar Desa Wisata">
                                </div>
                            @endforeach
                        </div>
                    </div>
                @endforeach
            </div>

            <!-- Tombol Prev & Next -->
            <button class="carousel-control-prev" type="button" data-bs-target="#desaWisataCarousel" data-bs-slide="prev">
                <span class="carousel-control-prev-icon" aria-hidden="true"></span>
                <span class="visually-hidden">Previous</span>
            </button>
            <button class="carousel-control-next" type="button" data-bs-target="#desaWisataCarousel" data-bs-slide="next">
                <span class="carousel-control-next-icon" aria-hidden="true"></span>
                <span class="visually-hidden">Next</span>
            </button>
        </div>
    </div>
</section>

{{-- <!-- Call to Action Section -->
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
</section> --}}

@endsection
