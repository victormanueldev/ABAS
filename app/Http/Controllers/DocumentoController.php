<?php

namespace ABAS\Http\Controllers;

use ABAS\Documento;
use ABAS\Sede;
use ABAS\Solicitud;
use ABAS\Cliente;
use Illuminate\Http\Request;
use Carbon\Carbon;
use DB;

class DocumentoController extends Controller
{
    
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
        if($request->ajax()){
            $now = Carbon::now();
            // Obtiene las sedes del cliente
            $sedes = Sede::select('id')->where('cliente_id', $request->documentos[0]["clienteId"])->get();
            foreach ($request->documentos as $documento) {
                DB::table('documentos')->insert([
                    'codigo' => $documento["codigo"],
                    'nombre' => strtoupper($documento["nombre"]),
                    'tipo' => $documento["tipo"],
                    'fecha_inicio_vigencia' => $documento["fechaInicio"],
                    'fecha_fin_vigencia' => $documento["fechaFin"],
                    'url' => $documento["url"],
                    'cliente_id' => $documento["clienteId"],
                    'sede_id' => $sedes->count() == 0 ? '0' : $documento["sedeId"],
                    'created_at' => $now,
                    'updated_at' => $now
                ]);
            }
    
            return response()->json($sedes, 201);
        }

    }

    /**
     * Display the specified resource.
     *
     * @param  \ABAS\Documento  $documento
     * @return \Illuminate\Http\Response
     */
    public function show($idCliente, $idSede)
    {
        //
        return view('calidad.crear-documentos');
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
           $query->select('id','codigo','fecha_fin_vigencia','sede_id','tipo','cliente_id', 'updated_at', 'nombre', 'url');
           $query->orderBy('fecha_fin_vigencia', 'desc');
        }])
                    ->select('id','nombre','cliente_id')
                    ->where('cliente_id', $idCliente)
                    ->get();

        if($sedes->count() == 0){
            $sedes = Cliente::with(['documentos' => function($query){
                $query->select('id','codigo','fecha_fin_vigencia','sede_id','tipo','cliente_id', 'updated_at', 'nombre', 'url');
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
