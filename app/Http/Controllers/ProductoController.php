<?php

namespace ABAS\Http\Controllers;

use ABAS\Producto;
use Illuminate\Http\Request;
use Carbon\Carbon;
use DB;

class ProductoController extends Controller
{
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
    public function update(Request $request, Producto $producto)
    {
        //
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
    }
}
