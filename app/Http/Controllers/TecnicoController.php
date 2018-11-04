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
        $tecnicos = Tecnico::all();
        return view('programacion.calendario-tecnicos', compact('tecnicos'));
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
        $tecnicos = Servicio::select('tecnicos.nombre', DB::raw('count(servicios.id) as servicios'), 'tecnicos.id')
                                ->join('servicio_tecnico', 'servicios.id', '=','servicio_tecnico.servicio_id')
                                ->join('tecnicos', 'servicio_tecnico.tecnico_id', '=', 'tecnicos.id')
                                ->where('servicios.solicitud_id', $id)
                                ->where('servicios.fecha_inicio', '>=', $three_months_ago->toDateString())
                                ->groupBy('tecnicos.nombre', 'tecnicos.id')
                                ->orderBy('servicios', 'desc')
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

    public function getService($id)
    {
        $servicios = Tecnico::with('servicios')->where('id', $id)->get();
        $data = collect();
        foreach ($servicios[0]->servicios as $servicio) {
            # code..
            $data->push([
                'id' => $servicio->id,
                'title' => $servicios[0]->nombre,
                'start' => $servicio->fecha_inicio." ".$servicio->hora_inicio,
                "end" => $servicio->fecha_fin." ".$servicio->hora_fin,
                'backgroundColor' => $servicios[0]->color, 
                'borderColor' => $servicios[0]->color
            ]);
        }
        return $data;
    }

    public function getServicesByDate($id, $dateStart, $dateEnd)
    {
        // $servicios = Tecnico::with('servicios')->where('id', $id)->get();
        $servicios = Servicio::select('servicios.fecha_inicio', 'sedes.nombre', 'sedes.direccion','servicios.hora_inicio', 'servicios.fecha_fin', 'servicios.hora_fin')
                            ->join('servicio_tecnico', 'servicios.id', '=','servicio_tecnico.servicio_id')
                            ->join('tecnicos', 'servicio_tecnico.tecnico_id', '=', 'tecnicos.id')
                            ->join('solicitudes', 'servicios.solicitud_id', '=', 'solicitudes.id')
                            ->join('sedes', 'solicitudes.sede_id', '=', 'sedes.id')
                            ->where('servicios.fecha_inicio', '>=', $dateStart)
                            ->where('servicios.fecha_inicio', '<=', $dateEnd)
                            ->where('tecnicos.id', $id)
                            ->get();
        $data = collect();
        foreach ($servicios as $servicio) {
                $data->push([
                    'nombre' => $servicio->nombre,
                    'direccion' => $servicio->direccion,
                    'start' => $servicio->fecha_inicio." ".$servicio->hora_inicio,
                    "end" => $servicio->fecha_fin." ".$servicio->hora_fin
                ]);
        }
        return $data;
    }

    public function getDatesServices($solicitud, $tecnico)
    {
        $servicios = Servicio::select('servicios.fecha_inicio')
                            ->join('servicio_tecnico', 'servicios.id', '=','servicio_tecnico.servicio_id')
                            ->join('tecnicos', 'servicio_tecnico.tecnico_id', '=', 'tecnicos.id')
                            ->where('servicios.solicitud_id', $solicitud)
                            ->where('tecnicos.id', $tecnico)
                            ->get();
        return $servicios;
    }
}
