<?php

namespace Tests\Feature\Http\Controller;

use App\Models\Asignatura;
use App\Models\Convalidacione;
use App\Models\Estudiante;
use App\Models\User;
use Illuminate\Foundation\Testing\RefreshDatabase;
use Spatie\Permission\Models\Permission;
use Spatie\Permission\Models\Role;
use Illuminate\Foundation\Testing\WithFaker;
use Tests\TestCase;

class ConvalidacioneControllerTest extends TestCase
{
    use RefreshDatabase, WithFaker;

    public function test_convalidacion_index()
    {
        $this->withoutExceptionHandling();
        $user = User::factory()->create()
                ->assignRole(Role::create(['name' => 'Administrador']));
                Convalidacione::factory()->create();
        $this
            ->actingAs($user)
            ->get('convalidaciones')
            ->assertStatus(200)
            ->assertViewIs('convalidaciones.index');
    }

    public function test_convalidacion_create()
    {
        $user = User::factory()->create()
                ->assignRole(Role::create(['name' => 'Administrador']));
        $this
            ->actingAs($user)
            ->get('convalidaciones/create')
            ->assertStatus(200)
            ->assertViewIs('convalidaciones.create');
    }

    public function test_convalidacion_validate_store()
    {
        $user = User::factory()->create()
                ->assignRole(Role::create(['name' => 'Administrador']));
        $this
            ->actingAs($user)
            ->post('convalidaciones', [])
            ->assertStatus(302)
            ->assertSessionHasErrors([
                'estudiante_id', 'asignatura_id', 'nota_final'
                ]);
    }

    public function test_convalidacion_store()
    {
        $data = Convalidacione::factory()->create();
        $user = User::factory()->create();
         $this
            ->actingAs($user)
            ->post('convalidaciones', $data->toArray());
        $this->assertEquals(1, Convalidacione::all()->count());
    }

    public function test_convalidacion_edit()
    {
        $user = User::factory()->create()
                ->assignRole(Role::create(['name' => 'Administrador']));
        $convalidacion = Convalidacione::factory()->create();
        $this
            ->actingAs($user)
            ->get("convalidaciones/$convalidacion->id/edit")
            ->assertStatus(200)
            ->assertViewIs('convalidaciones.edit');
    }

    public function test_convalidacion_validate_update()
    {
        $convalidacion = Convalidacione::factory()->create();
        $user = User::factory()->create()
                ->assignRole(Role::create(['name' => 'Administrador']));
        $this
            ->actingAs($user)
            ->put("convalidaciones/$convalidacion->id", [])
            ->assertStatus(302)
            ->assertSessionHasErrors([
                'estudiante_id', 'asignatura_id', 'nota_final'
            ]);
    }

    //PENDIENTE UPDATE

    public function test_convalidacion_destroy()
    {
        $user = User::factory()->create()
                ->assignRole(Role::create(['name' => 'Administrador']));
        $convalidacion = Convalidacione::factory()->create();
        $this
            ->actingAs($user)
            ->delete("convalidaciones/$convalidacion->id")
            ->assertRedirect('convalidaciones');
        $this->assertDeleted('convalidaciones');
    }

    //Policies
    public function test_convalidacion_policy_create()
    {
        $user = User::factory()->create();
        Permission::create(['name' => 'Crear convalidaciones']);
        $user->hasPermissionTo('Crear convalidaciones');

        $this
            ->actingAs($user)
            ->get('convalidaciones/create')
            ->assertStatus(403);
    }

    public function test_convalidacion_policy_edit()
    {
        $user = User::factory()->create();
        Permission::create(['name' => 'Actualizar convalidaciones']);
        $user->hasPermissionTo('Actualizar convalidaciones');

        $convalidacion = Convalidacione::factory()->create();
        $this
            ->actingAs($user)
            ->get("convalidaciones/$convalidacion->id/edit")
            ->assertStatus(403);
    }

    public function test_convalidacion_policy_destroy()
    {
        $user = User::factory()->create();
        Permission::create(['name' => 'Eliminar convalidaciones']);
        $user->hasPermissionTo('Eliminar convalidaciones');

        $convalidacion = Convalidacione::factory()->create();
        $this
            ->actingAs($user)
            ->delete("convalidaciones/$convalidacion->id")
            ->assertStatus(403);
    }
}
