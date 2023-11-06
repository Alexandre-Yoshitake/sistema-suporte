<!DOCTYPE html>
<html lang="pt-br">

<head>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <meta name="csrf-token" content="{{ csrf_token() }}">

    <title>{{ config('app.name', 'Laravel') }}</title>

    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.2/dist/css/bootstrap.min.css" rel="stylesheet"
        integrity="sha384-T3c6CoIi6uLrA9TneNEoa7RxnatzjcDSCmG1MXxSR1GAsXEV/Dwwykc2MPK8M2HN" crossorigin="anonymous">
    <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/bootstrap-icons@1.11.1/font/bootstrap-icons.css">

    <link rel="stylesheet" href="https://fonts.googleapis.com/css2?family=Nunito:wght@400;600;700&display=swap">

    <link rel="preconnect" href="https://fonts.googleapis.com">
    <link rel="preconnect" href="https://fonts.gstatic.com" crossorigin>
    <link href="https://fonts.googleapis.com/css2?family=Squada+One&display=swap" rel="stylesheet">

</head>

<body class="font-sans antialiased">
    <div class="min-h-screen bg-gray-100 d-flex">
        @if (Route::has('login'))
            @auth
                <nav class="nav flex-column bg-dark vh-100 w-auto">
                    <a class="navbar-brand text-light fs-1 p-3" style="font-family: 'Squada One'" href="/dashboard">
                        SUPORTE
                    </a>
                    <hr class="text-light">
                    <a class="nav-link text-white fs-5" href="/dashboard">
                        <i class="bi bi-menu-button-wide"></i> Dashboard
                    </a>
                    <a class="nav-link text-white fs-5" href="/chamados">
                        <i class="bi bi-window-stack"></i> Chamados
                    </a>
                    <a class="nav-link text-white fs-5" href="#">
                        <i class="bi bi-person-vcard"></i> Clientes
                    </a>
                    <a class="nav-link text-white fs-5" href="/equipe">
                        <i class="bi bi-person-workspace"></i> Equipe
                    </a>
                    <a class="nav-link text-white fs-5" href="{{ route('register') }}">
                        <i class="bi bi-person-plus"></i> Criar Usuário
                    </a>
                    <div class="fixed-bottom m-3 ms-4 d-lg-table ">
                        <a href="#" class="text-white text-decoration-none m-3" type="submit">
                            <b><i class="bi bi-person-gear"></i> {{ strstr(Auth::user()->name, ' ', true) }}</b>
                        </a>
                        <form method="POST" action="{{ route('logout') }}">
                            @csrf

                            <button type="submit" class="btn btn-outline-light col-md-12">
                                Sair
                            </button>
                        </form>
                    </div>
                </nav>
            @endauth
        @endif
        <div class="container">
            <main>
                @yield('content')
            </main>
        </div>
    </div>
</body>

</html>
