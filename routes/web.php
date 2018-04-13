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
Route::get('clientes/crear-empresa', function(){
    return view('crear-empresa');
})->name('crear-empresa');

Route::get('clientes/crear-persona', function(){
    return view('crear-persona');
})->name('crear-persona');

Route::get('clientes/ver-clientes', function () {
    return view('ver-clientes');
})->name('ver-clientes');

Auth::routes();

Route::get('/home', 'HomeController@index')->name('home');