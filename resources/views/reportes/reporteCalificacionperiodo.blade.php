<!DOCTYPE html>
<html lang="es">
<head>
    <meta http-equiv="Content-Type" content="text/html; charset=utf-8"/>
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    <title>Reporte de consolidado por periodo</title>
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
           <p style="text-align: center" ><strong>CALIFICACIÓN CONSOLIDADO POR PERIODO</strong></p>

           <p style="text-align: center" ><strong>Periodo Académico : {{$calificaciones[0]->asignacione->periodacademicos->pluck('periodo')->implode(', ')}} </strong></p>


          <table style="margin-top: 20px;">
            <tr>
                <th colspan="6"></th>
             </tr>
             <tr>
               <td style="font-size: 11px; text-transform: uppercase" colspan="4"> <span style="font-weight: bold"> NOMBRES: </span>
                {{$calificaciones[0]->estudiante->nombre}} {{$calificaciones[0]->estudiante->apellido}}
                </td>

               <td style="font-size: 11px; text-transform: uppercase" colspan="4"> <span style="font-weight: bold"> DNI: </span>
                {{$calificaciones[0]->estudiante->dni}}
                </td>
             </tr>
             <tr>
                 <td style="font-size: 11px; text-transform: uppercase" colspan="4"> <span style="font-weight: bold"> ESPECIALIDAD: </span>
                  {{$calificaciones[0]->asignacione->carreras->pluck('nombre')->implode(', ')}}
                 </td>

                 <td style="font-size: 11px; text-transform: uppercase" colspan="4"> <span style="font-weight: bold"> PERIODO: </span>
                  {{$calificaciones[0]->asignacione->periodo->nombre}}
                 </td>
             </tr>
          </table>

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
                    <td style="font-size: 11px; text-align: center">{{$index+1}}</td>
                    <td colspan="6" style="font-size: 11px">
                       <div class="wrap-c">{{$calificacione->asignatura->nombre}}</div>
                    </td>
                    <td colspan="2" style=" padding:2px; font-size: 11px; text-align: center">{{$calificacione->docencia}}</td>
                    <td colspan="2" style=" padding:2px; font-size: 11px; text-align: center">{{$calificacione->experimento_aplicacion}}</td>
                    <td colspan="2" style=" padding:2px; font-size: 11px; text-align: center">{{$calificacione->trabajo_autonomo}}</td>
                    <td colspan="2" style=" padding:2px; font-size: 11px; text-align: center" >{{$calificacione->suma}}</td>
                    <td colspan="2" style=" padding:2px; font-size: 11px; text-align: center">{{$calificacione->promedio_decimal}}</td>
                    <td colspan="2" style=" padding:2px; font-size: 11px; text-align: center">{{$calificacione->examen_principal}}</td>
                    <td colspan="2" style=" padding:2px; font-size: 11px; text-align: center">0</td>
                    <td colspan="2" style=" padding:2px; font-size: 11px; text-align: center">{{$calificacione->promedio_final}}</td>
                    <td colspan="2" style=" padding:2px; font-size: 11px; text-align: center">{{$calificacione->promedio_letra}}</td>
                    <td colspan="2" style=" padding:2px; font-size: 11px; text-align: center">{{$calificacione->porcentaje_asistencia}}</td>
                    <td colspan="2" style=" padding:2px; font-size: 11px; text-align: center">{{$calificacione->observacion}}</td>
                </tr>
                @endforeach
            </tbody>
          </table>
      </div>
</body>
