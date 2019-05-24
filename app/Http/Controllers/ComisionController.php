<?php

namespace ABAS\Http\Controllers;

use ABAS\Comision;
use Illuminate\Http\Request;
use ABAS\User;
use Carbon\Carbon;

class ComisionController extends Controller
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
        $comisiones = Comision::with(['user' => function($query){
            $query->select('id','nombres','apellidos');
        }])->get();
        return $comisiones;
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        //
        return view('contabilidad.comisiones');
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
            $dtIni = Carbon::parse($request->fechaInicio);
            $diasMes = $dtIni->daysInMonth;
            $dtFin = Carbon::parse($request->fechaInicio)->addDays($diasMes -1);

            $comision = new Comision();
            $comision->codigo = $request->codigoComision;
            $comision->fecha_inicio_comision = $dtIni->toDateString();
            $comision->fecha_fin_comision = $dtFin->toDateString();
            $comision->valor_pagado = $request->totalComision;
            $comision->valor_pendiente = $request->totalPendiente;
            $comision->user_id = $request->idInspector;
            $comision->save();

            return response()->json($request->codigoComision, 201);
        }
    }

    /**
     * Display the specified resource.
     *
     * @param  \ABAS\Comision  $comision
     * @return \Illuminate\Http\Response
     */
    public function show($fechaInicio)
    {
        //Ver comisiones
        $dtIni = Carbon::parse($fechaInicio);
        $diasMes = $dtIni->daysInMonth;
        $dtFin = Carbon::parse($fechaInicio)->addDays($diasMes -1);
        
        //Filtro de Clientes por usuario con facturas en el rango de fechas
        $facturas = User::with(['clientes.facturas' => function($query) use($dtIni, $dtFin){
                $query->where('fecha_inicio_vigencia', '>=', $dtIni->toDateString());
                $query->where('fecha_fin_vigencia', '<=', $dtFin->toDateString());
                $query->orWhereBetween('fecha_pago', [$dtIni->toDateString(), $dtFin->toDateString()]);
            }, 'cargo' => function($query){
                $query->select('id','descripcion');
            }, 'clientes' => function($query){
                $query->select('id', 'nombre_cliente','user_id', 'estado_registro');
            }])
            ->select('id','nombres','apellidos','foto','cargo_id')
            ->where('area_id', '1')
            ->get();

        return $facturas;

    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  \ABAS\Comision  $comision
     * @return \Illuminate\Http\Response
     */
    public function edit(Comision $comision)
    {
        //
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  \ABAS\Comision  $comision
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, Comision $comision)
    {
        //
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  \ABAS\Comision  $comision
     * @return \Illuminate\Http\Response
     */
    public function destroy(Comision $comision)
    {
        //
    }

    public function showByCode(Request $request)
    {
        if($request->ajax()){
            $arrCodes = $request->codigos;
            $codigos = [];
            foreach ($arrCodes as $code) {
                $codigoEncontrado = Comision::select('codigo')->where('codigo', $code["codigoComision"])->exists();
                if($codigoEncontrado){
                    array_push($codigos, $code["codigoComision"]);
                }
            }

            return $codigos;
        }
    }

    public function allComisions()
    {
        return view('contabilidad.resumen-comisiones');
    }
}
