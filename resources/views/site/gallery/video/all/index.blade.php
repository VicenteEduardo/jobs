@extends('layouts.merge.site')
@section('titulo', ' Vídeos')
@section('content')

    <section class="ud-page-banner">
        <div class="container">
            <div class="row">
                <div class="col-lg-12">
                    <div class="ud-banner-content">
                        <h1>Galeria de Vídeos </h1>
                    </div>
                </div>
            </div>
        </div>
    </section><br>


    <!-- ====== videos Start ====== -->
    <section class="ud-blog-grids" style="margin-top:-70px;">
        <div class="container">
            <div class="row">

                @foreach ($videos as $item)
                    <div class="col-lg-4 col-md-6">
                        <div class="ud-single-blog">
                            <iframe class="img-responsive img-center" width="auto" height="200" src="{{ $item->link }}"
                                frameborder="0"
                                allow="accelerometer; autoplay; encrypted-media; gyroscope; picture-in-picture"
                                allowfullscreen></iframe>

                            <div class="ud-blog-content">
                                <h5 class="ud-blog-title">{{ $item->title }}</h5>
                                <p class="ud-blog-desc">
                                    {{ $item->description }}
                                </p>
                            </div>
                        </div>
                    </div>
                @endforeach


            </div>
            <div class="row justify-content-center">
                <div class="col-md-4">
                    <h6>{{ $videos->links() }}</h6>
                </div>
            </div>
        </div>
    </section>
    <!-- ====== videos End ====== -->


@endsection
