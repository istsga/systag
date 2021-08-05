<?php

namespace Tests\Unit\Models;

use App\Models\Asignacione;
use App\Models\Asignatura;
use App\Models\Calificacione;
use App\Models\Estudiante;
use App\Models\Matricula;
use Tests\TestCase;
use Illuminate\Foundation\Testing\RefreshDatabase;


class CalificacioneTest extends TestCase
{
    use RefreshDatabase;

    public function test_calificacion_belongs_to_asignacion()
    {
        $calificacione = Calificacione::factory()->create();
        $this->assertInstanceOf(Asignacione::class, $calificacione->asignacione);
    }

    public function test_calificacion_belongs_to_asignatura()
    {
        $calificacione = Calificacione::factory()->create();
        $this->assertInstanceOf(Asignatura::class, $calificacione->asignatura);
    }


    public function test_calificacion_belongs_to_estudiante()
    {
        $calificacione = Calificacione::factory()->create();
        $this->assertInstanceOf(Estudiante::class, $calificacione->estudiante);
    }



}
