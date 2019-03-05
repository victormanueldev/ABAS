<?php

namespace ABAS\Http\Controllers;

use ABAS\Cliente;
use ABAS\User;
use ABAS\Inspeccion;
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
        $clientes = Cliente::select('nombre_cliente', 'id', 'razon_social')->get();
        //$user = Auth::user();
        //return $clientes;
        return view('comercial.solicitud', compact('clientes'));
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
        // try{
            if ($request->ajax()) {
                // $data = collect();
                $solicitud = new Inspeccion();
                $solicitud->codigo = $request->codigo;
                $solicitud->nombre_usuario = $request->nombre_usuario;
                $solicitud->fecha = $request->fecha;
                $solicitud->frecuencia = $request->frecuencia;
                $solicitud->observaciones = $request->observaciones;
                $solicitud->valor_plan_saneamiento = $request->valor_plan_saneamiento;
                $solicitud->frecuencia_visitas = $request->frecuencia_visitas;
                $solicitud->observaciones_visitas = $request->observaciones_visitas;
                $solicitud->total_detalle_servicios = $request->total_detalle_servicios;
                $solicitud->tipo_facturacion = $request->tipo_facturacion;
                $solicitud->forma_pago = $request->forma_pago;
                $solicitud->contrato = $request->contrato == 'true' ? true : false ;
                $solicitud->cant_lampara_lamina = $request->cant_lampara_lamina;
                $solicitud->cant_lampara_insectocutora = $request->cant_lampara_insectocutora;
                $solicitud->cant_trampas = $request->cant_trampas;
                $solicitud->cant_jaulas = $request->cant_jaulas;
                $solicitud->cant_estaciones_roedor = $request->cant_estaciones_roedor;
                $solicitud->observaciones_estaciones = $request->observaciones_estaciones;
                $solicitud->cant_cajas_alca_elec = $request->cant_cajas_alca_elec;
                $solicitud->sumideros = $request->sumideros;
                $solicitud->visitas= $request->visitas;
                $solicitud->detalle_servicios= $request->detalle_servicios;
                $solicitud->residencias= $request->residencias;
                $solicitud->compra_dispositivos= $request->compra_dispositivos;
                $solicitud->dispositivos_comodato= $request->dispositivos_comodato;
                $solicitud->gestion_calidad= $request->gestion_calidad;
                $solicitud->medio_contacto = $request->medio_contacto;
                $solicitud->otro = $request->otro;
                $solicitud->cliente_id = $request->cliente_id;
                $solicitud->sede_id = $request->sede_id == '' ? 0 : $request->sede_id;
                

                $solicitud->save();
                return response()->json('Servicio guardado con exito', 200);

            }else{
                return response()->json('Datos enviados, no validos', 400);
            }
        // }catch(\Exception $e){
        //     return response()->json(['Error al guardar el servicio',$e], 500);
        // }

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
                                ->select('solicitudes.id', 'solicitudes.frecuencia', 'solicitudes.observaciones', 'clientes.barrio', 'clientes.nombre_contacto_inicial', 'clientes.celular_contacto_inicial AS telefono_contacto', 'clientes.direccion')
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
