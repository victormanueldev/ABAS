<?php

namespace ABAS;

use Illuminate\Database\Eloquent\Model;

class Evento extends Model
{
    //Atributos
    protected $fillable = [
        'fecha_inicio',
        'fecha_fin',
        'dia_completo',
        'color',
        'asunto'
    ];

    /**
     * Relacion Evento-User(Empleado)
     */
    public function user()
    {
        return $this->belongsTo(User::class);
    }
}
