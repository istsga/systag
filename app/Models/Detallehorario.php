<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Detallehorario extends Model
{
    use HasFactory;

    protected $table='detalle_horarios';

    protected $fillable = [
        'horario_id', 'dia_semana', 'hora_inicio', 'hora_final',

    ];

    public function horario()
    {
        return $this->belongsTo(Horario:: class);
    }
}
