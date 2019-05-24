<?php

namespace ABAS\Http\Controllers;

use ABAS\Producto;
use ABAS\Tecnico;
use Illuminate\Http\Request;
use Carbon\Carbon;
use DB;

class ProductoController extends Controller
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
    public function index(Request $request)
    {
        //
        $productos = Producto::all();
        if($request->ajax()){
            return $productos;
        }
        return $productos;
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        //
        return view('administracion.operacion-productos');
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
        $now = Carbon::now();
        if($request->ajax()){
            foreach ($request->productos as $producto) {
                DB::table('productos')->insert([
                    'nombre_comercial' => strtoupper($producto['nombreComercial']),
                    'tipo' => $producto['tipo'],
                    'presentacion' => $producto['presentacion'],
                    'unidad_medida' => $producto['unindadMedida'],
                    'total_unidades' => $producto['cantidadTotal'],
                    'valor_unidad' => $producto['valorUnidad'],
                    'costo_total' => $producto['costoTotal'],
                    'created_at' => $now,
                    'updated_at' => $now
                ]);
            }
        }
    }

    /**
     * Display the specified resource.
     *
     * @param  \ABAS\Producto  $producto
     * @return \Illuminate\Http\Response
     */
    public function show(Producto $producto)
    {
        //
        $producto = Producto::with([
            'ordenes' => function($query){
            },
            'ordenes.tecnicos' => function($query){
            },
            'rutas' => function($query){
            },
            'rutas.tecnicos' => function($query){
            }])
            ->get();
        return $producto;
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  \ABAS\Producto  $producto
     * @return \Illuminate\Http\Response
     */
    public function edit(Producto $producto)
    {
        //
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  \ABAS\Producto  $producto
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request)
    {
        $producto = Producto::findOrFail($request->id);
        $producto->nombre_comercial = $request->nombreComercial;
        $producto->tipo = $request->tipo;
        $producto->presentacion = $request->presentacion;
        $producto->unidad_medida = $request->unindadMedida;
        $producto->total_unidades = $request->cantidadTotal;
        $producto->valor_unidad = $request->valorUnidad;
        $producto->costo_total = $request->costoTotal;
        $producto->save();

        return response()->json("Update Success", 200);
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  \ABAS\Producto  $producto
     * @return \Illuminate\Http\Response
     */
    public function destroy(Producto $producto)
    {
        //
        $producto = Producto::findOrFail($producto->id);
        $producto->delete();
        return response()->json("Delete success", 200);
    }

    public function productsOut()
    {
        return view('administracion.salida-productos');
    }

    public function productSpent($dateIni, $dateEnd)
    {
        $producto = Producto::with([
            'ordenes' => function($orden) use($dateIni, $dateEnd){
                //Usar el nombre de la tabla
                $orden->whereBetween('orden_servicios.created_at', [$dateIni, $dateEnd]);
            },
            'ordenes.tecnicos' => function($query){
            },
            'rutas' => function($ruta) use($dateIni, $dateEnd){
                //Usar el nombre de la tabla
                $ruta->whereBetween('rutas.created_at', [$dateIni, $dateEnd]);
            },
            'rutas.tecnicos' => function($query){
            }])
            ->get();
        return $producto;
    }

    public function productSpentOne(Request $request, $id, $dateIni, $dateEnd)
    {
        if($request->ajax()){
            $producto = Producto::with([
                'ordenes' => function($orden) use($dateIni, $dateEnd){
                    //Usar el nombre de la tabla
                    $orden->whereBetween('orden_servicios.created_at', [$dateIni, $dateEnd]);
                },
                'ordenes.tecnicos' => function($query){
                },
                'rutas' => function($ruta) use($dateIni, $dateEnd){
                    //Usar el nombre de la tabla
                    $ruta->whereBetween('rutas.created_at', [$dateIni, $dateEnd]);
                },
                'rutas.tecnicos' => function($query){
                }])
                ->where('id', $id)
                ->get();
            return $producto;
        }else{
            $producto = Producto::select('id','nombre_comercial')->where('id', $id)->get();
            return view('administracion.detalle-salida-productos', compact('producto'));
        }

    }

    public function productSpentByTecnician(Request $request,$idTecnico)
    {
        if($request->ajax()){
            if($idTecnico == 'all'){
                $tecnico = Tecnico  ::with('ordenes.productos', 'rutas.productos')
                                    ->get();
                return $tecnico;
            }else{
                $tecnico = Tecnico  ::with('ordenes.productos', 'rutas.productos')
                                    ->where('id', $idTecnico)
                                    ->get();
                return $tecnico;
            }
        }else{
            return view('administracion.gasto-tecnicos');
        }
    }
}
