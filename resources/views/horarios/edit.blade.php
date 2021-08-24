@extends('layouts.layout')
@section('title', ' Horario |')
@section('content')

<main class="c-main">
<div class="container-fluid">
    <div class="fade-in">
        <div class="row  justify-content-center ">
            <div class="col-lg-11">
                <div class="card  shadow-lg">
                    <div class="card-header bg-primary">
                        <h4 class=" text-light"><i class="far fa-calendar-alt  mr-3"></i> <span class="text-value">HORARIO</span> </h4>
                    </div>
                    <div class="card-body">

                        <form class="form-horizontal" method="POST"  action="{{ route('horarios.update', $horario)}} ">
                            @csrf @method('PUT')
                            @csrf
                            <div class="row">
                                <div class="form-group col-lg-4">
                                    <label for="fecha_inicio" class="col-form-label font-weight-bold text-muted">Fecha de inicio
                                        <span class="text-primary">*</span>
                                    </label>
                                    <div class="input-group">
                                        <input type="date" class="form-control @error('fecha_inicio') is-invalid @enderror"
                                        name="fecha_inicio" value="{{old('fecha_inicio', $horario->fecha_inicio)}}">
                                        <div class="input-group-prepend "><span class=" input-group-text">
                                            <i class=" text-primary fas fa-calendar-day"></i></span></div>
                                        @error ('fecha_inicio') <span class="invalid-feedback" role="alert"> <em> {{$message}}</span> </em> @enderror
                                    </div>
                                </div>

                                <div class="form-group col-lg-4">
                                    <label for="fecha_final" class="col-form-label font-weight-bold text-muted">Fecha final
                                        <span class="text-primary">*</span>
                                    </label>
                                    <div class="input-group">
                                        <input type="date" class="form-control @error('fecha_final') is-invalid @enderror"
                                        name="fecha_final" value="{{old('fecha_final', $horario->fecha_final)}}">
                                        <div class="input-group-prepend "><span class=" input-group-text">
                                            <i class=" text-primary fas fa-calendar-day"></i></span></div>
                                        @error ('fecha_final') <span class="invalid-feedback" role="alert"> <em> {{$message}}</span> </em> @enderror
                                    </div>
                                </div>

                                <div class="form-group col-lg-4">
                                    <label for="fecha_examen" class="col-form-label font-weight-bold text-muted">Fecha de examen principal
                                        <span class="text-primary">*</span>
                                    </label>
                                    <div class="input-group">
                                        <input type="date" class="form-control @error('fecha_examen') is-invalid @enderror"
                                        name="fecha_examen" value="{{old('fecha_examen', $horario->fecha_examen)}}">
                                        <div class="input-group-prepend "><span class=" input-group-text">
                                            <i class=" text-primary fas fa-calendar-day"></i></span></div>
                                        @error ('fecha_examen') <span class="invalid-feedback" role="alert"> <em> {{$message}}</span> </em> @enderror
                                    </div>
                                </div>

                                <div class="form-group col-lg-4">
                                    <label for="fecha_suspension" class="col-form-label font-weight-bold text-muted">Fecha de examen suspensión
                                        <span class="text-primary">*</span>
                                    </label>
                                    <div class="input-group">
                                        <input type="date" class="form-control @error('fecha_suspension') is-invalid @enderror"
                                        name="fecha_suspension" value="{{old('fecha_suspension', $horario->fecha_suspension)}}">
                                        <div class="input-group-prepend "><span class=" input-group-text">
                                            <i class=" text-primary fas fa-calendar-day"></i></span></div>
                                        @error ('fecha_suspension') <span class="invalid-feedback" role="alert"> <em> {{$message}}</span> </em> @enderror
                                    </div>
                                </div>

                                <div class="form-group col-lg-6">
                                    <label for="estudiante_id" class="col-form-label font-weight-bold text-muted small mt-1">CARRERA | PERIODO | SECCIÓN
                                        <span class="text-primary">*</span>
                                    </label>
                                    <div class="input-group">
                                        <select name="asignacione_id" id="asignacione_id"  class="form-control @error('asignacione_id') is-invalid @enderror" onchange="asignaturaHorario(this)">
                                            <option class="form-control" value=""> == Seleccionar == </option>
                                            @foreach ($asignaciones as $asignacione)
                                                <option  value="{{$asignacione->id}}"
                                                    {{old('asignacione_id', $horario->asignacione_id)==$asignacione->id ? 'selected' : '' }}
                                                    >{{$asignacione->periodacademicos->pluck('periodo')->implode(', ') }} ,
                                                    {{$asignacione->carreras->pluck('nombre')->implode(', ')}},
                                                    {{$asignacione->periodo->nombre}},
                                                    {{$asignacione->seccione->nombre}},
                                                    {{$asignacione->paralelo->nombre}}
                                                </option>
                                            @endforeach
                                        </select>
                                        <div class="input-group-prepend "><span class=" input-group-text">
                                            <i class=" text-primary fas fa-check"></i></span></div>
                                        @error ('asignacione_id') <span class="invalid-feedback" role="alert"> <em>{{$message}}</span></em> @enderror
                                    </div>
                                </div>

                                <div class="form-group col-lg-6 ">
                                    <label for="asignatura_id" class="col-form-label font-weight-bold text-muted">Asignatura
                                        <span class="text-primary">*</span></label>
                                    <div class="input-group">
                                        <select  name="asignatura_id" id="asignatura_id" class="form-control @error('asignatura_id') is-invalid @enderror  ">
                                            {{-- <option value="" class="form-control "> == Seleccionar == </option>
                                            @foreach ($asignaturas as $asignatura)
                                                <option  value="{{$asignatura->id}}"
                                                {{old('asignatura_id')==$asignatura->id ? 'selected' : '' }}
                                                >{{$asignatura->nombre}}</option>
                                            @endforeach --}}
                                        </select>
                                        <div class="input-group-prepend "><span class=" input-group-text">
                                            <i class=" text-primary far fa-folder"></i></span></div>
                                        @error ('asignatura_id') <span class="invalid-feedback" role="alert"> <em>{{$message}}</span> </em> @enderror
                                    </div>
                                </div>

                                <div class="form-group col-lg-4 ">
                                    <label for="orden" class="col-form-label font-weight-bold text-muted">Orden
                                        <span class="text-primary">*</span></label>
                                    <div class="input-group">
                                        <select  name="orden" id="orden" class="form-control @error('orden') is-invalid @enderror  ">
                                            <option value="" class="form-control "> == Seleccionar == </option>
                                            <option value="1" class="form-control ">Primeras</option>
                                            <option value="2" class="form-control ">Segundas</option>
                                            <option value="3" class="form-control ">Terceras</option>
                                        </select>
                                        <div class="input-group-prepend "><span class=" input-group-text">
                                            <i class=" text-primary fas fa-sort-amount-up-alt"></i></span></div>
                                        @error ('orden') <span class="invalid-feedback" role="alert"> <em>{{$message}}</span> </em> @enderror
                                    </div>
                                </div>

                                <div class="form-group col-lg-4">
                                    <label for="dia_semana" class="col-form-label font-weight-bold text-muted small mt-1">DÍAS
                                        <span class="text-primary">*</span>
                                    </label>
                                    <div class="input-group">
                                        <select  name="dia_semana" id="dia_semana" class="form-control @error('dia_semana') is-invalid @enderror ">
                                            <option value="" class="form-control "> == Seleccionar == </option>
                                            <option value="Lunes" >Lunes</option>
                                            <option value="Martes" >Martes</option>
                                            <option value="Miércoles" >Miércoles</option>
                                            <option value="Jueves" >Jueves</option>
                                            <option value="Viernes" >Viernes</option>
                                        </select>
                                        <div class="input-group-prepend "><span class=" input-group-text">
                                            <i class=" text-primary fas fa-calendar-week"></i></span></div>
                                        @error ('dia_semana') <span class="invalid-feedback" role="alert"> <em> {{$message}}</span> </em> @enderror
                                    </div>
                                </div>

                                <div class="form-group col-lg-4">
                                    <label for="hora_inicio" class="col-form-label font-weight-bold text-muted">Hora de inicio
                                        <span class="text-primary">*</span>
                                    </label>
                                    <div class="input-group">
                                        <input type="time" id="hora_inicio" class="form-control @error('hora_inicio') is-invalid @enderror"
                                        name="hora_inicio" value="{{old('hora_inicio')}}" placeholder="8:00">
                                        <div class="input-group-prepend "><span class=" input-group-text">
                                            <i class=" text-primary fas fa-clock"></i></span></div>
                                        @error ('hora_inicio') <span class="invalid-feedback" role="alert"> <em> {{$message}}</span> </em> @enderror
                                    </div>
                                </div>

                                <div class="form-group col-lg-4">
                                    <label for="hora_final" class="col-form-label font-weight-bold text-muted">Hora final
                                        <span class="text-primary">*</span>
                                    </label>
                                    <div class="input-group">
                                        <input type="time" id="hora_final" class="form-control @error('hora_final') is-invalid @enderror"
                                        name="hora_final" value="{{old('hora_final')}}" placeholder="8:00">
                                        <div class="input-group-prepend "><span class=" input-group-text">
                                            <i class=" text-primary fas fa-clock"></i></span></div>
                                        @error ('hora_final') <span class="invalid-feedback" role="alert"> <em> {{$message}}</span> </em> @enderror
                                    </div>
                                </div>

                                <div class="form-group col-lg-2" style="margin-top: 35px">
                                    <a onclick="agregarHorario();" class="btn btn-block btn-primary text-white" title="Agregar horario">Agregar</a>
                                </div>

                                <div class="card-table  table-responsive">
                                    <table class="table table-hover  table-bordered align-middle" id="detalles">
                                        <thead class="thead-light">
                                            <tr>
                                                <th class="text-center"><font style="vertical-align: inherit;">Nro</font></th>
                                                <th><font style="vertical-align: inherit;">DÍA</font></font></th>
                                                <th class="text-center"><font style="vertical-align: inherit;">Hora de Inicio</font></font></th>
                                                <th class="text-center"><font style="vertical-align: inherit;">Hora Final</font></font></th>
                                                <th class="text-center"><font style="vertical-align: inherit;">Acción</font></font></th>
                                            </tr>
                                        </thead>
                                        <tbody>
                                        </tbody>
                                    </table>
                                </div>
                            </div>
                    </div>
                    <div class="card-footer border-0 d-flex justify-content-between aling-items-end bg-primary">
                        <button class=" col-sm-2 border btn btn-primary" type="submit">Guardar</button>
                    </div>
                    </form>
                </div>
            </div>
        </div>
    </div>
</div>
</main>
@endsection
