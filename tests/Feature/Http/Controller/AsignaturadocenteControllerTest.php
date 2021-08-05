<?php

namespace Tests\Feature\Http\Controller;

use App\Models\Asignaturadocente;
use App\Models\User;
use Illuminate\Foundation\Testing\RefreshDatabase;
use Illuminate\Foundation\Testing\WithFaker;
use Spatie\Permission\Models\Permission;
use Spatie\Permission\Models\Role;
use Tests\TestCase;

class AsignaturadocenteControllerTest extends TestCase
{
    use RefreshDatabase, WithFaker;

    public function test_distributivo_index()
    {
        $user = User::factory()->create()
                ->assignRole(Role::create(['name' => 'Administrador']));
                Asignaturadocente::factory()->create();
        $this
            ->actingAs($user)
            ->get('asignaturadocentes')
            ->assertStatus(200)
            ->assertViewIs('asignaturadocentes.index');
    }

    public function test_distributivo_create()
    {
        $user = User::factory()->create()
                ->assignRole(Role::create(['name' => 'Administrador']));
        $this
            ->actingAs($user)
            ->get('asignaturadocentes/create')
            ->assertStatus(200)
            ->assertViewIs('asignaturadocentes.create');
    }

    public function test_distributivo_validate_store()
    {
        $user = User::factory()->create()
                ->assignRole(Role::create(['name' => 'Administrador']));
        $this
            ->actingAs($user)
            ->post('asignaturadocentes', [])
            ->assertStatus(302)
            ->assertSessionHasErrors([
                'asignacione_id', 'asignatura_id', 'docente_id'
                ]);
    }

    public function test_distributivo_store()
    {
        $data = Asignaturadocente::factory()->create();
        $user = User::factory()->create();
         $this
            ->actingAs($user)
            ->post('asignaturadocentes', $data->toArray());
        $this->assertEquals(1, Asignaturadocente::all()->count());
    }

    public function test_distributivo_edit()
    {
        $this->withoutExceptionHandling();
        $user = User::factory()->create()
                ->assignRole(Role::create(['name' => 'Administrador']));
        $data = Asignaturadocente::factory()->create();
        $this
            ->actingAs($user)
            ->get("asignaturadocentes/$data->id/edit")
            ->assertStatus(200)
            ->assertViewIs('asignaturadocentes.edit');
    }

    public function test_distributivo_validate_update()
    {
        $data = Asignaturadocente::factory()->create();
        $user = User::factory()->create()
                ->assignRole(Role::create(['name' => 'Administrador']));
        $this
            ->actingAs($user)
            ->put("asignaturadocentes/$data->id", [])
            ->assertStatus(302)
            ->assertSessionHasErrors([
                'asignacione_id', 'asignatura_id', 'docente_id'
                ]);
    }

    public function test_distributivo_update()
    {
        $user = User::factory()->create()
                ->assignRole(Role::create(['name' => 'Administrador']));
                $data = Asignaturadocente::factory()->create();
                 $this
                    ->actingAs($user)
                    ->put("asignaturadocentes/$data->id", $data->toArray());
                $this->assertEquals(1, Asignaturadocente::all()->count());
    }

    //Policies
    public function test_distributivo_policy_create()
    {
        $user = User::factory()->create();
        Permission::create(['name' => 'Crear distributivos']);
        $user->hasPermissionTo('Crear distributivos');

        $this
            ->actingAs($user)
            ->get('asignaturadocentes/create')
            ->assertStatus(403);
    }

    public function test_distributivo_policy_edit()
    {
        $user = User::factory()->create();
        Permission::create(['name' => 'Actualizar distributivos']);
        $user->hasPermissionTo('Actualizar distributivos');

        $data = Asignaturadocente::factory()->create();
        $this
            ->actingAs($user)
            ->get("asignaturadocentes/$data->id/edit")
            ->assertStatus(403);
    }



}
