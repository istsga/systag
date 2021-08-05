@extends('layouts.layout')
@section('title', ' Periodos |')
@section('content')

<main class="c-main">
<div class="container-fluid">
    <div class="fade-in">
        @include('partials.success')

        <div class="row">
            <div class="col-md-12">
                <div class="card card-accent-primary shadow-lg">
                    <div class="card-header bg-primary  d-flex justify-content-between aling-items-end ">
                        <font class=" text-light align-self-center text-black vertical-align-inherit "> <i class="font-weight-bold fas fa-layer-group mr-3"></i> PERIODOS </font>
                        @can('create', new App\Models\Periodo)
                            <a class=" btn btn-primary " href="{{route('periodos.create')}}"> <i class=" font-weight-bold fas fa-plus mr-1"></i>Agregar</a>
                        @endcan
                    </div>
                @if (count($periodos) > 0)
                    <div class="card-table  table-responsive">
                        <table class="table table-hover  table-bordered align-middle">
                            <thead class="thead-light">
                                <tr>
                                    <th class="text-center"><font class="align-middle">Nro</font></th>
                                    <th class="align-middle"><font>Nombre</font></th>
                                    <th class="text-center align-middle"><font>Acción</font></th>
                                </tr>
                            </thead>
                            <tbody>
                            @foreach ($periodos as $periodo)
                                <tr>
                                <td class="text-center align-middle" >{{$periodo->id}} </td>
                                <td class="align-middle">{{$periodo->nombre}} </td>
                                <td class="align-middle">
                                    <div class=" form-inline justify-content-center px-4 ">
                                        @can('update', $periodo)
                                            <a class=" btn btn-sm   btn-primary mr-3 mt-2" href="{{route('periodos.edit', $periodo)}}"><i class="fas fa-pencil-alt"></i></a>
                                        @endcan

                                        @can('delete', $periodo)
                                            <form class="mr-3 mt-2 " method="POST"
                                                action="{{route('periodos.destroy', $periodo )}}">
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
