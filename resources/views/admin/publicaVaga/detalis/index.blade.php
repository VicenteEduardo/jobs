@extends('layouts.merge.dashboard')
@section('titulo', 'Detalhes da Vaga')
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
        <div class="col-xl-12">
            <div class="card">
                <div class="card-body">
                    <div   style='background-image:url("/storage/{{ $vaga->imagemEmprego}}");background-position:center;background-size:cover;height:240px;width:28cm'></div>
    <div class="post-details">
      <h3 class="mb-2 text-black">  {{ $vaga->tituloEmprego }}</h3>
      <ul class="mb-4 post-meta">
        <li class="post-author">Empresa:{{ $vaga->nomeEmresa }}</li>
        <li class="post-date"><i class="fa fa-calender"></i>{{ $vaga->created_at }}</li>
        <li class="post-comment"><i class="fa fa-comments-o"></i> Total Vagas:28</li>
      </ul>

      <p> {!! html_entity_decode(mb_substr($vaga->descricaoEmpreego, 0,1000000, 'UTF-8')) !!}</p>


    </div>
                </div>
            </div>
        </div>

    </div>


      @endsection
