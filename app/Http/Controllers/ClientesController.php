<?php

namespace ABAS\Http\Controllers;

use Illuminate\Http\Request;
use App\Http\Requests\ClienteFormRequest;
use Illuminate\Support\Facades\Redirect;
use ABAS\Cliente;
use ABAS\Evento;
use ABAS\Novedad;
use ABAS\Telefono;
use Auth;

class ClientesController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index(Request $request)
    {
        
        // $clientes = Cliente::all();
        // $data = collect();
        // foreach ($clientes as $cliente) {
        //     if($cliente->razon_social == 'indefinido'){
        //         $data->push([
                   
        //                 'id'=> $cliente->id,
        //                 'nombre_cliente' => $cliente->nombre_cliente,
        //                 'cedula' => $cliente->nit_cedula,
        //                 'direccion' => $cliente->direccion,
        //                 'nombre_contacto' => $cliente->nombre_contacto,
        //                 'cargo_contacto' => $cliente->cargo_contacto,
        //                 'email' => $cliente->email,
        //                 'celular' => $cliente->celular
                    
        //         ]);

        //     }else{
        //         $data->push([
        //                 'id' => $cliente->id,
        //                 'nombre_cliente' => $cliente->nombre_cliente,
        //                 'razon_social' => $cliente->razon_social,
        //                 'nit' => $cliente->nit_cedula,
        //                 'sector_economico' => $cliente->sector_economico,
        //                 'municipio' => $cliente->municipio,
        //                 'direccion' => $cliente->direccion,
        //                 'barrio' => $cliente->barrio,
        //                 'nombre_contacto' => $cliente->nombre_contacto,
        //                 'contacto_tecnico' => $cliente->contacto_tecnico,
        //                 'cargo_contacto_tecnico' => $cliente->cargo_contacto_tecnico,
        //                 'cargo_contacto' => $cliente->cargo_contacto,
        //                 'email' => $cliente->email,
        //                 'telefono' => $cliente->telefono,
        //                 'telefono2' => $cliente->telefono2,
        //                 'extension' => $cliente->extension,
        //                 'celular' => $cliente->celular,
        //                 'empresa_actual' => $cliente->empresa_actual,
        //                 'razon_cambio' => $cliente->razon_cambio
                    
        //         ]);
        //     }
        // }
        // return $data;
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
        //
        $cliente = new Cliente();

        $cliente->tipo_cliente = $request->get('tipo_cliente');
        $cliente->nit_cedula = $request->get('nit_cedula');
        $cliente->nombre_cliente = $request->get('nombre_cliente');
        $cliente->sector_economico = $request->get('sector_economico');
        $cliente->municipio = $request->get('municipio');
        $cliente->direccion = $request->get('direccion');
        $cliente->barrio = $request->get('barrio');
        $cliente->zona = $request->get('zona');
        $cliente->nombre_contacto = $request->get('nombre_contacto');
        $cliente->contacto_tecnico = $request->get('contacto_tecnico');
        $cliente->cargo_contacto_tecnico = $request->get('cargo_contacto_tecnico');
        $cliente->cargo_contacto = $request->get('cargo_contacto');
        $cliente->email = $request->get('email');
        $cliente->extension = $request->get('extension');
        $cliente->celular = $request->get('celular');
        $cliente->empresa_actual = $request->get('empresa_actual');
        $cliente->razon_cambio = $request->get('razon_cambio');
        $cliente->user_id = Auth::user()->id;
        $cliente->save();   

        if($request->fecha_inicio != '' || $request->fecha_inicio != null){
            $evento = new Evento();
            $evento->tipo  = $request->tipo_evento;
            $evento->fecha_inicio = $request->fecha_inicio." ".$request->hora_inicio.":00";
            $evento->asunto = $request->asunto;
            $evento->user_id = Auth::user()->id;
            $evento->save();
        }

        if ($request->telefono[0] != '' || $request->telefono[0] != null) {               
            $id_cliente = Cliente::select('id')->where('nombre_cliente', $request->nombre_cliente)->get();
            for ($i=0; $i < count($request->telefono) ; $i++) { 
                Telefono::create([
                    'numero' => $request->telefono[$i],
                    'cliente_id' => $id_cliente[0]['id']
                ]);
            }
        }

        //return $request->all();

        return Redirect::to('home');
    }

    /**
     * Display the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function show($id)
    {

        $cliente = Cliente::with('sedes', 'solicitudes', 'telefonos', 'user')->where('id', $id)->get();
        return view('general.ver-cliente', compact('cliente'));

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
        $cliente = Cliente::with('sedes')->where('id', $id)->get();
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

}
