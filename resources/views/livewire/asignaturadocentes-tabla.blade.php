<div>
    <div class="card-header">
        <div class="row m-2">
            <div class="col-lg-2 p-2">
                <select wire:model="perPage" class="form-control" >
                    <option value="10">10 por página</option>
                    <option value="15">15 por página</option>
                    <option value="25">25 por página</option>
                </select>
            </div>
            <div class="col"></div>
            <div class="col-lg-8  p-2">
                <input wire:model="search"  type="text" class="form-control " placeholder="Buscar...">
            </div>
            <div class="col"></div>
            @if($search !== '')
                <div class="col-lg-1 p-2 ">
                    <button wire:click="clear" class="btn btn-primary btn-gradient" type="button"><i class="fas fa-window-close"></i></button>
                </div>
            @endif
        </div>
    </div>

    <div class="card-table  table-responsive">
        <table class="table table-hover  table-bordered align-middle">
            <thead class="thead-light">
                <tr>
                    <th class="text-center align-middle"><font>Nro</font></th>
                    <th class=" align-middle small font-weight-bold"><font>CARRERA | PERIODO | SESCIÓN | PARALELO</font></th>
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
    <div class="card-footer bg-light border-0 align-middle">
        @if($asignaturadocentes->count())
            <nav class="d-flex justify-content-end mt-2">
                {{ $asignaturadocentes->links() }}
            </nav>
        @else
            <div class="m-1 p-2 ">
                <em class=" text-muted">No hay resultados para la búsqueda "{{$search}}" en la página {{$page}} al mostrar {{$perPage}} por página.</em>
            </div>
        @endif
    </div>
</div>
