<?php

namespace ABAS\Http\Controllers;

use ABAS\Servicio;
use ABAS\Cliente;
use ABAS\Solicitud;
use ABAS\Tecnico;
use ABAS\TipoServicio;
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
        $tipos = TipoServicio::all();
        return view('programacion.cronograma-servicios', compact('clientes', 'tecnicos', 'tipos'));
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
                $servicio->frecuencia = $request->frecuencia;
                $servicio->fecha_inicio = $dt_ini->toDateString();  //Fecha de inicio (YYYY-DD-MM)
                $servicio->hora_inicio = $request->hora_inicio;
                $servicio->duracion = $request->duracion;
                $color_tecnico = Tecnico::select('color')->where('id', $request->id_tecnicos[0])->get();
                $servicio->color = $color_tecnico[0]['color'];
                $servicio->solicitud_id = $request->id_solicitud;
                $dt_fin = $dt_ini->addMinutes($request->duracion);  //Suma los minutos a la hora especificada
                $servicio->fecha_fin = $dt_fin->toDateString();
                $servicio->hora_fin = $dt_fin->toTimeString(); 
                $servicio->save();
                //Obtiene el ultimo servicio agendado
                $max_id = DB::table('servicios')->max('id');
                //Crea el registro en la table pivot (servicio_tecnico) del actual servicio agendado
                foreach ($request->id_tecnicos as $index => $value) {
                    DB::table('servicio_tecnico')->insert([
                        'servicio_id' => $max_id,
                        'tecnico_id' => $value
                    ]);
                }
                //Crea el registro en la table pivot (servicio_tipo) del actual servicio agendado
                foreach ($request->tipos as $index => $value) {
                    DB::table('servicio_tipo_servicio')->insert([
                        'servicio_id' => $max_id,
                        'tipo_servicio_id' => $value
                    ]);
                }

                //Crea servicios dependiendo de la frecuencia solicitada
                for ($i = 0; $i<=2; $i++){
                    //Obtiene la nueva fecha luego de haber sumado los dias a la fecha seleccionada en el calendario
                    $nueva_fecha = $dt_ini->addDays($request->frecuencia);
                    //Insertar varios registros con diferentes fechas de inicio en la BD
                    $id_servicio = DB::table('servicios')->insertGetId([
                        'frecuencia' => $request->frecuencia,
                        "fecha_inicio" => $nueva_fecha,
                        'hora_inicio' => $request->hora_inicio,
                        'duracion' => $request->duracion,
                        'color' => $color_tecnico[0]['color'],
                        'solicitud_id' => $request->id_solicitud,
                        'fecha_fin' => $nueva_fecha,
                        'hora_fin' => $nueva_fecha->toTimeString()
                    ]);
                    //Insertar los registros en la tabla pivot (Servicio_tecnico)
                    foreach ($request->id_tecnicos as $index => $value) {
                        DB::table('servicio_tecnico')->insert([
                            'servicio_id' => $id_servicio,
                            'tecnico_id' => $value
                        ]);
                    }
                    //Insertar los registros en la tabla pivot (Servicio_tipo_servicio)
                    foreach ($request->tipos as $index => $value) {
                        DB::table('servicio_tipo_servicio')->insert([
                            'servicio_id' => $id_servicio,
                            'tipo_servicio_id' => $value
                        ]);
                    }
                }
                return response()->json(["Servicio Guardado con Exito"], 200);
                // return response()->json($max_id);
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
        //Seleccionar columnas en las relaciones de eloquent
        $servicio = Servicio::with('tipos:id,nombre', 'tecnicos:id,nombre,color', 'solicitud')->where('id', $id)->get();
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

    /**
     * Renderizar PDF con la informacion relacionada con el sercisio
     * 
     * @param Servicio $id
     * @return \Illuminate\Http\Response
     */
    public function print($id, Request $request)
    {
        
    }
}
