@extends('layouts.layout')
@section('title', ' Carrera |')
@section('content')

<main class="c-main">
<div class="container-fluid">
    <div class="fade-in">
        @include('partials.success')
        <div class="row">
            <div class="col-md-12">
                <div class="card card-accent-primary shadow-lg">
                    <div class="card-header bg-primary  d-flex justify-content-between aling-items-end ">
                        <font class=" text-light align-self-center text-black vertical-align-inherit "> <i class="font-weight-bold fas fa-graduation-cap mr-3"></i> CARRERAS </font>
                        @can('create', new App\Models\Carrera)
                            <a class=" btn btn-primary " href="{{route('carreras.create')}}"> <i class=" font-weight-bold fas fa-plus mr-1"></i>Agregar</a>
                        @endcan
                    </div>
                @if (count($carreras) > 0)
                    <div class="card-table  table-responsive">
                        <table class="table  table-hover  table-bordered align-middle">
                            <thead class="thead-light">
                                <tr>
                                    <th class="text-center"><font class="align-middle">Nro</font></th>
                                    <th><font class="align-middle">Código</font></th>
                                    <th><font class="align-middle">Nombre</font></th>
                                    <th><font class="align-middle">Título</font></th>
                                    <th><font class="align-middle">Periodos</font></th>
                                    <th><font class="align-middle">Estado</font></th>
                                    <th class="text-center"><font class="align-middle">Acción</font></th>
                                </tr>
                            </thead>
                            <tbody >
                            @foreach ($carreras as $carrera)
                                <tr >
                                <td class="text-center align-middle" >{{$carrera->id}} </td>
                                <td class="align-middle">{{$carrera->codigo}} </td>
                                <td class="align-middle">{{$carrera->nombre}} </td>
                                <td class="align-middle">{{$carrera->titulo}} </td>
                                <td class="align-middle">{{$carrera->numero_periodo}} </td>
                                @if ($carrera->condicion==1)
                                    <td class="align-middle"> <span class="badge badge-primary">Activo</span> </td>
                                @else
                                    <td class="align-middle"> <span class="badge badge-danger">Cerrado</span>  </td>
                                @endif

                                <td>
                                    <div class=" form-inline justify-content-center px-4  ">

                                        @can('update', $carrera)
                                            <a class=" btn btn-sm   btn-primary mr-3 mt-2" href="{{route('carreras.edit', $carrera)}}"><i class="fas fa-pencil-alt"></i></a>
                                        @endcan

                                        @can('delete', $carrera)
                                            <form class="mr-3 mt-2 " method="POST"
                                                action="{{route('carreras.destroy', $carrera )}}">
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
                    @else
                        <em class=" mt-2 mb-2 ml-3 text-muted">No tienes registros.</em>
                    @endif
                </div>
            </div>

        </div>
    </div>
</div>
</main>
@endsection
