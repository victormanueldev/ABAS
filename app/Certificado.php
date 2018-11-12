<?php

namespace ABAS;

use Illuminate\Database\Eloquent\Model;

class Certificado extends Model
{
    //
    protected $casts = [
        'tratamientos' => 'array',
        'productos' => 'array',
    ];
    
    protected $filleable = [
        'area-tratada',
        'frecuencia',
        'tratamientos',
        'productos',
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
