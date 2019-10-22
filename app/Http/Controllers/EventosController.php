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
        $eventos = Auth::user()->eventos;//Consulta todas las eventos de la BD
        $data = collect();//Crea una coleccion
        foreach ($eventos as $evento) {
            $cliente = collect();
            $sede = collect();
            if(isset($evento->cliente_id)){
                $cliente = Cliente::select('id', 'nombre_cliente')->where('id', $evento->cliente_id)->get();
                if(isset($evento->sede_id) && $evento->sede_id != 0){
                    $sede = Sede::select('id', 'nombre')->where('id', $evento->sede_id)->get();
                }
            }
            //Agrega todos los elementos a la coleccion
            $data->push([
                'id' => $evento->id, 
                'title' => $cliente->count() > 0 ? $cliente[0]->nombre_cliente : $evento->tipo,
                'tipo' => $evento->tipo, 
                'start' => $evento->fecha_inicio,
                'end' =>$evento->fecha_fin, 
                'backgroundColor' => $evento->color, 
                'borderColor' => $evento->color,
                'cliente' => $cliente->count() > 0 ? $cliente[0]->nombre_cliente : "No definido",
                'sede' => $sede->count() > 0 ? $sede[0]->nombre : "No definido",
                'telefono' => $evento->telefono_evento != "" ? $evento->telefono_evento : 'No definido',
                'direccion' => $evento->direccion_evento != "" ? $evento->direccion_evento : 'No definido',
                'asunto' => $evento->asunto != "" ? $evento->asunto : "Sin Observaciones"
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
                $evento->asunto = strtoupper($request->title);
                $fecha_fin = Carbon::parse($request->start." ".$request->hora_fin);
                $evento->fecha_inicio = $request->start." ".$request->hora_inicio;
                $evento->fecha_fin = $fecha_fin->toDateTimeString();
                $evento->dia_completo = $request->allDay;
                $evento->tipo = strtolower($request->tipo);
                $evento->cliente_id = $request->idCliente;
                $evento->sede_id = $request->idSede;
                $evento->telefono_evento = strtoupper($request->telefono_evento);
                $evento->direccion_evento = strtoupper($request->direccion_evento);

                switch (strtolower($request->tipo)) {
                    case 'llamada':
                        $evento->color = "rgb(219, 165, 37)";
                        break;

                    case 'visita':
                        $evento->color = 'rgb(69, 130, 29)';
                        break;

                    case 'actualizacion':
                        $evento->color = 'rgb(35,198,200)';
                        break;
                    
                    case 'capacitacion':
                        $evento->color = 'rgb(255,130,0)';
                        break;

                    case 'diagnostico':
                        $evento->color = 'rgb(2,112,192)';
                        break;

                    default:
                        $evento->color = 'rgb(69, 130, 29)';
                        break;
                }
                $evento->user_id = Auth::user()->id;
                if($request->method == 'create'){
                    $evento->save();
                }else{
                    Evento::destroy($request->id_evento);
                    $evento->save();
                }
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
    public function edit($id)
    {
        //
        $evento  = Evento::find($id);
        
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
