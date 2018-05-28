<?php

namespace ABAS;

use Illuminate\Database\Eloquent\Model;

class Solicitud extends Model
{
    protected fillable = [

    	'id',
    	'codigo',
    	'cliente_id'

    ];

    /**
     * Relacion Solicitud-Cliente
     */
    public function clientes()
    {
        return $this->belongsTo(Cliente::class);
    }
}
