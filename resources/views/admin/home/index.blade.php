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
                            @if (Auth::user()->level == 'Administrador-Master')
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



                                            var jancanditados = JSON.parse('<?php echo $jancanditados; ?>');
                                            var fevcanditados = JSON.parse('<?php echo $fevcanditados; ?>');
                                            var marcanditados = JSON.parse('<?php echo $marcanditados; ?>');
                                            var abrcanditados = JSON.parse('<?php echo $abrcanditados; ?>');
                                            var maiocanditados = JSON.parse('<?php echo $maiocanditados; ?>');
                                            var juncanditados = JSON.parse('<?php echo $juncanditados; ?>');
                                            var julcanditados = JSON.parse('<?php echo $julcanditados; ?>');
                                            var agocanditados = JSON.parse('<?php echo $agocanditados; ?>');
                                            var setcanditados = JSON.parse('<?php echo $setcanditados; ?>');
                                            var outcanditados = JSON.parse('<?php echo $outcanditados; ?>');
                                            var novcanditados = JSON.parse('<?php echo $novcanditados; ?>');
                                            var dezcanditados = JSON.parse('<?php echo $dezcanditados; ?>');


                                            var janEmpresa = JSON.parse('<?php echo $janEmpresa; ?>');
                                            var fevEmpresa = JSON.parse('<?php echo $fevEmpresa; ?>');
                                            var marEmpresa = JSON.parse('<?php echo $marEmpresa; ?>');
                                            var abrEmpresa = JSON.parse('<?php echo $abrEmpresa; ?>');
                                            var maioEmpresa = JSON.parse('<?php echo $maioEmpresa; ?>');
                                            var junEmpresa = JSON.parse('<?php echo $junEmpresa; ?>');
                                            var julEmpresa = JSON.parse('<?php echo $julEmpresa; ?>');
                                            var agoEmpresa = JSON.parse('<?php echo $agoEmpresa; ?>');
                                            var setEmpresa = JSON.parse('<?php echo $setEmpresa; ?>');
                                            var outEmpresa = JSON.parse('<?php echo $outEmpresa; ?>');
                                            var novEmpresa = JSON.parse('<?php echo $novEmpresa; ?>');
                                            var dezEmpresa = JSON.parse('<?php echo $dezEmpresa; ?>');

                                            new ApexCharts(document.querySelector("#reportsChart"), {
                                                series: [{
                                                    name: 'Pessoas Inscritas',

                                                    data: [jancanditados, fevcanditados, marcanditados, abrcanditados,
                                                        maiocanditados, juncanditados, julcanditados, agocanditados,
                                                        setcanditados, outcanditados, novcanditados, dezcanditados
                                                    ]
                                                }, {
                                                    name: 'Empresas Cadastradas',
                                                    data: [janEmpresa, fevEmpresa, marEmpresa, abrEmpresa, maioEmpresa, junEmpresa,
                                                        julEmpresa, agoEmpresa, setEmpresa, outEmpresa, novEmpresa, dezEmpresa
                                                    ]
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
                            @endif
                            @if (Auth::user()->level == 'Administrador')
                                <div class="card-body">
                                    <h5 class="card-title">Meus Relatórios Mensais</h5>

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



                                            var jancanditados = JSON.parse('<?php echo $jancanditados; ?>');
                                            var fevcanditados = JSON.parse('<?php echo $fevcanditados; ?>');
                                            var marcanditados = JSON.parse('<?php echo $marcanditados; ?>');
                                            var abrcanditados = JSON.parse('<?php echo $abrcanditados; ?>');
                                            var maiocanditados = JSON.parse('<?php echo $maiocanditados; ?>');
                                            var juncanditados = JSON.parse('<?php echo $juncanditados; ?>');
                                            var julcanditados = JSON.parse('<?php echo $julcanditados; ?>');
                                            var agocanditados = JSON.parse('<?php echo $agocanditados; ?>');
                                            var setcanditados = JSON.parse('<?php echo $setcanditados; ?>');
                                            var outcanditados = JSON.parse('<?php echo $outcanditados; ?>');
                                            var novcanditados = JSON.parse('<?php echo $novcanditados; ?>');
                                            var dezcanditados = JSON.parse('<?php echo $dezcanditados; ?>');




                                            new ApexCharts(document.querySelector("#reportsChart"), {
                                                series: [{
                                                    name: 'Pessoas Inscritas',

                                                    data: [jancanditados, fevcanditados, marcanditados, abrcanditados,
                                                        maiocanditados, juncanditados, julcanditados, agocanditados,
                                                        setcanditados, outcanditados, novcanditados, dezcanditados
                                                    ]
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
                            @endif

                            @if (Auth::user()->level == 'cliente')
                                <div class="card-body">
                                    <h5 class="card-title">Meus Relatórios Mensais</h5>

                                    <!-- Line Chart -->
                                    <div id="reportsChart"></div>

                                    <script>
                                        document.addEventListener("DOMContentLoaded", () => {



                                            var jancanditados = JSON.parse('<?php echo $jancanditados; ?>');
                                            var fevcanditados = JSON.parse('<?php echo $fevcanditados; ?>');
                                            var marcanditados = JSON.parse('<?php echo $marcanditados; ?>');
                                            var abrcanditados = JSON.parse('<?php echo $abrcanditados; ?>');
                                            var maiocanditados = JSON.parse('<?php echo $maiocanditados; ?>');
                                            var juncanditados = JSON.parse('<?php echo $juncanditados; ?>');
                                            var julcanditados = JSON.parse('<?php echo $julcanditados; ?>');
                                            var agocanditados = JSON.parse('<?php echo $agocanditados; ?>');
                                            var setcanditados = JSON.parse('<?php echo $setcanditados; ?>');
                                            var outcanditados = JSON.parse('<?php echo $outcanditados; ?>');
                                            var novcanditados = JSON.parse('<?php echo $novcanditados; ?>');
                                            var dezcanditados = JSON.parse('<?php echo $dezcanditados; ?>');




                                            new ApexCharts(document.querySelector("#reportsChart"), {
                                                series: [{
                                                    name: 'Minhas Inscrições',

                                                    data: [jancanditados, fevcanditados, marcanditados, abrcanditados,
                                                        maiocanditados, juncanditados, julcanditados, agocanditados,
                                                        setcanditados, outcanditados, novcanditados, dezcanditados
                                                    ]
                                                }, ],
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
                            @endif

                        </div>
                    </div><!-- End Reports -->

                </div>
            </div><!-- End Left side columns -->

            <!-- Right side columns -->
            @if(Auth::user()->level == "Administrador-Master")

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

                                var empresaCount = JSON.parse('<?php echo $empresaCount; ?>');
                                var Vagas = JSON.parse('<?php echo $Vagas; ?>');
                                var candidatos = JSON.parse('<?php echo $candidatos; ?>');


                                echarts.init(document.querySelector("#trafficChart")).setOption({
                                    tooltip: {
                                        trigger: 'item'
                                    },
                                    legend: {
                                        top: '5%',
                                        left: 'center'
                                    },
                                    series: [{
                                        name: 'Total',
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
                                                value: candidatos,
                                                name: 'Candidatos'
                                            },
                                            {
                                                value: empresaCount,
                                                name: 'Empresas'
                                            },
                                            {
                                                value: Vagas,
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
            @endif
        </div>
    </section>


@endsection
