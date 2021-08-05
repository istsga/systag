@extends('layouts.layout')
@section('title', ' Convalidación|')

@push('styles')
<link href="{{asset('css/select2.min.css')}}" rel="stylesheet">
<link href="{{asset('css/select2-bootstrap4.min.css')}}" rel="stylesheet">
@endpush

@section('content')

<main class="c-main">
<div class="container-fluid">
    <div class="fade-in">
        <div class="row justify-content-center ">
             <div class="col-lg-9">
                <div class="card shadow-lg">
                    <div class="card-header bg-primary">
                        <h4 class=" text-light"><i class="fas fa-book  mr-3"></i> <span class="text-value">CONVALIDACIÓN</span></h4>
                    </div>

                    <form method="POST"  action="{{ route('convalidaciones.update', $convalidacione)}} ">
                        @csrf @method('PUT')
                        <div class="card-body">
                            <div class="row">
                                <div class="form-group col-lg-12 ">
                                    <label for="estudiante_id" class="col-form-label font-weight-bold text-muted">Estudiante
                                        <span class="text-primary">*</span>
                                    </label>
                                    <div class="input-group">
                                        <select name="estudiante_id" id="estudianteConvalidar" class=" form-control @error('estudiante_id') is-invalid @enderror">
                                            <option class="form-control" value=""> == Seleccionar ==</option>
                                            @foreach ($estudiantes as $estudiante)
                                            <option  value="{{$estudiante->id}}"
                                                {{old('estudiante_id', $convalidacione->estudiante_id)==$estudiante->id ? 'selected' : '' }}
                                                >{{$estudiante->nombre}} {{$estudiante->apellido}} - {{$estudiante->dni}}</option>
                                                @endforeach
                                        </select>
                                        <div class="input-group-prepend "><span class=" input-group-text">
                                            <i class=" text-primary fas fa-user"></i></span></div>
                                        @error ('estudiante_id') <span class="invalid-feedback" role="alert"> <em>{{$message}}</span></em> @enderror
                                    </div>
                                </div>

                                <div class="form-group col-lg-12 ">
                                    <label for="carrera_id" class="col-form-label font-weight-bold text-muted">Carrera
                                        <span class="text-primary">*</span>
                                    </label>
                                    <div class="input-group">
                                        <select name="carrera_id" id="carrera_id" class=" form-control @error('carrera_id') is-invalid @enderror" onchange="filtroAsignaturas();">
                                            <option class="form-control" value=""> == Seleccionar == </option>
                                            @foreach ($carreras as $carrera)
                                            <option  value="{{$carrera->id}}"
                                                {{old('carrera_id')==$carrera->id ? 'selected' : '' }}
                                                >{{$carrera->nombre}} </option>
                                                @endforeach
                                        </select>
                                        <div class="input-group-prepend "><span class=" input-group-text">
                                            <i class=" text-primary fas fa-user"></i></span></div>
                                        @error ('carrera_id') <span class="invalid-feedback" role="alert"> <em>{{$message}}</span></em> @enderror
                                    </div>
                                </div>

                                <div class="form-group col-lg-6 ">
                                    <label for="estudiante_id" class="col-form-label font-weight-bold text-muted">Asignaturas
                                        <span class="text-primary">*</span>
                                    </label>
                                    <div class="input-group">
                                        <select name="asignatura_id" id="asignatura_id" class=" form-control @error('asignatura_id') is-invalid @enderror">
                                            <option class="form-control" value=""> == Seleccionar == </option>
                                            @foreach ($asignaturas as $asignatura)
                                            {{-- Lista de asignaturas --}}
                                            @endforeach
                                    </select>
                                    <div class="input-group-prepend "><span class=" input-group-text">
                                        <i class=" text-primary fas fa-user"></i></span></div>
                                        @error ('asignatura_id') <span class="invalid-feedback" role="alert"> <em>{{$message}}</span></em> @enderror
                                    </div>
                                </div>

                                <div class="form-group col-lg-4">
                                    <label for="nota_final" class="col-form-label font-weight-bold text-muted">Nota del Promedio
                                        <span class="text-primary">*</span>
                                    </label>
                                    <div class="input-group">
                                        <input type="number"  class="form-control @error('nota_final') is-invalid @enderror"
                                            name="nota_final" id="nota_final" value="{{old('nota_final')}}" onchange="validar()">
                                        <div class="input-group-prepend "><span class=" input-group-text">
                                        <i class=" text-primary fas fa-star"></i></span></div>
                                        @error ('nota_final') <span class="invalid-feedback" role="alert"> <em> {{$message}}</span> </em> @enderror
                                    </div>
                                </div>

                                <div class="form-group col-lg-2" style="margin-top: 35px">
                                    <a onclick="agregarAsignatura();" class="btn btn-block btn-primary text-white" title="Agregar asignatura">Agregar</a>
                                </div>
                            </div>

                            <div class="card-table  table-responsive">
                                <table class="table table-hover  table-bordered align-middle" id="detalles">
                                    <thead class="thead-light">
                                        <tr>
                                            <th class="text-center"><font style="vertical-align: inherit;">Nro</font></th>
                                            <th><font style="vertical-align: inherit;">ASIGNATURA</font></font></th>
                                            <th class="text-center"><font style="vertical-align: inherit;">PROMEDIO FINAL</font></font></th>
                                            <th class="text-center"><font style="vertical-align: inherit;">ACCIÓN</font></font></th>
                                        </tr>
                                    </thead>
                                    <tbody>

                                    </tbody>
                                </table>
                            </div>

                        </div>
                        <div class="card-footer border-0 d-flex justify-content-between aling-items-end bg-light">
                        <button class=" col-sm-3 border btn btn-primary" type="submit">Guardar</button>
                        <a class=" btn  col-sm-2 border  btn-dark " href="{{route('convalidaciones.index')}}">Cancelar</a>
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
    <script src="{{asset('js/jquery.min.js')}}"></script>
    <script src="{{asset('js/axios.min.js')}}"></script>
    <script src="{{asset('js/select2.full.min.js')}}"></script>

<script>
$(function () {
    //Inicializa Select2 Estudiantes matricula normal

    $('#estudiante_id').select2({
      theme: 'bootstrap4'
    });

    //Inicializa Select2 Estudiantes convalidación
    $('#estudianteConvalidar').select2({
      theme: 'bootstrap4'
    });

});


function filtroAsignaturas(select){
    //console.log('HOLA');
    $dato=[];
    for(var i=1;i<document.getElementById("detalles").rows.length;i++){
        $dato[i]=document.getElementById('detalles').rows[i].cells[1].innerText;
              console.log($dato);
    }
    console.log($dato);
    var asignaturas = document.getElementById("asignatura_id");
    for (let i = asignaturas.options.length; i >= 0; i--) {
        asignaturas.remove(i);
    }

    var id = document.getElementById('carrera_id').value;
    if(id){
        axios.get('/getConvalidaciones/'+id)
        .then((resp)=>{
            var asignaturas = document.getElementById("asignatura_id");
            for (i = 0; i < Object.keys(resp.data).length; i++) {
                var option = document.createElement('option');
                if($dato.indexOf(resp.data[i].nombre)==-1){ //no encuentra en arreglo
                    option.value = resp.data[i].id;
                    option.text = resp.data[i].nombre;
                    asignaturas.append(option);
                }
            }
        })
        .catch(function (error) {console.log(error);})
    }else{
        document.getElementById("asignatura_id").length  = 1
        asignaturas.options[0].value = ""
        asignaturas.options[0].text = "Vacío"
    }


};

//AGREGAR ASIGNATURAS
var cont=1;
function agregarAsignatura(){

     //DescidArticulo=$("#idArticulo option:selected").text();
      Asignatura_id=$("#asignatura_id").val();
      Asignatura=$("#asignatura_id option:selected").text();
      Promedio=$("#nota_final").val();
      //var id = document.getElementById('nota_final').value;
      console.log(Asignatura);
      if(Asignatura!=""){
            var fila='</tr><tr class="selected" id="fila'+cont+'"><td class="text-center"><input type="hidden" name="cont" value="'+cont+'">'+cont+'</td><td><input type="hidden" name="Asignatura[]" value="'+Asignatura_id+'">'+Asignatura+'</td><td class="text-center"><input type="hidden" name="Promedio[]" value="'+Promedio+'">'+Promedio+'</td><td class="text-center"><button type="button" class="btn btn-danger" onclick="eliminar('+cont+');">X</button></td>';
            cont++;
            //limpiar();
            //evaluar();
            $('#detalles').append(fila);
      }else{
            alert("Error al ingresar el detalle de Asignatura, revise los datos");
    }
    filtroAsignaturas();
}

function validar(){
    nota=$('#nota_final').val();
    if(Number(nota)<7 || Number(nota) >10){
        alert('Nota fuera de rango (7,10)');
    }
}
// Al presiona X elimina la fila
function eliminar(index){
  cont--;
  $("#fila" + index).remove();
  //evaluar();
  filtroAsignaturas();

}

</script>
@endpush

