@extends('layouts.merge.site')
@section('titulo', ' Galerias')
@section('content')

    <!-- ====== Banner Start ====== -->
    <section class="ud-page-banner">
        <div class="container">
            <div class="row">
                <div class="col-lg-12">
                    <div class="ud-banner-content">
                        <h1>Galeria de Imagens</h1>
                    </div>
                </div>
            </div>
        </div>
    </section>
    <!-- ====== Banner End ====== -->


    <!-- ====== gallery Start ====== -->
    <section class="ud-blog-grids" style="margin-top:-70px;">
        <div class="container">
            <div class="row">

                @foreach ($galleries as $item)
                    <div class="col-lg-4 col-md-6">
                        <div class="ud-single-blog">
                            <div class="ud-blog-image">
                                <a href="{!! url('/galeria/' . urlencode($item->name)) !!}">

                                    <div class="card-img-top img-fluid rounded"
                                        style='background-image:url("/storage/{{ $item->cover }}");background-position:center;background-size:cover;height:200px;'>
                                    </div>
                                </a>
                            </div>
                            <div class="ud-blog-content" style="margin-top:-20px;">
                                <a href="{!! url('/galeria/' . urlencode($item->name)) !!}">

                                    <h5 class="text-dark">
                                        {{ $item->name }}
                                    </h5>
                                </a>
                            </div>
                        </div>
                    </div>
                @endforeach


            </div>
            <div class="row justify-content-center">
                <div class="col-md-4">
                    <h6>{{ $galleries->links() }}</h6>
                </div>
            </div>
        </div>
    </section>
    <!-- ====== gallery End ====== -->


@endsection
