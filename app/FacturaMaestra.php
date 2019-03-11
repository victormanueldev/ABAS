<?php

namespace ABAS;

use Illuminate\Database\Eloquent\Model;

class FacturaMaestra extends Model
{
    //
    protected $fillable = [
        'numero_factura',
        'total_factura',
        'estado',
        'cliente_id'
    ];

    public function cliente()
    {
        return $this->belongsTo(Cliente::class);
    }

}
