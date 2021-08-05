@extends('layouts.layout')
@section('title', ' Matriculas |')

@push('styles')
<link href="{{asset('css/select2.min.css')}}" rel="stylesheet">
<link href="{{asset('css/select2-bootstrap4.min.css')}}" rel="stylesheet">
@endpush

@section('content')

<main class="c-main">
<div class="container-fluid">
    <div class="fade-in">
        @include('partials.errors')
        <div class="row justify-content-center ">
            <div class="col-lg-9">
                <div class="card shadow-lg">
                    <div class="card-header bg-primary">
                        <h4 class=" text-light"><i class="fas fa-book  mr-3"></i> <span class="text-value">MATRÍCULA</span></h4>
                    </div>
                    <form method="POST"  action="{{ route('matriculas.store')}} ">
                        @csrf
                    <div class="card-body">

                            <div class="row">

                                <div class="form-group col-lg-6 ">
                                    <label for="tipo" class="col-form-label font-weight-bold text-muted">Tipo de Matrícula
                                        <span class="text-primary">*</span></label>
                                    <div class="input-group">
                                        <select name="tipo"  class=" prueba form-control @error('tipo') is-invalid @enderror ">
                                            <option class="form-control" value="" {{ old('estado') == 0 ? 'selected' : '' }}> == Seleccionar == </option>
                                            <option value="Ordinaria" {{ old('estado') == 1 ? 'selected' : '' }}>Ordinaria</option>
                                            <option value="Extraordinaria" {{ old('estado') == 2 ? 'selected' : '' }}>Extraordinaria</option>
                                            <option value="Especial" {{ old('estado') == 3 ? 'selected' : '' }}>Especial</option>
                                        </select>
                                        <div class="input-group-prepend "><span class=" input-group-text">
                                            <i class=" text-primary fas fa-check"></i></span></div>
                                        @error ('tipo') <span class="invalid-feedback" role="alert"> <em>{{$message}}</span></em> @enderror
                                    </div>
                                </div>

                                <div class="form-group col-lg-12 ">
                                    <label for="estudiante_id" class="col-form-label font-weight-bold text-muted">Estudiante
                                        <span class="text-primary">*</span>
                                    </label>
                                    <div class="input-group">
                                        <select name="estudiante_id" id="estudiante_id" class=" form-control @error('estudiante_id') is-invalid @enderror" onchange="cambiaAsignaciones();">
                                            <option class="form-control" value=""> == Seleccionar == </option>
                                            @foreach ($estudiantes as $estudiante)
                                            <option  value="{{$estudiante->id}}"
                                                {{old('estudiante_id')==$estudiante->id ? 'selected' : '' }}
                                                >{{$estudiante->nombre}} {{$estudiante->apellido}} - {{$estudiante->dni}}</option>
                                                @endforeach
                                        </select>
                                        <div class="input-group-prepend "><span class=" input-group-text">
                                            <i class=" text-primary fas fa-user"></i></span></div>
                                        @error ('estudiante_id') <span class="invalid-feedback" role="alert"> <em>{{$message}}</span></em> @enderror
                                    </div>
                                </div>

                                <div class="form-group col-lg-12">
                                    <label for="periodacademico_id" class="col-form-label font-weight-bold text-muted small">PERIODO ACADÉMICO | CARRERA | PERIODO | SECCIÓN | PARALELO</label>
                                    <div class="input-group">
                                        <select name="asignacione_id" id="xasignacione_id"  class="form-control @error('asignacione_id') is-invalid @enderror" onchange="cambiaAsignaturas();">
                                            <option class="form-control" value=""> == Seleccionar == </option>

                                        </select>
                                        <div class="input-group-prepend "><span class=" input-group-text">
                                            <i class=" text-primary fas fa-check"></i></span></div>
                                            @error ('asignacione_id') <span class="invalid-feedback" role="alert"> <em>{{$message}}</span></em> @enderror
                                    </div>

                                </div>

                                <div class="form-group col-lg-7">
                                    <label for="asignaturas" class="col-form-label font-weight-bold text-muted small">ASIGNATURAS
                                        <span class="text-primary">*</span></label>
                                        <div class="input-group">
                                        <select name="asignaturas[]" id="asignaturas" class=" form-control @error('asignaturas') is-invalid @enderror" multiple>
                                            <option class="form-control" value=""> == Selecionar == </option>
                                                {{-- Data --}}
                                        </select>
                                        <div class="input-group-prepend "><span class=" input-group-text">
                                            <i class=" text-primary fas fa-folder-open"></i></span></div>
                                        @error ('asignaturas') <span class="invalid-feedback" role="alert"> <em>{{$message}}</span></em> @enderror
                                        </div>
                                </div>

                                <div class="form-group col-lg-5">
                                    <label for="fecha_matricula" class="col-form-label font-weight-bold text-muted">Fecha
                                        <span class="text-primary">*</span>
                                    </label>
                                    <div class="input-group">
                                        <input type="date" class="form-control @error('fecha_matricula') is-invalid @enderror"
                                        name="fecha_matricula" value="{{old('fecha_matricula')}}">
                                        <div class="input-group-prepend "><span class=" input-group-text">
                                            <i class=" text-primary fas fa-calendar"></i></span></div>
                                        @error ('fecha_matricula') <span class="invalid-feedback" role="alert"> <em> {{$message}}</span> </em> @enderror
                                    </div>
                                </div>

                            </div>
                    </div>
                    <div class="card-footer border-0 d-flex justify-content-between aling-items-end bg-light">
                    <button class=" col-sm-3 border btn btn-primary" type="submit">Guardar</button>
                    <a class=" btn  col-sm-2 border  btn-dark " href="{{route('matriculas.index')}}">Cancelar</a>
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
    <script src="{{asset('js/jquery.min.js')}}"></script>
    <script src="{{asset('js/axios.min.js')}}"></script>
    <script src="{{asset('js/select2.full.min.js')}}"></script>

<script>
    //Select estudiantes
$(function () {
    $('#estudiante_id').select2({
      theme: 'bootstrap4'
    });

});

cambiaAsignaciones();

function cambiaAsignaciones(select) {
    var asignaciones = document.getElementById("xasignacione_id");
    var estud_id = document.getElementById('estudiante_id').value;
    console.log('pasox',estud_id);
    if(estud_id){
        axios.get('/getAsignaciones/'+estud_id)
        .then((resp)=>{
            //var asignaciones = document.getElementById("xasignacione_id");
            for (i = 0; i < Object.keys(resp.data).length; i++) {
            var option = document.createElement('option');
            option.value = resp.data[i].asignacione_id;
            console.log(resp.data[i]);
            option.text = resp.data[i].periodoAcademico+' '+resp.data[i].nombre +' '+resp.data[i].nombrePeriodo +' '+resp.data[i].nombreSeccion +' '+resp.data[i].nombreParalelo;
            //console.log('pasoy',asignaciones.options[i].value,'-',{{old("asignacione_id")}});
            if(asignaciones.options[i].value == "{{ old("asignacione_id") }}")
            {
                asignaciones.options[i].selected= true;
            }
            asignaciones.append(option);
            }
        })
        .catch(function (error) {console.log(error);})
    }else{
        document.getElementById("xasignacione_id").length  = 1
        asignaciones.options[0].value =""
        asignaciones.options[0].text = " == Seleccionar =="
    }
}


function cambiaAsignaturas(select){

    var asignaturas = document.getElementById("asignaturas");
    for (let i = asignaturas.options.length; i >= 0; i--) {
        asignaturas.remove(i);
    }

    var id = document.getElementById('xasignacione_id').value;
    var estud_id = document.getElementById('estudiante_id').value;
    console.log( id, estud_id);
    if(id){

        axios.get('/getAsignaturas/'+id+ '/'+estud_id)
        .then((resp)=>{
            var asignaturas = document.getElementById("asignaturas");
            console.log(Object.keys(resp.data).length);
            for (i = 0; i < Object.keys(resp.data).length; i++) {
            var option = document.createElement('option');
            option.value = resp.data[i].id;
            console.log(resp.data[i].nombre);
            option.text = resp.data[i].nombre;
            asignaturas.append(option);
            }
        })
        .catch(function (error) {console.log(error);})
    }else{
        document.getElementById("asignaturas").length  = 1
        asignaturas.options[0].value = ""
        asignaturas.options[0].text = "Selecionar"
    }
}


</script>
@endpush

