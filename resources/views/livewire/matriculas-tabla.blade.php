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
                    <th class="align-middle"><font>ESTUDIANTE</font></th>
                    <th class="align-middle"><font>Periodo Académico</font></th>
                    <th class="align-middle"><font>Carrera</font></th>
                    <th class="align-middle"><font>Periodo</font></th>
                    <th class="align-middle"><font>Sección</font></th>
                    <th class="align-middle"><font>Paralelo</font></th>
                    <th class="align-middle"><font>Tipo</font></th>
                    <th class="text-center align-middle"><font>Acción</font></th>
                </tr>
            </thead>
            <tbody>
                @foreach ($matriculas as $matricula)
                <tr>
                <td class="text-center align-middle" >{{$matricula->id}} </td>
                <td class="align-middle">{{$matricula->estudiante->nombre}} {{$matricula->estudiante->apellido}} </td>
                <td class="align-middle">{{$matricula->asignacione->periodacademicos->pluck('periodo')->implode(', ')}}</td>
                <td class="align-middle">{{$matricula->asignacione->carreras->pluck('nombre')->implode(', ')}}</td>
                <td class="align-middle">{{$matricula->asignacione->periodo->nombre}}</td>
                <td class="align-middle">{{$matricula->asignacione->seccione->nombre}}</td>
                <td class="align-middle">{{$matricula->asignacione->paralelo->nombre}}</td>
                <td class="align-middle">{{$matricula->tipo}} </td>

                <td class="align-middle">
                    <div class=" form-inline justify-content-center">
                        @can('update', $matricula)
                            <a class=" btn btn-sm  btn-primary mr-3 mt-2 " href="{{route('matriculas.edit', $matricula)}}"><i class="fas fa-pencil-alt"></i></a>
                        @endcan

                        @can('view', $matricula)
                            <a class=" btn  btn-sm  btn-danger mr-3 mt-2 " href="{{route('reporteMatricula', $matricula->id)}}" target="_blank"><i class="fas fa-file-pdf"></i></a>
                        @endcan


                        @can('delete', $matricula)
                            <form class="mr-3 mt-2 " method="POST"
                                action="{{route('matriculas.destroy', $matricula )}}">
                                @csrf @method('DELETE')

                                <button class=" btn btn-sm btn-warning"
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
    <div class="card-footer bg-light border-0 align-middle">
        @if($matriculas->count())
            <nav class="d-flex justify-content-end mt-2">
                {{ $matriculas->links() }}
            </nav>
        @else
            <div class="m-1 p-2 ">
                <em class=" text-muted">No hay resultados para la búsqueda "{{$search}}" en la página {{$page}} al mostrar {{$perPage}} por página.</em>
            </div>
        @endif
    </div>
</div>
