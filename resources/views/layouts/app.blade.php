<!doctype html>
<html lang="{{ str_replace('_', '-', app()->getLocale()) }}">
<head>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1">

    <!-- CSRF Token -->
    <meta name="csrf-token" content="{{ csrf_token() }}">

    <title>{{ config('app.name', 'Infraestrutura') }}</title>
    <!--mb_strcut() -->
    <!-- Scripts -->
    <script src="{{ asset('js/app.js') }}" defer></script>

    <!-- Fonts -->
    <link rel="dns-prefetch" href="//fonts.gstatic.com">
    <link href="https://fonts.googleapis.com/css?family=Nunito" rel="stylesheet">

    <!-- Styles -->
    <link href="{{ asset('css/app.css') }}" rel="stylesheet">

    <style>
        /* Estilos para a barra lateral */
        .sidebar {
            margin-top: 50px;

            width: 200px;
            height: 100%;
            position: fixed;
            left: -200px; /* Começa oculta */
            top: 0;
            background-color: #f5f5f5;
            padding: 15px;
            overflow-y: auto;
            z-index: 1000;
            transition: left 0.3s; /* Transição suave ao mostrar/ocultar */
        }

        .sidebar a {
            display: block;
            margin-bottom: 10px;
            width: 150px; /* Tamanho fixo */
            height: 50px; /* Altura fixa */
            overflow: hidden;
            text-decoration: none; /* Remove sublinhado do link */
            color: #333; /* Cor do texto */
            font-weight: bold; /* Deixa o texto em negrito */
            text-align: center; /* Centraliza o texto */
            line-height: 50px; /* Centraliza verticalmente o texto */
        }

        main {
            margin-left: 20px; /* Espaço para o conteúdo */
            padding: 20px; /* Apenas para espaçamento visual */
        }

        .navbar-brand {
            margin-left: 80%;
        }

        /* Adicione no seu bloco de estilos CSS existente */
        .zabbix-image {
            /* Seus estilos específicos para a imagem do Zabbix aqui */
            border: 2px solid #007BFF; /* Exemplo de uma borda azul de 2 pixels */
            border-radius: 10px; /* Exemplo de bordas arredondadas */
            box-shadow: 0 4px 8px rgba(0, 0, 0, 0.1); /* Exemplo de sombra suave */
            /* Adicione outros estilos conforme necessário */

            /* Centraliza a imagem vertical e horizontalmente */
            margin: auto;
            display: block;

            /* Permite crescimento em ambas as direções */
            max-width: none;
        } /* Adicione no seu bloco de estilos CSS existente */
        .honeybadger-image {
            /* Seus estilos específicos para a imagem do Zabbix aqui */
            border: 2px solid #007BFF; /* Exemplo de uma borda azul de 2 pixels */
            border-radius: 10px; /* Exemplo de bordas arredondadas */
            box-shadow: 0 4px 8px rgba(0, 0, 0, 0.1); /* Exemplo de sombra suave */
            /* Adicione outros estilos conforme necessário */

            /* Centraliza a imagem vertical e horizontalmente */
            margin: auto;
            display: block;

            /* Permite crescimento em ambas as direções */
            max-width: none;
        }


        /* Estilo para o ícone de abrir/fechar a barra lateral */
        .sidebar-toggle {
            position: fixed;
            left: 10px;
            top: 10px;
            cursor: pointer;
            z-index: 1001; /* Garante que o ícone esteja acima da barra lateral */
            transition: left 0.3s; /* Transição suave ao mover o ícone */
        }
    </style>
</head>
<body>
    <div id="app">
    @auth
        <!-- Ícone para abrir/fechar a barra lateral -->
        <div class="sidebar-toggle" onclick="toggleSidebar()" id="sidebarToggle">
            <img src="https://upload.wikimedia.org/wikipedia/commons/thumb/b/b2/Hamburger_icon.svg/1200px-Hamburger_icon.svg.png" alt="Toggle Sidebar" width="40" height="40">
        </div>
        <!-- resources/views/layouts/app.blade.php -->

        <!-- Barra lateral -->
        <div class="sidebar" id="sidebar">
            <!-- Links na barra lateral -->
            <a href="{{ route('honeybadger.card') }}" target="_blank">Honeybadger</a>

            <a href="{{ route('zabbix.card') }}" target="_blank">Zabbix</a>

            <a href="https://painel.estracta.com/login" target="_blank">Painel eStracta</a>

            <a href="/reprocessamento" target="_blank">Reprocessamento</a>

        </div>
        @endauth
         <nav class="bg-white shadow-sm navbar navbar-expand-md navbar-light">
            <div class="container">


                <div class="collapse navbar-collapse" id="navbarSupportedContent">
                    <!-- Left Side Of Navbar -->
                    <!-- Centralizando o logo -->
                    <ul class="navbar-nav mx-auto">
                        <li class="nav-item">
                            <a class="navbar-brand" href="http://infraestrutura.estracta.com/home">
                            <img src="https://static.wixstatic.com/media/828151_4a59a5cc876643ecaefdecf409eac619~mv2.png/v1/fill/w_181,h_47,al_c,q_85,usm_0.66_1.00_0.01,enc_auto/Logo-Home-eStracta-276x71px_NOBIG.png" alt="Logo" width="181" height="47">
                            <div style='float:right;'>INFRAESTRUTURA</div>
                            </a>
                        </li>
                    </ul>

                    <!-- Right Side Of Navbar -->
                    <ul class="ml-auto navbar-nav">
                        <!-- Authentication Links -->
                        @guest
                            @if (Route::has('login'))
                                <li class="nav-item">
                                    <a class="nav-link" href="{{ route('login') }}">{{ __('Login') }}</a>
                                </li>
                            @endif

                            @if (Route::has('register'))
                                <li class="nav-item">
                                    <a class="nav-link" href="{{ route('register') }}">{{ __('Register') }}</a>
                                </li>
                            @endif
                        @else
                            <li class="nav-item dropdown">
                                <a id="navbarDropdown" class="nav-link dropdown-toggle" href="#" role="button" data-toggle="dropdown" aria-haspopup="true" aria-expanded="false" v-pre>
                                    {{ Auth::user()->name }}
                                </a>

                                <div class="dropdown-menu dropdown-menu-right" aria-labelledby="navbarDropdown">
                                    <a class="dropdown-item" href="{{ route('logout') }}"
                                       onclick="event.preventDefault();
                                                     document.getElementById('logout-form').submit();">
                                        {{ __('Logout') }}
                                    </a>

                                    <form id="logout-form" action="{{ route('logout') }}" method="POST" class="d-none">
                                        @csrf
                                    </form>
                                </div>
                            </li>
                        @endguest
                    </ul>
                </div>
            </div>
        </nav>

         <main class="py-4">
            @yield('content')
        </main>

    </div>

    <script>
        function toggleSidebar() {
            const sidebar = document.getElementById('sidebar');
            const sidebarToggle = document.getElementById('sidebarToggle');

            if (sidebar.style.left === '-200px') {
                sidebar.style.left = '0';
                sidebarToggle.style.left = '75px'; /* Move o ícone para a direita ao mostrar a barra lateral */
            } else {
                sidebar.style.left = '-200px';
                sidebarToggle.style.left = '10px'; /* Move o ícone de volta à posição original */
            }
        }
    </script>
</body>
</html>
