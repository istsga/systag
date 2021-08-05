<?php

namespace Tests\Unit\Models;
use App\Models\Cantone;
use App\Models\Docente;
use App\Models\Provincia;
use App\Models\Tipocontrato;
use Tests\TestCase;
use Illuminate\Foundation\Testing\RefreshDatabase;

class DocenteTest extends TestCase
{
    use RefreshDatabase;

    public function test_docente_belongs_to_provincia()
    {
        $docente = Docente::factory()->create();
        $this->assertInstanceOf(Provincia::class, $docente->provincia);
    }

    public function test_docente_belongs_to_canton()
    {
        $docente = Docente::factory()->create();
        $this->assertInstanceOf(Cantone::class, $docente->cantone);
    }

    public function test_docente_belongs_to_tipo_contrato()
    {
        $docente = Docente::factory()->create();
        $this->assertInstanceOf(Tipocontrato::class, $docente->tipocontrato);
    }
}
