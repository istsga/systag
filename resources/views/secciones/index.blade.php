@extends('layouts.layout')
@section('title', ' Sección |')
@section('content')

<main class="c-main">
<div class="container-fluid">
    <div class="fade-in">
        @include('partials.success')

        <div class="row">
            <div class="col-md-12">
                <div class="card card-accent-primary shadow-lg">
                    <div class="card-header bg-primary  d-flex justify-content-between aling-items-end ">
                        <font class=" text-light align-self-center text-black vertical-align-inherit "> <i class="font-weight-bold fas fa-sort-amount-down-alt mr-3"></i> SECCIONES </font>
                        @can('create', new App\Models\Seccione)
                            <a class=" btn btn-primary " href="{{route('secciones.create')}}"> <i class=" font-weight-bold fas fa-plus mr-1"></i>Agregar</a>
                        @endcan
                    </div>
                    <div class="card-table  table-responsive">
                        <table class="table table-hover  table-bordered align-middle">
                            <thead class="thead-light">
                                <tr>
                                    <th class="text-center align-middle"><font>Nro</font></th>
                                    <th class="align-middle"><font>Nombre</font></th>
                                    <th class="text-center align-middle"><font >Acción</font></th>
                                </tr>
                            </thead>
                            <tbody>
                            @foreach ($secciones as $seccione)
                                <tr>
                                <td class="text-center align-middle" >{{$seccione->id}} </td>
                                <td class="align-middle" >{{$seccione->nombre}} </td>
                                <td class="align-middle">
                                    <div class=" form-inline justify-content-center px-4 ">
                                        @can('update', $seccione)
                                            <a class=" btn btn-sm   btn-primary mr-3 mt-2" href="{{route('secciones.edit', $seccione)}}"><i class="fas fa-pencil-alt"></i></a>
                                        @endcan

                                        @can('delete', $seccione)
                                            <form class="mr-3 mt-2 " method="POST"
                                                action="{{route('secciones.destroy', $seccione )}}">
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
                </div>
            </div>
        </div>
    </div>
</div>
</main>
@endsection

