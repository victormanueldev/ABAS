<?php

namespace ABAS\Http\Controllers;

use ABAS\Cotizacion;
use Illuminate\Http\Request;
use Auth;
use ABAS\Cliente;
use Carbon\Carbon;

class CotizacionController extends Controller
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
                $user = Auth::user();
                $cotizacion = new Cotizacion();
                //$codigo = "CT-".$user->iniciales."-".$request->idCliente;
                $cotizacion->codigo = strtoupper($request->codigo);
                $cotizacion->estado = $request->estado;
                $cotizacion->valor = $request->valor;
                $cotizacion->cliente_id = $request->idCliente;
                $cotizacion->save();
                return response()->json('Creation Successfully', 201);
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
     * @param  \ABAS\Cotizacion  $cotizacion
     * @return \Illuminate\Http\Response
     */
    public function show($all)
    {
        //
        $dt = Carbon::now();
        $cotizaciones = Cotizacion::with(['cliente' => function($query){
            $query->select('id','tipo_cliente','nit_cedula','nombre_contacto_inicial','celular_contacto_inicial','nombre_cliente','estado_negociacion');
        }])
        ->where('estado', 'final')
        ->where('estado_aprobacion', 'aprobada')
        ->whereMonth('updated_at', $dt->month)
        ->whereYear('updated_at', $dt->year)
        ->get();

        return $cotizaciones;

    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  \ABAS\Cotizacion  $cotizacion
     * @return \Illuminate\Http\Response
     */
    public function edit(Cotizacion $cotizacion)
    {
        //
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  \ABAS\Cotizacion  $cotizacion
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, $id)
    {
        //
        if($request->ajax()){
            //Cotizacion aprobada
            $cotizacion = Cotizacion::findOrFail($id);
            if($cotizacion->estado == 'Inicial'){
                $cotizacion->estado = 'Final';
            }
            $cotizacion->estado_aprobacion = $request->estado;
            $cotizacion->save();
            //Estado actualizado a cliente nuevo
            $cliente = Cliente::findOrFail($request->cliente);
            $cliente->estado_registro = 'cliente_nuevo';
            $cliente->estado_negociacion = 'Cliente';
            $cliente->save();

            return response()->json('Update Success', 200);
        }else{
            return response()->json(401);
        }
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  \ABAS\Cotizacion  $cotizacion
     * @return \Illuminate\Http\Response
     */
    public function destroy($id)
    {
        //
        $cotizacion = Cotizacion::findOrFail($id);
        $cotizacion->delete();
        return response()->json($id, 200);
    }
}
