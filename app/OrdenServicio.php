<?php

namespace ABAS;

use Illuminate\Database\Eloquent\Model;

class OrdenServicio extends Model
{
    //
    public function productos()
    {
        return $this->belongsToMany(Producto::class)->withPivot('cantidad_aplicada')->withTimestamps();
    }

    public function tecnicos()
    {
        return $this->belongsToMany(Tecnico::class);
    }
}
