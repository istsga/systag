@extends('layouts.layout')
@section('title', ' Periodo Acádemico |')
@section('content')

<main class="c-main">
<div class="container-fluid">
    <div class="fade-in">
        <div class="row justify-content-center ">
              <div class="col-lg-8">
                <div class="card  shadow-lg">
                    <div class="card-header bg-primary">
                        <h4 class=" text-light"><i class="fas fa-calendar mr-3"></i> <span class="text-value">PERIODO ACADÉMICO</span> </h4>
                    </div>
                  <div class="card-body">
                          <form class="form-horizontal" method="POST"  action="{{ route('periodacademicos.store')}} ">
                            @csrf
                            <div class="row">

                                <div class="form-group col-lg-6">
                                    <label for="periodo" class="col-form-label font-weight-bold text-muted">Periodo Académico
                                        <span class="text-primary">*</span>
                                    </label>
                                    <div class="input-group">
                                        <input type="text" class="form-control @error('periodo') is-invalid @enderror"
                                        name="periodo" value="{{old('periodo')}}" placeholder="Periodo Académico">
                                        <div class="input-group-prepend "><span class=" input-group-text">
                                        <i class=" text-primary fas fa-stopwatch"></i></span></div>
                                        @error ('periodo') <span class="invalid-feedback" role="alert"> <em> {{$message}}</span> </em> @enderror
                                    </div>
                                </div>



                                <div class="form-group col-lg-6 ">
                                    <label for="estado" class="col-form-label font-weight-bold text-muted">Estado
                                        <span class="text-primary">*</span></label>
                                    <div class="input-group">
                                        <select name="estado" id="estado"  class="form-control @error('estado') is-invalid @enderror">
                                            <option  class="form-control" value=""> == Seleccione == </option>
                                            <option value="Nuevo">Nuevo</option>
                                            <option value="En Curso">En Curso</option>
                                            <option value="Finalizado">Finalizado</option>
                                        </select>
                                        <div class="input-group-prepend "><span class=" input-group-text">
                                            <i class=" text-primary fas fa-lock"></i></span></div>
                                       @error ('estado') <span class="invalid-feedback" role="alert"> <em>{{$message}}</span></em> @enderror
                                    </div>
                                </div>

                                <div class="form-group col-lg-6">
                                    <label for="fecha_inicio" class="col-form-label font-weight-bold text-muted">Fecha de Inicio
                                        <span class="text-primary">*</span>
                                    </label>
                                    <div class="input-group">
                                        <input type="date" class="form-control @error('fecha_inicio') is-invalid @enderror"
                                        name="fecha_inicio" value="{{old('fecha_inicio')}}">
                                        <div class="input-group-prepend "><span class=" input-group-text">
                                        <i class=" text-primary fas fa-calendar-alt"></i></span></div>
                                        @error ('fecha_inicio') <span class="invalid-feedback" role="alert"> <em> {{$message}}</span> </em> @enderror
                                    </div>
                                </div>

                                <div class="form-group col-lg-6 ">
                                    <label for="fecha_final" class="col-form-label font-weight-bold text-muted">Fecha Final
                                        <span class="text-primary">*</span>
                                    </label>
                                    <div class="input-group ">
                                        <input type="date" class="form-control @error('fecha_final') is-invalid @enderror"
                                        name="fecha_final" value="{{old('fecha_final')}}">
                                        <div class="input-group-prepend "><span class=" input-group-text">
                                        <i class=" text-primary fas fa-calendar-alt"></i></span></div>
                                        @error ('fecha_final') <span class="invalid-feedback" role="alert"> <em> {{$message}}</span> </em> @enderror
                                    </div>
                                </div>

                                <div class="form-group col-lg-6">
                                    <label for="carreras" class="col-form-label font-weight-bold text-muted"> == Seleccionar Carreras ==
                                        <span class="text-primary">*</span></label>
                                        @forelse ($carreras as $carrera)
                                            <div class="checkbox mt-1 @error('carreras') is-invalid @enderror">
                                                <input  name="carreras[]" type="checkbox" class="mr-2"  {{ collect(old('carreras'))->contains($carrera->id) ? 'checked' :  '' }}
                                                value="{{$carrera->id}}">{{$carrera->nombre}}
                                            </div>
                                        @empty
                                            <p class="text-muted small"><em>Para continuar registre carreras!...</em></p>
                                        @endforelse

                                        @error ('carreras') <span class="invalid-feedback" role="alert"> <em>{{$message}}</strong></em> @enderror
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

<script>
    //select con opciones estaticos
    var estado = null;
        for(var i=0; i!=document.querySelector("#estado").querySelectorAll("option").length; i++)
        {
            estado = document.querySelector("#estado").querySelectorAll("option")[i];
            if(estado.getAttribute("value") == "{{ old("estado") }}")
            {
                estado.setAttribute("selected", "selected");
            }
        }
</script>
@endsection
