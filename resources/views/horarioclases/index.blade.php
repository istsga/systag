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
                                                <button class=" btn   btn-primary ml-1 " type="submit"> <i class="fas fa-search"> </i> </button>
                                            </div>
                                    </div>
                                </div>

                                <div class=" card col-lg-4 shadow-sm bg-light">
                                    <div class="form-group p-2">
                                        <label for="orden" class="col-form-label font-weight-bold text-muted small">ORDEN DE ASIGNATURAS</label>
                                        <div class="input-group">
                                            <select  name="orden" id="orden" class="form-control">
                                                <option value="" > == Seleccionar == </option>
                                                <option value="1" {{$queryOrden== 1 ? 'selected' : '' }} class="form-control">1</option>
                                                <option value="2" {{$queryOrden== 2 ? 'selected' : '' }}  class="form-control">2</option>
                                                <option value="3" {{$queryOrden== 3 ? 'selected' : '' }} class="form-control">3</option>
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
                                <th class="text-center align-middle"><font >FECHAS</font></th>
                            </tr>
                        </thead>

                        <tbody>
                            @foreach ($horarios1 as $horarios )
                            <tr>
                                <td class="align-middle small">{{$horarios->hora_inicio}} - {{$horarios->hora_final}} </td>

                                <td class="align-middle small">{{$horarios->lunesnombreasignatura}} <hr class=" mt-2 mb-1 bg-primary"><span class="text-muted small">Profesor: {{$horarios->lunesnombredocente}} {{$horarios->lunesapellidodocente}}</span> </td>

                                <td class="align-middle small">{{$horarios->martesnombreasignatura}} <hr class=" bg-primary mt-2 mb-1"><span class=" text-muted small">Profesor: {{$horarios->martesnombredocente}} {{$horarios->martesapellidodocente}}</span> </td>

                                <td class="align-middle small">{{$horarios->miercolesnombreasignatura}} <hr class=" bg-primary mt-2 mb-1"> <span class=" text-muted small">Profesor: {{$horarios->miercolesnombredocente}} {{$horarios->miercolesapellidodocente}}</span> </td>

                                <td class="align-middle small">{{$horarios->juevesnombreasignatura}} <hr class=" bg-primary mt-2 mb-1"> <span class=" text-muted small">Profesor: {{$horarios->juevesnombredocente}} {{$horarios->juevesapellidodocente}}</span> </td>
                                <td class="align-middle small">{{$horarios->viernesnombreasignatura}} <hr class=" bg-primary mt-2 mb-1"> <span class="text-muted small"> Profesor: {{$horarios->viernesnombredocente}} {{$horarios->viernesapellidodocente}}</span> </td>
                                <td class="align-middle small text-muted"> <span class="font-weight-bold">FI: &nbsp; </span>  {{$horarios->fecha_inicio}} <br> <span class="font-weight-bold"> FF: &nbsp; </span> {{$horarios->fecha_final}} <br> <span class="font-weight-bold"> FEP: &nbsp; </span>  {{$horarios->fecha_examen}} <br> <span class="font-weight-bold"> FEX: &nbsp; </span>  {{$horarios->fecha_suspension}} </td>
                            </tr>
                            @endforeach

                        </tbody>
                    </table>
                </div>
                <div class="col-lg-12">
                    <p class="font-weight-bold text-muted small">ABREVIATURAS  <span class="text-primary">*</span> </p>
                    <div class="row small font-weight-bold ">
                        <div class="form-group col-lg-3 align-middle ">
                            <font class="font-weight-bold small text-muted "> FI = Fecha Inicio</font> <br>
                            <font class="font-weight-bold small text-muted "> FF = Fecha Final </font> <br>
                            <font class="font-weight-bold small text-muted "> FEP = Fecha Examen Principal </font> <br>
                            <font class="font-weight-bold small text-muted ">FEX = Fecha Examen Suspensión </font>
                        </div>
                        <div class="form-group col-lg-3 align-middle">
                        </div>
                        <div class="form-group col-lg-3 align-middle">

                        </div>
                        <div class="form-group col-lg-3 ">

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

<script>

</script>
@endsection


