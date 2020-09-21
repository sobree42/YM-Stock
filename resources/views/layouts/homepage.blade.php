<!DOCTYPE html>
<html lang="{{ str_replace('_', '-', app()->getLocale()) }}">
    <head>
        <meta charset="utf-8">
        <meta name="viewport" content="width=device-width, initial-scale=1">

        <title>YM - Stock</title>

        <!-- Fonts -->
        <link href="https://fonts.googleapis.com/css?family=Nunito:200,600" rel="stylesheet">
         <!-- Font Awesome icons (free version)-->
         <script src="https://use.fontawesome.com/releases/v5.13.0/js/all.js" crossorigin="anonymous"></script>
         <!-- Google fonts-->
         <link href="https://fonts.googleapis.com/css?family=Merriweather+Sans:400,700" rel="stylesheet" />
         <link href="https://fonts.googleapis.com/css?family=Merriweather:400,300,300italic,400italic,700,700italic" rel="stylesheet" type="text/css" />
         <!-- Third party plugin CSS-->
         <link href="https://cdnjs.cloudflare.com/ajax/libs/magnific-popup.js/1.1.0/magnific-popup.min.css" rel="stylesheet" />
     </head>

        <!-- CSS only -->
        <link href="{{ asset('css/styles.css') }}" rel="stylesheet">

        @yield('style')

    </head>
    <body>
    <body id="page-top">
        <!-- Navigation-->
        <nav class="navbar navbar-expand-lg navbar-light fixed-top py-3" id="mainNav">
            <div class="container">
                <a class="navbar-brand js-scroll-trigger" href="#"><i class="fas fa-boxes fa-1x"></i> <span class="text-primary">YM</span> STOCKS</a><button class="navbar-toggler navbar-toggler-right" type="button" data-toggle="collapse" data-target="#navbarResponsive" aria-controls="navbarResponsive" aria-expanded="false" aria-label="Toggle navigation"><span class="navbar-toggler-icon"></span></button>
                <div class="collapse navbar-collapse" id="navbarResponsive">
                    <ul class="navbar-nav ml-auto my-2 my-lg-0">
                        <li class="nav-item"><a class="nav-link js-scroll-trigger" href="#about">About</a></li>
                        <li class="nav-item"><a class="nav-link js-scroll-trigger" href="#services">Services</a></li>
                        <li class="nav-item"><a class="nav-link js-scroll-trigger" href="#portfolio">Portfolio</a></li>
                        <li class="nav-item"><a class="nav-link js-scroll-trigger" href="#contact">{{__('Contact')}}</a></li>
                        <div class="flex-center position-ref full-height">
                            @if (Route::has('login'))
                                    @auth
                                    <li class="nav-item"><a class="nav-link js-scroll-trigger" href="{{ url('/home') }}">Home</a></li>
                                    @else
                                    <li class="nav-item"><a class="nav-link js-scroll-trigger" href="{{ route('login') }}">{{__('Login')}}</a></li>
                                    @endauth
                                </div>
                            @endif
                            {{-- <div class="container-fluid">
                                <div class=" text-center">
                                    <a href="{{ route('language', 'en') }}">EN</a>
                                    <a href="{{ route('language', 'th') }}">TH</a>
                                </div> --}}
                                <li class="nav-item dropdown">
                                    <a class="nav-link dropdown-toggle" href="#" id="navbarDropdownMenuLink" role="button" data-toggle="dropdown" aria-haspopup="true" aria-expanded="false">
                                        <i class="fas fa-globe-americas fa-1x"></i>
                                    </a>
                                    <div class="dropdown-menu" aria-labelledby="navbarDropdownMenuLink">
                                      <a class="dropdown-item text-center" href="{{ route('language', 'en') }}"><img src="https://img.icons8.com/color/30/000000/great-britain.png"/></a>
                                      <a class="dropdown-item text-center" href="{{ route('language', 'th') }}"><img src="https://img.icons8.com/color/30/000000/thailand.png"/></a>
                                    </div>
                                  </li>
                    </ul>
                </div>
            </div>
        </nav>
        @yield('content')

           <!-- Footer-->
           <footer class="bg-light py-5">
            <div class="container"><div class="small text-center text-muted">Copyright &copy; Your Website 2019- {{ date('Y') }}</div></div>
        </footer>
        <!-- Bootstrap core JS-->
        <script src="https://cdnjs.cloudflare.com/ajax/libs/jquery/3.5.1/jquery.min.js"></script>
        <script src="https://stackpath.bootstrapcdn.com/bootstrap/4.5.0/js/bootstrap.bundle.min.js"></script>
        <!-- Third party plugin JS-->
        <script src="https://cdnjs.cloudflare.com/ajax/libs/jquery-easing/1.4.1/jquery.easing.min.js"></script>
        <script src="https://cdnjs.cloudflare.com/ajax/libs/magnific-popup.js/1.1.0/jquery.magnific-popup.min.js"></script>
        <!-- Custom scripts for all pages-->
    <script src="{{ asset('js/scripts.js') }}"></script>

    @yield('script')
    </body>
</html>

