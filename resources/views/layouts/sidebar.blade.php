<div class="c-sidebar c-sidebar-dark c-sidebar-fixed c-sidebar-lg-show" id="sidebar">
    <div class="c-sidebar-brand d-lg-down-none ">
        <div class="c-sidebar-brand-full ">
            <div class="form-group text-center mt-2">
                <img height="125"  src="{{asset('assets/brand/SGlogo.svg')}}" alt="IUSGA Logo">
                <h4 class=" font-weight-bold mt-1 text-ligth ">ACADÉMICO</h4>
                <span class="font-weight-bold text-light mt-1">SYSTAG</span>
            </div>
        </div>
      <img class="c-sidebar-brand-minimized" width="45" height="51" src="{{asset('assets/brand/SGlogo.svg')}}" alt="IUSGA Logo">
    </div>
    <ul class="c-sidebar-nav">
      <li class="c-sidebar-nav-item">
        <a class="c-sidebar-nav-link" href="{{route('home')}}">
          <i class="c-sidebar-nav-icon fas fa-laptop"></i>
          Inicio
        </a>
      </li>

      <li class="c-sidebar-nav-title">COMPONENTES ACADÉMICOS</li>
      @if(auth()->user()->canAny(['Ver docentes', 'Crear docentes', 'Actualizar docentes', 'Eliminar docentes'])
         or auth()->user()->hasRole('Administrador'))
      <li class="c-sidebar-nav-item c-sidebar-nav-dropdown">
          <a class="c-sidebar-nav-link c-sidebar-nav-dropdown-toggle" href="#">
            <i class="c-sidebar-nav-icon fas fa-chalkboard-teacher"></i>
                Panel de Docentes
            </a>
            <ul class="c-sidebar-nav-dropdown-items ">
            @can('view', new App\Models\Docente)
                <li class="c-sidebar-nav-item ">
                <a class="c-sidebar-nav-link " href="{{route('docentes.index')}}">
                    <span class="c-sidebar-nav-icon  fas fa-user ml-n4"></span> Docentes
                </a>
                </li>
            @endcan

            </ul>
        @endif
      </li>

      <li class="c-sidebar-nav-item c-sidebar-nav-dropdown">
        @if (auth()->user()->canAny(['Ver estudiantes', 'Crear estudiantes', 'Actualizar estudiantes', 'Eliminar estudiantes'])
            or auth()->user()->hasRole('Administrador'))
          <a class="c-sidebar-nav-link c-sidebar-nav-dropdown-toggle" href="#">
            <i class="c-sidebar-nav-icon fas fa-user-tie"></i>
            Panel de Estudiantes
          </a>
        <ul class="c-sidebar-nav-dropdown-items">

          @can('view', new App\Models\Estudiante)
            <li class="c-sidebar-nav-item" >

              <a class="c-sidebar-nav-link" href="{{route('estudiantes.index')}}">
                <span class="c-sidebar-nav-icon fas fa-user ml-n4"></span> Estudiantes
              </a>

            </li>
          @endcan
        </ul>
        @endif
      </li>
      <li class="c-sidebar-nav-item c-sidebar-nav-dropdown">
        @if (auth()->user()->canAny(['Ver periodos academicos', 'Crear periodos academicos', 'Actualizar periodos academicos', 'Eliminar periodos academicos',
                                      'Ver asignaciones', 'Crear asignaciones', 'Actualizar asignaciones', 'Eliminar asignaciones',
                                      'Ver convalidaciones', 'Crear convalidaciones', 'Actualizar convalidaciones', 'Eliminar convalidaciones',
                                      'Ver matriculas', 'Crear matriculas', 'Actualizar matriculas', 'Eliminar matriculas',])
                                      or auth()->user()->hasAnyRole(['Administrador']))
          <a class="c-sidebar-nav-link c-sidebar-nav-dropdown-toggle" href="#">
              <i class="c-sidebar-nav-icon fas fa-box "></i>
              Panel Académico
          </a>

          <ul class="c-sidebar-nav-dropdown-items">
          @can('view', new App\Models\Periodacademico)
              <li class="c-sidebar-nav-item">
              <a class="c-sidebar-nav-link" href="{{route('periodacademicos.index')}}">
                  <span class="c-sidebar-nav-icon fas fa-calendar-alt ml-n4"></span> Periodo Académico
              </a>
              </li>
          @endcan

          @can('view', new App\Models\Asignacione)
              <li class="c-sidebar-nav-item ">
              <a class="c-sidebar-nav-link" href="{{route('asignaciones.index')}}">
                  <span class="c-sidebar-nav-icon text-muted small fas fa-file-signature ml-n4"></span> Asignaciones
              </a>
              </li>
          @endcan

          @can('view', new App\Models\Convalidacione)
              <li class="c-sidebar-nav-item ">
              <a class="c-sidebar-nav-link" href="{{route('convalidaciones.index')}}">
                  <span class="c-sidebar-nav-icon text-muted small fas fa-folder ml-n4"></span> Convalidaciones
              </a>
              </li>
          @endcan

          @can('view', new App\Models\Matricula)
              <li class="c-sidebar-nav-item ">
              <a class="c-sidebar-nav-link" href="{{route('matriculas.index')}}">
                  <span class="c-sidebar-nav-icon text-muted small fas fa-book ml-n4"></span> Matrículas
              </a>
              </li>
          @endcan
          </ul>
        @endif
      </li>

      <li class="c-sidebar-nav-item c-sidebar-nav-dropdown">
        @if (auth()->user()->canAny(['Ver horarios', 'Crear horarios', 'Actualizar horarios', 'Eliminar horarios',
                                     'Ver distributivos', 'Crear distributivos', 'Actualizar distributivos', 'Eliminar distributivos',
                                     'Ver horario de clases'])
                                     or auth()->user()->hasAnyRole(['Administrador', 'Docente', 'Estudiante']))
        <a class="c-sidebar-nav-link c-sidebar-nav-dropdown-toggle" href="#">
          <i class="c-sidebar-nav-icon fas fa-calendar-day"></i>
           Panel de Horarios
        </a>
        <ul class="c-sidebar-nav-dropdown-items">
          @can('view', new App\Models\Horario)
            <li class="c-sidebar-nav-item">
              <a class="c-sidebar-nav-link" href="{{route('horarios.index')}}">
                <span class="c-sidebar-nav-icon  fas fa-clock ml-n4"></span> Horarios
              </a>
            </li>
          @endcan

          @can('view', new App\Models\Asignaturadocente)
                <li class="c-sidebar-nav-item ">
                <a class="c-sidebar-nav-link" href="{{route('asignaturadocentes.index')}}">
                    <span class=" c-sidebar-nav-icon fas fa-business-time ml-n4"></span> Distributivos y Horarios
                </a>
                </li>
            @endcan

          @can('view', new App\Models\Horarioclase)
            <li class="c-sidebar-nav-item">
              <a class="c-sidebar-nav-link" href="{{route('horarioclases.index')}}">
                <span class="c-sidebar-nav-icon  fas fa-user-clock ml-n4"></span> Horario de clases
              </a>
            </li>
          @endcan
        </ul>
        @endif
      </li>

      <li class="c-sidebar-nav-item c-sidebar-nav-dropdown">
          @if (auth()->user()->canAny(['Ver calificaciones', 'Crear calificaciones', 'Actualizar calificaciones', 'Eliminar calificaciones',
                                        'Ver suspensos', 'Crear suspensos', 'Actualizar suspensos', 'Eliminar suspensos'])
                                        or auth()->user()->hasAnyRole(['Administrador', 'Docente']))
            <a class="c-sidebar-nav-link c-sidebar-nav-dropdown-toggle" href="#">
            <i class="c-sidebar-nav-icon fas fa-star"></i>
            Panel de Notas
            </a>
            <ul class="c-sidebar-nav-dropdown-items">
            @can('view', new App\Models\Calificacione)
                <li class="c-sidebar-nav-item">
                <a class="c-sidebar-nav-link" href="{{route('calificaciones.index')}}">
                    <span class="c-sidebar-nav-icon fas fa-star ml-n4"></span> Notas
                </a>
                </li>
            @endcan

            @can('view', new App\Models\Suspenso)
                <li class="c-sidebar-nav-item">
                <a class="c-sidebar-nav-link" href="{{route('suspensos.index')}}">
                    <span class="c-sidebar-nav-icon fas fa-star-half-alt ml-n4"></span> Suspensos
                </a>
                </li>
            @endcan
            </ul>
        @endif
      </li>

      <li class="c-sidebar-nav-item c-sidebar-nav-dropdown">
        @if (auth()->user()->canAny(['Ver nonima de estudiantes', 'Ver egresados', 'Ver record academico',
                                    'Ver calificaciones por periodo', 'Ver certificados por periodo'])
                                    or auth()->user()->hasAnyRole(['Administrador', 'Estudiante']))

            <a class="c-sidebar-nav-link c-sidebar-nav-dropdown-toggle" href="#">
            <i class="c-sidebar-nav-icon fas fa-file-import"></i>
            Panel de Reportes
            </a>
            <ul class="c-sidebar-nav-dropdown-items">

                @can('view', new App\Models\Estudiantenomina)
                <li class="c-sidebar-nav-item">
                    <a class="c-sidebar-nav-link" href="{{route('estudiantenominas.index')}}">
                    <i class="c-sidebar-nav-icon fas fa-user-edit ml-n4"></i>
                    Nómina Estudiantes</strong>
                    </a>
                </li>
                @endcan

                @can('view', new App\Models\Egresado)
                <li class="c-sidebar-nav-item">
                    <a class="c-sidebar-nav-link" href="{{route('egresados.index')}}" >
                    <i class="c-sidebar-nav-icon fas fa-user-graduate ml-n4"></i>
                    Egresados</strong>
                    </a>
                </li>
                @endcan

            @can('view', new App\Models\Recordacademico)
                <li class="c-sidebar-nav-item">
                <a class="c-sidebar-nav-link" href="{{route('recordacademicos.index')}}">
                    <span class="c-sidebar-nav-icon fas fa-microchip ml-n4"></span> Record Académico
                </a>
                </li>
            @endcan

            @can('view', new App\Models\Calificacionperiodo)
                <li class="c-sidebar-nav-item">
                <a class="c-sidebar-nav-link" href="{{route('calificacionperiodos.index')}}">
                    <span class="c-sidebar-nav-icon fas fa-star ml-n4"></span> @role('Estudiante') Ver notas @else Notas por periodo @endrole
                </a>
                </li>
            @endcan

            @can('view', new App\Models\Certificadoperiodo)
                <li class="c-sidebar-nav-item">
                <a class="c-sidebar-nav-link" href="{{route('certificadoperiodos.index')}}">
                    <span class="c-sidebar-nav-icon fas fa-certificate ml-n4"></span> Certificados
                </a>
                </li>
            @endcan
            </ul>
        @endif
      </li>

      <li class="c-sidebar-nav-title">ACCESO Y AUTENTICACIÓN</li>

      <li class="c-sidebar-nav-item c-sidebar-nav-dropdown">

        <a class="c-sidebar-nav-dropdown-toggle" href="#">
          <i class="c-sidebar-nav-icon fas fa-user-cog"></i>
          @role('Administrador') Panel de Usuarios @else Mi Cuenta @endrole
        </a>

        <ul class="c-sidebar-nav-dropdown-items">
          @can('view', new App\Models\User)
            <li class="c-sidebar-nav-item">
              <a class="c-sidebar-nav-link" href="{{route('users.index')}}" target="_top">
                <i class="c-sidebar-nav-icon fas fa-user-friends ml-n4"></i>
                Usuarios
              </a>
            </li>
          @else
            <li class="c-sidebar-nav-item">
              <a class="c-sidebar-nav-link" href="{{route('users.show', auth()->user())}}" target="_top">
                <i class="c-sidebar-nav-icon fas fa-user-friends ml-n4"></i>
                 Ver mi perfil
              </a>
            </li>
          @endcan

          @can('view', new \Spatie\Permission\Models\Role)
            <li class="c-sidebar-nav-item">
              <a class="c-sidebar-nav-link" href="{{route('roles.index')}}" target="_top">
                <i class="c-sidebar-nav-icon fas fa-user-lock ml-n4"></i>
                Roles
                </a>
            </li>
          @endcan

          @can('view', new \Spatie\Permission\Models\Permission)
            <li class="c-sidebar-nav-item">
              <a class="c-sidebar-nav-link" href="{{route('permisos.index')}}" target="_top">
              <i class="c-sidebar-nav-icon fas fa-unlock-alt ml-n4"></i>
                Permisos
              </a>
            </li>
          @endcan
        </ul>
      </li>

      @if (auth()->user()->hasAnyRole(['Administrador']))
        <li class="c-sidebar-nav-title">COMPONENTES INICIALES</li>
      @endif
      <li class=" c-sidebar-nav-dropdown">
        @if (auth()->user()->canAny(['Ver carreras', 'Crear carreras', 'Actualizar carreras', '	Eliminar carreras',
                                    'Ver periodos', 'Crear periodos', 'Actualizar periodos', '	Eliminar periodos',
                                    'Ver secciones', 'Crear secciones', 'Actualizar secciones', '	Eliminar secciones',
                                    'Ver paralelos', 'Crear paralelos', 'Actualizar paralelos', '	Eliminar paralelos',
                                    'Ver asignaturas', 'Crear asignaturas', 'Actualizar asignaturas', '	Eliminar asignaturas',])
                                    or auth()->user()->hasAnyRole(['Administrador']))
            <a class=" c-sidebar-nav-dropdown-toggle" href="#">
                <i class="c-sidebar-nav-icon fas fa-tools"></i>
                Panel Global
            </a>

            <ul class="c-sidebar-nav-dropdown-items">
            @can('view', new App\Models\Carrera)
                <li class="c-sidebar-nav-item">
                <a class="c-sidebar-nav-link" href="{{route('carreras.index')}}">
                    <span class="c-sidebar-nav-icon fas fa-graduation-cap ml-n4"></span> Carreras
                </a>
                </li>
            @endcan

            @can('view', new App\Models\Periodo)
                <li class="c-sidebar-nav-item">
                <a class="c-sidebar-nav-link" href="{{route('periodos.index')}}">
                    <span class="c-sidebar-nav-icon fas fa-layer-group ml-n4"></span> Periodos
                </a>
                </li>
            @endcan

            @can('view', new App\Models\Seccione)
                <li class="c-sidebar-nav-item">
                <a class="c-sidebar-nav-link" href="{{route('secciones.index')}}">
                    <span class="c-sidebar-nav-icon fas fa-sort-amount-down-alt ml-n4"></span> Secciones
                </a>
                </li>
            @endcan

            @can('view', new App\Models\Paralelo)
                <li class="c-sidebar-nav-item">
                <a class="c-sidebar-nav-link" href="{{route('paralelos.index')}}">
                    <span class="c-sidebar-nav-icon fas fa-window-restore ml-n4"></span> Paralelos
                </a>
                </li>
            @endcan

            @can('view', new App\Models\Asignatura)
                <li class="c-sidebar-nav-item">
                <a class="c-sidebar-nav-link" href="{{route('asignaturas.index')}}">
                    <span class="c-sidebar-nav-icon fas fa-folder ml-n4"></span> Malla Curricular
                </a>
                </li>
            @endcan
            </ul>
        @endif
      </li>

      <li class="c-sidebar-nav-item">
        <a  style="background: #2e685a" class="c-sidebar-nav-link c-sidebar-nav-link" href="{{route('userinstrucciones.index')}}" >
          <i class="c-sidebar-nav-icon fas fa-archive "></i>
          Guía de &nbsp; <strong>USUARIO</strong>
        </a>
      </li>
    </ul>

    <button class="c-sidebar-minimizer c-class-toggler" type="button" data-target="_parent" data-class="c-sidebar-minimized"></button>
  </div>
