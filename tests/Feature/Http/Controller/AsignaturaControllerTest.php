<?php

namespace Tests\Feature\Http\Controller;

use Illuminate\Foundation\Testing\RefreshDatabase;
use Illuminate\Foundation\Testing\WithFaker;
use Spatie\Permission\Models\Permission;
use Spatie\Permission\Models\Role;
use Tests\TestCase;
use App\Models\Asignatura;
use App\Models\Carrera;
use App\Models\Periodo;
use App\Models\User;

class AsignaturaControllerTest extends TestCase
{
    use RefreshDatabase, WithFaker;

    public function test_asignatura_index()
    {
        $user = User::factory()->create()
                ->assignRole(Role::create(['name' => 'Administrador']));
                Asignatura::factory()->create();
        $this
            ->actingAs($user)
            ->get('asignaturas')
            ->assertStatus(200)
            ->assertViewIs('asignaturas.index');
    }

    public function test_asignatura_create()
    {
        $user = User::factory()->create()
                ->assignRole(Role::create(['name' => 'Administrador']));
        $this
            ->actingAs($user)
            ->get('asignaturas/create')
            ->assertStatus(200)
            ->assertViewIs('asignaturas.create');
    }

    public function test_asignatura_validate_store()
    {
        $user = User::factory()->create()
                ->assignRole(Role::create(['name' => 'Administrador']));
        $this
            ->actingAs($user)
            ->post('asignaturas', [])
            ->assertStatus(302)
            ->assertSessionHasErrors([
                'carrera_id', 'periodo_id', 'cod_asignatura', 'nombre', 'cantidad_hora'
                ]);
    }

    public function test_asignatura_store()
    {
        $data = Asignatura::factory()->create();
        $user = User::factory()->create();
         $this
            ->actingAs($user)
            ->post('asignaturas', $data->toArray());
        $this->assertEquals(1, Asignatura::all()->count());
    }

    public function test_asignatura_edit()
    {
        $user = User::factory()->create()
                ->assignRole(Role::create(['name' => 'Administrador']));
        $asignatura = Asignatura::factory()->create();
        $this
            ->actingAs($user)
            ->get("asignaturas/$asignatura->id/edit")
            ->assertStatus(200)
            ->assertViewIs('asignaturas.edit');
    }

    public function test_asignatura_validate_update()
    {
        $asignatura = Asignatura::factory()->create();
        $user = User::factory()->create()
                ->assignRole(Role::create(['name' => 'Administrador']));
        $this
            ->actingAs($user)
            ->put("asignaturas/$asignatura->id", [])
            ->assertStatus(302)
            ->assertSessionHasErrors([
                'carrera_id', 'periodo_id', 'cod_asignatura', 'nombre', 'cantidad_hora'
                ]);
    }

    public function test_asignatura_update()
    {
        $user = User::factory()->create()
                ->assignRole(Role::create(['name' => 'Administrador']));
        $asignatura = Asignatura::factory()->create();
        $carrera = Carrera::factory()->create();
        $periodo = Periodo::factory()->create();
        $data = [
            'carrera_id' => $carrera->id,
            'periodo_id' => $periodo->id,
            'cod_asignatura' => '20ddf',
            'nombre' => 'Desarrollo Web',
            'cantidad_hora' => '50',
         ];

         $this
            ->actingAs($user)
            ->put("asignaturas/$asignatura->id", $data)
            ->assertRedirect('asignaturas');
        $this->assertDatabaseHas('asignaturas', $data);
    }

    public function test_asignatura_destroy()
    {
        $user = User::factory()->create()
                ->assignRole(Role::create(['name' => 'Administrador']));
        $asignatura = Asignatura::factory()->create();
        $this
            ->actingAs($user)
            ->delete("asignaturas/$asignatura->id")
            ->assertRedirect('asignaturas');
        $this->assertDeleted('asignaturas');
    }

    //Policies
    public function test_asignatura_policy_create()
    {
        $user = User::factory()->create();
        Permission::create(['name' => 'Crear asignaturas']);
        $user->hasPermissionTo('Crear asignaturas');

        $this
            ->actingAs($user)
            ->get('asignaturas/create')
            ->assertStatus(403);
    }

    public function test_asignatura_policy_store()
    {
        $carrera = Carrera::factory()->create();
        $periodo = Periodo::factory()->create();
        $data = [
            'carrera_id' => $carrera->id,
            'periodo_id' => $periodo->id,
            'cod_asignatura' => '20ddf',
            'nombre' => 'Desarrollo Web',
            'cantidad_hora' => '50',
         ];

        $user = User::factory()->create();
        Permission::create(['name' => 'Crear asignaturas']);
        $user->hasPermissionTo('Crear asignaturas');

        $this
            ->actingAs($user)
            ->post('asignaturas', $data)
            ->assertStatus(403);
    }

    public function test_asignatura_policy_edit()
    {
        $user = User::factory()->create();
        Permission::create(['name' => 'Actualizar asignaturas']);
        $user->hasPermissionTo('Actualizar asignaturas');

        $asignatura = Asignatura::factory()->create();
        $this
            ->actingAs($user)
            ->get("asignaturas/$asignatura->id/edit")
            ->assertStatus(403);
    }

    public function test_asignatura_policy_update()
    {
        $user = User::factory()->create();
        Permission::create(['name' => 'Actualizar asignaturas']);
        $user->hasPermissionTo('Actualizar asignaturas');

        $asignatura = Asignatura::factory()->create();
        $carrera = Carrera::factory()->create();
        $periodo = Periodo::factory()->create();
        $data = [
            'carrera_id' => $carrera->id,
            'periodo_id' => $periodo->id,
            'cod_asignatura' => '20ddf',
            'nombre' => 'Desarrollo Web',
            'cantidad_hora' => '50',
         ];
         $this
            ->actingAs($user)
            ->put("asignaturas/$asignatura->id", $data)
            ->assertStatus(403);
    }

    public function test_asignatura_policy_destroy()
    {
        $user = User::factory()->create();
        Permission::create(['name' => 'Eliminar asignaturas']);
        $user->hasPermissionTo('Eliminar asignaturas');

        $asignatura = Asignatura::factory()->create();
        $this
            ->actingAs($user)
            ->delete("asignaturas/$asignatura->id")
            ->assertStatus(403);
    }
}
