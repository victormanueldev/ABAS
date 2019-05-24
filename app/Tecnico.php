<?php

namespace ABAS;

use Illuminate\Database\Eloquent\Model;

class Tecnico extends Model
{
    //
    protected $fillable = [
        'id',
        'nombre',
        'color',
        'created_at',
        'updated_at'
    ];

    public function servicios()
    {
        return $this->belongsToMany(Servicio::class, 'servicio_tecnico');
    }

    public function rutas()
    {
        return $this->belongsToMany(Ruta::class)->withPivot('hora_entrada','hora_salida')->withTimestamps();
    }

    public function ordenes()
    {
        return $this->belongsToMany(OrdenServicio::class)->withPivot('hora_entrada','hora_salida')->withTimestamps();
    }
}
