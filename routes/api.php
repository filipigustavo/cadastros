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

Route::group(['middleware' => ['cors', 'auth:api']], function(){
  // Usuário corrente
  Route::get('/user', function (Request $request) {
    return $request->user();
  });



  // Objetos JSON
  Route::get('/objetos', function(){
    $objetos = \App\Objeto::all()->load('categoria');
    return response()->json($objetos);
  });

  Route::post('/objetos', 'ObjetoController@store');
  Route::delete('/objetos/{id}', 'ObjetoController@destroy');

  Route::get('/objetos/{id}', function($id){
    $objeto = \App\Objeto::find($id)->load('categoria');
    return response()->json($objeto);
  });



  // Categorias JSON
  Route::get('/categorias', function(Request $request){
    $categorias = \App\Categoria::all()->load('objetos');
    return response()->json($categorias);
  });

  Route::post('/categorias', 'CategoriaController@store');
  Route::delete('/categorias/{id}', 'CategoriaController@destroy');

  Route::get('/categorias/{id}', function($id){
    $categoria = \App\Categoria::find($id)->load('objetos');
    return response()->json($categoria);
  });
});



// Rota aberta para teste rápido
// Teste de post...
Route::post('/receive-post', function(Request $request){
  $data = [
    'post-data' => $request->input('postfield')
  ];
  return response()->json($data);
})->middleware('cors');

// Teste de get...
Route::get('/get-whatever', function(Request $request){
  $data = [
    'bool' => (bool)random_int(0, 1),
    'outro' => 'msg da api',
    'opa' => 90
  ];
  return response()->json($data);
})->middleware('cors');
