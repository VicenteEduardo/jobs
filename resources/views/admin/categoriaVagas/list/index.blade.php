@extends('layouts.merge.dashboard')
@section('titulo', 'Listar Categorias')
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
                <h5 class="card-title">Lista de Categorias de Vagas do Sistema</h5>
                <a href="{{ route('admin.categorias.create') }}" class="mb-3 btn btn-primary">
                  <i class="bi bi-plus-lg"></i> Cadastrar
                </a>

                <table class="table table-borderless datatable">
                  <thead>
                    <tr>
                      <th scope="col">#</th>
                      <th scope="col">Nome</th>
                      <th scope="col">Data</th>
                      <th scope="col">Opcões</th>
                    </tr>
                  </thead>
                  <tbody>
                    @foreach ($categorias as $item)
                    <tr>
                      <th scope="row">{{ $item->id }}</th>


                      <td>{{ $item->categoria }} </td>
                      <td>{{ $item->created_at }}</td>
                      <td>

                      <a class="btn btn-danger "
                      href="{{ url("admin/categorias/delete/{$item->id}") }}">
                      <i class="bi bi-trash"></i></a>
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
