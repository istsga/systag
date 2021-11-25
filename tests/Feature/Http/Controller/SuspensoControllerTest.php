<?php

namespace Tests\Feature\Http\Controller;

use App\Models\Suspenso;
use App\Models\User;
use Illuminate\Foundation\Testing\RefreshDatabase;
use Spatie\Permission\Models\Permission;
use Spatie\Permission\Models\Role;
use Illuminate\Foundation\Testing\WithFaker;
use Tests\TestCase;

class SuspensoControllerTest extends TestCase
{

    use RefreshDatabase, WithFaker;

    public function test_suspenso_index()
    {
        //$this->withoutExceptionHandling();
        $user = User::factory()->create()
                ->assignRole(Role::create(['name' => 'Administrador']));
                Suspenso::factory()->create();
        $this
            ->actingAs($user)
            ->get('suspensos')
            ->assertStatus(200)
            ->assertViewIs('suspensos.index');
    }

    public function test_suspenso_create()
    {
        $user = User::factory()->create()
                ->assignRole(Role::create(['name' => 'Admnistrador']));
        $this
            ->actingAs($user)
            ->get('suspensos/create')
            ->assertStatus(200)
            ->assertViewIs('suspensos.create');
    }

    public function test_suspenso_validate_store()
    {
        $user = User::factory()->create()
                ->assignRole(Role::create(['name' => 'Administrador']));
        $this
            ->actingAs($user)
            ->post('suspensos', [])
            ->assertStatus(302)
            ->assertSessionHasErrors([
                'asignacione_id', 'asignatura_id', 'estudiante_id', 'promedio_final', 'examen_suspenso', 'suma',
                'promedio_numero', 'promedio_letra', 'observacion'
                ]);
    }

    public function test_suspenso_store()
    {
        $data = Suspenso::factory()->create();
        $user = User::factory()->create();
         $this
            ->actingAs($user)
            ->post('suspensos', $data->toArray());
        $this->assertEquals(1, Suspenso::all()->count());
    }

    public function test_suspenso_edit()
    {
        $user = User::factory()->create()
                ->assignRole(Role::create(['name' => 'Administrador']));
        $data = Suspenso::factory()->create();
        $this
            ->actingAs($user)
            ->get("suspensos/$data->id/edit")
            ->assertStatus(200)
            ->assertViewIs('suspensos.edit');
    }

    public function test_suspenso_validate_update()
    {
        $data = Suspenso::factory()->create();
        $user = User::factory()->create()
                ->assignRole(Role::create(['name' => 'Administrador']));
        $this
            ->actingAs($user)
            ->put("suspensos/$data->id", [])
            ->assertStatus(302)
            ->assertSessionHasErrors([
                'asignacione_id', 'asignatura_id', 'estudiante_id', 'promedio_final', 'examen_suspenso', 'suma',
                'promedio_numero', 'promedio_letra', 'observacion'
            ]);
    }

    public function test_suspenso_update()
    {
        $user = User::factory()->create()
                ->assignRole(Role::create(['name' => 'Administrador']));
                $data = Suspenso::factory()->create();
                 $this
                    ->actingAs($user)
                    ->put("suspensos/$data->id", $data->toArray());
                $this->assertEquals(1, Suspenso::all()->count());
    }

    public function test_suspenso_destroy()
    {
        $user = User::factory()->create()
                ->assignRole(Role::create(['name' => 'Administrador']));
        $data = Suspenso::factory()->create();
        $this
            ->actingAs($user)
            ->delete("suspensos/$data->id")
            ->assertRedirect('suspensos');
        $this->assertDeleted('suspensos');
    }

    //Policies
    public function test_suspenso_policy_create()
    {
        $user = User::factory()->create();
        Permission::create(['name' => 'Crear suspensos']);
        $user->hasPermissionTo('Crear suspensos');
        $this
            ->actingAs($user)
            ->get('suspensos/create')
            ->assertStatus(403);
    }

    public function test_suspenso_policy_edit()
    {
        $user = User::factory()->create();
        Permission::create(['name' => 'Actualizar suspensos']);
        $user->hasPermissionTo('Actualizar suspensos');

        $data = Suspenso::factory()->create();
        $this
            ->actingAs($user)
            ->get("suspensos/$data->id/edit")
            ->assertStatus(403);
    }

    public function test_suspenso_policy_destroy()
    {
        $user = User::factory()->create();
        Permission::create(['name' => 'Eliminar suspensos']);
        $user->hasPermissionTo('Eliminar suspensos');

        $data = Suspenso::factory()->create();
        $this
            ->actingAs($user)
            ->delete("suspensos/$data->id")
            ->assertStatus(403);
    }

}
