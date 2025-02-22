@extends('layout_user.index')

@section('main')
<!-- Section Desa Wisata -->
<section id="desa-wisata" class="team section light-background">
    <!-- Section Title -->
    <div class="container section-title" data-aos="fade-up">
        <p><span>Desa&nbsp;</span> <span class="description-title">Wisata</span></p>
    </div><!-- End Section Title -->

    <div class="container">
        <div class="content-wrapper">
            <div class="row justify-content-center">
                @foreach ($desaWisata as $desa)
                    <div class="col-md-4 mb-4">
                        <div class="text-center p-3 border rounded shadow-sm bg-white">
                            <img src="{{ $desa->gambar ? asset('storage/' . $desa->gambar) : 'path/to/default-image.jpg' }}" class="img-fluid rounded mb-3" alt="Gambar Desa Wisata">
                            <h5 class="fw-bold">{{ $desa->nama }}</h5>
                            <p class="text-muted">{{ $desa->deskripsi }}</p>
                            <a href="#" class="btn btn-primary w-100">Lihat Detail</a>
                        </div>
                    </div>
                @endforeach
            </div>
        </div>
    </div>
</section><!-- End Section Desa Wisata -->
@endsection
