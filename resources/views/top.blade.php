<!doctype html>
<html lang="{{ str_replace('_', '-', app()->getLocale()) }}">
<head>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1">

    <!-- CSRF Token -->
    <meta name="csrf-token" content="{{ csrf_token() }}">

    <title>{{ config('app.name', 'Laravel') }}</title>

    <!-- Scripts -->
    <script src="{{ asset('js/app.js') }}" defer></script>
    @yield('javascript')
    <!-- Fonts -->
    <link rel="dns-prefetch" href="//fonts.gstatic.com">
    <link href="https://fonts.googleapis.com/css?family=Nunito" rel="stylesheet">

    <!-- Styles -->
    <link rel="icon" type="image/png" href="image/icon.png">
    <link href="{{ asset('css/app.css') }}" rel="stylesheet">
    <link rel="stylesheet" href="https://pro.fontawesome.com/releases/v5.10.0/css/all.css" integrity="sha384-AYmEC3Yw5cVb3ZcuHtOA93w35dYTsvhLPVnYs9eStHfGJvOvKxVfELGroGkvsg+p" crossorigin="anonymous"/>
    <link href="/css/layout.css" rel="stylesheet">
    <link rel="stylesheet" href="{{ asset('css/test.css') }}">
</head>
<body>
    <div id="app">
        <nav class="navbar navbar-expand-md navbar-light bg-white shadow-sm">
            <div class="container">
                <a class="navbar-brand" href="{{ url('/') }}">
                    {{ config('app.name', 'Laravel') }}
                </a>
                <button class="navbar-toggler" type="button" data-bs-toggle="collapse" data-bs-target="#navbarSupportedContent" aria-controls="navbarSupportedContent" aria-expanded="false" aria-label="{{ __('Toggle navigation') }}">
                    <span class="navbar-toggler-icon"></span>
                </button>
                <div>
                    <a class="navbar-brand" href="{{ url('/test') }}"><i class="fas fa-coffee"></i> coffee checker</a>
                </div> 
                <div>
                    <a class="navbar-brand" href="{{ url('/load') }}"><i class="fas fa-clipboard"></i> coffee memo</a>
                </div> 

                <div>
                    <a class="navbar-brand" href="{{ url('/flavor') }}"><i class="fas fa-chart-pie"></i> flavor wheel</a>
                </div> 

                <div class="collapse navbar-collapse" id="navbarSupportedContent">
                    <!-- Left Side Of Navbar -->
                    <ul class="navbar-nav me-auto">

                    </ul>

                    <!-- Right Side Of Navbar -->
                    <ul class="navbar-nav ms-auto">
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
                                <a id="navbarDropdown" class="nav-link dropdown-toggle" href="#" role="button" data-bs-toggle="dropdown" aria-haspopup="true" aria-expanded="false" v-pre>
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
                <meta name="viewport" content="width=device-width,initial-scale=1.0">
                <!--==============レイアウトを制御する独自のCSSを読み込み===============-->
                <link rel="stylesheet" href="{{ asset('css/test.css') }}">
                <link rel="stylesheet" type="text/css" href="https://coco-factory.jp/ugokuweb/wp-content/themes/ugokuweb/data/reset.css">
                <link rel="stylesheet" type="text/css" href="https://coco-factory.jp/ugokuweb/wp-content/themes/ugokuweb/data/6-3-1/css/6-3-1.css">
                </head>

                <body>
                <header id="header">
                  <h1>What kind of coffee??</h1>
                    <div id="video-area">
                  <video id="video" poster="image/Coffee - top.mp4" webkit-playsinline playsinline muted autoplay loop>
                    <!--
                        poster：動画ファイルが利用できない環境で代替表示される画像
                        webkit-playsinline：iOS 9までのSafari用インライン再生指定
                        playsinline：iOS 10以降のSafari用インライン再生指定
                        muted：音声をミュートさせる
                        autoplay：動画を自動再生させる
                        loop：動画をループさせる
                        controls：コントロールバーを表示する
                    -->
                  <source src="image/Coffee - top.mp4" type="video/mp4">
                  <source src="image/Coffee - top.mp4" type="video/ogv">
                  <source src="image/Coffee - top.mp4" type="video/webm">
                  <p>動画を再生できる環境ではありません。</p>
                  </video>
                    <!--/video-area--></div>
                </header>
                <div id="container">
                <div>
                    <a class="navbar-brand top_btn" href="{{ url('/test') }}"><i class="fas fa-coffee"></i>checker</a>
                </div> 
                <div>
                    <a class="navbar-brand top_btn" href="{{ url('/home') }}"><i class="fas fa-clipboard"></i>coffee memo</a>
                </div> 
                <div>
                    <a class="navbar-brand top_btn" href="{{ url('/flavor') }}"><i class="fas fa-chart-pie"></i> flavor wheel</a>
                </div>
                <div>
                  <a class="navbar-brand top_btn" href="https://twitter.com/kohei_osaka"><i class="fab fa-twitter-square"></i>kohei</a>
                </div>
              </div>
    <script src="https://unpkg.com/sweetalert/dist/sweetalert.min.js"></script>
</body>
</html>
