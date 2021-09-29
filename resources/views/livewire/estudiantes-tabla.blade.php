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
                    <th class="align-middle"><font>Cédula | Pasaporte</font></th>
                    <th class="align-middle"><font>Nombres y Apellidos</font></th>
                    <th class="align-middle"><font>Foto</font></th>
                    <th class="align-middle"><font>Email</font></th>
                    <th class="align-middle"><font>Estado</font></th>
                    <th class="text-center align-middle"><font>Acción</font></th>
                </tr>
            </thead>
            <tbody>
                @foreach ($estudiantes as $estudiante)
                <tr>
                <td class="text-center align-middle" >{{$estudiante->id}} </td>
                <td class="align-middle" >{{$estudiante->dni}} </td>
                <td class="align-middle">{{$estudiante->nombre}} {{$estudiante->apellido}}  </td>
                <td class="align-middle" >
                    <div class="profile-header-img d-flex justify-content-center ">
                        <img style="border: solid #3D9970  2px" class="rounded-circle  " width="60px" height="60px" src="/storage/{{$estudiante->foto}}" alt="No tiene Imagen">
                    </div>
                </td>
                <td class="align-middle">{{$estudiante->email}} </td>
                @if ($estudiante->estado=='Activo')
                    <td class="align-middle"> <span class="badge badge-primary">Activo</span> </td>
                @endif

                @if ($estudiante->estado=='Egresado')
                    <td class="align-middle"> <span class="badge badge-warning">Egresado</span> </td>
                @endif

                @if ($estudiante->estado=='Retirado')
                    <td class="align-middle"> <span class="badge badge-danger">Retirado</span> </td>
                @endif

                <td class="align-middle">
                    <div class=" form-inline justify-content-center ">
                        @can('update', $estudiante)
                            <a class=" btn btn-sm   btn-primary mr-3 mt-2 " href="{{route('estudiantes.edit', $estudiante)}}"><i class="fas fa-pencil-alt"></i></a>
                        @endcan

                        {{-- Verificar su funcionamiento --}}
                        {{-- @can('view', $estudiante) --}}
                            <a class=" btn  btn-sm  btn-dark mr-3 mt-2" href="{{route('estudiantes.show', $estudiante)}}"><i class="fas fa-eye"></i></a>
                        {{-- @endcan --}}

                        @can('delete', $estudiante)
                            <form class="mr-3 mt-2 " method="POST"
                                action="{{route('estudiantes.destroy', $estudiante )}}">
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
        @if($estudiantes->count())
            <nav class="d-flex justify-content-end mt-2">
                {{ $estudiantes->links() }}
            </nav>
        @else
            <div class="m-1 p-2 ">
                <em class=" text-muted">No hay resultados para la búsqueda "{{$search}}" en la página {{$page}} al mostrar {{$perPage}} por página.</em>
            </div>
        @endif
    </div>
</div>
