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
          <img src="{{ public_path('assets/brand/logoSG.png') }}">
      </div>
      <div class="title">
          <h3>INSTITUTO SUPERIOR UNIVERSITARIO <br> "SAN GABRIEL"</h3>
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
    <p style="font-size:14px">Periodo Académico : {{$calificaciones[0]->asignacione->periodacademicos->pluck('periodo')->implode(', ')}}</p>
  </div>

  <div class="informacion">
      <div class="informacion-1">
        <p>CARRERA: <span style="padding-left: 23px">
            {{$calificaciones[0]->asignacione->carreras->pluck('nombre')->implode(', ')}}</span></p>
        <p>ESTUDIANTE: <span style="padding-left: 7px">
            {{$calificaciones[0]->estudiante->nombre}} {{$calificaciones[0]->estudiante->apellido}}</span></p>
      </div>
      <div class="informacion-2">
        <p>PERIODO: <span style="padding-left: 15px">{{$calificaciones[0]->asignacione->periodo->nombre}}</span></p>
        <p>C.I.: <span style="padding-left: 52px">{{$calificaciones[0]->estudiante->dni}}</span></p>
      </div>
  </div>

  <table style="margin-top: 10px" border="1" >
    <thead>
      <tr>
        <th>No</th>
        <th>Asignatura</th>
        <th>Docencia</th>
        <th>Experimento <br> Aplicación</th>
        <th>Trabajo <br>Autónomo</th>
        <th>Suma</th>
        <th>Promedio <br>Decimal</th>
        <th>Examen <br>Principal</th>
        <th>Promedio <br>Número</th>
        <th>Promedio <br>Letras</th>
        <th>Asistencia <br> (%)</th>
        <th>Observación</th>
        <th>Suspensión</th>
        <th>Observación</th>
      </tr>
    </thead>
    <tbody>

        @foreach ($calificaciones as $index => $calificacione)
        <tr>
            <td>{{$index+1}}</td>
            <td style="width: 285px">
               <div class="wrap-cp">{{$calificacione->asignatura->nombre}}</div>
            </td>
            <td>{{$calificacione->docencia}}</td>
            <td>{{$calificacione->experimento_aplicacion}}</td>
            <td>{{$calificacione->trabajo_autonomo}}</td>
            <td>{{$calificacione->suma}}</td>
            <td>{{$calificacione->promedio_decimal}}</td>
            <td>{{$calificacione->examen_principal}}</td>
            <td>{{$calificacione->promedio_final}}</td>
            <td>{{$calificacione->promedio_letra}}</td>
            <td>{{$calificacione->porcentaje_asistencia}}</td>
            <td>{{$calificacione->observacion}}</td>
            <td>{{$calificacione->suspensoNota}}</td>
            <td>{{$calificacione->observacionSuspenso}}</td>
        </tr>
        @endforeach
    </tbody>
  </table>
  <div class="firma">
      <p>Ing. Olga Villagrán C. <br>
      <span>SECRETARIA GENERAL </span> </p>
  </div>
</body>
