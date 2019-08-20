<?php

namespace ABAS\Http\Controllers;

use ABAS\Inspeccion;
use Illuminate\Http\Request;
use ABAS\Cliente;
use ABAS\Solicitud;

class InspeccionController extends Controller
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
        $clientes = Cliente::select('nombre_cliente', 'id', 'razon_social')->get();
        return view('comercial.inspeccion', compact('clientes'));
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
            $inspeccion = new Solicitud();
            $inspeccion->codigo = $request->codigo;
            $inspeccion->nombre_usuario = $request->nombre_usuario;
            $inspeccion->fecha = $request->fecha;
            $inspeccion->frecuencia = $request->frecuencia;
            $inspeccion->observaciones = $request->observaciones;
            $inspeccion->valor_plan_saneamiento = $request->valor_plan_saneamiento;
            $inspeccion->frecuencia_visitas = $request->frecuencia_visitas;
            $inspeccion->observaciones_visitas = $request->observaciones_visitas;
            $inspeccion->total_detalle_servicios = $request->total_detalle_servicios;
            $inspeccion->tipo_facturacion = $request->tipo_facturacion;
            $inspeccion->forma_pago = $request->forma_pago;
            $inspeccion->contrato = $request->contrato == 'true' ? true : false;
            $inspeccion->cant_lampara_lamina = $request->cant_lampara_lamina;
            $inspeccion->cant_lampara_insectocutora = $request->cant_lampara_insectocutora;
            $inspeccion->cant_trampas = $request->cant_trampas;
            $inspeccion->cant_jaulas = $request->cant_jaulas;
            $inspeccion->cant_estaciones_roedor = $request->cant_estaciones_roedor;
            $inspeccion->observaciones_estaciones = $request->observaciones_estaciones;
            $inspeccion->cant_cajas_alca_elec = $request->cant_cajas_alca_elec;
            $inspeccion->sumideros = $request->sumideros;
            $inspeccion->cliente_id = $request->cliente_id;
            $inspeccion->sede_id = $request->sede_id == '' ? 0 : $request->sede_id;
            $inspeccion->visitas= $request->visitas;
            $inspeccion->detalle_servicios= $request->detalle_servicios;
            $inspeccion->residencias= $request->residencias;
            $inspeccion->compra_dispositivos= $request->compra_dispositivos;
            $inspeccion->dispositivos_comodato= $request->dispositivos_comodato;
            $inspeccion->gestion_calidad= $request->gestion_calidad;
            $inspeccion->areas= $request->areas;

            if($request->contrato == 'true'){
                $cliente = Cliente::findOrFail($request->cliente_id);
                $cliente->estado_registro = 'cliente_contrato';
                $cliente->save();
            }

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
    public function show(Request $request)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  \ABAS\Inspeccion  $inspeccion
     * @return \Illuminate\Http\Response
     */
    public function edit(Request $request, $id)
    {
        //
        if($request->ajax()){
            $inspeccion = Solicitud::findOrFail($id);
            return $inspeccion;
        }
        return view('comercial.ver-inspeccion');
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  \ABAS\Inspeccion  $inspeccion
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, $id)
    {
        //
        if($request->ajax()){
            $inspeccion = Solicitud::findOrFail($id);
            $inspeccion->codigo = $request->codigo;
            $inspeccion->fecha = $request->fecha;
            $inspeccion->frecuencia = $request->frecuencia;
            $inspeccion->observaciones = $request->observaciones;
            $inspeccion->valor_plan_saneamiento = $request->valor_plan_saneamiento;
            $inspeccion->frecuencia_visitas = $request->frecuencia_visitas;
            $inspeccion->observaciones_visitas = $request->observaciones_visitas;
            $inspeccion->total_detalle_servicios = $request->total_detalle_servicios;
            $inspeccion->tipo_facturacion = $request->tipo_facturacion;
            $inspeccion->forma_pago = $request->forma_pago;
            $inspeccion->contrato = $request->contrato == 'true' ? true : false ;
            $inspeccion->cant_lampara_lamina = $request->cant_lampara_lamina;
            $inspeccion->cant_lampara_insectocutora = $request->cant_lampara_insectocutora;
            $inspeccion->cant_trampas = $request->cant_trampas;
            $inspeccion->cant_jaulas = $request->cant_jaulas;
            $inspeccion->cant_estaciones_roedor = $request->cant_estaciones_roedor;
            $inspeccion->observaciones_estaciones = $request->observaciones_estaciones;
            $inspeccion->cant_cajas_alca_elec = $request->cant_cajas_alca_elec;
            $inspeccion->sumideros = $request->sumideros;
            $inspeccion->visitas= $request->visitas;
            $inspeccion->detalle_servicios= $request->detalle_servicios;
            $inspeccion->residencias= $request->residencias;
            $inspeccion->compra_dispositivos= $request->compra_dispositivos;
            $inspeccion->dispositivos_comodato= $request->dispositivos_comodato;
            $inspeccion->gestion_calidad= $request->gestion_calidad;
            $inspeccion->areas= $request->areas;
            $inspeccion->save();
            return response()->json($inspeccion->cliente_id, 200);
        }
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

    public function showInspectionClient($idCliente, $idSede)
    {
        $inspecciones = Inspeccion::select('id','codigo','fecha','frecuencia','observaciones_visitas','valor_plan_saneamiento','frecuencia_visitas','total_detalle_servicios','tipo_facturacion', 'detalle_servicios')
                                    ->where('cliente_id', $idCliente)
                                    ->where('sede_id', $idSede)
                                    ->get();
        return $inspecciones;
    }
}
