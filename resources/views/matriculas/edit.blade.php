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
        <div class="row justify-content-center ">
            <div class="col-lg-9">
                <div class="card shadow-lg">
                    <div class="card-header bg-primary">
                        <h4 class=" text-light"><i class="fas fa-book  mr-3"></i> <span class="text-value">MATRÍCULA</span></h4>
                    </div>
                    <div class="card-body">
                            <form method="POST"  action="{{ route('matriculas.update', $matricula)}} ">
                                @csrf @method('PUT')
                            <div class=" col-lg-12">
                                <div class="card shadow-sm">
                                    <div class="row m-2">

                                        <div class="form-group col-lg-6 ">
                                            <label for="tipo" class="col-form-label font-weight-bold text-muted">Tipo de Matrícula
                                                <span class="text-primary">*</span></label>
                                            <div class="input-group">
                                                <select name="tipo" id="tipo" class=" prueba form-control @error('tipo') is-invalid @enderror ">
                                                    <option class="form-control" value=""> == Seleccionar == </option>
                                                    <option value="Ordinaria" {{ old('tipo', $matricula->tipo) == 'Ordinaria' ? 'selected' : '' }}>Ordinaria</option>
                                                    <option value="Extraordinaria" {{ old('tipo', $matricula->tipo) == 'Extraordinaria' ? 'selected' : '' }}>Extraordinaria</option>
                                                    <option value="Especial" {{ old('tipo', $matricula->tipo) == 'Especial' ? 'selected' : '' }}>Especial</option>
                                                </select>
                                                <div class="input-group-prepend "><span class=" input-group-text">
                                                    <i class=" text-primary fas fa-check"></i></span></div>
                                                @error ('tipo') <span class="invalid-feedback" role="alert"> <em>{{$message}}</span></em> @enderror
                                            </div>
                                        </div>

                                        <div class="form-group col-lg-6">
                                            <label for="fecha_matricula" class="col-form-label font-weight-bold text-muted">Fecha
                                                <span class="text-primary">*</span>
                                            </label>
                                            <div class="input-group">
                                                <input type="date" class="form-control @error('fecha_matricula') is-invalid @enderror"
                                                name="fecha_matricula" id="fecha_matricula" value="{{old('fecha_matricula', $matricula->fecha_matricula)}}">
                                                <div class="input-group-prepend "><span class=" input-group-text">
                                                <i class=" text-primary fas fa-calendar"></i></span></div>
                                                @error ('fecha_matricula') <span class="invalid-feedback" role="alert"> <em> {{$message}}</span> </em> @enderror
                                            </div>
                                        </div>

                                        <div class="form-group col-lg-12 ">
                                            <label for="estudiante_id" class="col-form-label font-weight-bold text-muted">Estudiante
                                                <span class="text-primary">*</span>
                                            </label>
                                            <div class="input-group">
                                                <select name="estudiante_id" id="estudiante_id" class=" form-control @error('estudiante_id') is-invalid @enderror">
                                                    <option class="form-control" value=""> == Seleccionar == </option>
                                                    @foreach ($estudiantes as $estudiante)
                                                    <option  value="{{$estudiante->id}}"
                                                        {{old('estudiante_id', $matricula->estudiante_id)==$estudiante->id ? 'selected' : '' }}
                                                        >{{$estudiante->nombre}}, {{$estudiante->dni}}</option>
                                                        @endforeach
                                                </select>
                                                <div class="input-group-prepend "><span class=" input-group-text">
                                                    <i class=" text-primary fas fa-user"></i></span></div>
                                                @error ('estudiante_id') <span class="invalid-feedback" role="alert"> <em>{{$message}}</span></em> @enderror
                                            </div>
                                        </div>

                                        <div class="form-group col-lg-12 ">
                                            <label for="asignacione_id" class="col-form-label font-weight-bold text-muted small">PERIODO ACADÉMICO | CARRERA | PERIODO | SECCIÓN | PARALELO
                                                <span class="text-primary">*</span>
                                            </label>
                                            <div class="input-group">
                                                <select name="asignacione_id" id="asignacione_id"  class="form-control @error('asignacione_id') is-invalid @enderror" onchange="cambia_asignatura(this)">
                                                    <option class="form-control" value=""> == Seleccionar == </option>
                                                    {{-- Data asignaciones --}}
                                                </select>
                                                <div class="input-group-prepend "><span class=" input-group-text">
                                                    <i class=" text-primary fas fa-check"></i></span></div>
                                                @error ('asignacione_id') <span class="invalid-feedback" role="alert"> <em>{{$message}}</span></em> @enderror
                                            </div>
                                        </div>

                                        <div class="card col-lg-8 m-3">
                                            <div class="form-group  ">
                                                <div class="card-header">
                                                    <label for="asignaturas" class="col-form-label font-weight-bold text-muted small"> == SELECCIONAR ASIGNATURAS ==
                                                        <span class="text-primary">*</span></label>
                                                </div>
                                                <div class="input-group">
                                                    <select name="asignaturas[]" id="asignaturas_id"  class="form-control @error('asignaturas') is-invalid @enderror" multiple>
                                                        <option class="form-control" value=""> == Selecionar == </option>
                                                        {{-- Data asiganturas--}}
                                                    </select>
                                                    <div class="input-group-prepend "><span class=" input-group-text">
                                                        <i class=" text-primary fas fa-folder-open"></i></span></div>
                                                @error ('asignaturas') <span class="invalid-feedback" role="alert"> <em>{{$message}}</span></em> @enderror
                                                </div>
                                                <em class="text-muted small font-weight-bold">Pulsar Ctrl para seleccionar varias opciones</em>
                                            </div>
                                        </div>
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

$(function () {
    $('#estudiante_id').select2({
      theme: 'bootstrap4'
    });
});


</script>
@endpush

