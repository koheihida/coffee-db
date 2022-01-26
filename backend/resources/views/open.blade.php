<!doctype html>
<html lang="{{ str_replace('_', '-', app()->getLocale()) }}">
<head>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1">

    <link rel="shortcut icon" href="favicon.ico" type="image/vnd.microsoft.icon">

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
    <link rel="stylesheet" type="text/css" href="https://coco-factory.jp/ugokuweb/wp-content/themes/ugokuweb/data/reset.css">
    <link rel="stylesheet" type="text/css" href="https://coco-factory.jp/ugokuweb/wp-content/themes/ugokuweb/data/5-3-1/css/5-3-1.css">
    <link rel="stylesheet" type="text/css" href="css/5-1-11.css">
    <link href="https://cdnjs.cloudflare.com/ajax/libs/lightbox2/2.7.1/css/lightbox.css" rel="stylesheet">
    <script src="https://ajax.googleapis.com/ajax/libs/jquery/3.1.1/jquery.min.js"></script>
    <script src="https://cdnjs.cloudflare.com/ajax/libs/lightbox2/2.7.1/js/lightbox.min.js" type="text/javascript"></script>
</head>
</head>
<body>
    <div id="app">
        <nav class="navbar navbar-expand-md navbar-light bg-white shadow-sm">
            <div class="container">
                <div>
                    <a class="navbar-brand" href="{{ url('/') }}"><i class="fas fa-mug-hot"></i>
                    {{ config('app.name', 'Laravel') }}</a>
                </div>
                <button class="navbar-toggler top_btn" type="button" data-bs-toggle="collapse" data-bs-target="#navbarSupportedContent" aria-controls="navbarSupportedContent" aria-expanded="false" aria-label="{{ __('Toggle navigation') }}">
                    <span class="navbar-toggler-icon"></span>
                </button>

                <div class="openbtn"><span></span><span></span><span></span></div>
                    <nav id="g-nav">
                        <div id="g-nav-list">
                            <ul>
                            <li><a class="navbar-brand" href="image/readme.png" data-lightbox="group"><i class="fas fa-question"></i> how to use</a></li>
                            <li></li>
                            <li><a class="navbar-brand" href="{{ url('/test') }}"><i class="fas fa-coffee"></i> checker</a></li>
                            <li><a class="navbar-brand" href="{{ url('/load') }}"><i class="fas fa-clipboard"></i>  memo</a></li>
                            <li><a class="navbar-brand" href="image/flavorwheel.jpg" data-lightbox="group"><i class="fas fa-chart-pie"></i> flavor wheel</a></li>
                            <li><a class="navbar-brand" href="{{ url('/open') }}"><i class="fas fa-comments"></i> open space</a></li>
                            <li></li>
                            </ul>
                        </div>
                    </nav>
                <div class="auth">
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
            </div>
        </nav>
    </div>
            <main class="">
                <div class="row">
                    <div class="col-sm-12 col-md-3 p-0 ">
                        <div class="card">
                            <div class="card-header d-flex justify-content-between ellipsis">メモ一覧
                                <div>
                                    <a href="{{ route('search') }}" class="cearch-icon"><i class="fas fa-search"></i></a>
                                    <a href="{{ route('home') }}" class="cearch-icon"><i class="fas fa-plus-square"></i></a>
                                </div>
                            </div>
                            <div class="card-body my-card-body ellipsis">
                                @foreach($items as $item)
                                    <div>
                                        <a href="/open/{{ $item['id'] }}" class="card-text d-block elipsis mb-2">{{ $item['content'] }}</a>
                                    </div>
                                @endforeach
                                <div class="sp"></div>
                                {{ $items->links() }}
                            </div>
                        </div>
                    </div>
                    <div class="col-sm-12 col-md-3 p-0 ">
                        <div class="card">
                            <div class="card-header d-flex justify-content-between ">選択したメモ
                            </div>
                            <div class="card-body my-card-body ">
                                <form class="card-body my-card-body" action="{{ route('comment-store') }}" method="POST">
                                    <div class="memo_show">
                                    @isset($memo_show)
                                    <p>{{ $memo_show[0]['content'] }}</p>
                                    @endisset
                                    </div>
                                    <div>
                                        @csrf
                                        <div>
                                            @isset($memo_show)
                                            <textarea class="form-control" id="exampleFormControlTextarea1" rows="3" name='comment' placeholder="コメント入力">{{ old('comment') }}</textarea>
                                            <input type="hidden" name="memo_id" value="{{ $memo_show[0]['id'] }}">
                                            @endisset
                                        </div>
                                        <button type="submit" class="btn btn-outline-secondary">投稿</button>
                                    </div>
                                    @error('comment')
                                        <div class='alert alert-danger'> Comment is empty or over！</div>
                                    @enderror
                                </form>
                            </div>
                        </div>
                    </div>
                    <div class=" col-md-6 p-0 main-blade">
                        @yield('content')
                    </div>
                </div>
            </main>
    </div>
    <script src="https://code.jquery.com/jquery-3.4.1.min.js" integrity="sha256-CSXorXvZcTkaix6Yvo6HppcZGetbYMGWSFlBw8HfCJo=" crossorigin="anonymous"></script>
    <script src='/js/menu.js'></script>
</body>
</html>
