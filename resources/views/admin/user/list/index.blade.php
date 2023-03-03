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
                                    <h5 class="card-title">Lista de usuários do sistema</h5>

                                    
                                    <table class="table table-borderless datatable">
                                      <thead>
                                        <tr class="text-center">
                                            <th>#</th>
                                            <th>NOME</th>
                                            <th>EMAIL</th>
                                            <th>DATA DE CRIAÇÃO</th>
                                            <th>NIVEL DE ACESSO</th>
                                            <th>ACÇÕES</th>
                                        </tr>
                                      </thead>
                                      <tbody>


                                        @foreach ($users as $item)
                                        <tr >
                                            <td>{{ $item->id }}</td>
                                            <td>{{ $item->name }} </td>
                                            <td>{{ $item->email }} </td>
                                            <td>{{ $item->created_at }} </td>
                                            <td>
                                                @if ($item->level == 'Administrador')
                                                    Empresa
                                                @endif
                                                @if ($item->level == 'cliente')
                                             Usuário-Normal
                                            @endif
                                           @if($item->level != 'cliente' || $item->level != 'Administrador' )
                                         {{ $item->level }}
                                           @endif
                                            </td>

                                            <td>

                                                <a class=" btn btn-primary"
                                                href="{{ url("admin/user/show/{$item->id}") }}">Detalhes</a>

                                            <a class="btn btn-primary"
                                                href="{{ url("admin/user/edit/{$item->id}") }}"><i class="bi bi-pencil-square"> </i></a>

                                            <a class="btn btn-danger"
                                                href="{{ url("admin/user/delete/{$item->id}") }}"><i class="bi bi-trash"></i></a>

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
