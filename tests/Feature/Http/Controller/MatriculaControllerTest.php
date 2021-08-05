<?php

namespace Tests\Feature\Http\Controller;

use App\Models\Matricula;
use App\Models\User;
use Illuminate\Foundation\Testing\RefreshDatabase;
use Spatie\Permission\Models\Permission;
use Spatie\Permission\Models\Role;
use Illuminate\Foundation\Testing\WithFaker;
use Tests\TestCase;

class MatriculaControllerTest extends TestCase
{
    use RefreshDatabase, WithFaker;

    public function test_matricula_index()
    {
        $this->withoutExceptionHandling();
        $user = User::factory()->create()
                ->assignRole(Role::create(['name' => 'Administrador']));
                Matricula::factory()->create();
        $this
            ->actingAs($user)
            ->get('matriculas')
            ->assertStatus(200)
            ->assertViewIs('matriculas.index');
    }

    public function test_matricula_create()
    {
        $user = User::factory()->create()
                ->assignRole(Role::create(['name' => 'Administrador']));
        $this
            ->actingAs($user)
            ->get('matriculas/create')
            ->assertStatus(200)
            ->assertViewIs('matriculas.create');
    }

    public function test_matricula_validate_store()
    {
        $user = User::factory()->create()
                ->assignRole(Role::create(['name' => 'Administrador']));
        $this
            ->actingAs($user)
            ->post('matriculas', [])
            ->assertStatus(302)
            ->assertSessionHasErrors([
                'asignacione_id', 'estudiante_id', 'fecha_matricula', 'asignaturas', 'tipo'
                ]);
    }

    public function test_matricula_store()
    {
        $data = Matricula::factory()->create();
        $user = User::factory()->create();
         $this
            ->actingAs($user)
            ->post('matriculas', $data->toArray());
        $this->assertEquals(1, Matricula::all()->count());
    }

    public function test_matricula_edit()
    {
        $this->withoutExceptionHandling();
        $user = User::factory()->create()
                ->assignRole(Role::create(['name' => 'Administrador']));
        $matricula = Matricula::factory()->create();
        $this
            ->actingAs($user)
            ->get("matriculas/$matricula->id/edit")
            ->assertStatus(200)
            ->assertViewIs('matriculas.edit');
    }

    public function test_matricula_validate_update()
    {
        $matricula = Matricula::factory()->create();
        $user = User::factory()->create()
                ->assignRole(Role::create(['name' => 'Administrador']));
        $this
            ->actingAs($user)
            ->put("matriculas/$matricula->id", [])
            ->assertStatus(302)
            ->assertSessionHasErrors([
                'asignacione_id', 'estudiante_id', 'fecha_matricula', 'asignaturas', 'tipo']);
    }

    public function test_matricula_update()
    {
        $user = User::factory()->create()
                ->assignRole(Role::create(['name' => 'Administrador']));
                $data = Matricula::factory()->create();
                 $this
                    ->actingAs($user)
                    ->put("matriculas/$data->id", $data->toArray());
                $this->assertEquals(1, Matricula::all()->count());
    }

    public function test_matricula_destroy()
    {
        $user = User::factory()->create()
                ->assignRole(Role::create(['name' => 'Administrador']));
        $matricula = Matricula::factory()->create();
        $this
            ->actingAs($user)
            ->delete("matriculas/$matricula->id")
            ->assertRedirect('matriculas');
        $this->assertDeleted('matriculas');
    }


    //Policies
    public function test_matricula_policy_create()
    {
        $user = User::factory()->create();
        Permission::create(['name' => 'Crear matriculas']);
        $user->hasPermissionTo('Crear matriculas');
        $this
            ->actingAs($user)
            ->get('matriculas/create')
            ->assertStatus(403);
    }

    public function test_matricula_policy_edit()
    {
        $user = User::factory()->create();
        Permission::create(['name' => 'Actualizar matriculas']);
        $user->hasPermissionTo('Actualizar matriculas');

        $matricula = Matricula::factory()->create();
        $this
            ->actingAs($user)
            ->get("matriculas/$matricula->id/edit")
            ->assertStatus(403);
    }

    public function test_matricula_policy_destroy()
    {
        $user = User::factory()->create();
        Permission::create(['name' => 'Eliminar matriculas']);
        $user->hasPermissionTo('Eliminar matriculas');

        $matricula = Matricula::factory()->create();
        $this
            ->actingAs($user)
            ->delete("matriculas/$matricula->id")
            ->assertStatus(403);
    }


}
