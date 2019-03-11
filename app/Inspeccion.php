<?php

namespace ABAS;

use Illuminate\Database\Eloquent\Model;

class Inspeccion extends Model
{
    //
    protected $casts = [
        'visitas' => 'array',
        'detalle_servicios' => 'array',
        'residencias' => 'array',
        'compra_dispositivos' => 'array',
        'dispositivos_comodato' => 'array',
        'gestion_calidad' => 'array'
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
        'medio_contacto',
        'otro',
        'cliente_id',
        'sede_id',
        'factura_maestra',
    ];

    public function cliente()
    {
        return $this->belongsTo(Cliente::class);
    }

    public function sede()
    {
        return $this->belongsTo(Sede::class);
    }
}
