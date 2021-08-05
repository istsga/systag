@extends('layouts.layout')
@section('title', ' Egresados |')
@section('content')

<main class="c-main">
<div class="container-fluid">
    <div class="fade-in">

        <div class="card card-accent-primary shadow-lg">
            <div class="card-header bg-primary  d-flex justify-content-between aling-items-end ">
                <font class=" text-light align-self-center text-black vertical-align-inherit "> <i class="font-weight-bold fas fa-user-graduate mr-3"></i> EGRESADOS </font>
            </div>
            <div class="card-body">
                <form class="col-lg-12 px-0 my-2 my-lg-0 no-waves-effect">
                    <div class="input-group">
                        <input type="search" name="search" class="form-control" placeholder="Buscar..." aria-label="Buscar..." aria-describedby="basic-addon2">
                        <div class="input-group-append">
                            <button class="btn btn-primary btn-gradient waves-effect waves-light" type="submit"><span class="gradient"><font style="vertical-align: inherit;">Buscar</font></span></button>
                        </div>
                    </div>
                </form>
            </div>
        </div>

        <div class="card card-accent-primary shadow-lg">
            <div class="card-header bg-primary  d-flex justify-content-between aling-items-end ">
                <font class=" text-light align-self-center text-black vertical-align-inherit "> <i class="font-weight-bold far fa-user mr-3"></i> ALUMNOS </font>
                    <a class=" btn btn-primary " href="#"> <i class=" font-weight-bold fas fa-file-pdf mr-1"></i>Reporte PDF</a>
            </div>
            <div class="card-table table-responsive">
                <table class="table table-hover  table-bordered align-middle">
                    <thead class="thead-light">
                        <tr>
                            <th class="text-center align-middle"><font>Nro</font></th>
                            <th class="align-middle"><font>Nombres y Apellidos</font></font></th>
                        </tr>
                    </thead>
                    <tbody>
                        <tr>
                        <td class="text-center align-middle" ># </td>
                        <td class="align-middle" >Diego Guapi </td>
                    </tbody>
                </table>
            </div>

            <em class=" mt-2 mb-2 ml-3 text-muted">No tienes registros.</em>
       </div>
    </div>
</div>
</main>
@endsection
