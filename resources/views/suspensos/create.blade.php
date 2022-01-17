@extends('layouts.layout')
@section('title', ' Suspensos |')

@push('styles')
<link href="{{asset('css/select2.min.css')}}" rel="stylesheet">
<link href="{{asset('css/select2-bootstrap4.min.css')}}" rel="stylesheet">
@endpush

@section('content')

<main class="c-main">
<div class="container-fluid">
    <div class="fade-in">
        <div class="card c-callout c-callout-primary bg-light shadow-lg ">
            <div class="card-header bg-primary">
                <font class=" text-light font-weight-bold "> <i class="font-weight-bold  fas fa-user  mr-3"></i> ESTUDIANTE </font>
            </div>
            <div class="card-body">
                <form class="form-horizontal" method="POST"  action="{{ route('suspensos.store')}} ">
                    @csrf
                    <div class="row">
                        <div class="card col-lg-5 shadow-sm bg-light">
                            <div class="form-group ">
                                <label for="periodacademico_id" class="col-form-label font-weight-bold text-muted  small">PERIODO ACADÉMICO</label>
                                <div class="input-group">
                                    <select name="periodacademico_id" id="periodacademico_id" class="form-control  @error('periodacademico_id') is-invalid @enderror"  onchange="suspensoAsignaciones();">
                                        <option value="" class="form-control  "> == Seleccionar == </option>
                                        @foreach ($periodacademicos as $periodacademico)
                                        <option  value="{{$periodacademico->id}}"
                                            {{old('periodacademico_id')==$periodacademico->id ? 'selected' : ''}}
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
                        <div class="card col-lg-6 shadow-sm bg-light">
                            <div class=" form-group">
                                <label for="asignacione_id" class="col-form-label font-weight-bold text-muted small">CARRERA | PERIODO | SECCIÓN | PARALELO
                                </label>
                                <div class="input-group ">
                                    <select name="asignacione_id" id="asignacione_id" class="form-control  @error('asignacione_id') is-invalid @enderror" onchange="suspensoAsignaturas();">
                                        {{-- <option class="form-control" value=""> == Seleccionar == </option> --}}
                                    </select>
                                    <div class="input-group-prepend "><span class=" input-group-text">
                                        <i class=" text-primary fas fa-layer-group"></i></span></div>
                                        @error ('asignacione_id') <span class="invalid-feedback" role="alert"> <em>{{$message}}</span></em> @enderror
                                </div>
                            </div>
                        </div>

                        <div class="card col-lg-5 shadow-sm bg-light">
                            <div class="form-group">
                                <label for="asignacione_id" class="col-form-label font-weight-bold text-muted small">ASIGNATURAS
                                </label>
                                <div class="input-group ">
                                    <select name="asignatura_id" id="asignatura_id" class="form-control  @error('asignatura_id') is-invalid @enderror" onchange="suspensoEstudiantes();">
                                        {{-- <option class="form-control" value=""> == Seleccionar == </option> --}}
                                            {{-- Data --}}
                                    </select>
                                    <div class="input-group-prepend "><span class=" input-group-text">
                                        <i class=" text-primary fas fa-book"></i></span></div>
                                        @error ('asignatura_id') <span class="invalid-feedback" role="alert"> <em>{{$message}}</span></em> @enderror
                                </div>
                            </div>
                        </div>

                        <div class="col"></div>

                        <div class="card col-lg-6 shadow-sm bg-light">
                            <div class=" form-group ">
                                <label for="estudiante_id" class="col-form-label font-weight-bold text-muted small">ESTUDIANTES
                                </label>
                                <div class="input-group ">
                                    <select name="estudiante_id" id="matricula_id" class=" form-control @error('estudiante_id') is-invalid @enderror" onchange="promedioSuspenso();" >
                                        {{-- <option class="form-control" value=""> == Seleccionar == </option> --}}
                                        {{-- Data --}}
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

            <div class="card">
                <div class="card-header bg-primary  ">
                    <font class=" text-light font-weight-bold align-self-center text-black"> <i class="fas fa-star-half-alt  mr-3"></i> REGISTRO DE  NOTAS SUSPENSO </font>
                </div>

                <div class="card-body">
                    <div class="card shadow-sm">
                        <div class="row m-2">
                        <div class="col-lg-4">
                            <div class="c-callout c-callout-info"> <font class="text-muted small font-weight-bold">NOTA FINAL</font>
                                <div class="text-value-lg"><input type="number" value="{{--$matriculas[0]->promedio_final--}}"  name="promedio_final" id="promedio_final"  class="form-control @error('promedio_final') is-invalid @enderror"  step="0.01" oninput="calcular()" readonly >
                                @error ('promedio_final') <span class="invalid-feedback" role="alert"> <small><em>{{$message}}</span> </em></small> @enderror
                            </div>
                            </div>
                        </div>

                        <div class="col-lg-4">
                            <div class="c-callout c-callout-primary"><font class="text-muted small font-weight-bold">EXAMEN DE SUSPENSIÓN</font>
                                <div class="text-value-lg"><input type="number" value="{{old('examen_suspenso')}}" name="examen_suspenso" id="examen_suspenso"  class="form-control @error('examen_suspenso') is-invalid @enderror" oninput="calcular()"  >
                                @error ('examen_suspenso') <span class="invalid-feedback" role="alert"> <small><em>{{$message}}</span> </em></small> @enderror
                            </div>
                            </div>
                        </div>

                        <div class="col-lg-4">
                            <div class="c-callout c-callout-info"><font class="text-muted small font-weight-bold">SUMA</font>
                                <div class="text-value-lg"> <input type="number" value="{{old('suma')}}" name="suma" id="suma" class="form-control @error('suma') is-invalid @enderror text-info bg-light" readonly>
                                    @error ('suma') <span class="invalid-feedback" role="alert"> <small><em>{{$message}}</span> </em></small> @enderror
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
                <div class="card shadow-sm">
                    <div class="row m-2">

                        <div class="col-lg-4">
                            <div class="c-callout c-callout-info"><font class="text-muted small font-weight-bold">PROMEDIO EN DECIMALES</font>
                                <div class="text-value-lg"><input type="decimal" value="{{old('promedio_numero')}}"  name="promedio_numero" id="promedio_numero" class="form-control @error('promedio_numero') is-invalid @enderror text-info bg-light" readonly>
                                    @error ('promedio_numero') <span class="invalid-feedback" role="alert"> <small><em>{{$message}}</span> </em></small> @enderror
                                </div>
                            </div>
                        </div>

                        <div class="col-lg-4">
                            <div class="c-callout c-callout-info"><font class="text-muted small font-weight-bold">PROMEDIO EN LETRAS</font>
                                    <div class="text-value-lg"><input type="text" value="{{old('promedio_letra')}}" name="promedio_letra" id="promedio_letra" class="form-control @error('promedio_letra') is-invalid @enderror text-info bg-light" readonly>
                                    @error ('promedio_letra') <span class="invalid-feedback" role="alert"> <small><em>{{$message}}</span> </em></small> @enderror
                                </div>
                            </div>
                        </div>

                        <div class="col-lg-4">
                            <div class="c-callout c-callout-info"><font class="text-muted small font-weight-bold">OBSERVACIÓN</font>
                                <div class="text-value-lg"><input type="text"  name="observacion" id="observacion" value="{{old('observacion')}}" class="form-control @error('observacion') is-invalid @enderror"  readonly>
                                @error ('observacion') <span class="invalid-feedback" role="alert"> <small><em>{{$message}}</span> </em></small> @enderror
                            </div>
                            </div>
                        </div>

                    </div>
                </div>

                </div>
                <div class="card-footer border-0 d-flex justify-content-between aling-items-end bg-light">
                    <button class=" col-sm-2 border btn btn-primary" type="submit">Guardar</button>
                    <a class=" btn  col-sm-2 border  btn-dark " href="{{route('suspensos.index')}}">Cancelar</a>
                </div>
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

    promedio_final=document.getElementById('promedio_final').value;
    examen_suspenso=document.getElementById('examen_suspenso').value;

    var total=parseFloat(promedio_final)+parseFloat(examen_suspenso);
    document.getElementById("suma").value = total;

    promedio=parseFloat(total).toFixed(2) / 2;
    promedio=parseFloat(promedio).toFixed(2)
    document.getElementById("promedio_numero").value = promedio;

    promedio_numero=(Number(promedio));
    promedio_numero=parseFloat(promedio_numero).toFixed(0);

    if (total>0){
        document.getElementById("promedio_numero").value = promedio_numero;
        document.getElementById("promedio_letra").value = Unidades(parseInt(promedio_numero));
    }

  if (promedio_numero<7){
    document.getElementById("observacion").value='REPROBADO';
  }else{
   document.getElementById("observacion").value="APROBADO";
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

suspensoAsignaciones();

function suspensoAsignaciones(){
    var asignaciones = document.getElementById("asignacione_id");
    for (let i = asignaciones.options.length; i >= 0; i--) {
        asignaciones.remove(i);
    }
    var id = document.getElementById('periodacademico_id').value;
    if(id){
        axios.get('/getAsignacionessus/'+id)
        .then((resp)=>{
            var asignaciones = document.getElementById("asignacione_id");

            for (i = 0; i < Object.keys(resp.data).length; i++) {
            var option = document.createElement('option');
            option.value = resp.data[i].id;
            option.text = resp.data[i].nombre +' | '+resp.data[i].nombrePeriodo +' | '+resp.data[i].nombreSeccion +' | '+resp.data[i].nombreParalelo;
            asignaciones.appendChild(option);
            }
            suspensoAsignaturas();
        })
      .catch(function (error) {console.log(error);})
    }else{
        document.getElementById("asignacione_id").length  = 1
        asignaciones.options[0].value = ""
        asignaciones.options[0].text = " == Selecionar == "
        suspensoAsignaturas();
    }

}


function suspensoAsignaturas(){
    var asignaturas = document.getElementById("asignatura_id");
    for (let i = asignaturas.options.length; i >= 0; i--) {
        asignaturas.remove(i);
    }
    //var periodo_id = document.getElementById('periodacademico_id').value;
    var id = document.getElementById('asignacione_id').value;

    if(id){
        axios.get('/getAsignaturassus/'+id)
        .then((resp)=>{
            var asignaturas = document.getElementById("asignatura_id");
            //console.log(Object.keys(resp.data).length);
            for (i = 0; i < Object.keys(resp.data).length; i++) {
            var option = document.createElement('option');
            option.value = resp.data[i].asignatura_id;
            option.text = resp.data[i].nombre;
            asignaturas.appendChild(option);
            }
            suspensoEstudiantes();
        })
        .catch(function (error) {console.log(error);})
    }else{
        document.getElementById("asignatura_id").length  = 1
        asignaturas.options[0].value = ""
        asignaturas.options[0].text = " == Selecionar == "
        suspensoEstudiantes();
    }
}

//Estudiantes correspondientes a una asignatura
function suspensoEstudiantes(){
    var estudiantes = document.getElementById("matricula_id");
    for (let i = estudiantes.options.length; i >= 0; i--) {
        estudiantes.remove(i);
    }
    var asignacion_id = document.getElementById('asignacione_id').value;
    var asignatura_id = document.getElementById('asignatura_id').value;

    if (asignatura_id){
        axios.get('/getEstudiantessus/'+asignacion_id+'_'+asignatura_id)
        .then((resp)=>{
            var estudiantes = document.getElementById("matricula_id");
            for (i = 0; i < Object.keys(resp.data).length; i++) {
            var option = document.createElement('option');
            //console.log(resp.data[i].estudiante_id,resp.data[i].nombre + ' '+ resp.data[i].apellido + ' '+ resp.data[i].dni);
            option.value = resp.data[i].estudiante_id;
            option.text = resp.data[i].nombre + ' '+ resp.data[i].apellido + ' '+ resp.data[i].dni;
            estudiantes.appendChild(option);
            }
            promedioSuspenso();
        })
        .catch(function (error) {console.log(error);})
     }else{
        document.getElementById("matricula_id").length  = 1
        estudiantes.options[0].value = ""
        estudiantes.options[0].text = " == Selecionar == "
        promedioSuspenso();
     }
}

function promedioSuspenso()
{
    var asignacion_id = document.getElementById('asignacione_id').value;
    var asignatura_id = document.getElementById('asignatura_id').value;
    var estudiante_id = document.getElementById("matricula_id").value;
    axios.get('/getPromediosus/'+asignacion_id+'_'+asignatura_id+'_'+estudiante_id)
      .then((resp)=>{
        for (i = 0; i < Object.keys(resp.data).length; i++) {
          document.getElementById("promedio_final").value=resp.data[i].promedio_final;
        }
      })
      .catch(function (error) {console.log(error);})
}

</script>
@endpush
@endsection
