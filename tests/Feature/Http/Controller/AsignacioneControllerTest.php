<?php

namespace Tests\Feature\Http\Controller;

use Illuminate\Foundation\Testing\RefreshDatabase;
use Illuminate\Foundation\Testing\WithFaker;
use Spatie\Permission\Models\Permission;
use Spatie\Permission\Models\Role;
use Tests\TestCase;
use App\Models\Asignacione;
use App\Models\Carrera;
use App\Models\Periodacademico;
use App\Models\User;

class AsignacioneControllerTest extends TestCase
{
    use RefreshDatabase, WithFaker;

    public function test_asignacion_index()
    {
        $this->withoutExceptionHandling();
        $user = User::factory()->create()
                ->assignRole(Role::create(['name' => 'Administrador']));
                Asignacione::factory()->create();
        $this
            ->actingAs($user)
            ->get('asignaciones')
            ->assertStatus(200)
            ->assertViewIs('asignaciones.index');
    }

    public function test_asignacion_create()
    {
        $user = User::factory()->create()
                ->assignRole(Role::create(['name' => 'Administrador']));
        $this
            ->actingAs($user)
            ->get('asignaciones/create')
            ->assertStatus(200)
            ->assertViewIs('asignaciones.create');
    }

    public function test_asignacion_validate_store()
    {
        $user = User::factory()->create();
        $this
            ->actingAs($user)
            ->post('asignaciones', [])
            ->assertStatus(302)
            ->assertSessionHasErrors([
                'periodacademicos', 'carreras', 'periodo_id', 'seccione_id', 'paralelo_id'
            ]);
    }

    public function test_asignacion_store()
    {
        $data = Asignacione::factory()->create();
        $user = User::factory()->create();
         $this
            ->actingAs($user)
            ->post('asignaciones', $data->toArray());
        $this->assertEquals(1, Asignacione::all()->count());
    }

    public function test_asignacion_edit()
    {
        $user = User::factory()->create()
                ->assignRole(Role::create(['name' => 'Administrador']));
        $asignacione = Asignacione::factory()->create();
        $this
            ->actingAs($user)
            ->get("asignaciones/$asignacione->id/edit")
            ->assertStatus(200)
            ->assertViewIs('asignaciones.edit');
    }

    public function test_asignacion_validate_update()
    {
        $asignacione = Asignacione::factory()->create();
        $user = User::factory()->create()
                ->assignRole(Role::create(['name' => 'Administrador']));
        $this
            ->actingAs($user)
            ->put("asignaciones/$asignacione->id", [])
            ->assertStatus(302)
            ->assertSessionHasErrors([
                'periodacademicos', 'carreras', 'periodo_id', 'seccione_id', 'paralelo_id'
                ]);
    }

    public function test_asignacion_update()
    {
        $user = User::factory()->create()
                ->assignRole(Role::create(['name' => 'Administrador']));
                $data = Asignacione::factory()->create();
                 $this
                    ->actingAs($user)
                    ->put("asignaciones/$data->id", $data->toArray());
                $this->assertEquals(1, Asignacione::all()->count());
    }

    public function test_asignacion_belongs_to_many_store_carreras()
    {
        $asignacione = Asignacione::factory()
            ->count(1)
            ->has(Carrera::factory()->count(3))
            ->create();
        $asignacione->each(function($asignacione){
            $asignacione->carreras->toArray();
        });
        $this->assertDatabaseCount('asignaciones', 1);
    }

    public function test_asignacion_belongs_to_many_store_periodo_academico()
    {
        $asignacione = Asignacione::factory()
            ->count(1)
            ->has(Periodacademico::factory()->count(3))
            ->create();
        $asignacione->each(function($asignacione){
            $asignacione->periodacademicos->toArray();
        });
        $this->assertDatabaseCount('asignaciones', 1);
    }

    public function test_asignacion_destroy()
    {
        $user = User::factory()->create()
                ->assignRole(Role::create(['name' => 'Administrador']));
        $asignacione = Asignacione::factory()->create();
        $this
            ->actingAs($user)
            ->delete("asignaciones/$asignacione->id")
            ->assertRedirect('asignaciones');
        $this->assertDeleted('asignaciones');
    }

    //Policies

    public function test_asignacion_policy_create()
    {
        $user = User::factory()->create();
        Permission::create(['name' => 'Crear asignaciones']);
        $user->hasPermissionTo('Crear asignaciones');
        $this
            ->actingAs($user)
            ->get('asignaciones/create')
            ->assertStatus(403);
    }

    public function test_asignacion_policy_edit()
    {
        $user = User::factory()->create();
        Permission::create(['name' => 'Actualizar asignaciones']);
        $user->hasPermissionTo('Actualizar asignaciones');

        $asignacione = Asignacione::factory()->create();
        $this
            ->actingAs($user)
            ->get("asignaciones/$asignacione->id/edit")
            ->assertStatus(403);
    }

    public function test_asignacion_policy_destroy()
    {
        $user = User::factory()->create();
        Permission::create(['name' => 'Eliminar asignaciones']);
        $user->hasPermissionTo('Eliminar asignaciones');

        $asignacione = Asignacione::factory()->create();
        $this
            ->actingAs($user)
            ->delete("asignaciones/$asignacione->id")
            ->assertStatus(403);
    }

}
