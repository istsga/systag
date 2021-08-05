@extends('layouts.layout')
@section('title', ' Notas |')
@section('content')

<main class="c-main">
<div class="container-fluid">
    <div class="fade-in">
        @include('partials.success')
        <div class="row">
            <div class="col-md-12">
                <div class="card card-accent-primary shadow-lg">
                    <div class="card-header bg-primary  d-flex justify-content-between aling-items-end ">
                        <font class=" text-light align-self-center text-black vertical-align-inherit "> <i class="font-weight-bold fas fa-star mr-3"></i> CALIFICACIONES </font>
                            @can('create', new App\Models\Calificacione)
                                <a class=" btn btn-primary " href="{{route('calificaciones.create')}}"> <i class=" font-weight-bold fas fa-plus mr-1"></i>Agregar</a>
                            @endcan
                    </div>
                    <form action="">
                        <div class="card-body bg-light">
                            <div class="row">

                                <div class="form-group col-lg-5">
                                    <label for="periodacademico_id" class="col-form-label font-weight-bold text-muted  small">PERIODO ACADÉMICO</label>
                                    <div class="input-group">
                                        <div class="input-group-prepend "><span class=" input-group-text">
                                            <i class=" text-primary fas fa-calendar-check"></i></span></div>
                                        <select name="periodacademico_id" id="periodacademico_id" class="form-control  @error('periodacademicos') is-invalid @enderror">
                                            <option value="" class="form-control  ">Seleccionar</option>
                                            @foreach ($periodacademicos as $periodacademico)
                                                <option  value="{{$periodacademico->id}}"
                                                    {{$query==$periodacademico->id ? 'selected' : '' }}
                                                    >{{$query.''.$periodacademico->periodo}}</option>
                                            @endforeach
                                        </select>
                                        @error ('periodacademicos') <span class="invalid-feedback" role="alert"> <strong>{{$message}}</strong></span> @enderror
                                        <button class=" btn  btn-sm btn-primary ml-1 " type="submit"> <i class="fas fa-search"></i></button>
                                    </div>

                                </div>

                                <div class="form-group col-lg-7">
                                        <label for="asignacione_id" class="col-form-label font-weight-bold text-muted small">CARRERA | PERIODO | SECCIÓN | PARALELO
                                        </label>
                                        <div class="input-group">
                                            <div class="input-group-prepend "><span class=" input-group-text">
                                                <i class=" text-primary fas fa-layer-group"></i></span></div>
                                            <select name="asignacione_id" id="asignacione_id" class=" form-control ">
                                                <option class="form-control" value="">Seleccionar</option>

                                                @foreach ($asignaciones as $asignacione)
                                                    <option  value="{{$asignacione->id}}"
                                                        {{$queryAsignacione==$asignacione->id ? 'selected' : '' }}
                                                        >{{$asignacione->id}} {{$asignacione->carreras->pluck('nombre')->implode(', ')}}
                                                        {{$asignacione->periodo->nombre}}
                                                        {{$asignacione->seccione->nombre}} -
                                                        {{$asignacione->paralelo->nombre}}
                                                    </option>
                                                @endforeach
                                            </select>
                                            <button class=" btn  btn-sm btn-primary ml-1 " type="submit"> <i class="fas fa-search"></i></button>
                                        </div>
                                </div>

                                <div class="col-lg-8">
                                        <label for="asignacione_id" class="col-form-label font-weight-bold text-muted small">ASIGNATURAS </label>
                                        <div class="input-group">
                                            <div class="input-group-prepend "><span class=" input-group-text">
                                                <i class=" text-primary fas fa-book"></i></span></div>
                                            <select name="asignatura_id" id="asignatura_id" class=" form-control">
                                                <option class="form-control" value="">Seleccionar</option>
                                                @foreach ($asignaturas as $asignatura)
                                                    <option  value="{{$asignatura->asignatura_id}}"
                                                        {{$queryAsignatura==$asignatura->asignatura_id ? 'selected' : '' }}
                                                        >{{$queryAsignacione.'-'.$asignatura->nombre}}</option>
                                                @endforeach
                                            </select>
                                            <button class="btn btn-primary ml-1 " type="submit"> Ver Estudiantes </button>
                                        </div>

                                    </div>
                                </div>
                            </div>
                        </div>
                </div>
            </div>

            <div class="card card-accent-primary shadow-lg">

                @if (count($calificaciones) > 0)
                <div class="card-header bg-primary  d-flex justify-content-between aling-items-end ">
                    <font class=" text-light align-self-center text-black vertical-align-inherit "> <i class="font-weight-bold far fa-user mr-3"></i> ALUMNOS </font>
                        <a class=" btn btn-primary " href="{{route('reporteCalificacion', $queryAsignacione.'_'.$queryAsignatura)}}"> <i class=" font-weight-bold fas fa-file-pdf mr-1"></i>Reporte PDF</a>
                </div>
                <div class="card-table  table-responsive">
                    <table class="table table-hover  table-bordered align-middle">
                        <thead class="thead-light">
                            <tr>
                                <th class="text-center align-middle "><font>Nro</font></th>
                                <th class="align-middle"><font>NOMBRES Y APELLIDOS</font></th>
                                <th class="text-center align-middle"><font>Acción</font></th>
                            </tr>
                        </thead>
                        <tbody>
                            @foreach ($calificaciones as $index => $calificacione)
                            <tr>
                                <td class="text-center align-middle" >{{$index+1}} </td>
                                <td class="align-middle" >{{$calificacione->estudiante->nombre}} {{$calificacione->estudiante->apellido}}</td>

                                <td class="align-middle">
                                    <div class=" form-inline justify-content-center px-4 ">
                                        @can('update', $calificacione)
                                            <a class=" btn btn-sm  btn-primary mr-3 mt-2" href="{{route('calificaciones.edit', $calificacione)}}"><i class="fas fa-pencil-alt"></i></a>
                                        @endcan

                                        @can('delete', $calificacione)
                                            <form method="POST"
                                             action="{{route('calificaciones.destroy', $calificacione )}}">
                                                @csrf @method('DELETE')
                                                <button class=" btn btn-sm btn-danger mr-3 mt-2"
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
</main>
@endsection
