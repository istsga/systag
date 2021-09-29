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

        <ul>
            @foreach ($errors->all() as $error)
                <li>{{ $error }}</li>
            @endforeach
        </ul>
        <div class="card c-callout c-callout-primary bg-light shadow-lg ">
            <div class="card-header bg-primary">
                <font class=" text-light font-weight-bold "> <i class="font-weight-bold  fas fa-user  mr-3"></i> ESTUDIANTE </font>
            </div>
            <div class="card-body">
                <form class="form-horizontal" method="POST"  action="{{ route('suspensos.update', $suspenso)}} ">
                    @csrf @method('PUT')
                <div class="row">
                    <div class="card col-lg-12 bg-light shadow-sm">
                        <div class=" form-group ">
                            <label for="asignacione_id" class="col-form-label font-weight-bold small text-muted">CARRERA | PERIODO | SECCIÓN | PARALELO
                            </label>
                            <div class="input-group">
                                <div class="input-group-prepend "><span class=" input-group-text">
                                    <i class=" text-primary fas fa-check"></i></span></div>
                                    <label class="ml-3" >{{$suspenso->asignacione->periodacademicos->pluck('periodo')->implode(', ')}} |
                                                {{$suspenso->asignacione->carreras->pluck('nombre')->implode(', ')}} |
                                                {{$suspenso->asignacione->periodo->nombre}} |
                                                {{$suspenso->asignacione->seccione->nombre}} |
                                                {{$suspenso->asignacione->paralelo->nombre}}
                                    </label>
                                    <input class="invisible" type="text" name="asignacione_id" value="{{$suspenso->asignacione_id}}">
                            </div>
                        </div>
                    </div>

                    <div class="card col-lg-6 bg-light shadow-sm">
                        <div class="form-group ">
                                <label for="asignacione_id" class="col-form-label font-weight-bold small text-muted">ASIGNATURAS
                                </label>
                                <div class="input-group">
                                    <div class="input-group-prepend "><span class=" input-group-text">
                                        <i class=" text-primary fas fa-book"></i></span></div>
                                        <label class="ml-3" for="">{{$suspenso->asignatura->nombre}}</label>
                                        <input class="invisible " type="text" name="asignatura_id" value="{{$suspenso->asignatura_id}}">
                                </div>
                        </div>
                    </div>

                    <div class="col"></div>

                    <div class="card col-lg-5 bg-light shadow-sm">
                        <div class="form-group ">
                                <label for="matricula_id" class="col-form-label font-weight-bold small text-muted">ESTUDIANTES
                                </label>
                                <div class="input-group ">
                                    <div class="input-group-prepend "><span class=" input-group-text">
                                        <i class=" text-primary fas fa-user"></i></span></div>
                                        <label class="ml-3" for="">{{$suspenso->estudiante->nombre}} {{$suspenso->estudiante->apellido}}</label>
                                        <input class="invisible" type="text" name="estudiante_id" value="{{$suspenso->estudiante_id}}">
                                </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>

            <div class="card">

                <div class="card-header bg-primary  ">

                    <font class=" text-light font-weight-bold align-self-center text-black vertical-align-inherit "> <i class="fas fa-star-half-alt  mr-3"></i> EDITAR NOTAS SUSPENSO</font>
                </div>

                <div class="card-body">
                    <div class="card shadow-sm">
                        <div class="row m-2">
                            <div class="col-lg-4">
                                <div class="c-callout c-callout-primary"> <small class="text-muted"><font style="vertical-align: inherit;">NOTA FINAL</font></small>
                                    <div class="text-value-lg"><input type="number" value="{{old('promedio_final', $suspenso->promedio_final)}}"  name="promedio_final" id="promedio_final"  class="form-control @error('promedio_final') is-invalid @enderror"  step="0.01" oninput="calcular()">
                                    @error ('promedio_final') <span class="invalid-feedback" role="alert"> <small><em>{{$message}}</span> </em></small> @enderror
                                </div>
                                </div>
                            </div>

                            <div class="col-lg-4">
                                <div class="c-callout c-callout-primary"><small class="text-muted"><font style="vertical-align: inherit;">EXAMEN DE SUSPENSIÓN</font></small>
                                    <div class="text-value-lg"><input type="number" value="{{old( 'examen_suspenso', $suspenso->examen_suspenso)}}"  name="examen_suspenso" id="examen_suspenso"  class="form-control @error('examen_suspenso') is-invalid @enderror" >
                                    @error ('examen_suspenso') <span class="invalid-feedback" role="alert"> <small><em>{{$message}}</span> </em></small> @enderror
                                </div>
                                </div>
                            </div>


                            <div class="col-lg-4">
                                <div class="c-callout c-callout-info"><small class="text-muted"><font style="vertical-align: inherit;">SUMA</font></small>
                                    <div class="text-value-lg"> <input type="number" value="{{old('suma', $suspenso->suma)}}" name="suma" id="suma" class="form-control @error('suma') is-invalid @enderror text-info bg-light">
                                        @error ('suma') <span class="invalid-feedback" role="alert"> <small><em>{{$message}}</span> </em></small> @enderror
                                    </div>
                                </div>
                            </div>

                        </div>
                    </div>

                    <div class="card shadow-sm">
                        <div class="row m-2">
                            <div class="col-lg-4">
                                <div class="c-callout c-callout-info"><small class="text-muted"><font style="vertical-align: inherit;">PROMEDIO EN DECIMALES</font></small>
                                    <div class="text-value-lg"><input type="decimal" value="{{old('promedio_numero', $suspenso->promedio_numero)}}"  name="promedio_numero" id="promedio_numero" class="form-control @error('promedio_numero') is-invalid @enderror text-info bg-light">
                                        @error ('promedio_numero') <span class="invalid-feedback" role="alert"> <small><em>{{$message}}</span> </em></small> @enderror
                                    </div>
                                </div>
                            </div>

                            <div class="col-lg-4">
                                <div class="c-callout c-callout-info"><small class="text-muted"><font style="vertical-align: inherit;">PROMEDIO EN LETRAS</font></small>
                                        <div class="text-value-lg"><input type="text" name="promedio_letra" value="{{old('promedio_letra', $suspenso->promedio_letra)}}" id="promedio_letra" class="form-control @error('promedio_letra') is-invalid @enderror text-info bg-light ">
                                        @error ('promedio_letra') <span class="invalid-feedback" role="alert"> <small><em>{{$message}}</span> </em></small> @enderror
                                    </div>
                                </div>
                            </div>

                            <div class="col-lg-4">
                                <div class="c-callout c-callout-primary"><small class="text-muted"><font style="vertical-align: inherit;">OBSERVACIÓN</font></small>
                                    <div class="text-value-lg"><input class="form-control @error('observacion') is-invalid @enderror" type="text" value="{{old('observacion', $suspenso->observacion)}}"  name="observacion" id="observacion" >
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
<script src="{{asset('js/select2.full.min.js')}}"></script>
<script type="text/javascript">


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

    function eligeEstudiante(){
        var combo = document.getElementById("matricula_id");
        var selected = combo.options[combo.selectedIndex].text;
        $("#estudiante_id").val(selected);
    }

    //números a letras
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

</script>
@endpush
@endsection
