{{-- resources/views/dashboard.blade.php --}}
@extends('adminlte::page')

@section('title', 'Dashboard')

@section('content_header')
<h1>Dashboard</h1>
@stop

@section('content')
<div class="row">
    <div class="flex flex-row flex-wrap gap-4 justify-center">
        <div class="card" style="width: fit-content; height: fit-content;">
            <div class="card-header">
                <h3 class="card-title">host</h3>
            </div>
            <div class="card-body">
                <div class="row g-3">

                    <!-- Card with cpu Gauge -->
                    <div class="card flex flex-col justify-center items-center text-center"
                        style="width: 80px; height: 150px;">
                        <div class="card-header w-full text-center">
                            <h3 class="card-title w-full text-sm">CPU Usage</h3>
                        </div>
                        <div class="card-body flex flex-col justify-center items-center p-2">
                            <!-- Gauge Canvas -->
                            <div class="mb-2" style="width: 100%;height: 90%;">
                                <canvas id="cpuGauge"></canvas>
                            </div>
                            <div id="cpuValue" class="text-red-600 text-2xl font-bold">
                                <p class="m-0">65%</p>
                            </div>
                        </div>
                    </div>
                    <!-- Card with ram Gauge -->

                    <div class="card flex flex-col justify-center items-center text-center"
                        style="width: 80px; height: 150px;">
                        <div class="card-header w-full text-center">
                            <h3 class="card-title w-full text-sm">RAM Usage</h3>
                        </div>
                        <div class="card-body flex flex-col justify-center items-center p-2">
                            <!-- Gauge Canvas -->
                            <div class="mb-2" style="width: 100%;height: 90%;">
                                <canvas id="ramGauge"></canvas>
                            </div>
                            <div id="rammValue" class="text-red-600 text-2xl font-bold">
                                <p class="m-0">50%</p>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>
        @stop

        @section('js')
            <script src="https://cdn.jsdelivr.net/npm/chart.js"></script>
            <script>
                const cpuctx = document.getElementById('cpuGauge').getContext('2d');
                const cpugaugeChart = new Chart(cpuctx, {
                    type: 'doughnut',
                    data: {
                        labels: ['Used', 'Free'],
                        datasets: [{
                            data: [65, 35],
                            backgroundColor: ['#dc3545', '#e9ecef'],
                            borderWidth: 0
                        }]
                    },
                    options: {
                        cutout: '80%',
                        responsive: true,
                        plugins: {
                            legend: { display: false },
                            tooltip: { enabled: false }
                        }
                    }
                });

                const ramctx = document.getElementById('ramGauge').getContext('2d');
                const ramgaugeChart = new Chart(ramctx, {
                    type: 'doughnut',
                    data: {
                        labels: ['Used', 'Free'],
                        datasets: [{
                            data: [50, 50],
                            backgroundColor: ['#dc3545', '#e9ecef'],
                            borderWidth: 0
                        }]
                    },
                    options: {
                        cutout: '80%',
                        responsive: true,
                        plugins: {
                            legend: { display: false },
                            tooltip: { enabled: false }
                        }
                    }
                });
            </script>
        @endsection