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
                            <div class="row">
                                <div class="form-group col-lg-5">
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

                                <div class="form-group col-lg-7">
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
                            @foreach ($horarios as $horario)
                            <tr>
                                <td class="text-center table-secondary align-middle text-dark">{{$horario->hora_inicio}} <br> {{$horario->hora_final}} </td>
                                @foreach ($horarios1 as $horario1)
                                @if($horario->hora_inicio==$horario1->hora_inicio and $horario->hora_final==$horario1->hora_final)

                                @if($horario1->lunesnombreasignatura)
                                <td class=" table-secondary  align-middle text-dark">{{$horario1->lunesnombreasignatura}}  <hr class=" mt-2 mb-1 bg-primary"><span class="text-muted small">Profesor: {{$horario1->lunesnombredocente}} {{$horario1->lunesapellidodocente}}</span> </td>
                                @endif
                                @if($horario1->martesnombreasignatura)
                                <td class="table-secondary align-middle text-dark ">{{$horario1->martesnombreasignatura}} <hr class=" bg-primary mt-2 mb-1"><span class=" text-muted small">Profesor: {{$horario1->martesnombredocente}} {{$horario1->martesapellidodocente}}</span> </td>
                                @endif
                                @if($horario1->miercolesnombreasignatura)
                                <td class="table-secondary align-middle text-dark ">{{$horario1->miercolesnombreasignatura}}  <hr class=" bg-primary mt-2 mb-1"> <span class=" text-muted small">Profesor: {{$horario1->miercolesnombredocente}} {{$horario1->miercolesapellidodocente}}</span> </td>
                                @endif

                                @if($horario1->juevesnombreasignatura )
                                <td class="table-secondary align-middle text-dark ">{{$horario1->juevesnombreasignatura }} <hr class=" bg-primary mt-2 mb-1"> <span class=" text-muted small">Profesor: {{$horario1->juevesnombredocente}} {{$horario1->juevesapellidodocente}}</span> </td>

                                @endif

                                @if($horario1->viernesnombreasignatura )
                                <td class="table-secondary align-middle text-dark ">{{$horario1->viernesnombreasignatura}}<hr class=" bg-primary mt-2 mb-1"> <span class="text-muted small"> Profesor: {{$horario1->viernesnombredocente}} {{$horario1->viernesapellidodocente}}</span> </td>
                                @endif

                                @endif
                                @endforeach
                            </tr>
                            @endforeach

                    </table>
                </div>
                <div class="col-lg-12">
                    <p class="font-weight-bold text-muted">FECHA DE ACTIVIDADES ACADÉMICAS</p>
                    <hr class="bg-secondary" style=" border-top: dotted 1px">
                    <div class="row">
                        <div class="form-group col-lg-3 align-middle">
                            <p class="font-weight-bold text-muted"> Inicio : <span class="font-weight-normal"> {{$horario->fecha_inicio}}</span></p>
                        </div>
                        <div class="form-group col-lg-3 align-middle">
                            <p class="font-weight-bold text-muted"> Final : <span class="font-weight-normal"> {{ $horario->fecha_final}}</span></p>
                        </div>
                        <div class="form-group col-lg-3 align-middle">
                            <p class="font-weight-bold text-muted">Examen Principal : <span class="font-weight-normal"> {{$horario->fecha_examen}}</span></p>
                        </div>
                        <div class="form-group col-lg-3 ">
                            <p class="font-weight-bold text-muted">Examen Suspensión : <span class="font-weight-normal"> {{$horario->fecha_suspension}}</span></p>
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
