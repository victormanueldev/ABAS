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
        return $this->hasMany(Ruta::class);
    }
}
