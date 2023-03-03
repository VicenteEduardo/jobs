@extends('layouts.merge.site')
@section('titulo', 'Contactos')
@section('content')

    <main id="main">


        <!-- ======= Contact Section ======= -->
        <div id="contact" class="contact-area" style="margin: 150px auto 0px auto !important;">
            <div class="contact-inner area-padding">
                <div class="contact-overly"></div>
                <div class="container ">
                    <div class="row">
                        <div class="col-md-12 col-sm-12 col-xs-12">
                            <div class="section-headline text-center">
                                <h2>Contacte-nos</h2>
                            </div>
                        </div>
                    </div>
                    <div class="row">
                        <!-- Start contact icon column -->
                        <div class="col-md-4 col-sm-4 col-xs-12">
                            <div class="contact-icon text-center">
                                <div class="single-icon">
                                    <i class="fa fa-mobile"></i>
                                    <p>
                                        Telefone:<br> {{ $configuration->telefone }}<br>
                                    </p>
                                </div>
                            </div>
                        </div>
                        <!-- Start contact icon column -->
                        <div class="col-md-4 col-sm-4 col-xs-12">
                            <div class="contact-icon text-center">
                                <div class="single-icon">
                                    <i class="fa fa-envelope-o"></i>
                                    <p>
                                        Email: <br> {{ $configuration->email }}<br>
                                    </p>
                                </div>
                            </div>
                        </div>
                        <!-- Start contact icon column -->
                        <div class="col-md-4 col-sm-4 col-xs-12">
                            <div class="contact-icon text-center">
                                <div class="single-icon">
                                    <i class="fa fa-map-marker"></i>
                                    <p>
                                        Localização: <br> {{ $configuration->adress }}
                                    </p>
                                </div>
                            </div>
                        </div>
                    </div>
                    <div class="row">

                        <!-- Start Google Map -->
                        <div class="col-md-6 col-sm-6 col-xs-12">
                            <!-- Start Map -->
                            <iframe
                                src="https://www.google.com/maps/embed?pb=!1m18!1m12!1m3!1d3942.630017221284!2d13.225282914785135!3d-8.820784693665475!2m3!1f0!2f0!3f0!3m2!1i1024!2i768!4f13.1!3m3!1m2!1s0x1a51f35c55658fe5%3A0x44e62b394337ff60!2sProcuradoria%20Geral%20da%20Rep%C3%BAblica!5e0!3m2!1spt-PT!2sao!4v1601545530612!5m2!1spt-PT!2sao"
                                width="100%" height="380" frameborder="0" style="border:0;" allowfullscreen=""
                                aria-hidden="false" tabindex="0"></iframe>
                            <!-- End Map -->
                        </div>
                        <!-- End Google Map -->

                        <!-- Start  contact -->
                        <div class="col-md-6 col-sm-6 col-xs-12">
                            <div class="form contact-form">
                                @if ($errors->any())
                                    <div class="alert alert-danger">
                                        <ul>
                                            @foreach ($errors->all() as $error)
                                                <li>{{ $error }}</li>
                                            @endforeach
                                        </ul>
                                    </div>
                                @endif

				<form action="{{ route('send.email') }}" class="contact100-form validate-form" method="post">
                    @csrf
                       @if(session()->has('message'))
                        <div class="alert alert-success">
                            {{ session()->get('message') }}
                        </div>
                    @endif
                                    <div class="form-group">
                                        <input type="text" name="name" placeholder="Name" class="form-control" id="name"
                                            placeholder="Nome Completo" data-rule="minlen:4"
                                            data-msg="Insira pelo menos 4 caracteres" />
                                        <div class="validate"></div>
                                    </div>
                                    <div class="form-group">
                                        <input type="email" class="form-control" name="email" placeholder="Email" id="email"
                                       data-rule="email"
                                            data-msg="Por favor digite um email válido" />
                                        <div class="validate"></div>
                                    </div>
                                    <div class="form-group">
                                        <input type="text" class="form-control" name="subject" placeholder="subject" id="subject"
                                            placeholder="Assunto" data-rule="minlen:4"
                                            data-msg="Insira pelo menos 8 caracteres do assunto" />
                                            @error('subject')
                                       <span class="text-danger"> {{ $message }} </span>
                                            @enderror
                                        <div class="validate"></div>
                                    </div>
                                    <div class="form-group">
                                        <textarea class="form-control" name="content" rows="5" data-rule="required"
                                            data-msg="Por favor escreva algo para nós" placeholder="Mensagem"></textarea>
                                        <div class="validate"></div>
                                    </div>
                                    <div class="text-center">

                                        <button
                                        style="border-color: #800000 !important; background-color: #800000 !important;"
                                        class="btn btn-primary" id="btn-submit">Enviar</button>

                                    </div>
                                </form>
                            </div>
                        </div>
                        <!-- End Left contact -->
                    </div>
                </div>
            </div>
        </div>

        <style>
            .button {
                background-color: #4CAF50; /* Green */
                border: none;
                color: white;
                padding: 16px 32px;
                text-align: center;
                text-decoration: none;
                display: inline-block;
                font-size: 16px;
                margin: 4px 2px;
                -webkit-transition-duration: 0.4s; /* Safari */
                transition-duration: 0.4s;
                cursor: pointer;
            }



            .button3 {
                background-color: white;
                color: black;
                border: 2px solid #f44336;
            }

            .button3:hover {
                background-color: #f44336;
                color: white;
            }



            }
            </style>
    </main>

@endsection
