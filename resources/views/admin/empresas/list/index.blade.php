@extends('layouts.merge.dashboard')
@section('titulo', 'Empresas Cadastradas')
@section('content')
    <link href="/dashboard/public/vendor/bootstrap-select/dist/css/bootstrap-select.min.css" rel="stylesheet"
        type="text/css" />
    <link href="/dashboard/public/vendor/jquery-smartwizard/dist/css/smart_wizard.min.css" rel="stylesheet"
        type="text/css" />
    <link href="/dashboard/public/css/style.css" rel="stylesheet" type="text/css" />
    <div class="content-body">
        <!-- row -->
        <!-- row -->
        <div class="container-fluid">
            <div class="page-titles">
                <ol class="breadcrumb">
                    <li class="breadcrumb-item active"><a href="{{ route('admin.buscar.index') }}">Procurar Vagas</a></li>
                    <li class="breadcrumb-item"><a href="javascript:void(0)">Empresas</a></li>
                </ol>
            </div>
            <div class="row">
                <div class="col-xl-12 col-xxl-12">
                    <div class="row">
                        <div class="col-xl-12">
                            <div
                                class="d-flex flex-wrap search-job search-job-xl bg-white rounded py-3 px-md-3 px-0 mb-4 align-items-center">
                                <div class="col-xl-3 col-xxl-4 col-md-4 search-dropdown border-right">


                                </div>
                                <form method="POST" action="{{ route('admin.empresas.store') }}"
                                    enctype="multipart/form-data">
                                    @csrf
                                    <div class="col-xl-9 col-xxl-12 col-lg-12 col-md-12 d-flex flex-wrap">
                                        <input name="emprego" class="form-control input-rounded mr-auto mb-3 mb-md-0"
                                            type="text" placeholder="Pesquisa a empresa">
                                    </div>

                            </div>
                            <div class="mr-auto mb-2 pr-2">
                                <h6 class="text-black fs-16 font-w600 mb-1">Total de Empresas {{ $totalempregos }}</h6>
                                <span class="fs-14">Aproveite Esta oportunidade</span>
                            </div>

                            </form>

                        </div>
                        @foreach ($empregos as $item)
                            <div class="col-xl-3 col-xxl-4 col-lg-4 col-sm-6">
                                <div class="card text-center"
                                  >
                                  <div   style='background-image:url("/storage/{{ $item->imagem }}");background-position:center;background-size:cover;height:200px;'></div>
                                    <div class="card-body">

                                        <h6 class="font-w600 text-black fs-16 mb-1"><a class="text-black"
                                                href="#!">Empresa :{{ $item->nomeEmpresa }}</a></h6>
                                        <span class="fs-14">Email :{{ $item->email }}</span>
                                        <span class="fs-14">Telefone :{{ $item->telefone }}</span>
                                    </div>
                                </div>
                            </div>
                        @endforeach
                    </div>
                </div>

            </div>
        </div>

    </div>


    @if (session('notFond'))
        <script>
            Swal.fire({
                icon: 'error',
                title: 'Não foi possivel controlar Empresas com este nome!',
                showConfirmButton: true
            })
        </script>
    @endif

@endsection
