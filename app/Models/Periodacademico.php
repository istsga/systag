<?php

namespace App\Models;
//use Spatie\Permission\Models\Role;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Spatie\Permission\Traits\HasRoles;

class Periodacademico extends Model
{
    use HasFactory, HasRoles;

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


    public function scopeEstado($query)
    {
        $user=auth()->user();

        if($user->hasRole(['Docente', 'Estudiante'])){
            return $query->where('estado','<>','Finalizado');
        }
        return $query;
    }
}
