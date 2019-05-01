<?php

namespace ABAS;

use Illuminate\Database\Eloquent\Model;

class Comision extends Model
{
    //
    protected $fillable = [
        'id',
        'codigo',
        'fecha_inicio_comision',
        'fecha_fin_comision',
        'valor_pagado',
        'valor_pendiente',
    ];

    public function user()
    {
        return $this->belongsTo(User::class);
    }
}
