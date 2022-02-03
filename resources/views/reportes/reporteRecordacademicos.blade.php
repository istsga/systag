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
            <img src="{{ public_path('assets/brand/logoSG.png') }}">
          </div>
          <div class="title">
            <h3>INSTITUTO SUPERIOR UNIVERSITARIO <br> "SAN GABRIEL"</h3>
            <p>Carrera de {{$calificaciones[0]->asignacione->carreras->pluck('nombre')->implode(', ')}} </p>
          </div>
          <div class="logo-carrera">
            <img src="storage/{{$calificaciones[0]->asignacione->carreras->pluck('logo')->implode(', ')}}" alt="Logo Carrera">
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
            <p>Carrera:<span style="padding-left: 39px"> {{$calificaciones[0]->asignacione->carreras->pluck('nombre')->implode(', ')}}</span></p>
            <p>Estudiante: <span>{{$estudiante->nombre}} {{$estudiante->apellido}}</span> </p>
            <p>Fecha de inicio: <span style="padding-left: 5px">{{$matricula->fecha_matricula}}</span></p>
        </div>

        <div class="item-container">
            @for ($i=1;$i<=$calificaciones->max('periodo_id');$i++)
            {{-- <p>Verificar bien al funcionamiento</p> --}}
                @foreach ($calificaciones as $index=> $calificacione)
                    @if($calificacione->periodo_id==$i)
                    <p> {{$calificacione->asignacione->periodacademicos->pluck('periodo')->implode(', ')}} &nbsp; | <span> {{$periodos[$i-1]->nombre}} </span></p>
                    @break
                    @endif
                @endforeach

            <table border="1">
                <thead>
                  <tr>
                    <th >No</th>
                    <th >Código</th>
                    <th >Asignatura</th>
                    <th >Calificación</th>
                    <th >Estado</th>
                    <th >Suspensión</th>
                    <th >Observación</th>
                  </tr>
                </thead>
                <tbody>
                @foreach ($calificaciones as $index=> $calificacione)
                  @if($calificacione->periodo_id==$i)
                  <tr>
                    <td >{{$index+1}}</td>
                    <td >{{$calificacione->cod_asignatura}}</td>
                    <td style="width: 260px">
                        <div class="wrap-3"> {{$calificacione->nombre}}</div>
                    </td>
                    <td>{{$calificacione->promedio_final}}</td>
                    <td>{{$calificacione->observacion}}</td>
                    <td>{{$calificacione->examen_suspenso}}</td>
                    <td>{{$calificacione->observacionSuspenso}}</td>
                  </tr>
                  @endif
                @endforeach

                @foreach ($convalidaciones as $index=> $convalidacione)
                  @if($convalidacione->periodo_id==$i)
                  <tr>
                    <td >{{$index+1}}</td>
                    <td >{{$convalidacione->cod_asignatura}}</td>
                    <td >
                      <div class="wrap-3"> {{$convalidacione->nombre}}</div>
                    </td>
                    <td>{{$convalidacione->nota_final}}</td>
                    <td>CONVALIDADO</td>
                    <td></td>
                    <td></td>
                  </tr>
                  @endif
                @endforeach
                </tbody>
            </table>
            @endfor
        </div>
        </div>

    </div>
</body>
</html>


