<?php

namespace Tests\Feature\Http\Controller;

use Illuminate\Foundation\Testing\RefreshDatabase;
use Illuminate\Foundation\Testing\WithFaker;
use Spatie\Permission\Models\Permission;
use Spatie\Permission\Models\Role;
use Tests\TestCase;
use App\Models\User;
use App\Models\Carrera;

class CarreraControllerTest extends TestCase
{
    use RefreshDatabase, WithFaker;

    public function test_carrera_index()
    {
        $user = User::factory()->create()
                ->assignRole(Role::create(['name' => 'Administrador']));
                Carrera::factory()->create();
        $this
            ->actingAs($user)
            ->get('carreras')
            ->assertStatus(200)
            ->assertViewIs('carreras.index');

    }

    public function test_carrera_create()
    {
        $user = User::factory()->create()
                ->assignRole(Role::create(['name' => 'Administrador']));
        $this
            ->actingAs($user)
            ->get('carreras/create')
            ->assertStatus(200)
            ->assertViewIs('carreras.create');
    }

    public function test_carrera_validate_store()
    {
        $user = User::factory()->create();
        $this
            ->actingAs($user)
            ->post('carreras', [])
            ->assertStatus(302)
            ->assertSessionHasErrors([
                'codigo', 'nombre', 'titulo', 'numero_periodo', 'condicion'
            ]);
    }

    public function test_carrera_store()
    {
        $data = [
            'codigo'            =>'DS01',
            'nombre'            =>'Desarrollo de Software',
            'titulo'            =>'Tecnólogo/a en Desarrollo de Software',
            'numero_periodo'    =>'5',
            'condicion'         => '1',
        ];
        $user = User::factory()->create()
                ->assignRole(Role::create(['name' => 'Administrador']));
        $this
            ->actingAs($user)
            ->post('carreras', $data)
            ->assertRedirect('carreras');
        $this->assertDatabaseHas('carreras', $data);
    }


    public function test_carrera_edit()
    {
        $user = User::factory()->create()
                ->assignRole(Role::create(['name' => 'Administrador']));
        $carrera = Carrera::factory()->create();
        $this
            ->actingAs($user)
            ->get("carreras/$carrera->id/edit")
            ->assertStatus(200)
            ->assertViewIs('carreras.edit');
    }

    public function test_carrera_validate_update()
    {
        $carrera = Carrera::factory()->create();
        $user = User::factory()->create();
        $this
            ->actingAs($user)
            ->put("carreras/$carrera->id", [])
            ->assertStatus(302)
            ->assertSessionHasErrors([
                'codigo', 'nombre', 'titulo', 'numero_periodo', 'condicion'
            ]);
    }


    public function test_carrera_update()
    {
        $user = User::factory()->create()
                ->assignRole(Role::create(['name' => 'Administrador']));
        $carrera = Carrera::factory()->create();
        $data = [
            'codigo'            =>'DS01',
            'nombre'            =>'Desarrollo de Software',
            'titulo'            =>'Tecnólogo en Desarrollo de Software',
            'numero_periodo'    =>'5',
            'condicion'         =>'1',
        ];
         $this
            ->actingAs($user)
            ->put("carreras/$carrera->id", $data)
            ->assertRedirect('carreras');
        $this->assertDatabaseHas('carreras', $data);
    }


    public function test_carrera_destroy()
    {
        $user = User::factory()->create()
                ->assignRole(Role::create(['name' => 'Administrador']));
        $carrera = Carrera::factory()->create();
        $this
            ->actingAs($user)
            ->delete("carreras/$carrera->id")
            ->assertRedirect('carreras');
        $this->assertDeleted('carreras');
    }

    //Policies

    public function test_carrera_policy_create()
    {
        $user = User::factory()->create();
        Permission::create(['name' => 'Crear carreras']);
        $user->hasPermissionTo('Crear carreras');

        $this
            ->actingAs($user)
            ->get('carreras/create')
            ->assertStatus(403);
    }

    public function test_carrera_policy_edit()
    {
        $user = User::factory()->create();
        Permission::create(['name' => 'Actualizar carreras']);
        $user->hasPermissionTo('Actualizar carreras');

        $carrera = Carrera::factory()->create();
        $this
            ->actingAs($user)
            ->get("carreras/$carrera->id/edit")
            ->assertStatus(403);
    }

    public function test_carrera_policy_update()
    {
        $user = User::factory()->create();
        Permission::create(['name' => 'Actualizar carreras']);
        $user->hasPermissionTo('Actualizar carreras');

        $carrera = Carrera::factory()->create();
        $data = [
            'codigo'            =>'DS01',
            'nombre'            =>'Desarrollo de Software',
            'titulo'            =>'Tecnólogo en Desarrollo de Software',
            'numero_periodo'    =>'5',
            'condicion'         =>'1',
        ];
         $this
            ->actingAs($user)
            ->put("carreras/$carrera->id", $data)
            ->assertStatus(403);
    }

    public function test_carrera_policy_destroy()
    {
        $user = User::factory()->create();
        Permission::create(['name' => 'Eliminar carreras']);
        $user->hasPermissionTo('Eliminar carreras');

        $carrera = Carrera::factory()->create();
        $this
            ->actingAs($user)
            ->delete("carreras/$carrera->id")
            ->assertStatus(403);
    }


}
