<?php

namespace Tests\Unit\Models;

use App\Models\Cantone;
use App\Models\Estadocivile;
use App\Models\Estudiante;
use App\Models\Etnia;
use App\Models\Instruccione;
use App\Models\Provincia;
use App\Models\Tiposangre;
use Tests\TestCase;
use Illuminate\Foundation\Testing\RefreshDatabase;

class EstudianteTest extends TestCase
{
    use RefreshDatabase;


    public function test_estudiante_belongs_to_estado_civil()
    {
        $estudiante = Estudiante::factory()->create();
        $this->assertInstanceOf(Estadocivile::class, $estudiante->estadocivile);
    }

    public function test_estudiante_belongs_to_etnia()
    {
        $estudiante = Estudiante::factory()->create();
        $this->assertInstanceOf(Etnia::class, $estudiante->etnia);
    }

    public function test_estudiante_belongs_to_provincia()
    {
        $estudiante = Estudiante::factory()->create();
        $this->assertInstanceOf(Provincia::class, $estudiante->provincia);
    }

    public function test_estudiante_belongs_to_canton()
    {
        $estudiante = Estudiante::factory()->create();
        $this->assertInstanceOf(Cantone::class, $estudiante->cantone);
    }

    public function test_estudiante_belongs_to_instruccion()
    {
        $estudiante = Estudiante::factory()->create();
        $this->assertInstanceOf(Instruccione::class, $estudiante->instruccione);
    }

    public function test_estudiante_belongs_to_tipo_sangre()
    {
        $estudiante = Estudiante::factory()->create();
        $this->assertInstanceOf(Tiposangre::class, $estudiante->tiposangre);
    }
}
