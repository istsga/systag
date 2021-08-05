<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Asignacione extends Model
{
    use HasFactory;

    protected $fillable = [
        'periodacademico_id', 'carrera_id', 'periodo_id', 'seccione_id', 'paralelo_id'
    ];

    public function periodo()
    {
        return $this->belongsTo(Periodo:: class);
    }

    public function seccione()
    {
        return $this->belongsTo(Seccione:: class);
    }

    public function paralelo()
    {
        return $this->belongsTo(Paralelo:: class);
    }

    public function carreras(){
        return $this->belongsToMany(Carrera:: class);
    }

    public function periodacademicos(){
        return $this->belongsToMany(Periodacademico:: class);
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
        return $query->where('docente_id',$docente->id );
    }

}
