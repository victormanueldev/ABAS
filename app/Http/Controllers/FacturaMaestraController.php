<?php

namespace ABAS\Http\Controllers;

use ABAS\FacturaMaestra;
use Illuminate\Http\Request;
use ABAS\Servicio;
use DB;

class FacturaMaestraController extends Controller
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
            $facturaMaestra = new FacturaMaestra();
            $facturaMaestra->numero_factura = $request->numero_factura;
            $facturaMaestra->total_factura = $request->total_factura;
            $facturaMaestra->estado = 'Pendiente';
            $facturaMaestra->cliente_id = $request->cliente_id;
            //$facturaMaestra->save();

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
                    ->update([
                        'numero_factura' => $request->numero_factura,
                        'estado' => 'Pendiente',
                        'valor' => $request->total_factura
                    ]);
            }

        }
    }

    /**
     * Display the specified resource.
     *
     * @param  \ABAS\FacturaMaestra  $facturaMaestra
     * @return \Illuminate\Http\Response
     */
    public function show(FacturaMaestra $facturaMaestra)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  \ABAS\FacturaMaestra  $facturaMaestra
     * @return \Illuminate\Http\Response
     */
    public function edit(FacturaMaestra $facturaMaestra)
    {
        //
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  \ABAS\FacturaMaestra  $facturaMaestra
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, FacturaMaestra $facturaMaestra)
    {
        //
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  \ABAS\FacturaMaestra  $facturaMaestra
     * @return \Illuminate\Http\Response
     */
    public function destroy(FacturaMaestra $facturaMaestra)
    {
        //
    }
}
