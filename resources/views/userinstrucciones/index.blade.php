@extends('layouts.layout')
@section('title', ' Manual de Usuario |')
@section('content')

<main class="c-main">
<div class="container-fluid">
    <div class="fade-in">
        <div class="col-lg-12 content-center mt-5 invisible">
            <div class="card-header bg-primary col-lg-12">
                <h4 class=" text-light"><em>MANUAL DE USUARIO</em></h4>
            </div>
        </div>
        <div class="row mt-5 justify-content-center">
            @role('Administrador')
            <div class="col-sm-6 col-lg-4">
                <div class="card">
                    <div class="card-header bg-primary content-center">
                    <div class="c-icon c-icon-3xl text-white my-2">
                        <i class="fas fa-users-cog"></i>
                    </div>
                    </div>
                    <div class="card-body row text-center">
                    <div class="col">
                        <div class="text-uppercase text-muted small">Usuario</div>
                        <div class="text-value-xl">Administrador</div>
                    </div>
                    </div>
                    <div class="card-footer bg-primary content-center">
                    <a target="_blank" href="https://drive.google.com/file/d/1xeCph60FXcMXU5mK-SA0KWA_CuJQw_xn/view?usp=sharing" class="btn btn-block btn-primary font-weight-bold ">VER MANUAL</a>
                    </div>
                </div>
            </div>
            <div class="col-sm-6 col-lg-4">
                <div class="card">
                    <div class="card-header bg-primary content-center">
                    <div class="c-icon c-icon-3xl text-white my-2">
                        <i class="fas fa-chalkboard-teacher"></i>
                    </div>
                    </div>
                    <div class="card-body row text-center">
                    <div class="col">
                        <div class="text-uppercase text-muted small">Usuario</div>
                        <div class="text-value-xl">Docente</div>
                    </div>
                    </div>
                    <div class="card-footer bg-primary content-center">
                    <a target="_blank" href="https://drive.google.com/file/d/1lcDMNUqo0iF9WSGK97uxYh6dHc-IBJ1f/view?usp=sharing" class="btn btn-block btn-primary font-weight-bold">VER MANUAL</a>
                    </div>
                </div>
            </div>
            <div class="col-sm-6 col-lg-4">
                <div class="card">
                    <div class="card-header bg-primary content-center">
                    <div class="c-icon c-icon-3xl text-white my-2">
                        <i class="fas fa-user-graduate"></i>
                    </div>
                    </div>
                    <div class="card-body row text-center">
                    <div class="col">
                        <div class="text-uppercase text-muted small">Usuario</div>
                        <div class="text-value-xl">Estudiante</div>
                    </div>
                    </div>
                    <div class="card-footer bg-primary content-center ">
                    <a target="_blank" href="https://drive.google.com/file/d/1Q7OnrgKIWNIW4ez-4RertEmEdfxSolEM/view" class="btn btn-block btn-primary font-weight-bold ">VER MANUAL</a>
                    </div>
                </div>
            </div>
            @endrole

            @role('Docente')
            <div class="col-sm-6 col-lg-4">
                <div class="card">
                    <div class="card-header bg-primary content-center">
                    <div class="c-icon c-icon-3xl text-white my-2">
                        <i class="fas fa-chalkboard-teacher"></i>
                    </div>
                    </div>
                    <div class="card-body row text-center">
                    <div class="col">
                        <div class="text-uppercase text-muted small">Usuario</div>
                        <div class="text-value-xl">Docente</div>
                    </div>
                    </div>
                    <div class="card-footer bg-primary content-center">
                    <a href="#" class="btn btn-block btn-primary font-weight-bold">VER MANUAL</a>
                    </div>
                </div>
            </div>
            @endrole

            @role('Estudiante')
                <div class="col-sm-6 col-lg-4">
                    <div class="card">
                        <div class="card-header bg-primary content-center">
                        <div class="c-icon c-icon-3xl text-white my-2">
                            <i class="fas fa-user-graduate"></i>
                        </div>
                        </div>
                        <div class="card-body row text-center">
                        <div class="col">
                            <div class="text-uppercase text-muted small">Usuario</div>
                            <div class="text-value-xl">Estudiante</div>
                        </div>
                        </div>
                        <div class="card-footer bg-primary content-center ">
                        <a href="#" class="btn btn-block btn-primary font-weight-bold ">VER MANUAL</a>
                        </div>
                    </div>
                </div>
            @endrole
        </div>

    </div>
</div>
</main>
@endsection
