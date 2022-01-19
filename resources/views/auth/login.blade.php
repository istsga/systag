<!DOCTYPE html>
<html lang="es">
  <head>
    <meta charset="utf-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0, shrink-to-fit=no">
    <meta name="description" content="Sistema Académico - Instituto San Gabriel">
    <meta name="author" content="Diego Guapi">
    <meta name="keyword" content="Sistema Académico - Instituto San Gabriel">
    <title> Iniciar sesión | IUSGA </title>
    <link rel="apple-touch-icon" sizes="57x57" href=" {{asset('assets/favicon/apple-icon-57x57.png')}}">
    <link rel="apple-touch-icon" sizes="60x60" href=" {{asset('assets/favicon/apple-icon-60x60.png')}} ">
    <link rel="apple-touch-icon" sizes="72x72" href="{{asset('assets/favicon/apple-icon-72x72.png')}} ">
    <link rel="apple-touch-icon" sizes="76x76" href=" {{asset('assets/favicon/apple-icon-76x76.png')}}">
    <link rel="apple-touch-icon" sizes="114x114" href=" {{asset('assets/favicon/apple-icon-114x114.png')}} ">
    <link rel="apple-touch-icon" sizes="120x120" href="{{asset('assets/favicon/apple-icon-120x120.png')}} ">
    <link rel="apple-touch-icon" sizes="144x144" href=" {{asset('assets/favicon/apple-icon-144x144.png')}}">
    <link rel="apple-touch-icon" sizes="152x152" href=" {{asset('assets/favicon/apple-icon-152x152.png')}}">
    <link rel="apple-touch-icon" sizes="180x180" href=" {{asset('assets/favicon/apple-icon-180x180.png')}}">
    <link rel="icon" type="image/png" sizes="192x192" href=" {{asset('assets/favicon/android-icon-192x192.png')}}">
    <link rel="icon" type="image/png" sizes="32x32" href=" {{asset('assets/favicon/favicon-32x32.png')}}">
    <link rel="icon" type="image/png" sizes="96x96" href=" {{asset('assets/favicon/favicon-96x96.png')}}">
    <link rel="icon" type="image/png" sizes="16x16" href=" {{asset('assets/favicon/favicon-16x16.png')}}">
    <meta name="msapplication-TileColor" content="#ffffff">
    <meta name="msapplication-TileImage" content=" {{asset('assets/favicon/ms-icon-144x144.png')}}">
    <meta name="theme-color" content="#ffffff">

    <link href="{{asset('css/login.css')}}" rel="stylesheet">
    <link href="{{asset('css/style.css')}}" rel="stylesheet">

  </head>
  <body>
    <main class="c-main">
        <div class="container">
            <div style="background: #388F54" class="d-flex justify-content-center fixed-top">
                <!--Grid column-->
                <div style="width: 85%">
                    <div class="row">
                        <div style="width: 85px">
                            <img class="mt-2 mb-2" width="75px"  src="{{asset('assets/brand/SGlogo.svg')}}">
                        </div>
                        <div style="width: 100px">
                            <h1 class="font-weight-bold mt-4 display-4 text-light" width="120px" >IUSGA</h1>
                        </div>
                    </div>
                </div>
                <!--Grid column-->

            </div>

            <div class="row mt-5">
                <div class="col-lg-5 mt-5">
                    <div class="display-4 text-light font-weight-bold text-center pt-5">
                        <p class="pt-5">Sistema de <br> Control Académico</p>
                    </div>
                </div>
                <div class=" mt-5 col-md-6 col-lg-5   mx-auto d-flex flex-column justify-content-center">
                    <div class="card border-0 mt-5 ">

                        <div class="card-body bg-white shadow-lg rounded py-5 px-4  ">
                            <h5 class="text-center mb-4">Iniciar sesión</h5>

                            <form method="POST" action="{{ route('login') }}">
                                @csrf

                                <div class="form-group ">
                                    <div class="col-md-12">
                                        <input id="email" type="email" class="form-control bg-light shadow-sm @error('email') is-invalid @enderror" name="email" value="{{ old('email') }}" required autocomplete="email" placeholder="Correo Electrónico" autofocus>

                                        @error('email')
                                            <span class="invalid-feedback" role="alert">
                                                <strong>{{ $message }}</strong>
                                            </span>
                                        @enderror
                                    </div>
                                </div>

                                <div class="form-group">
                                    <div class="col-md-12">
                                        <input id="password" type="password" class="form-control bg-light shadow-sm @error('password') is-invalid @enderror" name="password" required autocomplete="current-password" placeholder="Introduce tu contraseña">

                                        @error('password')
                                            <span class="invalid-feedback" role="alert">
                                                <strong>{{ $message }}</strong>
                                            </span>
                                        @enderror
                                    </div>
                                </div>

                                <div class="form-group row ">
                                    <div class="col-md-12 mb-2">
                                        @if (Route::has('password.request'))
                                            <a class="btn btn-link" href="{{ route('password.request') }}">
                                                {{ __('Olvidé mi contraseña?') }}
                                            </a>
                                        @endif
                                    </div>
                                </div>

                                <div class="form-group  mb-2">
                                    <div class="col-md-12 ">
                                        <button type="submit" class="btn btn-primary btn-block justify-content-center  px-4">
                                            {{ __('Iniciar sesión') }}
                                        </button>
                                    </div>
                                </div>
                            </form>
                        </div>
                    </div>
                </div>

            </div>
            <div style="background: #388F54" class="d-flex justify-content-center fixed-bottom">

                <!--Grid column-->
                <div class="text-center">
                    <p class="text-light mt-3 ">Instituto Superior Universitario San Gabriel © Todos los Derechos Reservados.</p>
                </div>
                <!--Grid column-->

              </div>
        </div>
    </main>

</body>
</html>
