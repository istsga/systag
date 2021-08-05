<!DOCTYPE html>
<!--
* CoreUI - Free Bootstrap Admin Template
* @version v3.2.0
* @link https://coreui.io
* Copyright (c) 2020 creativeLabs Łukasz Holeczek
* Licensed under MIT (https://coreui.io/license)
-->

<html lang="es">
  <head>
    <meta charset="utf-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="csrf-token" content="{{ csrf_token() }}">
    <meta name="viewport" content="width=device-width, initial-scale=1.0, shrink-to-fit=no">
    <meta name="description" content="Sistema Académico - Instituto San Gabriel">
    <meta name="author" content="Diego Guapi">
    <meta name="keyword" content="Sistema Académico - Instituto San Gabriel">
    <title> @yield('title')  ITSGA </title>
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

    <!-- Estylos de íconos-->
    <link href="{{asset('css/free.min.css')}}" rel="stylesheet">
    <link href="{{asset('css/flag.min.css')}}" rel="stylesheet">
    <link href="{{asset('css/brand.min.css')}}" rel="stylesheet">

    <!-- Estilos secundarios-->
    @stack('styles')

    <!-- Estilos principales-->
    <link href="{{asset('css/style.css')}}" rel="stylesheet">
  </head>

  <body class="c-app">
    @include('layouts.sidebar')

    <div class="c-wrapper c-fixed-components">
      <header class="c-header c-header-light c-header-fixed c-header-with-subheader">
        <button class="c-header-toggler c-class-toggler d-lg-none mfe-auto" type="button" data-target="#sidebar" data-class="c-sidebar-show">
          <i class="c-icon c-icon-lg">
            <use class="fas fa-bars"> </use>
          </i>
        </button>

        <a class="c-header-brand d-lg-none" href="{{route('home')}}">
          <img  width="40" height="46" src="{{asset('assets/brand/logo3.png')}}" alt="ITSGA Logo">
        </a>


        <button class="c-header-toggler c-class-toggler mfs-3 d-md-down-none" type="button" data-target="#sidebar" data-class="c-sidebar-lg-show" responsive="true">
          <i class="c-icon c-icon-lg">
            <use class="fas fa-bars"> </use>
          </i>

        </button>
        <ul class="c-header-nav d-md-down-none">
          <li class="c-header-nav-item px-3"><a class="c-header-nav-link" href="{{route('home')}}">Inicio</a></li>
        </ul>
        <ul class="c-header-nav ml-auto mr-4 ">
          <li class="c-header-nav-item d-md-down-none mx-2 mr-5 ">
            {{-- <form class="col-lg-12 px-0 my-2 my-lg-0 no-waves-effect pr-5">
              <div class="input-group pr-5">
                  <input type="search" name="search" class="form-control" placeholder="Buscar..." aria-label="Buscar..." aria-describedby="basic-addon2">
                  <div class="input-group-append">
                      <button class="btn btn-primary btn-gradient waves-effect waves-light" type="submit"><span class="gradient"><font style="vertical-align: inherit;">Buscar</font></span></button>
                  </div>
                </div>
            </form> --}}
          </li>

          <li class="c-header-nav-item dropdown"><a class="c-header-nav-link" data-toggle="dropdown" href="#" role="button" aria-haspopup="true" aria-expanded="false">
            <div class="c-avatar"><img class="c-avatar-img" src="/uploads/avatars/{{auth()->user()->avatar }}" alt=" Logo User"></div>
            </a>
            <div style="width: 375px" class="dropdown-menu mt-2 dropdown-menu-right pt-0 border-top-0 shadow-sm">
              <div class="dropdown-header mt-2   py-2 d-flex justify-content-between aling-items-end ">
                <h5 class="align-self-center vertical-align-inherit font-weight-bold">SYSTAG</h5>
                <form action="{{ route('logout')}}" method="POST" >
                    @csrf
                    <button class="btn btn-secondary  border-0 "> Cerrar sesión</button>
                 </form>
              </div>

              <div class="row mt-4">
                  <div style="width: 130px" class="text-center">
                    <div class=" mt-1">
                        <img class="rounded-circle ml-4 " width="90px" src="/uploads/avatars/{{auth()->user()->avatar }}" alt=" Logo User">
                    </div>
                  </div>
                  <div class="mb-4 ml-3 mt-3" style="width: 245px">
                      <h5>{{auth()->user()->nombre }} {{auth()->user()->apellido }}</h5>
                      <p style="margin-top: -5px">{{auth()->user()->email }}</p>
                      <p style="margin-top:-15px"><a  href="{{route('users.show', auth()->user())}}">Mi perfil</a></p>

                  </div>
              </div>
          </li>
        </ul>

      </header>
      <div class="c-body">

        @yield('content')

        <footer class="c-footer">
          <div><a href="https://sangabrielriobamba.edu.ec" target="_top"> Instituto Tecnológico SAN GABRIEL</a> &copy; 2021</div>
          <div class="ml-auto">Desarrollado por &nbsp;<a href="#">Diego Karina Marco</a></div>
        </footer>
      </div>
    </div>

    <!-- Script Plantilla-->
    <script src="{{asset('js/coreui.bundle.min.js')}}"></script>

    <!-- Script ícono-->
     <script src="{{asset('assets/js/all.min.js')}}"></script>

     @stack('scripts')

  </body>
</html>
