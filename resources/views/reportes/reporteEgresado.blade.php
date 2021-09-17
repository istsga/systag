<!DOCTYPE html>
<html lang="en">
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
            <img src="{{ public_path('assets/brand/logo3.png') }}">
          </div>
          <div class="title">
            <h3>INSTITUTO SUPERIOR TECNOLÓGICO <br> "SAN GABRIEL"</h3>
            {{-- <p>Carrera de {{$calificaciones[0]->asignacione->carreras->pluck('nombre')->implode(', ')}} </p> --}}
          </div>
          <div class="logo-carrera">
            {{-- <img src="storage/{{$calificaciones[0]->asignacione->carreras->pluck('logo')->implode(', ')}}" alt="Logo Carrera"> --}}
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
        </div>

        <div class="data-student">
            {{-- <p>Estudiante: <span>{{$estudiante->nombre}} {{$estudiante->apellido}}</span> </p> --}}
            {{-- <p>Carrera:<span style="padding-left: 39px"> {{$calificaciones[0]->asignacione->carreras->pluck('nombre')->implode(', ')}}</span></p> --}}
            {{-- <p>Fecha de inicio: <span style="padding-left: 5px">{{$matricula->fecha_matricula}}</span></p> --}}
        </div>

        <div class="item-container">
            {{-- @for ($i=1;$i<=$calificaciones->max('periodo_id');$i++) --}}

            {{-- <p>Verificar bien al funcionamiento</p> --}}
                {{-- @foreach ($calificaciones as $index=> $calificacione) --}}
                    {{-- @if($calificacione->periodo_id==$i)
                    <p> {{$calificacione->asignacione->periodacademicos->pluck('periodo')->implode(', ')}} &nbsp; | <span> {{$periodos[$i-1]->nombre}} </span></p>
                    @break
                    @endif
                @endforeach --}}

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
        </div>

    </div>
</body>
</html>


