@extends('layouts.merge.site')
@section('titulo', ' Notícia')
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
                    <!-- Start single blog -->
                    <div class="col-md-8 col-sm-8 col-xs-12">
                        <div class="row">
                            <div class="col-md-12 col-sm-12 col-xs-12">
                                <!-- single-blog start -->
                                <article class="blog-post-wrapper">
                                    <div class="post-thumbnail">
                                        <img class="ImgNotice" src="/storage/{{ $news->path }}" alt="" />
                                    </div>
                                    <div class="post-information">
                                        <h2>{{ $news->title }}</h2>
                                        <div class="entry-meta">
                                            <span><i class="fa fa-clock-o"></i>Postado em:
                                                {{ date('d-M-Y', strtotime($news->date)) }}</span>
                                        </div>
                                        <div class="entry-content" style="text-align: justify;">
                                            <blockquote>
                                                <p>{{ $news->typewriter }}</p>
                                            </blockquote>
                                            {!! html_entity_decode($news->body) !!}
                                        </div>
                                    </div>
                                </article>
                            </div>
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
                                    <h4>Outras Notícias</h4>
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
                                                    <p><a href="{!! url('/noticia/' . urlencode($item->title)) !!}">
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
                            <div class="single-blog-page">
                                <!-- recent start -->
                                <div class="left-blog">
                                    <h4>Comunicados</h4>
                                    <div class="recent-post">
                                        {{-- comunicados aqui --}}
                                    </div>
                                </div>
                                <!-- recent end -->
                            </div>
                            <!-- Anúncio -->

                            <!-- End Anúncio -->
                        </div>
                    </div>
                    <!-- End Right sidebar -->
                </div>
            </div>
        </div><!-- End Blog Page -->

    </main><!-- End #main -->








@endsection
