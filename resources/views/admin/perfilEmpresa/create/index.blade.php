@extends('layouts.merge.dashboard')
@section('titulo', 'Dashboard')
@section('content')

    <link href="/dashboard/public/vendor/bootstrap-select/dist/css/bootstrap-select.min.css" rel="stylesheet"
        type="text/css" />
    <link href="/dashboard/public/vendor/jquery-smartwizard/dist/css/smart_wizard.min.css" rel="stylesheet" type="text/css" />

    <div class="content-body">
        <form method="POST" action="{{ route('admin.perfilEmpresa.store') }}" enctype="multipart/form-data">
            @csrf
            <div class="container-fluid">
                <div class="row">
                    <div class="col-xl-12 col-xxl-12 col-lg-12">
                        <div class="row">
                            <div class="col-xl-12">
                                <div class="card profile-card">
                                    <div class="card-header flex-wrap border-0 pb-0">
                                        <h3 class="fs-24 text-black font-w600 mr-auto mb-2 pr-3">Cadastrar empresa</h3>


                                    </div>
                                    @if ($errors->any())
                                        <div class="alert alert-danger">
                                            <ul>
                                                @foreach ($errors->all() as $error)
                                                    <li>{{ $error }}</li>
                                                @endforeach
                                            </ul>
                                        </div>
                                    @endif
                                    <div class="card-body">

                                        <div class="mb-5">
                                            <div class="title mb-4"><span class="fs-18 text-black font-w600">Informações
                                                    da Empresa</span></div>
                                            <div class="row">
                                                <div class="col-xl-4 col-sm-6">
                                                    <div class="form-group">
                                                        <label>Foto da empresa</label>
                                                        <input name="imagem" type="file" class="form-control">
                                                    </div>
                                                </div>
                                                <div class="col-xl-4 col-sm-6">
                                                    <div class="form-group">
                                                        <label>Nome da empresa</label>
                                                        <input name="nomeEmpresa"
                                                            value="{{ isset($perfilCliente->bi) ? $perfilCliente->bi : old('nomeEmpresa') }}"
                                                            type="text" class="form-control">
                                                    </div>
                                                </div>

                                                <div class="col-xl-4 col-sm-6">
                                                    <div class="form-group">
                                                        <label>Nif</label>
                                                        <input type="text" class="form-control" name="nif"
                                                            value="{{ isset($perfilCliente->nif) ? $perfilCliente->bi : old('nif') }}">
                                                    </div>
                                                </div>
                                                <div class="col-xl-4 col-sm-6">
                                                    <div class="form-group">
                                                        <label>Localização</label>
                                                        <input name="localizacao" type="text" class="form-control"
                                                            placeholder=""
                                                            value="{{ isset($perfilCliente->localizacao) ? $perfilCliente->localizacao : old('localizacao') }}">
                                                    </div>
                                                </div>
                                                <div class="col-xl-4 col-sm-6">
                                                    <div class="form-group">
                                                        <label>Email</label>
                                                        <input name="email" type="email" class="form-control"
                                                            value="{{ isset($perfilCliente->email) ? $perfilCliente->email : old('email') }}">
                                                    </div>
                                                </div>
                                                <div class="col-xl-4 col-sm-6">
                                                    <div class="form-group">
                                                        <label>Número de Telefone</label>
                                                        <div class="input-group input-icon mb-3">
                                                            <div class="input-group-prepend">

                                                            </div>
                                                            <input name="telefone" type="text" class="form-control"
                                                                placeholder="telefone"
                                                                value="{{ isset($perfilCliente->telefone) ? $perfilCliente->telefone : old('telefone') }}">
                                                        </div>
                                                    </div>
                                                </div>
                                            </div>
                                        </div>



                                        <button type="submit" class="btn btn-primary btn-rounded mb-2 btn-center tex-center"> Salvar
                                        </button>



                                    </div>
        </form>
    </div>
    </div>
    </div>
    </div>
    </div>

    </div>
    </div>

    </div>
@endsection
