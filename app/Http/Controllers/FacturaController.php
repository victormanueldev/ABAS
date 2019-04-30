<?php

namespace ABAS\Http\Controllers;

use ABAS\Factura;
use Illuminate\Http\Request;
use Carbon\Carbon;
use ABAS\Servicio;
use DB;

class FacturaController extends Controller
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
            try{
                $dt = Carbon::now();
                $factura = new Factura();
                $factura->numero_factura = $request->numero_factura;
                $factura->valor = $request->total_factura;
                $factura->tipo = 'maestra';
                $factura->fecha_inicio_vigencia = $request->date_start; 
                $factura->fecha_fin_vigencia = $request->date_end;
                $factura->cliente_id = $request->cliente_id;
                $factura->save();
    
                $cliente_id = $request->cliente_id;
                $sede_id = $request->sede_id;
    
                $servicios = Servicio::select('id', 'solicitud_id')->with('solicitud')
                                                    ->whereHas('solicitud', function($query) use($cliente_id, $sede_id){
                                                        $query->where('cliente_id',$cliente_id);
                                                        $query->where('sede_id', $sede_id);    
                                                    })
                                                    ->where('fecha_inicio', '>=', $request->date_start)
                                                    ->where('fecha_fin', '<=', $request->date_end)
                                                    ->get();

                foreach ($servicios as $servicio ) {
                    DB::table('servicio_tipo_servicio')
                        ->where('servicio_id', $servicio->id)
                        ->where('numero_factura', null)
                        ->update([
                            'numero_factura' => $request->numero_factura,
                            'estado' => 'Pendiente',
                            'valor' => $request->total_factura
                        ]);
                }
                return response()->json("Create success", 201);
            }catch(\Exception $e){
                return response()->json($e, 500);
            }
        }else{
            return response()->json('Error en la peticion AJAX', 401);
        }
    }

    /**
     * Display the specified resource.
     *
     * @param  \ABAS\Factura  $factura
     * @return \Illuminate\Http\Response
     */
    public function show(Factura $factura)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  \ABAS\Factura  $factura
     * @return \Illuminate\Http\Response
     */
    public function edit(Factura $factura)
    {
        //
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  \ABAS\Factura  $factura
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, Factura $factura)
    {
        //
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  \ABAS\Factura  $factura
     * @return \Illuminate\Http\Response
     */
    public function destroy(Factura $factura)
    {
        //
    }
}
