@extends('layouts.layout')
@section('title', ' Matrículas |')
@section('content')

<main class="c-main">
<div class="container-fluid">
    <div class="fade-in">
        @include('partials.success')
        <div class="row">
            <div class="col-md-12">
                <div class="card shadow-lg ">
                    <div class="card-header bg-primary  d-flex justify-content-between aling-items-end ">
                        <font class=" text-light align-self-center text-black vertical-align-inherit "> <i class="font-weight-bold fas fa-book  mr-3"></i> MATRÍCULAS </font>
                        @can('create', new App\Models\Matricula)
                            <a class=" btn btn-primary " href="{{route('matriculas.create')}}"> <i class=" font-weight-bold fas fa-plus mr-1"></i>Agregar</a>
                        @endcan
                    </div>
                    <livewire:matriculas-tabla> </livewire:matriculas-tabla>
                </div>
            </div>
        </div>
    </div>
</div>
</main>
@endsection
