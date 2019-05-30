<?php

namespace ABAS\Http\Controllers;

use ABAS\Documento;
use ABAS\Sede;
use ABAS\Solicitud;
use ABAS\Cliente;
use Illuminate\Http\Request;

class DocumentoController extends Controller
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
        return view('calidad.inventario-documentos');
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        //
        return view('calidad.registro-documentos');
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
     * @param  \ABAS\Documento  $documento
     * @return \Illuminate\Http\Response
     */
    public function show(Documento $documento)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  \ABAS\Documento  $documento
     * @return \Illuminate\Http\Response
     */
    public function edit(Documento $documento)
    {
        //
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  \ABAS\Documento  $documento
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, Documento $documento)
    {
        //
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  \ABAS\Documento  $documento
     * @return \Illuminate\Http\Response
     */
    public function destroy(Documento $documento)
    {
        //
    }

    public function showByClient($idCliente)
    {
        $data = collect();
        $inspections = Solicitud::where('cliente_id', $idCliente)->select('id','cliente_id','gestion_calidad','sede_id')->get();
        $sedes = Sede::with(['documentos' => function($query){
           $query->select('id','codigo','fecha_fin_vigencia','sede_id','tipo','cliente_id');
           $query->orderBy('fecha_fin_vigencia', 'desc');
        }])
                    ->select('id','nombre','cliente_id')
                    ->where('cliente_id', $idCliente)
                    ->get();

        if($sedes->count() == 0){
            $sedes = Cliente::with(['documentos' => function($query){
                $query->select('id','codigo','fecha_fin_vigencia','sede_id','tipo','cliente_id');
                $query->orderBy('fecha_fin_vigencia', 'desc');
             }])
             ->select('id','nombre_cliente as nombre','nit_cedula')
             ->where('id', $idCliente)
             ->get();
        }

        $data->push([
            'sedes' => $sedes,
            'inspecciones' => $inspections
        ]);
        return $data;
    }
}
