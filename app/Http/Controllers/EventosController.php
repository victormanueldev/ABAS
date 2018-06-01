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
            //Agrega todos los elementos a la coleccion
            $data->push([
                'id' => $evento->id, 
                'title' => $evento->asunto, 
                'start' => $evento->fecha_inicio, 
                'backgroundColor' => $evento->color, 
                'borderColor' => $evento->color
                ]);
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
        try{
            if($request->ajax()){
                $evento = new Evento();
                $evento->asunto = $request->title;
                $evento->fecha_inicio = $request->start." ".$request->hora;
                $evento->dia_completo = $request->allDay;
                $evento->tipo = $request->tipo;
                if ($request->tipo == 'Llamada') {
                    $evento->color = "rgb(219, 165, 37)";
                }elseif($request->tipo == 'Seguimiento'){
                    $evento->color = "rgb(69, 130, 29)";
                }
                $evento->user_id = Auth::user()->id;
                $evento->save();
                return response()->json(['Evento Guardado'], 200);
            }else{
                return response()->json(['error' => 'Datos no validos'], 400);
            }
        }catch(\Exception $e){
            return response()->json(['error' => 'Error al intentar guardar evento'], 500);
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
    public function edit()
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
    public function update(Request $request)
    {
        //
        $evento  = Evento::find($request->id_evento);
        if ($request->allday == 'false') {
            $evento->dia_completo = 0;
        }else{
            $evento->dia_completo = 1;
        }
        if ($request->end == 'NULL') {
            $evento->fecha_fin = NULL;
        }else{
            $evento->fecha_fin = $request->end;
        }

        $evento->fecha_inicio = $request->start;
    
        $evento->save();
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
