<!DOCTYPE html>
<html>
    <head>
        <title>Сайт новостей</title>
        <meta charset="utf-8">
        <meta http-equiv="X-UA-Compatible" content="IE=edge">
        <meta name="viewport" content="width=device-width, initial-scale=1">
        <link rel="stylesheet" type="text/css" href="{{ asset('css/bootstrap.min.css') }}" >
        <link rel="stylesheet" type="text/css" href="{{ asset('css/font-awesome.min.css') }}">
        <link rel="stylesheet" type="text/css" href="{{ asset('css/font.css') }}">
        <link rel="stylesheet" type="text/css" href="{{ asset('css/theme.css') }}">
        <link rel="stylesheet" type="text/css" href="{{ asset('css/style.css') }}">
        <link rel="stylesheet" type="text/css" href="{{ asset('css/lightbox.css') }}">
    </head>
    <body>
        <div id="preloader">
            <div id="status">&nbsp;</div>
        </div>
        <a class="scrollToTop" href="#"><i class="fa fa-angle-up"></i></a>
        <div class="container">
            <header id="header">
                <div class="row">
                    <div class="col-lg-12 col-md-12 col-sm-12">
                        <div class="header_top">
                            <ul class="nav navbar-nav navbar-right">
                                @if (Auth::guest())
                                <li><a href="{{ route('login') }}">Авторизация</a></li>
                                <li><a href="{{ route('register') }}">Регистрация</a></li>
                                @else
                                <li class="dropdown">
                                    <a href="#" class="dropdown-toggle" data-toggle="dropdown" role="button" aria-expanded="false">
                                        {{ Auth::user()->name }} <span class="caret"></span>
                                    </a>
                                    <ul class="dropdown-menu" role="menu">
                                        <li>
                                            <a href="{{ route('home') }}">
                                                Профиль
                                            </a>
                                            <a href="{{ route('logout') }}"
                                               onclick="event.preventDefault();
                                                       document.getElementById('logout-form').submit();">
                                                Выход
                                            </a>
                                            <form id="logout-form" action="{{ route('logout') }}" method="POST" style="display: none;">
                                                {{ csrf_field() }}
                                            </form>
                                        </li>
                                    </ul>
                                </li>
                                @endif
                            </ul>    
                        </div>
                    </div>
                    <div class="col-lg-12 col-md-12 col-sm-12">
                        <div class="header_bottom">
                            <div class="logo_area"><a href="{{route('main')}}" class="logo"><img src="/css/images/logo.png" ></a></div>
                            <div class="add_banner"><a href="{{route('main')}}"><img src="/css/images/logoPhoto.png"></a></div>
                        </div>
                    </div>
                </div>
            </header>
            <section id="navArea">
                <nav class="navbar navbar-inverse" role="navigation">
                    <div class="navbar-header">
                        <button type="button" class="navbar-toggle collapsed" data-toggle="collapse" data-target="#navbar" aria-expanded="false" aria-controls="navbar"> <span class="sr-only">Toggle navigation</span> <span class="icon-bar"></span> <span class="icon-bar"></span> <span class="icon-bar"></span> </button>
                    </div>
                    <div id="navbar" class="navbar-collapse collapse">
                        <ul class="nav navbar-nav main_nav">
                            <li class="active"><a href="{{route('main')}}"><span class="fa fa-home desktop-home"></span><span class="mobile-show">Главная</span></a></li>
                            <li><a href="{{route('main')}}">Главная</a></li>
                            <li class="dropdown">
                                <a href="{{route('cat')}}" class="dropdown-toggle"  onclick="open('')" data-toggle="dropdown" role="button" aria-expanded="false">
                                    Категории</a>
                                <ul class="dropdown-menu" role="menu">
                                    <li><a href="{{route('category','1')}}">Политика</a></li>
                                    <li><a href="{{route('category','2')}}">Спорт</a></li>
                                    <li><a href="{{route('category','3')}}">Наука</a></li>
                                    <li><a href="{{route('category','4')}}">Финансы</a></li>
                                    <li><a href="{{route('category','5')}}">Игры</a></li>
                                    <li><a href="{{route('category','6')}}">Фильмы</a></li>

                                </ul>
                            </li>
                            <li><a href="{{ route('about') }}">О нас</a></li>
                            <li><a href="{{ route('feedback') }}">Связаться с нами</a></li>
                            @if(Auth::check() && Auth::user()->role=='admin')
                            <li><a href="{{route('adminMain')}}">Админка</a></li>
                            @endif
                            <li class="li-search"><div class="search">
                                    <form action="{{route('search')}}" method="get" id="search_form">
                                        <input type="text" name="search" id="s" />
                                        <input type="submit" id="searchform" value="search" />
                                        <input type="hidden" value="post" name="post_type" />
                                        {{ csrf_field() }}
                                    </form>
                                </div></li>
                        </ul>
                    </div>
                </nav>
            </section>
            @yield('content')
        </div>
        <footer id="footer">
            <div class="footer_bottom">
                <p class="copyright">Сайт новостей &copy; 2018</p>
            </div>
        </footer>
        <script src="{{ asset('js/jquery.min.js') }}"></script> 
        <script src="{{ asset('js/bootstrap.min.js') }}"></script> 
        <script src="{{ asset('js/custom.js') }}"></script>
        <script src="{{ asset('js/jquery-1.10.2.min.js') }}"></script>
        <script src="{{ asset('js/lightbox-2.6.min.js') }}"></script>
    </body>
</html>
