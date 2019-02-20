<?php

namespace ABAS\Http\Controllers;

use ABAS\Inspeccion;
use Illuminate\Http\Request;

class InspeccionController extends Controller
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
            $inspeccion = new Inspeccion();
            $inspeccion->codigo = $request->codigo;
            $inspeccion->nombre_usuario = $request->nombre_usuario;
            $inspeccion->fecha = $request->fecha;
            $inspeccion->frecuencia = $request->frecuencia;
            $inspeccion->observaciones = $request->observaciones;
            $inspeccion->valor_plan_saneamiento = $request->valor_plan_saneamiento;
            $inspeccion->frecuencia_visitas = $request->frecuencia_visitas;
            $inspeccion->observaciones_visistas = $request->observaciones_visitas;
            $inspeccion->total_detalle_servicios = $request->total_detalle_servicios;
            $inspeccion->tipo_facturacion = $request->tipo_facturacion;
            $inspeccion->forma_pago = $request->forma_pago;
            $inspeccion->contrato = $request->contrato;
            $inspeccion->cant_lampara_lamina = $request->cant_lampara_lamina;
            $inspeccion->cant_lampara_insectocutora = $request->cant_lampara_insectocutora;
            $inspeccion->cant_trampas = $request->cant_trampas;
            $inspeccion->cant_jaulas = $request->cant_jaulas;
            $inspeccion->cant_estaciones_roedor = $request->cant_estaciones_roedor;
            $inspeccion->observaciones_estaciones = $request->observaciones_estaciones;
            $inspeccion->cant_cajas_alca_elec = $request->cant_cajas_alca_elec;
            $inspeccion->sumideros = $request->sumideros;
            $inspeccion->cliente_id = $request->cliente_id;
            $inspeccion->sede_id = $request->sede_id;
            $inspeccion->visitas= $request->visitas;
            $inspeccion->detalle_servicios= $request->detalle_servicios;
            $inspeccion->residencias= $request->residencias;
            $inspeccion->compra_dispositivos= $request->compra_dispositivos;
            $inspeccion->dispositivos_comodato= $request->dispositivos_comodato;
            $inspeccion->gestion_calidad= $request->gestion_calidad;
            $inspeccion->areas= $request->areas;
            $inspeccion->save();
            return response()->json("Creation Success", 201);
        }else{
            return response()->json("Error en la peticion HTTP", 401);
        }
    }

    /**
     * Display the specified resource.
     *
     * @param  \ABAS\Inspeccion  $inspeccion
     * @return \Illuminate\Http\Response
     */
    public function show(Inspeccion $inspeccion)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  \ABAS\Inspeccion  $inspeccion
     * @return \Illuminate\Http\Response
     */
    public function edit(Inspeccion $inspeccion)
    {
        //
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  \ABAS\Inspeccion  $inspeccion
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, Inspeccion $inspeccion)
    {
        //
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  \ABAS\Inspeccion  $inspeccion
     * @return \Illuminate\Http\Response
     */
    public function destroy(Inspeccion $inspeccion)
    {
        //
    }
}
