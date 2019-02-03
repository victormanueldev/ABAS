<?php

namespace ABAS\Http\Controllers;

use ABAS\OrdenServicio;
use Illuminate\Http\Request;
use Carbon\Carbon;
use ABAS\Servicio;
use DB;

class OrdenServicioController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        //
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        //
        return view('servicio-clientes.registro-ordenes');
    }

    /**
     * Permite separar un string por delimitadores
     * @param Array $delimiters
     * @param String $string
     * @return Array
     */
    private function multiexplode ($delimiters,$string) {
        $ary = explode($delimiters[0],$string);
        array_shift($delimiters);
        if($delimiters != NULL) {
            foreach($ary as $key => $val) {
                 $ary[$key] = $this->multiexplode($delimiters, $val);
            }
        }
        return  $ary;
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
        if($request->ajax()){
            // try{
                $now = Carbon::now();
                $orden = new OrdenServicio ();

                // $idOrden = DB::table('orden_servicios')->insertGetId([
                //     'codigo' => $request->codigo,
                //     'servicio_id' => $request->idServicio,
                //     'areas_plagas' => json_encode($request->areasPlagas),
                //     'nivel_actividad' => json_encode($request->nivelActividadPlagas),
                //     'realizo_inspeccion' => $request->realizoInspeccion,
                //     'tratamiento_correctivo' => $request->tratamientoCorrectivo,
                //     'tratamiento_preventivo' => $request->tratamientoPreventivo,
                //     'requiere_refuerzo' => $request->requiereRefuerzo,
                //     'mejorar_frecuencia'  => $request->mejorarFrecuencia,
                //     'created_at' => $now->toDateTimeString(),
                //     'updated_at' => $now->toDateTimeString()
                // ]);

                // foreach ($request->tecnicos as $tecnico) {
                //     DB::table('orden_servicio_tecnico')->insert([
                //         'orden_servicio_id' => $idOrden,
                //         'tecnico_id' => $tecnico['id'],
                //         'hora_entrada' => $tecnico['horaEntrada'],
                //         'hora_salida' => $tecnico['horaSalida']
                //     ]);
                // }

                // foreach ($request->reporteProductos as $producto) {
                //     DB::table('orden_servicio_producto')->insert([
                //         'orden_servicio_id' => $idOrden,
                //         'producto_id' => $producto['idProducto'],
                //         'cantidad_aplicada' => $producto['cantidadUtilizada']
                //     ]);

                $servicio = Servicio::findOrFail($request->idServicio);
                $servicio->estado = 'Realizado';
                $a = "a";
                $oppacity = '0.75';
                
                $res = $this->multiexplode(array("(",")"), $servicio->color);
                $servicio->color = "rgba({$res[1][0]},0.75)";
                $servicio->save();

                
                return response()->json('Create successfull', 200);
            // }catch(\Exception $e){
            //     return response()->json($e, 500);
            // }
        }
    }

    /**
     * Display the specified resource.
     *
     * @param  \ABAS\OrdenServicio  $ordenServicio
     * @return \Illuminate\Http\Response
     */
    public function show(OrdenServicio $ordenServicio)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  \ABAS\OrdenServicio  $ordenServicio
     * @return \Illuminate\Http\Response
     */
    public function edit(OrdenServicio $ordenServicio)
    {
        //
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  \ABAS\OrdenServicio  $ordenServicio
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, OrdenServicio $ordenServicio)
    {
        //
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  \ABAS\OrdenServicio  $ordenServicio
     * @return \Illuminate\Http\Response
     */
    public function destroy(OrdenServicio $ordenServicio)
    {
        //
    }
}
