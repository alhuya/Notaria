<!DOCTYPE html>
<html lang="{{ app()->getLocale() }}">
<head>
    <meta charset="utf-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1">

    <!-- CSRF Token -->
    <meta name="csrf-token" content="{{ csrf_token() }}">

    <title>Notaria</title>

    <!-- Scripts -->
  <script src="{{ asset('js/app.js') }}"></script>
  


   


 @yield('script')

    <!-- Fonts -->
    <link rel="dns-prefetch" href="https://fonts.gstatic.com">
    <!--<link href="https://fonts.googleapis.com/css?family=Raleway:300,400,600" rel="stylesheet" type="text/css">-->
    <link rel="icon" type="image/png" sizes="32x32" href="{{ asset('/imagenes/favicon-32x32.png') }}">

    <!-- Styles -->
    <link rel='stylesheet' href='css/fullcalendar.min.css' />
 
    <link href="{{ asset('css/app.css') }}" rel="stylesheet">
    
</head>
<body>

    <div id="app">
        <nav class="navbar navbar-expand-md navbar-light navbar-laravel">
            <a href="#menu-toggle" id="menu-toggle"><img src="{{ asset('imagenes/logo4.png') }}" width="179px" height="52px"></a>
            <div class="container">

               <!-- <a href="#menu-toggle" id="menu-toggle"><img src="{{ asset('imagenes/logo4.png') }}" width="179px" height="52px"></a>-->
                <!--<a class="navbar-brand" href="{{ url('/') }}">
                   Notaria
                </a>-->
                <button class="navbar-toggler" type="button" data-toggle="collapse" data-target="#navbarSupportedContent" aria-controls="navbarSupportedContent" aria-expanded="false" aria-label="Toggle navigation">
                    <span class="navbar-toggler-icon"></span>
                </button>

                <div class="collapse navbar-collapse" id="navbarSupportedContent">
                    <!-- Left Side Of Navbar -->
                    <ul class="navbar-nav mr-auto">

                    </ul>

                    <!-- Right Side Of Navbar -->
                    <ul class="navbar-nav ml-auto" >
                        <!-- Authentication Links --> 
                        @guest
                            
                          <li><a class="nav-link" href="{{ route('login') }}">{{ __('Iniciar Sesión') }}</a></li>
                       <!--  <li><a class="nav-link" href="{{ route('register') }}">{{ __('Registro') }}</a></li>-->
                        @else

                             @can('isAdministrador')
                              <!--<li><a class="nav-link" href="{{ route('register') }}">{{ __('Agregar Nuevo Miembro') }}</a></li>-->
                                  @endcan
                                
                            <li class="nav-item dropdown">
                                <a id="navbarDropdown" class="nav-link dropdown-toggle" href="#" role="button" data-toggle="dropdown" aria-haspopup="true" aria-expanded="false" v-pre>

                                    {{ Auth::user()->puesto_id }} <span class="caret"></span>
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
         

        <main class="py-4">
            @yield('content')
        </main>
       
    </div>
<!--
    <div style=" 
  position: absolute;
  bottom: 0;
  width: 100%;
  height: 90px;
  color: white;"> 
  @yield('footer') 
<img src="{{ asset('/imagenes/covel2.png') }}" width="150px" height="90px" align="right">
</div> -->



</body>



</html>
