<!Doctype html>
<html lang="{{ app()->getLocale() }}">
<head>
    <meta charset="utf-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <meta name="csrf-token" content="{{ csrf_token() }}">
    <meta name="robots" content="index/follow"/>
    <meta name="DC.title" content="CloudOfe"/>
    <meta name="description" content="Welcome to CloudOfe, We are a file hosting company. Put all your work in one place.">
    <meta name="keywords" content="Cloud. CloudOfe, file sharing, file hosting, access files from anywhere"/>
    <meta itemprop="name" content="CloudOfe">
    <meta itemprop="description" content="Welcome to CloudOfe, We are a file hosting company. Put all your work in one place.">
    <meta property="og:image" content=""/>
    <meta name="og:title" content="CloudOfe">
    <meta name="og:description" content="Welcome to CloudOfe, We are a file hosting company. Put all your work in one place.">
    <meta name="og:url" content="">
    <meta name="og:site_name" content="CloudOfe">
    <meta name="og:locale" content="en_US">
    <meta name="og:type" content="website">
    <title>CloudOfe</title>

    <!-- Fonts -->
    <link href="https://fonts.googleapis.com/css?family=Raleway:100,600" rel="stylesheet" type="text/css">
    <link type="text/css" rel="stylesheet" href="{{mix('css/all.css')}}">
    <link type="icon/png" href="/images/brand/logo_icon.png" rel="icon">
</head>
<body>
    <div id="app">
            <nav class="main-header navbar navbar-expand-md navbar-light navbar-laravel">
                <div class="container">
                    <a class="navbar-brand" href="{{ url('/') }}">
                        <img src="{{asset('/images/brand/logo1.png')}}" title="Cloudofe" alt="CloudOfe">
                    </a>
                    <button class="navbar-toggler" type="button" data-toggle="collapse" data-target="#navbarSupportedContent" aria-controls="navbarSupportedContent" aria-expanded="false" aria-label="Toggle navigation">
                        <span class="navbar-toggler-icon"></span>
                    </button>

                    <div class="collapse navbar-collapse" id="navbarSupportedContent">
                        <!-- Left Side Of Navbar -->
                        <ul class="navbar-nav mr-auto">

                        </ul>

                        <!-- Right Side Of Navbar -->
                        <ul class="navbar-nav ml-auto">
                            <!-- Authentication Links -->
                            @guest
                                <li><a class="nav-link" href="{{ route('login') }}">{{ __('Login') }}</a></li>
                                <li><a class="nav-link" href="{{ route('register') }}">{{ __('Register') }}</a></li>
                            @else
                                <li class="nav-item dropdown">
                                    <a id="navbarDropdown" class="nav-link dropdown-toggle" href="#" role="button" data-toggle="dropdown" aria-haspopup="true" aria-expanded="false" v-pre>
                                        {{ Auth::user()->name }} <span class="caret"></span>
                                    </a>

                                    <div class="dropdown-menu" aria-labelledby="navbarDropdown">
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
                </div>
            </nav>

        <main class="py-4 py-content">
            @yield('content')
        </main>

        <footer>
            <div class="container footer-container">
                <div class="row">
                    <div class="col-my-5">
                        <h4 class="footer-title">CloudOfe</h4>
                        <ul class="footer-list">
                            <li><a href="">Security</a></li>
                            <li><a href="">Mobile App</a></li>
                            <li><a href="">Desktop App</a></li>
                            <li><a href="">Plans</a></li>
                        </ul>
                    </div>
                    <div class="col-my-5">
                        <h4 class="footer-title">Company</h4>
                        <ul class="footer-list">
                            <li><a href="">Jobs</a></li>
                            <li><a href="">About Us</a></li>
                            <li><a href="">Blog</a></li>
                            <li><a href="">Press</a></li>
                        </ul>
                    </div>
                    <div class="col-my-5">
                        <h4 class="footer-title">Products</h4>
                        <ul class="footer-list">
                            <li><a href="">Mini</a></li>
                            <li><a href="">Midi</a></li>
                            <li><a href="">Maxi</a></li>
                            <li><a href="">Maxiplus</a></li>
                            <li><a href="">Advertise</a></li>
                        </ul>
                    </div>
                    <div class="col-my-5">
                        <h4 class="footer-title">Support</h4>
                        <ul class="footer-list">
                            <li><a href="">Privacy & Terms</a></li>
                            <li><a href="">Contact</a></li>
                            <li><a href="">Help Center</a></li>
                        </ul>
                    </div>
                    <div class="col-my-5">
                        <h4 class="footer-title">Community</h4>
                        <ul class="footer-list">
                            <li><a href="">Forum</a></li>
                            <li><a href="">Developer</a></li>
                            <li><a href="">Referals</a></li>
                        </ul>
                    </div>

                </div>
            </div>
        </footer>
    </div>
</body>
</html>
