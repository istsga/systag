<!DOCTYPE html>
<html lang="es">
<head>
    <meta http-equiv="Content-Type" content="text/html; charset=utf-8"/>
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    <title>Reporte de Horarios</title>
    <link href="{{public_path('css/reportestyle.css')}}" rel="stylesheet">
    <link href="{{public_path('css/horario.css')}}" rel="stylesheet">
</head>
<body>
  <header>
        <div class="logo">
            <img src="{{ public_path('assets/brand/logoSG.png') }}">
        </div>
        <div class="title">
            <h3>INSTITUTO SUPERIOR UNIVERSITARIO "SAN GABRIEL"</h3>
            <h4>Registro Institucional 224 SENESCYT</h4>
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
    <div class="informacion">
        <p style="font-size: 15px">HORARIO DE CLASES</p>
        <div class="informacion-1">
            {{-- <p>CARRERA: <span>{{$horarios[0]->asignacione->carreras->pluck('nombre')->implode(', ')}}</span></p> --}}
        </div>
        <div class="informacion-2">
            {{-- <p>PERIODO ACADÉMICO: <span>{{$horarios[0]->asignacione->periodacademicos->pluck('periodo')->implode(', ')}}</span></p> --}}
        </div>
    </div>
    <table style="margin-top: 20px;" border="1" >
        <thead>
          <tr>
            <th >No</th>
            <th   >PERIODO</th>
            <th  >HORA</th>
            <th colspan="5" >MATERIA</th>
            <th colspan="3" >DOCENTE</th>
            <th >HORAS</th>
            <th >FECHA <br>  INICIO</th>
            <th >FECHA <br> FINAL</th>
            <th >EXAMEN <br>FINAL</th>
            <th >EXAMEN <br>SUSPENSIÓN</th>
          </tr>
        </thead>
        <tbody>
          @foreach ($horarios as $index => $horario)
          <tr>
            <td >{{$index+1}}</td>
            <td > {{$horario->asignacione->periodo->nombre}}</td>
            <td >{{$horario->cantidad_hora}} </td>
            <td colspan="5">
              <div class="wrap-h">{{$horario->asignatura->nombre}} </div>
            </td>
            <td colspan="3">
              {{-- <div class="wrap-h1">{{$horario->asignatura->docentes->pluck('nombre')->implode(', ')}}</div> --}}
            </td>
            <td >{{$horario->asignatura->cantidad_hora}}</td>
            <td >{{$horario->fecha_inicio}}</td>
            <td >{{$horario->fecha_final}}</td>
            <td >{{$horario->fecha_examen}}</td>
            <td >{{$horario->fecha_suspension}} </td>
          </tr>
          @endforeach
        </tbody>
      </table>
</body>
</html>
