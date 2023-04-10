@extends('layouts.merge.dashboard')
@section('titulo', 'Dashboard')
@section('content')
    <section class="section dashboard">
        <div class="row">
            <!-- Left side columns -->
            <div class="col-lg-12">
                <div class="row">

                    <!-- Recent Sales -->
                    <div class="col-12">
                        <div class="card recent-sales overflow-auto">

                            <div class="filter">
                                <a class="icon" href="#" data-bs-toggle="dropdown"><i class="bi bi-three-dots"></i></a>
                                <ul class="dropdown-menu dropdown-menu-end dropdown-menu-arrow">

                                    <li><a class="dropdown-item" href="#">Gerar PDF</a></li>
                                </ul>
                            </div>

                            <div class="card-body">
                                <h5 class="card-title">Lista de Candidatos Inscritos Vaga</h5>
                                Vagas Abertas :{{ $numVagas->tempoVaga }}<br>
                                Total Candidatos :{{ $total }}<br>
                                <button type="button" class="btn btn-primary" data-bs-toggle="modal" data-bs-target="#basicModal">
                             Filtrar Dados
                                  </button>
                                <table class="table table-borderless datatable">
                                    <thead>
                                        <tr>
                                            <th>#</th>
                                            <th>Nome candidado </th>
                                            <th>Email</th>
                                            <th>Categoria</th>
                                            <th>Status</th>
                                            <th class="text-left">ACÇÕES</th>
                                        </tr>
                                    </thead>
                                    <tbody>
                                        @foreach ($canditados as $item)
                                            <tr>
                                                <td>{{ $item->id }}</td>
                                                <td>{{ $item->canditados->name }}</td>

                                                <td>{{ $item->canditados->email }} </td>
                                                <td>{{ $item->nomeCategoria }} </td>
                                                <td>

                                                    @if ($item->status == 'Aprovado')
                                                        <span class="badge bg-success">
                                                            {{ $item->status }}</span>
                                                    @endif
                                                    @if ($item->status == 'Negado')
                                                    <span class="badge bg-danger">
                                                        {{ $item->status }}</span>
                                                @endif
                                                @if ($item->status == 'Pendente')
                                                <span class="badge bg-danger">
                                                    {{ $item->status }}</span>
                                            @endif
                                                </td>


                                                <td>
                                                    <button type="button" class="btn btn-primary"
                                                        data-bs-toggle="dropdown"><i class="bi bi-three-dots"></i></button>
                                                    <ul class="dropdown-menu dropdown-menu-end dropdown-menu-arrow">
                                                        <li><a class="dropdown-item"
                                                                href="{{ url("admin/inscritos/negar/{$item->id}") }}">Negar</a>
                                                        </li>
                                                        <li><a class="dropdown-item"
                                                                href="{{ url("admin/inscritos/aprovar/{$item->id}") }}">Aprovar</a>
                                                        </li>
                                                        <li><a class="dropdown-item"
                                                                href="{{ url("admin/inscritos/pendente/{$item->id}") }}">Pendente</a>
                                                        </li>
                                                        <li><a target="_blank" class="dropdown-item"
                                                                href="{{ url("admin/inscritos/curriculo/{$item->fk_cliente}") }}">Ver
                                                                curriculo</a></li>
                                                    </ul>
                                                </td>
                                            </tr>
                                        @endforeach

                                    </tbody>
                                </table>

                            </div>

                        </div>
                    </div><!-- End Recent Sales -->

                </div>
            </div><!-- End Left side columns -->
        </div>




<form action="{{ route('admin.inscritos.filtrar') }}" method="POST">
    @csrf



<input type="text" name="id_vaga" value="{{ $numVagas->id }}" hidden>
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
              <button type="Submit" class="btn btn-primary">Filtrar</button>
            </div>
          </div>
        </div>
      </div><!-- End Basic Modal-->



    </form>
    </section>
@endsection
