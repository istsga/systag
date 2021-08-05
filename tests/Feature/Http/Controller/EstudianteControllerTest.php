<?php

namespace Tests\Feature\Http\Controller;

use Illuminate\Foundation\Testing\RefreshDatabase;
use Illuminate\Foundation\Testing\WithFaker;
use Tests\TestCase;
use App\Models\Estudiante;
use App\Models\Provincia;
use App\Models\User;
use Spatie\Permission\Models\Permission;
use Spatie\Permission\Models\Role;

class EstudianteControllerTest extends TestCase
{
    use RefreshDatabase, WithFaker;

    public function test_estudiante_index()
    {
        $user = User::factory()->create()
                ->assignRole(Role::create(['name' => 'Administrador']));
        Estudiante::factory()->create();
        $this
            ->actingAs($user)
            ->get('estudiantes')
            ->assertStatus(200)
            ->assertViewIs('estudiantes.index');
    }

    public function test_estudiante_create()
    {
        $user = User::factory()->create()
                ->assignRole(Role::create(['name' => 'Administrador']));
        $this
            ->actingAs($user)
            ->get('estudiantes/create')
            ->assertStatus(200)
            ->assertViewIs('estudiantes.create');
    }

    public function test_estudiante_validate_store()
    {
        $user = User::factory()->create();
        $this
            ->actingAs($user)
            ->post('estudiantes', [])
            ->assertStatus(302)
            ->assertSessionHasErrors([
                'tipo_identificacion','dni', 'nombre', 'apellido', 'foto' , 'estadocivile_id', 'fecha_nacimiento', 'nacionalidad','ocupacion', 'discapacidad',
                'etnia_id', 'email', 'tiposangre_id', 'miembro_hogar', 'ingreso_ec', 'direccion_provincia_id', 'direccion_cantone_id', 'calle',
                'telefono_movil', 'nombre_parentesco', 'telefono_parentesco', 'parentesco', 'institucion_origen', 'titulo_bachillerato',
                 'nombre_padre', 'ocupacion_padre', 'instruccione_id', 'nombre_madre', 'ocupacion_madre', 'madre_instruccione_id', 'estado'
            ]);
    }

    public function test_estudiante_store()
    {
        $data = Estudiante::factory()->create();
        $user = User::factory()->create();
         $this
            ->actingAs($user)
            ->post('estudiantes', $data->toArray());
        $this->assertEquals(1, Estudiante::all()->count());
    }

    public function test_estudiante_edit()
    {
        $user = User::factory()->create()
                ->assignRole(Role::create(['name' => 'Administrador']));
        $estudiante = Estudiante::factory()->create();
        $this
            ->actingAs($user)
            ->get("estudiantes/$estudiante->id/edit")
            ->assertStatus(200)
            ->assertViewIs('estudiantes.edit');
    }

    public function test_estudiante_validate_update()
    {
        $estudiante = Estudiante::factory()->create();
        $user = User::factory()->create()
                ->assignRole(Role::create(['name' => 'Administrador']));
        $this
            ->actingAs($user)
            ->put("estudiantes/$estudiante->id", [])
            ->assertStatus(302)
            ->assertSessionHasErrors([
                'tipo_identificacion','dni', 'nombre', 'apellido', 'estadocivile_id', 'fecha_nacimiento', 'nacionalidad','ocupacion', 'discapacidad',
                'etnia_id', 'email', 'tiposangre_id', 'miembro_hogar', 'ingreso_ec', 'direccion_provincia_id', 'direccion_cantone_id', 'calle',
                'telefono_movil', 'nombre_parentesco', 'telefono_parentesco', 'parentesco', 'institucion_origen', 'titulo_bachillerato',
                 'nombre_padre', 'ocupacion_padre', 'instruccione_id', 'nombre_madre', 'ocupacion_madre', 'madre_instruccione_id', 'estado'
            ]);
    }

    public function test_estudiante_update()
    {
        $user = User::factory()->create()
                ->assignRole(Role::create(['name' => 'Administrador']));
                $data = Estudiante::factory()->create();
                 $this
                    ->actingAs($user)
                    ->put("estudiantes/$data->id", $data->toArray());
                $this->assertEquals(1, Estudiante::all()->count());
    }

    public function test_estudiante_destroy()
    {
        $user = User::factory()->create()
                ->assignRole(Role::create(['name' => 'Administrador']));
        $estudiante = Estudiante::factory()->create();
        $this
            ->actingAs($user)
            ->delete("estudiantes/$estudiante->id")
            ->assertRedirect('estudiantes');
        $this->assertDeleted('estudiantes');
    }

    //Policies

    public function test_estudiante_policy_create()
    {
        $user = User::factory()->create();
        Permission::create(['name' => 'Crear estudiantes']);
        $user->hasPermissionTo('Crear estudiantes');
        $this
            ->actingAs($user)
            ->get('estudiantes/create')
            ->assertStatus(403);
    }

    public function test_estudiante_policy_edit()
    {
        $user = User::factory()->create();
        Permission::create(['name' => 'Actualizar estudiantes']);
        $user->hasPermissionTo('Actualizar estudiantes');

        $estudiante = Estudiante::factory()->create();
        $this
            ->actingAs($user)
            ->get("estudiantes/$estudiante->id/edit")
            ->assertStatus(403);
    }

    public function test_estudiante_policy_destroy()
    {
        $user = User::factory()->create();
        Permission::create(['name' => 'Eliminar estudiantes']);
        $user->hasPermissionTo('Eliminar estudiantes');

        $estudiante = Estudiante::factory()->create();
        $this
            ->actingAs($user)
            ->delete("estudiantes/$estudiante->id")
            ->assertStatus(403);
    }
}
