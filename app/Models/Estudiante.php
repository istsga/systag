<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Estudiante extends Model
{
    use HasFactory;

    protected $fillable = [
        'tipo_identificacion','dni', 'nombre', 'apellido', 'foto' , 'estadocivile_id', 'fecha_nacimiento', 'nacionalidad', 'lugar_nacimiento',
        'ocupacion', 'discapacidad', 'tipo_discapacidad', 'porcentaje', 'provincia_id', 'cantone_id', 'etnia_id', 'email', 'tiposangre_id', 'miembro_hogar',
        'ingreso_ec', 'direccion_provincia_id', 'direccion_cantone_id', 'calle', 'telefono_fijo', 'telefono_movil', 'nombre_parentesco', 'telefono_parentesco',
        'parentesco', 'institucion_origen', 'titulo_bachillerato', 'nombre_padre', 'ocupacion_padre', 'instruccione_id',
        'nombre_madre', 'ocupacion_madre', 'madre_instruccione_id', 'estado', 'convalidacion'
    ];



    public function estadocivile(){
        return $this->belongsTo(Estadocivile:: class);
    }

    public function etnia(){
        return $this->belongsTo(Etnia:: class);
    }

    public function provincia(){
        return $this->belongsTo(Provincia:: class);
    }

    public function cantone(){
        return $this->belongsTo(Cantone:: class);
    }

    public function provincia2(){
        return $this->belongsTo(Provincia:: class,'direccion_provincia_id');
    }

    public function cantone2(){
        return $this->belongsTo(Cantone:: class,'direccion_cantone_id');
    }

    public function tiposangre(){
        return $this->belongsTo(Tiposangre:: class);
    }

    public function instruccione(){
        return $this->belongsTo(Instruccione:: class);
    }

    public function instruccione2(){
        return $this->belongsTo(Instruccione:: class, 'madre_instruccione_id');
    }

    // SCOPE
    public function scopeAllowed($query)
    {
        if( auth()->user()->can('view', $this))
        {
           return $query;
        }
        return $query->where('dni', auth()->user()->dni);
    }

}
