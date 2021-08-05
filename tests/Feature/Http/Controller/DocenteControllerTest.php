<?php

namespace Tests\Feature\Http\Controller;

use App\Models\Cantone;
use App\Models\Docente;
use App\Models\Provincia;
use App\Models\Tipocontrato;
use App\Models\User;
use Illuminate\Foundation\Testing\RefreshDatabase;
use Spatie\Permission\Models\Permission;
use Spatie\Permission\Models\Role;
use Illuminate\Foundation\Testing\WithFaker;
use Tests\TestCase;

class DocenteControllerTest extends TestCase
{
   use  RefreshDatabase, WithFaker;

   public function test_docente_index()
    {
        $user = User::factory()->create()
                ->assignRole(Role::create(['name' => 'Administrador']));
                Docente::factory()->create();
        $this
            ->actingAs($user)
            ->get('docentes')
            ->assertStatus(200)
            ->assertViewIs('docentes.index');
    }

    public function test_docente_create()
    {
        $this->withoutExceptionHandling();
        $user = User::factory()->create()
                ->assignRole(Role::create(['name' => 'Administrador']));
        $this
            ->actingAs($user)
            ->get('docentes/create')
            ->assertStatus(200)
            ->assertViewIs('docentes.create');
    }

    public function test_docente_validate_store()
    {
        $user = User::factory()->create();
        $this
            ->actingAs($user)
            ->post('docentes', [])
            ->assertStatus(302)
            ->assertSessionHasErrors([
                'tipo_identificacion', 'dni','nombre', 'apellido', 'email', 'titulo_academico', 'abreviatura', 'fecha_ingreso',
                'telefono_movil', 'provincia_id', 'cantone_id', 'calle', 'estado', 'tipocontrato_id'
            ]);
    }

    public function test_docente_store()
    {
        $provincia      = Provincia::factory()->create();
        $canton         = Cantone::factory()->create();
        $contrato       = Tipocontrato::factory()->create();

        $data = [
            'tipo_identificacion'   => '1',
            'dni'                   => '0204002040',
            'nombre'                => 'User',
            'apellido'              =>  'Faker',
            'email'                 =>  'faker21@gmail.com',
            'titulo_academico'      =>  'Ingeniero Sistemas',
            'abreviatura'           =>  'Ing.',
            'fecha_ingreso'         =>  '2020-12-29',
            'telefono_fijo'         =>  '2916380',
            'telefono_movil'        =>  '0982750001',
            'provincia_id'          =>  $provincia->id,
            'cantone_id'            =>  $canton->id,
            'calle'                 =>  '10 de Agosto',
            'estado'                =>  '1',
            'tipocontrato_id'       =>  $contrato->id,
        ];
        $user = User::factory()->create()
                ->assignRole(Role::create(['name' => 'Administrador']));
        $this
            ->actingAs($user)
            ->post('docentes', $data)
            ->assertRedirect('docentes');
        $this->assertDatabaseHas('docentes', $data);
    }

    public function test_docente_edit()
    {
        $user = User::factory()->create()
                ->assignRole(Role::create(['name' => 'Administrador']));
        $docente = Docente::factory()->create();
        $this
            ->actingAs($user)
            ->get("docentes/$docente->id/edit")
            ->assertStatus(200)
            ->assertViewIs('docentes.edit');
    }

    public function test_docente_validate_update()
    {
        $docente = Docente::factory()->create();
        $user = User::factory()->create();
        $this
            ->actingAs($user)
            ->put("docentes/$docente->id", [])
            ->assertStatus(302)
            ->assertSessionHasErrors([
                'tipo_identificacion', 'dni','nombre', 'apellido', 'email', 'titulo_academico', 'abreviatura', 'fecha_ingreso',
                'telefono_movil', 'provincia_id', 'cantone_id', 'calle', 'estado', 'tipocontrato_id'
            ]);
    }

    public function test_docente_update()
    {
        $user = User::factory()->create()
                ->assignRole(Role::create(['name' => 'Administrador']));
        $docente = Docente::factory()->create();
        $provincia      = Provincia::factory()->create();
        $canton         = Cantone::factory()->create();
        $contrato       = Tipocontrato::factory()->create();
        $data = [
            'tipo_identificacion'   => '1',
            'dni'                   => '0204002040',
            'nombre'                => 'User',
            'apellido'              =>  'Faker',
            'email'                 =>  'faker21@gmail.com',
            'titulo_academico'      =>  'Ingeniero Sistemas',
            'abreviatura'           =>  'Ing.',
            'fecha_ingreso'         =>  '2020-12-29',
            'telefono_fijo'         =>  '2916380',
            'telefono_movil'        =>  '0982750001',
            'provincia_id'          =>  $provincia->id,
            'cantone_id'            =>  $canton->id,
            'calle'                 =>  '10 de Agosto',
            'estado'                =>  '1',
            'tipocontrato_id'       =>  $contrato->id,
        ];
         $this
            ->actingAs($user)
            ->put("docentes/$docente->id", $data)
            ->assertRedirect('docentes');
        $this->assertDatabaseHas('docentes', $data);
    }

    public function test_docente_destroy()
    {
        $user = User::factory()->create()
                ->assignRole(Role::create(['name' => 'Administrador']));
        $docente = Docente::factory()->create();
        $this
            ->actingAs($user)
            ->delete("docentes/$docente->id")
            ->assertRedirect('docentes');
        $this->assertDeleted('docentes');
    }

    //Policies

    public function test_docente_policy_create()
    {
        $user = User::factory()->create();
        Permission::create(['name' => 'Crear docentes']);
        $user->hasPermissionTo('Crear docentes');

        $this
            ->actingAs($user)
            ->get('docentes/create')
            ->assertStatus(403);
    }

    public function test_docente_policy_edit()
    {
        $user = User::factory()->create();
        Permission::create(['name' => 'Actualizar docentes']);
        $user->hasPermissionTo('Actualizar docentes');

        $docente = Docente::factory()->create();
        $this
            ->actingAs($user)
            ->get("docentes/$docente->id/edit")
            ->assertStatus(403);
    }

    public function test_docente_policy_destroy()
    {
        $user = User::factory()->create();
        Permission::create(['name' => 'Eliminar docentes']);
        $user->hasPermissionTo('Eliminar docentes');

        $docente = Docente::factory()->create();
        $this
            ->actingAs($user)
            ->delete("docentes/$docente->id")
            ->assertStatus(403);
    }






}
