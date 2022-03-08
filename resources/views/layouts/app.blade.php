<style>
    .blanco{
        color: #FFF;
    }
    .sizeIcon{
        font-size: 30px;
    }
    .centrarY {
        align-items: center;
    }
    .marco{
        padding-right: 10px;
        text-align: center;
        border-width: 2px;
        border-style: solid;
        border-left-style: hidden;
        border-color: #fff;
        border-radius: 100px;
    }
</style>
<!DOCTYPE html>
<html lang="{{ app()->getLocale() }}" ng-app="tiendita">
<head>
    <meta charset="utf-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1">

    <!-- CSRF Token -->
    <meta name="csrf-token" content="{{ csrf_token() }}">

    <title>Punto de Venta</title>

    <!-- Styles Bootstrap -->
    <link href="{{ asset('css/bootstrap-minty.css') }}" rel="stylesheet">
    <link href="" rel="stylesheet">

    <!-- AngularJS -->
    <script src="{{ asset('js/angularJS/1.8.2.js') }}"></script>
    <script type="text/javascript" src="{{ asset('js/indexController.js') }}"></script>
    
    <!-- Toastr 
    <script src="https://code.jquery.com/jquery-3.5.1.min.js" integrity="sha256-9/aliU8dGd2tb6OSsuzixeV4y/faTqgFtohetphbbj0=" crossorigin="anonymous"></script>
    <script src="{{ asset('js/toastr.min.js') }}"></script>
    <link href="{{ asset('css/toastr.min.css') }}" rel="stylesheet">
    -->

    <!-- SweetAlert -->
    <script src="{{ asset('js/sweetAlert.js') }}"></script>

</head>
<body ng-controller="controllerTiendita">
    <div>
        <nav class="navbar navbar-dark bg-primary shadow-sm navbar-static-top">
            <div class="container">
                <div>
                    <!-- Branding Image -->
                    <a class="navbar-brand" href="{{ url('/home') }}">
                        <i class="fas fa-th"></i>  
                        {{ config('app.name', 'Laravel') }}
                    </a>
                </div>
                <div class="blanco">
                    <!-- Right Side Of Navbar -->
                        <!-- Authentication Links -->
                        @guest
                        @else
                            <div class="row centrarY">
                                
                                <div class="marco row centrarY">
                                    <i class="fas fa-user-circle sizeIcon pr-2"></i>
                                    {{ Auth::user()->user }}
                                </div>

                                <div class="col-1"></div>
                                
                                <a href="{{ route('logout') }}" class="blanco" onclick="event.preventDefault(); document.getElementById('logout-form').submit();">
                                    <button class="btn btn-secondary">
                                        <i class="fas fa-sign-out-alt"></i> Cerrar Sesión
                                    </button>    
                                </a>
                                <form id="logout-form" action="{{ route('logout') }}" method="POST" style="display: none;">
                                    {{ csrf_field() }}
                                </form>
                            </div>                                
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
