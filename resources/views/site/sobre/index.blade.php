@extends('layouts.merge.site')
@section('titulo', 'Oficial')
@section('content')

<!-- Template Main CSS File -->
<link href="/site/site/assets/css/style.css" rel="stylesheet">
<link href="/site/site/assets/css/sobre.css" rel="stylesheet">
<link href="/site/site/assets/css/variables-sobre.css" rel="stylesheet">
<!-- ======= Introdução ======= -->



<main id="main">

    <!-- ======= Breadcrumbs ======= -->
    <section class="breadcrumbs">
      <div class="container">

        <ol>
          <li><a href="index.html">Home</a></li>
          <li>Sobre</li>
        </ol>
        <h2>Sobre o Sistema</h2>

      </div>
    </section><!-- End Breadcrumbs -->

        <!-- ======= Values Section ======= -->
    <section id="values" class="values">

      <div class="container" data-aos="fade-up">

        <header class="section-header">
          <h2>Sobre o Sistema</h2>
          <p>Objectiovos da plataforma</p>
        </header>

        <div class="row">

          <div class="col-lg-4" data-aos="fade-up" data-aos-delay="200">
            <div class="box">
              <img src="site/assets/img/values-1.png" class="img-fluid" alt="">
              <h3>Ad cupiditate sed est odio</h3>
              <p>Eum ad dolor et. Autem aut fugiat debitis voluptatem consequuntur sit. Et veritatis id.</p>
            </div>
          </div>

          <div class="col-lg-4 mt-4 mt-lg-0" data-aos="fade-up" data-aos-delay="400">
            <div class="box">
              <img src="site/assets/img/values-2.png" class="img-fluid" alt="">
              <h3>Voluptatem voluptatum alias</h3>
              <p>Repudiandae amet nihil natus in distinctio suscipit id. Doloremque ducimus ea sit non.</p>
            </div>
          </div>

          <div class="col-lg-4 mt-4 mt-lg-0" data-aos="fade-up" data-aos-delay="600">
            <div class="box">
              <img src="site/assets/img/values-3.png" class="img-fluid" alt="">
              <h3>Economizar tempo.</h3>
              <p>Com os processos automatizados a gestão é produtiva.</p>
            </div>
          </div>

        </div>

      </div>

    </section><!-- End Values Section -->


  </main><!-- End #main -->
@endsection
