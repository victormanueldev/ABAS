<?php

namespace ABAS;

use Illuminate\Database\Eloquent\Model;

class Ruta extends Model
{
    //
    protected $casts = [
        'contenido' => 'array'
    ];

    protected $fillable = [
        'tipo',
        'codigo',
        'contenido',
        'solicitud_id',
    ];

}
