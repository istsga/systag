@extends('layouts.layout')
@section('title', ' Distributivos|')
@section('content')

<main class="c-main">
<div class="container-fluid">
    <div class="fade-in">
        @include('partials.success')
        <div class="row">
            <div class="col-md-12">
                <div class="card shadow-lg ">
                <div class="card-header bg-primary  d-flex justify-content-between aling-items-end ">
                    <font class=" text-light align-self-center text-black vertical-align-inherit "> <i class="font-weight-bold fas fa-business-time  mr-3"></i> DISTRIBUTIVOS Y CARGAS HORARIAS </font>
                    @can('create', new App\Models\Asignaturadocente)
                        <a class=" btn btn-primary " href="{{route('asignaturadocentes.create')}}"> <i class=" font-weight-bold fas fa-plus mr-1"></i>Agregar</a>
                    @endcan
                </div>

                @if (Count($asignaturadocentes) > 0)
                <div class="card-header d-flex justify-content-between aling-items-end">
                    <form class="col-lg-12 px-0 my-2 my-lg-0 no-waves-effect">
                        <div class="input-group">
                            <input name="search" type="search" class="form-control" placeholder="Buscar..." aria-label="Buscar..." aria-describedby="basic-addon2">
                            <div class="input-group-append">
                                <button class="btn btn-primary btn-gradient waves-effect waves-light" type="submit"><span class="gradient"><font style="vertical-align: inherit;">Buscar</span></button>
                            </div>
                        </div>
                    </form>

                </div>

                <div class="card-table  table-responsive">
                    <table class="table table-hover  table-bordered align-middle">
                        <thead class="thead-light">
                            <tr>
                                <th class="text-center align-middle"><font>Nro</font></th>
                                <th class=" align-middle"><font>Periodo Acádemico</font></th>
                                <th class=" align-middle"><font>Docente</font></th>
                                <th class=" align-middle"><font>Asignatura</font></th>
                                <th class=" text-center align-middle"><font>Acción</font></th>
                            </tr>
                        </thead>
                        <tbody>
                            @foreach ($asignaturadocentes as $asignaturadocente)
                            <tr>
                            <td class="text-center align-middle" >{{$asignaturadocente->id}} </td>
                            <td class="align-middle" >{{$asignaturadocente->asignacione->periodacademicos->pluck('periodo')->implode(', ')}} |
                                 {{$asignaturadocente->asignacione->carreras->pluck('nombre')->implode(', ')}} |
                                 {{$asignaturadocente->asignacione->periodo->nombre}} |
                                 {{$asignaturadocente->asignacione->seccione->nombre}} |
                                 {{$asignaturadocente->asignacione->paralelo->nombre}}</td>
                            <td class="align-middle">{{$asignaturadocente->nombre}} {{$asignaturadocente->apellido}}</td>
                            <td class="align-middle">{{$asignaturadocente->asignatura_nombre}}</td>


                            <td class="align-middle">
                                <div class=" form-inline justify-content-center">
                                    @can('update', $asignaturadocente)
                                        <a class=" btn btn-sm  btn-primary mr-3 mt-2 " href="{{route('asignaturadocentes.edit', $asignaturadocente)}}"><i class="fas fa-pencil-alt"></i></a>
                                    @endcan

                                    <a class=" btn  btn-sm  btn-dark mr-3 mt-2" href="{{route('asignaturadocentes.show', $asignaturadocente)}}"><i class="fas fa-eye"></i></a>

                                    @can('delete', $asignaturadocente)
                                        <form class="mr-3 mt-2 " method="POST"
                                            action="{{route('asignaturadocentes.destroy', $asignaturadocente )}}">
                                            @csrf @method('DELETE')
                                            <button class=" btn btn-sm btn-danger"
                                                onclick="return confirm('¿Estás seguro de que deseas eliminar esta función?')">
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
              <nav class="d-flex justify-content-end">
                {{ $asignaturadocentes->links() }}
              </nav>
            </div>
            @else
                <em class=" mt-2 mb-2 ml-3 text-muted">No tienes registros.</em>
            @endif
        </div>
    </div>
</div>
</main>
@endsection
