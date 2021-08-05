<?php

namespace Tests\Unit\Models;

use App\Models\Periodacademico;
use Illuminate\Database\Eloquent\Collection;
use Tests\TestCase;

class PeriodacademicoTest extends TestCase
{
    public function test_periodacademico_belongs_to_many_carreras()
    {
        $periodacademico = new Periodacademico();
        $this->assertInstanceOf(Collection::class, $periodacademico->carreras);
    }
}
