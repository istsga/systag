<?php

namespace Tests\Feature\Http\Controller;

use Illuminate\Foundation\Testing\RefreshDatabase;
use Illuminate\Foundation\Testing\WithFaker;
use Spatie\Permission\Models\Permission;
use Spatie\Permission\Models\Role;
use Tests\TestCase;
use App\Models\User;
use App\Models\Seccione;

class SeccioneControllerTest extends TestCase
{
    use RefreshDatabase, WithFaker;

    public function test_seccion_index()
    {
        $user = User::factory()->create()
                ->assignRole(Role::create(['name' => 'Administrador']));
                Seccione::factory()->create();
        $this
            ->actingAs($user)
            ->get('secciones')
            ->assertStatus(200)
            ->assertViewIs('secciones.index');

    }

    public function test_seccion_create()
    {
        $user = User::factory()->create()
                ->assignRole(Role::create(['name' => 'Administrador']));
        $this
            ->actingAs($user)
            ->get('secciones/create')
            ->assertStatus(200)
            ->assertViewIs('secciones.create');
    }

    public function test_seccion_validate_store()
    {
        $user = User::factory()->create()
                ->assignRole(Role::create(['name' => 'Administrador']));
        $this
            ->actingAs($user)
            ->post('secciones', [])
            ->assertStatus(302)
            ->assertSessionHasErrors(['nombre']);
    }

    public function test_seccion_store()
    {
        $data = [
            'nombre'            =>'Diurno',
        ];
        $user = User::factory()->create()
                ->assignRole(Role::create(['name' => 'Administrador']));
        $this
            ->actingAs($user)
            ->post('secciones', $data)
            ->assertRedirect('secciones');
        $this->assertDatabaseHas('secciones', $data);
    }

    public function test_seccion_edit()
    {
        $user = User::factory()->create()
                ->assignRole(Role::create(['name' => 'Administrador']));
        $seccione = Seccione::factory()->create();
        $this
            ->actingAs($user)
            ->get("secciones/$seccione->id/edit")
            ->assertStatus(200)
            ->assertViewIs('secciones.edit');
    }

    public function test_seccion_validate_update()
    {
        $seccione = Seccione::factory()->create();
        $user = User::factory()->create()
                ->assignRole(Role::create(['name' => 'Administrador']));
        $this
            ->actingAs($user)
            ->put("secciones/$seccione->id", [])
            ->assertStatus(302)
            ->assertSessionHasErrors([ 'nombre']);
    }

    public function test_seccion_update()
    {
        $user = User::factory()->create()
                ->assignRole(Role::create(['name' => 'Administrador']));
        $seccione = Seccione::factory()->create();
        $data = [ 'nombre' =>'I Seccione' ];

         $this
            ->actingAs($user)
            ->put("secciones/$seccione->id", $data)
            ->assertRedirect('secciones');
        $this->assertDatabaseHas('secciones', $data);
    }

    public function test_seccion_destroy()
    {
        $user = User::factory()->create()
                ->assignRole(Role::create(['name' => 'Administrador']));
        $seccione = Seccione::factory()->create();
        $this
            ->actingAs($user)
            ->delete("secciones/$seccione->id")
            ->assertRedirect('secciones');
        $this->assertDeleted('secciones');
    }

    //Policies
    public function test_seccion_policy_create()
    {
        $user = User::factory()->create();
        Permission::create(['name' => 'Crear secciones']);
        $user->hasPermissionTo('Crear secciones');

        $this
            ->actingAs($user)
            ->get('secciones/create')
            ->assertStatus(403);
    }

    public function test_seccion_policy_store()
    {
        $data = [
            'nombre'            =>'Diurno',
        ];

        $user = User::factory()->create();
        Permission::create(['name' => 'Crear secciones']);
        $user->hasPermissionTo('Crear secciones');

        $this
            ->actingAs($user)
            ->post('secciones', $data)
            ->assertStatus(403);
    }

    public function test_seccion_policy_edit()
    {
        $user = User::factory()->create();
        Permission::create(['name' => 'Actualizar secciones']);
        $user->hasPermissionTo('Actualizar secciones');

        $seccione = Seccione::factory()->create();
        $this
            ->actingAs($user)
            ->get("secciones/$seccione->id/edit")
            ->assertStatus(403);
    }

    public function test_seccion_policy_update()
    {
        $user = User::factory()->create();
        Permission::create(['name' => 'Actualizar secciones']);
        $user->hasPermissionTo('Actualizar secciones');

        $seccione = Seccione::factory()->create();
        $data = [
            'nombre'            =>'Diurno',
        ];
         $this
            ->actingAs($user)
            ->put("secciones/$seccione->id", $data)
            ->assertStatus(403);
    }

    public function test_seccion_policy_destroy()
    {
        $user = User::factory()->create();
        Permission::create(['name' => 'Eliminar secciones']);
        $user->hasPermissionTo('Eliminar secciones');

        $seccione = Seccione::factory()->create();
        $this
            ->actingAs($user)
            ->delete("secciones/$seccione->id")
            ->assertStatus(403);
    }



}
