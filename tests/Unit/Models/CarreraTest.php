<?php

namespace Tests\Unit\Models;

use App\Models\Carrera;
use Illuminate\Database\Eloquent\Collection;
use Tests\TestCase;

class CarreraTest extends TestCase
{
    public function test_carrera_has_many_asignaturas()
    {
        $carrera = new Carrera;
        $this->assertInstanceOf(Collection::class, $carrera->asignaturas);
    }

    public function test_carrera_belongs_to_many_periodacademicos()
    {
        $carrera = new Carrera;
        $this->assertInstanceOf(Collection::class, $carrera->periodacademicos);
    }
}
