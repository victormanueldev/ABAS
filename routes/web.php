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
Route::put('estado/cliente', 'ClientesController@changeBillState');
Route::get('documentos/cliente', 'ClientesController@docsReport');

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
    'except' => 'updateFrecuency',
    'except' => 'updateState',
    'except' => 'getServicesByTecnician'
]);
Route::put('servicios/edit/frecuency', 'ServicioController@updateFrecuency');
Route::put('servicios/edit/state', 'ServicioController@updateState');
Route::get('list/services','ServicioController@listServices');
Route::get('servicios/show/{idTecnico}', 'ServicioController@getServicesByTecnician');
Route::put('servicios/edit/dates','ServicioController@updateDatesHoursService');

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
Route::get('all/tecnicos', 'TecnicoController@getAll');

//Tipos de Servicios
Route::resource('tipos', 'TipoServicioController');

//Certificados
Route::resource('certificados', 'CertificadoController');

//Rutas
Route::resource('rutas', 'RutaController', [
    'except' => 'getRoute'
]);
Route::post('find/route', 'RutaController@getRoute');
Route::post('save/route/product', 'RutaController@saveRouteProduct');
Route::get('show/ruta', 'RutaController@show');

//Impresiones
Route::get('impresiones/fechas/{id}/{inicio}/{fin}', 'ImpresionController@imprimirTodo');

//Cotizaciones
Route::resource('cotizaciones', 'CotizacionController');

//Metas Comerciales
Route::resource('metas/comerciales', 'MetaController');
Route::get('inspectores/metas', 'MetaController@progressInspect');
Route::get('metas/director', 'MetaController@progresoDirector');
Route::post('metas/todo', 'MetaController@assignManyGoals');

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

//Route::resource('facturas', 'FacturaController');

Route::put('tipo/bill', 'TipoServicioController@assignBill');
Route::put('payment/register', 'TipoServicioController@registerPayment');
Route::put('payment/update', 'TipoServicioController@updateBill');

Route::get('contabilidad/clientes', 'ClientesController@indexContablilidad');
Route::get('contabilidad/facturacion', 'ClientesController@billingControl');    //Registro de Pagos
Route::get('programacion/facturacion', 'ClientesController@billingControl');    //Facturacion
Route::get('facturacion/cliente/{id}/{sede}', 'ClientesController@clientBills');

Route::resource('temporales/novedad', 'NovedadTemporalController', [
    'except' => 'show'
]);
Route::get('temporales/novedad/{idCliente}/{idSede}', 'NovedadTemporalController@show');

Route::get('neutral/edit/{id}', 'ServicioController@editNeutralService');
Route::get('find/service/{fecha}/{cliente}/{sede}', 'ServicioController@serviceByDate');
Route::resource('ordenes', 'OrdenServicioController');

Route::resource('productos', 'ProductoController');
Route::get('recepcion/rutas', function(){
    return view('servicio-clientes.registro-rutas');
});

Route::resource('inspeccion', 'InspeccionController', [
    'except' => 'showInspectionClient'
]);
Route::get('show/inspections/{idCliente}/{idSede}', 'InspeccionController@showInspectionClient');

Route::resource('factura/maestra', 'FacturaMaestraController');