<?php

namespace ABAS\Http\Controllers;

use ABAS\Cliente;
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
                $solicitud->observaciones = $request->observaciones;
                $solicitud->cliente_id = $request->id_cliente;
                $solicitud->sede_id = $request->id_sede;
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
        if ($request->id_sede === 0) {
            # code...
            $solicitud = DB::table('solicitudes')
                                    ->select('solicitudes.id', 'solicitudes.frecuencia', 'solicitudes.observaciones', 'sedes.direccion', 'sedes.barrio', 'sedes.nombre_contacto', 'sedes.telefono_contacto')
                                    ->join('sedes', 'solicitudes.sede_id', 'sedes.id')
                                    ->where('solicitudes.cliente_id', $request->id_cliente)
                                    ->where('solicitudes.sede_id', $request->id_sede)
                                    ->get();
        } else {
            # code...
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
