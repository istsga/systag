@extends('layouts.layout')
@section('title', ' Asignación |')
@section('content')

<main class="c-main">
<div class="container-fluid">
    <div class="fade-in">
        <div class="row justify-content-center ">
              <div class="col-lg-9">
                @include('partials.success')
                <div class="card shadow-lg">
                    <div class="card-header bg-primary">
                        <h4 class=" text-light"><i class="fas fa-clone mr-3"></i> <span class="text-value">ASIGNACIÓN</span> </h4>
                    </div>

                  <div class="card-body">
                          <form class="form-horizontal" method="POST"  action="{{ route('asignaciones.store')}} ">
                              @csrf
                            <div class="card shadow-sm">
                                <div class="row m-2">
                                    <div class="form-group col-lg-6">
                                        <label for="periodacademicos" class="col-form-label font-weight-bold text-dark text-muted">Periodo Académico
                                            <span class="text-primary">*</span></label>
                                        <div class="input-group">
                                            <select name="periodacademicos" id="periodacademico_id" class="form-control @error('periodacademicos') is-invalid @enderror"  onchange="cambia_carreras(this)">
                                                <option value="" class="form-control "> == Seleccionar ­­­­­­== </option>
                                                {{-- @foreach ($periodacademicos as $periodacademico) --}}
                                                    <option  value="{{$periodacademicos->id}}"
                                                        {{old('periodacademicos')==$periodacademicos->id ? 'selected' : '' }}
                                                        >{{$periodacademicos->periodo}}</option>
                                                {{-- @endforeach --}}
                                            </select>
                                            <div class="input-group-prepend "><span class=" input-group-text">
                                                <i class="text-primary fas fa-table"></i></span></div>
                                            @error ('periodacademicos') <span class="invalid-feedback" role="alert"> <em>{{$message}}</strong></em> @enderror
                                        </div>
                                    </div>

                                    <div class="form-group col-lg-6">
                                        <label for="carreras" class="col-form-label font-weight-bold text-muted">Carrera
                                            <span class="text-primary">*</span></label>
                                        <div class="input-group">
                                            <select  name="carreras" id="carrera_id" class="form-control @error('carreras') is-invalid @enderror" onchange="cambia_periodo(this)" >
                                                {{-- Data --}}
                                            </select>
                                            <div class="input-group-prepend "><span class=" input-group-text">
                                                <i class=" text-primary fas fa-graduation-cap"></i></span></div>
                                            @error ('carreras') <span class="invalid-feedback" role="alert"> <em>{{$message}}</em></span> @enderror

                                        </div>
                                    </div>

                                    <div class="form-group col-lg-6 ">
                                        <label for="periodo_id" class="col-form-label font-weight-bold text-muted">Periodo
                                            <span class="text-primary">*</span></label>
                                        <div class="input-group">
                                            <select name="periodo_id" id="periodo_id"  class="form-control @error('periodo_id') is-invalid @enderror">
                                                <option value="" class="form-control "> == Seleccionar == </option>
                                            </select>
                                            <div class="input-group-prepend "><span class=" input-group-text">
                                                <i class=" text-primary fas fa-layer-group"></i></span></div>
                                            @error ('periodo_id') <span class="invalid-feedback" role="alert"> <em>{{$message}}</span></em> @enderror
                                        </div>
                                    </div>

                                    <div class="form-group col-lg-6">
                                        <label for="seccione_id" class="col-form-label font-weight-bold text-muted">Sección
                                            <span class="text-primary">*</span></label>
                                        <div class="input-group">
                                            <select  name="seccione_id"  class="form-control @error('seccione_id') is-invalid @enderror">
                                                <option value="" class="form-control "> == Seleccionar == </option>
                                                @foreach ($secciones as $seccione)
                                                    <option  value="{{$seccione->id}}"
                                                        {{old('seccione_id')==$seccione->id ? 'selected' : '' }}
                                                        >{{$seccione->nombre}}</option>
                                                @endforeach
                                            </select>
                                            <div class="input-group-prepend "><span class=" input-group-text">
                                                <i class=" text-primary fas fa-layer-group"></i></span></div>
                                            @error ('seccione_id') <span class="invalid-feedback" role="alert"> <em>{{$message}}</em></span> @enderror
                                        </div>
                                    </div>

                                    <div class="form-group col-lg-6">
                                        <label for="paralelo_id" class="col-form-label font-weight-bold text-muted">Paralelo
                                            <span class="text-primary">*</span></label>
                                        <div class="input-group">
                                            <select  name="paralelo_id"  class="form-control @error('paralelo_id') is-invalid @enderror">
                                                <option value="" class="form-control "> == Seleccionar == </option>
                                                @foreach ($paralelos as $paralelo)
                                                <option  value="{{$paralelo->id}}"
                                                    {{old('paralelo_id')==$paralelo->id ? 'selected' : '' }}
                                                    >{{$paralelo->nombre}}</option>
                                                @endforeach
                                            </select>
                                            <div class="input-group-prepend "><span class=" input-group-text">
                                                <i class=" text-primary fas fa-layer-group"></i></span></div>
                                            @error ('paralelo_id') <span class="invalid-feedback" role="alert"> <em>{{$message}}</em></span> @enderror
                                        </div>
                                    </div>
                                </div>
                                </div>
                            </div>
                          <div class="card-footer border-0 d-flex justify-content-between aling-items-end bg-light">
                            <button class=" col-sm-3 border btn btn-primary" type="submit">Guardar</button>
                            <a class=" btn  col-sm-2 border  btn-dark " href="{{route('asignaciones.index')}}">Cancelar</a>
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

cambia_carreras();
function cambia_carreras(select){
    const carreras = @json($carreras);
    periodacademico = document.getElementById('periodacademico_id').value;
    const result = carreras.filter(carreras => carreras.periodacademico_id === Number(periodacademico));
    if (periodacademico != 0) {

        num_carreras = result.length;
        document.getElementById("carrera_id").length = num_carreras;
        for(i=0;i<num_carreras;i++){
            carrera_id.options[i].value=result[i].carrera_id;
            carrera_id.options[i].text=result[i].nombre;

            if(carrera_id.options[i].value == "{{ old("carrera_id") }}")
            {
                carrera_id.options[i].value.selected= true;
            }

        }
        cambia_periodo();
    }else{

        document.getElementById("carrera_id").length  = 1;
        carrera_id.options[0].value = "Seleccionar";
        carrera_id.options[0].text = "== Seleccionar periodo académico ==";

        document.getElementById("periodo_id").length  = 1;
        periodo_id.options[0].value = "Seleccionar";
        periodo_id.options[0].text = "== Seleccionar ==";
    }

}

function cambia_periodo(){
    const carreras=@json($carreras);
    const periodos=@json($periodos);
    carrera=document.getElementById('carrera_id').value;
    const resulte = carreras.filter(carreras => carreras.carrera_id === Number(carrera) );
    const result = periodos.filter(periodos => periodos.id <=resulte[0].numero_periodo);
    document.getElementById("periodo_id").length = result.length;
    for(i=0;i<result.length;i++){
            periodo_id.options[i].value=result[i].id;
            periodo_id.options[i].text=result[i].nombre;
            if(periodo_id.options[i].value == "{{ old("periodo_id") }}")
            {
                periodo_id.options[i].selected= true;
            }
        }
}

</script>
@endsection

