<!DOCTYPE html>
<html lang="pt-BR">
<head>
    <meta charset="utf-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1">

    <title>Venda de Carros</title>
    <meta name="keywords" content="">
    <meta name="description" content="">
    <meta name="author" content="">

    <!-- CSS -->
    <link rel="stylesheet" href="{{ asset('site/css/bootstrap.min.css') }}">
    <link rel="stylesheet" href="{{ asset('site/css/style.css') }}">
    <link rel="stylesheet" href="{{ asset('site/css/responsive.css') }}">
    <link rel="stylesheet" href="{{ asset('site/css/jquery.mCustomScrollbar.min.css') }}">
    <link rel="stylesheet" href="https://netdna.bootstrapcdn.com/font-awesome/4.0.3/css/font-awesome.css">
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/4.7.0/css/font-awesome.min.css">
    <link href="https://fonts.googleapis.com/css?family=Poppins:400,500,600,700&display=swap" rel="stylesheet">

    <link rel="icon" href="{{ asset('site/images/fevicon.png') }}" type="image/gif" />
</head>

<body>
    <!-- HEADER -->
    <header class="header_section">
        <div class="container">
            <nav class="navbar navbar-expand-lg custom_nav-container">
                <button class="navbar-toggler" type="button" data-toggle="collapse"
                    data-target="#navbarSupportedContent" aria-controls="navbarSupportedContent"
                    aria-expanded="false" aria-label="Toggle navigation">
                    <span class=""> </span>
                </button>

                <div class="collapse navbar-collapse" id="navbarSupportedContent">
                    <ul class="navbar-nav">
                        <li class="nav-item {{ request()->routeIs('site.index') ? 'active' : '' }}">
                            <a class="nav-link" href="{{ route('site.index') }}">Loja</a>
                        </li>
                        <li class="nav-item {{ request()->routeIs('site.novos') ? 'active' : '' }}">
                            <a class="nav-link" href="{{ route('site.novos') }}">Novos</a>
                        </li>

                        <li class="nav-item {{ request()->routeIs('site.seminovos') ? 'active' : '' }}">
                            <a class="nav-link" href="{{ route('site.seminovos') }}">Seminovos</a>
                        </li>
                        
                        <!-- Central logo -->
                        <li class="nav-item">
                            <a class="nav-link navbar-brand" href="{{ route('site.index') }}">
                                <span><span>ML</span>car</span>
                            </a>
                        </li>

                        
                        <li class="nav-item {{ request()->routeIs('site.sobre') ? 'active' : '' }}">
                            <a class="nav-link" href="{{ route('site.sobre') }}">Sobre</a>
                        </li>
                        <li class="nav-item {{ request()->routeIs('site.contato') ? 'active' : '' }}">
                            <a class="nav-link" href="{{ route('site.contato') }}">Contato</a>
                        </li>

                        @auth
                            <li class="nav-item dropdown">
                                <a class="nav-link dropdown-toggle fw-semibold" href="#" id="userDropdown"
                                    role="button" data-bs-toggle="dropdown" aria-expanded="false">
                                    <i class="bi bi-person-circle me-1"></i> {{ Auth::user()->name }}
                                </a>

                                <ul class="dropdown-menu dropdown-menu-end" aria-labelledby="userDropdown">

                                    {{-- Perfil --}}
                                    <li><a class="dropdown-item" href="{{ route('site.perfilusu') }}">Perfil</a></li>

                                    {{-- Admin --}}
                                    @if (Auth::user()->is_admin)
                                        <li>
                                            <a class="dropdown-item text-danger fw-semibold" href="{{ route('menuadmin.index') }}">
                                                Painel Administrativo
                                            </a>
                                        </li>
                                    @endif

                                    <li><hr class="dropdown-divider"></li>

                                    {{-- Logout --}}
                                    <li>
                                        <form action="{{ route('logout') }}" method="POST">
                                            @csrf
                                            <button class="dropdown-item text-danger" type="submit">Sair</button>
                                        </form>
                                    </li>

                                </ul>
                            </li>
                        @else
                            <li class="nav-item">
                                <a class="nav-link fw-semibold" href="{{ route('login') }}">Entrar</a>
                            </li>
                        @endauth
                    </ul>
                </div>
            </nav>
        </div>
    </header>
    <!-- END HEADER -->


    <main class="py-4">
        @yield('conteudo')
    </main>

    <!-- FOOTER -->
    <footer class="footer_section">
        <div class="container text-center py-4">
            <p class="mb-0 text-light">
                © {{ date('Y') }} Oberlo | Desenvolvido por <strong>Molaia Tech</strong>
            </p>
        </div>
    </footer>

    <!-- JS -->
    <script src="https://cdn.jsdelivr.net/npm/sweetalert2@11"></script>
    <script src="{{ asset('site/js/jquery.min.js') }}"></script>
    <script src="{{ asset('site/js/popper.min.js') }}"></script>
    <script src="{{ asset('site/js/jquery.mCustomScrollbar.concat.min.js') }}"></script>
    <script src="{{ asset('site/js/custom.js') }}"></script>
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.3/dist/js/bootstrap.bundle.min.js"></script>

</body>
</html>
