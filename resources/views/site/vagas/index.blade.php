@extends('layouts.merge.site')
@section('titulo', 'Oficial')
@section('content')
    <!-- Template Main CSS File -->
    <link href="/site/assets/css/style.css" rel="stylesheet">
    <link href="/site/assets/css/vagas.css" rel="stylesheet">
    <link href="/site/assets/css/variables-vagas.css" rel="stylesheet">
    <link href="/site/assets/js/main.js" rel="stylesheet">
    <!-- ======= Introdução ======= -->

    <main id="main">

        <!-- ======= Breadcrumbs ======= -->
        <section class="breadcrumbs">
            <div class="container">

                <ol>
                    <li><a href="{{ route('site.home') }}">Home</a></li>
                    <li>Vagas</li>
                </ol>
                <h2>Vagas Disponíveis</h2>

            </div>
        </section><!-- End Breadcrumbs -->

        <main id="main">
            <!-- ======= Nossas Vagas ======= -->
            <section id="services" class="services section-bg">
                <div class="container" data-aos="fade-up">

                    <header class="section-header">
                        <h2 class="d-none">Vagas Publicadas</h2>
                        <p>Vagas Disponíveis</p>
                    </header>

                    <div class="row g-5">


                        @foreach ($vagas as $item)
                            @if (
                                (date('Y', strtotime($item->dataVaga)) >= date('Y') && date('m', strtotime($item->dataVaga)) >= date('m')) ||
                                    date('d', strtotime($item->dataVaga)) <= date('d'))
                                <div class="col-md-6 col-lg-4" data-aos="zoom-in" data-aos-delay="200">
                                    <div class="box">
                                        <h3>{{ $item->tituloEmprego }} </h3>
                                        <p class="description"><span class="fw-bold"> Nome da
                                                Empresa:{{ $item->nomeEmresa }} </span></p>
                                        <p class="description"><span class="fw-bold"> Email:{{ $item->emailEmprego }}
                                            </span> </p>
                                        <p class="description"><span class="fw-bold"> Vagas
                                                Diponíveis:{{ $item->tempoVaga }} </span></p>
                                        <p class="description"><span class="fw-bold"> Data de Publicação:
                                                {{ date('d/m/Y', strtotime($item->created_at)) }} </span></p>
                                        <p class="description"><span class="fw-bold"> Disponível até:
                                                {{ date('d/m/Y', strtotime($item->dataVaga)) }}
                                            </span></p>
                                        <a href="{{ route('admin.buscar.detalhes', $item->id) }}"
                                            class="btn btn-primary my-3 w-100" id="btn-inscricao">Inscreva-se</a>

                                    </div>
                                </div>
                            @endif
                        @endforeach
                    </div>

                </div>
            </section><!-- End Services Section -->
            <!-- Fim nossas vagas -->

        </main><!-- Fim do main -->


    @endsection
