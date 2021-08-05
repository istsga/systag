<?php

namespace Tests\Unit\Models;

use App\Models\Asignacione;
use App\Models\Asignatura;
use App\Models\Estudiante;
use App\Models\Suspenso;
use Tests\TestCase;
use Illuminate\Foundation\Testing\RefreshDatabase;

class SuspensoTest extends TestCase
{
    use RefreshDatabase;

    public function test_suspenso_belongs_to_asignacion()
    {
        $suspenso = Suspenso::factory()->create();
        $this->assertInstanceOf(Asignacione::class, $suspenso->asignacione);
    }

    public function test_suspenso_belongs_to_asignatura()
    {
        $suspenso = Suspenso::factory()->create();
        $this->assertInstanceOf(Asignatura::class, $suspenso->asignatura);
    }

    public function test_suspenso_belongs_to_estudiante()
    {
        $suspenso = Suspenso::factory()->create();
        $this->assertInstanceOf(Estudiante::class, $suspenso->estudiante);
    }
}
