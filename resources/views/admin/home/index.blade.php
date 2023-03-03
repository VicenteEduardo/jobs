@extends('layouts.merge.dashboard')
@section('titulo', 'Dashboard')
@section('content')



    <div class="pagetitle">
        <h1>Dashboard</h1>
        <nav>
            <ol class="breadcrumb">
                <li class="breadcrumb-item"><a href="index.html">Home</a></li>
                <li class="breadcrumb-item active">Dashboard</li>
            </ol>
        </nav>
    </div><!-- End Page Title -->

    <section class="section dashboard">
        <div class="row">

            <!-- Left side columns -->
            <div class="col-lg-8">
                <div class="row">
              
                    @if (Auth::user()->level == 'Administrador-Master')
                        <!-- Sales Card -->
                        <div class="col-xxl-4 col-md-6">
                            <div class="card info-card sales-card">

                                <div class="card-body">
                                    <h5 class="card-title">Candidatos</h5>

                                    <div class="d-flex align-items-center">
                                        <div
                                            class="card-icon rounded-circle d-flex align-items-center justify-content-center">
                                            <i class="bi bi-people"></i>
                                        </div>
                                        <div class="ps-3">
                                            <h6>{{ $cliente }}</h6>
                                        </div>
                                    </div>
                                </div>

                            </div>
                        </div><!-- End Sales Card -->

                        <!-- Revenue Card -->
                        <div class="col-xxl-4 col-md-6">
                            <div class="card info-card revenue-card">

                                <div class="card-body">
                                    <h5 class="card-title">Empresas</h5>

                                    <div class="d-flex align-items-center">
                                        <div
                                            class="card-icon rounded-circle d-flex align-items-center justify-content-center">
                                            <i class="bi bi-building"></i>
                                        </div>
                                        <div class="ps-3">
                                            <h6>{{ $Administrador }}</h6>
                                        </div>
                                    </div>
                                </div>

                            </div>
                        </div><!-- End Revenue Card -->

                        <!-- Customers Card -->
                        <div class="col-xxl-4 col-md-6">

                            <div class="card info-card customers-card">

                                <div class="card-body">
                                    <h5 class="card-title">Vagas Publicadas</h5>

                                    <div class="d-flex align-items-center">
                                        <div
                                            class="card-icon rounded-circle d-flex align-items-center justify-content-center">
                                            <i class="bi bi-door-open"></i>
                                        </div>
                                        <div class="ps-3">
                                            <h6>{{ $vagas }}</h6>
                                        </div>
                                    </div>

                                </div>
                            </div>

                        </div><!-- End Customers Card -->
                    @endif

                    ffffffffffffffffffffff

                    <!-- Reports -->
                    <div class="col-12">
                        <div class="card">

                            <div class="filter">
                                <a class="icon" href="#" data-bs-toggle="dropdown"><i
                                        class="bi bi-three-dots"></i></a>
                                <ul class="dropdown-menu dropdown-menu-end dropdown-menu-arrow">

                                    <li><a class="dropdown-item" href="#">Gerar PDF</a></li>
                                </ul>
                            </div>

                            <div class="card-body">
                                <h5 class="card-title">Relatório Mensal</h5>

                                <!-- Line Chart -->
                                <div id="reportsChart"></div>

                                <script>
                                    document.addEventListener("DOMContentLoaded", () => {
                                        var jan = JSON.parse('<?php echo $jan; ?>');

                                        var fev = JSON.parse('<?php echo $fev; ?>');
                                        var mar = JSON.parse('<?php echo $mar; ?>');
                                        var abr = JSON.parse('<?php echo $abr; ?>');
                                        var maio = JSON.parse('<?php echo $maio; ?>');
                                        var jun = JSON.parse('<?php echo $jun; ?>');
                                        var jul = JSON.parse('<?php echo $jul; ?>');
                                        var ago = JSON.parse('<?php echo $ago; ?>');
                                        var set = JSON.parse('<?php echo $set; ?>');
                                        var out = JSON.parse('<?php echo $out; ?>');
                                        var nov = JSON.parse('<?php echo $nov; ?>');
                                        var dez = JSON.parse('<?php echo $dez; ?>');

                                        new ApexCharts(document.querySelector("#reportsChart"), {
                                            series: [{
                                                name: 'Pessoas Inscritas',

                                                data: [31, 40, 28, 51, 42, 80, 56],
                                            }, {
                                                name: 'Empresas Cadastradas',
                                                data: [11, 32, 45, 32, 34, 52, 41]
                                            }, {
                                                name: 'Vagas Publicadas',
                                                data: [jan, fev, mar, abr, maio, jun, jul, ago, set, out, nov, dez]
                                            }],
                                            chart: {
                                                height: 350,
                                                type: 'area',
                                                toolbar: {
                                                    show: false
                                                },
                                            },
                                            markers: {
                                                size: 4
                                            },
                                            colors: ['#4154f1', '#2eca6a', '#ff771d'],
                                            fill: {
                                                type: "gradient",
                                                gradient: {
                                                    shadeIntensity: 1,
                                                    opacityFrom: 0.3,
                                                    opacityTo: 0.4,
                                                    stops: [0, 90, 100]
                                                }
                                            },
                                            dataLabels: {
                                                enabled: false
                                            },
                                            stroke: {
                                                curve: 'smooth',
                                                width: 2
                                            },
                                            xaxis: {
                                                type: 'datetime',
                                                categories: ["2023-01-19T00:00:00.000Z", "2023-01-19T01:30:00.000Z",
                                                    "2023-01-19T02:30:00.000Z", "2023-01-19T03:30:00.000Z",
                                                    "2023-01-19T04:30:00.000Z", "2023-01-19T05:30:00.000Z",
                                                    "2023-01-19T06:30:00.000Z"
                                                ]
                                            },
                                            tooltip: {
                                                x: {
                                                    format: 'dd/MM/yy HH:mm'
                                                },
                                            }
                                        }).render();
                                    });
                                </script>
                                <!-- End Line Chart -->

                            </div>

                        </div>
                    </div><!-- End Reports -->

                </div>
            </div><!-- End Left side columns -->

            <!-- Right side columns -->
            <div class="col-lg-4">

                <!-- Website Traffic -->
                <div class="card">
                    <div class="filter">
                        <a class="icon" href="#" data-bs-toggle="dropdown"><i class="bi bi-three-dots"></i></a>
                        <ul class="dropdown-menu dropdown-menu-end dropdown-menu-arrow">

                            <li><a class="dropdown-item" href="#">Gerar PDF</a></li>
                        </ul>
                    </div>

                    <div class="card-body pb-0">
                        <h5 class="card-title">Relatório Semanal </h5>

                        <div id="trafficChart" style="min-height: 575px;" class="echart"></div>

                        <script>
                            document.addEventListener("DOMContentLoaded", () => {
                                echarts.init(document.querySelector("#trafficChart")).setOption({
                                    tooltip: {
                                        trigger: 'item'
                                    },
                                    legend: {
                                        top: '5%',
                                        left: 'center'
                                    },
                                    series: [{
                                        name: 'Access From',
                                        type: 'pie',
                                        radius: ['40%', '70%'],
                                        avoidLabelOverlap: false,
                                        label: {
                                            show: false,
                                            position: 'center'
                                        },
                                        emphasis: {
                                            label: {
                                                show: true,
                                                fontSize: '18',
                                                fontWeight: 'bold'
                                            }
                                        },
                                        labelLine: {
                                            show: false
                                        },
                                        data: [{
                                                value: 1233,
                                                name: 'Candidatos'
                                            },
                                            {
                                                value: 10,
                                                name: 'Empresas'
                                            },
                                            {
                                                value: 112,
                                                name: 'Vagas'
                                            },
                                        ]
                                    }]
                                });
                            });
                        </script>

                    </div>
                </div><!-- End Website Traffic -->

            </div><!-- End Right side columns -->

        </div>
    </section>


@endsection
