@extends('layouts.layout')
@section('title', ' Asignatura |')
@section('content')

<main class="c-main">
<div class="container-fluid">
    <div class="fade-in">
        <div class="row  justify-content-center ">
            <div class="col-lg-10">
                <div class="card shadow-lg">
                    <div class="card-header bg-primary">
                        <h4 class=" text-light"><i class="fas fa-book-open mr-3"></i> <span class="text-value">ASIGNATURA</span> </h4>
                    </div>
                    <div class="card-body">
                        <form class="form-horizontal" method="POST"  action="{{ route('asignaturas.update', $asignatura)}} ">
                            @csrf @method('PUT')
                            <div class="row">
                                <div class="form-group col-lg-6">
                                    <label for="carrera_id" class="col-form-label font-weight-bold text-muted">Carrera
                                        <span class="text-primary">*</span>
                                    </label>
                                    <div class="input-group">
                                        <select name="carrera_id" id="carrera_id"  class="form-control @error('carrera_id') is-invalid @enderror " onchange="Prerequisitos(); cambia_periodo(); ">
                                            <option  class="form-control" value=""> == Seleccionar == </option>
                                            @foreach ($carreras as $carrera)
                                                <option value="{{$carrera->id}}"
                                                {{old('carrera_id', $asignatura->carrera_id) == $carrera->id ? 'selected' : ''}}
                                                >{{$carrera->nombre}}</option>
                                            @endforeach
                                        </select>
                                        <div class="input-group-prepend "><span class=" input-group-text">
                                            <i class=" text-primary fas fa-graduation-cap"></i></span></div>
                                        @error ('carrera_id') <span class="invalid-feedback" role="alert"> <em> {{$message}}</span> </em> @enderror
                                    </div>
                                </div>

                                <div class="form-group col-lg-6">
                                    <label for="periodo_id" class="col-form-label font-weight-bold text-muted">Periodo
                                        <span class="text-primary">*</span>
                                    </label>
                                    <div class="input-group">
                                        <select name="periodo_id" id="periodo_id" class="form-control @error('periodo_id') is-invalid @enderror ">
                                            <option  class="form-control" value=""> == Seleccionar == </option>
                                                {{-- Periodos --}}
                                        </select>
                                        <div class="input-group-prepend "><span class=" input-group-text">
                                            <i class=" text-primary fas fa-table"></i></span></div>
                                        @error ('periodo_id') <span class="invalid-feedback" role="alert"> <em> {{$message}}</span> </em> @enderror
                                    </div>
                                </div>

                                <div class="form-group col-lg-6">
                                    <label for="cod_asignatura" class="col-form-label font-weight-bold text-muted">Código
                                        <span class="text-primary">*</span>
                                    </label>
                                    <div class="input-group">
                                        <input type="text" class="form-control @error('cod_asignatura') is-invalid @enderror"
                                            name="cod_asignatura" value="{{old('cod_asignatura', $asignatura->cod_asignatura)}}" placeholder="Código">
                                        <div class="input-group-prepend "><span class=" input-group-text">
                                            <i class=" text-primary fas fa-qrcode"></i></span></div>
                                        @error ('cod_asignatura') <span class="invalid-feedback" role="alert"> <em> {{$message}}</span> </em> @enderror
                                    </div>
                                </div>

                                <div class="form-group col-lg-6">
                                    <label for="nombre" class="col-form-label font-weight-bold text-muted">Nombre
                                        <span class="text-primary">*</span>
                                    </label>
                                    <div class="input-group">
                                        <input type="text" class="form-control @error('nombre') is-invalid @enderror"
                                            name="nombre" value="{{old('nombre', $asignatura->nombre)}}" placeholder="Asignatura">
                                        <div class="input-group-prepend "><span class=" input-group-text">
                                            <i class=" text-primary fas fa-file"></i></span></div>
                                        @error ('nombre') <span class="invalid-feedback" role="alert"> <em> {{$message}}</span> </em> @enderror
                                    </div>
                                </div>

                                <div class="form-group col-lg-6">
                                    <label for="cantidad_hora" class="col-form-label font-weight-bold text-muted">Horas
                                        <span class="text-primary">*</span>
                                    </label>
                                    <div class="input-group">
                                        <input type="text" class="form-control @error('cantidad_hora') is-invalid @enderror"
                                            name="cantidad_hora" value="{{old('cantidad_hora', $asignatura->cantidad_hora)}}" placeholder="50">
                                        <div class="input-group-prepend "><span class=" input-group-text">
                                            <i class=" text-primary fas fa-clock"></i></span></div>
                                        @error ('cantidad_hora') <span class="invalid-feedback" role="alert"> <em> {{$message}}</span> </em> @enderror
                                    </div>
                                </div>

                                <div class="form-group col-lg-6">
                                    <label for="preasignatura_id" class="col-form-label font-weight-bold small text-muted">PREREQUISITOS</label>
                                        <div class="input-group">
                                            <select name="preasignatura_id[]" id="preasignatura_id" class=" form-control @error('asignaturas') is-invalid @enderror" multiple>
                                                {{-- Lista de asignaturas --}}
                                            </select>
                                            <div class="input-group-prepend "><span class=" input-group-text">
                                                <i class=" text-primary fas fa-folder"></i></span></div>
                                            @error ('preasignatura_id') <span class="invalid-feedback" role="alert"> <em>{{$message}}</span></em> @enderror
                                        </div>
                                        <em class="text-muted small">Pulsar Ctrl para seleccionar varias opciones</em>
                                </div>
                            </div>
                    </div>
                    <div class="card-footer border-0 d-flex justify-content-between aling-items-end bg-light">
                        <button class=" col-sm-2 border btn btn-primary" type="submit">Guardar</button>
                        <a class=" btn  col-sm-2 border  btn-dark " href="{{route('asignaturas.index')}}">Cancelar</a>
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
<script>

    cambia_periodo();
    Prerequisitos();

    function cambia_periodo(){
        const carreras=@json($carreras);
        const periodos=@json($periodos);
        carrera=document.getElementById('carrera_id').value;
        const resulte = carreras.filter(carreras => carreras.id === Number(carrera) );

        if (carrera != 0) {
            const result = periodos.filter(periodos => periodos.id <=resulte[0].numero_periodo);
            document.getElementById("periodo_id").length = result.length;
            for(i=0;i<result.length;i++){
                periodo_id.options[i].value=result[i].id;
                periodo_id.options[i].text=result[i].nombre;
                periodo_id.options[i].selected= (periodo_id.options[i].value == carrera) ? true : false;
                if(periodo_id.options[i].value == "{{ old("periodo_id") }}")
                {
                    periodo_id.options[i].selected= true;
                }
            }
        }else{
        document.getElementById("periodo_id").length  = 1
        periodo_id.options[0].value = ""
        periodo_id.options[0].text = " == Seleccionar carrera == "
        }
    }

function Prerequisitos(){
        var asignaturas = document.getElementById("preasignatura_id");
        for (let i = asignaturas.options.length; i >= 0; i--) {
        asignaturas.remove(i);
    }
    var id = document.getElementById('carrera_id').value;
    axios.get('/getPrerequisitos/'+id)
    .then((resp)=>{
        var asignaturas = document.getElementById("preasignatura_id");
        console.log(resp.data);
        for (i = 0; i < Object.keys(resp.data).length; i++) {
        var option = document.createElement('option');
        option.value = resp.data[i].id;
        option.text = resp.data[i].nombre;
        asignaturas.appendChild(option);
        }
    })
    .catch(function (error) {console.log(error);})
}

function Prerequisitos(){
        var asignaturas = document.getElementById("preasignatura_id");
        for (let i = asignaturas.options.length; i >= 0; i--) {asignaturas.remove(i);}

        var id = document.getElementById('carrera_id').value;
        if (id){
        axios.get('/getPrerequisitos/'+id)
        .then((resp)=>{
                var asignaturas = document.getElementById("preasignatura_id");
                for (i = 0; i < Object.keys(resp.data).length; i++) {
                var option = document.createElement('option');
                option.value = resp.data[i].id;
                option.text = resp.data[i].nombre;
                asignaturas.appendChild(option);
                }
            })
            .catch(function (error) {console.log(error);})
        }else{
            document.getElementById("preasignatura_id").length  = 1
            asignaturas.options[0].value =""
            asignaturas.options[0].text = " == Seleccionar carrera =="
        }
    }

</script>
@endpush
