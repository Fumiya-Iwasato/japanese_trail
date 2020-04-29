<!DOCTYPE html>
<html lang="{{ app()->getLocale() }}">
    <head>
        <meta charset="utf-8">
        <meta http-equiv='X-UA-Compatible' content="IE-edge">
        <meta name="viewport" content="width=device-width, initial-scale=1">
        <meta name="csrf-token" content="{{ csrf_token() }}">
        <title>@yield('title')</title>
        <script src="{{ asset('js/app.js') }}" defer></script>
        <script src="{{ asset('js/main.js') }}" defer></script>
        <script src="https://ajax.googleapis.com/ajax/libs/jquery/1.11.2/jquery.min.js"></script>
        <script src="https://maxcdn.bootstrapcdn.com/bootstrap/3.3.4/js/bootstrap.min.js"></script>
        <script src="https://code.jquery.com/jquery-3.3.1.slim.min.js" integrity="sha384-q8i/X+965DzO0rT7abK41JStQIAqVgRVzpbzo5smXKp4YfRvH+8abtTE1Pi6jizo" crossorigin="anonymous"></script>
        <script src="https://cdnjs.cloudflare.com/ajax/libs/popper.js/1.14.3/umd/popper.min.js" integrity="sha384-ZMP7rVo3mIykV+2+9J3UJ46jBk0WLaUAdn689aCwoqbBJiSnjAK/l8WvCWPIPm49" crossorigin="anonymous"></script>
        <script src="https://stackpath.bootstrapcdn.com/bootstrap/4.1.2/js/bootstrap.min.js" integrity="sha384-o+RDsa0aLu++PJvFqy8fFScvbHFLtbvScb8AjopnFD+iEQ7wo/CG0xlczd+2O/em" crossorigin="anonymous"></script>
        @yield('script')
        <link rel="dns-prefetch" href="https://fonts.gstatic.com">
        <link href="https://fonts.googleapis.com/css?family=Raleway:300,400,600" rel="stylesheet" type="text/css">
        <link href="{{ asset('css/app.css') }}" rel="stylesheet">
        <link href="{{ asset('css/admin.css') }}" rel="stylesheet">
    </head>
    <body>
        <div id="app">
            <nav class="navbar navbar-expand-lg navbar-dark fixed-top bg-dark">
                <div class="container">
                    <a class="navbar-brand" href="{{ route('top') }}">Japanese Trial Races</a>
                    <button class="navbar-toggler" type="button" data-toggle="collapse" data-target="#navbarNav" aria-controls="navbarNav" aria-expanded="false" aria-label="Toggle navigation">
                        <span class="navbar-toggler-icon"></span>
                    </button>
                    <div class="collapse navbar-collapse" id="navbarNav">
                        <ul class="navbar-nav mr-auto">
                            <li class="nav-item">
                                <a class="nav-link" href="{{ route('top') }}">HOME</a>
                            </li>
                            <li class="nav-item">
                                <a class="nav-link" href="{{ route('admin_index') }}">INDEX</a>
                            </li>
                            <li class="nav-item">
                                <a class="nav-link" href="{{ route('contact') }}">CONTACT</a>
                            </li>
                        </ul>
                        <ul class="navbar-nav ml-auto">
                            @guest
                                <li class="nav-item"><a class="nav-link" href="{{ route('login') }}">{{ __('Login') }}</a></li>
                            @else
                                <li class="nav-item">
                                    <div class="nav-link" aria-labelledby="navbarDropdown">
                                        <a class="nav-item logout-btn" href="{{ route('logout') }}"
                                            onclick="event.preventDefault();
                                                            document.getElementById('logout-form').submit();">
                                            {{ __('LOGOUT') }}
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

            @if (session('flash_message'))
                <div class="flash_message alert-success text-center py-3 my-0">
                    {{ session('flash_message') }}
                </div>
            @endif

            <main class="py-4">
                @yield('content')
            </main>
        </div>
    </body>
</html>
