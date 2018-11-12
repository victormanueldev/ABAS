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
        'contenido',
        'cliente_id',
        'sede_id'
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
