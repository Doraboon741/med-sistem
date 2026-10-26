<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class Doctorson extends Model
{
    protected $table = "doctores";
    protected $fillable = [
        "medico","especialidad","activo"
    ];
}
