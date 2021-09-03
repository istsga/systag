@foreach ($permissions as $id=> $name)
    <div class="checkbox ">

        @if (substr($name, 0, 3)=='Ver')
            <br>
        <div class="row text-capitalize font-weight-bold ml-1">
        <label for=" ">  {{substr($name, 3, 35)}}</label>
        </div>
        @endif

        <label>
            <input name="permissions[]" type="checkbox" class="mr-2" value="{{$name}}"
            {{$model->permissions->contains($id)
            || collect(old('permissions'))->contains($name)
            ? 'checked' : ''}}
            >{{$name}}
        </label>
    </div>
@endforeach
