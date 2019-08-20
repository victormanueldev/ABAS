<?php

namespace ABAS;

use Illuminate\Database\Eloquent\Model;

class Documento extends Model
{
    //

    public function cliente()
    {
        return $this->belongsTo(Cliente::class);
    }

    public function sede()
    {
        return $this->belongsTo(Sede::class);
    }
}
