<?php

namespace ABAS;

use Illuminate\Database\Eloquent\Model;

class Factura extends Model
{
    //
    protected $fillable = [
        'numero_factura',
        'valor',
        'servicio_id'
    ];

    public function servicio()
    {
        return $this->belongsTo(Servicio::class);
    }
}
