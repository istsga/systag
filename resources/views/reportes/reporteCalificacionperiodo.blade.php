<!DOCTYPE html>
<html lang="es">
<head>
    <meta http-equiv="Content-Type" content="text/html; charset=utf-8"/>
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    <title>Reporte de consolidado por periodo</title>
    <link href="{{public_path('css/reportestyle.css')}}" rel="stylesheet">
    <link href="{{public_path('css/calificacionperiodo.css')}}" rel="stylesheet">
</head>
<body>
    <header>
      <div class="logo">
          <img src="{{ public_path('assets/brand/logo3.png') }}">
      </div>
      <div class="title">
          <h3>INSTITUTO SUPERIOR TECNOLÓGICO <br> "SAN GABRIEL"</h3>
          <p> Carrera de {{$calificaciones[0]->asignacione->carreras->pluck('nombre')->implode(', ')}}</p>
      </div>
      <div class="logo-carrera">
        <img src="storage/{{$calificaciones[0]->asignacione->carreras->pluck('logo')->implode(', ')}}" alt="Logo Carrera">
      </div>
  </header>

  <footer>
    <table>
        <tr>
          <td>
              <p class="izq">
                Dirección: Loja entre Villarroel y Olmedo
              </p>
              <p class="izq-1">
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

  <div class="cp-nombre">
    <p>CALIFICACIÓN CONSOLIDADO POR PERIODO</p>
    <p>Periodo Académico : {{$calificaciones[0]->asignacione->periodacademicos->pluck('periodo')->implode(', ')}}</p>
  </div>

  <div class="informacion">
      <div class="informacion-1">
        <p>CARRERA: <span style="padding-left: 23px">
            {{$calificaciones[0]->asignacione->carreras->pluck('nombre')->implode(', ')}}</span></p>
        <p>PERIODO: <span>{{$calificaciones[0]->asignacione->periodo->nombre}}</span></p>
      </div>
      <div class="informacion-2">
        <p>NOMBRES: <span style="padding-left: 80px">
            {{$calificaciones[0]->estudiante->nombre}} {{$calificaciones[0]->estudiante->apellido}}</span></p>
        <p>CÉDULA | PASAPORTE: <span style="padding-left: 10px">{{$calificaciones[0]->estudiante->dni}}</span></p>
      </div>
  </div>

  <table style="margin-top: 20px" border="1" >
    <thead>
      <tr>
        <th  style=" padding:2px; text-align: center; font-size: 10px" >No</th>
        <th colspan="6" style="padding:2px; text-align: center; font-size: 10px" >Asignatura</th>
        <th colspan="2" style="padding:2px; text-align: center; font-size: 10px" >Docencia</th>
        <th colspan="2" style="padding:2px; text-align: center; font-size: 10px" >Experimento <br> Aplicación</th>
        <th colspan="2" style="padding:2px; text-align: center; font-size: 10px" >Trabajo <br>Autónomo</th>
        <th colspan="2" style="padding:2px; text-align: center; font-size: 10px" >Suma</th>
        <th colspan="2" style="padding:2px; text-align: center; font-size: 10px" >Promedio <br>Decimal</th>
        <th colspan="2" style="padding:2px; text-align: center; font-size: 10px" >Examen <br>Principal</th>
        <th colspan="2" style="padding:2px; text-align: center; font-size: 10px" >Promedio <br>Final</th>
        <th colspan="2" style="padding:2px; text-align: center; font-size: 10px" >Suspensión</th>
        <th colspan="2" style="padding:2px; text-align: center; font-size: 10px" >Promedio <br>en Letras</th>
        <th colspan="2" style="padding:2px; text-align: center; font-size: 10px" >Asistencia</th>
        <th colspan="2"  style="padding:2px; text-align: center; font-size: 10px" >Observación</th>
      </tr>
    </thead>
    <tbody>

        @foreach ($calificaciones as $index => $calificacione)
        <tr>
            <td style="text-align: center">{{$index+1}}</td>
            <td colspan="6" >
               <div class="wrap-cp">{{$calificacione->asignatura->nombre}}</div>
            </td>
            <td colspan="2" style=" text-align: center">{{$calificacione->docencia}}</td>
            <td colspan="2" style=" text-align: center">{{$calificacione->experimento_aplicacion}}</td>
            <td colspan="2" style=" text-align: center">{{$calificacione->trabajo_autonomo}}</td>
            <td colspan="2" style=" text-align: center" >{{$calificacione->suma}}</td>
            <td colspan="2" style=" text-align: center">{{$calificacione->promedio_decimal}}</td>
            <td colspan="2" style=" text-align: center">{{$calificacione->examen_principal}}</td>
            <td colspan="2" style=" text-align: center">0</td>
            <td colspan="2" style=" text-align: center">{{$calificacione->promedio_final}}</td>
            <td colspan="2" style=" text-align: center">{{$calificacione->promedio_letra}}</td>
            <td colspan="2" style=" text-align: center">{{$calificacione->porcentaje_asistencia}}</td>
            <td colspan="2" style=" text-align: center">{{$calificacione->observacion}}</td>
        </tr>
        @endforeach
    </tbody>
  </table>
  <div class="firma">
      <p>Ing. Olga Villagrán</p>
      <p style="margin-top: -5px">SECRETARIA GENERAL</p>
  </div>
</body>
