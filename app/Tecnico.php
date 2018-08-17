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
        return $this->belongsToMany(Servicio::class, 'servicio_tecnico');
    }
}
