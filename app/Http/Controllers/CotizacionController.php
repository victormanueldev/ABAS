<?php

namespace ABAS\Http\Controllers;

use ABAS\Cotizacion;
use Illuminate\Http\Request;
use Auth;

class CotizacionController extends Controller
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
                $user = Auth::user();
                $cotizacion = new Cotizacion();
                $codigo = "CT-".$user->iniciales."-".$request->idCliente;
                $cotizacion->codigo = $codigo;
                $cotizacion->estado = $request->estado;
                $cotizacion->valor =$request->valor;
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
    public function show(Cotizacion $cotizacion)
    {
        //
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
    public function update(Request $request, Cotizacion $cotizacion)
    {
        //
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
