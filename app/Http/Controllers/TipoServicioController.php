<?php

namespace ABAS\Http\Controllers;

use ABAS\TipoServicio;
use Illuminate\Http\Request;
use DB;

class TipoServicioController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        //
        $tipos = TipoServicio::all();
        return $tipos;
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
    }

    /**
     * Display the specified resource.
     *
     * @param  \ABAS\TipoServicio  $tipoServicio
     * @return \Illuminate\Http\Response
     */
    public function show(TipoServicio $tipoServicio)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  \ABAS\TipoServicio  $tipoServicio
     * @return \Illuminate\Http\Response
     */
    public function edit(TipoServicio $tipoServicio)
    {
        //
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  \ABAS\TipoServicio  $tipoServicio
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, TipoServicio $tipoServicio)
    {
        //
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  \ABAS\TipoServicio  $tipoServicio
     * @return \Illuminate\Http\Response
     */
    public function destroy(TipoServicio $tipoServicio)
    {
        //
    }

    public function assignBill(Request $request)
    {
        if($request->ajax()){
            try{
                $tipo_servicio = DB::table('servicio_tipo_servicio')
                                    ->where('id_servicio_tipo', $request->idTypeService)
                                    ->update([
                                        'numero_factura' => $request->bill,
                                        'valor' => $request->value
                                    ]);
                return response()->json('Update Success', 200);
            }catch(\Exception $e){
                return response()->json($e, 500);
            }
        }else{
            return response()->json(['error: ' => 'Error en la petición'], 500);
        }
    }
}
