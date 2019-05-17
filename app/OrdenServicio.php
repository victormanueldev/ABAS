<?php

namespace ABAS;

use Illuminate\Database\Eloquent\Model;

class OrdenServicio extends Model
{
    //
    public function productos()
    {
        return $this->hasMany(Producto::class);
    }

    public function tecnicos()
    {
        return $this->belongsToMany(Tecnico::class);
    }
}
