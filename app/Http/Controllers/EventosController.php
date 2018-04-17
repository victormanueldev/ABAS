<?php

namespace ABAS\Http\Controllers;

use Illuminate\Http\Request;
use ABAS\Evento;
use Auth;

class EventosController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $eventos = Auth::user()->eventos;//Consulta todas las eventos de la BD
        $data = collect();//Crea una coleccion
        foreach ($eventos as $evento) {
            $data->push(['id' => $evento->id, 'title' => $evento->asunto, 'start' => $evento->fecha_inicio, 'backgroundColor' => $evento->color, 'borderColor' => $evento->color]);//Agrega todos los elementos a la coleccion
        }
        $data->toJson();//Convierte la colecciona a formato JSON
        return $data;
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        $title = $_POST['title'];
        $start = $_POST['start'];
        $allday = $_POST['allday'];
        $backcolor = $_POST['background'];


        $evento = new Evento();
        $evento->asunto = $title;
        $evento->fecha_inicio = $start;
        $evento->dia_completo = $allday;
        $evento->color = $backcolor;
        if ($backcolor == 'rgb(219, 165, 37)') {
            $evento->tipo = 'Llamada';
        }elseif ($backcolor == 'rgb(69, 130, 29)') {
            $evento->tipo = 'Seguimiento';
        }else {
            $evento->tipo = 'Visita';
        }
        $evento->user_id = Auth::user()->id;

        $evento->save();
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
    public function edit()
    {
        //Editar eventos
        $id_evento = $_POST['id'];
        $start = $_POST['start'];
        $end = $_POST['end'];
        $allday = $_POST['allday'];

        $evento  = Evento::find($id_evento);
        if ($allday == 'false') {
            $evento->dia_completo = 0;
        }else{
            $evento->dia_completo = 1;
        }
        if ($end == 'NULL') {
            $evento->fecha_fin = NULL;
        }else{
            $evento->fecha_fin = $end;
        }

        $evento->fecha_inicio = $start;
    
        $evento->save();
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
    public function destroy()
    {
        //
        $id_evento = $_POST['id'];
        Evento::destroy($id_evento);
    }
}
