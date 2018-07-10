<?php

namespace ABAS\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;
use Auth;
use ABAS\Novedad;
use ABAS\User;
use ABAS\Area;
use Carbon\Carbon;

class NovedadesController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $foto = Auth::user()->foto;
        $id_auth = Auth::user()->id;
        $novedades = Novedad::with('user', 'user2')->get();//Consulta todas las novedades con su respectivo usuario
        $now = Carbon::now();
        $fecha_actual = $now->toDateString();
        $data = collect();//Instancia de Coleccion
        foreach ($novedades as $novedad) {
            if ($novedad->created_at->toDateString() == $fecha_actual || $novedad->estado == 'publicada') {//Muestra solo las novedades creadas en la fecha actual
                if (!empty($novedad->user2->nombres)) {//valida si la novedad está resuleta
                    //Agrega un elemento a la lista solo si el user2 existe
                    $data->push([
                        'id' => $novedad->id, 
                        'descripcion' => $novedad->descripcion, 
                        'estado' => $novedad->estado, 
                        'fecha_creacion' => $novedad->created_at->toDateString(),
                        'hora_creacion' => $novedad->created_at->toTimeString(),
                        'comentario' => $novedad->comentario,
                        'id_user1' => $novedad->user->id,
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
                        'id_user1' => $novedad->user->id,
                        'nombres_user1' => $novedad->user->nombres,
                        'apellidos_user1' => $novedad->user->apellidos,
                        'foto_user1' => $novedad->user->foto,
                        'nombres_user2' => null,
                        'apellidos_user2'=> null,
                        'foto_user2' => null,
                        'foto_auth' => $foto,
                        'id_auth' => $id_auth
                    ]);
                }
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
        $novedad->area_id = $request->area;
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
     * Display all resources.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function show()
    {
        $novedades = Novedad::with('user', 'user2')->latest()->get();
        $data = collect();//Instancia de Coleccion
        foreach ($novedades as $novedad) {
            if (!empty($novedad->user2->nombres)) {//valida si la novedad está resuleta
                //Agrega un elemento a la lista solo si el user2 existe
                $data->push([
                    'id' => $novedad->id, 
                    'descripcion' => $novedad->descripcion, 
                    'estado' => $novedad->estado, 
                    'fecha_creacion' => $novedad->created_at->toDateString(),
                    'hora_creacion' => $novedad->created_at->format('g:i a'),
                    'nombres_user1' => $novedad->user->nombres,
                    'apellidos_user1' => $novedad->user->apellidos,
                    'foto_user1' => $novedad->user->foto,
                    'nombres_user2' => $novedad->user2->nombres,//Datos del usuario que resolvió
                    'apellidos_user2'=> $novedad->user2->apellidos,//Datos del usuario que resolvió
                    'foto_user2'=> $novedad->user2->foto,//Datos del usuario que resolvió
                    'fecha_resuelto' => $novedad->updated_at->toDateString(),
                    'hora_resuelto' => $novedad->updated_at->format('g:i a'),
                    'comentario' => $novedad->comentario
                ]);
            } else {
                //Agrega todas las novedades a la coleccion
                $data->push([
                    'id' => $novedad->id, 
                    'descripcion' => $novedad->descripcion, 
                    'estado' => $novedad->estado, 
                    'fecha_creacion' => $novedad->created_at->toDateString(),
                    'hora_creacion' => $novedad->created_at->format('g:i a'),
                    'nombres_user1' => $novedad->user->nombres,
                    'apellidos_user1' => $novedad->user->apellidos,
                    'foto_user1' => $novedad->user->foto,
                    'nombres_user2' => '',
                    'apellidos_user2'=> '',
                    'foto_user2' => '',
                    'fecha_resuelto' => '',
                    'hora_resuelto' => '',
                    'comentario' => '-'
                ]);
            }
        }
        return view('general.novedades', compact('data'));
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
        $novedad->comentario = $request->comentario;
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
