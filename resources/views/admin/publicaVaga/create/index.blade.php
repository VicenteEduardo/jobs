@extends('layouts.merge.dashboard')
@section('titulo', 'Dashboard')

<div class="pagetitle">
    <h1>Dashboard</h1>
    <nav>
        <ol class="breadcrumb">
            <li class="breadcrumb-item"><a href="#">Home</a></li>
            <li class="breadcrumb-item active">Vagas</li>
            <li class="breadcrumb-item active">Publicar</li>
        </ol>
    </nav>
</div><!-- End Page Title -->

<section class="section register d-flex flex-column align-items-center justify-content-center">
    <div class="container">
        <div class="row justify-content-center">
            <div class="col-lg-8 col-md-6 d-flex flex-column align-items-center justify-content-center">
                <div class="card mb-3">

                    <div class="card-body">
                        <div class="pt-4 pb-2">
                            <h5 class="card-title text-center pb-0 fs-4 fw-bold">Publicar Vaga</h5>
                            <p class="text-center small">Enter your personal details to create account</p>
                        </div>


                            <form class="row g-3" method="POST" action="{{ route('admin.publicarVagas.store') }}"
                            enctype="multipart/form-data">
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
                            @include('forms._formVaga.index')

                            <div class="col-lg-12 text-center">
                                <button class="btn btn-primary" type="submit">Criar Conta</button>
                            </div>
                        </form>
                    </div>
                </div>

            </div>
        </div>
    </div>

</section>

<script src=" {{ asset('/dashboard/jquery.min') }}"></script>
<script src="https://ajax.googleapis.com/ajax/libs/jquery/3.2.1/jquery.min.js"></script>
<script>
    $(document).ready(function() {
        jQuery.support.cors = true;
        let _token = $('meta[name="csrf-token"]').attr('content');
        $('#sub_category_name').on('change', function() {
            $.ajaxSetup({
                headers: {
                    'X-CSRF-TOKEN': $('meta[name="csrf-token"]').attr('content')
                }
            });
            jQuery.support.cors = true;
            $.ajax({
                // …
                crossDomain: true,
            });
            let id = $(this).val();
            $('#sub_category').empty();
            $('#sub_category').append(`<option value="0" disabled selected>Processando...</option>`);
            $('#email').empty();
            $('#email').append(`<option value="0" disabled selected>Processando...</option>`);

            $.ajax({
                data: {
                    _token: _token
                },
                headers: {
                    'X-CSRF-TOKEN': $('meta[name="csrf-token"]').attr('content')
                },
                type: 'GET',

                crossDomain: true,
                url: 'GetSubCatAgainstMainCatEdit/' +
                    id,
                success: function(response) {
                    var response = JSON.parse(response);
                    $('#sub_category').empty();
                    $('#sub_category').append( );
                    $('#sub_category').append(
                        `<option selected value="${response['telefone']}">${response['telefone']}</option>`
                    );

                    $('#email').empty();
                    $('#email').append( );
                    $('#email').append(
                        `<option selected value="${response['email']}">${response['email']}</option>`
                    );
                }
            });
        });
    });
</script>

@section('content')
