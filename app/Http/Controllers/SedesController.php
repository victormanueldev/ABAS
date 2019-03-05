<?php

namespace ABAS\Http\Controllers;

use ABAS\Sede;
use Illuminate\Http\Request;
use Auth;

class SedesController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index($id)
    {
        $sedes = Sede::where('cliente_id',  $id)->get();
        return $sedes;
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
        // $sedes = new Sede();

        if ($request -> ajax()) {

            try {

                $user = Auth::user();
                $sedes = new Sede();
                
                $sedes->nombre = strtoupper($request->get('nombre_sedes'));
                $sedes->direccion =strtoupper( $request->get('direccion_sedes'));
                $sedes->ciudad = strtoupper($request->get('ciudad_sedes'));
                $sedes->barrio = strtoupper($request->get('barrio_sedes'));
                $sedes->zona_ruta = strtoupper($request->get('ruta_sedes'));
                $sedes->nombre_contacto = strtoupper($request->get('nombre_contacto'));
                $sedes->telefono_contacto = $request->get('telefono_sedes');
                $sedes->celular_contacto = $request->get('celular_sedes');
                $sedes->email_contacto = strtoupper($request->get('email_sedes'));
                $sedes->cliente_id = $request->get('cliente_id') ;
                $sedes->save();
                return response()->json('Creation Successfully', 201);
                
            } catch (\Exception $e) {
                return response()->json($e, 500);
            }
        }else{
            return response()->json('Error en la peticion AJAX', 401);
        } 
    }

    /**
     * Display the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function show($id)
    {
        //
        $sede = Sede::with('solicitud')->where('id', $id)->get();
        return $sede;
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
        if ($request -> ajax()) {

            try {

                $user = Auth::user();
                $sedes = Sede::findOrFail($id);
                
                $sedes->nombre = strtoupper($request->get('nombre_sedes'));
                $sedes->direccion = strtoupper($request->get('direccion_sedes'));
                $sedes->ciudad = strtoupper($request->get('ciudad_sedes'));
                $sedes->barrio = strtoupper($request->get('barrio_sedes'));
                $sedes->zona_ruta = strtoupper($request->get('ruta_sedes'));
                $sedes->nombre_contacto = strtoupper($request->get('nombre_contacto'));
                $sedes->telefono_contacto = $request->get('telefono_sedes');
                $sedes->celular_contacto = $request->get('celular_sedes');
                $sedes->email = strtoupper($request->get('email_sedes'));
                $sedes -> save();
                return response()->json('Creation Successfully', 201);
                
            } catch (\Exception $e) {
                return response()->json($e, 500);
            }
        }else{
            return response()->json('Error en la peticion AJAX', 401);
        } 
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
