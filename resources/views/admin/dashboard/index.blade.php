@extends('layout_admin.index')

@section('content')
<div class="container mt-4">
    <div>
    <h2 class="mb-4 text-center">Dashboard Admin</h>
    </div>
    <div class="row">
        <div class="col-md-4">
            <div class="card shadow-sm border-0 bg-light text-dark mb-4">
                <div class="card-body d-flex align-items-center justify-content-between">
                    <div>
                        <h5 class="card-title">Jumlah Desa Wisata</h5>
                        <h2 class="card-text display-4">{{ $jumlahDesaWisata }}</h2>
                    </div>
                    <i class="fas fa-map-marker-alt fa-3x text-muted"></i>
                </div>
            </div>
        </div>
        <div class="col-md-4">
            <div class="card shadow-sm border-0 bg-light text-dark mb-4">
                <div class="card-body d-flex align-items-center justify-content-between">
                    <div>
                        <h5 class="card-title">Jumlah User</h5>
                        <h2 class="card-text display-4">{{ $jumlahUser  }}</h2>
                    </div>
                    <i class="fas fa-users fa-3x text-muted"></i>
                </div>
            </div>
        </div>
        <div class="col-md-4">
            <div class="card shadow-sm border-0 bg-light text-dark mb-4">
                <div class="card-body d-flex align-items-center justify-content-between">
                    <div>
                        <h5 class="card-title">Wisata Terfavorit</h5>
                        <h2 class="card-text display-4">{{ $wisataTerfavorit }}</h2>
                    </div>
                    <i class="fas fa-star fa-3x text-muted"></i>
                </div>
            </div>
        </div>
    </div>
</div>
@endsection
