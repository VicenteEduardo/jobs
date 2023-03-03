@extends('layouts.merge.dashboard')
@section('titulo', 'Dashboard')
@section('content')

<section class="section register d-flex flex-column align-items-center justify-content-center">
    <div class="container">
      <div class="row justify-content-center">
        <div class="col-lg-12 col-md-6 d-flex flex-column align-items-center justify-content-center">
          <div class="card mb-3">
            <div class="card-body">
              <div class="pt-4 pb-2">
                <h5 class="card-title text-center pb-0 fs-4 fw-bold">Nova Categoria</h5>
              </div>
              <form method="POST" action="{{ route('admin.categorias.store') }}"  class="row g-3 needs-validation" novalidate>
          @csrf
                @if ($errors->any())
                <div class="alert alert-danger">
                    <ul>
                        @foreach ($errors->all() as $error)
                            <li>{{ $error }}</li>
                        @endforeach
                    </ul>
                </div>
            @endif
                <div class="col-lg-12">
                  <input type="text"  name="categoria" value="{{ isset($perfilCliente->bi) ? $perfilCliente->bi : old('nomeEmpresa') }}" class="form-control" id="categoria" placeholder="Nome da Categoria" required>
                  <div class="invalid-feedback">Por favor, digite o nome da categoria!</div>
                </div>
                <div class="col-lg-12 text-center py-2">
                  <button class="btn btn-primary" type="submit">Cadastrar</button>
                </div>
              </form>
            </div>
          </div>
        </div>
      </div>
    </div>
  </section>
@endsection
