<div>
    <div class="card-header ">
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
                    <th class="align-middle"><font>Cédula | Pasaporte</font></th>
                    <th class="align-middle"><font>Nombres y Apellidos</font></th>
                    <th class="align-middle"><font>Email</font></th>
                    <th class="align-middle"><font>Contactos</font></th>
                    <th class="align-middle"><font>Estado</font></th>
                    <th class="text-center align-middle"><font>Acción</font></th>
                </tr>
            </thead>
            <tbody style=" border: dotted 1px">
                @foreach ($docentes as $docente)
                <tr>
                <td class="text-center align-middle" >{{$docente->id}} </td>
                <td class="text-center align-middle" >{{$docente->dni}} </td>
                <td class="align-middle" >{{$docente->nombre}} {{$docente->apellido}}  </td>
                <td class="align-middle">{{$docente->email}} </td>
                <td class="align-middle">{{$docente->telefono_fijo}} | {{$docente->telefono_movil}}</td>
                    @if ($docente->estado==1)
                        <td class="align-middle"> <span class="badge badge-primary">Activo</span> </td>
                    @else
                        <td class="align-middle"> <span class="badge badge-danger">Inactivo</span>  </td>
                    @endif
                <td class="align-middle">
                    <div class=" form-inline justify-content-center ">
                        @can('update', $docente)
                         <a class=" btn btn-sm   btn-primary mr-3 mt-2 " href="{{route('docentes.edit', $docente)}}"><i class="fas fa-pencil-alt"></i></a>
                        @endcan

                        <a class=" btn  btn-sm  btn-dark mr-3  mt-2 " href="{{route('docentes.show', $docente)}}"><i class="fas fa-eye"></i></a>

                        @can('delete', $docente)
                            <form class="mr-3 mt-2  " method="POST"
                                action="{{route('docentes.destroy', $docente )}}">
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

    <div class="card-footer bg-light border-0 align-middle">
        @if($docentes->count())
            <nav class="d-flex justify-content-end mt-2">
                {{ $docentes->links() }}
            </nav>
        @else
            <div class="m-1 p-2 ">
                <em class=" text-muted">No hay resultados para la búsqueda "{{$search}}" en la página {{$page}} al mostrar {{$perPage}} por página.</em>
            </div>
        @endif
    </div>
</div>
