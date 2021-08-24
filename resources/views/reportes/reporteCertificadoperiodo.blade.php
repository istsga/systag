<!DOCTYPE html>
<html lang="es">
<head>
    <meta http-equiv="Content-Type" content="text/html; charset=utf-8"/>
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    <title>Certificado por periodo</title>
    <link href="{{public_path('css/reportestyle.css')}}" rel="stylesheet">
    <link href="{{public_path('css/certificadoperiodo.css')}}" rel="stylesheet">
</head>
<body>
        <header>
            <div class="logo">
                <img src="{{ public_path('assets/brand/logo3.png') }}">
            </div>
            <div class="title">
                <h3>INSTITUTO SUPERIOR TECNOLÓGICO "SAN GABRIEL"</h3>
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
      <div class="container">
          <div class="c-nombre">
            <p>INFORME DE APROBACIÓN DE PERIODO</p>
            <p>PERIODO ACADÉMICO MARZO 2018 - OCTUBRE 2020</p>
          </div>

          <div class="info-estudiante">
            La suscrita secretaria del Instituto Superior Tecnológico "San Gabriel" certifica que,
            <span >{{$estudiante->nombre}} {{$estudiante->apellido}}</span>  portador de la C.I. No.
            <span >{{$estudiante->dni}}</span>, obtuvo las siguientes
            calificaciones en la carrera de <span> {{$matricula->asignacione->carreras->pluck('nombre')->implode(', ')}}. </span>
         </div>

         <div class="p-estudiante">
             <p>PERIODO: <span>{{$matricula->asignacione->periodo->nombre}}</span></p>
             <p>SECCIÓN: <span>{{$matricula->asignacione->seccione->nombre}}</span></p>
             <p>PARALELO: <span style="margin-left: 20px">{{$matricula->asignacione->paralelo->nombre}}</span></p>
         </div>

         <table style="margin-top: 20px" border="1">
            <thead>
                <tr>
                    <th rowspan="2" colspan="9">ASIGNATURAS</th>
                    <th colspan="4">PROMEDIO</th>
                    <th rowspan="2"  colspan="3">EQUIVALENCIA</th>
                </tr>
            </thead>
            <tbody>
                <tr>
                    <th  colspan="2">NUMEROS</th>
                    <th  colspan="2">LETRAS</th>
                </tr>
                @foreach ($asignaturas as $asignatura)

                    <tr>
                        <td colspan="9" >
                        <div class="wrap-c">{{$asignatura->nombre}}</div>
                        </td>
                        <td  colspan="2">{{$asignatura->promedio_final}}</td>
                        <td  colspan="2">{{$asignatura->promedio_letra}}</td>
                        <td  colspan="3">{{$asignatura->observacion}}</td>
                    </tr>
                @endforeach
            </tbody>
        </table>

        <div class="promedio">
            <p>PROMEDIO DE MATERIAS APROBADAS: {{$promedio}} /10</p>
        </div>

        <div class="fecha">
            <p>Fecha: <span>Riobamba, {{now()->format('d-m-Y')}}</span></p>
        </div>

        <div class="firma-1">
            <p>Atentamente,</p>
        </div>

        <div class="firma">
            <p>Ing. Olga Villagran C.<br>
            <span>SECRETARIA GENERAL</span></p>
        </div>
      </div>
    </div>
</body>
