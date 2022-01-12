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
                            <div class="row m-2">
                                <div class="card bg-light col-lg-7 m-2 shadow-sm">
                                    <div class="form-group p-2">
                                        <h3 class="text-muted font-weight-bold small">ESTUDIANTE</h3>
                                        <div class="input-group">
                                            <div class="input-group-prepend "><span class=" input-group-text">
                                                <i class=" text-primary fas fa-user"></i></span></div>
                                            <select name="estudiante_id" id="nota_estudiante" class=" form-control">
                                                <option class="form-control" value=""> == Seleccionar == </option>
                                                @foreach ($estudiantes as $estudiante)
                                                    <option  value="{{$estudiante->id}}"
                                                        {{$estudiante_id == $estudiante->id ? 'selected' : '' }}
                                                        >{{$estudiante->nombre}} {{$estudiante->apellido}} - {{$estudiante->dni}}</option>
                                                @endforeach
                                            </select>
                                            <button class=" btn  btn-sm btn-primary ml-1 " type="submit"> <i class="fas fa-search"></i></button>
                                        </div>
                                    </div>
                                </div>
                                <div class="col"></div>
                                <div class="card bg-light col-lg-4 m-2 shadow-sm">
                                <div class="form-group p-2">
                                    <h3 class="text-muted font-weight-bold small">PERIODO</h3>
                                    <div class="input-group ">
                                        <div class="input-group-prepend  "><span class=" input-group-text bg-primary  text-light">
                                            Periodo</span></div>
                                        <select name="periodo_id" id="periodo_id" class=" form-control ">
                                            <option class="form-control" value=""> == Seleccionar == </option>
                                            @foreach ($periodos as $periodo)
                                                <option  value="{{$periodo->id}}"
                                                    {{$periodo_id == $periodo->id ? 'selected' : '' }}
                                                    >{{$periodo->nombre}}</option>
                                            @endforeach
                                        </select>
                                        <button class=" btn ml-1  btn-primary" type="submit"> <i class="fas fa-eye"></i> Ver </button>
                                    </div>
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
                <font class=" text-light align-self-center text-black vertical-align-inherit "> <i class="font-weight-bold fas fa-star  mr-3"></i> NOTAS CONSOLIDADO POR PERIODO </font>
                    @can('create', new App\Models\Calificacionperiodo)
                        <a class=" btn btn-primary " target="_blank" href="{{route('reporteCalificacionperiodo', $estudiante_id.'_'.$periodo_id)}}" > <i class=" font-weight-bold fas fa-print mr-1"></i>Imprimir</a>
                    @endcan

            </div>

                <div class="card-table  table-responsive">
                    <table class="table table-hover">
                        <thead class="thead-light font-weight-bold small">
                            <tr class="align-middle">
                                <th class="text-center align-middle">No.</th>
                                <th colspan="2" class="text-center align-middle ">Asignatura</th>
                                <th class="text-center align-middle">Docencia</th>
                                <th class="text-center align-middle">Experimento <br> Aplicación</th>
                                <th class="text-center align-middle">Trabajo <br> Autónomo</th>
                                <th class="text-center align-middle">Suma</th>
                                <th class="text-center align-middle">Promedio <br> Decimal</th>
                                <th class="text-center align-middle">Examen <br> Principal</th>
                                <th class="text-center align-middle">Promedio <br> Número</th>
                                <th class="text-center align-middle">Promedio <br> Letras</th>
                                <th class="text-center align-middle">Asistencia <br> (%) </th>
                                <th class="text-center align-middle">Observación</th>
                                <th class="text-center align-middle">Examen <br> Suspensión</th>
                                <th class="text-center align-middle">Observación</th>
                            </tr>
                        </thead>
                        <tbody class="small ">
                            @foreach ($calificaciones as $index => $calificacione)

                            <tr>
                                <td class="text-center align-middle">{{$index+1}}</td>
                                <td colspan="2" class="text-uppercase">{{$calificacione->asignatura->nombre}}</td>
                                <td class="text-center align-middle">{{$calificacione->docencia}}</td>
                                <td class="text-center align-middle">{{$calificacione->experimento_aplicacion}}</td>
                                <td class="text-center align-middle">{{$calificacione->trabajo_autonomo}}</td>
                                <td class="text-center align-middle font-weight-bold">{{$calificacione->suma}}</td>
                                <td class="text-center align-middle">{{$calificacione->promedio_decimal}}</td>
                                <td class="text-center align-middle">{{$calificacione->examen_principal}}</td>
                                <td class="text-center align-middle font-weight-bold">{{$calificacione->promedio_final}}</td>
                                <td class="text-center align-middle">{{$calificacione->promedio_letra}}</td>
                                <td class="text-center align-middle">{{$calificacione->porcentaje_asistencia}}</td>

                                <td class="text-center align-middle">
                                    @if ($calificacione->observacion == 'APROBADO')
                                    <span class="badge-primary p-1">APROBADO</span></td>
                                    @endif
                                    @if ($calificacione->observacion == 'SUSPENSO')
                                    <span class="badge-warning p-1">SUSPENSO</span></td>
                                    @endif
                                    @if ($calificacione->observacion == 'REPROBADO')
                                        <span class="badge-danger p-1"> REPROBADO</span>
                                    @endif
                                    @if ($calificacione->observacion == 'EXONERADO')
                                        <span class="badge-info p-1"> EXONERADO</span>
                                    @endif
                                </td>

                                <td class="text-center align-middle">{{$calificacione->suspensoNota}}</td>

                                <td class="text-center align-middle">
                                    @if ($calificacione->ObservacionSuspenso == 'APROBADO')
                                        <span class="badge-primary p-1">APROBADO</span>
                                    @elseif ($calificacione->ObservacionSuspenso == 'REPROBADO')
                                        <span class="badge-danger p-1">REPROBADO</span>
                                    @endif
                                </td>
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
