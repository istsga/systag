@extends('layouts.layout')
@section('title', ' Estudiante |')
@section('content')

@push('styles')
<link href="{{asset('css/wizard-4/style.css')}}" rel="stylesheet">
<link href="{{asset('css/styleEstudiante.css')}}" rel="stylesheet">
@endpush

<main class="c-main">
<div class="container-fluid">
    <div class="fade-in">
        @if ($errors->count())
        <div class="alert alert-danger alert-block">
            <button type="button" class="close" data-dismiss="alert">×</button>
            <em> Verificar <span class="font-weight-bold">{{ count($errors) }}</span> errores encontrados para continuar.</em>
        </div>
        @endif

        <div class="row justify-content-center">
            <div class="col-lg-12">
                <div class="card shadow-lg">
                    <div class="card-header bg-primary">
                        <h4 class=" text-light"><i class="fas fa-user mr-3"></i> <span class="text-value">ESTUDIANTE</span> </h4>
                    </div>

                    <div class="card-body">
                        <form id="regForm" method="POST"  action="{{ route('estudiantes.store')}} " enctype="multipart/form-data">
                            @csrf
                            <div class="tab ">
                                <div class="card shadow-sm">
                                    <div class="col-lg-12 d-flex justify-content-center mt-3">
                                        <h5 class="text-dark font-weight-bold"> INFORMACIÓN PERSONAL</h5>
                                    </div>

                                    <div class="row p-3">
                                        <div class="card shadow-sm col-lg-4 m-3">

                                            <div class="form-group mt-3 ">
                                                <div class="profile-header-container  ">
                                                    <div class="profile-header-img d-flex justify-content-center ">
                                                        <img style="border: solid #3D9970 1px" class="imagenPrevisualizacion" width="113px" height="151px" id="imagenPrevisualizacion">
                                                    </div>
                                                    <div class="custom-file mt-2">
                                                        <input type="file" id="seleccionArchivos" aria-describedby="inputGroupFileAddon01" class="form-control custom-file-input mt-2 @error('foto') is-invalid @enderror"
                                                        name="foto" value="{{old('foto')}}" placeholder="Foto" >
                                                        <label class="custom-file-label" for="inputGroupFile01">Elegir imagen </label>
                                                        <em class="small text-muted">Formato JPG, JPEG  |  Peso Max 1 MB</em>
                                                        @error ('foto') <span class="invalid-feedback" role="alert"> <em>{{$message}}</span> </em> @enderror
                                                    </div>
                                                </div>
                                            </div>

                                            <div class="form-group">
                                                <label for="nacionalidad" class="col-form-label font-weight-bold text-muted">Nacionalidad
                                                    <span class="text-primary">*</span></label>
                                                <div class="input-group">
                                                    <select name="nacionalidad" id="nacionalidad" class="form-control @error('nacionalidad') is-invalid @enderror" onchange="AddNacionalidad();" >
                                                        <option value=""> Selecionar</option>
                                                        <option value="Ecuatoriana" {{ old('nacionalidad') == 'Ecuatoriana' ? 'selected' : '' }}> Ecuatoriana</option>
                                                        <option value="Venezolana" {{ old('nacionalidad') == 'Venezolana' ? 'selected' : '' }}> Venezolana</option>
                                                        <option value="Cubana" {{ old('nacionalidad') == 'Cubana' ? 'selected' : '' }}> Cubana</option>
                                                        <option value="Otro" {{ old('nacionalidad') == 'Otro' ? 'selected' : '' }}> Otro</option>
                                                    </select>
                                                    <div class="input-group-prepend "><span class=" input-group-text">
                                                        <i class=" text-primary  fas fa-flag"></i></span></div>
                                                    @error ('nacionalidad') <span class="invalid-feedback" role="alert"> <em>{{$message}}</span> </em> @enderror
                                                </div>
                                            </div>
                                        </div>

                                        <div class="col">{{-- columna vacía que ajusta 12 columnas --}}</div>

                                        <div class="card shadow-sm col-lg-7 m-3">
                                            <div class="row mt-2">
                                                <div class="form-group col-lg-5">
                                                    <label for="tipo_identificacion" class="col-form-label font-weight-bold text-muted">Tipo Documento
                                                        <span class="text-primary">*</span>
                                                    </label>
                                                    <div class="input-group">
                                                        <select name="tipo_identificacion" id="tipo_identificacion" class="form-control @error('tipo_identificacion') is-invalid @enderror ">
                                                            <option value=" " > == Seleccionar == </option>
                                                            <option value="1" >Cédula</option>
                                                            <option value="0" >Pasaporte</option>
                                                        </select>
                                                        <div class="input-group-prepend "><span class=" input-group-text">
                                                        <i class=" text-primary fas fa-check"></i></span></div>
                                                        @error ('tipo_identificacion') <span class="invalid-feedback" role="alert"> <em>{{$message}}</span> </em> @enderror
                                                    </div>
                                                </div>

                                                <div class="form-group col-lg-7">
                                                    <label for="dni" class="col-form-label font-weight-bold text-muted">Cédula | Pasaporte
                                                        <span class="text-primary">*</span></label>
                                                    <div class="input-group">
                                                        <input id="dni" type="text" class="form-control @error('dni') is-invalid @enderror"  onkeyup="validar()"
                                                        name="dni" value="{{old('dni')}}" placeholder="Nro. Cédula | Pasaporte " >
                                                        <div class="input-group-prepend "><span class=" input-group-text">
                                                            <i class=" text-primary fas fa-id-card"></i></span></div>
                                                        @error ('dni') <span class="invalid-feedback" role="alert"> <em>{{$message}}</span> </em> @enderror
                                                    </div>
                                                    <em id="salida" class="text-danger small"></em>
                                                </div>

                                                <div id="Vnombre" style="display:none" class="form-group col-lg-12 mt-4">
                                                    <label for="nombre" class="col-form-label font-weight-bold text-muted">Nombres
                                                        <span class="text-primary">*</span></label>
                                                    <div class="input-group">
                                                        <input type="text" class="form-control @error('nombre') is-invalid @enderror"
                                                        name="nombre" value="{{old('nombre')}}" placeholder="Nombre" >
                                                        <div class="input-group-prepend "><span class=" input-group-text">
                                                            <i class=" text-primary fas fa-user"></i></span></div>
                                                        @error ('nombre') <span class="invalid-feedback" role="alert"> <em>{{$message}}</span> </em> @enderror
                                                    </div>
                                                </div>

                                                <div id="Vapellido" style="display:none" class="form-group col-lg-12">
                                                    <label for="apellido" class="col-form-label font-weight-bold text-muted">Apellidos
                                                        <span class="text-primary">*</span></label>
                                                    <div class="input-group">
                                                        <input type="text" class="form-control @error('apellido') is-invalid @enderror"
                                                        name="apellido" value="{{old('apellido')}}" placeholder="Apellido" >
                                                        <div class="input-group-prepend "><span class=" input-group-text">
                                                            <i class=" text-primary fas fa-user"></i></span></div>
                                                        @error ('apellido') <span class="invalid-feedback" role="alert"> <em>{{$message}}</span> </em> @enderror
                                                    </div>
                                                </div>
                                            </div>
                                        </div>
                                    </div>
                                </div>
                            </div>

                            <div class="tab">
                                <div class="card shadow-sm ">
                                    <div class="col-lg-12 d-flex justify-content-center mt-3">
                                        <h5 class="text-dark font-weight-bold">INFORMACIÓN BÁSICA</h5>
                                    </div>
                                    <div class="card shadow-sm m-3 p-3">
                                        <div class="row">
                                            <div class="form-group col-lg-4">
                                                <label for="fecha_nacimiento" class="col-form-label font-weight-bold text-muted ">Fecha de Nacimiento
                                                    <span class="text-primary">*</span></label>
                                                <div class="input-group">
                                                    <input type="date" class="form-control @error('fecha_nacimiento') is-invalid @enderror"
                                                    name="fecha_nacimiento" id="fecha_nacimiento" value="{{old('fecha_nacimiento')}}" placeholder="Fecha de Nacimiento" >
                                                    <div class="input-group-prepend "><span class=" input-group-text">
                                                        <i class=" text-primary fas fa-calendar"></i></span></div>
                                                    @error ('fecha_nacimiento') <span class="invalid-feedback" role="alert"> <em>{{$message}}</span> </em> @enderror
                                                </div>
                                            </div>

                                            <div class="row col-lg-8 " id="canton_provincia" style="display:none">
                                                <div class="form-group col-lg-6">
                                                    <label for="provincia_id" class=" col-form-label font-weight-bold text-muted">Provincia
                                                        <span class="text-primary">*</span></label>
                                                    <div class="input-group">
                                                        <select name="provincia_id" id="provincia_id"  class="form-control @error('provincia_id') is-invalid @enderror" onchange="cambia_cantones(this)">
                                                            <option class="form-control" value=""> == Seleccionar == </option>
                                                            @foreach ($provincias as $provincia)
                                                            <option  value="{{$provincia->id}}"
                                                                {{old('provincia_id')==$provincia->id ? 'selected' : '' }}
                                                                >{{$provincia->provincia}}</option>
                                                                @endforeach
                                                        </select>
                                                        <div class="input-group-prepend "><span class=" input-group-text">
                                                            <i class=" text-primary fas fa-map-marker-alt"></i></span></div>
                                                        @error ('provincia_id') <span class="invalid-feedback" role="alert"> <em>{{$message}}</span> </em> @enderror
                                                    </div>
                                                </div>

                                                <div class="form-group col-lg-6 ">
                                                    <label for="cantone_id" class="col-form-label font-weight-bold text-muted ">Cantón
                                                        <span class="text-primary">*</span></label>
                                                    <div class="input-group">
                                                        <select name="cantone_id"  id="cantone_id"   class="form-control @error('cantone_id') is-invalid @enderror  ">
                                                            <option class="form-control " value=""> == Selecionar provincia == </option>
                                                        </select>
                                                        <div class="input-group-prepend "><span class=" input-group-text">
                                                            <i class=" text-primary fas fa-map-marker-alt"></i></span></div>
                                                        @error ('cantone_id') <span class="invalid-feedback" role="alert"> <em>{{$message}}</span></em> @enderror
                                                    </div>
                                                </div>
                                            </div>

                                            <div class="form-group col-lg-8" id="lugar_nacimiento" style="display: none">
                                                <label for="lugar_nacimiento" class="col-form-label font-weight-bold text-muted">Lugar de Nacimiento
                                                    <span class="text-primary">*</span></label>
                                                <div class="input-group">
                                                    <input type="text" class="form-control @error('lugar_nacimiento') is-invalid @enderror"
                                                    name="lugar_nacimiento" id="lugar_nacimiento" value="{{old('lugar_nacimiento')}}" placeholder="País , ciudad..." >
                                                    <div class="input-group-prepend "><span class=" input-group-text">
                                                        <i class=" text-primary fas fa-globe"></i></span></div>
                                                    @error ('lugar_nacimiento') <span class="invalid-feedback" role="alert"> <em>{{$message}}</span> </em> @enderror
                                                </div>
                                            </div>

                                            <div class="form-group col-lg-4">
                                                <label for="estadocivile_id" class="col-form-label font-weight-bold text-muted ">Estado Civil
                                                    <span class="text-primary">*</span></label>
                                                <div class="input-group">
                                                    <select name="estadocivile_id"  id="estadocivile_id" class="form-control @error('estadocivile_id') is-invalid @enderror  ">
                                                        <option class="form-control" value=""> == Seleccionar == </option>
                                                        @foreach ($estadociviles as $estadocivile)
                                                        <option  value="{{$estadocivile->id}}"
                                                            {{old('estadocivile_id')==$estadocivile->id ? 'selected' : '' }}
                                                            >{{$estadocivile->nombre}}</option>
                                                            @endforeach
                                                    </select>
                                                    <div class="input-group-prepend "><span class=" input-group-text">
                                                        <i class=" text-primary fas fa-user-alt"></i></span></div>
                                                    @error ('estadocivile_id') <span class="invalid-feedback" role="alert"> <em>{{$message}}</span> </em> @enderror
                                                </div>
                                            </div>

                                            <div class="form-group col-lg-4">
                                                <label for="ocupacion" class="col-form-label font-weight-bold text-muted">Ocupación
                                                    <span class="text-primary">*</span></label>
                                                <div class="input-group">
                                                    <input class="form-control @error('ocupacion') is-invalid @enderror"
                                                    name="ocupacion" id="ocupacion" value="{{old('ocupacion')}}" placeholder="Ocupación" >
                                                    <div class="input-group-prepend "><span class=" input-group-text">
                                                        <i class=" text-primary fas fa-user-alt"></i></span></div>
                                                    @error ('ocupacion') <span class="invalid-feedback" role="alert"> <em>{{$message}}</span> </em> @enderror
                                                </div>
                                            </div>

                                            <div class="form-group col-lg-4">
                                                <label for="etnia_id" class="col-form-label font-weight-bold text-muted ">Etnia
                                                    <span class="text-primary">*</span></label>
                                                <div class="input-group">
                                                    <select name="etnia_id" id="etnia_id"  class="form-control @error('etnia_id') is-invalid @enderror  ">
                                                        <option class="form-control" value=""> == Seleccionar == </option>
                                                        @foreach ($etnias as $etnia)
                                                        <option  value="{{$etnia->id}}"
                                                            {{old('etnia_id')==$etnia->id ? 'selected' : '' }}
                                                            >{{$etnia->nombre}}</option>
                                                            @endforeach
                                                    </select>
                                                    <div class="input-group-prepend "><span class=" input-group-text">
                                                        <i class=" text-primary  fas fa-user-alt"></i></span></div>
                                                    @error ('etnia_id') <span class="invalid-feedback" role="alert"> <em>{{$message}}</span></em> @enderror
                                                </div>
                                            </div>

                                            <div class="form-group col-lg-4">
                                                <label for="tiposangre_id" class="col-form-label font-weight-bold text-muted ">Tipo de sangre
                                                    <span class="text-primary">*</span></label>
                                                <div class="input-group">
                                                    <select name="tiposangre_id" id="tiposangre_id" class="form-control @error('tiposangre_id') is-invalid @enderror  ">
                                                        <option class="form-control" value=""> == Seleccionar == </option>
                                                        @foreach ($tiposangres as $tiposangre)
                                                        <option  value="{{$tiposangre->id}}"
                                                            {{old('tiposangre_id')==$tiposangre->id ? 'selected' : '' }}
                                                            >{{$tiposangre->nombre}}</option>
                                                            @endforeach
                                                    </select>
                                                    <div class="input-group-prepend "><span class=" input-group-text">
                                                        <i class=" text-primary  fas fa-user-alt"></i></span></div>
                                                    @error ('tiposangre_id') <span class="invalid-feedback" role="alert"> <em>{{$message}}</span></em> @enderror
                                                </div>
                                            </div>

                                            <div class="form-group col-lg-4">
                                                <label for="discapacidad" class="col-form-label font-weight-bold text-muted ">Discapacidad
                                                    <span class="text-primary">*</span></label>
                                                <div class="input-group">
                                                    <select name="discapacidad" id="discapacidad" class="form-control " onchange="AddDiscapacidad(this)">
                                                        <option value="0" {{ old('discapacidad') == 0 ? 'selected' : '' }}>No</option>
                                                        <option value="1" {{ old('discapacidad') == 1 ? 'selected' : '' }}>Sí</option>
                                                    </select>
                                                    <div class="input-group-prepend "><span class=" input-group-text">
                                                        <i class=" text-primary  fas fa-wheelchair"></i></span></div>
                                                </div>
                                            </div>

                                            <div class="row col-lg-9" id="InfoDiscapacidad" style="display:none" >
                                                <div class="form-group col-lg-6 "  >
                                                    <label for="tipo_discapacidad" class="col-form-label font-weight-bold text-muted ">Tipo de discapacidad
                                                        <span class="text-primary">*</span></label>
                                                    <div class="input-group">
                                                        <input  class="form-control @error('tipo_discapacidad') is-invalid @enderror"
                                                        name="tipo_discapacidad" value="{{old('tipo_discapacidad')}}" placeholder="Tipo de discapacidad">
                                                        <div class="input-group-prepend "><span class=" input-group-text">
                                                            <i class=" text-primary fas fa-user-alt"></i></span></div>
                                                        @error ('tipo_discapacidad') <span class="invalid-feedback" role="alert"> <em>{{$message}}</span> </em> @enderror
                                                    </div>
                                                </div>

                                                <div class="form-group col-lg-5 ">
                                                    <label for="porcentaje_discapacidad" class="col-form-label font-weight-bold text-muted">Porcentaje de discapacidad
                                                        <span class="text-primary">*</span></label>
                                                    <div class="input-group">
                                                        <input class="form-control @error('porcentaje_discapacidad') is-invalid @enderror"
                                                        name="porcentaje_discapacidad" value="{{old('porcentaje_discapacidad')}}" placeholder="Porcentaje">
                                                        <div class="input-group-prepend "><span class=" input-group-text">
                                                            <i class=" text-primary fas fa-user-alt"></i></span></div>
                                                        @error ('porcentaje_discapacidad') <span class="invalid-feedback" role="alert"> <em>{{$message}}</span> </em> @enderror
                                                    </div>
                                                </div>
                                            </div>
                                        </div>
                                    </div>
                                </div>
                            </div>

                            <div class="tab">
                                <div class="card shadow-sm ">
                                    <div class="col-lg-12 d-flex justify-content-center mt-3">
                                        <h5 class="text-dark font-weight-bold"> INFORMACIÓN FAMILIAR</h5>
                                    </div>
                                    <div class="card shadow-sm m-3 p-3">
                                        <div class="row">
                                            <div class="form-group col-lg-4">
                                                <label for="miembro_hogar" class="col-form-label font-weight-bold text-muted">Nro. de miembros
                                                    <span class="text-primary">*</span></label>
                                                <div class="input-group">
                                                    <input type="text" class="form-control @error('miembro_hogar') is-invalid @enderror"
                                                    name="miembro_hogar" id="miembro_hogar" value="{{old('miembro_hogar')}}" placeholder="Miembros del Hogar" >
                                                    <div class="input-group-prepend "><span class=" input-group-text">
                                                        <i class=" text-primary  fas fa-user-friends"></i></span></div>
                                                    @error ('miembro_hogar') <span class="invalid-feedback" role="alert"> <em>{{$message}}</span></em> @enderror
                                                </div>
                                            </div>

                                            <div class="form-group col-lg-4">
                                                <label for="ingreso_ec" class="col-form-label font-weight-bold text-muted">Ingreso económico familiar
                                                    <span class="text-primary">*</span></label>
                                                <div class="input-group">
                                                    <input type="text" class="form-control @error('ingreso_ec') is-invalid @enderror"
                                                    name="ingreso_ec" id="ingreso_ec" value="{{old('ingreso_ec')}}" placeholder="Ingreso Económico" >
                                                    <div class="input-group-prepend "><span class=" input-group-text">
                                                        <i class=" text-primary fas fa-money-bill-alt"></i></span></div>
                                                    @error ('ingreso_ec') <span class="invalid-feedback" role="alert"> <em>{{$message}}</span> </em> @enderror
                                                </div>
                                            </div>

                                            <div class="form-group col-lg-4">
                                                {{-- Para ordenar segun corresponda --}}
                                            </div>

                                            <div class="form-group col-lg-4">
                                                <label for="nombre_padre" class="col-form-label font-weight-bold text-muted ">Nombres y apellidos del padre
                                                    <span class="text-primary">*</span></label>
                                                <div class="input-group">
                                                    <input type="text" class="form-control @error('nombre_padre') is-invalid @enderror"
                                                    name="nombre_padre" id="nombre_padre" value="{{old('nombre_padre')}}" placeholder="Nombres y apellidos del padre" >
                                                    <div class="input-group-prepend "><span class=" input-group-text">
                                                        <i class=" text-primary fas fa-user"></i></span></div>
                                                    @error ('nombre_padre') <span class="invalid-feedback" role="alert"> <em>{{$message}}</span></em> @enderror
                                                </div>
                                            </div>

                                            <div class="form-group col-lg-4">
                                                <label for="ocupacion_padre" class="col-form-label font-weight-bold text-muted">Ocupación
                                                    <span class="text-primary">*</span></label>
                                                <div class="input-group">
                                                    <input class="form-control @error('ocupacion_padre') is-invalid @enderror"
                                                    name="ocupacion_padre" id="ocupacion_padre" value="{{old('ocupacion_padre')}}" placeholder="Ocupación" >
                                                    <div class="input-group-prepend "><span class=" input-group-text">
                                                        <i class=" text-primary fas fa-user"></i></span></div>
                                                    @error ('ocupacion_padre') <span class="invalid-feedback" role="alert"> <em>{{$message}}</span> </em> @enderror
                                                </div>
                                            </div>

                                            <div class="form-group col-lg-4">
                                                <label for="instruccione_id" class="col-form-label font-weight-bold text-muted">Instrucción
                                                    <span class="text-primary">*</span></label>
                                                <div class="input-group">
                                                    <select name="instruccione_id" id="instruccione_id" class="form-control @error('instruccione_id') is-invalid @enderror ">
                                                        <option class="form-control " value=""> == Seleccionar == </option>
                                                        @foreach ($instrucciones as $instruccione)
                                                        <option  value="{{$instruccione->id}}"
                                                            {{old('instruccione_id')==$instruccione->id ? 'selected' : '' }}
                                                            >{{$instruccione->nombre}}</option>
                                                            @endforeach
                                                    </select>
                                                    <div class="input-group-prepend "><span class=" input-group-text">
                                                        <i class=" text-primary fas fa-file-invoice"></i></span></div>
                                                    @error ('instruccione_id') <span class="invalid-feedback" role="alert"> <em>{{$message}}</span> </em> @enderror
                                                </div>
                                            </div>

                                            <div class="form-group col-lg-4">
                                                <label for="nombre_madre" class="col-form-label font-weight-bold text-muted">Nombres y apellidos de la madre
                                                    <span class="text-primary">*</span></label>
                                                <div class="input-group">
                                                    <input type="text" class="form-control @error('nombre_madre') is-invalid @enderror"
                                                    name="nombre_madre" id="nombre_madre" value="{{old('nombre_madre')}}" placeholder="Nombres y apellidos de la madre" >
                                                    <div class="input-group-prepend "><span class=" input-group-text">
                                                        <i class=" text-primary fas fa-female"></i></span></div>
                                                    @error ('nombre_madre') <span class="invalid-feedback" role="alert"> <em>{{$message}}</span></em> @enderror
                                                </div>
                                            </div>

                                            <div class="form-group col-lg-4">
                                                <label for="ocupacion_madre" class="col-form-label font-weight-bold text-muted">Ocupación
                                                    <span class="text-primary">*</span></label>
                                                <div class="input-group">
                                                    <input class="form-control @error('ocupacion_madre') is-invalid @enderror"
                                                    name="ocupacion_madre" id="ocupacion_madre" value="{{old('ocupacion_madre')}}" placeholder="Ocupación" >
                                                    <div class="input-group-prepend "><span class=" input-group-text">
                                                        <i class=" text-primary fas fa-female"></i></span></div>
                                                    @error ('ocupacion_madre') <span class="invalid-feedback" role="alert"> <em>{{$message}}</span> </em> @enderror
                                                </div>
                                            </div>

                                            <div class="form-group col-lg-4">
                                                <label for="madre_instruccione_id" class="col-form-label font-weight-bold text-muted ">Instrucción
                                                    <span class="text-primary">*</span></label>
                                                <div class="input-group">
                                                    <select name="madre_instruccione_id" id="madre_instruccione_id"  class="form-control @error('madre_instruccione_id') is-invalid @enderror ">
                                                        <option class="form-control" value=""> == Seleccionar == </option>
                                                        @foreach ($instrucciones as $instruccione)
                                                        <option  value="{{$instruccione->id}}"
                                                            {{old('madre_instruccione_id')==$instruccione->id ? 'selected' : '' }}
                                                            >{{$instruccione->nombre}}</option>
                                                            @endforeach
                                                    </select>
                                                    <div class="input-group-prepend "><span class=" input-group-text">
                                                        <i class="text-primary fas fa-file-invoice"></i></span></div>
                                                    @error ('madre_instruccione_id') <span class="invalid-feedback" role="alert"> <em>{{$message}}</span></em> @enderror
                                                </div>
                                            </div>
                                        </div>
                                    </div>
                                </div>
                            </div>

                            <div class="tab">
                                <div class="card shadow-sm ">
                                    <div class="col-lg-12 d-flex justify-content-center mt-3">
                                        <h5 class="text-dark font-weight-bold"> INFORMACIÓN DE CONTACTO </h5>
                                    </div>
                                    <div class="card shadow-sm m-3 p-3">
                                        <div class="row">
                                            <div class="form-group col-lg-4">
                                                <label for="email" class="col-form-label font-weight-bold text-muted">E-mail
                                                    <span class="text-primary">*</span></label>
                                                <div class="input-group">
                                                    <input type="email" class="form-control @error('email') is-invalid @enderror"
                                                    name="email" id="email" value="{{old('email')}}" placeholder="Correo Electrónico" >
                                                    <div class="input-group-prepend "><span class=" input-group-text">
                                                        <i class=" text-primary  fas fa-envelope"></i></span></div>
                                                    @error ('email') <span class="invalid-feedback" role="alert"> <em>{{$message}}</span></em> @enderror
                                                </div>
                                            </div>

                                            <div class="form-group col-lg-4">
                                                <label for="direccion_provincia_id" class="col-form-label font-weight-bold text-muted">Provincia
                                                    <span class="text-primary">*</span></label>
                                                <div class="input-group">
                                                    <select name="direccion_provincia_id" id="direccion_provincia_id"  class="form-control @error('direccion_provincia_id') is-invalid @enderror" onchange="cambia_cantones1(this)" >
                                                        <option class="form-control " value=""> == Seleccionar == </option>
                                                        @foreach ($provincias as $provincia)
                                                        <option  value="{{$provincia->id}}"
                                                            {{old('direccion_provincia_id')==$provincia->id ? 'selected' : '' }}
                                                            >{{$provincia->provincia}}</option>
                                                            @endforeach
                                                    </select>
                                                    <div class="input-group-prepend "><span class=" input-group-text">
                                                        <i class=" text-primary fas fa-map-marker-alt"></i></span></div>
                                                    @error ('direccion_provincia_id') <span class="invalid-feedback" role="alert"> <em>{{$message}}</span></em> @enderror
                                                </div>
                                            </div>

                                            <div class="form-group col-lg-4">
                                                <label for="direccion_cantone_id" class="col-form-label font-weight-bold text-muted">Cantón
                                                    <span class="text-primary">*</span></label>
                                                <div class="input-group">
                                                    <select name="direccion_cantone_id" id="direccion_cantone_id"  class="form-control @error('direccion_cantone_id') is-invalid @enderror  ">
                                                        <option class="form-control" value=""> == Seleccionar provincia == </option>

                                                    </select>
                                                    <div class="input-group-prepend "><span class=" input-group-text">
                                                        <i class=" text-primary fas fa-map-marker-alt"></i></span></div>
                                                    @error ('direccion_cantone_id') <span class="invalid-feedback" role="alert"> <em>{{$message}}</span> </em> @enderror
                                                </div>
                                            </div>

                                            <div class="form-group col-lg-6">
                                                <label for="calle" class="col-form-label font-weight-bold text-muted ">Calles
                                                    <span class="text-primary">*</span></label>
                                                <div class="input-group">
                                                    <input type="text" class="form-control @error('calle') is-invalid @enderror"
                                                    name="calle" id="calle" value="{{old('calle')}}" placeholder="Calles" >
                                                    <div class="input-group-prepend "><span class=" input-group-text">
                                                        <i class=" text-primary fas fa-map-marker-alt"></i></span></div>
                                                    @error ('calle') <span class="invalid-feedback" role="alert"> <em>{{$message}}</span></em> @enderror
                                                </div>
                                            </div>

                                            <div class="form-group col-lg-3">
                                                <label for="telefono_fijo" class="col-form-label font-weight-bold text-muted">Teléfono fijo</label>
                                                <div class="input-group">
                                                    <input type="text" class="form-control @error('telefono_fijo') is-invalid @enderror"
                                                    name="telefono_fijo" id="telefono_fijo" value="{{old('telefono_fijo')}}" placeholder="Teléfono fijo" >
                                                    <div class="input-group-prepend "><span class=" input-group-text">
                                                        <i class=" text-primary fas fa-phone-square"></i></span></div>
                                                    @error ('telefono_fijo') <span class="invalid-feedback" role="alert"> <em>{{$message}}</span> </em> @enderror
                                                </div>
                                            </div>

                                            <div class="form-group col-lg-3">
                                                <label for="telefono_movil" class="col-form-label font-weight-bold text-muted">Teléfono celular
                                                    <span class="text-primary">*</span></label>
                                                <div class="input-group">
                                                    <input type="text" class="form-control @error('telefono_movil') is-invalid @enderror"
                                                    name="telefono_movil" id="telefono_movil" value="{{old('telefono_movil')}}" placeholder="Teléfono celular" >
                                                    <div class="input-group-prepend "><span class=" input-group-text">
                                                        <i class=" text-primary fas fa-mobile"></i></span></div>
                                                    @error ('telefono_movil') <span class="invalid-feedback" role="alert"> <em>{{$message}}</span></em> @enderror
                                                </div>
                                            </div>

                                            <div class="form-group col-lg-4">
                                                <label for="nombre_parentesco" class="col-form-label font-weight-bold text-muted">Nombre Familiar
                                                    <span class="text-primary">*</span></label>
                                                <div class="input-group">
                                                    <input type="text" class="form-control @error('nombre_parentesco') is-invalid @enderror"
                                                    name="nombre_parentesco" id="nombre_parentesco"  value="{{old('nombre_parentesco')}}" placeholder="Nombre de un familiar cercano " >
                                                    <div class="input-group-prepend "><span class=" input-group-text">
                                                        <i class=" text-primary fas fa-user"></i></span></div>
                                                    @error ('nombre_parentesco') <span class="invalid-feedback" role="alert"> <em>{{$message}}</span></em> @enderror
                                                </div>
                                            </div>

                                            <div class="form-group col-lg-4">
                                                <label for="telefono_parentesco" class="col-form-label font-weight-bold text-muted">Número de contacto
                                                    <span class="text-primary">*</span></label>
                                                <div class="input-group">
                                                    <input type="text" class="form-control @error('telefono_parentesco') is-invalid @enderror"
                                                    name="telefono_parentesco" id="telefono_parentesco" value="{{old('telefono_parentesco')}}" placeholder="Número de contacto" >
                                                    <div class="input-group-prepend "><span class=" input-group-text">
                                                        <i class=" text-primary fas fa-phone-square"></i></span></div>
                                                    @error ('telefono_parentesco') <span class="invalid-feedback" role="alert"> <em>{{$message}}</span> </em> @enderror
                                                </div>
                                            </div>

                                            <div class="form-group col-lg-4">
                                                <label for="parentesco" class="col-form-label font-weight-bold text-muted">Parentesco
                                                    <span class="text-primary">*</span></label>
                                                <div class="input-group">
                                                    <input type="text" class="form-control @error('parentesco') is-invalid @enderror"
                                                    name="parentesco" id="parentesco" value="{{old('parentesco')}}" placeholder="Parentesco" >
                                                    <div class="input-group-prepend "><span class=" input-group-text">
                                                        <i class=" text-primary fas fa-user"></i></span></div>
                                                    @error ('parentesco') <span class="invalid-feedback" role="alert"> <em>{{$message}}</span></em> @enderror
                                                </div>
                                            </div>
                                        </div>
                                    </div>
                                </div>
                            </div>

                            <div class="tab">
                                <div class="card shadow-sm">
                                    <div class="col-lg-12 d-flex justify-content-center m-3">
                                        <h5 class="text-dark font-weight-bold"> INFORMACIÓN ACADÉMICA </h5>
                                    </div>
                                    <div class="card shadow-sm m-3 p-3">
                                        <div class="row">
                                            <div class="form-group col-lg-6">
                                                <label for="institucion_origen" class="col-form-label font-weight-bold text-muted">Institución Educativa
                                                    <span class="text-primary">*</span></label>
                                                <div class="input-group">
                                                    <input type="text" class="form-control @error('institucion_origen') is-invalid @enderror"
                                                    name="institucion_origen" id="institucion_origen" value="{{old('institucion_origen')}}" placeholder="Institución Educativa" >
                                                    <div class="input-group-prepend "><span class=" input-group-text">
                                                        <i class=" text-primary fas fa-university"></i></span></div>
                                                    @error ('institucion_origen') <span class="invalid-feedback" role="alert"> <em>{{$message}}</span></em> @enderror
                                                </div>
                                            </div>

                                            <div class="form-group col-lg-6">
                                                <label for="titulo_bachillerato" class="col-form-label font-weight-bold text-muted">Título de bachillerato
                                                    <span class="text-primary">*</span></label>
                                                <div class="input-group">
                                                    <input type="text" class="form-control @error('titulo_bachillerato') is-invalid @enderror"
                                                    name="titulo_bachillerato" id="titulo_bachillerato" value="{{old('titulo_bachillerato')}}" placeholder="Título de bachillerato" >
                                                    <div class="input-group-prepend "><span class=" input-group-text">
                                                        <i class=" text-primary fas fa-user-graduate"></i></span></div>
                                                    @error ('titulo_bachillerato') <span class="invalid-feedback" role="alert"> <em>{{$message}}</span></em> @enderror
                                                </div>
                                            </div>
                                        </div>
                                    </div>
                                    <div class="card shadow-sm m-3 p-3">
                                        <div class="row">
                                            <div class="form-group col-lg-6">
                                                <label for="estado" class=" col-form-label font-weight-bold text-muted">Estado del estudiante
                                                    <span class="text-primary">*</span></label>
                                                <div class="input-group">
                                                    <select name="estado" id="estado"  class="form-control @error('estado') is-invalid @enderror">
                                                        <option value=""> == Selecionar == </option>
                                                        <option value="Activo">Activo</option>
                                                        <option value="Egresado">Egresado</option>
                                                        <option value="Retirado">Retirado</option>
                                                    </select>
                                                    <div class="input-group-prepend "><span class=" input-group-text">
                                                        <i class=" text-primary fas fa-key"></i></span></div>
                                                    @error ('estado') <span class="invalid-feedback" role="alert"> <em>{{$message}}</span> </em> @enderror
                                                </div>
                                            </div>

                                            <div class="form-group col-lg-6">
                                                <label for="convalidacion" class=" col-form-label font-weight-bold text-muted">Convalidación
                                                    <span class="text-primary">*</span></label>
                                                <div class="input-group">
                                                    <select name="convalidacion" id="convalidacion"  class="form-control @error('convalidacion') is-invalid @enderror">
                                                        <option value=""> == Seleccionar == </option>
                                                        <option value="0">No</option>
                                                        <option value="1">Si</option>
                                                    </select>
                                                    <div class="input-group-prepend "><span class=" input-group-text">
                                                        <i class=" text-primary fas fa-star"></i></span></div>
                                                    @error ('convalidacion') <span class="invalid-feedback" role="alert"> <em>{{$message}}</span> </em> @enderror
                                                </div>
                                            </div>
                                        </div>
                                    </div>
                                </div>
                            </div>
                    </div>
                    <div class="card-footer border-0 d-flex justify-content-between aling-items-end bg-light " >
                        <button class=" col-sm-2 btn border  btn-dark " type="button" id="prevBtn" onclick="nextPrev(-1)">Anterior</button>
                        <div style="text-align:center; margin-top:8px">
                            <span class="step"></span>
                            <span class="step"></span>
                            <span class="step"></span>
                            <span class="step"></span>
                            <span class="step"></span>
                        </div>
                        <button class=" col-sm-2 btn  border  btn-primary" type="button" id="nextBtn" onclick="nextPrev(1)">Siguiente</button>
                    </div>
                    </form>
                    </div>
                </div>
            </div>
    </div>
</main>

<script>

    AddNacionalidad();
    AddDiscapacidad();
    cambia_cantones();
    cambia_cantones1();

    //Nacionalidad
    function AddNacionalidad(){
        nacionalidad=document.getElementById('nacionalidad').value;

        if(nacionalidad == ''){
            canton_provincia.style.display='none';
            lugar_nacimiento.style.display='none';
        }

        if(nacionalidad == 'Ecuatoriana'){
            lugar_nacimiento.style.display='none';
            canton_provincia.style.display='';
        }

        if(nacionalidad == 'Venezolana' ){
            canton_provincia.style.display='none';
            lugar_nacimiento.style.display='';
        }

        if(nacionalidad == 'Cubana' ){
            canton_provincia.style.display='none';
            lugar_nacimiento.style.display='';
        }

        if(nacionalidad == 'Otro' ){
            canton_provincia.style.display='none';
            lugar_nacimiento.style.display='';
        }
    };

    function cambia_cantones(select){
        const cantones = @json($cantones);
        provincia = document.getElementById('provincia_id').value;
        const result = cantones.filter(cantones => cantones.provincia_id === Number(provincia));

        if (provincia != 0) {
            num_cantones = result.length;
            document.getElementById("cantone_id").length = num_cantones;
            for(i=0;i<num_cantones;i++){
                cantone_id.options[i].value=result[i].id;
                cantone_id.options[i].text=result[i].canton;
                if(cantone_id.options[i].value == "{{ old("cantone_id") }}")
                    {
                        cantone_id.options[i].selected= true;
                    }
            }
        }else{
            document.getElementById("cantone_id").length  = 1
            cantone_id.options[0].value = ""
            cantone_id.options[0].text = " == Seleccionar provincia == "
        }
    };

     //Discapacidad
    function AddDiscapacidad(){
        discapacidad = document.getElementById('discapacidad').value;

        if(discapacidad == 0){
            InfoDiscapacidad.style.display='none';
        }else{
        InfoDiscapacidad.style.display='';
        }
    }

    function cambia_cantones1(select){
      const cantones = @json($cantones);
      provincia = document.getElementById('direccion_provincia_id').value;
      const result = cantones.filter(cantones => cantones.provincia_id === Number(provincia));

      if (provincia != 0) {
          num_cantones = result.length;
          document.getElementById("direccion_cantone_id").length = num_cantones;
          for(i=0;i<num_cantones;i++){
            direccion_cantone_id.options[i].value=result[i].id;
            direccion_cantone_id.options[i].text=result[i].canton;
            if(direccion_cantone_id.options[i].value == "{{ old("direccion_cantone_id") }}")
                {
                    direccion_cantone_id.options[i].selected= true;
                }
          }
      }else{
          document.getElementById("direccion_cantone_id").length  = 1
          direccion_cantone_id.options[0].value = " "
          direccion_cantone_id.options[0].text = " == Seleccionar provincia =="
      }
    };

    const $seleccionArchivos = document.querySelector("#seleccionArchivos"),
        $imagenPrevisualizacion = document.querySelector("#imagenPrevisualizacion");
        $seleccionArchivos.addEventListener("change", () => {
            const archivos = $seleccionArchivos.files;
            if (!archivos || !archivos.length) {
            $imagenPrevisualizacion.src = "";
            return;
            }
            const primerArchivo = archivos[0];
            const objectURL = URL.createObjectURL(primerArchivo);
            $imagenPrevisualizacion.src = objectURL;
    });

    //select con opciones estaticos
    var tipo_identificacion = null;
            for(var i=0; i!=document.querySelector("#tipo_identificacion").querySelectorAll("option").length; i++)
            {
                tipo_identificacion = document.querySelector("#tipo_identificacion").querySelectorAll("option")[i];
                if(tipo_identificacion.getAttribute("value") == "{{ old("tipo_identificacion") }}")
                {
                    tipo_identificacion.setAttribute("selected", "selected");
                }
            }

    var estado = null;
    for(var i=0; i!=document.querySelector("#estado").querySelectorAll("option").length; i++)
    {
        estado = document.querySelector("#estado").querySelectorAll("option")[i];
        if(estado.getAttribute("value") == "{{ old("estado") }}")
        {
            estado.setAttribute("selected", "selected");
        }
    }

    var convalidacion = null;
    for(var i=0; i!=document.querySelector("#convalidacion").querySelectorAll("option").length; i++)
    {
        convalidacion = document.querySelector("#convalidacion").querySelectorAll("option")[i];
        if(convalidacion.getAttribute("value") == "{{ old("convalidacion") }}")
        {
            convalidacion.setAttribute("selected", "selected");
        }
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

</script>

@endsection

@push('scripts')
<script src="{{asset('js/jquery.min.js')}}"></script>
<script src="{{asset('js/wizard-4/main.js')}}"></script>
@endpush
