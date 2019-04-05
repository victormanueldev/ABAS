<?php

namespace ABAS;

use Illuminate\Database\Eloquent\Model;

class Meta extends Model
{
    //
    protected $fillable = [
        'meta_clientes_nuevos',
        'meta_equipo_clientes_nuevos',
        'meta_recompras',
        'meta_equipo_recompras',
        'meta_anual_inpector',
        'meta_anual_equipo',
        'user_id',
        'anio_vigencia'
    ];

    public function user()
    {
        return $this->belongsTo(User::class);
    }
}
