@extends('layouts.merge.dashboard')
@section('titulo', 'Lista de Utilizadores')
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
                                <h5 class="card-title">Solicitações de Empresas</h5>


                                <table class="table table-borderless datatable">
                                    <thead>
                                        <tr class="">
                                            <th>#</th>
                                            <th>Nome da empresa </th>
                                            <th>Telefone</th>
                                            <th>Nif</th>
                                            <th>Email</th>
                                            <th>Stauts</th>
                                            <th class="text-left">ACÇÕES</th>
                                    </thead>
                                    <tbody>

                                        @foreach ($empresasSolocitacoes as $item)
                                            <tr class="text-center text-dark">
                                                <td>{{ $item->id }}</td>
                                                <td>{{ $item->nomeEmpresa }} </td>
                                                <td>{{ $item->telefone }} </td>
                                                <td>{{ $item->nif }} </td>
                                                <td>{{ $item->email }} </td>
                                                <td>{{ $item->status }} </td>


                                                <td>
                                                    <button type="button" class="btn btn-primary"
                                                        data-bs-toggle="dropdown"><i class="bi bi-three-dots"></i></button>
                                                    <ul class="dropdown-menu dropdown-menu-end dropdown-menu-arrow">

                                                        <li>
                                                        <li> <a class="dropdown-item"
                                                                href="{{ url("admin/registro-empresas/negar/{$item->id}") }}">Negar</a>
                                                        </li>
                                                        <li> <a class="dropdown-item"
                                                                href="{{ url("admin/registro-empresas/aprovar/{$item->id}") }}">Aprovar</a>
                                                        </li>
                                                        <li> <a class="dropdown-item"
                                                                href="{{ url("admin/registro-empresas/pendente/{$item->id}") }}">Pendete</a>
                                                        </li>



                                                    </ul>
                                                </td>

                                                <td>



                            </div>
                        </div>

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
