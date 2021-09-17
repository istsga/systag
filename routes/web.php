<?php

use Illuminate\Support\Facades\Route;
use App\Http\Controllers\HomeController;
use App\Http\Controllers\RoleController;
use App\Http\Controllers\PermisoController;
use App\Http\Controllers\UserController;
use App\Http\Controllers\UserPermisoController;
use App\Http\Controllers\UserRoleController;
use App\Http\Controllers\CarreraController;
use App\Http\Controllers\PeriodoController;
use App\Http\Controllers\SeccioneController;
use App\Http\Controllers\ParaleloController;
use App\Http\Controllers\AsignaturaController;
use App\Http\Controllers\PeriodacademicoController;
use App\Http\Controllers\AsignacioneController;
use App\Http\Controllers\EstudianteController;
use App\Http\Controllers\DocenteController;
use App\Http\Controllers\ConvalidacioneController;
use App\Http\Controllers\MatriculaController;
use App\Http\Controllers\AsignaturadocenteController;
use App\Http\Controllers\CalificacioneController;
use App\Http\Controllers\SuspensoController;
use App\Http\Controllers\HorarioController;
use App\Http\Controllers\ReporteController;

use App\Http\Controllers\CalificacionperiodoController;
use App\Http\Controllers\EstudiantenominaController;
use App\Http\Controllers\EgresadoController;
use App\Http\Controllers\UserinstruccioneController;
use App\Http\Controllers\RecordacademicoController;
use App\Http\Controllers\CertificadoperiodoController;
use App\Http\Controllers\HorarioclaseController;

/*
|--------------------------------------------------------------------------
| Web Routes
|--------------------------------------------------------------------------
|
| Here is where you can register web routes for your application. These
| routes are loaded by the RouteServiceProvider within a group which
| contains the "web" middleware group. Now create something great!
|
*/

// Route::get('/', function () {
//     return view('welcome');
// });

// Route::get('email', function(){
//     return new App\Mail\LoginCredentials(App\Models\User::first(), 'abc12345' );
// });


Route::get('/', function () { return view('auth.login');})->middleware('guest');
Route::get('/home', [HomeController::class, 'index'])->name('home');

Route::resource('users', UserController::class);
Route::get('profile', [UserController::class, 'profile']);
Route::post('profile', [UserController::class, 'update_avatar']);

Route::middleware('role:Administrador')
->put('users/{user}/permisos', [UserPermisoController::class, 'update'])->name('users.permisos.update');

Route::middleware('role:Administrador')
->put('users/{user}/roles', 'UsersRolesController@update')->name('users.roles.update');

Route::resource('roles', RoleController::class)->except(['show']);
Route::resource('permisos', PermisoController::class)->only(['index']);

Route::resource('carreras', CarreraController::class)->except(['show']);
Route::resource('periodos', PeriodoController::class)->except(['show']);
Route::resource('secciones', SeccioneController::class)->except(['show']);
Route::resource('paralelos', ParaleloController::class)->except(['show']);

Route::resource('asignaturas', AsignaturaController::class)->except(['show']);
Route::get('/getPrerequisitos/{id}', [AsignaturaController::class, 'getPrerequisitos'])
    ->name('getPrerequisitos');

Route::resource('periodacademicos', PeriodacademicoController::class)->except(['show']);
Route::resource('asignaciones', AsignacioneController::class)->except(['show']);
Route::resource('estudiantes', EstudianteController::class);
Route::resource('docentes', DocenteController::class);

Route::resource('convalidaciones', ConvalidacioneController::class);
Route::get('/getConvalidaciones/{id}', [ConvalidacioneController::class, 'getConvalidaciones'])
    ->name('getConvalidaciones');

Route::resource('matriculas', MatriculaController::class);
Route::get('/getAsignaciones/{estudiante_id}', [MatriculaController::class, 'getAsignaciones'])
    ->name('getAsignaciones');
Route::get('/getAsignaturas/{id}/{estudiante_id}', [MatriculaController::class, 'getAsignaturas'])
    ->name('getAsignaturas');

Route::resource('asignaturadocentes', AsignaturadocenteController::class);
Route::resource('calificaciones', CalificacioneController::class);
Route::resource('suspensos', SuspensoController::class);
Route::resource('horarios', HorarioController::class);

//REPORTES PDF
Route::get('reportes-matriculas/{id}/data', [ReporteController::class, 'reporteMatricula'])->name('reporteMatricula');
Route::get('reportes-horarios/{id}/data', [ReporteController::class, 'reporteHorarioE'])->name('reporteHorarioE');
Route::get('reportes-horarioclase/{id}/data', [ReporteController::class, 'reporteHorarioClase'])->name('reporteHorarioClase');
Route::get('reportes-calificaciones/{id}/data', [ReporteController::class, 'reporteCalificacion'])->name('reporteCalificacion');
Route::get('reportes-suspensos/{id}/data', [ReporteController::class, 'reporteSuspenso'])->name('reporteSuspenso');
Route::get('reportes-calificacionperiodos/{id}/data', [ReporteController::class, 'reporteCalificacionperiodo'])->name('reporteCalificacionperiodo');
Route::get('reportes-egresado/{id}/data', [ReporteController::class, 'reporteEgresado'])->name('reporteEgresado');


//INSTRUCCIONES
Route::resource('calificacionperiodos', CalificacionperiodoController::class)->only(['index']);
Route::resource('estudiantenominas', EstudiantenominaController::class)->only(['index']);
Route::resource('egresados', EgresadoController::class)->only(['index']);
Route::resource('userinstrucciones', UserinstruccioneController::class)->only(['index']);
Route::resource('recordacademicos', RecordacademicoController::class)->only(['index']); //Incluye reporte PDF
Route::resource('certificadoperiodos', CertificadoperiodoController::class)->only(['index']); //Incluye reporte PDF
Route::resource('horarioclases', HorarioclaseController::class)->only(['index']);


//PETICIONES ASINCRONAS
 //Usuarios
 Route::get('/getUsuarios/{id}', [UserController::class,'getUsuarios'])->name('getUsuarios');

 //Horarios
 Route::get('/getAsignaturashor/{id}', [HorarioController::class,'getAsignaturashor'])->name('getAsignaturashor');

 //Carga Horaria y Distributivo
 Route::get('/getAsignaturasdis/{id}', [AsignaturadocenteController::class,'getAsignaturasdis'])->name('getAsignaturasdis');

 //Calificacion
 Route::get('/getAsignacionescal/{id}', [CalificacioneController::class,'getAsignacionescal'])->name('getAsignacionescal');
 Route::get('/getAsignaturascal/{id}', [CalificacioneController::class, 'getAsignaturascal'])->name('getAsignaturascal');
 Route::get('/getEstudiantescal/{id}', [CalificacioneController::class, 'getEstudiantescal'])->name('getEstudiantescal');
//  Route::get('/getAsignacionesfiltro/{id}', [CalificacioneController::class, 'getAsignacionesfiltro'])->name('getAsignacionesfiltro');
//  Route::get('/getAsignaturasfiltro/{id}', [CalificacioneController::class, 'getAsignaturasfiltro'])->name('getAsignaturasfiltro');

 //Suspensos
 Route::get('/getAsignacionessus/{id}', [SuspensoController::class,'getAsignacionessus'])->name('getAsignacionessus');
 Route::get('/getAsignaturassus/{id}', [SuspensoController::class, 'getAsignaturassus'])->name('getAsignaturassus');
 Route::get('/getEstudiantessus/{id}', [SuspensoController::class, 'getEstudiantessus'])->name('getEstudiantessus');







