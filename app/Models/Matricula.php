<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Matricula extends Model
{
    use HasFactory;

    protected $fillable = [
        'estudiante_id', 'asignacione_id', 'tipo', 'fecha_matricula', 'condicion'
    ];

    public function estudiante(){
        return $this->belongsTo(Estudiante:: class);
    }

    public function asignacione(){
        return $this->belongsTo(Asignacione:: class);
    }


    public function asignaturas(){
        return $this->belongsToMany(Asignatura:: class);
    }


}
