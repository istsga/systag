<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Asignatura_matricula extends Model
{
    use HasFactory;

    protected $table='asignatura_matricula';

    public function scopeAllowed($query)
    {
        //if( auth()->user()->hasRole('Administrador'))
        $dni=auth()->user()->dni;
        $docente=Docente::where('dni',$dni)->first();
        if(!$docente)
        {
           return $query;
        }
        return $query->where('docente_id',$docente->id );
    }
}
