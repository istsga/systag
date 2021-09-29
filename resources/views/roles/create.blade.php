@extends('layouts.layout')
@section('title', ' Roles |')
@section('content')

<main class="c-main">
<div class="container-fluid">
    <div class="fade-in">
        <div class="row justify-content-center ">

              <div class="col-lg-6">
                <div class="card shadow-lg">
                    <div class="card-header bg-primary">
                        <h4 class=" text-light"><i class="fas fa-user-shield  mr-3"></i> <span class="text-value">ROLES</span> </h4>
                    </div>
                  <div class="card-body">
                      <div class="row">
                          <div class="card col-lg-11 ml-4 mt-2 shadow-sm">

                            <form method="POST"  action="{{ route('roles.store')}} ">
                                @csrf
                                    @include('roles.form')
                                <div class="form-actions ml-3 mb-3 ">
                                    <button class=" col-4 btn btn-primary" type="submit">Guardar</button>
                                </div>
                            </form>
                          </div>
                      </div>
                  </div>
                </div>
              </div>
        </div>
    </div>
</div>
</main>
@endsection
