<?php

namespace ABAS\Http\Controllers;

use ABAS\Cliente;
use ABAS\User;
use ABAS\Solicitud;
use Illuminate\Http\Request;
use Illuminate\Http\Response;
use ABAS\Sede;
use Auth;
use DB;

class SolicitudesController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        //
        $clientes = Cliente::select('nombre_cliente', 'id')->get();
        $user = Auth::user();
        //return $clientes;
        return view('comercial.inspeccion', compact('clientes', 'user'));
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        // $data = "Hola Mundo";
        // $pdf = \PDF::loadView('pdf_solicitud', ['data' => $data]);
        $pdf = \PDF::loadView('comercial.pdf_solicitud');
        return $pdf->stream('Solicitud.pdf');
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
            if ($request->ajax()) {
                // $data = collect();
                $solicitud = new Solicitud();
                $cliente = Cliente::find($request->id_cliente);
                $sede = Sede::find($request->select_sedes);
                $solicitud->codigo = $request->codigo_solicitud;
                $solicitud->fecha = $request->fecha_creacion;
                $solicitud->nombre_usuario = $request->nombre_usuario;
                $solicitud->frecuencia = $request->frecuencia_servicio;
                $solicitud->cliente_id = $cliente->id;
                $solicitud->sede_id = isset($sede->id) ? $sede->id : 0;
                $solicitud->contacto_name_factura = $request->contacto_name_factura;
                $solicitud->contacto_telefono_factura = $request->contacto_telefono_factura;
                $solicitud->contacto_celular_factura = $request->contacto_celular_factura;
                $solicitud->observaciones = $request->observaciones_tecnico;
                $solicitud->total_plan = $request->total_plan;
                $solicitud->instrucciones = $request->instrucciones;
                $solicitud->estaciones_roedor = $request->estaciones_roedor;
                $solicitud->lamparas_control = $request->lamparas_control;
                $solicitud->cajas_alcantarilla = $request->cajas_alcantarilla;
                $solicitud->trampas_plasticas = $request->trampas_plasticas;
                $solicitud->numero_casas = $request->numero_casas;
                $solicitud->numero_aptos = $request->numero_aptos;
                $solicitud->numero_bodegas = $request->numero_bodegas;
                $solicitud->contrato = $request->contrato;
                $solicitud->forma_pago = $request->forma_pago;
                $solicitud->facturacion = $request->facturacion;
                $solicitud->servicios_1 = $request->servicios_1;
                $solicitud->frecuencia_servicios_1 = $request->frecuencia_servicios_1;
                $solicitud->valor_servicios_1 = $request->valor_servicios_1;
                $solicitud->servicios_2 = $request->servicios_2;
                $solicitud->frecuencia_servicios_2 = $request->frecuencia_servicios_2;
                $solicitud->valor_servicios_2 = $request->valor_servicios_2;
                $solicitud->servicios_3 = $request->servicios_3;
                $solicitud->frecuencia_servicios_3 = $request->frecuencia_servicios_3;
                $solicitud->valor_servicios_3 = $request->valor_servicios_3;
                $solicitud->total_servicios = $request->total_servicios;
                $solicitud->dispositivos_1 = $request->dispositivos_1;
                $solicitud->cantidad_dispositivos_1 = $request->cantidad_dispositivos_1;
                $solicitud->unidad_dispositivos_1 = $request->unidad_dispositivos_1;
                $solicitud->total_dispositivos_1 = $request->total_dispositivos_1;
                $solicitud->dispositivos_2 = $request->dispositivos_2;
                $solicitud->cantidad_dispositivos_2 = $request->cantidad_dispositivos_2;
                $solicitud->unidad_dispositivos_2 = $request->unidad_dispositivos_2;
                $solicitud->total_dispositivos_2 = $request->total_dispositivos_2;
                $solicitud->dispositivos_3 = $request->dispositivos_3;
                $solicitud->cantidad_dispositivos_3 = $request->cantidad_dispositivos_3;
                $solicitud->unidad_dispositivos_3 = $request->unidad_dispositivos_3;
                $solicitud->total_dispositivos_3 = $request->total_dispositivos_3;
                $solicitud->observaciones_dispositivos = $request->observaciones_dispositivos;
                $solicitud->dispositivos_comodato_1 = $request->dispositivos_comodato_1;
                $solicitud->cantidad_dispositivos_comodato_1 = $request->cantidad_dispositivos_comodato_1;
                $solicitud->unidad_dispositivos_comodato_1 = $request->unidad_dispositivos_comodato_1;
                $solicitud->total_dispositivos_comodato_1 = $request->total_dispositivos_comodato_1;
                $solicitud->dispositivos_comodato_2 = $request->dispositivos_comodato_2;
                $solicitud->cantidad_dispositivos_comodato_2 = $request->cantidad_dispositivos_comodato_2;
                $solicitud->unidad_dispositivos_comodato_2 = $request->unidad_dispositivos_comodato_2;
                $solicitud->total_dispositivos_comodato_2 = $request->total_dispositivos_comodato_2;
                $solicitud->dispositivos_comodato_3 = $request->dispositivos_comodato_3;
                $solicitud->cantidad_dispositivos_comodato_3 = $request->cantidad_dispositivos_comodato_3;
                $solicitud->unidad_dispositivos_comodato_3 = $request->unidad_dispositivos_comodato_3;
                $solicitud->total_dispositivos_comodato_3 = $request->total_dispositivos_comodato_3;
                $solicitud->observaciones_dispositivos_comodato = $request->observaciones_dispositivos_comodato;
                $solicitud->medio_contacto = $request->medio_contacto;
                $solicitud->otro = $request->otro;
                

                $solicitud->save();
                return response()->json('Servicio guardado con exito', 200);

            }else{
                return response()->json('Datos enviados, no validos', 400);
            }
        }catch(\Exception $e){
            return response()->json(['Error al guardar el servicio',$e], 500);
        }

    }

    /**
     * Display the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function show(Request $request)
    {
        //
        if ($request->id_sede != 0) {
            $solicitud = DB::table('solicitudes')
                                    ->select('solicitudes.id', 'solicitudes.frecuencia', 'solicitudes.observaciones', 'sedes.direccion', 'sedes.barrio', 'sedes.nombre_contacto', 'sedes.telefono_contacto')
                                    ->join('sedes', 'solicitudes.sede_id', 'sedes.id')
                                    ->where('solicitudes.cliente_id', $request->id_cliente)
                                    ->where('solicitudes.sede_id', $request->id_sede)
                                    ->get();
        } else {
            $solicitud = DB::table('solicitudes')
                                ->select('solicitudes.id', 'solicitudes.frecuencia', 'solicitudes.observaciones', 'clientes.barrio', 'clientes.nombre_contacto', 'clientes.celular AS telefono_contacto', 'clientes.direccion')
                                ->join('clientes', 'solicitudes.cliente_id', 'clientes.id')
                                ->where('solicitudes.cliente_id', $request->id_cliente)
                                ->where('solicitudes.sede_id', $request->id_sede)
                                ->get();
        }
        return $solicitud;
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function edit($id)
    {
        //
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, $id)
    {
        //
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy($id)
    {
        //
    }
}
