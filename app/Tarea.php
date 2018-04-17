<?php

namespace ABAS;

use Illuminate\Database\Eloquent\Model;

class Tarea extends Model
{
    protected $fillable = [
        'id',
        'asunto',
        'completado'
    ];

    /**
     * Realacion Trea-User(Empleado)
     */
    public function user()
    {
        return $this->belongsTo(User::class);
    }

}
