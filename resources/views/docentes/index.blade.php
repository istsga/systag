@extends('layouts.layout')
@section('title', ' Docentes |')
@section('content')

<main class="c-main">
<div class="container-fluid">
    <div class="fade-in">
        @include('partials.success')
        <div class="row">
            <div class="col-lg-12">
                <div class="card  shadow-lg">
                    <div class="card-header bg-primary  d-flex justify-content-between aling-items-end ">
                        <font class=" text-light align-self-center text-black vertical-align-inherit "> <i class=" fas fa-user-friends mr-3"></i> DOCENTES </font>
                        @can('create', new App\Models\Docente)
                            <a class=" btn btn-primary " href="{{route('docentes.create')}}"> <i class=" font-weight-bold fas fa-plus mr-1"></i>Agregar</a>
                        @endcan
                    </div>
                @if (Count($docentes) > 0)
                    <div class="card-header d-flex justify-content-between aling-items-end">

                        <form class="col-lg-12 px-0 my-2 my-lg-0 no-waves-effect">
                            <div class="input-group">
                                <input type="search" name="search" class="form-control" placeholder="Buscar..." aria-label="Buscar..." aria-describedby="basic-addon2">
                                <div class="input-group-append">
                                    <button class="btn btn-primary btn-gradient waves-effect waves-light" type="submit"><span class="gradient"><font style="vertical-align: inherit;">Buscar</font></span></button>
                                </div>
                            </div>
                        </form>
                    </div>

                    <div class="card-table  table-responsive">
                        <table class="table table-hover  table-bordered align-middle">
                            <thead class="thead-light">
                                <tr>
                                    <th class="text-center align-middle"><font>Nro</font></th>
                                    <th class="align-middle"><font>Cédula | Pasaporte</font></th>
                                    <th class="align-middle"><font>Nombres y Apellidos</font></th>
                                    <th class="align-middle"><font>Email</font></th>
                                    <th class="align-middle"><font>Contactos</font></th>
                                    <th class="align-middle"><font>Estado</font></th>
                                    <th class="text-center align-middle"><font>Acción</font></th>
                                </tr>
                            </thead>
                            <tbody style=" border: dotted 1px">
                                @foreach ($docentes as $docente)
                                <tr>
                                <td class="text-center align-middle" >{{$docente->id}} </td>
                                <td class="text-center align-middle" >{{$docente->dni}} </td>
                                <td class="align-middle" >{{$docente->nombre}} {{$docente->apellido}}  </td>
                                <td class="align-middle">{{$docente->email}} </td>
                                <td class="align-middle">{{$docente->telefono_fijo}} | {{$docente->telefono_movil}}</td>
                                    @if ($docente->estado==1)
                                        <td class="align-middle"> <span class="badge badge-primary">Activo</span> </td>
                                    @else
                                        <td class="align-middle"> <span class="badge badge-danger">Inactivo</span>  </td>
                                    @endif
                                <td class="align-middle">
                                    <div class=" form-inline justify-content-center ">
                                        @can('update', $docente)
                                         <a class=" btn btn-sm   btn-primary mr-3 mt-2 " href="{{route('docentes.edit', $docente)}}"><i class="fas fa-pencil-alt"></i></a>
                                        @endcan

                                        <a class=" btn  btn-sm  btn-dark mr-3  mt-2 " href="{{route('docentes.show', $docente)}}"><i class="fas fa-eye"></i></a>

                                        @can('delete', $docente)
                                            <form class="mr-3 mt-2  " method="POST"
                                                action="{{route('docentes.destroy', $docente )}}">
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
                    <nav class="  d-flex justify-content-end">
                        {{ $docentes->links() }}
                    </nav>
            </div>
            @else
            <em class=" mt-2 mb-2 ml-3 text-muted">No tienes registros.</em>
            @endif
        </div>
    </div>
</div>
</main>
@endsection
