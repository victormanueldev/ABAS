<?php

namespace ABAS\Http\Controllers;

use Illuminate\Http\Request;
use ABAS\Certificado;
use ABAS\Inspeccion;
use ABAS\Solicitud;

class CertificadoController extends Controller
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
        $certi = Certificado::all();
        return $certi;
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
                $solicitudId = Solicitud::select('id')->where('cliente_id', $request->cliente_id)->where('sede_id', $request->sede_id)->get();
                if(empty($solicitudId[0])){
                    return response()->json(['Solicitud a programacion invalida' => $solicitudId], 400); 
                }else{
                    $certificado = new Certificado();
                    $certificado->area_tratada = $request->area_tratada;
                    $certificado->frecuencia = $request->frecuencia;
                    $certificado->tratamientos = $request->tratamientos;
                    $certificado->productos = $request->productos;
                    $certificado->solicitud_id = $solicitudId[0]->id;
                    $certificado->save();
                    return response()->json(['success' => 'Certificado creado correctamente']);
                }
            }catch(\Exception $e){
                return response()->json($e, 500);
            }
        }else{
            return response()->json(['error' => 'Se eseperaba una peticion ajax.']);
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
        $certificado = Certificado::findOrFail($id);
        $certificado->delete();
        return response()->json("Delete success", 200);
    }
}
