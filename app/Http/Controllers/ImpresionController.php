<?php

namespace ABAS\Http\Controllers;

use Illuminate\Http\Request;
use ABAS\Servicio;
use DB;

class ImpresionController extends Controller
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
    
    //
    public function imprimirTodo($id, $fechaInicio, $fechaFin)
    {
        if($id == 'all'){
            $ordenesServicios = Servicio::with('solicitud.sede','solicitud.cliente', 'tecnicos', 'tipos')
                                        ->where('fecha_inicio', '>=', $fechaInicio)
                                        ->where('fecha_fin', '<=', $fechaFin)
                                        ->whereHas('tecnicos')
                                        ->get();
            $rutasSaneamiento = Servicio::with('solicitud.rutas')//
                                        ->select(DB::raw('count(servicios.id)'), 'solicitud_id')
                                        ->where('fecha_inicio', '>=', $fechaInicio)
                                        ->where('fecha_fin', '<=', $fechaFin)
                                        ->groupBy('solicitud_id')
                                        ->get();
        }

        $data = collect([
            'ods' => $ordenesServicios, 
            'rs' => $rutasSaneamiento
            // 'rl' => $rutasLamparas,
            // 'rre' => $rutasRoedoresExternas,
            // 'rri' => $rutasRoedoresInternas
        ]);
        return $data;
    }

    public function imprimirServiciosPorId($id)
    {
        # code...
    }

    public function imprimirOrdenes($id, $fechaInicio, $fechaFin)
    {
        if(!empty($id)){
            $ordenesServicios = Servicio::with('solicitud', 'tecnicos', 'tipos')->where('id', $id)->get();
        }else{
            $ordenesServicios = Servicio::with('solicitud', 'tecnicos', 'tipos')
                                        ->where('fecha_inicio', '>=', $fechaInicio)
                                        ->where('fecha_fin', '<=', $fechaFin)
                                        ->get();
        }
        //Retorna la vista
        return $ordenesServicios;
    }

    public function imprimirRutasSaneamiento($id, $fechaInicio, $fechaFin)
    {
        $data = collect();

        if(!empty($id)){
            $rutas = Servicio::with('solicitud')//
                                ->select(DB::raw('count(servicios.id)'), 'solicitud_id')
                                ->where('fecha_inicio', '>=', $fechaInicio)
                                ->where('fecha_fin', '<=', $fechaFin)
                                ->groupBy('solicitud_id')
                                ->get();
            foreach ($rutasSaneamiento->solicitud->rutas as $rs) {
                if($rs->tipo == 'RUTA DE SANEAMIENTO'){
                    $data->push($rutasSaneamiento[0]->solicitud->rutas);
                }
            }
        }else{

        }
    }
}
