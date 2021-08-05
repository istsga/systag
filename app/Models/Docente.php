<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Spatie\Permission\Traits\HasRoles;

class Docente extends Model
{
    use HasRoles, HasFactory;

    protected $fillable = [
        'tipo_identificacion', 'dni','nombre', 'apellido', 'email', 'titulo_academico', 'abreviatura', 'fecha_ingreso', 'telefono_fijo',
         'telefono_movil', 'provincia_id', 'cantone_id', 'calle', 'estado', 'tipocontrato_id'
     ];

     public function provincia()
     {
         return $this->belongsTo(Provincia:: class);
     }

     public function cantone()
     {
         return $this->belongsTo(Cantone:: class);
     }

     public function tipocontrato()
     {
         return $this->belongsTo(Tipocontrato:: class);
     }

     //SCOPE Auth
     public function scopeAllowed($query)
     {
         if( auth()->user()->can('view', $this))
         {
            return $query;
         }
         return $query->where('dni', auth()->user()->dni);
     }
}
