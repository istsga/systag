@extends('layouts.layout')
@section('title', ' Calificaciones por periodo |')

@push('styles')
<link href="{{asset('css/select2.min.css')}}" rel="stylesheet">
<link href="{{asset('css/select2-bootstrap4.min.css')}}" rel="stylesheet">
@endpush

@section('content')

<main class="c-main">
<div class="container-fluid">
    <div class="fade-in">
        @include('partials.success')
        <div class="row">
            <div class="col-md-12">
                <div class="card card-accent-primary shadow-lg">
                    <div class="card-header bg-primary">
                        <font class=" text-light"> <i class="font-weight-bold fas fa-id-badge mr-3"></i> NOTAS POR PERIODO </font>
                    </div>
                    <form action="">
                        <div class="card-body bg-light">
                            <h3 class="text-muted font-weight-bold small">ESTUDIANTE</h3>
                            <div class="row">
                                <div class="form-group col-lg-7">
                                    <div class="input-group">
                                        <div class="input-group-prepend "><span class=" input-group-text">
                                            <i class=" text-primary fas fa-user"></i></span></div>
                                        <select name="estudiante_id" id="nota_estudiante" class=" form-control @error('estudiante_id') is-invalid @enderror">
                                            <option class="form-control" value="">Seleccionar</option>
                                            @foreach ($estudiantes as $estudiante)
                                                <option  value="{{$estudiante->id}}"
                                                    {{$estudiante_id == $estudiante->id ? 'selected' : '' }}
                                                    >{{$estudiante->nombre}} {{$estudiante->apellido}} - {{$estudiante->dni}}</option>
                                            @endforeach
                                        </select>
                                        @error ('estudiante_id') <span class="invalid-feedback" role="alert"> <em>{{$message}}</span></em> @enderror
                                        <button class=" btn  btn-sm btn-primary ml-1 " type="submit"> <i class="fas fa-search"></i></button>
                                    </div>
                                </div>

                                <div class="form-group col-lg-5">
                                    <div class="input-group col-lg-9 float-right ">
                                        <div class="input-group-prepend  "><span class=" input-group-text bg-primary  text-light">
                                            Periodo</span></div>
                                        <select name="periodo_id" id="periodo_id" class=" form-control ">
                                            <option class="form-control" value="">Seleccionar</option>
                                            @foreach ($periodos as $periodo)
                                                <option  value="{{$periodo->id}}"
                                                    >{{$periodo->id}} {{$periodo->nombre}}</option>
                                            @endforeach
                                        </select>
                                        <button class=" btn ml-1  btn-sm btn-primary" type="submit"> <i class="fas fa-search"></i></button>
                                    </div>
                                </div>
                            </div>
                </form>
            </div>
        </div>

        @if (count($calificaciones) > 0)
        <div class="col-lg-12">
            <div class="card shadow-lg ">
            <div class="card-header bg-primary  d-flex justify-content-between aling-items-end ">
                <font class=" text-light align-self-center text-black vertical-align-inherit "> <i class="font-weight-bold fas fa-star  mr-3"></i> NOTAS </font>

                    <a class=" btn btn-primary " href="{{route('pdfconsolidado', $estudiante_id.'_'.$periodo_id)}}"> <i class=" font-weight-bold fas fa-print mr-1"></i>Imprimir</a>

            </div>

                <div class="card-table  table-responsive">
                    <table class="table table-hover  table-bordered">
                        <thead class="thead-light ">
                            <tr class="align-middle">
                                <th class="text-center align-middle font-weight-normal text-dark"><em>No.</em></th>
                                <th colspan="2" class="text-center align-middle font-weight-normal text-dark"><em>Asignatura</em></th>
                                <th class="text-center align-middle font-weight-normal text-dark"><em>Docencia</em></th>
                                <th class="text-center align-middle font-weight-normal text-dark"><em>Experimento <br> Aplicación</em></th>
                                <th class="text-center align-middle font-weight-normal text-dark"><em>Trabajo <br> Autónomo</em></th>
                                <th class="text-center align-middle font-weight-normal text-dark"><em>Suma</em></th>
                                <th class="text-center align-middle font-weight-normal text-dark"><em>Promedio <br> Decimal</em></th>
                                <th class="text-center align-middle font-weight-normal text-dark"><em>Examen <br> Principal</em></th>
                                <th class="text-center align-middle font-weight-normal text-dark"><em>Promedio <br> Final</em></th>
                                <th class="text-center align-middle font-weight-normal text-dark"><em>Suspensión</em></th>
                                <th class="text-center align-middle font-weight-normal text-dark"><em>Promedio <br>letras</em></th>
                                <th class="text-center align-middle font-weight-normal text-dark"><em>Asistencia</em></th>
                                <th class="text-center align-middle font-weight-normal text-dark"><em>Observación</em></th>
                            </tr>
                        </thead>
                        <tbody>
                            @foreach ($calificaciones as $index => $calificacione)

                            <tr>
                                <td class="text-center align-middle">{{$index+1}}</td>
                                <td colspan="2">{{$calificacione->asignatura->periodo_id.'-'.$calificacione->asignatura->nombre}}</td>
                                <td class="text-center align-middle">{{$calificacione->docencia}}</td>
                                <td class="text-center align-middle">{{$calificacione->experimento_aplicacion}}</td>
                                <td class="text-center align-middle">{{$calificacione->trabajo_autonomo}}</td>
                                <td class="text-center align-middle">{{$calificacione->suma}}</td>
                                <td class="text-center align-middle">{{$calificacione->promedio_decimal}}</td>
                                <td class="text-center align-middle">{{$calificacione->examen_principal}}</td>
                                <td class="text-center align-middle">{{$calificacione->promedio_final}}</td>
                                <td class="text-center align-middle">{{$calificacione->suspension}}</td>
                                <td class="text-center align-middle">{{$calificacione->promedio_letra}}</td>
                                <td class="text-center align-middle">{{$calificacione->porcentaje_asistencia}}</td>
                                <td class="text-center align-middle">{{$calificacione->observacion}}</td>
                            </tr>

                            @endforeach
                        </tbody>
                    </table>
                </div>
            </div>
            </div>
        @else
            <em class=" mt-2 mb-2 ml-3 text-muted"> </em>
        @endif

</div>
</main>
@endsection

@push('scripts')
    <script src="{{asset('js/jquery.min.js')}}"></script>
    <script src="{{asset('js/select2.full.min.js')}}"></script>

<script>
$(function () {
    //Inicializa Select2 Estudiantes
    $('#nota_estudiante').select2({
      theme: 'bootstrap4'
    });
});

</script>
@endpush
