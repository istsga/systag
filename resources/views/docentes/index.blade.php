@extends('layouts.layout')
@section('title', ' Docentes |')
@section('content')

<main class="c-main">
<div class="container-fluid">
    <div class="fade-in">
        @include('partials.success')
        <div class="row">
            <div class="col-lg-12">
                <div class="card  shadow-lg">
                    <div class="card-header bg-primary  d-flex justify-content-between aling-items-end ">
                        <font class=" text-light align-self-center text-black vertical-align-inherit "> <i class=" fas fa-user-friends mr-3"></i> DOCENTES </font>
                        @can('create', new App\Models\Docente)
                            <a class=" btn btn-primary " href="{{route('docentes.create')}}"> <i class=" font-weight-bold fas fa-plus mr-1"></i>Agregar</a>
                        @endcan
                    </div>
                    <livewire:docentes-tabla></livewire:docentes-tabla>
                </div>
            </div>
        </div>
    </div>
</div>
</main>
@endsection
