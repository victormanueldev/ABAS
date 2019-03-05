<?php

namespace ABAS\Http\Controllers;

use Illuminate\Http\Request;
use ABAS\User;
use ABAS\Evento;
use Auth;
use Carbon\Carbon;
use ABAS\Area;
use ABAS\Cliente;
use ABAS\Sede;

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
        $user = User::with('area','eventos')->where('id',Auth::user()->id)->get();
        $dt = Carbon::now();//DateTime Actual

        //Cambiar estado de clientes de NUEVO a RECOMPRA
        $clientes = Cliente::all();
        foreach ($clientes as $cliente) {
            if($cliente->created_at->month < $dt->month || $cliente->created_at->year <= $dt->year){
                $cliente->estado_registro  = 'recompra';
                $cliente->save();
            }
        }

        $fecha_actual = $dt->toDateString();//Fecha Actual
        $tomorrow = $dt->addDay(1);//Mañana
        $manana = $tomorrow->toDateString();//fecha mañana
        $eventos = Auth::user()->eventos;
        $data_eventos = collect();
        $areas = Area::all();
        foreach ($eventos as $evento ) {
            $clienteEvento = "";
            $sedeEvento = "";
            if(isset($evento->cliente_id)){
                $clienteEvento = Cliente::select('id', 'nombre_cliente')->where('id', $evento->cliente_id)->get();
                if(isset($evento->sede_id) && $evento->sede_id != 0){
                    $sedeEvento = Sede::select('id', 'nombre')->where('id', $evento->sede_id)->get();
                }
            }
            $fecha_ini = Carbon::parse($evento->fecha_inicio);
            $fecha_ini_carbon = $fecha_ini->toDateString();//Fecha inicio de evento
            $hora_carbon = $fecha_ini->toTimeString();//Hora inicio del evento
            if ($fecha_ini_carbon == $fecha_actual || $fecha_ini_carbon == $manana) {
                //Coleccion con la informacion de todos los eventos
                $data_eventos->push([
                    'tipo' => $evento->tipo,
                    'asunto' => $evento->asunto,
                    'fecha_inicio' => $fecha_ini_carbon,
                    'hora_inicio' => $hora_carbon,
                    'cliente' => $clienteEvento != "" ? $clienteEvento[0]->nombre_cliente : "No definido",
                    'sede' => $sedeEvento != "" ? $sedeEvento[0]->nombre : "No definido",
                    'telefono' => $evento->telefono_evento != "" ? $evento->telefono_evento : 'No definido',
                    'direccion' => $evento->direccion_evento != "" ? $evento->direccion_evento : 'No definido'
                ]);
            }
        }
        // dd($data_eventos);
        //return $clientes;
        return view('general.index', compact('user', 'data_eventos', 'fecha_actual','areas','clientes'));
    }
}
