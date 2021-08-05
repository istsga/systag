<?php

namespace Tests\Unit\Models;

use App\Models\Asignacione;
use App\Models\Estudiante;
use App\Models\Matricula;
use Illuminate\Database\Eloquent\Collection;
use Tests\TestCase;
use Illuminate\Foundation\Testing\RefreshDatabase;

class MatriculaTest extends TestCase
{
    use RefreshDatabase;

    public function test_matricula_belongs_to_estudiante()
    {
        $matricula = Matricula::factory()->create();
        $this->assertInstanceOf(Estudiante::class, $matricula->estudiante);
    }

    public function test_matricula_belongs_to_asignacion()
    {
        $matricula = Matricula::factory()->create();
        $this->assertInstanceOf(Asignacione::class, $matricula->asignacione);
    }

    public function test_matricula_belongs_to_many_asignaturas()
    {
        $matricula = Matricula::factory()->create();;
        $this->assertInstanceOf(Collection::class, $matricula->asignaturas);
    }

}
