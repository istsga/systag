@extends('layouts.layout')
@section('title', ' Roles |')
@section('content')

<main class="c-main">
<div class="container-fluid">
    <div class="fade-in">
        @include('partials.success')
        <div class="row">
            <div class="col-md-12">
                <div class="card shadow-lg">

                    <div class="card-header bg-primary  d-flex justify-content-between aling-items-end ">
                        <font class=" text-light align-self-center text-black vertical-align-inherit "> <i class="font-weight-bold fas fa-user-shield mr-3"></i> ROLES </font>
                        @can('create', new Spatie\Permission\Models\Role)
                            <a class=" btn btn-primary " href="{{route('roles.create')}}"> <i class=" font-weight-bold  fas fa-plus mr-1"></i>Agregar</a>
                        @endcan
                    </div>
                    @if (count($roles) > 0)
                    <div class="card-table  table-responsive">
                        <table class="table table-hover  table-bordered align-middle">
                            <thead class="thead-light">
                                <tr>
                                    <th class="text-center"><font style="vertical-align: inherit;">Nro</font></th>
                                    <th><font style="vertical-align: inherit;">Nombre</font></th>
                                    <th><font style="vertical-align: inherit;">Identificador</font></th>
                                    <th><font style="vertical-align: inherit;">Permisos</font></th>
                                    <th class="text-center"><font style="vertical-align: inherit;">Acción</font></th>
                                </tr>
                            </thead>
                            <tbody>
                                @foreach ($roles as $role)
                                <tr>
                                <td class="text-center" >{{$role->id}} </td>
                                <td >{{$role->name}}</td>
                                <td >{{$role->display_name}}</td>
                                <td >{{$role->permissions->pluck('name')->implode(' ,  ')}} </td>

                                <td>
                                    <div class=" form-inline justify-content-center px-4 ">
                                        @can('update', $roles->first())
                                        <a class=" btn  btn-sm btn-primary mr-3 mt-2 " href="{{route('roles.edit', $role)}}"><i class="fas fa-pencil-alt"></i></a>
                                        @endcan

                                        @can('create', $roles->first())

                                            @if ($role->id !==1)
                                                <form class="mr-3 mt-2 " method="POST"
                                                    action="{{route('roles.destroy', $role )}}">
                                                    @csrf @method('DELETE')
                                                    <button class=" btn btn-sm btn-danger"
                                                        onclick="return confirm('¿Estas Seguro de Eliminar?')">
                                                        <i class="fas fa-trash-alt"></i>
                                                    </button>
                                                </form>
                                            @endif
                                        @endcan
                                    </div>
                                </td>
                                </tr>
                            @endforeach
                            </tbody>
                        </table>
                    </div>
                    @else
                        <em class=" mt-2 mb-2 ml-3 text-muted">Roles no disponibles.</em>
                    @endif
                </div>
            </div>
        </div>
    </div>
</div>
</main>
@endsection
