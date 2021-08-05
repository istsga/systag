@extends('layouts.layout')
@section('title', ' Carrera |')
@section('content')

<main class="c-main">
<div class="container-fluid">
    <div class="fade-in">
        <div class="row  justify-content-center ">
            <div class="col-lg-8">
                <div class="card  shadow-lg">
                    <div class="card-header bg-primary">
                        <h4 class=" text-light"><i class="fas fa-graduation-cap  mr-3"></i> <span class="text-value">CARRERA</span> </h4>
                    </div>
                    <div class="card-body">
                        <form class="form-horizontal" method="POST"  action="{{ route('carreras.update', $carrera)}} ">
                            @csrf @method('PUT')
                            <div class="row">
                                <div class="form-group col-lg-5">
                                    <label for="codigo" class="col-form-label font-weight-bold text-muted">Código
                                        <span class="text-primary">*</span>
                                    </label>
                                    <div class="input-group">
                                        <input type="text" class="form-control @error('codigo') is-invalid @enderror"
                                            name="codigo" value="{{old('codigo', $carrera->codigo)}}" placeholder="Nombre">
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
                                            name="nombre" value="{{old('nombre', $carrera->nombre)}}" placeholder="Nombre">
                                        <div class="input-group-prepend "><span class=" input-group-text">
                                            <i class=" text-primary fas fa-file"></i></span></div>
                                        @error ('nombre') <span class="invalid-feedback" role="alert"> <em> {{$message}}</span> </em> @enderror
                                    </div>
                                </div>

                                <div class="form-group col-lg-5">
                                    <label for="titulo" class="col-form-label font-weight-bold text-muted">Título
                                        <span class="text-primary">*</span>
                                    </label>
                                    <div class="input-group">
                                        <input type="text" class="form-control @error('titulo') is-invalid @enderror"
                                            name="titulo" value="{{old('titulo', $carrera->titulo)}}" placeholder="Nombre título">
                                        <div class="input-group-prepend "><span class=" input-group-text">
                                            <i class=" text-primary fas fa-file"></i></span></div>
                                        @error ('titulo') <span class="invalid-feedback" role="alert"> <em> {{$message}}</span> </em> @enderror
                                    </div>
                                </div>

                                <div class="form-group col-lg-3">
                                    <label for="numero_periodo" class="col-form-label font-weight-bold text-muted">Periodos
                                        <span class="text-primary">*</span>
                                    </label>
                                    <div class="input-group">
                                        <input type="number" class="form-control @error('numero_periodo') is-invalid @enderror"
                                            name="numero_periodo" value="{{old('numero_periodo', $carrera->numero_periodo )}}" placeholder="4">
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
                                        <select name="condicion" class="form-control @error('condicion') is-invalid @enderror ">
                                            <option value="1" {{ old('condicion', $carrera->condicion) == 1 ? 'selected' : '' }}>Activo</option>
                                            <option value="0" {{ old('condicion', $carrera->condicion) == 0 ? 'selected' : '' }}>Cerrado</option>
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
@endsection
