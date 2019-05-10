<?php

namespace ABAS;

use Illuminate\Database\Eloquent\Model;

class Compra extends Model
{
    //
    public function producto()
    {
        return $this->belongsTo(Producto::class);
    }
}
