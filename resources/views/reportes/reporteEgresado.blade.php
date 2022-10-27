<!DOCTYPE html>
<html lang="es">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    <title>Egresados</title>
    <link href="{{public_path('css/reportestyle.css')}}" rel="stylesheet">
    <link href="{{public_path('css/egresado.css')}}" rel="stylesheet">
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
            <img src="storage/{{$carreras->logo}}" alt="Logo Carrera">
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
        <div class="e-nombre">
            <p>EGRESADOS</p>
            <p style="margin-top: -10px">Carrera de {{$carreras->nombre}} </p>
        </div>
        <div class="data-egresados">
            <p>Periodo Académico: <span style="margin-left:-10px">{{$periodo_academico}} </span> </p>
        </div>
        <div class="item-container">
            <table border="1">
                <thead>
                  <tr>
                    <th >No</th>
                    <th >ESTUDIANTES</th>
                  </tr>
                </thead>
                <tbody>
                    @foreach ($alumnos as $index =>  $alumno)
                    @if($alumno->egresado==true)
                    <tr>
                    <td  style="text-align:center">{{$index+1}} </td>
                    <td  >{{$alumno->estudiante->nombre}} {{$alumno->estudiante->apellido}}</td>
                    </tr>
                    @endif
                    @endforeach
                </tbody>
            </table>
        </div>
        <div class="firma">
            <p>  Ing. Olga Villagran C. <br>
            <span style="margin-top: 10px">SECRETARIA GENERAL </span> </p>
        </div>
        </div>
    </div>
</body>
</html>


