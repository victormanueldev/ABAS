<?php

namespace ABAS\Http\Controllers;

use Illuminate\Http\Request;
use App\Http\Requests\ClienteFormRequest;
use Illuminate\Support\Facades\Redirect;
use ABAS\Cliente;
use ABAS\Sede;
use ABAS\Evento;
use ABAS\Novedad;
use ABAS\Telefono;
use Auth;
use Carbon\Carbon;
use ABAS\Solicitud;
use DB;

class ClientesController extends Controller
{

    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index(Request $request)
    {            
        $clientes = Cliente::all();
        if($request->ajax()){
            return $clientes;
        }
        return view('comercial.index-clientes', compact('clientes'));
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        //
        //$clientes = Cliente::all();
        return view('comercial.crear-cliente');
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {   
        //Cliente
        $now = Carbon::now();

        if($request->ajax()){
            $idCliente = Cliente::select('id')->where('nit_cedula', $request->nit_cliente)->get();
            $idSede = Sede::select('id')->where('nombre', strtoupper($request->nombre_sede))->get();
            if(count($idCliente) == 0){
                $idCliente = DB::table('clientes')->insertGetId([
                    'estado_registro' => 'cliente_nuevo',
                    'nit_cedula' => $request->nit_cliente,
                    'nombre_cliente' => $request->nombre_cliente,
                    'sector_economico' => $request->sector_economico_cliente,
                    'municipio' => strtoupper($request->ciudad_cliente),
                    'direccion' => strtoupper($request->direccion_cliente),
                    'barrio' => strtoupper($request->barrio_cliente),
                    'nombre_contacto_inicial' => strtoupper($request->contacto_cliente),
                    'cargo_contacto_inicial' => strtoupper($request->cargo_cliente),
                    'celular_contacto_inicial' => strtoupper($request->celular_cliente),
                    'email_contacto_inicial' => strtoupper($request->email_cliente),
                    'user_id' => Auth::user()->id,
                    'created_at' => $now,
                    'updated_at' => $now
                ]);

                //Sedes
                if(!empty($request->nombre_sede)){
                    $idSede = DB::table('sedes')->insertGetId([
                        'nombre' => strtoupper($request->nombre_sede),
                        'direccion' => strtoupper($request->direccion_sede),
                        'ciudad' => strtoupper($request->ciudad_sede),
                        'barrio' => strtoupper($request->barrio_sede),
                        'zona_ruta' => strtoupper($request->zona_sede),
                        'nombre_contacto' => strtoupper($request->contacto_sede),
                        'telefono_contacto' => strtoupper($request->telefono_sede),
                        'celular_contacto' => strtoupper($request->celular_sede),
                        'email_contacto' => strtoupper($request->email_sede),
                        'cliente_id' => $idCliente,
                        'created_at' => $now,
                        'updated_at' => $now
                    ]);
                }

                return response()->json(["id_cliente" => $idCliente, "id_sede" => isset($idSede) ? $idSede : '0'], 201);
            } else {
                return response()->json(["id_cliente" => $idCliente[0]->id, "id_sede" => count($idSede) > 0 ? $idSede[0]->id : '0'], 201);
            }
    
            
        }else{
            $this->validate(request(), [
                'nombre_cliente' => 'required'
            ]);

    
            $idCliente = DB::table('clientes')->insertGetId([
                'tipo_cliente' => $request->get('tipo_cliente'),
                'estado_registro' => $request->get('estado_registro'),
                'nit_cedula' => !empty($request->get('nit_number'))  ? strtoupper($request->get('nit_cedula'))."-".$request->get('nit_number') : strtoupper($request->get('nit_cedula')),
                'nombre_cliente' => strtoupper($request->get('nombre_cliente')),
                'razon_social' => !empty($request->get('razon_social')) ? strtoupper($request->get('razon_social')) : strtoupper($request->get('nombre_cliente')),
                'sector_economico' => $request->get('sector_economico'),
                'municipio' => strtoupper($request->get('municipio')),
                'direccion' => strtoupper($request->get('direccion')),
                'barrio' => strtoupper($request->get('barrio')),
                'zona' => strtoupper($request->get('zona')),
                'nombre_contacto_inicial' => strtoupper($request->get('contacto_inicial')),
                'cargo_contacto_inicial' => strtoupper($request->get('cargo_contacto_inicial')),
                'celular_contacto_inicial' => strtoupper($request->get('celular_contacto_inicial')),
                'email_contacto_inicial' => strtoupper($request->get('email_contacto_inicial')),
                'nombre_contacto_tecnico' => strtoupper($request->get('contacto_tecnico')),
                'cargo_contacto_tecnico' => strtoupper($request->get('cargo_contacto_tecnico')),
                'celular_contacto_tecnico' => strtoupper($request->get('celular_contacto_tecnico')),
                'email_contacto_tecnico' => strtoupper($request->get('email_contacto_tecnico')),
                'nombre_contacto_facturacion' => strtoupper($request->get('contacto_facturacion')),
                'cargo_contacto_facturacion' => strtoupper($request->get('cargo_contacto_facturacion')),
                'celular_contacto_facturacion' => strtoupper($request->get('celular_contacto_facturacion')),
                'email_contacto_facturacion' => strtoupper($request->get('email_contacto_facturacion')),
                'empresa_actual' => strtoupper($request->get('empresa_actual')),
                'razon_cambio' => strtoupper($request->get('razon_cambio')),
                'medio_contacto' => strtoupper($request->get('medio_contacto')),
                'otro_medio' => strtoupper($request->get('otro_medio')),
                'user_id' => Auth::user()->id,
                'created_at' => $now,
                'updated_at' => $now
            ]);
    
            //Sedes
            if(!empty($request->get('nombre_sedes'))){
                $idSede = DB::table('sedes')->insertGetId([
                    'nombre' => strtoupper($request->get('nombre_sedes')),
                    'direccion' => strtoupper($request->get('direccion_sedes')),
                    'ciudad' => strtoupper($request->get('ciudad_sedes')),
                    'barrio' => strtoupper($request->get('barrio_sedes')),
                    'zona_ruta' => strtoupper($request->get('zona_ruta')),
                    'nombre_contacto' => strtoupper($request->get('nombre_contacto')),
                    'telefono_contacto' => strtoupper($request->get('telefono_sedes')),
                    'celular_contacto' => strtoupper($request->get('celular_sedes')),
                    'email_contacto' => strtoupper($request->get('email_sedes')),
                    'cliente_id' => $idCliente,
                    'created_at' => $now,
                    'updated_at' => $now
                ]);
            }
    
            if($request->fecha_inicio != '' || $request->fecha_inicio != null){
                $evento = new Evento();
                $dt = Carbon::parse($request->fecha_inicio." ".$request->hora_inicio);
                $evento->tipo  = $request->tipo_evento;
                $evento->fecha_inicio = $dt->toDateString()." ".$dt->toTimeString();
                $evento->fecha_fin = $dt->addHour()->toDateTimeString();
                $evento->asunto = $request->asunto;
                $evento->cliente_id = $idCliente;
                $evento->sede_id = !empty($idSede) ? $idSede : null;
                $evento->direccion_evento = strtoupper($request->get('direccion'));
                $evento->telefono_evento = strtoupper($request->celular_cliente);
                $evento->user_id = Auth::user()->id;
                $evento->save();
            }
    
            if ($request->telefono[0] != '' || $request->telefono[0] != null) {               
    
                for ($i=0; $i < count($request->telefono) ; $i++) { 
                    Telefono::create([
                        'numero' => $request->telefono[$i],
                        'cliente_id' => $idCliente
                    ]);
                }
            }
            \Flash::success('Cliente creado correctamente.')->important();
                return Redirect::to('/clientes/create');
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

        $cliente = Cliente::with('sedes', 'solicitudes', 'telefonos', 'user', 'cotizacion', 'solicitudes.certificados', 'solicitudes.rutas', 'inspeccion')->where('id', $id)->get();
        return view('general.ver-cliente', compact('cliente'));
        // return $cliente;

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
        $cliente = Cliente::with('sedes','user','solicitudes')->where('id', $id)->get();
        return $cliente;
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
        if($request->ajax()){
            $cliente = Cliente::findOrFail($id);
            //Actualiza segun el request enviado
            switch ($request->docToUpdate) {
                case 'doc_ident':
                    $cliente->doc_identidad = $request->value;
                    $cliente->save();
                    break;
                case 'doc_rut':
                    $cliente->doc_rut = $request->value;
                    $cliente->save();
                    break;
                case 'doc_camAndCommerce':
                    $cliente->doc_camara_comercio = $request->value;
                    $cliente->save();
                    break;
                default:
                    return response()->json("Docs Update Failed", 400);
                    break;
            }
            return response()->json("Docs Update Successfully", 200);
        }
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy($id)
    {
        //
    }

    public function summary(Request $request)
    {
        $clientes = Cliente::where('');
    }

    public function updateCliente(Request $request, $id)
    {
        $cliente = Cliente::findOrFail($id);
        
        $cliente->tipo_cliente = $request->get('tipo_cliente');
        $cliente->estado_negociacion = $request->get('estado_negociacion');
        $cliente->nit_cedula = $request->get('nit_cedula');
        $cliente->nombre_cliente = strtoupper($request->get('nombre_cliente'));
        $cliente->sector_economico = strtoupper($request->get('sector_economico'));
        $cliente->municipio = strtoupper($request->get('municipio'));
        $cliente->direccion = strtoupper($request->get('direccion'));
        $cliente->barrio = strtoupper($request->get('barrio'));
        $cliente->zona = strtoupper($request->get('zona'));
        $cliente->nombre_contacto_inicial = strtoupper($request->get('nombre_contacto_inicial'));
        $cliente->cargo_contacto_inicial = strtoupper($request->get('cargo_contacto_inicial'));
        $cliente->celular_contacto_inicial = strtoupper($request->get('celular_contacto_inicial'));
        $cliente->email_contacto_inicial = strtoupper($request->get('email_contacto_inicial'));
        $cliente->nombre_contacto_tecnico = strtoupper($request->get('nombre_contacto_tecnico'));
        $cliente->cargo_contacto_tecnico = strtoupper($request->get('cargo_contacto_tecnico'));
        $cliente->celular_contacto_tecnico = strtoupper($request->get('celular_contacto_tecnico'));
        $cliente->email_contacto_tecnico = strtoupper($request->get('email_contacto_tecnico'));
        $cliente->nombre_contacto_facturacion = strtoupper($request->get('nombre_contacto_facturacion'));
        $cliente->cargo_contacto_facturacion = strtoupper($request->get('cargo_contacto_facturacion'));
        $cliente->celular_contacto_facturacion = strtoupper($request->get('celular_contacto_facturacion'));
        $cliente->email_contacto_facturacion = strtoupper($request->get('email_contacto_facturacion'));
        $cliente->empresa_actual = strtoupper($request->get('empresa_actual'));
        $cliente->razon_cambio = strtoupper($request->get('razon_cambio'));
        $cliente->medio_contacto = strtoupper($request->get('medio_contacto'));
        $cliente->otro_medio = strtoupper($request->get('otro_medio'));

        $cliente->save();

        return Redirect::to('/clientes/'.$id);
    }

    public function indexContablilidad(Request $request)
    {
        if($request->ajax()){
            $clientes = Cliente::with('user','sedes')->get();
            return $clientes;
        }
        return view('contabilidad.index-clientes');
    }

    public function billingControl(Request $request)
    {
        return view('general.control-facturacion');
    }

    public function clientBills(Request $request, $idCliente, $idSede)
    {
        $dt_ini = Carbon::parse($request->fecha_inicio)->toDateString();
        $dt_end = carbon::parse($request->fecha_fin)->toDateString();
        $facturas = Cliente::with(['solicitudes.sede' => function($query) use($idSede){
                                $query->where('id',$idSede);
                            },'solicitudes.servicios' => function($query) use($dt_ini, $dt_end){
                                $query->select('id', 'solicitud_id','fecha_inicio','hora_inicio','frecuencia_str','tipo','color');
                                $query->where('fecha_inicio', '>=', $dt_ini);
                                $query->where('fecha_fin', '<=', $dt_end);
                            } , 'solicitudes.servicios.tipos'])
                            ->select('id','nombre_cliente')
                            ->whereHas('solicitudes', function($query) use($idSede){
                                $query->where('sede_id', $idSede);
                            })
                            ->where('id', $idCliente)
                            ->get();
        return $facturas;
    }

    public function changeBillState(Request $request)
    {
        $user = Cliente::findOrFail($request->idCliente);
        if($user->estado_facturacion == 'Normal'){
            $user->estado_facturacion = 'En mora';
            $user->save();
        }else{
            $user->estado_facturacion = 'Normal';
            $user->save();
        }
        return response()->json($user->estado_facturacion, 200);
    }

    public function docsReport(Request $request)
    {
        if($request->ajax()){
            $data = collect(['clientes' => Cliente::select('id','nombre_cliente','doc_rut','doc_identidad','doc_camara_comercio','tipo_cliente')->with('sedes')->get()]);
            $data->put('solicitudes', Solicitud::with([
                                                    'certificados' => function($query){
                                                        $query->select('id', 'solicitud_id');
                                                    }, 
                                                    'rutas' => function($query){
                                                        $query->select('id', 'tipo','solicitud_id');
                                                    }
                                                ])->get());
            return response()->json($data, 200);
        }
        return view('calidad.reporte-documentos');
    }

    public function clientByNit(Request $request, $numDoc)
    {
        $cliente = Cliente::select('id','nombre_cliente','nit_cedula')->where('nit_cedula', $numDoc)->get();
        if(count($cliente) > 0){
            return response()->json($cliente[0], 200);
        }else {
            return response()->json(['Not found'], 404);
        }
        

    }

    public function updateLoginData(Request $request)
    {
        try{
            $username = Cliente::select('id')->where('usuario', $request->username)->get();
            if(count($username) > 0){
                return response()->json('Este nombre de usuario ya existe.', 400);
            } else {
                $cliente = CLiente::findOrFail($request->cid);
                $cliente->usuario = $request->username;
                $cliente->password = bcrypt($request->password);
                $cliente->save();
            }

            return response()->json("Update success", 200);
        } catch (\Exception $e){
            return response()->json($e, 500);
        }
    }

    public function clientLogin(Request $request)
    {
        $cliente = Cliente::select('id','password')
                        ->where('usuario', $request->username)
                        ->get();

        if(count($cliente) > 0){
            if(password_verify($request->password, $cliente[0]->password)){
                return response()->json($cliente[0]->id, 200);
            } else {
                return response()->json('¡Contraseña incorrecta!', 400);
            }
        } else {
            return response()->json('¡Credenciales Incorrectas!', 404);
        }
    }

}
