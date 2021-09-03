<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    <title>Reporte Horario de clases</title>
    <link href="{{public_path('css/reportestyle.css')}}" rel="stylesheet">
    <link href="{{public_path('css/horarioclase.css')}}" rel="stylesheet">
</head>
<body>
    <header>
        <div class="logo">
            <img src="{{ public_path('assets/brand/logo3.png') }}">
        </div>
        <div class="title">
            <h3>INSTITUTO SUPERIOR TECNOLÓGICO <br> "SAN GABRIEL"</h3>
            <p> Carrera de </p> {{--{{$calificaciones[0]->asignacione->carreras->pluck('nombre')->implode(', ')}} --}}
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

    <table border="1" >
        <thead>
            <tr>
                <th>Hora</th>
                <th>Lunes</th>
                <th>Martes</th>
                <th>Miércoles</th>
                <th>Jueves</th>
                <th>Viernes</th>
            </tr>
        </thead>
        <tbody>
            <tr>
                <td style="text-align: center">20.30 <br> 21.30 </td>
                <td> Asignatura Lunes Asignatura Lunes Asignatura Lunes <hr style="border: 1px dashed"> <span>DOCENTE: DOCENTE 1</span>  </td>
                <td>Asignatura Martes Asignatura Martes <hr style="border: 1px dashed"> <span>DOCENTE: DOCENTE 1</span>  </td>
                <td>Asignatura Miercoles Asignatura Miercoles <hr style="border: 1px dashed"> <span>DOCENTE: DOCENTE 1</span>  </td>
                <td>Asignatura Jueves Asignatura Jueves <hr style="border: 1px dashed"> <span>DOCENTE: DOCENTE 1</span>  </td>
                <td>Asignatura Viernes Asignatura Viernes <hr style="border: 1px dashed"> <span>DOCENTE: DOCENTE 1</span>  </td>
            </tr>
        </tbody>
    </table>

</body>
</html>
