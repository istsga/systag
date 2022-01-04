<!DOCTYPE html>
<html lang="es">
<head>
    <meta http-equiv="Content-Type" content="text/html; charset=utf-8"/>
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    <title>Acta de Calificaciones</title>
    <link href="{{public_path('css/reportestyle.css')}}" rel="stylesheet">
    <link href="{{public_path('css/calificacion.css')}}" rel="stylesheet">
</head>
<body>
  <header>
      <div class="logo">
        <img src="{{ public_path('assets/brand/logo3.png') }}">
      </div>
      <div class="title">
        <h3>INSTITUTO SUPERIOR TECNOLÓGICO <br> "SAN GABRIEL"</h3>
        <p>Carrera de {{$calificaciones[0]->asignacione->carreras->pluck('nombre')->implode(', ')}}</p>
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

 <div class="c-nombre">
    <p><strong>ACTA DE CALIFICACIONES</strong></p>
    <p> <strong> Periodo Académico: {{$calificaciones[0]->asignacione->periodacademicos->pluck('periodo')->implode(', ')}} </strong> </p>
 </div>
    <div class="informacion">
        <div class="informacion-1">
            <p>CARRERA: <span>
                {{$calificaciones[0]->asignacione->carreras->pluck('nombre')->implode(', ')}} </span></p>
            <p>SECCIÓN:<span style="padding-left: 45px"> {{$calificaciones[0]->asignacione->seccione->nombre}} </span></p>
            <p>No de HORAS: <span style="padding-left: 14px">{{$calificaciones[0]->asignatura->cantidad_hora}}  </span></p>
        </div>
        <div class="informacion-2">
            <p>PERIODO:<span style="padding-left: 73px"> {{$calificaciones[0]->asignacione->periodo->nombre}} </span></p>
            <p>PARALELO: <span style="padding-left: 63px">{{$calificaciones[0]->asignacione->paralelo->nombre}} </span></p>
            <p>FECHA DE ENTREGA: <span style="padding-left: 2px"> {{now()->format('d-m-Y')}} </span></p>
        </div>
        <p style="margin-top: -18px">ASIGNATURA: <span style="padding-left: 15px">
            {{$calificaciones[0]->asignatura->nombre}}</span></p>
        <p>PROFESOR: <span style="padding-left: 28px">
            {{$docente->nombre}} {{$docente->apellido}} </span></p>

    </div>

    <table border = "1">
        <thead>
            <tr>
                <th style=" padding:2px; text-align: center; font-size: 8px">No</th>
                <th  colspan= "10" style="padding:2px; text-align: center; font-size: 9px">NOMBRE DEL ALUMNO</th>
                <th  colspan="2" style="padding:2px; text-align: center; font-size: 7px">Docencia</th>
                <th  colspan="2" style="padding:2px; text-align: center; font-size: 7px">Experiment <br>Aplicación</th>
                <th  colspan="2" style="padding:2px; text-align: center; font-size: 7px">Trabajo  <br>Autónomo</th>
                <th  colspan="2" style="padding:2px; text-align: center; font-size: 7px">SUMA</th>
                <th  colspan="2" style="padding:2px; text-align: center; font-size: 7px">PROMEDIO <br>DECIMAL</th>
                <th  colspan="2" style="padding:2px; text-align: center; font-size: 7px">EXAMEN <br>PRINCIPAL</th>
                <th  colspan="2" style="padding:2px; text-align: center; font-size: 7px">PROMEDIO <br>FINAL</th>
                <th  colspan="2" style="padding:2px; text-align: center; font-size: 7px">PROMEDIO <br>LETRAS</th>
                <th  colspan="2" style="padding:2px; text-align: center; font-size: 7px">ASISTENCIA <br>No | %</th>
                <th  colspan="3" style="padding:2px; text-align: center; font-size: 7px">OBSERVACIÓN</th>
            </tr>
        </thead>
        <tbody>
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
                    <td colspan="2" style=" padding:2px; text-align: center; font-size: 8px">{{$calificacione->numero_asistencia}} | {{$calificacione->porcentaje_asistencia}}</td>
                    <td colspan="3" style=" padding:2px; text-align: center; font-size: 8px">{{$calificacione->observacion}}</td>
                </tr>
            @endforeach
        </tbody>
    </table>

    <table style="page-break-inside: auto; text-transform: uppercase; font-size: 12px; ">
        <tr>
            <th style=" text-align: left; padding-top:65px">{{$docente->abreviatura}} {{$docente->nombre}} {{$docente->apellido}} <br>
                    C.I {{$docente->dni}}  <br> PROFESOR
            </th>
        </tr>
    </table>

</body>
