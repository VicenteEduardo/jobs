@extends('layouts.merge.dashboard')
@section('titulo', 'Registro de Actividades')
@section('content')

    <div class="pagetitle">
        <h1>Dashboard</h1>
        <nav>
            <ol class="breadcrumb">
                <li class="breadcrumb-item"><a href="{{ route('admin.home') }}">Home</a></li>
                <li class="breadcrumb-item active">Registro de Actividades</li>
            </ol>
        </nav>
    </div><!-- End Page Title -->



    <section class="section dashboard">
        <div class="row">
            <!-- Left side columns -->
            <div class="col-lg-12">
                <div class="row">

                    <!-- Recent Sales -->
                    <div class="col-12">
                        <div class="card recent-sales overflow-auto">

                            <div class="card-body">
                                <h5 class="card-title">Registro de Actividades</h5>


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
                    </div><!-- End Recent Sales -->

                </div>
            </div><!-- End Left side columns -->
        </div>
    </section>




@endsection
