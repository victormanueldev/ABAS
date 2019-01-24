<?php

namespace ABAS\Http\Controllers;

use Illuminate\Http\Request;
use ABAS\Evento;
use Auth;
use Carbon\Carbon;
use ABAS\Cliente;
use ABAS\Sede;

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
            $cliente = "";
            $sede = "";
            if(isset($evento->cliente_id)){
                $cliente = Cliente::select('id', 'nombre_cliente')->where('id', $evento->cliente_id)->get();
                if(isset($evento->sede_id)){
                    $sede = Sede::select('id', 'nombre')->where('id', $evento->sede_id)->get();
                }
            }
            //Agrega todos los elementos a la coleccion
            $data->push([
                'id' => $evento->id, 
                'title' => $evento->tipo, 
                'start' => $evento->fecha_inicio,
                'end' =>$evento->fecha_fin, 
                'backgroundColor' => $evento->color, 
                'borderColor' => $evento->color,
                'cliente' => $cliente != "" ? $cliente[0]->nombre_cliente : "No definido",
                'sede' => $sede != "" ? $sede[0]->nombre : "No definido"
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
                $fecha_fin = Carbon::parse($request->start." ".$request->hora)->addHour();
                $evento->fecha_inicio = $request->start." ".$request->hora;
                $evento->fecha_fin = $fecha_fin->toDateTimeString();
                $evento->dia_completo = $request->allDay;
                $evento->tipo = $request->tipo;
                $evento->cliente_id = $request->idCliente;
                $evento->sede_id = $request->idSede;

                switch ($request->tipo) {
                    case 'Llamada':
                        $evento->color = "rgb(219, 165, 37)";
                        break;

                    case 'Visita':
                        $evento->color = 'rgb(69, 130, 29)';
                        break;

                    case 'Actualizacion':
                        $evento->color = 'rgb(35,198,200)';
                        break;
                    
                    case 'Capacitacion':
                        $evento->color = 'rgb(255,130,0)';
                        break;

                    case 'Diagnostico':
                        $evento->color = 'rgb(2,112,192)';
                        break;

                    default:
                        $evento->color = 'rgb(143, 143, 143)';
                        break;
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
