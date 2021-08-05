@extends('layouts.layout')
@section('title', ' Permisos |')
@section('content')

<main class="c-main">
<div class="container-fluid">
    <div class="fade-in">
        <div class="row">
            <div class="col-md-12">
                <div class="card shadow-lg ">
                <div class="card-header bg-primary  d-flex justify-content-between aling-items-end ">
                    <font class=" text-light align-self-center text-black vertical-align-inherit "> <i class="font-weight-bold fas fa-key mr-3"></i> PERMISOS </font>
                </div>

                <div class="card-table  table-responsive">
                    <table class="table table-hover  table-bordered align-middle">
                        <thead class="thead-light">
                            <tr>
                                <th class="text-center"><font style="vertical-align: inherit;">Nro</font></th>
                                <th><font style="vertical-align: inherit;">Lista permisos </font></th>
                            </tr>
                        </thead>
                        <tbody>
                        @foreach ($permissions as $permission)
                            <tr>
                                <td class="text-center" >{{$permission->id}} </td>
                                <td >{{$permission->name}} </td>
                            </tr>
                        @endforeach
                        </tbody>
                    </table>
                </div>
                </div>
            </div>
        </div>
    </div>
</div>
</main>
@endsection
