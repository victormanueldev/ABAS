<?php
use ABAS\User;
use Carbon\Carbon;
/*
|--------------------------------------------------------------------------
| Web Routes
|--------------------------------------------------------------------------
|
| Here is where you can register web routes for your application. These
| routes are loaded by the RouteServiceProvider within a group which
| contains the "web" middleware group. Now create something great!
|
*/

Route::get('/', function () {
    return redirect()->to('/login');
});
Auth::routes();
Route::get('/home', 'HomeController@index')->name('home');

// Route::get('clientes/ver-clientes', function () {
//     return view('ver-clientes');
// })->name('ver-clientes');


//Eventos
Route::get('cronograma/eventos', function () {
    return view('comercial.cronograma-eventos');
})->name('eventos');
Route::post('eventos/guardar-evento', 'EventosController@create')->name('guardaEventos');
Route::post('evento/guardar', 'EventosController@store')->name('eventos.store');
Route::get('eventos/index', 'EventosController@index')->name('eventos-index');
Route::post('eventos/editar-evento', 'EventosController@update')->name('eventos-edit');
Route::post('eventos/elminar-evento', 'EventosController@destroy')->name('eventos-eliminar');

//Tareas
Route::resource('tareas', 'TareasController', [
    'except' => ['create', 'show', 'edit']
]);
Route::get('show', 'TareasController@show');

//Novedades
Route::resource('novedades', 'NovedadesController', [
    'except' => 'show'
]);
Route::get('novedades/listado', 'NovedadesController@show')->name('novedades.show');

//Clientees
Route::resource('clientes', 'ClientesController');
Route::post('clientes/{id}', 'ClientesController@updateCliente') -> name('clientes.updateCliente');
// Route::post('clientes/crear-persona', 'ClientesController@store')->name('guardarCliente');
// Route::post('clientes/crear-juridica', 'ClientesController@store')->name('guardarEmpresa');

//Sedes
Route::resource('sedes', 'SedesController', [
    'except' => 'index'
]);

Route::get('sedes/cliente/{id}', 'SedesController@index');

//Notificaciones
Route::resource('notificaciones', 'NotificacionesController');

//Solicitudes
Route::resource('solicitud', 'SolicitudesController', [
    'except' => 'show'
]);
Route::post('solicitud/show', 'SolicitudesController@show');

//Servicios
Route::resource('servicios', 'ServicioController', [
    'except' => 'updateFrecuency'
]);
Route::put('servicios/edit/frecuency', 'ServicioController@updateFrecuency');

//Tecnicos
Route::resource('tecnicos', 'TecnicoController');
Route::get('tecnicos/getColor/{id}', 'TecnicoController@getColor');
Route::get('tecnicos/servicios/{id}', 'TecnicoController@getService');
Route::get('tecnicos/fechas/{solicitud}/{tecnico}', 'TecnicoController@getDatesServices');
Route::get('tecnicos/serviciosPorFecha/{id}/{fechaInicio}/{fechaFin}', 'TecnicoController@getServicesByDate');
Route::get('tecnicos/imprimir-todo/{idServicio}/{fechaInicio}/{fechaFin}/{idTecnico}', 'TecnicoController@printAll');
Route::get('tecnicos/imprimir-ods/{idServicio}/{fechaInicio}/{fechaFin}/{idTecnico}', 'TecnicoController@printODS');
Route::get('tecnicos/imprimir-rs/{idServicio}/{fechaInicio}/{fechaFin}/{idTecnico}', 'TecnicoController@printRS');
Route::get('tecnicos/imprimir-rl/{idServicio}/{fechaInicio}/{fechaFin}/{idTecnico}', 'TecnicoController@printRL');
Route::get('tecnicos/imprimir-rri/{idServicio}/{fechaInicio}/{fechaFin}/{idTecnico}', 'TecnicoController@printRRI');
Route::get('tecnicos/imprimir-rre/{idServicio}/{fechaInicio}/{fechaFin}/{idTecnico}', 'TecnicoController@printRRE');
Route::get('tecnicos/imprimir-ctf/{idServicio}/{fechaInicio}/{fechaFin}/{idTecnico}', 'TecnicoController@printCertificates');

//Tipos de Servicios
Route::resource('tipos', 'TipoServicioController');

//Certificados
Route::resource('certificados', 'CertificadoController');

//Rutas
Route::resource('rutas', 'RutaController');

//Impresiones
Route::get('impresiones/fechas/{id}/{inicio}/{fin}', 'ImpresionController@imprimirTodo');

Route::get('testdates', function(){
    $dateIni = Carbon::parse('2018-05-20');
    $ordinal = 'Last';
    $day = "Monday";
    $cont=0;
    $arrayDates = [];
    $dt_fin = $dateIni->addMinutes(120);
    while($dateIni->year <= 2019){
        //$dateEnd = Carbon::parse($ordinal." ".$day." of ".$dateIni->format('F')." ".$dateIni->year);
        //$dateEnd = Carbon::parse($day." ".$dateIni->format('F')." ".$dateIni->year); Repetir un dia especifico
        // $dateEnd = Carbon::parse($dateIni);
        // if($dateEnd->isSunday()){
        //     $cont++;
        //     $dateEnd->next(Carbon::MONDAY);
        // }
        //$dateIni->addWeeks($request->frecuencia);
        $nueva_fecha = $dateIni;
        //$dt_fin = $nueva_fecha;
        //$servicio->fecha_inicio = $nueva_fecha;
        //$servicio->hora_inicio = $nueva_fecha->toTimeString();
        //$dt_fin->addMinutes(120);
        array_push($arrayDates, $nueva_fecha->toDateTimeString());
        //$servicio->fecha_fin =$dt_fin;
        //$servicio->hora_fin = $dt_fin->toTimeString();
        $dateIni->addWeek(2);
    }
    // $date = Carbon::parse('Last thursday of December 2018');
    return $arrayDates;
});

//Cotizaciones
Route::resource('cotizaciones', 'CotizacionController');

//Metas Comerciales
Route::resource('metas/comerciales', 'MetaController');
Route::get('metas/director', 'MetaController@progresoDirector');

Route::get('clientes/servicios/test', function(){
    $infoUsuarios = DB::table('users')
                        ->join('clientes', 'users.id', 'clientes.user_id')
                        ->join('solicitudes', 'clientes.id', 'solicitudes.cliente_id')
                        ->join('servicios', 'solicitudes.id', 'servicios.solicitud_id')
                        ->join('facturas', 'servicios.id', 'facturas.servicio_id')
                        ->join('cargos', 'users.cargo_id', 'cargos.id')
                        ->join('areas', 'users.area_id', 'areas.id')
                        ->select('cargos.descripcion', 'users.nombres' , DB::raw('SUM(facturas.valor) as total'), 'users.id', 'users.foto')
                        ->where('areas.id', '1')
                        ->where('servicios.fecha_inicio', '>=', '2018-11-26')
                        ->where('servicios.fecha_inicio', '<=', '2019-01-01')
                        ->groupBy('users.id')
                        ->get();
    return $infoUsuarios;
});

Route::resource('facturas', 'FacturaController');
