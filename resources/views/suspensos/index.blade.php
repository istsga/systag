@extends('layouts.layout')
@section('title', ' Suspensos |')
@section('content')

<main class="c-main">
<div class="container-fluid">
    <div class="fade-in">
        @include('partials.success')
        <div class="row">
            <div class="col-md-12">
                <div class="card card-accent-primary shadow-lg">
                    <div class="card-header bg-primary  d-flex justify-content-between aling-items-end ">
                        <font class=" text-light align-self-center text-black vertical-align-inherit "> <i class="font-weight-bold fas fa-star-half-alt mr-3"></i> SUSPENSOS </font>
                        @can('create', new App\Models\Suspenso)
                            <a class=" btn btn-primary " href="{{route('suspensos.create')}}"> <i class=" font-weight-bold fas fa-plus mr-1"></i>Agregar</a>
                        @endcan
                    </div>
                    <form action="">
                        <div class="card-body bg-light">
                            <div class="row">
                                <div class="card col-lg-5 bg-light m-2 shadow-sm">
                                    <div class="form-group p-2">
                                        <label for="periodacademico_id" class="col-form-label font-weight-bold text-muted  small">PERIODO ACADÉMICO</label>
                                        <div class="input-group">
                                            <div class="input-group-prepend "><span class=" input-group-text">
                                                <i class=" text-primary fas fa-calendar-check"></i></span></div>
                                            <select name="periodacademico_id" id="periodacademico_id" class="form-control  @error('periodacademicos') is-invalid @enderror">
                                                <option value="" class="form-control  "> == Seleccionar == </option>
                                                @foreach ($periodacademicos as $periodacademico)
                                                    <option  value="{{$periodacademico->id}}"
                                                        {{$query==$periodacademico->id ? 'selected' : '' }}
                                                        >{{$query.'+'.$periodacademico->periodo}}</option>
                                                @endforeach
                                            </select>
                                            @error ('periodacademicos') <span class="invalid-feedback" role="alert"> <strong>{{$message}}</strong></span> @enderror
                                            <button class=" btn  btn-sm btn-primary ml-1 " type="submit"> <i class="fas fa-search"></i></button>
                                        </div>
                                    </div>
                                </div>
                                <div class="col"></div>
                                <div class="card col-lg-6 bg-light m-2 shadow-sm">
                                    <div class="form-group p-2">
                                        <label for="asignacione_id" class="col-form-label font-weight-bold text-muted small">CARRERA | PERIODO | SECCIÓN | PARALELO </label>
                                        <div class="input-group">
                                            <div class="input-group-prepend "><span class=" input-group-text">
                                                <i class=" text-primary fas fa-layer-group"></i></span></div>
                                            <select name="asignacione_id" id="asignacione_id" class=" form-control ">
                                                <option class="form-control" value=""> == Seleccionar == </option>

                                                @foreach ($asignaciones as $asignacione)
                                                    <option  value="{{$asignacione->id}}"
                                                        {{$queryAsignacione==$asignacione->id ? 'selected' : '' }}
                                                        >{{$asignacione->carreras->pluck('nombre')->implode(', ')}}
                                                        {{$asignacione->periodo->nombre}}
                                                        {{$asignacione->seccione->nombre}}
                                                        {{$asignacione->paralelo->nombre}}
                                                    </option>
                                                @endforeach
                                            </select>
                                            <button class=" btn  btn-sm btn-primary ml-1 " type="submit"> <i class="fas fa-search"></i></button>
                                        </div>
                                    </div>
                                </div>
                                <div class="card col-lg-5 bg-light m-2 shadow-sm">
                                    <div class="form-group p-2">
                                            <label for="asignacione_id" class="col-form-label font-weight-bold text-muted small"> ASIGNATURAS </label>
                                            <div class="input-group">
                                                <div class="input-group-prepend "><span class=" input-group-text">
                                                    <i class=" text-primary fas fa-book"></i></span></div>
                                                <select name="asignatura_id" id="asignatura_id" class=" form-control">
                                                    <option class="form-control" value=""> == Seleccionar == </option>
                                                    @foreach ($asignaturas as $asignatura)
                                                        <option  value="{{$asignatura->asignatura_id}}"
                                                            {{$queryAsignatura==$asignatura->asignatura_id ? 'selected' : '' }}
                                                            >{{$queryAsignacione.'-'.$asignatura->nombre}}</option>
                                                    @endforeach
                                                </select>
                                                <button class="btn btn-primary ml-1 " type="submit"> <i class="fas fa-eye-slash"> </i> Ver </button>
                                            </div>
                                        </div>
                                    </div>
                                </div>
                            </div>
                        </div>
                    </form>
                </div>
            </div>

            <div class="card card-accent-primary shadow-lg ">

                @if (count($suspensos) > 0)
                <div class="card-header bg-primary  d-flex justify-content-between aling-items-end ">
                    <font class=" text-light align-self-center text-black vertical-align-inherit "> <i class="font-weight-bold far fa-user mr-3"></i> ALUMNOS </font>
                        <a class=" btn btn-primary " href="{{route('reporteSuspenso', $queryAsignacione.'_'.$queryAsignatura)}}" target="_blank"> <i class="font-weight-bold fas fa-print mr-1"></i> Imprimir</a>
                </div>
                <div class="card-table  table-responsive">
                    <table class="table table-hover  table-bordered align-middle">
                        <thead class="thead-light">
                            <tr>
                                <th class="text-center"><font style="vertical-align: inherit;">Nro</font></th>
                                <th><font style="vertical-align: inherit;">NOMBRES Y APELLIDOS</font></th>
                                <th class="text-center"><font style="vertical-align: inherit;">@role('Administrador') Acción edición @else  Acción @endrole</font></th>
                            </tr>
                        </thead>
                        <tbody>
                            @foreach ($suspensos as $index => $suspenso)
                            <tr>
                            <td class="text-center align-middle" >{{$index+1}} </td>
                            <td class="align-middle">{{$suspenso->estudiante->nombre}} {{$suspenso->estudiante->apellido}}</td>
                            <td class="align-middle">
                                @role('Administrador')
                                    <div class="px-4 mt-1 justify-content-center form-inline">
                                        <select name="" id="" class="form-control col-lg-4 bg-light" onchange="autorizarEdicion(this, {{$suspenso->estudiante->id}});">
                                            <option class="form-control" value=""> == Seleccionar == </option>
                                            <option class="form-control" value="0"> == No Autorizado  == </option>
                                            <option class="form-control" value="1"> == Autorizado == </option>
                                        </select>
                                    </div>
                                @else
                                    <div class=" form-inline justify-content-center px-4 ">
                                    @can('update', $suspenso)
                                        @if($suspenso->estado_suspenso == 1)
                                            <a class=" btn btn-sm  btn-primary mr-3 mt-2 " href="{{route('suspensos.edit', $suspenso)}}"><i class="fas fa-pencil-alt"></i></a>
                                        @endif
                                    @endcan
                                @endrole

                                    {{-- @can('delete', $suspenso)
                                        <form class="mr-3 mt-2 " method="POST"
                                            action="{{route('suspensos.destroy', $suspenso )}}">
                                            @csrf @method('DELETE')

                                            <button class=" btn btn-sm btn-danger"
                                                onclick="return confirm('¿Estas Seguro de Eliminar?.')">
                                                <i class="fas fa-trash-alt"></i>
                                            </button>
                                        </form>
                                    @endcan --}}
                                </div>
                            </td>
                            </tr>
                        @endforeach
                        </tbody>
                    </table>
                </div>

                @else
                        <em class=" mt-2 mb-2 ml-3 text-muted">No tienes registros.</em>
                @endif
            </div>
        </div>
    </div>
</div>
</main>
@endsection
@push('scripts')
<script src="{{asset('js/axios.min.js')}}"></script>
<script>

function autorizarEdicion(valor, estudiante_id){
    console.log(valor.value);

    var asignacione_id = document.getElementById('asignacione_id').value;
    var asignatura_id = document.getElementById('asignatura_id').value;

    axios.post('/autorizarSuspenso/'+asignacione_id+'_'+estudiante_id+'_'+asignatura_id)
        .then((respuesta)=>{
            console.log(respuesta)
        }
        ).catch((error)=>{
            if(error.response){
                console.log(error.response.data);
            }
    })

}



</script>
@endpush
