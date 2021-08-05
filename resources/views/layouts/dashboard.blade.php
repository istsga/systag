@extends('layouts.layout')
@section('title', ' Inicio |')
@section('content')
<main class="c-main">
    <div class="container-fluid">
      <div class="fade-in">
        <div class="row">
          <div class="col-sm-6 col-lg-4">
            <div class="card">
              <div class="card-header bg-primary content-center">
                <div class="c-icon c-icon-3xl text-white my-4">
                  <i class="fas fa-users"></i>
                </div>
              </div>
              <div class="card-body row text-center">
                <div class="col">
                  <div class="text-value-xl">Estudiantes</div>
                  <div class="text-uppercase text-muted small">matriculados</div>
                </div>
                <div class="c-vr"></div>
                <div class="col">
                  <div class="text-value-xl">459</div>
                  <div class="text-uppercase text-muted small">feeds</div>
                </div>
              </div>
            </div>
          </div>
          <!-- /.col-->
          <div class="col-sm-6 col-lg-4">
            <div class="card">
              <div class="card-header bg-dark content-center">
                <div class="c-icon c-icon-3xl text-white my-4">
                  <i class="fas fa-chalkboard-teacher"></i>
                </div>
              </div>
              <div class="card-body row text-center">
                <div class="col">
                  <div class="text-value-xl">Docentes</div>
                  <div class="text-uppercase text-muted small">followers</div>
                </div>
                <div class="c-vr"></div>
                <div class="col">
                  <div class="text-value-xl">1.792</div>
                  <div class="text-uppercase text-muted small">tweets</div>
                </div>
              </div>
            </div>
          </div>
          <!-- /.col-->
          <div class="col-sm-6 col-lg-4">
            <div class="card">
              <div class="card-header bg-twitter content-center">
                <div class="c-icon c-icon-3xl text-white my-4">
                  <i class="fas fa-graduation-cap"></i>
                </div>
              </div>
              <div class="card-body row text-center">
                <div class="col">
                  <div class="text-value-xl">Estudiantes</div>
                  <div class="text-uppercase text-muted small">Egresados</div>
                </div>
                <div class="c-vr"></div>
                <div class="col">
                  <div class="text-value-xl">292</div>
                  <div class="text-uppercase text-muted small">feeds</div>
                </div>
              </div>
            </div>
          </div>
          <!-- /.col-->
        </div>
        <!-- /.row-->
        <div class="row">
          <div class="col-md-12">
            <div class="card">
              <div class="card-header">Traffic & Sales</div>
              <div class="card-body">
                <div class="row">
                  <div class="col-sm-6">
                    <div class="row">
                      <div class="col-6">
                        <div class="c-callout c-callout-info"><small class="text-muted">New Clients</small>
                          <div class="text-value-lg">9,123</div>
                        </div>
                      </div>
                      <!-- /.col-->
                      <div class="col-6">
                        <div class="c-callout c-callout-danger"><small class="text-muted">Recuring Clients</small>
                          <div class="text-value-lg">22,643</div>
                        </div>
                      </div>
                      <!-- /.col-->
                    </div>

                </div>

              </div>
            </div>
          </div>
          <!-- /.col-->
        </div>
        <!-- /.row-->
      </div>
    </div>
</main>

@endsection
