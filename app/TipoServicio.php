<?php

namespace ABAS;

use Illuminate\Database\Eloquent\Model;

class TipoServicio extends Model
{
    //
    public function servicios()
    {
        return $this->hasMany(Servicio::class);
    }
}
