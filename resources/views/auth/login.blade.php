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

    <link href="{{asset('css/style.css')}}" rel="stylesheet">
    <link href="{{asset('css/login.css')}}" rel="stylesheet">

  </head>
  <body>
    <div class="d-flex  justify-content-center bg-primary">
        <div class="text-center">
            <div class="row ml-3 ">
                    <img class="mt-2 " width="75px"  src="{{asset('assets/brand/SGlogo.svg')}}">
                    <h1 class="font-weight-bold mt-4 display-4 text-light ml-4" width="120px" >IUSGA</h1>
            </div>
        </div>
    </div>

    <div class="c-main">
        <div class="col-lg-12 ">
        <div class="row">
            <div class="col-lg-9 ">
                    <img width="100%" height="100%" class="fondo-2" src="{{asset('assets/img/fondo-2.png')}}" alt="...">
                    <div class="row">
                        <div class="container-1">
                            <div class="row ml-2 mr-2 mt-2">
                                <div class="col-lg-6" >
                                    <div class="col-lg-9 col-sm-12 card-borde-1">
                                        <div class="d-block d-sm-none m-5">
                                            <div class=" text-center font-weight-bold">
                                                <h1 class="text-primary  font-weight-bold  ">Sistema de <br> Control <br> Académico</h1>
                                            </div>
                                        </div>
                                        <div class="d-none d-sm-block ">
                                            <div class=" font-weight-bold">
                                                <h1 class=" display-4 text-primary  font-weight-bold text-right">Sistema de <br> Control Académico</h1>
                                            </div>
                                        </div>
                                    </div>
                                </div>

                                <div class="col-lg-6 ">
                                    <div class="col-lg-10 col-sm-12 card-borde-2 ">
                                        <div class="card border-0">
                                            <div class="card-body bg-white shadow-lg rounded py-5 px-4  ">
                                                <h5 class="text-center mb-4">Iniciar sesión</h5>

                                                <form method="POST"  action="{{ route('login') }}" onsubmit="return checkSubmit();">
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
                                <div class="col-lg-12 text-center">
                                    <div class="pl-3 pr-3">
                                        <img width="9%" src="{{asset('assets/brand/emergencias.svg')}}" alt="Emergencias Medicas">
                                        <img width="13%" src="{{asset('assets/brand/desarrollo.svg')}}" alt="Desarrollo Software">
                                        <img width="12%" src="{{asset('assets/brand/canino.svg')}}" alt="Cuidado Canino">
                                        <img width="10%" src="{{asset('assets/brand/enfermeria.svg')}}" alt="Enfermeria">
                                        <img width="11%" src="{{asset('assets/brand/odontologia.svg')}}" alt="Odontologia">
                                        <img width="11%" src="{{asset('assets/brand/contabilidad.svg')}}" alt="Contabilidad">
                                        <img width="10%" src="{{asset('assets/brand/asistencia.svg')}}" alt="Asistencia en Farmacia">
                                        <img width="12%" src="{{asset('assets/brand/imagenologia.svg')}}" alt="Imagenologia">
                                    </div>
                                </div>
                            </div>
                            </div>
                    </div>
            </div>
            <div class="col-lg-3 ">
                <div class="c-sidebar-brand d-md-down-none ">
                    <div class="c-sidebar-brand-full ">
                        <img class="d-md-down-none" src="{{asset('assets/img/1.png')}}" alt="Imagen">
                    </div>
                </div>
            </div>
        </div>
    </div>
    </div>
</body>
</html>

{{-- Evitar doble clic. --}}
<script>
    login = false; //Obligaremos entrar el if al primer submit
    function checkSubmit() {
        if (!login) {
    		login= true;
    		return true;
        } else {
            // pulsaron 2 veces el  submit
            return false;
        }
    }
</script>
