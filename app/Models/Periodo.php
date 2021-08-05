<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Periodo extends Model
{
    use HasFactory;
    protected $fillable = ['nombre'];


    public function asignaturas()
    {
        return $this->hasMany(Asignatura::class);
    }
}
