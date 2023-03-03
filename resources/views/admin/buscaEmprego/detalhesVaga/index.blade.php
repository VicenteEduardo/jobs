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
        <li class="post-comment"><i class="fa fa-comments-o"></i> Total Vagas:{{ $vaga->tempoVaga }}</li>
      </ul>

      <p> {!! html_entity_decode(mb_substr($vaga->descricaoEmpreego, 0,1000000, 'UTF-8')) !!}</p>


    <button type="button" class="btn btn-primary" data-toggle="modal" data-target="#exampleModal">
        Enviar Candidatura
      </button>
    </div>
                </div>
            </div>
        </div>

    </div>
<form action="{{ route('admin.inscricoesUsuario.cadastrar') }}" method="POST">
    @csrf
    <input name="id_vaga" value=" {{ $vaga->id }}">
    <div class="modal fade" id="exampleModal" tabindex="-1" role="dialog" aria-labelledby="exampleModalLabel" aria-hidden="true">
        <div class="modal-dialog" role="document">
          <div class="modal-content">
            <div class="modal-header">
              <h5 class="modal-title" id="exampleModalLabel">Escolha a categoria</h5>
              <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                <span aria-hidden="true">&times;</span>
              </button>
            </div>
            <div class="modal-body">
                @foreach ($categoriaVagas as $item )
                <div class="form-check form-check-inline ">
                    <label class="form-check-label">
                        <input name="categoria[]" type="checkbox" class="form-check-input"
                            value="{{ $item->nomeCategoria }}" >{{ $item->nomeCategoria }}
                    </label>
                </div>
                @endforeach

            </div>
            <div class="modal-footer">
              <button type="button" class="btn btn-secondary" data-dismiss="modal">Cancelar</button>
              <button type="Submit" class="btn btn-primary">Enviar Candidatura</button>
            </div>
          </div>
        </div>
      </div>
    </form>

      @endsection
