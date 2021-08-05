@extends('layouts.layout')
@section('title', ' Asignación|')
@section('content')

<main class="c-main">
<div class="container-fluid">
    <div class="fade-in">
        @include('partials.success')
        <div class="row">
            <div class="col-md-12">
                <div class="card shadow-lg">
                    <div class="card-header bg-primary  d-flex justify-content-between aling-items-end ">
                        <font class=" text-light align-self-center text-black vertical-align-inherit "> <i class="font-weight-bold fas fa-clone mr-3"></i> ASIGNACIONES </font>
                        @can('create', new App\Models\Asignacione)
                            <a class=" btn btn-primary " href="{{route('asignaciones.create')}}"> <i class=" font-weight-bold fas fa-plus mr-1"></i>Agregar</a>
                        @endcan
                    </div>
                @if (count($asignaciones) > 0)
                    <div class="card-header d-flex justify-content-between aling-items-end">
                        <form class="col-lg-12 px-0 my-2 my-lg-0 no-waves-effect">
                            <div class="input-group">
                                <input name="search" type="search" class="form-control" placeholder="Buscar..." aria-label="Buscar..." aria-describedby="basic-addon2">
                                <div class="input-group-append">
                                    <button class="btn btn-primary btn-gradient waves-effect waves-light" type="submit"><span class="gradient"><font style="vertical-align: inherit;">Buscar</span></span></button>
                                </div>
                            </div>
                        </form>

                    </div>

                    <div class="card-table  table-responsive">
                        <table class="table table-hover  table-bordered align-middle">
                            <thead class="thead-light">
                                <tr>
                                    <th class="text-center align-middle"><font >Nro</font></th>
                                    <th class="align-middle"><font>Periodo Académico</font></th>
                                    <th class="align-middle"><font>Carrera</font></th>
                                    <th class="align-middle"><font>Periodo</font></th>
                                    <th class="align-middle"><font>Sección</font></th>
                                    <th class="align-middle"><font>Paralelo</font></th>
                                    <th class="text-center align-middle"><font>Acción</font></th>
                                </tr>
                            </thead>
                            <tbody>
                                @foreach ($asignaciones as $asignacione)
                                <tr>
                                <td class="text-center align-middle" >{{$asignacione->id}} </td>
                                <td class="align-middle">{{$asignacione->periodacademicos->pluck('periodo')->implode(', ')}}</td>
                                <td class="align-middle">{{$asignacione->carreras->pluck('nombre')->implode(', ')}}</td>
                                <td class="align-middle">{{$asignacione->periodo->nombre}} </td>
                                <td class="align-middle">{{$asignacione->seccione->nombre}} </td>
                                <td class="align-middle">{{$asignacione->paralelo->nombre}} </td>

                                <td class="align-middle">
                                    <div class=" form-inline justify-content-center">
                                        @can('update', $asignacione)
                                            <a class=" btn btn-sm   btn-primary mr-3 mt-2" href="{{route('asignaciones.edit', $asignacione)}}"><i class="fas fa-pencil-alt"></i></a>
                                        @endcan

                                        @can('delete', $asignacione)
                                            <form class="mr-3 mt-2 " method="POST"
                                                action="{{route('asignaciones.destroy', $asignacione )}}">
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
                        {{ $asignaciones->links() }}
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
