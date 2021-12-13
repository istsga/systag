<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Horarioclase extends Model
{
    use HasFactory;

    //Scope
    public function scopeAllowed($query)
    {
        if(auth()->user()->can('View', $this))
        {
            return $query;
        }
        return $query->where('id', auth()->id());
    }
}
