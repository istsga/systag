<!DOCTYPE html>
<html lang="es">
<head>
    <meta http-equiv="Content-Type" content="text/html; charset=utf-8"/>
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    <title>Reporte de Suspensión</title>
    <link href="{{public_path('css/reportestyle.css')}}" rel="stylesheet">
    <link href="{{public_path('css/suspenso.css')}}" rel="stylesheet">
</head>
<body>
    <header>
          <div class="logo">
              <img src="{{ public_path('assets/brand/logoSG.png') }}">
          </div>
          <div class="title">
            <h3>Instituto Superior Tecnológico</h3>
            <h3 style="margin-top:-25px"> SAN GABRIEL </h3>
            <p >Condición</p>
            <p>UNIVERSITARIO</p>
          </div>
          <div class="logo-carrera">
            <img src="storage/{{$suspensos[0]->asignacione->carreras->pluck('logo')->implode(', ')}}" alt="Logo Carrera">
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
  </footer>
    <div class="s-nombre">
        <p>ACTA DE SUSPENSIÓN</p>
        <p>Periodo Académico: {{$suspensos[0]->asignacione->periodacademicos->pluck('periodo')->implode(', ')}}</p>
    </div>
    <div class="informacion">
        <div class="informacion-1">
            <p>CARRERA: <span style="padding-left: 28px">
                {{$suspensos[0]->asignacione->carreras->pluck('nombre')->implode(', ')}}</span></p>
            <p>PERIODO: <span> {{$suspensos[0]->asignacione->periodo->nombre}}</span></p>
            <p>SECCIÓN: <span> {{$suspensos[0]->asignacione->seccione->nombre}}</span></p>
        </div>
        <div class="informacion-2">
            <p>PARALELO: <span style="padding-left: 60px">{{$suspensos[0]->asignacione->paralelo->nombre}}</span></p>
            <p>No de HORAS: <span style="padding-left: 45px">{{$suspensos[0]->asignatura->cantidad_hora}}</span></p>
            <p>FECHA DE ENTREGA: <span style="padding-left: 5px">{{now()->format('d-m-Y')}}</span></p>
        </div>
        <p style="margin-top: -18px">ASIGNATURA: <span style="padding-left: 10px">
            {{$suspensos[0]->asignatura->nombre}}</span></p>
        <p>PROFESOR: <span style="padding-left: 25px"> {{$docente->abreviatura}} {{$docente->nombre}} {{$docente->apellido}}</span></p>
    </div>
    <table  border="1">
        <thead >
            <tr>
                <th style=" text-align: center;  font-size: 8px">No.</th>
                <th  colspan="6" style="text-align: center; font-size: 9px">NOMBRE DEL ALUMNO.</th>
                <th  colspan="2" style=" text-align: center ; font-size: 8px">NOTA FINAL</th>
                <th colspan="2" style=" text-align: center; font-size: 8px">EXAMEN DE <br> SUSPENSIÓN</th>
                <th  style=" text-align: center; font-size: 8px">SUMA</th>
                <th  colspan="2" style="text-align: center; font-size: 8px">PROMEDIO <br> FINAL</th>
                <th  colspan="2" style="text-align: center; font-size: 8px">PROMEDIO  <br> EN LETRAS</th>
                <th  colspan="2" style="text-align: center; font-size: 8px">OBSERVACIÓN</th>
            </tr>
        </thead>
        <tbody>
            @foreach ($suspensos as $index => $suspenso)
              <tr>
                <td style=" font-size: 9px; text-align: center"> {{$index+1}} </td>
                <td colspan="6"  style="font-size: 9px"> {{$suspenso->estudiante->nombre}} {{$suspenso->estudiante->apellido}} </td>
                <td colspan="2" style="font-size: 9px; text-align: center"> {{$suspenso->promedio_final}} </td>
                <td colspan="2" style="font-size: 9px; text-align: center"> {{$suspenso->examen_suspenso}} </td>
                <td style="font-size: 8px; text-align: center"> {{$suspenso->suma}}  </td>
                <td colspan="2" style="font-size: 9px; text-align: center"> {{$suspenso->promedio_numero}}  </td>
                <td colspan="2" style="font-size: 9px; text-align: center"> {{$suspenso->promedio_letra}}  </td>
                <td colspan="2" style="font-size: 9px; text-align: center"> {{$suspenso->observacion}} </td>
              </tr>
            @endforeach
        </tbody>
    </table>
    <table style="page-break-inside: auto; text-transform: uppercase; font-size: 12px; ">
        <tr>
            <th style=" text-align: left; padding-top:65px">{{$docente->abreviatura}} {{$docente->nombre}} {{$docente->apellido}} <br>
                C.I {{$docente->dni}}  <br> PROFESOR</th>
        </tr>
    </table>
</body>
</html>
