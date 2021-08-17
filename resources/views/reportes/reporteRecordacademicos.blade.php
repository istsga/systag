<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    <title>Record Académico</title>
    <link href="{{public_path('css/reportestyle.css')}}" rel="stylesheet">
    <link href="{{public_path('css/recordacademico.css')}}" rel="stylesheet">
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
    <div class="container" >

        <div class="t-nombre">
            <p>RECORD ACÁDEMICO</p>
        </div>

        <div class="data-student">
            <p>Estudiante: <span>{{$estudiante->nombre}} {{$estudiante->apellido}}</span> </p>
            <p>Carrera:<span style="padding-left: 45px">desarrollo sofware</span></p>
            <p>Fecha inicio: <span>enero julio</span></p>
        </div>

        <div class="item-container">
            <p> Arbril Marzo 2021 &nbsp; | <span> I Periodo </span></p>
            <table border="1">
                <thead>
                  <tr>
                    <th >No</th>
                    <th >Código</th>
                    <th  colspan="6">Asignatura</th>
                    <th >Calificación</th>
                    <th >Estado</th>
                  </tr>
                </thead>
                <tbody>
                @foreach ($asignaturas as $index=> $asignatura)
                  @if($asignatura->periodo_id==1)
                  <tr>
                    <td >{{$index+1}}</td>
                    <td >050247</td>
                    <td colspan="6">
                      <div class="wrap-3"> {{$asignatura->nombre}}</div>
                    </td>
                    <td>8</td>
                    <td>Aprobado, Exonerado</td>
                  </tr>
                  @endif
                @endforeach
                </tbody>
            </table>

        </div>
        <div class="item-container">
            <p> Arbril Marzo 2021 &nbsp; | <span> I Periodo </span></p>
            <table border="1">
                <thead>
                  <tr>
                    <th >No</th>
                    <th >Código</th>
                    <th  colspan="6">Asignatura</th>
                    <th >Calificación</th>
                    <th >Estado</th>
                  </tr>
                </thead>
                <tbody>
                @foreach ($asignaturas as $index=> $asignatura)
                  @if($asignatura->periodo_id==1)
                  <tr>
                    <td >{{$index+1}}</td>
                    <td >050247</td>
                    <td colspan="6">
                      <div class="wrap-3"> {{$asignatura->nombre}}</div>
                    </td>
                    <td>8</td>
                    <td>Aprobado, Exonerado</td>
                  </tr>
                  @endif
                @endforeach
                </tbody>
            </table>

        </div>
        <div class="item-container">
            <p> Arbril Marzo 2021 &nbsp; | <span> I Periodo </span></p>
            <table border="1">
                <thead>
                  <tr>
                    <th >No</th>
                    <th >Código</th>
                    <th  colspan="6">Asignatura</th>
                    <th >Calificación</th>
                    <th >Estado</th>
                  </tr>
                </thead>
                <tbody>
                @foreach ($asignaturas as $index=> $asignatura)
                  @if($asignatura->periodo_id==1)
                  <tr>
                    <td >{{$index+1}}</td>
                    <td >050247</td>
                    <td colspan="6">
                      <div class="wrap-3"> {{$asignatura->nombre}}</div>
                    </td>
                    <td>8</td>
                    <td>Aprobado, Exonerado</td>
                  </tr>
                  @endif
                @endforeach
                </tbody>
            </table>

        </div>
        <div class="item-container">
            <p> Arbril Marzo 2021 &nbsp; | <span> I Periodo </span></p>
            <table border="1">
                <thead>
                  <tr>
                    <th >No</th>
                    <th >Código</th>
                    <th  colspan="6">Asignatura</th>
                    <th >Calificación</th>
                    <th >Estado</th>
                  </tr>
                </thead>
                <tbody>
                @foreach ($asignaturas as $index=> $asignatura)
                  @if($asignatura->periodo_id==1)
                  <tr>
                    <td >{{$index+1}}</td>
                    <td >050247</td>
                    <td colspan="6">
                      <div class="wrap-3"> {{$asignatura->nombre}}</div>
                    </td>
                    <td>8</td>
                    <td>Aprobado, Exonerado</td>
                  </tr>
                  @endif
                @endforeach
                </tbody>
            </table>

        </div>
        <div class="item-container">
            <p> Arbril Marzo 2021 &nbsp; | <span> I Periodo </span></p>
            <table border="1">
                <thead>
                  <tr>
                    <th >No</th>
                    <th >Código</th>
                    <th  colspan="6">Asignatura</th>
                    <th >Calificación</th>
                    <th >Estado</th>
                  </tr>
                </thead>
                <tbody>
                @foreach ($asignaturas as $index=> $asignatura)
                  @if($asignatura->periodo_id==1)
                  <tr>
                    <td >{{$index+1}}</td>
                    <td >050247</td>
                    <td colspan="6">
                      <div class="wrap-3"> {{$asignatura->nombre}}</div>
                    </td>
                    <td>8</td>
                    <td>Aprobado, Exonerado</td>
                  </tr>
                  @endif
                @endforeach
                </tbody>
            </table>

        </div>
        <div class="item-container">
            <p> Arbril Marzo 2021 &nbsp; | <span> I Periodo </span></p>
            <table border="1">
                <thead>
                  <tr>
                    <th >No</th>
                    <th >Código</th>
                    <th  colspan="6">Asignatura</th>
                    <th >Calificación</th>
                    <th >Estado</th>
                  </tr>
                </thead>
                <tbody>
                @foreach ($asignaturas as $index=> $asignatura)
                  @if($asignatura->periodo_id==1)
                  <tr>
                    <td >{{$index+1}}</td>
                    <td >050247</td>
                    <td colspan="6">
                      <div class="wrap-3"> {{$asignatura->nombre}}</div>
                    </td>
                    <td>8</td>
                    <td>Aprobado, Exonerado</td>
                  </tr>
                  @endif
                @endforeach
                </tbody>
            </table>

        </div>

    </div>
</body>
</html>


