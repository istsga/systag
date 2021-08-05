<!DOCTYPE html>
<html lang="es">
<head>
    <meta http-equiv="Content-Type" content="text/html; charset=utf-8"/>
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    <title>Reporte Matrícula</title>
    <link href="{{public_path('css/reportestyle.css')}}" rel="stylesheet">
</head>
<body>

  <header>
    <div class="container">
      <div class="logo">
        <img src="{{ public_path('assets/brand/logo3.png') }}">
      </div>
      <div class="title">
        <h3>INSTITUTO SUPERIOR TECNOLÓGICO "SAN GABRIEL"</h3>
        <h4>Registro Institucional 224 SENESCYT</h4>
      </div>
    </div>

  </header>

  <footer>
    <table style="margin-top: -55px">
        <tr>
          <th colspan="4"></th>
        </tr>
        <tr>
          <td colspan="3">&nbsp;&nbsp;ALUMNO(A)</td>
          <td>&nbsp;SECRETARÍA</td>
        </tr>
    </table>
    <table>
      <tr>
        <td>
            <p class="izq">
              Dirección: Loja entre Villarroel y Olmedo <br>
              Correo electronico: <a href="sangabrielriobamba@hotmail.com">sangabrielriobamba@hotmail.com</a>
            </p>
        </td>
        <td>
          <p class="drcho">
            Página web: <a href="www.sangabrielriobamba.edu.ec">www.sangabrielriobamba.edu.ec</a> <br>
            &nbsp;
          </p>
        </td>

      </tr>
    </table>
  </footer>

      <div class="content">
            <p style="text-align: center"><strong>MATRÍCULA Nro. {{$matricula->id}}</strong></p>
            <p style="text-align: center; margin-top: -10px"> <strong>Periodo Académico {{$matricula->asignacione->periodacademicos->pluck('periodo')->implode(', ')}}</strong> </p>

          <table border="1">
            <tr>
              <th style="font-size: 12px" colspan="5">Datos Personales</th>
            </tr>
            <tr>
              <td colspan="4"> Nombres y Apellidos: &nbsp; <span> {{$matricula->estudiante->nombre}} {{$matricula->estudiante->apellido}}</span></td>
              <td rowspan="7">
                <div style="text-align: center">
                  <img width="103px" height="141px" src="storage/{{$matricula->estudiante->foto}}">
                </div>
              </td>
            </tr>
            <tr>
              <td colspan="2"> Cédula / Pasaporte: &nbsp;  <span> {{$matricula->estudiante->dni}} </span></td>
              <td colspan="2"> Nacionalidad: &nbsp;  <span> {{$matricula->estudiante->nacionalidad}} </span></td>
            </tr>
            <tr>
              <td colspan="2"> Ocupación: &nbsp; <span> {{$matricula->estudiante->ocupacion}}  </span></td>
              <td colspan="2"> Estado Civil: &nbsp;  <span> {{$matricula->estudiante->estadocivile->nombre}}</td>
            </tr>
            <tr>
              <td colspan="2"> Etnia: &nbsp;  <span> {{$matricula->estudiante->etnia->nombre}} </span> </td>
              <td colspan="2"> Tipo de Sangre: &nbsp; <span> {{$matricula->estudiante->tiposangre->nombre}} </span> </td>
            </tr>

            <tr>
              <td colspan="4"> Fecha de Nacimiento: &nbsp; <span> {{$matricula->estudiante->fecha_nacimiento}}  </span> </td>
            </tr>

            <tr>
              <td colspan="4"> Lugar de Nacimiento: &nbsp; <span> {{$matricula->estudiante->provincia->provincia}}, {{$matricula->estudiante->cantone->canton}}  </span> </td>
            </tr>

            <tr>
              <td colspan="4"> Discapacidad: &nbsp; <span> {{$matricula->estudiante->discapacidad}}  {{$matricula->estudiante->tipo_discapacidad}} {{$matricula->estudiante->porcentaje_discapacidad}}  </span> </td>
            </tr>

          </table>
          <br>
          <table border="1">
            <tr>
              <th style="font-size: 12px" colspan="2">Información de Contacto</th>
            </tr>
            <tr>
              <td> Email: &nbsp; <span> {{$matricula->estudiante->email}}  </span></td>
              <td> Teléfonos: &nbsp; <span>{{$matricula->estudiante->telefono_fijo}} /  {{$matricula->estudiante->telefono_movil}}</span> </td>
            </tr>
            <tr>
              <td colspan=2> Dirección: &nbsp; <span> {{$matricula->estudiante->provincia2->provincia}}, {{$matricula->estudiante->cantone2->canton}} ({{$matricula->estudiante->calle}}) </span></td>
            </tr>
            <tr>
              <td colspan=2> Nombre Familiar: &nbsp; <span> {{$matricula->estudiante->nombre_parentesco}} </span></td>
            </tr>
            <tr>
              <td> Parentesco: &nbsp; <span> {{$matricula->estudiante->parentesco}}</span></td>
              <td> Contacto: &nbsp; <span>  {{$matricula->estudiante->telefono_parentesco}}</span></td>
            </tr>
          </table>
          <br>

          <table border="1">
            <tr>
              <th style="font-size: 12px" colspan="2">Información Familiar</th>
            </tr>
            <tr>
              <td> Miembros del hogar: &nbsp; <span> {{$matricula->estudiante->miembro_hogar}}</span> </td>
              <td> Ingreso económico: &nbsp; <span> {{$matricula->estudiante->ingreso_ec}}</span> </td>
            </tr>
            <tr>
              <td colspan="2"> Nombre del Padre: &nbsp; <span> {{$matricula->estudiante->nombre_padre}} </span> </td>
            </tr>
            <tr>
              <td> Ocupación: &nbsp; <span> {{$matricula->estudiante->ocupacion_padre}}  </span> </td>
              <td> Instrucción: &nbsp; <span> {{$matricula->estudiante->instruccione->nombre}} </span> </td>
            </tr>
            <tr>
              <td colspan="2"> Nombre de la Madre: &nbsp; <span> {{$matricula->estudiante->nombre_madre}} </span> </td>
            </tr>
            <tr>
              <td> Ocupación: &nbsp; <span> {{$matricula->estudiante->ocupacion_madre}} </span> </td>
              <td> Instrucción: &nbsp; <span> {{$matricula->estudiante->instruccione2->nombre}}  </span> </td>
            </tr>
          </table>
          <br>
          <table border="1">
            <tr>
              <th style="font-size: 12px" colspan="2"> Información Académica</th>
            </tr>
            <tr>
              <td colspan="2"> Institución que Proviene: &nbsp; <span> {{$matricula->estudiante->institucion_origen}}  </span></td>
            </tr>
            <tr>
              <td colspan="2"> Título de Bachillerato:: &nbsp; <span> {{$matricula->estudiante->titulo_bachillerato}}   </span></td>
            </tr>
          </table>
            <br>
          <table border="1">
            <tr>
              <th style="font-size: 12px" colspan="3"> Detalle de Matrícula</th>
            </tr>
            <tr>
              <td colspan="3"> Carrera: &nbsp; <span> {{$matricula->asignacione->carreras->pluck('nombre')->implode(', ')}}</span></td>
            </tr>
            <tr>
              <td> Periodo: &nbsp; <span> {{$matricula->asignacione->periodo->nombre}}</span></td>
              <td> Sección: &nbsp; <span> {{$matricula->asignacione->seccione->nombre}} </span></td>
              <td> Paralelo: &nbsp; <span> {{$matricula->asignacione->paralelo->nombre}}  </span></td>
            </tr>
          </table>
          <br>
          <table border="1">
            <tr>
                <th style="font-size: 12px" colspan="3"> Asignaturas Matriculadas</th>
            </tr>
            <tr>
                <td colspan="3">
                    <div class="wrap-m">{{$matricula->asignaturas->pluck('nombre')->implode(' | ')}}</div>
                </td>
            </tr>
            <tr>
                <th style="font-size: 12px" colspan="3"> Asignaturas Convalidadas</th>
            </tr>
            <tr>
                <td colspan="3">
                    @forelse ($convalidacion as $data)
                         {{ ($data->asignatura->nombre) }} &nbsp; | &nbsp;
                    @empty
                        Ninguno
                    @endforelse
                </td>
            </tr>
          </table>


      </div>

</body>
</html>
