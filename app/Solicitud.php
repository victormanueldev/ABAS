<?php

namespace ABAS;

use Illuminate\Database\Eloquent\Model;

class Solicitud extends Model
{
    protected $table  = 'solicitudes';
    protected $casts = [
        'visitas' => 'array',
        'detalle_servicios' => 'array',
        'residencias' => 'array',
        'compra_dispositivos' => 'array',
        'dispositivos_comodato' => 'array',
        'gestion_calidad' => 'array',
        'areas' => 'array'
    ];

    protected $fillable = [
        'codigo',
        'nombre_usuario',
        'fecha',
        'frecuencia',
        'observaciones',
        'valor_plan_saneamiento',
        'frecuencia_visitas',
        'observaciones_visitas',
        'total_detalle_servicios',
        'tipo_facturacion',
        'forma_pago',
        'contrato',
        'cant_lampara_lamina',
        'cant_lampara_insectocutora',
        'cant_trampas',
        'cant_jaulas',
        'cant_estaciones_roedor',
        'observaciones_estaciones',
        'cant_cajas_alca_elec',
        'sumideros',
        'cliente_id',
        'sede_id',
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
