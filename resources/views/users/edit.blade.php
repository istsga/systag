@extends('layouts.layout')
@section('title', ' Usuario |')
@section('content')

<main class="c-main">
<div class="container-fluid">
    <div class="fade-in">
        @include('partials.success')
        <div class="row justify-content-center">

              <div class="col-lg-4">
                <div class="card shadow-lg">
                    <div class="card-header bg-primary">
                        <h4 class=" text-light"><i class="fas fa-user mr-3"></i> <span class="text-value">MI PERFIL</span> </h4>
                    </div>
                  <div class="card-body">
                    <form method="POST" enctype="multipart/form-data" action="{{route('users.update', $user)}} ">
                        @csrf @method('PUT')
                        <div class="form-group">
                            <label for="dni" class="col-form-label font-weight-bold text-muted">Cédula | Pasaporte
                                <span class="text-primary">*</span></label>
                            <div class="input-group">
                                <input type="text" class="form-control @error('dni') is-invalid @enderror"
                                name="dni" value="{{old('dni', $user->dni)}}" placeholder="Identificación">
                                <div class="input-group-prepend "><span class=" input-group-text">
                                    <i class=" text-primary fas fa-id-card"></i></span></div>
                                @error ('dni') <span class="invalid-feedback" role="alert"> <em>{{$message}}</span></em> @enderror
                            </div>
                        </div>
                        <div class="form-group ">
                            <label for="nombre" class="col-form-label font-weight-bold text-muted">Nombres
                                <span class="text-primary">*</span></label>
                            <div class="input-group">
                                <input id="nombre" type="text" class="form-control @error('nombre') is-invalid @enderror"
                                name="nombre" value="{{old('nombre', $user->nombre)}}" placeholder="Nombres" >
                                <div class="input-group-prepend "><span class=" input-group-text">
                                    <i class=" text-primary fas fa-user"></i></span></div>
                                @error ('nombre') <span class="invalid-feedback" role="alert"> <em>{{$message}}</span></em> @enderror
                            </div>
                        </div>
                        <div class="form-group">
                            <label for="apellido" class="col-form-label font-weight-bold text-muted">Apellidos
                                <span class="text-primary">*</span></label>
                            <div class="input-group">
                                <input id="apellido" type="text" class="form-control @error('apellido') is-invalid @enderror"
                                name="apellido" value="{{old('apellido', $user->apellido)}}" placeholder="Apellidos" >
                                <div class="input-group-prepend "><span class=" input-group-text">
                                    <i class=" text-primary fas fa-user"></i></span></div>
                                @error ('apellido') <span class="invalid-feedback" role="alert"> <em>{{$message}}</span></em> @enderror
                            </div>
                        </div>

                        <div class="form-group">
                            <label for="email" class="col-form-label font-weight-bold text-muted">E-Mail
                                <span class="text-primary">*</span></label>
                            <div class="input-group">
                                <input id="email" type="email" class="form-control @error('email') is-invalid @enderror"
                                name="email" value="{{old('email', $user->email)}}" placeholder="Correo Electrónico" >
                                <div class="input-group-prepend "><span class=" input-group-text">
                                    <i class=" text-primary fas fa-envelope"></i></span></div>
                                @error ('email') <span class="invalid-feedback" role="alert"> <em>{{$message}}</span></em> @enderror
                            </div>
                        </div>

                        @if (auth()->user()->id == $user->id)

                            <div class="form-group">
                                <label for="password" class="col-form-label font-weight-bold text-muted">Contraseña</label>
                                <div class="input-group">
                                    <input id="password" type="password" class="form-control @error('password') is-invalid @enderror"
                                    name="password" placeholder="Contraseña">
                                    <div class="input-group-prepend "><span class=" input-group-text">
                                        <i class=" text-primary fas fa-lock"></i></span></div>
                                    @error ('password') <span class="invalid-feedback" role="alert"> <em>{{$message}}</span> </em> @enderror
                                </div>
                                <em class="help-block">Dejar en blanco si no quieres cambiar la contraseña</em>

                            </div>

                            <div class="form-group">
                                <label for="password-confirmation" class="col-form-label font-weight-bold text-muted">Repite contraseña</label>
                                <div class="input-group ">
                                    <input  type="password" class="form-control @error('password_confirmation') is-invalid @enderror"
                                    name="password_confirmation" placeholder="Repite contraseña">
                                    <div class="input-group-prepend "><span class=" input-group-text">
                                        <i class=" text-primary fas fa-lock"></i></span></div>
                                    @error ('password_confirmation') <span class="invalid-feedback" role="alert"> <em>{{$message}}</span></em> @enderror
                                </div>
                            </div>
                            @else
                            <em> </em>
                          @endif

                        <div class="form-actions mt-4">
                            <button class=" col-4 btn btn-primary" type="submit">Guardar</button>
                        </div>
                    </form>
                  </div>
                </div>
              </div>
              @role('Administrador')
              <div class="col-sm-5">
                <div class="card  shadow-lg">
                    <div class="card-header bg-primary">
                        <h4 class=" text-light"><i class="fas fa-user-lock"></i> <span class="text-value">ROLES</span> </h4>
                    </div>

                  <div class="card-body">

                      @role('Administrador')
                        <form method="POST" action="{{route('users.roles.update', $user)}}">
                            @csrf @method('PUT')
                            @include('users.partials.roleCheckbox')
                            <button class="btn btn-primary col-sm-6">Actualizar roles</button>
                        </form>
                      @else
                        <ul class="list-group">
                            @forelse ($user->roles as $role)
                                <li class="list-group-item">{{$role->name}}</li>
                            @empty
                                <li class="list-group-item">No tienes roles</li>
                            @endforelse
                        </ul>
                      @endrole

                  </div>
                </div>
              </div>

              <div class="col-sm-3">
                <div class="card  shadow-lg">
                    <div class="card-header bg-primary">
                        <h4 class=" text-light"><i class="fas fa-unlock-alt mr-3"></i> <span class="text-value">PERMISOS</span> </h4>
                    </div>
                  <div class="card-body">

                    @role('Administrador')
                    <form method="POST" action="{{route('users.permisos.update', $user)}}">
                        @csrf @method('PUT')
                        @include('users.partials.permissionCheckbox', ['model'=>$user])

                        <button class="btn btn-primary btn-block">Actualizar permisos</button>
                    </form>
                    @else
                        <ul class="list-group">
                            @forelse ($user->permissions as $permission)
                                <li class="list-group-item">{{$permission->name}}</li>

                            @empty
                                <li class="list-group-item">No tienes permisos</li>
                            @endforelse
                        </ul>
                    @endrole

                  </div>
                </div>
              </div>
              @endrole

        </div>
    </div>
</div>
</main>
@endsection
