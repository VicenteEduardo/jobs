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


                                        @include('forms._formPerfilEmpresa.index')


                                        <button type="submit"
                                            class="btn btn-primary btn-rounded mb-2 btn-center tex-center"> Salvar
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
