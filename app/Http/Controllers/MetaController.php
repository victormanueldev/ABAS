<?php

namespace ABAS\Http\Controllers;

use ABAS\Meta;
use Illuminate\Http\Request;
use Carbon\Carbon;
use ABAS\User;
use DB;

class MetaController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index(Request $request)
    {
        //
        $data = collect( DB::table('users')
                            ->join('clientes', 'users.id', 'clientes.user_id')
                            ->join('solicitudes', 'clientes.id', 'solicitudes.cliente_id')
                            ->join('servicios', 'solicitudes.id', 'servicios.solicitud_id')
                            ->join('facturas', 'servicios.id', 'facturas.servicio_id')
                            ->join('cargos', 'users.cargo_id', 'cargos.id')
                            ->join('areas', 'users.area_id', 'areas.id')
                            ->select('cargos.descripcion', 'users.nombres' , DB::raw('SUM(facturas.valor) as total'), 'users.id', 'users.foto', 'users.apellidos')
                            ->where('areas.id', '1')
                            ->where('users.cargo_id', '1')
                            ->where('servicios.fecha_inicio', '>=', '2018-12-01')
                            ->where('servicios.fecha_inicio', '<=', '2019-31-12')
                            ->groupBy('users.id')
                            ->get());
        $clientesNuevos = DB::table('users')
                            ->join('clientes', 'users.id', 'clientes.user_id')
                            ->join('cotizaciones', 'clientes.id', 'cotizaciones.cliente_id')
                            ->select('users.id', DB::raw('SUM(cotizaciones.valor) as total'))
                            ->where('users.cargo_id', '1')
                            ->groupBy('users.id')
                            ->get();
        $metasUsers = DB::table('users')
                            ->join('metas', 'users.id', 'metas.user_id')
                            ->select('users.id', 'metas.*')
                            ->where('users.cargo_id', '1')
                            ->get();
        $data->put('cotizaciones', $clientesNuevos);
        $data->put('metas',  $metasUsers);
        if($request->ajax()){
            return $data;
        }
        return view('contabilidad.progreso-inspectores-comerciales');
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        //
        $users = User::with('cargo:id,descripcion')
                        ->select('id','cedula', 'nombres', 'apellidos', 'area_id', 'cargo_id')
                        ->where('area_id', '1')
                        ->get();
        return view("contabilidad.asignacion-metas", compact('users'));
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
        /*$dias = array("Domingo","Lunes","Martes","Miercoles","Jueves","Viernes","Sábado");
        $meses = array("Enero","Febrero","Marzo","Abril","Mayo","Junio","Julio","Agosto","Septiembre","Octubre","Noviembre","Diciembre");*/
        if($request->ajax()){
            try{
                $meta = new Meta();
                if($request->role == 1){
                    $meta->meta_clientes_nuevos = $request->clientesNuevos;
                    $meta->meta_recompras = $request->recompras;
                    $meta->mes_vigencia = $request->mesVigencia;
                    $meta->anio_vigencia = $request->anioVigencia;
                    $meta->user_id = $request->idUser; 
                    $meta->save();
                }else{
                    $meta->meta_clientes_nuevos = $request->clientesNuevos; 
                    $meta->meta_recompras = $request->recompras; 
                    $meta->mes_vigencia = $request->mesVigencia; 
                    $meta->meta_equipo_clientes_nuevos = $request->metaEquipoClentesNuevos; 
                    $meta->meta_equipo_recompras = $request->metaEquipoRecompras; 
                    $meta->meta_anual_equipo = $request->metaAnualEquipo; 
                    $meta->meta_anual_inpector = $request->metaAnualPorInspector; 
                    $meta->anio_vigencia = $request->anioVigencia;
                    $meta->user_id = $request->idUser; 
                    $meta->save();
                }
                return response()->json('Creation Successfull', 201);
            }catch(\Exception $e){
                return response()->json($e, 500);
            }
        }else{
            return response()->json('Error en la peticion AJAX');
        }
    }

    /**
     * Display the specified resource.
     *
     * @param  \ABAS\Meta  $meta
     * @return \Illuminate\Http\Response
     */
    public function show(Meta $meta)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  \ABAS\Meta  $meta
     * @return \Illuminate\Http\Response
     */
    public function edit(Meta $meta)
    {
        //
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  \ABAS\Meta  $meta
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, Meta $meta)
    {
        //
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  \ABAS\Meta  $meta
     * @return \Illuminate\Http\Response
     */
    public function destroy(Meta $meta)
    {
        //
    }

    public function progresoDirector(Request $request)
    {
        $data = collect();
        $totalRecompras =  DB::table('users')
                        ->join('clientes', 'users.id', 'clientes.user_id')
                        ->join('solicitudes', 'clientes.id', 'solicitudes.cliente_id')
                        ->join('servicios', 'solicitudes.id', 'servicios.solicitud_id')
                        ->join('facturas', 'servicios.id', 'facturas.servicio_id')
                        ->join('areas', 'users.area_id', 'areas.id')
                        ->select('facturas.valor as total_facturas', 'users.id as user_id', 'users.cargo_id as cargo', 'servicios.fecha_inicio')
                        //->where('areas.id', '1')
                        //->where('servicios.fecha_inicio', '>=', '2018-12-01')
                        //->where('servicios.fecha_inicio', '<=', '2019-31-12')
                        ->where('users.area_id', '1')
                        //->groupBy('users.id')
                        ->get();

        $clientesNuevos = DB::table('users')
            ->join('clientes', 'users.id', 'clientes.user_id')
            ->join('cotizaciones', 'clientes.id', 'cotizaciones.cliente_id')
            ->select('users.id as user_id', 'users.cargo_id as cargo','cotizaciones.valor as total', 'cotizaciones.created_at')
            ->where('users.area_id', '1')
            //->groupBy('users.id')
            ->get();

        $metasUsers = DB::table('users')
                ->join('metas', 'users.id', 'metas.user_id')
                ->select('users.id', 'metas.*', 'users.nombres','users.apellidos', 'users.foto')
                ->where('users.cargo_id', '4')
                ->get();
        $data->put('recompras', $totalRecompras);
        $data->put('cotizaciones', $clientesNuevos);
        $data->put('metas',  $metasUsers);
        if($request->ajax()){
        return $data;
        }
        return view('contabilidad.progreso-director-comercial');
    }
}