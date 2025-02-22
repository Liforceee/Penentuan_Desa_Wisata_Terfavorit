@extends('layout_admin.index')

@section('content')
<div class="content-wrapper">
    <div class="row">
        <div class="col-12 grid-margin stretch-card">
            <div class="card">
              <div class="card-body">
                <h4 class="card-title">Edit Desa Wisata</h4>
                <form class="forms-sample" action="{{ route('desa_wisata.update', $desaWisata->id) }}" method="POST" enctype="multipart/form-data">
                    @csrf
                    @method('PUT')
                    <div class="form-group">
                        <label for="nama">Nama</label>
                        <input type="text" class="form-control" id="nama" name="nama" value="{{ $desaWisata->nama }}" required>
                    </div>
                    <div class="form-group">
                        <label for="deskripsi">Deskripsi</label>
                        <input type="text" class="form-control" id="deskripsi" name="deskripsi" value="{{ $desaWisata->deskripsi }}" required>
                    </div>
                    <div class="mb-3">
                        <label for="gambar" class="form-label">Gambar</label>
                        <input type="file" name="gambar" class="form-control">
                        @if ($desaWisata->gambar)
                            <img src="{{ asset('storage/' . $desaWisata->gambar) }}" alt="{{ $desaWisata->nama }}" class="img-thumbnail mt-2" width="100">
                        @endif
                    </div>
                    <button type="submit" class="btn btn-primary mr-2">Update</button>
                    <a href="{{ route('desa_wisata.index') }}" class="btn btn-secondary">Kembali</a>
                </form>
              </div>
            </div>
        </div>
    </div>
</div>
@endsection
