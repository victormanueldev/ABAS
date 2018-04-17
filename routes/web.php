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
    return view('auth.login');
});
Auth::routes();
Route::get('/home', 'HomeController@index')->name('home');

Route::get('clientes/crear-empresa', function(){
    return view('crear-empresa');
})->name('crear-empresa');

Route::get('clientes/crear-persona', function(){
    return view('crear-persona');
})->name('crear-persona');

Route::get('clientes/ver-clientes', function () {
    return view('ver-clientes');
})->name('ver-clientes');


//CRUD Eventos
Route::get('cronograma/eventos', function () {
    return view('cronograma-eventos');
})->name('eventos');
Route::post('eventos/guardar-evento', 'EventosController@create')->name('guardaEventos');
Route::get('eventos/index', 'EventosController@index')->name('eventos-index');
Route::post('eventos/editar-evento', 'EventosController@edit')->name('eventos-edit');
Route::post('eventos/elminar-evento', 'EventosController@destroy')->name('eventos-eliminar');

//CRUD Tareas
Route::resource('tareas', 'TareasController', [
    'except' => ['create', 'show', 'edit']
]);