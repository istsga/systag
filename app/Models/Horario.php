<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Horario extends Model
{
    use HasFactory;

    protected $fillable = [
        'asignacione_id', 'asignatura_id', 'dia_semana', 'hora_inicio', 'hora_final', 'cantidad_hora',
        'fecha_inicio', 'fecha_final', 'fecha_examen', 'fecha_suspension', 'orden'

    ];

    public function asignacione()
    {
        return $this->belongsTo(Asignacione:: class);
    }

    public function asignatura()
    {
        return $this->belongsTo(Asignatura:: class);
    }

     //  Scope Políticas de acceso
     public function scopeAllowed($query)
     {
         if( auth()->user()->can('view', $this))
         {
            return $query;
         }
         $dni=auth()->user()->dni;
         $docente=Docente::where('dni',$dni)->first();
        if($docente)
            return $query->where('docente_id', $docente->id);
         $estudiante=Estudiante::where('dni',$dni)->first();
        if($estudiante)
            return $query->where('estudiante_id', $estudiante->id);
        //return $query
     }
}
