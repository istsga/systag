<!DOCTYPE html>

<html lang="es">
  <head>
    <meta charset="utf-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0, shrink-to-fit=no">
    <meta name="description" content="Sistema Académico - Instituto San Gabriel">
    <meta name="author" content="Diego Guapi">
    <meta name="keyword" content="Sistema Académico - Instituto San Gabriel">
    <title> Recuperar contraseña | ISTSGA </title>
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
    <link rel="manifest" href=" {{asset('assets/favicon/manifest.json')}}">
    <meta name="msapplication-TileColor" content="#ffffff">
    <meta name="msapplication-TileImage" content=" {{asset('assets/favicon/ms-icon-144x144.png')}}">
    <meta name="theme-color" content="#ffffff">

    <link href="{{asset('css/login.css')}}" rel="stylesheet">
    <link href="{{asset('css/style.css')}}" rel="stylesheet">

  </head>
  <body>

    <div class="col-lg-4 col-md-6 mx-auto col-md-12 min-vh-100 d-flex flex-column justify-content-center">
        <div class="col-md-11">
            <div class="card border-0">
                <div class="card-header border-0 bg-primary">
                    <img class="rounded mx-auto d-block " width="35%" src="{{asset('assets/brand/SGlogo.svg')}}" alt="San Gabriel Logo">
                </div>
                <div class=" card-body bg-white shadow-lg rounded py-5 px-4">
                    <h5 class="text-center mb-4">Restablecer  contraseña</h5>
                    <div class="form-group">
                        <div class="col-md-12 mb-4">
                            <p>Ingrese su correo electrónico  para restablecer la contraseña</p>
                        </div>
                    </div>
                    @if (session('status'))
                        <div class="alert alert-success" role="alert">
                            {{ session('status') }}
                        </div>
                    @endif

                    <form method="POST" action="{{ route('password.email') }}">
                        @csrf
                        <div class="form-group ">
                             <div class="col-md-12 mb-4">
                                <input id="email" type="email" class="form-control bg-light shadow-sm @error('email') is-invalid @enderror" name="email" value="{{ old('email') }}" required autocomplete="email" placeholder="Correo electrónico" autofocus>

                                @error('email')
                                    <span class="invalid-feedback" role="alert">
                                        <strong>{{ $message }}</strong>
                                    </span>
                                @enderror
                            </div>
                        </div>

                        <div class="form-group  mb-0">
                            <div class="col-md-12 mb-4">
                                <button type="submit" class="btn btn-primary btn-block justify-content-center px-4">
                                    {{ __('Restablecer contraseña') }}
                                </button>
                            </div>
                        </div>
                    </form>

                    <div class="form-group ">
                        <a class="nav-link text-dark  " href="{{ route('login') }}"> {{ __('Regresar') }}</a>
                    </div>
                </div>
            </div>
        </div>
    </div>
</body>
</html>
