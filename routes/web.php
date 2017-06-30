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

Auth::routes();

Route::get('/layouts.tabs', 'HomeController@index')->name('home');

Route::get('/prueba', function () {
    return view('layouts.tabs');
});
Route::get('/tres', function () {
    return view('terceros');
});
