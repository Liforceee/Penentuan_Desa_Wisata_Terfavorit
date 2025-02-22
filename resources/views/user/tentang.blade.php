@extends('layout_user.index')

@section('main')
<div class="content-wrapper pt-5">
    <div class="row justify-content-center pt-5">
        <div class="col-10 grid-margin stretch-card">
            <div class="card mt-5">
                <div class="card-body text-center">
                    <h4 class="card-title mt-5" style="font-size: 2rem;">Tentang Website Penentuan Desa Wisata Terfavorit di Gunung Kidul</h4>
                    <p class="lead">Website ini bertujuan untuk memberikan informasi mengenai desa wisata yang ada di Gunung Kidul, serta untuk membantu wisatawan menentukan desa wisata terfavorit berdasarkan berbagai kriteria menggunakan metode <strong>MAUT (Multi-Attribute Utility Theory)</strong>.</p>
                    <hr>

                    <div class="accordion" id="accordionExample">
                        <div class="accordion-item">
                            <h2 class="accordion-header" id="headingOne">
                                <button class="accordion-button" type="button" data-bs-toggle="collapse" data-bs-target="#collapseOne" aria-expanded="true" aria-controls="collapseOne">
                                    Tujuan Website
                                </button>
                            </h2>
                            <div id="collapseOne" class="accordion-collapse collapse show" aria-labelledby="headingOne" data-bs-parent="#accordionExample">
                                <div class="accordion-body">
                                    Website ini dibuat untuk mempermudah wisatawan dalam memilih desa wisata yang sesuai dengan preferensi mereka.
                                </div>
                            </div>
                        </div>

                        <div class="accordion-item">
                            <h2 class="accordion-header" id="headingTwo">
                                <button class="accordion-button collapsed" type="button" data-bs-toggle="collapse" data-bs-target="#collapseTwo" aria-expanded="false" aria-controls="collapseTwo">
                                    Metode MAUT (Multi-Attribute Utility Theory)
                                </button>
                            </h2>
                            <div id="collapseTwo" class="accordion-collapse collapse" aria-labelledby="headingTwo" data-bs-parent="#accordionExample">
                                <div class="accordion-body">
                                    Metode <strong>MAUT</strong> adalah teknik pengambilan keputusan yang digunakan untuk memilih alternatif terbaik dengan mempertimbangkan beberapa atribut atau kriteria. Dalam konteks desa wisata, MAUT digunakan untuk menentukan desa wisata terfavorit berdasarkan berbagai faktor seperti:
                                    <ul class="list-unstyled">
                                        <li><i class="fas fa-road"></i> <strong>Aksesibilitas:</strong> Kemudahan mencapai lokasi.</li>
                                        <li><i class="fas fa-hotel"></i> <strong>Fasilitas:</strong> Ketersediaan tempat menginap.</li>
                                        <li><i class="fas fa-mountain"></i> <strong>Daya Tarik Wisata:</strong> Keindahan alam.</li>
                                        <li><i class="fas fa-money-bill"></i> <strong>Harga:</strong> Biaya yang diperlukan.</li>
                                        <li><i class="fas fa-shield-alt"></i> <strong>Keamanan:</strong> Tingkat keamanan.</li>
                                    </ul>
                                </div>
                            </div>
                        </div>

                        <div class="accordion-item">
                            <h2 class="accordion-header" id="headingThree">
                                <button class="accordion-button collapsed" type="button" data-bs-toggle="collapse" data-bs-target="#collapseThree" aria-expanded="false" aria-controls="collapseThree">
                                    Bagaimana Website Ini Bekerja?
                                </button>
                            </h2>
                            <div id="collapseThree" class="accordion-collapse collapse" aria-labelledby="headingThree" data-bs-parent="#accordionExample">
                                <div class="accordion-body">
                                    Anda dapat melihat daftar desa wisata di Gunung Kidul yang telah melalui penilaian menggunakan metode MAUT.
                                </div>
                            </div>
                        </div>

                        <div class="accordion-item">
                            <h2 class="accordion-header" id="headingFour">
                                <button class="accordion-button collapsed" type="button" data-bs-toggle="collapse" data-bs-target="#collapseFour" aria-expanded="false" aria-controls="collapseFour">
                                    Kenapa Gunung Kidul?
                                </button>
                            </h2>
                            <div id="collapseFour" class="accordion-collapse collapse" aria-labelledby="headingFour" data-bs-parent="#accordionExample">
                                <div class="accordion-body">
                                    Gunung Kidul terkenal dengan potensi pariwisatanya yang kaya, dari pantai, pegunungan, dan berbagai keindahan alam lainnya.
                                </div>
                            </div>
                        </div>

                        <div class="accordion-item">
                            <h2 class="accordion-header" id="headingFive">
                                <button class="accordion-button collapsed" type="button" data-bs-toggle="collapse" data-bs-target="#collapseFive" aria-expanded="false" aria-controls="collapseFive">
                                    Fitur Utama Website:
                                </button>
                            </h2>
                            <div id="collapseFive" class="accordion-collapse collapse" aria-labelledby="headingFive" data-bs-parent="#accordionExample">
                                <div class="accordion-body">
                                    <ul class="list-unstyled">
                                        <li>Daftar desa wisata lengkap.</li>
                                        <li>Pemeringkatan berdasarkan MAUT.</li>
                                        <li>Detail informasi desa wisata.</li>
                                        <li>Pencarian dan filter berdasarkan kriteria.</li>
                                    </ul>
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
