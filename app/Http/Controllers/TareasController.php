<?php

namespace ABAS\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;
use ABAS\Tarea;

class TareasController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $tareas = Tarea::all();//Consulta todas las tareas de la BD
        $data = collect();//Crea una coleccion
        foreach ($tareas as $tarea) {
            $data->push(['id' => $tarea->id, 'title' => $tarea->asunto, 'start' => $tarea->fecha_inicio, 'backgroundColor' => $tarea->color, 'borderColor' => $tarea->color]);//Agrega todos los elementos a la coleccion
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


        $tarea = new Tarea();
        $tarea->asunto = $title;
        $tarea->fecha_inicio = $start;
        $tarea->dia_completo = $allday;
        $tarea->color = $backcolor;
        if ($backcolor == 'rgb(219, 165, 37)') {
            $tarea->tipo = 'Llamada';
        }elseif ($backcolor == 'rgb(69, 130, 29)') {
            $tarea->tipo = 'Seguimiento';
        }else {
            $tarea->tipo = 'Visita';
        }

        $tarea->save();

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
        //Editar Tareas
        $id_tarea = $_POST['id'];
        $start = $_POST['start'];
        $end = $_POST['end'];
        $allday = $_POST['allday'];

        $tarea  = Tarea::find($id_tarea);
        if ($allday == 'false') {
            $tarea->dia_completo = 0;
        }else{
            $tarea->dia_completo = 1;
        }
        if ($end == 'NULL') {
            $tarea->fecha_fin = NULL;
        }else{
            $tarea->fecha_fin = $end;
        }

        $tarea->fecha_inicio = $start;
    

        $tarea->save();
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
        $id_tarea = $_POST['id'];
        Tarea::destroy($id_tarea);
    }
}
