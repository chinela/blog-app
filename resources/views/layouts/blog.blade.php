<!doctype html>
<html lang="{{ str_replace('_', '-', app()->getLocale()) }}">
<head>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1">

    <!-- CSRF Token -->
    <meta name="csrf-token" content="{{ csrf_token() }}">

    <title>{{ config('app.name', 'Laravel') . '-' . $title }}</title>

    <!-- Scripts -->
    <script src="{{ asset('js/app.js') }}" defer></script>

    <!-- Styles -->
    <link href="{{ asset('css/app.css') }}" rel="stylesheet">
</head>
<body>
    <div id="blog-area">
        <header id="header" class=" lg:px-6 px-5 lg:py-8 py-4 border-b">
            <div class=" mx-auto">
                <nav class="navbar">
                    <div class="flex justify-between items-center">
                        <a href="{{ route('post.index') }}"><img src="{{ asset('images/logo.svg') }}" alt="Logo"></a>
                        <ul class="nav-wrapper lg:flex hidden">
                            
                        </ul>
                        <div>
                            <ul class="nav-wrapper lg:flex hidden items-center">
                                <li class="nav-item hover:text-red-500"><a href="{{ route('post.index') }}" class="nav-link px-4 active">Home</a></li>
                                @guest
                                    <li class="nav-item hover:text-red-500"><a href="{{ route('login') }}" class="nav-link px-4">Login</a></li>
                                    <li class="nav-item hover:text-red-500"><a href="{{ route('register') }}" class="nav-link px-4">Register</a></li>
                                @endguest
                                @auth
                                @if (auth()->user()->role_id != 81)
                                    <li class="nav-item hover:text-red-500"><a href="{{ route('post.user.post') }}" class="nav-link px-4">My Posts</a></li>
                                    <li class="nav-item hover:text-red-500"><a href="{{ route('post.create') }}" class="nav-link px-4">Add Post</a></li>
                                @else
                                    <li class="nav-item hover:text-red-500"><a href="{{ route('admin.dashboard') }}" class="nav-link px-4">Dashboard</a></li>
                                @endif
                                <li class="nav-item hover:text-red-500"><a href="{{ route('logout') }}" onclick="event.preventDefault(); document.getElementById('logout_form').submit();"  class="nav-link px-4">Logout</a></li>
                                <form id="logout_form" action="{{ route('logout') }}" method="POST" style="display: none;">
                                    {{ csrf_field() }}
                                </form>
                                @endauth
                            </ul>
                        </div>
                        <div id="hamburger-menu" class="lg:hidden">
                            <i class="fa fa-bars fa-2x font-thin"></i>
                        </div>
                    </div>
                </nav>
            </div>
        </header>
        <main class="py-10">
            <div class="lg:w-9/12 w-full mx-auto">
                @yield('content')
            </div>
        </main>
    </div>
    @yield('scripts')
</body>
</html>
