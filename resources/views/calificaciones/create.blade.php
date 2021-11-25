@extends('layouts.layout')
@section('title', ' Notas |')

@push('styles')
<link href="{{asset('css/select2.min.css')}}" rel="stylesheet">
<link href="{{asset('css/select2-bootstrap4.min.css')}}" rel="stylesheet">
@endpush

@section('content')

<main class="c-main">
<div class="container-fluid">
    <div class="fade-in">
        @include('partials.errors')
        <div class="card c-callout bg-light c-callout-primary shadow-lg ">
            <div class="card-header bg-primary">
                <font class=" text-light font-weight-bold "> <i class="font-weight-bold  fas fa-user  mr-3"></i> ESTUDIANTE </font>
            </div>
            <div class="card-body ">
                <form class="form-horizontal" method="POST"  action="{{ route('calificaciones.store')}} ">
                    @csrf
                    <div class="row">
                        <div class="card col-lg-5 shadow-sm bg-light shadow-sm">
                            <div class="form-group ">
                                <label for="periodacademico_id" class="col-form-label font-weight-bold text-muted  small">PERIODO ACADÉMICO</label>
                                <div class="input-group">
                                    <select name="periodacademico_id" id="periodacademico_id" class="form-control  @error('periodacademico_id') is-invalid @enderror"  onchange="calificacionPeriodo();">
                                        <option value="" class="form-control  "> == Seleccionar == </option>
                                        @foreach ($periodacademicos as $periodacademico)
                                        <option  value="{{$periodacademico->id}}"
                                            {{-- {{old('estudiante_id')==$estudiante->id ? 'selected' : '' }} --}}
                                            {{old('periodacademico_id')==$periodacademico->id ? 'selected' : '' }}
                                            >{{$query.''.$periodacademico->periodo}}</option>
                                        @endforeach
                                    </select>
                                    @error ('periodacademico_id') <span class="invalid-feedback" role="alert"> <strong>{{$message}}</strong></span> @enderror
                                    <div class="input-group-prepend "><span class=" input-group-text">
                                        <i class=" text-primary fas fa-calendar-check"></i></span></div>
                                </div>
                            </div>
                        </div>
                        <div class="col"></div>
                        <div class="card col-lg-6 shadow-sm bg-light shadow-sm">
                            <div class="form-group">
                                <label for="asignacione_id" class="col-form-label font-weight-bold text-muted small"> CARRERA | PERIODO | SECCIÓN | PARALELO  </label>
                                <div class="input-group">
                                    <select name="asignacione_id" id="asignacione_id" class=" form-control @error('asignacione_id') is-invalid @enderror" onchange="calificacionAsignacion();">
                                        {{-- <option class="form-control" value=""> == Seleccionar == </option> --}}
                                    </select>
                                    <div class="input-group-prepend "><span class=" input-group-text">
                                        <i class=" text-primary fas fa-layer-group"></i></span></div>
                                    @error ('asignacione_id') <span class="invalid-feedback" role="alert"> <em>{{$message}}</span></em> @enderror
                                </div>
                            </div>
                        </div>

                        <div class="card  col-lg-5 shadow-sm bg-light shadow-sm">
                            <div class="form-group">
                                <label for="asignacione_id" class="col-form-label font-weight-bold text-muted small">ASIGNATURAS
                                </label>
                                <div class="input-group">
                                    <select name="asignatura_id" id="asignatura_id" class=" form-control @error('asignatura_id') is-invalid @enderror" onchange="calificacionEstudiante();">
                                        {{-- <option class="form-control" value=""> == Seleccionar == </option> --}}
                                    </select>
                                    <div class="input-group-prepend "><span class=" input-group-text">
                                        <i class=" text-primary fas fa-book"></i></span></div>
                                    @error ('asignatura_id') <span class="invalid-feedback" role="alert"> <em>{{$message}}</span></em> @enderror
                                </div>
                            </div>
                        </div>
                        <div class="col"></div>
                        <div class="card col-lg-6 shadow-sm bg-light shadow-sm">
                            <div class=" form-group">
                                <label for="matricula_id" class="col-form-label font-weight-bold text-muted small">ESTUDIANTES
                                </label>
                                <div class="input-group">
                                    <select name="estudiante_id" id="matricula_id" class=" form-control @error('estudiante_id') is-invalid @enderror">
                                        <option class="form-control" value=""> == Seleccionar == </option>
                                    </select>
                                    <div class="input-group-prepend "><span class=" input-group-text">
                                        <i class=" text-primary fas fa-user"></i></span></div>
                                    @error ('estudiante_id') <span class="invalid-feedback" role="alert"> <em>{{$message}}</span></em> @enderror
                                </div>
                            </div>
                        </div>
                    </div>
            </div>
        </div>

            <div class="card ">

                <div class="card-header bg-primary  ">
                    <font class=" text-light font-weight-bold  "> <i class="font-weight-bold  fas fa-star  mr-3"></i> REGISTRO DE NOTAS </font>
                </div>

                <div class="card-body ">
                <div class="card shadow-sm">
                    <div class="row m-2">
                        <div class="col-lg-3 ">
                            <div class="c-callout c-callout-primary"><font class="small text-muted font-weight-bold">DOCENCIA</font>
                                <div class="text-value-lg">
                                    <input type="number" value="{{old( 'docencia', 0)}}"  name="docencia" id="docencia"  class="form-control  @error('docencia') is-invalid @enderror"  step="0.01" oninput="calcular()">
                                @error ('docencia') <span class="invalid-feedback" role="alert"> <small><em>{{$message}}</span> </em></small> @enderror
                                </div>
                            </div>
                        </div>

                        <div class="col-lg-3">
                            <div class="c-callout c-callout-primary"><font class="small text-muted font-weight-bold">EXPERIMENTO APLICACIÓN</font>
                                <div class="text-value-lg">
                                    <input type="number" value="{{old( 'experimento_aplicacion', 0)}}"  name="experimento_aplicacion" id="experimento_aplicacion" oninput="calcular()" class="form-control @error('experimento_aplicacion') is-invalid @enderror" >
                                @error ('experimento_aplicacion') <span class="invalid-feedback" role="alert"> <em class="small">{{$message}}</span> </em> @enderror
                                </div>
                            </div>
                        </div>

                        <div class="col-lg-3">
                            <div class="c-callout c-callout-primary"><font class="small text-muted font-weight-bold">TRABAJO AUTÓNOMO</font>
                                <div class="text-value-lg">
                                    <input type="number" value="{{old( 'trabajo_autonomo', 0)}}"  name="trabajo_autonomo" id="trabajo_autonomo" oninput="calcular()" class="form-control @error('trabajo_autonomo') is-invalid @enderror" >
                                @error ('trabajo_autonomo') <span class="invalid-feedback" role="alert"> <em class="small">{{$message}}</span> </em> @enderror
                                </div>
                            </div>
                        </div>

                        <div class="col-lg-3">
                            <div class="c-callout c-callout-primary"><font class="small text-muted font-weight-bold">EXAMEN PRINCIPAL</font>
                                <div class="text-value-lg">
                                    <input type="number" value="{{old('examen_principal')}}" name="examen_principal" id="examen_principal" oninput="calcular()" class="form-control @error('examen_principal') is-invalid @enderror " >
                                @error ('examen_principal') <span class="invalid-feedback" role="alert"> <em class="small">{{$message}}</span> </em> @enderror
                                </div>
                            </div>
                        </div>

                    </div>
                </div>

                {{-- <hr class="bg-dark" style=" border-top: dotted 1.2px"> --}}
                <div class="card shadow-sm">
                    <div class="row m-2">
                        <div class="col-lg-3">
                            <div class="c-callout c-callout-info"><font class="small text-muted font-weight-bold">SUMA</font>
                                <div class="text-value-lg">
                                    <input type="number" value="{{old('suma')}}" name="suma" id="suma" class="form-control @error('suma') is-invalid @enderror text-info bg-light" readonly>
                                    @error ('suma') <span class="invalid-feedback" role="alert"> <em class="small">{{$message}}</span> </em> @enderror
                                </div>
                            </div>
                        </div>

                        <div class="col-lg-3">
                            <div class="c-callout c-callout-info"><font class="small text-muted font-weight-bold">PROMEDIO EN DECIMALES</font>
                                <div class="text-value-lg">
                                    <input type="decimal" value="{{old('promedio_decimal')}}"  name="promedio_decimal" id="promedio_decimal" class="form-control @error('promedio_decimal') is-invalid @enderror text-info bg-light" readonly>
                                    @error ('promedio_decimal') <span class="invalid-feedback" role="alert"> <em class="small">{{$message}}</span> </em> @enderror
                                </div>
                            </div>
                        </div>

                        <div class="col-lg-3">
                            <div class="c-callout c-callout-info"><font class="small text-muted font-weight-bold">PROMEDIO FINAL (entero)</font>
                                    <div class="text-value-lg">
                                        <input type="number" name="promedio_final" id="promedio_final" class="form-control @error('promedio_final') is-invalid @enderror text-info bg-light" readonly>
                                    @error ('promedio_final') <span class="invalid-feedback" role="alert"> <em class="small">{{$message}}</span> </em> @enderror
                                    </div>
                            </div>
                        </div>

                        <div class="col-lg-3">
                            <div class="c-callout c-callout-info"><font class="small text-muted font-weight-bold">PROMEDIO EN LETRAS</font>
                                    <div class="text-value-lg">
                                        <input type="text" name="promedio_letra" id="promedio_letra" class="form-control @error('promedio_letra') is-invalid @enderror text-info bg-light " readonly>
                                    @error ('promedio_letra') <span class="invalid-feedback" role="alert"> <em class="small">{{$message}}</span> </em> @enderror
                                    </div>
                            </div>
                        </div>
                    </div>
                </div>
                {{-- <hr class="bg-dark" style=" border-top: dotted 1.2px"> --}}
                <div class="card shadow-sm">
                    <div class="row m-2">
                        <div class="col-lg-3">
                            <div class="c-callout c-callout-primary"><font class="small text-muted font-weight-bold">NÚMERO ASISTENCIA</font>
                                <div class="text-value-lg">
                                    <input type="text" name="numero_asistencia" class="form-control @error('numero_asistencia') is-invalid @enderror" >
                                @error ('numero_asistencia') <span class="invalid-feedback" role="alert"> <em class="small">{{$message}}</span> </em> @enderror
                                </div>
                            </div>
                        </div>

                        <div class="col-lg-3">
                            <div class="c-callout c-callout-primary"><font class="small text-muted font-weight-bold">PORCENTAJE ASISTENCIA</font>
                                <div class="text-value-lg">
                                    <input type="text" name="porcentaje_asistencia" class="form-control @error('numero_asistencia') is-invalid @enderror" >
                                @error ('porcentaje_asistencia') <span class="invalid-feedback" role="alert"><em class="small">{{$message}}</span> </em> @enderror
                                </div>
                            </div>
                        </div>

                        <div class="col-lg-3">
                            <div class="c-callout c-callout-info"><font class="small text-muted font-weight-bold">OBSERVACIÓN</font>
                                <div class="text-value-lg">
                                    <input class="form-control @error('observacion') is-invalid @enderror text-info bg-light" type="text"  name="observacion" id="observacion"  readonly>
                                @error ('observacion') <span class="invalid-feedback" role="alert"> <em class="small">{{$message}}</span> </em> @enderror
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
            <div class="card-footer border-0 d-flex justify-content-between aling-items-end bg-light">
            <button class=" col-sm-2 border btn btn-primary" type="submit">Guardar</button>
            <a class=" btn  col-sm-2 border  btn-dark " href="{{route('calificaciones.index')}}">Cancelar</a>
            </div>
        </form>

    </div>

    </div>
</div>
</main>


@push('scripts')
<script src="{{asset('js/jquery.min.js')}}"></script>
<script src="{{asset('js/axios.min.js')}}"></script>
<script src="{{asset('js/select2.full.min.js')}}"></script>
<script>


// calcula el promedio de notas

function calcular(){

    docencia=document.getElementById('docencia').value;
    experimento_aplicacion=document.getElementById('experimento_aplicacion').value;
    trabajo_autonomo=document.getElementById('trabajo_autonomo').value;
    examen_principal=document.getElementById('examen_principal').value;

    var total=parseFloat(docencia)+parseFloat(experimento_aplicacion)+parseFloat(trabajo_autonomo);
  document.getElementById("suma").value = total;

  promedio=parseFloat(total).toFixed(2) / 3;
  promedio=parseFloat(promedio).toFixed(2)
  document.getElementById("promedio_decimal").value = promedio;


  promedio_final=(Number(promedio)+Number(examen_principal))/2;
  promedio_final=parseFloat(promedio_final).toFixed(0);

  if (total>0){
    document.getElementById("promedio_final").value = promedio_final;
    document.getElementById("promedio_letra").value = Unidades(parseInt(promedio_final));


  }

  if (promedio_final<6.5){
    document.getElementById("observacion").value='REPROBADO';
  }else{
   document.getElementById("observacion").value="APROBADO";
  }
  if(examen_principal<=0){
    document.getElementById("observacion").value="EN CURSO";
  }

}

//-------------------------------------------//
function Unidades(num){

 switch(num)
 {
   case 0: return "CERO";
   case 1: return "UNO";
   case 2: return "DOS";
   case 3: return "TRES";
   case 4: return "CUATRO";
   case 5: return "CINCO";
   case 6: return "SEIS";
   case 7: return "SIETE";
   case 8: return "OCHO";
   case 9: return "NUEVE";
   case 10: return "DIEZ";
 }

 return "";
}

calificacionPeriodo();

function calificacionPeriodo(){
    var asignaciones = document.getElementById("asignacione_id");
    for (let i = asignaciones.options.length; i >= 0; i--) {
        asignaciones.remove(i);
    }
    var id = document.getElementById('periodacademico_id').value;
    if(id){
        axios.get('/getAsignacionescal/'+id)
        .then((resp)=>{
            var asignaciones = document.getElementById("asignacione_id");
            console.log(id);
            console.log(Object.keys(resp.data).length);
            for (i = 0; i < Object.keys(resp.data).length; i++) {
            var option = document.createElement('option');
            option.value = resp.data[i].id;
            console.log(option.text = resp.data[i].id);
            option.text = resp.data[i].id+' '+resp.data[i].nombre+' | '+resp.data[i].nombrePeriodo+' | '+resp.data[i].nombreSeccion+' | '+resp.data[i].nombreParalelo;
            console.log('paso 1');
            console.log(resp.data[i].id, "{{ old("asignacione_id") }}" );
            console.log('paso 2');
            if(resp.data[i].id == "{{ old("asignacione_id") }}")
            {
                option.selected= true;
            }

            asignaciones.appendChild(option);
            }
            calificacionAsignacion();
        })
        .catch(function (error) {console.log(error);})
      } else{
        document.getElementById("asignacione_id").length  = 1
        asignaciones.options[0].value = ""
        asignaciones.options[0].text = " == Selecionar == "
      }
}


function calificacionAsignacion(){
    var asignaturas = document.getElementById("asignatura_id");
    for (let i = asignaturas.options.length; i >= 0; i--) {
        asignaturas.remove(i);
    }
    var id = document.getElementById('asignacione_id').value;
    axios.get('/getAsignaturascal/'+id)
      .then((resp)=>{
        var asignaturas = document.getElementById("asignatura_id");
        console.log(resp.data);

        for (i = 0; i < Object.keys(resp.data).length; i++) {
          var option = document.createElement('option');
          option.value = resp.data[i].asignatura_id;
          option.text = resp.data[i].nombre;

          if(resp.data[i].asignatura_id == "{{ old("asignatura_id") }}")
            {
                option.selected= true;
            }
          asignaturas.appendChild(option);
        }
        if(Object.keys(resp.data).length==0){
            var option = document.createElement('option');
            option.value = '';
            option.text = 'No hay datos';
            asignaturas.appendChild(option);
        }
        calificacionEstudiante()
      })
      .catch(function (error) {console.log(error);})
}

function calificacionEstudiante(){
    var estudiantes = document.getElementById("matricula_id");
    for (let i = estudiantes.options.length; i >= 0; i--) {
        estudiantes.remove(i);
    }
    var periodos_id = document.getElementById('periodacademico_id').value;
    var asignacion_id = document.getElementById('asignacione_id').value;
    var asignatura_id = document.getElementById('asignatura_id').value;
    console.log('/getEstudiantescal/'+periodos_id+'_'+asignacion_id+'_'+asignatura_id);
    axios.get('/getEstudiantescal/'+periodos_id+'_'+asignacion_id+'_'+asignatura_id)
      .then((resp)=>{
        var estudiantes = document.getElementById("matricula_id");
        for (i = 0; i < Object.keys(resp.data).length; i++) {
          var option = document.createElement('option');
          option.value = resp.data[i].estudiante_id;
          option.text = resp.data[i].nombre + ' '+ resp.data[i].apellido + ' '+ resp.data[i].dni;
          if(resp.data[i].estudiante_id == "{{ old("matricula_id") }}")
            {
                option.selected= true;
            }
          estudiantes.appendChild(option);
        }
      })
      .catch(function (error) {console.log(error);})
}

</script>
@endpush
@endsection
