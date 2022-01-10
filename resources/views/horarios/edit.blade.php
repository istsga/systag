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
                            <div class="card p-4">
                                {{-- <div class="row"> --}}
                                <div class="card p-3">
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
                                            <label for="fecha_examen" class="col-form-label font-weight-bold text-muted">Fecha examen principal
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
                                            <label for="fecha_suspension" class="col-form-label font-weight-bold text-muted">Fecha examen suspensión
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

                                        <div class="form-group col-lg-8">
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
                                    </div>
                                </div>
                                <div class="card p-3">
                                    <div class="row">

                                        <div class="form-group col-lg-4 ">
                                            <label for="orden" class="col-form-label font-weight-bold text-muted">Orden de asignaturas
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

                                        <div class="form-group col-lg-8 ">
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

                                        <div class="form-group col-lg-3">
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

                                        <div class="form-group col-lg-3">
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
                                </div>
                                    <div class="card-table  table-responsive">
                                        <table class="table table-hover  table-bordered align-middle" id="detalles">
                                            <thead class="thead-light">
                                                <tr>
                                                    <th class="text-center"><font style="vertical-align: inherit;">Nro</font></th>
                                                    <th><font style="vertical-align: inherit;">DÍA</font></font></th>
                                                    <th><font style="vertical-align: inherit;">ASIGNATURA</font></font></th>
                                                    <th class="text-center"><font style="vertical-align: inherit;">Hora de Inicio</font></font></th>
                                                    <th class="text-center"><font style="vertical-align: inherit;">Hora Final</font></font></th>
                                                    <th class="text-center"><font style="vertical-align: inherit;">Acción</font></font></th>
                                                </tr>
                                            </thead>
                                            <tbody>
                                                @foreach ($detallehorarios as $cont =>  $detallehorario )
                                                <tr id="fila{{$cont+1}}">
                                                    <td class="text-center">{{$cont+1}}</td>
                                                    <td class="text-center"><input type="hidden" name="Dia_semana[]" value="{{$detallehorario->dia_semana}}">{{$detallehorario->dia_semana}}</td>
                                                    <td><input type="hidden" name="Asignatura_id[]" value="{{$detallehorario->asignatura_id}}">{{$detallehorario->asignatura_id}}</td>
                                                    <td class="text-center"><input type="hidden" name="Hora_inicio[]" value="{{$detallehorario->hora_inicio}}">{{$detallehorario->hora_inicio}}</td>
                                                    <td class="text-center"><input type="hidden" name="Hora_final[]" value="{{$detallehorario->hora_final}}">{{$detallehorario->hora_final}}</td>
                                                    <td class="text-center"><button type="button" class="btn btn-danger" onclick="eliminar({{$cont+1}});">X</button></td>
                                                </tr>
                                                @endforeach
                                            </tbody>
                                        </table>
                                    </div>
                                </div>
                            </div>
                    </div>
                    <div class="card-footer border-0 d-flex justify-content-between aling-items-end bg-light">
                        <button class=" col-sm-2 border btn btn-primary" type="submit">Guardar</button>
                        <a class=" btn  col-sm-2 border  btn-dark " href="{{route('horarios.index')}}">Cancelar</a>
                    </div>
                    </form>
                </div>
            </div>
        </div>
    </div>
</div>
</main>
@endsection

@push('scripts')
<script src="{{asset('js/axios.min.js')}}"></script>
<script src="{{asset('js/jquery.min.js')}}"></script>
<script src="{{asset('js/select2.full.min.js')}}"></script>
<script>

    asignaturaHorario();
    function asignaturaHorario(select){
        var asignaturas = document.getElementById("asignatura_id");
        for (let i = asignaturas.options.length; i >= 0; i--) {
            asignaturas.remove(i);
        }

        var id = document.getElementById('asignacione_id').value;
        if(id){
            axios.get('/getAsignaturashor/'+id)
            .then((resp)=>{
                var asignaturas = document.getElementById("asignatura_id");
                for (i = 0; i < Object.keys(resp.data).length; i++) {
                var option = document.createElement('option');
                option.value = resp.data[i].id;
                option.text = resp.data[i].nombre;
                asignaturas.append(option);
                }
            })
            .catch(function (error) {console.log(error);})
        } else{
            document.getElementById("asignatura_id").length  = 1
            asignaturas.options[0].value = ""
            asignaturas.options[0].text = " == Selecionar == "
        }
    }

//AGREGAR ASIGNATURAS
var cont=1;
function agregarHorario(){
      Dia_semana=$("#dia_semana option:selected").text();
      Asignatura_id=$("#asignatura_id").val();
      Asignatura=$("#asignatura_id option:selected").text();
      Hora_inicio=$("#hora_inicio").val();
      Hora_final=$("#hora_final").val();
      console.log(Dia_semana , Hora_inicio, Hora_final );
      if(Dia_semana!=""){
            var fila='</tr><tr class="selected" id="fila'+cont+'"><td class="text-center"><input type="hidden" name="cont" value="'+cont+'">'+cont+
                '</td><td><input type="hidden" name="Dia_semana[]" value="'+Dia_semana+'">'+Dia_semana+
                '</td><td><input type="hidden" name="Asignatura_id[]" value="'+Asignatura_id+'">'+Asignatura+
                '</td><td class="text-center"><input type="hidden" name="Hora_inicio[]" value="'+Hora_inicio+'">'+Hora_inicio+
                '</td><td class="text-center"><input type="hidden" name="Hora_final[]" value="'+Hora_final+'">'+Hora_final+
                '</td><td class="text-center"><button type="button" class="btn btn-danger" onclick="eliminar('+cont+');">X</button></td>';
            cont++;

            console.log(fila);
            $('#detalles').append(fila);
      }else{
            alert("Error al ingresar el detalle de Horario, revise los datos");
    }

}


function eliminar(index){
  cont--;
  $("#fila" + index).remove();
}
</script>
@endpush
