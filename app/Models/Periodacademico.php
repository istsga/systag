<?php

namespace App\Models;


use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Periodacademico extends Model
{
    use HasFactory;

    protected $fillable = [
        'estado', 'periodo', 'fecha_inicio', 'fecha_final'
    ];

    public function carreras()
    {
        return $this->belongsToMany(Carrera::class);
    }

    //Scope
    public function scopeAllowed($query)
    {
        $dni=auth()->user()->dni;
        $docente=Docente::where('dni',$dni)->first();
        if(!$docente)
        {
           return $query;
        }
        $now= now();
        $now = $now->format('Y-m-d');
        return $query->where('fecha_inicio','<=',$now)
                ->where('fecha_final','>=', $now);
    }
}
