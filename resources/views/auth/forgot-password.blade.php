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
              <li><a href="{{ route('site.home') }}">Home</a></li>
              <li>Esqueceu Sua Senha ?</li>
            </ol>
            <h2>Esqueceu Sua Senha ?</h2>

          </div>
        </section><!-- End Breadcrumbs -->

        <!-- ======= Blog Single Section ======= -->
        <section id="blog" class="blog">
          <div class="container" data-aos="fade-up">
            <div class="row justify-content-center">
              <div class="col-lg-4 entries">
                <div class="blog-comments ">
                  <div class="reply-form">
                    <h4>Recuperar Senha</h4>


                    @if ($errors->any())
                    <div class="alert alert-danger">
                        <ul>
                            <x-auth-session-status class="mb-4" :status="session('status')" />

                            <!-- Validation Errors -->
                            <x-auth-validation-errors class="mb-4" :errors="$errors" />
                        </ul>
                    </div>
                @endif
                <form method="POST" action="{{ route('password.email') }}">
                    @csrf
                    <div class="mb-4 text-sm text-gray-600">
                        {{ __('Forgot your password? No problem. Just let us know your email address and we will email you a password reset link that will allow you to choose a new one.') }}
                    </div>
                      <div class="row">
                        <div class="col-md-12 form-group">
                          <input  name="email" :value="old('email')"  type="email" class="form-control" placeholder="Digite seu Email"  required>
                        </div>

                      <p>Já tem uma conta? <a href="{{ route('login') }}">Iniciar Sessão</a> <br>

                      </p>
                      <button type="submit" class="btn btn-primary">Enviar Link</button>
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
