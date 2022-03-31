@csrf

<div class="form-group ">
    <label for="name" class="col-form-label font-weight-bold text-muted">Nombre
        <span class="text-primary">*</span></label>
    @if ($role->exists)
        <div class="input-group">
            <input type="text" class="form-control @error('name') is-invalid @enderror" disabled
            value="{{ $role->name}}" placeholder="Nombre">
            <div class="input-group-prepend "><span class=" input-group-text">
                <i class=" text-primary fas fa-file"></i></span></div>
            @error ('name') <span class="invalid-feedback" role="alert"> <strong>{{$message}}</strong></span> @enderror
        </div>
    @else
    <div class="input-group">
        <input id="name" type="text" class="form-control @error('name') is-invalid @enderror"
        name="name" value="{{ old('name', $role->name) }}" placeholder="Nombre">
        <div class="input-group-prepend "><span class=" input-group-text">
            <i class=" text-primary fas fa-file"></i></span></div>
        @error ('name') <span class="invalid-feedback" role="alert"> <em>{{$message}}</span></em> @enderror
    </div>
    @endif


</div>
<div class="form-group">
    <label for="display_name" class="col-form-label font-weight-bold text-muted">Identificador
        <span class="text-primary">*</span></label>
    <div class="input-group">
        <input id="display_name" type="text" class="form-control @error('display_name') is-invalid @enderror"
        name="display_name" value="{{old('display_name', $role->display_name)}}" placeholder="Identificador">
        <div class="input-group-prepend "><span class=" input-group-text">
            <i class=" text-primary fas fa-file"></i></span></div>
        @error ('display_name') <span class="invalid-feedback" role="alert"> <em>{{$message}}</span></em> @enderror
    </div>
</div>

<div class="card shadow-sm m-3">
    <div class="form-group">
        <div class="card-header">
            <label for="name" class="col-form-label font-weight-bold small text-muted">
               ==  ASIGNAR PERMISOS ==
            </label>
        </div>
        <div class="col-md-8 mt-2">
                @include('users.partials.permissionCheckbox', ['model'=>$role])
        </div>
    </div>
</div>
