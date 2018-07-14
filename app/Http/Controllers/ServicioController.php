<?php

namespace ABAS\Http\Controllers;

use ABAS\Servicio;
use ABAS\Cliente;
use ABAS\Solicitud;
use ABAS\Tecnico;
use Illuminate\Http\Request;
use Carbon\Carbon;
use DB;


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
                'start' => $servicio->fecha_inicio." ".$servicio->hora_inicio,
                'end' => $servicio->fecha_fin." ".$servicio->hora_fin, 
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
                //Convierte la fecha del request en un objeto Carbon
                $dt_ini = Carbon::parse($request->start." ".$request->hora_inicio);   //Convierte el request en un objeto Carbon
                //Datos de Servicio
                $servicio = new Servicio();
                $servicio->tipo = $request->tipo;
                $servicio->frecuencia = $request->frecuencia;
                $servicio->fecha_inicio = $dt_ini->toDateString();  //Fecha de inicio (YYYY-DD-MM)
                $servicio->hora_inicio = $request->hora_inicio;
                $servicio->duracion = $request->duracion;
                $servicio->color = $request->color;
                $servicio->tecnico_id = $request->id_tecnico;
                $servicio->solicitud_id = $request->id_solicitud;
                $dt_fin = $dt_ini->addMinutes($request->duracion);  //Suma los minutos a la hora especificada
                $servicio->fecha_fin = $dt_fin->toDateString();
                $servicio->hora_fin = $dt_fin->toTimeString(); 
                $servicio->save();
                //Crea servicios dependiendo de la frecuencia solicitada
                for ($i = 0; $i<=5; $i++){
                    $nueva_fecha = $dt_ini->addDays($request->frecuencia);
                    Servicio::create([
                        'tipo' => $request->tipo,
                        'frecuencia' => $request->frecuencia,
                        "fecha_inicio" => $nueva_fecha,
                        'hora_inicio' => $request->hora_inicio,
                        'duracion' => $request->duracion,
                        'color' => $request->color,
                        'tecnico_id' => $request->id_tecnico,
                        'solicitud_id' => $request->id_solicitud,
                        'fecha_fin' => $nueva_fecha,
                        'hora_fin' => $nueva_fecha->toTimeString()
                    ]);
                }
                $test = Carbon::parse($request->hora_inicio);
                return response()->json(["Servicio Guardado con Exito"], 200);
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
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  \ABAS\Servicio  $servicio
     * @return \Illuminate\Http\Response
     */
    public function edit($id)
    {
        //
        $servicio = DB::table('servicios')
                        ->select(
                            'servicios.*', 
                            'tecnicos.nombre', 
                            'tecnicos.color', 
                            'solicitudes.codigo',
                            'solicitudes.fecha',
                            'solicitudes.frecuencia',
                            'clientes.nombre_cliente',
                            'sedes.nombre')
                        ->join('tecnicos', 'tecnicos.id', 'servicios.tecnico_id')
                        ->join('solicitudes', 'solicitudes.id', 'servicios.solicitud_id')
                        ->join('clientes', 'clientes.id', 'solicitudes.cliente_id')
                        ->join('sedes', 'sedes.id', 'solicitudes.sede_id')
                        ->where('servicios.id', $id)
                        ->get();
        return $servicio;
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
