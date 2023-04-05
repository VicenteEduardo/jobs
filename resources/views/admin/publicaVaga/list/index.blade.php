@extends('layouts.merge.dashboard')
@section('titulo', 'Lista de Vagas Publicadas')
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
                                        <tr class="">
                                            <th>#</th>
                                            <th>Nome da empresa </th>
                                            <th>Titulo do Emprego</th>
                                            <th>Tipo de Vaga</th>

                                            <th class="text-left">ACÇÕES</th>
                                        </tr>
                                    </thead>
                                    <tbody>

                                        @foreach ($vagaPublocadas as $item)
                                            <tr class="">
                                                <td>{{ $item->id }}</td>
                                                <td>{{ $item->nomeEmresa }} </td>
                                                <td>{{ $item->tituloEmprego }} </td>
                                                <td>{{ $item->tempoEmprego }} </td>

                                                <td>
                                                    <button type="button" class="btn btn-primary"
                                                        data-bs-toggle="dropdown"><i class="bi bi-three-dots"></i></button>
                                                    <ul class="dropdown-menu dropdown-menu-end dropdown-menu-arrow">


                                                        <li> <a class="dropdown-item"
                                                                href="{{ url("admin/publicar-vagas/show/{$item->id}") }}">Detalhes</a>
                                                        </li>
                                                        <li> <a class="dropdown-item"
                                                                href="{{ url("admin/publicar-vagas/delete/{$item->id}") }}">Apagar</a>
                                                        </li>



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
    </section>

@endsection
