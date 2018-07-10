<?php

namespace ABAS;

use Illuminate\Database\Eloquent\Model;

class Sede extends Model
{
    //Atributos
    protected $fillable = [
        'id',
        'nombre',
        'direccion',
        'ciudad',
        'barrio',
        'zona_ruta',
        'nombre_contacto',
        'telefono_contacto',
        'celular_contacto',
        'email',
        'cliente_id'
    ];

    /**
     * Relacion Sede-Cliente
     */
    public function cliente()
    {
        return $this->belongsTo(Cliente::class);
    }

    /**
     * Relacion Sede-Cliente
     */
    public function solicitud()
    {
        return $this->hasOne(solicitud::class);
    }
}
