@extends('layouts.merge.site')
@section('titulo', 'Oficial')
@section('content')
    <!-- ======= APRESENTAÇÃO ======= -->
    <section id="hero" class="hero d-flex align-items-center">

        <div class="container">
            <div class="row">
                <div class="col-lg-6 d-flex flex-column justify-content-center">
                    <h1 data-aos="fade-up">Nós oferecemos soluções modernas para automatizar a sua procura por empregos!</h1>
                    <h2 data-aos="fade-up" data-aos-delay="400">Navegue e encontre um emprego para si</h2>
                    <div data-aos="fade-up" data-aos-delay="600">
                        <div class="text-center text-lg-start">
                            <a href="#sobre"
                                class="btn-get-started scrollto d-inline-flex align-items-center justify-content-center align-self-center">
                                <span>Navegar</span>
                                <i class="bi bi-arrow-right"></i>
                            </a>
                        </div>
                    </div>
                </div>
                <div class="col-lg-6 hero-img" data-aos="zoom-out" data-aos-delay="200">
                    <img src="site/assets/img/hero.png" class="img-fluid" alt="">
                </div>
            </div>
        </div>

    </section><!-- FIM DA APRESENTAÇÃO -->

    <main id="main">
        <!-- ======= SOBRE ======= -->
        <section id="sobre" class="about">

            <div class="container" data-aos="fade-up">
                <div class="row gx-0">

                    <div class="col-lg-6 d-flex flex-column justify-content-center" data-aos="fade-up" data-aos-delay="200">
                        <div class="content">
                            <h3>Objectivos</h3>
                            <h2>Esta plataforma ajuda a simplificar a procura de emprego e a automatizar o processo de
                                candidaturas.</h2>
                            <p>
                                Qualquer usuário torna-se candidato de uma vaga se a sua especialidade for igual a
                                especialidade da vaga publicada.
                            </p>
                            <div class="text-center text-lg-start">
                                <a href="sobre.html"
                                    class="btn-read-more d-inline-flex align-items-center justify-content-center align-self-center">
                                    <span>Ler mais</span>
                                    <i class="bi bi-arrow-right"></i>
                                </a>
                            </div>
                        </div>
                    </div>

                    <div class="col-lg-6 d-flex align-items-center" data-aos="zoom-out" data-aos-delay="200">
                        <img src="site/assets/img/sobre-1.jpg" class="img-fluid" alt="">
                    </div>

                </div>
            </div>

        </section><!-- FIM DO SOBRE -->

        <!-- ======= FUNCIONLIDADES ======= -->
        <section id="funcao" class="features">

            <div class="container" data-aos="fade-up">

                <header class="section-header">
                    <h2>FUNCIONALIDADES DO SISTEMA</h2>
                    <p>Esta plataforma permite</p>
                </header>

                <div class="row">

                    <div class="col-lg-6">
                        <img src="site/assets/img/funcionalidades.png" class="img-fluid" alt="">
                    </div>

                    <div class="col-lg-6 mt-5 mt-lg-0 d-flex">
                        <div class="row align-self-center gy-4">

                            <div class="col-md-6" data-aos="zoom-out" data-aos-delay="200">
                                <div class="feature-box d-flex align-items-center">
                                    <i class="bi bi-person-plus"></i>
                                    <h3>Criar conta</h3>
                                </div>
                            </div>

                            <div class="col-md-6" data-aos="zoom-out" data-aos-delay="300">
                                <div class="feature-box d-flex align-items-center">
                                    <i class="bi bi-gear"></i>
                                    <h3>Gerir conta</h3>
                                </div>
                            </div>

                            <div class="col-md-6" data-aos="zoom-out" data-aos-delay="400">
                                <div class="feature-box d-flex align-items-center">
                                    <i class="bi bi-send-plus"></i>
                                    <h3>Publicar vagas</h3>
                                </div>
                            </div>

                            <div class="col-md-6" data-aos="zoom-out" data-aos-delay="500">
                                <div class="feature-box d-flex align-items-center">
                                    <i class="bi bi-tools"></i>
                                    <h3>Gerir vagas</h3>
                                </div>
                            </div>

                            <div class="col-md-6" data-aos="zoom-out" data-aos-delay="700">
                                <div class="feature-box d-flex align-items-center">
                                    <i class="bi bi-eye"></i>
                                    <h3>Visualizar vagas/empresa</h3>
                                </div>
                            </div>

                            <div class="col-md-6" data-aos="zoom-out" data-aos-delay="800">
                                <div class="feature-box d-flex align-items-center">
                                    <i class="bi bi-file-person"></i>
                                    <h3>Inscrever-se às vagas</h3>
                                </div>
                            </div>

                            <div class="col-md-6" data-aos="zoom-out" data-aos-delay="900">
                                <div class="feature-box d-flex align-items-center">
                                    <i class="bi bi-person-x"></i>
                                    <h3>Cancelar inscrição</h3>
                                </div>
                            </div>

                        </div>
                    </div>

                </div> <!-- / row -->

            </div>

        </section><!-- FIM FUNCIONLIDADES -->

        <!-- ======= VAGAS DISPONÍVEIS  ======= -->
        <section class="info-box py-0">
            <div class="container-fluid">

                <div class="row">

                    <div class="col-lg-7 d-flex flex-column justify-content-center align-items-stretch  order-2 order-lg-1">

                        <div class="content">
                            <h2>Vagas</h2>
                            <p>Vagas adicionadas recentemente</p>
                        </div>
                        <br>
                        <div class="accordion-list">
                            <ul>
                                @foreach ($vagasRecentes as $item)
                                    <li>
                                        <a data-bs-toggle="collapse" class="collapse"
                                            data-bs-target="#accordion-list-1">{{ $item->tituloEmprego }}
                                            <i class="bi bi-chevron-down icon-show"></i><i
                                                class="bi bi-chevron-up icon-close"></i>
                                        </a>
                                        <div id="accordion-list-1" class="collapse show" data-bs-parent=".accordion-list">
                                            <p>
                                                <strong>Nº de vagas: </strong>{{ $item->tempoVaga }} <br>
                                                <strong>Disponível até:</strong>{{ date('d/m/y', strtotime($item->dataVaga)) }}<br>
                                                <strong>Empresa:</strong> {{ $item->nomeEmresa }} <br>
                                            </p>

                                        </div>
                                    </li>
                                @endforeach

                            </ul>
                            <p class="text-center"><a href="{{ route('site.vagas') }}">Ver mais</a></p>
                        </div>

                    </div>

                    <div class="col-lg-5 d-none d-md-block align-items-stretch order-1 order-lg-2 img"
                        style="background-image: url(site/assets/img/vagas.png);">&nbsp;</div>
                </div>

            </div>
        </section><!-- FIM DAS VAGAS DISPONÍVEIS  -->

        <!-- ======= EMPRESAS CADASTRADAS ======= -->
        <section id="testimonials" class="testimonials">

            <div class="container" data-aos="fade-up">

                <header class="section-header">
                    <h2>Empresas</h2>
                    <p>Empresas Cadastradas</p>
                </header>

                <div class="testimonials-slider swiper" data-aos="fade-up" data-aos-delay="200">
                    <div class="swiper-wrapper">


                        @foreach ($empresas as $item)
                            <div class="swiper-slide">
                                <div class="testimonial-item">
                                    <div class="card-icon">
                                        <a href="#"><i class="bi bi-info-circle-fill"></i></a>
                                    </div>
                                    <div class="profile">
                                        <img src="/storage/{{ $item->imagem }}" class="testimonial-img" alt="">
                                        <h3>{{ $item->nomeEmpresa }}</h3>
                                        <h4></h4>
                                    </div>
                                    <div class="text-lg-center text-md-center text-sm-center">
                                        <p><strong>Email: </strong>{{ $item->email }}<br>
                                            <strong>Telefone: </strong>{{ $item->telefone }}
                                        </p>
                                    </div>
                                </div>
                            </div><!-- End testimonial item -->
                        @endforeach


                    </div>
                    <div class="swiper-pagination"></div>
                </div>

            </div>

        </section><!-- FIM DAS EMPRESAS CADASTRADAS -->

        <!-- ======= CONTADORES ======= -->
        <section id="counts" class="counts">
            <div class="container" data-aos="fade-up">

                <div class="row gy-4">

                    <div class="col-lg-4 col-md-6">
                        <div class="count-box">
                            <i class="bi bi-people" style="color: #4154f1;"></i>
                            <div>
                                <span data-purecounter-start="0" data-purecounter-end="{{ $UsuarioCadastrada }}"
                                    data-purecounter-duration="1" class="purecounter"></span>
                                <p>Pessoas Inscritos</p>
                            </div>
                        </div>
                    </div>

                    <div class="col-lg-4 col-md-6">
                        <div class="count-box">
                            <i class="bi bi-building" style="color: #15be56;"></i>
                            <div>
                                <span data-purecounter-start="0" data-purecounter-end="{{ $empresaCadastrada }}"
                                    data-purecounter-duration="1" class="purecounter"></span>
                                <p>Empresas Cadastradas</p>
                            </div>
                        </div>
                    </div>

                    <div class="col-lg-4 col-md-6">
                        <div class="count-box">
                            <i class="bi bi-door-open" style="color: #ff771d;"></i>
                            <div>
                                <span data-purecounter-start="0" data-purecounter-end="{{ $vagas }}"
                                    data-purecounter-duration="1" class="purecounter"></span>
                                <p>Vagas Disponíveis</p>
                            </div>
                        </div>
                    </div>

                </div>

            </div>
        </section><!-- FIM DOS CONTADORES -->

        <!-- ======= CONTACTOS ======= -->
        <section id="contact" class="contact">
            <div class="container" data-aos="fade-up">
                <header class="section-header">
                    <h2>Contactos</h2>
                    <p>Deixe o seu comentário</p>
                </header>

                <div class="row gy-4">

                    <div class="col-lg-6">

                        <div class="row gy-4">

                            <div class="col-md-6" data-aos="fade-right" data-aos-delay="600">
                                <div class="info-box">
                                    <i class="bi bi-geo-alt"></i>
                                    <h3>Endereço</h3>
                                    <p>Bairro Tala Hady<br>Cazenga, Luanda</p>
                                </div>
                            </div>
                            <div class="col-md-6" data-aos="fade-left" data-aos-delay="200">
                                <div class="info-box">
                                    <i class="bi bi-telephone"></i>
                                    <h3>Telefone</h3>
                                    <p>example@gmail.com<br>example@gmail.com</p>
                                </div>
                            </div>
                            <div class="col-md-6" data-aos="fade-right" data-aos-delay="600">
                                <div class="info-box">
                                    <i class="bi bi-envelope"></i>
                                    <h3>Email</h3>
                                    <p>example@gmail.com<br>example@gmail.com</p>
                                </div>
                            </div>
                            <div class="col-md-6" data-aos="fade-left" data-aos-delay="200">
                                <div class="info-box">
                                    <i class="bi bi-whatsapp"></i>
                                    <h3>Whatsapp</h3>
                                    <p>+244 xxx xxx xx<br>+244 xxx xxx xx</p>
                                </div>
                            </div>
                        </div>

                    </div>

                    <div class="col-lg-6">
                        <form action="" method="post" class="php-email-form">
                            <div class="row gy-4">

                                <div class="col-md-12">
                                    <input type="text" name="nome" class="form-control" placeholder="Nome"
                                        required>
                                </div>

                                <div class="col-md-12 ">
                                    <input type="email" name="email" class="form-control" placeholder="Email"
                                        required>
                                </div>

                                <div class="col-md-12">
                                    <textarea class="form-control" name="mensagem" rows="6" placeholder="Mensagem" maxlength="100"
                                        type="text" required></textarea>
                                </div>

                                <div class="col-md-12 text-center">
                                    <div class="loading">Aguarde...</div>
                                    <div class="error-message"></div>
                                    <div class="sent-message">Sua mensagem foi enviada. Obrigado!</div>
                                    <button type="submit"><i class="bi bi-send"></i> Enviar</button>
                                </div>

                            </div>
                        </form>

                    </div>

                </div>

            </div>

        </section><!-- FIM DOS CONTACTOS -->

    </main>
@endsection
