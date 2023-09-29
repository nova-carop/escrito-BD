<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Revision extends Model
{
    use HasFactory;


    public function tarea()
    {
        return $this->belongsTo(tarea::class, 'tarea_id');
    }

}
