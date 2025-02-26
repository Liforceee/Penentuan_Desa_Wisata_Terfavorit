@extends('layout_admin.index')

@section('content')
<div class="container">
    <div class="text-center" style="margin-bottom: 30px">
        <h2>Perhitungan MAUT</h2>
    </div>


    <!-- Data Awal -->
    <h3>Data Awal</h3>
    <table class="table table-bordered">
        <thead class="thead-dark">
            <tr>
                <th>Desa</th>
                <th>Kebersihan</th>
                <th>Keamanan</th>
                <th>Akses Jalan</th>
                <th>Jarak Tempuh</th>
                <th>Fasilitas</th>
                <th>Biaya Tiket</th>
            </tr>
        </thead>
        <tbody>
            @foreach($data_awal as $data)
            <tr>
                <td>{{ $data['desa'] }}</td>
                <td>{{ $data['kebersihan'] }}</td>
                <td>{{ $data['keamanan'] }}</td>
                <td>{{ $data['akses_jalan'] }}</td>
                <td>{{ $data['jarak_tempuh'] }}</td>
                <td>{{ $data['fasilitas'] }}</td>
                <td>{{ $data['biaya_tiket'] }}</td>
            </tr>
            @endforeach
        </tbody>
    </table>

    <!-- Normalisasi -->
    <h3 class="mt-5">Normalisasi</h3>
    <table class="table table-bordered">
        <thead class="thead-dark">
            <tr>
                <th>Desa</th>
                <th>Kebersihan</th>
                <th>Keamanan</th>
                <th>Akses Jalan</th>
                <th>Jarak Tempuh</th>
                <th>Fasilitas</th>
                <th>Biaya Tiket</th>
            </tr>
        </thead>
        <tbody>
            @foreach($normalisasi as $desa => $norm)
            <tr>
                <td>{{ $desa }}</td>
                <td>{{ number_format($norm['kebersihan'] ?? 0, 5) }}</td>
                <td>{{ number_format($norm['keamanan'] ?? 0, 5) }}</td>
                <td>{{ number_format($norm['akses_jalan'] ?? 0, 5) }}</td>
                <td>{{ number_format($norm['jarak_tempuh'] ?? 0, 5) }}</td>
                <td>{{ number_format($norm['fasilitas'] ?? 0, 5) }}</td>
                <td>{{ number_format($norm['biaya_tiket'] ?? 0, 5) }}</td>
            </tr>
            @endforeach
        </tbody>
    </table>

    <!-- Hasil MAUT -->
    <h3 class="mt-5">Hasil MAUT</h3>
    <table class="table table-bordered">
        <thead class="thead-dark">
            <tr>
                <th>Desa</th>
                <th>Nilai MAUT</th>
            </tr>
        </thead>
        <tbody>
            @foreach($hasil_maut as $hasil)
            <tr>
                <td>{{ $hasil['desa'] }}</td>
                <td>{{ number_format($hasil['nilai'], 5) }}</td>
            </tr>
            @endforeach
        </tbody>
    </table>
</div>
@endsection
