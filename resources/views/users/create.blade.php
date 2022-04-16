@extends('layouts.layout')
@section('title', ' Usuario |')
@section('content')

<main class="c-main">
<div class="container-fluid">
    <div class="fade-in">
        <div class="row justify-content-center ">
              <div class=" col-lg-10">
                <div class="card  shadow-lg">
                    <div class="card-header bg-primary">
                        <h4 class=" text-light"><i class="fas fa-user  mr-3"></i> <span class="text-value">USUARIO</span> </h4>
                    </div>
                  <div class="card-body">
                      <div class="card shadow-sm">
                        <form method="POST"  action="{{ route('users.store')}} ">
                            @csrf
                          <div class="row m-3">
                                <div class="card shadow-sm col-lg-7 m-2">
                                    <div class="card-header"><label class="font-weight-bold text-muted">PERFIL</label></div>
                                    <div class="form-group m-1">
                                        <label for="dni" class="col-form-label font-weight-bold text-muted">Cédula | Pasaporte
                                            <span class="text-primary">*</span></label>
                                        <div class="input-group">
                                            <input type="text" class="form-control @error('dni') is-invalid @enderror"
                                            name="dni" value="{{old('dni')}}" id="dni" placeholder="Nro. Cédula | Pasaporte" onkeyup="verUsuario(); validar();" >
                                            <div class="input-group-prepend "><span class=" input-group-text">
                                                <i class=" text-primary fas fa-id-card "></i></span></div>
                                            @error ('dni') <span class="invalid-feedback" role="alert"> <em>{{$message}}</span></em> @enderror
                                        </div>
                                        <em id="salida" class="text-danger small"></em>
                                    </div>

                                    <div id="Vnombre" style="display:none"  class="form-group m-1">
                                        <label for="nombre" class="col-form-label font-weight-bold text-muted">Nombres
                                            <span class="text-primary">*</span></label>
                                        <div class="input-group">
                                            <input type="text" class="form-control @error('nombre') is-invalid @enderror"
                                            name="nombre" value="{{old('nombre')}}" id="nombre" placeholder="Nombres">
                                            <div class="input-group-prepend "><span class=" input-group-text">
                                                <i class=" text-primary fas fa-user"></i></span></div>
                                            @error ('nombre') <span class="invalid-feedback" role="alert"> <em>{{$message}}</span></em> @enderror
                                        </div>
                                    </div>

                                    <div id="Vapellido" style="display:none" class="form-group m-1">
                                        <label for="apellido" class="col-form-label font-weight-bold text-muted">Apellidos
                                            <span class="text-primary">*</span></label>
                                        <div class="input-group">
                                            <input id="apellido" type="text" class="form-control @error('apellido') is-invalid @enderror"
                                            name="apellido" value="{{old('apellido')}}" placeholder="Apellidos">
                                            <div class="input-group-prepend "><span class=" input-group-text">
                                                <i class=" text-primary fas fa-user"></i></span></div>
                                            @error ('apellido') <span class="invalid-feedback" role="alert"> <em>{{$message}}</span></em> @enderror
                                        </div>
                                    </div>

                                    <div class="form-group m-1">
                                        <label for="email" class="col-form-label font-weight-bold text-muted">E-Mail
                                            <span class="text-primary">*</span></label>
                                        <div class="input-group">
                                            <input id="email" type="email" class="form-control @error('email') is-invalid @enderror"
                                            name="email" value="{{old('email')}}" placeholder="Correo electrónico" >
                                            <div class="input-group-prepend "><span class=" input-group-text">
                                                <i class=" text-primary fas fa-envelope"></i></span></div>
                                            @error ('email') <span class="invalid-feedback" role="alert"> <em>{{$message}}</span></em> @enderror
                                        </div>
                                    </div>

                                    <font class="m-3 text-muted font-weight-bold"> SYSTAG envía credenciales de acceso al email registrado</font>

                                    <div class="card-footer bg-light">
                                            <button class=" col-4 btn btn-primary" type="submit">Guardar</button>
                                    </div>
                                </div>
                                <div class="col"></div>
                                <div class="card col-lg-4 shadow-sm m-2">
                                    <div class="card-header mb-3 d-flex justify-content-between aling-items-end">
                                        <label class="col-form-label font-weight-bold text-muted"> ROLES</label>
                                        {{-- <a class="btn btn-outline-secondary "> Mostrar | Ocultar</a> --}}
                                    </div>
                                    <div class="form-group">
                                        @include('users.partials.roleCheckbox')
                                    </div>
                                </div>
                                <div class="card col-lg-7 shadow-sm mt-4 ml-2 ">
                                    <div class="card-header d-flex justify-content-between aling-items-end">
                                        <label class="col-form-label font-weight-bold text-muted"> PERMISOS</label>
                                        <a class="btn btn-outline-secondary" onclick="ver_permisos('permisos')"> Mostrar | Ocultar</a>
                                    </div>

                                    <div id="permisos" class="form-group ">
                                        @include('users.partials.permissionCheckbox', ['model'=>$user])
                                    </div>
                                </div>
                          </div>
                        </form>
                      </div>
                  </div>
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
    function verUsuario(){
    document.getElementById('nombre').value='';
            document.getElementById('apellido').value='';
            document.getElementById('email').value='';
    var id = document.getElementById('dni').value;
    axios.post('/getUsuarios/'+id)
      .then((resp)=>{
        for (i = 0; i < Object.keys(resp.data).length; i++) {
            document.getElementById('nombre').value=resp.data[i].nombre;
            document.getElementById('apellido').value=resp.data[i].apellido;
            document.getElementById('email').value=resp.data[i].email;
        }
      })
      .catch(function (error) {console.log(error);})
}

//Validar numeros de cédula
function validar() {
    var vdate = document.getElementById("dni").value.trim();
    var total = 0;
    var longitud = vdate.length;
    var longcheck = longitud - 1;

    if (vdate !== "" && longitud === 10){
        for(i = 0; i < longcheck; i++){
        if (i%2 === 0) {
            var aux = vdate.charAt(i) * 2;
            if (aux > 9) aux -= 9;
            total += aux;
        } else {
            total += parseInt(vdate.charAt(i)); // parseInt o concatenará en lugar de sumar
            }
        }
        total = total % 10 ? 10 - total % 10 : 0;

        if (vdate.charAt(longitud-1) == total) {
        document.getElementById("salida").innerHTML = (" ");
        Vnombre.style.display='';
        Vapellido.style.display='';
        }else{
            document.getElementById("salida").innerHTML = ("Número de cédula  no válida");
            Vnombre.style.display='none';
            Vapellido.style.display='none';
        }
    }
}

function ver_permisos(id){
if (document.getElementById){ //se obtiene el id
var el = document.getElementById(id); //se define la variable "el" igual a nuestro div
el.style.display = (el.style.display == 'none') ? 'block' : 'none'; //damos un atributo display:none que oculta el div
}
}
window.onload = function(){/*hace que se cargue la función lo que predetermina que div estará oculto hasta llamar a la función nuevamente*/
    ver_permisos('permisos');/* "contenido_a_mostrar" es el nombre que le dimos al DIV */
}

</script>
@endpush()

