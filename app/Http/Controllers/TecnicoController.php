<?php

namespace ABAS\Http\Controllers;

use ABAS\Tecnico;
use ABAS\Servicio;
use Illuminate\Http\Request;
use DB;
use Carbon\Carbon;

class TecnicoController extends Controller
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
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index(Request $request)
    {
        //
        $tecnicos = Tecnico::all();
        if($request->ajax()){
            return $tecnicos;
        }
        return view('programacion.calendario-tecnicos', compact('tecnicos'));
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        //
        return view('administracion.crear-tecnicos');
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {
        //
        $now = Carbon::now();
        if($request->ajax()){
            foreach ($request->tecnicos as $tecnico) {
                DB::table('tecnicos')->insert([
                    'nombre' => strtoupper($tecnico['nombre']),
                    'color' => $tecnico['color'],
                    'estado' => $tecnico['estado'] == '0' ? 'activo' : $tecnico['estado'],
                    'created_at' => $now,
                    'updated_at' => $now
                ]);
            }

            return response()->json("Creation Sucess", 201);
        }
    }

    /**
     * Display the specified resource.
     *
     * @param  \ABAS\Tecnico  $tecnico
     * @return \Illuminate\Http\Response
     */
    public function show($id)
    {
        $now = Carbon::now();
        $three_months_ago = $now->subMonths(3); //Restar 3 MEses a la fecha actual
        $tecnicos = Servicio::select('tecnicos.nombre', DB::raw('count(servicios.id) as servicios'), 'tecnicos.id')
                                ->join('servicio_tecnico', 'servicios.id', '=','servicio_tecnico.servicio_id')
                                ->join('tecnicos', 'servicio_tecnico.tecnico_id', '=', 'tecnicos.id')
                                ->where('servicios.solicitud_id', $id)
                                ->where('servicios.fecha_inicio', '>=', $three_months_ago->toDateString())
                                ->groupBy('tecnicos.nombre', 'tecnicos.id')
                                ->orderBy('servicios', 'desc')
                                ->limit(3)
                                ->get();
        return $tecnicos;
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  \ABAS\Tecnico  $tecnico
     * @return \Illuminate\Http\Response
     */
    public function edit(Tecnico $tecnico)
    {
        //
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  \ABAS\Tecnico  $tecnico
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, $id)
    {
        //
        $tecnico = Tecnico::findOrFail($id);
        $tecnico->nombre = $request->nombre;
        $tecnico->color = $request->color;
        $tecnico->estado = $request->estado;
        $tecnico->save();

        return response()->json("update success", 200);
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  \ABAS\Tecnico  $tecnico
     * @return \Illuminate\Http\Response
     */
    public function destroy($id)
    {
        $tecnico = Tecnico::findOrFail($id);
        $tecnico->delete();

        return response()->json("Delete Success", 200);
    }

    public function getColor($id)
    {
        $color = Tecnico::select('color')->where('id', $id)->get();
        return $color;
    }

    public function getService($id)
    {
        $data = collect();
        if($id == 'all'){   //Servicios de todos los tecnicos
            $tecnicos = Tecnico::with('servicios')->get();
            foreach ($tecnicos as $tecnico) {
                if(count($tecnico->servicios) != 0){
                    foreach ($tecnico->servicios as $servicio) {
                        if($servicio->tipo == 'Normal'){
                            $data->push([
                                'id' => $servicio->id,
                                'title' => $tecnico->nombre,
                                'start' => $servicio->fecha_inicio." ".$servicio->hora_inicio,
                                "end" => $servicio->fecha_fin." ".$servicio->hora_fin,
                                'backgroundColor' => $tecnico->color, 
                                'borderColor' => $tecnico->color
                            ]);
                        }
                    }
                }
            }
        }else{
            $servicios = Tecnico::with('servicios')->where('id', $id)->get();
            foreach ($servicios[0]->servicios as $servicio) {
                if($servicio->tipo == 'Normal'){
                    $data->push([
                        'id' => $servicio->id,
                        'title' => $servicios[0]->nombre,
                        'start' => $servicio->fecha_inicio." ".$servicio->hora_inicio,
                        "end" => $servicio->fecha_fin." ".$servicio->hora_fin,
                        'backgroundColor' => $servicios[0]->color, 
                        'borderColor' => $servicios[0]->color
                    ]);
                }
            }
        }
 
        return $data;
    }

    public function getServicesByDate($id, $dateStart, $dateEnd)
    {
        //Comparacion de parametros fecha
        $dt_ini = Carbon::parse($dateStart);
        $dt_end = Carbon::parse($dateEnd);

        if($dt_end->diffInDays($dt_ini) == 1){
            if ($id == 'all') {
                $servicios = Servicio::with('solicitud.sede','tecnicos', 'solicitud.cliente')
                                    ->where('fecha_inicio', '>=', $dateStart)
                                    ->where('fecha_inicio', '<=', $dateEnd)
                                    ->get();
            } else {
                $servicios = Servicio::with('solicitud.sede','tecnicos', 'solicitud.cliente')
                                    ->where('fecha_inicio', '>=', $dateStart)
                                    ->where('fecha_inicio', '<=', $dateEnd)
                                    //Filtro por ID de Tecnico
                                    ->whereHas('tecnicos', function($query) use($id){
                                        //Columna Id de la tabla tecnicos
                                        $query->where('id', $id);
                                    })
                                    ->get();
            }
        }else{
            if ($id == 'all') {
                $servicios = Servicio::with('solicitud.sede','tecnicos', 'solicitud.cliente')
                                    ->where('fecha_inicio', '=', $dateStart)
                                    ->get();
            } else {
                $servicios = Servicio::with('solicitud.sede','tecnicos', 'solicitud.cliente')
                                    ->where('fecha_inicio', '=', $dateStart)
                                    //Filtro por ID de Tecnico
                                    ->whereHas('tecnicos', function($query) use($id){
                                        //Columna Id de la tabla tecnicos
                                        $query->where('id', $id);
                                    })
                                    ->get();
            }
        }
        
        $data = collect();

        foreach ($servicios as $servicio) {
            //Valida si es una persona natural
            if(empty($servicio->solicitud->sede)){
                $data->push([
                    'id' => $servicio->id,
                    'nombre' => $servicio->solicitud->cliente->nombre_cliente,
                    'direccion' => $servicio->solicitud->cliente->direccion,
                    'start' => $servicio->fecha_inicio." ".$servicio->hora_inicio,
                    "end" => $servicio->fecha_fin." ".$servicio->hora_fin
                ]);
            }else{
                $data->push([
                    'id' => $servicio->id,
                    'nombre' => $servicio->solicitud->sede->nombre,
                    'direccion' => $servicio->solicitud->sede->direccion,
                    'start' => $servicio->fecha_inicio." ".$servicio->hora_inicio,
                    "end" => $servicio->fecha_fin." ".$servicio->hora_fin
                ]);
            }
                
        }
        return $data;
        // return $dt_end->diffInDays($dt_ini);
    }

    public function getDatesServices($solicitud, $tecnico)
    {
        $servicios = Servicio::select('servicios.fecha_inicio')
                            ->join('servicio_tecnico', 'servicios.id', '=','servicio_tecnico.servicio_id')
                            ->join('tecnicos', 'servicio_tecnico.tecnico_id', '=', 'tecnicos.id')
                            ->where('servicios.solicitud_id', $solicitud)
                            ->where('tecnicos.id', $tecnico)
                            ->get();
        return $servicios;
    }

    public function printAll($idTecnico, $fechaInicio, $fechaFin, $idServicio)
    {   //Declaracion de variables locales
        $rutasSaneamiento = [];
        $rutasLamparas = [];
        $rutasRoedoresInternas = [];
        $rutasRoedoresExternas = [];
        $tecnicos;
        //Valida que la opcion de impresion sea todos los servicios
        if($idServicio == 'all'){
            //Obtiene la informacion necesaria para crear ordenes de servicio
            $ordenesServicios = Servicio::with('solicitud.sede','solicitud.cliente', 'tecnicos', 'tipos')
                                        ->where('fecha_inicio', '>=', $fechaInicio)
                                        ->where('fecha_fin', '<=', $fechaFin)
                                        ->where('tipo','Normal')
                                        // ->whereHas('tecnicos', function($query) use($idTecnico){
                                        //     $query->where('id', $idTecnico);  
                                        // })
                                        ->get();
            //Obtiene la informacion necesaria para crear las rutas por cada cliente/sede
            $rutas = Servicio::with('solicitud.rutas', 'tecnicos')
                                        ->where('fecha_inicio', '>=', $fechaInicio)
                                        ->where('fecha_fin', '<=', $fechaFin)
                                        ->where('tipo','Normal')
                                        // ->whereHas('tecnicos', function($query) use($idTecnico){
                                        //     $query->where('id', $idTecnico);  
                                        // })
                                        ->get();
            //Recorre la respuesta de la BD de todos los clientes/sedes seleccionados
            foreach ($rutas as $ruta) {
                //Recorre la informacion de las rutas de cada cliente/sede
                foreach($ruta->solicitud->rutas as $rs){
                    //Clasifica las rutas dependiendo de su tipo
                    if($rs->tipo == 'RUTA DE SANEAMIENTO'){
                        //Añade un elemento al final del array
                        array_push($rutasSaneamiento, $rs);
                    }
                    if($rs->tipo == 'RUTA DE LAMPARAS'){
                        array_push($rutasLamparas, $rs);
                    }
                    if($rs->tipo == 'RUTA DE ROEDORES EXTERNA'){
                        array_push($rutasRoedoresExternas, $rs);
                    }
                    if($rs->tipo == 'RUTA DE ROEDORES INTERNA'){
                        array_push($rutasRoedoresInternas, $rs);
                    }
                }
                
            }

            if($idTecnico == 'all'){
                $tecnicos = Tecnico::with(['servicios' => function($query) use($fechaInicio, $fechaFin){
                                            $query->select('id', 'fecha_inicio', 'fecha_fin','solicitud_id', 'hora_inicio','hora_fin');
                                            $query->where('fecha_inicio', '>=', $fechaInicio);
                                            $query->where('fecha_fin', '<=', $fechaFin);
                                        }, 'servicios.solicitud' => function($query){ 
                                            $query->select('id', 'cliente_id', 'sede_id');
                                        }, 'servicios.solicitud.cliente' => function($query){
                                            $query->select('nombre_cliente', 'direccion', 'id');
                                        }, 'servicios.solicitud.sede' => function($query){
                                            $query->select('nombre', 'direccion', 'id');
                                        }])
                                        ->get();
            }else{
                $tecnicos = Tecnico::with(['servicios' => function($query) use($fechaInicio, $fechaFin){
                                            $query->select('id', 'fecha_inicio', 'fecha_fin','solicitud_id', 'hora_inicio','hora_fin');
                                            $query->where('fecha_inicio', '>=', $fechaInicio);
                                            $query->where('fecha_fin', '<=', $fechaFin);
                                        }, 'servicios.solicitud' => function($query){ 
                                            $query->select('id', 'cliente_id', 'sede_id');
                                        }, 'servicios.solicitud.cliente' => function($query){
                                            $query->select('nombre_cliente', 'direccion', 'id');
                                        }, 'servicios.solicitud.sede' => function($query){
                                            $query->select('nombre', 'direccion', 'id');
                                        }])
                                        ->where('id', $idTecnico)
                                        ->get();
            }
        //Valida que la opcion de imprimir sea de un servicio en especifico
        }else{
            //Obtiene la informacion de un servicio especifico
            $ordenesServicios = Servicio::with('solicitud.sede','solicitud.cliente', 'tecnicos', 'tipos')
                                        ->where('fecha_inicio', '>=', $fechaInicio)
                                        ->where('fecha_fin', '<=', $fechaFin)
                                        ->where('tipo','Normal')
                                        ->where('id', $idServicio)
                                        ->get();
            //Obtiene la informacion de las rutas de  un servicio especifico
            $rutas = Servicio::with('solicitud.rutas', 'tecnicos')//
                                ->where('fecha_inicio', '>=', $fechaInicio)
                                ->where('fecha_fin', '<=', $fechaFin)
                                ->where('tipo','Normal')
                                ->where('id', $idServicio)
                                ->get();

            //Recorre la respuesta de la BD de todos los clientes/sedes seleccionados
            foreach ($rutas as $ruta) {
                //Recorre la informacion de las rutas de cada cliente/sede
                foreach($ruta->solicitud->rutas as $rs){
                    //Clasifica las rutas dependiendo de su tipo
                    if($rs->tipo == 'RUTA DE SANEAMIENTO'){
                        //Añade un elemento al final del array
                        array_push($rutasSaneamiento, $rs);
                    }
                    if($rs->tipo == 'RUTA DE LAMPARAS'){
                        array_push($rutasLamparas, $rs);
                    }
                    if($rs->tipo == 'RUTA DE ROEDORES EXTERNA'){
                        array_push($rutasRoedoresExternas, $rs);
                    }
                    if($rs->tipo == 'RUTA DE ROEDORES INTERNA'){
                        array_push($rutasRoedoresInternas, $rs);
                    }
                }
                
            }

            if($idTecnico == 'all'){
                $tecnicos = Tecnico::with(['servicios' => function($query) use($fechaInicio, $fechaFin){
                                            $query->select('id', 'fecha_inicio', 'fecha_fin','solicitud_id', 'hora_inicio','hora_fin');
                                            $query->where('fecha_inicio', '>=', $fechaInicio);
                                            $query->where('fecha_fin', '<=', $fechaFin);
                                        }, 'servicios.solicitud' => function($query){ 
                                            $query->select('id', 'cliente_id', 'sede_id');
                                        }, 'servicios.solicitud.cliente' => function($query){
                                            $query->select('nombre_cliente', 'direccion', 'id');
                                        }, 'servicios.solicitud.sede' => function($query){
                                            $query->select('nombre', 'direccion', 'id');
                                        }])
                                        ->get();
            }else{
                $tecnicos = Tecnico::with(['servicios' => function($query) use($fechaInicio, $fechaFin){
                                            $query->select('id', 'fecha_inicio', 'fecha_fin','solicitud_id', 'hora_inicio','hora_fin');
                                            $query->where('fecha_inicio', '>=', $fechaInicio);
                                            $query->where('fecha_fin', '<=', $fechaFin);
                                        }, 'servicios.solicitud' => function($query){ 
                                            $query->select('id', 'cliente_id', 'sede_id');
                                        }, 'servicios.solicitud.cliente' => function($query){
                                            $query->select('nombre_cliente', 'direccion', 'id');
                                        }, 'servicios.solicitud.sede' => function($query){
                                            $query->select('nombre', 'direccion', 'id');
                                        }])
                                        ->where('id', $idTecnico)
                                        ->get();
            }
        }
        //Organiza la informacion para mayor facilidad de acceso a sus propiedades
        $data = collect([
            'ods' => $ordenesServicios, 
            'rs' => $rutasSaneamiento,
            'rl' => $rutasLamparas,
            'rre' => $rutasRoedoresExternas,
            'rri' => $rutasRoedoresInternas,
            'tecnicos' => $tecnicos
        ]);
        $fechaActual = Carbon::now()->toDateString();
        $data->push(['now' => $fechaActual]);
        // return $data;
        return view('print-layouts.paquete-completo', compact('data'));
    }

    public function printODS($idTecnico, $fechaInicio, $fechaFin, $idServicio)
    {
        //Valida que la opcion de impresion sea todos los servicios
        if($idServicio == 'all'){
            //Obtiene la informacion necesaria para crear ordenes de servicio
            $ordenesServicios = Servicio::with('solicitud.sede','solicitud.cliente', 'tecnicos', 'tipos','solicitud.cliente.user','solicitud.cliente.telefonos')
                                        ->where('fecha_inicio', '>=', $fechaInicio)
                                        ->where('fecha_fin', '<=', $fechaFin)
                                        ->where('tipo','Normal')
                                        // ->whereHas('tecnicos', function($query) use($idTecnico){
                                        //     $query->where('id', $idTecnico);  
                                        // })
                                        ->get();

        //Valida que la opcion de imprimir sea de un servicio en especifico
        }else{
            //Obtiene la informacion de un servicio especifico
            $ordenesServicios = Servicio::with('solicitud.sede','solicitud.cliente', 'tecnicos', 'tipos','solicitud.cliente.user','solicitud.cliente.telefonos')
                                        ->where('fecha_inicio', '>=', $fechaInicio)
                                        ->where('fecha_fin', '<=', $fechaFin)
                                        ->where('tipo','Normal')
                                        ->where('id', $idServicio)
                                        ->get();

        }

        if($idTecnico == 'all'){
            $tecnicos = Tecnico::with(['servicios' => function($query) use($fechaInicio, $fechaFin){
                                        $query->select('id', 'fecha_inicio', 'fecha_fin','solicitud_id', 'hora_inicio','hora_fin');
                                        $query->where('fecha_inicio', '>=', $fechaInicio);
                                        $query->where('fecha_fin', '<=', $fechaFin);
                                    }, 'servicios.solicitud' => function($query){ 
                                        $query->select('id', 'cliente_id', 'sede_id');
                                    }, 'servicios.solicitud.cliente' => function($query){
                                        $query->select('nombre_cliente', 'direccion', 'id');
                                    }, 'servicios.solicitud.sede' => function($query){
                                        $query->select('nombre', 'direccion', 'id');
                                    }])
                                    ->get();
        }else{
            $tecnicos = Tecnico::with(['servicios' => function($query) use($fechaInicio, $fechaFin){
                                        $query->select('id', 'fecha_inicio', 'fecha_fin','solicitud_id', 'hora_inicio','hora_fin');
                                        $query->where('fecha_inicio', '>=', $fechaInicio);
                                        $query->where('fecha_fin', '<=', $fechaFin);
                                    }, 'servicios.solicitud' => function($query){ 
                                        $query->select('id', 'cliente_id', 'sede_id');
                                    }, 'servicios.solicitud.cliente' => function($query){
                                        $query->select('nombre_cliente', 'direccion', 'id');
                                    }, 'servicios.solicitud.sede' => function($query){
                                        $query->select('nombre', 'direccion', 'id');
                                    }])
                                    ->where('id', $idTecnico)
                                    ->get();
        }
        //Organiza la informacion para mayor facilidad de acceso a sus propiedades
        $data = collect([
            'ods' => $ordenesServicios,
            'tecnicos' => $tecnicos
        ]);

        $fechaActual = Carbon::now()->toDateString();
        $data->push(['now' => $fechaActual]);
        // return $data;
        return view('print-layouts.ordenes-servicios', compact('data'));
    }

    public function printRS($idTecnico, $fechaInicio, $fechaFin, $idServicio)
    {
        $rutasSaneamiento = [];
        //Valida que la opcion de impresion sea todos los servicios
        if($idServicio == 'all'){
            //Obtiene la informacion necesaria para crear ordenes de servicio
            $ordenesServicios = Servicio::with('solicitud.sede','solicitud.cliente', 'tecnicos', 'tipos')
                                        ->where('fecha_inicio', '>=', $fechaInicio)
                                        ->where('fecha_fin', '<=', $fechaFin)
                                        ->where('tipo','Normal')
                                        ->whereHas('tecnicos', function($query) use($idTecnico){
                                            $query->where('id', $idTecnico);  
                                        })
                                        ->get();
            //Obtiene la informacion necesaria para crear las rutas por cada cliente/sede
            $rutas = Servicio::with('solicitud.rutas', 'tecnicos')
                            ->where('fecha_inicio', '>=', $fechaInicio)
                            ->where('fecha_fin', '<=', $fechaFin)
                            ->where('tipo','Normal')
                            ->whereHas('tecnicos', function($query) use($idTecnico){
                                $query->where('id', $idTecnico);  
                            })
                            ->get();
            //Recorre la respuesta de la BD de todos los clientes/sedes seleccionados
            foreach ($rutas as $ruta) {
                //Recorre la informacion de las rutas de cada cliente/sede
                foreach($ruta->solicitud->rutas as $rs){
                    //Clasifica las rutas dependiendo de su tipo
                    if($rs->tipo == 'RUTA DE SANEAMIENTO'){
                        //Añade un elemento al final del array
                        array_push($rutasSaneamiento, $rs);
                    }
                }
                
            }
        //Valida que la opcion de imprimir sea de un servicio en especifico
        }else{
            //Obtiene la informacion de un servicio especifico
            $ordenesServicios = Servicio::with('solicitud.sede','solicitud.cliente', 'tecnicos', 'tipos')
                                        ->where('fecha_inicio', '>=', $fechaInicio)
                                        ->where('fecha_fin', '<=', $fechaFin)
                                        ->where('tipo','Normal')
                                        ->where('id', $idServicio)
                                        ->get();
            //Obtiene la informacion de las rutas de  un servicio especifico
            $rutas = Servicio::with('solicitud.rutas', 'tecnicos')//
                                ->where('fecha_inicio', '>=', $fechaInicio)
                                ->where('fecha_fin', '<=', $fechaFin)
                                ->where('tipo','Normal')
                                ->where('id', $idServicio)
                                ->get();

            //Recorre la respuesta de la BD de todos los clientes/sedes seleccionados
            foreach ($rutas as $ruta) {
                //Recorre la informacion de las rutas de cada cliente/sede
                foreach($ruta->solicitud->rutas as $rs){
                    //Clasifica las rutas dependiendo de su tipo
                    if($rs->tipo == 'RUTA DE SANEAMIENTO'){
                        //Añade un elemento al final del array
                        array_push($rutasSaneamiento, $rs);
                    }
                }
                
            }
        }
        //Organiza la informacion para mayor facilidad de acceso a sus propiedades
        $data = collect([ 
            'ods' => $ordenesServicios,
            'rs' => $rutasSaneamiento
        ]);
        // return $data;
        return view('print-layouts.rutas-saneamiento', compact('data'));
    }

    public function printRL($idTecnico, $fechaInicio, $fechaFin, $idServicio)
    {
        $rutasLamparas = [];
        //Valida que la opcion de impresion sea todos los servicios
        if($idServicio == 'all'){
            //Obtiene la informacion necesaria para crear ordenes de servicio
            $ordenesServicios = Servicio::with('solicitud.sede','solicitud.cliente', 'tecnicos', 'tipos')
                                        ->where('fecha_inicio', '>=', $fechaInicio)
                                        ->where('fecha_fin', '<=', $fechaFin)
                                        ->where('tipo','Normal')
                                        ->whereHas('tecnicos', function($query) use($idTecnico){
                                            $query->where('id', $idTecnico);  
                                        })
                                        ->get();
            //Obtiene la informacion necesaria para crear las rutas por cada cliente/sede
            $rutas = Servicio::with('solicitud.rutas', 'tecnicos')
                            ->where('fecha_inicio', '>=', $fechaInicio)
                            ->where('fecha_fin', '<=', $fechaFin)
                            ->where('tipo','Normal')
                            ->whereHas('tecnicos', function($query) use($idTecnico){
                                $query->where('id', $idTecnico);  
                            })
                            ->get();
            //Recorre la respuesta de la BD de todos los clientes/sedes seleccionados
            foreach ($rutas as $ruta) {
                //Recorre la informacion de las rutas de cada cliente/sede
                foreach($ruta->solicitud->rutas as $rs){
                    //Clasifica las rutas dependiendo de su tipo
                    if($rs->tipo == 'RUTA DE LAMPARAS'){
                        //Añade un elemento al final del array
                        array_push($rutasLamparas, $rs);
                    }
                }
                
            }
        //Valida que la opcion de imprimir sea de un servicio en especifico
        }else{
            //Obtiene la informacion de un servicio especifico
            $ordenesServicios = Servicio::with('solicitud.sede','solicitud.cliente', 'tecnicos', 'tipos')
                                        ->where('fecha_inicio', '>=', $fechaInicio)
                                        ->where('fecha_fin', '<=', $fechaFin)
                                        ->where('tipo','Normal')
                                        ->where('id', $idServicio)
                                        ->get();
            //Obtiene la informacion de las rutas de  un servicio especifico
            $rutas = Servicio::with('solicitud.rutas', 'tecnicos')//
                                ->where('fecha_inicio', '>=', $fechaInicio)
                                ->where('fecha_fin', '<=', $fechaFin)
                                ->where('tipo','Normal')
                                ->where('id', $idServicio)
                                ->get();

            //Recorre la respuesta de la BD de todos los clientes/sedes seleccionados
            foreach ($rutas as $ruta) {
                //Recorre la informacion de las rutas de cada cliente/sede
                foreach($ruta->solicitud->rutas as $rs){
                    //Clasifica las rutas dependiendo de su tipo
                    if($rs->tipo == 'RUTA DE LAMPARAS'){
                        //Añade un elemento al final del array
                        array_push($rutasLamparas, $rs);
                    }
                }
                
            }
        }
        //Organiza la informacion para mayor facilidad de acceso a sus propiedades
        $data = collect([ 
            'ods' => $ordenesServicios,
            'rl' => $rutasLamparas
        ]);
        // return $data;
        return view('print-layouts.rutas-lamparas', compact('data'));
    }

    public function printRRI($idTecnico, $fechaInicio, $fechaFin, $idServicio)
    {
        $rutasRoedoresInternas = [];
        //Valida que la opcion de impresion sea todos los servicios
        if($idServicio == 'all'){
            //Obtiene la informacion necesaria para crear ordenes de servicio
            $ordenesServicios = Servicio::with('solicitud.sede','solicitud.cliente', 'tecnicos', 'tipos')
                                        ->where('fecha_inicio', '>=', $fechaInicio)
                                        ->where('fecha_fin', '<=', $fechaFin)
                                        ->where('tipo','Normal')
                                        ->whereHas('tecnicos', function($query) use($idTecnico){
                                            $query->where('id', $idTecnico);  
                                        })
                                        ->get();
            //Obtiene la informacion necesaria para crear las rutas por cada cliente/sede
            $rutas = Servicio::with('solicitud.rutas', 'tecnicos')
                            ->where('fecha_inicio', '>=', $fechaInicio)
                            ->where('fecha_fin', '<=', $fechaFin)
                            ->where('tipo','Normal')
                            ->whereHas('tecnicos', function($query) use($idTecnico){
                                $query->where('id', $idTecnico);  
                            })
                            ->get();
            //Recorre la respuesta de la BD de todos los clientes/sedes seleccionados
            foreach ($rutas as $ruta) {
                //Recorre la informacion de las rutas de cada cliente/sede
                foreach($ruta->solicitud->rutas as $rs){
                    //Clasifica las rutas dependiendo de su tipo
                    if($rs->tipo == 'RUTA DE ROEDORES INTERNA'){
                        //Añade un elemento al final del array
                        array_push($rutasRoedoresInternas, $rs);
                    }
                }
                
            }
        //Valida que la opcion de imprimir sea de un servicio en especifico
        }else{
            //Obtiene la informacion de un servicio especifico
            $ordenesServicios = Servicio::with('solicitud.sede','solicitud.cliente', 'tecnicos', 'tipos')
                                        ->where('fecha_inicio', '>=', $fechaInicio)
                                        ->where('fecha_fin', '<=', $fechaFin)
                                        ->where('tipo','Normal')
                                        ->where('id', $idServicio)
                                        ->get();
            //Obtiene la informacion de las rutas de  un servicio especifico
            $rutas = Servicio::with('solicitud.rutas', 'tecnicos')//
                                ->where('fecha_inicio', '>=', $fechaInicio)
                                ->where('fecha_fin', '<=', $fechaFin)
                                ->where('tipo','Normal')
                                ->where('id', $idServicio)
                                ->get();

            //Recorre la respuesta de la BD de todos los clientes/sedes seleccionados
            foreach ($rutas as $ruta) {
                //Recorre la informacion de las rutas de cada cliente/sede
                foreach($ruta->solicitud->rutas as $rs){
                    //Clasifica las rutas dependiendo de su tipo
                    if($rs->tipo == 'RUTA DE ROEDORES INTERNA'){
                        //Añade un elemento al final del array
                        array_push($rutasRoedoresInternas, $rs);
                    }
                }
                
            }
        }
        //Organiza la informacion para mayor facilidad de acceso a sus propiedades
        $data = collect([ 
            'ods' => $ordenesServicios,
            'rri' => $rutasRoedoresInternas
        ]);
        // return $data;
        return view('print-layouts.rutas-roedores-int', compact('data'));
    }

    public function printRRE($idTecnico, $fechaInicio, $fechaFin, $idServicio)
    {
        $rutasRoedoresExternas = [];
        //Valida que la opcion de impresion sea todos los servicios
        if($idServicio == 'all'){
            //Obtiene la informacion necesaria para crear ordenes de servicio
            $ordenesServicios = Servicio::with('solicitud.sede','solicitud.cliente', 'tecnicos', 'tipos')
                                        ->where('fecha_inicio', '>=', $fechaInicio)
                                        ->where('fecha_fin', '<=', $fechaFin)
                                        ->where('tipo','Normal')
                                        ->whereHas('tecnicos', function($query) use($idTecnico){
                                            $query->where('id', $idTecnico);  
                                        })
                                        ->get();
            //Obtiene la informacion necesaria para crear las rutas por cada cliente/sede
            $rutas = Servicio::with('solicitud.rutas', 'tecnicos')
                            ->where('fecha_inicio', '>=', $fechaInicio)
                            ->where('fecha_fin', '<=', $fechaFin)
                            ->where('tipo','Normal')
                            ->whereHas('tecnicos', function($query) use($idTecnico){
                                $query->where('id', $idTecnico);  
                            })
                            ->get();
            //Recorre la respuesta de la BD de todos los clientes/sedes seleccionados
            foreach ($rutas as $ruta) {
                //Recorre la informacion de las rutas de cada cliente/sede
                foreach($ruta->solicitud->rutas as $rs){
                    //Clasifica las rutas dependiendo de su tipo
                    if($rs->tipo == 'RUTA DE ROEDORES EXTERNA'){
                        //Añade un elemento al final del array
                        array_push($rutasRoedoresExternas, $rs);
                    }
                }
                
            }
        //Valida que la opcion de imprimir sea de un servicio en especifico
        }else{
            //Obtiene la informacion de un servicio especifico
            $ordenesServicios = Servicio::with('solicitud.sede','solicitud.cliente', 'tecnicos', 'tipos')
                                        ->where('fecha_inicio', '>=', $fechaInicio)
                                        ->where('fecha_fin', '<=', $fechaFin)
                                        ->where('tipo','Normal')
                                        ->where('id', $idServicio)
                                        ->get();
            //Obtiene la informacion de las rutas de  un servicio especifico
            $rutas = Servicio::with('solicitud.rutas', 'tecnicos')//
                                ->where('fecha_inicio', '>=', $fechaInicio)
                                ->where('fecha_fin', '<=', $fechaFin)
                                ->where('tipo','Normal')
                                ->where('id', $idServicio)
                                ->get();

            //Recorre la respuesta de la BD de todos los clientes/sedes seleccionados
            foreach ($rutas as $ruta) {
                //Recorre la informacion de las rutas de cada cliente/sede
                foreach($ruta->solicitud->rutas as $rs){
                    //Clasifica las rutas dependiendo de su tipo
                    if($rs->tipo == 'RUTA DE ROEDORES EXTERNA'){
                        //Añade un elemento al final del array
                        array_push($rutasRoedoresExternas, $rs);
                    }
                }
                
            }
        }
        //Organiza la informacion para mayor facilidad de acceso a sus propiedades
        $data = collect([ 
            'ods' => $ordenesServicios,
            'rre' => $rutasRoedoresExternas
        ]);
        // return $data;
        return view('print-layouts.rutas-roedores-ext', compact('data'));
    }

    public function printCertificates($idTecnico, $fechaInicio, $fechaFin, $idServicio)
    {
        $certs = [];
        if($idServicio == 'all'){
            //Obtiene la informacion necesaria para crear ordenes de servicio
            $ordenesServicios = Servicio::with('solicitud.sede','solicitud.cliente', 'tecnicos', 'tipos')
                                        ->where('fecha_inicio', '>=', $fechaInicio)
                                        ->where('fecha_fin', '<=', $fechaFin)
                                        ->where('tipo','Normal')
                                        ->whereHas('tecnicos', function($query) use($idTecnico){
                                            $query->where('id', $idTecnico);  
                                        })
                                        ->get();
            //Obtiene la informacion necesaria para crear las rutas por cada cliente/sede
            $certificados = Servicio::with('solicitud.certificados', 'tecnicos')
                               ->where('fecha_inicio', '>=', $fechaInicio)
                               ->where('fecha_fin', '<=', $fechaFin)
                               ->where('tipo','Normal')
                               ->whereHas('tecnicos', function($query) use($idTecnico){
                                   $query->where('id', $idTecnico);  
                               })
                               ->get();
            
            foreach ($certificados as $certificado) {
                foreach ($certificado->solicitud->certificados as $cert) {
                    array_push($certs, $cert);
                }
            }

        }else{
            //Obtiene la informacion de un servicio especifico
            $ordenesServicios = Servicio::with('solicitud.sede','solicitud.cliente', 'tecnicos', 'tipos')
                                        ->where('fecha_inicio', '>=', $fechaInicio)
                                        ->where('fecha_fin', '<=', $fechaFin)
                                        ->where('tipo','Normal')
                                        ->where('id', $idServicio)
                                        ->get();
            //Obtiene la informacion de las rutas de  un servicio especifico
            $certificados = Servicio::with('solicitud.certificados', 'tecnicos')//
                                    ->where('fecha_inicio', '>=', $fechaInicio)
                                    ->where('fecha_fin', '<=', $fechaFin)
                                    ->where('tipo','Normal')
                                    ->where('id', $idServicio)
                                    ->get();

            foreach ($certificados as $certificado) {
                foreach ($certificado->solicitud->certificados as $cert) {
                    array_push($certs, $cert);
                }
            }
            
        }

        //Organiza la informacion para mayor facilidad de acceso a sus propiedades
        $data = collect([
            'ods' => $ordenesServicios,
            'ctf' => $certs
        ]);
        //Agrega pocisiones al array de datos con index iguales a la orden de servicio
        $index = 0;
        foreach ($data["ods"] as $ods) {
            $nextMonth = Carbon::parse($ods->fecha_inicio)->addMonth();
            $data->push($nextMonth->month);
            $index++;
        }
        return view('print-layouts.certificados', compact('data'));
        // return $data;
    }

    public function getAll()
    {
        return Tecnico::select('id', 'nombre')->get();
    }

    public function printTecnicianSchedule($idTecnico, $fechaInicio, $fechaFin,$idServicio)
    {
        if($idTecnico == 'all'){
            $tecnicos = Tecnico::with(['servicios' => function($query) use($fechaInicio, $fechaFin){
                                        $query->select('id', 'fecha_inicio', 'fecha_fin','solicitud_id', 'hora_inicio','hora_fin');
                                        $query->where('fecha_inicio', '>=', $fechaInicio);
                                        $query->where('fecha_fin', '<=', $fechaFin);
                                    }, 'servicios.solicitud' => function($query){ 
                                        $query->select('id', 'cliente_id', 'sede_id');
                                    }, 'servicios.solicitud.cliente' => function($query){
                                        $query->select('nombre_cliente', 'direccion', 'id');
                                    }, 'servicios.solicitud.sede' => function($query){
                                        $query->select('nombre', 'direccion', 'id');
                                    }])
                                    ->get();
        }else{
            $tecnicos = Tecnico::with(['servicios' => function($query) use($fechaInicio, $fechaFin){
                                        $query->select('id', 'fecha_inicio', 'fecha_fin','solicitud_id', 'hora_inicio','hora_fin');
                                        $query->where('fecha_inicio', '>=', $fechaInicio);
                                        $query->where('fecha_fin', '<=', $fechaFin);
                                    }, 'servicios.solicitud' => function($query){ 
                                        $query->select('id', 'cliente_id', 'sede_id');
                                    }, 'servicios.solicitud.cliente' => function($query){
                                        $query->select('nombre_cliente', 'direccion', 'id');
                                    }, 'servicios.solicitud.sede' => function($query){
                                        $query->select('nombre', 'direccion', 'id');
                                    }])
                                    ->where('id', $idTecnico)
                                    ->get();
        }

        //Organiza la informacion para mayor facilidad de acceso a sus propiedades
        $data = collect([
            'tecnicos' => $tecnicos
        ]);

        $fechaActual = Carbon::now()->toDateString();
        $data->push(['now' => $fechaActual]);
        //return $data;
        return view('print-layouts.horarios-tecnicos', compact('data'));
    }
}


