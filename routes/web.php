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
    'except' => 'print'
]);

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