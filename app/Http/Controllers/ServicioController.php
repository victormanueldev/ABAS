<?php

namespace ABAS\Http\Controllers;

use ABAS\Servicio;
use ABAS\Cliente;
use ABAS\Solicitud;
use ABAS\Tecnico;
use Illuminate\Http\Request;
use Carbon\Carbon;

class ServicioController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        //
        $servicios = Servicio::all();
        $data = collect();
        foreach ($servicios as $servicio) {
            $data->push([
                'id' => $servicio->id, 
                'title' => $servicio->tipo, 
                'start' => $servicio->fecha_inicio,
                'end' => $servicio->fecha_fin, 
                'backgroundColor' => $servicio->color, 
                'borderColor' => $servicio->color
                ]);
        }
        $data->toJson();//Convierte la colecciona a formato JSON
        return $data;
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        //
        $clientes = Cliente::select('id', 'nit_cedula')->get();
        $tecnicos = Tecnico::all();
        return view('programacion.cronograma-servicios', compact('clientes', 'tecnicos'));
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {
        
        try{
            if($request->ajax()){
                $servicio = new Servicio();
                $servicio->tipo = $request->tipo;
                $servicio->frecuencia = $request->frecuencia;
                $servicio->fecha_inicio = $request->start;
                $servicio->duracion = $request->duracion;
                $servicio->color = $request->color;
                $servicio->tecnico_id = $request->id_tecnico;
                $servicio->solicitud_id = $request->id_solicitud;
                $dt_ini = Carbon::parse($request->start);   //Convierte el request en un objeto Carbon
                $dt_fin = $dt_ini->addMinutes($request->duracion);  //Suma los minutos a la hora especificada
                $servicio->fecha_fin = $dt_fin->toDateString()." ".$dt_fin->toTimeString(); 

                $servicio->save();
                return response()->json("Servicio Guardado con Exito", 200);
            }else{
                return response()->json("Error en la petición AJAX", 406);
            }
        }catch(\Exception $e){
            return response()->json(["Error al intentar guardar el servicio", $e], 500);
        }
    }

    /**
     * Display the specified resource.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function show(Request $request)
    {
        //
        $solicitud = Solicitud::select('id', 'frecuencia', 'observaciones')
                                ->where('id_cliente', $request->id_cliente)
                                ->where('id_sede', $request->id_sede)
                                ->get();
        return $solictud;
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  \ABAS\Servicio  $servicio
     * @return \Illuminate\Http\Response
     */
    public function edit(Servicio $servicio)
    {
        //
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  \ABAS\Servicio  $servicio
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, Servicio $servicio)
    {
        //
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  \ABAS\Servicio  $servicio
     * @return \Illuminate\Http\Response
     */
    public function destroy(Servicio $servicio)
    {
        //
    }
}
