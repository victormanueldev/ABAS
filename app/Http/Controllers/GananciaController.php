<?php

namespace ABAS\Http\Controllers;

use Illuminate\Http\Request;
use ABAS\Compra;
use ABAS\Factura;
use ABAS\Producto;
use ABAS\Tecnico;
use Carbon\Carbon;
use ABAS\ValorGeneral;

class GananciaController extends Controller
{
    //
    public function earingsView(Request $request)
    {
        return view('administracion.ganancias-gastos');
        
    }

    public function earingsAndSpend($dateIni, $dateFin)
    {
        # Todas las compras 
        $compras = Compra       ::select('costo_total', 'created_at')
                                ->whereBetween('created_at', [$dateIni, $dateFin])
                                ->get();
        
        # Todas las facturas
        $facturas = Factura     ::select('valor', 'fecha_pago')
                                ->where('estado', 'Pagado')
                                ->whereBetween('fecha_pago', [$dateIni, $dateFin])
                                ->get();

        # Gasto de productos
        $productos = Producto   ::select('id','valor_unidad')
                                ->with([
                                    'ordenes' => function($query) use($dateIni, $dateFin){
                                        // $query->select('ordenes.id','pivot');
                                        $query->whereBetween('orden_servicio_producto.created_at', [$dateIni, $dateFin]);
                                    },
                                    'rutas' => function($query) use($dateIni, $dateFin){
                                        // $query->select('rutas.id','pivot');
                                        $query->whereBetween('producto_ruta.created_at', [$dateIni, $dateFin]);
                                    }
                                ])
                                ->whereHas('ordenes')
                                ->whereHas('rutas')
                                ->get();
        
        # Gasto de horas hombre
        $tecnicos = Tecnico     ::select('id')
                                ->with([
                                    'ordenes' => function($query) use($dateIni, $dateFin){
                                        $query->whereBetween('orden_servicio_tecnico.created_at', [$dateIni, $dateFin]);
                                    },
                                    'rutas' => function($query) use($dateIni, $dateFin){
                                        $query->whereBetween('ruta_tecnico.created_at', [$dateIni, $dateFin]);
                                    }
                                ])
                                ->whereHas('ordenes')
                                ->whereHas('rutas')
                                ->get();

        # Obtener el valor de minutos hombre
        $valorHoraHombre = ValorGeneral::findOrFail('4');

        # Declaracion de variables
        $arrProductos = [];
        $arrTecnicos = [];
        $i = 0;
        $j = 0;

        # Calclo de gastos por producto
        foreach ($productos as $producto) {

            foreach ($producto->ordenes as $orden) {
                # Gasto por orden de servicios
                $arrProductos[$i] = [
                    'totalInvertido' => $orden->pivot->cantidad_aplicada * $producto->valor_unidad, 
                    'fecha' => $orden->pivot->created_at->toDateString()
                ];
                $i++;
            }

            foreach ($producto->rutas as $ruta) {
                # Gasto por rutas
                $arrProductos[$i] = [
                    'totalInvertido' => $ruta->pivot->cantidad_aplicada * $producto->valor_unidad, 
                    'fecha' => $ruta->pivot->created_at->toDateString()
                ];
                $i++;
            }
        }

        # Calculo de gastos por tecnico
        foreach ($tecnicos as $tecnico) {
           
            foreach ($tecnico->ordenes as $orden) {
                # Gasto por orden de servicios
                $duracionOrden = Carbon::parse($orden->pivot->hora_salida)->diffInMinutes($orden->pivot->hora_entrada);
                $arrTecnicos[$j] = [
                    'totalInvertido' => $duracionOrden * $valorHoraHombre->valor,
                    'fecha' => $orden->pivot->created_at->toDateString()
                ];
                $j++;
            }

            foreach ($tecnico->rutas as $ruta) {
                # Gasto por rutas
                $duracionRuta = Carbon::parse($ruta->pivot->hora_salida)->diffInMinutes($ruta->pivot->hora_entrada);
                $arrTecnicos[$j] = [
                    'totalInvertido' => $duracionRuta * $valorHoraHombre->valor,
                    'fecha' => $ruta->pivot->created_at->toDateString()
                ];
                $j++;
            }
        }

        $data = collect([
            'compras' => $compras,
            'facturas' => $facturas,
            'productos' => $arrProductos,
            'tecnicos' => $arrTecnicos,
        ]);


        return $data;
    }
}
