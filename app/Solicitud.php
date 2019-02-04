<?php

namespace ABAS;

use Illuminate\Database\Eloquent\Model;

class Solicitud extends Model
{
    protected $table  = 'solicitudes';
    protected $fillable = [
    	'id',
    	'codigo',
        'fecha',
        'nombre_usuario',
        'frecuencia',
        'cliente_id',
        'sede_id',
        'contacto_name_factura',
        'contacto_telefono_factura',
        'contacto_celular_factura',
        'observaciones_tecnico',
        'total_plan',
        'instrucciones',
        'estaciones_roedor',
        'lamparas_control',
        'cajas_alcantarilla',
        'trampas_plasticas',
        'numero_casas',
        'numero_aptos',
        'numero_bodegas',
        'contrato',
        'forma_pago',
        'facturacion',
        'servicios_1',
        'frecuencia_servicios_1',
        'valor_servicios_1',
        'servicios_2',
        'frecuencia_servicios_2',
        'valor_servicios_2',
        'servicios_3',
        'frecuencia_servicios_3',
        'valor_servicios_3',
        'total_servicios',
        'dispositivos_1',
        'cantidad_dispositivos_1',
        'unidad_dispositivos_1',
        'total_dispositivos_1',
        'dispositivos_2',
        'cantidad_dispositivos_2',
        'unidad_dispositivos_2',
        'total_dispositivos_2',
        'dispositivos_3',
        'cantidad_dispositivos_3',
        'unidad_dispositivos_3',
        'total_dispositivos_3',
        'observaciones_dispositivos',
        'dispositivos_comodato_1',
        'cantidad_dispositivos_comodato_1',
        'unidad_dispositivos_comodato_1',
        'total_dispositivos_comodato_1',
        'dispositivos_comodato_2',
        'cantidad_dispositivos_comodato_2',
        'unidad_dispositivos_comodato_2',
        'total_dispositivos_comodato_2',
        'dispositivos_comodato_3',
        'cantidad_dispositivos_comodato_3',
        'unidad_dispositivos_comodato_3',
        'total_dispositivos_comodato_3',
        'observaciones_dispositivos_comodato',
        'medio_contacto',
        'otro',
    ];

    /**
     * Relacion Solicitud-Cliente
     */
    public function cliente()
    {
        return $this->belongsTo(Cliente::class);
    }

    public function sede()
    {
        return $this->belongsTo(Sede::class);
    }

    public function rutas()
    {
        return $this->hasMany(Ruta::class);
    }

    public function certificados()
    {
        return $this->hasMany(Certificado::class);
    }

    public function servicios()
    {
        return $this->hasMany(Servicio::class);
    }
}
