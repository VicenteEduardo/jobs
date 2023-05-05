<!DOCTYPE html>
<html lang="pt-pt">

<head>
    <meta charset="UTF-8">

    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link rel="stylesheet" href="https://stackpath.bootstrapcdn.com/bootstrap/4.1.3/css/bootstrap.min.css"
        integrity="sha384-MCw98/SFnGE8fJT3GXwEOngsV7Zt27NXFoaoApmYm81iuXoPkFOJwJ8ERdknLPMO" crossorigin="anonymous">
        <link href="site/assets/vendor/aos/aos.css" rel="stylesheet">
        <link href="site/assets/vendor/bootstrap/css/bootstrap.min.css" rel="stylesheet">
        <link href="site/assets/vendor/bootstrap-icons/bootstrap-icons.css" rel="stylesheet">
        <link href="site/assets/vendor/glightbox/css/glightbox.min.css" rel="stylesheet">
        <link href="site/assets/vendor/remixicon/remixicon.css" rel="stylesheet">
        <link href="site/assets/vendor/swiper/swiper-bundle.min.css" rel="stylesheet">
        <meta http-equiv="X-UA-Compatible" content="ie=edge">

    <title>Relatório de Inscritos</title>
</head>

<body style='height:auto; width:100%;  no-repeat center;'>

    <header class="col-12 mt-2 mb-5">

        <img src="site/assets/img/empresas/itel.png" alt="logo emprego.ao" width="150">


        <p>
        <h2 class="text-center">Relatório de Inscritos </h2>


        <b>Data:</b> {{ date('d-m-Y') }}
        <br>


        </p>
    </header>

    <section class="col-12">
        <table class="table table-striped">
            <thead>
                <tr class="text-center">
                    <th>#</th>
                    <th>Nome candidado </th>
                    <th>Empresa</th>
                    <th>Categoria</th>

                    <th class="text-left">Status</th>

                </tr>
            </thead>
            <tbody>
                @foreach ($canditados as $item)
                <tr class="text-center text-dark">
                    <td>{{ $item->id }}</td>
                    <td>{{ $item->canditados->name }}</td>
                    <td>{{ $item->empresas->nomeEmresa }} </td>
                    <td>{{ $item->nomeCategoria }} </td>
                    <td>{{ $item->status }} </td>

                </tr>
            @endforeach

            </tbody>
        </table>
    </section>

</body>

</body>

</html>
