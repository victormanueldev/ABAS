<?php

namespace ABAS\Http\Controllers;

use ABAS\Ruta;
use Illuminate\Http\Request;
use ABAS\Solicitud;
use DB;

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
                $solicitudId = Solicitud::select('id')->where('cliente_id', $request->cliente_id)->where('sede_id', $request->sede_id)->get();
                if(empty($solicitudId[0])){
                    return response()->json('Solicitud a programacion invalida', 400); 
                }else{
                    switch ($request->tipo) {
                        case 'rs':
                            $ruta->tipo = 'RUTA DE SANEAMIENTO';
                            $ruta->contenido = $request->contenido;
                            $ruta->codigo = "RS0".$solicitudId[0]->id;
                            $ruta->solicitud_id = $solicitudId[0]->id;
                            $ruta->save();
                            break;
                        case 'rl':
                            $ruta->tipo = 'RUTA DE LAMPARAS';
                            $ruta->contenido = $request->contenido;
                            $ruta->codigo = "RL0".$solicitudId[0]->id;
                            $ruta->solicitud_id = $solicitudId[0]->id;
                            $ruta->save();
                            break;
                        case 'rr':
                            //Insert de la ruta externa
                            Ruta::create([
                                'tipo' => 'RUTA DE ROEDORES EXTERNA',
                                'codigo' => 'RRE0'.$solicitudId[0]->id,
                                'contenido' => $request->contenido["rutaExterna"],
                                'solicitud_id' => $solicitudId[0]->id
                            ]);
                            //Insert de la ruta interno
                            Ruta::create([
                                'tipo' => 'RUTA DE ROEDORES INTERNA',
                                'codigo' => 'RRI0'.$solicitudId[0]->id,
                                'contenido' => $request->contenido["rutaInterna"],
                                'solicitud_id' => $solicitudId[0]->id
                            ]);
                            break;
                        
                        default:
                            # code...
                            break;
                    }
                    return response()->json('Ruta creada exitosamente');
                }
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
    public function show(Request $request)
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
    public function destroy($id)
    {
        //
        $ruta = Ruta::findOrFail($id);
        $ruta->delete();
        return response()->json("Delete success", 200);
    }

    public function getRoute(Request $request)
    {   
        $idCliente = $request->idCliente;
        $idSede = $request->idSede;
        return  Ruta::select('id','solicitud_id','tipo')
                    ->with(['solicitud' => function($query) {
                        $query->select('id','cliente_id', 'sede_id');
                    }])
                    ->where('tipo', $request->tipo)
                    ->whereHas('solicitud', function($query) use($idCliente, $idSede){
                        $query->where('cliente_id', $idCliente);                
                        $query->where('sede_id', $idSede);
                    })
                    ->firstOrFail();
    }

    public function saveRouteProduct(Request $request)
    {
        if($request->ajax()){
            foreach ($request->reporteProductos as $producto) {
                DB::table('producto_ruta')->insert([
                    'ruta_id' => $request->idRuta,
                    'producto_id' => $producto['idProducto'],
                    'cantidad_aplicada' => $producto['cantidadUtilizada']
                ]);
            }
            return response()->json('Creation Success', 200);
        }
    }
}
