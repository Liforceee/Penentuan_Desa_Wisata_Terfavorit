@extends('layout_user.index')
@section('main')

<div class="container" style="margin-top: 100px;">
    <h2>Hasil Perhitungan Desa Wisata Terfavorit</h2>
    <table class="table">
        <thead>
            <tr>
                <th>Peringkat</th>
                <th>Nama Desa</th>
                <th>Skor</th>
            </tr>
        </thead>
        <tbody>
            @foreach($hasil as $index => $h)
            <tr>
                <td>{{ $index + 1 }}</td>
                <td>{{ $h['nama'] }}</td>
                <td>{{ number_format($h['nilai'], 2) }}</td>
            </tr>
            @endforeach
        </tbody>
    </table>
</div>
@endsection
