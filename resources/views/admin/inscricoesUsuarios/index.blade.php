@extends('layouts.merge.dashboard')
@section('titulo', 'Minhas inscrições de vagas')
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
                                <h5 class="card-title">Minhas inscrições de vagas</h5>
                                Total Candidaturas :{{ $total }}


                                <table class="table table-borderless datatable">
                                    <thead>
                                        <tr class="text-center">
                                            <th>#</th>
                                            <th>Nome candidado </th>
                                            <th>Empresa</th>
                                            <th>Categoria</th>
                                            <th class="">Status</th>
                                            <th class="">ACÇÕES</th>
                                        </tr>
                                    </thead>
                                    <tbody>

                                        @foreach ($canditados as $item)
                                            <tr>
                                                <td>{{ $item->id }}</td>
                                                <td>{{ $item->canditados->name }}</td>
                                                <td>{{ $item->empresas->nomeEmresa }} </td>
                                                <td>{{ $item->nomeCategoria }} </td>
                                                <td>{{ $item->status }} </td>


                                                <td>
                                                    <button type="button" class="btn btn-primary" data-bs-toggle="dropdown"><i class="bi bi-three-dots"></i></button>
                                                    <ul class="dropdown-menu dropdown-menu-end dropdown-menu-arrow">

                                                      <li> <a class="dropdown-item"
                                                        href="{{ url("admin/minhas-inscricoes/delete/{$item->id}") }}">Cancelar
                                                        Incrição</a></li>


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
