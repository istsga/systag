@extends('layouts.layout')
@section('title', ' Certificados|')
@push('styles')
<link href="{{asset('css/select2.min.css')}}" rel="stylesheet">
<link href="{{asset('css/select2-bootstrap4.min.css')}}" rel="stylesheet">
@endpush

@section('content')
<main class="c-main">
<div class="container-fluid">
    <div class="fade-in">
        <div class="col-md-12">
            <div class="card shadow-lg">
                <div class="card-header bg-primary">
                    <font class="text-light"> <i class="font-weight-bold fas fa-certificate mr-3"></i> CERTIFICADO POR PERIODO</font>
                </div>
                <div class="card-body bg-light">
                    <form action="">
                    <div class="row">
                        <div class="card col-lg-7 m-2 bg-light shadow-sm">
                            <div class="form-group p-2">
                                <label for="info_estudiante" class="font-weight-bold text-muted small">ESTUDIANTE</label>
                                <div class="input-group">
                                    <div class="input-group-prepend "><span class=" input-group-text">
                                        <i class=" text-primary fas fa-user"></i></span></div>
                                        <select name="estudiante_id" id="info_estudiante" class=" form-control @error('estudiante_id') is-invalid @enderror">
                                            <option class="form-control" value=""> == Seleccionar == </option>
                                            @foreach ($estudiantes as $estudiante)
                                                <option  value="{{$estudiante->id}}"
                                                    {{$estudiante_id == $estudiante->id ? 'selected' : '' }}
                                                    >{{$estudiante->nombre}} {{$estudiante->apellido}} - {{$estudiante->dni}}</option>
                                            @endforeach
                                        </select>
                                        @error ('estudiante_id') <span class="invalid-feedback" role="alert"> <em>{{$message}}</span></em> @enderror
                                        <button class=" btn btn-sm  btn-primary ml-1" type="submit"> <i class="fas fa-search"> </i></button>
                                </div>
                            </div>
                        </div>
                        <div class="col"></div>
                        <div class="card col-lg-4 m-2 bg-light shadow-sm">
                            <div class="form-group p-2">
                                <label for="periodo_id" class="font-weight-bold text-muted small">PERIODO</label>
                                <div class="input-group float-right ">
                                    <div class="input-group-prepend  "><span class=" input-group-text bg-primary  text-light">
                                        Periodo</span></div>
                                    <select name="periodo_id" id="periodo_id" class=" form-control ">
                                        <option class="form-control" value=""> == Seleccionar == </option>
                                        @foreach ($periodos as $periodo)
                                            <option  value="{{$periodo->id}}"
                                                >{{$periodo->nombre}}</option>
                                        @endforeach
                                    </select>
                                    <button class=" btn ml-1 btn-primary" type="submit" formtarget="_blank"> <i class="fas fa-print"></i> Imprimir </button>
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
