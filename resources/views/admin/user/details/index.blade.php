@extends('layouts.merge.dashboard')
@section('titulo', 'Lista de Utilizadores')
@section('content')

    <link href="/dashboard/public/vendor/bootstrap-select/dist/css/bootstrap-select.min.css" rel="stylesheet"
        type="text/css" />
    <link href="/dashboard/public/vendor/jquery-smartwizard/dist/css/smart_wizard.min.css" rel="stylesheet"
        type="text/css" />

    <link href="/dashboard/public/css/style.css" rel="stylesheet" type="text/css" />
    <div class="content-body">
        <!-- row -->
        <div class="card mb-2">
            <div class="card-body">
                <h2 class="h5 page-title">
                    Detalhes do Utilizador #{{ $user->name }}
                </h2>
            </div>
        </div>
        <div class="card shadow mb-4">
            <div class="card-body">

                <div class="container-fluid">
                    <div class="row justify-content-center">
                        <div class="col-12">
                            <h2 class="h3 mb-4 page-title">{{ $user->name }}</h2>
                            <div class="row mt-5 align-items-center">
                                <div class="col-md-3 text-center mb-5">
                                    <div class=" rounded-circle ml-5 bg-primary" style="height: 150px; width:150px;">
                                        <h1 class="text-white p-5 " style="font-size: 65px">{{ $user->name[0] }}</h1>
                                    </div>
                                </div>
                                <div class="col">
                                    <div class="row align-items-center">
                                        <div class="col-md-7">
                                            <h4 class="mb-1">{{ $user->email }}</h4>
                                            <p class="small mb-3">
                                                <span class="">Data de Criação:
                                                    {{ $user->created_at }}</span>
                                            </p>
                                        </div>
                                    </div>
                                    <div class="row mb-4">
                                        <div class="col-md-12">
                                            <h4 class="mb-1">
                                                <b>Nivel de Acesso:</b>


                                                @if ($user->level == 'Administrador')
                                                    Empresa
                                                @endif
                                                @if ($user->level == 'cliente')
                                                    Usuário-Normal
                                                @endif
                                                @if ($user->level != 'cliente' || $user->level != 'Administrador')
                                                    {{ $user->level }}
                                                @endif

                                            </h4>
                                        </div>
                                        {{-- <div class="col">
                                            <p class="small mb-0 text-muted">Nec Urna Suscipit Ltd</p>
                                            <p class="small mb-0 text-muted">P.O. Box 464, 5975 Eget Avenue</p>
                                            <p class="small mb-0 text-muted">(537) 315-1481</p>
                                        </div> --}}
                                    </div>
                                </div>
                            </div>



                        </div> <!-- /.col-12 -->
                    </div> <!-- .row -->
                </div> <!-- .container-fluid -->


            </div>
        </div>

    <div class="card shadow mb-4">
        <div class="col-12 pt-4">
            <h4>Registo de Actividades</h4>
        </div>
        <div class="card-body">

            <table class="table table-borderless datatable">
                <thead>
                    <tr class="text-center">
                        <th>ID</th>
                        <th>NIVEL</th>
                        <th>IP</th>

                        <th>DATA</th>
                        <th>DESCRIÇÃO</th>
                    </tr>
                </thead>
                <tbody>

                    @foreach ($logs as $item)
                        <tr >
                            <td>{{ $item->id }}</td>
                            <td>{{ $item->level }} </td>
                            <td>{{ $item->REMOTE_ADDR }} </td>

                            <td class="text-left">{{ $item->created_at }} </td>
                            <td class="text-left">{{ $item->message }} </td>
                    @endforeach
                </tbody>
            </table>
        </div>
    </div>

    </div>


    <script src="/dashboard//dashboard/public/vendor/global/global.min.js" type="text/javascript"></script>
    <script src="/dashboard//dashboard/public/vendor/bootstrap-datetimepicker/js/moment.js" type="text/javascript"></script>
    <script src="/dashboard//dashboard/public/vendor/bootstrap-datetimepicker/js/bootstrap-datetimepicker.min.js"
        type="text/javascript"></script>
    <script src="/dashboard//dashboard/public/vendor/bootstrap-select/dist/js/bootstrap-select.min.js"
        type="text/javascript"></script>
    <script src="/dashboard//dashboard/public/vendor/jquery-smartwizard/dist/js/jquery.smartWizard.js"
        type="text/javascript"></script>
    <script src="/dashboard//dashboard/public/vendor/jquery-validation/jquery.validate.min.js" type="text/javascript">
    </script>
    <script src="/dashboard//dashboard/public/js/plugins-init/jquery.validate-init.js" type="text/javascript"></script>
    <script src="/dashboard//dashboard/public/js/custom.min.js" type="text/javascript"></script>
    <script src="/dashboard//dashboard/public/js/deznav-init.js" type="text/javascript"></script>
    <!--		<script src="https://jobie.dexignzone.com/laravel/demo/js/custom.min.js" type="text/javascript"></script>
                           <script src="https://jobie.dexignzone.com/laravel/demo/js/deznav-init.js" type="text/javascript"></script> -->


@endsection
