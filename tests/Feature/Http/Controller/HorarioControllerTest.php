<?php

namespace Tests\Feature\Http\Controller;

use App\Models\Horario;
use App\Models\User;
use Illuminate\Foundation\Testing\RefreshDatabase;
use Illuminate\Foundation\Testing\WithFaker;
use Spatie\Permission\Models\Permission;
use Spatie\Permission\Models\Role;
use Tests\TestCase;

class HorarioControllerTest extends TestCase
{
    use RefreshDatabase, WithFaker;

    public function test_horario_index()
    {
        $user = User::factory()->create()
                ->assignRole(Role::create(['name' => 'Administrador']));
                Horario::factory()->create();
        $this
            ->actingAs($user)
            ->get('horarios')
            ->assertStatus(200)
            ->assertViewIs('horarios.index');
    }

    public function test_horario_create()
    {
        $user = User::factory()->create()
                ->assignRole(Role::create(['name' => 'Administrador']));
        $this
            ->actingAs($user)
            ->get('horarios/create')
            ->assertStatus(200)
            ->assertViewIs('horarios.create');
    }

    public function test_horario_validate_store()
    {
        $user = User::factory()->create();
        $this
            ->actingAs($user)
            ->post('horarios', [])
            ->assertStatus(302)
            ->assertSessionHasErrors([
                'asignacione_id', 'asignatura_id', 'dia_semana', 'hora_inicio', 'hora_final', 'cantidad_hora',
                'fecha_inicio', 'fecha_final', 'fecha_examen', 'fecha_suspension', 'orden'
            ]);
    }

    public function test_horario_store()
    {
        $data = Horario::factory()->create();
        $user = User::factory()->create();
         $this
            ->actingAs($user)
            ->post('horarios', $data->toArray());
        $this->assertEquals(1, Horario::all()->count());
    }

    public function test_horario_edit()
    {
        $this->withoutExceptionHandling();
        $user = User::factory()->create()
                ->assignRole(Role::create(['name' => 'Administrador']));
        $data = Horario::factory()->create();
        $this
            ->actingAs($user)
            ->get("horarios/$data->id/edit")
            ->assertStatus(200)
            ->assertViewIs('horarios.edit');
    }

    public function test_horario_validate_update()
    {
        $data = Horario::factory()->create();
        $user = User::factory()->create()
                ->assignRole(Role::create(['name' => 'Administrador']));
        $this
            ->actingAs($user)
            ->put("horarios/$data->id", [])
            ->assertStatus(302)
            ->assertSessionHasErrors([
                'asignacione_id', 'asignatura_id', 'dia_semana', 'hora_inicio', 'hora_final', 'cantidad_hora',
                'fecha_inicio', 'fecha_final', 'fecha_examen', 'fecha_suspension', 'orden'
                ]);
    }

    public function test_horario_update()
    {
        $user = User::factory()->create()
                ->assignRole(Role::create(['name' => 'Administrador']));
                $data = Horario::factory()->create();
                 $this
                    ->actingAs($user)
                    ->put("horarios/$data->id", $data->toArray());
                $this->assertEquals(1, Horario::all()->count());
    }

    public function test_horario_destroy()
    {
        $user = User::factory()->create()
                ->assignRole(Role::create(['name' => 'Administrador']));
        $data = Horario::factory()->create();
        $this
            ->actingAs($user)
            ->delete("horarios/$data->id")
            ->assertRedirect('horarios');
        $this->assertDeleted('horarios');
    }


    //Policies
    public function test_horario_policy_create()
    {
        $user = User::factory()->create();
        Permission::create(['name' => 'Crear horarios']);
        $user->hasPermissionTo('Crear horarios');
        $this
            ->actingAs($user)
            ->get('horarios/create')
            ->assertStatus(403);
    }

    public function test_horario_policy_edit()
    {
        $user = User::factory()->create();
        Permission::create(['name' => 'Actualizar horarios']);
        $user->hasPermissionTo('Actualizar horarios');

        $data = Horario::factory()->create();
        $this
            ->actingAs($user)
            ->get("horarios/$data->id/edit")
            ->assertStatus(403);
    }

    public function test_horario_policy_destroy()
    {
        $user = User::factory()->create();
        Permission::create(['name' => 'Eliminar horarios']);
        $user->hasPermissionTo('Eliminar horarios');

        $data = Horario::factory()->create();
        $this
            ->actingAs($user)
            ->delete("horarios/$data->id")
            ->assertStatus(403);
    }
}
