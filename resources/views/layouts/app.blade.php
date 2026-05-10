<!doctype html>
<html lang="es">
<head>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <title>@yield('title', config('app.name'))</title>
    <link rel="icon" type="image/svg+xml" href="{{ asset('img/logo.svg') }}">

    {{-- Google Fonts --}}
    <link rel="preconnect" href="https://fonts.googleapis.com">
    <link rel="preconnect" href="https://fonts.gstatic.com" crossorigin>
    <link href="https://fonts.googleapis.com/css2?family=Cinzel:wght@500;700&family=Inter:wght@400;600&display=swap" rel="stylesheet">

    {{-- Bootstrap 5 desde CDN --}}
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.2/dist/css/bootstrap.min.css" rel="stylesheet">
    <link href="https://cdn.jsdelivr.net/npm/bootstrap-icons@1.11.1/font/bootstrap-icons.css" rel="stylesheet">

    {{-- CSS propio --}}
    <link href="{{ asset('css/custom.css') }}" rel="stylesheet">
    @stack('styles')
</head>
<body class="d-flex flex-column min-vh-100 bg-dark text-white">

    <nav class="navbar navbar-expand-lg navbar-dark bg-primary shadow-sm sticky-top">
        <div class="container">
            <a class="navbar-brand d-flex align-items-center" href="{{ url('/') }}">
                <img src="{{ asset('img/logo.svg') }}" alt="Logo" width="45" height="45" class="me-2">
                <span style="font-family: 'Cinzel', serif;">AMATIST <span class="text-info">TCG</span></span>
            </a>

            <button class="navbar-toggler" data-bs-toggle="collapse" data-bs-target="#nav">
                <span class="navbar-toggler-icon"></span>
            </button>
            
            <div class="collapse navbar-collapse" id="nav">
                <ul class="navbar-nav ms-auto align-items-center">
                    {{-- Idiomas --}}
                    <li class="nav-item d-flex me-3">
                        <a class="nav-link px-1 {{ app()->getLocale() == 'es' ? 'fw-bold text-info' : '' }}" href="{{ url('/lang/es') }}">ES</a>
                        <span class="nav-link px-0">|</span>
                        <a class="nav-link px-1 {{ app()->getLocale() == 'en' ? 'fw-bold text-info' : '' }}" href="{{ url('/lang/en') }}">EN</a>
                    </li>

                    <li class="nav-item">
                        <a class="nav-link" href="{{ url('/catalogo') }}">
                            <i class="bi bi-grid me-1"></i>{{ __('messages.catalog') }}
                        </a>
                    </li>

                    @guest
                        <li class="nav-item">
                            <a class="nav-link" href="{{ route('login') }}">{{ __('messages.login') }}</a>
                        </li>
                        <li class="nav-item">
                            <a class="btn btn-outline-info ms-lg-2" href="{{ route('register') }}">{{ __('messages.register') }}</a>
                        </li>
                    @endguest

                    @auth
                        {{-- MENÚ DESPLEGABLE DE USUARIO --}}
                        <li class="nav-item dropdown ms-lg-3">
                            <a class="nav-link dropdown-toggle d-flex align-items-center" href="#" id="userDropdown" role="button" data-bs-toggle="dropdown" aria-expanded="false">
                                @if(auth()->user()->avatar)
                                    <img src="{{ asset('img/avatars/' . auth()->user()->avatar) }}" alt="Avatar" width="30" height="30" class="rounded-circle me-2 border border-info shadow-sm">
                                @else
                                    <i class="bi bi-person-circle me-2 fs-5"></i>
                                @endif
                                <span>{{ auth()->user()->name }}</span>
                            </a>
                            <ul class="dropdown-menu dropdown-menu-end dropdown-menu-dark shadow" aria-labelledby="userDropdown">
                                <li>
                                    <a class="dropdown-item" href="{{ route('profile.edit') }}">
                                        <i class="bi bi-person-gear me-2"></i>Mi Perfil
                                    </a>
                                </li>
                                {{-- NUEVO: Mis Favoritos --}}
                                <li>
                                    <a class="dropdown-item" href="{{ route('favorites.index') }}">
                                        <i class="bi bi-heart-fill me-2 text-danger"></i>Mis Favoritos
                                    </a>
                                </li>
                                <li>
                                    <a class="dropdown-item" href="{{ url('/mis-pedidos') }}">
                                        <i class="bi bi-box-seam me-2"></i>{{ __('messages.orders') }}
                                    </a>
                                </li>

                                @if(auth()->user()->role === 'admin')
                                    <li><hr class="dropdown-divider"></li>
                                    <li><h6 class="dropdown-header text-info">Administración</h6></li>
                                    <li>
                                        <a class="dropdown-item" href="{{ url('/admin') }}">
                                            <i class="bi bi-shield-lock me-2"></i>{{ __('messages.admin') }}
                                        </a>
                                    </li>
                                    <li>
                                        <a class="dropdown-item" href="{{ route('admin.products.index') }}">
                                            <i class="bi bi-card-list me-2"></i>{{ __('messages.products') }}
                                        </a>
                                    </li>
                                    {{-- NUEVO: Ranking de Favoritos para Admin --}}
                                    <li>
                                        <a class="dropdown-item" href="{{ route('admin.favorites.stats') }}">
                                            <i class="bi bi-graph-up-arrow me-2 text-warning"></i>Ranking Favoritos
                                        </a>
                                    </li>
                                @endif

                                <li><hr class="dropdown-divider"></li>
                                <li>
                                    <form method="POST" action="{{ route('logout') }}">
                                        @csrf
                                        <button type="submit" class="dropdown-item text-danger">
                                            <i class="bi bi-box-arrow-right me-2"></i>{{ __('messages.logout') }}
                                        </button>
                                    </form>
                                </li>
                            </ul>
                        </li>
                    @endauth
                </ul>
            </div>
        </div>
    </nav>

    <main class="container py-4 flex-grow-1">
        @yield('content')
    </main>

    <footer class="bg-dark text-light py-4 mt-auto border-top border-secondary">
        <div class="container text-center">
            <div class="mb-2">
                <img src="{{ asset('img/logo.svg') }}" alt="Logo" width="30" height="30" class="opacity-75">
            </div>
            <div class="small opacity-75">
                © {{ date('Y') }} <span style="font-family: 'Cinzel', serif;">{{ config('app.name') }}</span> · El poder está en tus manos
            </div>
        </div>
    </footer>

    {{-- JS de Bootstrap --}}
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.2/dist/js/bootstrap.bundle.min.js"></script>
    @stack('scripts')

</body>
</html>