@extends('layouts.layout')
@section('title', ' Usuario |')
@section('content')

<main class="c-main">
<div class="container-fluid">
    <div class="fade-in">
      <div class="card border-0 shadow-lg">
          <div class="row">
            <div class="col-lg-12 bg-primary " style="height: 200px">
                  <div class="cover-body mt-5 ">
                      <img style="border: solid #e5e6e7 5px" class="rounded-circle ml-3" width="115px" src="/uploads/avatars/{{auth()->user()->avatar }}" alt="perfil">
                  </div>
            </div>

            <div class="col-lg-12 bg-light" >
              <div class="header-links mt-3 ml-3">
                <div class="row">
                  <div class="col-lg-3 ">
                    <h5 class="d-flex  text-uppercase text-dark">{{$user->nombre}} {{$user->apellido}}</h5>
                  </div>
                  <div class="col-lg-9">
                    <div class="float-right">
                      <ul class="d-flex  text-dark">
                        <li class="header-link-item d-flex align-items-center active"> <i class="fas fa-home ml-4 mr-2 d-none d-md-block"></i> <a class=" mr-2  text-dark" href="{{route('users.show', auth()->user())}}">Inicio</a> </li>
                        <li class="header-link-item border-left d-flex align-items-center"> <i class=" fas fa-user ml-4 mr-2 d-none d-md-block"></i> <a class="mr-2  text-dark" href="#">Friends</a> </li>
                        <li class="header-link-item border-left d-flex align-items-center"> <i class="fas fa-star ml-4 mr-2 d-none d-md-block"></i> <a class="mr-2  text-dark" href="#">Asignaturas</a> </li>
                        <li class="header-link-item border-left d-flex align-items-center"> <i class="fas fa-calendar ml-4 mr-2 d-none d-md-block"></i> <a class="mr-2  text-dark" href="{{route('horarioclases.index', auth()->user())}}">Mi horario</a> </li>
                        <li class="header-link-item border-left d-flex align-items-center"> <i class="fas fa-user-circle ml-4 mr-2 d-none d-md-block"></i> <a class="mr-2  text-dark" href="/profile">Avatar</a> </li>
                      </ul>
                    </div>
                  </div>
              </div>
              </div>
            </div>
          </div>
      </div>

        <div class="row">
              <div class="col-lg-4 ">
                <div class="card  shadow-lg">
                  <div class="card-body">
                    <div class="d-flex justify-content-between aling-items-end ">
                        <h4 class=" text-muted font-weight-bold align-self-center text-black vertical-align-inherit"> PERFIL <span class="text-muted ml-1 text-center  text-uppercase small"> {{$user->getRoleNames()->implode(', ')}} </span></h4>
                        <a href="{{route('users.edit', $user)}}" class="ml-2 btn btn-sm btn-outline-dark align-self-center vertical-align-inherit text-center"><i class="mr-2 fas fa-pencil-alt "></i>Editar</a>
                    </div>
                    <hr class="bg-dark" style=" border-top: dotted 1px">
                    <div class="form group pt-3">
                      <strong class="font-weight-bold "> EMAIL: </strong> <p>{{$user->email}} </p>
                    </div>

                    <div class="form group pt-3">
                      <strong class="font-weight-bold "> CEDULA/PASAPORTE: </strong> <p>{{$user->dni}} </p>
                    </div>

                 </div>
                </div>
              </div>

              {{-- <div class="col-sm-4">
                <div class="card  shadow-lg">
                    <div class="card-header bg-primary">
                      <h4 class=" text-light"><i class="fas fa-user"></i> <span class="text-value">ROLES</span> </h4>
                    </div>
                  <div class="card-body">

                               @forelse ($user->roles as $role)
                                <strong>{{$role->name}}</strong>

                                @if ($role->permissions->count())
                                <br>
                                <small class="text-muted">
                                    Permisos: <br> {{$role->permissions->pluck('name')->implode(', ')}}
                                    </small>
                                @endif

                                @unless ($loop->last)
                                    <hr>
                                @endunless

                                @empty
                                <small class="text-muted">No tiene roles asignados</small>

                               @endforelse
                  </div>
                </div>
              </div>
              <div class="col-sm-4">
                <div class="card shadow-lg">
                    <div class="card-header bg-primary">
                      <h4 class=" text-light"><i class="fas fa-user"></i> <span class="text-value">PERMISOS</span> </h4>
                    </div>
                  <div class="card-body">
                    @forelse ($user->permissions as $permission)
                    <strong>{{$permission->name}}</strong>

                    @unless ($loop->last)
                        <hr>
                    @endunless
                    @empty
                        <small class="text-muted">No tiene permisos asignados</small>
                   @endforelse
                  </div>
                </div>
              </div> --}}

              <div class="col-lg-8">
                  @yield('profile')
              </div>

        </div>
    </div>
</div>
</main>
@endsection
