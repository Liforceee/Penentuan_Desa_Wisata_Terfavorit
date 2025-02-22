@extends('layout_admin.index')

@section('content')

<div class="container mt-5">
    <div class="card">
        <div class="card-body">
            <div class="text-center">
                <h2>Form Penentuan Kriteria Desa Wisata</h2>
            </div>
            <h5 class="my-3 text-center">Desa: {{$desas->nama}}</h5>
            <form id="kriteriaForm" method="post" action="{{ route('kriteria.update', $id) }}">
                @method('PUT')
                @csrf

                <div class="form-group">
                    <label for="kebersihan">Kebersihan:</label>
                    <select name="kebersihan" class="form-control" id="kebersihan">
                        <option value="5" {{ isset($desas->kriteria) && $desas->kriteria->kebersihan == 5 ? 'selected' : '' }}>Bersih</option>
                        <option value="3" {{ isset($desas->kriteria) && $desas->kriteria->kebersihan == 3 ? 'selected' : '' }}>Cukup Bersih</option>
                        <option value="1" {{ isset($desas->kriteria) && $desas->kriteria->kebersihan == 1 ? 'selected' : '' }}>Kurang Bersih</option>
                    </select>
                </div>

                <div class="form-group">
                    <label for="keamanan">Keamanan:</label>
                    <select name="keamanan" class="form-control" id="keamanan">
                        <option value="3" {{ isset($desas->kriteria) && $desas->kriteria->keamanan == 3 ? 'selected' : '' }}>Aman</option>
                        <option value="2" {{ isset($desas->kriteria) && $desas->kriteria->keamanan == 2 ? 'selected' : '' }}>Cukup Aman</option>
                        <option value="1" {{ isset($desas->kriteria) && $desas->kriteria->keamanan == 1 ? 'selected' : '' }}>Kurang Aman</option>
                    </select>
                </div>

                <div class="form-group">
                    <label for="akses_jalan">Akses Jalan:</label>
                    <select name="akses_jalan" class="form-control" id="akses_jalan">
                        <option value="5" {{ isset($desas->kriteria) && $desas->kriteria->akses_jalan == 5 ? 'selected' : '' }}>Mudah</option>
                        <option value="3" {{ isset($desas->kriteria) && $desas->kriteria->akses_jalan == 3 ? 'selected' : '' }}>Cukup Mudah</option>
                        <option value="1" {{ isset($desas->kriteria) && $desas->kriteria->akses_jalan == 1 ? 'selected' : '' }}>Sulit</option>
                    </select>
                </div>

                <div class="form-group">
                    <label for="jarak_tempuh">Jarak Tempuh:</label>
                    <select name="jarak_tempuh" class="form-control" id="jarak_tempuh">
                        <option value="3" {{ isset($desas->kriteria) && $desas->kriteria->jarak_tempuh == 3 ? 'selected' : '' }}>Dekat</option>
                        <option value="2" {{ isset($desas->kriteria) && $desas->kriteria->jarak_tempuh == 2 ? 'selected' : '' }}>Cukup Jauh</option>
                        <option value="1" {{ isset($desas->kriteria) && $desas->kriteria->jarak_tempuh == 1 ? 'selected' : '' }}>Jauh</option>
                    </select>
                </div>

                <div class="form-group">
                    <label for="fasilitas">Fasilitas:</label>
                    <select name="fasilitas" class="form-control" id="fasilitas">
                        <option value="5" {{ isset($desas->kriteria) && $desas->kriteria->fasilitas == 5 ? 'selected' : '' }}>Lengkap</option>
                        <option value="3" {{ isset($desas->kriteria) && $desas->kriteria->fasilitas == 3 ? 'selected' : '' }}>Cukup Lengkap</option>
                        <option value="1" {{ isset($desas ->kriteria) && $desas->kriteria->fasilitas == 1 ? 'selected' : '' }}>Kurang Lengkap</option>
                    </select>
                </div>

                <div class="form-group">
                    <label for="biaya_tiket">Biaya Tiket:</label>
                    <select name="biaya_tiket" class="form-control" id="biaya_tiket">
                        <option value="3" {{ isset($desas->kriteria) && $desas->kriteria->biaya_tiket == 3 ? 'selected' : '' }}>Murah</option>
                        <option value="2" {{ isset($desas->kriteria) && $desas->kriteria->biaya_tiket == 2 ? 'selected' : '' }}>Cukup Mahal</option>
                        <option value="1" {{ isset($desas->kriteria) && $desas->kriteria->biaya_tiket == 1 ? 'selected' : '' }}>Mahal</option>
                    </select>
                </div>

                <button type="submit" class="btn btn-primary">Submit</button>
            </form>
        </div>
    </div>
</div>

@endsection
