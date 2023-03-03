@extends('layouts.merge.dashboard')
@section('titulo', 'Listar Inscritos a Vaga')
@section('content')


<section class="section dashboard">
    <div class="row">
      <!-- Left side columns -->
      <div class="col-lg-12">
        <div class="row">

          <!-- Recent Sales -->
          <div class="col-12">
            <div class="card recent-sales overflow-auto">

              <div class="card-body">
                <h5 class="card-title">Lista de Vagas Publicadas</h5>


                <table class="table table-borderless datatable">
                  <thead>
                    <tr class="text-center">
                        <th>#</th>
                        <th>Nome da empresa </th>
                        <th>Titulo do Emprego</th>
                        <th>Tempo</th>

                        <th class="text-left">ACÇÕES</th>
                    </tr>
                    </tr>
                  </thead>
                  <tbody>


                    @foreach ($vagaPublocadas as $item)
                    <tr >
                        <td>{{ $item->id }}</td>
                        <td>{{ $item->nomeEmresa }} </td>
                        <td>{{ $item->tituloEmprego }} </td>
                        <td>{{ $item->tempoEmprego }} </td>


                        <td>

                            <a class=" btn btn-primary"
                            href="{{ url("admin/inscritos/show/{$item->id}") }}">Detalhes</a>


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
  </section>
    @endsection
