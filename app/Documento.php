<?php

namespace ABAS;

use Illuminate\Database\Eloquent\Model;

class Documento extends Model
{
    //

    public function sede()
    {
        return $this->belongsTo(Sede::class);
    }
}
