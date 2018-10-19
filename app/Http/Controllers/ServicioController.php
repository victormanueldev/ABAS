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
        $servicios = Servicio::with('solicitud')->get();
        $data = collect();
        foreach ($servicios as $servicio) {
            //Valida que el cliente sea persona natural o juridica (Si tiene sedes)
            if($servicio->solicitud->sede != ''){
                $titleService = $servicio->solicitud->sede["nombre"];
                $dirClient = $servicio->solicitud->sede["direccion"];
                $telClient = $servicio->solicitud->sede["telefono_contacto"];
                $nameContact = $servicio->solicitud->sede["nombre_contacto"];
            }else{
                $titleService = $servicio->solicitud->cliente["nombre_cliente"];
                $dirClient = $servicio->solicitud->cliente["direccion"];
                $telClient = $servicio->solicitud->cliente["celular"];
                $nameContact = $servicio->solicitud->cliente["nombre_contacto"];
            }

            if($servicio->confirmado == 1){
                $editableEvent = false;
            }else{
                $editableEvent = true;
            }

            $data->push([
                'id' => $servicio->id, 
                'title' => $titleService, 
                'start' => $servicio->fecha_inicio." ".$servicio->hora_inicio,
                'end' => $servicio->fecha_fin." ".$servicio->hora_fin, 
                'backgroundColor' => $servicio->color, 
                'borderColor' => $servicio->color,
                'lock' => $servicio->confirmado,
                'dirClient' => $dirClient,
                "contactClient" => $nameContact,
                "telClient" => $telClient,
                "editable" => $editableEvent
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
                $serie = "S".$max_id;
                //Actualizar el registro creado con el numero de serie S+$max_id
                DB::table('servicios')->where('id', $max_id)->update(['serie' => $serie]);
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
                        'serie' => $serie,
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
    public function show(Request $request, $id)
    {
        //
        if ($request->ajax()) {
            $servicios = Servicio::with('tipos', 'tecnicos')->where('id', $id)->get();
            return  $servicios;
        } else {
            $servicio =Servicio::find($id);
            $tipos = TipoServicio::all();
            $tecnicos = Tecnico::all();
            return view('programacion.editar-servicios', compact('servicio', 'tipos', 'tecnicos'));
        }
        

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
    public function update($id, Request $request)
    {
        //Convierte la fecha del request en un objeto Carbon
        $dt_ini = Carbon::parse($request->fecha_inicio." ".$request->hora_inicio);   //Convierte el request en un objeto Carbon
        //Actualizar datos del servicio
        $servicio = Servicio::find($id);
        $servicio->fecha_inicio = $request->fecha_inicio;
        $servicio->hora_inicio = $request->hora_inicio;
        $dt_fin = $dt_ini->addMinutes($request->duracion);  //Suma los minutos a la hora especificada
        $servicio->fecha_fin = $dt_fin->toDateString();
        $servicio->hora_fin = $dt_fin->toTimeString(); 
        $servicio->frecuencia = $request->frecuencia;
        $servicio->duracion = $request->duracion;
        $servicio->confirmado = $request->confirmado;
        //Borrar los registros actuales de las tablas pivot
        DB::table('servicio_tecnico')->where('servicio_id', $id)->delete();
        DB::table('servicio_tipo_servicio')->where('servicio_id', $id)->delete();
        //Actualiza el servicio con sus nuevos valores
        $servicio->save();
        //Insertar los registros en la tabla pivot (Servicio_tecnico)
        foreach ($request->tecnicos as $index => $value) {
            DB::table('servicio_tecnico')->insert([
                'servicio_id' => $id,
                'tecnico_id' => $value
            ]);
        }
        //Insertar los registros en la tabla pivot (Servicio_tipo_servicio)
        foreach ($request->tipos as $index => $value) {
            DB::table('servicio_tipo_servicio')->insert([
                'servicio_id' => $id,
                'tipo_servicio_id' => $value
            ]);
        }
        return response()->json(["hora" => $servicio->fecha_fin, "inicio" => $dt_ini, "fin" => $dt_fin],200);
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  \ABAS\Servicio  $servicio
     * @return \Illuminate\Http\Response
     */
    public function destroy($idServicio, Request $request)
    {
        //
        if($request->ajax()){
            switch ($request->option) {
                case '1':
                    Servicio::destroy('id', $idServicio);
                    //Borrar los registros actuales de las tablas pivot
                    DB::table('servicio_tecnico')->where('servicio_id', $idServicio)->delete();
                    DB::table('servicio_tipo_servicio')->where('servicio_id', $idServicio)->delete();
                    break;
                case '2':
                    //Obtiene la seria a la que pertenece el ID del servicio
                    $serieServicio = DB::table('servicios')->select('id','serie')->where('id', $idServicio)->get();
                    //Obtiene los servicios pertenecientes de a esta serie
                    $servicios = DB::table('servicios')->where('serie', $serieServicio[0]->serie)->get();
                    //Recorre los servicios obtenidos
                    foreach ($servicios as $servicio ) {
                        //Valida que no sea el ID del servicio seleccionado
                        if($servicio->id != $serieServicio[0]->id){
                            //Borra el servicio de la BD
                            Servicio::destroy('id', $servicio->id);
                            //Borra los registros de este ID de las tablas pivot
                            DB::table('servicio_tecnico')->where('servicio_id', $servicio->id)->delete();
                            DB::table('servicio_tipo_servicio')->where('servicio_id', $servicio->id)->delete();
                        }
                    }
                    break;
                case '3':
                    $serieServicio = DB::table('servicios')->select('id','serie')->where('id', $idServicio)->get();
                    $servicios = DB::table('servicios')->where('serie', $serieServicio[0]->serie)->get();
                    foreach ($servicios as $servicio ) {
                        //Borra todos los servicios incluyendo el ID seleccionado
                        Servicio::destroy('id', $servicio->id);
                        DB::table('servicio_tecnico')->where('servicio_id', $servicio->id)->delete();
                        DB::table('servicio_tipo_servicio')->where('servicio_id', $servicio->id)->delete();
                    }
                    break;
                
                default:
                    # code...
                    break;
            }
            return response()->json('Delete Successfully' ,200);
        }
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

    /**
     * Guardar servicio Neutro con información básica
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function saveNeutralService(Request $request)
    {
        if($request->ajax()){
            try{
                Servicio::create($request->all());
            }catch(\Exception $e ){
                return response()->json($e, 500);
            }
            return response()->json('Creation Success', 201);   

        }else{
            return response()->json(['error: ' => 'Error en la petición'], 500);
        }
        
    }
}
