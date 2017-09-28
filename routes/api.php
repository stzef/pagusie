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

Route::group(['prefix' => 'tipo_documento'], function(){
	Route::get('/', "APIController@tipo_documento")->name("api.tipo_documento.index");
});
Route::group(['prefix' => 'departamentos'], function(){
	Route::get('/', "APIController@departamentos")->name("api.departamentos.index");
});
Route::group(['prefix' => 'ciudades'], function(){
	Route::get('/', "APIController@ciudades")->name("api.ciudades.index");
});
Route::group(['prefix' => 'terceros'], function(){
	Route::get('/', "APIController@terceros")->name("api.terceros.index");
});
Route::group(['prefix' => 'impuestos'], function(){
	Route::get('/', "APIController@impuestos")->name("api.impuestos.index");
});
Route::group(['prefix' => 'presupuestos'], function(){
	Route::get('/', "APIController@presupuestos")->name("api.presupuestos.index");
});
Route::group(['prefix' => 'comprobanteegreso'], function(){
	Route::get('/', "APIController@comprobanteegreso")->name("api.comprobanteegreso.index");
});
Route::group(['prefix' => 'bancos'], function(){
	Route::get('/', "APIController@bancos")->name("api.bancos.index");
});
