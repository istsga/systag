<?php

namespace Tests\Unit\Models;

use App\Models\Carrera;
use App\Models\Periodo;
use App\Models\Asignatura;
use Tests\TestCase;
use Illuminate\Foundation\Testing\RefreshDatabase;

class AsignaturaTest extends TestCase
{
    use RefreshDatabase;

    public function test_asignatura_belongs_to_carrera()
    {
        $asignatura = Asignatura::factory()->create();
        $this->assertInstanceOf(Carrera::class, $asignatura->carrera);
    }

    public function test_asignatura_belongs_to_periodo()
    {
        $asignatura = Asignatura::factory()->create();
        $this->assertInstanceOf(Periodo::class, $asignatura->periodo);
    }
}
