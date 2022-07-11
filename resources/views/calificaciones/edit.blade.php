@extends('layouts.layout')
@section('title', ' Notas |')

@push('styles')
<link href="{{asset('css/select2.min.css')}}" rel="stylesheet">
<link href="{{asset('css/select2-bootstrap4.min.css')}}" rel="stylesheet">

<style>
    input[type=number]::-webkit-inner-spin-button,
    input[type=number]::-webkit-outer-spin-button {
        -webkit-appearance: none;
        margin: 0;
        }
    input[type=number] { -moz-appearance:textfield; }
</style>

@endpush

@section('content')

<main class="c-main">
<div class="container-fluid">
    <div class="fade-in">
        <div class="card c-callout c-callout-primary bg-light  shadow-lg ">
            <div class="card-header bg-primary">
                <font class=" text-light font-weight-bold "> <i class="font-weight-bold  fas fa-user  mr-3"></i> ESTUDIANTE </font>
            </div>
            <div class="card-body">
                <form class="form-horizontal" method="POST"  action="{{ route('calificaciones.update',  $calificacione)}} ">
                @csrf @method('PUT')
                <div class="row">
                    <div class="card col-lg-12 shadow-sm bg-light">
                        <div class="form-group ">
                                <label for="asignacione_id" class="col-form-label font-weight-bold small text-muted"> CARRERA | PERIODO | SECCIÓN | PARALELO
                                </label>
                                <div class="input-group">
                                    <div class="input-group-prepend "><span class=" input-group-text">
                                        <i class=" text-primary fas fa-check"></i></span></div>
                                        <label class="ml-3" for="">{{$calificacione->asignacione->periodacademicos->pluck('periodo')->implode(', ')}} |
                                                        {{$calificacione->asignacione->carreras->pluck('nombre')->implode(', ')}} |
                                                        {{$calificacione->asignacione->periodo->nombre}} |
                                                        {{$calificacione->asignacione->seccione->nombre}} |
                                                        {{$calificacione->asignacione->paralelo->nombre}}
                                        </label>
                                        <input class="invisible" type="text" name="asignacione_id" value="{{$calificacione->asignacione_id}}">
                                </div>
                        </div>
                    </div>

                    <div class="card col-lg-6 shadow-sm bg-light">
                        <div class=" form-group ">
                                <label for="asignatura_id" class="col-form-label font-weight-bold small text-muted">ASIGNATURA
                                </label>
                                <div class="input-group">
                                    <div class="input-group-prepend "><span class=" input-group-text">
                                        <i class=" text-primary fas fa-book"></i></span></div>
                                        <label class="ml-3" for="">{{$calificacione->asignatura->nombre}}</label>
                                        <input class="invisible " type="text" name="asignatura_id" value="{{$calificacione->asignatura_id}}">
                                </div>
                        </div>
                    </div>

                    <div class="col"></div>
                    <div class="card col-lg-5 shadow-sm bg-light">
                        <div class="form-group  ">
                                <label for="estudiante" class="col-form-label font-weight-bold small text-muted">ESTUDIANTE
                                </label>
                                <div class="input-group ">
                                    <div class="input-group-prepend "><span class=" input-group-text">
                                        <i class=" text-primary fas fa-user"></i></span></div>
                                        <label class="ml-3" for="">{{$calificacione->estudiante->nombre}} {{$calificacione->estudiante->apellido}}</label>
                                        <input class="invisible" type="text" name="estudiante_id" value="{{$calificacione->estudiante_id}}">
                                </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>

            <div class="card">

                <div class="card-header bg-primary  ">

                    <font class=" text-light font-weight-bold align-self-center text-black vertical-align-inherit "> <i class="font-weight-bold  fas fa-star mr-3"></i> EDITAR NOTAS </font>
                </div>

                <div class="card-body">
                <div class="card shadow-sm">
                    <div class="row m-2">
                        <div class="col-lg-3">
                            <div class="c-callout c-callout-primary"><font class="text-muted small font-weight-bold">DOCENCIA</font>
                                <div class="text-value-lg">
                                    <input type="number" value="{{old( 'docencia', $calificacione->docencia)}}"  name="docencia" id="docencia"  class="form-control @error('docencia') is-invalid @enderror"  step="0.01" oninput="calcular()">
                                @error ('docencia') <span class="invalid-feedback" role="alert"> <small><em>{{$message}}</span> </em></small> @enderror
                                </div>
                            </div>
                        </div>

                        <div class="col-lg-3">
                            <div class="c-callout c-callout-primary"><font class="text-muted small font-weight-bold">EXPERIMENTO APLICACIÓN</font>
                                <div class="text-value-lg">
                                    <input type="number" value="{{old( 'experimento_aplicacion', $calificacione->experimento_aplicacion)}}"  name="experimento_aplicacion" id="experimento_aplicacion" oninput="calcular()" class="form-control @error('experimento_aplicacion') is-invalid @enderror" step="0.01" >
                                @error ('experimento_aplicacion') <span class="invalid-feedback" role="alert"> <small><em>{{$message}}</span> </em></small> @enderror
                                </div>
                            </div>
                        </div>

                        <div class="col-lg-3">
                            <div class="c-callout c-callout-primary"><font class="text-muted small font-weight-bold">TRABAJO AUTÓNOMO</font>
                                <div class="text-value-lg">
                                    <input type="number" value="{{old( 'trabajo_autonomo', $calificacione->trabajo_autonomo)}}"  name="trabajo_autonomo" id="trabajo_autonomo" oninput="calcular()" class="form-control @error('trabajo_autonomo') is-invalid @enderror" step="0.01" >
                                @error ('trabajo_autonomo') <span class="invalid-feedback" role="alert"> <small><em>{{$message}}</span> </em></small> @enderror
                                </div>
                            </div>
                        </div>

                        <div class="col-lg-3">
                            <div class="c-callout c-callout-primary"><font class="text-muted small font-weight-bold">EXAMEN PRINCIPAL</font>
                                <div class="text-value-lg">
                                    <input type="number" value="{{old('examen_principal', $calificacione->examen_principal)}}" name="examen_principal" id="examen_principal" oninput="calcular()" class="form-control @error('examen_principal') is-invalid @enderror " step="0.01">
                                @error ('examen_principal') <span class="invalid-feedback" role="alert"> <small><em>{{$message}}</span> </em></small> @enderror
                                </div>
                            </div>
                        </div>

                    </div>
                </div>

                <div class="card shadow-sm">
                    <div class="row m-2">

                        <div class="col-lg-3">
                            <div class="c-callout c-callout-info"><font class="text-muted small font-weight-bold">SUMA</font>
                                <div class="text-value-lg">
                                    <input type="number" value="{{old('suma', $calificacione->suma)}}" name="suma" id="suma" class="form-control @error('suma') is-invalid @enderror text-info bg-light"  readonly>
                                    @error ('suma') <span class="invalid-feedback" role="alert"> <small><em>{{$message}}</span> </em></small> @enderror
                                </div>
                            </div>
                        </div>

                        <div class="col-lg-3">
                            <div class="c-callout c-callout-info"><font class="text-muted small font-weight-bold">PROMEDIO EN DECIMALES</font>
                                <div class="text-value-lg">
                                    <input type="decimal" value="{{old('promedio_decimal', $calificacione->promedio_decimal)}}"  name="promedio_decimal" id="promedio_decimal" class="form-control @error('promedio_decimal') is-invalid @enderror text-info bg-light" readonly>
                                    @error ('promedio_decimal') <span class="invalid-feedback" role="alert"> <small><em>{{$message}}</span> </em></small> @enderror
                                </div>
                            </div>
                        </div>

                        <div class="col-lg-3">
                            <div class="c-callout c-callout-info"><font class="text-muted small font-weight-bold">PROMEDIO FINAL (entero)</font>
                                <div class="text-value-lg">
                                    <input type="number" value="{{old('promedio_final',$calificacione->promedio_final)}}" name="promedio_final" id="promedio_final" class="form-control @error('promedio_final') is-invalid @enderror text-info bg-light" readonly>
                                @error ('promedio_final') <span class="invalid-feedback" role="alert"> <small><em>{{$message}}</span> </em></small> @enderror
                                </div>
                            </div>
                        </div>

                        <div class="col-lg-3">
                            <div class="c-callout c-callout-info"><font class="text-muted small font-weight-bold">PROMEDIO EN LETRAS</font>
                                <div class="text-value-lg">
                                    <input type="text" value="{{old('promedio_letra',$calificacione->promedio_letra)}}" name="promedio_letra" id="promedio_letra" class="form-control @error('promedio_letra') is-invalid @enderror text-info bg-light " readonly>
                                @error ('promedio_letra') <span class="invalid-feedback" role="alert"> <small><em>{{$message}}</span> </em></small> @enderror
                                </div>
                            </div>
                        </div>
                    </div>
                </div>

                <div class="card shadow-sm">
                    <div class="row m-2">
                        <div class="col-lg-3">
                            <div class="c-callout c-callout-info"><font class="text-muted small font-weight-bold">NÚMERO DE HORAS</font>
                                <div class="text-value-lg">
                                    <input type="text" value="{{old('numero_asistencia',$calificacione->numero_asistencia)}}" name="numero_asistencia" class="form-control @error('numero_asistencia') is-invalid @enderror" readonly>
                                @error ('numero_asistencia') <span class="invalid-feedback" role="alert"> <small><em>{{$message}}</span> </em></small> @enderror
                                </div>
                            </div>
                        </div>

                        <div class="col-lg-3">
                            <div class="c-callout c-callout-primary"><font class="text-muted small font-weight-bold">PORCENTAJE ASISTENCIA</font>
                            <div class="text-value-lg"><input type="text" value="{{old('porcentaje_asistencia', $calificacione->porcentaje_asistencia)}}" name="porcentaje_asistencia" class="form-control @error('porcentaje_asistencia') is-invalid @enderror" >
                                @error ('porcentaje_asistencia') <span class="invalid-feedback" role="alert"> <small><em>{{$message}}</span> </em></small> @enderror
                            </div>
                            </div>
                        </div>

                        <div class="col-lg-3">
                            <div class="c-callout c-callout-info"><font class="text-muted small font-weight-bold">OBSERVACIÓN</font>
                                <div class="text-value-lg">
                                    <input class="form-control @error('observacion') is-invalid @enderror" type="text" value="{{old('observacion', $calificacione->observacion)}}"  name="observacion" id="observacion" readonly >
                                @error ('observacion') <span class="invalid-feedback" role="alert"> <small><em>{{$message}}</span> </em></small> @enderror
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
@endsection

@push('scripts')
<script src="{{asset('js/jquery.min.js')}}"></script>
<script src="{{asset('js/select2.full.min.js')}}"></script>
<script type="text/javascript">


// calcula el promedio de notas

function calcular(){

    docencia=document.getElementById('docencia').value;
    experimento_aplicacion=document.getElementById('experimento_aplicacion').value;
    trabajo_autonomo=document.getElementById('trabajo_autonomo').value;
    examen_principal=document.getElementById('examen_principal').value;

    var total=parseFloat(docencia)+parseFloat(experimento_aplicacion)+parseFloat(trabajo_autonomo);
    total=parseFloat(total).toFixed(2)
    document.getElementById("suma").value = total;

    promedio=parseFloat(total).toFixed(2) / 3;
    promedio=parseFloat(promedio).toFixed(2)
    document.getElementById("promedio_decimal").value = promedio;


    promedio_final=(Number(promedio)+Number(examen_principal))/2;
    promedio_final=parseFloat(promedio_final).toFixed(0);

    if (total>0){
        document.getElementById("promedio_final").value = parseFloat(promedio_final).toFixed(2);
        document.getElementById("promedio_letra").value = Unidades(parseInt(promedio_final));
    }

    if (promedio_final<7){
    document.getElementById("observacion").value='SUSPENSO';
    }else{
    document.getElementById("observacion").value="APROBADO";
    }
    if(promedio_final==10){
        document.getElementById("observacion").value="EXONERADO";
    }

    if(promedio_final<=2){
        document.getElementById("observacion").value="REPROBADO";
    }
}

function eligeEstudiante(){
    var combo = document.getElementById("matricula_id");
    var selected = combo.options[combo.selectedIndex].text;
    $("#estudiante_id").val(selected);
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


// Disable keyboard scrolling
$('input[type=number]').on('mousewheel',function(e){ $(this).blur(); });
$('input[type=number]').on('keydown',function(e) {
    var key = e.charCode || e.keyCode;
    // Disable Up and Down Arrows on Keyboard
    if(key == 38 || key == 40 ) {
	e.preventDefault();
    } else {
	return;
    }
});

</script>
@endpush

