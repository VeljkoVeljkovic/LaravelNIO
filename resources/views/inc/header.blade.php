<!doctype html>
<html lang="{{ str_replace('_', '-', app()->getLocale()) }}">
<head>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1">

    <!-- CSRF Token -->
    <meta name="csrf-token" content="{{ csrf_token() }}">
    <script>window.Laravel = { csrfToken: '{{ csrf_token() }}' }</script>
    <title>{{ config('app.name', 'Recenzenti') }}</title>
    <meta charset="utf-8">



    <!-- Fonts -->
    <link rel="dns-prefetch" href="//fonts.gstatic.com">
    <link href="https://fonts.googleapis.com/css?family=Nunito" rel="stylesheet">
    <script src="https://cdn.jsdelivr.net/npm/vue/dist/vue.js"></script>


<!-- Styles -->
    <link href="{{ asset('css/app.css') }}" rel="stylesheet">
    <!-- <link rel="stylesheet" href="css/app.css"> -->
    <link rel="stylesheet" href="{{ URL::asset('/css/style.css') }}">
</head>
<body>
<nav class="navbar navbar-expand-md navbar-light bg-white ">
        {{--<div class="container">--}}
            <a class="navbar-brand" href="{{ url('/') }}">
                {{ config('app.name', 'Laravel') }}
            </a>
            <button class="navbar-toggler" type="button" data-toggle="collapse" data-target="#navbarSupportedContent" aria-controls="navbarSupportedContent" aria-expanded="false" aria-label="{{ __('Toggle navigation') }}">
                <span class="navbar-toggler-icon"></span>
            </button>

            <div class="collapse navbar-collapse" id="navbarSupportedContent">
                <!-- Left Side Of Navbar -->
                <ul class="navbar-nav mr-auto">


                    @if(Session::get('recenzent')['rola'] == "administrator")
                        <li class="nav-item">
                            <a class="nav-link" href="/pozivi">Poziv</a>
                        </li>
                        <li class="nav-item">
                            <a class="nav-link" href="/projekat/create">Projekat</a>
                        </li>

                        <li class="nav-item">
                            <a class="nav-link" href="/recenzentadmin">Svi recenzenti</a>
                        </li>
                        <li class="nav-item">
                            <a class="nav-link" href="/projekat">Svi projekti</a>
                        </li>
                        <li class="nav-item">
                            <a class="nav-link" href="/adminanketa">Ankete</a>
                        </li>
                    @endif
                    @if(Session::get('recenzent')['rola'] == "recenzent" && Session::get('recenzent')['stanjePrijave'] =="registrovan")
                        <li class="nav-item">
                            <a class="nav-link" href="/ocenjivanjeprojekta">Moji Projekti</a>
                        </li>
                        <li class="nav-item">
                            <a class="nav-link" href="/recenzent">Izmena Podataka</a>
                        </li>
                        <li class="nav-item">
                            <a class="nav-link" href="/recenzentanketa">Moje Ankete</a>
                        </li>
                    @endif
                </ul>

                <!-- Right Side Of Navbar -->
                <ul class="navbar-nav ml-auto">
                    <!-- Authentication Links -->
                    @guest
                    <li class="nav-item">
                        <a class="nav-link" href="{{ route('login') }}">{{ __('Login') }}</a>
                    </li>
                    @if (Route::has('register'))
                        <li class="nav-item">
                            <a class="nav-link" href="{{ route('register') }}">{{ __('Register') }}</a>
                        </li>
                    @endif
                    @else
                        <li class="nav-item dropdown">
                            <a id="navbarDropdown" class="nav-link dropdown-toggle" href="#" role="button" data-toggle="dropdown" aria-haspopup="true" aria-expanded="false" v-pre>
                                {{ Auth::user()->name }} <span class="caret"></span>
                            </a>

                            <div class="dropdown-menu dropdown-menu-right" aria-labelledby="navbarDropdown">
                                <a class="dropdown-item" href="{{ route('logout') }}"
                                   onclick="event.preventDefault();
                                                     document.getElementById('logout-form').submit();">
                                    {{ __('Logout') }}
                                </a>

                                <form id="logout-form" action="{{ route('logout') }}" method="POST" style="display: none;">
                                    @csrf
                                </form>
                            </div>
                        </li>
                        @endguest
                </ul>
            </div>
        {{--</div> --}}
    </nav>
