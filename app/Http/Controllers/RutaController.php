<?php

namespace ABAS\Http\Controllers;

use ABAS\Ruta;
use Illuminate\Http\Request;

class RutaController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        //}
        $rutas = Ruta::all();
        return $rutas;
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
                $ruta = new Ruta();
                switch ($request->tipo) {
                    case 'rs':
                        $ruta->tipo = 'RUTA DE SANEAMIENTO';
                        $ruta->contenido = $request->contenido;
                        $ruta->cliente_id = $request->cliente_id;
                        $ruta->sede_id = $request->sede_id;
                        $ruta->save();
                        break;
                    case 'rl':
                        $ruta->tipo = 'RUTA DE LAMPARAS';
                        $ruta->contenido = $request->contenido;
                        $ruta->cliente_id = $request->cliente_id;
                        $ruta->sede_id = $request->sede_id;
                        $ruta->save();
                        break;
                    case 'rr':
                        //Insert de la ruta externa
                        Ruta::create([
                            'tipo' => 'RUTA DE ROEDORES EXTERNA',
                            'contenido' => $request->contenido["rutaExterna"],
                            'cliente_id' => $request->cliente_id,
                            'sede_id' => $request->sede_id
                        ]);
                        //Insert de la ruta interno
                        Ruta::create([
                            'tipo' => 'RUTA DE ROEDORES INTERNA',
                            'contenido' => $request->contenido["rutaInterna"],
                            'cliente_id' => $request->cliente_id,
                            'sede_id' => $request->sede_id
                        ]);
                        break;
                    
                    default:
                        # code...
                        break;
                }
                return response()->json('Ruta creada exitosamente');
            }catch(\Exception $e){
                return response()->json($e, 500);
            }
        }else{
            return response()->json('Se esperaba una peticion AJAX', 401);
        }
    }

    /**
     * Display the specified resource.
     *
     * @param  \ABAS\Ruta  $ruta
     * @return \Illuminate\Http\Response
     */
    public function show(Ruta $ruta)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  \ABAS\Ruta  $ruta
     * @return \Illuminate\Http\Response
     */
    public function edit(Ruta $ruta)
    {
        //
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  \ABAS\Ruta  $ruta
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, Ruta $ruta)
    {
        //
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  \ABAS\Ruta  $ruta
     * @return \Illuminate\Http\Response
     */
    public function destroy(Ruta $ruta)
    {
        //
    }
}
