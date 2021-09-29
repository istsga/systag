@extends('layouts.layout')
@section('title', ' Horarios|')
@section('content')

<main class="c-main">
<div class="container-fluid">
    <div class="fade-in">
        @include('partials.success')
        <div class="row">
            <div class="col-md-12">

                <div class="card card-accent-primary shadow-lg">
                    <div class="card-header bg-primary  d-flex justify-content-between aling-items-end ">
                        <font class=" text-light align-self-center text-black vertical-align-inherit "> <i class="font-weight-bold far fa-calendar-alt mr-3"></i> HORARIOS </font>
                        @can('create', new App\Models\Horario)
                            <a class=" btn btn-primary " href="{{route('horarios.create')}}"> <i class=" font-weight-bold fas fa-plus mr-1"></i>Agregar</a>
                        @endcan
                    </div>

                    <form action="">
                        <div class="card-body bg-light">
                            <div class="row">
                                <div class="card col-lg-5 bg-light m-2 shadow-sm">
                                    <div class="form-group p-2 ">
                                        <label for="periodacademico_id" class="col-form-label font-weight-bold text-muted  small">PERIODO ACADÉMICO</label>
                                        <div class="input-group">
                                            <div class="input-group-prepend "><span class=" input-group-text">
                                                <i class=" text-primary fas fa-calendar-check"></i></span></div>
                                            <select name="periodacademico_id" id="periodacademico_id" class="form-control  @error('periodacademicos') is-invalid @enderror">
                                                <option value="" class="form-control  "> == Seleccionar ==</option>
                                                @foreach ($periodacademicos as $periodacademico)
                                                    <option  value="{{$periodacademico->id}}"
                                                        {{$query==$periodacademico->id ? 'selected' : '' }}
                                                        >{{$query.'+'.$periodacademico->periodo}}</option>
                                                @endforeach
                                            </select>
                                            @error ('periodacademicos') <span class="invalid-feedback" role="alert"> <strong>{{$message}}</strong></span> @enderror
                                            <button class=" btn  btn-sm btn-primary ml-1 " type="submit"> <i class="fas fa-search"></i></button>
                                        </div>
                                    </div>
                                </div>
                                <div class="col"></div>
                                <div class="card col-lg-6 bg-light m-2 shadow-sm">
                                <div class="form-group p-2 ">
                                        <label for="asignacione_id" class="col-form-label font-weight-bold text-muted small"> CARRERA |  PERIODO | SECCION | PARALELO
                                        </label>
                                        <div class="input-group">
                                            <div class="input-group-prepend "><span class=" input-group-text">
                                                <i class=" text-primary fas fa-layer-group"></i></span></div>
                                            <select name="carrera_id" id="carrera_id" class=" form-control ">
                                                <option class="form-control" value=""> == Seleccionar == </option>
                                                    @foreach ($carreras as $carrera)
                                                        <option  value="{{$carrera->id}}"
                                                        {{$queryCarrera==$carrera->id ? 'selected' : '' }}
                                                        >{{$carrera->id}} {{$carrera->nombre}}</option>
                                                    @endforeach
                                            </select>
                                            <button class=" btn  btn-primary ml-1 " type="submit"> <i class="fas fa-eye-slash"> </i> Ver  </button>
                                        </div>
                                </div>
                                </div>
                            </div>
                        </div>
                    </form>
                </div>

               <div class="card card-accent-primary shadow-lg">
                @if (count($horarios) > 0)
                <div class="card-header bg-primary  d-flex justify-content-between aling-items-end ">
                    <font class=" text-light align-self-center text-black vertical-align-inherit "> <i class="font-weight-bold fas fa-calendar-alt mr-3"></i> HORARIOS </font>
                        <a class=" btn btn-primary " href="{{route('reporteHorarioE', $query.'_'.$queryCarrera)}}"> <i class=" font-weight-bold fas fa-file-pdf mr-1"></i>Reporte PDF</a>
                </div>
                <div class="card-table  table-responsive">
                    <table class="table table-hover  table-bordered align-middle">
                        <thead class="thead-light">
                            <tr>
                                <th class="text-center align-middle"><font>Nro</font></th>
                                <th class="align-middle"><font>Periodo | Sección | Paralelo</font></th>
                                <th class="align-middle"><font >Asignatura</font></th>
                                <th class="align-middle"><font >Docente</font></th>
                                <th class="align-middle"><font >F. Inicio</font></th>
                                <th class="align-middle"><font >F. Fin</font></th>
                                <th class="align-middle"><font >Examen Principal</font></th>
                                <th class="align-middle"><font >Examen Suspensión</font></th>
                                <th class="text-center align-middle"><font>Acción</font></th>
                            </tr>
                        </thead>
                        <tbody>

                        @foreach ($horarios as $index => $horario)
                            <tr>
                                <td class="text-center align-middle" >{{$index+1}} </td>
                                <td class="align-middle">{{$horario->asignacione->periodo->nombre}} | {{$horario->asignacione->seccione->nombre}} | {{$horario->asignacione->paralelo->nombre}}</td>
                                <td class="align-middle">{{$horario->asignatura->nombre}} </td>
                                <td class="align-middle">{{$horario->nombredocente}} {{$horario->apellidodocente}}</td>
                                {{-- <td >{{$horario->asignatura->docentes->pluck('nombre')->implode(', ')}} {{$horario->asignatura->docentes->pluck('apellido')->implode(', ')}} </td> --}}
                                <td class="align-middle">{{$horario->fecha_inicio}}  </td>
                                <td class="align-middle">{{$horario->fecha_final}}  </td>
                                <td class="align-middle">{{$horario->fecha_examen}}  </td>
                                <td class="align-middle">{{$horario->fecha_suspension}}  </td>
                                <td class="align-middle">
                                    <div class=" form-inline justify-content-center px-4 ">

                                        @can('update', $horario)
                                            <a class=" btn btn-sm   btn-primary mr-3 mt-2" href="{{route('horarios.edit', $horario)}}"><i class="fas fa-pencil-alt"></i></a>
                                        @endcan

                                        @can('delete', $horario)
                                            <form class="mr-3 mt-2 " method="POST"
                                                action="{{route('horarios.destroy', $horario )}}">
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


