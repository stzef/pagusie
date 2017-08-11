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

