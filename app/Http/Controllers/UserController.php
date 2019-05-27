<?php

namespace ABAS\Http\Controllers;

use Illuminate\Http\Request;
use ABAS\Cargo;
use ABAS\Area;
use Illuminate\Support\Facades\Redirect;
use ABAS\User;

class UserController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        //
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        //
        $cargos = Cargo::all();
        $areas = Area::all();
        return view('administracion.crear-usuarios', compact('cargos', 'areas'));
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
        $user = new User();
        $user->cedula = $request->cedula_usuario;
        $user->nombres = $request->nombres_usuario;
        $user->apellidos = $request->apellidos_usuario;
        $user->iniciales = $request->iniciales_usuario;
        $user->telefono = $request->telefono_usuario;
        if($request->hasFile('foto_usuario')){
            $user->foto = $request->file('foto_usuario')->store('public');
        }else{
            $user->foto = 'default-user.jpg';
        }
        $user->email = $request->email_usuario;
        $user->permisos =  array([
            'crear_clientes' => isset($request->crear_clientes) ? 'true' : 'false',
            'ver_clientes' => isset($request->ver_clientes) ? 'true' : 'false',
            'crear_docs' => isset($request->crear_docs) ? 'true' : 'false',
            'asignar_metas' => isset($request->asignar_metas) ? 'true' : 'false',
            'ver_progresos' => isset($request->ver_progresos) ? 'true' : 'false',
            'ver_comisiones' => isset($request->ver_comisiones) ? 'true' : 'false',
            'resumen_comisiones' => isset($request->resumen_comisiones) ? 'true' : 'false',
            'clientes_cerrados' => isset($request->clientes_cerrados) ? 'true' : 'false',
            'asignar_facturas' => isset($request->asignar_facturas) ? 'true' : 'false',
            'control_pagos' => isset($request->control_pagos) ? 'true' : 'false',
            'agendar_servicios' => isset($request->agendar_servicios) ? 'true' : 'false',
            'horarios_tecnicos' => isset($request->horarios_tecnicos) ? 'true' : 'false',
            'listado_servicios' => isset($request->listado_servicios) ? 'true' : 'false',
            'recepcion_docs' => isset($request->recepcion_docs) ? 'true' : 'false',
            'inventario_docs' => isset($request->inventario_docs) ? 'true' : 'false',
            'reporte_docs' => isset($request->reporte_docs) ? 'true' : 'false',
            'crear_novedades' => isset($request->crear_novedades) ? 'true' : 'false',
            'crear_tecnicos' => isset($request->crear_tecnicos) ? 'true' : 'false',
            'crear_usuarios' => isset($request->crear_usuarios) ? 'true' : 'false',
            'reporte_ganancias' => isset($request->reporte_ganancias) ? 'true' : 'false',
            'gestion_productos' => isset($request->gestion_productos) ? 'true' : 'false',
            'gastos' => isset($request->gastos) ? 'true' : 'false'
        ]);

        $user->password = bcrypt($request->cedula_usuario);
        $user->cargo_id = $request->cargo_usuario;
        switch ($request->cargo_usuario) {
            case '1':
                $user->area_id = '1';
                break;
            case '2':
                $user->area_id = '2';
                break;
            case '3':
                $user->area_id = '3';
                break;
            case '4':
                $user->area_id = '1';
                break;
            case '5':
                $user->area_id = '4';
                break;
            case '6':
                $user->area_id = '5';
                break;
            default:
                $user->area_id = '6';
                break;
        }
        $user->save();

        \Flash::success('Usuario creado correctamente.')->important();
        return Redirect::to('/users/create');
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
