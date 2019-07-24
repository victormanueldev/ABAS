<?php
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
Route::put('estado/cliente', 'ClientesController@changeBillState');
Route::get('documentos/cliente', 'ClientesController@docsReport');
Route::get('ver-cliente/{id}', 'ClientesController@clientByNit');
Route::put('crear-cuenta', 'ClientesController@updateLoginData' );
Route::post('login-cliente', 'ClientesController@clientLogin');

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
Route::get('recepcion/rutas', function(){
    return view('servicio-clientes.registro-rutas');
});

//Impresiones
Route::get('impresiones/fechas/{id}/{inicio}/{fin}', 'ImpresionController@imprimirTodo');

//Cotizaciones
Route::resource('cotizaciones', 'CotizacionController');

//Metas Comerciales
Route::resource('metas/comerciales', 'MetaController');
Route::get('inspectores/metas', 'MetaController@progressInspect');
Route::get('metas/director', 'MetaController@progresoDirector');
Route::post('metas/todo', 'MetaController@assignManyGoals');

//Facturas
Route::resource('facturas', 'FacturaController');

//Tipos de servicios
Route::put('tipo/bill', 'TipoServicioController@assignBill');
Route::put('payment/register', 'TipoServicioController@registerPayment');
Route::put('payment/update', 'TipoServicioController@updateBill');

//Control de facturacion por clientes
Route::get('contabilidad/clientes', 'ClientesController@indexContablilidad');
Route::get('contabilidad/facturacion', 'ClientesController@billingControl');    //Registro de Pagos
Route::get('programacion/facturacion', 'ClientesController@billingControl');    //Facturacion
Route::get('facturacion/cliente/{id}/{sede}', 'ClientesController@clientBills');

//Novedades Temporales
Route::resource('temporales/novedad', 'NovedadTemporalController', [
    'except' => 'show'
]);
Route::get('temporales/novedad/{idCliente}/{idSede}', 'NovedadTemporalController@show');

//Tipos de servicios 
Route::get('neutral/edit/{id}', 'ServicioController@editNeutralService');
Route::get('find/service/{fecha}/{cliente}/{sede}', 'ServicioController@serviceByDate');

//Ordenes de serivicio
Route::resource('ordenes', 'OrdenServicioController');

//Productos
Route::resource('productos', 'ProductoController', [
    'except' => 'productsOut',
    'except' => 'productSpent',
    'except' => 'productSpentOne',
    'except' => 'productSpentByTecnician'
]);
Route::get('salida/productos', 'ProductoController@productsOut');
Route::get('gasto/productos/{dateIni}/{dateEnd}', 'ProductoController@productSpent');
Route::get('detalle/producto/{idProducto}/{dateIni}/{dateEnd}', 'ProductoController@productSpentOne');
Route::get('gasto/tecnico/{id}', 'ProductoController@productSpentByTecnician');

//Inspecciones
Route::resource('inspeccion', 'InspeccionController', [
    'except' => 'showInspectionClient'
]);
Route::get('show/inspections/{idCliente}/{idSede}', 'InspeccionController@showInspectionClient');

//Comisiones
Route::resource('comisiones', 'ComisionController');
Route::post('show/comisiones', 'ComisionController@showByCode');
Route::get('all/comisiones', 'ComisionController@allComisions');

//Valores Generales
Route::resource('valores', 'ValorGeneralController');

//Documentos
Route::resource('documents', 'DocumentoController', [
    'except' => 'showByClient'
]);
Route::get('documents/show/{idCliente}','DocumentoController@showByClient');

//Compras
Route::resource('compras','CompraController');

//Ganancias
Route::get('ganancias/totales', 'GananciaController@earingsView');
Route::get('reporte/ganancias/{dateIni}/{dateFin}', 'GananciaController@earingsAndSpend');

//Usuarios
Route::resource('users','UserController');