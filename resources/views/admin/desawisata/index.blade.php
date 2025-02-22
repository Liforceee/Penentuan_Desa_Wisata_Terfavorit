@extends('layout_admin.index')

@section('content')

<div class="container mt-4">
    <h1 class="mb-4 text-center fw-bold">Daftar Desa Wisata</h1>

    @if(session('success'))
        <div class="alert alert-success alert-dismissible fade show" role="alert">
            {{ session('success') }}
            <button type="button" class="btn-close" data-bs-dismiss="alert" aria-label="Close"></button>
        </div>
    @endif

    <div class="d-flex justify-content-between mb-3">
        <a href="{{ route('desa_wisata.create') }}" class="btn btn-primary rounded-pill">
            <i class="fas fa-plus"></i> Tambah Desa Wisata
        </a>
    </div>

    <div class="table-responsive">
        <table class="table table-striped table-bordered text-center">
            <thead class="table-dark">
                <tr>
                    <th>Nama</th>
                    <th>Deskripsi</th>
                    <th>Gambar</th>
                    <th>Aksi</th>
                </tr>
            </thead>
            <tbody>
                @foreach($desaWisata as $desa)
                <tr>
                    <td class="align-middle">{{ $desa->nama }}</td>
                    <td class="align-middle">{{ Str::limit($desa->deskripsi, 100, '...') }}</td>
                    <td class="align-middle">
                        @if($desa->gambar)
                            <img src="{{ asset('storage/' . $desa->gambar) }}" alt="{{ $desa->nama }}" class="img-thumbnail shadow-sm" width="80" height="80">
                        @else
                            <span class="text-muted">Tidak ada gambar</span>
                        @endif
                    </td>
                    <td class="align-middle">
                        <a href="{{ route('desa_wisata.edit', $desa->id) }}" class="btn btn-warning btn-sm">
                            <i class="fas fa-edit"></i> Edit
                        </a>
                        <form action="{{ route('desa_wisata.destroy', $desa->id) }}" method="POST" class="d-inline" onsubmit="return confirm('Apakah Anda yakin ingin menghapus?');">
                            @csrf
                            @method('DELETE')
                            <button type="submit" class="btn btn-danger btn-sm">
                                <i class="fas fa-trash"></i> Hapus
                            </button>
                        </form>
                    </td>
                </tr>
                @endforeach
            </tbody>
        </table>
    </div>
</div>
@endsection
