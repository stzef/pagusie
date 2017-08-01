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


Route::get('/', 'HomeController@index')->name("index");

Route::group(['prefix'=>'datos'], function(){
	Route::post('/create','DatosBasicosController@create')->name('datos.create');
});

Route::group(['prefix'=>'terceros'], function(){
	Route::get('/', 'TercerosController@index')->name('terceros.index');
	Route::get('/show', 'TercerosController@show')->name('terceros.show');
	Route::post('/create','TercerosController@create')->name('terceros.create');
});

/*Route::get('pdf', function(){
	$pdf = PDF::loadView('pdf.documento_equivalente');
	return $pdf->setPaper('a4')->stream();
});*/

Route::get('documentoequivalente','DocumentoEquivalenteController@pdf')->name("report.documentoequivalente.generate");
//Route::get('pdf/{cdatos}','DocumentoEquivalenteController@pdf');
Route::get('contratoservicio','ContratoServicioController@pdf')->name("report.contratoservicio.generate");

Route::get('pdfv', function(){
	return view('pdf.documento_equivalente');
});

Auth::routes();
