<!DOCTYPE html>
<html lang="pt-BR">

<head>

    <meta charset="UTF-8">

    <meta name="viewport" content="width=device-width, initial-scale=1">

    <title>@yield('title', 'CRUD Vila Brasil')</title>

    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.8/dist/css/bootstrap.min.css" rel="stylesheet">

</head>

<body>

    <nav class="navbar navbar-expand-lg navbar-dark bg-dark">

        <div class="container">

            <a class="navbar-brand" href="/">
                CRUD Vila Brasil
            </a>

            <div class="navbar-nav">

                <a class="nav-link" href="{{ route('colaboradores.index') }}">
                    Colaboradores
                </a>

                <a class="nav-link" href="{{ route('organizacoes.index') }}">
                    Organizações
                </a>

            </div>

        </div>

    </nav>

    <div class="container mt-4">

        @yield('content')

    </div>


  <footer class="bg-dark text-white text-center py-2 mt-5">
    <p class="mb-0">
        Maique dos Reis Bento
    </p>

    <small>
        &copy; {{ date('Y') }} Meu Projeto Laravel.
    </small>
</footer>
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.8/dist/js/bootstrap.bundle.min.js"></script>


</body>

</html>
