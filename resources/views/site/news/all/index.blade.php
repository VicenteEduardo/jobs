@extends('layouts.merge.site')
@section('titulo', ' Notícias')
@section('content')
    <main id="main">

        <!-- ======= Blog Header ======= -->
        <div class="header-bg4 page-area">
            <div class="home-overly"></div>
            <div class="container">
                <div class="row">
                    <div class="col-md-12 col-sm-12 col-xs-12" style="height: 70vh !important;">
                        <div class="slider-content text-center">
                            <div class="header-bottom">
                                <div class="layer3 wow zoomInUp" data-wow-duration="2s" data-wow-delay="1s">
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>
        <!-- End Blog Header -->

        <!-- ======= Blog Page ======= -->
        <div class="blog-page area-padding">
            <div class="container">
                <div class="row">
                    <div class="col-md-10 col-sm-10 col-xs-10" style="margin: 0 auto !important;">
                        <div class="section-headline text-center">
                            <h2>Notícias</h2>
                        </div>
                    </div>
                </div>
                <div class="row">

                    <!-- Start single blog -->
                    <div class="col-md-8 col-sm-8 col-xs-10">
                        <div class="row">

                            @foreach ($news as $item)
                                <!-- Start Left Blog -->
                                <div class="col-md-12 col-sm-12 col-xs-12">
                                    <div class="single-blog">
                                        <div class="single-blog-img"
                                            style='background-image:url("/storage/{{ $item->path }}");background-position:center;background-size:cover;height:400px;'>
                                        </div>

                                        <div class="blog-meta">
                                            <span class="date-type">
                                                <i class="fa fa-calendar"></i>
                                                {{ date('d-m-Y', strtotime($item->date)) }}
                                            </span>
                                        </div>
                                        <div class="blog-text">
                                            <h4>
                                                <div
                                                    style="display: -webkit-box;-webkit-line-clamp: 3;-webkit-box-orient: vertical;overflow: hidden;text-overflow: ellipsis;">
                                                    {{ $item->title }}
                                                </div>
                                            </h4>
                                            <p
                                                style="display: -webkit-box;-webkit-line-clamp: 4;-webkit-box-orient: vertical;overflow: hidden;text-overflow: ellipsis;">
                                                {!! html_entity_decode(mb_substr($item->body, 0, 200, 'UTF-8')) !!}...

                                            </p>
                                        </div>
                                        <span>
                                            <a href="{!! url('/noticia/' . urlencode($item->title)) !!}" class="ready-btn">Ler Mais</a>
                                        </span>
                                    </div>
                                    <!-- Start single blog -->
                                </div>
                                <!-- End Left Blog-->

                            @endforeach

                        </div>
                    </div>
                    <!-- Right sidebar -->
                    <div class="col-lg-4 col-md-4 col-sm-4 col-xs-12">
                        <div class="page-head-blog">
                            <div class="single-blog-page">
                                <!-- search option start -->
                                <form action="#">
                                    <div class="search-option">
                                        <input type="text" placeholder="Pesquisar...">
                                        <button class="button" type="submit">
                                            <i class="fa fa-search"></i>
                                        </button>
                                    </div>
                                </form>
                                <!-- search option end -->
                            </div>
                            <div class="single-blog-page">
                                <!-- recent start -->
                                <div class="left-blog">
                                    <h4>Notícias Recentes</h4>
                                    <div class="recent-post">
                                        @foreach ($lasted as $item)
                                            <!-- start single post -->
                                            <div class="recent-single-post">
                                                <a href="{!! url('/noticia/' . urlencode($item->title)) !!}">
                                                    <div class="post-img"
                                                        style='background-image:url("/storage/{{ $item->path }}");background-position:center;background-size:cover;height:70px;'>
                                                    </div>
                                                </a>
                                                <div class="pst-content">
                                                    <p>
                                                        <a href="{!! url('/noticia/' . urlencode($item->title)) !!}">
                                                            <div
                                                                style="display: -webkit-box;-webkit-line-clamp: 2;-webkit-box-orient: vertical;overflow: hidden;text-overflow: ellipsis;">
                                                                {{ $item->title }}
                                                            </div>
                                                        </a>
                                                    </p>
                                                </div>
                                            </div>
                                            <!-- End single post -->
                                        @endforeach
                                    </div>
                                </div>
                                <!-- recent end -->
                            </div>

                            <!-- comunicado start -->
                            <div class="single-blog-page">

                                <div class="left-blog">
                                    <h4>Comunicados</h4>
                                    <div class="recent-post">

                                        <!-- start single post -->
                                        <div class="recent-single-post">

                                            <div class="pst-content">
                                                <p><a href="#">{{-- $comunicado->descricao --}}</a></p>
                                            </div>
                                        </div>
                                        <!-- End single post -->

                                    </div>
                                </div>

                            </div>
                            <!-- comunicado end -->
                        </div>
                    </div>
                    <!-- End Right sidebar -->
                </div>
            </div>
        </div><!-- End Blog Page -->

    </main><!-- End #main -->



@endsection

@section('JS')
    <script src="/site/js/HttpRequest.js"></script>
    <script src="/site/js/alert.js"></script>
@endsection
