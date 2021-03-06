<!doctype html>
<html lang="{{ str_replace('_', '-', app()->getLocale()) }}">
<head>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1">

    <!-- CSRF Token -->
    <meta name="csrf-token" content="{{ csrf_token() }}">

    <title>{{ config('app.name', 'Laravel') }}</title>
	<link href="{{ asset('css/admin.css') }}" rel="stylesheet">


    <!-- Scripts -->
    <script>
    let Laravel = {!! json_encode([
        'csrfToken' => csrf_token(),
        'apiToken' => $currentUser->api_token ?? null,
        '_BASE_URL' => URL::to('/')
    ]) !!};
    </script>
    <script src="{{ asset('js/admin.js') }}" defer></script>
    <!-- Fonts -->
    <link rel="dns-prefetch" href="//fonts.gstatic.com">
    <link href="https://fonts.googleapis.com/css?family=Nunito" rel="stylesheet">

    <!-- Styles -->
    <style>
    .card-img-top {
        width: 100%!important;
        height: 200px!important;
        object-fit: cover;
    }
    </style>
    @yield('css')
</head>
<body>
    <div id="app">

        <nav class="navbar navbar-expand-md navbar-light bg-white shadow-sm">
            <div class="container">
                <a class="navbar-brand" href="{{ url('/') }}">
                    {{ config('app.name', 'Scarsphoto') }}
                </a>
                <button class="navbar-toggler" type="button" data-toggle="collapse" data-target="#navbarSupportedContent" aria-controls="navbarSupportedContent" aria-expanded="false" aria-label="{{ __('Toggle navigation') }}">
                    <span class="navbar-toggler-icon"></span>
                </button>

                <div class="collapse navbar-collapse" id="navbarSupportedContent">
                    <!-- Left Side Of Navbar -->
                    @auth
                    <ul class="navbar-nav mr-auto">
                        <li class="nav-item">
                            <router-link :to="{ name: 'admin.galleries.index' }" class="nav-link">
                                Galleries
                            </router-link>
                        </li>
                        <li class="nav-item">
                            <router-link :to="{ name: 'admin.medias.index' }" class="nav-link">
                                Medias
                            </router-link>
                        </li>
                        <li class="nav-item">
                            <router-link :to="{ name: 'admin.contacts.index' }" class="nav-link">
                                Contatos
                            </router-link>
                        </li>
                    </ul>
                    @endauth
                    <b-nav class="navbar-nav ml-auto" pills>
                    @guest
                        <b-nav-item href="{{ route('login') }}">
                            {{ __('Login') }}
                        </b-nav-item>
                        @if (Route::has('register'))
                            <b-nav-item href="{{ route('register') }}">
                                {{ __('Register') }}
                            </b-nav-item>
                        @endif
                    @else
                        <b-nav-item-dropdown id="dropdown-1" text="{{ Auth::user()->name }}" class="m-md-2">
                            <b-dropdown-item
                                href="{{ route('logout') }}"
                                onclick="event.preventDefault();
                                document.getElementById('logout-form').submit();"
                            >
                                {{ __('Logout') }}
                                <form id="logout-form" action="{{ route('logout') }}" method="POST" style="display: none;">
                                    @csrf
                                </form>
                            </b-dropdown-item>
                        </b-nav-item-dropdown>
                    @endguest
                    </b-nav>
                </div>
            </div>
        </nav>
        <div class="container-fluid">
            <main class="py-4">
                @yield('content')
            </main>
        </div>
    </div>
    @yield('scripts')
</body>
</html>
