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
    return view('welcome');
});

// Grupo autenticado
Route::group(['middleware'=>'auth'], function(){
  Route::get('/home', 'HomeController@index')->name('home');

  // Objetos
  Route::get('/objetos', 'ObjetoController@index')->name('listar_objetos');
  Route::get('/objetos/criar', 'ObjetoController@create')->name('criar_objeto');
  Route::get('/objetos/editar/{id}', 'ObjetoController@edit')->name('editar_objeto');
  Route::get('/objetos/{id}', 'ObjetoController@show')->name('mostrar_objeto');
  Route::post('/objetos', 'ObjetoController@store');
  Route::put('/objetos/{id}', 'ObjetoController@update');
  Route::delete('/objetos/{id}', 'ObjetoController@destroy');

  // Categorias
  Route::get('/categorias', 'CategoriaController@index')->name('listar_categorias')->middleware('permission:read-categoria');
  Route::get('/categorias/criar', 'CategoriaController@create')->name('criar_categoria')->middleware('permission:create-categoria');
  Route::get('/categorias/editar/{id}', 'CategoriaController@edit')->name('editar_categoria')->middleware('permission:edit-categoria');
  Route::get('/categorias/{id}', 'CategoriaController@show')->name('mostrar_categoria')->middleware('permission:read-categoria');
  Route::post('/categorias', 'CategoriaController@store')->middleware('permission:create-categoria');
  Route::put('/categorias/{id}', 'CategoriaController@update')->middleware('permission:edit-categoria');
  Route::delete('/categorias/{id}', 'CategoriaController@destroy')->middleware('permission:delete-categoria');
});

Route::get('/gerar-permissoes', 'PermissionController@createAll');

Auth::routes();
