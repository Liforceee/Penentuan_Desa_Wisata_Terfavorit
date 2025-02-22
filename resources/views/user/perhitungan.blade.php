@extends('layout_user.index')

@section('main')

<div class="container mt-5 pt-3"> <!-- Adjusted margin-top and padding top -->
    <h2 class="text-center mt-4">Perhitungan Desa Wisata Terfavorit</h2> <!-- Added margin-top here for the header -->
    <form action="{{ route('maut.hitung') }}" method="POST">
        @csrf
        @foreach($kriteria as $krit)
        <div class="mb-3">
            <label class="form-label">{{ $krit->nama_kriteria }}</label>
            <select class="form-select" name="{{ $krit->nama_kriteria }}">
                <option value="1">Kurang</option>
                <option value="3">Cukup</option>
                <option value="5">Baik</option>
            </select>
        </div>
        @endforeach
        <button type="submit" class="btn btn-primary">Hitung</button>
    </form>
</div>

@endsection
