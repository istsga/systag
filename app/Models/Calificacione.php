<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Calificacione extends Model
{
    use HasFactory;

    protected $fillable = [
        'asignacione_id', 'asignatura_id', 'estudiante_id', 'docencia', 'experimento_aplicacion',
        'trabajo_autonomo', 'suma', 'promedio_decimal', 'examen_principal','promedio_final',
        'promedio_letra', 'numero_asistencia', 'porcentaje_asistencia', 'observacion',
    ];

    public function asignacione()
    {
        return $this->belongsTo(Asignacione:: class);
    }

    public function asignatura()
    {
        return $this->belongsTo(Asignatura:: class);
    }

    public function estudiante()
    {
        return $this->belongsTo(Estudiante:: class);
    }

    public function matricula()
    {
        return $this->belongsTo(Matricula:: class);
    }


}
