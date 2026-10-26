<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class Cita extends Model
{
    protected $table = 'citas';
    protected $fillable = [
        'paciente',
        'medico_id',
        'consultorio',
        'fecha_hora'
    ];

    public function medico(){
        return $this->belongsTo(Doctorson::class, 'medico_id');
    }
}
