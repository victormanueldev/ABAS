<?php

namespace ABAS\Http\Controllers;

use Illuminate\Http\Request;
use ABAS\User;
use ABAS\Evento;
use Auth;
use Carbon\Carbon;

class HomeController extends Controller
{
    /**
     * Create a new controller instance.
     *
     * @return void
     */
    public function __construct()
    {
        $this->middleware('auth');
    }

    /**
     * Show the application dashboard.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $user = Auth::user();
        $dt = Carbon::now();//DateTime Actual
        $fecha_actual = $dt->toDateString();//Fecha Actual
        $tomorrow = $dt->addDay(1);//Mañana
        $manana = $tomorrow->toDateString();//fecha mañana
        $eventos = Auth::user()->eventos;
        $data_eventos = collect();
        foreach ($eventos as $evento ) {
            $fecha_ini = Carbon::parse($evento->fecha_inicio);
            $fecha_ini_carbon = $fecha_ini->toDateString();//Fecha inicio de evento
            $hora_carbon = $fecha_ini->toTimeString();//Hora inicio del evento
            if ($fecha_ini_carbon == $fecha_actual || $fecha_ini_carbon == $manana) {
                //Coleccion con la informacion de todos los eventos
                $data_eventos->push([
                    'tipo' => $evento->tipo,
                    'asunto' => $evento->asunto,
                    'fecha_inicio' => $fecha_ini_carbon,
                    'hora_inicio' => $hora_carbon
                ]);
            }
        }
        //dd($data_eventos);
        return view('general.index', compact('user', 'data_eventos', 'fecha_actual'));
    }
}
