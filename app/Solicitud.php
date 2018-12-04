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
        'observaciones'
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
