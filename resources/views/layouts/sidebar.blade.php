<div class="c-sidebar c-sidebar-dark c-sidebar-fixed c-sidebar-lg-show" id="sidebar">
    <div class="c-sidebar-brand d-lg-down-none">
      <img class="c-sidebar-brand-full" width="118" height="46" src="{{asset('assets/brand/logo1.png')}}" alt="ITSGA Logo">
      <img class="c-sidebar-brand-minimized" width="40" height="46" src="{{asset('assets/brand/logo3.png')}}" alt="ITSGA Logo">

    </div>
    <ul class="c-sidebar-nav">
      <li class="c-sidebar-nav-item">
        <a class="c-sidebar-nav-link" href="{{route('home')}}">
          <i class="c-sidebar-nav-icon fas fa-tachometer-alt"></i>
          Inicio
        </a>
      </li>

      <li class="c-sidebar-nav-title">COMPONENTES ACADÉMICOS</li>

      <li class="c-sidebar-nav-item c-sidebar-nav-dropdown">
        <a class="c-sidebar-nav-link c-sidebar-nav-dropdown-toggle" href="#">
          <i class="c-sidebar-nav-icon fas fa-chalkboard-teacher"></i>
            Gestión de Docentes
        </a>
        <ul class="c-sidebar-nav-dropdown-items ">
          @can('view', new App\Models\Docente)
            <li class="c-sidebar-nav-item">
              <a class="c-sidebar-nav-link" href="{{route('docentes.index')}}">
                <span class="c-sidebar-nav-icon  fas fa-user ml-n4"></span> Docentes
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

        </ul>
      </li>

      <li class="c-sidebar-nav-item c-sidebar-nav-dropdown">
        @can('view', new App\Models\Estudiante)
          <a class="c-sidebar-nav-link c-sidebar-nav-dropdown-toggle" href="#">
            <i class="c-sidebar-nav-icon fas fa-user-tie"></i>
            Gestión de Estudiantes
          </a>
        @endcan

        <ul class="c-sidebar-nav-dropdown-items">

          @can('view', new App\Models\Estudiante)
            <li class="c-sidebar-nav-item" >
              <a class="c-sidebar-nav-link" href="{{route('estudiantes.index')}}">
                <span class="c-sidebar-nav-icon fas fa-user ml-n4"></span> Estudiantes
              </a>
            </li>
          @endcan

        </ul>
      </li>
      <li class="c-sidebar-nav-item c-sidebar-nav-dropdown">
        <a class="c-sidebar-nav-link c-sidebar-nav-dropdown-toggle" href="#">
          <i class="c-sidebar-nav-icon fas fa-calendar-day"></i>
           Gestión de Horarios
        </a>
        <ul class="c-sidebar-nav-dropdown-items">
          @can('view', new App\Models\Horario)
            <li class="c-sidebar-nav-item">
              <a class="c-sidebar-nav-link" href="{{route('horarios.index')}}">
                <span class="c-sidebar-nav-icon  fas fa-clock ml-n4"></span> Horarios
              </a>
            </li>
          @endcan

          {{-- @can('view', new App\Models\Horariodocente) --}}
            <li class="c-sidebar-nav-item">
              {{-- <a class="c-sidebar-nav-link" href="{{route('horariodocentes.index')}}"> --}}
                <span class="c-sidebar-nav-icon  fas fa-user-clock"></span> Horario de docente
              </a>
            </li>
          {{-- @endcan --}}

        </ul>
      </li>

      <li class="c-sidebar-nav-item c-sidebar-nav-dropdown">
        <a class="c-sidebar-nav-link c-sidebar-nav-dropdown-toggle" href="#">
          <i class="c-sidebar-nav-icon fas fa-star"></i>
           Gestión de Notas
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
      </li>

      <li class="c-sidebar-nav-item c-sidebar-nav-dropdown">
        @can('view', new App\Models\Periodacademico)
        <a class="c-sidebar-nav-link c-sidebar-nav-dropdown-toggle" href="#">
            <i class="c-sidebar-nav-icon fas fa-box "></i>
            Gestión Académica
        </a>
        @endcan
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
      </li>

      <li class="c-sidebar-nav-item c-sidebar-nav-dropdown">
        <a class="c-sidebar-nav-link c-sidebar-nav-dropdown-toggle" href="#">
          <i class="c-sidebar-nav-icon fas fa-file-import"></i>
           Gestión de Reportes
        </a>
        <ul class="c-sidebar-nav-dropdown-items">

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
                <span class="c-sidebar-nav-icon fas fa-star ml-n4"></span> Notas por periodo
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
      </li>

      <li class=" c-sidebar-nav-dropdown">
          <a class=" c-sidebar-nav-dropdown-toggle" href="#">
            <i class="c-sidebar-nav-icon fas fa-tools"></i>
            Gestión Global
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
      </li>

      <li class="c-sidebar-nav-divider"></li>
      <li class="c-sidebar-nav-title">Extras</li>

      <li class="c-sidebar-nav-item c-sidebar-nav-dropdown">

        <a class="c-sidebar-nav-dropdown-toggle" href="#">
          <i class="c-sidebar-nav-icon fas fa-user-cog"></i>
          Gestión de Usuarios
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
                Mi perfil
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

      <li class="c-sidebar-nav-item">
        <a  style="background: #2e685a" class="c-sidebar-nav-link c-sidebar-nav-link" href="{{route('userinstrucciones.index')}}" >
          <i class="c-sidebar-nav-icon fas fa-archive "></i>
          Guía de &nbsp; <strong>USUARIO</strong>
        </a>
      </li>
    </ul>

    <button class="c-sidebar-minimizer c-class-toggler" type="button" data-target="_parent" data-class="c-sidebar-minimized"></button>
  </div>
