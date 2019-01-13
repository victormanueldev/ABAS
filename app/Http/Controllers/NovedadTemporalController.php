<?php

namespace ABAS\Http\Controllers;

use ABAS\NovedadTemporal;
use Illuminate\Http\Request;

class NovedadTemporalController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        //
        $novedades = NovedadTemporal::all();
        return $novedades;
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
                $novedad = new NovedadTemporal();
                $novedad->descripcion = $request->descripcion;
                $novedad->cliente_id = $request->idCliente;
                $novedad->sede_id = $request->idSede;
                $novedad->save();
                return $novedad;
            }catch(\Exception $e){
                return response()->json($e, 500);
            }
        }else{
            return resposne()->json("Error en la peticion HTTP", 401);
        }
    }

    /**
     * Display the specified resource.
     *
     * @param  \ABAS\NovedadTemporal  $novedadTemporal
     * @return \Illuminate\Http\Response
     */
    public function show($idCliente, $idSede)
    {
        //
        $novedades = NovedadTemporal::where('cliente_id', $idCliente)
                                    ->where('sede_id',$idSede)
                                    ->get();
        return response()->json($novedades,200);
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  \ABAS\NovedadTemporal  $novedadTemporal
     * @return \Illuminate\Http\Response
     */
    public function edit(NovedadTemporal $novedadTemporal)
    {
        //
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  \ABAS\NovedadTemporal  $novedadTemporal
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, $id)
    {
        //
        $novedad = NovedadTemporal::findOrFail($id);
        $novedad->completado = $request->completado;
        $novedad->save();
        return $novedad;
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  \ABAS\NovedadTemporal  $novedadTemporal
     * @return \Illuminate\Http\Response
     */
    public function destroy($id)
    {
        //
        $novedad = NovedadTemporal::findOrFail($id);
        $novedad->delete();
        return response()->json("Eliminada con exito", 204);
    }
}
