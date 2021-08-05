<?php

namespace Tests\Unit\Models;

use App\Models\Asignacione;
use App\Models\Asignatura;
use App\Models\Asignaturadocente;
use App\Models\Docente;
use Illuminate\Foundation\Testing\RefreshDatabase;
use Tests\TestCase;

class AsignaturadocenteTest extends TestCase
{
    use RefreshDatabase;

    public function test_distributivo_belongs_to_asignacion()
    {
        $asignaturadocente = Asignaturadocente::factory()->create();
        $this->assertInstanceOf(Asignacione::class, $asignaturadocente->asignacione);
    }

    public function test_distributivo_belongs_to_asignatura()
    {
        $asignaturadocente = Asignaturadocente::factory()->create();
        $this->assertInstanceOf(Asignatura::class, $asignaturadocente->asignatura);
    }

    public function test_distributivo_belongs_to_docente()
    {
        $asignaturadocente = Asignaturadocente::factory()->create();
        $this->assertInstanceOf(Docente::class, $asignaturadocente->docente);
    }

}
