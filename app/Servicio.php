<?php

namespace ABAS;

use Illuminate\Database\Eloquent\Model;

class Servicio extends Model
{
    //
    protected $fillable = [
        'tipo',
        'frecuencia',
        'fecha_inicio',
        'hora_inicio',
        'hora_fin',
        'fecha_fin',
        'duracion',
        'color',
        'tecnico_id',
        'solicitud_id',
        'fecha_fin'
    ];

    public function cliente()
    {
        return $this->belongsTo(Cliente::class);
    }

    public function sede()
    {
        return $this->belongsTo(Sede::class);
    }

    public function tecnico()
    {
        return $this->belongsTo(Tecnico::class);
    }

    public function solicitud()
    {
        # code...
        return $this->belongsTo(Solicitud::class);
    }
}
