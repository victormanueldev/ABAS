<?php

namespace ABAS\Http\Controllers;

use ABAS\TipoServicio;
use Illuminate\Http\Request;
use DB;
use ABAS\Factura;
use Carbon\Carbon;

class TipoServicioController extends Controller
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
        //
        $tipos = TipoServicio::all();
        return $tipos;
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
     * @param  \ABAS\TipoServicio  $tipoServicio
     * @return \Illuminate\Http\Response
     */
    public function show(TipoServicio $tipoServicio)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  \ABAS\TipoServicio  $tipoServicio
     * @return \Illuminate\Http\Response
     */
    public function edit(TipoServicio $tipoServicio)
    {
        //
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  \ABAS\TipoServicio  $tipoServicio
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request)
    {
        //
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  \ABAS\TipoServicio  $tipoServicio
     * @return \Illuminate\Http\Response
     */
    public function destroy(TipoServicio $tipoServicio)
    {
        //
    }

    public function assignBill(Request $request)
    {
        if($request->ajax()){
            // try{
				$now = Carbon::now();
                $tipo_servicio = DB::table('servicio_tipo_servicio')
                                    ->where('id_servicio_tipo', $request->idTypeService)
                                    ->update([
                                        'numero_factura' => $request->bill,
                                        'valor' => $request->value
									]);
				
				$id_cliente = DB::table('servicio_tipo_servicio')
								->join('servicios', 'servicios.id', 'servicio_tipo_servicio.servicio_id')
								->join('solicitudes', 'solicitudes.id', 'servicios.solicitud_id')
								->join('clientes', 'clientes.id', 'solicitudes.cliente_id')
								->where('id_servicio_tipo', $request->idTypeService)
								->select('clientes.id')
								->get();

				$facturaExistente = Factura::where('numero_factura', $request->bill)->get();

				if(isset($facturaExistente->id)){

					$factura = DB::table('facturas')
								->where('numero_factura', $request->bill)
								->update([
									'numero_factura' => $request->bill,
									'valor' => $request->value,
									'estado' => 'Pendiente',
									'tipo' => 'individual',
									'fecha_inicio_vigencia' => $now->toDateString(),
									'fecha_fin_vigencia' => $now->toDateString(),
									'cliente_id' => $id_cliente[0]->id,
									'created_at' => $now,
									'updated_at' => $now,
								]);

				} else {
					
					$factura = DB::table('facturas')
									->insert([
										'numero_factura' => $request->bill,
										'valor' => $request->value,
										'estado' => 'Pendiente',
										'tipo' => 'individual',
										'fecha_inicio_vigencia' => $now->toDateString(),
										'fecha_fin_vigencia' => $now->toDateString(),
										'cliente_id' => $id_cliente[0]->id,
										'created_at' => $now,
										'updated_at' => $now,
									]);
				}

                return response()->json('Update success', 200);
            // }catch(\Exception $e){
            //     return response()->json($e, 500);
            // }
        }else{
            return response()->json(['error: ' => 'Error en la petición'], 500);
        }
    }

    public function registerPayment(Request $request)
    {
        if($request->ajax()){
            $now = Carbon::now();
            try{
                DB::table('facturas')->where('numero_factura', $request->numero_factura)->update(['estado' => 'Pagado', 'fecha_pago' => $now->toDateString()]);
                DB::table('servicio_tipo_servicio')->where('numero_factura',$request->numero_factura)
                                                    ->update(['estado' => 'Pagado', 'updated_at' => $now]);
                return response()->json("Payment success", 200);
            }catch(\Exception $e){
                return response()->json($e, 500);
            }
        }
    }

    public function updateBill(Request $request)
    {
        if($request->ajax()){
            try{
                if($request->option == 'create'){
                    $dt = Carbon::now();
                    $factura = new Factura();
                    $factura->numero_factura = $request->num_fac;
                    $factura->valor = $request->total_fac;
                    $factura->tipo = 'individial';
                    $factura->fecha_inicio_vigencia = $dt->toDateString(); 
                    $factura->fecha_fin_vigencia = $dt->toDateString();
                    $factura->cliente_id = $request->cliente_id;
                    $factura->save();

                    DB::table('servicio_tipo_servicio')->where('id_servicio_tipo',$request->id_servicio_tipo)
                    ->update([
                        'numero_factura' => $request->num_fac,
                        'valor' => $request->total_fac,
                        'estado' => 'Pendiente'
                    ]);
                }elseif($request->option == 'update'){
                    DB::table('facturas')->where('numero_factura', $request->num_fac_ant)->update([
                        'numero_factura' => $request->num_fac,
                        'valor' => $request->total_fac,
                    ]);
                    DB::table('servicio_tipo_servicio')->where('id_servicio_tipo',$request->id_servicio_tipo)
                                                        ->update([
                                                            'numero_factura' => $request->num_fac,
                                                            'valor' => $request->total_fac,
                                                            'estado' => 'Pendiente'
                                                        ]);
                    return response()->json("Update success", 200);
                }else{
                    DB::table('facturas')->where('numero_factura', $request->num_fac)->delete();
                    DB::table('servicio_tipo_servicio')->where('id_servicio_tipo',$request->id_servicio_tipo)
                    ->update([
                        'numero_factura' => null,
                        'valor' => null,
                        'estado' => 'na',
                        'updated_at' => null
                    ]);
                    return response()->json("Delete success", 200);
                }
            }catch(\Exception $e){
                return response()->json($e, 500);
            }
        }else{
            return response()->json("Error HTTP Request", 401);
        }
    }
}
