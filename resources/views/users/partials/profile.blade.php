@extends('users.show')
@section('title', ' Avatar usuario |')
@section('profile')
<main class="c-main">
    <div class="container-fluid">
        <div class="fade-in">
           <div class="">
            @if ($message = Session::get('success'))

            <div class="alert alert-success alert-block">

                <button type="button" class="close" data-dismiss="alert">×</button>

                <strong>{{ $message }}</strong>

            </div>

            @endif
                <div class="row justify-content-center">

                    <div class="profile-header-container">
                        <div class="profile-header-img">
                            @if (auth()->user()->avatar == null)
                            <div> <i class=" fas fa-user-circle fa-8x rounded-circle border" style="color: #375A64;"></i> </div>
                            @else
                                <img class="rounded-circle" width="120" src="/uploads/avatars/{{auth()->user()->avatar }}"/>
                            @endif
                            <!-- badge -->
                        </div>
                    </div>
                </div>
                <div class="row justify-content-center mt-1">

                    <form action="/profile" method="post" enctype="multipart/form-data">
                        @csrf
                        <div class="form-group">
                            <input type="file" class="form-control-file " name="avatar" id="avatarFile" aria-describedby="fileHelp" accept="image/*">
                            <small id="fileHelp" class="form-text text-muted">Cargue un archivo de imagen válido. El tamaño de la imagen no debe ser superior a 2 MB..</small>
                        </div>
                                @if (count($errors) > 0)
                                <div class="alert alert-danger">
                                    <button type="button" class="close" data-dismiss="alert">×</button>
                                    <ul>
                                        @foreach ($errors->all() as $error)
                                            <li>{{ $error }}</li>
                                        @endforeach
                                    </ul>
                                </div>
                                @endif
                        <button type="submit" class="btn btn-block btn-primary mb-4">Actualizar nueva imagen</button>
                    </form>

                </div>
          </div>
      </div>
    </div>
</main>
@endsection
