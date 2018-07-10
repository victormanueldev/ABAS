<?php

namespace ABAS;

use Illuminate\Database\Eloquent\Model;

class Tecnico extends Model
{
    //
    protected $fillable = [
        'id',
        'nombre',
        'color'
    ];
}
