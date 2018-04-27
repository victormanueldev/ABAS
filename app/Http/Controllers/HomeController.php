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
        $dt = Carbon::now();
        $fecha_actual = $dt->toDateString();
        $eventos = Auth::user()->eventos;
        $data_eventos = collect();
        foreach ($eventos as $evento ) {
            $fecha_ini = Carbon::parse($evento->fecha_inicio);
            $fecha_ini_carbon = $fecha_ini->toDateString();
            if ($fecha_ini_carbon == $fecha_actual) {
                $data_eventos->push($evento);
            }
        }
        // dd($data_eventos);
        return view('index', compact('user', 'data_eventos'));
    }
}
