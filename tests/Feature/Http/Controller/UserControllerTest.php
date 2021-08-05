<?php

namespace Tests\Feature\Http\Controller;

use App\Models\User;
use Illuminate\Foundation\Testing\RefreshDatabase;
use Illuminate\Foundation\Testing\WithFaker;
use Spatie\Permission\Models\Permission;
use Spatie\Permission\Models\Role;
use Tests\TestCase;

class UserControllerTest extends TestCase
{
    use RefreshDatabase, WithFaker;

    public function test_user_index()
    {
        $user = User::factory()->create()
                ->assignRole(Role::create(['name' => 'Administrador']));
        $this
            ->actingAs($user)
            ->get('users')
            ->assertStatus(200)
            ->assertViewIs('users.index');
    }

    public function test_user_create()
    {
        $this->withoutExceptionHandling();
        $user = User::factory()->create()
                ->assignRole(Role::create(['name' => 'Administrador']));
        $this
            ->actingAs($user)
            ->get('users/create')
            ->assertStatus(200)
            ->assertViewIs('users.create');
    }

    public function test_user_validate_store()
    {
        $user = User::factory()->create()
                ->assignRole(Role::create(['name' => 'Administrador']));
        $this
            ->actingAs($user)
            ->post('users', [])
            ->assertStatus(302)
            ->assertSessionHasErrors(['dni', 'nombre', 'apellido', 'email']);
    }

    public function test_user_store()
    {
        $user = User::factory()->create();
         $this
            ->actingAs($user)
            ->post('users', $user->toArray());
        $this->assertEquals(1, User::all()->count());
    }

    public function test_user_edit()
    {
        $user = User::factory()->create()
                ->assignRole(Role::create(['name' => 'Administrador']));
        $data = User::factory()->create();
        $this
            ->actingAs($user)
            ->get("users/$data->id/edit")
            ->assertStatus(200)
            ->assertViewIs('users.edit');
    }

    public function test_user_validate_update()
    {
        $user = User::factory()->create()
                ->assignRole(Role::create(['name' => 'Administrador']));
        $this
            ->actingAs($user)
            ->put("users/$user->id", [])
            ->assertStatus(302)
            ->assertSessionHasErrors(['dni', 'nombre', 'apellido', 'email']);
    }

    public function test_user_update()
    {
        $user = User::factory()->create()
                ->assignRole(Role::create(['name' => 'Administrador']));
                 $this
                    ->actingAs($user)
                    ->put("users/$user->id", $user->toArray());
                $this->assertEquals(1, User::all()->count());
    }

    public function test_user_destroy()
    {
        $user = User::factory()->create()
                ->assignRole(Role::create(['name' => 'Administrador']));
        $this
            ->actingAs($user)
            ->delete("users/$user->id")
            ->assertRedirect('users');
        $this->assertDeleted('users');
    }

     //Policies
     public function test_user_policy_create()
     {
        $user = User::factory()->create();
         Permission::create(['name' => 'Crear usuarios']);
         $user->hasPermissionTo('Crear usuarios');
         $this
             ->actingAs($user)
             ->get('users/create')
             ->assertStatus(403);
     }

     public function test_user_policy_edit()
    {
        $user = User::factory()->create();
        Permission::create(['name' => 'Actualizar usuarios']);
        $user->hasPermissionTo('Actualizar usuarios');

        $data = User::factory()->create();
        $this
            ->actingAs($user)
            ->get("users/$data->id/edit")
            ->assertStatus(403);
    }

    public function test_user_policy_destroy()
    {
        $user = User::factory()->create();
        Permission::create(['name' => 'Eliminar usuarios']);
        $user->hasPermissionTo('Eliminar usuarios');

        $data = User::factory()->create();
        $this
            ->actingAs($user)
            ->delete("users/$data->id")
            ->assertStatus(403);
    }

}
