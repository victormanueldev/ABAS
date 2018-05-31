<?php

namespace ABAS;

use Illuminate\Database\Eloquent\Model;

class Telefono extends Model
{
    //
    protected $fillable = [
        'numero', 'cliente_id'
    ];


    public function cliente()
    {
        return $this->belongsTo(Cliente::class);
    }
}
