<?php

namespace ABAS;

use Illuminate\Database\Eloquent\Model;

class Ruta extends Model
{
    //
    protected $casts = [
        'contenido' => 'array'
    ];

    protected $fillable = [
        'tipo',
        'codigo',
        'contenido',
        'solicitud_id',
    ];

    public function solicitud(){
        return $this->belongsTo(Solicitud::class);
    }

    public function tecnicos()
    {
        return $this->belongsToMany(Tecnico::class);
    }

    public function productos()
    {
        return $this->belongsToMany(Producto::class)->withPivot('cantidad_aplicada')->withTimestamps();
    }
}
