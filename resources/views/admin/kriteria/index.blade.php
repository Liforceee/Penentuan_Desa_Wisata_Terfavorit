@extends('layout_admin.index')

@section('content')

<div class="container mt-4">
    <h1 class="mb-4 text-center fw-bold">Daftar Kriteria</h1>

    @if(session('success'))
        <div class="alert alert-success alert-dismissible fade show" role="alert">
            {{ session('success') }}
            <button type="button" class="btn-close" data-bs-dismiss="alert" aria-label="Close"></button>
        </div>
    @endif

    <div class="table-responsive">
        <table class="table table-striped table-bordered text-center">
            <thead class="table-dark">
                <tr>
                    <th>Nama Desa</th>
                    <th>Kebersihan</th>
                    <th>Keamanan</th>
                    <th>Akses Jalan</th>
                    <th>Jarak Tempuh</th>
                    <th>Fasilitas</th>
                    <th>Biaya Tiket</th>
                    <th>Aksi</th>
                </tr>
            </thead>
            <tbody>
                @foreach($desaWisata as $desa)
                <tr>
                    <td class="align-middle">{{ $desa->nama }}</td>
                    @if ($desa->kriteria)
                        <td class="align-middle">{{ $desa->kriteria->kebersihan }}</td>
                        <td class="align-middle">{{ $desa->kriteria->keamanan }}</td>
                        <td class="align-middle">{{ $desa->kriteria->akses_jalan }}</td>
                        <td class="align-middle">{{ $desa->kriteria->jarak_tempuh }}</td>
                        <td class="align-middle">{{ $desa->kriteria->fasilitas }}</td>
                        <td class="align-middle">{{ $desa->kriteria->biaya_tiket }}</td>
                    @else
                        <td colspan="6" class="align-middle text-muted">Belum ada kriteria</td>
                    @endif
                    <td class="align-middle">
                        <a href="{{ route('kriteria.edit', $desa->id) }}" class="btn btn-warning btn-sm">
                            <i class="fas fa-edit"></i> Edit
                        </a>
                    </td>

                </tr>
                @endforeach
            </tbody>
        </table>
    </div>
</div>
@endsection
