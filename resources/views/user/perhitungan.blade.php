@extends('layout_user.index')

@section('main')
<section id="desa-wisata" class="team section light-background">
    <!-- Section Title -->
    <div class="container section-title" data-aos="fade-up">
        <p><span>Perhitungan&nbsp;</span> <span class="description-title">MAUT</span></p>
        <p>Penentuan Desa Wisata Terfavorit</p>
    </div><!-- End Section Title -->


    <!-- Data Awal -->
    <div class="container">
        <h3 class="text-center">Data Awal</h3>
        <div class="table-responsive">
            <table class="table table-striped table-bordered">
                <thead class="table-dark">
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
        </div>
    </div>

    <!-- Hasil MAUT -->
    <div class="container mt-5">
        <h3 class="text-center">Hasil Rekomendasi Desa Wisata Terfavorit</h3>
        <div class="table-responsive">
            <table class="table table-striped table-bordered">
                <thead class="table-dark">
                    <tr>
                        <th>Desa</th>
                        <th>Nilai Rekomendasi</th>
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
    </div>

    <!-- Grafik Hasil MAUT -->
    <div class="container mt-5 text-center">
        <h3>Grafik Rekomendasi Desa Wisata</h3>
        <canvas id="mautChart" width="400" height="200"></canvas>
    </div>


   {{-- Input Data User --}}
    <div class="container mt-5">
        <h3 class="text-center mb-4">Masukkan Data Anda</h3>
        <form id="userInputForm" action="{{ route('maut.hitung') }}" method="POST">
            @csrf
            <div class="mb-3">
                <label for="desa" class="form-label">Nama Desa:</label>
                <input type="text" name="nama" id="desa" class="form-control" value="{{ old('nama') }}" required>
                @error('nama')
                    <small class="text-danger">{{ $message }}</small>
                @enderror
            </div>

            <div class="mb-3">
                <label for="kebersihan" class="form-label">Kebersihan:</label>
                <select name="kebersihan" id="kebersihan" class="form-select">
                    <option value="1" {{ old('kebersihan') == 1 ? 'selected' : '' }}>Kurang Bersih</option>
                    <option value="3" {{ old('kebersihan') == 3 ? 'selected' : '' }}>Cukup Bersih</option>
                    <option value="5" {{ old('kebersihan') == 5 ? 'selected' : '' }}>Bersih</option>
                </select>
                @error('kebersihan')
                    <small class="text-danger">{{ $message }}</small>
                @enderror
            </div>

            <div class="mb-3">
                <label for="keamanan" class="form-label">Keamanan:</label>
                <select name="keamanan" id="keamanan" class="form-select">
                    <option value="1" {{ old('keamanan') == 1 ? 'selected' : '' }}>Kurang Aman</option>
                    <option value="2" {{ old('keamanan') == 2 ? 'selected' : '' }}>Cukup Aman</option>
                    <option value="3" {{ old('keamanan') == 3 ? 'selected' : '' }}>Aman</option>
                </select>
                @error('keamanan')
                    <small class="text-danger">{{ $message }}</small>
                @enderror
            </div>

            <div class="mb-3">
                <label for="akses_jalan" class="form-label">Akses Jalan:</label>
                <select name="akses_jalan" id="akses_jalan" class="form-select">
                    <option value="1" {{ old('akses_jalan') == 1 ? 'selected' : '' }}>Sulit</option>
                    <option value="3" {{ old('akses_jalan') == 3 ? 'selected' : '' }}>Cukup Mudah</option>
                    <option value="5" {{ old('akses_jalan') == 5 ? 'selected' : '' }}>Mudah</option>
                </select>
                @error('akses_jalan')
                    <small class="text-danger">{{ $message }}</small>
                @enderror
            </div>

            <div class="mb-3">
                <label for="jarak_tempuh" class="form-label">Jarak Tempuh:</label>
                <select name="jarak_tempuh" id="jarak_tempuh" class="form-select">
                    <option value="1" {{ old('jarak_tempuh') == 1 ? 'selected' : '' }}>Jauh</option>
                    <option value="2" {{ old('jarak_tempuh') == 2 ? 'selected' : '' }}>Cukup Jauh</option>
                    <option value="3" {{ old('jarak_tempuh') == 3 ? 'selected' : '' }}>Dekat</option>
                </select>
                @error('jarak_tempuh')
                    <small class="text-danger">{{ $message }}</small>
                @enderror
            </div>

            <div class="mb-3">
                <label for="fasilitas" class="form-label">Fasilitas:</label>
                <select name="fasilitas" id="fasilitas" class="form-select">
                    <option value="1" {{ old('fasilitas') == 1 ? 'selected' : '' }}>Minim</option>
                    <option value="3" {{ old('fasilitas') == 3 ? 'selected' : '' }}>Cukup</option>
                    <option value="5" {{ old('fasilitas') == 5 ? 'selected' : '' }}>Lengkap</option>
                </select>
                @error('fasilitas')
                    <small class="text-danger">{{ $message }}</small>
                @enderror
            </div>

            <div class="mb-3">
                <label for="biaya_tiket" class="form-label">Biaya Tiket:</label>
                <select name="biaya_tiket" id="biaya_tiket" class="form-select">
                    <option value="5" {{ old('biaya_tiket') == 5 ? 'selected' : '' }}>Mahal</option>
                    <option value="3" {{ old('biaya_tiket') == 3 ? 'selected' : '' }}>Sedang</option>
                    <option value="1" {{ old('biaya_tiket') == 1 ? 'selected' : '' }}>Murah</option>
                </select>
                @error('biaya_tiket')
                    <small class="text-danger">{{ $message }}</small>
                @enderror
            </div>

            <div class="text-center">
                <button type="submit" class="btn btn-primary">Tambahkan</button>
            </div>
        </form>
    </div>

</section>

<script src="https://cdn.jsdelivr.net/npm/chart.js"></script>
<script>
    var ctx = document.getElementById('mautChart').getContext('2d');
    var mautChart = new Chart(ctx, {
        type: 'bar',
        data: {
            labels: @json(array_column($hasil_maut, 'desa')),
            datasets: [{
                label: 'Nilai MAUT',
                data: @json(array_column($hasil_maut, 'nilai')),
                backgroundColor: 'rgba(54, 162, 235, 0.7)',
                borderColor: 'rgba(54, 162, 235, 1)',
                borderWidth: 1,
                borderRadius: 5
            }]
        },
        options: {
            responsive: true,
            plugins: {
                legend: {
                    display: false
                },
                tooltip: {
                    callbacks: {
                        label: function(tooltipItem) {
                            return 'Nilai: ' + tooltipItem.raw.toFixed(5);
                        }
                    }
                }
            },
            scales: {
                y: {
                    beginAtZero: true,
                    ticks: {
                        stepSize: 0.1
                    }
                }
            }
        }
    });

    function tambahData() {
        event.preventDefault(); // Menghindari form reload

        let desa = document.getElementById("desa").value;
        let kebersihan = parseInt(document.getElementById("kebersihan").value);
        let keamanan = parseInt(document.getElementById("keamanan").value);
        let akses_jalan = parseInt(document.getElementById("akses_jalan").value);
        let jarak_tempuh = parseInt(document.getElementById("jarak_tempuh").value);

        if (!desa) {
            alert("Nama desa harus diisi!");
            return;
        }

        let nilaiMAUT = (kebersihan * 0.2) + (keamanan * 0.2) + (akses_jalan * 0.2) + (jarak_tempuh * 0.2);

        let table = document.getElementById("hasilMaut").getElementsByTagName('tbody')[0];
        let newRow = table.insertRow();
        newRow.innerHTML = `<td>${desa}</td><td>${nilaiMAUT.toFixed(5)}</td>`;

        console.log(`Data ditambahkan: ${desa}, Nilai MAUT: ${nilaiMAUT.toFixed(5)}`);
    }

</script>
@endsection
