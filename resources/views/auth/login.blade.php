<!DOCTYPE html>
<html lang="en">

<head>

    <meta charset="utf-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no">
    <meta name="description" content="">
    <meta name="author" content="">

    <title>YM Stock - Login</title>

    <!-- Custom fonts for this template-->
    <link href="{{ asset('vendor/fontawesome-free/css/all.min.css') }}" rel="stylesheet" type="text/css">
    <link
        href="https://fonts.googleapis.com/css?family=Nunito:200,200i,300,300i,400,400i,600,600i,700,700i,800,800i,900,900i"
        rel="stylesheet">

    <!-- Custom styles for this template-->
    <link href="{{ asset('css/sb-admin-2.css') }}" rel="stylesheet">

</head>
<body class="login_bg">
    <nav class="navbar navbar-expand-md navbar-light bg-white shadow-sm">
        <div class="container">
            <div class="btn-group">
            <a class="navbar-brand" href="{{ url('/') }}">
                {{-- {{ config('app.name', 'Laravel') }} --}}
                <i class="fas fa-home"></i> <span class="text-secondary">Home</a>
            </a>
                <button type="button" class="btn btn-default dropdown-toggle" data-toggle="dropdown"><i class="fas fa-globe-americas fa-1x"></i></button>
                <div class="dropdown-menu">
                    <a href="{{ route('language', 'en') }}" class="dropdown-item text-center"><img src="https://img.icons8.com/color/30/000000/great-britain.png"/></a>
                    <a href="{{ route('language', 'th') }}" class="dropdown-item text-center"><img src="https://img.icons8.com/color/30/000000/thailand.png"/></a>
                </div>
            </div>
        </nav>
    <div class="container">

        <!-- Outer Row -->

        <div class="row justify-content-center">

            <div class="col-xl-10 col-lg-6 col-md-10">

                <div class="card o-hidden border-0 shadow-lg my-5">

                    <div class="card-body p-0">
                        <!-- Nested Row within Card Body -->
                        <div class="row">
                            <div class="col-lg-6 d-none d-lg-block bg-login-image"></div> <!-- #setting login bg -->
                            <div class="col-lg-6 bg-gradient-dark">


                                <div class="p-5">
                                    <div class="text-center">
                                        <h1 class="h4 text-light mb-4">{{__('Login to continue')}}</h1>
                                    </div>
                                    <form class="user" method="POST" action="{{ route('login') }}">
                                        @csrf
                                        <div class="form-group">
                                            <input type="email" name="email"
                                                class="form-control form-control-user  @error('email') is-invalid @enderror"
                                                placeholder="{{__('Enter Email Address...')}}">
                                            @error('email')
                                            <span class="invalid-feedback" role="alert">
                                                <strong>{{ $message }}</strong>
                                            </span>
                                            @enderror
                                        </div>
                                        <div class="form-group">
                                            <input type="password" name="password"
                                                class="form-control form-control-user  @error('password') is-invalid @enderror"
                                                placeholder="{{__('Password')}}">
                                            @error('password')
                                            <span class="invalid-feedback" role="alert">
                                                <strong>{{ $message }}</strong>
                                            </span>
                                            @enderror
                                        </div>
                                        <div class="form-group">
                                            <div class="custom-control custom-checkbox small">
                                                <input type="checkbox" name="remember" class="custom-control-input"
                                                    id="customCheck" {{ old('remember') ? 'checked' : '' }}>
                                                <label class="custom-control-label text-light" for="customCheck">{{ __('Remember Me')}}</label>
                                            </div>
                                        </div>
                                        <button type="submit" class="btn btn-outline-info  btn-user btn-block">
                                            {{ __('Login') }}
                                        </button>
                                    </form>

                                    @if (Route::has('password.request'))
                                    <div class="text-center ">

                                    </div>
                                    @endif
                                    <div class="container-fluid p-3">
                                        <div class=" text-center">
                                        </div>
                                    </div>

                                </div>
                            </div>
                        </div>
                    </div>
                </div>

            </div>

        </div>


    </div>

</div>

    </nav>

<!-- Bootstrap core JavaScript-->
<script src="{{ asset('vendor/jquery/jquery.min.js') }}"></script>
<script src="{{ asset('vendor/bootstrap/js/bootstrap.bundle.min.js') }}"></script>

<!-- Core plugin JavaScript-->
<script src="{{ asset('vendor/jquery-easing/jquery.easing.min.js') }}"></script>

<!-- Custom scripts for all pages-->
<script src="{{ asset('js/sb-admin-2.min.js') }}"></script>

</body>

</html>
