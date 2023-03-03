@extends('layouts.merge.dashboard')
@section('titulo', 'Dashboard')
@section('content')

    <link href="/dashboard/public/vendor/bootstrap-select/dist/css/bootstrap-select.min.css" rel="stylesheet"
        type="text/css" />
    <link href="/dashboard/public/vendor/jquery-smartwizard/dist/css/smart_wizard.min.css" rel="stylesheet"
        type="text/css" />

    <link href="/dashboard/public/css/style.css" rel="stylesheet" type="text/css" />




    <!--**********************************
            Content body start
        ***********************************-->
    <div class="content-body">
        <!-- row -->
        <!-- row -->
        <div class="container-fluid">
            <div class="d-flex align-items-center flex-wrap search-job bg-white rounded py-3 px-md-3 px-0 mb-4">
                <div class="col-lg-3 border-right search-dropdown">
                    <div class="dropdown mb-0 custom-dropdown d-block">
                        <div class="btn d-flex align-items-center rounded-0 svg-btn px-0" data-toggle="dropdown">
                            <svg class="min-w20" width="20" height="24" viewBox="0 0 20 24" fill="none"
                                xmlns="http://www.w3.org/2000/svg">
                                <path
                                    d="M10 0C4.93398 0 0.8125 4.12148 0.8125 9.1875C0.8125 10.8091 1.24094 12.4034 2.05145 13.7979C2.24041 14.123 2.45162 14.4398 2.67934 14.7396L9.60081 24H10.3991L17.3207 14.7397C17.5483 14.4398 17.7595 14.1231 17.9485 13.7979C18.7591 12.4034 19.1875 10.8091 19.1875 9.1875C19.1875 4.12148 15.066 0 10 0ZM10 12.2344C8.31995 12.2344 6.95312 10.8675 6.95312 9.1875C6.95312 7.50745 8.31995 6.14062 10 6.14062C11.68 6.14062 13.0469 7.50745 13.0469 9.1875C13.0469 10.8675 11.68 12.2344 10 12.2344Z"
                                    fill="#40189D" />
                            </svg>
                            <div class="text-left ml-3">
                                <span class="d-block fs-16 text-black">Procurar Vagas</span>
                            </div>
                            <i class="fa fa-angle-down scale5 ml-auto"></i>
                        </div>
                        <div class="dropdown-menu dropdown-menu-right">

                        </div>
                    </div>
                </div>

    <form  method="POST" action="{{ route('admin.buscar.store') }}"   enctype="multipart/form-data">
        @csrf
                <div class="col-lg-9 d-md-flex">
                    <input name="emprego" class="form-control input-rounded mr-auto mb-md-0 mb-3" type="text"
                        placeholder="procure uma vaga para voçê">
                    <a href="javascript:void(0);" class="btn btn-primary btn-rounded"><i
                            class="las la-search scale5 mr-3"></i>Buscar</a>
                </div>
            </div>

            <div class="d-flex flex-wrap mb-4 align-items-center search-filter">
                <div class="mr-auto mb-2 pr-2">
                    <h6 class="text-black fs-16 font-w600 mb-1">Total de resultados encontrados {{ $totalempregos }}</h6>
                    <span class="fs-14">Aproveite Esta oportunidade</span>
                </div>

            </form>


            </div>
            <div class="row">


                @foreach ($empregos as $item )
                <div class="col-xl-4 col-lg-6">
                    <div class="card  shadow_1">
                        <div class="card-body">
                            <div class="media mb-2">

                                <div class="media-body">

                                    <div   style='background-image:url("/storage/{{ $item->imagemEmprego}}");background-position:center;background-size:cover;height:200px;width:8cm'></div>
                                    <p class="mb-1">Empresa:{{ $item->nomeEmresa }}</p>
                                    <h4 class="fs-20 text-black"><a class="text-black" href="statistics.html">
                                           {{ $item->tituloEmprego }}</a></h4>
                                </div>

                            </div>

                            <p class="fs-14">
                                {!! html_entity_decode(mb_substr($item->descricaoEmpreego, 0,100, 'UTF-8')) !!}...

                               </p>
                            <div class="d-flex align-items-center mt-4">
                                <a href="statistics.html" class="btn btn-primary light btn-rounded mr-auto">{{ $item->tempoEmprego }}</a>
                           <a href="{{ route('admin.buscar.detalhes',$item->id) }}">     <span class="text-black font-w500">saber mais</span></a>
                            </div>
                        </div>
                    </div>
                </div>

                @endforeach

            </div>
        </div>

    </div>



    </div>

    <div class="dataTables_paginate paging_simple_numbers">
        <div class="col-md-4">
            <h6>{{ $empregos->links() }}</h6>
        </div>
    </div>


@if(session('notFond'))
<script>
    Swal.fire({
        icon: 'error',
        title: 'Não foi possivel controlar vagas de emprego com os dados digitados!',
        showConfirmButton: true
    })
</script>
@endif

@endsection
