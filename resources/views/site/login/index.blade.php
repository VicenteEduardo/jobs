@extends('layouts.merge.site')
@section('titulo', 'Login')
@section('content')
    <link href="/site/assets/css/style.css" rel="stylesheet">
    <link href="/site/assets/css/login.css" rel="stylesheet">
    <!-- ======= Introdução ======= -->

    <main id="main">

        <!-- ======= Breadcrumbs ======= -->
        <section class="breadcrumbs">
          <div class="container">

            <ol>
              <li><a href="index.html">Home</a></li>
              <li>Iniciar Sessão</li>
            </ol>
            <h2>Iniciar Sessão</h2>

          </div>
        </section><!-- End Breadcrumbs -->

        <!-- ======= Blog Single Section ======= -->
        <section id="blog" class="blog">
          <div class="container" data-aos="fade-up">
            <div class="row justify-content-center">
              <div class="col-lg-4 entries">
                <div class="blog-comments ">
                  <div class="reply-form">
                    <h4>Iniciar Sessão</h4>
                    <p>Introduza os seus dados para iniciar sessão </p>

                    @if ($errors->any())
                    <div class="alert alert-danger">
                        <ul>
                            <x-auth-session-status class="mb-4" :status="session('status')" />

                            <!-- Validation Errors -->
                            <x-auth-validation-errors class="mb-4" :errors="$errors" />
                        </ul>
                    </div>
                @endif
                    <form class="text-center" method="POST" action="{{ route('login') }}">
                        @csrf
                      <div class="row">
                        <div class="col-md-12 form-group">
                          <input name="username" :value="old('username')" type="text" class="form-control" placeholder="Usuario" minlength="4" maxlength="14" required>
                        </div>
                        <div class="col-md-12 form-group">
                          <input name="password" type="password" class="form-control" placeholder="Senha" minlength="8" maxlength="16" required>
                        </div>
                      </div>
                      <p>Não tem uma conta? <a href="{{ route('site.cadastrar') }}">Criar Conta</a> <br>
                         Esqueceu a senha? <a href="/forgot-password">Recuperar </a>
                      </p>
                      <button type="submit" class="btn btn-primary">Entrar</button>
                    </form>
                  </div>
                </div>
              </div>

              <div class="col-lg-6 d-none">
                <div class="sidebar d-none d-md-block">
                  <img src="assets/img/login.png" alt="">
                </div><!-- End sidebar -->
              </div>

            </div>
          </div>
        </section>
      </main>
@endsection
