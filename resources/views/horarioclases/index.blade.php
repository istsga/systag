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
                        {{-- @can('create', new App\Models\Horario)
                            <a class=" btn btn-primary " href="{{route('horarios.create')}}"> <i class=" font-weight-bold fas fa-plus mr-1"></i>Agregar</a>
                        @endcan --}}
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
                                            {{-- @foreach ($periodacademicos as $periodacademico)
                                                <option  value="{{$periodacademico->id}}"
                                                    {{$query==$periodacademico->id ? 'selected' : '' }}
                                                    >{{$query.'+'.$periodacademico->periodo}}</option>
                                            @endforeach --}}
                                        </select>
                                        @error ('periodacademicos') <span class="invalid-feedback" role="alert"> <strong>{{$message}}</strong></span> @enderror
                                        <button class=" btn  btn-sm btn-primary ml-1 " type="submit"> <i class="fas fa-search"></i></button>
                                    </div>

                                </div>

                                <div class="form-group col-lg-7">
                                        <label for="asignacione_id" class="col-form-label font-weight-bold text-muted small"> CARRERA |  PERIODO | SECCION | PARALELO
                                        </label>
                                        <div class="input-group">
                                            <div class="input-group-prepend "><span class=" input-group-text">
                                                <i class=" text-primary fas fa-layer-group"></i></span></div>
                                            <select name="carrera_id" id="carrera_id" class=" form-control ">
                                                <option class="form-control" value="">Seleccionar</option>
                                                    {{-- @foreach ($carreras as $carrera)
                                                        <option  value="{{$carrera->id}}"
                                                        {{$queryCarrera==$carrera->id ? 'selected' : '' }}
                                                        >{{$carrera->id}} {{$carrera->nombre}}</option>
                                                    @endforeach --}}
                                            </select>
                                            <button class=" btn  btn-sm btn-primary ml-1 " type="submit"> Ver Horarios</button>
                                        </div>
                                </div>
                            </div>
                        </div>
                    </form>
                </div>

            </div>
            <div class="col-md-12">
               <div class="card card-accent-primary shadow-lg">
                {{-- @if (count($horarios) > 0) --}}
                <div class="card-header bg-primary  d-flex justify-content-between aling-items-end ">
                    <font class=" text-light align-self-center text-black vertical-align-inherit "> <i class="font-weight-bold fas fa-calendar-alt mr-3"></i> HORARIO DE CLASE </font>
                        {{-- <a class=" btn btn-primary " href="{{route('reporteHorarioE', $query.'_'.$queryCarrera)}}"> <i class=" font-weight-bold fas fa-file-pdf mr-1"></i>Reporte PDF</a> --}}
                </div>
                <div class="card-table  table-responsive">
                    <table class="table table-hover  table-bordered align-middle">
                        <thead class="thead-light ">
                            <tr>
                                <th class="text-center align-middle"><font>HORA</font></th>
                                <th class="text-center align-middle"><font>Lunes</font></th>
                                <th class="text-center align-middle"><font >Martes</font></th>
                                <th class="text-center align-middle"><font >Miércoles</font></th>
                                <th class="text-center align-middle"><font >Jueves</font></th>
                                <th class="text-center align-middle"><font >Viernes</font></th>
                            </tr>
                        </thead>
                        <tbody>
                            <tr>
                                <td class="text-center table-secondary align-middle text-dark">8:30 a <br>9:30 </td>
                                <td class=" table-secondary  align-middle text-dark">Asignatura 1  <hr class=" mt-2 mb-1 bg-primary"><span class="text-muted small">Profesor:</span> </td>
                                <td class="table-secondary align-middle text-dark ">Asignatura 2  <hr class=" bg-primary mt-2 mb-1"><span class=" text-muted small">Profesor:</span> </td>
                                <td class="table-secondary align-middle text-dark ">Asignatura 3  <hr class=" bg-primary mt-2 mb-1"> <span class=" text-muted small">Profesor:</span> </td>
                                <td class="table-secondary align-middle text-dark ">Asignatura 4  <hr class=" bg-primary mt-2 mb-1"> <span class=" text-muted small">Profesor:</span> </td>
                                <td class="table-secondary align-middle text-dark ">Asignatura 5 <hr class=" bg-primary mt-2 mb-1"> <span class="text-muted small"> Profesor:</span> </td>
                            </tr>
                            <tr>
                                <td class="text-center table-secondary align-middle text-dark">8:30 a <br>9:30 </td>
                                <td class=" table-secondary  align-middle text-dark">Asignatura 1  <hr class=" mt-2 mb-1 bg-primary"><span class=" text-muted small">Profesor:</span> </td>
                                <td class="table-secondary align-middle text-dark ">Asignatura 2  <hr class=" bg-primary mt-2 mb-1"><span class=" text-muted small">Profesor:</span> </td>
                                <td class="table-secondary align-middle text-dark ">Asignatura 3  <hr class=" bg-primary mt-2 mb-1"> <span class=" text-muted small">Profesor:</span> </td>
                                <td class="table-secondary align-middle text-dark ">Asignatura 4  <hr class=" bg-primary mt-2 mb-1"> <span class=" text-muted small">Profesor:</span> </td>
                                <td class="table-secondary align-middle text-dark ">Asignatura 5 <hr class=" bg-primary mt-2 mb-1"> <span class="text-muted small"> Profesor:</span> </td>
                            </tr>
                    </table>
                </div>
                <div class="col-lg-12">
                    <p class="font-weight-bold text-muted">FECHA DE ACTIVIDADES ACADÉMICAS</p>
                    <hr class="bg-secondary" style=" border-top: dotted 1px">
                    <div class="row">
                        <div class="form-group col-lg-3 align-middle">
                            <p class="font-weight-bold text-muted"> Inicio : <span class="font-weight-normal"> 19-08-2021</span></p>
                        </div>
                        <div class="form-group col-lg-3 align-middle">
                            <p class="font-weight-bold text-muted"> Final : <span class="font-weight-normal"> 19-08-2021</span></p>
                        </div>
                        <div class="form-group col-lg-3 align-middle">
                            <p class="font-weight-bold text-muted">Examen Principal : <span class="font-weight-normal"> 19-08-2021</span></p>
                        </div>
                        <div class="form-group col-lg-3 ">
                            <p class="font-weight-bold text-muted">Examen Suspensión : <span class="font-weight-normal"> 19-08-2021</span></p>
                        </div>
                    </div>
                </div>
                {{-- @else
                        <em class=" mt-2 mb-2 ml-3 text-muted">No tienes registros.</em>
                @endif --}}
               </div>
            </div>
        </div>
    </div>
</div>
</main>
@endsection
