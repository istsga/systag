@extends('layouts.layout')
@section('title', ' Inicio |')
@section('content')
<main class="c-main">
    <div class="container-fluid">
      <div class="fade-in">
        @role('Administrador')
            <div class="row">
                <div class="col-lg-12 mb-4">
                    <div class="card-header bg-light shadow-sm">
                        <h4 class="text-muted">Acceso Rápido</h4>
                    </div>
                </div>

                <div class="col-sm-6 col-lg-4">
                    <div class="card">
                        <div class="card-header bg-primary content-center">
                        <div class="c-icon c-icon-3xl text-white my-2">
                            <i class="fas fa-graduation-cap mt-3 text-light"></i>
                        </div>
                        </div>
                        <div class="card-body row text-center bg-light ">
                        <div class="col">
                            <div class="text-uppercase  font-weight-bold">{{$carreras}}</div>
                            <div class=" text-uppercase   text-muted"> <h5 class="font-weight-bold"> Carreras</h5></div>
                        </div>
                        </div>
                        <div class="card-footer bg-primary content-center">
                        <a href="{{route('carreras.create')}}" class="btn btn-block btn-primary font-weight-bold"> Agregar</a>
                        </div>
                    </div>
                </div>

                <div class="col-sm-6 col-lg-4">
                    <div class="card ">
                        <div class="card-header bg-primary content-center">
                        <div class="c-icon c-icon-3xl text-white my-2">
                            <i class="fas fa-user-graduate text-light"></i>
                        </div>
                        </div>
                        <div class="card-body row text-center bg-light ">
                        <div class="col">
                            <div class="text-uppercase  font-weight-bold">{{$estudiantes}}</div>
                            <div class=" text-uppercase   text-muted"> <h5 class="font-weight-bold"> Estudiantes</h5></div>
                        </div>
                        </div>
                        <div class="card-footer bg-primary content-center ">
                        <a href="{{route('estudiantes.create')}}" class="btn btn-block btn-primary font-weight-bold ">Agregar</a>
                        </div>
                    </div>
                </div>

                <div class="col-sm-6 col-lg-4">
                    <div class="card">
                        <div class="card-header bg-primary content-center">
                        <div class="c-icon c-icon-3xl text-white my-2">
                            <i class="fas fa-chalkboard-teacher text-light"></i>
                        </div>
                        </div>
                        <div class="card-body row text-center bg-light">
                        <div class="col">
                            <div class="text-uppercase font-weight-bold">{{$docentes}}</div>
                            <div class=" text-uppercase   text-muted"> <h5 class="font-weight-bold"> Docentes</h5></div>
                        </div>
                        </div>
                        <div class="card-footer bg-primary content-center">
                        <a href="{{route('docentes.create')}}" class="btn btn-block btn-primary font-weight-bold">Agregar </a>
                        </div>
                    </div>
                </div>
            </div>
            <hr>
            <div class="row">
                <div class="col-sm-6 col-lg-4 mt-3">
                    <div class="card">
                        <div class="card-header bg-primary content-center">
                        <div class="c-icon c-icon-3xl text-white my-2">
                            <i class="fas fa-users text-light"></i>
                        </div>
                        </div>
                        <div class="card-body row text-center bg-light">
                        <div class="col">
                            <div class="text-uppercase font-weight-bold">{{$users}}</div>
                            <div class=" text-uppercase   text-muted"> <h5 class="font-weight-bold"> Usuarios</h5></div>
                        </div>
                        </div>
                        <div class="card-footer bg-primary content-center">
                        <a href="{{route('users.create')}}" class="btn btn-block btn-primary font-weight-bold">Agregar </a>
                        </div>
                    </div>
                </div>

                <div class="col-sm-6 col-lg-4 mt-3">
                    <div class="card">
                        <div class="card-header bg-primary content-center">
                        <div class="c-icon c-icon-3xl text-white my-2">
                            <i class="fas fa-user-shield text-light"></i>
                        </div>
                        </div>
                        <div class="card-body row text-center bg-light">
                        <div class="col">
                            <div class="text-uppercase font-weight-bold">{{$roles}}</div>
                            <div class=" text-uppercase   text-muted"> <h5 class="font-weight-bold"> Roles</h5></div>
                        </div>
                        </div>
                        <div class="card-footer bg-primary content-center">
                        <a href="{{route('roles.create')}}" class="btn btn-block btn-primary font-weight-bold">Agregar </a>
                        </div>
                    </div>
                </div>

                <div class="col-sm-6 col-lg-4 mt-3">
                    <div class="card">
                        <div class="card-header bg-primary content-center">
                        <div class="c-icon c-icon-3xl text-white my-2">
                            <i class="fas fa-key text-light"></i>
                        </div>
                        </div>
                        <div class="card-body row text-center bg-light">
                        <div class="col">
                            <div class="text-uppercase font-weight-bold">{{$permisos}}</div>
                            <div class=" text-uppercase   text-muted"> <h5 class="font-weight-bold"> Permisos</h5></div>
                        </div>
                        </div>
                        <div class="card-footer bg-primary content-center">
                        <a href="{{route('permisos.index')}}" class="btn btn-block btn-primary font-weight-bold">VER </a>
                        </div>
                    </div>
                </div>
            </div>
        @else

        <div class="card bg-primary border-0 shadow-lg">
            <div class="row">
              <div class="col-lg-12 bg-primary " >
                        <div class="row m-4">
                            <div class=" col-lg-2 c-header-brand">
                                @if (auth()->user()->avatar == null)
                                    <div class="m-2"> <i class=" fas fa-user-circle fa-8x rounded-circle border" style="color: #375A64;"></i> </div>
                                @else
                                    <img style="border: solid #e5e6e7 3px" class="rounded-circle " width="115px" src="/uploads/avatars/{{auth()->user()->avatar }}" alt="perfil">
                                @endif
                            </div>
                            <div class="col"></div>
                            <div class="col-lg-9 m-2 text-center" >
                                <p class=" display-4 text-light font-weight-bold">Bienvenido a SYSTAG</p>
                                <h4 class=" text-uppercase text-light">{{auth()->user()->nombre }} {{auth()->user()->apellido }}</h4>
                            </div>
                        </div>
              </div>

              <div class="col-lg-12 bg-light" >
                <div class="header-links mt-3 ml-3">
                  <div class="row">
                    <div class="col-lg-3 ">
                      <h5 class="text-dark text-uppercase "> {{auth()->user()->getRoleNames()->implode(', ')}} </h5>
                    </div>
                    <div class="col-lg-3 ">
                      <p class="text-dark ">  <span class="font-weight-bold mr-3 text-uppercase">Email:</span>  {{auth()->user()->email }}</p>
                    </div>
                    <div class="col-lg-3 ">
                      <p class="text-dark ">  <span class="font-weight-bold mr-3 text-uppercase">Cédula | Pasaporte</span>  {{auth()->user()->dni }}</p>
                    </div>
                </div>
                </div>
              </div>
            </div>
        </div>
        @endrole
      </div>
    </div>
</main>

@endsection
