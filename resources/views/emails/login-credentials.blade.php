@component('mail::message')

@component('mail::table')
    | INSTITUTO SUPERIOR TECNOLÓGICO SAN GABRIEL|
    |:----------:|
@endcomponent
      Tus credenciales de acceso al Sistema Académico del ISTSGA

@component('mail::table')
    | Usuario | Contraseña |
    |:----------|------------:|
    |{{ $user->email}} | {{$password}}|
@endcomponent

@component('mail::button', ['url' => url('login')])
    Iniciar
@endcomponent

    Equipo de desarrollo,
    {{ config('app.name') }}
@endcomponent
