<!DOCTYPE html>
<html lang="{{ app()->getLocale() }}">
    <head>
        <meta charset="utf-8">
        <meta http-equiv='X-UA-Compatible' content="IE-edge">
        <meta name="viewport" content="width=device-width, initial-scale=1">
        <meta name="csrf-token" content="{{ csrf_token() }}">
        <title>@yield('title')</title>
        <script src="{{ asset('js/app.js') }}" defer></script>
        <link rel="dns-prefetch" href="https://fonts.gstatic.com">
        <link href="https://fonts.googleapis.com/css?family=Raleway:300,400,600" rel="stylesheet" type="text/css">
        <link href="{{ asset('css/app.css') }}" rel="stylesheet">
        <link href="{{ asset('css/layout.css') }}" rel="stylesheet">
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
                    </div>
                </div>
            </nav>
            <div class="container-fluid img-hidden">
              <img src="image/akiyoshi.jpeg" class="img-fluid">
            </div>
            <div class="container-fluid">
                <div class="row">
                    <div class="col-md-8">
                        @yield('content')
                    </div>
                    <div class="col-md-4">
                        <div class="sidebar">
                            <div class="col-md-12 auther">
                                <img src="image/trail.jpeg" class="img-fluid img-auther">
                                <h4>Fumiya Iwasato</h4>
                                <p>Japanese trail runner</p>
                            </div>
                            <form action="{{ route('top') }}" method="get" class="col-md-12 search-box">
                                <div class="form-group row">
                                    <input type="text" class="form-control search-form" name="cond_title" value="{{ $cond_title }}">
                                    {{ csrf_field() }}
                                    <input type="submit" class="btn btn-primary btn-search" value="Search">
                                </div>
                            </form>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </body>
</html>