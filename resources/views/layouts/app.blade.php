<style>
    .blanco{
        color: #FFF;
    }
</style>
<!DOCTYPE html>
<html lang="{{ app()->getLocale() }}">
<head>
    <meta charset="utf-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1">

    <!-- CSRF Token -->
    <meta name="csrf-token" content="{{ csrf_token() }}">

    <title>{{ config('app.name', 'Laravel') }}</title>

    <!-- Styles -->
    <link href="{{ asset('css/bootstrap-minty.css') }}" rel="stylesheet">
    <!-- AngularJS -->
    <script src="{{ asset('js/angularJS/1.8.2.js') }}"></script>
    <script type="text/javascript" src="{{ asset('js/indexController.js') }}"></script>
</head>
<body">
    <div id="app">
        <nav class="navbar navbar-dark bg-primary shadow-sm navbar-static-top">
            <div class="container">
                <div>
                    <!-- Branding Image -->
                    <a class="navbar-brand" href="{{ url('/home') }}">
                        {{ config('app.name', 'Laravel') }}
                    </a>
                </div>

                
                <div class="blanco">
                    <!-- Right Side Of Navbar -->
                        <!-- Authentication Links -->
                        @guest
                        @else
                            {{ Auth::user()->user }} <span class="caret"></span>
                            
                            <a href="{{ route('logout') }}" class="blanco"
                                onclick="event.preventDefault();
                                            document.getElementById('logout-form').submit();">
                                <button class="btn btn-secondary">Cerrar Sesión</button>
                                
                            </a>
                            <form id="logout-form" action="{{ route('logout') }}" method="POST" style="display: none;">
                                {{ csrf_field() }}
                            </form>
                                   
                        @endguest
                </div>
            </div>
        </nav>
        @yield('content')
    </div>

    <!-- Scripts -->
    <script src="{{ asset('js/app.js') }}"></script>
</body>
</html>
