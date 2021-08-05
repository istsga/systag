<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Carrera extends Model
{
    use HasFactory;

    protected $fillable = [
        'codigo', 'nombre', 'titulo', 'numero_periodo', 'condicion'
    ];

    public function asignaturas()
    {
        return $this->hasMany(Asignatura::class);
    }

    public function periodacademicos()
    {
        return $this->belongsToMany(Periodacademico::class);
    }

}
