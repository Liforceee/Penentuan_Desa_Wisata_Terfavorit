@extends('layout_user.index')

@section('main')
<section id="petunjuk" class="team section light-background py-5">
<div class="container">
    <div class="section-title text-center" data-aos="fade-up">
        <h2>Petunjuk</h2>
        <p><span>Penggunaaan Website</span></p>
      </div><!-- End Section Title -->

      <div class="accordion" id="accordionExample">
        <div class="accordion-item">
            <h2 class="accordion-header" id="headingOne">
                <button class="accordion-button" type="button" data-bs-toggle="collapse" data-bs-target="#collapseOne" aria-expanded="true" aria-controls="collapseOne">
                    Home
                </button>
            </h2>
    <div id="collapseOne" class="accordion-collapse collapse show" aria-labelledby="headingOne" data-bs-parent="#accordionExample">
      <div class="accordion-body">
        <strong>Page Home.</strong> Halaman Home berisi tampilan menu utama mengenai Web Penentuan Desa Wisata Terfavorit Di Gunung Kidul.
      </div>
    </div>
  </div>
  <div class="accordion-item">
    <h2 class="accordion-header" id="headingTwo">
      <button class="accordion-button collapsed" type="button" data-bs-toggle="collapse" data-bs-target="#collapseTwo" aria-expanded="false" aria-controls="collapseTwo">
      Desa Wisata
      </button>
    </h2>
    <div id="collapseTwo" class="accordion-collapse collapse" aria-labelledby="headingTwo" data-bs-parent="#accordionExample">
      <div class="accordion-body">
        <strong>Page Desa Wisata.</strong> Halaman Desa Wisata berisi informasi seputar desa wisata. Halaman ini hanya dapat diinput dan ditambah data desa wisata melalui admin.
      </div>
    </div>
  </div>

  <div class="accordion-item">
    <h2 class="accordion-header" id="headingThree">
      <button class="accordion-button collapsed" type="button" data-bs-toggle="collapse" data-bs-target="#collapseThree" aria-expanded="false" aria-controls="collapseThree">
      Perhitungan
      </button>
    </h2>
    <div id="collapseThree" class="accordion-collapse collapse" aria-labelledby="headingThree" data-bs-parent="#accordionExample">
      <div class="accordion-body">
        <strong>Page Perhitungan.</strong> Halaman Perhitungan ini berisi hasil dari data yang dihitung. User dapat menginputkan data yang akan dicari kemudian hasilnya akan tampil.
      </div>
    </div>
  </div>

<div class="accordion-item">
    <h2 class="accordion-header" id="headingFour">
      <button class="accordion-button collapsed" type="button" data-bs-toggle="collapse" data-bs-target="#collapseFour" aria-expanded="false" aria-controls="collapseFour">
      Petunjuk
      </button>
    </h2>
    <div id="collapseFour" class="accordion-collapse collapse" aria-labelledby="headingFour" data-bs-parent="#accordionExample">
      <div class="accordion-body">
        <strong>Page Petunjuk.</strong> Halaman Petunjuk berisi petunjuk penggunaan website.
      </div>
    </div>
  </div>
<div class="accordion-item">
    <h2 class="accordion-header" id="headingFive">
      <button class="accordion-button collapsed" type="button" data-bs-toggle="collapse" data-bs-target="#collapseFive" aria-expanded="false" aria-controls="collapseFive">
      Tentang
      </button>
    </h2>
    <div id="collapseFive" class="accordion-collapse collapse" aria-labelledby="headingFive" data-bs-parent="#accordionExample">
      <div class="accordion-body">
        <strong>Page Tentang.</strong> Halaman Tentang berisi informasi tentang website.
      </div>
    </div>
  </div>
@endsection
