<?php

namespace ABAS;

use Illuminate\Database\Eloquent\Model;

class Cliente extends Model
{
    protected $dates = [
        'created_at',
        'updated_at'
    ];
    //Atributos
    protected $fillable = [
        'tipo_cliente',
        'nit_cedula',
        'nombre_cliente',
        'nombre_comercial',
        'sector_economico',
        'municipio',
        'direccion',
        'barrio',
        'zona',
        'estado_negociacion',
        'estado_facturacion',
        'estado_agendamiento',
        'estado_registro',
        'nombre_contacto_inicial',
        'cargo_contacto_inicial',
        'celular_contacto_inicial',
        'email_contacto_inicial',
        'nombre_contacto_tecnico',
        'cargo_contacto_tecnico',
        'celular_contacto_tecnico',
        'email_contacto_tecnico',
        'nombre_contacto_facturacion',
        'cargo_contacto_facturacion',
        'celular_contacto_facturacion',
        'email_contacto_facturacion',
        'empresa_actual',
        'razon_cambio',
        'doc_rut',
        'doc_identidad',
        'doc_camara_comercio',
        'user_id',
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

    /**
     * Relacion Cliente-Solicitud
     */
    public function solicitudes()
    {
        return $this->hasMany(Solicitud::class);
    }
    
    /**
     * Relacion entre Clientes-Telefonos
     */
    public function telefonos()
    {
        return $this->hasMany(Telefono::class);
    }

    /**
     * Relacion entre Clientes-Rutas
     */
    public function rutas()
    {
        return $this->hasMany(Ruta::class);
    }

    public function cotizacion()
    {
        return $this->hasMany(Cotizacion::class);
    }

    public function inspeccion()
    {
        return $this->hasMany(Inspeccion::class);
    }

    public function facturas()
    {
        return $this->hasMany(Factura::class);
    }
}
