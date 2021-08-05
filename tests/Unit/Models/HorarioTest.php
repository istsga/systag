<?php

namespace Tests\Unit\Models;

use App\Models\Asignacione;
use App\Models\Asignatura;
use App\Models\Horario;
use Tests\TestCase;
use Illuminate\Foundation\Testing\RefreshDatabase;

class HorarioTest extends TestCase
{
    use RefreshDatabase;

    public function test_horario_belongs_to_asignacion()
    {
        $horario = Horario::factory()->create();
        $this->assertInstanceOf(Asignacione::class, $horario->asignacione);
    }

    public function test_horario_belongs_to_asignatura()
    {
        $horario = Horario::factory()->create();
        $this->assertInstanceOf(Asignatura::class, $horario->asignatura);
    }
}
