<?php

namespace ABAS;

use Illuminate\Database\Eloquent\Model;
use Illuminate\Notifications\Notifiable;
use Illuminate\Foundation\Auth\User as Authenticatable;

class User extends Authenticatable
{
    use Notifiable;
    /**
     * The attributes that are mass assignable.
     *
     * @var array
     */
    protected $fillable = [
        'id',
        'cedula',
        'nombres',
        'apellidos',
        'telefono',
        'id_area',
        'id_cargo', 
        'email', 
        'password',
    ];

    /**
     * The attributes that should be hidden for arrays.
     *
     * @var array
     */
    protected $hidden = [
        'password', 'remember_token',
    ];

    /**
     * Relacion Users-Area
     */
    public function area()
    {
        return $this->belongsTo(Area::class);
    }

    /**
     * Relacion Users-Cargo
     */
    public function cargo()
    {
        return $this->belongsTo(Cargo::class);
    }

    /**
     * Relacion Empleado-Cliente
     */
    public function clientes()
    {
        return $this->hasMany(Cliente::class);
    }

    /**
     * Realacion User-Tarea
     */
    public function tareas()
    {
       return $this->hasMany(Tarea::class);
    }

    /**
     * Relacion User-Eventos
     */
    public function eventos()
    {
       return $this->hasMany(Evento::class);
    }

    /**
     * Relacion User-Novedad
     */
    public function novedades()
    {
        return $this->hasMany(Novedad::class);
    }
}
