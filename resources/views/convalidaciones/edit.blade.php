@extends('layouts.layout')
@section('title', ' Convalidación|')

@push('styles')
<link href="{{asset('css/select2.min.css')}}" rel="stylesheet">
<link href="{{asset('css/select2-bootstrap4.min.css')}}" rel="stylesheet">
@endpush

@section('content')

<main class="c-main">
<div class="container-fluid">
    <div class="fade-in">
        <div class="row justify-content-center ">
             <div class="col-lg-9">
                <div class="card shadow-lg">
                    <div class="card-header bg-primary">
                        <h4 class=" text-light"><i class="fas fa-book  mr-3"></i> <span class="text-value">CONVALIDACIÓN</span></h4>
                    </div>

                    <form method="POST"  action="{{ route('convalidaciones.update', $convalidacione)}} ">
                        @csrf @method('PUT')
                        <div class="card-body">
                            <div class="card shadow-sm">
                                <div class="row m-4">
                                    <div class="form-group col-lg-12 ">
                                        <label for="estudiante_id" class="col-form-label font-weight-bold text-muted">Estudiante
                                            <span class="text-primary">*</span>
                                        </label>
                                        <div class="input-group">
                                            <select name="estudiante_id" id="estudiante_id" class=" form-control @error('estudiante_id') is-invalid @enderror">
                                                <option class="form-control" value=""> == Seleccionar ==</option>
                                                @foreach ($estudiantes as $estudiante)
                                                <option  value="{{$estudiante->id}}"
                                                    {{old('estudiante_id', $convalidacione->estudiante_id)==$estudiante->id ? 'selected' : '' }}
                                                    >{{$estudiante->nombre}} {{$estudiante->apellido}} - {{$estudiante->dni}}</option>
                                                    @endforeach
                                            </select>
                                            <div class="input-group-prepend "><span class=" input-group-text">
                                                <i class=" text-primary fas fa-user"></i></span></div>
                                            @error ('estudiante_id') <span class="invalid-feedback" role="alert"> <em>{{$message}}</span></em> @enderror
                                        </div>
                                    </div>

                                    <div class="form-group col-lg-12 ">
                                        <label for="carrera_id" class="col-form-label font-weight-bold text-muted">Carrera
                                            <span class="text-primary">*</span>
                                        </label>
                                        <div class="input-group">
                                            <select name="carrera_id" id="carrera_id" class=" form-control @error('carrera_id') is-invalid @enderror" onchange="filtroAsignaturas();">
                                                <option class="form-control" value=""> == Seleccionar == </option>
                                                @foreach ($carreras as $carrera)
                                                <option  value="{{$carrera->id}}"
                                                    {{old('carrera_id', $convalidacione->carrera_id)==$carrera->id ? 'selected' : '' }}
                                                    >{{$carrera->nombre}} </option>
                                                    @endforeach
                                            </select>
                                            <div class="input-group-prepend "><span class=" input-group-text">
                                                <i class=" text-primary fas fa-graduation-cap"></i></span></div>
                                            @error ('carrera_id') <span class="invalid-feedback" role="alert"> <em>{{$message}}</span></em> @enderror
                                        </div>
                                    </div>
                                </div>

                                <div class="card shadow-sm m-4">
                                    <div class="row m-1">
                                        <div class="form-group col-lg-7 ">
                                            <label for="asignatura_id" class="col-form-label font-weight-bold text-muted">Asignaturas
                                                <span class="text-primary">*</span>
                                            </label>
                                            <div class="input-group">
                                                <select name="asignatura_id" id="asignatura_id" class=" form-control @error('asignatura_id') is-invalid @enderror">
                                                    <option class="form-control" value=""> == Seleccionar == </option>
                                                    @foreach ($asignaturas as $asignatura)
                                                        <option  value="{{$asignatura->id}}"
                                                        {{old('asignatura_id', $convalidacione->asignatura_id)==$asignatura->id ? 'selected' : '' }}
                                                        >{{$asignatura->nombre}} </option>
                                                    @endforeach
                                            </select>
                                            <div class="input-group-prepend "><span class=" input-group-text">
                                                <i class=" text-primary fas fa-folder"></i></span></div>
                                                @error ('asignatura_id') <span class="invalid-feedback" role="alert"> <em>{{$message}}</span></em> @enderror
                                            </div>
                                        </div>

                                        <div class="col"></div>

                                        <div class="form-group col-lg-4">
                                            <label for="nota_final" class="col-form-label font-weight-bold text-muted">Nota del Promedio
                                                <span class="text-primary">*</span>
                                            </label>
                                            <div class="input-group">
                                                <input type="number"  class="form-control @error('nota_final') is-invalid @enderror"
                                                    name="nota_final" id="nota_final" value="{{old('nota_final', $convalidacione->nota_final)}}">
                                                <div class="input-group-prepend "><span class=" input-group-text">
                                                <i class=" text-primary fas fa-star"></i></span></div>
                                                @error ('nota_final') <span class="invalid-feedback" role="alert"> <em> {{$message}}</span> </em> @enderror
                                            </div>
                                        </div>
                                    </div>
                                </div>
                            </div>
                        </div>
                        <div class="card-footer border-0 d-flex justify-content-between aling-items-end bg-light">
                        <button class=" col-sm-3 border btn btn-primary" type="submit">Guardar</button>
                        <a class=" btn  col-sm-2 border  btn-dark " href="{{route('convalidaciones.index')}}">Cancelar</a>
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
$(function () {
    //Select2 estudiantes
    $('#estudiante_id').select2({
      theme: 'bootstrap4'
    });

});


function filtroAsignaturas(select){

    var asignaturas = document.getElementById("asignatura_id");
    for (let i = asignaturas.options.length; i >= 0; i--) {
        asignaturas.remove(i);
    }

    var id = document.getElementById('carrera_id').value;
    if(id){
        axios.post('/getConvalidaciones/'+id)
        .then((resp)=>{
            var asignaturas = document.getElementById("asignatura_id");
            for (i = 0; i < Object.keys(resp.data).length; i++) {
                var option = document.createElement('option');
                    option.value = resp.data[i].id;
                    option.text = resp.data[i].nombre;

                    //verificar  la funcionalidad old
                    if(resp.data[i].id == "{{ old("asignatura_id") }}")
                    {
                        option.selected= true;
                    }
                    asignaturas.append(option);
            }
        })
        .catch(function (error) {console.log(error);})
    }else{
        document.getElementById("asignatura_id").length  = 1
        asignaturas.options[0].value = ""
        asignaturas.options[0].text = "== Seleccionar =="
    }
}

</script>
@endpush

