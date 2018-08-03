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
Route::resource('servicios', 'ServicioController');
Route::post('servicios/{id}/print', 'ServicioController@print')->name('servicios.print');

//Tecnicos
Route::resource('tecnicos', 'TecnicoController');
Route::get('tecnicos/getColor/{id}', 'TecnicoController@getColor');

//Tipos de Servicios
Route::resource('tipos', 'TipoServicioController');