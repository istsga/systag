@extends('layouts.layout')
@section('title', ' Asignar Docente |')

@push('styles')
<link href="{{asset('css/select2.min.css')}}" rel="stylesheet">
<link href="{{asset('css/select2-bootstrap4.min.css')}}" rel="stylesheet">
@endpush

@section('content')

<main class="c-main">
<div class="container-fluid">
    <div class="fade-in">
        <div class="row justify-content-center ">
            <div class="col-lg-8">
                <div class="card shadow-lg">
                    <div class="card-header bg-primary">
                        <h4 class=" text-light"><i class="fas fa-book  mr-3"></i> <span class="text-value">ASIGNAR DOCENTES</span></h4>
                    </div>
                    <div class="card-body">
                            <form method="POST"  action="{{ route('asignaturadocentes.update', $asignaturadocente)}} ">
                                @csrf @method('PUT')
                            <div class=" col-lg-12">
                                <div class="row">

                                    <div class="form-group col-lg-12 ">
                                        <label for="asignacione_id" class="col-form-label font-weight-bold text-muted">Carrera | Periodo | Sección
                                            <span class="text-primary">*</span>
                                        </label>
                                        <div class="input-group">
                                            <select name="asignacione_id" id="asigperiodo"  class="form-control @error('asignacione_id') is-invalid @enderror ">
                                                <option class="form-control" value="">Seleccionar</option>
                                                @foreach ($asignaciones as $asignacione)
                                                <option  value="{{$asignacione->id}}"
                                                    {{old('asignaciones', $asignacione->asignacione_id)==$asignacione->id ? 'selected' : '' }}
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

                                    <div class="form-group col-sm-6 ">
                                        <label for="asignatura_id" class="col-form-label font-weight-bold text-muted">Asignaturas
                                            <span class="text-primary">*</span></label>
                                        <div class="input-group">
                                            <select name="asignatura_id" id="id_asignatura"  class="form-control @error('asignatura_id') is-invalid @enderror">
                                                {{-- @foreach ($asignaturas as $asignatura)
                                                <option  value="{{$asignatura->id}}"
                                                    {{old('asignaturas')==$asignatura->id ? 'selected' : '' }}
                                                    >{{$asignatura->nombre}}</option>
                                                @endforeach --}}
                                                </select>
                                                <div class="input-group-prepend "><span class=" input-group-text">
                                                    <i class=" text-primary fas fa-folder"></i></span></div>
                                            @error ('asignatura_id') <span class="invalid-feedback" role="alert"> <em>{{$message}}</span></em> @enderror
                                        </div>
                                    </div>

                                    <div class="form-group col-lg-6 ">
                                        <label for="docente_id" class="col-form-label font-weight-bold text-muted">Docentes
                                            <span class="text-primary">*</span></label>
                                        <div class="input-group">
                                            <select name="docente_id" id="id_docente"  class="form-control @error('docente_id') is-invalid @enderror ">
                                                <option class="form-control" value=""> == Seleccionar == </option>
                                                @foreach ($docentes as $docente)
                                                <option  value="{{$docente->id}}"
                                                    {{old('docentes')==$docente->id ? 'selected' : '' }}
                                                    >{{$docente->nombre}}</option>
                                                    @endforeach
                                                </select>
                                                <div class="input-group-prepend "><span class=" input-group-text">
                                                    <i class=" text-primary fas fa-user"></i></span></div>
                                            @error ('docente_id') <span class="invalid-feedback" role="alert"> <em>{{$message}}</span></em> @enderror
                                        </div>
                                    </div>
                                </div>
                                </div>
                    </div>
                    <div class="card-footer border-0 d-flex justify-content-between aling-items-end bg-light">
                        <button class=" col-sm-3 border btn btn-primary" type="submit">Guardar</button>
                        <a class=" btn  col-sm-2 border  btn-dark " href="{{route('asignaturadocentes.index')}}">Cancelar</a>

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
<script src="{{asset('js/select2.full.min.js')}}"></script>
<script>

$(function () {
    //Inicializa Select2
    $('#docente_id').select2({
      theme: 'bootstrap4'
    });

});

</script>
@endpush

