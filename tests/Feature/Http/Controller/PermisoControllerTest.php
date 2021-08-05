<?php

namespace Tests\Feature\Http\Controller;

use App\Models\User;
use Illuminate\Foundation\Testing\RefreshDatabase;
use Illuminate\Foundation\Testing\WithFaker;
use Spatie\Permission\Models\Role;
use Tests\TestCase;

class PermisoControllerTest extends TestCase
{
    use RefreshDatabase, WithFaker;

    public function test_permiso_index()
    {
        $user = User::factory()->create()
                ->assignRole(Role::create(['name' => 'Administrador']));
        $this
            ->actingAs($user)
            ->get('permisos')
            ->assertStatus(200)
            ->assertViewIs('permisos.index');
    }
}
