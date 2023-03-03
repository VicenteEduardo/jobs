@extends('layouts.merge.dashboard')
@section('titulo', 'Detalhes da Vaga')
@section('content')


<script src="assets/bootstrap-3.3.7/js/bootstrap.min.js" type="text/javascript"></script>


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

      @if ($errors->any())
      <div class="alert alert-danger">
          <ul>
              @foreach ($errors->all() as $error)
                  <li>{{ $error }}</li>
              @endforeach
          </ul>
      </div>
  @endif


      <button type="button" class="btn btn-primary" data-bs-toggle="modal" data-bs-target="#basicModal">
        Enviar Candidatura
      </button>
    </div>
                </div>
            </div>
        </div>

    </div>

<form action="{{ route('admin.inscricoesUsuario.cadastrar') }}" method="POST">
    @csrf
    <input name="id_vaga" value=" {{ $vaga->id }}" hidden>



    <div class="modal fade" id="basicModal" tabindex="-1">
        <div class="modal-dialog">
          <div class="modal-content">
            <div class="modal-header">
              <h5 class="modal-title">Escolha a categoria</h5>
              <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
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
              <button type="button" class="btn btn-danger" data-bs-dismiss="modal">Fechar</button>
              <button type="Submit" class="btn btn-primary">Enviar Candidatura</button>
            </div>
          </div>
        </div>
      </div><!-- End Basic Modal-->



    </form>

      @endsection
