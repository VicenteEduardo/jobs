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
                                    <h5 class="card-title">Minhas empresas cadastradas</h5>


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
                                            <td>{{ $item->id }}</td>
                                            <td>{{ $item->nomeEmresa }} </td>
                                            <td>{{ $item->tituloEmprego }} </td>
                                            <td>{{ $item->tempoEmprego }} </td>


                                            <td>

                                            <a class="btn btn-danger"
                                                href="{{ url("admin/perfil-empresa/delete/{$item->id}") }}"><i class="bi bi-trash"></i></a>




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
