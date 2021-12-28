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
                        <font class=" text-light align-self-center text-black vertical-align-inherit "> <i class="font-weight-bold far fa-calendar-alt mr-3"></i> HORARIO DE CLASES </font>
                    </div>

                    <form action="">
                        <div class="card-body bg-light">
                            <div class="row m-2">
                                <div class="card col-lg-5 shadow-sm bg-light">
                                    <div class="form-group p-2 ">
                                        <label for="periodacademico_id" class="col-form-label font-weight-bold text-muted  small">PERIODO ACADÉMICO</label>
                                        <div class="input-group">
                                            <div class="input-group-prepend "><span class=" input-group-text">
                                                <i class=" text-primary fas fa-calendar-check"></i></span></div>
                                            <select name="periodacademico_id" id="periodacademico_id" class="form-control  @error('periodacademicos') is-invalid @enderror">
                                                <option value="" class="form-control  "> == Seleccionar == </option>
                                                @foreach ($periodacademicos as $periodacademico)
                                                    <option  value="{{$periodacademico->id}}"
                                                        {{$query==$periodacademico->id ? 'selected' : '' }}
                                                        >{{$periodacademico->periodo}}</option>
                                                @endforeach
                                            </select>
                                            @error ('periodacademicos') <span class="invalid-feedback" role="alert"> <strong>{{$message}}</strong></span> @enderror
                                            <button class=" btn  btn-sm btn-primary ml-1 " type="submit"> <i class="fas fa-search"></i></button>
                                        </div>
                                    </div>
                                </div>
                                <div class="col"></div>
                                <div class="card col-lg-6 shadow-sm bg-light">
                                    <div class="form-group p-2 ">
                                            <label for="asignacione_id" class="col-form-label font-weight-bold text-muted small"> CARRERA |  PERIODO | SECCION | PARALELO
                                            </label>
                                            <div class="input-group">
                                                <div class="input-group-prepend "><span class=" input-group-text">
                                                    <i class=" text-primary fas fa-layer-group"></i></span></div>
                                                <select name="asignacione_id" id="asignacione_id" class=" form-control ">
                                                    <option class="form-control" value=""> == Seleccionar == </option>

                                                    @foreach ($asignaciones as $asignacione)
                                                    <option  value="{{$asignacione->id}}"
                                                        {{$queryAsignacione==$asignacione->id ? 'selected' : '' }}
                                                        >{{$asignacione->carreras->pluck('nombre')->implode(', ')}} |
                                                        {{$asignacione->periodo->nombre}} |
                                                        {{$asignacione->seccione->nombre}} |
                                                        {{$asignacione->paralelo->nombre}}
                                                    </option>
                                                    @endforeach

                                                </select>
                                                <button class=" btn   btn-primary ml-1 " type="submit"> <i class="fas fa-eye-slash"> </i> Ver </button>
                                            </div>
                                    </div>
                                </div>

                            </div>
                        </div>
                    </form>
                </div>

            </div>
            <div class="col-md-12">
               <div class="card card-accent-primary shadow-lg bg-light">
                @if (count($horarios) > 0)
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
                            @foreach ($horarios1 as $horarios )
                            <tr>
                                <td class="align-middle">{{$horarios->hora_inicio}} - {{$horarios->hora_final}} </td>

                                <td class="align-middle">{{$horarios->lunesnombreasignatura}} <hr class=" mt-2 mb-1 bg-primary"><span class="text-muted small">Profesor: {{$horarios->lunesnombredocente}} {{$horarios->lunesapellidodocente}}</span> </td>

                                <td class="align-middle">{{$horarios->martesnombreasignatura}} <hr class=" bg-primary mt-2 mb-1"><span class=" text-muted small">Profesor: {{$horarios->martesnombredocente}} {{$horarios->martesapellidodocente}}</span> </td>

                                {{-- @if ($horarios->miercolesnombreasignatura!= 0) --}}
                                <td class="align-middle">{{$horarios->miercolesnombreasignatura}} <hr class=" bg-primary mt-2 mb-1"> <span class=" text-muted small">Profesor: {{$horarios->miercolesnombredocente}} {{$horarios->miercolesapellidodocente}}</span> </td>
                                {{-- @else
                                <p>datos</p>
                                @endif --}}
                                <td class="align-middle">{{$horarios->juevesnombreasignatura}} <hr class=" bg-primary mt-2 mb-1"> <span class=" text-muted small">Profesor: {{$horarios->juevesnombredocente}} {{$horarios->juevesapellidodocente}}</span> </td>
                                <td class="align-middle">{{$horarios->viernesnombreasignatura}} <hr class=" bg-primary mt-2 mb-1"> <span class="text-muted small"> Profesor: {{$horarios->viernesnombredocente}} {{$horarios->viernesapellidodocente}}</span> </td>
                            </tr>
                            @endforeach

                        </tbody>
                    </table>
                </div>
                <div class="col-lg-12">
                    {{-- <p class="font-weight-bold text-muted">FECHA DE ACTIVIDADES ACADÉMICAS</p> --}}
                    <div class="row small font-weight-bold ">
                        <div class="form-group col-lg-3 align-middle">
                            @foreach ($horarios1 as $horario)
                                {{$horario->fecha_inicio}}
                                {{$horario->fecha_final}}
                            @endforeach
                            <p class="font-weight-bold text-muted"> FI = Fecha Inicio</p>
                        </div>
                        <div class="form-group col-lg-3 align-middle">
                            <p class="font-weight-bold text-muted"> FF = Fecha Final </p>
                        </div>
                        <div class="form-group col-lg-3 align-middle">
                            <p class="font-weight-bold text-muted"> FEP = Fecha Examen Principal </p>
                        </div>
                        <div class="form-group col-lg-3 ">
                            <p class="font-weight-bold text-muted">FEX = Fecha Examen Suspensión </p>
                        </div>
                    </div>
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
