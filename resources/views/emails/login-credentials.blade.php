@component('mail::message')
    # Tus credenciales para acceder al {{ config('app.name') }}

    Utiliza estas credenciales para acceder al sistema.

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
