@extends('layouts.layout')
@section('title', ' Periodo Acádemico |')
@section('content')

<main class="c-main">
<div class="container-fluid">
    <div class="fade-in">
        <div class="row justify-content-center ">
              <div class="col-lg-9">
                <div class="card  shadow-lg">
                    <div class="card-header bg-primary">
                        <h4 class=" text-light"><i class="fas fa-calendar mr-3"></i> <span class="text-value">PERIODO ACADÉMICO</span> </h4>
                    </div>
                  <div class="card-body">
                          <form class="form-horizontal" method="POST"  action="{{ route('periodacademicos.update', $periodacademico)}} ">
                            @csrf @method('PUT')
                            <div class="card shadow-sm">
                                <div class="row m-2">
                                    <div class="form-group col-lg-6">
                                        <label for="periodo" class="col-form-label font-weight-bold text-muted">Periodo Académico
                                            <span class="text-primary">*</span>
                                        </label>
                                        <div class="input-group">
                                            <div class="input-group-prepend "><span class=" input-group-text">
                                            <i class=" text-primary fas fa-stopwatch"></i></span></div>
                                            <input type="text" class="form-control @error('periodo') is-invalid @enderror"
                                                name="periodo" value="{{old('periodo', $periodacademico->periodo)}}" placeholder="Periodo Académico">
                                            @error ('periodo') <span class="invalid-feedback" role="alert"> <em> {{$message}}</span> </em> @enderror
                                        </div>
                                    </div>

                                    <div class="form-group col-lg-6">
                                        <label for="condicion" class="col-form-label font-weight-bold text-muted">Estado
                                            <span class="text-primary">*</span>
                                        </label>
                                        <div class="input-group">
                                            <div class="input-group-prepend "><span class=" input-group-text">
                                            <i class=" text-primary fas fa-lock"></i></span></div>
                                            <select name="estado" class="form-control ">
                                                <option value=""> == Seleccione == </option>
                                                <option value="Nuevo" {{ old('estado', $periodacademico->estado) == 'Nuevo' ? 'selected' : '' }}>Nuevo</option>
                                                <option value="En Curso" {{ old('estado', $periodacademico->estado) == 'En Curso' ? 'selected' : '' }}>En Curso</option>
                                                <option value="Finalizado" {{ old('estado', $periodacademico->estado) == 'Finalizado' ? 'selected' : '' }}>Finalizado</option>
                                            </select>
                                        </div>
                                    </div>

                                    <div class="form-group col-lg-6">
                                        <label for="fecha_inicio" class="col-form-label font-weight-bold text-muted">Fecha de Inicio
                                            <span class="text-primary">*</span>
                                        </label>
                                        <div class="input-group">
                                            <div class="input-group-prepend "><span class=" input-group-text">
                                            <i class=" text-primary fas fa-calendar-alt"></i></span></div>
                                            <input type="date" class="form-control @error('fecha_inicio') is-invalid @enderror"
                                                name="fecha_inicio" value="{{old('fecha_inicio', $periodacademico->fecha_inicio)}}">
                                            @error ('fecha_inicio') <span class="invalid-feedback" role="alert"> <em> {{$message}}</span> </em> @enderror
                                        </div>
                                    </div>

                                    <div class="form-group col-lg-6 ">
                                        <label for="fecha_final" class="col-form-label font-weight-bold text-muted">Fecha Final
                                            <span class="text-primary">*</span>
                                        </label>
                                        <div class="input-group ">
                                            <div class="input-group-prepend "><span class=" input-group-text">
                                            <i class=" text-primary fas fa-calendar-alt"></i></span></div>
                                            <input type="date" class="form-control @error('fecha_final') is-invalid @enderror"
                                                name="fecha_final" value="{{old('fecha_final', $periodacademico->fecha_final)}}">
                                            @error ('fecha_final') <span class="invalid-feedback" role="alert"> <em> {{$message}}</span> </em> @enderror
                                        </div>
                                    </div>
                                    <div class="card col-lg-11 shadow-sm  m-3 ">
                                        <div class="form-group p-2">
                                            <div class="card-header mb-3">
                                                <label for="carreras" class="col-form-label font-weight-bold text-muted small"> == SELECIONAR CARRERAS ==
                                                    <span class="text-primary">*</span></label>
                                            </div>
                                                @foreach ($carreras as $carrera)
                                                    <div class="checkbox mt-1 @error('carreras') is-invalid @enderror">
                                                        <input  name="carreras[]" type="checkbox" class="mr-2"  {{ collect(old('carreras', $periodacademico->carreras->pluck('id')))->contains($carrera->id) ? 'checked' :  '' }}
                                                        value="{{$carrera->id}}">{{$carrera->nombre}}
                                                    </div>
                                                @endforeach
                                                @error ('carreras') <span class="invalid-feedback" role="alert"> <em>{{$message}}</strong></em> @enderror
                                        </div>
                                    </div>
                                </div>
                            </div>

                          </div>
                          <div class="card-footer border-0 d-flex justify-content-between aling-items-end bg-light">
                            <button class=" col-sm-3 border btn btn-primary" type="submit">Guardar</button>
                            <a class=" btn  col-sm-2 border  btn-dark " href="{{route('periodacademicos.index')}}">Cancelar</a>
                          </div>
                          </form>
                      </div>
                </div>
              </div>
        </div>
    </div>
</div>
</main>
@endsection
