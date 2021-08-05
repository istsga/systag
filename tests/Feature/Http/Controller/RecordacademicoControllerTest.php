<?php

namespace Tests\Feature\Http\Controller;

use App\Models\User;
use Illuminate\Foundation\Testing\RefreshDatabase;
use Illuminate\Foundation\Testing\WithFaker;
use Spatie\Permission\Models\Role;
use Tests\TestCase;

class RecordacademicoControllerTest extends TestCase
{
    use RefreshDatabase, WithFaker;

    public function test_record_academico_index()
    {
        $this->withoutExceptionHandling();

        $user = User::factory()->create()
                ->assignRole(Role::create(['name' => 'Administrador']));
        $this
            ->actingAs($user)
            ->get('recordacademicos')
            ->assertStatus(200)
            ->assertViewIs('recordacademicos.index');
    }
}
