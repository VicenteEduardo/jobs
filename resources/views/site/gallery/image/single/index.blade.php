@extends('layouts.merge.site')
@section('titulo', ' Galeria')
@section('content')

    <!-- ====== Banner Start ====== -->
    <section class="ud-page-banner">
        <div class="container">
            <div class="row">
                <div class="col-lg-12">
                    <div class="ud-banner-content">
                        <a href="{{ route('site.gallery') }}">
                            <h1>Galeria de Imagens</h1>
                        </a>
                    </div>
                </div>
            </div>
        </div>
    </section>
    <!-- ====== Banner End ====== -->

    <!-- ====== gallery Start ====== -->
    <section class="ud-blog-grids" style="margin-top:-70px;">
        <div class="container">
            <div class="col-lg-12" style="margin-bottom: 20px;">
                <h3 class="text-dark">{{ $gallery->name }}</h3>
            </div>
            <div class="row">

                @foreach ($gallery->images as $item)

                    <div class="col-lg-4 col-md-6">
                        <div class="ud-single-blog">
                            <div class="ud-blog-image ud-blog-image-single-gallery">
                                <a class="fancybox" href="/storage/{{ $item->path }}" data-fancybox="gallery1">
                                    <div class="card-img-top img-fluid rounded"
                                        style='background-image:url("/storage/{{ $item->path }}");background-position:center;background-size:cover;height:200px;'>
                                    </div>

                                </a>

                            </div>
                            <div class="ud-blog-content">
                                <h3 class="ud-blog-title">
                                    <a href="/storage/{{ $item->cover }}">{{ $item->name }}
                                    </a>
                                </h3>
                            </div>
                        </div>
                    </div>
                @endforeach

            </div>

        </div>
    </section>
    <!-- ====== gallery End ====== -->



@endsection
@section('CSSJS')

    {{-- FancyBox to make ImageGallery --}}
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/fancybox/3.5.7/jquery.fancybox.css" />
    {{-- FancyBox to make ImageGallery --}}
    <script src="https://ajax.googleapis.com/ajax/libs/jquery/3.5.1/jquery.min.js"></script>
    <script src="https://cdnjs.cloudflare.com/ajax/libs/fancybox/3.5.7/jquery.fancybox.min.js"></script>

@endsection
