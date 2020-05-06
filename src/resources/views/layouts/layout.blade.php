<!DOCTYPE html>
<html lang="{{ app()->getLocale() }}">
    <head>
        <meta charset="utf-8">
        <meta http-equiv='X-UA-Compatible' content="IE-edge">
        <meta name="viewport" content="width=device-width, initial-scale=1">
        <meta name="csrf-token" content="{{ csrf_token() }}">
        <title>@yield('title')</title>
        <script src="{{ secure_asset('js/app.js') }}" defer></script>
        <script src="https://code.jquery.com/jquery-3.3.1.slim.min.js" integrity="sha384-q8i/X+965DzO0rT7abK41JStQIAqVgRVzpbzo5smXKp4YfRvH+8abtTE1Pi6jizo" crossorigin="anonymous"></script>
        <script src="https://cdnjs.cloudflare.com/ajax/libs/popper.js/1.14.3/umd/popper.min.js" integrity="sha384-ZMP7rVo3mIykV+2+9J3UJ46jBk0WLaUAdn689aCwoqbBJiSnjAK/l8WvCWPIPm49" crossorigin="anonymous"></script>
        <script src="https://stackpath.bootstrapcdn.com/bootstrap/4.1.2/js/bootstrap.min.js" integrity="sha384-o+RDsa0aLu++PJvFqy8fFScvbHFLtbvScb8AjopnFD+iEQ7wo/CG0xlczd+2O/em" crossorigin="anonymous"></script>
        <link rel="dns-prefetch" href="https://fonts.gstatic.com">
        <link href="https://fonts.googleapis.com/css?family=Raleway:300,400,600" rel="stylesheet" type="text/css">
        <link href="{{ secure_asset('css/app.css') }}" rel="stylesheet">
        <link href="{{ secure_asset('css/layout.css') }}" rel="stylesheet">
    </head>
    <body>
        <div id="app">
            <nav class="navbar navbar-expand-lg navbar-dark fixed-top bg-dark">
                <div class="container">
                    <a class="navbar-brand" href="{{ route('top') }}">Japanese Trail Races</a>
                    <button class="navbar-toggler" type="button" data-toggle="collapse" data-target="#navbarNav" aria-controls="navbarNav" aria-expanded="false" aria-label="Toggle navigation">
                        <span class="navbar-toggler-icon"></span>
                    </button>
                    <div class="collapse navbar-collapse" id="navbarNav">
                        <ul class="navbar-nav mr-auto">
                            <li class="nav-item">
                                <a class="nav-link" href="{{ route('top') }}">HOME</a>
                            </li>
                            <li class="nav-item">
                                <a class="nav-link" href="{{ route('contact') }}">CONTACT</a>
                            </li>
                        </ul>
                        @guest
                        @else
                        <ul class="navbar-nav ml-auto">
                            <li class="nav-item">
                                <a class="nav-link" href="{{ route('admin_index') }}">INDEX</a>
                            </li>
                            <li class="nav-item">
                                <a class="nav-link" href="{{ route('admin_create') }}">CREATE</a>
                            </li>
                            <li class="nav-item">
                                <a class="nav-link" href="{{ route('logout') }}"
                                    onclick="event.preventDefault();
                                                    document.getElementById('logout-form').submit();">
                                    {{ __('LOGOUT') }}
                                </a>
                                <form id="logout-form" action="{{ route('logout') }}" method="POST" style="display: none;">
                                    @csrf
                                </form>
                            </li>
                        </ul>
                        @endguest
                    </div>
                </div>
            </nav>
            <div class="container-fluid img-hidden">
              <img src="image/akiyoshi.jpeg" class="img-fluid">
            </div>
            <div class="container">
                <div class="row">
                    <div class="col-md-8">
                        @yield('content')
                    </div>
                    <div class="col-md-4">
                        <div class="sidebar">
                            <div class="col-md-12 auther">
                                <img src="image/trail.jpeg" class="img-fluid img-auther">
                                <h4>Fumiya Iwasato</h4>
                                <p>Trail runner from Nagasaki, Japan</p>
                            </div>
                            <div class="col-md-12 search-box">
                                <form action="{{ route('top') }}" method="get" class="search-box-2">
                                    <dl class="search1">
                                        <dt><input type="text" name="cond_title" value="{{ $cond_title }}"></dt>
                                        {{ csrf_field() }}
                                        <dd><button type="submit"><span>Search</span></button></dd>
                                    </dl>
                                </form>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </body>
</html>