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
                                <h5 class="card-title">
                                    @if (Auth::user()->level == 'Administrador-Master')
                                        Empresas cadastradas
                                        @else
                                        Minhas empresas cadastradas
                                    @endif


                                </h5>


                                <table class="table table-borderless datatable">
                                    <thead>
                                        <tr class="">
                                            <th>Nome da empresa </th>
                                            <th>Telefone</th>
                                            <th>Nif</th>
                                            <th>Email</th>
                                            <th>Status</th>
                                            <th class="text-left">ACÇÕES</th>
                                        </tr>
                                    </thead>
                                    <tbody>
                                        @foreach ($empresaPerfil as $item)
                                            <tr class="">

                                                <td>{{ $item->nomeEmpresa }} </td>
                                                <td>{{ $item->telefone }} </td>
                                                <td>{{ $item->nif }} </td>
                                                <td>{{ $item->email }} </td>
                                                <td>{{ $item->status }} </td>


                                                <td>
                                                    <button type="button" class="btn btn-primary"
                                                        data-bs-toggle="dropdown"><i class="bi bi-three-dots"></i></button>
                                                    <ul class="dropdown-menu dropdown-menu-end dropdown-menu-arrow">

                                                        <li><a class="dropdown-item"
                                                                href="{{ url("admin/perfil-empresa/edit/{$item->id}") }}">Editar</a>
                                                        </li>
                                                        <li><a class="dropdown-item"
                                                                href="{{ url("admin/perfil-empresa/delete/{$item->id}") }}">
                                                                Eliminar</a></li>
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
