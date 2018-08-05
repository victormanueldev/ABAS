<?php

namespace ABAS;

use Illuminate\Database\Eloquent\Model;

class Servicio extends Model
{
    //Atributos
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

    /**
     * Relacion servicio pretenece a un cliente
     */
    public function cliente()
    {
        return $this->belongsTo(Cliente::class);
    }

    /**
     * Relacion servicio pertence a una sede
     */
    public function sede()
    {
        return $this->belongsTo(Sede::class);
    }

    /**
     * Relacion servicio pertenece a varios tecnicos
     */
    public function tecnicos()
    {
        return $this->belongsToMany(Tecnico::class);
    }

    /**
     * Relacion servicio tiene varios tipos de servicios
     */
    public function tipos()
    {
        return $this->belongsToMany(TipoServicio::class);
    }

    /**
     * Relacion servicio tiene una solicitud
     */
    public function solicitud()
    {
        # code...
        return $this->belongsTo(Solicitud::class)
            ->with(
                'sede:id,nombre,direccion,nombre_contacto,barrio,telefono_contacto', 
                'cliente:id,nombre_cliente,direccion,barrio,nombre_contacto,celular'
            );
    }
}
