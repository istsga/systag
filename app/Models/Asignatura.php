<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Asignatura extends Model
{
    use HasFactory;
    protected $fillable = [
        'carrera_id', 'periodo_id', 'cod_asignatura', 'nombre', 'cantidad_hora', 'preasignatura_id'
    ];

    public function carrera()
    {
        return $this->belongsTo(Carrera:: class);
    }

    public function periodo()
    {
        return $this->belongsTo(Periodo:: class);
    }
}
