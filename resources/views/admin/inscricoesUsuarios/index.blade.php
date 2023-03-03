@extends('layouts.merge.dashboard')
@section('titulo', 'Dashboard')
@section('content')

    <link href="/dashboard/public/vendor/bootstrap-select/dist/css/bootstrap-select.min.css" rel="stylesheet"
        type="text/css" />
    <link href="/dashboard/public/vendor/jquery-smartwizard/dist/css/smart_wizard.min.css" rel="stylesheet" type="text/css" />

    <link href="/dashboard/public/css/style.css" rel="stylesheet" type="text/css" />
    <div class="content-body">
        <!-- row -->
        <div class="row">
            <div class="col-lg-12">
                <div class="card">
                    <div class="card-body row">
                        <div class="col-md-10">
                            <h5><b>Minhas inscrições de vagas </b></h5>
                        </div>
                        Total Candidaturas :{{ $total }}
                    </div>
                </div>
            </div>

            <div class="col-lg-12 grid-margin stretch-card">
                <div class="card">
                    <div class="card-body">
                        <div class="table-responsive">
                            <table id="dataTable-1" class="table table-striped table-bordered mb-3">
                                <thead class="bg-primary thead-primary">
                                    <tr class="text-center">
                                        <th>#</th>
                                        <th>Nome candidado </th>
                                        <th>Empresa</th>
                                        <th>Categoria</th>

                                        <th class="text-left">Status</th>
                                        <th class="text-left">ACÇÕES</th>
                                    </tr>
                                </thead>
                                <tbody>

                                    @foreach ($canditados as $item)
                                        <tr class="text-center text-dark">
                                            <td>{{ $item->id }}</td>
                                            <td>{{ $item->canditados->name }}</td>
                                            <td>{{ $item->empresas->nomeEmresa }} </td>
                                            <td>{{ $item->nomeCategoria }} </td>
                                            <td>{{ $item->status }} </td>

                                            <td>

                                                <div class="dropdown">
                                                    <button type="button" class="btn btn-primary light sharp"
                                                        data-toggle="dropdown">
                                                        <svg width="18px" height="18px" viewBox="0 0 24 24"
                                                            version="1.1">
                                                            <g stroke="none" stroke-width="1" fill="none"
                                                                fill-rule="evenodd">
                                                                <rect x="0" y="0" width="24"
                                                                    height="24"></rect>
                                                                <circle fill="#000000" cx="5" cy="12"
                                                                    r="2"></circle>
                                                                <circle fill="#000000" cx="12" cy="12"
                                                                    r="2"></circle>
                                                                <circle fill="#000000" cx="19" cy="12"
                                                                    r="2"></circle>
                                                            </g>
                                                        </svg>
                                                    </button>
                                                    <div class="dropdown-menu dropdown-menu-right">
                                                        <a class="dropdown-item"
                                                            href="{{ url("admin/minhas-inscricoes/delete/{$item->id}") }}">Cancelar
                                                            Incrição</a>

                                                    </div>

                                            </td>
                                        </tr>
                                    @endforeach
                                </tbody>
                            </table>
                            <div class="row justify-content-center">
                                <div class="col-md-4">
                                    <h6>{{ $canditados->links() }}</h6>
                                </div>
                            </div>
                        </div>

                    </div>
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
