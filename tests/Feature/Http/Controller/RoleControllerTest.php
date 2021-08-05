<?php

namespace Tests\Feature\Http\Controller;

use App\Models\User;
use Illuminate\Foundation\Testing\RefreshDatabase;
use Illuminate\Foundation\Testing\WithFaker;
use Spatie\Permission\Models\Permission;
use Spatie\Permission\Models\Role;
use Tests\TestCase;

class RoleControllerTest extends TestCase
{
    use RefreshDatabase, WithFaker;

    public function test_roles_index()
    {
        $user = User::factory()->create()
                ->assignRole(Role::create(['name' => 'Administrador']));

        $this
            ->actingAs($user)
            ->get('roles')
            ->assertStatus(200)
            ->assertViewIs('roles.index');
    }

    public function test_roles_create()
    {
        $user = User::factory()->create()
                ->assignRole(Role::create(['name' => 'Administrador']));
        $this
            ->actingAs($user)
            ->get('roles/create')
            ->assertStatus(200)
            ->assertViewIs('roles.create');
    }

    public function test_roles_validate_store()
    {
        $user = User::factory()->create()
                ->assignRole(Role::create(['name' => 'Administrador']));
        $this
            ->actingAs($user)
            ->post('roles', [])
            ->assertStatus(302)
            ->assertSessionHasErrors([
                'display_name', 'name'
                ]);
    }

    public function test_roles_store()
    {
        $this->withoutExceptionHandling();
        $user = User::factory()->create();
        $data =[
            'display_name' => 'Administrador',
            'name' => 'Administrador'
        ];
         $this
            ->actingAs($user)
            ->post('roles', $data)
            ->assertRedirect('roles');
        $this->assertDatabaseHas('roles', $data);
    }



}
