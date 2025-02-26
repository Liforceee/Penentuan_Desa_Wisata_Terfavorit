@extends('layout_admin.index')

@section('content')
<div class="container mt-4">
    <h2 class="mb-4 text-center fw-bold">Dashboard Admin - Desa Wisata Terfavorit</h2>

    <div class="row">
        <!-- Total Desa Wisata -->
        <div class="col-md-4">
            <div class="card text-white bg-primary mb-3">
                <div class="card-header">Total Desa Wisata</div>
                <div class="card-body text-center">
                    <h3 class="card-title">{{ $totalDesaWisata }}</h3>
                </div>
            </div>
        </div>

        <!-- Total Kriteria Tersimpan -->
        <div class="col-md-4">
            <div class="card text-white bg-success mb-3">
                <div class="card-header">Total Kriteria Tersimpan</div>
                <div class="card-body text-center">
                    <h3 class="card-title">{{ $totalKriteria }}</h3>
                </div>
            </div>
        </div>

        <!-- Desa Wisata Terfavorit -->
        <div class="col-md-4">
            <div class="card text-white bg-warning mb-3">
                <div class="card-header">Desa Wisata Terfavorit</div>
                <div class="card-body text-center">
                    <h3 class="card-title">{{ $desaTerfavorit->nama ?? 'Belum Ada' }}</h3>
                </div>
            </div>
        </div>
    </div>

    <!-- Tabel Peringkat Desa Wisata -->
    <h3 class="mt-4 text-center">Peringkat Desa Wisata</h3>
    <div class="table-responsive">
        <table class="table table-bordered text-center">
            <thead class="table-dark">
                <tr>
                    <th>Peringkat</th>
                    <th>Nama Desa</th>
                    <th>Nilai MAUT</th>
                </tr>
            </thead>
            <tbody>
                @foreach($peringkatDesa as $index => $desa)
                <tr>
                    <td>{{ $index + 1 }}</td>
                    <td>{{ $desa['nama'] }}</td>
                    <td>{{ number_format($desa['nilai'], 5) }}</td>
                </tr>
                @endforeach
            </tbody>
        </table>
    </div>
</div>
@endsection
