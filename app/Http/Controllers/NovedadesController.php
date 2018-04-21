<?php

namespace ABAS\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;
use Auth;
use ABAS\Novedad;
use ABAS\User;
use ABAS\Area;

class NovedadesController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $novedades = Novedad::with('user', 'user2')->get();//Consulta todas las novedades con su respectivo usuario

        $data = collect();//Instancia de Coleccion
        $cont = 0;
        foreach ($novedades as $novedad) {
            if (!empty($novedad->user2->nombres)) {
                //Agrega un elemento a la lista solo si el user2 existe
                $data->push([
                    'id' => $novedad->id, 
                    'descripcion' => $novedad->descripcion, 
                    'estado' => $novedad->estado, 
                    'fecha_creacion' => $novedad->created_at->toDateString(),
                    'hora_creacion' => $novedad->created_at->toTimeString(),
                    'nombres_user1' => $novedad->user->nombres,
                    'apellidos_user1' => $novedad->user->apellidos,
                    'foto_user1' => $novedad->user->foto,
                    'nombres_user2' => $novedad->user2->nombres,//Datos del usuario que resolvió
                    'apellidos_user2'=> $novedad->user2->apellidos,//Datos del usuario que resolvió
                    'foto_user2'=> $novedad->user2->foto,//Datos del usuario que resolvió
                    'fecha_resuelto' => $novedad->updated_at->toDateString(),
                    'hora_resuelto' => $novedad->updated_at->toTimeString()
                ]);
            } else {
                //Agrega todas las novedades a la coleccion
                $data->push([
                    'id' => $novedad->id, 
                    'descripcion' => $novedad->descripcion, 
                    'estado' => $novedad->estado, 
                    'fecha_creacion' => $novedad->created_at->toDateString(),
                    'hora_creacion' => $novedad->created_at->toTimeString(),
                    'nombres_user1' => $novedad->user->nombres,
                    'apellidos_user1' => $novedad->user->apellidos,
                    'foto_user1' => $novedad->user->foto,
                    'nombres_user2' => null,
                    'apellidos_user2'=> null,
                    'foto_user2' => null
                ]);
            }  
        }

            $data->toJson();//Convierte la coleccion a formato JSON
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
        $novedad = new Novedad;
        $max_id = Novedad::max('id');//Obiente el maximo ID de la tabla novedades
        $novedad->id = $max_id + 1;//Hace un incremeneto en 1
        $novedad->descripcion = $request->descripcion;
        $novedad->user_id = Auth::user()->id;//Obtiene el ID del usuario autenticado
        $novedad->save();//Guarda los datos en la tabla novedades
        
        //Valida la visibilidad de la novedad
        if($request->area == '1'){
            $area_id = 1;
            //Inserta un solo dato en la tabla area_novedad
            DB::table('area_novedad')->insert([
                'area_id' => $area_id,
                'novedad_id' => $max_id+1
            ]);
        }elseif($request->area == '2'){
            $area_id = 2;
            //Inserta un solo dato en la tabla area_novedad
            DB::table('area_novedad')->insert([
                'area_id' => $area_id,
                'novedad_id' => $max_id+1
            ]);
        }else{
            $areas = Area::all();//Obtiene todas las areas registradas en la BD
            foreach ($areas as $area) {
                //Inserta registros en la tabla area_novedad dependiendo de la cantidad de areas registradas
                DB::table('area_novedad')->insert([
                    'area_id' => $area->id,//Obiene el ID de un area
                    'novedad_id' => $max_id+1//Inserta el ID de la nueva novedad, el mismo en cada iteración
                ]);
            }
        } 
        return redirect('/home');
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
        $novedad = Novedad::findOrFail($id);
        $novedad->estado = $request->estado;
        $novedad->user2_id = Auth::user()->id;
        $novedad->update();
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
