<?php

namespace ABAS\Http\Controllers;

use Illuminate\Http\Request;
use App\Http\Requests\ClienteFormRequest;
use Illuminate\Support\Facades\Redirect;
use ABAS\Cliente;
use Auth;

class ClientesController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        // $data = collect([ 
        //         '0' => [
        //             'nombre' => 'asdasd'
        //         ],
        //         '1' => [
        //             'nombre' => 'jklkgja'
        //         ],
        //         '2' => [
        //             'nombre' => 'iuhweiuwer'
        //         ]
        // ]);
        // //
        $clientes = Cliente::all();
        $data = collect();
        foreach ($clientes as $cliente) {
            if($cliente->razon_social == 'indefinido'){
                $data->push([
                   
                        'id'=> $cliente->id,
                        'nombre_cliente' => $cliente->nombre_cliente,
                        'cedula' => $cliente->nit_cedula,
                        'direccion' => $cliente->direccion,
                        'nombre_contacto' => $cliente->nombre_contacto,
                        'cargo_contacto' => $cliente->cargo_contacto,
                        'email' => $cliente->email,
                        'celular' => $cliente->celular
                    
                ]);

            }else{
                $data->push([
                    
                        'id' => $cliente->id,
                        'nombre_cliente' => $cliente->nombre_cliente,
                        'razon_social' => $cliente->razon_social,
                        'nit' => $cliente->nit_cedula,
                        'sector_economico' => $cliente->sector_economico,
                        'municipio' => $cliente->municipio,
                        'direccion' => $cliente->direccion,
                        'barrio' => $cliente->barrio,
                        'nombre_contacto' => $cliente->nombre_contacto,
                        'contacto_tecnico' => $cliente->contacto_tecnico,
                        'cargo_contacto_tecnico' => $cliente->cargo_contacto_tecnico,
                        'cargo_contacto' => $cliente->cargo_contacto,
                        'email' => $cliente->email,
                        'telefono' => $cliente->telefono,
                        'telefono2' => $cliente->telefono2,
                        'extension' => $cliente->extension,
                        'celular' => $cliente->celular,
                        'empresa_actual' => $cliente->empresa_actual,
                        'razon_cambio' => $cliente->razon_cambio
                    
                ]);
            }
        }
        return $data;
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
        $cliente = new Cliente();
        if(!empty($request->razon_social)){
            $cliente->razon_social = $request->razon_social;
        }else{
            $cliente->razon_social = 'indefinido';
        }

        if(!empty($request->cedula)){
            $cliente->nit_cedula = $request->cedula;
        }else{
            $cliente->nit_cedula = 'indefinido';
        }
        $cliente->nombre_cliente = $request->get('nombre_cliente');
        $cliente->nombre_contacto = $request->get('nombre_contacto');
        $cliente->cargo_contacto = $request->get('cargo_contacto');
        $cliente->email = $request->get('email');
        $cliente->direccion = $request->get('direccion');
        $cliente->telefono = $request->get('telefono');
        $cliente->celular = $request->get('celular');
        $cliente->user_id = Auth::user()->id;

        $cliente->save();
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
