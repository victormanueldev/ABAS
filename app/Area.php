<?php

namespace ABAS;

use Illuminate\Database\Eloquent\Model;

class Area extends Model
{
    //
    protected  $filleable = [
        'id', 'nombre', 'descripcion'
    ];

    /**
     * Relacion Area-Novedad
     */
    public function novedades()
    {
        return $this->belongsToMany(Novedad::class);
    }
}
