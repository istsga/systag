<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Asignaturadocente extends Model
{
    use HasFactory;

    protected $table='asignatura_docente';

    protected $fillable = [
        'asignacione_id', 'asignatura_id', 'docente_id'
    ];


    public function asignatura(){
        return $this->belongsTo(Asignatura:: class);
    }

    public function asignacione(){
        return $this->belongsTo(Asignacione:: class);
    }

    public function docente(){
        return $this->belongsTo(Docente:: class);
    }

    //SCOPE
    public function scopeAllowed($query)
    {
        if( auth()->user()->can('view', $this))
        {
           return $query;
        }
        $dni=auth()->user()->dni;
        $docente=Docente::where('dni',$dni)->first();
        return $query->where('docente_id', $docente->id);
    }
}
