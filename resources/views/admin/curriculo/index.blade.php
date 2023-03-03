<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="utf-8" />
    <meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no" />
    <meta name="description" content="" />
    <meta name="author" content="" />
    <title>Curriculo</title>
    <link rel="icon" type="image/x-icon" href="assets/img/favicon.ico" />
    <!-- Font Awesome icons (free version)-->
    <script src="https://use.fontawesome.com/releases/v5.15.4/js/all.js" crossorigin="anonymous"></script>
    <!-- Google fonts-->
    <link href="https://fonts.googleapis.com/css?family=Saira+Extra+Condensed:500,700" rel="stylesheet"
        type="text/css" />
    <link href="https://fonts.googleapis.com/css?family=Muli:400,400i,800,800i" rel="stylesheet" type="text/css" />
    <!-- Core theme CSS (includes Bootstrap)-->
    <link href="/dashboard/curriculo/css/styles.css" rel="stylesheet" />
</head>

<body id="page-top">
    <!-- Navigation-->
    <nav class="navbar navbar-expand-lg navbar-dark bg-primary fixed-top" id="sideNav">
        <a class="navbar-brand js-scroll-trigger" href="#page-top">
            <span class="d-block d-lg-none">Clarence Taylor</span>
           @if(isset($curriculo->fotoPerfil))

           @endif
            <span class="d-none d-lg-block"><img class="img-fluid img-profile rounded-circle mx-auto mb-2"
                    src="/storage/{{ $curriculo->fotoPerfil }}" alt="..." /></span>
        </a>
        <button class="navbar-toggler" type="button" data-bs-toggle="collapse" data-bs-target="#navbarResponsive"
            aria-controls="navbarResponsive" aria-expanded="false" aria-label="Toggle navigation"><span
                class="navbar-toggler-icon"></span></button>
        <div class="collapse navbar-collapse" id="navbarResponsive">
            <ul class="navbar-nav">
                <li class="nav-item"><a class="nav-link js-scroll-trigger" href="#about">Acerca</a></li>
                <li class="nav-item"><a class="nav-link js-scroll-trigger" href="#experience">Experiência </a>
                </li>
                <li class="nav-item"><a class="nav-link js-scroll-trigger" href="#education">Educação</a></li>
                <li class="nav-item"><a class="nav-link js-scroll-trigger" href="#skills">Habilidades</a></li>
                <li class="nav-item"><a class="nav-link js-scroll-trigger" href="#interests">Idiomas</a></li>
                <div class="container-fluid mt-5 d-flex justify-content-center w-100">
                    {!! QrCode::size(140)->generate(url('membro/startup/' . $curriculo->email)) !!}
                </div>
            </ul>
        </div>
    </nav>
    <!-- Page Content-->
    <div class="container-fluid p-0">
        <!-- About-->
        <section class="resume-section" id="about">
            <div class="resume-section-content">
                <h1 class="mb-0">


                    <span class="text-primary"> {{ $curriculo->nomeCliente }}</span>
                </h1>
                <div class="subheading mb-5">
                    {{ $curriculo->residencia }}
                    <a href="mailto:{{ $curriculo->email }}">{{ $curriculo->email }}</a>
                </div>
                <p class="lead mb-5">{{ $curriculo->nomeCliente }} nacionalidade
                    {{ $curriculo->nacionalidade }} nascido aos {{ $curriculo->dataNascimento }} portado do BI
                    {{ $curriculo->bi }} </p>
                <div class="social-icons">

                    <a class="social-icon" href="#!"><i class="fab fa-linkedin-in"></i></a>
                    <a class="social-icon" href="tel:{{ $curriculo->whatssap }}"><i
                            class="fab fa-whatsapp"></i></a>
                    <a class="social-icon" href="#!"><i class="fab fa-twitter"></i></a>

                    <a class="social-icon" href="#!"><i class="fab fa-facebook-f"></i></a>
                </div>
            </div>
        </section>
        <hr class="m-0" />
        <!-- Experience-->
        <section class="resume-section" id="experience">
            <div class="resume-section-content">
                <h2 class="mb-5">Experiência</h2>
                <div class="d-flex flex-column flex-md-row justify-content-between mb-5">
                    <div class="flex-grow-1">
                        <p>{{ $curriculo->explerienciaProfissional }}</p>
                    </div>

                </div>


            </div>
        </section>
        <hr class="m-0" />
        <!-- Education-->
        <section class="resume-section" id="education">
            <div class="resume-section-content">
                <h2 class="mb-5">Educação</h2>
                <div class="d-flex flex-column flex-md-row justify-content-between mb-5">
                    <p>{{ $curriculo->formacacaoProfissional }}</p>
                    <div class="flex-shrink-0"><span class="text-primary"></span></div>
                </div>

            </div>
        </section>
        <hr class="m-0" />
        <!-- Skills-->
        <section class="resume-section" id="skills">
            <div class="resume-section-content">
                <h2 class="mb-5">Habilidades</h2>


                <div class="subheading mb-3">Minhas Habilidades</div>
                <ul class="fa-ul mb-0">
                    <li>
                        <span class="fa-li"><i class="fas fa-check"></i></span>
                        {{ $curriculo->ablilitacoesLiteriais }}
                    </li>

                </ul>
            </div>
        </section>
        <hr class="m-0" />
        <!-- Interests-->
        <section class="resume-section" id="interests">
            <div class="resume-section-content">
                <h2 class="mb-5">Idiomas</h2>

                <p class="mb-0"> {{ $curriculo->idiomas }}</p>
            </div>
        </section>
        <hr class="m-0" />
        <!-- Awards-->

    </div>
    <!-- Bootstrap core JS-->
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.1.3/dist/js/bootstrap.bundle.min.js"></script>
    <!-- Core theme JS-->
    <script src="/dashboard/curriculo/js/scripts.js"></script>
</body>

</html>
