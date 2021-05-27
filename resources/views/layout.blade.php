<!DOCTYPE html>
<html lang="pt-BR">

<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <link rel="stylesheet" href="https://use.fontawesome.com/releases/v5.8.2/css/all.css" integrity="sha384-oS3vJWv+0UjzBfQzYUhtDYW+Pj2yciDJxpsK1OYPAYjqT085Qq/1cq5FLXAZQ7Ay" crossorigin="anonymous">
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.0.1/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-+0n0xVW2eSR5OomGNYDnhzAbDsOXxcvSN1TPprVMTNDbiYZCxYbOOl7+AMvyTG2x" crossorigin="anonymous">
    <title>@yield('titulo')</title>
</head>

<body>
    <header class="p-3 bg-dark text-white">
        <div class="container">
            <div class="d-flex flex-wrap align-items-center justify-content-center justify-content-lg-start">
                <ul class="nav col-12 col-lg-auto me-lg-auto mb-2 justify-content-center mb-md-0">
                    <li><a href="/contatos" class="d-flex align-items-center mb-2 mb-lg-0 text-white text-decoration-none">Home</a></li>
                </ul>
                <div class="text-end">
                    @guest
                    <a href="/entrar" class="btn btn-outline-light me-2">Entrar</a>
                    @endguest
                    @auth
                    <a href="/sair" class="btn btn-danger">Sair</a>
                    @endauth
                </div>
            </div>
        </div>
    </header>

    <div class="container">
        <div class="jumbotron">
            <h1 class="display-4"> @yield('cabecalho') </h1>
        </div>
        @yield('conteudo')
    </div>

    <script type="text/javascript" src="//code.jquery.com/jquery-2.2.4.min.js"></script>
    <script type="text/javascript" src="//assets.locaweb.com.br/locastyle/2.0.6/javascripts/locastyle.js"></script>
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.0.1/dist/js/bootstrap.bundle.min.js" integrity="sha384-gtEjrD/SeCtmISkJkNUaaKMoLD0//ElJ19smozuHV6z3Iehds+3Ulb9Bn9Plx0x4" crossorigin="anonymous"></script>
</body>

</html>