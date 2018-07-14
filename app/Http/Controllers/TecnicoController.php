<?php

namespace ABAS\Http\Controllers;

use ABAS\Tecnico;
use ABAS\Servicio;
use Illuminate\Http\Request;
use DB;
use Carbon\Carbon;

class TecnicoController extends Controller
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
    }

    /**
     * Display the specified resource.
     *
     * @param  \ABAS\Tecnico  $tecnico
     * @return \Illuminate\Http\Response
     */
    public function show($id)
    {
        $now = Carbon::now();
        $three_months_ago = $now->subMonths(3); //Restar 3 MEses a la fecha actual
        $tecnicos = Servicio::select('tecnicos.nombre', DB::raw('count(servicios.id) as servicios'))
                                ->join('tecnicos', 'servicios.tecnico_id', '=', 'tecnicos.id')
                                ->where('servicios.solicitud_id', $id)
                                ->where('servicios.fecha_inicio', '>=', $three_months_ago->toDateString())
                                ->groupBy('tecnicos.nombre')
                                ->limit(3)
                                ->get();
        return $tecnicos;
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  \ABAS\Tecnico  $tecnico
     * @return \Illuminate\Http\Response
     */
    public function edit(Tecnico $tecnico)
    {
        //
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  \ABAS\Tecnico  $tecnico
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, Tecnico $tecnico)
    {
        //
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  \ABAS\Tecnico  $tecnico
     * @return \Illuminate\Http\Response
     */
    public function destroy(Tecnico $tecnico)
    {
        //
    }

    public function getColor($id)
    {
        $color = Tecnico::select('color')->where('id', $id)->get();
        return $color;
    }
}
