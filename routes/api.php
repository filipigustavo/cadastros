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

Route::get('/',function(){
  return 'not this time';
});

Route::middleware('auth:api')->get('/user', function (Request $request) {
    return $request->user();
});

Route::group(['middleware' => ['cors', 'auth:api']], function(){
  // Objetos JSON
  Route::get('/objetos', function(){
    $objetos = \App\Objeto::all()->load('categoria');
    return response()->json($objetos);
  });

  Route::get('/objetos/{id}', function($id){
    $objeto = \App\Objeto::find($id)->load('categoria');
    return response()->json($objeto);
  });

  // Categorias JSON
  Route::get('/categorias', function(Request $request){
    // if($request->input('callback')){
      $categorias = \App\Categoria::all(); // ->load('objetos')
      return response()->json($categorias); // ->withCallback($request->input('callback'));
    // }
    // return;
  });

  Route::get('/categorias/{id}', function($id){
    $categoria = \App\Categoria::find($id)->load('objetos');
    return response()->json($categoria);
  });
});
