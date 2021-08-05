<?php

namespace Tests\Unit\Models;

use App\Models\Asignatura;
use App\Models\Convalidacione;
use App\Models\Estudiante;
use Illuminate\Database\Eloquent\Collection;
use Illuminate\Foundation\Testing\RefreshDatabase;
use Tests\TestCase;

class ConvalidacioneTest extends TestCase
{
    use RefreshDatabase;

    public function test_convalidacion_belongs_to_estudiante()
    {
        $convalidacione = Convalidacione::factory()->create();
        $this->assertInstanceOf(Estudiante::class, $convalidacione->estudiante);
    }

    public function test_convalidacion_belongs_to_asignatura()
    {
        $convalidacione = Convalidacione::factory()->create();
        $this->assertInstanceOf(Asignatura::class, $convalidacione->asignatura);
    }

}
