<!DOCTYPE html>
<html lang="es">
<head>
  <meta charset="UTF-8">
  <meta name="viewport" content="width=device-width, initial-scale=1.0">
  <meta http-equiv="X-UA-Compatible" content="ie=edge">
  <title>Record Académico</title>
  <link href="{{public_path('css/stylepdf.css')}}" rel="stylesheet">
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

    <div id="content">
      <div style="text-align: center; font-weight: bold; margin-top:-25px" class="text-1">
        <p>RECORD ACÁDEMICO</p>
      </div>

      <table>
        <thead>
          <tr>
            <th style="text-align: left; font-size: 12px">Nombre: <span style="font-weight: normal">{{$estudiante->nombre}} {{$estudiante->apellido}}</span></th>
            <th style="text-align: right; font-size: 12px">Especialidad: <span style="font-weight: normal">DESARROLLO DE SOFTWARE Y CONTABLE</span> </th>
          </tr>
        </thead>
      </table>


     <div class="record">
       <div class="record-items">
        <b style="text-align: center">PRIMER PERIODO</b>
        <p>Periodo Académico: OCTUBRE MARZO 2020 ABRIL 2021</p>
          <table style="width: 300px" border="1">
            <thead>
              <tr>
                <th style="padding:2px; text-align: center; font-size: 9px">No</th>
                <th style="padding:2px; text-align: center; font-size: 9px" colspan="6">Materias</th>
                <th style="padding:2px; text-align: center; font-size: 9px">Nota <br> Final</th>
                <th style="padding:2px; text-align: center; font-size: 9px">A</th>
                <th style="padding:2px; text-align: center; font-size: 9px">R</th>
                <th style="padding:2px; text-align: center; font-size: 9px">C</th>
                <th style="padding:2px; text-align: center; font-size: 9px">E</th>
              </tr>
            </thead>
            <tbody>
            @foreach ($asignaturas as $index=> $asignatura)
              @if($asignatura->periodo_id==1)
              <tr>
                <td style="padding:2px; text-align: center; font-size: 8px" >{{$index+1}}</td>
                <td style="padding:2px; text-align: justify; font-size: 8px" colspan="6">
                  <div class="wrap-3"> {{$asignatura->nombre}} </div>
                </td>
                <td style="padding:2px; text-align: center; font-size: 9px">8</td>
                <td style="padding:2px; text-align: center; font-size: 9px">X</td>
                <td style="padding:2px; text-align: center; font-size: 9px">X</td>
                <td style="padding:2px; text-align: center; font-size: 9px">X</td>
                <td style="padding:2px; text-align: center; font-size: 9px">X</td>
              </tr>
              @endif
            @endforeach
            </tbody>
          </table>
       </div>
       <div class="record-items">
        <b style="text-align: center">PRIMER PERIODO</b>
        <p>Periodo Académico: OCTUBRE MARZO 2020 ABRIL 2021</p>
          <table style="width: 300px" border="1">
            <thead>
              <tr>
                <th style="padding:2px; text-align: center; font-size: 9px">No</th>
                <th style="padding:2px; text-align: center; font-size: 9px" colspan="6">Materias</th>
                <th style="padding:2px; text-align: center; font-size: 9px">Nota <br> Final</th>
                <th style="padding:2px; text-align: center; font-size: 9px">A</th>
                <th style="padding:2px; text-align: center; font-size: 9px">R</th>
                <th style="padding:2px; text-align: center; font-size: 9px">C</th>
                <th style="padding:2px; text-align: center; font-size: 9px">E</th>
              </tr>
            </thead>
            <tbody>
            @foreach ($asignaturas as $index=> $asignatura)
              @if($asignatura->periodo_id==1)
              <tr>
                <td style="padding:2px; text-align: center; font-size: 8px" >{{$index+1}}</td>
                <td style="padding:2px; text-align: justify; font-size: 8px" colspan="6">
                  <div class="wrap-3"> {{$asignatura->nombre}} </div>
                </td>
                <td style="padding:2px; text-align: center; font-size: 9px">8</td>
                <td style="padding:2px; text-align: center; font-size: 9px">X</td>
                <td style="padding:2px; text-align: center; font-size: 9px">X</td>
                <td style="padding:2px; text-align: center; font-size: 9px">X</td>
                <td style="padding:2px; text-align: center; font-size: 9px">X</td>
              </tr>
              @endif
            @endforeach
            </tbody>
          </table>
       </div>
       <div class="record-items">
        <b style="text-align: center">PRIMER PERIODO</b>
        <p>Periodo Académico: OCTUBRE MARZO 2020 ABRIL 2021</p>
          <table style="width: 300px" border="1">
            <thead>
              <tr>
                <th style="padding:2px; text-align: center; font-size: 9px">No</th>
                <th style="padding:2px; text-align: center; font-size: 9px" colspan="6">Materias</th>
                <th style="padding:2px; text-align: center; font-size: 9px">Nota <br> Final</th>
                <th style="padding:2px; text-align: center; font-size: 9px">A</th>
                <th style="padding:2px; text-align: center; font-size: 9px">R</th>
                <th style="padding:2px; text-align: center; font-size: 9px">C</th>
                <th style="padding:2px; text-align: center; font-size: 9px">E</th>
              </tr>
            </thead>
            <tbody>
            @foreach ($asignaturas as $index=> $asignatura)
              @if($asignatura->periodo_id==1)
              <tr>
                <td style="padding:2px; text-align: center; font-size: 8px" >{{$index+1}}</td>
                <td style="padding:2px; text-align: justify; font-size: 8px" colspan="6">
                  <div class="wrap-3"> {{$asignatura->nombre}} </div>
                </td>
                <td style="padding:2px; text-align: center; font-size: 9px">8</td>
                <td style="padding:2px; text-align: center; font-size: 9px">X</td>
                <td style="padding:2px; text-align: center; font-size: 9px">X</td>
                <td style="padding:2px; text-align: center; font-size: 9px">X</td>
                <td style="padding:2px; text-align: center; font-size: 9px">X</td>
              </tr>
              @endif
            @endforeach
            </tbody>
          </table>
       </div>
       <div class="record-items">
        <b style="text-align: center">PRIMER PERIODO</b>
        <p>Periodo Académico: OCTUBRE MARZO 2020 ABRIL 2021</p>
          <table style="width: 300px" border="1">
            <thead>
              <tr>
                <th style="padding:2px; text-align: center; font-size: 9px">No</th>
                <th style="padding:2px; text-align: center; font-size: 9px" colspan="6">Materias</th>
                <th style="padding:2px; text-align: center; font-size: 9px">Nota <br> Final</th>
                <th style="padding:2px; text-align: center; font-size: 9px">A</th>
                <th style="padding:2px; text-align: center; font-size: 9px">R</th>
                <th style="padding:2px; text-align: center; font-size: 9px">C</th>
                <th style="padding:2px; text-align: center; font-size: 9px">E</th>
              </tr>
            </thead>
            <tbody>
            @foreach ($asignaturas as $index=> $asignatura)
              @if($asignatura->periodo_id==1)
              <tr>
                <td style="padding:2px; text-align: center; font-size: 8px" >{{$index+1}}</td>
                <td style="padding:2px; text-align: justify; font-size: 8px" colspan="6">
                  <div class="wrap-3"> {{$asignatura->nombre}} </div>
                </td>
                <td style="padding:2px; text-align: center; font-size: 9px">8</td>
                <td style="padding:2px; text-align: center; font-size: 9px">X</td>
                <td style="padding:2px; text-align: center; font-size: 9px">X</td>
                <td style="padding:2px; text-align: center; font-size: 9px">X</td>
                <td style="padding:2px; text-align: center; font-size: 9px">X</td>
              </tr>
              @endif
            @endforeach
            </tbody>
          </table>
       </div>
     </div>
  </div>

</body>
</html>



