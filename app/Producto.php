<?php

namespace ABAS;

use Illuminate\Database\Eloquent\Model;

class Producto extends Model
{
    //
    public function ordenes()
    {
        return $this->belongsToMany(OrdenServicio::class)->withPivot('cantidad_aplicada')->withTimestamps();
    }

    public function rutas()
    {
        return $this->belongsToMany(Ruta::class)->withPivot('cantidad_aplicada')->withTimestamps();
    }
}
