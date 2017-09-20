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
	Route::post('/update','DatosBasicosController@update')->name('datos.update');

});
Route::group(['prefix'=>'presupuesto'], function(){
	Route::get('/show','PresupuestoController@show')->name('presupuesto.show');
});
Route::group(['prefix'=>'datospresupuesto'], function(){
	Route::post('/create','DatosPresupuestoController@create')->name('datospresupuesto.create');
});
Route::group(['prefix'=>'impuesto'], function(){
	Route::get('/show','ImpuestoController@show')->name('impuesto.show');
});
Route::group(['prefix'=>'datosimpuesto'], function(){
	Route::post('/create','DatosImpuestoController@create')->name('datosimpuesto.create');
});
Route::group(['prefix'=>'terceros'], function(){
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
Route::get('comprobanteegreso','ComprobanteEgresoController@pdf')->name("report.comprobanteegreso.generate");
Route::get('recibosatisfaccion','ReciboSatisfaccionController@pdf')->name("report.recibosatisfaccion.generate");
Route::get('disponibilidadpresupuestal','DisponibilidadPresupuestalController@pdf')->name("report.disponibilidadpresupuestal.generate");
Route::get('registropresupuestal','RegistroPresupuestalController@pdf')->name("report.registropresupuestal.generate");
Route::get('certificadopreciosmercado','CertificadoPrecioController@pdf')->name("report.certificadopreciosmercado.generate");
Route::get('contratosuministro','ContratoSuministroController@pdf')->name("report.contratosuministro.generate");
Route::get('comprobanteentradaalmacen','ComprobanteEntradaAlmacenController@pdf')->name("report.comprobanteentradaalmacen.generate");
Route::get('comprobantesalidaalmacen','ComprobanteSalidaAlmacenController@pdf')->name("report.comprobantesalidaalmacen.generate");


Route::get('pdfv', function(){
	return view('pdf.documento_equivalente');
});

Auth::routes();
