@extends('layouts.layout')
@section('title', ' Periodos académicos |')
@section('content')

<main class="c-main">
<div class="container-fluid">
    <div class="fade-in">
        @include('partials.success')
        <div class="row">
            <div class="col-lg-12">
                <div class="card card-accent-primary shadow-lg">
                    <div class="card-header bg-primary  d-flex justify-content-between aling-items-end ">
                        <font class=" text-light align-self-center text-black vertical-align-inherit "> <i class=" fas fa-calendar  mr-3"></i> PERIODOS ACADÉMICOS </font>
                        @can('create', new App\Models\Periodacademico)
                            <a class=" btn btn-primary " href="{{route('periodacademicos.create')}}"> <i class=" font-weight-bold fas fa-plus mr-1"></i>Agregar</a>
                        @endcan
                    </div>

                    @if (count($periodacademicos) > 0)
                    <div class="card-table  table-responsive">
                        <table class="table table-hover  table-bordered align-middle">
                            <thead class="thead-light ">
                                <tr>
                                    <th class="text-center align-middle "><font>Nro</th>
                                    <th class="align-middle"><font>Año Periodo</font></th>
                                    <th class="align-middle"><font>Estado</font></th>
                                    <th class="align-middle"><font>Fecha Inicio</font></th>
                                    <th class="align-middle"><font>Fecha Final</font></th>
                                    <th class="align-middle"><font>Carreras</font></th>
                                    <th class="text-center align-middle"><font>Acción</font></th>
                                </tr>
                            </thead>
                            <tbody>
                                @foreach ($periodacademicos as $periodacademico)
                                    <tr>
                                    <td class="text-center align-middle" >{{$periodacademico->id}} </td>
                                    <td class="align-middle" >{{$periodacademico->periodo}} </td>

                                    @if ($periodacademico->estado=='Nuevo')
                                        <td class="align-middle"> <span class="badge badge-primary">Nuevo</span> </td>
                                    @endif

                                    @if ($periodacademico->estado=='En Curso')
                                        <td class="align-middle"> <span class="badge badge-warning">En Curso</span> </td>
                                    @endif

                                    @if ($periodacademico->estado=='Finalizado')
                                        <td class="align-middle"> <span class="badge badge-danger">Finalizado</span> </td>
                                    @endif

                                    <td class="align-middle" >{{$periodacademico->fecha_inicio}} </td>
                                    <td class="align-middle" >{{$periodacademico->fecha_final}} </td>
                                    <td class="align-middle" >{{$periodacademico->carreras->pluck('nombre')->implode(' | ')}}</td>

                                    <td class="align-middle">
                                        <div class=" form-inline justify-content-center">
                                            @can('update', $periodacademico)
                                                <a class=" btn btn-sm   btn-primary mr-3 mt-2 " href="{{route('periodacademicos.edit', $periodacademico)}}"><i class="fas fa-pencil-alt"></i></a>
                                            @endcan

                                            @can('delete', $periodacademico)
                                                <form class="mr-3 mt-2 " method="POST"
                                                    action="{{route('periodacademicos.destroy', $periodacademico )}}">
                                                    @csrf @method('DELETE')

                                                    <button class=" btn btn-sm btn-danger"
                                                        onclick="return confirm('¿Estas Seguro de Eliminar?.')">
                                                        <i class="fas fa-trash-alt"></i>
                                                    </button>
                                                </form>
                                            @endcan
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
</div>
</main>
@endsection
