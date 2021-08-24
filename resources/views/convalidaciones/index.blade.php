@extends('layouts.layout')
@section('title', ' Convalidaciones |')
@section('content')

<main class="c-main">
<div class="container-fluid">
    <div class="fade-in">
        @include('partials.success')
        <div class="row">
            <div class="col-md-12">
                <div class="card shadow-lg">
                    <div class="card-header bg-primary  d-flex justify-content-between aling-items-end ">
                        <font class=" text-light align-self-center text-black vertical-align-inherit "> <i class="font-weight-bold cil-folder mr-3"></i> CONVALIDACIONES </font>
                        @can('create', new App\Models\Convalidacione)
                            <a class=" btn btn-primary " href="{{route('convalidaciones.create')}}"> <i class=" font-weight-bold fas fa-plus mr-1"></i>Agregar</a>
                        @endcan
                    </div>

                    @if (count($convalidaciones) > 0)

                    <div class="card-header d-flex justify-content-between aling-items-end">
                            <form class="col-lg-12 px-0 my-2 my-lg-0 no-waves-effect">
                                <div class="input-group">
                                    <input name="search" type="search" class="form-control" placeholder="Buscar..." aria-label="Buscar..." aria-describedby="basic-addon2">
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
                                    <th class="align-middle"><font>ESTUDIANTE</font></th>
                                    <th class="align-middle"><font>Asignaturas</font></th>
                                    <th class="align-middle"><font>Nota Final</font></th>
                                    <th class="text-center align-middle"><font>Acción</font></th>
                                </tr>
                            </thead>
                            <tbody>
                                @foreach ($convalidaciones as $convalidacione)
                                <tr>
                                <td class="text-center align-middle" >{{$convalidacione->id}} </td>
                                <td class="align-middle">{{$convalidacione->estudiante->nombre}} {{$convalidacione->estudiante->apellido}} </td>
                                <td class="align-middle">{{$convalidacione->asignatura->nombre}}</td>
                                <td class="text-center align-middle">{{$convalidacione->nota_final}}</td>

                                <td class="align-middle">
                                    <div class=" form-inline justify-content-center px-4 ">
                                        @can('update', $convalidacione)
                                            <a class=" btn btn-sm   btn-primary mr-3 mt-2" href="{{route('convalidaciones.edit', $convalidacione)}}"><i class="fas fa-pencil-alt"></i></a>
                                        @endcan

                                        @can('delete', $convalidacione)
                                            <form class="mr-3 mt-2 " method="POST"
                                                action="{{route('convalidaciones.destroy', $convalidacione )}}">
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
                        {{ $convalidaciones->links() }}
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

