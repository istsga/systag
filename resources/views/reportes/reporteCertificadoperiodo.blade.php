<!DOCTYPE html>
<html lang="es">
<head>
    <meta http-equiv="Content-Type" content="text/html; charset=utf-8"/>
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    <title>Certificado</title>
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
        <div style="text-align: center; font-weight: bold;" class="text-1">
            <p>INFORME DE APROBACIÓN DE PERIODO</p>
        </div>

        <div style="text-align: center; font-weight: bold;" class="text-1">
            <p>PERIODO ACADÉMICO MARZO 2018 - OCTUBRE 2020</p>
        </div>

        <div style="margin-bottom: 20px" class="text-1">
            La suscrita secretaria del Instituto Superior Tecnológico "San Gabriel" certifica que,
           <span style="font-weight: bold">{{$estudiante->nombre}} {{$estudiante->apellido}}</span>  portador de la C.I. No.
           <span style="font-weight: bold">{{$estudiante->dni}}</span>, obtuvo las siguientes
            calificaciones en la carrera de {{$matricula->asignacione->carreras->pluck('nombre')->implode(', ')}}

        </div>

          <table>
              <thead>
                  <tr>
                      <th style="text-align: left">PERIODO:</th>
                      <td colspan="3">{{$matricula->asignacione->periodo->nombre}}</td>
                  </tr>
                  <tr>
                      <th style="text-align: left">SECCIÓN:</th>
                      <td colspan="3">{{$matricula->asignacione->seccione->nombre}}</td>
                  </tr>
                  <tr>
                      <th style="text-align: left">PARALELO</th>
                      <td colspan="3">{{$matricula->asignacione->paralelo->nombre}}</td>
                  </tr>

              </thead>
          </table>

            <table style="margin-top: 20px" border="1">
                <thead>
                    <tr>
                        <th style=" text-align: center; font-size: 11px" rowspan="2" colspan="9">ASIGNATURA</th>
                        <th style="text-align: center; font-size: 11px" colspan="4">PROMEDIO</th>
                        <th style="text-align: center; font-size: 11px" rowspan="2"  colspan="3">EQUIVALENCIA</th>
                    </tr>
                </thead>
                <tbody>
                    <tr>
                        <th style="text-align: center; font-size: 11px" colspan="2">NUMEROS</th>
                        <th  style="text-align: center; font-size: 11px" colspan="2">LETRAS</th>
                    </tr>
                    @foreach ($asignaturas as $asignatura)

                        <tr>
                            <td style="font-size: 11px" colspan="9" >
                            <div class="wrap-p">{{$asignatura->nombre}}</div>
                            </td>
                            <td style="text-align: center; font-size: 11px" colspan="2">{{$asignatura->promedio_final}}</td>
                            <td style="text-align: center; font-size: 11px" colspan="2">{{$asignatura->promedio_letra}}</td>
                            <td style="text-align: center; font-size: 11px" colspan="3">{{$asignatura->observacion}}</td>
                        </tr>
                    @endforeach
                </tbody>
            </table>

            <table style="margin-top:20px">
                <thead>
                    <tr>
                        <th style="text-align: left">PROMEDIO DE MATERIAS APROBADAS: {{$promedio}} /10</th>
                    </tr>
                </thead>
            </table>

            <div class="text-2">
                Fecha: Riobamba, 28 de Marzo de 2019
            </div>
            <div class="text-1">
                 <span>Atentamente,</span>
            </div>

            <div style="margin-top: 75px" class="text-3">
                Ing. Olga Villagran C. <br>
                <span style="font-weight: bold">SECRETARIA GENERAL</span>
            </div>
      </div>
    </div>

</body>
