<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    <title>Nómina de Estudiantes</title>
    <link href="{{public_path('css/reportestyle.css')}}" rel="stylesheet">
    <link href="{{public_path('css/estudiantenomina.css')}}" rel="stylesheet">
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
            <img src="storage/{{$asignacion->carreras->pluck('logo')->implode(', ')}}" alt="Logo Carrera">
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
            <p>Carrera de {{$asignacion->carreras->pluck('nombre')->implode(', ')}} </p>
            <p style="margin-top: -10px">NÓMINA DE ESTUDIANTES</p>
        </div>
        <div class="informacion">
            <p style="padding-bottom: 10px;">CARRERA: <span style="padding-left: 85px">
                {{$asignacion->carreras->pluck('nombre')->implode(', ')}} </span></p>
            <div class="informacion-1">
                <p>PERIODO ACADÉMICO: <span style="padding-left: 12px">
                    {{$asignacion->periodacademicos->pluck('periodo')->implode(', ')}} </span></p>
                <p>SECCIÓN:<span style="padding-left: 20px"> {{$asignacion->seccione->nombre}} </span></p>
            </div>
            <div class="informacion-2">
                <p>PERIODO:<span style="padding-left: 20px"> {{$asignacion->periodo->nombre}} </span></p>
                <p>PARALELO:<span style="padding-left: 10px"> {{$asignacion->paralelo->nombre}} </span></p>
            </div>
        </div>
        <div class="item-container">
            <table border="1">
                <thead>
                  <tr>
                    <th colspan="2">No</th>
                    <th colspan="4">C.I.</th>
                    <th colspan="10" >NOMBRES Y APELLIDOS</th>
                  </tr>
                </thead>
                <tbody>
                    @foreach ($estudiantes as $index =>  $estudiante)
                    <tr>
                    <td colspan="2" style="text-align:center">{{$index+1}} </td>
                    <td colspan="4" style="text-align:center">{{$estudiante->dni}} </td>
                    <td colspan="10">{{$estudiante->nombre}} {{$estudiante->apellido}} <span> &nbsp; </span> </td>
                    </tr>
                    @endforeach
                </tbody>
            </table>
        </div>
        <div class="firma">
            <p>  Ing. Olga Villagran C. <br>
            <span>SECRETARIA GENERAL </span> </p>
        </div>
        </div>
    </div>
</body>
</html>


