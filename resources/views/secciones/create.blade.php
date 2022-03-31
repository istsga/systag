@extends('layouts.layout')
@section('title', ' Sección |')
@section('content')

<main class="c-main">
<div class="container-fluid">
    <div class="fade-in">
        <div class="row  justify-content-center ">
            <div class="col-lg-7">
                <div class="card  shadow-lg">
                    <div class="card-header bg-primary">
                        <h4 class=" text-light"><i class="fas fa-sort-amount-down-alt  mr-3"></i> <span class="text-value">SECCIÓN</span> </h4>
                    </div>
                    <div class="card-body">
                        <form class="form-horizontal" method="POST"  action="{{ route('secciones.store')}} " onsubmit="return checkSubmit();">
                            @csrf
                            <div class="card shadow-sm">
                                <div class="form-group m-3">
                                    <label for="nombre" class="col-form-label font-weight-bold text-muted">Nombre
                                        <span class="text-primary">*</span>
                                    </label>
                                    <div class="input-group">
                                        <input type="text" class="form-control @error('nombre') is-invalid @enderror"
                                            name="nombre" id="nombre" value="{{old('nombre')}}" placeholder="Diurno">
                                        <div class="input-group-prepend "><span class=" input-group-text">
                                            <i class=" text-primary fas fa-file"></i></span></div>
                                        @error ('nombre') <span class="invalid-feedback" role="alert"> <em> {{$message}}</span> </em> @enderror
                                    </div>
                                </div>
                            </div>
                    </div>
                    <div class="card-footer border-0 d-flex justify-content-between aling-items-end bg-light">
                        <button class=" col-sm-3 border btn btn-primary" type="submit">Guardar</button>
                        <a class=" btn  col-sm-2 border  btn-dark " href="{{route('secciones.index')}}">Cancelar</a>
                    </div>
                    </form>
                </div>
            </div>
        </div>
    </div>
</div>
</main>
<script>
    //deshabilitar doble clic
    login = false; //Obligaremos entrar el if al primer submit
    function checkSubmit() {
        if (!login) {
            login= true;
            return true;
        } else {
            // pulsaron 2 veces el  submit
            return false;
        }
    }
</script>
@endsection
