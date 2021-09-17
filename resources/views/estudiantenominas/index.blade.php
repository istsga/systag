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
            <div class="card">
                <div class="card-header bg-primary">
                    <font class="text-light"> <i class="font-weight-bold fas fa-user-edit mr-3"></i> NÓMINA DE ESTUDIANTES</font>
                </div>
                <div class="card-body bg-light">
                    <form action="">
                    <div class="row">

                        <div class="form-group col-lg-6">
                            <label for="periodacademicos" class="col-form-label font-weight-bold text-dark text-muted">Periodo Académico
                            </label>
                            <div class="input-group">
                                <div class="input-group-prepend "><span class=" input-group-text">
                                    <i class=" text-primary fas fa-calendar-check"></i></span></div>
                                <select name="periodacademico_id" class="form-control">
                                    <option value="" class="form-control "> == Seleccionar ­­­­­­== </option>
                                    @foreach ($periodacademicos as $periodacademico)
                                        <option  value="{{$periodacademico->id}}"
                                            {{$query_periodacademico==$periodacademico->id ? 'selected' : '' }}
                                            >{{$periodacademico->periodo}}</option>
                                    @endforeach
                                </select>
                                    <button class=" btn  btn-sm btn-primary ml-1 " type="submit"> <i class="fas fa-search"></i></button>
                            </div>
                        </div>

                        <div class="form-group col-lg-6">
                            <label for="asignacione_id" class="col-form-label font-weight-bold text-muted small"> CARRERA
                            </label>
                            <div class="input-group">
                                <div class="input-group-prepend "><span class=" input-group-text">
                                    <i class=" text-primary fas fa-layer-group"></i></span></div>
                                <select name="carrera_id" id="carrera_id" class=" form-control ">
                                    <option class="form-control" value=""> == Seleccionar == </option>
                                        {{-- @foreach ($carreras as $carrera)
                                            <option  value="{{$carrera->id}}"
                                            {{$queryCarrera==$carrera->id ? 'selected' : '' }}
                                            >{{$carrera->id}} {{$carrera->nombre}}</option>
                                        @endforeach --}}
                                </select>
                                <button class=" btn  btn-sm btn-outline-danger ml-1 " type="submit"> <i class=" fas fa-file-pdf"></i> <span class="ml-1"> Imprmir </span> </button>
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
