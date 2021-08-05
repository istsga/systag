<?php

namespace Tests\Feature\Http\Controller;

use Illuminate\Foundation\Testing\RefreshDatabase;
use Illuminate\Foundation\Testing\WithFaker;
use Spatie\Permission\Models\Permission;
use Spatie\Permission\Models\Role;
use Tests\TestCase;
use App\Models\User;
use App\Models\Periodo;

class PeriodoControllerTest extends TestCase
{
    use RefreshDatabase, WithFaker;

    public function test_periodo_index()
    {
        $user = User::factory()->create()
                ->assignRole(Role::create(['name' => 'Administrador']));
                Periodo::factory()->create();
        $this
            ->actingAs($user)
            ->get('periodos')
            ->assertStatus(200)
            ->assertViewIs('periodos.index');

    }

    public function test_periodo_create()
    {
        $user = User::factory()->create()
                ->assignRole(Role::create(['name' => 'Administrador']));
        $this
            ->actingAs($user)
            ->get('periodos/create')
            ->assertStatus(200)
            ->assertViewIs('periodos.create');
    }

    public function test_periodo_validate_store()
    {
        $user = User::factory()->create()
                ->assignRole(Role::create(['name' => 'Administrador']));
        $this
            ->actingAs($user)
            ->post('periodos', [])
            ->assertStatus(302)
            ->assertSessionHasErrors(['nombre']);
    }

    public function test_periodo_store()
    {
        $data = [
            'nombre'            =>'I Periodo',
        ];
        $user = User::factory()->create()
                ->assignRole(Role::create(['name' => 'Administrador']));
        $this
            ->actingAs($user)
            ->post('periodos', $data)
            ->assertRedirect('periodos');
        $this->assertDatabaseHas('periodos', $data);
    }

    public function test_periodo_edit()
    {
        $user = User::factory()->create()
                ->assignRole(Role::create(['name' => 'Administrador']));
        $periodo = Periodo::factory()->create();
        $this
            ->actingAs($user)
            ->get("periodos/$periodo->id/edit")
            ->assertStatus(200)
            ->assertViewIs('periodos.edit');
    }

    public function test_periodo_validate_update()
    {
        $periodo = Periodo::factory()->create();
        $user = User::factory()->create()
                ->assignRole(Role::create(['name' => 'Administrador']));
        $this
            ->actingAs($user)
            ->put("periodos/$periodo->id", [])
            ->assertStatus(302)
            ->assertSessionHasErrors([ 'nombre']);
    }

    public function test_periodo_update()
    {
        $user = User::factory()->create()
                ->assignRole(Role::create(['name' => 'Administrador']));
        $periodo = Periodo::factory()->create();
        $data = [ 'nombre' =>'I Periodo' ];

         $this
            ->actingAs($user)
            ->put("periodos/$periodo->id", $data)
            ->assertRedirect('periodos');
        $this->assertDatabaseHas('periodos', $data);
    }

    public function test_periodo_destroy()
    {
        $user = User::factory()->create()
                ->assignRole(Role::create(['name' => 'Administrador']));
        $periodo = Periodo::factory()->create();
        $this
            ->actingAs($user)
            ->delete("periodos/$periodo->id")
            ->assertRedirect('periodos');
        $this->assertDeleted('periodos');
    }

    //Policies
    public function test_periodo_policy_create()
    {
        $user = User::factory()->create();
        Permission::create(['name' => 'Crear periodos']);
        $user->hasPermissionTo('Crear periodos');

        $this
            ->actingAs($user)
            ->get('periodos/create')
            ->assertStatus(403);
    }

    public function test_periodo_policy_store()
    {
        $data = [
            'nombre'            =>'I Periodo',
        ];

        $user = User::factory()->create();
        Permission::create(['name' => 'Crear periodos']);
        $user->hasPermissionTo('Crear periodos');

        $this
            ->actingAs($user)
            ->post('periodos', $data)
            ->assertStatus(403);
    }

    public function test_periodo_policy_edit()
    {
        $user = User::factory()->create();
        Permission::create(['name' => 'Actualizar periodos']);
        $user->hasPermissionTo('Actualizar periodos');

        $carrera = Periodo::factory()->create();
        $this
            ->actingAs($user)
            ->get("periodos/$carrera->id/edit")
            ->assertStatus(403);
    }

    public function test_periodo_policy_update()
    {
        $user = User::factory()->create();
        Permission::create(['name' => 'Actualizar periodos']);
        $user->hasPermissionTo('Actualizar periodos');

        $periodo = Periodo::factory()->create();
        $data = [
            'nombre'            =>'I Periodo',
        ];
         $this
            ->actingAs($user)
            ->put("periodos/$periodo->id", $data)
            ->assertStatus(403);
    }

    public function test_periodo_policy_destroy()
    {
        $user = User::factory()->create();
        Permission::create(['name' => 'Eliminar periodos']);
        $user->hasPermissionTo('Eliminar periodos');

        $periodo = Periodo::factory()->create();
        $this
            ->actingAs($user)
            ->delete("periodos/$periodo->id")
            ->assertStatus(403);
    }



}
