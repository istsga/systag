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
                    <th class="text-center"><font style="vertical-align: inherit;">Nro</font></th>
                    <th><font style="vertical-align: inherit;">Cédula | Pasaporte</font></font></th>
                    <th><font style="vertical-align: inherit;">Nombres y Apellidos</font></font></th>
                    <th><font style="vertical-align: inherit;">Email</font></font></th>
                    <th><font style="vertical-align: inherit;">Roles</font></font></th>
                    <th class="text-center"><font style="vertical-align: inherit;">Acción</font></font></th>
                </tr>
            </thead>
            <tbody>
                @foreach ($users as $user)
                <tr>
                <td class="text-center align-middle" >{{$user->id}} </td>
                <td class="align-middle">{{$user->dni}} </td>
                <td class="align-middle">{{$user->nombre}} {{$user->apellido}}</td>
                <td class="align-middle">{{$user->email}} </td>
                <td class="align-middle">{{$user->getRoleNames()->implode(', ')}} </td>

                <td>
                    <div class=" form-inline justify-content-center px-4 ">
                        @can('view', $user)
                            <a class=" btn  btn-sm  btn-dark mr-3 mt-2 " href="{{route('users.show', $user)}}"> <i class="fas fa-eye-slash"></i></a>
                        @endcan

                        @can('update', $user)
                            <a class=" btn btn-sm  btn-primary mr-3 mt-2 " href="{{route('users.edit', $user)}}"><i class="fas fa-pencil-alt"></i></a>
                        @endcan

                        @can('delete', $user)
                            <form class="mr-3 mt-2 " method="POST"
                                action="{{route('users.destroy', $user )}}">
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
        @if($users->count())
            <nav class="d-flex justify-content-end mt-2">
                {{ $users->links() }}
            </nav>
        @else
            <div class="m-1 p-2 ">
                <em class=" text-muted">No hay resultados para la búsqueda "{{$search}}" en la página {{$page}} al mostrar {{$perPage}} por página.</em>
            </div>
        @endif
    </div>
</div>
