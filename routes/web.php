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

/*Route::get('/login', function () {
	return view('auth.login');
});*/


Route::get('/', 'HomeController@index');

Route::group(['prefix'=>'datos'], function(){
	Route::post('/create','DatosBasicosController@create')->name('create');
});
Route::group(['prefix'=>'terceros'], function(){
	Route::get('/', 'TercerosController@index')->name('terceros');
	Route::get('/show', 'TercerosController@show')->name('tercerosShow');
	Route::post('/create','TercerosController@create')->name('create');
});

Route::group(['prefix' => 'api'], function(){
	Route::group(['prefix' => 'tipo_documento'], function(){
		Route::get('/', "APIController@tipo_documento");
	});
	Route::group(['prefix' => 'departamentos'], function(){
		Route::get('/', "APIController@departamentos");
	});
	Route::group(['prefix' => 'ciudades'], function(){
		Route::get('/', "APIController@ciudades");

	});
});
Route::get('pdf', function(){
	$pdf = PDF::loadView('contrato_prestacion_servicios');
	return $pdf->setPaper('a4')->stream();
});
Route::get('pdfv', function(){
return view('contrato_prestacion_servicios');
});
Auth::routes();
