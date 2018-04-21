<?php

namespace ABAS;

use Illuminate\Database\Eloquent\Model;

class Novedad extends Model
{
    //Atributos
    protected $fillable = [
        'id',
        'descripcion',
        'estado',
        'user2_id',
        'user_id'
    ];

    /**
     * Relacion Novedad-Empleado(User)
     */
    public function user()
    {
        return $this->belongsTo(User::class);
    }

    /**
     * Relacion Novedad-Empleado(User) - Actualiza Estado
     */
    public function user2()
    {
        return $this->belongsTo(User::class);
    }

    /**
     * Realacion Tarea_Novedad
     */
    public function areas()
    {
        return $this->belongsToMany(Area::class);
    }
}
