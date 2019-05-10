<?php

namespace ABAS\Http\Controllers;

use ABAS\Compra;
use ABAS\Producto;
use Illuminate\Http\Request;

class CompraController extends Controller
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
            $compra = new Compra();
            $compra->numero_factura = $request->numeroFactura;
            $compra->unidad_medida = $request->unidadMedida;
            $compra->total_unidades = $request->cantidadProducto;
            $compra->valor_unidad = $request->valorUnidad;
            $compra->costo_total = $request->costoTotal;
            $compra->producto_id = $request->idProductoSeleccionado;
            $compra->save();

            $producto = Producto::findOrFail($request->idProductoSeleccionado);
            $producto->total_unidades = $producto->total_unidades + $request->cantidadProducto;
            $producto->valor_unidad = $request->valorUnidad;
            $producto->costo_total = $producto->costo_total + $request->costoTotal;
            $producto->save();
            return response()->json("Create Success", 201);
        }
    }

    /**
     * Display the specified resource.
     *
     * @param  \ABAS\Compra  $compra
     * @return \Illuminate\Http\Response
     */
    public function show(Compra $compra)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  \ABAS\Compra  $compra
     * @return \Illuminate\Http\Response
     */
    public function edit(Compra $compra)
    {
        //
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  \ABAS\Compra  $compra
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, Compra $compra)
    {
        //
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  \ABAS\Compra  $compra
     * @return \Illuminate\Http\Response
     */
    public function destroy(Compra $compra)
    {
        //
    }
}
