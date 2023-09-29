<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class tarea extends Model
{
    use HasFactory;

    public function tareaCategoria()
    {
        return $this->belongsTo(tarea::class, 'tarea_id');
    }

    public function Revision()
    {
        return $this->belongsTo(Revision::class, 'revision_id');
    }
}
