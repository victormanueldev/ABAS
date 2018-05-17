<?php

namespace ABAS;
use ABAS\Events\NovedadCreada;
use ABAS\Events\NovedadActualizada;
use Illuminate\Database\Eloquent\Model;

class Novedad extends Model
{
    //Atributos
    protected $fillable = [
        'id',
        'descripcion',
        'estado',
        'user2_id',
        'user_id',
        'area_id'
    ];

    protected $guarded = [];

    protected $events = [
        'created' => NovedadCreada::class,
        'updated' => NovedadActualizada::class
    ];

    /**
     * Relacion Novedad-Empleado(User)
     */
    public function user()
    {
        return $this->belongsTo(User::class);
    }

    /**
     * Relacion Novedad-Empleado(User) - Actualiza Estado
     */
    public function user2()
    {
        return $this->belongsTo(User::class);
    }

    /**
     * Realacion Tarea_Novedad
     */
    public function areas()
    {
        return $this->belongsToMany(Area::class);
    }
}
