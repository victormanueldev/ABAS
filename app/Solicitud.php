<?php

namespace ABAS;

use Illuminate\Database\Eloquent\Model;

class Solicitud extends Model
{
    protected $table  = 'solicitudes';
    protected $fillable = [
    	'id',
    	'codigo',
        'cliente_id',
        'sede_id', 
        'frecuencia',
        'fecha',
        'contacto_factura',
        'telefono',
        'celular',
        'observaciones',
        'contacto_telefono_factura',
        'contacto_name_factura',
        'contacto_celular_factura',
        'observaciones_tecnico',
        'diagnostico_inicial',
        'cronograma_servicios',
        'visita_calidad',
        'frecuencia_calidad',
        'frecuencia_visitas',
        'visita_1',
        'visita_2',
        'visita_3',
        'visita_4',
        'total_horas_visita',
        'valor_hora',
        'valor_facturar',
        'instrucciones',
        'servicios_contratados',
        'frecuencia_plagas',
        'tipo_cliente',
        'tapa_alcantarilla',
        'numero_tapas',
        'numero_residencias',
        'horas_semanales',
        'horas_mensuales',
        'horas_trimestrales',
        'horas_semestrales',
        'horas_quincenales',
        'horas_bimensuales',
        'horas_4meses',
        'horas_anuales',
        'total_horas_cotizadas',
        'valor_hora_antes',
        'valor_inicia_antes',
        'forma_pago',
        'facturacion',
        'contrato',
        'numero_contrato',
        'actividad_economica',
        'medio_contacto',
        'otro',
        'nombre_usuario',
        'nombre_usuario_revisado'
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
