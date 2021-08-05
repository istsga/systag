@extends('layouts.layout')
@section('title', ' Carrera |')
@section('content')

<main class="c-main">
<div class="container-fluid">
    <div class="fade-in">
        <div class="row  justify-content-center ">
            <div class="col-lg-8">
                <div class="card shadow-lg">
                    <div class="card-header bg-primary">
                        <h4 class=" text-light"><i class="fas fa-graduation-cap  mr-3"></i> <span class="text-value">CARRERA</span> </h4>
                    </div>
                    <div class="card-body ">
                        <form class="form-horizontal" method="POST"  action="{{ route('carreras.store')}} ">
                            @csrf
                          <div class="row">
                            <div class="form-group col-lg-5">
                                <label for="codigo" class="col-form-label font-weight-bold text-muted">Código
                                    <span class="text-primary">*</span>
                                </label>
                                <div class="input-group">
                                    <input type="text" class="form-control @error('codigo') is-invalid @enderror"
                                        name="codigo" value="{{old('codigo')}}" placeholder="SFD01">
                                    <div class="input-group-prepend "><span class=" input-group-text">
                                        <i class=" text-primary fas fa-qrcode"></i></span></div>
                                    @error ('codigo') <span class="invalid-feedback" role="alert"> <em> {{$message}}</span> </em> @enderror
                                </div>
                            </div>
                            <div class="form-group col-lg-7">
                                <label for="nombre" class="col-form-label font-weight-bold text-muted">Nombre
                                    <span class="text-primary">*</span>
                                </label>
                                <div class="input-group">
                                    <input type="text" class="form-control @error('nombre') is-invalid @enderror"
                                        name="nombre" value="{{old('nombre')}}" placeholder="Nombre">
                                    <div class="input-group-prepend "><span class=" input-group-text">
                                        <i class=" text-primary fas fa-file"></i></span></div>
                                    @error ('nombre') <span class="invalid-feedback" role="alert"> <em> {{$message}}</span> </em> @enderror
                                </div>
                            </div>

                            <div class="form-group col-lg-5">
                                <label for="titulo" class="col-form-label font-weight-bold text-muted">Título de la carrera
                                    <span class="text-primary">*</span>
                                </label>
                                <div class="input-group">
                                    <input type="text" class="form-control @error('titulo') is-invalid @enderror"
                                        name="titulo" value="{{old('titulo')}}" placeholder="Título de la carrera">
                                    <div class="input-group-prepend "><span class=" input-group-text">
                                        <i class=" text-primary fas fa-file"></i></span></div>
                                    @error ('titulo') <span class="invalid-feedback" role="alert"> <em> {{$message}}</span> </em> @enderror
                                </div>
                            </div>

                            <div class="form-group col-lg-3">
                                <label for="numero_periodo" class="col-form-label font-weight-bold text-muted">Número de periodos
                                    <span class="text-primary">*</span>
                                </label>
                                <div class="input-group">
                                    <input type="number" class="form-control @error('numero_periodo') is-invalid @enderror"
                                        name="numero_periodo" value="{{old('numero_periodo')}}" placeholder="Ejemplo: 4">
                                    <div class="input-group-prepend "><span class=" input-group-text">
                                        <i class=" text-primary fas fa-table"></i></span></div>
                                    @error ('numero_periodo') <span class="invalid-feedback" role="alert"> <em> {{$message}}</span> </em> @enderror
                                </div>
                            </div>

                            <div class="form-group col-lg-4">
                                <label for="condicion" class="col-form-label font-weight-bold text-muted">Estado
                                    <span class="text-primary">*</span>
                                </label>
                                <div class="input-group">
                                    <select name="condicion" id="condicion" class="form-control @error('condicion') is-invalid @enderror ">
                                        <option value=""> == Selecionar == </option>
                                        <option value="1" >Activo</option>
                                        <option value="0" >Cerrado</option>
                                    </select>
                                    <div class="input-group-prepend "><span class=" input-group-text">
                                        <i class=" text-primary fas fa-lock"></i></span></div>
                                    @error ('condicion') <span class="invalid-feedback" role="alert"> <em> {{$message}}</span> </em> @enderror
                                </div>
                            </div>
                    </div>
                        </div>
                        <div class="card-footer border-0 d-flex justify-content-between aling-items-end bg-light">
                            <button class=" col-sm-3 border btn btn-primary" type="submit">Guardar</button>
                            <a class=" btn  col-sm-2 border  btn-dark " href="{{route('carreras.index')}}">Cancelar</a>
                        </div>
                </form>
                </div>
            </div>
        </div>
    </div>
</div>
</main>

<script>
    //select con opciones estaticos
    var condicion = null;
        for(var i=0; i!=document.querySelector("#condicion").querySelectorAll("option").length; i++)
        {
            condicion = document.querySelector("#condicion").querySelectorAll("option")[i];
            if(condicion.getAttribute("value") == "{{ old("condicion") }}")
            {
                condicion.setAttribute("selected", "selected");
            }
        }
</script>
@endsection
