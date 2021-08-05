<!DOCTYPE html>
<html lang="es">
<head>
    <meta http-equiv="Content-Type" content="text/html; charset=utf-8"/>
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    <title>Reporte de Horarios</title>
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
           <p style="text-align: center" ><strong>HORARIO DE CLASES</strong></p>
           <p style="text-align:center; margin-top: -10px"> <strong> Especialidad: {{$horarios[0]->asignacione->carreras->pluck('nombre')->implode(', ')}}</strong> </p>

          <table style="margin-top: 20px;">
            <tr>
                <th colspan="6"></th>
             </tr>
             <tr>
               <td style="font-size: 11px; text-transform: uppercase" colspan="4"> <span style="font-weight: bold"> PERIODO ACADÉMICO: </span>
                 &nbsp; {{$horarios[0]->asignacione->periodacademicos->pluck('periodo')->implode(', ')}}
                </td>
             </tr>
          </table>

          <table style="margin-top: 20px;" border="1" >
            <thead>

              <tr>
                <th style=" padding:2px; text-align: center; font-size: 9px">No</th>
                <th   style="padding:2px; text-align: center; font-size: 9px">PERIODO</th>
                <th  style="padding:2px; text-align: center; font-size: 9px">HORA</th>
                <th colspan="5" style="padding:2px; text-align: center; font-size: 9px">MATERIA</th>
                <th colspan="3" style="padding:2px; text-align: center; font-size: 9px">DOCENTE</th>
                <th  style="padding:2px; text-align: center; font-size: 9px">HORAS</th>
                <th style="padding:2px; text-align: center; font-size: 9px">FECHA <br>  INICIO</th>
                <th  style="padding:2px; text-align: center; font-size: 9px">FECHA <br> FINAL</th>
                <th  style="padding:2px; text-align: center; font-size: 9px">EXAMEN <br>FINAL</th>
                <th  style="padding:2px; text-align: center; font-size: 9px">EXAMEN <br>SUSPENSIÓN</th>

              </tr>
            </thead>
            <tbody>

              @foreach ($horarios as $index => $horario)
              <tr>
                <td style=" text-align: center; margin-left: -5px; padding:0; font-size: 10px">{{$index+1}}</td>
                <td  style=" text-align: center; padding:2px; font-size: 10px"> {{$horario->asignacione->periodo->nombre}}</td>
                <td  style=" padding:2px; text-align: center; font-size: 10px">{{$horario->cantidad_hora}} </td>
                <td colspan="5" style=" padding:2px; font-size: 10px">
                  <div class="wrap-h">{{$horario->asignatura->nombre}} </div>
                </td>
                <td colspan="3" style=" padding:2px; font-size: 10px">
                  {{-- <div class="wrap-h1">{{$horario->asignatura->docentes->pluck('nombre')->implode(', ')}}</div> --}}
                </td>
                <td  style=" padding:2px; text-align: center; font-size: 10px">{{$horario->asignatura->hora}}</td>
                <td  style=" padding:2px; text-align: center; font-size: 10px">{{$horario->fecha_inicio}}</td>
                <td style=" padding:2px; text-align: center; font-size: 10px">{{$horario->fecha_final}}</td>
                <td  style=" padding:2px; text-align: center; font-size: 10px">{{$horario->fecha_examen}}</td>
                <td  style="padding:2px; text-align: center; font-size: 10px">{{$horario->fecha_suspension}} </td>
              </tr>
              @endforeach
            </tbody>
          </table>
      </div>

</body>
