<?php

namespace ABAS;

use Illuminate\Database\Eloquent\Model;

class Cargo extends Model
{
    //
    protected  $filleable = [
        'id', 'nombre', 'descripcion'
    ];

    public function users()
    {
        return $this->hasMany(User::class);
    }
}
