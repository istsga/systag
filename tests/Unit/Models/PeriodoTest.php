<?php

namespace Tests\Unit\Models;

use App\Models\Periodo;
use Illuminate\Database\Eloquent\Collection;
use Tests\TestCase;

class PeriodoTest extends TestCase
{
    public function test_periodo_has_many_asignaturas()
    {
        $periodo = new Periodo;
        $this->assertInstanceOf(Collection::class, $periodo->asignaturas);
    }
}
