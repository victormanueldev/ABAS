<?php

namespace ABAS;

use Illuminate\Database\Eloquent\Model;

class Tarea extends Model
{
    //Atributos
    protected $fillable = [
        'fecha_inicio',
        'fecha_fin',
        'dia_completo',
        'color',
        'asunto'
    ];
}
