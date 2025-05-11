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

        <div class="col-md-12 grid-margin stretch-card">
        <div class="card">
            <div class="card-body">
            <div class="d-flex justify-content-between">
                <p class="card-title" style="text-align: center;">Grafik Rekomendasi Desa Wisata</p>
            </div>
            <div id="maut-legend" class="chartjs-legend mt-4 mb-2"></div>
            <canvas id="mautChartAdmin" style="max-width: 100%; height: 250px;"></canvas> <!-- Set height and max-width -->
            </div>
        </div>
        </div>

        <!-- Script Chart.js -->
        <script src="https://cdn.jsdelivr.net/npm/chart.js"></script>
        <script>
        var ctx = document.getElementById('mautChartAdmin').getContext('2d');
        var mautChart = new Chart(ctx, {
            type: 'bar',
            data: {
            labels: @json(array_column($hasilMaut, 'desa')),
            datasets: [{
                label: 'Nilai MAUT',
                data: @json(array_column($hasilMaut, 'nilai')),
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
                    return 'Nilai: ' + tooltipItem.raw.toFixed(2);
                    }
                }
                }
            },
            scales: {
                y: {
                beginAtZero: true,
                ticks: {
                    stepSize: 1
                }
                }
            }
            }
        });
        </script>

    </div>
</div>
@endsection
