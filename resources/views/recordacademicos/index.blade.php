@extends('layouts.layout')
@section('title', ' Record Académico |')
@push('styles')
<link href="{{asset('css/select2.min.css')}}" rel="stylesheet">
<link href="{{asset('css/select2-bootstrap4.min.css')}}" rel="stylesheet">
@endpush

@section('content')
<main class="c-main">
<div class="container-fluid">
    <div class="fade-in">
        {{-- @include('partials.success') --}}
        <div class="row">
            <div class="col-md-12">
                <div class="card card-accent-primary shadow-lg">
                    <div class="card-header bg-primary">
                        <font class=" text-light"> <i class="font-weight-bold fas fa-microchip mr-3"></i> RECORD ACADÉMICO </font>
                    </div>
                    <form action="">
                        <div class="card-body bg-light">
                            <h3 class="text-muted font-weight-bold  small">ESTUDIANTE</h3>
                            <div class="row">
                                <div class="form-group col-lg-7">
                                    <div class="input-group">
                                        <div class="input-group-prepend "><span class=" input-group-text">
                                            <i class=" text-primary fas fa-user"></i></span></div>
                                            <select name="estudiante_id" id="record_estudiante" class=" form-control">
                                                <option class="form-control" value="">Seleccionar</option>
                                                @foreach ($estudiantes as $estudiante)
                                                    <option  value="{{$estudiante->id}}"
                                                        >{{$estudiante->nombre}} {{$estudiante->apellido}} - {{$estudiante->dni}}</option>
                                                @endforeach
                                            </select>
                                            <button class=" btn  btn-primary ml-1" type="submit" formtarget="_blank"> <i class="fas fa-print mr-2"> </i>Imprimir</button>
                                        </div>

                                    </div>
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
    $('#record_estudiante').select2({
      theme: 'bootstrap4'
    });
});

</script>
@endpush
