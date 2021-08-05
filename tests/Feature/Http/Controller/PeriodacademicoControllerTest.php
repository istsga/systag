<?php

namespace Tests\Feature\Http\Controller;

use Illuminate\Foundation\Testing\RefreshDatabase;
use Illuminate\Foundation\Testing\WithFaker;
use Spatie\Permission\Models\Permission;
use Spatie\Permission\Models\Role;
use App\Models\Periodacademico;
use App\Models\Carrera;
use App\Models\User;
use Tests\TestCase;

class PeriodacademicoControllerTest extends TestCase
{
    use RefreshDatabase, WithFaker;

    public function test_periodo_academico_index()
    {
        $user = User::factory()->create()
                ->assignRole(Role::create(['name' => 'Administrador']));
        Periodacademico::factory()->create();
        $this
            ->actingAs($user)
            ->get('periodacademicos')
            ->assertStatus(200)
            ->assertViewIs('periodacademicos.index');
    }

    public function test_periodo_academico_create()
    {
        $user = User::factory()->create()
                ->assignRole(Role::create(['name' => 'Administrador']));
        $this
            ->actingAs($user)
            ->get('periodacademicos/create')
            ->assertStatus(200)
            ->assertViewIs('periodacademicos.create');
    }

    public function test_periodo_academico_validate_store()
    {
        $user = User::factory()->create();
        $this
            ->actingAs($user)
            ->post('periodacademicos', [])
            ->assertStatus(302)
            ->assertSessionHasErrors([
                'estado', 'periodo', 'fecha_inicio', 'fecha_final', 'carreras'
            ]);
    }

    public function test_periodo_academico_store()
    {
        $data = Periodacademico::factory()->create();
        $user = User::factory()->create();
         $this
            ->actingAs($user)
            ->post('periodacademicos', $data->toArray());
        $this->assertEquals(1, Periodacademico::all()->count());
    }

    public function test_periodo_academico_edit()
    {
        $user = User::factory()->create()
                ->assignRole(Role::create(['name' => 'Administrador']));
        $periodacademico = Periodacademico::factory()->create();
        $this
            ->actingAs($user)
            ->get("periodacademicos/$periodacademico->id/edit")
            ->assertStatus(200)
            ->assertViewIs('periodacademicos.edit');
    }

    public function test_periodo_academico_validate_update()
    {
        $periodacademico = Periodacademico::factory()->create();
        $user = User::factory()->create()
                ->assignRole(Role::create(['name' => 'Administrador']));
        $this
            ->actingAs($user)
            ->put("periodacademicos/$periodacademico->id", [])
            ->assertStatus(302)
            ->assertSessionHasErrors([
                'estado', 'periodo', 'fecha_inicio', 'fecha_final', 'carreras'
                ]);
    }

    public function test_periodo_academico_update()
    {
        $user = User::factory()->create()
                ->assignRole(Role::create(['name' => 'Administrador']));
                $data = Periodacademico::factory()->create();
                 $this
                    ->actingAs($user)
                    ->put("periodacademicos/$data->id", $data->toArray());
                $this->assertEquals(1, Periodacademico::all()->count());
    }

    public function test_periodo_academico_belongs_to_many_carreras()
    {
        $periodacademico = Periodacademico::factory()
            ->count(1)
            ->has(Carrera::factory()->count(3))
            ->create();

        $periodacademico->each(function($periodacademico){
            $periodacademico->carreras->toArray();
        });
        $this->assertDatabaseCount('periodacademicos', 1);
    }

    public function test_periodo_academico_destroy()
    {
        $user = User::factory()->create()
                ->assignRole(Role::create(['name' => 'Administrador']));
        $periodacademico = Periodacademico::factory()->create();
        $this
            ->actingAs($user)
            ->delete("periodacademicos/$periodacademico->id")
            ->assertRedirect('periodacademicos');
        $this->assertDeleted('periodacademicos');
    }

    //Policies

    public function test_periodo_academico_policy_create()
    {
        $user = User::factory()->create();
        Permission::create(['name' => 'Crear periodos academicos']);
        $user->hasPermissionTo('Crear periodos academicos');
        $this
            ->actingAs($user)
            ->get('periodacademicos/create')
            ->assertStatus(403);
    }

    public function test_periodo_academico_policy_edit()
    {
        $user = User::factory()->create();
        Permission::create(['name' => 'Actualizar periodos academicos']);
        $user->hasPermissionTo('Actualizar periodos academicos');

        $periodacademico = Periodacademico::factory()->create();
        $this
            ->actingAs($user)
            ->get("periodacademicos/$periodacademico->id/edit")
            ->assertStatus(403);
    }

    public function test_periodo_academico_policy_destroy()
    {
        $user = User::factory()->create();
        Permission::create(['name' => 'Eliminar periodos academicos']);
        $user->hasPermissionTo('Eliminar periodos academicos');

        $periodacademico = Periodacademico::factory()->create();
        $this
            ->actingAs($user)
            ->delete("periodacademicos/$periodacademico->id")
            ->assertStatus(403);
    }



}
