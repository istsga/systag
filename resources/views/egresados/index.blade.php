@extends('layouts.layout')
@section('title', ' Egresados |')
@section('content')

<main class="c-main">
<div class="container-fluid">
    <div class="fade-in">

        <div class="card card-accent-primary shadow-lg">
            <div class="card-header bg-primary  d-flex justify-content-between aling-items-end ">
                <font class=" text-light align-self-center text-black vertical-align-inherit "> <i class="font-weight-bold fas fa-user-graduate mr-3"></i> EGRESADOS </font>
            </div>
            <div class="card-body bg-light">
                <form action="">
                    <div class="row m-2">
                        <div class="card col-lg-5 bg-light m-2 shadow-sm">
                        <div class="form-group p-2">
                            <label for="periodacademicos" class="col-form-label font-weight-bold text-dark text-muted small">PERIODO ACADÉMICO
                            </label>
                            <div class="input-group">
                                <div class="input-group-prepend "><span class=" input-group-text">
                                    <i class=" text-primary fas fa-calendar-check"></i></span></div>
                                <select name="periodacademico_id" class="form-control">
                                    <option value="" class="form-control "> == Seleccionar ­­­­­­== </option>
                                    @foreach ($periodacademicos as $periodacademico)
                                        <option  value="{{$periodacademico->id}}"
                                            {{$query_peraca==$periodacademico->id ? 'selected' : '' }}
                                            >{{$query_peraca.'+'.$periodacademico->periodo}}</option>
                                    @endforeach
                                </select>
                                    <button class=" btn  btn-sm btn-primary ml-1 " type="submit"> <i class="fas fa-search"></i></button>
                            </div>
                        </div>
                        </div>

                        <div class="col"></div>

                        <div class="card col-lg-6 bg-light m-2 shadow-sm">
                            <div class="form-group p-2">
                                <label for="asignacione_id" class="col-form-label font-weight-bold text-muted small"> CARRERA
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
                                    <button class=" btn  btn-primary ml-1 " type="submit"> <i class="fas fa-eye"></i> Ver </button>
                                </div>
                            </div>
                        </div>
                    </div>
                </form>
            </div>
        </div>

        <div class="card card-accent-primary shadow-lg">
            @if (count($alumnos) > 0)
            <div class="card-header bg-primary  d-flex justify-content-between aling-items-end ">
                <font class=" text-light align-self-center text-black vertical-align-inherit "> <i class="font-weight-bold far fa-user mr-3"></i> ALUMNOS </font>
                    <a class=" btn btn-primary " href="{{route('reporteEgresado',  $query_peraca.'_'.$queryCarrera)}}"> <i class="fas fa-print font-weight-bold mr-1"></i>Imprimir</a>
            </div>
            <div class="card-table table-responsive">
                <table class="table table-hover  table-bordered align-middle">
                    <thead class="thead-light">
                        <tr>
                            <th class="text-center align-middle"><font>Nro</font></th>
                            <th class="align-middle"><font>Nombres y Apellidos</font></font></th>
                        </tr>
                    </thead>
                    <tbody>

                        @foreach ($alumnos as $index =>  $alumno)
                        @if($alumno->egresado==true)
                        <tr>
                        <td class="text-center align-middle" >{{$index+1}} </td>
                        <td class="align-middle" >{{$alumno->estudiante->nombre}} {{$alumno->estudiante->apellido}}</td>
                        </tr>
                        @endif
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
</main>
@endsection
