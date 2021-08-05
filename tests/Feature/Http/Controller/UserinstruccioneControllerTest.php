<?php

namespace Tests\Feature\Http\Controller;

use App\Models\User;
use Illuminate\Foundation\Testing\RefreshDatabase;
use Illuminate\Foundation\Testing\WithFaker;
use Spatie\Permission\Models\Role;
use Tests\TestCase;

class UserinstruccioneControllerTest extends TestCase
{
    use RefreshDatabase, WithFaker;

    public function test_instruccion_de_usuario_index()
    {
        $user = User::factory()->create()
                ->assignRole(Role::create(['name' => 'Administrador']));
        $this
            ->actingAs($user)
            ->get('userinstrucciones')
            ->assertStatus(200)
            ->assertViewIs('userinstrucciones.index');
    }
}
