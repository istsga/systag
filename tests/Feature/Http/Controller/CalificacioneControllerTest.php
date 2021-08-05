<?php

namespace Tests\Feature\Http\Controller;

use App\Models\Calificacione;
use App\Models\User;
use Illuminate\Foundation\Testing\RefreshDatabase;
use Spatie\Permission\Models\Permission;
use Spatie\Permission\Models\Role;
use Illuminate\Foundation\Testing\WithFaker;
use Tests\TestCase;

class CalificacioneControllerTest extends TestCase
{
    use RefreshDatabase, WithFaker;

    public function test_calificacion_index()
    {
        //$this->withoutExceptionHandling();
        $user = User::factory()->create()
                ->assignRole(Role::create(['name' => 'Administrador']));
                Calificacione::factory()->create();
        $this
            ->actingAs($user)
            ->get('calificaciones')
            ->assertStatus(200)
            ->assertViewIs('calificaciones.index');
    }

    public function test_calificacion_create()
    {
        $user = User::factory()->create()
                ->assignRole(Role::create(['name' => 'Administrador']));
        $this
            ->actingAs($user)
            ->get('calificaciones/create')
            ->assertStatus(200)
            ->assertViewIs('calificaciones.create');
    }

    public function test_calificacion_validate_store()
    {
        $user = User::factory()->create()
                ->assignRole(Role::create(['name' => 'Administrador']));
        $this
            ->actingAs($user)
            ->post('calificaciones', [])
            ->assertStatus(302)
            ->assertSessionHasErrors([
                'asignacione_id', 'asignatura_id', 'estudiante_id', 'docencia'
                ]);
    }

    public function test_calificacion_store()
    {
        $data = Calificacione::factory()->create();
        $user = User::factory()->create();
         $this
            ->actingAs($user)
            ->post('calificaciones', $data->toArray());
        $this->assertEquals(1, Calificacione::all()->count());
    }

    public function test_calificacion_edit()
    {
        $user = User::factory()->create()
                ->assignRole(Role::create(['name' => 'Administrador']));
        $data = Calificacione::factory()->create();
        $this
            ->actingAs($user)
            ->get("calificaciones/$data->id/edit")
            ->assertStatus(200)
            ->assertViewIs('calificaciones.edit');
    }

    public function test_calificacion_validate_update()
    {
        $data = Calificacione::factory()->create();
        $user = User::factory()->create()
                ->assignRole(Role::create(['name' => 'Administrador']));
        $this
            ->actingAs($user)
            ->put("calificaciones/$data->id", [])
            ->assertStatus(302)
            ->assertSessionHasErrors([
                'asignacione_id', 'asignatura_id', 'estudiante_id', 'docencia'
            ]);
    }

    public function test_calificacion_update()
    {
        $user = User::factory()->create()
                ->assignRole(Role::create(['name' => 'Administrador']));
                $data = Calificacione::factory()->create();
                 $this
                    ->actingAs($user)
                    ->put("calificaciones/$data->id", $data->toArray());
                $this->assertEquals(1, Calificacione::all()->count());
    }

    public function test_calificacione_destroy()
    {
        $user = User::factory()->create()
                ->assignRole(Role::create(['name' => 'Administrador']));
        $data = Calificacione::factory()->create();
        $this
            ->actingAs($user)
            ->delete("calificaciones/$data->id")
            ->assertRedirect('calificaciones');
        $this->assertDeleted('calificaciones');
    }

    //Policies
    public function test_calificacion_policy_create()
    {
        $user = User::factory()->create();
        Permission::create(['name' => 'Crear calificaciones']);
        $user->hasPermissionTo('Crear calificaciones');
        $this
            ->actingAs($user)
            ->get('calificaciones/create')
            ->assertStatus(403);
    }

    public function test_calificacion_policy_edit()
    {
        $user = User::factory()->create();
        Permission::create(['name' => 'Actualizar calificaciones']);
        $user->hasPermissionTo('Actualizar calificaciones');

        $data = Calificacione::factory()->create();
        $this
            ->actingAs($user)
            ->get("calificaciones/$data->id/edit")
            ->assertStatus(403);
    }

    public function test_calificacion_policy_destroy()
    {
        $user = User::factory()->create();
        Permission::create(['name' => 'Eliminar calificaciones']);
        $user->hasPermissionTo('Eliminar calificaciones');

        $data = Calificacione::factory()->create();
        $this
            ->actingAs($user)
            ->delete("calificaciones/$data->id")
            ->assertStatus(403);
    }
}
