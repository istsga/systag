@extends('layouts.layout')
@section('title', ' Horario |')
@section('content')

<main class="c-main">
<div class="container-fluid">
    <div class="fade-in">
        <div class="row  justify-content-center ">
            <div class="col-lg-11">
                <div class="card  shadow-lg">
                    <div class="card-header bg-primary">
                        <h4 class=" text-light"><i class="far fa-calendar-alt  mr-3"></i> <span class="text-value">HORARIO</span> </h4>
                    </div>
                    <div class="card-body">

                        <form class="form-horizontal" method="POST"  action="{{ route('horarios.update', $horario)}} ">
                            @csrf @method('PUT')
                            @csrf
                            <div class="card p-4">
                                <div class="card p-3">
                                    <div class="row">
                                        <div class="form-group col-lg-8">
                                            <label for="asignacione_id" class="col-form-label font-weight-bold text-muted small mt-1">CARRERA | PERIODO | SECCIÓN
                                                <span class="text-primary">*</span>
                                            </label>
                                            <div class="input-group">
                                                <select name="asignacione_id" id="asignacione_id"  class="form-control @error('asignacione_id') is-invalid @enderror" onchange="asignaturaHorario(this)">
                                                    {{-- <option class="form-control" value=""> == Seleccionar == </option> --}}
                                                    {{-- @foreach ($asignaciones as $asignacione) --}}
                                                        <option  value="{{$horario->asignacione_id}}"
                                                            {{old('asignacione_id', $horario->asignacione_id)==$horario->asignacione_id ? 'selected' : '' }}
                                                            >{{$horario->asignacione->periodacademicos->pluck('periodo')->implode(', ') }} ,
                                                            {{$horario->asignacione->carreras->pluck('nombre')->implode(', ')}},
                                                            {{$horario->asignacione->periodo->nombre}},
                                                            {{$horario->asignacione->seccione->nombre}},
                                                            {{$horario->asignacione->paralelo->nombre}}
                                                        </option>
                                                    {{-- @endforeach --}}
                                                </select>
                                                <div class="input-group-prepend "><span class=" input-group-text">
                                                    <i class=" text-primary fas fa-check"></i></span></div>
                                                @error ('asignacione_id') <span class="invalid-feedback" role="alert"> <em>{{$message}}</span></em> @enderror
                                            </div>
                                        </div>



                                        <div class="form-group col-lg-4 ">
                                            <label for="orden" class="col-form-label font-weight-bold text-muted">Orden de asignaturas
                                                <span class="text-primary">*</span></label>
                                            <div class="input-group">
                                                <select  name="orden" id="orden" class="form-control @error('orden') is-invalid @enderror  ">
                                                    {{-- <option value="" class="form-control "> == Seleccionar == </option> --}}

                                                </select>
                                                <div class="input-group-prepend "><span class=" input-group-text">
                                                    <i class=" text-primary fas fa-sort-amount-up-alt"></i></span></div>
                                                @error ('orden') <span class="invalid-feedback" role="alert"> <em>{{$message}}</span> </em> @enderror
                                            </div>
                                        </div>

                                        <div class="form-group col-lg-8 ">
                                            <label for="asignatura_id" class="col-form-label font-weight-bold text-muted">Asignatura
                                                <span class="text-primary">*</span></label>
                                            <div class="input-group">
                                                <select  name="asignatura_id" id="asignatura_id" class="form-control @error('asignatura_id') is-invalid @enderror  ">
                                                    {{-- <option value="" class="form-control "> == Seleccionar == </option> --}}
                                                    {{-- @foreach ($asignaturas as $asignatura) --}}
                                                        <option  value="{{$horario->asignatura_id}}"
                                                        {{old('asignatura_id')==$horario->asignatura_id ? 'selected' : '' }}
                                                        >{{$horario->asignatura->nombre}}</option>
                                                    {{-- @endforeach --}}
                                                </select>
                                                <div class="input-group-prepend "><span class=" input-group-text">
                                                    <i class=" text-primary fas fa-folder"></i></span></div>
                                                @error ('asignatura_id') <span class="invalid-feedback" role="alert"> <em>{{$message}}</span> </em> @enderror
                                            </div>
                                        </div>

                                    </div>
                                </div>

                                <div class="row ml-2 mr-2">
                                    <div class="card col-lg-4">
                                        <div class="form-group mt-2">
                                            <label for="fecha_inicio" class="col-form-label font-weight-bold text-muted">Fecha inicio asignatura
                                                <span class="text-primary">*</span>
                                            </label>
                                            <div class="input-group">
                                                <input type="date" class="form-control @error('fecha_inicio') is-invalid @enderror"
                                                name="fecha_inicio" id="fecha_inicio" value="{{old('fecha_inicio', $horario->fecha_inicio)}}">
                                                <div class="input-group-prepend "><span class=" input-group-text">
                                                    <i class=" text-primary fas fa-calendar-day"></i></span></div>
                                                @error ('fecha_inicio') <span class="invalid-feedback" role="alert"> <em> {{$message}}</span> </em> @enderror
                                            </div>
                                        </div>

                                        <div class="form-group ">
                                            <label for="fecha_final" class="col-form-label font-weight-bold text-muted">Fecha final asignatura
                                                <span class="text-primary">*</span>
                                            </label>
                                            <div class="input-group">
                                                <input type="date" class="form-control @error('fecha_final') is-invalid @enderror"
                                                name="fecha_final" id="fecha_final" value="{{old('fecha_final', $horario->fecha_final)}}">
                                                <div class="input-group-prepend "><span class=" input-group-text">
                                                    <i class=" text-primary fas fa-calendar-day"></i></span></div>
                                                @error ('fecha_final') <span class="invalid-feedback" role="alert"> <em> {{$message}}</span> </em> @enderror
                                            </div>
                                        </div>

                                        <div class="form-group ">
                                            <label for="fecha_examen" class="col-form-label font-weight-bold text-muted">Fecha examen principal asignatura
                                                <span class="text-primary">*</span>
                                            </label>
                                            <div class="input-group">
                                                <input type="date" class="form-control @error('fecha_examen') is-invalid @enderror"
                                                name="fecha_examen" id="fecha_examen" value="{{old('fecha_examen', $horario->fecha_examen)}}">
                                                <div class="input-group-prepend "><span class=" input-group-text">
                                                    <i class=" text-primary fas fa-calendar-day"></i></span></div>
                                                @error ('fecha_examen') <span class="invalid-feedback" role="alert"> <em> {{$message}}</span> </em> @enderror
                                            </div>
                                        </div>

                                        <div class="form-group">
                                            <label for="fecha_suspension" class="col-form-label font-weight-bold text-muted">Fecha examen suspensión asignatura
                                                <span class="text-primary">*</span>
                                            </label>
                                            <div class="input-group">
                                                <input type="date" class="form-control @error('fecha_suspension') is-invalid @enderror"
                                                name="fecha_suspension" id="fecha_suspension" value="{{old('fecha_suspension', $horario->fecha_suspension)}}">
                                                <div class="input-group-prepend "><span class=" input-group-text">
                                                    <i class=" text-primary fas fa-calendar-day"></i></span></div>
                                                @error ('fecha_suspension') <span class="invalid-feedback" role="alert"> <em> {{$message}}</span> </em> @enderror
                                            </div>
                                        </div>
                                    </div>

                                    <div class="col"></div>

                                    <div class="card col-lg-7">
                                        <div class="row mt-3">
                                            <div class="col-lg-3 ">
                                                <label class="font-weight-bold text-dark small" >DÍAS <span class="text-primary">*</span> </label>
                                            </div>
                                            <div class="col-lg-4  ">
                                                <label class="font-weight-bold text-dark small" >HORA INICIO <span class="text-primary">*</span> </label>
                                            </div>
                                            <div class="col-lg-4 ">
                                                <label class="font-weight-bold text-dark small" >HORA FINAL <span class="text-primary">*</span> </label>
                                            </div>
                                        </div>

                                            <div class="row mt-2">

                                                    <div class="form-group col-lg-3  text-dark ">
                                                        @foreach ($detallehorarios as  $detallehorario )
                                                            <div class="input-group mt-1 ">
                                                                <br> <br/>
                                                                <input type="checkbox" class=" mt-1 mr-3" name="dia_semana[]" value="{{old('dia_semana', $detallehorario->dia_semana)}}"> {{$detallehorario->dia_semana}}
                                                            </div>
                                                        @endforeach
                                                    </div>

                                                <div class="form-group col-lg-4 ">
                                                    @foreach ($detallehorarios as  $detallehorario )
                                                        <div class="input-group mt-2">
                                                            <input type="time"  class="form-control @error('hora_inicio') is-invalid @enderror"
                                                            name="hora_inicio[]" value="{{old('hora_inicio', $detallehorario->hora_inicio )}}" placeholder="8:00">
                                                            <div class="input-group-prepend "><span class=" input-group-text">
                                                                <i class=" text-primary fas fa-clock"></i></span></div>
                                                            @error ('hora_inicio') <span class="invalid-feedback" role="alert"> <em> {{$message}}</span> </em> @enderror
                                                        </div>
                                                    @endforeach
                                                </div>
                                                <div class="form-group col-lg-4 ">
                                                    @foreach ($detallehorarios as  $detallehorario )
                                                        <div class="input-group mt-2 ">
                                                            <input type="time"  class="form-control @error('hora_final') is-invalid @enderror"
                                                            name="hora_final[]" value="{{old('hora_final', $detallehorario->hora_final)}}" placeholder="8:00">
                                                            <div class="input-group-prepend "><span class=" input-group-text">
                                                                <i class=" text-primary fas fa-clock"></i></span></div>
                                                            @error ('hora_final') <span class="invalid-feedback" role="alert"> <em> {{$message}}</span> </em> @enderror
                                                        </div>
                                                     @endforeach
                                                </div>
                                            </div>
                                    </div>
                                </div>

                            </div>
                    </div>
                    <div class="card-footer border-0 d-flex justify-content-between aling-items-end bg-light">
                        <button class=" col-sm-2 border btn btn-primary" type="submit">Guardar</button>
                        <a class=" btn  col-sm-2 border  btn-dark " href="{{route('horarios.index')}}">Cancelar</a>
                    </div>
                    </form>
                </div>
            </div>
        </div>
    </div>
</div>
</main>
@endsection

@push('scripts')
<script src="{{asset('js/axios.min.js')}}"></script>
<script src="{{asset('js/jquery.min.js')}}"></script>
<script src="{{asset('js/select2.full.min.js')}}"></script>
<script>

    // asignaturaHorario();

    // function asignaturaHorario(select){
    //     var asignaturas = document.getElementById("asignatura_id");
    //     for (let i = asignaturas.options.length; i >= 0; i--) {
    //         asignaturas.remove(i);
    //     }

    //     var id = document.getElementById('asignacione_id').value;
    //     if(id){
    //         axios.post('/getAsignaturashor/'+id)
    //         .then((resp)=>{
    //             var asignaturas = document.getElementById("asignatura_id");
    //             for (i = 0; i < Object.keys(resp.data).length; i++) {
    //             var option = document.createElement('option');
    //             option.value = resp.data[i].id;
    //             option.text = resp.data[i].nombre;
    //             asignaturas.append(option);
    //             }
    //         })
    //         .catch(function (error) {console.log(error);})
    //     } else{
    //         document.getElementById("asignatura_id").length  = 1
    //         asignaturas.options[0].value = ""
    //         asignaturas.options[0].text = " == Selecionar == "
    //     }
    //     cambiaOrden();
    // }

cambiaOrden();

function cambiaOrden(select){

var orden = document.getElementById("orden");
for (let i = orden.options.length; i >= 0; i--) {
    orden.remove(i);
}

var id = document.getElementById('asignacione_id').value;
if(id){
    axios.post('/getOrden/'+id)
    .then((resp)=>{
        var orden = document.getElementById("orden");
        for (i = 0; i < Object.keys(resp.data).length; i++) {
            if(resp.data[i]!==0){
                var option = document.createElement('option');
                option.value = resp.data[i];
                option.text = resp.data[i];
                orden.append(option);
            }
        }
    })
    .catch(function (error) {console.log(error);})
}else{
    document.getElementById("orden").length  = 1
    orden.options[0].value = ""
    orden.options[0].text = " == Selecionar == "
}
}

</script>
@endpush
