<!DOCTYPE html>
<html lang="es">
<head>
    <meta http-equiv="Content-Type" content="text/html; charset=utf-8"/>
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    <title>Reporte de Notas</title>
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
      <p style="text-align: center;"><strong>ACTA DE CALIFICACIONES</strong></p>
      <p style="text-align: center; margin-top: -10px "> <strong> Periodo Académico: {{$calificaciones[0]->asignacione->periodacademicos->pluck('periodo')->implode(', ')}} </strong> </p>

      <table>
        <tr>
            <th colspan="6"></th>
        </tr>
        <tr>
          <td style="font-size: 11px; text-transform: uppercase" colspan="4"> <span style="font-weight: bold"> ESPECIALIDAD: </span>
              &nbsp; {{$calificaciones[0]->asignacione->carreras->pluck('nombre')->implode(', ')}}
            </td>
          <td style="font-size: 11px; text-transform: uppercase" colspan="2"><span style="font-weight: bold">PERIODO: </span>
            &nbsp; {{$calificaciones[0]->asignacione->periodo->nombre}}
            </td>
        </tr>
        <tr>
          <td style="font-size: 11px; padding-top: 5px; text-transform: uppercase" colspan="4"> <span style="font-weight: bold">SECCIÓN:</span>
              &nbsp; {{$calificaciones[0]->asignacione->seccione->nombre}}
            </td>
          <td style="font-size: 11px; padding-top: 5px; text-transform: uppercase" colspan="2"><span style="font-weight: bold"> PARALELO:</span>
            &nbsp; {{$calificaciones[0]->asignacione->paralelo->nombre}}
            </td>
        </tr>
        <tr>
          {{-- {{$asignatura_nombre}} --}}
          <td style="font-size: 11px; padding-top: 5px; text-transform: uppercase" colspan="4"><span style="font-weight: bold">ASIGNATURA:</span>
              &nbsp; {{$calificaciones[0]->asignatura->nombre}}
            </td>
          <td style="font-size: 11px; padding-top: 5px" colspan="2"><span style="font-weight: bold">No de HORAS:</span>
            &nbsp; {{$calificaciones[0]->asignatura->hora}} HORAS
            </td>
        </tr>

        <tr>
          <td style="font-size: 11px; padding-top: 5px; text-transform: uppercase" colspan="4"> <span style="font-weight: bold">PROFESOR:</span>
              {{-- &nbsp; {{$calificaciones[0]->asignatura->docentes->pluck('nombre')->implode(', ')}} --}}
                    {{-- {{$calificaciones[0]->asignatura->docentes->pluck('apellido')->implode(', ')}} --}}
            </td>
          <td style="font-size: 11px; padding-top: 5px" colspan="2"> <span style="font-weight: bold">
            FECHA DE ENTREGA:</span>  &nbsp; {{$calificaciones[0]->date}}
          </td>
        </tr>

      </table>

      <table style="margin-top:30px" border="1" >
        <thead>
          <tr>
            <th rowspan="2" style=" padding:2px; text-align: center; font-size: 8px">No</th>
            <th rowspan="2" colspan= "10" style="padding:2px; text-align: center; font-size: 9px">NOMBRE DEL ALUMNO</th>
            <th rowspan="2" colspan="2" style="padding:2px; text-align: center; font-size: 7px">Docencia</th>
            <th rowspan="2" colspan="2" style="padding:2px; text-align: center; font-size: 7px">Experiment <br>Aplicación</th>
            <th rowspan="2" colspan="2" style="padding:2px; text-align: center; font-size: 7px">Trabajo  <br>Autónomo</th>
            <th rowspan="2" colspan="2" style="padding:2px; text-align: center; font-size: 7px">SUMA</th>
            <th rowspan="2" colspan="2" style="padding:2px; text-align: center; font-size: 7px">PROMEDIO <br>DECIMAL</th>
            <th rowspan="2" colspan="2" style="padding:2px; text-align: center; font-size: 7px">EXAMEN <br>PRINCIPAL</th>
            <th rowspan="2" colspan="2" style="padding:2px; text-align: center; font-size: 7px">PROMEDIO <br>FINAL</th>
            <th rowspan="2" colspan="2" style="padding:2px; text-align: center; font-size: 7px">PROMEDIO <br>LETRAS</th>
            <th colspan="2"  style=" padding:2px; text-align: center; font-size: 7px">ASISTENCIA</th>
            <th rowspan="2" colspan="3" style="padding:2px; text-align: center; font-size: 7px">OBSERVACIÓN</th>
          </tr>
        </thead>
        <tbody>
          <tr>
            <th  style=" padding:2px; text-align: center; font-size: 7px">No.</th>
            <th  style=" padding:2px; text-align: center; font-size: 7px">No %</th>
          </tr>

          @foreach ($calificaciones as $index => $calificacione)
          <tr>
              <td style=" text-align: center; margin-left: -5px; padding:0; font-size: 9px">{{$index+1}}</td>
              <td colspan= "10" style=" padding:2px; font-size: 9px">{{$calificacione->estudiante->nombre}} {{$calificacione->estudiante->apellido}} </td>
              <td colspan="2" style=" padding:2px; text-align: center; font-size: 8px">{{$calificacione->docencia}}</td>
              <td colspan="2" style=" padding:2px; text-align: center; font-size: 8px">{{$calificacione->experimento_aplicacion}}</td>
              <td colspan="2" style=" padding:2px; text-align: center; font-size: 8px">{{$calificacione->trabajo_autonomo}}</td>
              <td colspan="2" style=" padding:2px; text-align: center; font-size: 8px">{{$calificacione->suma}}</td>
              <td colspan="2" style=" padding:2px; text-align: center; font-size: 8px">{{$calificacione->promedio_decimal}}</td>
              <td colspan="2" style=" padding:2px; text-align: center; font-size: 8px">{{$calificacione->examen_principal}}</td>
              <td colspan="2" style=" padding:2px; text-align: center; font-size: 8px">{{$calificacione->promedio_final}}</td>
              <td colspan="2" style="padding:2px; text-align: center; font-size: 8px">{{$calificacione->promedio_letra}}</td>
              <td style=" padding:2px; text-align: center; font-size: 8px">{{$calificacione->numero_asistencia}}</td>
              <td style="padding:2px; text-align: center; font-size: 8px">{{$calificacione->porcentaje_asistencia}}</td>
              <td colspan="3" style=" padding:2px; text-align: center; font-size: 8px">{{$calificacione->observacion}}</td>
          </tr>
          @endforeach
        </tbody>
      </table>

      <table style="margin-top: 75px">
        <thead>
          <tr>
            <th style="text-align: left">
              {{-- {{$calificaciones[0]->asignatura->docentes->pluck('abreviatura')->implode(' ')}}
              {{$calificaciones[0]->asignatura->docentes->pluck('nombre')->implode(', ')}}
              {{$calificaciones[0]->asignatura->docentes->pluck('apellido')->implode(', ')}} </th> <br> --}}
          </tr>
        </thead>
        <tbody>
            <tr>
              {{-- <th style="text-align: left">{{$calificaciones[0]->asignatura->docentes->pluck('dni')->implode(', ')}} </th> --}}
            </tr>
        </tbody>
    </table>
  </div>
</body>
