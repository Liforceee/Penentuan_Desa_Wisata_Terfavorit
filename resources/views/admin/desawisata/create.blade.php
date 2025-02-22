@extends('layout_admin.index')

@section('content')
<div class="content-wrapper">
    <div class="row">
        <div class="col-12 grid-margin stretch-card">
            <div class="card">
              <div class="card-body">
                <h4 class="card-title">Tambah Desa Wisata</h4>
                    <form class="forms-sample" action="{{ route('desa_wisata.store') }}" method="POST" enctype="multipart/form-data">
                        @csrf
                  <div class="form-group">
                    <label for="nama">Name</label>
                    <input type="text" class="form-control" id="nama" name="nama" placeholder="Name">
                  </div>
                  <div class="form-group">
                    <label for="deskripsi">Deskripsi</label>
                    <input type="text" class="form-control" id="deskripsi" name="deskripsi" placeholder="Deskripsi">
                  </div>
                  <div class="mb-3">
                    <label for="gambar" class="form-label">Gambar</label>
                    <input type="file" name="gambar" class="form-control">
                </div>
                  <button type="submit" class="btn btn-primary mr-2">Submit</button>
                  <a href="{{ route('desa_wisata.index') }}" class="btn btn-secondary">Kembali</a>
                </form>
              </div>
            </div>
          </div>
    </div>

  </div>
  @endsection
