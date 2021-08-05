<!DOCTYPE html>
<html lang="es">
<head>
    <meta http-equiv="Content-Type" content="text/html; charset=utf-8"/>
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    <title>Reporte de Suspensión</title>
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
           <p style="text-align:center"><strong>ACTA DE SUSPENSIÓN</strong></p>
          <p style="text-align:center; margin-top: -10px"> <strong> Periodo Académico: {{$suspensos[0]->asignacione->periodacademicos->pluck('periodo')->implode(', ')}} </strong> </p>

        <table style="margin-top: 20px">
          <tr>
              <th colspan="6"></th>
           </tr>
           <tr>
             <td style="font-size: 11px; text-transform: uppercase" colspan="4"> <span style="font-weight: bold"> ESPECIALIDAD: </span>
               &nbsp; {{$suspensos[0]->asignacione->carreras->pluck('nombre')->implode(', ')}}
              </td>
             <td style="font-size: 11px; text-transform: uppercase" colspan="2"><span style="font-weight: bold">PERIODO: </span>
                &nbsp; {{$suspensos[0]->asignacione->periodos->pluck('nombre')->implode(', ')}}
              </td>
           </tr>
           <tr>
             <td style="font-size: 11px; padding-top: 5px; text-transform: uppercase" colspan="4"> <span style="font-weight: bold">SECCIÓN:</span>
                &nbsp; {{$suspensos[0]->asignacione->secciones->pluck('nombre')->implode(', ')}}
              </td>
             <td style="font-size: 11px; padding-top: 5px; text-transform: uppercase" colspan="2"><span style="font-weight: bold"> PARALELO:</span>
              &nbsp; {{$suspensos[0]->asignacione->paralelos->pluck('nombre')->implode(', ')}}
            </td>
           </tr>
           <tr>
             <td style="font-size: 11px; padding-top: 5px; text-transform: uppercase" colspan="4"><span style="font-weight: bold">ASIGNATURA:</span>
                &nbsp; {{$suspensos[0]->asignatura->nombre}}
              </td>
             <td style="font-size: 11px; padding-top: 5px; text-transform: uppercase" colspan="2"><span style="font-weight: bold">No de HORAS:</span>
                &nbsp; {{$suspensos[0]->asignatura->hora}} HORAS
              </td>
           </tr>

           <tr>
             <td style="font-size: 11px; padding-top: 5px; text-transform: uppercase" colspan="4"> <span style="font-weight: bold">PROFESOR:</span>
              &nbsp; {{$suspensos[0]->asignatura->docentes->pluck('nombre')->implode(', ')}}
                     {{$suspensos[0]->asignatura->docentes->pluck('apellido')->implode(', ')}}
            </td>
             <td style="font-size: 11px; padding-top: 5px; text-transform: uppercase" colspan="2"> <span style="font-weight: bold">FECHA DE ENTREGA:</span>
                &nbsp; &nbsp; {{$suspensos[0]->date}}
              </td>
           </tr>

        </table>

        <table style="margin-top: 20px" border="1">
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

        <table style="margin-top: 75px">
            <thead>
              <tr>
                  <th style="text-align: left;">FIRMA </th>
              </tr>
            </thead>
            <tbody>
                <tr>
                    <th style="text-align: left;"> DNI: {{$suspensos[0]->asignatura->docentes->pluck('dni')->implode(', ')}} </th>
                </tr>
            </tbody>
        </table>
      </div>

</body>
