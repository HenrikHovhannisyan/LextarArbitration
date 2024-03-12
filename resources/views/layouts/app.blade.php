<!doctype html>
<html lang="{{ str_replace('_', '-', app()->getLocale()) }}">
<head>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1">

    <!-- CSRF Token -->
    <meta name="csrf-token" content="{{ csrf_token() }}">

    <title>{{ config('app.name', 'Laravel') }}</title>

    <!-- Fonts -->
    <link rel="dns-prefetch" href="//fonts.bunny.net">
    <link href="https://fonts.bunny.net/css?family=Nunito" rel="stylesheet">
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.4.2/css/all.min.css"
          crossorigin="anonymous" referrerpolicy="no-referrer"/>
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.2/dist/css/bootstrap.min.css" rel="stylesheet"
          integrity="sha384-T3c6CoIi6uLrA9TneNEoa7RxnatzjcDSCmG1MXxSR1GAsXEV/Dwwykc2MPK8M2HN" crossorigin="anonymous">
    <link rel="stylesheet" href="{{asset('/css/app.css')}}">
    <link rel="stylesheet" href="{{asset('/css/main.css')}}">

    <!-- Scripts -->
    <script src="https://ajax.googleapis.com/ajax/libs/jquery/3.7.1/jquery.min.js"></script>
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.2/dist/js/bootstrap.bundle.min.js"
            integrity="sha384-C6RzsynM9kWDrMNeT87bh95OGNyZPhcTNXj1NW7RuBCsyN/o0jlpcV8Qyq46cDfL"
            crossorigin="anonymous"></script>
    <script src="{{asset('/js/app.js')}}"></script>
    <script src="{{asset('/js/app.js')}}"></script>
</head>
<body class="bg-white">
<div id="app">
    <header>
        <div class="container">
            <nav>
                <a href="/"><div class="logo"><img src="{{asset('images/Logo.png')}}" alt="logo"></div></a>
                <div class="navbar">
                    <ul>
                        <li><a href="about-us.html">About</a></li>
                        <li class="menu_has_dropdown">
                            <a>Practice Areas</a>
                            <div class="header-dropdown">
                                <div class="main-container">
                                    <ul class="header-dropdown-menu">
                                        <li><a href="practice-areas.html">Contract Disputes</a></li>
                                        <li><a href="practice-areas.html">Employment Disputes</a></li>
                                        <li><a href="practice-areas.html">Intellectual Property Disputes</a></li>
                                        <li><a href="practice-areas.html">International Business Disputes</a></li>
                                    </ul>
                                </div>
                            </div>
                        </li>
                        <li><a href="https://wp7387.freelancedeveloper.site/rules-and-forms/">Rules & Forms</a></li>
                        <li><a href="contact-us.html">Contact</a></li>
                    </ul>
                </div>
                <ul class="nav-right-side">
{{--                    <li class="menu_has_dropdown languages">
                        <a href="">Eng</a>
                        <div class="header-dropdown languages-dropdown">
                            <div class="main-container">
                                <ul class="header-dropdown-menu">
                                    <li><a href="practice-areas.html">Eng</a></li>
                                    <li><a href="practice-areas.html">Chi</a></li>
                                </ul>
                            </div>
                        </div>
                    </li>--}}

                    @guest
                        <li class="menu_has_dropdown">
                            <a href="" class="sign-in">
                                Sign in
                            </a>
                            <div class="header-dropdown sign-in-dropdown">
                                <div class="main-container">
                                    <ul class="header-dropdown-menu">
                                        @if (Route::has('login'))
                                            <li>
                                                <a href="{{ route('login') }}">Sign in</a>
                                            </li>
                                        @endif

                                        @if (Route::has('register'))
                                            <li>
                                                <a href="{{ route('register') }}">Registrate</a>
                                            </li>
                                        @endif
                                    </ul>
                                </div>
                            </div>
                        </li>
                    @else
                        <li class="menu_has_dropdown">
                            <a href="" class="sign-in">
                                {{ Auth::user()->name }}
                            </a>
                            <div class="header-dropdown sign-in-dropdown">
                                <div class="main-container">
                                    <ul class="header-dropdown-menu">
                                        <li>
                                            <a href="{{ route('logout') }}"
                                               onclick="event.preventDefault();
                                                     document.getElementById('logout-form').submit();">
                                                {{ __('Logout') }}
                                            </a>

                                            <form id="logout-form" action="{{ route('logout') }}" method="POST" class="d-none">
                                                @csrf
                                            </form>
                                        </li>
                                    </ul>
                                </div>
                            </div>
                        </li>
                    @endguest
{{--                    <a href="file-case.html"><button class="secondary file-case-btn">File Your Case</button></a>--}}
                </ul>
            </nav>

        </div>
    </header>

    <main>
        @yield('content')
    </main>

    @extends('layouts.footer')
</div>
</body>
</html>
