<?php

namespace Tests\Unit\Models;
use Illuminate\Database\Eloquent\Collection;

use App\Models\Asignacione;
use App\Models\Carrera;
use App\Models\Paralelo;
use App\Models\Periodo;
use App\Models\Seccione;
use Tests\TestCase;
use Illuminate\Foundation\Testing\RefreshDatabase;

class AsignacioneTest extends TestCase

{
    use RefreshDatabase;

    public function test_asignacion_belongs_to_periodo()
    {
        $asignacione = Asignacione::factory()->create();
        $this->assertInstanceOf(Periodo::class, $asignacione->periodo);
    }


    public function test_asignacion_belongs_to_seccion()
    {
        $asignacione = Asignacione::factory()->create();
        $this->assertInstanceOf(Seccione::class, $asignacione->seccione);
    }

    public function test_asignacion_belongs_to_paralelo()
    {
        $asignacione = Asignacione::factory()->create();
        $this->assertInstanceOf(Paralelo::class, $asignacione->paralelo);
    }

    public function test_asignacion_belongs_to_many_periodacademicos()
    {
        $asignacione = new Asignacione;
        $this->assertInstanceOf(Collection::class, $asignacione->periodacademicos);
    }

    public function test_asignacion_belongs_to_many_carreras()
    {
        $asignacione = new Asignacione;
        $this->assertInstanceOf(Collection::class, $asignacione->carreras);
    }
}
