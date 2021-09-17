@extends('layouts.layout')
@section('title', ' Usuario |')
@section('content')

<main class="c-main">
<div class="container-fluid">
    <div class="fade-in">
        @include('partials.success')
        <div class="row">
            <div class="col-md-12">
                <div class="card card-accent-primary ">
                    <div class="card-header bg-primary d-flex justify-content-between aling-items-end ">
                        <font class=" text-light align-self-center text-black vertical-align-inherit "> <i class="font-weight-bold fas fa-user-friends mr-3"></i> USUARIOS </font>
                        {{-- @can('create', $users->first()) --}}
                            <a class=" btn btn-primary " href="{{route('users.create')}}"> <i class=" font-weight-bold fas fa-plus mr-1"></i>Agregar</a>
                        {{-- @endcan  --}}
                    </div>
                    <div class="card-header d-flex justify-content-between aling-items-end">
                        <form class="col-lg-12 px-0 my-2 my-lg-0 no-waves-effect">
                            <div class="input-group">
                                <input type="text" class="form-control" placeholder="Buscar..." aria-label="Buscar..." aria-describedby="basic-addon2">
                                <div class="input-group-append">
                                    <button class="btn btn-primary btn-gradient waves-effect waves-light" type="button"><span class="gradient"><span class="gradient"><font style="vertical-align: inherit;"><font style="vertical-align: inherit;">Buscar</font></font></span></span></button>
                                </div>
                            </div>
                        </form>
                    </div>

                    <div class="card-table  table-responsive">
                        <table class="table table-hover  table-bordered align-middle">
                            <thead class="thead-light">
                                <tr>
                                    <th class="text-center"><font style="vertical-align: inherit;">Nro</font></th>
                                    <th><font style="vertical-align: inherit;">Cédula | Pasaporte</font></font></th>
                                    <th><font style="vertical-align: inherit;">Nombres y Apellidos</font></font></th>
                                    <th><font style="vertical-align: inherit;">Email</font></font></th>
                                    <th><font style="vertical-align: inherit;">Roles</font></font></th>
                                    <th class="text-center"><font style="vertical-align: inherit;">Acción</font></font></th>
                                </tr>
                            </thead>
                            <tbody>
                                @foreach ($users as $user)
                                <tr>
                                <td class="text-center align-middle" >{{$user->id}} </td>
                                <td class="align-middle">{{$user->dni}} </td>
                                <td class="align-middle">{{$user->nombre}} {{$user->apellido}}</td>
                                <td class="align-middle">{{$user->email}} </td>
                                <td class="align-middle">{{$user->getRoleNames()->implode(', ')}} </td>

                                <td>
                                    <div class=" form-inline justify-content-center px-4 ">
                                        @can('view', $user)
                                            <a class=" btn  btn-sm  btn-dark mr-3 mt-2 " href="{{route('users.show', $user)}}"> <i class="fas fa-eye-slash"></i></a>
                                        @endcan

                                        @can('update', $user)
                                            <a class=" btn btn-sm  btn-primary mr-3 mt-2 " href="{{route('users.edit', $user)}}"><i class="fas fa-pencil-alt"></i></a>
                                        @endcan

                                        @can('delete', $user)
                                            <form class="mr-3 mt-2 " method="POST"
                                                action="{{route('users.destroy', $user )}}">
                                                @csrf @method('DELETE')

                                                <button class=" btn btn-sm btn-danger"
                                                    onclick="return confirm('¿Estas Seguro de Eliminar?.')">
                                                    <i class="fas fa-trash-alt"></i>
                                                </button>
                                            </form>
                                        @endcan

                                    </div>
                                </td>
                                </tr>
                            @endforeach
                            </tbody>
                        </table>
                    </div>
                </div>
                <nav class="d-flex justify-content-end">
                    {{-- {{ $users->links() }} --}}
                </nav>
              </div>
            </div>
        </div>
    </div>
</div>
</main>
@endsection
