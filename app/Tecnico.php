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

    public function servicios()
    {
        return $this->hasMany(Servicio::class);
    }
}
