<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Suspenso extends Model
{
    use HasFactory;

    protected $fillable = [
        'asignacione_id', 'asignatura_id', 'estudiante_id', 'promedio_final', 'examen_suspenso', 'suma',
        'promedio_numero', 'promedio_letra', 'observacion'
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

    public function scopeAllowed($query)
    {
        // if( auth()->user()->can('view', $this))
        // {
        //    return $query;
        // }
        $dni=auth()->user()->dni;
        $docente=Docente::where('dni',$dni)->first();
        //dd($docente->id);
        return $query->where('docente_id', $docente->id);
    }


}
