<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Convalidacione extends Model
{
    use HasFactory;

    protected $fillable = [
        'estudiante_id', 'asignatura_id', 'nota_final'
    ];

    public function estudiante(){
        return $this->belongsTo(Estudiante:: class);
    }

    public function asignatura(){
        return $this->belongsTo(Asignatura:: class);
    }
}
