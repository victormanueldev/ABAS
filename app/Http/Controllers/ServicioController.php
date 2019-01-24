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
                "editable" => $editableEvent,
                'duration' => $servicio->duracion
                ]);
        }
        //$data->toJson();//Convierte la colecciona a formato JSON
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
        $nueva_fecha = '';
        // try{
            if($request->ajax()){
                //Convierte la fecha del request en un objeto Carbon
                $dt_ini = Carbon::parse($request->start." ".$request->hora_inicio);   //Convierte el request en un objeto Carbon
                //$time_ini = Carbon::parse($request->start." ".$request->hora_inicio);
                //Valida si es Domingo
                if($dt_ini->isSunday()){
                    $dt_ini->next(Carbon::MONDAY);  //Pasa el servicio para el siguiente lunes
                }

                //Datos de Servicio
                $servicio = new Servicio();
                $servicio->fecha_inicio = $dt_ini->toDateString();  //Fecha de inicio (YYYY-DD-MM)
                $servicio->solicitud_id = $request->id_solicitud;
                
                //Definicion de tipo y color de servicios
                $color_servicio = '';
                switch ($request->tipo_servicio) {
                    case 'Normal':
                        $color_tecnico = Tecnico::select('color')->where('id', $request->id_tecnicos[0])->get();
                        $color_servicio = $color_tecnico[0]['color'];
                        break;
                    case 'Refuerzo':
                        $color_servicio = 'rgb(143, 143, 143)';
                        break;
                    case 'Mensajeria':
                        $color_servicio = 'rgb(35,198,200)';
                        break;
                    case 'Neutro':
                        $color_servicio = 'rgb(236,71,88)';
                        break;
                    default:
                        $color_tecnico = Tecnico::select('color')->where('id', $request->id_tecnicos[0])->get();
                        $color_servicio = $color_tecnico[0]['color'];
                        break;
                }
                $servicio->tipo = $request->tipo_servicio;
                $servicio->color = $color_servicio;
                $servicio->observaciones = $request->observaciones;
                if($request->tipo_servicio == 'Neutro' || $request->tipo_servicio == 'Mensajeria'){
                    $servicio->hora_inicio = "00:00:00";
                    $servicio->save();
                    return response()->json(["Servicio Guardado con Exito"], 200);
                }
                $servicio->frecuencia = $request->frecuencia;
                $servicio->frecuencia_str = $request->opcionFrecuencia;
                $servicio->hora_inicio = $request->hora_inicio;
                $servicio->duracion = $request->duracion;
                $dt_fin = $dt_ini->addMinutes($request->duracion);  //Suma los minutos a la hora especificada
                $servicio->fecha_fin = $dt_fin->toDateString();
                $servicio->hora_fin = $request->hora_fin; 
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
                $now = Carbon::now();
                foreach ($request->tipos as $index => $value) {
                    DB::table('servicio_tipo_servicio')->insert([
                        'servicio_id' => $max_id,
                        'tipo_servicio_id' => $value,
                        'created_at' => $now
                    ]);
                }

                $index = 0;

                //Crea servicios dependiendo de la frecuencia solicitada
                while($dt_ini->year < 2021){
                    if($index > 0){
                        if($request->opcionFrecuencia == "meses"){
                            if(!empty($request->diaDelMes)){
                                $nueva_fecha = Carbon::parse($dt_ini->day." ".$dt_ini->format("F")." ".$dt_ini->year); // Repetir un dia especifico
                            }else{
                                $nueva_fecha = Carbon::parse($request->diaOrdinal." ".$request->nombreDia." of ".$dt_ini->format("F")." ".$dt_ini->year); // Repetir en una expresion dada
                            }
                            if($nueva_fecha->isSunday()){
                                $nueva_fecha->next(Carbon::MONDAY);
                                //Asigna la hora de inicio del servicio enviado
                                //$nueva_fecha->setTime($time_ini->hour, $time_ini->minute, $time_ini->second);
                            }
                            //Inserta el servicio a la BD y obtiene el ID
                            $id_servicio = DB::table('servicios')->insertGetId([
                                'frecuencia' => $request->frecuencia,
                                'frecuencia_str' => $request->opcionFrecuencia,
                                'tipo' => $request->tipo_servicio,
                                'serie' => $serie,
                                "fecha_inicio" => $nueva_fecha,
                                'hora_inicio' => $request->hora_inicio,
                                'duracion' => $request->duracion,
                                'color' => $color_servicio,
                                'observaciones' => $request->observaciones,
                                'solicitud_id' => $request->id_solicitud,
                                'fecha_fin' => $nueva_fecha,
                                'hora_fin' => $request->hora_fin
                            ]);
                    
                            //Insertar los registros en la tabla pivot (Servicio_tecnico)
                            foreach ($request->id_tecnicos as $index => $value) {
                                DB::table('servicio_tecnico')->insert([
                                    'servicio_id' => $id_servicio,
                                    'tecnico_id' => $value
                                ]);
                            }

                            //Insertar los registros en la tabla pivot (Servicio_tipo_servicio)
                            $now = Carbon::now();
                            foreach ($request->tipos as $index => $value) {
                                DB::table('servicio_tipo_servicio')->insert([
                                    'servicio_id' => $id_servicio,
                                    'tipo_servicio_id' => $value,
                                    'created_at' => $now->toDateTimeString()
                                ]);
                            }
                            $dt_ini->addMonths($request->frecuencia);
                        }elseif($request->opcionFrecuencia == 'semanas'){
                            $nueva_fecha = $dt_ini;
                            if($nueva_fecha->isSunday()){
                                $nueva_fecha->next(Carbon::MONDAY);
                                //Asigna la hora de inicio del servicio enviado
                                //$nueva_fecha->setTime($time_ini->hour, $time_ini->minute, $time_ini->second);
                            }
                            //Inserta el servicio a la BD y obtiene el ID
                            $id_servicio = DB::table('servicios')->insertGetId([
                                'frecuencia' => $request->frecuencia,
                                'frecuencia_str' => $request->opcionFrecuencia,
                                'tipo' => $request->tipo_servicio,
                                'serie' => $serie,
                                "fecha_inicio" => $nueva_fecha,
                                'hora_inicio' => $request->hora_inicio,
                                'duracion' => $request->duracion,
                                'color' => $color_servicio,
                                'observaciones' => $request->observaciones,
                                'solicitud_id' => $request->id_solicitud,
                                'fecha_fin' => $nueva_fecha,
                                'hora_fin' => $request->hora_fin
                            ]);
                    
                            //Insertar los registros en la tabla pivot (Servicio_tecnico)
                            foreach ($request->id_tecnicos as $index => $value) {
                                DB::table('servicio_tecnico')->insert([
                                    'servicio_id' => $id_servicio,
                                    'tecnico_id' => $value
                                ]);
                            }
                            //Insertar los registros en la tabla pivot (Servicio_tipo_servicio)
                            $now = Carbon::now();
                            foreach ($request->tipos as $index => $value) {
                                DB::table('servicio_tipo_servicio')->insert([
                                    'servicio_id' => $id_servicio,
                                    'tipo_servicio_id' => $value,
                                    'created_at' => $now->toDateTimeString()
                                ]);
                            }
                           $dt_ini->addWeeks($request->frecuencia);
                        }elseif($request->opcionFrecuencia == "anios"){
                            $nueva_fecha = $dt_ini;
                            if($nueva_fecha->isSunday()){
                                $nueva_fecha->next(Carbon::MONDAY);
                                //Asigna la hora de inicio del servicio enviado
                                //$nueva_fecha->setTime($time_ini->hour, $time_ini->minute, $time_ini->second);
                            }
                            //Inserta el servicio a la BD y obtiene el ID
                            $id_servicio = DB::table('servicios')->insertGetId([
                                'frecuencia' => $request->frecuencia,
                                'frecuencia_str' => $request->opcionFrecuencia,
                                'tipo' => $request->tipo_servicio,
                                'serie' => $serie,
                                "fecha_inicio" => $nueva_fecha,
                                'hora_inicio' => $request->hora_inicio,
                                'duracion' => $request->duracion,
                                'color' => $color_servicio,
                                'observaciones' => $request->observaciones,
                                'solicitud_id' => $request->id_solicitud,
                                'fecha_fin' => $nueva_fecha,
                                'hora_fin' => $request->hora_fin
                            ]);
                    
                            //Insertar los registros en la tabla pivot (Servicio_tecnico)
                            foreach ($request->id_tecnicos as $index => $value) {
                                DB::table('servicio_tecnico')->insert([
                                    'servicio_id' => $id_servicio,
                                    'tecnico_id' => $value
                                ]);
                            }
                            //Insertar los registros en la tabla pivot (Servicio_tipo_servicio)
                            $now = Carbon::now();
                            foreach ($request->tipos as $index => $value) {
                                DB::table('servicio_tipo_servicio')->insert([
                                    'servicio_id' => $id_servicio,
                                    'tipo_servicio_id' => $value,
                                    'created_at' => $now->toDateTimeString()
                                ]);
                            }
                            $dt_ini->addYears($request->frecuencia);

                        }else{
                            $nueva_fecha = $dt_ini->addMinutes($request->duration);
                            if($nueva_fecha->isSunday()){
                                $nueva_fecha->next(Carbon::MONDAY);
                            }
                            //Inserta el servicio a la BD y obtiene el ID
                            $id_servicio = DB::table('servicios')->insertGetId([
                                'frecuencia' => $request->frecuencia,
                                'frecuencia_str' => $request->opcionFrecuencia,
                                'tipo' => $request->tipo_servicio,
                                'serie' => $serie,
                                "fecha_inicio" => $nueva_fecha,
                                'hora_inicio' => $request->hora_inicio,
                                'duracion' => $request->duracion,
                                'color' => $color_servicio,
                                'observaciones' => $request->observaciones,
                                'solicitud_id' => $request->id_solicitud,
                                'fecha_fin' => $nueva_fecha,
                                'hora_fin' => $request->hora_fin
                            ]);
                    
                            //Insertar los registros en la tabla pivot (Servicio_tecnico)
                            foreach ($request->id_tecnicos as $index => $value) {
                                DB::table('servicio_tecnico')->insert([
                                    'servicio_id' => $id_servicio,
                                    'tecnico_id' => $value
                                ]);
                            }
                            //Insertar los registros en la tabla pivot (Servicio_tipo_servicio)
                            $now = Carbon::now();
                            foreach ($request->tipos as $index => $value) {
                                DB::table('servicio_tipo_servicio')->insert([
                                    'servicio_id' => $id_servicio,
                                    'tipo_servicio_id' => $value,
                                    'created_at' => $now->toDateTimeString()
                                ]);
                            }
                            $dt_ini->addDays($request->frecuencia);
                        }
                    }else{
                        if($request->opcionFrecuencia == "meses"){
                            $dt_ini->addMonths($request->frecuencia);
                        }elseif($request->opcionFrecuencia == "semanas"){
                            $dt_ini->addWeeks($request->frecuencia);
                        } elseif($request->opcionFrecuencia == "dias"){
                            $dt_ini->addDays($request->frecuencia);
                        }else{
                            $dt_ini->addYears($request->frecuencia);
                        }
                    }
                    $index++;
                }
                return response()->json(["Servicio Guardado con Exito"], 200);
            }else{
                return response()->json("Error en la petición AJAX", 406);
            }
        // }catch(\Exception $e){
        //     // return response()->json(["Error al intentar guardar el servicio", $e], 500);
        //     return response()->json($e, 500);
        // }
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
        $servicio = Servicio::with('tipos:id,nombre', 'tecnicos:id,nombre,color', 'solicitud.cliente', 'solicitud.sede', 'factura')->where('id', $id)->get();
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
        $servicio->hora_fin = $request->hora_fin; 
        $servicio->duracion = $request->duracion;
        //Definicion de tipo y color de servicios
        $color_servicio = '';
        switch ($request->tipoServicio) {
            case 'Normal':
                $color_tecnico = Tecnico::select('color')->where('id', $request->tecnicos[0])->get();
                $color_servicio = $color_tecnico[0]['color'];
                break;
            case 'Refuerzo':
                $color_servicio = 'rgb(143, 143, 143)';
                break;
            case 'Mensajeria':
                $color_servicio = 'rgb(35,198,200)';
                break;
            case 'Neutro':
                $color_servicio = 'rgb(236,71,88)';
                break;
            default:
                $color_tecnico = Tecnico::select('color')->where('id', $request->tecnicos[0])->get();
                $color_servicio = $color_tecnico[0]['color'];
        }
        $servicio->color = $color_servicio;
        $servicio->tipo = $request->tipoServicio;
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
        $now = Carbon::now();
        foreach ($request->tipos as $index => $value) {
            DB::table('servicio_tipo_servicio')->insert([
                'servicio_id' => $id,
                'tipo_servicio_id' => $value,
                'created_at' => $now->toDateTimeString()
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
            response()->json(['error: ' => 'Error en la petición'], 500);
        }
        
    }

    /**
     * Actualiza la frecuencia de uno o varios servicios junto con sus respectivas fechas
     * @param \Illuminate\Http\Request  $request
     */
    public function updateFrecuency(Request $request)
    {
        $nueva_fecha;
        $servicio;
        if($request->ajax()){
            try{
                $dt_ini = Carbon::parse($request->fecha_inicio." ".$request->hora_inicio);
                $time_ini = Carbon::parse($request->fecha_inicio." ".$request->hora_inicio);
                //Valida la opcion de actualizacion seleccionada por el usuario
                switch ($request->optionActl) {
                    case '1':
                    $servicio = Servicio::where('id', $request->idServicio)->get();
                        //Valida la frecuencia seleccionada por el usuario
                        if($request->opcionFrecuencia == "meses"){
                            $dt_ini->addMonths($request->frecuencia);
                            //Valida si la opcion seleccionada es por el dia especifico
                            if(!empty($request->diaDelMes)){
                                $nueva_fecha = Carbon::parse($dt_ini->day." ".$dt_ini->format("F")." ".$dt_ini->year." ".$request->hora_inicio); // Repetir un dia especifico
                            }else{
                                $nueva_fecha = Carbon::parse($request->diaOrdinal." ".$request->nombreDia." of ".$dt_ini->format("F")." ".$dt_ini->year." ".$request->hora_inicio); // Repetir en una expresion dada
                            }
                            $servicio[0]->fecha_inicio = $nueva_fecha;
                            $servicio[0]->hora_inicio = $nueva_fecha->toTimeString();
                           
                            $servicio[0]->fecha_fin =$nueva_fecha;
                            $servicio[0]->hora_fin = $request->hora_fin;
                            $servicio[0]->save();
                        }elseif ($request->opcionFrecuencia == "semanas") {
                            # code...
                            $dt_ini->addWeeks($request->frecuencia);
                            $nueva_fecha = $dt_ini;
                            $servicio[0]->fecha_inicio = $nueva_fecha;
                            $servicio[0]->hora_inicio = $nueva_fecha->toTimeString();
                            $servicio[0]->fecha_fin =$nueva_fecha;
                            $servicio[0]->hora_fin = $request->hora_fin;
                            $servicio[0]->save();
                        }elseif ($request->opcionFrecuencia == "dias") {
                            # code...
                            $dt_ini->addDays($request->frecuencia);
                            $nueva_fecha = $dt_ini;
                            //Valida que sea domingo
                            if($nueva_fecha->isSunday()){
                                //Pasa el servicio al linex proximo
                                $nueva_fecha->next(Carbon::MONDAY);
                                //Asigna la hora de inicio del servicio enviado
                                $nueva_fecha->setTime($time_ini->hour, $time_ini->minute, $time_ini->second);
                            }
                            $servicio[0]->fecha_inicio = $nueva_fecha;
                            $servicio[0]->hora_inicio = $nueva_fecha->toTimeString();
                            $servicio[0]->fecha_fin =$nueva_fecha;
                            $servicio[0]->hora_fin = $request->hora_fin;
                            $servicio[0]->save();
                        }else{
                            $dt_ini->addYears($request->frecuencia);
                            $nueva_fecha = $dt_ini;
                            $servicio[0]->fecha_inicio = $nueva_fecha;
                            $servicio[0]->hora_inicio = $nueva_fecha->toTimeString();
                           
                            $servicio[0]->fecha_fin =$nueva_fecha;
                            $servicio[0]->hora_fin = $request->hora_fin;
                            $servicio[0]->save();
                        }     
                        break;
                    case '2':
                        //Obtiene la seria a la que pertenece el ID del servicio
                        $serieServicio = Servicio::select('id','serie')->where('id', $request->idServicio)->get();
                        //Obtiene los servicios pertenecientes de a esta serie
                        $servicios = Servicio::where('serie', $serieServicio[0]->serie)->get();
                        foreach ($servicios as $servicio) {
                            $nueva_fecha = '';
                           if($servicio->id > $request->idServicio){
                            if($request->opcionFrecuencia == "meses"){
                                $dt_ini->addMonths($request->frecuencia);
                                if(!empty($request->diaDelMes)){
                                    $nueva_fecha = Carbon::parse($dt_ini->day." ".$dt_ini->format("F")." ".$dt_ini->year." ".$request->hora_inicio); // Repetir un dia especifico
                                }else{
                                    $nueva_fecha = Carbon::parse($request->diaOrdinal." ".$request->nombreDia." of ".$dt_ini->format("F")." ".$dt_ini->year." ".$request->hora_inicio); // Repetir en una expresion dada
                                }
                                $servicio->fecha_inicio = $nueva_fecha;
                                $servicio->hora_inicio = $nueva_fecha->toTimeString();
                                $servicio->fecha_fin =$nueva_fecha;
                                $servicio->hora_fin = $request->hora_fin;
                                $servicio->save();
                            }elseif ($request->opcionFrecuencia == "semanas") {
                                # code...
                                $dt_ini->addWeeks($request->frecuencia);
                                $nueva_fecha = $dt_ini;
                                $servicio->fecha_inicio = $nueva_fecha;
                                $servicio->hora_inicio = $nueva_fecha->toTimeString();
                                $servicio->fecha_fin =$nueva_fecha;
                                $servicio->hora_fin = $request->hora_fin;//$nueva_fecha->addMinutes($request->duracion);
                                $servicio->save();
                            }elseif ($request->opcionFrecuencia == "dias") {
                                # code...
                                $dt_ini->addDays($request->frecuencia);
                                $nueva_fecha = $dt_ini;
                                if($nueva_fecha->isSunday()){
                                    $nueva_fecha->next(Carbon::MONDAY);
                                    $nueva_fecha->setTime($time_ini->hour, $time_ini->minute, $time_ini->second);
                                }
                                $servicio->fecha_inicio = $nueva_fecha;
                                $servicio->hora_inicio = $nueva_fecha->toTimeString();
                                $servicio->fecha_fin =$nueva_fecha;
                                $servicio->hora_fin = $request->hora_fin;
                                $servicio->save();
                            }else{
                                $dt_ini->addYears($request->frecuencia);
                                $nueva_fecha = $dt_ini;
                                $servicio->fecha_inicio = $nueva_fecha;
                                $servicio->hora_inicio = $nueva_fecha->toTimeString();
                                $servicio->fecha_fin =$nueva_fecha;
                                $servicio->hora_fin = $request->hora_fin;
                                $servicio->save();
                            }    
                           }
                        }
                        break;
                    case '3':
                        //Obtiene la seria a la que pertenece el ID del servicio
                        $serieServicio = Servicio::select('id','serie')->where('id', $request->idServicio)->get();
                        //Obtiene los servicios pertenecientes de a esta serie
                        $servicios = Servicio::where('serie', $serieServicio[0]->serie)->get();
                        foreach ($servicios as $servicio) {
                            $nueva_fecha = '';
                           //if($servicio->id != $serieServicio[0]->id){
                            if($request->opcionFrecuencia == "meses"){
                                $dt_ini->addMonths($request->frecuencia);
                                if(!empty($request->diaDelMes)){
                                    $nueva_fecha = Carbon::parse($dt_ini->day." ".$dt_ini->format("F")." ".$dt_ini->year." ".$request->hora_inicio); // Repetir un dia especifico
                                }else{
                                    $nueva_fecha = Carbon::parse($request->diaOrdinal." ".$request->nombreDia." of ".$dt_ini->format("F")." ".$dt_ini->year." ".$request->hora_inicio); // Repetir en una expresion dada
                                }
                                $servicio->fecha_inicio = $nueva_fecha;
                                $servicio->hora_inicio = $nueva_fecha->toTimeString();
                                $servicio->fecha_fin =$nueva_fecha;
                                $servicio->hora_fin = $request->hora_fin;
                                $servicio->save();
                            }elseif ($request->opcionFrecuencia == "semanas") {
                                # code...
                                $dt_ini->addWeeks($request->frecuencia);
                                $nueva_fecha = $dt_ini;
                                $servicio->fecha_inicio = $nueva_fecha;
                                $servicio->hora_inicio = $nueva_fecha->toTimeString();
                                $servicio->fecha_fin =$nueva_fecha;
                                $servicio->hora_fin = $request->hora_fin;//$nueva_fecha->addMinutes($request->duracion);
                                $servicio->save();
                            }elseif ($request->opcionFrecuencia == "dias") {
                                # code...
                                $dt_ini->addDays($request->frecuencia);
                                $nueva_fecha = $dt_ini;
                                if($nueva_fecha->isSunday()){
                                    $nueva_fecha->next(Carbon::MONDAY);
                                    $nueva_fecha->setTime($time_ini->hour, $time_ini->minute, $time_ini->second);
                                }
                                $servicio->fecha_inicio = $nueva_fecha;
                                $servicio->hora_inicio = $nueva_fecha->toTimeString();
                                $servicio->fecha_fin =$nueva_fecha;
                                $servicio->hora_fin = $request->hora_fin;
                                $servicio->save();
                            }else{
                                $dt_ini->addYears($request->frecuencia);
                                $nueva_fecha = $dt_ini;
                                $servicio->fecha_inicio = $nueva_fecha;
                                $servicio->hora_inicio = $nueva_fecha->toTimeString();
                                $servicio->fecha_fin =$nueva_fecha;
                                $servicio->hora_fin = $request->hora_fin;
                                $servicio->save();
                            }    
                           }
                        //}
                        break; 
                    default:
                        throw new \Exception("Error Processing Request", 1);
                        break;
                }
            }catch(\Exception $e ){
                return response()->json($e, 500);
            }
            return response()->json('Update Success', 200);   
        }else{
            return response()->json(['error: ' => 'Error en la petición'], 500);
        }
    }
    
    public function updateState(Request $request)
    {
        if($request->ajax()){
            try{
                $servicio = Servicio::findOrFail($request->id);
                if(!$servicio->confirmado){
                    $servicio->confirmado = true;
                }else{
                    $servicio->confirmado = false;
                }
                $servicio->save();
            }catch(\Exception $e){
                return response()->json($e, 500);
            }
            return response()->json($servicio->confirmado, 200);
        }else{
            return response()->json(['error: ' => 'Error en la petición'], 500);
        }

    }

    public function listServices(Request $request)
    {
        if($request->ajax()){
            $servicios = Servicio::with([
                                        'solicitud.sede' => function($query){
                                            $query->select('id','nombre');
                                        },
                                        'solicitud.cliente' => function($query){
                                            $query->select('id','nombre_cliente');
                                        },
                                        'tecnicos' => function($query){
                                          $query->select('id','nombre');  
                                        },
                                        'tipos' => function($query) {
                                            $query->select('id','nombre');
                                        },'solicitud' => function($query){
                                            $query->select('id', 'cliente_id', 'sede_id');
                                        }])
                                    ->select('id', 'solicitud_id','tipo','duracion','frecuencia', DB::raw('CONCAT(fecha_inicio, " ",hora_inicio) as fecha_inicio'), DB::raw('CONCAT(fecha_fin, " ",hora_fin) as fecha_fin'))
                                    ->where('fecha_inicio','>=', $request->dateIni)
                                    ->where('fecha_inicio','<=', $request->dateEnd)
                                    ->get();
            return $servicios;
            // return response()->json($request, 200);
        }
        return view('programacion.listado-servicios');
    }
    
    public function editNeutralService($id)
    {
            $servicio =Servicio::with('solicitud.sede', 'solicitud.cliente')->where('id',$id)->get();
            $tipos = TipoServicio::all();
            $tecnicos = Tecnico::all();
        return view("programacion.editar-servicio-neutro", compact('servicio','tipos','tecnicos'));
        // return $servicio;
    }
}
