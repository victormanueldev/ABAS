<?php

namespace ABAS;

use Illuminate\Database\Eloquent\Model;

class Area extends Model
{
    //Atributos
    protected  $filleable = [
        'id', 'nombre', 'descripcion'
    ];

    /**
     * Relacion Area-Novedad
     */
    public function novedades()
    {
        return $this->hasMany(Novedad::class);
    }
}
