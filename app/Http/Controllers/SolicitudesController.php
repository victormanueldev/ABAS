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
        return view('comercial.solicitud', compact('clientes', 'user'));
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
                $sede = Sede::find($request->id_sede);
                
                // $user = Auth::user()->nombres." ".Auth::user()->apellidos;
        
                // $data->push($cliente);
                // $data->push($sede);
                // $data->push(['user' => $user]);
                // return $data;
                //$pdf = \PDF::loadView('comercial.pdf_solicitud', compact('data'));
                //return $pdf->stream('Solicitud.pdf');
                
                $solicitud->codigo = $request->codigo_solicitud;
                $solicitud->fecha = $request->fecha_creacion;
                $solicitud->frecuencia = $request->frecuencia_servicio;
                //Cliente
                $solicitud->cliente_id = $request->id_cliente;
                $solicitud->sede_id = $request->id_sede;

                //Datos Contacto 
                $solicitud->contacto_name_factura = $request->contacto_name_factura; 
                $solicitud->contacto_telefono_factura = $request->contacto_telefono_factura; 
                $solicitud->contacto_celular_factura = $request->contacto_celular_factura;
                
                //Calidad y servicio al cliente: Realizar los siguientes Procesos
                $solicitud->observaciones_tecnico = $request->observaciones_tecnico;
                $solicitud->diagnostico_inicial = $request->diagnostico_inicial;
                $solicitud->cronograma_servicios = $request->cronograma_servicios;
                $solicitud->visita_calidad = $request->visita_calidad;
                $solicitud->frecuencia_calidad = $request->frecuencia_calidad;

                //Diligenciar cuando requiera plan de saneamiento
                $solicitud->frecuencia_visitas = $request->frecuencia_visitas;
                $solicitud->visita_1 = $request->visita_1;
                $solicitud->visita_2 = $request->visita_2;
                $solicitud->visita_3 = $request->visita_3;
                $solicitud->visita_4 = $request->visita_4;
                $solicitud->total_horas_visita = $request->total_horas_visita;
                $solicitud->valor_hora = $request->valor_hora;
                $solicitud->valor_facturar = $request->valor_facturar;
                $solicitud->instrucciones = $request->instrucciones;
                $solicitud->servicios_contratados = $request->servicios_contratados;
                $solicitud->frecuencia_plagas = $request->frecuencia_plagas;
                $solicitud->tipo_cliente = $request->tipo_cliente;
                $solicitud->tapa_alcantarilla = $request->tapa_alcantarilla;
                $solicitud->numero_tapas = $request->numero_tapas;
                $solicitud->numero_residencias = $request->numero_residencias;

                //Detalle de horas cotizadas por frecuencia
                $solicitud->horas_semanales = $request->horas_semanales;
                $solicitud->horas_mensuales = $request->horas_mensuales;
                $solicitud->horas_trimestrales = $request->horas_trimestrales;
                $solicitud->horas_semestrales = $request->horas_semestrales;
                $solicitud->horas_quincenales = $request->horas_quincenales;
                $solicitud->horas_bimensuales = $request->horas_bimensuales;
                $solicitud->horas_4meses = $request->horas_4meses;
                $solicitud->horas_anuales = $request->horas_anuales;

                //Detalle y valor del servicio
                $solicitud->total_horas_cotizadas = $request->total_horas_cotizadas;
                $solicitud->valor_hora_antes = $request->valor_hora_antes;
                $solicitud->valor_inicia_antes = $request->valor_inicia_antes;
                $solicitud->forma_pago = $request->forma_pago;
                $solicitud->facturacion = $request->facturacion;
                $solicitud->contrato = $request->contrato;
                $solicitud->numero_contrato = $request->numero_contrato;
                $solicitud->actividad_economica = $request->actividad_economica;

                $solicitud->medio_contacto = $request->medio_contacto;
                $solicitud->otro = $request->otro;
                $solicitud->nombre_usuario = $request->nombre_usuario;
                $solicitud->nombre_usuario_revisado = $request->nombre_usuario_revisado;

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
