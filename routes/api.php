<?php

use Illuminate\Http\Request;

/*
|--------------------------------------------------------------------------
| API Routes
|--------------------------------------------------------------------------
|
| Here is where you can register API routes for your application. These
| routes are loaded by the RouteServiceProvider within a group which
| is assigned the "api" middleware group. Enjoy building your API!
|
*/

Route::middleware('auth:api')->get('/user', function (Request $request) {
    return $request->user();
});

Route::get('/',function(){
  return 'not this time';
});

// Objetos JSON
Route::get('/objetos', function(){
  $objetos = \App\Objeto::all();
  return $objetos->toJson();
});
Route::get('/objetos/{id}', function($id){
  $objeto = \App\Objeto::find($id);
  return $objeto->toJson();
});

// Categorias JSON
Route::get('/categorias', function(){
  $categorias = \App\Categoria::all();
  return $categorias->toJson();
});
Route::get('/categorias/{id}', function($id){
  $categoria = \App\Categoria::find($id);
  return $categoria->toJson();
});
