@extends('layouts.layout')
@section('title', ' Nómina de Estudiantes')|')
@push('styles')
<link href="{{asset('css/select2.min.css')}}" rel="stylesheet">
<link href="{{asset('css/select2-bootstrap4.min.css')}}" rel="stylesheet">
@endpush

@section('content')
<main class="c-main">
<div class="container-fluid">
    <div class="fade-in">
        <div class="col-md-12">
            <div class="card shadow-sm">
                <div class="card-header bg-primary">
                    <font class="text-light"> <i class="font-weight-bold fas fa-user-edit mr-3"></i> NÓMINA DE ESTUDIANTES</font>
                </div>
                <div class="card-body bg-light">
                    <form action="">
                    <div class="row m-2">
                        <div class="card col-lg-5 bg-light m-2 shadow-sm">
                            <div class="form-group p-2">
                                <label for="periodacademico_id" class="col-form-label font-weight-bold text-dark text-muted small">PERIODO ACADÉMICO
                                </label>
                                <div class="input-group">
                                    <div class="input-group-prepend "><span class=" input-group-text">
                                        <i class=" text-primary fas fa-calendar-check"></i></span></div>
                                    <select name="periodacademico_id" id="periodacademico_id" class="form-control">
                                        <option value="" class="form-control "> == Seleccionar ­­­­­­== </option>
                                        @foreach ($periodacademicos as $periodacademico)
                                            <option  value="{{$periodacademico->id}}"
                                                {{$periodacademico_id==$periodacademico->id ? 'selected' : '' }}
                                                >{{$periodacademico->periodo}}</option>
                                        @endforeach
                                    </select>
                                        <button class=" btn  btn-sm btn-primary ml-1 " type="submit"> <i class="fas fa-search"></i></button>
                                </div>
                            </div>
                        </div>
                        <div class="col"></div>
                        <div class="card col-lg-6 bg-light m-2 shadow-sm">
                            <div class="form-group p-2">
                                <label for="asignacione_id" class="col-form-label font-weight-bold text-muted small"> CARRERA | PERIODO | SECCIÓN | PARALELO
                                </label>
                                <div class="input-group mt-1">
                                    <div class="input-group-prepend "><span class=" input-group-text">
                                        <i class=" text-primary fas fa-layer-group"></i></span></div>
                                    <select name="asignacione_id" id="asignacione_id" class=" form-control ">
                                        <option class="form-control" value=""> == Seleccionar == </option>
                                            @foreach ($asignaciones as $asignacione)
                                                <option  value="{{$asignacione->id}}"
                                                    {{$asignacione_id==$asignacione->id ? 'selected' : ''}}
                                                    >{{$asignacione->carreras->pluck('nombre')->implode(', ')}} |
                                                    {{$asignacione->periodo->nombre}} |
                                                    {{$asignacione->seccione->nombre}} |
                                                    {{$asignacione->paralelo->nombre}}
                                                </option>
                                            @endforeach
                                    </select>
                                    <button class=" btn  btn-sm btn-primary ml-1 " type="submit" formtarget="_blank"> <i class="fas fa-print font-weight-bold"></i> <span class="ml-1"> Imprmir </span> </button>
                                </div>
                            </div>
                        </div>
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
    //Inicializa Select2 Estudiantes
    $('#info_estudiante').select2({
      theme: 'bootstrap4'
    });
});

</script>
@endpush
