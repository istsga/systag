<?php

namespace Tests\Feature\Http\Controller;

use Illuminate\Foundation\Testing\RefreshDatabase;
use Illuminate\Foundation\Testing\WithFaker;
use Spatie\Permission\Models\Permission;
use Spatie\Permission\Models\Role;
use Tests\TestCase;
use App\Models\User;
use App\Models\Paralelo;

class ParaleloControllerTest extends TestCase
{
    use RefreshDatabase, WithFaker;

    public function test_paralelo_index()
    {
        $user = User::factory()->create()
                ->assignRole(Role::create(['name' => 'Administrador']));
                Paralelo::factory()->create();
        $this
            ->actingAs($user)
            ->get('paralelos')
            ->assertStatus(200)
            ->assertViewIs('paralelos.index');

    }

    public function test_paralelo_create()
    {
        $user = User::factory()->create()
                ->assignRole(Role::create(['name' => 'Administrador']));
        $this
            ->actingAs($user)
            ->get('paralelos/create')
            ->assertStatus(200)
            ->assertViewIs('paralelos.create');
    }

    public function test_paralelo_validate_store()
    {
        $user = User::factory()->create()
                ->assignRole(Role::create(['name' => 'Administrador']));
        $this
            ->actingAs($user)
            ->post('paralelos', [])
            ->assertStatus(302)
            ->assertSessionHasErrors(['nombre']);
    }

    public function test_paralelo_store()
    {
        $this->withoutExceptionHandling();
        $data = [
            'nombre'            =>'B',
        ];
        $user = User::factory()->create()
                ->assignRole(Role::create(['name' => 'Administrador']));
        $this
            ->actingAs($user)
            ->post('paralelos', $data)
            ->assertRedirect('paralelos');
        $this->assertDatabaseHas('paralelos', $data);
    }

    public function test_paralelo_edit()
    {
        $user = User::factory()->create()
                ->assignRole(Role::create(['name' => 'Administrador']));

        $paralelo = Paralelo::factory()->create();
        $this
            ->actingAs($user)
            ->get("paralelos/$paralelo->id/edit")
            ->assertStatus(200)
            ->assertViewIs('paralelos.edit');
    }

    public function test_paralelo_validate_update()
    {
        $paralelo = Paralelo::factory()->create();
        $user = User::factory()->create()
                ->assignRole(Role::create(['name' => 'Administrador']));
        $this
            ->actingAs($user)
            ->put("paralelos/$paralelo->id", [])
            ->assertStatus(302)
            ->assertSessionHasErrors([ 'nombre']);
    }

    public function test_paralelo_update()
    {
        $user = User::factory()->create()
                ->assignRole(Role::create(['name' => 'Administrador']));
        $paralelo = Paralelo::factory()->create();
        $data = [ 'nombre' =>'I' ];

         $this
            ->actingAs($user)
            ->put("paralelos/$paralelo->id", $data)
            ->assertRedirect('paralelos');
        $this->assertDatabaseHas('paralelos', $data);
    }

    public function test_paralelo_destroy()
    {
        $user = User::factory()->create()
                ->assignRole(Role::create(['name' => 'Administrador']));
        $paralelo = Paralelo::factory()->create();
        $this
            ->actingAs($user)
            ->delete("paralelos/$paralelo->id")
            ->assertRedirect('paralelos');
        $this->assertDeleted('paralelos');
    }

    //Policies
    public function test_paralelo_policy_create()
    {
        $user = User::factory()->create();
        Permission::create(['name' => 'Crear paralelos']);
        $user->hasPermissionTo('Crear paralelos');

        $this
            ->actingAs($user)
            ->get('paralelos/create')
            ->assertStatus(403);
    }

    public function test_paralelo_policy_store()
    {
        $data = [
            'nombre'            =>'A',
        ];

        $user = User::factory()->create();
        Permission::create(['name' => 'Crear paralelos']);
        $user->hasPermissionTo('Crear paralelos');

        $this
            ->actingAs($user)
            ->post('paralelos', $data)
            ->assertStatus(403);
    }

    public function test_paralelo_policy_edit()
    {
        $user = User::factory()->create();
        Permission::create(['name' => 'Actualizar paralelos']);
        $user->hasPermissionTo('Actualizar paralelos');

        $paralelo = Paralelo::factory()->create();
        $this
            ->actingAs($user)
            ->get("paralelos/$paralelo->id/edit")
            ->assertStatus(403);
    }

    public function test_paralelo_policy_update()
    {
        $user = User::factory()->create();
        Permission::create(['name' => 'Actualizar paralelos']);
        $user->hasPermissionTo('Actualizar paralelos');

        $paralelo = Paralelo::factory()->create();
        $data = [
            'nombre'            =>'A',
        ];
         $this
            ->actingAs($user)
            ->put("paralelos/$paralelo->id", $data)
            ->assertStatus(403);
    }

    public function test_paralelo_policy_destroy()
    {
        $user = User::factory()->create();
        Permission::create(['name' => 'Eliminar paralelos']);
        $user->hasPermissionTo('Eliminar paralelos');

        $paralelo = Paralelo::factory()->create();
        $this
            ->actingAs($user)
            ->delete("paralelos/$paralelo->id")
            ->assertStatus(403);
    }



}
