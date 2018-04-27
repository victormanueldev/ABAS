<?php

namespace ABAS;

use Illuminate\Database\Eloquent\Model;

class Cliente extends Model
{
    //Atributos
    protected $fillable = [
        'id',
        'nombre_cliente',
        'razon_social',
        'nit_cedula',
        'sector_economico',
        'municipio',
        'direccion',
        'barrio',
        'nombre_contacto',
        'contacto_tecnico',
        'cargo_contacto_tecnico',
        'cargo_contacto',
        'email',
        'telefono',
        'telefono2',
        'extension',
        'celular',
        'empresa_actual',
        'razon_cambio',
        'user_id'
    ];

    /**
     * Relacion Cliente-Empleado(User)
     */
    public function user()
    {
        return $this->belongsTo(User::class);
    }

    /**
     * Relacion Cliente-Sede
     */
    public function sedes()
    {
        return $this->hasMany(Sede::class);
    }
}
