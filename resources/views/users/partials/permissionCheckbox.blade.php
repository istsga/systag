@foreach ($permissions as $id=> $name)
    <div class="checkbox ">

        @if (substr($name, 0, 3)=='Ver')
            <br>
        <div class="row text-capitalize font-weight-bold">
        <label for=" ">  {{substr($name, 3, 20)}}</label>
        </div>
        @endif

        <label>
            <input name="permissions[]" type="checkbox" class="mr-2" value="{{$name}}"
            {{$model->permissions->contains($id)
            || collect(old('permissions'))->contains($name)
            ? 'checked' : ''}}
            >{{$name}}
        </label>

        @if (substr($name, 0, 3)=='Ver')
        @endif
    </div>
@endforeach
